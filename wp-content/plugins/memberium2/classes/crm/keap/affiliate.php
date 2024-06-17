<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 m4is_pk8phc::m4is_x6wv();
 final 
class m4is_pk8phc { static private $m4is_jcbk3;
 static private $m4is_bnd6ti;
 static private $m4is_zq0k;
 static private $m4is_j_xo4w;
 static private $m4is_qaei34;
 static private $m4is_ph1x6z;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_jcbk3 = 'memberium_affiliates';
 self::$m4is_ph1x6z = 'memberium_affiliates_totals';
 }     static 
function m4is_f5buj() : string { return self::$m4is_jcbk3;
 } static 
function m4is_umj7a() : string { return self::$m4is_ph1x6z;
 } static 
function m4is_jx3t() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_f5buj();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "fieldname varchar(64) NOT NULL DEFAULT '', \n" . "value longtext, \n" . "KEY id (id), \n" . "KEY appname (appname), \n" . "KEY fieldname (fieldname), \n" . "KEY value (value(64) ), \n" . "PRIMARY KEY  (id,appname,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } static 
function m4is_ejb6u8() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_umj7a();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, \n" . "amount_earned double NOT NULL DEFAULT 0, \n" . "payments double NOT NULL DEFAULT 0, \n" . "clawbacks double NOT NULL DEFAULT 0, \n" . "running_balance double NOT NULL DEFAULT 0, \n" . "KEY id (id), \n" . "KEY appname (appname), \n" . "PRIMARY KEY  (id,appname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_w7itrl() {  self::$m4is_qaei34 = is_null( self::$m4is_qaei34 )   ? self::$m4is_qaei34 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'max_affiliate_age', 0 )  : self::$m4is_qaei34;
  return (int) self::$m4is_qaei34;
 }  static 
function m4is_xsjb( int $m4is_eeaiqk ) {  $m4is_eeaiqk = $m4is_eeaiqk < 0 ? 0 : $m4is_eeaiqk;
  self::$m4is_qaei34 = $m4is_eeaiqk;
  return $m4is_eeaiqk;
 }  static 
function m4is_pkgv() {  static $m4is_wdjmn;
  if ( ! isset( $m4is_wdjmn ) ) {  $m4is_wdjmn = self::$m4is_bnd6ti->m4is_zw_n()->dsGetSetting( 'Affiliate', 'chooseaffiliate' );
 }  return $m4is_wdjmn;
 }  static 
function m4is_z4ufe() : int {  global $wpdb;
   $m4is_tovizk = "SELECT COUNT(*) FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = %s AND `fieldname` = 'Status' AND `value` = 1;";
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k );
  return (int) $wpdb->get_var( $m4is_tovizk );
 }  static 
function m4is_ek_g( int $m4is_a0pejg = 0, int $m4is_couz = 0, string $m4is_zg8z = '' ) : array { global $wpdb;
   $m4is_tovizk = "SELECT distinct `id` FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = %s AND `fieldname` = 'Status' ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k );
   if ( ! empty( $m4is_zg8z ) ) { $m4is_tovizk .= " AND `value` = {$m4is_zg8z} ";
  }  $m4is_tovizk .= "ORDER BY `id` ASC ";
   if ( $m4is_a0pejg > 0 ) { $m4is_tovizk .= " LIMIT {$m4is_a0pejg} OFFSET " . ( $m4is_couz * $m4is_a0pejg );
  }  $m4is_x_rxou = $wpdb->get_col( $m4is_tovizk, 0 );
   return $m4is_x_rxou;
  }  static 
function m4is_jcl6og( int $m4is_pa8jw ) : array { global $wpdb;
 $m4is_s2ge5 = 'memberium/sync/running_totals/last_update';
 $m4is_jt0xp = time() - (int) get_option( $m4is_s2ge5, 0 );
 $m4is_eeaiqk = HOUR_IN_SECONDS;
 if ( $m4is_jt0xp > $m4is_eeaiqk ) { self::m4is_c75kdb();
 } $m4is_tovizk = "SELECT `amount_earned`, `payments`, `clawbacks`, `running_balance`, `time` FROM %i WHERE `appname` = %s AND `id` = %d";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::m4is_umj7a(), self::$m4is_zq0k, $m4is_pa8jw );
 $m4is_oa_z = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_oa_z = is_array( $m4is_oa_z[0] ) ? $m4is_oa_z[0] : [];
 $m4is_n260nx = empty( $m4is_oa_z['time'] ) ? 0 : strtotime( $m4is_oa_z['time'] );
  return $m4is_oa_z;
 }  static 
function m4is_c75kdb() { global $wpdb;
 if ( ! self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_affiliate', 0 ) ) { return;
 } $m4is_s2ge5 = 'memberium/sync/running_totals/updated';
 $m4is_ev1lqy = (int) get_transient( $m4is_s2ge5 );
 if ( ( time() - $m4is_ev1lqy ) < 43200 ) { return;
 } $m4is_dj_2 = self::$m4is_jcbk3;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_a0pejg = 500;
 $m4is_couz = 0;
 do {  $m4is_exnb = self::m4is_ek_g( $m4is_a0pejg, $m4is_couz, 1 );
 if ( ! empty( $m4is_exnb ) ) { $m4is_pc9k = self::$m4is_j_xo4w->affRunningTotals( $m4is_exnb );
 if (! empty($m4is_pc9k) && is_array($m4is_pc9k)) {  foreach($m4is_pc9k as $m4is_yp16x) { if (is_array($m4is_yp16x)) {  $m4is_tovizk = "INSERT INTO %i (`id`, `appname`, `amount_earned`, `payments`, `clawbacks`, `running_balance`) ";
 $m4is_tovizk .= "VALUES ( %f, %s, %f, %f, %f, %f ) ";
 $m4is_tovizk .= "ON DUPLICATE KEY UPDATE `id` = %f, `appname` = %s, `amount_earned` = %f, `payments` = %f, `clawbacks` = %f, `running_balance` = %f;";
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::m4is_umj7a(), $m4is_yp16x['AffiliateId'], self::$m4is_zq0k, $m4is_yp16x['AmountEarned'], $m4is_yp16x['Payments'], $m4is_yp16x['Clawbacks'], $m4is_yp16x['RunningBalance'], $m4is_yp16x['AffiliateId'], self::$m4is_zq0k, $m4is_yp16x['AmountEarned'], $m4is_yp16x['Payments'], $m4is_yp16x['Clawbacks'], $m4is_yp16x['RunningBalance'] );
  $wpdb->query($m4is_tovizk);
 } } }  $m4is_couz++;
 } } while ( count( $m4is_exnb ) == $m4is_a0pejg );
  set_transient( $m4is_s2ge5, time(), 3600 );
 }  static 
function m4is_ewdv( array $m4is__b5x37, array $m4is_zkgo = [] ) { global $wpdb;
 if ( empty( $m4is__b5x37['Id'] ) ) { return [];
 }  $m4is_dj_2 = 'Affiliate';
 $m4is_tcw1l = self::$m4is_jcbk3;
 $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
  $m4is__b5x37 = self::$m4is_bnd6ti->m4is_mgdfhw( $m4is__b5x37 );
  $m4is_pa8jw = (int) $m4is__b5x37['Id'];
 $m4is__b5x37['!LastUpdated'] = time();
  $m4is_zkgo = empty( $m4is_zkgo ) ? self::m4is_voyrjl( $m4is_pa8jw ) : $m4is_zkgo;
  $m4is_yuh63x = self::$m4is_bnd6ti->m4is_br18( $m4is_zkgo, $m4is__b5x37 );
 $m4is_yvqu = self::$m4is_bnd6ti->m4is_bp1omz( $m4is_zkgo, $m4is__b5x37 );
 $m4is_yigaf = self::$m4is_bnd6ti->m4is_eod7l( $m4is_zkgo, $m4is__b5x37 );
 $m4is_olyhm2 = self::$m4is_bnd6ti->m4is_wb_v( $m4is_yuh63x, $m4is_yigaf );
  self::m4is_few8k( $m4is_pa8jw, $m4is_yigaf );
  if (! empty( $m4is_yuh63x ) ) { foreach ( $m4is_yuh63x as $m4is_s2ge5 => $m4is_w_o7al ) {  $m4is_tovizk = "UPDATE `" . self::$m4is_jcbk3 . "` SET `value` = %s WHERE `id` = %d AND `fieldname` = %s AND `appname` = %s";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_w_o7al, $m4is_pa8jw, $m4is_s2ge5, self::$m4is_zq0k );
  $wpdb->query( $m4is_tovizk );
 } }  if ( ! empty( $m4is_yvqu ) ) { $m4is_vnhq = [];
 foreach ( $m4is_yvqu as $m4is_s2ge5 => $m4is_w_o7al ) {  $m4is_vnhq[] = $wpdb->prepare( ' (%d, %s, %s, %s) ', $m4is_pa8jw, self::$m4is_zq0k, $m4is_s2ge5, $m4is_w_o7al );
 } if ( ! empty( $m4is_vnhq ) ) {  $m4is_tovizk = "INSERT INTO `" . self::$m4is_jcbk3 . "` (`id`, `appname`, `fieldname`, `value`) VALUES " . implode( ',', $m4is_vnhq );
  $wpdb->query( $m4is_tovizk );
 } }   return $m4is__b5x37;
 }  static 
function m4is_jy91_c() { global $wpdb;
  $m4is_y_38pw = 1000;
  $m4is_dj_2 = 'Affiliate';
  $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, true );
  $m4is_ipjfmo = 'memberium/batchsync/affiliates/page';
  $m4is_hxgi = 'memberium/batchsync/affiliates/timestamp';
  $m4is_zq0k = self::$m4is_zq0k;
  $m4is_jo8fb = ['Id' => '%'];
  $m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
  $m4is_couz = 0;
  $m4is_flx71n = [];
  do {  $m4is_b572w = $m4is_j_xo4w->dsQueryOrderBy( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 $m4is_yer1mp = count($m4is_b572w);
 if ( is_array( $m4is_b572w ) ) {  foreach($m4is_b572w as $m4is_ereh) { $m4is__g2oev[$m4is_ereh['Id']] = $m4is_ereh;
 } unset($m4is_b572w);
  $m4is_exnb = [];
 foreach($m4is__g2oev as $m4is__b5x37) { $m4is_exnb[] = $m4is__b5x37['Id'];
 }  $m4is_ore2 = implode(',', $m4is_exnb);
 $m4is_tovizk = "SELECT `id`, `fieldname`, `value` FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = '{$m4is_zq0k}' AND `id` IN ({$m4is_ore2}) AND `fieldname` <> '!LastUpdated';";
 $m4is_b572w = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_wyzl = [];
  if (is_array($m4is_b572w)) { foreach($m4is_b572w as $m4is_s2ge5 => $m4is_ereh) { $m4is_wyzl[$m4is_ereh['id']][$m4is_ereh['fieldname']] = $m4is_ereh['value'];
 } } unset($m4is_b572w);
  foreach( $m4is__g2oev as $m4is_j5sy07 => $m4is__b5x37 ) { if ( ! array_key_exists( $m4is_j5sy07, $m4is_wyzl ) ) { self::m4is_ewdv( $m4is__b5x37 );
 unset( $m4is__g2oev[$m4is_j5sy07] );
 } }  $m4is_azd3yf = [];
 $m4is_vnhq = [];
 $m4is_x_rxou = [];
 $m4is_n260nx = time();
  foreach($m4is__g2oev as $m4is_j5sy07 => $m4is__b5x37) { $m4is_eiqm8 = array_diff($m4is__b5x37, $m4is_wyzl[$m4is_j5sy07]);
 if (! empty($m4is_eiqm8)) { $m4is_azd3yf[$m4is_j5sy07] = $m4is_eiqm8;
 $m4is_x_rxou[] = $m4is_j5sy07;
 } }  foreach($m4is_azd3yf as $m4is_j5sy07 => $m4is_ke_fr) { $m4is_yxwn = key($m4is_ke_fr);
 $m4is_w_o7al = $m4is_ke_fr[$m4is_yxwn];
 $m4is_vnhq[] = $wpdb->prepare('(%d, %s, %s, %s)', $m4is_j5sy07, $m4is_zq0k, $m4is_yxwn, $m4is_w_o7al);
 }  foreach($m4is_x_rxou as $m4is_j5sy07) { $m4is_vnhq[] = $wpdb->prepare('(%d, %s, %s, %s)', $m4is_j5sy07, $m4is_zq0k, '!LastUpdated', $m4is_n260nx);
 }  if (! empty($m4is_vnhq)) { $m4is_tovizk = "INSERT INTO `" . self::$m4is_jcbk3 . "` (`id`, `appname`, `fieldname`, `value`) VALUES " . implode( ',', $m4is_vnhq ) . " ON DUPLICATE KEY UPDATE `id`=VALUES(`id`), `appname`=VALUES(`appname`), `fieldname`=VALUES(`fieldname`), `value`=VALUES(`value`);";
 $wpdb->query($m4is_tovizk);
 }  $m4is_couz++;
 }  usleep( 250000 );
 } while ($m4is_yer1mp == $m4is_y_38pw);
  }  static 
function m4is_lx94( int $m4is_j5sy07 ) : array { global $wpdb;
   $m4is_tovizk = "SELECT `fieldname`, `value` FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = %s AND `id` = %d ";
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k, $m4is_j5sy07 );
  $m4is__g2oev = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
  if ( empty( $m4is__g2oev ) ) {  $m4is__b5x37 = self::m4is_zobgs( $m4is_j5sy07 );
  $m4is__b5x37['!source'] = 'Remote';
 } else {  $m4is__b5x37 = [];
  foreach ( $m4is__g2oev as $m4is_ke_fr ) {  $m4is__b5x37[$m4is_ke_fr['fieldname']] = $m4is_ke_fr['value'];
 }  $m4is__b5x37['!source'] = 'Local';
 }  return $m4is__b5x37;
 }  static 
function m4is_voyrjl( int $m4is_pa8jw ) : array {  global $wpdb;
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
  $m4is_tovizk = "SELECT `fieldname`, `value` FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = %s AND `id` = %d ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_zq0k, $m4is_pa8jw );
  $m4is__g2oev = (array) $wpdb->get_results( $m4is_tovizk, ARRAY_A );
  if ( ! empty( $m4is__g2oev ) ) { $m4is__g2oev = self::$m4is_bnd6ti->m4is_da9or( $m4is__g2oev, 'fieldname', 'value' );
 $m4is__g2oev['!source'] = 'Local';
 }  return $m4is__g2oev;
 }  static 
function m4is_ekft( int $m4is_e2kg ) : array {  global $wpdb;
  $m4is_tcw1l = self::$m4is_jcbk3;
 $m4is_zq0k = self::$m4is_zq0k;
  $m4is_tovizk = <<<SQLBLOCK
			SELECT
				`{$m4is_tcw1l}_2`.`fieldname`,
				`{$m4is_tcw1l}_2`.`value`
			FROM
				`{$m4is_tcw1l}`,
				`{$m4is_tcw1l}` AS `{$m4is_tcw1l}_2`
			WHERE   `{$m4is_tcw1l}`.`appname`  = %s
			AND     `{$m4is_tcw1l}`.`fieldname` = 'ContactId'
			AND     `{$m4is_tcw1l}`.`value`     = %d
			AND     `{$m4is_tcw1l}_2`.`id`      = {$m4is_tcw1l}.id
			AND     `{$m4is_tcw1l}_2`.`appname` = %s;
		SQLBLOCK;
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k, $m4is_e2kg, self::$m4is_zq0k );
  $m4is__b5x37 = $wpdb->get_results( $m4is_tovizk, ARRAY_N );
  $m4is__b5x37 = self::$m4is_bnd6ti->m4is_da9or( $m4is__b5x37, 0, 1 );
  $m4is__b5x37 = apply_filters('memberium/affiliate/load', $m4is__b5x37 );
  return $m4is__b5x37;
 }  static 
function m4is_wtngi7( int $m4is_e2kg ) : array {  $m4is_y_38pw = 1;
  $m4is_dj_2 = 'Affiliate';
  $m4is_couz = 0;
  $m4is_jo8fb = [ 'ContactId' => $m4is_e2kg ];
  $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, true );
  $m4is__b5x37 = m4is_ho3l::m4is_mlhu4( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
  if (! is_array( $m4is__b5x37 ) ) {  }  $m4is__b5x37 = isset( $m4is__b5x37[0] ) ? $m4is__b5x37[0] : [];
  $m4is__b5x37 = is_array( $m4is__b5x37 ) ? self::$m4is_bnd6ti->m4is_mgdfhw( $m4is__b5x37 ) : $m4is__b5x37;
  return $m4is__b5x37;
 }  static 
function m4is_n0fas( int $m4is_pa8jw ) : array {  $m4is__b5x37 = m4is_ho3l::m4is_kjosf7( 'Affiliate', $m4is_pa8jw );
  return $m4is__b5x37;
 }  static 
function m4is_njl4( int $m4is_pa8jw ) {  global $wpdb;
   $m4is_tovizk = "DELETE FROM `" . self::$m4is_jcbk3 . "` WHERE `id` = %d AND `appname` = %s ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_pa8jw, self::$m4is_zq0k );
  $wpdb->query( $m4is_tovizk );
 }  private static 
function m4is_few8k( int $m4is_pa8jw, array $m4is_w_8g ) {  if ( count( $m4is_w_8g ) ) {  global $wpdb;
  $m4is_loua9v = implode( "','", $m4is_w_8g );
  $m4is_tovizk = "DELETE FROM `". self::$m4is_jcbk3 . "` WHERE `id` = %d AND `appname` = %s AND `fieldname` IN ( '{$m4is_loua9v}' )";
  $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_pa8jw, self::$m4is_zq0k );
  $wpdb->query( $m4is_tovizk );
 } }  static 
function m4is_zobgs( int $m4is_pa8jw ) : array {  $m4is_jv9xhf = 'Affiliate';
  $m4is__b5x37 = m4is_ho3l::m4is_kjosf7( $m4is_jv9xhf, $m4is_pa8jw );
  if ( is_array( $m4is__b5x37 ) && ! empty( $m4is__b5x37 ) ) {  self::m4is_ewdv( $m4is__b5x37 );
  return $m4is__b5x37;
 }  elseif ( m4is_ho3l::m4is_cpacu( $m4is__b5x37 ) ) {  self::m4is_njl4( $m4is_pa8jw );
 }  else {  error_log('Memberium Error:  Affiliate #' . $m4is_pa8jw . ' - ' . $m4is__b5x37);
 }  return [];
 }  static 
function m4is_qha7( int $m4is_e2kg ) : array {  $m4is__b5x37 = self::m4is_wtngi7( $m4is_e2kg );
  if ( is_array( $m4is__b5x37 ) && ! empty( $m4is__b5x37 ) ) {  self::m4is_ewdv( $m4is__b5x37 );
  return $m4is__b5x37;
 }  elseif ( m4is_ho3l::m4is_cpacu( $m4is__b5x37 ) ) {   error_log( sprintf( 'Memberium Error:  Affiliate # %d - %s deleted.', $m4is_pa8jw, $m4is__b5x37 ) );
 }  else {  error_log( sprintf( 'Memberium Error:  Affiliate # %d - %s', $m4is_pa8jw, $m4is__b5x37 ) );
 }  return [];
 }  static 
function m4is_t_48w( int $m4is_pa8jw, int $m4is_eeaiqk = -1 ) : bool { global $wpdb;
  $m4is_eeaiqk = $m4is_eeaiqk < 10 ? self::m4is_w7itrl() : 10;
  $m4is_wn5b = true;
  $m4is_tovizk = "SELECT `value` as `age` FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = %s AND `id` = %d AND `fieldname` = '!LastUpdated' ";
  $m4is_jt0xp = (int) $wpdb->get_var( $m4is_tovizk, self::$m4is_zq0k, $m4is_pa8jw );
  return ( $m4is_jt0xp + $m4is_eeaiqk ) > time();
 }  static 
function m4is_rbugf( int $m4is_e2kg ) : int { global $wpdb;
  static $m4is_bgvjl;
   if ( isset( $m4is_bgvjl[$m4is_e2kg] ) ) { return $m4is_bgvjl[$m4is_e2kg];
 }  if ( isset( $_SESSION['keap']['contact']['id'] ) && $_SESSION['keap']['contact']['id'] == $m4is_e2kg && ! empty( isset( $_SESSION['keap']['affiliate']['id'] ) ) ) { $m4is_bgvjl[$m4is_e2kg] = $_SESSION['keap']['affiliate']['id'];
 return $_SESSION['keap']['affiliate']['id'];
 }  $m4is_tcw1l = self::m4is_f5buj();
 $m4is_tovizk = "SELECT `id` FROM `" . self::$m4is_jcbk3 . "` WHERE `appname` = %s AND `fieldname` = 'ContactId' AND `value` = '%d'";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k, $m4is_e2kg );
  $m4is_oa_z = (int) $wpdb->get_var( $m4is_tovizk );
  if (! empty( $m4is_oa_z ) ) { $m4is_bgvjl[$m4is_e2kg] = $m4is_oa_z;
 }  if ( empty( $m4is_oa_z )) { error_log( sprintf( "No affiliate ID found for contact ID: %d", $m4is_e2kg ) );
 }  return $m4is_oa_z;
 }     static 
function m4is_unosgi() { $m4is_cgxdnf = 'ignore_affiliate_fields';
 $m4is_u23rl = 'Affiliate';
 $m4is_sacn = m4is_ho3l::m4is_kjedy2( $m4is_u23rl, false );
 $m4is_wrnxfy = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', $m4is_cgxdnf, '' );
 $m4is_wrnxfy = is_string( $m4is_wrnxfy ) ? $m4is_wrnxfy : '';
 $m4is_wrnxfy = array_filter( explode( ',', $m4is_wrnxfy ) );
 $m4is_wrnxfy = array_intersect( $m4is_sacn, $m4is_wrnxfy );
 $m4is_wrnxfy = implode( ',', $m4is_wrnxfy );
 self::$m4is_bnd6ti->m4is_qdi_3o( $m4is_wrnxfy, 'settings', $m4is_cgxdnf );
 }  }

