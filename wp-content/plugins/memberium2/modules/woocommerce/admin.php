<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_u_mq { private $metas = [ '_memberium_main_tag', '_memberium_canc_tag', '_memberium_payf_tag', '_memberium_susp_tag', ];
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_action( 'admin_init', [$this, 'm4is_njuy'] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );
 } 
function m4is_s1jxg5( $m4is_r1g2u ) { return array_merge( $m4is_r1g2u, [ 'WooCommerce for Memberium Support' ] );
 } 
function m4is_njuy() { add_meta_box( 'memberium\woocommerce\actions','Memberium WooCommerce', [$this, 'm4is_wnx1'], 'product', 'side' );
 add_action( 'save_post_product', [$this, 'm4is_f7xv'] );
 } 
function m4is_wnx1() { global $post;
 $m4is_ez5b = (int) get_post_meta( $post->ID, '_memberium_main_tag', true );
 $m4is_g4jlu0 = (int) get_post_meta( $post->ID, '_memberium_canc_tag', true );
 $m4is_mzkl8 = (int) get_post_meta( $post->ID, '_memberium_payf_tag', true );
 $m4is_m_kla = (int) get_post_meta( $post->ID, '_memberium_susp_tag', true );
 echo '<label for="_memberium_main_tag">', _e( "Access Tag", 'memberium' ), ':</label> ';
 echo '<input name="_memberium_main_tag" class="taglistdropdown" style="width:100%; max-width:100%" value="', $m4is_ez5b, '"><br /><br />';
 echo '<label for="_memberium_canc_tag">', _e( "Cancel Tag", 'memberium' ), ':</label> ';
 echo '<input name="_memberium_canc_tag" class="taglistdropdown" style="width:100%; max-width:100%" value="', $m4is_g4jlu0, '"><br /><br />';
 echo '<label for="_memberium_payf_tag">', _e( "Payment Failure Tag", 'memberium' ), ':</label> ';
 echo '<input name="_memberium_payf_tag"  class="taglistdropdown" style="width:100%; max-width:100%" value="', $m4is_mzkl8, '"><br /><br />';
 echo '<label for="_memberium_susp_tag">', _e( "Suspend/On-Hold Tag", 'memberium' ), ':</label> ';
 echo '<input name="_memberium_susp_tag" class="taglistdropdown" style="width:100%; max-width:100%" value="', $m4is_m_kla, '"><br /><br />';
 } 
function m4is_f7xv( int $m4is_cd8k ) {  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return;
 } if ( ! current_user_can( 'edit_posts', $m4is_cd8k ) ) { return;
 } if ( ! $m4is_cd8k ) { return;
 } foreach( $this->metas as $m4is_p51e_l ) { if ( isset( $_POST[$m4is_p51e_l] ) ) { $_POST[$m4is_p51e_l] = trim( $_POST[$m4is_p51e_l], ',' );
 update_post_meta( $m4is_cd8k, $m4is_p51e_l, $_POST[$m4is_p51e_l] );
 } } } }

