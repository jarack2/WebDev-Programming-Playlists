<?php
session_start();
$selected_page = "signup";

$heroku = true;
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="signup"> Create an Account:</h2>
      <form action="signup_handler.php" method="post" class="credentials">
        <?php if (isset($_SESSION["exists_messages"])) {
          foreach ($_SESSION["exists_messages"] as $error) { ?>
            <span class="error"><?= $error ?><a class="close">X</a></span>
            <br />
        <?php }
        } ?>
        <div class="email">
          <label for="email"> Enter Your Email </label>&nbsp;
          <input class="input" type="text" name="email" id="email" placeholder="Email" value="<?= $email ?>">
        </div>
        <div class=" username">
          <label for="username">Create a Username</label>
          <input class="input" type="text" name="username" id="username" placeholder="Username" value="<?= $username ?>">
          <?php if (isset($_SESSION["username_message"])) { ?>
            <span class=" error"><?php echo ($_SESSION["username_message"]); ?><a class="close">X</a></span>
          <?php } ?>
        </div>
        <div class="password">
          <label for="password">Create a Password</label>&nbsp;
          <input class="input" name="password" id="password" type="password" placeholder="Password">
          <?php if (isset($_SESSION["password_messages"])) {
            foreach ($_SESSION["password_messages"] as $error) { ?>
              <span class="error"><?= $error ?><a class="close">X</a></span>
              <br />
          <?php }
          } ?>

        </div>
        <input type="submit" value="Submit" />
      </form>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>
<script src="close.js"></script>

</html>