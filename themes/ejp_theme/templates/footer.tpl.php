
 <div id="footer_bg"><div class="shadow"></div>
		<div id="footer">
		

<div class="blockbig">

<div class="blocksmallf2">

<img style="float:left; margin-top:10px; padding:0 20px 80px;" src="http://ejp.eu/sites/default/themes/ejp_theme/img/logosmall.png" width="46" height="30" border="0" alt="ejp">
223 Rue de la Loi 1040 Brussels Belgium<br>
Tel: +32 2 588 00 89 Fax: +32 2 791 95 50<br>
<a href="mailto:info@eju.org">info@eju.org</a>
<br><br><div class="copy">&copy; 2012 EJP, All Rights Reserved</div>

</div>  


</div>

<div class="blocksmallf">

<div class="login">



<?php global $conf; ?>

    <div id="<?php if (!$logged_in) { print 'login'; } else print 'logout'; ?>" class="alignLeft">
			<?php print $register_tabs_left; ?>
			<?php print $register_tabs_right; ?>
    </div>
    <?php if (!$logged_in) : ?>

<?php else : ?>
<?php global $user; ?>
<?php endif; ?>

<!-- <a href="<?php print $conf['ejp_site']; ?>"> -->

<?php // print t($site_name); ?>
</div>


<!-- <img src="http://ejp.eu/sites/default/themes/ejp_theme/img/eju.png" width="172" height="73" border="0" alt=""> --></div>


		</div>
</div>

