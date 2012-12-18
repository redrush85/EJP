<?php global $conf, $user; if (isset($member) && !empty($member)): ?>
<h1 class="rubrika"><a href=""></a><a href="/members">Members</a> / <a href="/members#<?php print $member->profile_country; ?>"><?php print $member->profile_country; ?></a> <?php if ($user->uid ==1 ) print  " / <a href='/user/".$member->uid."/edit'>Edit Profile</a>" . " / <a href='/user/".$member->uid."/edit/Info'>Edit CV</a>";?></h1>
<div class="teaser content membersblog">
<?php if (strpos(request_uri(), "page")==0): ?>
	<?php //if ($member->picture) print '<img src="/' . $member->picture .'"/>'; else print '<img src="/'. $conf['theme_ejp_theme_settings']['user_picture_default'] . '"/>';?>
	<?php if ($member->picture) print theme('imagecache', 'member_picture', $member->picture); ?>

  <?php endif; ?>
<h2><?php print $member->profile_first_name; ?> <?php print $member->profile_last_name; ?></h2>
<?php if (strpos(request_uri(), "page")==0):?>
		<?php print $member->profile_cv_short; ?>
    <a href="/member/<?php print $member->uid; ?>/cv">Read more</a>
<?php endif; ?>
</div>
<?php else: ?>
 <?php print t('Member not found'); ?>
<?php endif; ?>

<hr>

 <g:plusone  size="medium"></g:plusone> <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<iframe id="iframe_like" name="fbLikeIFrame_0" class="social-iframe" scrolling="no" frameborder="0" src="http://www.facebook.com/widgets/like.php?width=250&amp;show_faces=false&amp;layout=button_count&amp;colorscheme=light&amp;href=<?php $curr_url = check_plain("http://" .$_SERVER['HTTP_HOST'] .request_uri()); echo $curr_url; ?>" width="250" height="21"></iframe>
<span class="buttonsmall right"><a href="#contact">Contact Me</a></span>
