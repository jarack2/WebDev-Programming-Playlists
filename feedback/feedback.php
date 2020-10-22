<?php
session_start();
$selected_page = "feedback";
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
    <div class="content">
      <form action="feedback_handler.php" method="post">
        <h2 class="feedback-title">Submit Your Feedback Here!</h2>
        <textarea labelfor="feedback" name="Feedback" id="feedback" name="feedback" cols="75" rows="10"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>