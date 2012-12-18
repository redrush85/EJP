<div class="header">
<div class="headerin">
<div class="logo"><a href="/"><img src="/<?php print drupal_get_path('theme', 'ejp_theme'); ?>/img/logo3.png" width="437" height="160" border="0" alt="EJP.EU"></a></div>


<div class="dat">

<?php 
	/*$str = jdtojewish(gregoriantojd( date('m'), date('d'), date('Y')), false, CAL_JEWISH_ADD_GERESHAYIM + CAL_JEWISH_ADD_ALAFIM + CAL_JEWISH_ADD_ALAFIM_GERESH); 
	$str1 = iconv ('WINDOWS-1255', 'UTF-8', $str);
	print date("d M Y");
	print "  (".$str1.")";*/
		$daystamp = $datenow = gmmktime(0,0,0,date("n"),date("j"),date("Y"));
		$result .= date('D',$daystamp).', '.date('d',$daystamp).' '.date('M',$daystamp).' / ';
		$gregorianMonth = date('n',$daystamp);
		$gregorianDay = date('j',$daystamp);
		$gregorianYear = date('Y',$daystamp);
		$jdDate = gregoriantojd($gregorianMonth,$gregorianDay,$gregorianYear);
		$hebrewMonthName = jdmonthname($jdDate,4);
		$hebrewMonthName == 'AdarI' ? $hebrewMonthName = 'Adar I' : '';
		$hebrewMonthName == 'AdarII' ?  $hebrewMonthName = 'Adar II' : '';
		$hebrewDate = jdtojewish($jdDate);
		list($hebrewMonth, $hebrewDay, $hebrewYear) = split('/',$hebrewDate); 
		$result .= $hebrewDay.' '.$hebrewMonthName.' '.$hebrewYear.'</div>';
		print $result;
?>
</div>

</div>
</div>

<div class="headers"><div class="shadow"></div><div class="headersin"><?php if (!drupal_is_front_page()) print "<div class=noindex>"; ?>
  <a href="/" <?php if (drupal_is_front_page()) print "class=active" ?>>Main</a>
  <a href="/news" <?php if (stristr(request_uri(), "/news")) print "class=active" ?>>News</a>
  <a href="/members" <?php if (stristr(request_uri(), "/member")) print "class=active" ?>>Members</a>
  <a href="/events" <?php if (stristr(request_uri(), "/event")) print "class=active" ?>>Events</a>
  <a href="/documents" <?php if (stristr(request_uri(), "/document")) print "class=active" ?>>Documents</a>
  <a href="/feedback" <?php if (request_uri()=="/feedback") print "class=active" ?>>Contact Us</a>
<?php //foreach($main_menu_links as $menu_link): ?>
<?php //print l($menu_link['title'], $menu_link['href']); ?>
<?php //endforeach; ?>
</div></div></div>
