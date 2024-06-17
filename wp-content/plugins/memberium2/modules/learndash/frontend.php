<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_a13i { private static $m4is_qgcls0 = [];
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_filter( 'learndash_shortcode_atts', [$this, 'm4is_x90jn'], 10, 2 );
 add_filter( 'learndash_get_lesson_list_args', [$this, 'm4is_be6zhx'], 10, 3 );
  add_filter( 'memberium/lms/course/item/data', [$this, 'm4is_ji1sh6'], 10, 2 );
 add_filter( 'memberium/registration_fields/custom', [$this, 'm4is_mtj6'], 10, 1 );
 }   static 
function m4is_kgu7($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { if ( ! is_user_logged_in() ) { return;
 } $m4is_r6nh_b = [ 'id' => 0, 'not' => '', ];
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 if (empty($m4is_qnjfv['id']) ) { return;
 } $m4is_qnjfv['not'] = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['not'], false);
 $m4is_ig9p6 = get_current_user_id();
 $m4is_cbqkda = get_user_meta($m4is_ig9p6, '_sfwd-course_progress', true);
 $m4is_ouxvo = false;
 if (is_array($m4is_cbqkda) ) { foreach($m4is_cbqkda as $m4is_vcqzl => $m4is_ouqlyk) { if ($m4is_qnjfv['id'] == $m4is_vcqzl && $m4is_ouqlyk['total'] == $m4is_ouqlyk['completed']) { $m4is_ouxvo = true;
 break;
 } if ( ! empty($m4is_ouqlyk['lessons'][$m4is_qnjfv['id']] ) ) { $m4is_ouxvo = true;
 break;
 } if ( ! empty($m4is_ouqlyk['topics'][$m4is_qnjfv['id']] ) ) { $m4is_ouxvo = true;
 break;
 } } } if ($m4is_qnjfv['not']) { $m4is_ouxvo = ! $m4is_ouxvo;
 } $m4is_oju3a2 = '';
 $m4is_nbu4n = '';
 $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is_ouxvo);
 return m4is_crqo::m4is__go6j(true, $m4is_uzfw8j, $m4is_oju3a2, $m4is_nbu4n);
 }   static 
function m4is_vpo3a($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { if ( ! is_user_logged_in() ) { return;
 } $m4is_r6nh_b = [ 'id' => 0, 'not' => false, 'txtfmt' => '', 'capture' => '', ];
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_m1red = ld_get_mycourses(get_current_user_id() );
 $m4is__8htld = ($m4is_m1red) && in_array($m4is_qnjfv['id'], $m4is_m1red);
 if ($m4is_qnjfv['not']) { $m4is__8htld = ! $m4is__8htld;
 } $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is__8htld);
 return m4is_crqo::m4is__go6j(true, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 }    static 
function m4is_lgj7vw($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { if (! is_singular() ) { return;
 } if (! is_user_logged_in() ) { return;
 } if (! function_exists('ld_update_course_access') ) { return 'LearnDash not installed<br />';
 } $m4is_r6nh_b = [ 'course_id' => 0, 'user_id' => get_current_user_id(), ];
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['course_id'] = (int) $m4is_qnjfv['course_id'];
 if (empty($m4is_qnjfv['course_id']) || empty($m4is_qnjfv['user_id']) ) { return;
 } if (! get_post_status($m4is_qnjfv['course_id']) ) { return 'Invalid Course ID<br />';
 } $m4is_xxbt9 = (bool) ( strtolower( trim( $m4is_carw7y ) ) == 'memb_learndash_course_unenroll' );
 ld_update_course_access( $m4is_qnjfv['user_id'], $m4is_qnjfv['course_id'], $m4is_xxbt9 );
 } 
function m4is_x90jn( $m4is_jucpr, $m4is_ldjf8y ) { if ( ! empty( $m4is_jucpr['post__in'] ) && is_array( $m4is_jucpr['post__in'] ) ) { foreach( $m4is_jucpr['post__in'] as $m4is_s2ge5 => $m4is_cd8k ) { if ( ! m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o( $m4is_cd8k ) ) { unset( $m4is_jucpr['post__in'][$m4is_s2ge5] );
 } } } return $m4is_jucpr;
 } 
function m4is_be6zhx( $m4is_k4yeul, $m4is_j5sy07, $m4is_nsnp ) { if ( ! empty( $m4is_k4yeul['post__in'] ) && is_array( $m4is_k4yeul['post__in'] ) ) { foreach( $m4is_k4yeul['post__in'] as $m4is_s2ge5 => $m4is_cd8k ) { if ( ! m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o( $m4is_cd8k ) ) { unset( $m4is_k4yeul['post__in'][$m4is_s2ge5] );
 } } } return $m4is_k4yeul;
 }  
function m4is_mtj6($m4is_j4lxnf) { $m4is_b1inx6 = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 15);
 foreach($m4is_b1inx6 as $m4is_iidm) { if ($m4is_iidm['function'] == 'learndash_login_shortcode') { return true;
 } } return $m4is_j4lxnf;
 }   
function m4is_ji1sh6(array $m4is_etj2, int $m4is_cd8k) { if (get_post_type($m4is_cd8k) !== 'sfwd-courses') { return $m4is_etj2;
 } $m4is_ig9p6 = get_current_user_id();
 $m4is_p51e_l = get_post_meta($m4is_cd8k, '_sfwd-courses', true);
 $m4is_etj2['access'] = sfwd_lms_has_access($m4is_cd8k, $m4is_ig9p6);
   if( ! $m4is_etj2['access'] ){ $m4is_etj2['status'] = 'locked';
 return $m4is_etj2;
 }  $m4is_cbqkda = learndash_course_progress([ 'course_id' => $m4is_cd8k, 'user_id' => $m4is_ig9p6, 'array' => true, ]);
 $m4is_etj2['progress'] = ( $m4is_cbqkda && !empty($m4is_cbqkda['percentage']) ) ? $m4is_cbqkda['percentage'] : 0;
 $m4is_etj2['status'] = 'locked';
  $m4is_k9bz2j = isset($m4is_p51e_l['sfwd-courses_course_price_type']) ? $m4is_p51e_l['sfwd-courses_course_price_type'] : 'open';
 if( in_array($m4is_k9bz2j, ['open', 'free']) ){ $m4is_etj2['status'] = 'unlocked';
 } else if ( in_array($m4is_k9bz2j, ['paynow', 'closed', 'subscribe']) ){ if( $m4is_etj2['access'] ) { $m4is_etj2['status'] = 'unlocked';
 } } if( $m4is_etj2['status'] !== 'locked' ){ if( !is_course_prerequities_completed($m4is_nsnp) ){ $m4is_etj2['status'] = 'locked';
  } } return $m4is_etj2;
 }   }

