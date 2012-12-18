<?php if ( arg(0) == 'node' && is_numeric(arg(1)) && ! arg(2) ) {
  $node = node_load(arg(1));
}
?>
<?php if (isset($content) && !empty($content) && !drupal_is_front_page() && $node->type != "document" && !in_array(request_uri(), array('/documents', '/user'))): ?>
<h1 class="rubrika"><?php print l(t('Documents'), 'documents'); ?></h1>
		<?php foreach ($content as $id => $news_item): ?>
				<h3><?php print l($news_item->title, $news_item->path); ?></h3><hr>
		<?php endforeach; ?>
<?php endif; ?>
