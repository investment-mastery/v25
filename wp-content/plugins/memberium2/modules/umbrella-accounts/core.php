<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_sljnt { private $m4is_bnd6ti;
 private $m4is_zq0k;
 private $add_child_actionset;
 private $child_added_actionset;
 private $child_added_goal;
 private $child_cancel_goal;
 private $child_count_add;
 private $ecommerce;
 private $ld_quiz_notify_parent;
 private $parent_added_goal;
 private $parent_tags;
 private $subscriptions;
 private $tag_grants;
 private $tag_whitelist;
 private $whitelist_memberships;
 private $child_cancel_actionset = 0;
  private $child_field = 'ReferralCode';
  private $core = null;
 private $enabled = false;
  private $inherited_fields = '';
  private $max_child_accounts = 10;
  private $max_child_field = '';
  private $parent_added_actionset = 0;
  private $parent_cache_ttl = 86400;
  private $parent_field = 'ReferralCode';
  private $settings = [];
 private $tag_mask = '';
  private $tag_mask_field = '';
  private $tag_translation = [];
  private $version = '2.4';
 private $doing_raw_load = false;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->settings = $this->m4is__ntzc();
 $this->m4is_ww61so();
 $this->m4is_ljhm();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $this->add_child_actionset = 0;
  $this->child_added_goal = '';
  $this->child_cancel_goal = '';
  $this->ecommerce = 1;
  $this->ld_quiz_notify_parent = 0;
  $this->parent_added_goal = '';
  $this->parent_tags = '';
  } private 
function m4is_a_gof() : array { return [ 'add_child_actionset' => 0, 'child_added_goal' => '', 'child_cancel_goal' => '', 'parent_added_goal' => '', 'child_cancel_actionset' => 0, 'child_field' => 'ReferralCode', 'ecommerce' => 1, 'inherited_fields' => '', 'ld_quiz_notify_parent' => 0, 'max_child_accounts' => 10, 'parent_added_actionset' => 0, 'parent_cache_ttl' => 86400, 'parent_field' => 'ReferralCode', 'parent_tags' => '', 'tag_mask' => '', 'tag_mask_field' => '', 'tag_translation' => [], ];
 }  
function m4is__ntzc() { $this->settings = get_option( 'memberium_umbrella_settings', [] );
 $m4is_r6nh_b = $this->m4is_a_gof();
 $this->settings = wp_parse_args($this->settings, $m4is_r6nh_b);
 foreach( $this->settings as $m4is_s2ge5 => $m4is_w_o7al ) { $this->$m4is_s2ge5 = $this->settings[$m4is_s2ge5];
 } return $this->settings;
 }  public 
function m4is_mi9d() {  include_once( __DIR__ . '/cpt.php' );
 }  private 
function m4is_ww61so() { add_action( 'init', [$this, 'm4is_mi9d'], 1 );
  add_action( 'init', [$this, 'm4is_w23v']);
  add_action( 'memberium_email_change', [$this, 'm4is_tv1spn']);
  add_filter( 'learndash_get_report_user_ids', [$this, 'm4is_wn3rl'], 10, 1 );
  add_filter( 'memberium_contact_load', [$this, 'm4is_napx'], 10, 1 );
  add_filter( 'memberium/umbrella/child_contact_ids', [$this, 'm4is_drbm_5'], 10, 1 );
  add_filter( 'memberium/umbrella/child_count', [$this, 'm4is_eqph9'], 10, 1 );
  add_filter( 'memberium/umbrella/child_wpuser_ids', [$this, 'm4is_xxks'], 10, 1 );
  add_filter( 'memberium/umbrella/parent_wpuser_id', [$this, 'm4is__8vp'], 10, 1 );
   }  private 
function m4is_ljhm() {  if ( is_admin() && ! wp_doing_ajax() ) { return;
 } if ( wp_doing_ajax() || ! is_admin() ) {  $m4is_nz3t = 'm4is_efy76';
 $m4is_veymi8 = [ 'umbrella_child_count' => 'm4is_s6j1g', 'umbrella_download_csv' => 'm4is_nf10c', 'umbrella_enroll_child' => 'm4is_nsi2', 'umbrella_ld_course_info' => 'm4is_zirlbp', 'umbrella_list_children_nav' => 'm4is_m5a6r', 'umbrella_list_children' => 'm4is_low0ts', 'umbrella_lms_dashboard' => 'm4is_f7pog', 'umbrella_transfer_points' => 'm4is_eyvtk', ];
 $this->m4is_bnd6ti->m4is_p345( $m4is_nz3t, __DIR__ . '/shortcodes' );
 foreach( $m4is_veymi8 as $m4is_t5ot4 => $m4is_h7j0 ) { add_shortcode( $m4is_t5ot4, [$m4is_nz3t, $m4is_h7j0] );
 } } }  
function m4is_u04m() {  return $this->version;
 }  
function m4is_wenps($m4is_w2w8 = false) {  if ( $m4is_w2w8 === false ) { $m4is_w2w8 = $this->settings;
 }  update_option( 'memberium_umbrella_settings', $m4is_w2w8, 'yes' );
 }     
function m4is_q8nec( int $m4is_eeaiqk = 86400 ) {  $this->parent_cache_ttl = (int) $m4is_eeaiqk;
  $this->settings['parent_cache_ttl'] = $this->parent_cache_ttl;
 }     
function m4is_nf8uv() {  return $this->settings['parent_tags'];
 }  
function m4is_z0rq() { return $this->settings['tag_mask'];
 }  
function m4is_w6vxq() { return $this->settings['parent_cache_ttl'];
 }  
function m4is_k3wanh() { return $this->settings['tag_mask_field'];
 }  
function m4is_t8op() { return $this->settings['parent_field'];
 }  
function m4is_rptj() { return $this->settings['child_field'];
 }  
function m4is_npoh1() { $m4is_yer1mp = (int) $this->settings['max_child_accounts'];
   if ( ! empty( $this->settings['child_count_add'] ) ) { $m4is_s2ge5 = strtolower( $this->settings['child_count_add'] );
 $m4is_yer1mp = $m4is_yer1mp + (int) m4is_wbc8os::m4is_sfnmc( $m4is_s2ge5 );
 }  if ( ! empty( $this->settings['tag_grants'] ) ) { foreach( $this->settings['tag_grants'] as $m4is_ndufnm => $m4is_w_o7al ) { if ( memberium_app()->m4is_sjmzx( $m4is_ndufnm ) ) { $m4is_yer1mp = $m4is_yer1mp + $m4is_w_o7al;
 } } }  if ( $this->settings['ecommerce'] ) { $m4is_wb9f = memberium_app()->m4is_ts0h3x();
 if ( ! empty( $m4is_wb9f ) ) { $m4is_pga2x8 = date('Ymd') . 'T23:59:59';
 foreach( $m4is_wb9f as $m4is__oep ) { $m4is__oep['EndDate'] = isset($m4is__oep['EndDate']) ? $m4is__oep['EndDate'] : '';
 $m4is__oep['Active'] = isset($m4is__oep['Active']) ? $m4is__oep['Active'] : '';
 if ($m4is__oep['Status'] == 'Active' || $m4is__oep['EndDate'] > $m4is_pga2x8) { $m4is_q6k3i = $m4is__oep['SubscriptionPlanId'];
 $m4is_yer1mp = $m4is_yer1mp + ( empty( $this->settings['subscriptions'][$m4is_q6k3i] ) ? 0 : ($this->settings['subscriptions'][$m4is_q6k3i] * $m4is__oep['Qty']) );
 } } } }  $m4is_yer1mp = apply_filters( 'umbrella_child_count', $m4is_yer1mp );
 return $m4is_yer1mp;
 }  
function m4is_yh7gr() { return $this->settings['child_cancel_actionset'];
 }  
function m4is_g8ajtb() { return $this->settings['child_cancel_goal'];
 }     
function m4is_w23v() {  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formtype']) ) {  $m4is_iipq2s = 'm4is_gouz';
  $this->m4is_bnd6ti->m4is_p345( $m4is_iipq2s, __DIR__ . '/catchers' );
  if ($_POST['formtype'] == 'childdisconnect') {  $m4is_iipq2s::m4is_k952ob();
 } elseif ($_POST['formtype'] == 'childenroll') {  $m4is_iipq2s::m4is_dzh3ob();
 } elseif ($_POST['formtype'] == 'umbrella_points_transfer') {  $m4is_iipq2s::m4is_r3crab();
 } elseif ($_POST['formtype'] == 'umbrella_csv_download') {  $m4is_iipq2s::m4is_vg7q_v();
 } } }        
function m4is_wn3rl( $m4is_d7ile3 ) {  if ( ! is_super_admin() ) {  $m4is_l3cr0 = $this->m4is_xxks();
  $m4is_d7ile3 = array_merge( $m4is_d7ile3, $m4is_l3cr0 );
 }  return $m4is_d7ile3;
 }  private 
function m4is__9x3e() {   return ! in_array($this->m4is_t8op(), ['Email', 'EmailAddress2', 'EmailAddress3']);
 }  private 
function m4is_ar2z5y($m4is_iystd2) {  $m4is_p12f4o = array_filter(explode(',', $this->m4is_nf8uv() ) );
   return (bool) array_intersect($m4is_p12f4o, $m4is_iystd2);
 }  private 
function m4is_at10( $m4is_p9r_8e ) {  $m4is_u_hn = $this->m4is_t8op();
 $m4is_upo_ry = '';
  if (empty($m4is_p9r_8e[$m4is_u_hn]) ) {  if ($this->m4is__9x3e() ) { $m4is_upo_ry = $this->m4is_ocpk();
 }  if (! empty($m4is_upo_ry)) { $m4is_p9r_8e[$m4is_u_hn] = $m4is_upo_ry;
 $this->m4is_bnd6ti->m4is_wzxl_1($m4is_u_hn, $m4is_upo_ry, $m4is_p9r_8e['Id']);
 } }  return $m4is_p9r_8e;
 }  
function m4is_mdk4u( $m4is_p9r_8e = [] ) {  if ( empty( $m4is_p9r_8e ) ) { return $m4is_p9r_8e;
 }  if ( $this->doing_raw_load ) { return $m4is_p9r_8e;
 }  return $m4is_p9r_8e;
 }  
function m4is_napx( $m4is_p9r_8e = [] ) {  if ( empty( $m4is_p9r_8e ) || $this->doing_raw_load ) { return $m4is_p9r_8e;
 }  $m4is_iystd2 = isset( $m4is_p9r_8e['Groups'] ) ? array_filter( explode( ',', $m4is_p9r_8e['Groups'] ) ) : [];
 if ( $this->m4is_ar2z5y( $m4is_iystd2 ) ) {  $m4is_p9r_8e = $this->m4is_at10( $m4is_p9r_8e );
 return $m4is_p9r_8e;
 }  $m4is_b34g = $this->m4is_rptj();
 $this->settings = $this->m4is__ntzc();
 $m4is_il_6zy = $this->m4is_t8op();
 $m4is_j_lgkn = $this->m4is_k3wanh();
  $m4is_j4so = empty( $m4is_p9r_8e[$m4is_b34g] ) ? '' : $m4is_p9r_8e[$m4is_b34g];
   if ( ! empty( $m4is_j4so ) ) {  $m4is_k4yeul = [ 'parent_id' => $m4is_j4so,  'contact_id' => $m4is_p9r_8e['Id'],  'contact' => $m4is_p9r_8e,  ];
  $m4is_kb24ju = $this->m4is_cf0a( $m4is_k4yeul );
  if ( $m4is_kb24ju > 0 ) {  $m4is_k4yeul = [ 'contact_id' => $m4is_kb24ju,  'cache_ttl' => $this->m4is_w6vxq()  ];
  $this->m4is_bnd6ti->m4is_pmj8bu( $m4is_k4yeul );
  $m4is_p9r_8e['!parent_id'] = $m4is_kb24ju;
  $this->doing_raw_load = true;
  $m4is_goa7x = m4is_bnrdbo::m4is_yvnol( $m4is_kb24ju );
  $this->doing_raw_load = false;
  $m4is_u0y7zf = array_filter( explode( ',', $this->settings['parent_tags'] ) );
  $m4is_p12f4o = isset( $m4is_goa7x['Groups'] ) ? array_filter( explode( ',', $m4is_goa7x['Groups'] ) ) : [];
  $m4is_rx7y = isset( $m4is_goa7x[$m4is_j_lgkn] ) ? array_filter( explode( ',', $m4is_goa7x[$m4is_j_lgkn] ) ) : [];
  $m4is_xpbeq = array_filter( explode( ',', $this->m4is_z0rq() ) );
  $m4is_l8nz = $this->settings['tag_translation'];
  $m4is_cq1zew = isset( $this->settings['whitelist_memberships'] ) ? array_filter( explode( ',', $this->settings['whitelist_memberships'] ) ) : [];
  $m4is_p12f4o = array_diff( $m4is_p12f4o, $m4is_u0y7zf );
   if ( ! empty( $this->settings['tag_whitelist'] ) || ! empty( $this->settings['whitelist_memberships'] ) ) {  $m4is_cq1zew = array_filter( explode( ',', $this->settings['tag_whitelist'] ) );
  if ( ! empty( $this->settings['whitelist_memberships'] ) ) {  $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu();
 $m4is_qh8p6 = $m4is_qh8p6['memberships'];
  foreach( $m4is_qh8p6 as $m4is_o5xas ) {  $m4is_cq1zew[] = (int) $m4is_o5xas['main_id'];
 $m4is_cq1zew[] = (int) $m4is_o5xas['addltag_ids'];
 $m4is_cq1zew[] = (int) $m4is_o5xas['payf_id'];
 $m4is_cq1zew[] = (int) $m4is_o5xas['cancel_id'];
 $m4is_cq1zew[] = (int) $m4is_o5xas['suspend_id'];
 }  unset( $m4is_qh8p6, $m4is_o5xas );
  $m4is_cq1zew = array_filter( $m4is_cq1zew );
 }  $m4is_p12f4o = array_intersect( $m4is_p12f4o, $m4is_cq1zew );
 } else {     $m4is_p12f4o = array_diff( $m4is_p12f4o, $m4is_xpbeq, $m4is_rx7y );
 }   if ( is_array( $m4is_l8nz ) ) {  foreach( $m4is_l8nz as $m4is_vlsimg => $m4is_ctcu ) {  $m4is_s2ge5 = array_search( $m4is_vlsimg, $m4is_p12f4o );
  if ( $m4is_s2ge5 !== false ) {  $m4is_p12f4o[$m4is_s2ge5] = $m4is_ctcu;
 } } }  $m4is_p9r_8e['Groups'] = $m4is_p9r_8e['Groups'] ?? '';
 $m4is_p9r_8e['Groups'] = implode( ',', array_unique( array_filter( array_merge( explode( ',', $m4is_p9r_8e['Groups'] ), $m4is_p12f4o ) ) ) );
  $m4is_x10i7 = array_filter( explode( ',', $this->inherited_fields ) );
   if ( ! empty( $m4is_x10i7 ) ) {  foreach( $m4is_x10i7 as $m4is_yxwn ) {  if ( empty( $m4is_p9r_8e[$m4is_yxwn] ) ) {  $m4is_p9r_8e[$m4is_yxwn] = $m4is_goa7x[$m4is_yxwn] ?? '';
 } } } } } return $m4is_p9r_8e;
 }  
function m4is_tv1spn( $m4is_e2kg = 0, $m4is_ig9p6 = 0, $m4is_vrzp6o = '', $m4is_fliw = '' ) { $m4is_yynebu = $this->m4is_rptj();
 $lparent_field = strtolower( $this->m4is_t8op() );
 if ( ! in_array( $lparent_field, ['email', 'emailaddress2', 'emailaddress3']) ) { return;
 } if ( empty( $m4is_vrzp6o ) || empty( $m4is_fliw ) ) { return;
 } $m4is_k4yeul = [ $m4is_yynebu => $m4is_vrzp6o ];
 $m4is_z59dj = $this->m4is_drbm_5( $m4is_k4yeul );
 if ( is_array( $m4is_z59dj ) && ! empty( $m4is_z59dj ) ) { foreach( $m4is_z59dj as $m4is_e2kg ) { $m4is_w_8g = [ $m4is_yynebu => $m4is_fliw, ];
 m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is_w_8g);
  } } }     
function m4is_ocpk() {    return uniqid( 'prnt-', true );
 }  
function m4is_cf0a( $m4is_k4yeul = [] ) {  global $wpdb;
  if ( empty( $m4is_k4yeul['contact_id'] ) ) { return false;
 }  $m4is_p9r_8e = empty( $m4is_k4yeul['contact'] ) ? [] : $m4is_k4yeul['contact'];
 $m4is_e2kg = empty( $m4is_k4yeul['contact_id'] ) ? 0 : $m4is_k4yeul['contact_id'];
 $m4is_kb24ju = empty( $m4is_k4yeul['parent_id'] ) ? 0 : $m4is_k4yeul['parent_id'];
 $m4is_c059uv = $this->settings['child_field'];
 $m4is_hgk2t6 = array_filter( explode( ',', $this->settings['parent_tags'] ) );
 $m4is_f7oyva = false;
  if ( empty( $m4is_p9r_8e[$m4is_c059uv] ) ) { return false;
 }  $m4is_r6nh_b = [ 'appname' => $this->m4is_bnd6ti->m4is_d14zr('appname'), 'contact_id' => isset( $m4is_p9r_8e['Id'] ) ? $m4is_p9r_8e['Id'] : 0, 'child_field' => $this->settings['child_field'], 'parent_id' => isset( $m4is_p9r_8e[$m4is_c059uv] ) ? $m4is_p9r_8e[$m4is_c059uv] : '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_k4yeul['parent_id'] = $this->m4is_v4mu( $m4is_k4yeul['parent_id'], 'parent' );
  $m4is_dj_2 = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "SELECT `c1`.`id`, `c2`.`value` as `tags` FROM `{$m4is_dj_2}` AS `c1`, `{$m4is_dj_2}` AS `c2` WHERE `c1`.`appname` = %s AND `c1`.`fieldname` = %s AND `c1`.`value` = %s AND `c1`.`id` <> %d AND `c2`.`id` = `c1`.`id` AND `c2`.`fieldname` = 'Groups' ORDER BY `c1`.`id`; ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_k4yeul['appname'], $m4is_k4yeul['child_field'], $m4is_k4yeul['parent_id'], $m4is_k4yeul['contact_id'] );
 $m4is_goa7x = $wpdb->get_row( $m4is_tovizk );
  $m4is_iystd2 = isset($m4is_goa7x->tags) ? explode(',', $m4is_goa7x->tags) : [];
  if ( array_intersect( $m4is_hgk2t6, $m4is_iystd2 ) ) { $m4is_f7oyva = $m4is_goa7x->id;
 }  return $m4is_f7oyva;
 }  
function m4is_eqph9($m4is_k4yeul = []) {  global $wpdb;
  $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_yynebu = $this->settings['child_field'];
 $m4is_l4dc = m4is_wbc8os::m4is_jjgo();
 $m4is_dtz9 = strtolower( $this->settings['parent_field'] );
 $m4is_e2kg = isset( $m4is_k4yeul['contact_id'] ) ? $m4is_k4yeul['contact_id'] : $m4is_l4dc;
 $m4is_kb24ju = $this->m4is_bnd6ti->m4is_tud7( $m4is_e2kg, $m4is_yynebu );
 $m4is_kepn = MEMBERIUM_DB_CONTACTS;
  $m4is_r6nh_b = [ 'appname' => $this->m4is_zq0k, 'child_field' => $m4is_yynebu, 'contact_id' => $m4is_e2kg, 'limit' => 0, 'offset' => 0, 'parent_id' => $m4is_kb24ju, ];
 $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
  if ( $m4is_k4yeul['parent_id'] <> $this->m4is_v4mu( $m4is_k4yeul['parent_id'], 'parent' ) ) { return 0;
 }  $m4is_k4yeul['parent_id'] = $this->m4is_v4mu( $m4is_k4yeul['parent_id'], 'child' );
 $m4is_tovizk = "SELECT count(*) FROM `{$m4is_kepn}` WHERE `appname` = %s AND `fieldname` = %s AND `value` = %s AND `id` <> %d ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_k4yeul['appname'], $m4is_k4yeul['child_field'], $m4is_k4yeul['parent_id'], $m4is_k4yeul['contact_id'] );
 $m4is_yer1mp = $wpdb->get_var( $m4is_tovizk );
  return $m4is_yer1mp;
 }  
function m4is__8vp( $m4is_k4yeul = [] ) {   $m4is_r6nh_b = [ 'user_id' => get_current_user_id(), ];
 $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
  if ( $this->m4is_bnd6ti->m4is_e28zam( $m4is_k4yeul['user_id'] ) ) {  return isset($_SESSION['keap']['contact']['!parent_id']) ? $_SESSION['keap']['contact']['!parent_id'] : 0;
 } }  
function m4is_drbm_5( $m4is_k4yeul = [] ) {  global $wpdb;
  $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_yynebu = $this->settings['child_field'];
 $m4is_l4dc = m4is_wbc8os::m4is_jjgo();
 $m4is_dtz9 = strtolower( $this->settings['parent_field'] );
 $m4is_e2kg = isset( $m4is_k4yeul['contact_id'] ) ? $m4is_k4yeul['contact_id'] : $m4is_l4dc;
 $m4is_kb24ju = $this->m4is_bnd6ti->m4is_tud7( $m4is_e2kg, $m4is_yynebu );
 $m4is_kepn = MEMBERIUM_DB_CONTACTS;
  $m4is_r6nh_b = [ 'appname' => $m4is_zq0k, 'child_field' => $m4is_yynebu, 'contact_id' => $m4is_e2kg, 'limit' => 0, 'offset' => 0, 'parent_id' => $m4is_kb24ju, ];
 $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
  if ( $m4is_k4yeul['parent_id'] <> $this->m4is_v4mu( $m4is_k4yeul['parent_id'], 'parent' ) ) { return [];
 }  $m4is_k4yeul['parent_id'] = $this->m4is_v4mu( $m4is_k4yeul['parent_id'], 'child' );
 $m4is_qtjxq = ( $m4is_k4yeul['limit'] > 0 ) ? " LIMIT {$m4is_k4yeul['limit']} OFFSET {$m4is_k4yeul['offset']} " : '';
  $m4is_tovizk = "
			SELECT `c1`.`id`
			FROM `{$m4is_kepn}` AS `c1`
			LEFT JOIN `{$m4is_kepn}` AS `c2`
			ON ( `c2`.`id` = `c1`.`id` AND `c2`.`appname` = %s AND `c2`.`fieldname` = 'LastName' )
			LEFT JOIN `{$m4is_kepn}` AS `c3`
			ON ( `c3`.`id` = `c1`.`id` AND `c3`.`appname` = %s AND `c3`.`fieldname` = 'FirstName' )
			WHERE `c1`.`appname` = %s
			AND `c1`.`fieldname` = %s
			AND `c1`.`value` = %s
			AND `c1`.`id` <> %d
			ORDER BY `c2`.`value`, `c3`.`value`, `c1`.`id` ASC
			{$m4is_qtjxq}
		";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_k4yeul['appname'], $m4is_k4yeul['appname'], $m4is_k4yeul['appname'], $m4is_k4yeul['child_field'], $m4is_k4yeul['parent_id'], $m4is_k4yeul['contact_id'] );
 $m4is_z59dj = $wpdb->get_col( $m4is_tovizk );
  return $m4is_z59dj;
 }  
function m4is_xxks( $m4is_k4yeul = [] ) {  $m4is_z59dj = $this->m4is_drbm_5( $m4is_k4yeul );
  if ( empty( $m4is_z59dj ) ) { return [];
 }  $wp_user_ids = [];
  foreach( $m4is_z59dj as $m4is_e2kg ) { $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $m4is_e2kg );
 if ( $m4is_ig9p6 ) { $wp_user_ids[] = $m4is_ig9p6;
 } }  return $wp_user_ids;
 }  
function m4is_gbkvj() : int {  $m4is_z59dj = $this->m4is_drbm_5();
  return (int) count( $m4is_z59dj );
 }    
function m4is_v_xjyh( $m4is_k4yeul = [] ) {  global $wpdb;
  $m4is_r6nh_b = [ 'child_contact' => [], 'm4is_e9m0g' => true, 'optin' => true, 'parent_contact_id' => 0, 'parent_contact' => [], ];
 $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
   if ( $m4is_k4yeul['parent_contact_id'] ) { $m4is_k4yeul['parent_contact'] = m4is_bnrdbo::m4is_yvnol( $m4is_k4yeul['parent_contact_id'] );
 }  if ( $m4is_k4yeul['child_contact_id'] ) { $m4is_k4yeul['child_contact'] = m4is_bnrdbo::m4is_yvnol( $m4is_k4yeul['child_contact_id'] );
 }  if ( empty( $m4is_k4yeul['child_contact'] ) || empty( $m4is_k4yeul['parent_contact'] ) ) { return -1;
 }  $m4is_u_hn = $this->m4is_t8op();
 $m4is_a9vp = isset( $m4is_k4yeul['parent_contact'][$m4is_u_hn] ) ? $m4is_k4yeul['parent_contact'][$m4is_u_hn] : '';
  if ( empty( $m4is_a9vp ) ) { return -2;
 }  $m4is_yynebu = $this->m4is_rptj();
 if ( ! empty( $m4is_k4yeul['child_contact'][$m4is_yynebu] ) ) { return -3;
 }  $m4is_wov2 = $this->m4is_bnd6ti->m4is_oiewvu();
 $m4is_dcf_7 = isset( $m4is_wov2['settings']['password_field']) ? $m4is_wov2['settings']['password_field'] : '';
  if ( $m4is_k4yeul['m4is_e9m0g'] && empty( $m4is_k4yeul['child_contact'][$m4is_dcf_7] ) ) { $m4is_k4yeul['child_contact'][$m4is_dcf_7] = $this->m4is_bnd6ti->m4is_e9m0g();
 }  $m4is_iw6m = (int) $m4is_k4yeul['child_contact']['Id'];
 $m4is_f7oyva = (int) $m4is_k4yeul['parent_contact_id']['Id'];
  if ( empty( $m4is_k4yeul['child_contact']['Id'] ) && ! empty( $m4is_k4yeul['child_contact_id']['Email'] ) ) {  $m4is_w_8g = $m4is_k4yeul['child_contact'];
 $m4is_w_8g[$m4is_yynebu] = $this->m4is_v4mu( $m4is_a9vp, 'child' );
  $m4is_iw6m = (int) m4is_bnrdbo::m4is_klk1gy($m4is_w_8g);
  if ( $m4is_iw6m ) {  $m4is_k4yeul = [ 'contact_id' => $m4is_iw6m, 'cache_ttl' => 0 ];
 $this->m4is_bnd6ti->m4is_pmj8bu( $m4is_k4yeul );
  $m4is_k4yeul['child_contact_id'] = $m4is_iw6m;
 $m4is_k4yeul['child_contact']['Id'] = $m4is_iw6m;
 $m4is_k4yeul['parent_contact_id'] = (int) $m4is_k4yeul['parent_contact_id'];
  if ( $m4is_k4yeul['optin'] ) { m4is_bnrdbo::m4is_xj2eb( $m4is_k4yeul['child_contact']['Email'], 'Added by Memberium Umbrella Account System' );
 }  m4is_ho3l::m4is_xy3j( $m4is_iw6m, $this->settings['child_added_goal'] );
 m4is_ho3l::m4is_xy3j( $m4is_f7oyva, $this->settings['parent_added_goal'] );
 m4is_tvc2xn::m4is_znq_1( $m4is_iw6m, (int) $this->settings['add_child_actionset'] );
 m4is_tvc2xn::m4is_znq_1( $m4is_f7oyva, (int) $this->settings['parent_added_actionset'] );
 } }  return $m4is_iw6m;
 }  
function m4is_v4mu( $m4is_carw7y = '', $m4is_n3zt = 'raw' ) {  if ( ! in_array( substr( $m4is_carw7y, 0, 5 ), ['chld-', 'prnt-']) ) { $m4is_n3zt = 'raw';
 }  $m4is_n3zt = strtolower( trim( $m4is_n3zt ) );
  if ( $m4is_n3zt == 'parent' ) { return 'prnt-' . substr( $m4is_carw7y, 5 );
 }  elseif ( $m4is_n3zt == 'child' ) { return 'chld-' . substr( $m4is_carw7y, 5 );
 }  else { return $m4is_carw7y;
 } }   public 
function m4is__vjw4( $m4is_s2ge5 = '' ) {  if ( empty( $m4is_s2ge5 ) ) { return $this->settings;
 }  return isset( $this->settings[$m4is_s2ge5] ) ? $this->settings[$m4is_s2ge5] : null;
 }   
function m4is_ayk9a( $m4is_iystd2 = '' ) {  $this->tag_mask = trim( $m4is_iystd2 );
  $this->settings['tag_mask'] = $this->tag_mask;
 }  
function m4is_tpyo4( $m4is_mdfbe = '' ) {  $this->tag_mask_field = $m4is_mdfbe;
  $this->settings['tag_mask_field'] = $this->tag_mask_field;
 }  
function m4is_xo18b( $m4is_g1ru50 = 'Email' ) {  $this->child_field = $m4is_g1ru50;
  $this->settings['child_field'] = $this->child_field;
 }  
function m4is_mwjfn( $m4is_yxwn, $m4is_rhi5 = true ) {  if ( $m4is_rhi5 === null ) { unset( $this->inherited_fields[$m4is_yxwn] );
 }  else { $this->inherited_fields[$m4is_yxwn] = (boolean) $m4is_rhi5;
 }  $this->settings['inherited_fields'] = $this->inherited_fields;
 }  
function m4is_i6fa0( $m4is_zhxzto = 0, $m4is_iiyf2c = 0 ) {  if ( ! $m4is_zhxzto && ! $m4is_iiyf2c ) { return;
 }  if ( $m4is_iiyf2c == 0 ) { unset( $this->tag_translation[$m4is_zhxzto] );
 }  if ( $m4is_iiyf2c > 0 ) { $this->tag_translation[$m4is_zhxzto] = $m4is_iiyf2c;
 }  $this->settings['tag_translation'] = $this->tag_translation;
 }  
function m4is_onxzm( $m4is_u_hn = 'Email3' ) {  $this->parent_field = $m4is_u_hn;
  $this->settings['parent_field'] = $this->parent_field;
 }  
function m4is_z7bi( int $m4is__c1d ) {  $this->add_child_actionset = $m4is__c1d;
  $this->settings['add_child_actionset'] = $this->add_child_actionset;
 }  
function m4is_ed1z0( int $m4is__c1d ) {  $this->parent_added_actionset = (int) $m4is__c1d;
  $this->settings['parent_added_actionset'] = $this->parent_added_actionset;
 }  
function m4is_z3vuhd( int $m4is__c1d ) {  $this->child_cancel_actionset = $m4is__c1d;
  $this->settings['child_cancel_actionset'] = $this->child_cancel_actionset;
 }  
function m4is_at_5() {   return $this->settings['add_child_actionset'];
 }  
function m4is_en1oy() {   return $this->settings['parent_added_actionset'];
 } }

