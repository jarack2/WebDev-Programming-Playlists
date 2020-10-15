<?php
session_start();
$_SESSION["logged_in"] = false;
$heroku = true;

if ($heroku) {
  header("Location:https://programmingplaylists.herokuapp.com/account/login.php");
} else {
  header("Location:http://cs401fp/account/login.php");
}

exit();
