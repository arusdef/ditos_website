<?php

$index = $site->children()->visible();

$page = param('page');
$directory = "";
foreach ($index as $child) {
  if ($child->isOpen() || (string)$child === $page) $directory = $child;
}

$scope = strlen($directory) > 0
  ? $index->find($directory)
  : $index->children();

$results = $scope
  ->search(param('query'), array('words' => true))
  ->visible();
?>

<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php if(count($results)) : ?>
      <ul class="search__results">
        <?php foreach($results as $result): ?>
          <a href="<?php echo $result->url() ?>" class="result">
            <h2><?php echo $result->title()->html() ?></h2>
            <p><?php echo $result->description()->kirbytext() ?></p>
          </a>
        <?php endforeach ?>
      </ul>
      <?php else : ?>
      <section class="no__results">
        <h1 class="gamma">We couldn&rsquo;t find any results, maybe try another search keyword. You can try searching again.</h1>

      </section>
      <?php endif ?>
    </section>
    <aside>
      <?php snippet('search-filters') ?>
    </aside>
  </div>
</main>
<?php snippet('footer') ?>
