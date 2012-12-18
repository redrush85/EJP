<?php
// $Id: template.php,v 1.1.2.2 2009/07/08 06:25:39 voidfiles Exp $
define('TAGS_VOC',1);
define('MEGAMENU_SAVE', TRUE);
define('MEGAMENU_FILE_PREFIX', "/tmp/ecjc_megamenu_");

function ejp_theme_theme(&$existing, $type, $theme, $path) {
    static $base_themes = array();
    $base_themes[] = $theme;
 
    if ($type == 'theme') {
        foreach (array_keys($existing) as $hook) {
            if (function_exists($theme . '_preprocess')) {
                $existing[$hook]['preprocess functions'][] = $theme . '_preprocess';
            }
            if (function_exists($theme . '_preprocess_' . $hook)) {
                $existing[$hook]['preprocess functions'][] = $theme . '_preprocess_' . $hook;
            }
            foreach ($base_themes as $base_theme) {
                if (function_exists($base_theme . '_process')) {
                    $existing[$hook]['preprocess functions'][] = $base_theme . '_process';
                }
                if (function_exists($base_theme . '_process_' . $hook)) {
                    $existing[$hook]['preprocess functions'][] = $base_theme . '_process_' . $hook;
                }
            }
        }
    }
    if ($theme == 'ejp_theme') {
        return array(
            'region' => array(
                'arguments' => array('elements' => NULL),
                'path' => drupal_get_path('theme', 'ejp_theme') . '/templates',
                'template' => 'region',
                'preprocess functions' => array(
                    'template_preprocess',
                    'ejp_theme_preprocess',
                    'ejp_theme_preprocess_region',
                    'ejp_theme_process',
                ),
            ),

            'header' => array(
                'arguments' => array('elements' => NULL),
                'path' => drupal_get_path('theme', 'ejp_theme') . '/templates',
                'template' => 'header',
                'preprocess functions' => array(
                    'template_preprocess',
                    'ejp_theme_preprocess',
                    'ejp_theme_preprocess_header',
                    'ejp_theme_process',
                ),
            ),
			
            'footer' => array(
                'arguments' => array('elements' => NULL),
                'path' => drupal_get_path('theme', 'ejp_theme') . '/templates',
                'template' => 'footer',
                'preprocess functions' => array(
                    'template_preprocess',
                    'ejp_theme_preprocess',
                    'ejp_theme_preprocess_footer',
                    'ejp_theme_process',
                ),
            ),
        );
    }
    return array();
}

 

function ejp_theme_preprocess(&$vars, $hook) {
	$key = ($hook == 'page' || $hook == 'maintenance_page') ? 'body_classes' : 'classes';
    if (array_key_exists($key, $vars)) {
        if (is_string($vars[$key])) {
            $vars['classes_array'] = explode(' ', $vars[$key]);
            unset($vars[$key]);
        }
    }
    else {
        $vars['classes_array'] = array($hook);
    }
    $name = 'preprocess/preprocess-'. str_replace('_', '-', $hook) .'.inc';
    if (is_file(drupal_get_path('theme', 'ejp_theme') . '/' . $name)) {
        include($name);
    }
}

function ejp_theme_process(&$vars, $hook) {
    if (array_key_exists('classes_array', $vars)) {
        $vars['classes'] = implode(' ', $vars['classes_array']);
    }
}
 
if (!function_exists('drupal_html_class')) {
    function drupal_html_class($class) {
        $class = strtr(drupal_strtolower($class), array(' ' => '-', '_' => '-', '/' => '-', '[' => '-', ']' => ''));
 
        $class = preg_replace('/[^\x{002D}\x{0030}-\x{0039}\x{0041}-\x{005A}\x{005F}\x{0061}-\x{007A}\x{00A1}-\x{FFFF}]/u', '', $class);
 
        return $class;
    }
}
 
if (!function_exists('drupal_html_id')) {
    function drupal_html_id($id) {
        $id = strtr(drupal_strtolower($id), array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
        $id = preg_replace('/[^A-Za-z0-9\-_]/', '', $id);
        return $id;
    }
}


/**
 * Preprocessor for page.tpl.php template file.
 */
function ejp_theme_preprocess_page(&$vars, $hook) {
  // For easy printing of variables.

  // Make sure framework styles are placed above all others.
  //$vars['css_alt'] = ninesixty_css_reorder($vars['css']);
  //$vars['styles'] = drupal_get_css($vars['css_alt']);
  //dsm($vars);
  
}

function ejp_theme_breadcrumb($breadcrumb) {

  global $base_url, $conf, $user;
  $links = array();
  $path = '';
  // Get URL arguments
  $arguments = explode('/', request_uri());

  // Remove empty values
  foreach ($arguments as $key => $value) {
    if (empty($value)) {
      unset($arguments[$key]);
    }
  }
  $arguments = array_values($arguments);
  // Add 'Home' link
  //$links[] = l(t('EJP.EU'), $conf['ejp_site'], array('external' => TRUE)); 
  $links[] = l(t('EJP'), '<front>');
  $arg1 = arg(1);
  $arg2 = arg(2);
  switch ($arguments[0]) {
    // Top
    case 'news': $links[] = t('News');
		break;
    // Community
    case 'members': 
		$links[] = t('Members');
		break;
	case 'events': 
		$links[] = t('Events');
		break;
	case 'documents': 
		$links[] = t('Documents');
		break;
	case 'member': 
		$links[] = l(t('Members'), 'members');
		$profile = user_load(array('uid'=>$arguments[1]));
		$links[] = t($profile->profile_first_name.' '.$profile->profile_last_name);
		break;
  }
  if (arg(0) == 'node')
  {
    // Add new entry
    if (arg(1) == 'add') {
      $links[] = t('Create new entry');
    }
    else {
      // View node
      $node = node_load(arg(1));
      if ($node->type == 'blog'){
	    $links[] = l(t('Members'), 'members');
        $profile = user_load(array('uid'=>$node->uid));
        $links[] = l(t($profile->profile_first_name.' '.$profile->profile_last_name), 'member/' . $profile->uid);
        $links[] = $node->title;
      }
	  elseif ($node->type == 'news'){
        $links[] = l(t('News'), 'news');
        $links[] = $node->title;
      }
	  elseif ($node->type == 'event'){
        $links[] = l(t('Events'), 'events');
        $links[] = $node->title;
      }
	  elseif ($node->type == 'documents'){
        $links[] = l(t('Documents'), 'documents');
        $links[] = $node->title;
      }
	  elseif ($node->type == 'page'){
        $links[] = $node->title;
      }
    }
    
      
  }
  
  drupal_set_breadcrumb($links);
  // Get custom breadcrumbs
  $breadcrumb = drupal_get_breadcrumb();
  
  if (!empty($breadcrumb)) {
    $lastitem = sizeof($breadcrumb);
    $crumbs = '<div class="breadcrumbs">';
    $a=1;
    foreach($breadcrumb as $value) {
        if ($a!=$lastitem){
         $crumbs .= $value.' > ';
         $a++;
        }
        else {
			$pattern = "|<a.*?>(.*?)</a>|sei"; 
            preg_match($pattern, $value, $out);
			!empty($out[1]) ? $value = $out[1] : '';
			$crumbs .= '<span class="breadcrumbcurrent"><b>'.$value.'</b></span>';
        }
    }
    $crumbs .= '</div>';
	return $crumbs;
  }
  else { return 'EJP.EU'; }

}


function _ecjc_main_people_get_all_lang() {   
  global $language; $base_url;
  $output = '';
  $output .= '<div id="language_switcher_dropdown">';
  $output .= '<div id="language-select-form" style="float:left;">';
  $output .= '<form id="test" method="post">';
  $output .= '<div>';
  $output .= '<select id="language-select-list" onchange="document.location.href=this.options[this.selectedIndex].value;">';
  $languages = language_list();
  foreach ($languages as $lang) {
    if($lang->enabled){
       $lang->prefix == $language->prefix ? $selected =  ' selected="selected" ' : $selected = ' ';
       $path = url(drupal_get_path_alias($_GET['q']), array('language' => $lang));//$base_url . "/" .  $lang->prefix . "/" . drupal_get_path_alias($_GET['q']);
	   $output .= '<option' . $selected . 'value="' . $path . '">' . $lang->native . '</option>';
    }
  }
  $output .= '</select>';
  $output .= '</div>';
  $output .= '</form>';
  $output .= '</div>';
  $output .= '</div>';
  return $output;
}

