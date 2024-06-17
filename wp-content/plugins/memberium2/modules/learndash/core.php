<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_qqx6yv { private $m4is_bnd6ti;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->m4is_ww61so();
 $this->m4is_jq0ld();
 }    private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 } private 
function m4is_jq0ld() { if ( is_admin() ) { require __DIR__ . '/admin.php';
 m4is__dhu0::m4is_e5l8a9();
 } else { require __DIR__ . '/frontend.php';
 m4is_a13i::m4is_e5l8a9();
 $this->m4is_z5ia();
 } }  private 
function m4is_ww61so() { add_action( 'learndash_assignment_approved', [$this, 'm4is_anyq'], 10, 1 );
 add_action( 'learndash_assignment_uploaded', [$this, 'm4is_bip_'], 10, 2 );
 add_action( 'learndash_course_completed', [$this, 'm4is_kl3q'], 5, 1 );
 add_action( 'learndash_lesson_completed',[$this, 'm4is_n416bi'], 5, 1 );
 add_action( 'learndash_quiz_submitted', [$this, 'm4is_zm1is'], 5, 2 );
 add_action( 'learndash_topic_completed', [$this, 'm4is_q1e35'], 5, 1 );
 add_action( 'memberium/shortcodes/add', [$this, 'm4is_z5ia'] );
 add_action( 'memberium/shortcodes/remove', [$this, 'm4is_h72ig'] );
 add_action( 'template_redirect', [$this, 'm4is_wrnhc'], 901 );
  add_filter( 'ld_lesson_access_from', [$this, 'm4is_hcxbk'], PHP_INT_MAX, 3);
 add_filter( 'learndash_certificate_pdf_page_formats', [$this, 'm4is_n_6p'], 10 );
 add_filter( 'learndash_content_access', [$this, 'm4is_dvu19'], 5, 2 );
 add_filter( 'learndash_course_completion_url', [$this, 'm4is_gk9ym'], 5, 2 );
 add_filter( 'memberium/lms/course_category', [$this, 'm4is_efbms']);
 add_filter( 'memberium/lms/course_tag', [$this, 'm4is_tevrpj']);
 add_filter( 'memberium/lms/course_type', [$this, 'm4is_ubdl']);
 add_filter( 'memberium/lms/module_post_types', [$this, 'm4is_uh_ws6']);
 add_filter( 'memberium/lms/name', [$this, 'm4is_ivhe24']);
 add_filter( 'memberium/posts/unenhanced', [$this, 'm4is_k6m4'], 10, 1);
 add_filter( 'sfwd_lms_has_access', [$this, 'm4is_fsz08'], PHP_INT_MAX, 3 );
 add_filter( 'learndash_can_user_read_step', [$this, 'm4is_tou6wc'], 10, 3 );
  remove_action( 'wp_login_failed', 'learndash_login_failed' );
 add_action( 'wp_login_failed', 'learndash_login_failed', 100, 1 );
 if ( ! defined( 'DISABLE_LEARNDASH_ENROLL' ) ) { add_action( 'memberium/session/updated', [$this,'m4is_uqveb'], 10, 2 );
 add_action( 'memberium/session/updated', [$this,'m4is_ck7ivw'], 11, 2 );
 } $this->m4is_z5ia();
 }  
function m4is_tou6wc( $m4is_coyid_, $m4is_gje7b, $m4is_nsnp ) { if ( $m4is_coyid_ ) { $m4is_coyid_ = m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o( $m4is_gje7b );
 } return $m4is_coyid_;
 }  private 
function m4is_iu1lv() { global $wpdb;
 $m4is_jqfo = implode(',', learndash_get_open_courses() );
 $m4is_fm9x = $wpdb->posts;
 $m4is_e_icu = $wpdb->postmeta;
 $m4is_tovizk = "SELECT `ID`, `meta_value` FROM `{$m4is_fm9x}`, `{$m4is_e_icu}` WHERE `post_status` = 'publish' AND `post_type` = 'sfwd-courses' AND `post_id` = `ID` AND `meta_key` = '_is4wp_learndash_autoenroll' AND `meta_value` > '' ";
 if (! empty($m4is_jqfo)) { $m4is_tovizk .= " AND `ID` NOT IN ( {$m4is_jqfo} ) ";
 } return $wpdb->get_results($m4is_tovizk, ARRAY_A);
;
 }  
function m4is_mlqw() { global $wpdb;
 $m4is_fm9x = $wpdb->posts;
 $m4is_e_icu = $wpdb->postmeta;
  $m4is_tovizk = "
            SELECT ID, meta_value 
            FROM {$m4is_fm9x}, {$m4is_e_icu} 
            WHERE post_status = 'publish' 
                AND post_type = 'groups' 
                AND post_id = ID 
                AND meta_key = '_is4wp_learndash_autojoin' 
                AND meta_value > ''
        ";
  $m4is_g51_sx = $wpdb->get_results($m4is_tovizk, ARRAY_A);
  $m4is_g51_sx = apply_filters('memberium/lms/autojoin_groups', $m4is_g51_sx);
 return $m4is_g51_sx;
 }  
function m4is_k6m4($m4is_fvc10 =[] ) { $m4is_fvc10[] = 'sfwd-essays';
 return $m4is_fvc10;
 }  
function m4is_ubdl($m4is_a_hn) { return 'sfwd-courses';
 }  
function m4is_efbms($m4is_dc8t5) { return 'ld_course_category';
 }  
function m4is_tevrpj($m4is_mpia) { return 'ld_course_tag';
 }  
function m4is_ivhe24($m4is_t5ot4) { return 'LearnDash';
 } 
function m4is_uh_ws6($m4is_qtapuz = []) { return array_merge($m4is_qtapuz, [ 'sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'sfwd-quiz', ]);
 }    
function m4is_fsz08( $m4is_w_o7al, $m4is_cd8k, $m4is_ig9p6 ) { $m4is_cd8k = (int) $m4is_cd8k;
 $m4is_w_o7al = (bool) $m4is_w_o7al;
  if ( ! $m4is_w_o7al ) { return $m4is_w_o7al;
 }  if ( get_post_type( $m4is_cd8k ) !== 'sfwd-courses' ) { return $m4is_w_o7al;
 }  $m4is_ig9p6 = $m4is_ig9p6 ? $m4is_ig9p6 : get_current_user_id();
  if ( $m4is_ig9p6 ) { if ( user_can( $m4is_ig9p6, 'edit_others_posts' ) || user_can( $m4is_ig9p6, 'edit_post', $m4is_cd8k ) ) { return true;
 } } return m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o( (int) $m4is_cd8k, (int) $m4is_ig9p6 );
 } 
function m4is_hcxbk($m4is_ctwa, $m4is_hc6lfy, $m4is_ig9p6){ $m4is_yt9k4 = time();
 if ( $m4is_ctwa < $m4is_yt9k4 ) { return $m4is_ctwa;
 } static $m4is_etj2 = [];
 $m4is_nsnp = learndash_get_course_id( $m4is_hc6lfy );
  if( !isset($m4is_etj2[$m4is_nsnp]) ){ $m4is_etj2[$m4is_nsnp] = [ 'tags' => get_post_meta($m4is_nsnp, '_is4wp_learndash_drip_feed_override', true), 'users' => [] ];
 }  if( empty($m4is_etj2[$m4is_nsnp]['users'][$m4is_ig9p6]) ){ if( !empty($m4is_etj2[$m4is_nsnp]['tags']) ){ $m4is_etj2[$m4is_nsnp]['users'][$m4is_ig9p6] = m4is_w0enbm::m4is_e5l8a9()->m4is_ux59ig(false, [ 'tags1' => $m4is_etj2[$m4is_nsnp]['tags'] ]);
 } else{ $m4is_etj2[$m4is_nsnp]['users'][$m4is_ig9p6] = false;
 } } return $m4is_etj2[$m4is_nsnp]['users'][$m4is_ig9p6] ? null : $m4is_ctwa;
 } 
function m4is_kjtod( $m4is__osk8, $m4is_c2ah, $m4is_x0_hk ) { if ( ! is_a( $m4is_c2ah, 'WP_Post' ) ) { return;
 } if ( $m4is__osk8 ) { $m4is_ig9p6 = (int) $m4is_x0_hk->ID;
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ($m4is_e2kg) { $m4is_cd8k = (int) $m4is_c2ah->ID;
 $m4is_xdxkbf = get_post( $m4is_cd8k, 'ARRAY_A' );
 $m4is_otam_0 = get_user_meta( $m4is_ig9p6, '_sfwd-quizzes', true );
 foreach( $m4is_otam_0 as $m4is_y6guf ) { if ( $m4is_y6guf['quiz'] == $m4is_cd8k ) { $m4is_r86rgc = false;
 } } } do_action( 'memberium/lms/completion', $m4is_ig9p6, $m4is_cd8k );
 }  }  
function m4is_bip_($m4is_c1a6 = 0, $m4is_zgmp = []) { if ( ! $m4is_c1a6 ) { return;
 } $m4is_ig9p6 = isset( $m4is_zgmp['user_id'] ) ? $m4is_zgmp['user_id'] : 0;
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_e2kg ) { return;
 } $m4is_cd8k = isset( $m4is_zgmp['lesson_id'] ) ? $m4is_zgmp['lesson_id'] : 0;
 if ( ! $m4is_cd8k ) { return;
 } $m4is_p51e_l = get_post_meta( $m4is_cd8k );
 if ( ! empty( $m4is_p51e_l['_memberium_lms_assignment_upload_tag'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_memberium_lms_assignment_upload_tag'][0], $m4is_e2kg );
 } } 
function m4is_anyq($m4is_r7la = 0) { $m4is_r7la = (int) $m4is_r7la;
 if ( ! $m4is_r7la ) { return;
 } $m4is_zgmp = get_post_meta( $m4is_r7la );
 $m4is_cd8k = isset( $m4is_zgmp['lesson_id'][0] ) ? $m4is_zgmp['lesson_id'][0] : 0;
 $m4is_ig9p6 = isset( $m4is_zgmp['user_id'][0] ) ? $m4is_zgmp['user_id'][0] : 0;
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_e2kg ) { return;
 } $m4is_p51e_l = get_post_meta( $m4is_cd8k );
 if ( ! empty( $m4is_p51e_l['_memberium_lms_assignment_approval_tag'][0] ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_p51e_l['_memberium_lms_assignment_approval_tag'][0], $m4is_e2kg );
 } } 
function m4is_uqveb( $m4is_ig9p6 = 0, $m4is_mdqgk = [] ) { global $wpdb;
 if ( ! function_exists( 'learndash_set_groups_users' ) ) { return;
 } if ( user_can( $m4is_ig9p6, 'manage_options' ) ) { return;
 } $m4is_vwdb4 = $this->m4is_mlqw();
 if ( is_array( $m4is_vwdb4 ) && ! empty( $m4is_vwdb4 ) ) { $m4is_kmjlo7 = learndash_get_users_group_ids($m4is_ig9p6);
 foreach ( $m4is_vwdb4 as $m4is_evc54w ) { $m4is_vn8q = in_array( $m4is_evc54w['ID'], $m4is_kmjlo7 );
 $m4is_e_2um = $this->m4is_bnd6ti->m4is_v1dwme($m4is_evc54w['meta_value'], $m4is_mdqgk['memb_user']['tags']);
 if ( $m4is_e_2um && ! $m4is_vn8q ) { ld_update_group_access( $m4is_ig9p6, $m4is_evc54w['ID'], false );
 } elseif ( ! $m4is_e_2um && $m4is_vn8q ) { ld_update_group_access( $m4is_ig9p6, $m4is_evc54w['ID'], true );
 } } } } 
function m4is_ck7ivw( $m4is_ig9p6 = 0, $m4is_mdqgk = [] ) { if (! function_exists( 'ld_update_course_access' ) ) { return;
 } $m4is_d6w3io = $this->m4is_iu1lv();
 if ( ! empty( $m4is_d6w3io ) ) { $m4is_m1red = learndash_user_get_enrolled_courses( $m4is_ig9p6 );
 foreach( $m4is_d6w3io as $m4is_ouqlyk ) { $m4is_ztxa = $this->m4is_bnd6ti->m4is_v1dwme( $m4is_ouqlyk['meta_value'], $m4is_mdqgk['memb_user']['tags'] );
 $m4is_oqjm = in_array( $m4is_ouqlyk['ID'], $m4is_m1red );
 if ( $m4is_ztxa && ! $m4is_oqjm ) { ld_update_course_access($m4is_ig9p6, $m4is_ouqlyk['ID'], false);
 }  } } } 
function m4is_kl3q($m4is_etj2) { $m4is_ig9p6 = isset($m4is_etj2['user']->ID) ? $m4is_etj2['user']->ID : get_current_user_id();
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 $m4is_cd8k = $m4is_etj2['course']->ID;
 if ($m4is_cd8k && $m4is_e2kg) { $m4is_auhoe = get_post_meta($m4is_cd8k);
 $m4is_w5rnb = empty($m4is_auhoe['_is4wp_learndash_goals'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_goals'][0];
 $m4is_iystd2 = empty($m4is_auhoe['_is4wp_learndash_tags'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_tags'][0];
 $m4is_oa_j2 = empty($m4is_auhoe['_is4wp_learndash_actions'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_actions'][0];
 m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq($m4is_oa_j2, $m4is_e2kg );
 } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_cd8k);
 } 
function m4is_n416bi($m4is_etj2) { $m4is_ig9p6 = isset( $m4is_etj2['user']->ID ) ? $m4is_etj2['user']->ID : get_current_user_id();
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 $m4is_cd8k = $m4is_etj2['lesson']->ID;
 if ($m4is_cd8k && $m4is_e2kg) { $m4is_auhoe = get_post_meta($m4is_cd8k);
 $m4is_w5rnb = empty($m4is_auhoe['_is4wp_learndash_goals'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_goals'][0];
 $m4is_iystd2 = empty($m4is_auhoe['_is4wp_learndash_tags'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_tags'][0];
 $m4is_oa_j2 = empty($m4is_auhoe['_is4wp_learndash_actions'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_actions'][0];
 m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq($m4is_oa_j2, $m4is_e2kg );
 } } 
function m4is_q1e35($m4is_etj2) { $m4is_cd8k = isset($m4is_etj2['topic']->ID) ? $m4is_etj2['topic']->ID : 0;
 $m4is_ig9p6 = isset($m4is_etj2['user']->ID) ? $m4is_etj2['user']->ID : get_current_user_id();
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if ($m4is_cd8k && $m4is_e2kg) { $m4is_auhoe = get_post_meta($m4is_cd8k);
 $m4is_w5rnb = empty($m4is_auhoe['_is4wp_learndash_goals'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_goals'][0];
 $m4is_iystd2 = empty($m4is_auhoe['_is4wp_learndash_tags'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_tags'][0];
 $m4is_oa_j2 = empty($m4is_auhoe['_is4wp_learndash_actions'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_actions'][0];
 m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq($m4is_oa_j2, $m4is_e2kg );
 } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_cd8k);
 } 
function m4is_zm1is($m4is_etj2, $m4is_x0_hk) { $m4is_ig9p6 = isset( $m4is_x0_hk->ID ) ? $m4is_x0_hk->ID : get_current_user_id();
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 $m4is_cd8k = isset($m4is_etj2['quiz']->ID) ? $m4is_etj2['quiz']->ID : 0;
 $m4is_cd8k = isset($m4is_etj2['quiz']) ? $m4is_etj2['quiz'] : $m4is_cd8k;
 if ($m4is_cd8k && $m4is_e2kg ) { $m4is_auhoe = get_post_meta($m4is_cd8k);
 $m4is_w5rnb = '';
 $m4is_iystd2 = '';
 $m4is_oa_j2 = '';
 if ($m4is_etj2['pass']) { $m4is_w5rnb = empty($m4is_auhoe['_is4wp_learndash_goals'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_goals'][0];
 $m4is_iystd2 = empty($m4is_auhoe['_is4wp_learndash_tags'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_tags'][0];
 $m4is_oa_j2 = empty($m4is_auhoe['_is4wp_learndash_actions'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_actions'][0];
 } else { $m4is_w5rnb = empty($m4is_auhoe['_is4wp_learndash_fail_goals'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_fail_goals'][0];
 $m4is_iystd2 = empty($m4is_auhoe['_is4wp_learndash_fail_tags'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_fail_tags'][0];
 $m4is_oa_j2 = empty($m4is_auhoe['_is4wp_learndash_fail_actions'][0]) ? '' : $m4is_auhoe['_is4wp_learndash_fail_actions'][0];
 } m4is_pms8y::m4is_e5l8a9()->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq($m4is_oa_j2, $m4is_e2kg );
 do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_cd8k);
 } } 
function m4is_z5ia() { $m4is_bh12zy = 'm4is_a13i';
 add_shortcode('memb_learndash_is_completed', [$m4is_bh12zy, 'm4is_kgu7']);
 add_shortcode('memb_learndash_is_enrolled', [$m4is_bh12zy, 'm4is_vpo3a']);
 add_shortcode('memb_learndash_course_enroll', [$m4is_bh12zy, 'm4is_lgj7vw']);
 add_shortcode('memb_learndash_course_unenroll', [$m4is_bh12zy, 'm4is_lgj7vw']);
 } 
function m4is_h72ig() { remove_shortcode('memb_learndash_course_enroll');
 remove_shortcode('memb_learndash_course_unenroll');
 remove_shortcode('memb_learndash_is_completed');
 remove_shortcode('memb_learndash_is_enrolled');
 } 
function m4is_wrnhc() { if ( m4is_w0enbm::m4is_e5l8a9()->post_type == 'sfwd-quiz' ) {   } }  
function m4is_dvu19( $m4is_ei9bcp, $m4is_c2ah ) { if ( method_exists( m4is_w0enbm::m4is_e5l8a9(), 'm4is_k_4p2o') ) { $m4is__8htld = m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o( $m4is_c2ah->ID );
 if ( ! $m4is__8htld ) { return $m4is_c2ah->excerpt;
 } } return null;
 }  
function m4is_gk9ym( $m4is_rlp0, $m4is_cd8k ) { $m4is_b5kaz0 = get_post_meta( $m4is_cd8k, '_is4wp_learndash_redirect', TRUE );
 if ( $m4is_b5kaz0 ) { return do_shortcode( $m4is_b5kaz0 );
 } else { return $m4is_rlp0;
 } }  
function m4is_n_6p( $m4is_wov2 ) { $m4is_wov2['A4_EXTRA'] = 'A4 Extra';
 $m4is_wov2['A4_LONG'] = 'A4 Long';
 $m4is_wov2['A4_SUPER'] = 'A4 Super';
 $m4is_wov2['COMPACT'] = 'Compact';
 $m4is_wov2['FOOLSCAP'] = 'Foolscap';
 $m4is_wov2['GLETTER'] = 'Government Letter';
 $m4is_wov2['GOVERNMENTLEGAL'] = 'Government Legal';
 $m4is_wov2['JLEGAL'] = 'Junior Legal';
 $m4is_wov2['LEDGER'] = 'Ledger';
 $m4is_wov2['LEGAL'] = 'Legal';
 $m4is_wov2['TABLOID'] = 'Tabloid';
 return $m4is_wov2;
 }  
function m4is_sauqz($m4is_xl9xz, $m4is_t5ot4 = '', $m4is_k4yeul = []) { $m4is_xl9xz = empty($m4is_xl9xz) ? get_current_user_id() : $m4is_xl9xz;
 $m4is_r6nh_b = [ 'description' => '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_lf9vp8 = [ 'post_author' => $m4is_xl9xz, 'post_title' => $m4is_t5ot4, 'post_content' => $m4is_k4yeul['description'], ];
 $m4is_cd8k = wp_insert_post($m4is_lf9vp8);
 if (! is_a($m4is_cd8k, 'WP_Error')) { learndash_set_groups_administrators($m4is_cd8k, [$m4is_xl9xz]);
 } } }

