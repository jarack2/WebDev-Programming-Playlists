<?php
session_start();
$selected_page = "login";
if (!isset($_SESSION['logged_in'])) // if the user is not logged in
  $_SESSION['logged_in'] = false;
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Login | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="login">Login:</h2>
      <?php if ($_SESSION['logged_in']) { ?>
        <form action="logout_handler.php" class="credentials" method="post">
          <span class="logged-in-text">You are logged in as <?= $_SESSION["username"] ?> </span>
          <input class="logout-btn" type="submit" name="logout" value="Logout" />
        <?php } else { ?>
          <form action="login_handler.php" class="credentials" method="post">
            <?php if (isset($_SESSION["error_message"])) { ?>
              <span class="error"> <?php echo ($_SESSION["error_message"]); ?> </span>
            <?php } ?>
            <div class="username">
              <input class="input" name="username" type="text" id="name" placeholder="Username">
            </div>
            <div class="password">
              <input class="input" name="password" type="password" id="passwd" placeholder="Password">
            </div>
            <input type="submit" value="Submit" />
          </form>
        <?php } ?>

    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>