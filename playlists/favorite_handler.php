<?php
session_start();
include_once('../database/Connection.php');

$heroku = true;
$conn = new Connection($heroku); // true if we want to deploy to heroku
$username = $_SESSION["username"];
$favorite = $_POST["favorite"];
$result = $conn->add_favorites($username, $favorite);
if ($result) {
  file_put_contents("test.txt", "successful");
} else {
  file_put_contents("test.txt", "NOT successful:" . $username . " " . $favorite);
}
