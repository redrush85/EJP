<?php if ( arg(0) == 'node' && is_numeric(arg(1)) && ! arg(2) ) {
  $node = node_load(arg(1));
}
?>
<?php if (isset($content) && !empty($content) && !drupal_is_front_page() && $node->type != "news" && !in_array(request_uri(), array('/news', '/user'))): ?> 
<h1 class="rubrika"><a href=""><?php print l(t('News'), 'news'); ?></a></h1>
		<?php foreach ($content as $id => $news_item): ?>
				
				<img src="/<?php print $news_item->field_image[0]['filepath']; ?>"/>
				<h3><?php print l($news_item->title, $news_item->path); ?></h3><hr>
		<?php endforeach; ?>
<div class="pad"></div>
<?php endif; ?>

