<?php

$heroku = false;

if (!empty($_POST)) { // creates user if form submitted
  $video_name = $_POST["video_name"];
  $video_link = $_POST["video_link"];
  $video_topic = $_POST["video_topic"];
  $conn = new Connection($heroku);
  if ($conn->add_video($video_name, $video_link,  $video_topic)) {
    $_SESSION["success"] = "Successfully added video " . $video_name;
  }

  if ($heroku) {
    header("Location:https://programmingplaylists.herokuapp.com/add/add.php");
  } else {
    header("Location:http://cs401fp/add/add.php");
  }
  exit();
}
