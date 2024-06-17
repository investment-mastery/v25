<?php
 class_exists( 'm4is_pms8y' ) || die();
 m4is_eae3_4::m4is_ju94();
 final 
class m4is_eae3_4 { private static $m4is_j_xo4w;
 private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_tcw1l;
 public const TAG = 1;
 public const ACTIONSET = 2;
 public const CAMPAIGN_GOAL = 3;
 public const CONTACT_FIELD_UPDATE = 4;
 public static 
function m4is_ju94() : void { global $wpdb;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_tcw1l = $wpdb->prefix . 'memberium_api_queue';
 } public static 
function m4is_wz3t() : string { return self::$m4is_tcw1l;
 } static 
function m4is_t_8e() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_wz3t();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "contact_id int(20) NOT NULL, \n" . "action int NOT NULL, \n" . "action_date datetime NOT NULL, \n" . "value longtext, \n" . "KEY id (id), \n" . "KEY appname (appname), \n" . "KEY fieldname (fieldname), \n" . "KEY value (value(64) ), \n" . "PRIMARY KEY  (appname,id,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } }

