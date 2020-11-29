<?php
require("sendgrid-php/sendgrid-php.php");
require("sendgrid_config.php");
session_start();
$heroku = true;
$name = "Anonymous";

if (isset($_SESSION["username"])) {
  $name = $_SESSION["username"];
}

$from = new SendGrid\Email(null, "jaredrackley@u.boisestate.edu");
$subject = "Feedback from $name";
$to = new SendGrid\Email(null, "jaredrackley@u.boisestate.edu");
$content = new SendGrid\Content("text/plain", $_POST["feedback"]);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->body();

if (isset($_POST["feedback"])) {
  if (acceptable($response)) {
    $_SESSION["feedback_submitted"] = true;
  } else {
    $_SESSION["feedback_not_sent"] = true;
  }
}

function acceptable($response)
{
  $status = $response->statusCode();
  if ($status == 200 || $status == 201 || $status == 202) {
    return true;
  }
  return false;
}

if ($heroku) {
  header("Location:https://programmingplaylists.herokuapp.com/feedback/feedback.php");
} else {
  header("Location:http://cs401fp/feedback/feedback.php");
}
