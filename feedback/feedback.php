<?php
session_start();
$selected_page = "feedback";

if (!isset($_SESSION["feedback_not_sent"])) {
  $_SESSION["feedback_not_sent"] = false;
}

if (!isset($_SESSION["feedback_submitted"])) {
  $_SESSION["feedback_submitted"] = false;
}
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <link rel="stylesheet" type="text/css" href="feedback.css">
  <title id="home">Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <?php if ($_SESSION["feedback_submitted"]) { ?>
      <div class="success">Your feedback has been submitted! Thank you!</div>
    <?php } ?>
    <?php if ($_SESSION["feedback_not_sent"]) { ?>
      <div class="error">There was an error submitting your feedback. Please try again.</div>
    <?php } ?>
    <br>
    <div class="content">
      <form action="feedback_handler.php" method="post" id="feedback">
        <h2 class="feedback-title"><label for="feedback">Submit Your Feedback Here!</label></h2>
        <textarea id="feedback" name="feedback" cols="75" rows="10"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>