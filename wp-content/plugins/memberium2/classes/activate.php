<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_fbl5x8::m4is_x6wv();
 final 
class m4is_fbl5x8 { private static $m4is_bnd6ti;
 private static $m4is_t_01;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_t_01 = '';
 } private static 
function m4is_a5up() : array { global $wpdb;
 $m4is_c4ksqz = $wpdb->get_col( $wpdb->prepare( "SELECT blog_id FROM %i", $wpdb->blogs ) );
 return $m4is_c4ksqz;
 }  static 
function m4is_nd36nj( $m4is_pwzb = false ) { ob_start();
 self::m4is_odw67x( 'Starting network activation: ' . date( 'Y-m-d h:i:s' ), false );
  self::m4is_zvihy( false );
  if ( function_exists( 'is_multisite' ) && is_multisite() ) { global $wpdb;
  if ( $m4is_pwzb ) { $m4is_jfpl_ = get_current_blog_id();
  $m4is_rmdpg = get_sites();
 if ( is_array( $m4is_rmdpg ) ) { foreach ( $m4is_rmdpg as $m4is_zjx_ ) { switch_to_blog( $m4is_zjx_ );
 self::m4is_zvihy( true );
 }  switch_to_blog( $m4is_jfpl_ );
 } } } $m4is_uj0l2 = ob_get_contents();
 ob_end_clean();
 if ( ! empty( $m4is_uj0l2 ) ) { self::m4is_odw67x( 'Unexpected output during network activation: ' . $m4is_uj0l2, true );
 } self::m4is_odw67x( 'Ending network activation: ' . date( 'Y-m-d h:i:s' ), false );
 }  static 
function m4is_zvihy( bool $m4is_y04u = false ) { global $wpdb;
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
 $m4is_mb6gy = time();
  add_option( 'memberium/activation_timestamp', $m4is_mb6gy, false );
  update_option( 'memberium/system/config/timestamp', microtime( true ), true );
  self::m4is_b3gdx4();
  self::m4is_sgtl2();
  $m4is_up85 = get_option('i2sdk');
  self::m4is_vwh83();
  self::m4is_i3jq_();
  self::m4is_tlar();
  self::m4is_p8cey2();
  self::m4is_v71eog();
  m4is_kro2::m4is_pyh02w();
  self::m4is_zv6jc9();
  self::m4is_a1en();
  m4is_kk7m::m4is_ip2bu();
  if (! defined('I2SDK_HOME') ) { $m4is_kfw82 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'beta/oauth' ) ? 'i2sdkng' : 'i2sdk';
  require_once self::$m4is_bnd6ti->m4is_znwy() . "vendor/{$m4is_kfw82}/i2sdk.php";
 wpal_i2sdk_activate();
 }  if (! $m4is_y04u) {   if (defined('MEMBERIUM_DEFER_ACTIVATION_SYNC') ) { return;
 }  if (function_exists('wpal_i2sdk_activate') && function_exists('wp_generate_password')) {  if (! function_exists('wp_generate_password')) { include ABSPATH . 'wp-includes/pluggable.php';
 }  m4is_u68pu::m4is_k6nh( true );
 }   if (! method_exists( self::$m4is_bnd6ti->m4is_se2n8(), 'isVerified') ) { return;
 } }  $m4is_yfi93 = get_option('memberium_extensions', [] );
 $m4is_p5kpm = glob( self::$m4is_bnd6ti->m4is_ikr4nx( '*/init.php' ) );
 $expensive_extensions = [ 'page-tracking', ];
  if (! empty($m4is_p5kpm) ) { foreach ($m4is_p5kpm as $extension) { $m4is_ldjf8y = basename( dirname( $extension ) );
  if (! isset($m4is_p5kpm[$m4is_ldjf8y]) ) {  if (in_array($m4is_ldjf8y, $expensive_extensions) ) { $m4is_yfi93[$m4is_ldjf8y] = 0;
 } else {  $m4is_yfi93[$m4is_ldjf8y] = 1;
 } } } }  update_option( 'memberium_extensions', $m4is_yfi93, true );
  if ( ! isset( $m4is_up85['server_verified']) || $m4is_up85['server_verified'] <> 1 ) { return;
 } }  static 
function m4is_jdj3gq() {  $m4is_qni8fh = get_option( 'memberium_cron' );
  if ( $m4is_qni8fh > 0 ) { wp_unschedule_event( $m4is_qni8fh, 'memberium_scanmakepass', 0 );
 wp_unschedule_event( $m4is_qni8fh, 'memberium/contacts/makepass_scan', 0 );
 wp_unschedule_event( $m4is_qni8fh, 'memberium_maintenance', 0 );
 wp_unschedule_event( $m4is_qni8fh, 'memberium_licensecheck', 0 );
 }  delete_option( 'memberium_cron' );
  $m4is_w2w8 = get_option( 'memberium' );
  if ( ! empty( $m4is_w2w8['delete_configuration'] ) ) { delete_option( 'memberium' );
 } }  static 
function m4is_nj2zui() {  self::m4is_rklgm4();
  self::m4is_v49bwi();
 }     static 
function m4is_odw67x( string $m4is_wbgl5s, bool $m4is_vf403l = false ) : void { self::$m4is_t_01 .= $m4is_wbgl5s . "\n";
 update_option( 'memberium/activation_log', self::$m4is_t_01, false );
 if ( $m4is_vf403l ) { error_log( 'Memberium: ' . $m4is_wbgl5s );
 } }   static private 
function m4is_i3jq_() { global $wpdb;
  $m4is_oj6v = 'memberium_site_id';
  $m4is_tq0t5 = get_option( $m4is_oj6v, false );
  if ( ! $m4is_tq0t5 ) {  $m4is_fufa25 = $wpdb->dbname . '|' . $wpdb->prefix . '|' . ABSPATH . '|' . site_url();
  $m4is_tq0t5 = hash_hmac( 'sha256', $m4is_fufa25, wp_salt( 'nonce' ) );
  update_option( $m4is_oj6v, $m4is_tq0t5, 'yes');
 } }    static private 
function m4is_ar9isf() { static $m4is_nwue_;
 if ( is_null( $m4is_nwue_ ) ) { global $wpdb;
 $m4is_nwue_ = method_exists( $wpdb, 'get_charset_collate' ) ? $wpdb->get_charset_collate() : '';
 } return $m4is_nwue_;
 } static private 
function m4is_n4hbj() { global $wpdb;
  $m4is_tplu = [ 'memberium_appname', ];
 foreach( $m4is_tplu as $m4is_dj_2 ) { $wpdb->query( $wpdb->prepare( "DROP TABLE IF EXISTS %i ", $m4is_dj_2 ) );
 error_log( 'Memberium: Dropping orphaned table ' . $m4is_dj_2 );
 self::m4is_odw67x( 'Memberium: Dropping orphaned table ' . $m4is_dj_2, true );
 } } static private 
function m4is_iaj8() {  } static private 
function m4is_tlar() { global $wpdb;
 self::m4is_iaj8();
 require_once ABSPATH . 'wp-admin/includes/upgrade.php';
 $m4is_nwue_ = self::m4is_ar9isf();
 $m4is_po8up7 = [];
 $m4is_j76ire = [];
    $m4is_tplu = [ ['m4is_a8iaym', 'm4is_y1g8wk'], ['m4is_tvc2xn', 'm4is_es7l'], ['m4is_pk8phc', 'm4is_jx3t'], ['m4is_pk8phc', 'm4is_ejb6u8'], ['m4is_bnrdbo', 'm4is_l239'], ['m4is_bnrdbo', 'm4is_j93w0'], ['m4is_untczd', 'm4is_vdhvp8'], ['m4is_untczd', 'm4is_eim7n_'], ['m4is_ru7njr', 'm4is_r12qt6'], ['m4is__gu52', 'm4is_o02mu'], ['m4is_dcig', 'm4is_kayp'], ['m4is_frey', 'm4is_chs5z7'], ['m4is_a18xl', 'm4is_zypjf'], ['m4is_pwtg7', 'm4is_yh2n'], ['m4is_pms8y', 'm4is_xv06x9'], ['m4is_pms8y', 'm4is_kgx6'], ['m4is_pms8y', 'm4is_k4eg0k'], ['m4is_ss2_7', 'm4is_wpngev'], ['m4is_ypvg9', 'm4is_l_e0nr'], ['m4is_de1d_6', 'm4is_yesu'], ['m4is_rg1kh', 'm4is_dq6a1e'], ['m4is_kk7m', 'm4is_k4eg0k'], ];
 foreach( $m4is_tplu as $m4is_dj_2 ) { $m4is_kw4no1 = call_user_func( $m4is_dj_2 );
 $m4is_po8up7[] = $m4is_kw4no1['table'];
 $m4is_b_7te = dbDelta( $m4is_kw4no1['sql'] );
 if ( empty( $m4is_b_7te ) ) { self::m4is_odw67x( 'No changes to table ' . $m4is_kw4no1['table'], true );
 } else { self::m4is_odw67x( 'Updating table ' . $m4is_kw4no1['table'], true );
 foreach ($m4is_b_7te as $m4is_pjo3k ) { self::m4is_odw67x( 'Database Changelog: ' . $m4is_pjo3k, true );
 } } } self::m4is_sri4nq();
 self::m4is_n4hbj();
  update_option( 'memberium_tables', $m4is_po8up7, false );
 }    private static 
function m4is_sri4nq() { global $wpdb;
 $m4is_vy43 = 'i2sdk_dataformfields';
 $m4is_jsrgbo = m4is_a8iaym::m4is_avtk57();
  $m4is_ngzk = (int) $wpdb->get_var( "SELECT COUNT(`id`) FROM `{$m4is_vy43}`" );
 $m4is_s3q_sa = (int) $wpdb->get_var( "SELECT COUNT(`id`) FROM `{$m4is_jsrgbo}`" );
 if ( $m4is_s3q_sa == 0 && $m4is_ngzk > 0 ) { $m4is_tovizk = "INSERT INTO `{$m4is_jsrgbo}` SELECT * FROM `{$m4is_vy43}`";
 $wpdb->query( $m4is_tovizk );
 } m4is_a8iaym::m4is_j23h();
 error_log( sprintf( "Memberium: Migrating Keap custom fields from '%s' to '%s'.", $m4is_vy43, $m4is_jsrgbo ) );
 }  static private 
function m4is_sgtl2() : void { if (! defined('MEMBERIUM_DEV') ) { $m4is_ea6ksm = dirname(MEMBERIUM_HOME) . '/lib/ext-dev/';
 if (file_exists($m4is_ea6ksm) ) { self::m4is_li7v0($m4is_ea6ksm);
 } $m4is_ea6ksm = dirname(MEMBERIUM_HOME) . '/lib7/ext-dev/';
 if (file_exists($m4is_ea6ksm) ) { self::m4is_li7v0($m4is_ea6ksm);
 } } } static private 
function m4is_b3gdx4() { $m4is_dx_5 = [ 'memberium2-installer/memberium2-installer.php', 'memberium-install-wizard/memberium-install-wizard.php', ];
 foreach($m4is_dx_5 as $m4is_mqjcy4) { if (is_plugin_active($m4is_mqjcy4) ) { deactivate_plugins($m4is_mqjcy4);
 } } }  static private 
function m4is_rklgm4() { $m4is_smxn = get_role('administrator');
 $m4is_smxn->remove_cap('memberium_view_user_info');
 $m4is_smxn->remove_cap('memberium_edit_user_info');
 $m4is_smxn->remove_cap('memberium_view_private_comments');
 } static private 
function m4is_v49bwi() { $m4is_qni8fh = get_option('memberium_cron');
 if ($m4is_qni8fh > 0) { $m4is_ys6ud9 = [ 'memberium_scanmakepass', 'memberium_license_check', 'memberium_maintenance', 'memberium_maintenance12', 'memberium/contacts/makepass_scan', ];
 foreach($m4is_ys6ud9 as $m4is_l7zw9b) { wp_clear_scheduled_hook($m4is_l7zw9b);
 } } delete_option('memberium_cron');
 } static private 
function m4is_vwh83() { $m4is_wov2 = self::$m4is_bnd6ti->m4is_oiewvu();
 $m4is_r4tza = trim(get_plugin_data(MEMBERIUM_HOME, false, false)['Version']);
 $m4is_r4tza = function_exists('get_plugin_data') ? trim(get_plugin_data(MEMBERIUM_HOME, false, false)['Version']) : false;
 if (empty($m4is_wov2['settings']) || ! is_array($m4is_wov2['settings']) ) { $m4is_wov2['settings'] = [];
 }    $m4is_lsaejl = [ 'max_record_age', 'paypal_api_password', 'paypal_api_signature', 'paypal_api_username', 'paypal_api_verified', 'stripe_live', 'stripe_public_key', 'stripe_secret_key', 'stripe_verified', 'username_field', ];
 foreach ($m4is_lsaejl as $m4is_s2ge5) { unset($m4is_wov2['settings'][$m4is_s2ge5]);
 } $m4is_wov2['settings']['autologin_authkeys'] = empty($m4is_wov2['settings']['autologin_authkeys']) ? self::m4is_o9bwct(12) : $m4is_wov2['settings']['autologin_authkeys'];
 $m4is_wov2['settings']['random_seed'] = empty($m4is_wov2['settings']['random_seed']) ? self::m4is_o9bwct(16) : $m4is_wov2['settings']['random_seed'];
  $m4is_k5hq8c = [   ];
 foreach ($m4is_k5hq8c as $m4is_s2ge5 => $m4is_w_o7al) { if ( ! isset($m4is_wov2['settings'][$m4is_s2ge5]) ) { $m4is_wov2['settings'][$m4is_s2ge5] = $m4is_w_o7al;
 } } if (empty($m4is_wov2['infusionsoft']) ) { $m4is_wov2['infusionsoft'] = [];
 }  $m4is_lsaejl = [ ];
 foreach ($m4is_lsaejl as $m4is_s2ge5) { unset($m4is_wov2['infusionsoft'][$m4is_s2ge5]);
 } $m4is_k5hq8c = [ ];
 foreach ($m4is_k5hq8c as $m4is_s2ge5 => $m4is_w_o7al) { if (empty($m4is_wov2['infusionsoft'][$m4is_s2ge5]) ) { $m4is_wov2['infusionsoft'][$m4is_s2ge5] = $m4is_w_o7al;
 } } $m4is_wov2 = self::m4is_iib7($m4is_wov2);
 $m4is_wov2 = self::m4is_dlu1y($m4is_wov2);
 $m4is_wov2['settings']['version'] = trim(get_plugin_data(MEMBERIUM_HOME, false, false)['Version']);
 add_option('memberium', $m4is_wov2, '', 'yes');
 update_option('memberium', $m4is_wov2, 'yes');
 self::$m4is_bnd6ti->m4is_qdi_3o($m4is_wov2);
 return $m4is_wov2;
 } static private 
function m4is_iib7( array $m4is_wov2 = [] ) : array { $m4is_lsaejl = [];
 $m4is_k5hq8c = [];
 foreach ($m4is_lsaejl as $m4is_s2ge5) { unset($m4is_wov2['sync'][$m4is_s2ge5]);
 } if (empty($m4is_wov2['sync']) ) { $m4is_wov2['sync'] = [];
 } $m4is_wk1bir = [ 'Email', 'FirstName', 'Groups', 'Id', 'LastName', 'LastUpdated' ];
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2('Contact');
 $m4is_x5wxyr = array_diff($m4is_w_8g, $m4is_wk1bir);
 $m4is_k5hq8c['required_fields']['Contact'] = implode(',', $m4is_wk1bir);
 $m4is_k5hq8c['ignored_sync_fields']['Contact'] = implode(',', $m4is_x5wxyr);
  foreach ($m4is_k5hq8c as $m4is_s2ge5 => $m4is_w_o7al) { if (empty($m4is_wov2['sync'][$m4is_s2ge5]) ) { $m4is_wov2['sync'][$m4is_s2ge5] = $m4is_w_o7al;
 } } return $m4is_wov2;
 } static private 
function m4is_dlu1y(array $m4is_wov2 = []) : array { if (is_array($m4is_wov2['memberships']) ) { foreach ($m4is_wov2['memberships'] as $m4is_s2ge5 => $m4is_w_o7al) { if (! isset($m4is_wov2['memberships'][$m4is_s2ge5]['main_id']) ) { $m4is_wov2['memberships'][$m4is_s2ge5]['main_id'] = $m4is_s2ge5;
 } $m4is__t_zel = 'Memberium ' . $m4is_w_o7al['name'];
 $m4is_p5y94c = sanitize_key('memberium_' . $m4is_w_o7al['name']);
 $m4is_smxn = get_role($m4is_p5y94c);
 if (! $m4is_smxn) { $m4is_smxn = add_role($m4is_p5y94c, $m4is__t_zel);
 } $m4is_smxn->add_cap('read');
 } }  if (is_array($m4is_wov2['memberships']) ) { foreach ($m4is_wov2['memberships'] as $m4is_s2ge5 => $m4is_jzshu) { $m4is_jzshu['main_id'] = isset($m4is_jzshu['main_id']) ? $m4is_jzshu['main_id'] : $m4is_s2ge5;
 $m4is_jzshu['cancel_id'] = isset($m4is_jzshu['cancel_id']) ? $m4is_jzshu['cancel_id'] : 0;
 $m4is_jzshu['level'] = isset($m4is_jzshu['level']) ? $m4is_jzshu['level'] : 0;
 $m4is_jzshu['login_page'] = isset($m4is_jzshu['login_page']) ? $m4is_jzshu['login_page'] : 0;
 $m4is_jzshu['first_login_page'] = isset($m4is_jzshu['first_login_page']) ? $m4is_jzshu['first_login_page'] : 0;
 $m4is_jzshu['logout_page'] = isset($m4is_jzshu['logout_page']) ? $m4is_jzshu['logout_page'] : 0;
 $m4is_jzshu['payf_id'] = isset($m4is_jzshu['payf_id']) ? $m4is_jzshu['payf_id'] : 0;
 $m4is_jzshu['roles'] = is_array($m4is_jzshu['roles']) ? $m4is_jzshu['roles'] : [];
 $m4is_jzshu['suspend_id'] = isset($m4is_jzshu['suspend_id']) ? $m4is_jzshu['suspend_id'] : 0;
 $m4is_jzshu['theme'] = isset($m4is_jzshu['theme']) ? $m4is_jzshu['theme'] : '';
 $m4is_jzshu['login_redirect_priority'] = isset($m4is_jzshu['login_redirect_priority']) ? $m4is_jzshu['login_redirect_priority'] : $m4is_jzshu['level'];
 $m4is_jzshu['payf_homepage'] = isset($m4is_jzshu['payf_homepage']) ? $m4is_jzshu['payf_homepage'] : 0;
 $m4is_jzshu['susp_homepage'] = isset($m4is_jzshu['susp_homepage']) ? $m4is_jzshu['susp_homepage'] : 0;
 $m4is_jzshu['canc_homepage'] = isset($m4is_jzshu['canc_homepage']) ? $m4is_jzshu['canc_homepage'] : 0;
 $m4is_jzshu['dynamic_menus'] = isset($m4is_jzshu['dynamic_menus']) ? $m4is_jzshu['dynamic_menus'] : 0;
 $m4is_wov2['memberships'][$m4is_s2ge5] = $m4is_jzshu;
 } } return $m4is_wov2;
 } static private 
function m4is_li7v0($m4is_p4izs) { if (is_dir($m4is_p4izs) ) { $m4is_p1ihx = glob($m4is_p4izs . '*', GLOB_MARK);
 foreach ($m4is_p1ihx as $m4is_m_mie7) { self::m4is_li7v0($m4is_m_mie7);
 } rmdir($m4is_p4izs);
 } elseif (is_file($m4is_p4izs) ) { unlink($m4is_p4izs);
 } } static private 
function m4is_p8cey2() { global $wpdb;
 $m4is_tovizk = "SELECT SUBSTRING(`option_name`, 12) as `transient` FROM `{$wpdb->options}` WHERE `option_name` like '%_transient_memberium%';";
 $m4is_hpn9y = $wpdb->get_col($m4is_tovizk);
 foreach($m4is_hpn9y as $m4is_ke_fr) { delete_transient($m4is_ke_fr);
 } }  static private 
function m4is_v71eog() { global $wpdb;
 $m4is_tovizk = 'DELETE FROM `' . $wpdb->options . '` WHERE `option_name` LIKE "%telemetry%" ';
 $wpdb->query($m4is_tovizk);
 } static private 
function m4is_zv6jc9() { } static private 
function m4is_a1en() { $m4is_smxn = get_role('administrator');
 if ($m4is_smxn) { $m4is_smxn->add_cap('memberium_view_user_info');
 $m4is_smxn->add_cap('memberium_edit_user_info');
 $m4is_smxn->add_cap('memberium_view_private_comments');
 } } static private 
function m4is_o9bwct( $m4is_vg0jw = 8 ) { if ( function_exists( 'wp_generate_password' ) ) { return wp_generate_password( $m4is_vg0jw, false, false );
 } else { return substr( md5( wp_salt( 'auth' ) . wp_salt( 'logged_in' ) . wp_salt( 'secure_auth' ) . microtime() . mt_rand( 0, 999999999 ) ), 0, $m4is_vg0jw );
 } }  }

