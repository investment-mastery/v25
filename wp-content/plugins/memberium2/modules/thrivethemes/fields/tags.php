<?php
  
class m4is_w0xqih extends TCB\ConditionalDisplay\Field {  public static 
function get_entity() { return 'memberium';
 }  public static 
function get_key() { return 'memberium_tag';
 }  public static 
function get_label() { return 'Has Any Tags';
 }  static 
function get_conditions() { return [ 'autocomplete' ];
 } static 
function is_boolean() { return false;
 }  public 
function get_value( $m4is_mdqgk ) { return isset( $m4is_mdqgk['memb_user']['tags'] ) ? array_filter( explode( ',', $m4is_mdqgk['memb_user']['tags'] ) ) : [];
 }  public static 
function get_options( $m4is_xh02m = [], $m4is_wgwy = '' ) { $m4is_iystd2 = m4is_pwtg7::m4is_o4sq( $m4is_wgwy );
 if ( ! empty( $m4is_xh02m ) ) { $m4is_sf9n6j = array_filter( $m4is_iystd2, function( $m4is_mpia ) use ( $m4is_xh02m ) { return in_array( $m4is_mpia->id, $m4is_xh02m );
 } );
 $m4is_iystd2 = $m4is_sf9n6j;
 } $m4is__ql9vk = [];
 foreach( $m4is_iystd2 as $m4is_mpia ) { $m4is__ql9vk[] = [ 'value' => (string) $m4is_mpia->id, 'label' => sprintf( "%s (%s)", $m4is_mpia->name, $m4is_mpia->id ), ];
 } return $m4is__ql9vk;
 }  public static 
function get_autocomplete_placeholder() { return 'Search Tags';
 }  public static 
function get_display_order() { return 10;
 } }

