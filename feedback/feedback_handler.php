<?php
session_start();
$heroku = false;
$name = "Anonymous";

if (isset($_SESSION["username"])) {
  $name = $_SESSION["username"];
}

if (isset($_POST["feedback"])) {
  mail("jaredrackley@u.boisestate.edu", "Feedback from $name", wordwrap($_POST["feedback"], 70));
  $_SESSION["feedback_submitted"] = true;
}

if ($heroku) {
  header("Location:https://programmingplaylists.herokuapp.com/feedback/feedback.php");
} else {
  header("Location:http://cs401fp/feedback/feedback.php");
}