<?php
 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_s_yija { static $m4is_ye973m = false;
 public static 
function reset_app() { self::m4is_b2o_mz();
 self::m4is_r2jvb0();
 self::m4is__idt();
 self::m4is_a98rq();
 self::m4is_hknh();
 }  private static 
function m4is_b2o_mz() { echo '<strong>Clearing i2SDK</strong><br />';
 if ( self::$m4is_ye973m ) { self::m4is_ov70( 'i2sdk' );
 } else { echo 'Deleting i2sdk<br />';
 } }    private static 
function m4is_r2jvb0() { echo '<strong>Clearing User Meta</strong><br />';
 $m4is__7f1 = [ 'infusionsoft_user_id', 'm4is/%', 'memb\_%', 'memberium%', ];
 foreach ( $m4is__7f1 as $m4is_gd3oc ) { $m4is_auhoe = self::m4is__lkrc9( $m4is_gd3oc );
 foreach( $m4is_auhoe as $m4is_p51e_l ) { if ( self::$m4is_ye973m ) { delete_user_meta( $m4is_p51e_l['user_id'], $m4is_p51e_l['meta_key'] );
 } else { printf( 'User Meta - %d = %s<br />', $m4is_p51e_l['user_id'], $m4is_p51e_l['meta_key'] );
 } } } } private static 
function m4is__lkrc9( $m4is_gd3oc ) : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( 'SELECT `user_id`, `meta_key` FROM %i WHERE `meta_key` LIKE %s', $wpdb->usermeta, $m4is_gd3oc );
 $m4is_auhoe = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_auhoe;
 }    private static 
function m4is__idt() { echo '<strong>Clearing Postmeta</strong><br />';
 $m4is__7f1 = [ '_is4wp_%', '_memberium_%', ];
 foreach ( $m4is__7f1 as $m4is_gd3oc ) { $m4is_auhoe = self::m4is_f8mvuj( $m4is_gd3oc );
 foreach( $m4is_auhoe as $m4is_p51e_l ) { if ( self::$m4is_ye973m ) { delete_post_meta( $m4is_p51e_l['post_id'], $m4is_p51e_l['meta_key'] );
 } else { printf( 'Post Meta - %d = %s<br />', $m4is_p51e_l['post_id'], $m4is_p51e_l['meta_key'] );
 } } } } private static 
function m4is_f8mvuj( $m4is_gd3oc ) : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( 'SELECT `post_id`, `meta_key` FROM %i WHERE `meta_key` LIKE %s', $wpdb->postmeta, $m4is_gd3oc );
 $m4is_auhoe = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_auhoe;
 }     private static 
function m4is_a98rq() { echo '<strong>Clearing Options</strong><br />';
 $m4is__7f1 = [ 'i2sdk', 'memberium%', ];
 foreach ( $m4is__7f1 as $m4is_gd3oc ) { $m4is_wov2 = self::m4is_aypwc( $m4is_gd3oc );
 foreach( $m4is_wov2 as $m4is_cgxdnf ) { if ( self::$m4is_ye973m ) { self::m4is_ov70( $m4is_cgxdnf );
 } else { printf( 'Deleting Option - %s<br />', $m4is_cgxdnf );
 } } } } private static 
function m4is_aypwc( $m4is_gd3oc ) : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( 'SELECT `option_name` FROM %i WHERE `option_name` LIKE %s', $wpdb->options, $m4is_gd3oc );
 $m4is_wov2 = $wpdb->get_col( $m4is_tovizk );
 return $m4is_wov2;
 } private static 
function m4is_ov70( $m4is_wqb_d0 ) { update_option( $m4is_wqb_d0, '', false );
 delete_option( $m4is_wqb_d0 );
 }  private static 
function m4is_qjxuf() : array { $m4is_gedn = get_option( 'memberium_tables', [] );
 $m4is_gedn = is_array( $m4is_gedn ) ? $m4is_gedn : [];
 return $m4is_gedn;
 }     private static 
function m4is_hknh() { global $wpdb;
 $m4is_gedn = self::m4is_qjxuf();
 foreach( $m4is_gedn as $m4is_tcw1l ) { if ( self::$m4is_ye973m ) { $wpdb->query( $wpdb->prepare( "DROP TABLE IF EXISTS %i", $m4is_tcw1l ) );
 } else { printf( 'Dropping Table - %s<p>', $m4is_tcw1l );
 } } } }

