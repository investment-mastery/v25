<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_m_rh3::m4is_x6wv();
 final 
class m4is_m_rh3 { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 } static 
function m4is_ai4wb() { m4is_u68pu::m4is_tlsf();
 self::m4is_u80sw6();
 self::$m4is_bnd6ti->m4is_b0952z();
 } static 
function m4is_u80sw6() { if ( ! self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_ecommerce', false ) ) { return;
 } m4is_untczd::m4is_ypsh6m();
 }  static 
function m4is_ucv1x() { $m4is_jv9xhf = 'RecurringOrder';
 $m4is_a0pejg = 1000;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_q8vgfd = m4is__gu52::m4is_eh6lg( 0, 'cron', 'Expiring Subscriptions' );
 date_default_timezone_set( 'America/New_York' );
 $m4is_jl7j9 = date('Y-m-d');
 $m4is__u5v = [ 'Id', ];
 $m4is_jo8fb = [ 'Status' => 'Active', 'EndDate' => '~<=~' . $m4is_jl7j9, ];
 $m4is_yvy8 = m4is_ho3l::m4is_mg4uyc( $m4is_jv9xhf, $m4is_a0pejg, 0, $m4is_jo8fb, $m4is__u5v );
 if ( is_array( $m4is_yvy8 ) ) { $m4is_mzcd = ['Status' => 'Inactive'];
 if ( empty( $m4is_b9p20 ) ) { m4is__gu52::m4is_qyunz0( $m4is_q8vgfd, "No active expired recurring orders found.\n" );
 } else { foreach( $m4is_yvy8 as $m4is_vky3j ) { m4is_ho3l::m4is_btu_( $m4is_jv9xhf, (int) $m4is_vky3j['Id'], $m4is_mzcd);
 m4is__gu52::m4is_qyunz0( $m4is_q8vgfd, "Deactivating Recurring Order #{$m4is_vky3j['Id']}\n" );
 usleep(250000);
 } } } } static 
function m4is_jdjyia() { $m4is_g5ju = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_scan_tag', 0 );
 $m4is__rl4q = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_success_tag', 0 );
 $m4is_d3ij = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_success_actionset', 0 );
 $m4is_qva35q = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_scan_size', 0 );
 $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field', 'Email' );
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field', 'Password' );
 if ( ( ! $m4is_g5ju ) || ( ! $m4is__rl4q && ! $m4is_d3ij ) ) { return;
 } $m4is_q8vgfd = m4is__gu52::m4is_eh6lg( 0, 'cron', 'scanMakePass Started' );
  $m4is__u5v = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 $m4is_jo8fb = [ 'Groups' => $m4is_g5ju, ];
 $m4is_k8uzp = m4is_ho3l::m4is_mlhu4('Contact', $m4is_qva35q, 0, $m4is_jo8fb, $m4is__u5v, 'LastUpdated', false);
 if (is_array($m4is_k8uzp) ) { foreach($m4is_k8uzp as $m4is_p9r_8e) { $m4is_e2kg = isset($m4is_p9r_8e['Id']) ? (int) $m4is_p9r_8e['Id'] : 0;
 $m4is_g74vi = isset($m4is_p9r_8e[$m4is_powbq2]) ? strtolower(trim($m4is_p9r_8e[$m4is_powbq2]) ) : '';
 $m4is_ju50i = isset($m4is_p9r_8e['Email']) ? strtolower(trim($m4is_p9r_8e['Email']) ) : '';
 $m4is_ppfjb = isset($m4is_p9r_8e[$m4is_dcf_7]) ? $m4is_p9r_8e[$m4is_dcf_7] : '';
 $m4is_osrq6 = $m4is_p9r_8e['Groups'];
 $m4is_m5mq = false;
 $m4is_nghnf = false;
 $m4is__xn_jt = [];
 m4is__gu52::m4is_qyunz0($m4is_q8vgfd, "Contact ID = {$m4is_e2kg}, Username = {$m4is_g74vi}");
 if (empty($m4is_e2kg) ) { break;
 } if (empty($m4is_g74vi) ) { $m4is__xn_jt[$m4is_powbq2] = $m4is_ju50i;
 $m4is_p9r_8e[$m4is_powbq2] = $m4is_ju50i;
 $m4is_gai6k = $m4is_ju50i;
 }  if (username_exists($m4is_gai6k) || email_exists($m4is_gai6k) ) { $m4is_oa_z = m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt);
  self::$m4is_bnd6ti->m4is_tcle75("-{$m4is_g5ju}", $m4is_e2kg);
 self::$m4is_bnd6ti->m4is_tcle75("{$m4is__rl4q}", $m4is_e2kg);
 break;
 } if (empty($m4is_p9r_8e[$m4is_dcf_7]) ) { $m4is_p9r_8e[$m4is_dcf_7] = self::$m4is_bnd6ti->m4is_e9m0g();
 $m4is__xn_jt[$m4is_dcf_7] = $m4is_p9r_8e[$m4is_dcf_7];
 $m4is_oa_z = m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt);
  } self::$m4is_bnd6ti->m4is_dhpr($m4is_p9r_8e);
  $m4is_av461f = [];
 $m4is_av461f['user_login'] = $m4is_p9r_8e[$m4is_powbq2];
 $m4is_av461f['user_pass'] = $m4is_p9r_8e[$m4is_dcf_7];
 $m4is_av461f['first_name'] = isset($m4is_p9r_8e['FirstName']) ? trim($m4is_p9r_8e['FirstName']) : '';
 $m4is_av461f['last_name'] = isset($m4is_p9r_8e['LastName']) ? trim($m4is_p9r_8e['LastName']) : '';
 $m4is_av461f['user_url'] = isset($m4is_p9r_8e['Website']) ? trim($m4is_p9r_8e['Website']) : '';
 $m4is_av461f['user_email'] = isset($m4is_p9r_8e['Email']) ? strtolower(trim($m4is_p9r_8e['Email']) ) : '';
 $m4is_k4yeul = [ 'contact' => $m4is_p9r_8e ];
 $_POST['pass1'] = $m4is_p9r_8e[$m4is_dcf_7];
 $m4is_av461f['display_name'] = apply_filters( 'memberium/wpuser/display_name', self::$m4is_bnd6ti->m4is_ga37( $m4is_k4yeul ), $m4is_p9r_8e );
 $m4is_av461f['nickname'] = apply_filters( 'memberium/wpuser/nickname', $m4is_av461f['display_name'], $m4is_p9r_8e);
 $m4is_av461f['user_nicename'] = apply_filters( 'memberium/wpuser/nicename', sanitize_title( $m4is_av461f['nickname'], $m4is_av461f['display_name'] ), $m4is_p9r_8e );
 $m4is_o90yg = self::$m4is_bnd6ti->m4is_b34y($m4is_e2kg);
 if (is_int($m4is_o90yg) && $m4is_o90yg > 0) { self::$m4is_bnd6ti->m4is_wday($m4is_e2kg, $m4is_o90yg);
 do_action('user_register', $m4is_o90yg);
 if (is_multisite() && ! is_user_member_of_blog($m4is_o90yg) ) { $m4is_zjx_ = get_current_blog_id();
 $m4is_e_u17 = get_blog_option( $m4is_zjx_, 'default_role', 'subscriber' );
 add_user_to_blog( $m4is_zjx_, $m4is_o90yg, $m4is_e_u17 );
 } if (function_exists('WPCW_actions_users_newUserCreated') ) { WPCW_actions_users_newUserCreated($m4is_o90yg);
 } } if (! empty($m4is_g5ju) ) { self::$m4is_bnd6ti->m4is_tcle75("-{$m4is_g5ju}", $m4is_e2kg);
 } if (! empty($m4is__rl4q) ) { self::$m4is_bnd6ti->m4is_tcle75($m4is__rl4q, $m4is_e2kg);
 } if (! empty($m4is_d3ij) ) { self::$m4is_bnd6ti->m4is_u86vzq($m4is_d3ij, $m4is_e2kg);
 } usleep( 250000 );
 if ( MEMBERIUM_ERRORLOG ) error_log( 'scanMakePass Contact Id: ' . $m4is_p9r_8e['Id'], 0 );
  } } }    private static 
function m4is_uqy9l() { global $wpdb;
 $m4is_dj_2 = MEMBERIUM_DB_QUEUE;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_tovizk = "SELECT count(*) FROM `{$m4is_dj_2}` WHERE `appname` = '{$m4is_zq0k}' AND `actiontype` = 'contactupdate'";
 return $wpdb->get_var($m4is_tovizk);
 } private static 
function m4is_wij4b3() { global $wpdb;
 $m4is_kobi = 0;
 if (self::m4is_uqy9l() ) { $m4is_dj_2 = MEMBERIUM_DB_QUEUE;
 $m4is_tovizk = "SELECT `id`, `data` FROM `{$m4is_dj_2}` WHERE `actiontype` = 'contactupdate' ORDER BY `id` ASC ";
 $m4is_hpn9y = $wpdb->get_results($m4is_tovizk, OBJECT_K);
 if (is_array($m4is_hpn9y)) { foreach($m4is_hpn9y as $m4is_j5sy07 => $m4is_ke_fr) { $m4is_kobi++;
 } } } return $m4is_kobi;
 } private static 
function m4is_zayv($m4is_e2kg) { global $wpdb;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_dj_2 = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "SELECT `value` FROM `{$m4is_dj_2}` WHERE `id` = {$m4is_e2kg} AND `appname` = '{$m4is_zq0k}' AND `fieldname` = 'LastUpdated'";
 return $wpdb->get_var($m4is_tovizk);
 } private static 
function m4is_ui4tg2($m4is_p9r_8e) { global $wpdb;
 $m4is_e2kg = isset($m4is_p9r_8e['Id']) ? $m4is_p9r_8e['Id'] : 0;
 if ($m4is_e2kg) { $m4is_dj_2 = MEMBERIUM_DB_QUEUE;
 $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `contactid` = {$m4is_e2kg} AND `action` = 'contactupdate';";
 $m4is_tovizk = "INSERT INTO `{$m4is_dj_2}` () VALUES ()";
 } } private static 
function m4is_sh4i() { global $wpdb;
 $m4is_u54rc = get_option('memberium/contact/scan', '2000-01-01T00:00:00');
 $m4is_dj_2 = 'Contact';
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2($m4is_dj_2, true);
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_qrgskj = 'LastUpdated';
 $m4is_f8qb1a = 1;
 $m4is_jo8fb = [ 'Groups' => '%', 'LastUpdated' => "~>=~ {$m4is_u54rc}",  ];
 $m4is_k8uzp = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is_w_8g, $m4is_qrgskj, $m4is_f8qb1a);
 if (is_array($m4is_k8uzp)) { foreach($m4is_k8uzp as $m4is_p9r_8e) { $m4is_e2kg = $m4is_p9r_8e['Id'];
 $m4is_z5wiy = $m4is_p9r_8e['LastUpdated'];
 } } echo '<Pre>', count($m4is_k8uzp), '</Pre>';
 echo '<Pre>', print_r($m4is_k8uzp, true), '</Pre>';
 echo '<Pre>', print_r($m4is_w_8g, true), '</Pre>';
 } static 
function m4is_n3_9j() { self::m4is_wij4b3();
 self::m4is_sh4i();
 } }

