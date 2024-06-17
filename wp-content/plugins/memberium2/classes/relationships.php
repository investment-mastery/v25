<?php
/**
 * Copyright (c) 2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_de1d_6::m4is_x6wv();
 
class m4is_de1d_6 { private static $m4is_dj_2;
 private static $m4is_r1bhpd;
  static 
function m4is_x6wv() { self::$m4is_dj_2 = MEMBERIUM_DB_RELATIONSHIPS;
 self::$m4is_r1bhpd = MEMBERIUM_DB_RELATIONSHIP_TYPES;
 }     static 
function m4is_mqe68() : string { return self::$m4is_dj_2;
 } static 
function m4is_yesu() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_mqe68();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL AUTO_INCREMENT, \n" . "user_id int(11) NOT NULL, \n" . "type_id int(11) NOT NULL, \n" . "rel_id int(11) NOT NULL, \n" . "created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, \n" . "UNIQUE KEY relationship (user_id,rel_id,type_id), \n" . "PRIMARY KEY  (id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }  static 
function m4is_x70ln() : string { return self::$m4is_r1bhpd;
 } static 
function m4is_mx2va() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_x70ln();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_pj2k( int $m4is_ig9p6, int $m4is_bl2j ): array {   global $wpdb;
   if ( ! $m4is_ig9p6 || ! $m4is_bl2j) { return [];
 }  $m4is_dj_2 = self::m4is_mqe68();
   $m4is_tovizk = "SELECT `rel_id` FROM `{$m4is_dj_2}` WHERE `user_id` = %d AND `rel_type_id` = %d;";
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_ig9p6, $m4is_bl2j );
   $m4is_xm2h = $wpdb->get_col( $m4is_tovizk );
  return $m4is_xm2h;
 }  static 
function m4is_nwzi( int $m4is_ig9p6, int $m4is_bl2j ): array {   global $wpdb;
  $m4is_dj_2 = self::m4is_mqe68();
   $m4is_tovizk = "SELECT count(*) FROM `{$m4is_dj_2}` WHERE `user_id` = %d AND `rel_type_id` = %d;";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_ig9p6, $m4is_bl2j );
   $m4is_xm2h = (int) $wpdb->get_var( $m4is_tovizk );
  return $m4is_xm2h;
 }  static 
function m4is_jf0rg( int $m4is_ig9p6, int $m4is_bl2j, int $m4is_wogf ): bool {   global $wpdb;
  $m4is_dj_2 = self::m4is_mqe68();
    $m4is_tovizk = "SELECT `rel_id` FROM `{$m4is_dj_2}` WHERE `user_id` = %d AND `rel_type_id` = %d AND `rel_id` = %d LIMIT 1";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_ig9p6, $m4is_bl2j, $m4is_wogf );
  $m4is_oa_z = $wpdb->get_var( $m4is_tovizk );
    return (bool) $m4is_oa_z;
 }  static 
function m4is_gub5( int $m4is_ig9p6, int $m4is_bl2j, array $m4is_brhvwg ) {   global $wpdb;
  $m4is_brhvwg = array_filter( $m4is_brhvwg, function( $m4is_w_o7al ) { return is_int( $m4is_w_o7al ) && $m4is_w_o7al > 0;
 });
  $m4is_dj_2 = self::m4is_mqe68();
  $m4is_aahr0 = self::m4is_pj2k( $m4is_ig9p6, $m4is_bl2j );
  $m4is_rvs7bp = array_diff( $m4is_aahr0, $m4is_brhvwg );
 $m4is_ohv3zg = array_diff( $m4is_brhvwg, $m4is_aahr0 );
  if ( ! empty ($m4is_rvs7bp ) ) { $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `user_id` = %d AND `rel_type_id` = %d AND `rel_id` IN (%s)";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_ig9p6, $m4is_bl2j, implode(',', $m4is_rvs7bp));
 $wpdb->query($m4is_tovizk);
 }  if ( ! empty( $m4is_ohv3zg) ) { $m4is_ks1fj2 = "INSERT INTO `{$m4is_dj_2}` (`user_id`, `rel_type_id`, `rel_id`) VALUES (%s, %s, %s)";
 foreach ($m4is_ohv3zg as $m4is_djrd3) { $m4is_tovizk = $wpdb->prepare($m4is_ks1fj2, $m4is_ig9p6, $m4is_bl2j, $m4is_djrd3);
 $wpdb->query($m4is_tovizk);
 } } }  static 
function m4is_hyd4( int $m4is_ig9p6, int $m4is_bl2j, int $m4is_wogf ) {   global $wpdb;
  if ( ! $m4is_ig9p6 || ! $m4is_bl2j || ! $m4is_wogf ) { return;
 }  $m4is_dj_2 = self::m4is_mqe68();
   $m4is_tovizk = "INSERT INTO `{$m4is_dj_2}` (`user_id`, `rel_type_id`, `rel_id`) VALUES (%d, %d, %d);";
   $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_ig9p6, $m4is_bl2j, $m4is_wogf );
  $wpdb->query( $m4is_tovizk );
 }  static 
function m4is_z7tr4 ( int $m4is_ig9p6, int $m4is_bl2j, int $m4is_wogf = 0 ) {   global $wpdb;
  $m4is_dj_2 = self::m4is_mqe68();
  if ( $m4is_wogf ) {   $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `user_id` = %d AND `rel_type_id` = %d AND `rel_id` = %d ;";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_ig9p6, $m4is_bl2j, $m4is_wogf );
 } else {   $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `user_id` = %d AND `rel_type_id` = %d ;";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_ig9p6, $m4is_bl2j );
 }  $wpdb->query( $m4is_tovizk );
 }  static 
function m4is_duaj( int $m4is_bl2j ) : bool {  global $wpdb;
      $m4is_dj_2 = self::m4is_mqe68();
 $m4is_tovizk = "SELECT count(*) FROM `{$m4is_dj_2}` WHERE `rel_type_id` = %d;";
 $m4is_njb6r3 = $wpdb->get_var( $wpdb->prepare( $m4is_tovizk, $m4is_bl2j ) );
   return (bool) $m4is_njb6r3;
 }  static 
function m4is_t1ln0d ( string $m4is_t5ot4 ) : int {   global $wpdb;
  $m4is_dj_2 = self::m4is_x70ln();
   $m4is_tovizk = "INSERT INTO `{$m4is_dj_2}` (`name`) VALUES (%s);";
   $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_t5ot4 );
  $wpdb->query( $m4is_tovizk );
  $m4is_j5sy07 = $wpdb->insert_id;
   return (int) $insert_id;
 }  static 
function m4is_hh1ndx( string $m4is_t5ot4 ) : int {   global $wpdb;
  $m4is_dj_2 = self::m4is_x70ln();
  $m4is_t5ot4 = strtolower( trim( $m4is_t5ot4 ) );
   $m4is_tovizk = "SELECT `rel_type_id` FROM `{$m4is_dj_2}` WHERE `name` = %s LIMIT 1;";
   $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_t5ot4 );
   $m4is_j5sy07 = (int) $wpdb->get_var( $m4is_tovizk );
  return $m4is_j5sy07;
 }  static 
function m4is_tudj0( string $m4is_t5ot4 ) : int {  global $wpdb;
  $m4is_t5ot4 = strtolower( trim( $m4is_t5ot4 ) );
  if ( empty( $m4is_t5ot4 ) ) { return 0;
 }  $m4is_bl2j = self::m4is_hh1ndx( $m4is_t5ot4 );
  if ( ! $m4is_bl2j ) { return 0;
 }  if ( ! self::m4is_duaj( $m4is_bl2j ) ) { return 0;
 }  $m4is_dj_2 = self::elf_get_relationship_types_table();
  $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `type_id` = %d ";
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_bl2j );
  $m4is_hpn9y = $wpdb->query( $m4is_tovizk );
  return (int) $m4is_hpn9y;
 }  }

