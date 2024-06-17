<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_hfep { 
function m4is_jqsc2l($m4is_etj2 = []) { $m4is_ig9p6 = isset($m4is_etj2['user_id']) ? $m4is_etj2['user_id'] : get_current_user_id();
 $m4is_cd8k = isset($m4is_etj2['post_id']) ? $m4is_etj2['post_id'] : 0;
 $m4is_cyaz = isset($m4is_etj2['button_id']) ? $m4is_etj2['button_id'] : 0;
 $m4is_nsnp = isset($m4is_etj2['course']) ? $m4is_etj2['course'] : 0;
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_iystd2 = get_post_meta($m4is_cd8k, '_is4wp_wpcomplete_tags', true);
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 } } 
function m4is_tvic($m4is_etj2 = []) { $m4is_ig9p6 = isset($m4is_etj2['user_id']) ? $m4is_etj2['user_id'] : get_current_user_id();
 $m4is_cd8k = isset($m4is_etj2['post_id']) ? $m4is_etj2['post_id'] : 0;
 $m4is_cyaz = isset($m4is_etj2['button_id']) ? $m4is_etj2['button_id'] : 0;
 $m4is_nsnp = isset($m4is_etj2['course']) ? $m4is_etj2['course'] : 0;
 $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_iystd2 = get_post_meta($m4is_cd8k, '_is4wp_wpcomplete_tags', true);
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 } } private 
function m4is_ww61so() { add_action('wpcomplete_page_completed', [$this, 'm4is_jqsc2l']);
 add_action('wpcomplete_course_completed', [$this, 'm4is_tvic']);
 } private 
function m4is_jq0ld() { if ( is_admin() ) { if (include_once(__DIR__ . '/admin.php') ) { m4is_wn8xoj::m4is_e5l8a9();
 } }  } private 
function __construct() { $this->m4is_ww61so();
 $this->m4is_jq0ld();
 } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

