<?php global $conf; ?>
<div id="header_t">
  <div id="header_t_l">
    <div class="lang_title alignRight"><?php //print t('LANGUAGE:'); ?></div>
  </div>
  <div id="header_t_c">
    <span class="lang alignLeft"><?php //print $lang_select; ?></span>
  </div>
  <div id="header_t_r">
    <div id="<?php if (!$logged_in) { print 'login'; } else print 'logout'; ?>" class="alignLeft">
			<?php print $register_tabs_left; ?>
			<?php print $register_tabs_right; ?>
    </div>
    <?php if (!$logged_in) : ?>
      <div id="connect" class="alignRight">
     
      </div>
    <?php else : ?>
      <span class="user-name"><?php global $user; ?></span>
    <?php endif; ?>
  </div>
  <div class="clearFloat"></div>
</div><!-- #header_top-->
  <div id="header_m_bg">
    <div id="header_m">
      <div id="header_m_l">
        <div id="logo_box">
				<a href="<?php print $conf['ejp_site']; ?>">
					<div id="logo">
						<img width="294" alt="European Jewish Union" height="125" src="/<?php print drupal_get_path('theme', 'ejp_theme') . '/'?>images/eju_logo_insmain.png" alt="European Jewish Union">
					</div>
					<div class="logo_stroke"></div>
					<div class="ECJC-Base"><?php print t($site_name);; ?></div>
				</a>	
        </div>    
		
        <?php foreach($main_menu_links as $menu_link): ?>
			<div class="menu-primary-link"><?php print l($menu_link['title'], $menu_link['href']); ?></div>
		<?php endforeach; ?>
      </div>
      <div id="header_m_r" class="tabContainer">
        <div>
          <div class="tab_content">
            <p class="tab_title">EJU Blogs/Sign-in and create an article</p>
            <div class="ECJC_rt">
				Bios of famous historical personalities, Jewish movement activists, prominent figures of science, art, education, philosophers and journalists, artists and composers, public leaders and politicians.
            </div>
				<a href="#" class="blog_start_btn" title="Some button">
					<span class="bs_bnt_title">Want to Start?</span>
					<span class="bs_bnt_desc">See more</span>
				</a>
          </div>
          <?php //print drupal_get_form('ecjc_base_theme_adv_search_form'); ?>
	      </div>                    
      </div>
      <div class="clearFloat"></div>
    </div><!-- #header_middle-->
  </div>
