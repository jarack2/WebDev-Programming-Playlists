<?php
session_start();

$selected_page = "add";
$heroku = true;

if (!$_SESSION["admin_authenticated"]) {
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com");
  } else {
    header("Location:http://cs401fp");
  }
}

if (!isset($_SESSION["success"])) {
  $_SESSION["success"] = "";
}

if (!isset($_SESSION["error"])) {
  $_SESSION["error"] = "";
}

if (!isset($_SESSION["valid_video"])) { // true until proven guilty
  $_SESSION["valid_video"] = true;
}
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="add.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Add a Video | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?> <div class="main">
    <?php if ($_SESSION["success"]) { ?>
      <h1 class="success-message"> <?php echo ($_SESSION["success"]); ?> </h1>
    <?php } else if (!($_SESSION["success"])) { ?>
      <h1 class="error-message"> <?php echo ($_SESSION["error"]); ?> </h1>
    <?php }
      if (!$_SESSION["valid_video"]) { ?>
      <h1 class="error-message"> <?php echo "The video was not valid. Please try again."; ?> </h1>
    <?php } ?>
    <div class="content">
      <h2 class="add-videos">Add a Video:</h3>
        <form action="add_handler.php" class="credentials" method="post">
          <div class="video-name">
            <input class="input" name="video_name" type="text" id="name" placeholder="Video Name">
          </div>
          <div class="video-link">
            <input class="input" name="video_link" type="text" id="link" placeholder="Video Link">
          </div>
          <div class="video_topic">
            <input class="input" name="video_topic" type="text" id="topic" placeholder="Video Topic">
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>