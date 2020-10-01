<?php $selected_page = "login" ?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Login | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="login">Login:</h3>
        <form action="/index.php" method="get" class="credentials">
          <div class="username">
            <input class="input" type="text" name="username" id="name" placeholder="Username">
          </div>
          <div class="password">
            <input class="input" type="password" placeholder="Password">
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>