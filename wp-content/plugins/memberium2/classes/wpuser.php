<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_n9cgzx::m4is_x6wv();
 final 
class m4is_n9cgzx { private static $m4is_bnd6ti;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 } private 
function __construct() { } static 
function m4is_y0gv_( int $m4is_ig9p6, array $m4is_mhv_pw = [] ) { global $wpdb;
 if ( self::$m4is_bnd6ti->m4is_he_yjv() ) { return;
 } if ( isset( $_POST['createaccount'] ) && empty( $_POST['createaccount'] ) ) { return;
 }  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['memberium_add_contact'] ) && is_admin() ) { if ( $_POST['memberium_add_contact'] <> 'on' ) { return;
 } } if ( empty( self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_new_wp_users' ) ) ) { return;
 }  if ( user_can( $m4is_ig9p6, 'edit_others_posts' ) ) { return;
 } $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field' );
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_r36qyu = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only' );
 $m4is__f8b4 = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'new_user_registration_tag' );
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 $m4is_x0_hk = get_userdata( $m4is_ig9p6 );
 $m4is_auhoe = get_user_meta( $m4is_ig9p6 );
 $m4is_owxosn = isset( $_POST['action'] ) && ( $_POST['action'] == 'createuser' ) && isset( $_POST['createuser'] );
 $m4is_p9r_8e = [];
 $m4is_kd_a34 = 0;
 $m4is_kepn = MEMBERIUM_DB_CONTACTS;
 $m4is_veymi8 = [ 'first_name' => 'FirstName', 'last_name' => 'LastName', 'user_email' => 'Email', 'user_pass' => $m4is_dcf_7, 'user_url' => 'Website', ];
 foreach( $m4is_veymi8 as $m4is_r_laq => $m4is_mh9l ) { if ( ! empty( $m4is_mhv_pw[$m4is_r_laq]) ) { $m4is_p9r_8e[$m4is_mh9l] = $m4is_mhv_pw[$m4is_r_laq];
 } } if ( empty( $m4is_p9r_8e[$m4is_dcf_7] ) ) { $m4is_p9r_8e[$m4is_dcf_7] = self::$m4is_bnd6ti->m4is_gctx0l();
 }  if ( isset( $_POST['wp-submit'] ) && $_POST['wp-submit'] == 'Register' ) { $m4is_p9r_8e['FirstName'] = isset( $_POST['firstname'] ) ? trim( $_POST['firstname'] ) : $m4is_p9r_8e['FirstName'];
 $m4is_p9r_8e['LastName'] = isset( $_POST['lastname'] ) ? trim( $_POST['lastname'] ) : $m4is_p9r_8e['LastName'];
 } $m4is_exjk = apply_filters( 'memberium_registration_field_map', [] );
 foreach( $m4is_exjk as $m4is_rs0z_j => $m4is_e0dhw ) { if ( isset( $m4is_auhoe[$m4is_rs0z_j][0]) ) { $m4is_p9r_8e[$m4is_e0dhw] = trim( $m4is_auhoe[$m4is_rs0z_j][0] );
 } } foreach( $m4is_exjk as $m4is_yziya3 => $m4is_i2in ) { if ( isset( $_POST[$m4is_yziya3] ) ) { $m4is_p9r_8e[$m4is_i2in] = $_POST[$m4is_yziya3];
 } } if ( ! empty( $m4is_kd_a34 ) ) { $m4is_p9r_8e['LeadSourceId'] = $m4is_kd_a34;
 } $m4is_p9r_8e = apply_filters( 'memberium/user/register/fields', $m4is_p9r_8e, $m4is_x0_hk );
 $m4is_p9r_8e = array_filter( $m4is_p9r_8e );
 if ( $m4is_r36qyu ) { unset( $m4is_p9r_8e[$m4is_dcf_7] );
 } if ( empty( $m4is_p9r_8e['Email'] ) ) { return;
 } $m4is_e2kg = m4is_bnrdbo::m4is_klk1gy( $m4is_p9r_8e );
 if ( empty( $m4is_e2kg ) ) { return;
 } $m4is_d4xry = m4is_bnrdbo::m4is_i38y7c( $m4is_e2kg );
 m4is_bnrdbo::m4is_xj2eb( $m4is_p9r_8e['Email'], 'Membership Site Registration' );
 self::$m4is_bnd6ti->m4is_dhpr( $m4is_d4xry );
 if ( $m4is__f8b4 ) { self::$m4is_bnd6ti->m4is_tcle75( [$m4is__f8b4], $m4is_e2kg );
 } if ( $m4is_e2kg ) {  self::$m4is_bnd6ti->m4is_wday( $m4is_e2kg, $m4is_ig9p6 );
 } if ( get_user_meta( $m4is_ig9p6, '_fb_is_sync', true ) != 1) { delete_user_meta( $m4is_ig9p6, '_fb_is_sync' );
 add_user_meta( $m4is_ig9p6, '_fb_is_sync', 1 );
 }    } static 
function m4is_rtidlo( int $m4is_e2kg, string $m4is_j485e = '' ) { global $wpdb;
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( $m4is_e2kg );
 $m4is_fliw = isset( $m4is_p9r_8e['Email'] ) ? $m4is_p9r_8e['Email'] : '';
 if ( empty( $m4is_fliw ) ) { return false;
 } $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field', 'Email' );
 $m4is_gai6k = isset( $m4is_p9r_8e[$m4is_powbq2] ) ? $m4is_p9r_8e[$m4is_powbq2] : '';
 $m4is_gai6k = apply_filters( 'memberium_wordpress_username', $m4is_gai6k, $m4is_p9r_8e );
 if ( empty( $m4is_gai6k ) ) { return false;
 } $m4is_r36qyu = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only', 0);
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field', 'Password' );
 $m4is_j485e = isset( $m4is_p9r_8e[$m4is_dcf_7] ) ? $m4is_p9r_8e[$m4is_dcf_7] : '';
  if ( empty( $m4is_j485e ) && empty( $m4is_r36qyu ) ) { return false;
 }  $m4is_x0_hk = get_user_by( 'email', $m4is_fliw ) or $m4is_x0_hk = get_user_by( 'login', $m4is_fliw ) or $m4is_x0_hk = get_user_by( 'login', $m4is_gai6k ) or $m4is_x0_hk = get_user_by( 'id', m4is_bnrdbo::m4is_d3na( $m4is_e2kg ) );
 if ( ! is_a( $m4is_x0_hk, 'WP_User' ) ) { return false;
 } $m4is_ig9p6 = $m4is_x0_hk->ID;
 $m4is_wlqsgr = [];
 $m4is_w_8g = [ 'Email' => 'user_email', 'FirstName' => 'first_name', 'LastName' => 'last_name', 'Website' => 'user_url', ];
 foreach( $m4is_w_8g as $m4is_cpns => $m4is_wfdk ) { if ( isset( $m4is_p9r_8e[$m4is_cpns] ) ) { $m4is_pvlb5 = isset( $m4is_x0_hk->$m4is_wfdk ) ? $m4is_x0_hk->$m4is_wfdk : '';
 $m4is_x5hmn = isset( $m4is_p9r_8e[$m4is_cpns] ) ? $m4is_p9r_8e[$m4is_cpns] : '';
 if ( $m4is_pvlb5 <> $m4is_x5hmn ) { $m4is_wlqsgr[$m4is_wfdk] = $m4is_p9r_8e[$m4is_cpns];
 } } }  $m4is_ygqi60 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'disable_displayname_update', 0 );
  $m4is_av461f = [];
 $m4is_fsvkh3 = get_user_by( 'id', $m4is__migxk );
 if ( is_a( $m4is_fsvkh3, 'WP_User' ) && strtolower( $m4is_fsvkh3->user_email ) == strtolower( $m4is_p9r_8e['Email'] ) ) { $m4is_p9r_8e['Email'] = $m4is_fsvkh3->user_email;
 } $m4is_pvlb5['display_name'] = $m4is_fsvkh3->display_name;
 $m4is_pvlb5['first_name'] = $m4is_fsvkh3->first_name;
 $m4is_pvlb5['last_name'] = $m4is_fsvkh3->last_name;
 $m4is_pvlb5['nickname'] = $m4is_fsvkh3->nickname;
 $m4is_pvlb5['user_email'] = $m4is_fsvkh3->user_email;
 $m4is_pvlb5['user_nicename'] = $m4is_fsvkh3->user_nicename;
 $m4is_pvlb5['user_url'] = wp_specialchars_decode($m4is_fsvkh3->user_url);
 $m4is_x5hmn = [];
 $m4is_x5hmn['first_name'] = isset($m4is_p9r_8e['FirstName']) ? $m4is_p9r_8e['FirstName'] : $m4is_pvlb5['display_name'];
 $m4is_x5hmn['last_name'] = isset($m4is_p9r_8e['LastName']) ? $m4is_p9r_8e['LastName'] : $m4is_pvlb5['last_name'];
 $m4is_x5hmn['user_email'] = strtolower(trim($m4is_p9r_8e['Email']) );
 $m4is_x5hmn['user_url'] = empty($m4is_p9r_8e['Website']) ? $m4is_pvlb5['user_url'] : trim(substr($m4is_p9r_8e['Website'], 0, 94));
  if (empty($m4is_ygqi60) ) { $m4is_k4yeul = [ 'contact' => $m4is_p9r_8e, 'user_id' => $m4is__migxk, ];
 $m4is_x5hmn['display_name'] = apply_filters('memberium/wpuser/display_name', self::$m4is_bnd6ti->m4is_ga37($m4is_k4yeul), $m4is_p9r_8e);
 $m4is_x5hmn['nickname'] = apply_filters('memberium/wpuser/nickname', $m4is_pvlb5['display_name'], $m4is_p9r_8e);
 }  if ( self::$m4is_bnd6ti->m4is_oiewvu('settings', 'enable_slug_update', false) ) { $m4is_x5hmn['user_nicename'] = apply_filters('memberium/wpuser/nicename', sanitize_title($m4is_x5hmn['display_name']), $m4is_p9r_8e);
 } if (empty($m4is_r36qyu) ) { $m4is_a6s3d = isset($_POST['pwd']) ? $_POST['pwd'] : '';
 $m4is_a6s3d = isset($_POST['password']) && isset($_POST['woocommerce-login-nonce']) ? $_POST['password'] : $m4is_a6s3d;
 if (! empty(trim($m4is_a6s3d))) { if (in_array($m4is_j485e, ['', 'PASSWORD_PLACEHOLDER']) ) { if (! empty($m4is_a6s3d)) { if ( (! @wp_check_password($m4is_a6s3d, $m4is_fsvkh3->data->user_pass, $m4is__migxk) ) ) { $m4is_av461f['user_pass'] = $m4is_p9r_8e[$m4is_dcf_7];
 } } } else { if ( (! @wp_check_password($m4is_j485e, $m4is_fsvkh3->data->user_pass, $m4is__migxk) ) ) { $m4is_av461f['user_pass'] = $m4is_p9r_8e[$m4is_dcf_7];
 } } } } foreach ($m4is_x5hmn as $m4is_s2ge5 => $m4is_w_o7al ) { if (isset($m4is_pvlb5[$m4is_s2ge5]) && $m4is_pvlb5[$m4is_s2ge5] !== $m4is_w_o7al && ! empty($m4is_w_o7al)) { $m4is_av461f[$m4is_s2ge5] = $m4is_w_o7al;
 } } if (! empty($m4is_av461f)) { $m4is_av461f['ID'] = $m4is__migxk;
  self::$m4is_bnd6ti->m4is_xb8k(true);
 add_filter('send_password_change_email', [ self::$m4is_bnd6ti, 'm4is_bkl7'], PHP_INT_MAX, 3);
 wp_update_user($m4is_av461f);
 remove_filter('send_password_change_email', [ self::$m4is_bnd6ti, 'm4is_bkl7'], PHP_INT_MAX);
  if (stripos($m4is_fsvkh3->user_login, '@') !== false) { $m4is_c14gi2 = sanitize_user($m4is_p9r_8e['Email'], true);
 if ($m4is_fsvkh3->user_login <> $m4is_c14gi2) { self::$m4is_bnd6ti->m4is_u_7wja($m4is__migxk, $m4is_c14gi2);
 } } } self::$m4is_bnd6ti->m4is_wday( $m4is_e2kg, $m4is__migxk );
 self::$m4is_bnd6ti->m4is_xb8k( false );
 return $m4is__migxk;
 } static 
function m4is_xxog( int $m4is_e2kg, $m4is_j485e = '' ) { } }

