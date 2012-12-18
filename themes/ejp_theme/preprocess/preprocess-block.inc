<?php
//dsm($vars['block']);
$block = $vars['block'];
 
// Задаем переменные $title и $content
$vars['content'] = $block->content;
$vars['title'] = $block->subject;
 
// Задаем классы
$vars['classes_array'][] = 'block-' . $block->module;
$vars['classes_array'][] = 'region-' . $vars['block_zebra'];
$vars['classes_array'][] = $vars['zebra'];
$vars['classes_array'][] = 'region-count-' . $vars['block_id'];
$vars['classes_array'][] = 'count-' . $vars['id'];
 
$vars['edit_links_array'] = array();
//dsm($block);
if ($block->delta == 'juitter') {
    $vars['twitter_name'] = variable_get('juitter_name', 'jewisheurope');
    $vars['vimp_thumbs_dir'] = variable_get('ecjc_vimp_content_vimp_thumbs_dir', 'images/thumbs');
}
    $vars['vimp_base_url'] = 'http://' . variable_get('ecjc_vimp_content_vimp_connect_url', '');
    $vars['vimp_thumbs_dir'] = variable_get('ecjc_vimp_content_vimp_thumbs_dir', 'images/thumbs');

if (($block->delta == 'vimp_video' || $block->delta == 'vimp_photo') && $block->enabled) {
	$vars['main_item_image'] = $block->content[0]['thumbnail_filename'];
	$vars['main_item_title'] = $block->content[0]['title'];
	$vars['main_item_key'] = $block->content[0]['mediakey'];
	$vars['main_item_category_id'] = $block->content[0]['cat_id'];
	$vars['main_item_id'] = $block->content[0]['mid'];
	$vars['main_item_created'] = $block->content[0]['created_at'];
	$vars['main_item_desc'] = $block->content[0]['desc'];
	$vars['main_item_category'] = $block->content[0]['category'];
	$vars['alter'] = array(
		'max_length' => 50,
		'word_boundary' => FALSE,
		'ellipsis' => TRUE,
		'html' => TRUE,
	);
	$vars['views_exist'] = module_exists('views');
  }
if ($block->delta == 'quotes') {
  $alter = array(
    'max_length' => 400,
    'word_boundary' => TRUE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
  module_exists('views') ?  $vars['quote_body'] = views_trim_text($alter, $block->content->body) : $vars['quote_body'] = $block->content->body;
  $vars['quote_author'] = $block->content->field_quote_author[0]['value'];
  $vars['quote_image_path'] = $block->content->field_quote_image[0]['filepath'];
  $vars['quote_image_alt'] = $block->content->field_quote_image[0]['data']['alt'];
  $vars['quote_image_title'] = $block->content->field_quote_image[0]['data']['title'];
}
if ($block->delta == 'main_item') {
  $vars['alter'] = array(
    'max_length' => 200,
    'word_boundary' => TRUE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );

  $vars['views_exist'] = module_exists('views');
}

if ($block->delta == 'ejp_news') {
	$vars['alter_title_bit'] = array(
    'max_length' => 200,
    'word_boundary' => FALSE,
    'ellipsis' => TRUE,
    'html' => TRUE,
	);
	$vars['alter_title_small'] = array(
    'max_length' => 65,
    'word_boundary' => FALSE,
    'ellipsis' => TRUE,
    'html' => TRUE,
	);
	$vars['alter_main'] = array(
    'max_length' => 320,
    'word_boundary' => TRUE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
	$vars['views_exist'] = module_exists('views');
}

if ($block->delta == 'main_page_news') {
  $vars['alter'] = array(
    'max_length' => 100,
    'word_boundary' => FALSE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
  $vars['alter_main'] = array(
    'max_length' => 80,
    'word_boundary' => TRUE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
  $vars['views_exist'] = module_exists('views');
  //$vars['news_items'] = ecjc_theme_get_main_news();
}
if (in_array($block->delta, array('news_page_europe', 'news_page_israel', 'news_page_world', 'news_page_events', 'news_category_sticky' ))) {
  $vars['alter_left'] = array(
    'max_length' => 200,
    'word_boundary' => FALSE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
  $vars['views_exist'] = module_exists('views');
  $term = $vars['content'][count($vars['content'])-1];
  $vars['category_name'] = l(t('Send story ideas'), 'feedback');
  unset($vars['content'][count($vars['content'])-1]);
  if($block->delta != 'news_page_events' && $block->delta != 'news_category_sticky') {
   $vars['alter_top'] = array(
    'max_length' => 100,
    'word_boundary' => FALSE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
  $vars['alter_bottom'] = array(
    'max_length' => 50,
    'word_boundary' => TRUE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );
  
    $vars['template_files'][] = 'block-ecjc_theme-news-all';
    $vars['classes_array'][] = 'block-' . $block->module . 'all';
  }
  if($block->delta == 'news_category_sticky' ) $vars['category'] = t(ucwords($term['name']));
  $vars['profile'] = ecjc_theme_load_profile($vars['uid']);
}
if (in_array($block->delta, array('news_page_kitchen'))) {
  $vars['alter_kitchen'] = array(
    'max_length' => 200,
    'word_boundary' => TRUE,
    'ellipsis' => TRUE,
    'html' => TRUE,
  );

  $vars['views_exist'] = module_exists('views');
 
  $term = $vars['content'][count($vars['content'])-1];
  $vars['category_name'] = l(t($block->subject, array('!category' => check_plain(ucwords($term['name'])))), 'news/' . strtolower(str_replace(' ', '-', $term['name'])));
  unset($vars['content'][count($vars['content'])-1]);
  
}