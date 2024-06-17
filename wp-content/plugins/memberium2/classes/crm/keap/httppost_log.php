<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is__gu52::m4is_x6wv();
 final 
class m4is__gu52 { private static $m4is_bnd6ti;
 private static $m4is_zc5zn;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zc5zn = 'memberium/log_count';
 }     static 
function m4is_f_1z() : string { return MEMBERIUM_DB_HTTPPOST;
 } static 
function m4is_o02mu() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_f_1z();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL AUTO_INCREMENT, \n" . "time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, \n" . "appname varchar(16) NOT NULL, \n" . "contactid int(11) NOT NULL, \n" . "ipaddress varchar(45) NOT NULL, \n" . "type varchar(16) NOT NULL, \n" . "log longtext NOT NULL, \n" . "KEY appname (appname), \n" . "KEY contactid (contactid), \n" . "KEY type (type), \n" . "KEY ipaddress (ipaddress), \n" . "PRIMARY KEY  (id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }  static 
function m4is_eh6lg( int $m4is_e2kg, string $m4is_u23rl = 'event', string $m4is_knyw0 = '', string $m4is_hpiwo9 = '', bool $m4is_cfr4 = false ) : int { if ( $m4is_u23rl == 'httppost' ) { $m4is_io0p = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'httppost_log' );
 if ( $m4is_cfr4 === false && empty( $m4is_io0p ) ) { return false;
 } } global $wpdb;
 $m4is_dj_2 = self::m4is_f_1z();
 $m4is_etj2 = [ 'contactid' => (int) $m4is_e2kg, 'type' => trim( $m4is_u23rl ), 'appname' => self::$m4is_bnd6ti->m4is_d14zr( 'appname' ), 'ipaddress' => $m4is_hpiwo9, 'log' => trim($m4is_knyw0) . "\n", ];
 $m4is_dp251a = [ '%d', '%s', '%s', '%s', '%s', ];
 $wpdb->insert($m4is_dj_2, $m4is_etj2, $m4is_dp251a);
 $m4is_no8uer = (int) $wpdb->insert_id;
 delete_transient( self::$m4is_zc5zn );
 return $m4is_no8uer;
 }  static 
function m4is_qyunz0( int $m4is_no8uer, string $m4is_knyw0 ) : bool { if ( $m4is_no8uer ) { global $wpdb;
 $m4is_no8uer = (int) $m4is_no8uer;
 $m4is_knyw0 = trim($m4is_knyw0);
 if (! empty($m4is_knyw0) && ! empty($m4is_no8uer) ) { $m4is_dj_2 = self::m4is_f_1z();
 $m4is_tovizk = "UPDATE `{$m4is_dj_2}` SET `log` = CONCAT( IFNULL( `log`, '' ), %s ) WHERE `id` = %d;";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_knyw0 . "\n", $m4is_no8uer);
 $wpdb->query($m4is_tovizk);
 delete_transient( self::$m4is_zc5zn );
 return true;
 } } return false;
 }  static 
function m4is_asnet() { global $wpdb;
 $m4is_dj_2 = self::m4is_f_1z();
 $m4is_dckze = defined( 'HTTPPOST_LOG_DAYS' ) ? (int) constant( 'HTTPPOST_LOG_DAYS' ) : 7;
 $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `time` < NOW() - INTERVAL {$m4is_dckze} DAY ";
 $wpdb->query($m4is_tovizk);
 delete_transient( self::$m4is_zc5zn );
 } }

