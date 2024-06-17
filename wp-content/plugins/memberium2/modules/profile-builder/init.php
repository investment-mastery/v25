<?php
 class_exists( 'm4is_pms8y' ) || die();
 if ( ! defined( 'PROFILE_BUILDER_VERSION' ) ) { return;
 } add_action( 'wppb_password_reset', 'm4is_yza38', 10, 2 );
  
function m4is_yza38( $m4is_ig9p6, $m4is_j485e ) {  $m4is_ig9p6 = abs( intval( $m4is_ig9p6 ) );
  $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
  $m4is_iqdn = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu( 'settings', 'password_field' );
  if ( $m4is_e2kg < 1 || empty( $m4is_j485e ) || empty( $m4is_iqdn ) ) { return;
 }  m4is_pms8y::m4is_e5l8a9()->m4is_wzxl_1( $m4is_iqdn, $m4is_j485e, $m4is_e2kg );
 } add_filter( 'memberium/modules/active/names', function( $m4is_r1g2u ) { return array_merge( $m4is_r1g2u, ['Profile Builder for Memberium'] );
 });

