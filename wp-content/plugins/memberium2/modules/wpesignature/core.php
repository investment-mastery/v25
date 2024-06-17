<?php
/**
 * Copyright (c) 2021-2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_vstu { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 if ( is_admin() && include_once( __DIR__ . '/admin.php' ) ) { m4is_c5_vi::m4is_e5l8a9();
 } } private 
function m4is_ww61so() { add_action( 'esig_document_basic_closing', [$this, 'm4is_wcptnx'], 10, 1 );
 add_action( 'esig_signature_saved', [$this, 'm4is_wcptnx'], 10, 1 );
 } 
function m4is_wcptnx( $m4is_k1k7oj ) { $m4is_g1oq = isset( $m4is_k1k7oj['sad_doc_id'] ) ? $m4is_k1k7oj['sad_doc_id'] : 0;
 if ( ! $m4is_g1oq ) { return;
  } $m4is_osi9 = WP_E_Sig()->meta->get( $m4is_g1oq, '_is4wp_esignature_tags' );
 if ( empty( $m4is_osi9 ) ) { return;
 } $m4is_e2kg = 0;
 $m4is_ig9p6 = isset($m4is_k1k7oj['recipient']->wp_user_id) ? $m4is_k1k7oj['recipient']->wp_user_id : 0;
 if (empty($m4is_ig9p6)) { $m4is_n10t = isset($m4is_k1k7oj['recipient']->user_email) ? $m4is_k1k7oj['recipient']->user_email : '';
 $m4is_e2kg = m4is_pms8y::m4is_e5l8a9()->m4is_gz8a($m4is_n10t);
 } else { $m4is_e2kg = m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 } m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_osi9, $m4is_e2kg );
 } }

