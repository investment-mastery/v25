<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_aoxw {  static 
function m4is_sndk() { static $m4is_n7y3 = false;
 if (! $m4is_n7y3) { $m4is_n7y3 = true;
 if (! defined('LSCACHE_NO_CACHE') ) { define('LSCACHE_NO_CACHE', true);
 } if (! defined('DONOTCACHEPAGE')) { define('DONOTCACHEPAGE', true);
 } if (! headers_sent()) { header('X-Cache-Enabled: False');
 header('X-Memberium-Caching: Plugin Caching Hinted Off');
 } } } static 
function m4is_g7bv() { $m4is__iju62 = defined('MEMBERIUM_DISABLE_CACHING') && MEMBERIUM_DISABLE_CACHING == true;
 if (function_exists('is_user_logged_in') && ! is_user_logged_in() ) { $m4is__iju62 = true;
 } if ($m4is__iju62) { return;
 } self::m4is_sndk();
 if (! headers_sent() ) { header('X-Cache-Enabled: False');
 header('Cache-Control: no-cache, max-age=0, must-revalidate, no-store');
 header('Pragma: no-cache');
 header('Expires: 0');
 nocache_headers();
 } }  static 
function m4is_djr4nd() { static $m4is_p7ha = false;
 if ($m4is_p7ha) { return;
 } if (self::$m4is_sbv_mt) { return;
 } self::$m4is_sbv_mt = true;
 $m4is_p7ha = true;
 self::m4is_g7bv();
  if (! empty($_SERVER['HTTP_X_VARNISH']) ) { return;
 }  } static 
function m4is_zshfjo() { return ! self::$m4is_sbv_mt;
 } private static $m4is_sbv_mt = false;
 }

