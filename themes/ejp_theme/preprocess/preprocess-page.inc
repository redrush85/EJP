<?php
  define('NEWS_CAT', 2);
  global $conf, $user, $region;
  
  if ($index = array_search(preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-_]+!s', '', 'page-'. drupal_strtolower(arg( 0))), $vars['classes_array'])) {
    unset($vars['classes_array'][$index]);
  }
  if((isset($vars['sidebar_right']) && !empty($vars['sidebar_right'])) && (isset($vars['sidebar_left']) && !empty($vars['sidebar_left']))) {
    $vars['center_class'] = 'center_lr';
	$vars['left_class'] = 'left_lr';
    $vars['right_class'] = 'right_lr';
  }
  elseif(isset($vars['sidebar_left']) && !empty($vars['sidebar_left'])) {
    //$vars['center_class'] = 'base_c';
	$vars['left_class'] = 'base_l';
    $vars['right_class'] = 'right_cl';		
  }
  elseif(isset($vars['sidebar_right']) && !empty($vars['sidebar_right'])) {
    $vars['center_class'] = 'center_cr';
	$vars['left_class'] = 'left_cr';
    $vars['right_class'] = 'right_cr';	
  }
  elseif((isset($vars['sidebar_right']) && empty($vars['sidebar_right'])) && (isset($vars['sidebar_left']) && empty($vars['sidebar_left']))) {
    $vars['center_class'] = 'center_empt';
	$vars['left_class'] = 'left_empt';
    $vars['right_class'] = 'right_empt';
  }
    
  //get url's
  $arg  = arg(0);  
  $arg1 = arg(1);  
  $arg2 = arg(2);  
  $arg3 = arg(3);
  //echo "<pre>"; print_r($vars); echo "</pre>";
  switch ($arg) {
    case 'front':
      $css_file = '/css/tab_slidedown.css'; 
	  $base_css_path = drupal_get_path('theme', 'ejp_theme');
	  drupal_add_css(drupal_get_path('theme', 'ejp_theme') . '/css/tab_slidedown.css', 'theme');
	  drupal_add_js(drupal_get_path('theme', 'ejp_theme') . '/js/select_box.js', 'theme');
	break;
    case 'node':
		$navigation_path = "news";
		if (!empty($navigation_path)) {
			$route = menu_get_item($navigation_path);
			if (!empty($route)) {
			  //die("dfgdfg");
				menu_set_item(NULL, $route);
			}
		}
	break;
    case 'user':
	  $css_file = '/css/ecjc_profile.css';
	  $base_css_path = drupal_get_path('theme', 'ejp_theme');

	break;
    case 'users':
	  $css_file = '/css/ecjc_profile.css';
	  $base_css_path = drupal_get_path('theme', 'ejp_theme');
	break;
  }
  drupal_add_css($base_css_path . $css_file, 'theme', 'screen, projection', 1);

  if (!$vars['logged_in']) {
    drupal_add_js(drupal_get_path('theme', 'ejp_theme') . '/js/anonym.js', 'theme');
    $register_tabs_left = l(t('Sign-in'), $conf['ejp_site'] . 'user', array('external' => TRUE));
    //$register_tabs_right = l(t('Registration'), $conf['ejp_site'] . 'user/register', array('external' => TRUE));
  }
  else {
    $register_tabs_left  = l(t('Logout'), 'logout', array('attributes' => array('title' => t('Logout'))));
    $register_tabs_right = l(t('My Profile'), $conf['ejp_site'] .'member/' . $user->uid, array('attributes' => array('title' => t('My Profile'))));
    $register_tabs_right .= l(t('Settings'), $conf['ejp_site'] .'user/' . $user->uid . '/edit', array('attributes' => array('title' => t('Settings'))));

	$register_tabs_right .= l(t('Post Blog'), $conf['ejp_site'] .'node/add/blog/', array('attributes' => array('title' => t('Post Blog entry'))));
  }
  //set language select	
  $vars['lang_select']  = _ecjc_main_people_get_all_lang();
  $title = t('European Council of Jewish Communities');
  $vars['u_account'] = user_load(array('uid' => $vars['user']->uid)); 
  $vars['main_url'] = theme_get_setting('main_url', $refresh = FALSE);
  drupal_is_front_page() ? $vars['head_title'] = t('Main') . ' | EJP.eu' : $vars['head_title'] = $vars['title'] . ' | EJP.eu';
  !drupal_is_front_page() ? $vars['footer_prefix'] = "_s" : '';
  $vars['logo_img'] = theme('image', drupal_get_path('theme', 'ejp_theme') . '/images/base/logo.png', $title, $title, array('width' => '135', 'height' => '101'));
  $vars['linked_logo_img']  = $vars['logo_img'] ? l($vars['logo_img'], '<front>', array('attributes' => array('rel' => 'home', 'title' => $title), 'html' => TRUE)) : '';
  $vars['linked_site_name'] = $vars['site_name'] ? l($vars['site_name'], '<front>', array('rel' => 'home', 'title' => t('Home'))) : '';
  $vars['small_logo_img'] = theme('image', drupal_get_path('theme', 'ejp_theme') . '/images/logo_news.png', $title, $title, array('width' => '67', 'height' => '34'));
  $vars['small_linked_logo_img']  = $vars['small_logo_img'] ? l($vars['small_logo_img'], '<front>', array('attributes' => array('rel' => 'home', 'title' => $title), 'html' => TRUE)) : '';
  $vars['all_services'] = theme('site_map');
  $vars['header'] = theme('header', array(
    'front_page' => $vars['is_front'],
    'site_name' => $vars['site_name'],
    'logo' => $vars['logo'],
    'main_menu_links' => $vars['primary_links'],	
    'search_box' => $vars['search_box'],
    'header_block' => $vars['header_block'],
    'linked_logo_img' => $vars['linked_logo_img'],
    'small_linked_logo_img' => $vars['small_linked_logo_img'],
    'register_tabs_left'  => $register_tabs_left,
    'register_tabs_right' => $register_tabs_right,
    'lang_select' => $vars['lang_select'],
    'mission' => $vars['mission'],
    'categories' => $vars['categories'],
    'arg' => $arg,
	'u_account' => $vars['u_account'],
	'conf' => $conf,
	'my_sub_count' => _get_my_sub_count(),
	'uid' => $vars['user']->uid,
	
  ));
  $vars['navigate_menu'] = theme('menu_links', menu_navigation_links("menu-navigate"), array('class' => 'links navigate-menu'));
  $vars['other_menu'] = theme('menu_links', menu_navigation_links("menu-other"), array('class' => 'links other-menu'));
  $vars['footer'] = theme('footer', array(
	'conf' => $conf,
	'register_tabs_left'  => $register_tabs_left,
    'register_tabs_right' => $register_tabs_right,
	'base_site' => $conf['base_site'],
    'front_page' => $vars['is_front'],
    'footer_top' => $vars['footer_top'],
    'footer_bottom' => $vars['footer_bottom'],
    'navigate_menu' => $vars['navigate_menu'],
    'other_menu' => $vars['other_menu'],	
	'footer_prefix' => $vars['footer_prefix'],

  ));
	
  
  if (!$vars['is_front']) {
    $vars['classes_array'][] = drupal_html_class('page-' . $path);
    list($section, ) = explode('/', $path, 2);
    if (arg( 0) == 'node') {
        if ($arg1 == 'add') {
            $section = 'node-add';
        }
        elseif (is_numeric($arg1) && ($arg2 == 'edit' || $arg2 == 'delete')) {
            $section = 'node-' . $arg2;
        }
    }
    $vars['classes_array'][] = drupal_html_class('section-' . $section);
  }
  if (module_exists('profileplus')) {
    _removetab('Users', $vars);
  }
  
  function _removetab($label, &$vars) {
    $tabs = explode("\n", $vars['tabs']);
    $vars['tabs'] = '';
    foreach($tabs as $tab) {
      if(strpos($tab, '>' . $label . '<') === FALSE) {
        $vars['tabs'] .= $tab . "\n";
      }
    }
  }
  $vars['copyright'] = t('© 2012 EJP, All Rights Reserved');  
  
  
  if ($arg == 'user' && $arg2 == 'edit') $vars['tabs'] = '<ul class="tabs primary">'. menu_local_tasks() .'</ul>';
  //dsm(popular_tags());
  $css = drupal_add_css();
  // Apply that array to the $styles string to be printed in the <head> section of page.tpl.php
  $vars['styles'] = drupal_get_css($css);
  $vars['head'] = drupal_get_html_head();
  function _get_my_sub_count() {
	$names = array('person');
	global $user;
	$uid = $user->uid;
	$count = db_result(db_query("SELECT COUNT(nid) FROM {node} WHERE uid = %d AND status = 1 AND type IN ('wikiperson')", $uid));
	return $count;
  }
  
  
  
  //dsm($vars);