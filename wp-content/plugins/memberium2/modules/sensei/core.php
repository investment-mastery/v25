<?php
 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_btu_h { private static $m4is_ye0_i = false;
 private $m4is_zvwoe8 = [];
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() {  $this->m4is_ww61so();
 if ( ! is_admin() ) { return;
 }  require_once __DIR__ . '/admin.php';
  m4is_ge37ga::m4is_e5l8a9();
 }  private 
function m4is_ww61so() { add_action('memberium/session/updated', [$this, 'm4is_bp52d'], 10, 2);
 add_action('init', [$this, 'm4is_b4cqr'], PHP_INT_MAX);
 add_action('sensei_user_lesson_end', [$this, 'm4is_bzia38'], 10, 2);
 add_action('sensei_user_course_end', [$this, 'm4is_t_bw36'], 10, 2);
 add_action('sensei_user_quiz_grade', [$this, 'm4is_fjdom6'], 100, 5);
 add_filter('memberium/lms/name', [$this, 'm4is_ivhe24']);
 add_filter('memberium/lms/module_post_types', [$this, 'm4is_uh_ws6']);
 add_filter('memberium/lms/course_type', [$this, 'm4is_ubdl']);
 add_filter('memberium/lms/course_category', [$this, 'm4is_efbms']);
 add_filter('memberium/lms/course_tag', [$this, 'm4is_tevrpj']);
 add_filter('memberium/lms/user/course/progress', [$this, 'm4is_kya3lk'], 100, 2);
 add_filter('memberium/lms/course/item/data', [$this, 'm4is_ji1sh6'], 10, 2);
 add_filter('memberium/modules/active/names', function($m4is_r1g2u) { return array_merge($m4is_r1g2u, ['WooSensei for Memberium']);
 });
 }     
function m4is_ivhe24( $m4is_t5ot4 ) {  return 'Sensei';
 }  
function m4is_ubdl( $m4is_a_hn ) : string {  return 'course';
 }  
function m4is_efbms( $m4is_dc8t5 ) : string {    return 'course-category';
 }  
function m4is_tevrpj( $m4is_mpia ) : string {   return 'module';
 }  
function m4is_uh_ws6( $m4is_qtapuz = [] ) {  return array_merge( $m4is_qtapuz, [ 'course', 'lesson', ]);
 }     private 
function m4is_pb29( $m4is_ig9p6, $m4is_hc6lfy ) { global $wpdb;
  $m4is_hc6lfy = (int) $m4is_hc6lfy;
 $m4is_ig9p6 = (int) $m4is_ig9p6;
  $m4is_tovizk = "SELECT `comment_ID` FROM `{$wpdb->comments}` WHERE `comment_post_ID` = {$m4is_hc6lfy} AND `user_id` = {$m4is_ig9p6} AND `comment_approved` = 'passed' AND `comment_type` = 'sensei_lesson_status';";
  $m4is_qpno = (int) $wpdb->get_var( $m4is_tovizk );
  if ( $m4is_qpno ) { $m4is_pr5ok = get_comment_meta( $m4is_qpno );
 }  else { $m4is_pr5ok = [];
 }  return $m4is_pr5ok;
 }  private 
function m4is_kya3lk( $m4is_ig9p6, $m4is_nsnp ) {  global $wpdb;
  $m4is_nsnp = (int) $m4is_nsnp;
 $m4is_ig9p6 = (int) $m4is_ig9p6;
  $m4is_tovizk = "SELECT `comment_ID` FROM `{$wpdb->comments}` WHERE `comment_post_ID` = {$m4is_nsnp} AND `user_id` = {$m4is_ig9p6} AND `comment_approved` = 'complete' AND `comment_type` = 'sensei_course_status';";
 $m4is_qpno = (int) $wpdb->get_var( $m4is_tovizk );
  if ( $m4is_qpno ) { $m4is_pr5ok = get_comment_meta( $m4is_qpno );
 }  else { $m4is_pr5ok = [];
 }  return $m4is_pr5ok;
 }  private 
function m4is__hxf( $m4is_ig9p6, $m4is_u23rl, $m4is_wws9t ) {  $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
  if ( ! $m4is_e2kg ) { return;
 }  if ($m4is_u23rl == 'course') { $m4is_to81b = $this->m4is_kya3lk($m4is_ig9p6, $m4is_wws9t);
 } elseif ($m4is_u23rl == 'lesson') { $m4is_to81b = $this->m4is_pb29($m4is_ig9p6, $m4is_wws9t);
 } else {  return;
 }  $m4is_auhoe = get_post_meta($m4is_wws9t);
  if (! empty($m4is_auhoe['_is4wp_lms_start_date'][0]) ) { $m4is_yxwn = isset($m4is_auhoe['_is4wp_lms_start_date'][0]) ? $m4is_auhoe['_is4wp_lms_start_date'][0] : '';
 $m4is_ra9ly = isset($m4is_to81b['start'][0]) ? $m4is_to81b['start'][0] : '';
 m4is_pms8y::m4is_e5l8a9()->m4is_so3w($m4is_e2kg, $m4is_yxwn, $m4is_ra9ly);
 }  if (! empty($m4is_auhoe['_is4wp_lms_complete_percent'][0]) ) { $m4is_yxwn = isset($m4is_auhoe['_is4wp_lms_complete_percent'][0]) ? $m4is_auhoe['_is4wp_lms_complete_percent'][0] : '';
 $m4is_ra9ly = isset($m4is_to81b['percent'][0]) ? $m4is_to81b['percent'][0] : '';
 m4is_pms8y::m4is_e5l8a9()->m4is_so3w($m4is_e2kg, $m4is_yxwn, $m4is_ra9ly);
 }  if ( ! empty( $m4is_auhoe['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_auhoe['_is4wp_learndash_goals'][0], $m4is_e2kg );
 }  if ( ! empty( $m4is_auhoe['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_auhoe['_is4wp_learndash_tags'][0], $m4is_e2kg );
 }  if ( ! empty( $m4is_auhoe['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_auhoe['_is4wp_learndash_actions'][0], $m4is_e2kg );
 }  do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_wws9t);
 }  private 
function m4is_wl29k() {  global $wpdb;
  $m4is_u9vm = '_is4wp_learndash_autoenroll';
  $m4is_fm9x = $wpdb->posts;
 $m4is_e_icu = $wpdb->postmeta;
  $m4is_tovizk = "SELECT `ID`, `meta_value` FROM `{$m4is_fm9x}`, `{$m4is_e_icu}` WHERE post_status = 'publish' AND post_type = 'course' AND  post_id = ID AND meta_key = '{$m4is_u9vm}' AND meta_value > '' ";
  $m4is_t0lr4 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
  return $m4is_t0lr4;
 }  private 
function m4is_jipaf() {  return (int) sensei()->version;
 }  private 
function m4is_tyiw( $m4is_ig9p6, $m4is_nsnp ) {  $m4is_bu7y = $this->m4is_jipaf();
  if ( $m4is_bu7y == 2 ) { Sensei_Utils::user_start_course( $m4is_ig9p6, $m4is_nsnp );
  }  else { try { $m4is_aalyj = new Sensei_Frontend;
 $m4is_aalyj->manually_enrol_learner( $m4is_ig9p6, $m4is_nsnp );
 }  catch ( exception $m4is_lj28 ) { $this->m4is_zvwoe8[] = [ 'action' => 'add', 'user_id' => $m4is_ig9p6, 'course_id' => $m4is_nsnp, ];
 } } }  private 
function m4is_p9lf($m4is_ig9p6, $m4is_nsnp) {  $m4is_bu7y = $this->m4is_jipaf();
  if ($m4is_bu7y == 2) { sensei_utils::sensei_remove_user_from_course($m4is_nsnp, $m4is_ig9p6);
 }  else { try {  $m4is_aalyj = new Sensei_Frontend;
 $m4is_qnis = Sensei_Course_Manual_Enrolment_Provider::instance();
  sensei_utils::sensei_remove_user_from_course($m4is_nsnp, $m4is_ig9p6);
 $m4is_qnis->withdraw_learner( $m4is_ig9p6, $m4is_nsnp);
 }  catch (Exception $m4is_lj28) { $this->m4is_zvwoe8[] = [ 'action' => 'remove', 'user_id' => $m4is_ig9p6, 'course_id' => $m4is_nsnp, ];
 } } }  
function m4is_b4cqr() {  if ( empty( $this->m4is_zvwoe8 ) ) { return;
  }  foreach( $this->m4is_zvwoe8 as $m4is_s2ge5 => $m4is_w_o7al ) {  if ( $m4is_w_o7al['action'] == 'add' ) { $this->m4is_tyiw( $m4is_w_o7al['user_id'], $m4is_w_o7al['course_id'] );
 unset( $this->m4is_zvwoe8[$m4is_s2ge5] );
  }  if ( $m4is_w_o7al['action'] == 'remove' ) { $this->m4is_p9lf( $m4is_w_o7al['user_id'], $m4is_w_o7al['course_id'] );
 unset( $this->m4is_zvwoe8[$m4is_s2ge5] );
  } } }  
function m4is_bp52d( $m4is_ig9p6, $m4is_mdqgk ) {  if (user_can($m4is_ig9p6, 'manage_options')) { return;
  }  $m4is_t0lr4 = $this->m4is_wl29k();
  if (empty($m4is_t0lr4) || ! is_array($m4is_t0lr4)) { return;
  }  $m4is_cu892 = $this->m4is_jipaf();
 $m4is_amer1 = empty($m4is_mdqgk['keap']['contact']['groups']) ? '' : $m4is_mdqgk['keap']['contact']['groups'];
  foreach ($m4is_t0lr4 as $m4is_c2ah) {  $m4is_ifyt = $m4is_c2ah['meta_value'];
 $m4is_nsnp = $m4is_c2ah['ID'];
  $m4is_ztxa = m4is_pms8y::m4is_e5l8a9()->m4is_v1dwme($m4is_ifyt, $m4is_amer1);
 $m4is_r62th = sensei_utils::has_started_course($m4is_nsnp, $m4is_ig9p6);
  if ($m4is_r62th !== $m4is_ztxa) { if ($m4is_ztxa) {  $this->m4is_tyiw($m4is_ig9p6, $m4is_nsnp);
 } else {  $this->m4is_p9lf($m4is_ig9p6, $m4is_nsnp);
 } } } }  
function m4is_fjdom6($m4is_ig9p6, $m4is_c72_c, $m4is_dc42d, $m4is_u2kw, $m4is_owsqo) {  $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
  if (!$m4is_e2kg) { return;
 }  $m4is_l4sp = wp_get_post_parent_id($m4is_c72_c);
  $m4is_u23rl = get_post_type($m4is_l4sp);
  $m4is_auhoe = get_post_meta($m4is_c72_c);
  if (!empty($m4is_auhoe['_is4wp_lms_grade'][0])) { $m4is_yxwn = isset($m4is_auhoe['_is4wp_lms_grade'][0]) ? $m4is_auhoe['_is4wp_lms_grade'][0] : '';
 $m4is_ra9ly = $m4is_dc42d;
 m4is_pms8y::m4is_e5l8a9()->m4is_so3w($m4is_e2kg, $m4is_yxwn, "{$m4is_ra9ly}");
 }  if (!empty($m4is_auhoe['_is4wp_lms_completed'][0])) { $m4is_yxwn = isset($m4is_auhoe['_is4wp_lms_completed'][0]) ? $m4is_auhoe['_is4wp_lms_completed'][0] : '';
 $m4is_ra9ly = (int) ($m4is_dc42d >= $m4is_u2kw);
 m4is_pms8y::m4is_e5l8a9()->m4is_so3w($m4is_e2kg, $m4is_yxwn, $m4is_ra9ly);
 }  do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_wws9t);
 }  
function m4is_bzia38( $m4is_ig9p6, $m4is_hc6lfy ) {  $this->m4is__hxf( $m4is_ig9p6, 'lesson', $m4is_hc6lfy );
 }  
function m4is_t_bw36( $m4is_ig9p6, $m4is_nsnp ) {  $this->m4is__hxf($m4is_ig9p6, 'course', $m4is_nsnp);
 }  
function m4is_ji1sh6( array $m4is_etj2, int $m4is_cd8k ) {  if ( get_post_type( $m4is_cd8k ) !== 'course') { return $m4is_etj2;
 }  $m4is_ig9p6 = get_current_user_id();
  $m4is_etj2['access'] = m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o($m4is_cd8k, $m4is_ig9p6);
  if( ! $m4is_etj2['access'] ){ $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 }  $m4is_etj2['access'] = Sensei()->course->is_user_enrolled( $m4is_cd8k, $m4is_ig9p6 );
  if( ! $m4is_etj2['access'] ){ if( ! Sensei()->course->can_current_user_manually_enrol($m4is_cd8k) ){ $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 }  else{ $m4is_etj2['access'] = 1;
 $m4is_etj2['status'] = 'not_enrolled';
 } }  if( ! Sensei()->course->is_prerequisite_complete($m4is_cd8k) ){  $m4is_etj2['access'] = 0;
 $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 }  $m4is_etj2['progress'] = Sensei()->course->get_completion_percentage( $m4is_cd8k, $m4is_ig9p6 );
  return $m4is_etj2;
 } }

