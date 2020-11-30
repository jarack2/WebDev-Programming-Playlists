<?php
session_start();
include_once('../database/Connection.php');
$heroku = true;

if (!empty($_POST)) { // creates user if form submitted
  $conn = new Connection($heroku);
  $video_name = trim($_POST["video_name"]);
  $video_link = trim($_POST["video_link"]);
  $video_topic = trim($_POST["video_topic"]);

  $_SESSION["valid_video"] = true;

  if (!preg_match("^.*(youtube\.com|youtu\.be)\/.+$^", $video_link)) {
    $_SESSION["valid_video"] = false;
    $_SESSION["error"] = "The video link was not in the correct format. Please try again.";
  }

  if (strlen($video_name) < 1 || strlen($video_topic) < 1) {
    $_SESSION["valid_video"] = false;
    $_SESSION["error"] = "The video name or topic was not long enough. Please try again.";
  }

  if ($conn->matching_credential("Video_Name", $video_name)) {
    $_SESSION["valid_video"] = false;
    $_SESSION["error"] = "The video $video_name already exists. Please try again.";
  }

  if ($conn->matching_credential("Video_Link", $video_link)) {
    $_SESSION["valid_video"] = false;
    $_SESSION["error"] = "The video link has already been used. Please try again.";
  }

  if (!$_SESSION["valid_video"]) {
    if ($heroku) {
      header("Location:https://programmingplaylists.herokuapp.com/add/add.php");
    } else {
      header("Location:http://cs401fp/add/add.php");
    }
    exit();
  }

  $_SESSION["add_form"] = $_POST;


  $result = $conn->add_video($video_name, $video_link,  $video_topic);
  $_SESSION["result"] = $result;
  if ($result) {
    $_SESSION["success"] = "Successfully added video: " . $video_name;
  } else {
    $_SESSION["error"] = "Failed to add video: $video_name";
  }

  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/add/add.php");
  } else {
    header("Location:http://cs401fp/add/add.php");
  }
  exit();
}
