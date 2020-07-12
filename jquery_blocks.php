<?php

$mydirname = basename( dirname( __FILE__ ) ) ;
require('includes/application_top.php');

echo '<div id="' . $mydirname . 'leftContent" class="leftBoxContainer">';
require(DIR_WS_MODULES . zen_get_module_directory('column_left.php'));
echo '</div>';

echo '<div id="' . $mydirname . 'rightContent" class="rightBoxContainer">';
require(DIR_WS_MODULES . zen_get_module_directory('column_right.php'));
echo '</div>';

echo '<div id="' . $mydirname . 'singleContent">';
require(DIR_WS_MODULES . zen_get_module_directory('column_single.php'));
echo '</div>';

echo '<div id="' . $mydirname . 'upcomingContent">';
include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS));
echo '</div>';

echo '<div id="' . $mydirname . 'specialsContent">';
require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php');
echo '&nbsp;';
echo '</div>';

echo '<div id="' . $mydirname . 'featuredContent">';
require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php');
echo '&nbsp;';
echo '</div>';

echo '<div id="' . $mydirname . 'whats_newContent">';
require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php');
echo '&nbsp;';
echo '</div>';

?>