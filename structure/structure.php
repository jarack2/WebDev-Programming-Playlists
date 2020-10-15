<div class="structure">
  <i class="fas fa-bars" onclick="togglemenu()"></i>

  <div id="menu">
    <i class="far fa-window-close" id="closer" onclick="togglemenu()"></i>
    <h3 class="navtitle">Programming Playlists</h3>
    <ul>
      <li>
        <a <?php if ($selected_page == "home") echo "class='active';"; ?> href="/">
          <i class="fas fa-home"></i>
          Home
        </a>
      </li>
      <li>
        <a <?php if ($selected_page == "playlists") echo "class='active';"; ?> href="/playlists/playlists.php">
          <i class="fas fa-play-circle"></i>
          Playlists
        </a>
      </li>
      <li>
        <a <?php if ($selected_page == "about") echo "class='active';"; ?> href="/about/about.php">
          <i class="fas fa-info-circle"></i>
          About
        </a>
      </li>
      <?php if ($_SESSION["admin_logged_in"]) { ?>
        <li>
          <a <?php if ($selected_page == "add") echo "class='active';"; ?> href="/add/add.php">
            <i class="fas fa-plus-square"></i>&nbsp;
            Add
          </a>
        </li>
      <?php } ?>
    </ul>
    <ul class="footer">
      </li>
      <li>
        <a <?php if ($selected_page == "signup") echo "class='active';"; ?> href="/account/signup.php">
          <i class="fas fa-user-plus"></i>
          Sign Up
        </a>
      <li>
        <a <?php if ($selected_page == "login") echo "class='active';"; ?> href="/account/login.php">
          <i class="fas fa-sign-in-alt"></i>
          Login
        </a>
      </li>
      <li>
        <a <?php if ($selected_page == "feedback") echo "class='active';"; ?> href="/feedback/feedback.php">
          <i class="fas fa-comment-alt"></i>
          Feedback
        </a>
    </ul>
  </div>
  <div class="title">
    <h1>Programming Playlists</h1>
    <h4>A tool to help developers learn new topics.</h4>
  </div>
</div>

<script>
  function togglemenu() {
    menu = document.getElementById('menu');
    closer = document.getElementById('closer');
    if (menu.style.visibility === 'visible') {
      menu.style.removeProperty('visibility'); // needs to remove the property to reset after the window resize
      closer.style.display = 'none'; // stays hidden after window resize
    } else {
      menu.style.visibility = 'visible';
      closer.style.display = 'unset';
    }
  }
</script>