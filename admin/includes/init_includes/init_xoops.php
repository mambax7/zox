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

// Load XOOPS Setting
include XOOPS_ROOT_PATH . '/include/common.php'; // can use $xoopsConfig

if(defined('CONFIG_ZOX_IGNORE_PHP_DEBUG') && CONFIG_ZOX_IGNORE_PHP_DEBUG == 'True'){
  error_reporting(E_ALL & ~E_NOTICE);
}

?>