<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_untczd::m4is_x6wv();
 final 
class m4is_untczd { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_uq9dr;
 private static $m4is_j_xo4w;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_uq9dr = MEMBERIUM_DB_PRODUCTS;
 }    static 
function m4is_g8mcp3() : string { return MEMBERIUM_DB_INVOICES;
 } static 
function m4is_d7vp() : string { return MEMBERIUM_DB_PRODUCTS;
 } static 
function m4is_vdhvp8() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_g8mcp3();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL, \n" . "appname varchar(32), \n" . "affiliateid int(11) NOT NULL, \n" . "contactid int(11) NOT NULL, \n" . "creditstatus int(11) NOT NULL, \n" . "datecreated datetime NOT NULL, \n" . "description varchar(255) NOT NULL, \n" . "invoicetotal double NOT NULL, \n" . "invoicetype varchar(32) NOT NULL, \n" . "jobid int(11) NOT NULL, \n" . "lastupdated datetime NOT NULL, \n" . "leadaffiliateid int(11) NOT NULL, \n" . "payplanstatus int(11) NOT NULL, \n" . "paystatus int(11) NOT NULL, \n" . "productsold varchar(255) NOT NULL, \n" . "promocode varchar(32) NOT NULL, \n" . "refundstatus int(11) NOT NULL, \n" . "totaldue double NOT NULL, \n" . "totalpaid double NOT NULL, \n" . "KEY job_id (jobid), \n" . "KEY contactid (contactid), \n" . "KEY affiliateid (affiliateid), \n" . "KEY datecreated (datecreated), \n" . "PRIMARY KEY  (id,appname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } static 
function m4is_eim7n_() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_d7vp();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL, \n" . "appname varchar(32) NOT NULL, \n" . "fieldname varchar(64) NOT NULL default '', \n" . "value longtext, \n" . "KEY id (id), \n" . "PRIMARY KEY  (id,appname,fieldname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     private static 
function m4is_cusnyo( int $m4is_c4lk ) : string { return sprintf( 'memberium/%s/payplans/%d', self::$m4is_zq0k, $m4is_c4lk );
 }  private static 
function m4is_n5vo( int $m4is_ycbge ) : string { return sprintf( 'memberium/%s/payplanitems/%d', self::$m4is_zq0k, $m4is_ycbge );
 }  static 
function m4is__gco6n( int $m4is_c4lk ) { $m4is_qxak = false;
 $m4is_eeaiqk = 1800;
 if ($m4is_c4lk) { $m4is_wvr4fa = self::m4is_cusnyo( $m4is_c4lk );
 $m4is_qxak = get_transient( $m4is_wvr4fa );
 if ( $m4is_qxak === false ) { $m4is_dj_2 = 'PayPlan';
 $m4is_jo8fb = [ 'InvoiceId' => $m4is_c4lk ];
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2 );
 $m4is_qxak = m4is_ho3l::m4is_mg4uyc( $m4is_dj_2, 1, 0, $m4is_jo8fb, $m4is__u5v );
 } if ( is_array( $m4is_qxak ) && ! empty( $m4is_qxak ) ) { set_transient( $m4is_wvr4fa, $m4is_qxak[0], $m4is_eeaiqk );
 $m4is_qxak = $m4is_qxak[0];
 } } return $m4is_qxak;
 }     static 
function m4is_snbx( int $m4is_ycbge ) { $m4is_vau8 = false;
 if ($m4is_ycbge) { $m4is_wvr4fa = self::m4is_n5vo( $m4is_ycbge );
 $m4is_vau8 = get_transient( $m4is_wvr4fa );
 if ($m4is_vau8 === false) { $m4is_dj_2 = 'PayPlanItem';
 $m4is_jo8fb = [ 'PayPlanId' => $m4is_ycbge ];
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2 );
 $m4is_vau8 = m4is_ho3l::m4is_mlhu4( $m4is_dj_2, 1000, 0, $m4is_jo8fb, $m4is__u5v, 'DateDue', true );
 if ( is_array( $m4is_vau8 ) && count( $m4is_vau8 ) > 0 ) { set_transient( $m4is_wvr4fa, $m4is_vau8, 1800 );
 } } } return $m4is_vau8;
 }     private static 
function m4is_hjpzca( array $m4is_z8sd ) { global $wpdb;
 $m4is_dj_2 = MEMBERIUM_DB_PRODUCTS;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2( 'product' );
 $m4is_wrnxfy = [];
 $m4is_x_rxou = [];
 $m4is_vnhq = [];
 $m4is_flx71n = [];
 foreach($m4is_z8sd as $m4is_si73) { $m4is_x_rxou[] = $m4is_si73['Id'];
 } if (! empty($m4is_x_rxou)) { $m4is_p1hqu = implode(',', $m4is_x_rxou);
 $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `id` NOT IN ({$m4is_p1hqu})";
 $wpdb->query($m4is_tovizk);
 } foreach($m4is_z8sd as $m4is_j5sy07 => $m4is_si73) { $m4is_xcj1 = self::m4is_b6wt( (int) $m4is_si73['Id']);
  foreach($m4is_xcj1 as $m4is_yxwn => $m4is_w_o7al) { if (! array_key_exists($m4is_yxwn, $m4is_si73) ) { $m4is_tovizk = "DELETE FROM `{$m4is_dj_2}` WHERE `appname` = '{$m4is_zq0k}' AND `id` = {$m4is_si73['Id']} AND `fieldname` = '{$m4is_yxwn}' ";
 $wpdb->query($m4is_tovizk);
 } }  foreach($m4is_si73 as $m4is_c5zg => $m4is_g0wy) { if (! in_array($m4is_c5zg, $m4is_wrnxfy) ) { if ( (! isset($m4is_xcj1[$m4is_c5zg]) || ($m4is_xcj1[$m4is_c5zg] <> $m4is_g0wy) ) ) { $m4is_vnhq[] = $wpdb->prepare('(%d, %s, %s, %s)', $m4is_j5sy07, $m4is_zq0k, $m4is_c5zg, $m4is_g0wy);
 $m4is_flx71n[] .= $wpdb->prepare("%s", $m4is_c5zg);
 } } } if (! empty($m4is_vnhq) ) { $m4is_tovizk = "INSERT INTO {$m4is_dj_2} (id, appname, fieldname, value) VALUES " . implode(',', $m4is_vnhq) . " ON DUPLICATE KEY UPDATE id=VALUES(id), appname=VALUES(appname), fieldname=VALUES(fieldname), value=VALUES(value);";
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 } } }  static 
function m4is__a4j() : int { global $wpdb;
 $m4is_tovizk = "SELECT count(DISTINCT `id`) FROM %i WHERE `appname` = %s";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_uq9dr, self::$m4is_zq0k );
 return (int) $wpdb->get_var($m4is_tovizk);
 } static 
function m4is_ky94f() { global $wpdb;
 $m4is_lkcr2 = 3 * HOUR_IN_SECONDS;
 $m4is_dcjt_3 = get_option( 'memberium_tables_updated', [] );
 $m4is_y_38pw = defined( 'MEMBERIUM_PRODUCT_LIMIT') ? constant( 'MEMBERIUM_PRODUCT_LIMIT' ) : 1000;
 $m4is_dj_2 = 'Product';
 $m4is_couz = 0;
 $m4is_oxei6v = 'Id';
 $m4is_wqzi = '%';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, false, ['LargeImage']);
 $m4is_iiq6_ = 0;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_wvr4fa = "Memberium_{$m4is_zq0k}_Product";
 $m4is_jo8fb = ['Id' => $m4is_wqzi];
 $m4is_z8sd = [];
 $m4is_j_xo4w = self::$m4is_j_xo4w;
 $m4is_q_ob6 = 'all';
 $m4is__dypz = 'memberium2/products';
 do { $m4is_hpn9y = $m4is_j_xo4w->dsQuery( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v );
 if ( ! is_array( $m4is_hpn9y ) ) { error_log( sprintf( 'Memberium Product Sync API Error:  Limit = %d,  Error = "%s"', $m4is_y_38pw, $m4is_hpn9y ) );
 return;
 } $m4is_couz++;
 if ( is_array($m4is_hpn9y) ) { foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_z8sd[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 } } } while ( is_array( $m4is_hpn9y ) && count( $m4is_hpn9y ) == $m4is_y_38pw );
 unset($m4is_hpn9y, $m4is_ke_fr);
 if (is_array($m4is_z8sd) ) { set_transient($m4is_wvr4fa, $m4is_z8sd, $m4is_lkcr2);
 set_transient('memberium_products_updated', time() );
 self::m4is_hjpzca($m4is_z8sd);
 } else { $m4is_z8sd = false;
 } $m4is_dcjt_3['products'] = time();
 update_option('memberium_tables_updated', $m4is_dcjt_3, false);
 return $m4is_z8sd;
 } static 
function m4is_b6wt( int $m4is_xbjma ) { global $wpdb;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_dj_2 = MEMBERIUM_DB_PRODUCTS;
 $m4is_si73 = [];
 $m4is_tovizk = "SELECT `fieldname`, `value` FROM `{$m4is_dj_2}` WHERE `appname` = '{$m4is_zq0k}' AND `id` = {$m4is_xbjma}";
 $m4is_xm2h = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 if (is_array($m4is_xm2h)) { foreach($m4is_xm2h as $m4is_oa_z) { $m4is_si73[$m4is_oa_z['fieldname']] = $m4is_oa_z['value'];
 } } return $m4is_si73;
 } static 
function m4is_l1tycu() { global $wpdb;
 $m4is_tovizk = "SELECT `id`, `fieldname`, `value` FROM %i WHERE `appname` = %s";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_uq9dr, self::$m4is_zq0k );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_z8sd = [];
 foreach($m4is_hpn9y as $m4is_ke_fr) { $m4is_z8sd[$m4is_ke_fr['id']][$m4is_ke_fr['fieldname']] = $m4is_ke_fr['value'];
 } return $m4is_z8sd;
 }  static 
function m4is_ut153j( int $m4is_j5sy07, bool $m4is_qfxo = false ) { global $wpdb;
 $m4is_q_ob6 = $m4is_j5sy07;
 $m4is__dypz = 'memberium2/product';
 $m4is_lkcr2 = 900;
 $m4is_uwdfj = false;
 $m4is_si73 = wp_cache_get( $m4is_q_ob6, $m4is__dypz, false, $m4is_uwdfj );
 if ( $m4is_uwdfj === false ) { $m4is_dj_2 = MEMBERIUM_DB_PRODUCTS;
 $m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr('appname');
 $m4is_tovizk = "SELECT `fieldname`, `value` FROM `{$m4is_dj_2}` WHERE `appname` = '{$m4is_zq0k}' AND `id` = {$m4is_j5sy07}";
 $m4is_hpn9y = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_si73 = [];
 if (is_array($m4is_hpn9y)) { foreach($m4is_hpn9y as $m4is_ke_fr) { $m4is_yxwn = $m4is_qfxo ? strtolower($m4is_ke_fr['fieldname']) : $m4is_ke_fr['fieldname'];
 $m4is_si73[$m4is_yxwn] = $m4is_ke_fr['value'];
 } } if (! empty($m4is_si73)) { wp_cache_set($m4is_q_ob6, $m4is_si73, $m4is__dypz, $m4is_lkcr2);
 } } return $m4is_si73;
 }  static 
function m4is_j68se( $m4is_qfxo = false ) { global $wpdb;
 $m4is_q_ob6 = 'all';
 $m4is__dypz = 'memberium2/products';
 $m4is_lkcr2 = 900;
 $m4is_uwdfj = false;
 $m4is_z8sd = wp_cache_get( $m4is_q_ob6, $m4is__dypz, false, $m4is_uwdfj );
 if ( $m4is_uwdfj === false ) { $m4is_dj_2 = MEMBERIUM_DB_PRODUCTS;
 $m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr( 'appname' );
 $m4is_tovizk = "SELECT `id`, `fieldname`, `value` FROM `{$m4is_dj_2}` WHERE `appname` = '{$m4is_zq0k}'";
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_z8sd = [];
 foreach( $m4is_hpn9y as $m4is_j5sy07 => $m4is_ke_fr ) { $m4is_yxwn = $m4is_qfxo ? strtolower( $m4is_ke_fr['fieldname'] ) : $m4is_ke_fr['fieldname'];
 $m4is_z8sd[$m4is_ke_fr['id']][$m4is_yxwn] = $m4is_ke_fr['value'];
 unset( $m4is_hpn9y[$m4is_j5sy07] );
 } if (! empty( $m4is_z8sd ) ) { wp_cache_set( $m4is_q_ob6, $m4is_z8sd, $m4is__dypz, $m4is_lkcr2 );
 } } return $m4is_z8sd;
 }    private static 
function m4is_blet() : string { return 'memberium/ecommerce/subscriptionplans';
 }  static 
function m4is_k896() { $m4is_wvr4fa = self::m4is_blet();
 $m4is_x65bn_ = DAY_IN_SECONDS;
 $m4is_jt5l9 = get_transient( $m4is_wvr4fa );
 if ( $m4is_jt5l9 === false ) { $m4is_dj_2 = 'SubscriptionPlan';
 $m4is_a0pejg = 1000;
 $m4is_couz = 0;
 $m4is_jt5l9 = [];
 $m4is_jo8fb = [ 'Id' => '%' ];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mg4uyc( $m4is_dj_2, $m4is_a0pejg, $m4is_couz, $m4is_jo8fb );
 $m4is_upc42j = is_array( $m4is_hpn9y ) ? count( $m4is_hpn9y ) : 0;
 $m4is_couz = $m4is_couz + 1;
 if ( $m4is_upc42j ) { foreach ( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_j5sy07 = $m4is_ke_fr['Id'];
 $m4is_pc05 = (int) $m4is_ke_fr['Cycle'];
 $m4is_q6jh = (int) $m4is_ke_fr['Frequency'];
 $m4is_jt5l9[$m4is_j5sy07] = $m4is_ke_fr;
 if ( $m4is_pc05 == 6 ) { $m4is_jt5l9[$m4is_j5sy07]['FrequencyWord'] = ( $m4is_q6jh == 1 ) ? 'Day' : $m4is_q6jh . ' Days';
 } elseif ( $m4is_pc05 == 3 ) { $m4is_jt5l9[$m4is_j5sy07]['FrequencyWord'] = ( $m4is_q6jh == 1 ) ? 'Week' : $m4is_q6jh . ' Weeks';
 } elseif ( $m4is_pc05 == 2 ) { $m4is_jt5l9[$m4is_j5sy07]['FrequencyWord'] = ( $m4is_q6jh == 1 ) ? 'Month' : $m4is_q6jh . ' Months';
 } elseif ( $m4is_pc05 == 1 ) { $m4is_jt5l9[$m4is_j5sy07]['FrequencyWord'] = ( $m4is_q6jh == 1 ) ? 'Year' : $m4is_q6jh . ' Years';
 } } } } while ( $m4is_upc42j === $m4is_a0pejg );
 if ( is_array( $m4is_jt5l9 ) ) { set_transient('memberium_subscriptionplans', $m4is_jt5l9, $m4is_x65bn_);
 } } return $m4is_jt5l9;
 }     static 
function m4is_ypsh6m() { global $wpdb;
 $m4is_z75a = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_ecommerce', false );
 $m4is__sot = get_option('memberium_tables_updated', [] );
 $m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr('appname');
 $m4is_bsy5 = MEMBERIUM_DB_INVOICES;
  $m4is_tovizk = "SELECT MAX(`lastupdated`) FROM `{$m4is_bsy5}` WHERE `appname` = '{$m4is_zq0k}';";
 $m4is_z5wiy = $wpdb->get_var($m4is_tovizk);
 if (! $m4is_z5wiy) { $m4is_z5wiy = '1969-01-20T00:00:00';
 }  $m4is_dj_2 = 'Invoice';
 $m4is_y_38pw = 400;
 $m4is_couz = 0;
 $m4is_iiq6_ = 0;
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_jo8fb = [ 'LastUpdated' => "~>=~ {$m4is_z5wiy}" ];
 $m4is_klh4 = [ 'CreditStatus' => 0, 'Description' => '', 'InvoiceTotal' => 0, 'InvoiceType' => '', 'JobId' => 0, 'LeadAffiliateId' => 0, 'PayPlanStatus' => 0, 'PayStatus' => 0, 'ProductSold' => '', 'PromoCode' => '', 'RefundStatus' => 0, 'Synced' => 0, 'TotalDue' => 0, 'TotalPaid' => 0, ];
 $m4is_paw2 = [ 'appname' => '%s', 'contactid' => '%d', 'creditstatus' => '%s', 'datecreated' => '%s', 'description' => '%s', 'id' => '%d', 'invoicetotal' => '%d', 'invoicetype' => '%s', 'jobid' => '%d', 'lastupdated' => '%s', 'leadaffiliateid' => '%s', 'payplanstatus' => '%s', 'paystatus' => '%s', 'productsold' => '%s', 'promocode' => '%s', 'refundstatus' => '%s', 'totaldue' => '%s', 'totalpaid' => '%s', ];
 $m4is_xj6_0 = '`' . implode('`, `', array_keys($m4is_paw2)) . '`';
 $m4is_rn3ip = "'" . implode("', '", $m4is_paw2) . "'";
 $m4is__xze = "INSERT INTO `{$m4is_bsy5}` ( {$m4is_xj6_0} ) VALUES ( {$m4is_rn3ip} )";
 do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'LastUpdated', true);
 $m4is_upc42j = is_array($m4is_hpn9y) ? count($m4is_hpn9y) : 0;
 if (is_array($m4is_hpn9y) && count($m4is_hpn9y) > 0) { foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_ke_fr = array_merge($m4is_klh4, $m4is_ke_fr);
 $m4is_j5sy07 = (int) $m4is_ke_fr['Id'];
 $m4is_slv3p = isset($m4is_ke_fr['LastUpdated']) ? $m4is_ke_fr['LastUpdated'] : $m4is_ke_fr['DateCreated'];
 $m4is_mf3o = [ 'appname' => $m4is_zq0k, 'contactid' => $m4is_ke_fr['ContactId'], 'creditstatus' => $m4is_ke_fr['CreditStatus'], 'datecreated' => date('Y-m-d h:i:s', strtotime($m4is_ke_fr['DateCreated']) ), 'description' => $m4is_ke_fr['Description'], 'id' => $m4is_j5sy07, 'invoicetotal' => $m4is_ke_fr['InvoiceTotal'], 'invoicetype' => $m4is_ke_fr['InvoiceType'], 'jobid' => $m4is_ke_fr['JobId'], 'lastupdated' => date('Y-m-d h:i:s', strtotime($m4is_slv3p) ), 'leadaffiliateid' => $m4is_ke_fr['LeadAffiliateId'], 'payplanstatus' => $m4is_ke_fr['PayPlanStatus'], 'paystatus' => $m4is_ke_fr['PayStatus'], 'productsold' => $m4is_ke_fr['ProductSold'], 'promocode' => isset($m4is_ke_fr['PromoCode']) ? $m4is_ke_fr['PromoCode'] : '', 'refundstatus' => $m4is_ke_fr['RefundStatus'], 'totaldue' => $m4is_ke_fr['TotalDue'], 'totalpaid' => $m4is_ke_fr['TotalPaid'], ];
 $wpdb->query("DELETE FROM `{$m4is_bsy5}` WHERE `appname` = '{$m4is_zq0k}' AND `id` = {$m4is_j5sy07};
");
 $wpdb->query($wpdb->prepare($m4is__xze, $m4is_mf3o) );
 } } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + $m4is_upc42j;
 } while (is_array($m4is_hpn9y) && $m4is_upc42j == $m4is_y_38pw);
 $m4is__sot['invoices'] = time();
 update_option('memberium_tables_updated', $m4is__sot, false);
 return $m4is_iiq6_;
 }     static 
function m4is_q2dtc(int $m4is_jwfnh) { if (! empty($m4is_jwfnh) ) { $m4is_jo8fb = [ 'OriginatingOrderId' => $m4is_jwfnh ];
 $m4is_w_8g = [ 'Id' ];
 $m4is_wb9f = m4is_ho3l::m4is_mg4uyc('RecurringOrder', 998, 0, $m4is_jo8fb, $m4is_w_8g);
  if (is_array($m4is_wb9f) ) { foreach($m4is_wb9f as $m4is__oep) { $m4is_oa_z = $app->dsDelete('RecurringOrder', (int) $m4is__oep['Id']);
 } } } }  static 
function m4is_lxmf() { $m4is_y_38pw = 999;
 $m4is_dj_2 = 'RecurringOrder';
 $m4is_couz = 0;
 $m4is_oxei6v = 'Id';
 $m4is_wqzi = '%';
 $m4is_iiq6_ = 0;
 $m4is_zq0k = self::$m4is_zq0k;
 $m4is_klcw4 = [];
 $m4is__u5v = [ 'ContactId', 'EndDate', 'Id', 'ReasonStopped', 'Status', ];
 $m4is_jo8fb = [ 'Status' => 'Active', 'EndDate' => '~<=~' . date('Y-m-d'), ];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mg4uyc($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v);
 if (! empty($m4is_hpn9y) ) { foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_ke_fr['EndDate'] = (isset($m4is_ke_fr['EndDate']) ) ? $m4is_ke_fr['EndDate'] : '';
 $m4is_ke_fr['ReasonStopped'] = (isset($m4is_ke_fr['ReasonStopped']) ) ? trim($m4is_ke_fr['ReasonStopped']) : '';
 if ($m4is_ke_fr['EndDate'] > '' && $m4is_ke_fr['EndDate'] < date('Ymd\T00:00:00') ) { $m4is_sevu = [];
 if ($m4is_ke_fr['ReasonStopped'] == '') { $m4is_sevu['ReasonStopped'] = "End Date Passed.\nAutoEnded by Memberium";
 } $m4is_sevu['EndDate'] = date('Ymd\Th:i:s');
 $m4is_sevu['Status'] = 'Inactive';
 m4is_ho3l::m4is_btu_('RecurringOrder', (int) $m4is_ke_fr['Id'], $m4is_sevu);
 } } } $m4is_couz++;
 } while (count($m4is_hpn9y) == $m4is_y_38pw);
 unset($m4is_hpn9y, $m4is_ke_fr);
 return $m4is_klcw4;
 } }

