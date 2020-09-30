<?php $selected_page = "playlists" ?>
<html>

<head>
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="playlists/playlists.css">
  <title id="home">Programming Playlists</title>
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <!-- These will be dynamically generated but for now, they are hardcoded in -->
    <h3 class="selectedplaylist">The Selected Playlist is: C#</h3>
    <?php for ($x = 0; $x <= 3; $x++) { ?>
    <div class="videos">
      <iframe class="videos" width="380" height="225" src="https://www.youtube.com/embed/GhQdlIFylQ8" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
      <iframe class="videos" width="380" height="225" src="https://www.youtube.com/embed/GhQdlIFylQ8" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
      <iframe class="videos" width="380" height="225" src="https://www.youtube.com/embed/GhQdlIFylQ8" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
    </div>
    <?php } ?>
  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>