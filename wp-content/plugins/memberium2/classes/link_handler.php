<?php
/**
 * Copyright (c) 2015-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_ot78::m4is_ju94();
  final 
class m4is_ot78 { private static $m4is_bnd6ti;
 private static $m4is_p9r_8e;
 private static $m4is_yh5y;
 private static $m4is_xy7m;
 private static $m4is_q8vgfd;
 private static $m4is_gvpi6;
 private static $m4is_b5kaz0;
 private static $m4is__8htld;
    public static 
function m4is_ju94() : void { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_yh5y = self::m4is_fq3n();
 self::$m4is_xy7m = isset( $_GET['fail_url'] ) ? $_GET['fail_url'] : site_url('/');
 self::$m4is_gvpi6 = [];
 self::$m4is_b5kaz0 = site_url( '/' );
 self::$m4is__8htld = true;
 self::$m4is_q8vgfd = 0;
 } public static 
function m4is_la8ic() : void { global $wpdb;
 if ( self::$m4is_yh5y ) { printf( "%d :: Debug Mode Enabled<br>", __LINE__ );
 ini_set( 'display_errors', 1 );
 } else { ini_set( 'display_errors', 0 );
 } $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is__f8b4 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'default_reglink_tag' );
 $m4is_v6fdv4 = isset( $_GET['action'] ) ? strtolower( trim( $_GET['action'] ) ) : '';
 $m4is_e2kg = isset( $_GET['cid'] ) ? (int) trim( $_GET['cid'] ) : 0;
 $m4is_fliw = isset( $_GET['email'] ) ? strtolower( trim( $_GET['email'] ) ) : '';
 $m4is_t5j6m2 = isset( $_GET['pid'] ) ? strtolower( trim( $_GET['pid'] ) ) : '';
 $m4is_b5kaz0 = isset( $_GET['redir']) ? $_GET['redir'] : site_url('/');
 $m4is_b5kaz0 = isset( $_GET['redirect'] ) ? $_GET['redirect'] : $m4is_b5kaz0;
 self::$m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $m4is_e2kg, 'autologin', sprintf( 'Confirmation Link for user %s', $m4is_fliw ) );
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, 'Redirecting to ' . $m4is_b5kaz0 );
 self::m4is_qgka();
 if ( self::$m4is_yh5y ) { printf( '%d - Email = %s<br>', __LINE__, $m4is_fliw );
 printf( '%d - Contact ID = %d<br>', __LINE__, $m4is_e2kg );
 printf( '%d - Profile ID = %d<br>', __LINE__, $m4is_t5j6m2 );
 } if ( empty( $m4is_dcf_7 ) ) { $m4is_aocm8x = self::$m4is_yh5y ? 'Password field not defined.' : 'Memberium';
 if ( self::$m4is_yh5y ) { printf( '%d :: %s<br />', __LINE__, $m4is_aocm8x );
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, 'Memberium' );
 } die();
 } self::$m4is_gvpi6 = self::m4is_bezd( $m4is_t5j6m2 );
 self::m4is_kx0u_d( $m4is_fliw );
 self::m4is_poj6_();
 self::m4is_lscwi( $m4is_e2kg, $m4is_fliw );
 self::m4is_b8alt4( $m4is_e2kg, $m4is_fliw );
 $m4is_ig9p6 = self::m4is_ftx9( $m4is_e2kg );
 if ( empty( $m4is_ig9p6 ) ) { if ( self::$m4is_yh5y ) { printf( '%d :: %s<br />', __LINE__, 'Failed to create user.' );
 printf( '%d :: Redirect to %s<br>', __LINE__, self::$m4is_xy7m );
 } else { wp_redirect( self::$m4is_xy7m );
 } exit;
 } self::$m4is_bnd6ti->m4is_tcle75( self::$m4is_gvpi6['tag'], $m4is_e2kg) ;
  self::m4is_md_v( $m4is_ig9p6 );
 if ( self::$m4is_yh5y ) { echo __LINE__, ' Success Redirect<br>';
 echo __LINE__, ' :: Redirect to ', $m4is_b5kaz0, '<br>';
 printf( '<p><a href="%s">Click here to continue as the user</a></p>', $m4is_b5kaz0 );
 die();
 } wp_redirect( $m4is_b5kaz0 );
 exit;
 }     static 
function m4is_fq3n() : bool { if ( ! empty( $_GET['debug'] ) ) { return m4is_vv5u::m4is_b4_tb();
 } return false;
 }  private static 
function m4is_qgka() : void { $m4is_b6ywe = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'autologin_authkeys' ) ) );
 $m4is_sol64 = isset( $_GET['authkey'] ) ? trim( $_GET['authkey'] ) : '';
 if ( ! in_array( $m4is_sol64, $m4is_b6ywe ) ) { m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, 'Invalid Auth Key ' . $_GET['authkey'] );
 if ( self::$m4is_yh5y ) { echo __LINE__, ' :: Auth Key = ', $m4is_sol64, '<br>';
 echo __LINE__, ' :: Invalid Authentication Key<br>';
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, 'Memberium' );
 } die();
 } else { if ( self::$m4is_yh5y ) { echo __LINE__, ' :: Auth Key Validated<br>';
 } } } private static 
function m4is_bezd( $m4is_t5j6m2 ) {  $m4is_gvpi6 = [];
 $m4is_gvpi6['tag'] = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'default_reglink_tag' , '' );
 $m4is_gvpi6['goal'] = '';
 $m4is_gvpi6['login_post_id'] = 0;
 if ( ! empty( $m4is_t5j6m2 ) ) { $m4is_toz0 = get_option( 'memberium_registration_profiles' );
 $m4is_toz0[$m4is_t5j6m2] = [ 'goal' => '', 'login_post_id' => 0, 'tag' => '', ];
 if ( isset( $m4is_toz0[$m4is_t5j6m2] ) && is_array( $m4is_toz0[$m4is_t5j6m2] ) ) { $m4is_gvpi6 = $m4is_toz0[$m4is_t5j6m2];
 } else { if ( self::$m4is_yh5y ) { echo __LINE__, ' :: Invalid Profile Id<br>';
 die();
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, 'Memberium' );
 } self::$m4is__8htld = false;
 } } if ( self::$m4is_yh5y ) { echo __LINE__, ' :: Profile Goal = ', $m4is_gvpi6['goal'], '<br>';
 echo __LINE__, ' :: Profile Tag = ', $m4is_gvpi6['tag'], '<br>';
 echo __LINE__, ' :: Login Post ID = ', $m4is_gvpi6['login_post_id'], '<br>';
 } return $m4is_gvpi6;
 }  private static 
function m4is_kx0u_d( string $m4is_fliw ) { $m4is_ig9p6 = get_user_by( 'email', $m4is_fliw );
 if ( ! $m4is_ig9p6 ) { return;
 } $m4is_aocm8x = self::$m4is_yh5y ? 'Confirmation Link: User already exists.' : 'Memberium';
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_aocm8x );
 if ( self::$m4is_yh5y ) { printf( '%d :: User with email address already "%s" Exists<br />', __LINE__, $m4is_fliw );
 printf( '%d :: Redirect to %s<br>', __LINE__, self::$m4is_xy7m );
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, $m4is_aocm8x );
 } die();
 }  private static 
function m4is_poj6_() { if ( ! is_user_logged_in() ) { return;
 } $m4is_b5kaz0 = isset( $_SESSION['memb_user']['login_page'] ) ? get_permalink( $_SESSION['memb_user']['login_page'] ) : self::$m4is_b5kaz0;
 $m4is_aocm8x = self::$m4is_yh5y ? 'Confirmation Link: User Logged In' : 'Memberium';
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_aocm8x );
 if ( self::$m4is_yh5y ) { echo __LINE__, ' :: User Logged In<br>';
 echo __LINE__, ' :: Redirecting to ', $m4is_b5kaz0, '<br>';
 echo '<pre>Session = ', print_r( $_SESSION, true), '</pre>';
 } else { wp_safe_redirect( $m4is_b5kaz0, 302, $m4is_aocm8x );
 } exit;
 }  private static 
function m4is_lscwi( int $m4is_e2kg, string $m4is_fliw ) { self::$m4is_bnd6ti->m4is_leu58( $m4is_e2kg, false );
 self::$m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( $m4is_e2kg, false );
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 if ( empty( $m4is_dcf_7 ) ) { if ( self::$m4is_yh5y ) { echo __LINE__, ' :: Password Field Not Defined<br>';
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, 'Memberium' );
 } die();
 }  if ( empty( self::$m4is_p9r_8e ) || ! is_array( self::$m4is_p9r_8e ) ) { $m4is_aocm8x = self::$m4is_yh5y ? 'Confirmation Link: Missing contact data' : 'Memberium';
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_aocm8x );
 if ( self::$m4is_yh5y ) { printf( '%d :: %s<br>', __LINE__, $m4is_aocm8x );
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, $m4is_aocm8x );
 } exit;
 }  if ( $m4is_e2kg <> self::$m4is_p9r_8e['Id'] ) { $m4is_aocm8x = self::$m4is_yh5y ? 'Confirmation Link: Contact ID mismatch' : 'Memberium';
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_aocm8x );
 if ( self::$m4is_yh5y ) { printf( '%d :: %s<br>', __LINE__, $m4is_aocm8x );
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, $m4is_aocm8x );
 } exit;
 }  if ( $m4is_fliw <> self::$m4is_p9r_8e['Email'] ) { $m4is_aocm8x = self::$m4is_yh5y ? 'Confirmation Link: Email address mismatch' : 'Memberium';
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_aocm8x );
 if ( self::$m4is_yh5y ) { printf( '%d :: %s<br>', __LINE__, $m4is_aocm8x );
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, $m4is_aocm8x );
 } exit;
 }  if ( empty( self::$m4is_p9r_8e['FirstName'] ) ) { $m4is_aocm8x = self::$m4is_yh5y ? 'Confirmation Link: First Name missing' : 'Memberium';
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_aocm8x );
 if ( self::$m4is_yh5y ) { printf( '%d :: %s<br>', __LINE__, $m4is_aocm8x );
 } else { wp_safe_redirect( self::$m4is_xy7m, 302, $m4is_aocm8x );
 } exit;
 } }  private static 
function m4is_b8alt4( int $m4is_e2kg, string $m4is_fliw ) { $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_j485e = isset( self::$m4is_p9r_8e[$m4is_dcf_7] ) ? trim( self::$m4is_p9r_8e[$m4is_dcf_7] ) : '';
 if ( empty( $m4is_j485e ) ) { self::$m4is_p9r_8e[$m4is_dcf_7] = self::$m4is_bnd6ti->m4is_e9m0g();
 $m4is__xn_jt = [ $m4is_dcf_7 => self::$m4is_p9r_8e[$m4is_dcf_7], ];
 $m4is_oa_z = m4is_bnrdbo::m4is_cseh( $m4is_e2kg, $m4is__xn_jt );
 self::$m4is_bnd6ti->m4is_dhpr( self::$m4is_p9r_8e );
 if ( self::$m4is_yh5y ) { printf( "%d :: Password '%s' generated and saved.<br />", __LINE__, self::$m4is_p9r_8e[$m4is_dcf_7] );
 } } else { if ( self::$m4is_yh5y ) echo __LINE__, ' Password Already Exists<br>';
 } }  private static 
function m4is_ftx9( int $m4is_e2kg ) : int { $m4is_ig9p6 = self::$m4is_bnd6ti->m4is_b34y( $m4is_e2kg );
 $m4is_wbgl5s = sprintf( 'Created User ID %d', $m4is_ig9p6 );
 m4is__gu52::m4is_qyunz0( self::$m4is_q8vgfd, $m4is_wbgl5s );
 if ( self::$m4is_yh5y ) { printf( '%d :: %s<br />', __LINE__, $m4is_wbgl5s );
 } return (int) $m4is_ig9p6;
 }  private static 
function m4is_md_v( int $m4is_ig9p6 ) : void { $m4is_x0_hk = get_userdata( $m4is_ig9p6 );
 $m4is_euyfd = $m4is_x0_hk->user_login;
 wp_set_auth_cookie( $m4is_ig9p6);
 wp_set_current_user( $m4is_ig9p6 );
 m4is_ypvg9::m4is__tje( $m4is_euyfd );
 do_action( 'wp_login', $m4is_euyfd, $m4is_x0_hk );
 m4is_w0enbm::m4is_e5l8a9()->m4is_dnqd_();
 session_write_close();
 } }

