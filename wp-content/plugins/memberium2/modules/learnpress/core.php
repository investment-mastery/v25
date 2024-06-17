<?php
 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_u0j7b2 { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } 
function __construct() { $this->m4is_ww61so();
 if ( is_admin() ) { require __DIR__ . '/admin.php';
 m4is_y639::m4is_e5l8a9();
 } } private 
function m4is_ww61so() { add_action( 'learn-press/user-completed-lesson', [$this, 'm4is_nfqin'], 10, 3 );
  add_action( 'learn-press/user-course-finished', [$this, 'm4is_l_xm'], 10, 3 );
  add_action( 'learn-press/user/quiz-finished', [$this, 'm4is_ppaoc'], 10, 3 );
  add_action( 'memberium/session/created', [$this, 'm4is_fa7oiz'], 10, 1 );
 add_filter( 'learn-press/has-enrolled-course', [$this, 'm4is_ntieaq'], 10, 3 );
 add_filter( 'memberium/posts/unenhanced', [$this, 'm4is_garc6h'], 10, 1 );
 add_filter( 'memberium/lms/module_post_types', [$this, 'm4is_uh_ws6'] );
 add_filter( 'memberium/lms/name', [$this, 'm4is_ivhe24'] );
 } private 
function m4is_pc0bj_() { static $m4is_t0lr4 = [];
 if ( empty( $m4is_t0lr4 ) ) { global $wpdb;
 $m4is_fm9x = $wpdb->posts;
 $m4is_e_icu = $wpdb->postmeta;
 $m4is_tovizk = "SELECT `ID`, `meta_value` FROM `{$m4is_fm9x}`, `{$m4is_e_icu}` WHERE `post_status` = 'publish' AND `post_type` = 'lp_course' AND `post_id` = `ID` AND `meta_key` = '_is4wp_learndash_autoenroll' AND `meta_value` > '' ";
 $m4is_t0lr4 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 } return $m4is_t0lr4;
 } private 
function m4is_i0m1c( int $m4is_ig9p6 ) { if ( empty( $m4is_ig9p6 ) ) { return [];
 } if ( ! method_exists( 'lp_user', 'get_orders') ) { error_log('Memberium LearnPress Integration:  LP_User get_orders() method missing.');
 return [];
 } $m4is_cox81 = new lp_user( $m4is_ig9p6 );
 $m4is_msjbzn = $m4is_cox81->get_orders();
 $m4is_d6w3io = [];
 foreach ( $m4is_msjbzn as $m4is_nsnp => $m4is_ae8w ) { $m4is_d6w3io[] = $m4is_nsnp;
 } return $m4is_d6w3io;
 } 
function m4is_garc6h( $m4is_fvc10 ) { $m4is_fvc10[] = 'lp_order';
 return $m4is_fvc10;
 } 
function m4is_fa7oiz( $m4is_mdqgk = false ) { if ( empty( $m4is_mdqgk['keap']['contact']['groups'] ) ) { return;
 } global $wpdb;
 static $m4is_uj1zr5 = [];
 $m4is_ig9p6 = isset( $m4is_mdqgk['memb_user']['user_id'] ) ? $m4is_mdqgk['memb_user']['user_id'] : 0;
 $m4is_t0lr4 = $this->m4is_pc0bj_();
 if (empty($m4is_t0lr4) ) { return;
 } $m4is_m1red = $this->m4is_i0m1c( $m4is_ig9p6 );
 foreach ( $m4is_t0lr4 as $m4is_c2ah ) { $m4is_cd8k = $m4is_c2ah['ID'];
 $m4is_k8xm = in_array($m4is_cd8k, $m4is_m1red) || in_array($m4is_cd8k, $m4is_uj1zr5);
 $m4is_ucfbs = trim($m4is_c2ah['meta_value'], ',');
 if ( ! $m4is_k8xm ) { if ( m4is_pms8y::m4is_e5l8a9()->m4is_sjmzx($m4is_ucfbs, $m4is_mdqgk) ) {  if ( class_exists( 'LearnPress\Models\UserItems\UserCourseModel' ) ) { $m4is_was47 = new LearnPress\Models\UserItems\UserCourseModel;
 $m4is_was47->user_id = $m4is_ig9p6;
 $m4is_was47->item_id = $m4is_cd8k;
 $m4is_was47->item_type = LP_COURSE_CPT;
 $m4is_was47->ref_type = '';
 $m4is_was47->status = LP_COURSE_ENROLLED;
 $m4is_was47->graduation = LP_COURSE_GRADUATION_IN_PROGRESS;
 $m4is_was47->start_time = gmdate( LP_Datetime::$format, time() );
 $m4is_was47->save();
 $m4is_uj1zr5[] = $m4is_cd8k;
 } else { error_log( 'Memberium:  LearnPress has broken their own API for a third time.  LearnPress\Models\UserItems\UserCourseModel not found.' );
 } } } } } 
function m4is_gyga( $m4is_ig9p6, $m4is_nsnp ) { if ( empty($m4is_nsnp) || empty($m4is_ig9p6) ) { return false;
 } if ( ! function_exists( 'learn_press_create_order' ) ) { error_log('Memberium LearnPress Integration:  learn_press_create_order() function missing.');
 return false;
 } if ( ! function_exists( 'learn_press_add_order_item' ) ) { error_log('Memberium LearnPress Integration:  learn_press_add_order_item() function missing.');
 return false;
 } if ( ! function_exists( 'learn_press_update_order_status' ) ) { error_log('Memberium LearnPress Integration:  learn_press_update_order_status() function missing.');
 return false;
 } if ( ! class_exists( 'lp_user' ) ) { error_log('Memberium LearnPress Integration:  lp_user class missing.');
 return false;
 } $m4is_cox81 = new lp_user($m4is_ig9p6);
 $m4is_wdjmn = learn_press_create_order(null);
 $m4is_ae8w = $m4is_wdjmn->get_id();
 $m4is_wdjmn->set_user_id($m4is_ig9p6);
 $m4is_wdjmn->save();
 learn_press_add_order_item( $m4is_ae8w, $m4is_nsnp );
 learn_press_update_order_status( $m4is_ae8w, 'lp-completed' );
  return $m4is_ae8w;
 } 
function m4is_ntieaq( $m4is_gjadf4, $m4is_ig9p6, $m4is_nsnp ) { $m4is_ucfbs = get_post_meta($m4is_nsnp, '_is4wp_learndash_autoenroll', true);
 if (! empty($m4is_ucfbs) ) { $m4is_mdqgk = (isset($_SESSION['memb_user']['user_id']) && $m4is_ig9p6 == $_SESSION['memb_user']['user_id']) ? $_SESSION : m4is_pms8y::m4is_e5l8a9()->m4is_akz3($m4is_ig9p6);
 if (isset($_SESSION['keap']['contact']['id']) ) { $m4is_gjadf4 = m4is_pms8y::m4is_e5l8a9()->m4is_sjmzx( $m4is_ucfbs, $m4is_mdqgk );
 } } return $m4is_gjadf4;
 } 
function m4is_nfqin( $m4is_hc6lfy, $m4is_oa_z, $m4is_ig9p6 ) { $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_e2kg || ! $m4is_ig9p6 ) { return;
 } $m4is_p51e_l = get_post_meta( $m4is_hc6lfy );
 if ( ! empty( $m4is_p51e_l['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_p51e_l['_is4wp_learndash_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_is4wp_learndash_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_p51e_l['_is4wp_learndash_actions'][0], $m4is_e2kg );
 } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_hc6lfy);
 } 
function m4is_ppaoc( $m4is_c72_c, $m4is_nsnp, $m4is_ig9p6 ) { $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( $m4is_e2kg && $m4is_c72_c ) { $m4is_j5r6yu = get_post_meta( $m4is_c72_c, '_lp_passing_grade', true );
 if ( $m4is_j5r6yu !== false ) {  $m4is_j5r6yu = (int) $m4is_j5r6yu;
 $m4is_cox81 = new LP_User( $m4is_ig9p6 );
 $m4is_ugftm = $m4is_cox81->get_quiz_results( $m4is_c72_c, $m4is_nsnp );
 $m4is_a5ima_ = (int) $m4is_ugftm;
 $m4is_g2zhe7 = ( $m4is_a5ima_ >= $m4is_j5r6yu );
 $m4is_p51e_l = get_post_meta( $m4is_c72_c );
 if ( $m4is_g2zhe7 ) { if ( ! empty( $m4is_p51e_l['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_p51e_l['_is4wp_learndash_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_is4wp_learndash_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_p51e_l['_is4wp_learndash_actions'][0], $m4is_e2kg );
 } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_c72_c);
 } else { if ( ! empty( $m4is_p51e_l['_is4wp_learndash_fail_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_p51e_l['_is4wp_learndash_fail_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_fail_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_is4wp_learndash_fail_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_fail_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_p51e_l['_is4wp_learndash_fail_actions'][0], $m4is_e2kg );
 } } } }  } 
function m4is_l_xm( $m4is_nsnp, $m4is_ig9p6, $m4is_mi9g ) { $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_e2kg || ! $m4is_ig9p6 ) { return;
 } $m4is_p51e_l = get_post_meta($m4is_nsnp);
 if ( ! empty( $m4is_p51e_l['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_p51e_l['_is4wp_learndash_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_is4wp_learndash_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_p51e_l['_is4wp_learndash_actions'][0], $m4is_e2kg );
 } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_nsnp);
 } 
function m4is_uh_ws6( $m4is_qtapuz = [] ) { return array_merge($m4is_qtapuz, [ 'lp_course', 'lp_lesson', 'lp_quiz', ]);
 } 
function m4is_ivhe24( $m4is_t5ot4 ) { return 'LearnPress';
 } }

