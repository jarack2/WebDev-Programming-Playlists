<?php
session_start();

$selected_page = "add";

if (!isset($_SESSION["success"])) {
  $_SESSION["success"] = false;
}

?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="add.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Login | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="add-videos">Add a Video:</h3>
        <?= $_SESSION["result"] ?>
        <form action="add_handler.php" class="credentials" method="post">
          <?php if ($_SESSION["success"]) { ?>
            <span class="success-message"> <?php echo ($_SESSION["success"]); ?> </span>
          <?php } else if (!($_SESSION["success"])) { ?>
            <span class="error-message"> <?php echo ($_SESSION["error"]); ?> </span>
          <?php } ?>
          <div class="video-name">
            <input class="input" name="video_name" type="text" id="name" width="100%" placeholder="Video Name">
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