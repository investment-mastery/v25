<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_u_pahy::m4is_x6wv();
 final 
class m4is_u_pahy { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 }     static 
function m4is_oymhg( array $m4is_tv6oya ) { $m4is_tv6oya['memberium2'] = [ 'exporter_friendly_name' => 'Memberium', 'callback' => ['m4is_u_pahy', 'm4is_kb3q8u'], ];
 return $m4is_tv6oya;
 }  static 
function m4is_w3jf5y( array $m4is_ctib ) { $m4is_ctib['memberium2'] = [ 'eraser_friendly_name' => 'Memberium', 'callback' => ['m4is_u_pahy', 'm4is_id5jpg'], ];
 return $m4is_ctib;
 }  static 
function m4is_kb3q8u( $m4is_fliw, $m4is_couz = 1 ) { global $wpdb;
 $m4is_fliw = strtolower(trim ($m4is_fliw) );
 $m4is_x0_hk = get_user_by('email', $m4is_fliw);
 $m4is_ig9p6 = $m4is_x0_hk->ID;
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 $m4is_couz = (int) $m4is_couz;
 $m4is_qx1n = [];
 $m4is_etj2 = [];
  $m4is_auhoe = [ 'login_ip_address' => 'Login IP Address', 'last_login_time' => 'Last Login Time', 'login_count' => 'Login Count', ];
 foreach( (array) $m4is_auhoe as $m4is_p51e_l => $m4is_unc_q) { $m4is_g0wy = get_user_meta($m4is_ig9p6, $m4is_p51e_l, true);
 if (! empty($m4is_g0wy) ) { $m4is_etj2[] = [ 'name' => $m4is_unc_q, 'value' => $m4is_g0wy, ];
 } }  if ($m4is_e2kg) { $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol($m4is_e2kg);
 if (! empty($m4is_p9r_8e) ) { foreach($m4is_p9r_8e as $m4is_c5zg => $m4is_g0wy) { if (! empty($m4is_g0wy) ) { $m4is_etj2[] = [ 'name' => $m4is_c5zg, 'value' => $m4is_g0wy, ];
 } } } } $m4is_nvkre = 'memberium';
 $m4is_x730c = 'Memberium';
 $m4is_s7bgu5 = "memberium-user";
 $m4is_qx1n[] = [ 'group_id' => $m4is_nvkre, 'group_label' => $m4is_x730c, 'item_id' => $m4is_s7bgu5, 'data' => $m4is_etj2, ];
 $m4is_etj2 = [];
 $m4is_tovizk = 'SELECT DISTINCT `ipaddress` FROM `' . m4is_ypvg9::m4is_hjqcz2() . '` WHERE `username` = %s ';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_fliw);
 $m4is_hpn9y = $wpdb->get_col($m4is_tovizk);
 if (is_array($m4is_hpn9y) && ! empty($m4is_hpn9y) ) { foreach($m4is_hpn9y as $row) { $m4is_etj2[] = [ 'name' => 'IP Address', 'value' => $row ];
 } $m4is_nvkre = 'memberium-ip-history';
 $m4is_x730c = 'Memberium IP History';
 $m4is_s7bgu5 = "memberium-ip-history";
 $m4is_qx1n[] = [ 'group_id' => $m4is_nvkre, 'group_label' => $m4is_x730c, 'item_id' => $m4is_s7bgu5, 'data' => $m4is_etj2, ];
 } $m4is_tjifb = true;
 return [ 'data' => $m4is_qx1n, 'done' => $m4is_tjifb, ];
 }  static 
function m4is_id5jpg( $m4is_fliw, $m4is_couz = 1 ) { global $wpdb;
 $m4is_fliw = strtolower( trim ( $m4is_fliw ) );
 $m4is_x0_hk = get_user_by( 'email', $m4is_fliw );
 $m4is_ig9p6 = $m4is_x0_hk->ID;
 $m4is_b6sv = false;
 $m4is_couz = (int) $m4is_couz;
 $m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr('appname');
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_CONTACTS . '` WHERE `appname` = %s AND `id` = %d ';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_e2kg);
 $m4is_b6sv += $wpdb->query($m4is_tovizk);
  $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_CONTACTTAGS . '` WHERE `appname` = %s AND `contactid` = %d ';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_e2kg);
 $m4is_b6sv += $wpdb->query($m4is_tovizk);
   $m4is_pa8jw = m4is_pk8phc::m4is_rbugf($m4is_e2kg);
 if ($m4is_pa8jw) { $m4is_tovizk = 'DELETE FROM `' . m4is_pk8phc::m4is_f5buj() . '` WHERE `appname` = %s AND `id` = %d ';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_pa8jw);
 $m4is_b6sv += $wpdb->query($m4is_tovizk);
 } } if ($m4is_ig9p6) { $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_PAGETRACKING . '` WHERE `userid` = %d ';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_ig9p6);
 $m4is_b6sv += $wpdb->query($m4is_tovizk);
 }  $m4is_tovizk = 'DELETE FROM `' . m4is_ypvg9::m4is_hjqcz2() . '` WHERE `appname` = %s AND `username` = %s';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_fliw);
 $m4is_b6sv += $wpdb->query($m4is_tovizk);
  return [ 'done' => true, 'items_removed' => $m4is_b6sv, 'items_retained' => false, 'messages' => [], ];
 } }

