<?php $selected_page = "signup" ?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Signup | Programming Playlists</title>
</head>

<body> <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="signup"> Create an Account:</h3>
        <form action="/index.php" method="get" class="credentials">
          <div class="email">
            <span> Enter Your Email </span>&nbsp; <input class="input" type="text" name="email" id="email"
              placeholder="Email">
          </div>
          <div class="username">
            <span>Create a Username</span>
            <input class="input" type="text" name="username" id="name" placeholder="Username">
          </div>
          <div class="password">
            <span>Create a Password</span>&nbsp; <input class="input" type="password" placeholder="Password">
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>