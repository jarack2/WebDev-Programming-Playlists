<?php

class Connection
{
  private $host = "localhost";
  private $db = "progplay";
  private $user = "root";
  private $pass = "";

  public function __construct($heroku)
  {
    if ($heroku) {
      $this->host = "us-cdbr-east-02.cleardb.com";
      $this->db = "heroku_1e81ecd18315f22";
      $this->user = "bf494ce1331498";
      $this->pass = "f8063885";
    }
  }

  public function getConnection()
  {
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    } catch (Exception $e) {
      echo print_r($e, 1);
      exit;
    }

    return $conn;
  }

  // creates a user
  public function create_user($email, $name, $pass)
  {
    $conn = $this->getConnection();
    $add_user = $conn->prepare("INSERT INTO Users (Email, Username, Password) VALUES (?, ?, ?);");
    $add_user->bindParam(1, $email, PDO::PARAM_STR);
    $add_user->bindParam(2, $name, PDO::PARAM_STR);
    $add_user->bindParam(3, $pass, PDO::PARAM_STR);
    $add_user->execute();
  }

  // verifies that the user information matches an entry in the db.
  public function login($name, $pass)
  {
    $conn = $this->getConnection();
    $query_user = $conn->prepare("SELECT Username, Password FROM Users WHERE Username = ? AND Password = ?;");
    $query_user->bindParam(1, $name, PDO::PARAM_STR);
    $query_user->bindParam(2, $pass, PDO::PARAM_STR);
    $query_user->execute();

    if (!$query_user->fetch(PDO::FETCH_ASSOC))
      return null;

    return true;
  }

  // checks to see if the email or username already exists in the db
  public function matching_credential($type, $credential)
  {
    $conn = $this->getConnection();

    if ($type == "Email") {
      $query_user = $conn->prepare("SELECT * FROM Users WHERE Email = :credential;");
      $query_user->bindParam(":credential", $credential, PDO::PARAM_STR);
    } else {
      $query_user = $conn->prepare("SELECT * FROM Users WHERE Username = :credential;");
      $query_user->bindParam(":credential", $credential, PDO::PARAM_STR);
    }

    $query_user->execute();

    $result = $query_user->fetchAll(PDO::FETCH_ASSOC);
    echo print_r($result) . "\n";

    if ($result) {
      return true;
    }

    return false;
  }

  // fetches all the videos for a certain topic
  public function get_videos($topic)
  {
    $conn = $this->getConnection();
    $videos = $conn->prepare("SELECT * FROM Videos JOIN Playlists on Videos.ID = Playlists.VideoID WHERE Playlists.Topic = ?;");
    $videos->bindParam(1, $topic, PDO::PARAM_STR);
    $videos->execute();

    return $videos->fetchAll(PDO::FETCH_ASSOC);
  }

  // adds a video to the db (admin function)
  public function add_video($name, $link, $topic)
  {
    $heroku_auto_inc = 10;
    $result = false;
    $conn = $this->getConnection();

    // inserts a new video into the videos table
    $videos = $conn->prepare("INSERT INTO Videos (Name, Link) VALUES (?, ?);");
    $videos->bindParam(1, $name, PDO::PARAM_STR);
    $videos->bindParam(2, $link, PDO::PARAM_STR);
    $result = $videos->execute();

    // getting the video id from the videos table
    $id = $conn->prepare("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = :db AND TABLE_NAME = \"Videos\";");
    $id->bindParam(":db", $this->db, PDO::PARAM_STR);
    $id->execute();

    $video_id = $id->fetch(PDO::FETCH_ASSOC)["AUTO_INCREMENT"] - $heroku_auto_inc; // the id of the video that was just inserted

    // adding the video id and topic to the playlists table
    $videos = $conn->prepare("INSERT INTO Playlists (Topic, VideoID) VALUES (:topic, :id);");
    $videos->bindParam(":topic", $topic, PDO::PARAM_STR);
    $videos->bindParam(":id", $video_id, PDO::PARAM_INT);
    $result = $result && $videos->execute();

    return $result;
  }

  // adds a fovorite to the database
  public function add_favorites($user, $video)
  {
    $conn = $this->getConnection();

    $userID = $conn->prepare("SELECT ID from Users where Username = :user;");
    $userID->bindParam(":user", $user, PDO::PARAM_STR);
    $userID->execute();
    $user_id = $userID->fetch(PDO::FETCH_ASSOC)["ID"];

    $videoID = $conn->prepare("SELECT ID from Videos where Name = :vidname;");
    $videoID->bindParam(":vidname", $video, PDO::PARAM_STR);
    $videoID->execute();
    $video_id = $videoID->fetch(PDO::FETCH_ASSOC)["ID"];

    $favorite = $conn->prepare("INSERT INTO Favorites (UserID, VideoID) VALUES (:userid, :videoid);");
    $favorite->bindParam(":userid", $user_id, PDO::PARAM_INT);
    $favorite->bindParam(":videoid", $video_id, PDO::PARAM_INT);
    $result = $favorite->execute();

    return $result;
  }

  // retrieves the user's favorites
  public function get_favorites($user)
  {
    $conn = $this->getConnection();

    $userID = $conn->prepare("SELECT ID from Users where Username = :user;");
    $userID->bindParam(":user", $user, PDO::PARAM_STR);
    $userID->execute();
    $id = $userID->fetch(PDO::FETCH_ASSOC)["ID"];

    $favorites = $conn->prepare("SELECT Name, Link FROM Videos JOIN Favorites on Videos.ID = Favorites.VideoID WHERE UserID = :id;");
    $favorites->bindParam(":id", $id, PDO::PARAM_INT);
    $favorites->execute();

    return $favorites->fetchAll(PDO::FETCH_ASSOC);
  }
}

$heroku = true;
$conn = new Connection($heroku); // true if we want to deploy to heroku

// $conn->add_favorites("jared1", "test");
// echo print_r($conn->get_favorites('jared1'));
