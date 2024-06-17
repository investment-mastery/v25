<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  final 
class m4is_qci52x { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 }  private 
function __construct() {} 
function m4is_z4u6wr(){ add_action( 'wpal/block/access/init', [$this, 'm4is_x6wv'] );
 } 
function m4is_x6wv(){ add_action( 'et_builder_modules_loaded', [$this, 'm4is_ml6jg'], PHP_INT_MAX );
 add_action( 'admin_enqueue_scripts', [$this, 'm4is_fwnkl'] );
 } 
function m4is_ml6jg() { if( is_admin() || isset( $_GET['et_fb'] ) ) { $m4is_f7pf = isset( $_GET['page'] ) && $_GET['page'] == 'et_theme_builder';
 $m4is_f7pf = $m4is_f7pf || isset( $_GET['et_tb'] );
 if ( $m4is_z2i5jp <> 'et_theme_builder' && $m4is_f7pf == false ) { $this->m4is_gf2q()->m4is_x6wv();
 } } else{ $this->m4is_g37u()->m4is_x6wv();
 } }  
function m4is_fwnkl( $m4is_vfzl0 ) { $m4is_ldt2 = ['edit.php', 'post-new.php', 'post.php'];
 if ( in_array( $m4is_vfzl0, $m4is_ldt2 ) ) { wp_enqueue_style( 'select2css_divi', plugin_dir_url(__FILE__) . 'select2_divi.css', false, '1.0.5', 'all' );
 } } 
function m4is_gf2q(){ static $m4is_vn5eu = null;
 if ( is_null( $m4is_vn5eu ) ) { include_once __DIR__ . '/' . 'editor.php';
 $m4is_vn5eu = m4is_lwxq::m4is_e5l8a9();
 } return $m4is_vn5eu;
 } 
function m4is_g37u(){ static $m4is_bh12zy = null;
 if( is_null( $m4is_bh12zy ) ) { include_once __DIR__ . '/' . 'frontend.php';
 $m4is_bh12zy = m4is_gby10::m4is_e5l8a9();
 } return $m4is_bh12zy;
 } }

