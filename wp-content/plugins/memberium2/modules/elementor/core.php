<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  final 
class m4is_teku3 { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 }  private 
function __construct() {} 
function m4is_z4u6wr() { add_action( 'wpal/block/access/init', [$this, 'm4is_x6wv'] );
 } 
function m4is_x6wv(){ add_action( 'elementor/element/after_section_end', [$this, 'm4is_i85_2'], 10, 2 );
  add_action( 'elementor/editor/before_enqueue_scripts', [$this, 'm4is_h_au'] );
   if ( is_admin() && ! wp_doing_ajax() ) { return;
 } add_action( 'template_redirect', [ $this, 'm4is_i40rp' ], PHP_INT_MAX );
 }    
function m4is_g37u(){ static $m4is_bh12zy;
 if( ! isset( $m4is_bh12zy ) ) { include_once __DIR__ . '/frontend.php';
 $m4is_bh12zy = m4is_vq4pn::m4is_e5l8a9();
 } return $m4is_bh12zy;
 } 
function m4is_i40rp(){ $m4is_uisfb8 = \Elementor\Plugin::instance();
 if ( $m4is_uisfb8->editor->is_edit_mode() ) { return;
 } if ( $m4is_uisfb8->preview->is_preview_mode() ) { return;
 } if( !empty($_GET['action']) && $_GET['action'] === 'elementor' ){ return;
 }  remove_action( 'elementor/element/after_section_end', [$this, 'm4is_i85_2'], 10 );
  $this->m4is_g37u();
 }    
function m4is_gf2q(){ static $m4is_vn5eu;
 if( ! isset( $m4is_vn5eu ) ) { include_once __DIR__ . '/editor.php';
 $m4is_vn5eu = m4is_vrcugn::m4is_e5l8a9();
 } return $m4is_vn5eu;
 } 
function m4is_i85_2( $m4is_pcve, $m4is_fbjy2 ){ if ( 'section_advanced' === $m4is_fbjy2 || '_section_style' === $m4is_fbjy2 ) { $this->m4is_gf2q()->m4is_qp1ki5( $m4is_pcve, $m4is_fbjy2 );
 } } 
function m4is_h_au(){ $this->m4is_gf2q()->m4is__ho2rl();
 } }

