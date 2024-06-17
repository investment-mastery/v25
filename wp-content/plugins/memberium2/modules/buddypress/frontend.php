<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

  class_exists('m4is_pms8y') || die();
 final 
class m4is_w_dt8 { private $m4is_bnd6ti;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_bnd6ti->m4is_p345( 'm4is_lbulmz', __DIR__ . '/shortcodes' );
 add_action('memberium/shortcodes/add', [$this, 'm4is_ljhm']);
 $this->m4is_ljhm();
 $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_action( 'template_redirect', [$this, 'm4is_h4v0k'], 11 );
 } 
function m4is_h4v0k() { if ( ! is_buddypress() ) { return;
 } $m4is_mr7_zt = bp_current_component();
 if ( ! $m4is_mr7_zt ) { return;
 } $m4is_mr7_zt = $m4is_mr7_zt == 'profile' ? 'members' : $m4is_mr7_zt;
 $m4is_cd8k = bp_core_get_directory_page_id( $m4is_mr7_zt );
 if ( ! $m4is_cd8k ) { return;
 } $m4is_bh12zy = m4is_w0enbm::m4is_e5l8a9();
 $m4is_coyid_ = $m4is_bh12zy->m4is_k_4p2o( $m4is_cd8k );
 if ( $m4is_coyid_ ) { return;
 } $m4is_v6fdv4 = $m4is_bh12zy->m4is_waob_( $m4is_cd8k );
 if ( $m4is_v6fdv4 == 'hide' ) { global $wp_query;
 $wp_query->set_404();
 status_header( 404 );
 return;
 } elseif ( $m4is_v6fdv4 == 'redirect' ) { $m4is_bh12zy->m4is_yhf0( $m4is_cd8k );
 } } 
function m4is_ljhm() { $m4is_nz3t = 'm4is_lbulmz';
 add_shortcode( 'memb_buddypressgroup_grid', [$m4is_nz3t, 'm4is_c_b8'] );
 add_shortcode( 'memb_has_profile_type', [$m4is_nz3t, 'm4is_ygo0h'] );
 } }

