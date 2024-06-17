<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_kk7m::m4is_ju94();
 final 
class m4is_kk7m { private static $m4is_tcw1l;
 private static $m4is_imdo6;
 private static $m4is__vn8h0;
 static 
function m4is_ju94() { global $wpdb;
 self::$m4is_tcw1l = $wpdb->prefix . 'memberium_words';
 self::$m4is_imdo6 = 'https://memberium.s3.amazonaws.com/downloads/eff_large_wordlist.txt';
 self::$m4is__vn8h0 = 'memberium/database/words';
 } private 
function __construct() {}     public static 
function m4is_dga1q() : string { return self::$m4is_tcw1l;
  }  public static 
function m4is_k4eg0k() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::$m4is_tcw1l;
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(10) unsigned NOT NULL AUTO_INCREMENT, \n" . "word varchar(10) NOT NULL, \n" . "PRIMARY KEY (id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }  public static 
function m4is_ip2bu() { global $wpdb;
 $m4is_eqc27l = self::m4is_eli7x();
 if ( $m4is_eqc27l > 7700 ) { return;
 } $m4is_d71ub = wp_remote_get( self::$m4is_imdo6 );
 if ( is_a( $m4is_d71ub, 'WP_Error' ) ) { return;
 } $m4is_rk9_li = 0;
 $m4is_nx2vs5 = array_filter( explode( "\n", wp_remote_retrieve_body( $m4is_d71ub ) ) );
 $m4is_nx2vs5 = array_map( function( string $m4is_w_o7al ) { return trim( substr( $m4is_w_o7al, 6, 9 ) );
 }, $m4is_nx2vs5 );
 if ( ! empty( $m4is_nx2vs5 ) ) { foreach( $m4is_nx2vs5 as $m4is_wm9a7 ) { $wpdb->insert( self::$m4is_tcw1l, ['word' => $m4is_wm9a7] );
 } } self::m4is_cvf1();
 }       private static 
function m4is_cvf1() { global $wpdb;
 $m4is_rk9_li = $wpdb->get_var( $wpdb->prepare( "SELECT max(`id`) FROM %i WHERE 1", self::$m4is_tcw1l ) );
 update_option( self::$m4is__vn8h0, $m4is_rk9_li );
 }  private static 
function m4is_eli7x() : int { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT count(`id`) FROM %i WHERE 1", self::$m4is_tcw1l );
 $m4is_yer1mp = (int) $wpdb->get_var( $m4is_tovizk );
 return $m4is_yer1mp;
 } }

