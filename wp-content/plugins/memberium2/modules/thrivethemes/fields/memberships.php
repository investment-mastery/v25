<?php
  
class m4is_akvn extends TCB\ConditionalDisplay\Field {  public static 
function get_entity() { return 'memberium';
 }  public static 
function get_key() { return 'memberium_membership';
 }  public static 
function get_label() { return 'Has Any Memberships';
 }  static 
function get_conditions() { return [ 'autocomplete' ];
 }  public 
function get_value( $m4is_mdqgk ) { return isset( $m4is_mdqgk['memb_user']['membership_tags'] ) ? array_filter( explode( ',', $m4is_mdqgk['memb_user']['membership_tags'] ) ) : [];
 }  public static 
function get_options( $m4is_xh02m = [], $m4is_wgwy = '' ) { $m4is_qh8p6 = m4is_d9r2::m4is_e5l8a9()->m4is_c_kz3( $m4is_wgwy );
 if ( ! empty( $m4is_xh02m ) ) { $m4is_ot65o = array_filter( $m4is_qh8p6, function( $m4is_j5sy07 ) use ( $m4is_xh02m ) { return in_array( $m4is_j5sy07, $m4is_xh02m );
 }, ARRAY_FILTER_USE_KEY );
 $m4is_qh8p6 = $m4is_ot65o;
 } $m4is__ql9vk = [];
 foreach( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { $m4is__ql9vk[] = [ 'value' => (string) $m4is_j5sy07, 'label' => sprintf( "%s (%s)", $m4is_o5xas, $m4is_j5sy07 ), ];
 } return $m4is__ql9vk;
 }  public static 
function get_autocomplete_placeholder() { return 'Search Tags';
 }  public static 
function get_display_order() { return 10;
 } }

