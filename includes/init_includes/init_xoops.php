<?php
/**
 * set some top level domain variables
 * see {@link  http://www.zen-cart.com/wiki/index.php/Developers_API_Tutorials#InitSystem wikitutorials} for more details.
 *
 * @package initSystem
 * @copyright Copyright (C) 2006 Zen Cart.JP
 * @copyright Portions Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @author Tadahito HIRAOKA <hira¡÷s-page.net>
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

// load xoz configure file.
require(DIR_FS_CATALOG . DIR_WS_INCLUDES . 'config_zox.php');

/**
 * Session ID is always sent and received by using Cookie. 
 * This is measures of Session Fixation vulnerability.
 */
// move from includes/init_includes/overrides/init_sessions.php

if (CONFIG_ZOX_SESSION_FORCE_COOKIE_USE == 'True') {
  ini_set("session.use_only_cookies", "1");
  ini_set("session.use_cookies", "1");
  ini_set("session.use_trans_sid", "0");
}

// move from /includes/init_includes/init_sessions.php
$session_started = false;
if (CONFIG_ZOX_SESSION_FORCE_COOKIE_USE == 'True') {
  setcookie('cookie_test', 'please_accept_for_session', time()+60*60*24*30, '/', (($current_domain != '') ? $current_domain : ''));

  if (isset($_COOKIE['cookie_test'])) {
    //zen_session_start();
    $session_started = true;
  }
} elseif (CONFIG_ZOX_SESSION_BLOCK_SPIDERS == 'True') {
  $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  $spider_flag = false;
  if ($user_agent != '') {
    $spiders = file(DIR_WS_INCLUDES . 'spiders.txt');
    for ($i=0, $n=sizeof($spiders); $i<$n; $i++) {
      if ($spiders[$i] != '') {
        if (is_integer(strpos($user_agent, trim($spiders[$i])))) {
          $spider_flag = true;
          break;
        }
      }
    }
  }
  if ($spider_flag == false) {
    //zen_session_start();
    $session_started = true;
  }
} else {
  //zen_session_start();
  $session_started = true;
}

// Load XOOPS Setting
include XOOPS_ROOT_PATH . '/include/common.php'; // can use $xoopsConfig

if(defined('CONFIG_ZOX_IGNORE_PHP_DEBUG') && CONFIG_ZOX_IGNORE_PHP_DEBUG == 'True'){
  error_reporting(E_ALL & ~E_NOTICE);
}

require XOOPS_ROOT_PATH. "/header.php";
$xoopsTpl->assign('iszox',1);
if(isset($_GET['main_page']) && substr($_GET['main_page'],0,5)=="popup"){
  $is_popup = 1; // if popup disable theme
}else{
  $is_popup = 0;
}
?>