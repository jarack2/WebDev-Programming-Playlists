<?php
session_start();
$selected_page = "logout";
$heroku = false;

if (!isset($_SESSION["authenticated"]) || !($_SESSION["authenticated"])) { // making sure that user cannot get to this page by clicking the back button
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/account/login.php");
  } else {
    header("Location:http://cs401fp/account/login.php");
  }
  exit();
}
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Login | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <div class="content">
      <h2 class="login">Logout:</h2>
      <form action="logout_handler.php" class="credentials" method="post">
        <span class="logged-in-text">You are logged in as <?= htmlspecialchars($_SESSION["username"]) ?> </span>
        <input class="logout-btn" type="submit" name="logout" value="Logout" />
      </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>