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

    // echo print_r($query_user->fetch(PDO::FETCH_ASSOC));

    if (!$query_user->fetch(PDO::FETCH_ASSOC))
      return null;

    return true;
  }

  // checks to see if the email or username already exists in the db
  public function matching_credential($type, $credential)
  {
    $conn = $this->getConnection();
    $query_user = $conn->prepare("SELECT ? FROM Users WHERE ? = \"?\";");
    $query_user->bindParam(1, $type, PDO::PARAM_STR);
    $query_user->bindParam(2, $credential, PDO::PARAM_STR);
    $query_user->execute();

    if (!$query_user->fetch(PDO::FETCH_ASSOC))
      return true;

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
  public function add_video($id, $name, $link)
  {
    $conn = $this->getConnection();
    $videos = $conn->prepare("INSERT INTO Videos (ID, Name, Link) VALUES (?, ?, ?);");
    $videos->bindParam(1, $id, PDO::PARAM_INT);
    $videos->bindParam(2, $name, PDO::PARAM_STR);
    $videos->bindParam(3, $link, PDO::PARAM_STR);
    $videos->execute();
  }
}

$conn = new Connection(false); // true if we want to deploy to heroku
// $conn->create_user("jared2@gmail.com", "jaredr", "jared123");
// $conn->login("jaredr", "jared123");