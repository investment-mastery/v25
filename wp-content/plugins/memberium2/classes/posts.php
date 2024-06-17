<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_rv9lt {  
function __construct() { }  private static 
function m4is_tdf89() : array { if ( MEMBERIUM_SKU == 'm4is' ) { $m4is_veymi8 = [ 'access_tags' => '_is4wp_access_tags', 'access_tags2' => '_is4wp_access_tags2', 'anonymous_only' => '_is4wp_anonymous_only', 'any_loggedin_user' => '_is4wp_any_loggedin_user', 'any_membership' => '_is4wp_any_membership', 'can_comment' => '_is4wp_can_comment', 'commenter_action' => '_is4wp_commenter_action', 'commenter_goal' => '_is4wp_commenter_goal', 'commenter_tag' => '_is4wp_commenter_tag', 'contact_ids' => '_is4wp_contact_ids', 'custom_code' => '_iswp_custom_code', 'discourage_cache' => '_is4wp_discourage_cache', 'facebook_crawler' => '_is4wp_facebook_crawler', 'force_public' => '_is4wp_force_public', 'google_1st_click' => '_is4wp_google_1stclick', 'hide_from_menu' => '_is4wp_hide_from_menu', 'memberships' => '_is4wp_membership_levels', 'private_comments' => '_is4wp_private_comments', 'prohibited_action' => '_is4wp_prohibited_action', 'redirect_url' => '_is4wp_redirect_url', ];
 } elseif ( MEMBERIUM_SKU == 'm4ac' ) { $m4is_veymi8 = [];
 } return $m4is_veymi8;
 } static 
function m4is_sj0z( int $m4is_cd8k ) : array { $m4is_veymi8 = self::m4is_tdf89();
 $m4is_auhoe = get_post_meta( $m4is_cd8k );
 $m4is_w2w8 = false;
 if ( is_array( $m4is_auhoe ) && ! empty( $m4is_auhoe ) ) { $m4is_w2w8 = [];
 foreach ( $m4is_veymi8 as $m4is_c5zg => $m4is_g0wy ) { if ( isset( $m4is_auhoe[$m4is_g0wy][0] ) ) { $m4is_w2w8[$m4is_c5zg] = $m4is_auhoe[$m4is_g0wy][0];
 } } } return $m4is_w2w8;
 } static 
function m4is_y34p( int $m4is_cd8k = 0, $m4is_qht8e = [], $m4is_w_o7al = null ) { if ( empty( $m4is_qht8e ) || empty( $m4is_cd8k ) ) { return false;
 } if ( ! current_user_can( 'edit_post', $m4is_cd8k ) ) { return false;
 } if ( is_string( $m4is_qht8e ) ) { $m4is_qht8e = [ $m4is_qht8e => $m4is_w_o7al, ];
 } $m4is_hy5hl = [ 'any_loggedin_user', 'any_membership', 'facebook_crawler', 'google_1st_click', 'hide_completely', 'hide_from_menu', 'private_comments', ];
 $m4is_veymi8 = self::m4is_tdf89();
  foreach( $m4is_qht8e as $m4is_s2ge5 => $m4is_w_o7al ) { if ( array_key_exists( $m4is_s2ge5, $m4is_veymi8 ) ) { $m4is_w_o7al = array_key_exists( $m4is_s2ge5, $m4is_hy5hl ) ? (int) (bool) trim( $m4is_w_o7al ) : $m4is_w_o7al;
 $m4is_w_o7al = is_string( $m4is_w_o7al ) ? trim( $m4is_w_o7al ) : $m4is_w_o7al;
 add_post_meta( $m4is_cd8k, $m4is_veymi8[$m4is_s2ge5], $m4is_w_o7al, true ) or update_post_meta( $m4is_cd8k, $m4is_veymi8[$m4is_s2ge5], $m4is_w_o7al );
 } else {  } } } }

