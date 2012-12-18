<?php global $user; ?>
<div class="blog_page_label"><h1><b><?php print $title; ?></b></h1></div>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">



<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>


  <div class="content clear-block">
    <h2><?php print $node->field_committee_description[0]['value']; ?></h2>
  </div>

  <?php foreach ($node->field_committee_users as $com_user):
    $u = user_load(array('uid' => $com_user['uid']));
    //dsm($user);
  ?>
  <a href="/member/<?php print $u->uid?>"><?php print $u->profile_first_name . ' ' . $u->profile_last_name . ' (' . $u->profile_country . ')' ?></a><br>
  <?php endforeach; ?>

  <?php if ($user->uid > 0): ?>
   <div class="login">
    <a href="/email/<?php print $node->nid; ?>">Write Email to Committee's members</a>
   </div>
  <?php endif; ?>
</div>
