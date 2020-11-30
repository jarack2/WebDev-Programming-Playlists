<?php
session_start();
$heroku = true;

if (!empty($_POST)) {
  $admin_login = $_POST["admin_login"];
  $admin_password = hash("sha256", $_POST["admin_password"]);
  $admin_encryption_key = $_POST["admin_key"];

  require_once("../database/Connection.php");
  $conn = new Connection($heroku);

  if ($conn->admin_login($admin_login, $admin_password, $admin_encryption_key)) { // admin logins are inserted directly into the database.
    $_SESSION["admin_authenticated"] = true;
  }

  if ($_SESSION["admin_authenticated"]) {
    if ($heroku) {
      header("Location:https://programmingplaylists.herokuapp.com/");
    } else {
      header("Location:http://cs401fp/");
    }
    exit();
  } else {
    if ($heroku) {
      header("Location:https://programmingplaylists.herokuapp.com/account/admin_login.php");
    } else {
      header("Location:http://cs401fp/account/admin_login.php");
    }
    exit();
  }
}
