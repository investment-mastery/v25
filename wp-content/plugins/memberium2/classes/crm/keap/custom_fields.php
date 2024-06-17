<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_a8iaym::m4is_ju94();
 final 
class m4is_a8iaym { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_j_xo4w;
 private static $m4is_aj4h;
 private static $m4is_tcw1l;
 public const CONTACT_FIELDS = -1;
 public const AFFILIATE_FIELDS = -3;
 public const OPPORTUNITY_FIELDS = -4;
 public const COMPANY_FIELDS = -6;
 public const TASK_FIELDS = -5;
 public const ORDER_FIELDS = -9;
 public const PHONE_TYPE = 1;
 public const SSN_TYPE = 2;
 public const CURRENCY_TYPE = 3;
 public const PERCENT_TYPE = 4;
 public const STATE_TYPE = 5;
 public const YESNO_TYPE = 6;
 public const YEAR_TYPE = 7;
 public const MONTH_TYPE = 8;
 public const DOW_TYPE = 9;
 public const NAME_TYPE = 10;
 public const DECIMAL_TYPE = 11;
 public const WHOLE_TYPE = 12;
 public const DATE_TYPE = 13;
 public const DATETIME_TYPE = 14;
 public const TEXT_TYPE = 15;
 public const TEXTAREA_TYPE = 16;
 public const LISTBOX_TYPE = 17;
 public const WEBSITE_TYPE = 18;
 public const EMAIL_TYPE = 19;
 public const RADIO_TYPE = 20;
 public const DROPDOWN_TYPE = 21;
 public const USER_TYPE = 22;
 public const DRILLDOWN_TYPE = 23;
  static 
function m4is_ju94() { global $wpdb;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_tcw1l = $wpdb->prefix . 'memberium_customfields';
 self::$m4is_aj4h = 1000;
 } private 
function __construct() {}     static 
function m4is_avtk57() : string { return self::$m4is_tcw1l;
  } static 
function m4is_y1g8wk() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_avtk57();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "name varchar(64) NOT NULL, \n" . "label varchar(64) NOT NULL, \n" . "datatype smallint(6) NOT NULL, \n" . "formid smallint(6) NOT NULL, \n" . "PRIMARY KEY  (id,appname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     private static 
function m4is_z0s3() : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id` FROM %i WHERE `appname` = %s", self::m4is_avtk57(), self::$m4is_zq0k );
 $m4is_x_rxou = $wpdb->get_col( $m4is_tovizk );
 return $m4is_x_rxou;
 }  public static 
function m4is__z5gv4( int $m4is_su4qk = 0, int $m4is_bl2j = 0 ) : int { global $wpdb;
 $m4is_xlvr = $m4is_su4qk < 0 ? $wpdb->prepare( "AND `formid` = %d ", $m4is_su4qk ) : '';
 $m4is_xlvr .= $m4is_bl2j > 0 ? $wpdb->prepare( "AND `datatype` = %d ", $m4is_bl2j ) : '';
 $m4is_tovizk = $wpdb->prepare( "SELECT COUNT(`id`) FROM %i WHERE `appname` = %s {$m4is_xlvr}", self::m4is_avtk57(), self::$m4is_zq0k );
 $m4is_yer1mp = $wpdb->get_var( $m4is_tovizk );
 return (int) $m4is_yer1mp;
 }  public static 
function m4is_e_prox( int $m4is_su4qk = 0, int $m4is_bl2j = 0 ) : array { global $wpdb;
 $m4is_xlvr = $m4is_su4qk < 0 ? $wpdb->prepare( "AND `formid` = %d ", $m4is_su4qk ) : '';
 $m4is_xlvr .= $m4is_bl2j > 0 ? $wpdb->prepare( "AND `datatype` = %d ", $m4is_bl2j ) : '';
 $m4is_tovizk = $wpdb->prepare( "SELECT concat('_', `name`) FROM %i WHERE `appname` = %s {$m4is_xlvr}", self::m4is_avtk57(), self::$m4is_zq0k );
 $m4is_azft = $wpdb->get_col( $m4is_tovizk );
 return $m4is_azft;
 }   public static 
function m4is_vweslb( int $m4is_su4qk = 0, int $m4is_bl2j = 0 ) : array { global $wpdb;
 $m4is_xlvr = $m4is_su4qk < 0 ? $wpdb->prepare( "AND `formid` = %d ", $m4is_su4qk ) : '';
 $m4is_xlvr .= $m4is_bl2j > 0 ? $wpdb->prepare( "AND `datatype` = %d ", $m4is_bl2j ) : '';
 $m4is_tovizk = $wpdb->prepare( "SELECT * FROM %i WHERE `appname` = %s {$m4is_xlvr}", self::m4is_avtk57(), self::$m4is_zq0k );
 $m4is_w_8g = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_w_8g;
 }  static 
function m4is_j23h() { global $wpdb;
 $m4is_dj_2 = 'DataFormField';
 $m4is_couz = 0;
 $m4is_t07y = self::m4is_z0s3();
 $m4is_jky0l = self::m4is_vweslb();
 $m4is_u4w3kj = [];
 $m4is_iiq6_ = 0;
 $m4is_vnhq = [];
 $m4is_jo8fb = [ 'Id' => '%', 'FormId' => '~>~ -999', ];
 $m4is__u5v = [ 'DataType', 'FormId', 'Id', 'Label', 'Name', ];
 do { $m4is_w_8g = self::$m4is_j_xo4w->dsQuery( $m4is_dj_2, self::$m4is_aj4h, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 $m4is_go7gri = is_array( $m4is_w_8g ) ? count( $m4is_w_8g) : 0;
 $m4is_iiq6_ = $m4is_iiq6_ + $m4is_go7gri;
 if ( $m4is_go7gri ) { foreach ($m4is_w_8g as $m4is_c5zg => $m4is_g1ru50) { $m4is_vnhq[] = $wpdb->prepare(" ( %d, %s, %s, %s, %d, %d) ", (int) $m4is_g1ru50['Id'], self::$m4is_zq0k, $m4is_g1ru50['Name'], $m4is_g1ru50['Label'], $m4is_g1ru50['DataType'], $m4is_g1ru50['FormId'] );
 $m4is_u4w3kj[] = $m4is_g1ru50['Id'];
 } } } while ( $m4is_go7gri == self::$m4is_aj4h );
 if ( ! empty( $m4is_vnhq ) ) { $m4is_p1hqu = implode( ',', $m4is_vnhq );
 $m4is_tovizk = "INSERT INTO %i ( `id`, `appname`, `name`, `label`, `datatype`, `formid` ) VALUES {$m4is_p1hqu} ON DUPLICATE KEY UPDATE `name` = VALUES(`name`), `label` = VALUES(`label`), `datatype` = VALUES(`datatype`), `formid` = VALUES(`formid`);";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::m4is_avtk57() );
 $wpdb->query( $m4is_tovizk );
 } $m4is_yzx6b = array_diff( $m4is_t07y, $m4is_u4w3kj );
 if ( ! empty( $m4is_yzx6b ) ) { $m4is_rukx_ = implode( ',', $m4is_yzx6b );
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `appname` = %s AND `id` IN ( {$m4is_rukx_} )", self::m4is_avtk57(), self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 } m4is_bnrdbo::m4is_unosgi();
 m4is_pk8phc::m4is_unosgi();
  do_action( 'memberium/custom_fields/sync' );
 set_transient( 'i2sdk_customfields_updated', time() );
 wp_cache_delete( $m4is_dj_2, 'i2sdk/tables' );
 return $m4is_iiq6_;
 }     static 
function m4is_u9tc1( string $m4is_dj_2, string $m4is_iqdn, string $m4is__47wig, int $m4is_kzb82 ) { $m4is_iqdn = trim( $m4is_iqdn );
 return self::$m4is_j_xo4w->addCustomField( $m4is_dj_2, $m4is_iqdn, $m4is__47wig, $m4is_kzb82 );
 } static 
function m4is_pprm( string $m4is_iqdn, string $m4is__47wig = 'Text', int $m4is_kzb82 = 0 ) { if ( empty( $m4is_iqdn ) ) { return;
 } $m4is_iqdn = trim( $m4is_iqdn );
 $m4is__47wig = trim( $m4is__47wig );
 $m4is_kzb82 = (int) $m4is_kzb82;
 if ($m4is_kzb82 == 0) { $m4is__u5v = [ 'Id', 'Name' ];
 $m4is_jo8fb = [ 'Id' => '%' ];
 $m4is_xql2 = m4is_ho3l::m4is_mg4uyc( 'DataFormGroup', self::$m4is_aj4h, 0, $m4is_jo8fb, $m4is__u5v );
 $m4is_kzb82 = (int) $m4is_xql2[0]['Id'];
 } if ( $m4is_kzb82 > 0 ) { m4is_a8iaym::m4is_u9tc1( 'Contact', $_POST['new_crm_field'], $m4is__47wig, $m4is_kzb82 );
 m4is_a8iaym::m4is_j23h();
 } else { m4is_wr40w::m4is_cxesuf( 'Unable to add new custom field.  Please create a custom tab and custom group in Keap first.' );
 return;
 } } }

