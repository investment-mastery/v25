<?php
 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_u7nzl {  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() {   $this->m4is_ww61so();
 }  private 
function m4is_ww61so() { add_filter( 'memberium/posts/unenhanced', [$this, 'm4is_k6m4'], 10, 1 );
 add_filter( 'um_login_allow_nonce_verification', [$this, 'm4is_q1gx'], 1, 1 );
 }  
function m4is_k6m4( array $m4is_fvc10 = [] ) : array { $m4is_fvc10[] = 'um_directory';
 $m4is_fvc10[] = 'um_form';
 return $m4is_fvc10;
 }  
function m4is_q1gx( $m4is_rs_zx ) { set_current_user(0);
 return $m4is_rs_zx;
 } }

