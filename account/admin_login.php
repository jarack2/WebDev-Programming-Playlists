<?php
session_start();
$selected_page = "admin_login";
$heroku = true;

if ($_SESSION["admin_authenticated"]) {
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com");
  } else {
    header("Location:http://cs401fp");
  }
}
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Admin Login | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="login">Admin Login:</h3>
        <form action="admin_handler.php" class="credentials" method="post">
          <?php if (isset($_SESSION["error_message"])) { ?>
            <span class="error"> <?php echo ($_SESSION["error_message"]); ?> </span>
          <?php } ?>
          <div class="username">
            <input class="input" name="admin_login" type="text" id="name" placeholder="Admin Login">
          </div>
          <div class="password">
            <input class="input" name="admin_password" type="password" id="passwd" placeholder="Admin Password">
          </div>
          <div class="encryption-key">
            <input class="input" name="admin_key" type="password" id="key" placeholder="Admin Encryption Key">
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>