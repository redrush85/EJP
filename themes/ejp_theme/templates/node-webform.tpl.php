<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

  <!-- <span class="submitted">Post on <?php print format_date($node->changed, 'small'); ?></span> -->
 
<div class="teaser content">
<h2><?php print $title ?></h2>
<?php if ($page == 0): ?><h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2><?php endif; ?>
<?php print $body ?>
</div>


</div>