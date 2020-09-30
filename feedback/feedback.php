<html>

<head>
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <link rel="stylesheet" type="text/css" href="feedback.css">
  <title id="home">Programming Playlists</title>
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <div class="content">
      <form action="/" method="post">
        <h2 class="feedback-title">Submit Your Feedback Here!</h2>
        <textarea name="Feedback" id="" cols="75" rows="10"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>