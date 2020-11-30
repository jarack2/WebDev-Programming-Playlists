<?php
require_once "../database/Connection.php";
$selected_page = "playlists";
session_start();
$heroku = false;
$conn = new Connection($heroku); // true if we want to deploy to heroku

if (isset($_GET["topic"])) {
  $_SESSION["topic"] = $_GET["topic"];
}

$topic = "";
if (isset($_SESSION["topic"])) {
  $topic = $_SESSION["topic"];
}

$retrieved_video = $conn->get_videos($topic);
$videos = array();

foreach ($retrieved_video as $vid) {
  if (strstr($vid["Link"], "embed")) continue; // if the youtube url is correct and doesnt need to be modified
  $videos[$vid["Name"]] = str_replace("watch?v=", "embed/", htmlspecialchars($vid["Link"])); // changing the youtube url and adding it to the video array
}
?>

<html>

<head>
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" type="text/css" href="../slick/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="../slick/slick/slick-theme.css" />
  <link rel="stylesheet" href="playlists.css">
  <title id="home">Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <?php if ($topic == "") {
      echo "<h2 class=\"playlist-default-message\">Please select a topic on the homepage.</h2>";
    } else { ?>
      <h3 class="selectedplaylist">The Selected Playlist is: <?= $topic ?></h3>
      <i id="favorites" class="fa fa-heart"></i>
      <div class="videos">
        <?php foreach ($videos as $video) { ?>
          <iframe class="new-vid" src="<?= $video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php } ?>
      </div>

    <?php } ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="../slick/slick/slick.min.js"></script>
  <script type="text/javascript" src="playlists.js"></script>
</body>
<?php require_once "../structure/footer.php"; ?>


</html>