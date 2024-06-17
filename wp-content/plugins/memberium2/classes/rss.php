<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_bea_0::m4is_ju94();
 final 
class m4is_bea_0 { private static $m4is_akf1y;
    static 
function m4is_ju94() { self::$m4is_akf1y = 'memberium/rss_user_id';
 } private 
function __construct() {}     public static 
function m4is_f5y2( $m4is_x0_hk = null ) { $m4is_ig9p6 = is_object( $m4is_x0_hk ) && is_a( $m4is_x0_hk, 'WP_User' ) ? $m4is_x0_hk->ID : (int) $m4is_x0_hk;
 $m4is_ig9p6 = $m4is_ig9p6 ? $m4is_ig9p6 : get_current_user_id();
 if ( $m4is_ig9p6 ) { global $wpdb;
 $m4is__8htld = false;
 $m4is_e0i7j = 0;
 do { $m4is_w6mo = wp_generate_password(18, false, false);
 if (! self::m4is_nn6vz($m4is_w6mo) ) {  $m4is_qqwj1c = self::$m4is_akf1y;
 $m4is_s2ge5 = self::$m4is_akf1y . '/' . $m4is_w6mo;
 update_user_meta($m4is_ig9p6, $m4is_s2ge5, $m4is_w6mo);
 update_user_meta($m4is_ig9p6, self::$m4is_akf1y, $m4is_w6mo);
 $m4is__8htld = true;
 } } while ( $m4is__8htld == false );
  $m4is_tovizk = "DELETE FROM `{$wpdb->usermeta}` WHERE `user_id` = %d AND `meta_key` <> %s AND ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_ig9p6, $m4is_s2ge5);
 $m4is_tovizk .= " `meta_key` LIKE '{$m4is_qqwj1c}%' ";
 $wpdb->query($m4is_tovizk);
 do_action('memberium/rssid/set', $m4is_ig9p6);
 } }  static 
function m4is_z1ymgq() { add_action('do_feed_atom_comments', [__CLASS__, 'm4is_pcpsx'], 1);
 add_action('do_feed_atom', [__CLASS__, 'm4is_pcpsx'], 1);
 add_action('do_feed_rdf', [__CLASS__, 'm4is_pcpsx'], 1);
 add_action('do_feed_rss', [__CLASS__, 'm4is_pcpsx'], 1);
 add_action('do_feed_rss2_comments', [__CLASS__, 'm4is_pcpsx'], 1);
 add_action('do_feed_rss2', [__CLASS__, 'm4is_pcpsx'], 1);
 add_action('do_feed', [__CLASS__, 'm4is_pcpsx'], 1);
 remove_action('wp_head', 'feed_links_extra', 3);
 remove_action('wp_head', 'feed_links', 2);
 remove_action('wp', 'bp_activity_action_favorites_feed', 3);
 remove_action('wp', 'bp_activity_action_friends_feed', 3);
 remove_action('wp', 'bp_activity_action_mentions_feed', 3);
 remove_action('wp', 'bp_activity_action_my_groups_feed', 3);
 remove_action('wp', 'bp_activity_action_personal_feed', 3);
 remove_action('wp', 'bp_activity_action_sitewide_feed', 3);
 remove_action('wp', 'groups_action_group_feed', 3);
 }   static 
function m4is_x6ipr_( $m4is_t0lr4, $m4is_jo8fb ) { if ( ! is_feed() ) { return $m4is_t0lr4;
 } $m4is_yg3l_ = isset( $_GET['rss_user'] ) ? $_GET['rss_user'] : '';
 if ( ! $m4is_yg3l_ ) { return $m4is_t0lr4;
 } $m4is_ig9p6 = (int) self::m4is_nn6vz( $m4is_yg3l_ );
 if ( ! $m4is_ig9p6 ) { return $m4is_t0lr4;
 } if ( wp_set_current_user( $m4is_ig9p6 ) ) {  do_action( 'memberium/rssid/rsslogin/', $m4is_ig9p6 );
 } return $m4is_t0lr4;
 }  static 
function m4is_f5sc($m4is_x0_hk = null) { $m4is_ig9p6 = (is_object($m4is_x0_hk) && get_class($m4is_x0_hk) == 'WP_User') ? $m4is_x0_hk->ID : (int) $m4is_x0_hk;
 $m4is_ig9p6 = ($m4is_ig9p6) ? $m4is_ig9p6 : get_current_user_id();
 if ($m4is_ig9p6) { $m4is_w6mo = get_user_meta($m4is_ig9p6, self::$m4is_akf1y, true);
 global $wpdb;
 $m4is_qqwj1c = self::$m4is_akf1y;
 $m4is_tovizk = "SELECT `meta_value` FROM `{$wpdb->usermeta}` WHERE `user_id` = %d AND ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_ig9p6);
 $m4is_tovizk .= " `meta_key` LIKE '{$m4is_qqwj1c}/%' ORDER BY `umeta_id` ASC LIMIT 1";
 $m4is__9814c = $wpdb->get_var($m4is_tovizk);
 if (empty($m4is__9814c) ) { $m4is__9814c = self::m4is_f5y2($m4is_ig9p6);
 } } if ($m4is__9814c) { return $m4is__9814c;
 } return false;
 } public static 
function m4is_n49d1($m4is_x0_hk = null) { global $wpdb;
 $m4is_ig9p6 = (is_object($m4is_x0_hk) && get_class($m4is_x0_hk) == 'WP_User') ? $m4is_x0_hk->ID : (int) $m4is_x0_hk;
 $m4is_ig9p6 = ($m4is_ig9p6) ? $m4is_ig9p6 : get_current_user_id();
 if ( ! $m4is_ig9p6 ) { return false;
 } $m4is_qqwj1c = self::$m4is_akf1y;
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `user_id` = %d AND ", $wpdb->usermeta, $m4is_ig9p6 ) . " `meta_key` LIKE '{$m4is_qqwj1c}/%' ";
 $wpdb->query($m4is_tovizk);
 do_action( 'memberium/rssid/reset/', $m4is_ig9p6 );
 return true;
 } private static 
function m4is_nn6vz($m4is_yg3l_ = '') { global $wpdb;
 $m4is_yg3l_ = sanitize_text_field($m4is_yg3l_);
 $m4is_s2ge5 = self::$m4is_akf1y . '/' . $m4is_yg3l_;
 $m4is_tovizk = "SELECT `user_id` FROM `{$wpdb->usermeta}` WHERE `meta_key` = %s AND `meta_value` = %s ORDER BY `user_id` ASC LIMIT 1";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_s2ge5, $m4is_yg3l_);
 $m4is_ig9p6 = (int) $wpdb->get_var($m4is_tovizk);
 return $m4is_ig9p6;
 } static 
function m4is_pcpsx() { $m4is_k4yeul = [ 'response' => 403, 'code' => __('Public RSS Feed Unavailable'), 'exit' => true, ];
 wp_die( __('No feed available, please visit our homepage.'), __('Access Denied'), $m4is_k4yeul );
 } }

