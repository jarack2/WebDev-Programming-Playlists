<html>

<head>
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../feedback/feedback.css">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <div class="content">
      <form action="/" method="post">
        <h3 class="feedback-title">Submit Your Feedback Here!</h3>
        <textarea name="Feedback" id="" cols="75" rows="10"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
  <?php require_once "../footer/footer.php"; ?>
</body>

</html>