<?php
session_start();
include_once('../Connection.php');
$selected_page = "signup";
$username_message = "";
$pass_message = "";
$exists_message = "";
$valid_user = true;

if (!empty($_POST)) { // creates user if form submitted
  $conn = new Connection(false);
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $exists_message = "This email does not appear to be valid. Please try another one.";
    $valid_user = false;
  } elseif ($conn->matching_credential("Email", $email)) {
    $exists_message = "This email has already been taken. Please try a new one.";
    $valid_user = false;
  } elseif ($conn->matching_credential("Username", $username)) {
    $exists_message = "This username has already been taken. Please try a new one.";
    $valid_user = false;
  }

  if (strlen($username) < 5) {
    $username_message = "Username needs to be more than five characters.";
    $valid_user = false;
  }
  if (strlen($password) < 6) {
    $pass_message = "Password needs to be more than six characters.";
    $valid_user = false;
  }
  if ($valid_user)
    $conn->create_user($email, $username, $password);
}

?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Signup | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- action="accountredirect.php" -->

<body>
  <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="signup"> Create an Account:</h3>
        <form method="post" class="credentials">
          <p class="error"><?php echo $exists_message ?></p>
          <div class="email">
            <span> Enter Your Email </span>&nbsp;
            <input class="input" type="text" name="email" id="email" placeholder="Email">
          </div>
          <div class="username">
            <span>Create a Username</span>
            <input class="input" type="text" name="username" id="name" placeholder="Username">
            <span class="error"><?php echo $username_message ?></span>
          </div>
          <div class="password">
            <span>Create a Password</span>&nbsp;
            <input class="input" name="password" id="password" type="password" placeholder="Password">
            <span class="error"><?php echo $pass_message ?></span>
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>