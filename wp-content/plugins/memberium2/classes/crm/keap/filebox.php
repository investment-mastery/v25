<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_ru7njr::m4is_ju94();
 final 
class m4is_ru7njr { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_j_xo4w;
 private static $m4is_ay0k;
 private static $m4is_dw2p;
 private static $m4is_a0pejg;
 private static $m4is_jv9xhf;
 private static $m4is_x6ag;
 private static $m4is_doux;
  public static 
function m4is_ju94() { global $wpdb;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_dw2p = $wpdb->prefix . 'memberium_filebox';
 self::$m4is_jv9xhf = 'FileBox';
 self::$m4is_doux = 'memberium/filebox/lastupdate';
 self::$m4is_a0pejg = 1000;
 self::$m4is_x6ag = 900;
 }    static 
function m4is_a0k3() : string { return self::$m4is_dw2p;
 } static 
function m4is_r12qt6() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_a0k3();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) unsigned NOT NULL, \n" . "contactid int(20) unsigned NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "filename varchar(255) NOT NULL, \n" . "extension varchar(255) NOT NULL, \n" . "filesize int(20) unsigned NOT NULL, \n" . "public tinyint(1) unsigned NOT NULL, \n" . "KEY id (id), \n" . "KEY contactid (contactid), \n" . "KEY appname (appname), \n" . "KEY filename (filename), \n" . "PRIMARY KEY  (appname,id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }    private static 
function m4is_twdlx9() : array { if ( is_null( self::$m4is_ay0k ) ) { self::$m4is_ay0k = [ '3gp' => 'video/3gpp', 'avi' => 'video/x-msvideo', 'css' => 'text/css', 'doc' => 'application/msword', 'docx' => 'application/msword', 'exe' => 'application/octet-stream', 'gif' => 'image/gif', 'htm' => 'text/html', 'html' => 'text/html', 'jpeg' => 'image/jpg', 'jpg' => 'image/jpg', 'js' => 'application/javascript', 'jsc' => 'application/javascript', 'mov' => 'video/quicktime', 'mp3' => 'audio/mpeg', 'mpe' => 'video/mpeg', 'mpeg' => 'video/mpeg', 'mpg' => 'video/mpeg', 'pdf' => 'application/pdf', 'php' => 'text/html', 'png' => 'image/png', 'ppt' => 'application/vnd.ms-powerpoint', 'wav' => 'audio/x-wav', 'xls' => 'application/vnd.ms-excel', 'zip' => 'application/zip', ];
 } return self::$m4is_ay0k;
 }  private static 
function m4is_uqsk( string $m4is_ql1r ) : string { $m4is_r34hj8 = strtolower( end( explode( '.', $m4is_ql1r ) ) );
 return array_key_exists( $m4is_r34hj8, self::m4is_twdlx9() ) ? self::$m4is_ay0k[$m4is_r34hj8] : 'application/octet-stream';
 }    private static 
function m4is_hc9k( int $m4is_e2kg ) : array { global $wpdb;
 $m4is_jo8fb = $wpdb->prepare( "SELECT id FROM %i WHERE contactid = %d", self::$m4is_dw2p, $m4is_e2kg );
 return $wpdb->get_col( $m4is_jo8fb );
 } private static 
function m4is_a68k_q( array $m4is_t07y, array $m4is_u4w3kj ) : void { global $wpdb;
 $m4is_x_rxou = array_filter( array_diff( $m4is_t07y, $m4is_u4w3kj ) );
 $m4is_p1hqu = implode( ',', $m4is_x_rxou );
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `appname` = %s AND `id` IN ( {$m4is_p1hqu} )", self::$m4is_zq0k, self::$m4is_dw2p );
 } private static 
function m4is_f1tc8( int $m4is_e2kg ) : void { $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $m4is_e2kg );
 update_user_meta( $m4is_ig9p6, self::$m4is_doux, time() );
 } private static 
function m4is_sadorv( int $m4is_e2kg ) : bool { $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $m4is_e2kg );
 $m4is_eeaiqk = (int) get_user_meta( $m4is_ig9p6, self::$m4is_doux, true );
 return ( self::$m4is_x6ag > ( time() - $m4is_eeaiqk ) );
 }    public static 
function m4is_i2l5pt( int $m4is_e2kg ) : int { global $wpdb;
 $m4is_jo8fb = $wpdb->prepare( "SELECT COUNT(`id`) FROM %i WHERE `appname` = %s and `contactid` = %d", self::$m4is_dw2p, self::$m4is_zq0k, $m4is_e2kg );
 return (int) $wpdb->get_var( $m4is_jo8fb );
 }  public static 
function m4is_ixqtlw( int $m4is_e2kg, bool $m4is_s7cxe = false ) : array { global $wpdb;
 $m4is_p1ihx = [];
 $m4is_jo8fb = $wpdb->prepare( "SELECT * FROM %i WHERE contactid = %d", self::$m4is_dw2p, $m4is_e2kg );
 $m4is_b572w = $wpdb->get_results( $m4is_jo8fb, ARRAY_A );
 if ( ! is_array( $m4is_b572w ) ) { return [];
 } foreach( $m4is_b572w as $m4is_ereh ) { $m4is_p1ihx[$m4is_ereh['id']] = [ 'ContactId' => $m4is_ereh['contactid'], 'FileName' => $m4is_ereh['filename'], 'Extension' => $m4is_ereh['extension'], 'FileSize' => $m4is_ereh['filesize'], 'Id' => $m4is_ereh['id'], 'Public' => $m4is_ereh['public'] ];
 } $m4is_p1ihx = $m4is_s7cxe ? array_change_key_case( $m4is_p1ihx, CASE_LOWER ) : $m4is_p1ihx;
 return $m4is_p1ihx;
 }  public static 
function m4is_x29z( int $m4is_e2kg, bool $m4is_dzkv = false ) : array { global $wpdb;
 if ( ! $m4is_dzkv && ! self::m4is_sadorv( $m4is_e2kg )) { return self::m4is_ixqtlw( $m4is_e2kg );
 } $m4is__u5v = m4is_ho3l::m4is_kjedy2( self::$m4is_jv9xhf, false );
 $m4is_couz = 0;
 $m4is_p1ihx = [];
 $m4is_x_rxou = [];
 $m4is_jo8fb = [ 'ContactId' => $m4is_e2kg ];
 $m4is_h61a3t = self::m4is_hc9k( $m4is_e2kg );
 do { $m4is_xcs9ht = self::$m4is_j_xo4w->dsQuery( self::$m4is_jv9xhf, self::$m4is_a0pejg, $m4is_couz, $m4is_jo8fb, $m4is__u5v );
 $m4is_iwzu = is_array( $m4is_xcs9ht ) ? count( $m4is_xcs9ht) : 0;
 if ( $m4is_iwzu ) { foreach ( $m4is_xcs9ht as $m4is_zi19 ) { if ( $m4is_zi19['FileSize'] == 0 ) { continue;
 } $m4is_j5sy07 = (int) $m4is_zi19['Id'];
 $m4is_x_rxou[] = $m4is_j5sy07;
 $m4is_p1ihx[$m4is_j5sy07] = $m4is_zi19;
 $m4is_ereh = [ 'appname' => self::$m4is_zq0k, 'contactid' => $m4is_e2kg, 'filename' => $m4is_zi19['FileName'], 'extension' => $m4is_zi19['Extension'], 'filesize' => $m4is_zi19['FileSize'], 'id' => $m4is_j5sy07, 'public' => $m4is_zi19['Public'] ];
 if ( in_array( $m4is_j5sy07, $m4is_h61a3t ) ) { $wpdb->update( self::$m4is_dw2p, $m4is_ereh, [ 'id' => $m4is_j5sy07 ] );
 } else { $wpdb->insert( self::$m4is_dw2p, $m4is_ereh );
 } } } $m4is_couz++;
 } while ( $m4is_iwzu == self::$m4is_a0pejg );
 self::m4is_a68k_q( $m4is_h61a3t, $m4is_x_rxou );
 self::m4is_f1tc8( $m4is_e2kg );
 return $m4is_p1ihx;
 } public static 
function m4is_ax8_( int $m4is_j5sy07, bool $m4is_s7cxe = false ) : array { global $wpdb;
 $m4is_jo8fb = $wpdb->prepare( "SELECT * FROM %i WHERE `appname` = %s AND `id` = %d", self::$m4is_dw2p, self::$m4is_zq0k, $m4is_j5sy07 );
 $m4is_ereh = $wpdb->get_row( $m4is_jo8fb, ARRAY_A );
 if ( ! is_array( $m4is_ereh ) ) { return [];
 } $m4is_ujq_m = [ 'ContactId' => $m4is_ereh['contactid'], 'Extension' => $m4is_ereh['extension'], 'FileName' => $m4is_ereh['filename'], 'FileSize' => $m4is_ereh['filesize'], 'Id' => $m4is_ereh['id'], 'Public' => $m4is_ereh['public'] ];
 $m4is_ujq_m = $m4is_s7cxe ? array_change_key_case( $m4is_ujq_m, CASE_LOWER ) : $m4is_ujq_m;
 return $m4is_ujq_m;
 }  public static 
function m4is_ml7x0q( int $m4is_hydftg, string $m4is_ql1r, bool $m4is_q10b76 = false ) { $m4is_ql1r = trim( $m4is_ql1r );
 $m4is_q10b76 = (bool) $m4is_q10b76;
 $m4is_swtx = $_REQUEST['signature'];
 if ( ! wp_verify_nonce( $m4is_swtx, 'filebox_download::' . $m4is_hydftg ) ) { wp_die( 'Invalid Filebox Download Link' );
 exit;
 } if ( is_user_logged_in() && ( $m4is_hydftg < 1 || empty( $m4is_ql1r ) ) ) { return;
 } $m4is_stfo = $m4is_q10b76 ? self::m4is_uqsk( $m4is_ql1r ) : 'application/octet-stream';
 m4is_aoxw::m4is_g7bv();
 header( 'Content-Type: ' . $m4is_stfo );
 header( 'Content-Disposition: attachment; filename="' . $m4is_ql1r . '"' );
 echo base64_decode( self::$m4is_j_xo4w->getFile( (int) $_GET['filebox_id'] ) );
 exit;
 }    public static 
function m4is_xdv_8u() { $m4is_couz = (int) get_option( '', 0 );
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2( self::$m4is_jv9xhf, false );
 $m4is_jo8fb = [ 'Id' => '%', ];
 $m4is_xcs9ht = self::$m4is_j_xo4w->dsQuery( self::$m4is_jv9xhf, self::$m4is_a0pejg, $m4is_couz, $m4is_jo8fb, $m4is_w_8g );
  if ( is_array( $m4is_xcs9ht ) ) { } } }

