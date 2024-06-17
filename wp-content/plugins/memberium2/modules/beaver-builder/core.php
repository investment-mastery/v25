<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  final 
class m4is_f1zdq { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : new self;
 }  private 
function __construct() {} 
function m4is_z4u6wr(){ add_action( 'wpal/block/access/init', [$this, 'm4is_x6wv'] );
 } 
function m4is_x6wv(){ if ( is_admin() ) { return;
 } if ( isset( $_GET['fl_builder'] ) ){ $this->m4is_gf2q();
 } else{ $this->m4is_g37u();
 } } 
function m4is_gf2q(){ static $m4is_vn5eu;
 if ( ! isset( $m4is_vn5eu ) ) { include_once __DIR__ . '/' . 'editor.php';
 $m4is_vn5eu = m4is_fe3s::m4is_e5l8a9();
 } return $m4is_vn5eu;
 } 
function m4is_g37u(){ static $m4is_bh12zy;
 if ( ! isset( $m4is_bh12zy ) ) { include_once __DIR__ . '/' . 'frontend.php';
 $m4is_bh12zy = m4is__0dkfa::m4is_e5l8a9();
 } return $m4is_bh12zy;
 } }

