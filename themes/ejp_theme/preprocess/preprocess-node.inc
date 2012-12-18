<?php
define('ORG_VOCAB', 1);
// Создаем переменную $build_mode в зависимости от типа отображения ноды
switch ($vars['node']->build_mode) {
    case NODE_BUILD_NORMAL:
        $vars['build_mode'] = $vars['teaser'] ? 'teaser' : 'full';
        break;
    case NODE_BUILD_PREVIEW:
        $vars['build_mode'] = 'preview';
        break;
    case NODE_BUILD_SEARCH_INDEX:
        $vars['build_mode'] = 'search_index';
        break;
    case NODE_BUILD_SEARCH_RESULT:
        $vars['build_mode'] = 'search_result';
        break;
    case NODE_BUILD_RSS:
        $vars['build_mode'] = 'rss';
        break;
    case NODE_BUILD_PRINT:
        $vars['build_mode'] = 'print';
        break;
}

if($vars['type'] == 'blog' or $vars['type'] == 'event' or $vars['type'] == 'news' or $vars['type'] == 'document' ) {
	$nd = node_load($vars['nid']);
	$vars['body'] = $nd->body;
}
  
