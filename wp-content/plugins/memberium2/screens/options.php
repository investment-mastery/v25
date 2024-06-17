<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 
class m4is_miq3op { private static $m4is_tu86mz;
 private static $m4is_bnd6ti;
 private static $m4is_r2l5;
 static 
function m4is_xexw() { self::m4is_x6wv();
 self::m4is_dlc0b();
 self::$m4is_bnd6ti->m4is_q285( 'view_options' );
 } private static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_tu86mz = m4is_q1zh2::get_instance();
 self::$m4is_r2l5 = isset( $_GET['tab'] ) ? $_GET['tab'] : 'login';
 } private static 
function m4is_dlc0b() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } if ( empty( $_POST['memberium_options_nonce'] ) ) { return;
 } if ( ! wp_verify_nonce( $_POST['memberium_options_nonce'], self::$m4is_bnd6ti->m4is_wdqrsb() ) ) { wp_die( 'nonce error' );
 return;
 } self::m4is_sztwf();
 self::m4is_pcn2();
 self::m4is_tt3o();
 self::m4is_ccin();
 self::m4is_ezs0();
 } private static 
function m4is_sztwf() { if ( isset( $_POST['pages'] ) && is_array( $_POST['pages'] ) ) { $m4is_xb7ix = (array) get_option( 'memberium_pages', [] );
 foreach ( $_POST['pages'] as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_xb7ix[$m4is_s2ge5] = $m4is_w_o7al;
 } update_option( 'memberium_pages', $m4is_xb7ix, true );
 } } private static 
function m4is_pcn2() { if ( ! isset( $_POST['extensions'] ) ) { return;
 } $m4is_p5kpm = get_option( 'memberium_extensions', [] );
 foreach($_POST['extensions'] as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_p5kpm[$m4is_s2ge5] = $m4is_w_o7al;
 } update_option('memberium_extensions', $m4is_p5kpm, true );
 } private static 
function m4is_tt3o() { $m4is_w2w8 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings' );
  $m4is_flx71n = [ 'allow_autologin', 'allow_local_logins', 'allow_wpadmin', 'attachment_pages', 'autogenerate_excerpts', 'autoupdate', 'beta_update_check', 'beta/oauth', 'cache_bust', 'cache_flush', 'db_sessions', 'disable_displayname_update', 'disable_login_sync', 'disable_lost_password', 'disable_password_reset', 'disable_xframe', 'dynamic_menus', 'enable_slug_update', 'extended_reg_fields', 'fast_user_list', 'force_learndash_inheritance', 'httppost_log', 'known_logins_only', 'local_auth_only', 'login_log', 'microcache_compat_session', 'multi_language', 'page_inheritance', 'persistent_login', 'plaintext_db', 'preview_mode', 'protect_feeds', 'recaptcha_v2', 'require_membership', 'show_advanced_options', 'show_post_columns', 'simultaneous_logins', 'site_lock_enabled', 'sync_affiliate', 'sync_ecommerce', 'sync_meta_updates', 'sync_new_wp_users', 'sync_tag_details', 'telemetry', 'two_pass_shortcode_filter', ];
 foreach($m4is_flx71n as $m4is_s2ge5 ) { $m4is_w2w8[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? (int) (bool) trim( $_POST[$m4is_s2ge5] ) : $m4is_w2w8[$m4is_s2ge5];
 }  $m4is_flx71n = [ 'allow_wpadmin_dashboard', 'allow_wpadmin_role', 'allow_wpadmin_titlebar', 'debug_ip', 'default_page_redirect', 'default_prohibited_action', 'default_reglink_tag', 'displayname_format', 'facebook_app_id', 'global_excerpt', 'include_default_excerpt', 'last_login_field', 'password_field', 'recaptcha_v2_secret_key', 'recaptcha_v2_site_key', 'registration_url', 'spiffy_api_key', 'spiffy_subdomain', 'username_field', ];
 foreach($m4is_flx71n as $m4is_s2ge5 ) { $m4is_w2w8[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? stripslashes( trim( $_POST[$m4is_s2ge5] ) ) : $m4is_w2w8[$m4is_s2ge5];
 }  $m4is_flx71n = [ 'async_limit', 'async_tag', 'autologout_time', 'bruteforce_check', 'excerpt_length', 'first_login_page', 'login_actionset', 'login_log_length', 'login_tag', 'login_url', 'logout_actionset', 'logout_tag', 'max_affiliate_age', 'max_contact_age', 'maximum_login_ips', 'maximum_login_timeframe', 'min_password_length', 'new_user_registration_tag', 'password_reset_tag', 'password_strength', 'session_timeout', 'site_ban_tag', 'wp_autop',  ];
 foreach($m4is_flx71n as $m4is_s2ge5 ) { $m4is_w2w8[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? (int) trim($_POST[$m4is_s2ge5] ) : $m4is_w2w8[$m4is_s2ge5];
 }  if ( isset( $m4is_w2w8['login_log_length'] ) && isset( $m4is_w2w8['maximum_login_timeframe'] ) && $m4is_w2w8['login_log_length'] > 0 ) { if ( $m4is_w2w8['login_log_length'] < ( $m4is_w2w8['maximum_login_timeframe'] / 24 ) ) { $m4is_w2w8['login_log_length'] = ceil( $m4is_w2w8['maximum_login_timeframe'] / 24 );
 } } self::$m4is_bnd6ti->m4is_qdi_3o( $m4is_w2w8, 'settings' );
 } private static 
function m4is_ccin() { if ( ! isset( $_POST['autologin_authkeys'] ) ) { return;
 } $m4is_w2w8 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings' );
 $m4is_pxu_6 = array_filter( explode( ',', $_POST['autologin_authkeys'] ) );
 $m4is_y2qsn = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_se2n8()->getConfigurationOption( 'http_post_key' ) ) );
 $m4is_x28vyn = false;
 foreach ( $m4is_pxu_6 as $m4is_j5sy07 => $m4is_s2ge5 ) { $m4is_s2ge5 = trim( $m4is_s2ge5 );
 foreach ( $m4is_y2qsn as $m4is_i2in ) { if ( strtolower( trim( $m4is_i2in ) == strtolower( trim( $m4is_s2ge5 ) ) ) ) { $m4is_x28vyn = true;
 unset( $m4is_pxu_6[$m4is_j5sy07] );
 } } } $m4is_w2w8['autologin_authkeys'] = trim( implode( ',', array_filter( $m4is_pxu_6 ) ), ',' );
 self::$m4is_bnd6ti->m4is_qdi_3o( $m4is_w2w8, 'settings' );
 } private static 
function m4is_hdytg() { if ( ! isset( $_POST['page_load'] ) ) { return;
 } if ( $_POST['page_load'] == 'Load All Templates' ) { $m4is__2o5j = self::$m4is_tu86mz->m4is_a19w0();
 foreach($m4is__2o5j as $template_id => $template ) { self::$m4is_tu86mz->m4is_qyu_c( 0, $template_id );
 } } elseif ( $_POST['page_load'] == 'Load Single Template' ) { $m4is_vu9x = (int) $_POST['target_post_id'];
 $m4is_qhma = (int) $_POST['template_id'] - 1;
 self::$m4is_tu86mz->m4is_qyu_c( $m4is_vu9x, $m4is_qhma );
 } elseif ( $_POST['page_load'] == 'Install Email Templates' ) { $m4is_c3eq = self::$m4is_tu86mz->m4is_m0u3();
 } } private static 
function m4is_ezs0() { if ( ! isset( $_POST['new_crm_field'] ) ) { return;
 } $_POST['new_crm_field'] = trim( $_POST['new_crm_field'] );
 m4is_a8iaym::m4is_pprm($_POST['new_crm_field'] );
 } } m4is_miq3op::m4is_xexw();
 global $wpdb;
 $_GET['tab'] = isset($_GET['tab'] ) ? $_GET['tab'] : 'login';
 $m4is_up85 = stripslashes_deep( m4is_pms8y::m4is_e5l8a9()->get_i2sdk_options() );
 $m4is_xb7ix = get_option( 'memberium_pages', [] );
 $m4is_w2w8 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu( 'settings' );
 $m4is_lyo_f5 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu( 'infusionsoft' );
 if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { if ( empty( $_POST['memberium_options_nonce'] ) ) { return;
 } if (! wp_verify_nonce( $_POST['memberium_options_nonce'], m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb() ) ) { wp_die( 'nonce error' );
 return;
 } if (isset($_GET['tab'] ) ) { if ($_GET['tab'] == 'general' ) { $m4is_h_iu0 = explode(',', $m4is_lyo_f5['ignore_contact_fields'] );
 $m4is_h_iu0 = array_flip($m4is_h_iu0 );
 unset($m4is_h_iu0[$m4is_w2w8['password_field']] );
 unset($m4is_h_iu0[$m4is_w2w8['username_field']] );
 $m4is_h_iu0 = array_flip($m4is_h_iu0 );
 $m4is_lyo_f5['ignore_contact_fields'] = implode(',', $m4is_h_iu0 );
 m4is_wr40w::m4is_cxesuf('General Options Updated' );
 } elseif ($_GET['tab'] == 'extensions' ) { m4is_wr40w::m4is_cxesuf('Updates Options Updated' );
 } elseif ($_GET['tab'] == 'http-post' ) { $_POST['autologin_authkeys'] = trim(implode(',', $m4is_pxu_6 ), ',' );
 m4is_wr40w::m4is_cxesuf('Options Updated' );
 if ($m4is_x28vyn ) { m4is_wr40w::m4is_cxesuf('You cannot re-use I2SDK Keys as Autologin Keys for security reasons' . m4is_wr40w::m4is_vgnp(363 ) );
 } else { $m4is_w2w8['autologin_authkeys'] = $_POST['autologin_authkeys'];
 } unset($m4is_s2ge5, $m4is_i2in, $m4is_x28vyn, $m4is_y2qsn, $m4is_pxu_6 );
 m4is_wr40w::m4is_cxesuf('HTTP POST Options Updated' );
 } } global $wp_rewrite;
 $wp_rewrite->flush_rules();
 } $m4is_mz13 = m4is_q1zh2::get_instance()->m4is_erz_8();
   $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_apvd = [];
 $m4is_apvd[] = [ 'id' => 0, 'text' => '(None)' ];
 foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => $m4is_mpia . ' (' . $m4is_j5sy07 . ')' ];
 } $m4is_apvd = json_encode($m4is_apvd );
 unset($m4is_iystd2, $m4is_j5sy07, $m4is_mpia );
 echo '<script>';
 echo 'var pagelist      = ', $m4is_mz13, ';';
 echo 'var actionsetlist = ', m4is_tvc2xn::m4is_gi6g3l(), ';';
 echo 'var taglist       = ', $m4is_apvd, ';';
 echo '</script>';
 unset($m4is_apvd, $m4is_mz13, $json_actionsets );

