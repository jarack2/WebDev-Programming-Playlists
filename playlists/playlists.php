<?php
session_start();
$selected_page = "playlists"
?>
<html>

<head>
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="playlists.css">
  <title id="home">Programming Playlists</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php require_once "../structure/structure.php"; ?>
  <div class="main">
    <!-- These will be dynamically generated but for now, they are hardcoded in -->
    <h3 class="selectedplaylist">The Selected Playlist is: C#</h3>
    <!-- Hope you like C# -->

    <div class="videos">
      <?php for ($x = 0; $x < 6; $x++) { ?>
        <span class="video-container">
          <i id="favorites" class="fa fa-heart"></i>
          <iframe class="videos" src="https://www.youtube.com/embed/GhQdlIFylQ8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </span>
      <?php } ?>
    </div>


  </div>
</body>
<?php require_once "../structure/footer.php"; ?>

</html>