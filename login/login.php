<html>

<head>
  <link rel="stylesheet" href="../login/login.css">
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <div class="content">
      <form action="/index.php" method="get" class="credentials">
        <div class="username">
          <input class="input" type="text" name="username" id="name" placeholder="Admin Username">
        </div>
        <div class="password">
          <input class="input" type="password" placeholder="Admin Password">
        </div>
        <input type="submit" value="Submit" />
      </form>
    </div>
  </div>
  <?php require_once "../footer/footer.php"; ?>
</body>

</html>