<?php global $conf; if (isset($content) && !empty($content)): ?>
<div class="blockbig">
<h1 class="rubrika"><?php print l(t('Members'), 'members'); ?></h1>

<?php foreach ($content as $member): ?>
	<div class="members"><a href="/member/<?php print $member->uid; ?>">
		<?php //if ($member->users_picture) print theme('imagecache', 'avatar_main_page', $member->users_picture); else print theme('imagecache', 'avatar_main_page', $conf['theme_ejp_theme_settings']['user_picture_default']);?>
    <?php if ($member->users_picture) print '<img src="/' . $member->users_picture .'"/>'; else print '<img src="/'. $conf['theme_ejp_theme_settings']['user_picture_default'] . '"/>';?>
		<?php print $member->profile_values_profile_first_name_value; ?>
		<?php print $member->profile_values_profile_last_name_value; ?></a><br>
		<?php print $member->profile_values_profile_country_value; ?>
	</div>
<?php endforeach; ?>

</div><!-- #news_mod-->
<?php endif; ?>
