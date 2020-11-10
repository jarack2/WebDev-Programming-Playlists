<?php
require_once "../database/Connection.php"; 
$selected_page = "playlists";
session_start();
$heroku = true;
$conn = new Connection($heroku); // true if we want to deploy to heroku

if (isset($_GET["topic"])) {
  $_SESSION["topic"] = $_GET["topic"];
}

$topic = $_SESSION["topic"];

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
  <link rel="stylesheet" href="playlists.css">
  <title id="home">Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <!-- These will be dynamically generated but for now, they are hardcoded in -->
    <h3 class="selectedplaylist">The Selected Playlist is: <?= $topic ?></h3>
    <div class="videos">
      <?php foreach ($videos as $video) {?>
        <span class="video-container">
          <i id="favorites" class="fa fa-heart"></i>
          <iframe 
            class="videos" 
            src="<?= $video ?>" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen
          >
          </iframe>
        </span>
      <?php } ?>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>