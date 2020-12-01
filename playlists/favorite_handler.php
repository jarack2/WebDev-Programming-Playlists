<?php
session_start();
include_once('../database/Connection.php');

$heroku = true;
$conn = new Connection($heroku); // true if we want to deploy to heroku
$username = $_SESSION["username"];
$favorite = $_POST["favorite"];
$conn->add_favorites($username, $favorite);
