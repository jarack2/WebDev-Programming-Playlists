<?php
session_start();
$selected_page = "signup";

$heroku = false;
if ($_SESSION["authenticated"]) { // making sure that user cannot get to this page by clicking the back button
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/account/logout.php");
  } else {
    header("Location:http://cs401fp/account/logout.php");
  }
  exit();
}

$username = "";
$email = "";

if (isset($_SESSION["signup_form"])) {
  $email = $_SESSION["signup_form"]["email"];
  $username = $_SESSION["signup_form"]["username"];
}
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
        <form action="signup_handler.php" method="post" class="credentials">
          <?php if (isset($_SESSION["exists_message"])) { ?>
            <span class="error"> <?php echo ($_SESSION["exists_message"]); ?> </span>
          <?php } ?>
          <div class="email">
            <span> Enter Your Email </span>&nbsp;
            <input class="input" type="text" name="email" id="email" placeholder="Email" value="<?= $email ?>">
          </div>
          <div class=" username">
            <span>Create a Username</span>
            <input class="input" type="text" name="username" id="name" placeholder="Username" value="<?= $username ?>">
            <?php if (isset($_SESSION["username_message"])) { ?>
              <span class=" error"><?php echo ($_SESSION["username_message"]); ?></span>
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
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>