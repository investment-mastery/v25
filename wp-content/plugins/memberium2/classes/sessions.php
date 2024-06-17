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
class m4is_rg1kh { private static $m4is_alpowv = 'memberium2/sessions';
 private static $m4is_vx_f = false;
 private static $m4is_oq9nf;
 private static $m4is_dj_2;
 private static $m4is_eeaiqk = 14400;
 private static $m4is_nr5wim = false;
 private 
function __construct() {} 
function __destruct() { return true;
 }  static 
function m4is_x6wv() { global $wpdb;
 self::$m4is_oq9nf = self::m4is_k26a85();
 self::$m4is_eeaiqk = (int) max( ini_get( 'session.gc_maxlifetime' ), 14400 );
 self::$m4is_vx_f = function_exists( 'gzuncompress' ) && function_exists( 'gzcompress' );
 self::$m4is_dj_2 = $wpdb->prefix . 'memberium_sessions';
 if (! headers_sent() ) { session_set_save_handler( [__CLASS__, 'm4is_i1po'], [__CLASS__, 'm4is_b935fe'], [__CLASS__, 'm4is_byrt6'], [__CLASS__, 'm4is_lwqtdk'], [__CLASS__, 'm4is_ldb_8'], [__CLASS__, 'm4is_a57hto'] );
 }  }     static 
function m4is_pzau9() : string { global $wpdb;
 if ( is_null( self::$m4is_dj_2 ) ) { self::$m4is_dj_2 = $wpdb->prefix . 'memberium_sessions';
 } return self::$m4is_dj_2;
 }  static 
function m4is_dq6a1e() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_pzau9();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "session_key varchar(32) NOT NULL default '', \n" . "email_key varchar(32) NOT NULL default '', \n" . "expiration int(10) unsigned NOT NULL default '0', \n" . "value text NOT NULL, \n" . "KEY email_key (email_key), \n" . "PRIMARY KEY  (session_key) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_k26a85() : bool { return isset( self::$m4is_oq9nf ) ? self::$m4is_oq9nf : self::$m4is_oq9nf = (bool) wp_using_ext_object_cache();
 }  static 
function m4is_fxo7s() : int { if (is_null(self::$m4is_eeaiqk) ) { self::$m4is_eeaiqk = (int) max(ini_get('session.gc_maxlifetime'), 14400);
 } return self::$m4is_eeaiqk;
 }  static 
function m4is_bk98( int $m4is_eeaiqk ) : bool { self::$m4is_eeaiqk = $m4is_eeaiqk;
 return true;
 }   static 
function m4is_i1po( string $m4is_penq, string $m4is_olekd ) : bool { return true;
 }  static 
function m4is_b935fe() : bool { return true;
 }  static 
function m4is_ldb_8(string $m4is_s2ge5) : bool { global $wpdb;
 $m4is_dj_2 = self::m4is_pzau9();
 $m4is_tovizk = $wpdb->prepare("DELETE FROM `{$m4is_dj_2}` WHERE `session_key` = %s", $m4is_s2ge5);
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 wp_cache_delete($m4is_s2ge5, self::$m4is_alpowv);
 return true;
 }  static 
function m4is_a57hto( int $m4is_tpmkx = 0 ) : bool { global $wpdb;
 $m4is_dj_2 = self::m4is_pzau9();
 $m4is_n260nx = time();
 $m4is_hpn9y = $wpdb->query( "DELETE FROM `{$m4is_dj_2}` WHERE `expiration` < {$m4is_n260nx} OR `value` = '';" );
 return true;
 }  static 
function m4is_byrt6( string $m4is_s2ge5 ) : string { global $wpdb;
 if (self::m4is_k26a85() ) { $m4is_uwdfj = false;
 $m4is_etj2 = wp_cache_get($m4is_s2ge5, self::$m4is_alpowv, false, $m4is_uwdfj);
 if ($m4is_uwdfj) { wp_cache_set($m4is_s2ge5, $m4is_etj2, self::$m4is_alpowv, self::$m4is_eeaiqk);
 return $m4is_etj2;
 } } $m4is_dj_2 = self::m4is_pzau9();
 $m4is_tovizk = "SELECT `value`, `expiration` FROM `{$m4is_dj_2}` WHERE `session_key` = %s";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_s2ge5);
 $m4is_etj2 = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_etj2 = isset($m4is_etj2[0]) ? $m4is_etj2[0] : [];
 if (empty($m4is_etj2['value']) ) { return '';
 } $m4is_mh8_cz = $m4is_etj2['expiration'] - time();
 $m4is_r4892b = 0.5 * self::m4is_fxo7s();
 if ($m4is_mh8_cz < $m4is_r4892b) { $m4is_tovizk = "UPDATE `{$m4is_dj_2}` SET `expiration` = %d WHERE `session_key` = %s ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, time() + self::m4is_fxo7s(), $m4is_s2ge5);
 $wpdb->query($m4is_tovizk);
 } if (self::$m4is_vx_f && substr($m4is_etj2['value'], 0, 2) == 'eN') { $m4is_etj2 = gzuncompress(base64_decode($m4is_etj2['value']) );
 } session_decode($m4is_etj2);
 return $m4is_etj2;
 }  static 
function m4is_lwqtdk( string $m4is_s2ge5, string $m4is_etj2 ) : bool { global $wpdb;
 if ( self::$m4is_oq9nf ) { if ( empty( $m4is_etj2 ) ) { wp_cache_delete( $m4is_s2ge5, self::$m4is_alpowv );
 } wp_cache_set( $m4is_s2ge5, $m4is_etj2, self::$m4is_alpowv, self::$m4is_eeaiqk );
 } if ( empty( $m4is_etj2 ) ) { return true;
 } $m4is_r3da4 = empty( $GLOBALS['user_login']) ? '' : strtolower( $GLOBALS['user_login'] );
 $m4is_oop72h = empty( $GLOBALS['user_email']) ? '' : strtolower( $GLOBALS['user_email'] );
  if (self::$m4is_nr5wim) { if (! isset($_SESSION['admin']) || $_SESSION['admin'] === 0) { $m4is_tovizk = "DELETE FROM `" . self::$m4is_dj_2 . "` WHERE `email_key` = %s AND `session_key` <> %s";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_oop72h, $m4is_s2ge5);
 $m4is_hpn9y = $wpdb->query($m4is_tovizk);
 } }  if (self::$m4is_vx_f) { $m4is_etj2 = base64_encode(gzcompress($m4is_etj2, 9) );
 } $m4is_tovizk = "REPLACE INTO `". self::$m4is_dj_2 . "` (session_key, email_key, expiration, value) VALUES (%s, %s, %d, %s)";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_s2ge5, $m4is_oop72h, time() + self::$m4is_eeaiqk, $m4is_etj2);
 $m4is_hpn9y = $wpdb->query($m4is_tovizk);
 $row_id = $wpdb->insert_id;
 return true;
 } }

