<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_o968i::m4is_x6wv();
 final 
class m4is_o968i {    static private $m4is_bnd6ti;
 static private $m4is_b91t2n = false;
 static private $m4is_bh12zy;
 static private $m4is_q8vgfd = 0;
 static private $m4is_twhic = 0;
 public static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_bh12zy = m4is_w0enbm::m4is_e5l8a9();
 self::$m4is_b91t2n = ! empty( $_GET['debug'] );
 } public static 
function m4is_p50b() { if ( ! m4is_u68pu::m4is_u6mkaw() ) { return;
 } global $wpdb, $wp_rewrite;
 self::$m4is_twhic = microtime( true );
 m4is_aoxw::m4is_g7bv();
 if ( empty( $wp_rewrite ) ) { $wp_rewrite = new WP_Rewrite();
 } $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field', 'Email' );
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_r36qyu = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only', false );
 $m4is_ly9pqf = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'site_ban_tag' );
 $m4is_sol64 = empty( $_GET['auth_key'] ) ? '' : trim( $_GET['auth_key'] );
 $m4is_e2kg = empty( $_GET['Id'] ) ? 0 : (int) $_GET['Id'];
 $m4is_e2kg = empty( $_GET['contactId'] ) ? $m4is_e2kg : (int) trim( $_GET['contactId'] );
 $m4is_ae8w = empty( $_GET['orderId'] ) ? 0 : (int) $_GET['orderId'];
 $m4is_euyfd = empty( $_GET[$m4is_powbq2] ) ? '' : $_GET[$m4is_powbq2];
 $m4is_euyfd = empty( $_GET['Contact0Email'] ) ? $m4is_euyfd : $_GET['Contact0Email'];
 $m4is_euyfd = empty( $_GET['inf_field_Email'] ) ? $m4is_euyfd : $_GET['inf_field_Email'];
 $m4is_euyfd = strtolower( trim( strtr( $m4is_euyfd, ' ', '+' ) ) );
 $m4is_osi9 = empty( $_GET['tag_ids']) ? '' : trim( $_GET['tag_ids'] );
 $m4is_x0_hk = false;
 $m4is__ehnsy = false;
 $m4is_tp9n02 = ! empty($_GET['inf_field_BrowserLanguage']);
 $m4is_uyijk = false;
 $m4is__7cx = self::m4is_snwiaq($_GET);
 self::m4is_gxwvr( 'Starting Request at ' . self::$m4is_twhic );
  if (! empty( $m4is__7cx ) ) { self::$m4is_bh12zy->m4is_bs9z4( $m4is__7cx );
 }  self::m4is_gxwvr( 'Starting Order Check at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 if ( empty( $m4is_e2kg ) && ! empty( $m4is_ae8w ) ) { $m4is_e2kg = self::m4is_r146( $m4is_ae8w );
 } self::m4is_gxwvr( 'Completing Order Check at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 self::$m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $m4is_e2kg, 'autologin', 'Autologin' );
 $m4is_rbwn1z = empty( $_SERVER['REQUEST_URI'] ) ? serialize( $_GET ) : $_SERVER['REQUEST_URI'];
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, 'Parameters ' . $m4is_rbwn1z );
 self::m4is_gxwvr(__LINE__ . ' - NOTICE:  Email = ' . $m4is_euyfd);
 self::m4is_gxwvr(__LINE__ . ' - NOTICE:  Contact ID = ' . $m4is_e2kg);
 self::m4is_gxwvr(__LINE__ . ' - NOTICE:  Order ID = ' . $m4is_ae8w);
 self::m4is_gxwvr(__LINE__ . ' - NOTICE:  Redirect URL set to ' . $m4is__7cx);
 self::m4is_yd40t( $m4is_sol64 );
 self::m4is_xi9w( $m4is_e2kg );
 self::m4is_xnphf( $m4is_euyfd );
 $m4is_p9r_8e = self::m4is_htw1( $m4is_e2kg );
 self::m4is_fb1xw4( $m4is_p9r_8e );
 $m4is_p9r_8e = self::m4is_icz_b( $m4is_e2kg, $m4is_euyfd, $m4is_p9r_8e );
 self::m4is_t_nqgz($m4is_e2kg, $m4is_euyfd, $m4is_p9r_8e);
 $m4is_x0_hk = get_user_by( 'email', $m4is_euyfd );
 self::m4is_tbd2($m4is_x0_hk);
 self::m4is_gxwvr('Starting WP User Update at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic) );
 self::$m4is_bnd6ti->m4is_b34y( $m4is_e2kg );
 $m4is_x0_hk = get_user_by( 'email', $m4is_euyfd );
 self::m4is_gxwvr( 'Completing WP User Update at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 self::m4is_eb5102( $m4is_x0_hk );
 self::m4is_j1crtn( $m4is_x0_hk );
 self::m4is_g5qivs( $m4is_e2kg, $m4is__7cx );
 self::m4is_gxwvr( 'Starting Login at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 self::m4is_b7ec( $m4is_osi9, $m4is_e2kg );
 $m4is_ig9p6 = $m4is_x0_hk->ID;
 $_POST['pwd'] = $m4is_p9r_8e[$m4is_dcf_7];
 $_SESSION = empty($_SESSION['memb_user']) ? self::$m4is_bnd6ti->m4is_akz3($m4is_ig9p6) : $_SESSION;
 $m4is_x0_hk = m4is_ypvg9::m4is__ik7lz($m4is_x0_hk);
 if ( is_a( $m4is_x0_hk, 'WP_User' ) ) { m4is_ypvg9::m4is__tje( $m4is_euyfd );
 wp_set_current_user($m4is_ig9p6);
 $m4is_x0_hk = apply_filters('wp_authenticate_user', $m4is_x0_hk, '');
 self::$m4is_bnd6ti->m4is_q285('do_autologin');
 } self::m4is_gxwvr('Completing Login at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 self::m4is_ewtxj($m4is_x0_hk);
 $_SESSION['memb_user']['autologin'] = 1;
 wp_set_auth_cookie($m4is_ig9p6);
 self::$m4is_bh12zy->m4is_q06g4q($m4is_p9r_8e, $m4is_ig9p6);
 $m4is__7cx = self::m4is_ba51m($m4is__7cx, $m4is_x0_hk);
 if (self::$m4is_b91t2n) { echo 'Completing Successful Login at ', microtime( true ), ' / ', microtime( true ) - self::$m4is_twhic ,'<br />';
 echo '<pre>', print_r($_SESSION, true), '</pre>';
 die();
 } do_action('wp_login', $m4is_euyfd, $m4is_x0_hk);
 session_write_close();
 wp_redirect($m4is__7cx, 302, 'Memberium Autologin');
 exit;
 } static private 
function m4is_gxwvr($m4is_wbgl5s) { if (self::$m4is_b91t2n) { echo $m4is_wbgl5s, '<br>';
 } } static private 
function m4is_r146($m4is_ae8w = 0) { $m4is_e2kg = 0;
 $m4is_w_8g = ['ContactId'];
 $m4is_auoz = m4is_ho3l::m4is_kjosf7('Job', $m4is_ae8w, $m4is_w_8g);
 if (is_array($m4is_auoz) ) { $m4is_e2kg = (int) $m4is_auoz['ContactId'];
 } else { sleep(1);
 $m4is_auoz = m4is_ho3l::m4is_kjosf7('Job', $m4is_ae8w, $m4is_w_8g);
 if (is_array($m4is_auoz) ) { $m4is_e2kg = (int) $m4is_auoz['ContactId'];
 } } return $m4is_e2kg;
 } static private 
function m4is_btpce($m4is_x0_hk) {  $m4is_isjfwm = false;
 if (is_a($m4is_x0_hk, 'WP_User')) { $m4is_s5joxl = [ 'manage_options', 'edit_plugins', 'edit_themes', 'edit_users', 'create_users', 'delete_users', 'delete_others_pages', 'delete_others_posts', 'edit_others_pages', 'edit_others_posts', ];
 foreach($m4is_s5joxl as $m4is_ferk6j) { if (user_can($m4is_x0_hk, $m4is_ferk6j) ) { $m4is_isjfwm = true;
 m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'User is a non-subscriber:  ' . $m4is_ferk6j);
 if (self::$m4is_b91t2n) echo __LINE__, ' - Blocked Capability:  ' . $m4is_ferk6j . '<br />';
 break;
 } } } return $m4is_isjfwm;
 }  static private 
function m4is_snwiaq( $m4is_t6r3xw ) { $m4is__7cx = empty( $m4is_t6r3xw['redir'] ) ? '' : $m4is_t6r3xw['redir'];
 $m4is_gqid = self::m4is_v807( $m4is_t6r3xw );
 $m4is_fdqr4 = apply_filters('memberium/autologin/redirect/parameters', $m4is_gqid, $m4is_t6r3xw);
 foreach($m4is_fdqr4 as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_fdqr4[$m4is_s2ge5] = rawurlencode($m4is_w_o7al);
 } return add_query_arg($m4is_fdqr4, $m4is__7cx);
 }  static private 
function m4is_v807($m4is_t6r3xw = []) { $m4is_flx71n = [ 'affiliate', 'utm_campaign', 'utm_content', 'utm_medium', 'utm_source', 'utm_term', ];
 $m4is_flx71n = apply_filters('memberium/autologin/redirect/whitelised_params', $m4is_flx71n);
 $m4is_gqid = [];
 foreach( $m4is_flx71n as $m4is_s2ge5 ) { if ( isset($m4is_t6r3xw[$m4is_s2ge5] ) ) { $m4is_gqid[$m4is_s2ge5] = $m4is_t6r3xw[$m4is_s2ge5];
 } } return $m4is_gqid;
 }  static private 
function m4is_yd40t($m4is_sol64 = '') { $m4is_bm7d = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'autologin_authkeys' ) ) );
 if (empty($m4is_sol64) || ! in_array($m4is_sol64, $m4is_bm7d) ) { m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Failure - Auth Key Mismatch');
 self::m4is_gxwvr(__LINE__ . ' - FAILURE:  Auth Key mismatch');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } } static private 
function m4is_xi9w($m4is_e2kg = 0) { if (! $m4is_e2kg) { m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Failure - No Contact Id');
 self::m4is_gxwvr(__LINE__ . ' - FAILURE:  Invalid Contact ID');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } } static private 
function m4is_xnphf($m4is_euyfd) { if (empty($m4is_euyfd) ) { m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Failure - Email address not populated');
 self::m4is_gxwvr(__LINE__ . ' - FAILURE:  Email address not populated');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } } static private 
function m4is_fb1xw4($m4is_p9r_8e) { if (empty($m4is_p9r_8e) ) { m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Failure - No contact data found');
 self::m4is_gxwvr(__LINE__ . ' - FAILURE:  Empty Contact Record');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } }  static private 
function m4is_eb5102($m4is_x0_hk) { if (! $m4is_x0_hk) { m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Failure - User not found');
 self::m4is_gxwvr(__LINE__ . ' - FAILURE:  User not found');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } }  static private 
function m4is_j1crtn($m4is_x0_hk) { $m4is_isjfwm = self::m4is_btpce($m4is_x0_hk);
 if ($m4is_isjfwm) { $m4is_jadl06 = 'FAILURE:  Auto-Login attempt by non-subscriber';
 self::m4is_gxwvr($m4is_jadl06);
 m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, $m4is_jadl06);
  wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 exit;
 } self::m4is_gxwvr('Role Check Complete');
 }  static private 
function m4is_htw1(int $m4is_e2kg) { $m4is_du_v = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'max_contact_age', 0 );
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( $m4is_e2kg );
 $m4is_uyijk = empty( $m4is_p9r_8e );
 $m4is_uyijk = $m4is_uyijk || empty( $m4is_p9r_8e['!LastUpdated'] );
 $m4is_uyijk = $m4is_uyijk || ( time() - $m4is_p9r_8e['!LastUpdated'] > $m4is_du_v );
 if ( $m4is_uyijk ) { self::m4is_gxwvr( 'Starting Contact Sync at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 self::$m4is_bnd6ti->m4is_leu58( $m4is_e2kg );
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( $m4is_e2kg );
 self::m4is_gxwvr( 'Completing Contact Sync at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 } return $m4is_p9r_8e;
 }  static private 
function m4is_t_nqgz( $m4is_e2kg, $m4is_euyfd, $m4is_p9r_8e ) { $m4is__r_027 = empty($m4is_p9r_8e['Id']) ? 0 : (int) $m4is_p9r_8e['Id'];
 $m4is_qnqeo = empty($m4is_p9r_8e['Email']) ? 0 : strtolower(trim($m4is_p9r_8e['Email']) );
 if ($m4is__r_027 <> $m4is_e2kg || $m4is_euyfd <> $m4is_qnqeo) { m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Failure - Autologin does not match CRM');
 self::m4is_gxwvr('Autologin contact does not match CRM contact');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } }  static private 
function m4is_icz_b($m4is_e2kg, $m4is_euyfd, $m4is_p9r_8e) { $m4is_h01s5n = empty($_GET['forcelogin']) ? '' : $_GET['forcelogin'];
 if ($m4is_h01s5n) { $m4is_x0_hk = get_user_by('email', $m4is_euyfd);
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'password_field');
 if (empty($m4is_p9r_8e[$m4is_dcf_7]) ) { $m4is_e82v = self::$m4is_bnd6ti->m4is_e9m0g();
 $m4is_p9r_8e[$m4is_dcf_7] = $m4is_e82v;
 self::$m4is_bnd6ti->m4is_jtmik_($m4is_e2kg, [$m4is_dcf_7 => $m4is_e82v], true);
 self::$m4is_bnd6ti->m4is_dhpr($m4is_p9r_8e);
 } if (! $m4is_x0_hk) { self::$m4is_bnd6ti->m4is_b34y($m4is_e2kg);
 } self::m4is_gxwvr('Force Login at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic) );
 } return $m4is_p9r_8e;
 }  static private 
function m4is_tbd2($m4is_x0_hk) { $m4is_vzeli = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'known_logins_only', false);
 if ($m4is_vzeli) { if (! $m4is_x0_hk) { self::m4is_gxwvr(__LINE__ . ' - FAILURE:  No matching WP User, known logins only');
 m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Known Login Check Failed.');
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } } }  static private 
function m4is_ewtxj($m4is_x0_hk) { if (! is_a($m4is_x0_hk, 'WP_User')) { $m4is_jadl06 = is_a($m4is_x0_hk, 'WP_Error') ? strip_tags($m4is_x0_hk->get_error_message() ) : 'Authentication / Login Error';
 wp_set_current_user(0);
 self::m4is_gxwvr('FAILURE:  ' . $m4is_jadl06);
 m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, $m4is_jadl06);
 if (! self::$m4is_b91t2n) { wp_redirect(get_bloginfo('wpurl'), 302, 'Memberium Autologin Failure');
 } exit;
 } }  static private 
function m4is_g5qivs($m4is_e2kg, $m4is__7cx) { if (is_user_logged_in() ) { $m4is_jadl06 = 'Login Session Exists, Logging Out';
 m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, 'Already Logged In, Redirecting');
 self::m4is_gxwvr($m4is_jadl06);
 if (m4is_wbc8os::m4is_jjgo() == $m4is_e2kg) { if (empty($m4is__7cx) ) { if (! empty($_SESSION['memb_user']['login_page']) ) { $m4is__7cx = get_permalink($_SESSION['memb_user']['login_page']);
 } } if (empty($m4is__7cx) ) { $m4is__7cx = get_site_url();
 } wp_redirect($m4is__7cx, 302, 'Memberium Autologin - User Logged In');
 exit;
 } m4is__gu52::m4is_qyunz0(self::$m4is_q8vgfd, $m4is_jadl06);
 wp_destroy_current_session();
 wp_clear_auth_cookie();
 self::$m4is_bnd6ti->m4is_nekv();
 } }  static private 
function m4is_ba51m($m4is__7cx, $m4is_x0_hk) { $m4is_ppcwar = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'first_login_page');
 $m4is_ig9p6 = $m4is_x0_hk->ID;
 if (empty($m4is__7cx) ) { if ($m4is_ppcwar) { if (get_user_meta($m4is_ig9p6, 'login_count', true) == 0) { $m4is__7cx = get_permalink($m4is_ppcwar);
 } } } if (empty($m4is__7cx) ) { $m4is__7cx = empty($_SESSION['memb_user']['login_page']) ? get_home_url() : get_permalink($_SESSION['memb_user']['login_page']);
 } return $m4is__7cx;
 }  static private 
function m4is_b7ec( $m4is_osi9, $m4is_e2kg ) { if ( ! empty( $m4is_osi9 ) ) { self::m4is_gxwvr( 'Starting Adding Tags at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic) );
 self::m4is_gxwvr( 'Setting Tags: ' . $m4is_osi9);
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, 'Setting Tags', $m4is_osi9 );
 self::$m4is_bnd6ti->m4is_tcle75( $m4is_osi9, $m4is_e2kg );
 self::m4is_gxwvr( 'Completing Adding Tags at ' . microtime( true ) . ' / ' . ( microtime( true ) - self::$m4is_twhic ) );
 } } }

