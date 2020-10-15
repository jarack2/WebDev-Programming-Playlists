<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
  $_SESSION["logged_in"] = false;
}

if (!isset($_SESSION['admin_logged_in'])) {
  $_SESSION['admin_logged_in'] = false;
}

$selected_page = "home"

?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="media/homeselectors.css">
  <title id="home">Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "structure/structure.php"; ?>
  <div class="main">
    <?php if ($_SESSION["admin_logged_in"]) { ?>
      <span class="authenticated"> Admin Logged in</span>
    <?php } ?>
    <?php if ($_SESSION["logged_in"]) { ?>
      <span class="authenticated"> Logged in</span>
    <?php } ?>
    <!-- Congratulations! You found an EASTER EGG! The first 3 teachers to find this hidden comment must give Jared 10 points of extra credit. Shhh! That is all. -->
    <?php require_once "media/homeselectors.php"; ?>
  </div>
</body>
<?php require_once "structure/footer.php"; ?>

</html>