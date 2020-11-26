<?php
session_start();
include_once('../database/Connection.php');


$_SESSION["error_message"] = null;
$_SESSION["valid_user"] = true;

$heroku = true;

if (!empty($_POST)) { // creates user if form submitted
  define("SALT", "salt123321tlassalttlas12321");
  $conn = new Connection($heroku);
  $username = $_POST["username"];
  $password = hash("sha256",$_POST["password"].SALT); // hashing the password with extra salt
  if ($conn->login($username, $password)) {
    $_SESSION["authenticated"] = true;
    $_SESSION["username"] = $_POST["username"];
    unset($_SESSION["login_form"]);
  } else {
    $_SESSION["login_form"] = $_POST; // repopulating the form if errors occur
    $_SESSION["error_message"] = "The username or password is incorrect, Please try again.";
  }
}

if ($_SESSION["authenticated"]) { // redirects based on if user successfully logged in
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/");
  } else {
    header("Location:http://cs401fp/");
  }
  exit();
} else {
  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/account/login.php");
  } else {
    header("Location:http://cs401fp/account/login.php");
  }
  exit();
}
