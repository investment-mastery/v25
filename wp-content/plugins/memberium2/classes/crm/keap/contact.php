<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 m4is_bnrdbo::m4is_x6wv();
 final 
class m4is_bnrdbo { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_kepn;
 private static $m4is_j_xo4w;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_kepn = MEMBERIUM_DB_CONTACTS;
 } private 
function __construct() { }    static 
function m4is__eyt() : string { return MEMBERIUM_DB_CONTACTS;
 } static 
function m4is_z7ah_() : string { return MEMBERIUM_DB_CONTACTTAGS;
 } static 
function m4is_l239() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is__eyt();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "fieldname varchar(64) NOT NULL DEFAULT '', \n" . "value longtext, \n" . "KEY id (id), \n" . "KEY fieldname (fieldname), \n" . "KEY appname (appname), \n" . "KEY value (value(64) ), \n" . "PRIMARY KEY  (appname,id,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } static 
function m4is_j93w0() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_z7ah_();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL AUTO_INCREMENT, \n" . "appname varchar(32) NOT NULL, \n" . "contactid int(20) NOT NULL, \n" . "tagid int(20) NOT NULL, \n" . "created timestamp, \n" . "KEY id (id), \n" . "KEY appname (appname), \n" . "KEY contactid (contactid), \n" . "KEY tagid (tagid), \n" . "PRIMARY KEY  (id,appname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_xknicd() : void { global $wpdb;
 $m4is_tovizk = "DELETE FROM %i WHERE `appname` = %s ( `value` = '' OR `value` IS NULL ) ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 }  static 
function m4is_x2c8n() : void { global $wpdb;
 $m4is_x5wxyr = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' );
 if ( empty( $m4is_x5wxyr ) ) { return;
 } $m4is_x5wxyr = array_filter( explode( ',', $m4is_x5wxyr ) );
 $m4is_tovizk = "DELETE FROM %i WHERE `appname` = %s AND `fieldname` IN ('" . implode( "','", $m4is_x5wxyr ) . "')";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 }     static 
function m4is_ltwpgs( ?int $m4is_ig9p6 = 0) : int { static $m4is_uwdfj = [];
 $m4is_e2kg = 0;
  if ( isset($m4is_uwdfj[$m4is_ig9p6]) ) { return $m4is_uwdfj[$m4is_ig9p6];
 }  $m4is_e2kg = get_user_meta( $m4is_ig9p6, 'infusionsoft_user_id', true );
 if ( $m4is_e2kg ) { $m4is_uwdfj[$m4is_ig9p6] = $m4is_e2kg;
 return $m4is_e2kg;
 }  $m4is_x0_hk = get_userdata( $m4is_ig9p6 );
 if ( is_a( $m4is_x0_hk, 'WP_User' ) ) { $m4is_fliw = $m4is_x0_hk->user_email;
 if ( ! empty( $m4is_fliw ) ) { $m4is_e2kg = self::m4is_nsbvg( $m4is_fliw );
 if ( is_array( $m4is_e2kg ) ) { $m4is_e2kg = isset( $m4is_e2kg[0] ) ? $m4is_e2kg[0] : 0;
 } return $m4is_e2kg;
 } } return 0;
 }  static 
function m4is_nsbvg( ?string $m4is_fliw, $m4is_k4yeul = []) { $m4is_fliw = strtolower( trim( $m4is_fliw ) );
 $m4is_q_ob6 = 'email:' . $m4is_fliw;
 $m4is__dypz = 'memberium2/contacts';
 $m4is_uwdfj = false;
 $m4is_z59dj = wp_cache_get( $m4is_q_ob6, $m4is__dypz, false, $m4is_uwdfj );
 if (! $m4is_uwdfj) { global $wpdb;
 $m4is_w2w8 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings' );
 $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field' );
 $sql_maxage = intval( time() - $m4is_w2w8['max_contact_age'] ) - 10;
 $m4is_tovizk = "SELECT `id` FROM %i WHERE `appname` = %s AND `fieldname` = %s AND `value` = %s ORDER BY `id` ASC;";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k, $m4is_powbq2, $m4is_fliw );
 $m4is_z59dj = $wpdb->get_col( $m4is_tovizk );
 if ( is_array( $m4is_z59dj ) && ! empty( $m4is_z59dj ) ) { wp_cache_set( $m4is_q_ob6, $m4is_z59dj, $m4is__dypz, 300 );
 } } if (! empty( $m4is_k4yeul['single'] ) ) { $m4is_z59dj = $m4is_z59dj[0];
 } return $m4is_z59dj;
 }  static 
function m4is_d3na( ?int $m4is_e2kg = 0) { global $wpdb;
 static $m4is_aslae = [];
 if ( empty( $m4is_e2kg ) ) { return 0;
 } if ( isset( $m4is_aslae[$m4is_e2kg] ) ) { return $m4is_aslae[$m4is_e2kg];
 } $m4is_ig9p6 = 0;
 $m4is_gai6k = '';
 $m4is_k8uzp = [];
 $m4is_a6m52i = m4is_wbc8os::m4is_jjgo();
 if ($m4is_a6m52i == $m4is_e2kg) { $m4is_ig9p6 = get_current_user_id();
 $m4is_aslae[$m4is_e2kg] = $m4is_ig9p6;
 return $m4is_ig9p6;
 } $m4is_zq0k = self::$m4is_zq0k;
 $m4is_vpirm = 'memberium/contact_id/' . $m4is_e2kg;
 $m4is_tovizk = "SELECT `user_id` FROM `{$wpdb->usermeta}` WHERE `meta_key` = %s ORDER BY `umeta_id` DESC";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_vpirm );
 $m4is_ig9p6 = $wpdb->get_var( $m4is_tovizk );
 if ( ! $m4is_ig9p6 ) { $m4is_tovizk = "SELECT `user_id` FROM `{$wpdb->usermeta}` WHERE `meta_key` = 'infusionsoft_user_id' AND `meta_value` = %d ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_e2kg );
 $m4is_ig9p6 = $wpdb->get_var( $m4is_tovizk );
 if ( $m4is_ig9p6 ) { self::$m4is_bnd6ti->m4is_ge9lx( $m4is_ig9p6, $m4is_e2kg );
 } }  if (! $m4is_ig9p6) { $m4is_dj_2 = MEMBERIUM_DB_CONTACTS;
 $m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr('appname');
 $m4is_powbq2 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'username_field');
 $m4is_tovizk = "SELECT `value` FROM %i WHERE `id` = %d AND `appname` = %s AND `fieldname` = %s ORDER BY `id` LIMIT 1";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, $m4is_e2kg, $m4is_zq0k, $m4is_powbq2 );
 $m4is_gai6k = $wpdb->get_var( $m4is_tovizk );
 if ( ! empty($m4is_gai6k) ) { $m4is_x0_hk = get_user_by( 'email', $m4is_gai6k );
 if (! $m4is_x0_hk) { $m4is_x0_hk = get_user_by('login', $m4is_gai6k);
 } if ($m4is_x0_hk) { $m4is_ig9p6 = $m4is_x0_hk->ID;
 $m4is_aslae[$m4is_e2kg] = $m4is_ig9p6;
 return $m4is_ig9p6;
 }  $m4is_tovizk = "SELECT `id` FROM %i WHERE  `appname` = %s AND `fieldname` = %s AND `value` = %s ORDER BY `id` ASC ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k, $m4is_powbq2, $m4is_gai6k );
 $m4is_k8uzp = $wpdb->get_col( $m4is_tovizk );
 $m4is_tovizk = "SELECT `ID` FROM `{$wpdb->users}` WHERE `user_login` = %s OR `user_email` = %s ;";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_gai6k, $m4is_gai6k );
 $m4is_ig9p6 = $wpdb->get_var( $m4is_tovizk );
 if ( ! empty( $m4is_ig9p6 ) ) { $m4is_j5sy07 = get_user_meta($m4is_ig9p6, 'infusionsoft_user_id', true);
 if ( $m4is_j5sy07 === false ) {  } if ( $m4is_j5sy07 == $m4is_e2kg ) { $m4is_aslae[$m4is_e2kg] = $m4is_ig9p6;
 return $m4is_ig9p6;
 } } } } if ( user_can( $m4is_ig9p6, 'manage_options' ) ) { $m4is_ig9p6 = 0;
 } if ( ! empty( $m4is_ig9p6 ) ) { $m4is_aslae[$m4is_e2kg] = $m4is_ig9p6;
 return $m4is_ig9p6;
 } return false;
 }     static 
function m4is_v83u( ?string $m4is_fliw ) : int { global $wpdb;
 $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field' );
 $m4is_tovizk = "SELECT COUNT( `id` ) FROM %i WHERE `appname` = %s AND `fieldname` = %s AND `value` = %s ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k, $m4is_powbq2, $m4is_fliw );
 $m4is_oa_z = (int) $wpdb->get_var( $m4is_tovizk );
 return $m4is_oa_z;
 }  static 
function m4is_b0i8kq( ?array $m4is_z59dj = [] ) { global $wpdb;
 $m4is_tovizk = "SELECT `id`, `value` FROM %i WHERE `appname` = %s AND `fieldname` = 'Groups'";
 if ( ! empty( $m4is_z59dj ) ) { $m4is_tovizk .= " AND `id` IN ('%s')";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k, implode( ',', $m4is_z59dj ) );
 } else { $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k );
 } return $wpdb->get_results( $m4is_tovizk, OBJECT_K );
 }  static 
function m4is_ojk0r( ?int $m4is_e2kg, ?bool $m4is_o4hoex = false ) { global $wpdb;
 $m4is_tovizk = "DELETE FROM %i WHERE `id` = %d AND `appname` = %s";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, $m4is_e2kg, self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 if ( $m4is_e2kg ) { self::$m4is_bnd6ti->m4is_m3vz( $m4is_e2kg );
 if ( $m4is_o4hoex ) { self::m4is_cat_6w( $m4is_e2kg );
 $m4is_pa8jw = m4is_pk8phc::m4is_rbugf( $m4is_e2kg );
 m4is_pk8phc::m4is_njl4( $m4is_pa8jw );
 } } }  private static 
function m4is_cat_6w( int $m4is_e2kg ) { global $wpdb;
 $m4is_tovizk = "DELETE FROM %i WHERE `contactid` = %d AND `appname` = %s";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, MEMBERIUM_DB_CONTACTTAGS, $m4is_e2kg, self::$m4is_zq0k );
 $wpdb->query( $m4is_tovizk );
 }  static 
function m4is_aumx_() { global $wpdb;
 if ( ! m4is_u68pu::m4is_u26m8u( ['unlimited'] ) ) { return;
 } $m4is_qtlunw = 'memberium/contact/async/locked';
 $m4is_ur3_ = 'memberium/contact/async/last_update';
 $m4is_y_38pw = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'async_limit', 0 );
 $m4is_l_8hew = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'async_tag', 0 );
 $m4is_cqad = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'disable_login_sync', 0 );
 $m4is_du_v = (int) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'max_contact_age', 0 );
 if ( $m4is_l_8hew == 0 || $m4is_y_38pw == 0 ) { return;
 } if ( $m4is_cqad == 0 || $m4is_du_v == 0 ) { return;
 }  if ( ! update_option( $m4is_qtlunw, 1, true ) ) { m4is__gu52::m4is_eh6lg( 0, 'cron', 'Background Contact Update Locked.  Bulk Sync Skipped' ) ;
 return;
 } update_option( $m4is_qtlunw, 1 );
 $m4is_pjkx2b = time();
 $m4is_k8uzp = [];
 $m4is_couz = 0;
 $m4is_dj_2 = 'Contact';
 $m4is_yer1mp = 0;
 $m4is_x_rxou = [];
 $m4is_pwym1p = get_option( $m4is_ur3_, '2000-01-01 00:00:00' );
 $m4is_j_xo4w = self::$m4is_j_xo4w;
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, true );
 $m4is_jo8fb = [ 'LastUpdated' => "~>=~ {$m4is_pwym1p}", 'Groups' => $m4is_l_8hew, ];
 $m4is_k8uzp = self::$m4is_j_xo4w->dsQueryOrderBy( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'LastUpdated', true );
 $m4is_k8uzp = is_array( $m4is_k8uzp ) ? array_filter( $m4is_k8uzp ) : $m4is_k8uzp;
 $m4is_yer1mp = is_array( $m4is_k8uzp ) ? count( $m4is_k8uzp ) : 0;
 if ( $m4is_yer1mp ) { foreach ( $m4is_k8uzp as $m4is_p9r_8e ) { $m4is_x_rxou[] = $m4is_p9r_8e['Id'];
 } $m4is_rukx_ = implode( ',', $m4is_x_rxou );
 $m4is_tovizk = "SELECT `id`, `value` FROM %i WHERE `id` IN ({$m4is_rukx_}) AND `appname` = %s AND `fieldname` = 'LastUpdated' ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, self::$m4is_zq0k );
 $m4is_azd3yf = $wpdb->get_results( $m4is_tovizk, OBJECT_K );
 foreach( $m4is_k8uzp as $m4is_s2ge5 => $m4is_p9r_8e ) { $m4is_e2kg = $m4is_p9r_8e['Id'];
 $m4is_x2ty90 = $m4is_p9r_8e['LastUpdated'];
 $m4is_fai4n = $m4is_azd3yf[$m4is_e2kg]->value;
 if ( $m4is_fai4n >= $m4is_x2ty90 ) { unset( $m4is_k8uzp[$m4is_s2ge5] );
 } } foreach( $m4is_k8uzp as $m4is_p9r_8e ) { self::$m4is_bnd6ti->m4is_dhpr( $m4is_p9r_8e );
 if ( ! empty( $m4is_p9r_8e['LastUpdated'] ) ) { $m4is_sidqvc = date( 'Y-m-d H:i:s', strtotime( $m4is_p9r_8e['LastUpdated'] ) );
 } } } update_option( $m4is_ur3_, $m4is_sidqvc, true );
 m4is__gu52::m4is_eh6lg( 0, 'cron', 'Background Contact Updater - ' . $m4is_yer1mp . ' contacts synced.' ) ;
 update_option( $m4is_qtlunw, 0, true );
 }  static 
function m4is_cseh( ?int $m4is_e2kg, ?array $m4is_w_8g = [], ?bool $m4is_nhts7w = false ) { $m4is_e2kg = (int) $m4is_e2kg;
 if ( $m4is_e2kg ) { self::$m4is_j_xo4w->updatecon( $m4is_e2kg, $m4is_w_8g );
 if ( $m4is_nhts7w ) { self::$m4is_bnd6ti->m4is_leu58( $m4is_e2kg );
 } } return $m4is_e2kg;
 }  static 
function m4is_xj2eb( ?string $m4is_fliw = '', ?string $m4is__g7jpz = 'Memberium') { if ( ! empty( $m4is_fliw ) ) { self::$m4is_j_xo4w->optin($m4is_fliw, $m4is__g7jpz);
 } }  static 
function m4is_klk1gy( ?array $m4is_p9r_8e, ?string $m4is_tz42r0 = 'Email' ) : int { return (int) self::$m4is_j_xo4w->addWithDupCheck( $m4is_p9r_8e, $m4is_tz42r0 );
 }  static 
function m4is_i38y7c( ?int $m4is_e2kg, ?array $m4is_w_8g = [] ) { if ( empty( $m4is_w_8g )) { $m4is_w_8g = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 } return self::$m4is_j_xo4w->loadCon( $m4is_e2kg, $m4is_w_8g );
 }  static 
function m4is_e5j_xv( ?string $m4is_fliw = '', ?array $m4is_w_8g = [] ) { if ( empty ($m4is_w_8g ) ) { $m4is_w_8g = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 } return self::$m4is_j_xo4w->findByEmail( $m4is_fliw, $m4is_w_8g );
 }  static 
function m4is_leu58( ?int $m4is_e2kg ) { $m4is_p9r_8e = self::m4is_i38y7c( $m4is_e2kg );
 if ( is_array( $m4is_p9r_8e ) ) { self::$m4is_bnd6ti->m4is_dhpr( $m4is_p9r_8e );
 } return $m4is_p9r_8e;
 }     static 
function m4is_yvnol( ?int $m4is_e2kg, ?bool $m4is_s7cxe = false, $m4is__ng4jx = false ) : array { global $wpdb;
 $m4is_yxwn = $m4is_s7cxe ? 'LOWER(`fieldname`) as `fieldname`' : '`fieldname`';
 $m4is_tovizk = "SELECT {$m4is_yxwn}, `value` FROM %i WHERE `id` = %d AND `appname` = %s";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_kepn, $m4is_e2kg, self::$m4is_zq0k );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_p9r_8e = [];
 if ( is_array( $m4is_hpn9y ) ) { foreach ( $m4is_hpn9y as $m4is_j5sy07 => $m4is_ke_fr ) { $m4is_p9r_8e[$m4is_ke_fr['fieldname']] = $m4is_ke_fr['value'];
 } } if ( $m4is__ng4jx ) { return $m4is_p9r_8e;
 } else { $m4is_p9r_8e = apply_filters( 'memberium_contact_load', $m4is_p9r_8e );
 } return $m4is_p9r_8e;
 }  static 
function m4is_unosgi() { $m4is_cgxdnf = 'ignore_contact_fields';
 $m4is_u23rl = 'Contact';
 $m4is_sacn = m4is_ho3l::m4is_kjedy2( $m4is_u23rl, false );
 $m4is_wrnxfy = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', $m4is_cgxdnf, '' );
 $m4is_wrnxfy = is_string( $m4is_wrnxfy ) ? $m4is_wrnxfy : '';
 $m4is_wrnxfy = array_filter( explode( ',', $m4is_wrnxfy ) );
 $m4is_wrnxfy = array_intersect( $m4is_sacn, $m4is_wrnxfy );
 $m4is_wrnxfy = implode( ',', $m4is_wrnxfy );
 self::$m4is_bnd6ti->m4is_qdi_3o( $m4is_wrnxfy, 'settings', $m4is_cgxdnf );
 } }

