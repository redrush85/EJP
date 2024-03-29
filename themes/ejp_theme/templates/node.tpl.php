<div class="blog_page_label"><?php print $title; dsm($node); ?></div>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">



<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>


  <span class="submitted">Post on <?php print format_date($node->changed, 'small'); ?></span>

  <div class="content clear-block">
    <?php print $content ?>
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
