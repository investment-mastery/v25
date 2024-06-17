<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_pwtg7::m4is_ju94();
 final 
class m4is_pwtg7 { private static $m4is_bnd6ti;
 private static $m4is_j_xo4w;
 private static $m4is_zq0k;
 private static $m4is_jv9xhf;
 private static $m4is_qh1fs;
 private static $m4is_aj4h;
 static 
function m4is_ju94() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_qh1fs = 'memberium_tags';
  self::$m4is_jv9xhf = 'ContactGroup';
  self::$m4is_aj4h = 1000;
 } private 
function __construct() {}     static 
function m4is_tknzbw() : string { return self::$m4is_qh1fs;
 } static 
function m4is_yh2n() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::$m4is_qh1fs;
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "name varchar(255) default NULL, \n" . "category int(20) default NULL, \n" . "KEY id (id), \n" . "PRIMARY KEY  (appname,id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_c69nfv() : int { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT count(`id`) from %i WHERE `appname` = %s", self::$m4is_qh1fs, self::$m4is_zq0k );
 $m4is_yer1mp = $wpdb->get_var( $m4is_tovizk );
 return (int) $m4is_yer1mp;
 } static 
function m4is_p95imw( array $m4is_osi9 ) : array { global $wpdb;
 $m4is_osi9 = array_filter( array_map( 'intval', $m4is_osi9 ) );
 if ( empty( $m4is_osi9 ) ) { return [];
 } $m4is_ahr4oi = implode( ',', $m4is_osi9 );
 $m4is_tovizk = "SELECT DISTINCT(`category`) FROM %i WHERE `appname` = %s AND `id` IN ( {$m4is_ahr4oi} )";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_qh1fs, self::$m4is_zq0k );
 $m4is_ygajo = $wpdb->get_col( $m4is_tovizk );
 return $m4is_ygajo;
 }     static 
function m4is_icnizm( string $m4is_hqe1c, int $m4is_qo53 = 0, ?string $m4is_ljzrq0 = null ) : int { global $wpdb;
 $m4is_hqe1c = trim( $m4is_hqe1c );
 if ( empty( $m4is_hqe1c ) ) { return 0;
 } $m4is_fl7a0 = m4is_a18xl::m4is_oeb7();
 if ( ! in_array( $m4is_qo53, $m4is_fl7a0 ) ) { return 0;
 } if ( is_null( $m4is_ljzrq0 ) ) { $m4is_x0_hk = wp_get_current_user();
 $m4is_gai6k = $m4is_x0_hk ? $m4is_x0_hk->user_login : 'System';
 $m4is_ljzrq0 = sprintf( "Created by %s using Memberium on %s", $m4is_gai6k, date( 'Y-m-d h:i:s' ) );
 } $m4is_l2xiu6 = [ 'GroupCategoryId' => $m4is_qo53, 'GroupDescription' => $m4is_ljzrq0, 'GroupName' => $m4is_hqe1c ];
 $m4is_ndufnm = m4is_ho3l::m4is_l6wj( self::$m4is_jv9xhf, $m4is_l2xiu6 );
 if ( $m4is_ndufnm > 0 ) { $m4is_tovizk = 'INSERT INTO %i (`id`, `appname`, `name`, `category`) VALUES (%d, %s, %s, %s);';
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_qh1fs, $m4is_ndufnm, self::$m4is_zq0k, $m4is_hqe1c, $m4is_qo53 );
 $wpdb->query($m4is_tovizk);
 return $m4is_ndufnm;
 } return 0;
 }     static 
function m4is_o4sq( ?string $m4is_ntpnv = '' ) : array { global $wpdb;
 $m4is_hp1q8i = "%{$m4is_ntpnv}%" ;
 $m4is_xlvr = $m4is_ntpnv ? $wpdb->prepare( " AND ( `name` LIKE %s OR `id` LIKE %s ) ", $m4is_hp1q8i, $m4is_hp1q8i ) : '';
 $m4is_tovizk = sprintf( "SELECT `id`, `name` FROM `%s` WHERE `appname` = '%s' %s ORDER BY `name` ASC ", self::$m4is_qh1fs, self::$m4is_zq0k, $m4is_xlvr );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, OBJECT_K );
 return (array) $m4is_hpn9y;
 }   static 
function m4is_rk2s( array $m4is_yu7pb ) : array { global $wpdb;
 $m4is_x_rxou = [];
 $m4is_yu7pb = array_filter( array_map( 'trim', $m4is_yu7pb ) );
 if ( empty( $m4is_yu7pb ) ) { return [];
 } $m4is__bwt = array_filter( $m4is_yu7pb, function( $m4is_mpia ) { return is_numeric( $m4is_mpia ) && $m4is_mpia > 0;
 } );
 $m4is_xkpot = array_filter( $m4is_yu7pb, function( $m4is_mpia ) { return ! is_numeric( $m4is_mpia ) && substr( $m4is_mpia, 0, 1 ) !== '-';
 } );
 $m4is_xkpot = array_map( 'strtolower', $m4is_xkpot );
 $m4is_yx07tp = array_filter( $m4is_yu7pb, function( $m4is_mpia ) { return is_numeric( $m4is_mpia ) && $m4is_mpia < 0;
 } );
 $m4is_yx07tp = array_map( 'abs', $m4is_yx07tp );
 $m4is_r28yai = array_filter( $m4is_yu7pb, function( $m4is_mpia ) { return ! is_numeric( $m4is_mpia ) && substr( $m4is_mpia, 0, 1 ) === '-';
 } );
 $m4is_r28yai = array_map( 'strtolower', $m4is_r28yai );
 $m4is_r28yai = array_map( function( $m4is_mpia ) { return substr( $m4is_mpia, 1 );
 }, $m4is_r28yai );
 $m4is_u3rwp = implode( ',', array_merge( $m4is__bwt, $m4is_yx07tp ) );
 $m4is_q3m9au = "'" . implode( "','", array_merge( $m4is_xkpot, $m4is_r28yai ) ) . "'";
 if ( ! empty($m4is_u3rwp ) ) { $m4is_tovizk = $wpdb->prepare( "SELECT `id` FROM %i WHERE `appname` = %s ", self::$m4is_qh1fs, self::$m4is_zq0k );
 $m4is_tovizk .= sprintf( 'AND `id` IN (%s) ORDER BY `id` ASC', $m4is_u3rwp );
 $m4is_iystd2 = $wpdb->get_col( $m4is_tovizk );
 foreach( $m4is_iystd2 as $m4is_mpia ) { if ( in_array ( $m4is_mpia, $m4is_yx07tp ) ) { $m4is_x_rxou[] = (int) 0 - $m4is_mpia;
 } if ( in_array ( $m4is_mpia, $m4is__bwt ) ) { $m4is_x_rxou[] = (int) $m4is_mpia;
 } } } if ( ! empty( $m4is_q3m9au ) ) { $m4is_tovizk = $wpdb->prepare( "SELECT LOWER(`name`) as `name`, `id` FROM %i WHERE `appname` = %s ", self::$m4is_qh1fs, self::$m4is_zq0k );
 $m4is_tovizk .= sprintf( 'AND `name` IN (%s) ORDER BY `id` ASC', $m4is_q3m9au );
 $m4is_iystd2 = $wpdb->get_results( $m4is_tovizk, OBJECT_K );
 foreach( $m4is_iystd2 as $m4is_s2ge5 => $m4is_mpia ) { if ( in_array ( $m4is_s2ge5, $m4is_r28yai ) ) { $m4is_x_rxou[] = '-' . $m4is_mpia->id;
 } if ( in_array ( $m4is_s2ge5, $m4is_xkpot ) ) { $m4is_x_rxou[] = $m4is_mpia->id;
 } } } return $m4is_x_rxou;
 }     static 
function m4is_vx0z5( string $m4is_t5ot4 ) : bool { global $wpdb;
 $m4is_t5ot4 = trim( $m4is_t5ot4 );
 $m4is_tovizk = $wpdb->prepare( "SELECT count(*) FROM %i WHERE appname = %s AND name = %s", self::$m4is_qh1fs, self::$m4is_zq0k, $m4is_t5ot4 );
 $m4is_yer1mp = $wpdb->get_var( $m4is_tovizk );
 return (bool) $m4is_yer1mp;
 }  static 
function m4is_nyaq6( bool $m4is_lx0u7d = false ) : array { global $wpdb;
  $m4is_tovizk = $wpdb->prepare( "SELECT `name`, `id` FROM %i WHERE `appname` = %s ORDER BY `name`", self::$m4is_qh1fs, self::$m4is_zq0k );
 $m4is_iystd2 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_xs6ipy = [];
 if ( is_array( $m4is_iystd2 ) ) { foreach($m4is_iystd2 as $m4is_mpia) { $m4is_xs6ipy[] = sprintf( "(%d) %s", $m4is_mpia['id'], $m4is_mpia['name'] );
 if ($m4is_lx0u7d) { $m4is_xs6ipy[] = sprintf( "(-%d) %s", $m4is_mpia['id'], $m4is_mpia['name'] );
 } } } return $m4is_xs6ipy;
 }  static 
function m4is_v6pu( string $m4is_hqe1c ) : int { $m4is_hqe1c = trim( $m4is_hqe1c );
 if ( is_numeric( $m4is_hqe1c ) ) { return $m4is_hqe1c;
 } if ( empty ( $m4is_hqe1c ) ) { return 0;
 } global $wpdb;
 $m4is_tovizk = $wpdb->prepare( 'SELECT `id` FROM %i WHERE `appname` = %s AND `name` = %s ORDER BY `id` LIMIT 1', self::$m4is_qh1fs, self::$m4is_zq0k, $m4is_hqe1c );
 $m4is_ndufnm = (int) $wpdb->get_var($m4is_tovizk);
 return $m4is_ndufnm;
 }   static 
function m4is_i0au6j( $m4is_a51ew = false, $m4is_vm2gfq = false ) { global $wpdb;
 static $m4is_cq_t;
 $m4is_jcz18 = (int) $m4is_a51ew;
 $m4is_pwyr2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_tag_categories' );
 $m4is_oa_z = [];
 $m4is_oa_z['lc'] = [];
 $m4is_oa_z['mc'] = [];
  if ( ! isset( $m4is_cq_t[$m4is_jcz18] ) ) { if ( $m4is_a51ew == true && $m4is_pwyr2 > '' ) { $m4is_hj_x = sprintf( " AND category NOT IN ( %s ) ", $m4is_pwyr2 );
 } else { $m4is_hj_x = '';
 } $m4is_zj4fon = [];
 $m4is_tcw1l = self::$m4is_qh1fs;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id`, `name` FROM %i WHERE `appname` = %s ", self::$m4is_qh1fs, self::$m4is_zq0k ) . " {$m4is_hj_x} ORDER BY `category`, `name`";
 $m4is_iystd2 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 foreach ($m4is_iystd2 as $m4is_mpia) { $m4is_zj4fon['mc'][$m4is_mpia['id']] = $m4is_mpia['name'];
 $m4is_zj4fon['lc'][$m4is_mpia['id']] = strtolower($m4is_mpia['name']);
 } $m4is_oa_z = $m4is_zj4fon;
 $m4is_cq_t[$m4is_jcz18] = $m4is_oa_z;
 } else { $m4is_oa_z = $m4is_cq_t[$m4is_jcz18];
 }  if ($m4is_vm2gfq) { if (! empty($m4is_oa_z['mc']) && is_array($m4is_oa_z['mc']) ){ $m4is_oa_z['hn'] = [];
 $m4is_pcij = __('Does Not Have', 'memberium');
 foreach ($m4is_oa_z['mc'] as $m4is_j5sy07 => $m4is_mpia) { $m4is_oa_z['hn'][$m4is_j5sy07] = $m4is_mpia;
 $m4is_oa_z['hn'][ '-' . $m4is_j5sy07] = $m4is_pcij . ' ' . $m4is_mpia;
 } } } return (array) $m4is_oa_z;
 }   static 
function m4is_qasq2( $m4is_koi38, $m4is_xozjum ) : array { $m4is_kof0 = [];
 $m4is_lx0u7d = $m4is_xozjum === 'oxygen' ? false : true;
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true, $m4is_lx0u7d );
 $i = $m4is_lx0u7d ? 'hn' : 'mc';
 $m4is_iystd2 = isset( $m4is_iystd2[$i] ) ? $m4is_iystd2[$i] : false;
 if ( $m4is_iystd2 ) { foreach ( $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { $m4is_kof0[$m4is_j5sy07] = $m4is_mpia . ' (' . str_replace( '-', '', $m4is_j5sy07 ) . ')';
 } } return $m4is_kof0;
 }     static 
function m4is_jgs89() { global $wpdb;
 $m4is_uruyp = m4is_a18xl::m4is_ks3u();
 $m4is_e2bi = m4is_a18xl::m4is_oeb7( true, true );
 $m4is_lcn0f5 = count( $m4is_e2bi );
 $m4is_couz = 0;
 $m4is_tcw1l = m4is_pwtg7::m4is_tknzbw();
 $m4is_sv32 = 0;
 $m4is_flx71n = [];
 $m4is__u5v = [ 'Id', 'GroupName', 'GroupCategoryId' ];
 $m4is_jo8fb = [ 'Id' => '%', ];
 if ( $m4is_lcn0f5 == 1) { $m4is_jo8fb = [ 'GroupCategoryId' => $m4is_e2bi[0], ];
 }  do { $m4is_iystd2 = self::$m4is_j_xo4w->dsQueryOrderBy( self::$m4is_jv9xhf, self::$m4is_aj4h, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 $m4is_awegl = is_array( $m4is_iystd2 ) ? count( $m4is_iystd2 ) : 0;
 if ( ! is_array( $m4is_iystd2 ) ) { error_log( sprintf( "Failed to retrieve tags from the CRM system.  Query returned '%s'", (string) $m4is_iystd2 ) );
 } if ( $m4is_awegl ) { $m4is_vnhq = [];
 foreach ( $m4is_iystd2 as $m4is_mpia ) { $m4is_mpia['GroupName'] = isset( $m4is_mpia['GroupName'] ) ? $m4is_mpia['GroupName'] : '';
 if ( $m4is_lcn0f5 == 1 || ( in_array( $m4is_mpia['GroupCategoryId'], $m4is_e2bi ) ) ) { $m4is_vnhq[] = $wpdb->prepare( '( %d, %s, %s, %d )', (int) $m4is_mpia['Id'], self::$m4is_zq0k, $m4is_mpia['GroupName'], (int) $m4is_mpia['GroupCategoryId'] );
 $m4is_flx71n[] = (int) $m4is_mpia['Id'];
 } } if ( count( $m4is_vnhq ) ) { $m4is_tovizk = "INSERT INTO `{$m4is_tcw1l}` (id, appname, name, category ) VALUES " . implode( ', ', $m4is_vnhq ) . " ON DUPLICATE KEY UPDATE id=VALUES(id), appname=VALUES(appname), name=VALUES(name), category=VALUES(category)";
 $wpdb->query( $m4is_tovizk );
 } $m4is_couz++;
 } } while ( $m4is_awegl == self::$m4is_aj4h );
 if ( count( $m4is_flx71n ) ) { $m4is_tovizk = "DELETE FROM {$m4is_tcw1l} WHERE `appname` = %s AND `id` NOT IN ( " . implode( ', ', $m4is_flx71n) . " )";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 } $m4is_dcjt_3 = get_option( 'memberium_tables_updated', [] );
 $m4is_dcjt_3['tags'] = isset( $m4is_dcjt_3['tags'] ) ? $m4is_dcjt_3['tags'] : 0;
 $m4is_dcjt_3['tags'] = time();
 set_transient( 'memberium_tags_updated', time() );
 update_option( 'memberium_tables_updated', $m4is_dcjt_3, false );
 return $m4is_sv32;
 }  static 
function m4is_bhu1( bool $m4is_dzkv = false ) { $m4is_rhtdnb = 'memberium/keap/tags/next_sync';
 if ( ! $m4is_dzkv ) { $m4is_c6fo7 = get_option( $m4is_rhtdnb, 0 );
 if ( $m4is_c6fo7 > time() ) { return;
 } } $m4is_x7e9 = 'memberium/keap/tags/highest_sync_id';
 $m4is_qxiuy = 6 * HOUR_IN_SECONDS;
 $m4is_j0pb2 = 5 * MINUTE_IN_SECONDS;
 $m4is_t2506p = (int) get_option( $m4is_x7e9, 0 );
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( self::$m4is_jv9xhf, true );
 $m4is_couz = 0;
 $m4is_jo8fb = [ 'Id' => "~>~ {$m4is_t2506p}", ];
 $m4is_iystd2 = self::$m4is_j_xo4w->dsQueryOrderBy( self::$m4is_jv9xhf, self::$m4is_aj4h, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true);
 if ( ! is_array( $m4is_iystd2 ) ) { return;
 } else { $m4is_awegl = count( $m4is_iystd2 );
 $m4is_ty5m = end( $m4is_iystd2 );
 $m4is_ve2sn = (int) end( $m4is_iystd2 )['Id'];
 $m4is_t08rp = self::m4is_jl71( $m4is_t2506p, $m4is_ve2sn );
 $m4is_jgx1 = self::m4is_o7g3( $m4is_iystd2 );
 $m4is_wmnjg = array_diff( $m4is_t08rp, $m4is_jgx1 );
 if ( $m4is_awegl < self::$m4is_aj4h ) { $m4is_ve2sn = 0;
 $m4is_njz9u = $m4is_qxiuy;
 } else { $m4is_njz9u = $m4is_j0pb2;
 } self::m4is_f5z2o( $m4is_t2506p, $m4is_ve2sn, $m4is_wmnjg );
 update_option( $m4is_x7e9, $m4is_ve2sn, false );
 update_option( $m4is_rhtdnb, time() + $m4is_njz9u, false );
 } }     private static 
function m4is_o7g3( array $m4is_iystd2 ) : array { global $wpdb;
 $m4is_vnhq = [];
 $m4is_kw17 = [];
 foreach ( $m4is_iystd2 as $m4is_mpia ) { $m4is_mpia['GroupName'] = isset( $m4is_mpia['GroupName'] ) ? $m4is_mpia['GroupName'] : '';
 $m4is_vnhq[] = $wpdb->prepare( '( %d, %s, %s, %d )', (int) $m4is_mpia['Id'], self::$m4is_zq0k, $m4is_mpia['GroupName'], (int) $m4is_mpia['GroupCategoryId'] );
 $m4is_kw17[] = (int) $m4is_mpia['Id'];
 } if ( ! empty( $m4is_vnhq ) ) { $m4is_tovizk = $wpdb->prepare( "INSERT INTO %i (id, appname, name, category ) VALUES ", self::$m4is_qh1fs ) . implode( ', ', $m4is_vnhq ) . " ON DUPLICATE KEY UPDATE id=VALUES(id), appname=VALUES(appname), name=VALUES(name), category=VALUES(category)";
 $wpdb->query( $m4is_tovizk );
 } return $m4is_kw17;
 }  private static 
function m4is_jl71( int $m4is_ie9q70, int $m4is_rk9_li ) : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id` FROM %i WHERE `appname` = %s AND `id` BETWEEN %d AND %d", self::$m4is_qh1fs, self::$m4is_zq0k, $m4is_ie9q70, $m4is_rk9_li );
 $m4is_x_rxou = $wpdb->get_col( $m4is_tovizk );
 return $m4is_x_rxou;
 }  private static 
function m4is_f5z2o( int $m4is_ie9q70, int $m4is_rk9_li, array $m4is_wmnjg ) : void { global $wpdb;
 if ( empty( $m4is_wmnjg ) ) { return;
 } $m4is_p1hqu = implode( ', ', $m4is_wmnjg );
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `appname` = %s AND `id` IN ( $m4is_p1hqu )", self::$m4is_qh1fs, self::$m4is_zq0k, $m4is_ie9q70, $m4is_rk9_li );
 $wpdb->query( $m4is_tovizk );
 echo '<p>', $m4is_tovizk, '</p>';
 }     }

