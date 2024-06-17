<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 m4is_gouz::m4is_x6wv();
 final 
class m4is_gouz { static private $m4is_bnd6ti;
 static private $m4is_n3zlk;
 static private $m4is_qf47;
  private 
function __construct() {}  static 
function m4is_x6wv() : void { m4is_aoxw::m4is_djr4nd();
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_n3zlk = 'memberium';
 self::$m4is_qf47 = m4is_sljnt::m4is_e5l8a9();
 }  static 
function m4is_k952ob() { global $memb_messages;
 m4is_aoxw::m4is_djr4nd();
  $m4is_iw6m = (int) $_POST['contact_id'];
   if ( md5( wp_salt( 'nonce' ) . $m4is_iw6m ) <> $_POST['signature'] ) { return;
 }  $m4is_w_8g = [ self::$m4is_qf47->m4is_rptj() => '', ];
  $m4is_f9yd1u = (int) self::$m4is_qf47->m4is_yh7gr();
 $m4is_hmv6cu = self::$m4is_qf47->m4is_g8ajtb();
  m4is_bnrdbo::m4is_cseh( $m4is_iw6m, $m4is_w_8g );
  m4is_ho3l::m4is_xy3j( $m4is_iw6m, $m4is_hmv6cu );
  m4is_tvc2xn::m4is_znq_1( $m4is_iw6m, $m4is_f9yd1u );
  self::$m4is_bnd6ti->m4is_leu58($m4is_iw6m);
  $memb_messages['flash']['create_child_result'] = '<p style="color:green;font-weight:bold;">' . _x( 'Child Account removed.', 'umbrella_list_children', 'memberium' ) . '</p>';
 }  static 
function m4is_dzh3ob() { global $memb_messages;
  if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'memb_childenroll' ) ) { wp_die( 'Security Check Failed - Nonce Validation Error' );
 exit;
 }  if ( ! self::$m4is_bnd6ti->m4is_tjozx( $_POST['digital_signature'], $_POST['params'] ) ) { wp_die( 'Security Check Failed - Signature Validation Error');
 exit;
 }  $_SESSION = self::$m4is_bnd6ti->m4is_akz3( get_current_user_id() );
 $m4is_u_hn = self::$m4is_qf47->m4is_t8op();
 $m4is_yynebu = self::$m4is_qf47->m4is_rptj();
 $m4is_nzltjr = (int) self::$m4is_qf47->m4is__vjw4('child_added_actionset');
 $m4is_d2lp1i = (int) self::$m4is_qf47->m4is__vjw4('parent_added_actionset');
 $m4is_zbamh = (string) self::$m4is_qf47->m4is__vjw4('child_added_goal');
 $m4is_w9id = (string) self::$m4is_qf47->m4is__vjw4('parent_added_goal');
 $m4is_gqid = unserialize( base64_decode( $_POST['params'] ) );
 $m4is_irntsw = strtolower( $m4is_u_hn );
 $m4is_f7oyva = (int) $m4is_gqid['contact_id'];
 $m4is_iw6m = 0;
 $m4is_yukjn_ = array_filter( explode( ',', $m4is_gqid['allowed_actions'] ) );
 $m4is_qzqr2 = isset( $_POST['actions'] ) ? (int) $_POST['actions'] : 0;
 $m4is_e_r38 = isset( $_POST['goal'] ) ? trim( $_POST['goal'] ) : '';
 $m4is_fliw = strtolower( trim( $_POST['Email'] ) );
  if ( ! in_array( $m4is_qzqr2, $m4is_yukjn_ ) ) {  $m4is_qzqr2 = 0;
 }  if ( empty( $m4is_fliw ) ) {  $memb_messages['flash']['create_child_result'] = '<p style="color:red;font-weight:bold;">' . _x( 'Email is Required', 'umbrella_enroll_child', 'memberium' ) . '</p>';
 return;
 }  if ( empty( $_POST['FirstName'] ) ) {  $memb_messages['flash']['create_child_result'] = '<p style="color:red;font-weight:bold;">' . _x( 'First Name is Required', 'umbrella_enroll_child', 'memberium' ) . '</p>';
 return;
 }  $m4is_q_f4 = get_user_by( 'email', $m4is_fliw );
  if ( $m4is_q_f4 && user_can( $m4is_q_f4, 'edit_others_posts' ) ) {  $memb_messages['flash']['create_child_result'] = '<p style="color:red;font-weight:bold;">' . _x( 'You cannot add site staff members.', 'umbrella_enroll_child', 'memberium' ) . '</p>';
 return;
 }  if ( $m4is_fliw == strtolower(trim( m4is_wbc8os::m4is_sfnmc( $m4is_yynebu ) ) ) ) {  $memb_messages['flash']['create_child_result'] = '<p style="color:red;font-weight:bold;">' . _x( "You can't add yourself.", 'umbrella_enroll_child', 'memberium' ) . '</p>';
 return;
 }  $m4is__u5v = [ 'Id',  $m4is_u_hn,  $m4is_yynebu  ];
   $m4is_u8m5i7 = m4is_bnrdbo::m4is_e5j_xv( $m4is_fliw, $m4is__u5v );
  foreach( $m4is_u8m5i7 as $m4is_j5sy07 => $child_contact ) {  if (! empty($child_contact[$m4is_yynebu]) || ! empty($child_contact[$m4is_u_hn]) ) {  $memb_messages['flash']['create_child_result'] = '<p style="color:red;font-weight:bold;">' . _x("You can't add this account.", 'umbrella_enroll_child', 'memberium' ) . '</p>';
 return;
 }  if ( isset($child_contact[$m4is_yynebu]) && $child_contact[$m4is_yynebu] == m4is_wbc8os::m4is_sfnmc( $m4is_irntsw ) ) {  $m4is_iw6m = $child_contact['Id'];
 }  if ( empty( $child_contact[$m4is_yynebu] ) ) {  $m4is_iw6m = $child_contact['Id'];
 } }  $m4is_dbcyjz = m4is_ho3l::m4is_kjedy2( 'Contact', false );
 $m4is_w_8g = [];
 if ( $m4is_iw6m == 0 || $m4is_gqid['overwrite'] == true ) { $m4is_w_8g = self::m4is_inyd( $_POST );
 } $m4is_w_8g[$m4is_yynebu] = self::$m4is_qf47->m4is_v4mu( m4is_wbc8os::m4is_sfnmc( $m4is_irntsw ), 'child' );
  if ( $m4is_iw6m == 0 ) { $m4is_iw6m = m4is_bnrdbo::m4is_klk1gy($m4is_w_8g);
 m4is_bnrdbo::m4is_cseh( $m4is_iw6m, $m4is_w_8g );
 if ( $m4is_iw6m > 0 ) { m4is_bnrdbo::m4is_xj2eb( $m4is_fliw, 'Added by Memberium Umbrella Account System' );
 $memb_messages['flash']['create_child_result'] = '<p style="color:green;font-weight:bold;">' . _x( 'Child Account added.', 'umbrella_enroll_child', 'memberium' ) . '</p>';
 self::m4is_jmrc( $m4is_f7oyva, $m4is_iw6m, $m4is_qzqr2, $m4is_e_r38 );
 } } else {   if ( empty( $child_contact[$m4is_yynebu] ) ) { $m4is_w_8g[$m4is_yynebu] = self::$m4is_qf47->m4is_v4mu( m4is_wbc8os::m4is_sfnmc( $m4is_irntsw ), 'child' );
 m4is_bnrdbo::m4is_cseh( $m4is_iw6m, $m4is_w_8g );
  $memb_messages['flash']['create_child_result'] = '<p style="color:green;font-weight:bold;">' . _x( 'Child Account assigned.', 'umbrella_enroll_child', 'memberium' ) . '</p>';
 self::m4is_jmrc( $m4is_f7oyva, $m4is_iw6m, $m4is_qzqr2, $m4is_e_r38 );
 } else {  $memb_messages['flash']['create_child_result'] = '<p style="color:red;font-weight:bold;">' . _x( 'That account already assigned to a user.', 'umbrella_enroll_child', 'memberium' ) . '</p>';
 } }  if ( $m4is_iw6m ) {  sleep( 1 );
  self::$m4is_bnd6ti->m4is_leu58( $m4is_iw6m );
 } do_action( 'memberium_umbrella_add_child', $m4is_iw6m, $m4is_f7oyva );
 do_action( 'memberium/umbrella/add_child', $m4is_iw6m, $m4is_f7oyva );
 return;
 } private static 
function m4is_inyd( array $m4is_hhrb ) : array { $m4is_dbcyjz = m4is_ho3l::m4is_kjedy2( 'Contact', false );
 $m4is_w_8g = [];
 foreach ( $m4is_hhrb as $m4is_yxwn => $m4is_w_o7al ) { if ( in_array( $m4is_yxwn, $m4is_dbcyjz ) ) { $m4is_w_8g[$m4is_yxwn] = stripslashes( $m4is_w_o7al );
 } } return $m4is_w_8g;
 }  private static 
function m4is_jmrc( int $m4is_f7oyva, int $m4is_iw6m, $m4is_qzqr2, $m4is_e_r38 ) : void { $m4is_zbamh = (string) self::$m4is_qf47->m4is__vjw4( 'child_added_goal' );
 $m4is_w9id = (string) self::$m4is_qf47->m4is__vjw4( 'parent_added_goal' );
 $m4is_nzltjr = (int) self::$m4is_qf47->m4is__vjw4( 'child_added_actionset' );
 $m4is_d2lp1i = (int) self::$m4is_qf47->m4is__vjw4( 'parent_added_actionset' );
 m4is_ho3l::m4is_xy3j( $m4is_iw6m, $m4is_zbamh );
 m4is_ho3l::m4is_xy3j( $m4is_iw6m, $m4is_e_r38 );
 m4is_ho3l::m4is_xy3j( $m4is_f7oyva, $m4is_w9id );
 self::$m4is_bnd6ti->m4is_u86vzq( $m4is_nzltjr, $m4is_iw6m );
 self::$m4is_bnd6ti->m4is_u86vzq( $m4is_d2lp1i, $m4is_f7oyva );
 self::$m4is_bnd6ti->m4is_u86vzq( $m4is_qzqr2, $m4is_iw6m );
 }  static 
function m4is_r3crab() {  m4is_aoxw::m4is_djr4nd();
  if ( ! wp_verify_nonce( $_POST['umbrella_transfer_points_wpnonce'], $_POST['signature'] ) ) {  wp_die( 'Security Check Failed - Nonce Validation Error' );
 exit;
 }  $m4is_jadl06 = false;
  $m4is_gqid = unserialize(base64_decode($_POST['signature']) );
  $m4is_zua17 = (int) $_POST['points'];
  $m4is__kyp = sanitize_email($_POST['recipient']);
  $m4is_g1ru50 = $m4is_gqid['field'];
  $m4is_d71ub = new stdclass;
  $m4is_d71ub->max_points = $m4is_gqid['max_points'];
  $m4is_d71ub->points = $m4is_zua17;
  $parent_contact_id = $m4is_gqid['pcid'];
  $child_contact_id = self::$m4is_bnd6ti->m4is_gz8a($m4is__kyp);
  if ($m4is_zua17 == 0) { $m4is_jadl06 = true;
 $m4is_d71ub->error_type = 'no_points_transferred';
 }  if ($m4is_zua17 > $m4is_gqid['max_points'] || $m4is_zua17 < 1) { $m4is_jadl06 = true;
 $m4is_d71ub->error_type = 'invalid_points';
 }  if (! $parent_contact_id || ! $child_contact_id) { $m4is_jadl06 = true;
 $m4is_d71ub->error_type = 'invalid_users';
 }  if ( ! $m4is_jadl06) {  $m4is_lzrl = self::$m4is_bnd6ti->m4is_tud7($child_contact_id, $m4is_g1ru50);
  $m4is_hdy4 = $m4is_d71ub->max_points - $m4is_zua17;
  $m4is__8cl = $m4is_lzrl + $m4is_zua17;
  self::$m4is_bnd6ti->m4is_wzxl_1($m4is_g1ru50, $m4is_hdy4, $parent_contact_id );
  self::$m4is_bnd6ti->m4is_wzxl_1($m4is_g1ru50, $m4is__8cl, $child_contact_id );
  $m4is_d71ub->error_type = false;
  $m4is_d71ub->points = $m4is_zua17;
 }  $_SESSION['flash']['umbrella_transfer_points'] = m4is_crqo::m4is_yu7b1r('umbrella_transfer_points_result', null, null, null, $m4is_d71ub);
 }   static 
function m4is_vg7q_v() {  m4is_aoxw::m4is_djr4nd();
  $m4is_ig9p6 = get_current_user_id();
  $m4is_jfds = [];
  $m4is_l3cr0 = m4is_sljnt::m4is_e5l8a9()->m4is_xxks();
  $m4is_gqid = isset($_POST['params']) ? unserialize(base64_decode($_POST['params']) ) :[];
  $m4is_l3cr0 = apply_filters('memberium/umbrella/download_csv', $m4is_l3cr0);
  $m4is_l3cr0 = apply_filters("memberium/umbrella/download_csv/{$m4is_gqid['filter_name']}", $m4is_l3cr0);
  foreach($m4is_l3cr0 as $k => $v) {  } } }

