<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_dcig::m4is_ju94();
 final 
class m4is_dcig { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_j_xo4w;
 private static $m4is_dj_2;
 private static $m4is_a0pejg;
 static 
function m4is_ju94() { global $wpdb;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_dj_2 = $wpdb->prefix . 'memberium_owners';
 self::$m4is_a0pejg = 1000;
 }    static 
function m4is_vhvw() : string { return self::$m4is_dj_2;
 } static 
function m4is_kayp() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::$m4is_dj_2;
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "fieldname varchar(64) NOT NULL DEFAULT '', \n" . "value longtext, \n" . "KEY id (id), \n" . "KEY fieldname (fieldname), \n" . "KEY appname (appname), \n" . "KEY value (value(64) ), \n" . "PRIMARY KEY  (appname,id,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }    public static 
function m4is_ixm7_( int $m4is_ypcu, bool $m4is_s7cxe = false ) : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `fieldname`, `value` FROM %i WHERE `appname` = %s AND `id` = %d", self::$m4is_dj_2, self::$m4is_zq0k, $m4is_ypcu );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_bspnm = m4is_ho3l::m4is_u0vcs8( $m4is_hpn9y );
 if ( $m4is_s7cxe ) { $m4is_bspnm = array_change_key_case( $m4is_bspnm, CASE_LOWER );
 } return $m4is_bspnm;
 } public static 
function m4is_hihg( array $m4is_bspnm ) { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `appname` = %s AND `id` = %d", self::$m4is_dj_2, self::$m4is_zq0k, $m4is_bspnm['Id'] );
 $wpdb->query( $m4is_tovizk );
  $m4is_j5sy07 = $m4is_bspnm['Id'];
 $m4is_cezf = [];
 foreach ( $m4is_bspnm as $m4is_c5zg => $m4is_g0wy ) { $m4is_uz9ek = [];
 $m4is_uz9ek[] = $m4is_j5sy07;
 $m4is_uz9ek[] = self::$m4is_zq0k;
 $m4is_uz9ek[] = $m4is_c5zg;
 $m4is_uz9ek[] = $m4is_g0wy;
 $m4is_cezf[] = $wpdb->prepare( '(%d, %s, %s, %s)', $m4is_uz9ek );
 }  $m4is_tovizk = $wpdb->prepare( "INSERT INTO %i ( `id`, `appname`, `fieldname`, `value` ) VALUES " . implode( ', ', $m4is_cezf ), self::$m4is_dj_2 );
 $m4is_tovizk = $wpdb->query( $m4is_tovizk );
 }  public static 
function m4is_p0e1g5() { $m4is_ad8l3h = self::m4is_rigv6();
 foreach ($m4is_ad8l3h as $m4is_bspnm ) { self::m4is_hihg( $m4is_bspnm );
 }  }    public static 
function m4is_rigv6() : array { $m4is_dj_2 = 'User';
 $m4is_ad8l3h = [];
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( 'User', false );
 $m4is_jo8fb = [ 'Id' => '%' ];
 $m4is_xcs9ht = self::$m4is_j_xo4w->dsQuery( 'User', self::$m4is_a0pejg, 0, $m4is_jo8fb, $m4is__u5v );
 $m4is_xcs9ht = is_array( $m4is_xcs9ht ) ? $m4is_xcs9ht : [];
 return $m4is_xcs9ht;
 } }

