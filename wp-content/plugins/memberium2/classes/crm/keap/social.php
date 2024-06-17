<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_frey::m4is_x6wv();
 final 
class m4is_frey { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_jv9xhf;
 private static $m4is_tcw1l;
 private static $m4is_a0pejg;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_jv9xhf = 'SocialAccount';
 self::$m4is_tcw1l = MEMBERIUM_DB_SOCIAL;
 self::$m4is_a0pejg = 1000;
 } private 
function __construct() { }    static 
function m4is_s5f7j() : string { global $wpdb;
 return $wpdb->prefix . 'memberium_socialaccount';
 } static 
function m4is_chs5z7() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::$m4is_tcw1l;
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "contactid int(20) NOT NULL, \n" . "fieldname varchar(64) default '', \n" . "fieldvalue varchar(20) default '', \n" . "KEY id (id), \n" . "KEY contactid (contactid), \n" . "KEY fieldname (fieldname), \n" . "PRIMARY KEY  (id,appname,contactid,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     public static 
function m4is_d74s( int $m4is_e2kg, bool $m4is_s7cxe = false ) : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id`, `fieldname`, `fieldvalue` FROM %i WHERE `appname` = %s AND `contactid` = %d", self::$m4is_tcw1l, self::$m4is_zq0k, $m4is_e2kg );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_m4nmc = [];
 foreach( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_j5sy07 = $m4is_ke_fr['id'];
 $m4is_yxwn = $m4is_s7cxe ? strtolower( $m4is_ke_fr['fieldname'] ) : $m4is_ke_fr['fieldname'];
 $m4is_m4nmc[$m4is_j5sy07][$m4is_yxwn] = $m4is_ke_fr['fieldvalue'];
 } if ( $m4is_s7cxe ) { $m4is_m4nmc = array_change_key_case( $m4is_m4nmc, CASE_LOWER );
 } return $m4is_m4nmc;
 }  public static 
function m4is_lyr3c7( int $m4is_e2kg ) { $m4is_a0pejg = 1000;
 $m4is_jo8fb = [ 'ContactId' => $m4is_e2kg ];
 $m4is_couz = 0;
 $m4is_vu4q0o = m4is_ho3l::m4is_mg4uyc( self::$m4is_jv9xhf, $m4is_a0pejg, $m4is_couz, $m4is_jo8fb );
 if ( ! is_array( $m4is_vu4q0o ) ) { error_log( sprintf( "Failed to retrieve social accounts for contact '%d'.  Query returned '%s'", $m4is_e2kg, (string) $m4is_vu4q0o ) );
 } $m4is_vu4q0o = is_array( $m4is_vu4q0o ) ? $m4is_vu4q0o : [];
 return $m4is_vu4q0o;
 }  public static 
function m4is_af21( int $m4is_e2kg ) { $m4is_l6w8a9 = self::m4is_lyr3c7( $m4is_e2kg );
 if ( ! empty( $m4is_l6w8a9 ) ) { foreach ( $m4is_l6w8a9 as $m4is_snxvcw ) { self::m4is_a4zb( $m4is_snxvcw );
 } } }  public static 
function m4is_a4zb( array $m4is_snxvcw ) { global $wpdb;
 $m4is_j5sy07 = $m4is_snxvcw['Id'];
 $m4is_e2kg = $m4is_snxvcw['ContactId'];
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `id` = %d", self::$m4is_tcw1l, $m4is_j5sy07 );
 $wpdb->query( $m4is_tovizk );
 if ( empty( $m4is_snxvcw['AccountName'] ) ) { return;
 } $m4is_cezf = [];
 foreach ( $m4is_snxvcw as $m4is_yxwn => $m4is_w_o7al ) { $m4is_cezf[] = $wpdb->prepare( '(%d, %s, %d, %s, %s)', $m4is_j5sy07, self::$m4is_zq0k, $m4is_e2kg, $m4is_yxwn, $m4is_w_o7al );
 } $m4is_uz9ek = implode( ', ', $m4is_cezf );
 $m4is_tovizk = $wpdb->prepare( "INSERT INTO %i ( `id`, `appname`, `contactid`, `fieldname`, `fieldvalue` ) VALUES {$m4is_uz9ek}", self::$m4is_tcw1l );
 $wpdb->query( $m4is_tovizk );
 }  public static 
function m4is_u4u3l() { $m4is_plxmbr = 'memberium/keap/sync/social/highwatermark';
 $m4is_u54rc = get_option( $m4is_plxmbr, '20000101T01:01:01' );
 $m4is_couz = 0;
 $m4is_jo8fb = [ 'AccountType' => '%', 'LastUpdated' => "~>=~ {$m4is_u54rc}" ];
 $m4is_vu4q0o = m4is_ho3l::m4is_mlhu4( self::$m4is_jv9xhf, self::$m4is_a0pejg, $m4is_couz, $m4is_jo8fb, [], 'LastUpdated', true );
 if ( ! is_array( $m4is_vu4q0o ) ) { error_log( sprintf( "Failed to sync updated social accounts.  Query returned '%s'", (string) $m4is_vu4q0o ) );
 return false;
 } foreach ( $m4is_vu4q0o as $m4is_tcpvxw ) { $m4is_u54rc = $m4is_tcpvxw['LastUpdated'] > $m4is_u54rc ? $m4is_tcpvxw['LastUpdated'] : $m4is_u54rc;
 self::m4is_a4zb( $m4is_tcpvxw );
 } update_option( $m4is_plxmbr, $m4is_u54rc, false );
 return true;
 }    }

