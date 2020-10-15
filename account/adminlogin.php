<?php
session_start();
$selected_page = "admin_login";
if (!empty($_POST)) {
  $admin_login = $_POST["admin_login"];
  $admin_password = $_POST["admin_password"];
  $admin_encryption_key = $_POST["admin_key"];

  if ($admin_login == "jaredrackley@dmin" && $admin_password == "jaredistheroot123" && $admin_encryption_key == "8d9ca0bdbc4ab6bc180d0fc3e6e21711892708cdb260c16ffb4a6923a06fbfd6") {
    $_SESSION["admin_logged_in"] = true;
  }
}

?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="account.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <title id="home">Login | Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> <?php require_once "../structure/structure.php"; ?> <div class="main">
    <div class="content">
      <h2 class="login">Admin Login:</h3>
        <form class="credentials" method="post">
          <?php if (isset($_SESSION["error_message"])) { ?>
            <span class="error"> <?php echo ($_SESSION["error_message"]); ?> </span>
          <?php } ?>
          <div class="username">
            <input class="input" name="admin_login" type="text" id="name" placeholder="Admin Login">
          </div>
          <div class="password">
            <input class="input" name="admin_password" type="password" id="passwd" placeholder="Admin Password">
          </div>
          <div class="encryption-key">
            <input class="input" name="admin_key" type="password" id="key" placeholder="Admin Encryption Key">
          </div>
          <input type="submit" value="Submit" />
        </form>
    </div>
  </div>
</body> <?php require_once "../structure/footer.php"; ?>

</html>