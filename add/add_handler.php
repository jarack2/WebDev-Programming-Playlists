<?php
session_start();
include_once('../database/Connection.php');
$heroku = true;

if (!empty($_POST)) { // creates user if form submitted
  $video_name = $_POST["video_name"];
  $video_link = $_POST["video_link"];
  $video_topic = $_POST["video_topic"];
  
  $_SESSION["valid_video"] = true;
  
  if (!preg_match("^.*(youtube\.com|youtu\.be)\/.+$^", $video_link)) {
    $_SESSION["valid_video"] = false;
  }
    
  if (strlen($video_name) < 1 || strlen($video_topic) < 1) {
    $_SESSION["valid_video"] = false;
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
  
  $conn = new Connection($heroku);
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
