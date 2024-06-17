<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 m4is_a18xl::m4is_x6wv();
 final 
class m4is_a18xl { private static $m4is_bnd6ti;
 private static $m4is_j_xo4w;
 private static $m4is_zq0k;
 private static $m4is_uq2afm;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_uq2afm = 'memberium_contactgroupcategories';
 } private 
function __construct() {}     static 
function m4is_jrjon() : string { return self::$m4is_uq2afm;
 } static 
function m4is_zypjf() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::$m4is_uq2afm;
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "name varchar(64) NOT NULL, \n" . "KEY id (id), \n" . "PRIMARY KEY  (appname,id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_ay9g() : int { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT count(id) from %i WHERE `appname` = %s", self::$m4is_uq2afm, self::$m4is_zq0k );
 $m4is_ygajo = $wpdb->get_var( $m4is_tovizk );
 return (int) $m4is_ygajo;
 }  static 
function m4is_qrqpk( string $m4is_t5ot4 ) : bool { global $wpdb;
 $m4is_t5ot4 = trim( $m4is_t5ot4 );
 $m4is_tovizk = $wpdb->prepare( "SELECT count(*) FROM %i WHERE appname = %s AND name = %s", self::$m4is_uq2afm, self::$m4is_zq0k, $m4is_t5ot4 );
 $m4is_yer1mp = $wpdb->get_var($m4is_tovizk );
 return (bool) $m4is_yer1mp;
 }  static 
function m4is_ks3u() : array { $m4is_t93w = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_tag_categories', '' ) ), 'is_numeric' );
 return $m4is_t93w;
 }  static 
function m4is_oeb7( bool $m4is_agt62d = true, bool $m4is_txypz = true ) : array { global $wpdb;
 $m4is_t93w = [];
 $m4is_tovizk = $wpdb->prepare( "SELECT `id` FROM %i WHERE appname = %s ", self::$m4is_uq2afm, self::$m4is_zq0k );
 if ( $m4is_agt62d ) { $m4is_t93w = self::m4is_ks3u();
 if ( ! empty( $m4is_t93w ) ) { $m4is_mbv26 = implode( ',', $m4is_t93w );
 $m4is_tovizk .= " AND `id` NOT IN ( {$m4is_mbv26} ) ";
 } } $m4is_tovizk .= " ORDER BY `id` ASC";
 $m4is_ygajo = $wpdb->get_col( $m4is_tovizk );
 if ( $m4is_txypz && ! in_array( 0, $m4is_t93w ) ) { $m4is_ygajo = array_merge( [0], $m4is_ygajo );
 } return $m4is_ygajo;
 }  static 
function m4is_rcws( bool $m4is_agt62d = true, bool $m4is_txypz = true ) : array { global $wpdb;
 $m4is_t93w = [];
 $m4is_tovizk = $wpdb->prepare( "SELECT `id`, `name` FROM %i WHERE appname = %s ", self::$m4is_uq2afm, self::$m4is_zq0k );
 if ( $m4is_agt62d ) { $m4is_t93w = self::m4is_ks3u();
 if ( ! empty( $m4is_t93w ) ) { $m4is_mbv26 = implode( ',', $m4is_t93w );
 $m4is_tovizk .= " AND `id` NOT IN ( {$m4is_mbv26} ) ";
 } } $m4is_tovizk .= " ORDER BY `name` ASC";
 $m4is_ygajo = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 if ( $m4is_txypz && ! in_array( 0, $m4is_t93w ) ) { $m4is_ygajo = array_merge( [ ['id' => 0, 'name' => '(Uncategorized)'] ], $m4is_ygajo );
 } return $m4is_ygajo;
 }  static 
function m4is_nzf_t() { global $wpdb;
 $m4is_dcjt_3 = get_option( 'memberium_tables_updated', [] );
 $m4is_dcjt_3['tagcategories'] = isset( $m4is_dcjt_3['tagcategories']) ? $m4is_dcjt_3['tagcategories'] : 0;
 $m4is_w49bym = '';
 $m4is_y_38pw = 999;
 $m4is_couz = 0;
 $m4is_iiq6_ = 0;
 $m4is_dj_2 = 'ContactGroupCategory';
 $m4is_tcw1l = self::$m4is_uq2afm;
 $m4is_jo8fb = [ 'CategoryName' => '%' ];
 $m4is__u5v = [ 'Id', 'CategoryName' ];
 $m4is_hpn9y = self::$m4is_j_xo4w->dsQueryOrderBy( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 if ( is_array( $m4is_hpn9y ) && ! empty( $m4is_hpn9y ) ) { $m4is_vnhq = [];
 if ( is_array( $m4is_hpn9y ) && ! empty( $m4is_hpn9y ) ) { foreach ( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_vnhq[] = $wpdb->prepare( "(%d, %s, %s)", intval($m4is_ke_fr['Id']), self::$m4is_zq0k, $m4is_ke_fr['CategoryName'] );
 $m4is_w49bym .= $m4is_ke_fr['Id'] . ',';
 } } if ( ! empty( $m4is_vnhq ) ) { $m4is_tovizk = "INSERT INTO {$m4is_tcw1l} (id, appname, name) VALUES " . implode( ', ', $m4is_vnhq) . " ON DUPLICATE KEY UPDATE id=VALUES(id), appname=VALUES(appname), name=VALUES(name);";
 $wpdb->query($m4is_tovizk);
 } if (! empty( $m4is_w49bym ) ) { $m4is_w49bym = trim( $m4is_w49bym, ',' );
 $m4is_tovizk = "DELETE FROM {$m4is_tcw1l} WHERE `appname` = %s AND `id` NOT IN ({$m4is_w49bym}) ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 } set_transient( 'memberium_tagcategories_updated', time() );
 } $m4is_dcjt_3['tagcategories'] = time();
 update_option( 'memberium_tables_updated', $m4is_dcjt_3, false );
 return $m4is_iiq6_;
 } static 
function m4is_oh8mn2( string $m4is_sxohk ) : int { $m4is_sxohk = trim( $m4is_sxohk );
 if ( empty( $m4is_sxohk ) ) { return 0;
 } if ( self::m4is_qrqpk( $m4is_sxohk ) ) { return 0;
 } $m4is_ke_fr = [ 'CategoryName' => $m4is_sxohk ];
 $m4is_j5sy07 = (int) m4is_ho3l::m4is_l6wj( 'ContactGroupCategory', $m4is_ke_fr );
 self::m4is_nzf_t();
 return $m4is_j5sy07;
 } }

