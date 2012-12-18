<div class="pad"></div>
<h1 class="rubrika">Blog<h1>
<?php if (isset($blog) && !empty($blog)): ?> 
  
  <?php foreach($blog as $item) : ?>
    
    <h2><?php print l($item->title, $item->path); ?></h2>
	   <?php //print format_date($item->changed, 'small'); ?>
<?php print strip_tags($item->field_blog_teaser[0]['value']); ?> <?php print l(t('Read more'), $item->path); ?>

<hr>
<div class="pad"></div>

  <?php endforeach; ?>
  <?php endif; ?>