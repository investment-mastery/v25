<?php
 class_exists( 'm4is_pms8y' ) || die();
 crm_keap_contact_action_class::m4is_ju94();
 final 
class m4is_gifjxp { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_j_xo4w;
 private static $m4is_aj4h;
 private static $m4is_tcw1l;
 public const NOTE_TYPE = -1;
 public const TASK_TYPE = -2;
 public const APPOINTMENT_TYPE = -3;
 public const ACCEPTED = 1;
 public const DECLINED = 0;
  static 
function m4is_ju94() { global $wpdb;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_tcw1l = $wpdb->prefix . 'memberium_contactactions';
 self::$m4is_aj4h = 1000;
 } private 
function __construct() {}    static 
function m4is_pzau9() : string { return self::$m4is_tcw1l;
  } static 
function m4is_t_8e() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::elf_get_contact_actions_db_table();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "fieldname varchar(64) NOT NULL DEFAULT '', \n" . "value longtext, \n" . "KEY id (id), \n" . "KEY fieldname (fieldname), \n" . "KEY appname (appname), \n" . "KEY value (value(64) ), \n" . "PRIMARY KEY  (appname,id,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }   }

