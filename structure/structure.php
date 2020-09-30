<div class="structure">
  <div class="menu">
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
    </ul>
    <ul class="footer">
      <li>
        <a <?php if ($selected_page == "feedback") echo "class='active';"; ?> href="/feedback/feedback.php">
          <i class="fas fa-comment-alt"></i>
          Feedback
        </a>
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
    </ul>
  </div>
  <div class="title">
    <h1>Programming Playlists</h1>
    <h4>A tool to help developers learn new topics.</h4>
  </div>
</div>