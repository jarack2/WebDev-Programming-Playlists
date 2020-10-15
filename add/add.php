<?php
session_start();

$selected_page = "add";
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
      <h2 class="add videos">Add a Video:</h3>
        <form class="credentials" method="post">
          <?php if (isset($_SESSION["error_message"])) { ?>
            <span class="error"> <?php echo ($_SESSION["error_message"]); ?> </span>
          <?php } ?>
          <div class="video-name">
            <input class="input" name="name" type="text" id="name" width="100%" placeholder="Video Name">
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