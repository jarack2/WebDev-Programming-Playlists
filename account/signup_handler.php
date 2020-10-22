<?php
session_start();

// resetting the data when form submits
$_SESSION["username_message"] = null;
$_SESSION["password_message"] = null;
$_SESSION["exists_message"] = null;
$_SESSION["valid_user"] = true;

$heroku = false;

if (!empty($_POST)) { // creates user if form submitted with valid credentials
  include_once('../database/Connection.php');
  $conn = new Connection($heroku);
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  // vaildating email and checking if user exists.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["exists_message"] = "This email does not appear to be valid. Please try another one.";
    $_SESSION["valid_user"] = false;

    // } elseif ($conn->matching_credential("Email", $email)) {
    //   $_SESSION["exists_message"] = "This email has already been taken. Please try a new one.";
    //   $valid_user = false;
    // } elseif ($conn->matching_credential("Username", $username)) {
    //   $_SESSION["exists_message"] = "This username has already been taken. Please try a new one.";
    //   $valid_user = false;
  }

  // username validation
  if (strlen($username) < 5) {
    $_SESSION["username_message"] = "Username needs to be more than five characters.";
    $_SESSION["valid_user"] = false;
  }

  // password validation 
  if (strlen($password) < 6) {
    $_SESSION["password_message"] = "Password needs to be more than six characters.";
    $valid_user = false;
  }

  if ($_SESSION["valid_user"]) {
    $conn->create_user($email, $username, $password);
    $_SESSION["authenticated"] = true;
  }
}

if ($_SESSION["authenticated"]) {
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/");
  } else {
    header("Location:http://cs401fp/");
  }
  exit();
} else {
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/account/signup.php");
  } else {
    header("Location:http://cs401fp/account/signup.php");
  }
  exit();
}
