<footer class="footer">
  <p class="footer-text">Programming Playlists 2020</p>
  <?php if (!$_SESSION["admin_authenticated"]) { // doesnt display if they are already logged in as admin?> 
  <a id="admin-login-text" <?php if ($selected_page == "admin_login") echo "class='active';"; ?> href="/account/admin_login.php">
    Admin Login
  </a>
  <?php } ?>
</footer>