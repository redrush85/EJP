<?php
// $Id:
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $scripts; ?>
	<script>
</script>
  </head>
<body>
<?php print $header; ?><div class="shadow"></div>
<?php print $sidebar_left; ?>
<?php print $messages; ?>



<?php if (drupal_is_front_page()) :?>
	<div class="block"><?php print $content_top; ?></div>
	<div class="shadow"></div>
	<div class="block"><?php print $content_bottom; ?></div>


<?php else: ?>
	<div class="block">
		<div class="blockbig"><?php print $tabs; ?><?php print $content; ?></div>
		<div class="blocksmall"><?php print $sidebar_right; ?></div>
	</div>
<?php endif; ?>	



<?php print $footer_top; ?>
<?php print $footer; ?>
<?php print $closure; ?>
</body>
</html>