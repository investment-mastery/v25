<?php
 class_exists( 'm4is_gk3xz' ) || die();
 final 
class m4is_e4e9x8 { private static $m4is_bnd6ti, $m4is_zq0k, $m4is_b8m9p2, $m4is_jl7j9;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { } static 
function m4is_bkl5() { self::$m4is_jl7j9 = date( 'Y-m-d' );
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 self::$m4is_b8m9p2 = m4is_gk3xz::m4is_e5l8a9();
 $m4is_toz0 = self::$m4is_b8m9p2->m4is_lxyv();
 foreach( $m4is_toz0 as $m4is_s2ge5 => $m4is_gvpi6 ) { $m4is_ga0d = [];
 if ( empty( $m4is_gvpi6['cache'] ) || ( $m4is_gvpi6['start_date'] <= self::$m4is_jl7j9 && $m4is_gvpi6['end_date'] >= self::$m4is_jl7j9 ) ) { $m4is_toz0[$m4is_s2ge5] = self::m4is_t49i3u( $m4is_gvpi6 );
 } } self::$m4is_b8m9p2->m4is__j5k( $m4is_toz0 );
 } static 
function m4is_a14f2() { global $wpdb;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_tovizk = 'SELECT `id` FROM `' . m4is_pk8phc::m4is_f5buj() . '` WHERE (`appname` = %s AND `fieldname` = "AffName" ) AND ( `value` LIKE "!%%" ) OR ( `value` LIKE "(INTERNAL)%%" );';
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k );
 $m4is__g2oev = $wpdb->get_col( $m4is_tovizk );
 return is_array($m4is__g2oev) ? $m4is__g2oev : [];
 } static 
function m4is_t49i3u( $m4is_gvpi6 ) { $m4is_ga0d = [];
 if ( $m4is_gvpi6['type'] == 'leads' ) { $m4is_ga0d = self::m4is_y794lp( $m4is_gvpi6 );
 } elseif ( in_array( $m4is_gvpi6['type'], ['dollars', 'invoices'] ) ) { $m4is_ga0d = self::m4is_sgjshf( $m4is_gvpi6 );
 } $m4is_gvpi6['cache'] = $m4is_ga0d;
 $m4is_gvpi6['last_updated'] = time();
 return $m4is_gvpi6;
 } static 
function m4is_y794lp( $m4is_gvpi6 ) { $m4is_fi8t2 = self::m4is_a14f2();
  $m4is_bq1s = date( 'Ymd\T23:59:59', strtotime( $m4is_gvpi6['end_date'] ) );
 $m4is_ga0d = [];
 $m4is_dj_2 = 'Referral';
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_iiq6_ = 0;
 $m4is__u5v = [ 'AffiliateId', 'ContactId', 'DateSet', ];
 $m4is_jo8fb = [ 'DateSet' => '~>=~ ' . $m4is_gvpi6['start_date'], ];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'DateSet', true );
 foreach( $m4is_hpn9y as $m4is_ke_fr ) { if ( $m4is_ke_fr['DateSet'] <= $m4is_bq1s ) { if ( ! in_array( $m4is_ke_fr['AffiliateId'], $m4is_fi8t2 ) ) { $m4is_ga0d[$m4is_ke_fr['AffiliateId']] = isset( $m4is_ga0d[$m4is_ke_fr['AffiliateId']] ) ? $m4is_ga0d[$m4is_ke_fr['AffiliateId']]++ : 1;
 } } } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count( $m4is_hpn9y );
 } while ( count( $m4is_hpn9y ) == $m4is_y_38pw);
 arsort( $m4is_ga0d );
 unset( $m4is_ga0d[0] );
 return array_slice( $m4is_ga0d, 0, $m4is_gvpi6['slots'], true );
 } static 
function m4is_sgjshf( $m4is_gvpi6 ) {  $m4is_fi8t2 = self::m4is_a14f2();
 $m4is_bq1s = date( 'Ymd\T23:59:59', strtotime( $m4is_gvpi6['end_date'] ) );
 $m4is_ga0d = [];
 $m4is_wn1fdr = [];
 $m4is_dj_2 = 'Invoice';
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_f2c86 = array_filter( explode( ',', $m4is_gvpi6['products'] ) );
 $m4is__u5v = [ 'AffiliateId', 'LeadAffiliateId', 'DateCreated', 'InvoiceTotal', 'ProductSold', ];
 $m4is_jo8fb = [ 'DateCreated' => '~>=~ ' . date( 'Ymd\This', strtotime( $m4is_gvpi6['start_date'] ) ), 'PayStatus' => 1, 'RefundStatus' => 0, ];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'DateCreated', true );
 foreach($m4is_hpn9y as $m4is_ke_fr) { $m4is_mrh2 = array_filter( explode( ',', $m4is_ke_fr['ProductSold'] ) );
 $m4is_pa8jw = (int) $m4is_ke_fr['AffiliateId'];
 $m4is_q6l9t = (int) $m4is_ke_fr['LeadAffiliateId'];
 $m4is_haon5 = (bool) ( $m4is_pa8jw > 0 || $m4is_q6l9t > 0 );
 $m4is_haon5 = $m4is_haon5 && ( $m4is_ke_fr['DateCreated'] < $m4is_bq1s );
 $m4is_haon5 = $m4is_haon5 && ( ! in_array( $m4is_pa8jw, $m4is_fi8t2 ) );
 if ( $m4is_haon5 && ! empty( $m4is_f2c86 ) ) { $m4is_g534q = array_intersect( $m4is_f2c86, $m4is_mrh2 );
 $m4is_haon5 = ! empty( $m4is_g534q );
 } if ( $m4is_haon5 ) { if ( $m4is_gvpi6['type'] == 'dollars' ) { $m4is_ga0d[$m4is_pa8jw] += (double) $m4is_ke_fr['InvoiceTotal'];
 } elseif ( $m4is_gvpi6['type'] == 'invoices' ) { $m4is_ga0d[$m4is_pa8jw]++;
 } } } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count( $m4is_hpn9y );
 } while ( count( $m4is_hpn9y ) == $m4is_y_38pw);
 unset( $m4is_ga0d[0], $m4is_wn1fdr[0] );
 arsort( $m4is_ga0d );
 return array_slice( $m4is_ga0d, 0, $m4is_gvpi6['slots'], true );
 } }

