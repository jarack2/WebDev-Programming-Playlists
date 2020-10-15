<?php
session_start();
$selected_page = "signup";
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Signup | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="signup"> Create an Account:</h3>
        <?php if ($_SESSION['logged_in']) { ?>
          <form action="logout_handler.php" class="credentials" method="post">
            <span class="logged-in-text">You are logged in as <?= $_SESSION["username"] ?> </span>
            <input class="logout-btn" type="submit" name="logout" value="Logout" />
          <?php } else { ?>
            <form action="signup_handler.php" method="post" class="credentials">
              <?php if (isset($_SESSION["exists_message"])) { ?>
                <p class="error"> <?php echo ($_SESSION["exists_message"]); ?> </p>
              <?php } ?>
              <div class="email">
                <span> Enter Your Email </span>&nbsp;
                <input class="input" type="text" name="email" id="email" placeholder="Email">
              </div>
              <div class="username">
                <span>Create a Username</span>
                <input class="input" type="text" name="username" id="name" placeholder="Username">
                <?php if (isset($_SESSION["username_message"])) { ?>
                  <span class="error"><?php echo ($_SESSION["username_message"]); ?></span>
                <?php } ?>

              </div>
              <div class="password">
                <span>Create a Password</span>&nbsp;
                <input class="input" name="password" id="password" type="password" placeholder="Password">
                <?php if (isset($_SESSION["password_message"])) { ?>
                  <span class="error"><?php echo ($_SESSION["password_message"]); ?></span>
                <?php } ?>

              </div>
              <input type="submit" value="Submit" />
            </form>
          <?php } ?>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>