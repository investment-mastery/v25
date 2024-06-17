<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 
class m4is_ok6vg {  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() {  if ( is_admin() ) {  add_filter( 'memberium/modules/active/names', [$this, 'm4is__q42k'], 10, 1 );
 } else {  $this->m4is_ww61so();
 }  if ( function_exists( 'oxygen_vsb_register_condition' ) ) {  $this->m4is_onig();
 } }  private 
function m4is_ww61so() { add_action( 'wp', [$this, 'm4is_h1z6ny'], 20 );
 add_filter( 'do_shortcode_tag', [$this, 'm4is_bar0'], PHP_INT_MAX, 4 );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is__q42k'], 10, 1 );
 }  
function m4is__q42k( array $m4is_r1g2u = []) {  return array_merge( $m4is_r1g2u, ['Oxygen Block Builder for Memberium'] );
 } 
function m4is_h1z6ny() { $this->safe_tags = apply_filters( 'memberium/oxygen/tags', $this->safe_tags );
 } 
function m4is_bar0( $m4is_uzfw8j, $m4is_mpia, $m4is_jucpr, $m4is_szl_j ) { $m4is_bim0g = ( strpos( $m4is_mpia, 'ct_section' ) === 0 );
 if ( ! $m4is_bim0g && in_array( $m4is_mpia, $this->safe_tags ) ) { $m4is_bim0g = true;
 } return $m4is_bim0g ? do_shortcode( $m4is_uzfw8j ) : $m4is_uzfw8j;
 } 
function m4is_onig(){ $m4is_ldjf8y = 'oxygen';
 $m4is_exwnv = m4is_jf8abu::m4is_e5l8a9();
 $m4is_qqwj1c = $m4is_exwnv::PREFIX;
 $m4is_a97xh = $m4is_exwnv->m4is_ik4v9()->m4is_zga5_c( false, $m4is_ldjf8y );
 $m4is__iju62 = $m4is_exwnv->m4is_ik4v9()->m4is_exbnvk( $m4is_ldjf8y );
 $m4is_dc8t5 = $m4is_a97xh[ 'settings_title' ];
 $m4is_zsxekh = [ 'includes', "doesn't include", '==','!=' ];
 $m4is_go1m = [ 'includes' ];
  if( ! array_key_exists( 'memberships', $m4is__iju62 ) ) { $m4is_qh8p6 = $m4is_exwnv->m4is_ik4v9()->m4is_ozc58();
 $m4is_qh8p6 = isset( $m4is_qh8p6 ) && is_array( $m4is_qh8p6 ) ? $m4is_qh8p6 : false;
 if ( $m4is_qh8p6 ) { $this->any_membership_text = sprintf( __( "Any %s" ), $m4is_a97xh['membership_levels'], 'memberium' );
 $m4is_w_o7al = [ 'options' => [$this->any_membership_text] ];
 foreach ( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { $m4is_w_o7al['options'][$m4is_j5sy07] = stripslashes( $m4is_o5xas['name'] ) . "({$m4is_j5sy07})";
 } $m4is_t5ot4 = $m4is_a97xh['membership_levels'];
 $m4is_dx0i = 'm4is_hhk1';
 oxygen_vsb_register_condition( $m4is_t5ot4, $m4is_w_o7al, $m4is_go1m, $m4is_dx0i, $m4is_dc8t5 );
 } }  if( ! array_key_exists( 'tags1', $m4is__iju62 ) ){ $m4is_n_qg10 = m4is_pwtg7::m4is_qasq2( [], $m4is_ldjf8y );
 if( ! empty( $m4is_n_qg10 ) ){ $m4is_t5ot4 = sprintf( __( "Require %s", 'memberium' ), $m4is_a97xh['key_name'] );
 $m4is_w_o7al = [ 'options' => $m4is_n_qg10 ];
 $m4is_dx0i = 'm4is_t8wce';
 oxygen_vsb_register_condition( $m4is_t5ot4, $m4is_w_o7al, $m4is_zsxekh, $m4is_dx0i, $m4is_dc8t5 );
 } }  if( ! array_key_exists( 'asset_id', $m4is__iju62 ) ){ $m4is_t5ot4 = $m4is_a97xh['asset_id'];
 $m4is_dx0i = 'm4is_tpzkt';
 $this->conditions[$m4is_t5ot4] = "{$m4is_qqwj1c}_asset_id";
 $m4is_w_o7al = ['custom' => true];
 oxygen_vsb_register_condition($m4is_t5ot4, $m4is_w_o7al, $m4is_go1m, $m4is_dx0i, $m4is_dc8t5);
 } }  
function m4is_ux59ig( $m4is_uz9ek ) { $m4is_r6nh_b = [ 'any_membership' => 0, 'asset_id' => '', 'contact_ids' => '', 'eval' => '', 'invert_results' => 0, 'logged_in_only' => 0, 'logged_out_only' => 0, 'memberships' => '', 'tags1' => '', 'tags2' => '' ];
 $m4is_gy34l = wp_parse_args( $m4is_uz9ek, $m4is_r6nh_b );
 return m4is_jf8abu::m4is_e5l8a9()->m4is_g37u()->m4is_gz5hgo( $m4is_gy34l, 'oxygen' );
 }  
function m4is_js10( $m4is_w_o7al ){ $m4is_uz9ek = array_filter( explode( '(', $m4is_w_o7al ) );
 return (int) end( $m4is_uz9ek );
 } private $safe_tags = [ 'ct_code_block', 'ct_headlines', 'ct_link_button', 'ct_link', 'ct_text_block', 'oxy_rich_text', ];
 public $any_membership_text;
  }  
function m4is_hhk1($m4is_w_o7al, $m4is_go1m){ $m4is_f5hgjw = m4is_ok6vg::m4is_e5l8a9();
 $m4is_w2w8 = [];
 $m4is_fv39 = $m4is_f5hgjw->any_membership_text;
 if( $m4is_w_o7al === $m4is_fv39 ){ $m4is_w2w8['any_membership'] = 1;
 } else { $m4is_w2w8['memberships'] = $m4is_f5hgjw->m4is_js10($m4is_w_o7al);
 } return $m4is_f5hgjw->m4is_ux59ig($m4is_w2w8);
 } 
function m4is_t8wce($m4is_w_o7al, $m4is_go1m) { $m4is_f5hgjw = m4is_ok6vg::m4is_e5l8a9();
 $m4is_kj60ve = in_array($m4is_go1m, ['!=', "doesn't include"]) ? '-' : '';
 $m4is_j5sy07 = $m4is_f5hgjw->m4is_js10($m4is_w_o7al);
 $m4is_w2w8 = ['tags1' => $m4is_kj60ve . $m4is_j5sy07];
 return $m4is_f5hgjw->m4is_ux59ig($m4is_w2w8);
 } 
function m4is_tpzkt($m4is_w_o7al, $m4is_go1m) {  if( ! empty($m4is_w_o7al) ){ $m4is_w_o7al = str_replace([" ", "-", "\n", "\r", "\t"], '', $m4is_w_o7al);
 }  if( ! empty($m4is_w_o7al) ){ $settings = ['asset_id' => $m4is_w_o7al];
 return m4is_ok6vg::m4is_e5l8a9()->m4is_ux59ig($settings);
 } else { return true;
 } }

