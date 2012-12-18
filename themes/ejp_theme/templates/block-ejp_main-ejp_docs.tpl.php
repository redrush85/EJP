<?php if (isset($content) && !empty($content)): ?> 
<div class="blocksmall">
<h1 class="rubrika"><?php print l(t('Documents'), 'documents'); ?></h1>
		<?php foreach ($content as $id => $news_item): ?>
<?php print l($news_item->title, $news_item->path); ?><hr>
		<?php endforeach; ?>
</div>
<?php endif; ?>
