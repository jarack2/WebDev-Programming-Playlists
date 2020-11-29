<?php
session_start();
$selected_page = "login";
if (!isset($_SESSION["authenticated"])) // if the user is not logged in
  $_SESSION["authenticated"] = false;

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
if (isset($_SESSION["login_form"])) {
  $username = $_SESSION["login_form"]["username"];
}
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Login | Programming Playlists</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <div class="content">
      <h2 class="login">Login:</h2>
      <form action="login_handler.php" class="credentials" method="post">
        <?php if (isset($_SESSION["error_message"])) { ?>
          <span class="error"> <?php echo ($_SESSION["error_message"]); ?>  <a class="close">X</a> </span>
         
        <?php } ?>
        <div class="username">
          <label for="username"> Enter Your Username: </label>
          <input class="input" name="username" type="text" id="username" placeholder="Username" value="<?= $username ?>">
        </div>
        <div class="password">
          <label for="password"> Enter Your Password: </label>&nbsp;
          <input class="input" name="password" type="password" id="password" placeholder="Password">
        </div>
        <input type="submit" value="Submit" />
      </form>
    </div>
  </div>
</body> 
<?php require_once "../structure/footer.php"; ?>
<script src="close.js"></script>
</html>
