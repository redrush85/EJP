<?php global $user, $conf; $member = user_load(array('uid' => $user->uid)); dsm($member);?>

	<?php print $member->picture ?>
    <?php print $member->profile_first_name . ' ' . $member->profile_last_name; ?>
    <?php print $member->profile_cv; ?>

	<?php if ($user->uid == $account->uid) : ?><span class="edit-profile"><?php print l(t('Edit Profile'), 'user/' . $account->uid . '/edit'); ?></span><?php endif; ?>
	

     
