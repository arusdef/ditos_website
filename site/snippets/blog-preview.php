<?php $items = $pages->find('blog')->children()->limit(3); ?>
<div class="blog__preview left">
  <?php foreach($items as $item): ?>
    <a href="<?php echo $item->url() ?>" class="article__preview">
      <article>
        <header>  
          <h3><?php echo $item->title() ?></h3>
          <p><?php echo $item->introsentence() ?></p>
        </header>
        <div class="bg" style="background-image: url(<?php echo $item->contentURL() ?>/<?php echo $item->postimage() ?>)"></div>
      </article>
    </a>
  <?php endforeach ?>
</div>