<head>
  <link rel="stylesheet" href="media/homeselectors.css">
</head>
<?php

$languages = array();
$algorithms = array();
$concepts = array();

$dir = new DirectoryIterator(dirname("./assets/languages/*"));
foreach ($dir as $s_lang) {
  if ($s_lang->getFilename() != '.' && $s_lang->getFilename() != '..')
    $languages[$s_lang->getFilename()] =  "assets/languages/" . $s_lang->getFilename();
}

$dir2 = new DirectoryIterator(dirname("./assets/algorithms/*"));
foreach ($dir2 as $s_algo) {
  if ($s_algo->getFilename() != '.' && $s_algo->getFilename() != '..')
    $algorithms[$s_algo->getFilename()] = "assets/concepts/" . $s_algo->getFilename();
}

$dir3 = new DirectoryIterator(dirname("./assets/concepts/*"));
foreach ($dir3 as $s_conc) {
  if ($s_conc->getFilename() != '.' && $s_conc->getFilename() != '..')
    $concepts[$s_conc->getFilename()] = "assets/" . $s_conc->getFilename();
}

?>

<div class="row">
  <h3 class="topic">Languages</h3>
  <?php foreach ($languages as $lang_name => $lang_path) : ?>
  <div class="column">
    <div class="card">
      <img src="<?php echo $lang_path; ?>" alt="<?= $lang_name ?>">
      <p><?php$lang_name?></p>
    </div>
  </div>
  <?php endforeach ?>
</div>

<div class="row">
  <h3 class="topic">Algorithms</h3>
  <?php foreach ($algorithms as $algo_name => $algo_path) : ?> <div class="column">
    <div class="card">
      <img src="<?php echo $algo_path; ?>" alt="<?= $algo_name ?>">
      <p><?php$algo_name?></p>
    </div>
  </div>
  <?php endforeach ?>
</div>

<div class="row">
  <h3 class="topic">Concepts</h3>
  <?php foreach ($concepts as $conc_name => $conc_path) : ?> <div class="column">
    <div class="card">
      <img src="<?php echo $conc_path; ?>" alt="<?= $conc_name ?>">
      <p><?php$conc_name?></p>
    </div>
  </div>
  <?php endforeach ?>
</div>