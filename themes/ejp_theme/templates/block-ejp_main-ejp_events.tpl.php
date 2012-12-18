<?php if (isset($content) && !empty($content)): $cnt = 0;?> 
<div class="blocksmall">
<h1 class="rubrika"><?php print l(t('EJP Events'), 'events'); ?></h1>
		<?php foreach ($content as $id => $news_item): ?>
			<?php if ($cnt == -1) : ?>
<img src="/<?php print $news_item->field_event_image[0]['filepath']; ?>"/><h3><?php print l($news_item->title, $news_item->path); ?></h3>
			<?php else: ?>
				
				<img src="/<?php print $news_item->field_event_image[0]['filepath']; ?>"/>
				<h3><?php print l($news_item->title, $news_item->path); ?></h3><hr>

			<?php endif; ?>
			<?php $cnt++; ?>
		<?php endforeach; ?>
		<a class="ejp-banner" href="http://jn1.tv/">
		<?php print theme('image', drupal_get_path('theme', 'ejp_theme') . '/img/jn.jpg'); ?> 		
		</a>
    </div>
<?php endif; ?>