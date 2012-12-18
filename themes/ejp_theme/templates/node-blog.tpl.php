<?php $member = user_load(array('uid' => $node->uid)); ?>
<h1 class="rubrika">

	<a href="/members">Members</a> /
	<a href="/member/<?php print $node->uid; ?>">Blog</a> /
	<a href="/member/<?php print $node->uid; ?>"><?php print $member->profile_first_name .' '.$member->profile_last_name ?></a>

</h1>

<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

  <!-- <span class="submitted">Post on <?php print format_date($node->changed, 'small'); ?></span> -->

<div class="teaser content">
<h2><?php print $title ?></h2>
<?php if ($page == 0): ?><h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2><?php endif; ?>
<?php print $body ?>
<span class="buttonsmall"><a href="/member/<?php print $node->uid; ?>">Back</a></span>
<hr>
 <g:plusone  size="medium"></g:plusone> <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
  <iframe id="iframe_like" name="fbLikeIFrame_0" class="social-iframe" scrolling="no" frameborder="0" src="http://www.facebook.com/widgets/like.php?width=250&amp;show_faces=false&amp;layout=button_count&amp;colorscheme=light&amp;href=<?php $curr_url = check_plain("http://" .$_SERVER['HTTP_HOST'] .request_uri()); echo $curr_url; ?>" width="250" height="21"></iframe>
<p><span class="buttonsmall right"><a href="/member/<?php print $node->uid; ?>/#contact">Contact Me</a></span></p>
</div>
  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms">Tags: <?php print str_replace("tags/", "blogtags/", $terms); ?></div>
    <?php endif;?>
    </div>

    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>

</div>
