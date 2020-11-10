<?php
function get_topics($filepath)
{
  $arr = array();

  $dir = new DirectoryIterator(dirname($filepath . "*"));
  foreach ($dir as $s_topic) {
    if ($s_topic->getFilename() != '.' && $s_topic->getFilename() != '..')
      $arr[$s_topic->getFilename()] =  "$filepath" . $s_topic->getFilename();
  }
  return $arr;
}

?>

<?php function cardrow($arr, $name){ ?> 
<div class="row">
    <h3 class="topic"><?= $name ?></h3> 
    <?php foreach ($arr as $arr_name => $arr_path) : 
      $topic = basename($arr_name, ".png");
    ?>
    <div class="column">
      <a class="card" data-value="<?= $topic ?>">
        <form action="playlists/playlists.php" class="card-form-<?= $topic ?>" method="get">
          <input type="hidden" name="topic" value="<?= $topic ?>" />
          <img src="<?= $arr_path; ?>" alt="<?= $arr_name ?>">
          <p class="topic-name"><?= $topic ?></p>
        </form>
      </a>
    </div> 
    <?php endforeach ?>
  </div>
<?php } ?>

<?php

$languages = get_topics("assets/languages/");
$algorithms = get_topics("assets/algorithms/");
$concepts = get_topics("assets/concepts/");


cardrow($languages, "Languages");
cardrow($algorithms, "Algorithms");
cardrow($concepts, "Concepts");
?>
<script>
  $('.card').click(function() {
    const topicname = ".card-form-" + $(this).data("value");
    $(topicname).submit();
  });
</script>