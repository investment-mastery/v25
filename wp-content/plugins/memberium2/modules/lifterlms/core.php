<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_tcv7lh { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 if ( is_admin() ) { include __DIR__ . '/admin.php';
 m4is_x43x::m4is_e5l8a9();
 } } private 
function m4is_ww61so() { add_action( 'lifterlms_course_completed', [$this, 'm4is_kl3q'], 5, 2 );
 add_action( 'lifterlms_quiz_completed', [$this, 'm4is_escz'], 5, 2 );
 add_action( 'llms_trigger_lesson_completion', [$this, 'm4is_n416bi'], 5, 2 );
 add_action( 'llms_user_added_to_membership_level', [$this, 'm4is_wizt'], 5, 2 );
 add_action( 'llms_user_removed_from_membership_level', [$this, 'm4is_pxyj8'], 5, 2 );
 add_action( 'memberium/session/updated', [$this, 'm4is_tt4k'], 10, 2);
 add_filter( 'memberium/lms/course_category', [$this, 'm4is_efbms']);
 add_filter( 'memberium/lms/course_tag', [$this, 'm4is_tevrpj']);
 add_filter( 'memberium/lms/course_type', [$this, 'm4is_ubdl']);
 add_filter( 'memberium/lms/course/item/data', [$this, 'm4is_ji1sh6'], 10, 2);
 }  
function m4is_wizt( $m4is_ig9p6, $m4is_xbjma ) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( $m4is_e2kg ) { $m4is_p51e_l = get_post_meta( $m4is_xbjma );
 } }  
function m4is_pxyj8( $m4is_ig9p6, $m4is_xbjma ) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( $m4is_e2kg ) { $m4is_p51e_l = get_post_meta( $m4is_xbjma );
 } } 
function m4is_kl3q($m4is_ig9p6, $m4is_nsnp) { $m4is_p51e_l = get_post_meta( $m4is_nsnp );
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( $m4is_e2kg ) { if ( ! empty( $m4is_p51e_l['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_p51e_l['_is4wp_learndash_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_is4wp_learndash_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_p51e_l['_is4wp_learndash_actions'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_p51e_l['_is4wp_learndash_shortcodes'][0] ) ) { $result = doShortcode( $m4is_p51e_l['_is4wp_learndash_shortcodes'][0], true );
 } } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_nsnp);
 } 
function m4is_n416bi( $m4is_ig9p6, $m4is_hc6lfy ) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 $m4is_uq0t = get_post_meta($m4is_hc6lfy);
 if ($m4is_e2kg) { if ( ! empty( $m4is_uq0t['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_uq0t['_is4wp_learndash_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_uq0t['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_uq0t['_is4wp_learndash_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_uq0t['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_uq0t['_is4wp_learndash_actions'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_uq0t['_is4wp_learndash_shortcodes'][0] ) ) { doShortcode( $m4is_uq0t['_is4wp_learndash_shortcodes'][0], true );
 } } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_hc6lfy);
 } 
function m4is_escz( $m4is_ig9p6, $m4is_w781 ) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 $m4is_c72_c = $m4is_w781['id'];
 $m4is_uq0t = get_post_meta( $m4is_c72_c );
 if (! $m4is_w781['passed']) { return;
 } if (! $m4is_e2kg) { if ( ! empty( $m4is_uq0t['_is4wp_learndash_goals'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_( $m4is_uq0t['_is4wp_learndash_goals'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_uq0t['_is4wp_learndash_tags'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_uq0t['_is4wp_learndash_tags'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_uq0t['_is4wp_learndash_actions'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $m4is_uq0t['_is4wp_learndash_actions'][0], $m4is_e2kg );
 } if ( ! empty( $m4is_uq0t['_is4wp_learndash_shortcodes'][0] ) ) { $result = doShortcode( $m4is_uq0t['_is4wp_learndash_shortcodes'][0], true );
 } } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_c72_c);
 } 
function m4is_tt4k($m4is_ig9p6, $m4is_mdqgk) { global $wpdb;
  $m4is_fm9x = $wpdb->posts;
 $m4is_e_icu = $wpdb->postmeta;
 $m4is_tovizk = "SELECT ID, meta_value FROM {$m4is_fm9x}, {$m4is_e_icu} WHERE post_status = 'publish' AND post_type = 'course' AND  post_id = ID AND meta_key = '_is4wp_learndash_autoenroll' AND meta_value > '' ";
 $m4is_t0lr4 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 if ( is_array( $m4is_t0lr4 ) && ! empty( $m4is_t0lr4 ) ) { $m4is_sjh8m = new LLMS_Student( $m4is_ig9p6 );
 foreach ( $m4is_t0lr4 as $m4is_c2ah ) { $m4is_r62th = llms_is_user_enrolled( $m4is_ig9p6, $m4is_c2ah['ID'] );
 $m4is_ztxa = m4is_pms8y::m4is_e5l8a9()->m4is_sjmzx( $m4is_c2ah['meta_value'], $m4is_mdqgk );
 if ( $m4is_r62th ) { if ( ! $m4is_ztxa ) { $m4is_sjh8m->unenroll( $m4is_c2ah['ID'] );
 } } else { if ( $m4is_ztxa ) { $m4is_sjh8m->enroll( $m4is_c2ah['ID'] );
 } } } } }  
function m4is_ji1sh6(array $m4is_etj2, int $m4is_cd8k){ if (get_post_type($m4is_cd8k) !== 'course') { return $m4is_etj2;
 } $m4is_ig9p6 = get_current_user_id();
  $m4is_etj2['access'] = m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o($m4is_cd8k, $m4is_ig9p6);
 if( ! $m4is_etj2['access'] ){ $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 } $m4is_ouqlyk = new LLMS_Course( $m4is_cd8k );
  $m4is_r62th = llms_is_user_enrolled( $m4is_ig9p6, $m4is_cd8k );
 if( ! $m4is_r62th ){ if( ! $m4is_ouqlyk->is_enrollment_open() || ! $m4is_ouqlyk->has_capacity() ){ $m4is_etj2['access'] = 0;
 $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 } else{ $m4is_etj2['status'] = 'not_enrolled';
 } $m4is_etj2['url'] = $m4is_ouqlyk->get_sales_page_url();
 }  if ( $m4is_ouqlyk->has_prerequisite( 'course' ) && ! $m4is_ouqlyk->is_prerequisite_complete( 'course' ) ){ $m4is_etj2['access'] = 0;
  $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 }  if ( $m4is_ouqlyk->has_prerequisite( 'course_track' ) && ! $m4is_ouqlyk->is_prerequisite_complete( 'course_track' ) ) { $m4is_etj2['access'] = 0;
  $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 } $m4is_etj2['progress'] = $m4is_ouqlyk->get_percent_complete( $m4is_ig9p6 );
 return $m4is_etj2;
 } 
function m4is_ubdl($m4is_a_hn) { return 'course';
 } 
function m4is_efbms($m4is_dc8t5) { return 'course_cat';
 } 
function m4is_tevrpj($m4is_mpia) { return 'course_tag';
 } }

