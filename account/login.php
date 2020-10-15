<?php
session_start();
$selected_page = "login";
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
      <h2 class="login">Login:</h3>
        <form action="login_handler.php" class="credentials" method="post">
          <div class="username">
            <input class="input" name="username" type="text" id="name" placeholder="Username">
            <?php if (isset($_SESSION["error_message"])) { ?>
              <span class="error"> <?php echo ($_SESSION["error_message"]); ?> </span>
            <?php } ?>
          </div>
          <div class="password">
            <input class="input" name="password" type="password" placeholder="Password">
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>