<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

  class_exists('m4is_pms8y') || die();
 final 
class m4is_izdk { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_filter( 'bbp_get_topic_subscribers', [$this, 'm4is_m0sx75'] );
 } 
function m4is_m0sx75( $m4is_jfds ) { if ( ! empty( $m4is_jfds ) && is_array( $m4is_jfds ) ) { global $wpdb;
 $m4is_yy_5 = implode( ',', $m4is_jfds );
 $m4is_tovizk = "SELECT user_id FROM {$wpdb->usermeta} WHERE user_id IN (" . $m4is_yy_5 . ") AND `meta_key` = 'memberium_optout' AND `meta_value` = 1";
 $m4is_oy46p = $wpdb->get_col( $m4is_tovizk );
 $m4is_jfds = array_diff( $m4is_jfds, $m4is_oy46p );
 } return $m4is_jfds;
 } }

