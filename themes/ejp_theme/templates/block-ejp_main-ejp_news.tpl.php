<?php if (isset($content) && !empty($content)): $cnt = 0;?> 
<div class="blockbig">
<h1 class="rubrika"><a href=""><?php print l(t('News'), 'news'); ?></a></h1>
<div class="blockmain"><?php foreach ($content as $id => $news_item): ?><?php if ($cnt == 0) : ?>
<div class="teaser"><img src="/<?php print $news_item->field_image[0]['filepath']; ?>"/><h2><?php $views_exist ? print l(views_trim_text($alter_title_small, $news_item->title), $news_item->path) : print l($news_item->title, $news_item->path); ?></h2><?php $views_exist ? print views_trim_text($alter_main, $news_item->field_teaser[0]['value']) : print  $news_item->field_teaser[0]['value']; ?></div>

<?php else: ?><div class="newssmall"><img src="<?php print $news_item->field_image[0]['filepath']; ?>"/>
<h3><?php $views_exist ? print l(views_trim_text($alter_title_small, $news_item->title), $news_item->path) : print l($news_item->title, $news_item->path); ?></h3>
</div>
<?php endif; ?>
<?php $cnt++; ?>
<?php endforeach; ?>
</div></div>
<?php endif; ?>

