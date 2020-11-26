<?php
session_start();

// resetting the data when form submits
unset($_SESSION["username_message"]);
unset($_SESSION["password_messages"]);
unset($_SESSION["exists_messages"]);
$_SESSION["valid_user"] = true;

$heroku = true;

if (!empty($_POST)) { // creates user if form submitted with valid credentials
  define("SALT", "salt123321tlassalttlas12321");
  include_once('../database/Connection.php');
  $conn = new Connection($heroku);
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = hash("sha256",$_POST["password"].SALT); // hashing the password with extra salt

  // vaildating email and checking if user exists.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["exists_messages"][] = "This email does not appear to be valid. Please try another one.";
    $_SESSION["valid_user"] = false;
  }
  if ($conn->matching_credential("Email", $email)) {
    $_SESSION["exists_messages"][] = "This email has already been taken. Please try a new one.";
    $_SESSION["valid_user"] = false;
  }
  if ($conn->matching_credential("Username", $username)) {
    $_SESSION["exists_messages"][] = "This username has already been taken. Please try a new one.";
    $_SESSION["valid_user"] = false;
  }

  // username validation
  if (strlen($username) <= 5) {
    $_SESSION["username_message"] = "Username needs to be more than five characters.";
    $_SESSION["valid_user"] = false;
  }

  // password validation 
  if (strlen($password) < 6) {
    $_SESSION["password_messages"][] = "Your Password needs to be at least six characters.\n";
    $valid_user = false;
  }

  if (!preg_match("#[0-9]+#", $password)) {
    $_SESSION["password_messages"][] = "Your Password needs to include a number.\n";
    $valid_user = false;
  }

  if ($_SESSION["valid_user"]) {
    $conn->create_user($email, $username, $password);
    $_SESSION["username"] = $username;
    $_SESSION["authenticated"] = true;
    unset($_SESSION["signup_form"]);
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
  $_SESSION["signup_form"] = $_POST;
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/account/signup.php");
  } else {
    header("Location:http://cs401fp/account/signup.php");
  }
  exit();
}
