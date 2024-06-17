<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_tvc2xn::m4is_ju94();
 final 
class m4is_tvc2xn { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_j_xo4w;
 private static $m4is_aj4h;
 private static $m4is_tcw1l;
  static 
function m4is_ju94() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_aj4h = 1000;
 self::$m4is_tcw1l = 'memberium_actionsets';
 } private 
function __construct() {}      public static 
function m4is_w5mixf() : string { return self::$m4is_tcw1l;
 } public static 
function m4is_es7l() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_w5mixf();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "name varchar(64) NOT NULL, \n" . "KEY appname (appname), \n" . "KEY id (id), \n" . "PRIMARY KEY  (appname,id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     public static 
function m4is__p09() : int { global $wpdb;
 static $m4is_yer1mp;
 if ( isset( $m4is_yer1mp ) ) { return $m4is_yer1mp;
 } $m4is_tovizk = $wpdb->prepare( "SELECT count(`id`) from %i WHERE `appname` = %s", self::m4is_w5mixf(), self::$m4is_zq0k );
 $m4is_yer1mp = (int) $wpdb->get_var( $m4is_tovizk );
 return $m4is_yer1mp;
 }  public static 
function m4is_dt1m_7() : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id`, `name` FROM %i WHERE `appname` = %s AND `name` > '' ORDER BY `name` ASC", self::m4is_w5mixf(), self::$m4is_zq0k );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_hpn9y;
 }  public static 
function m4is_gi6g3l() : string { static $m4is_kzkrv1;
 if ( isset( $m4is_kzkrv1 ) ) { return $m4is_kzkrv1;
 } $m4is_kzkrv1 = self::m4is_dt1m_7();
 foreach ( $m4is_kzkrv1 as $m4is_s2ge5 => $m4is_ke_fr ) { $m4is_kzkrv1[$m4is_s2ge5]['text'] = $m4is_ke_fr['name'];
 unset( $m4is_kzkrv1[$m4is_s2ge5]['name'] );
 } $m4is_s2xk = [ 'id' => 0, 'text' => '(No Action)' ];
 $m4is_kzkrv1 = array_merge( [ $m4is_s2xk ], $m4is_kzkrv1 );
 $m4is_kzkrv1 = json_encode( $m4is_kzkrv1 );
 return $m4is_kzkrv1;
 }  public static 
function m4is__r78so() : array { $m4is_hpn9y = self::m4is_dt1m_7();
 $m4is_kzkrv1 = [];
 foreach ( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_j5sy07 = $m4is_ke_fr['id'];
 $m4is_kzkrv1[$m4is_j5sy07] = $m4is_ke_fr['name'];
 } return $m4is_kzkrv1;
 }  public static 
function m4is_znq_1( int $m4is_e2kg, int $m4is_rrny, bool $m4is_mdz7 = false ) { $m4is_oa_z = self::$m4is_j_xo4w->runAS( $m4is_e2kg, $m4is_rrny );
 if ( $m4is_mdz7 ) { self::$m4is_bnd6ti->m4is_leu58( $m4is_e2kg );
 } return $m4is_oa_z;
 } private static 
function m4is_zgrj6() : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id` FROM %i WHERE `appname` = %s", self::m4is_w5mixf(), self::$m4is_zq0k );
 $m4is_x_rxou = $wpdb->get_col( $m4is_tovizk );
 return $m4is_x_rxou;
 }  static 
function m4is_fre0() { global $wpdb;
 $m4is_dcjt_3 = get_option( 'memberium_tables_updated', [] );
 $m4is_dcjt_3['actionsets'] = isset( $m4is_dcjt_3['actionsets'] ) ? $m4is_dcjt_3['actionsets'] : 0;
 $m4is_uevr = self::m4is_zgrj6();
 $m4is_dj_2 = 'ActionSequence';
 $m4is_couz = 0;
 $m4is_oxei6v = 'Id';
 $m4is_wqzi = '%';
 $m4is_tcw1l = self::m4is_w5mixf();
 $m4is_iiq6_ = 0;
 $m4is_ll6w4j = [];
 $m4is_b7pl = false;
 $m4is_bd14c8 = 0;
 $m4is_jo8fb = [ 'Id' => '%', 'TemplateName' => '%', 'VisibleToTheseUsers' => '' ];
 $m4is__u5v = [ 'Id', 'TemplateName', 'VisibleToTheseUsers' ];
  do { $m4is_hpn9y = self::$m4is_j_xo4w->dsQuery( $m4is_dj_2, self::$m4is_aj4h, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 $m4is_ifj15 = is_array( $m4is_hpn9y ) ? count($m4is_hpn9y) : 0;
 if ( is_string( $m4is_hpn9y ) ) { error_log( 'Memberium:  ISDK API Error - ' . $m4is_hpn9y );
 $m4is_b7pl = true;
 continue;
 } if ( $m4is_ifj15) { $m4is_cf26 = reset( $m4is_hpn9y )['Id'];
 $m4is_bd14c8 = end( $m4is_hpn9y )['Id'];
 $m4is_vnhq = [];
 $m4is_flx71n = [];
 foreach ($m4is_hpn9y as $k => $m4is_ke_fr) { $m4is_vnhq[] = $wpdb->prepare(" ( %d, %s, %s ) ", intval($m4is_ke_fr['Id']), self::$m4is_zq0k, $m4is_ke_fr['TemplateName']);
 $m4is_flx71n[] = $m4is_ke_fr['Id'];
 $m4is_ll6w4j[] = $m4is_ke_fr['Id'];
 } if ( ! empty( $m4is_vnhq ) ) { $m4is_uz9ek = implode( ', ', $m4is_vnhq );
 $m4is_tovizk = $wpdb->prepare( "INSERT INTO %i (id, appname, name) VALUES {$m4is_uz9ek} ON DUPLICATE KEY UPDATE id=VALUES(id), appname=VALUES(appname), name=VALUES(name)", self::m4is_w5mixf() );
 $wpdb->query( $m4is_tovizk );
 } } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + $m4is_ifj15;
 } while ( $m4is_ifj15 == self::$m4is_aj4h );
 $m4is_t07y = array_diff( $m4is_uevr, $m4is_ll6w4j );
 if ( $m4is_iiq6_ > 0 && ! empty( $m4is_t07y ) ) { $m4is_rukx_ = implode( ',', $m4is_t07y );
 $m4is_tovizk = "DELETE FROM %i WHERE `appname` = %s AND `id` IN ( {$m4is_rukx_} )";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::m4is_w5mixf(), self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 } $m4is_dcjt_3['actionsets'] = time();
 update_option( 'memberium_tables_updated', $m4is_dcjt_3, false );
 wp_cache_delete( 'actionsets', 'memberium2/keap' );
 return $m4is_iiq6_;
 } }

