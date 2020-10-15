<?php
session_start();
include_once('../database/Connection.php');

$_SESSION["error_message"] = null;
$_SESSION["valid_user"] = true;

if (!empty($_POST)) { // creates user if form submitted
  $conn = new Connection(false);
  if ($conn->login($_POST["username"], $_POST["password"])) {
    $_SESSION['logged_in'] = true;
  } else {
    $_SESSION["error_message"] = "The user does not exist, Please try again.";
  }
}

if ($_SESSION['logged_in']) {
  header("Location:http://cs401fp/");
  exit();
} else {
  header("Location:http://cs401fp/account/login.php");
  exit();
}
