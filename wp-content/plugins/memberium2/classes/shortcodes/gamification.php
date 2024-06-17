<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_pybv::m4is_x6wv();
 final 
class m4is_pybv { static private $m4is_e2kg;
 static private $m4is_o3m_c5;
 static 
function m4is_x6wv() { self::$m4is_e2kg = (int) self::$m4is_bnd6ti->m4is_dpuy9();
 self::$m4is_ig9p6 = (int) current_user_id();
 self::$m4is_o3m_c5 = ! m4is_u68pu::m4is_u6mkaw();
 }  static 
function m4is__fbeu( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'id' => 0,  'uid' => self::$m4is_ig9p6,  ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } if ( ! class_exists( 'BadgeOS' ) ) { return '';
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_qnjfv['id'] = (int) $m4is_qnjfv['id'];
 $m4is_flmv3z = (int) $m4is_qnjfv['id'];
 $m4is_ig9p6 = (int) trim( $m4is_qnjfv['uid'] );
 if ( ! $m4is_ig9p6 || ! $m4is_flmv3z ) { return '';
 } $m4is_qe_od = array_filter( explode( ',', get_user_meta( $m4is_ig9p6, 'memberium_achievement_uids', true) ) );
  if ( in_array( $m4is_flmv3z, $m4is_qe_od ) ) { return '';
 } badgeos_award_achievement_to_user( $m4is_flmv3z, $m4is_ig9p6 );
 $m4is_qe_od = array_filter( explode( ',', get_user_meta( $m4is_ig9p6, 'memberium_achievement_uids', true) ) );
 $m4is_qe_od[] = $m4is_flmv3z;
 $m4is_qe_od = array_unique( $m4is_cm_kch );
 sort( $m4is_qe_od );
 $m4is_qe_od = implode( ',', $m4is_qe_od );
 update_user_meta( $m4is_ig9p6, 'memberium_achievement_uids', $m4is_qe_od );
 return '';
 }  static 
function m4is_lbyfu1( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return 'n/a';
 } if (! class_exists('BadgeOS') ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 if ( ! is_user_logged_in() ) { return '';
 } $m4is_carw7y = '';
 $m4is_zjx_ = get_current_blog_id();
 $m4is_cx_zt = get_user_meta(get_current_user_id(), '_badgeos_achievements', true);
 if (empty($m4is_cx_zt) ) { return '';
 } $m4is_cx_zt = $m4is_cx_zt[$m4is_zjx_];
 $m4is_tomnt3 = [];
 if (is_array($m4is_cx_zt) ) { foreach ($m4is_cx_zt as $achievement) { @$m4is_tomnt3[$achievement->ID] = $achievement->ID;
 } } unset($m4is_cx_zt);
 $m4is_tomnt3 = array_flip($m4is_tomnt3);
 foreach ($m4is_tomnt3 as $m4is_f852) { $m4is_carw7y .= '[badgeos_achievement id=' . $m4is_f852 . ']';
 } $m4is_uzfw8j = do_shortcode($m4is_carw7y);
 return $m4is_uzfw8j;
 }  static 
function m4is_g_1f( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( ! class_exists( 'BadgeOS' ) ) { return '';
 } if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'id' => 0,  'uid' => self::$m4is_ig9p6,  ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_ig9p6 = (int) $m4is_qnjfv['uid'];
 $m4is_j5sy07 = (int) $m4is_qnjfv['id'];
 if ( ! $m4is_ig9p6 ) { return '';
 } if ( $m4is_j5sy07 ) { badgeos_revoke_achievement_from_user( $m4is_j5sy07 , $m4is_ig9p6 );
 if ( ! empty( $m4is_ig9p6 ) ) { $m4is_cm_kch = array_filter( explode( ',', get_user_meta( current_user_id(), 'memberium_achievement_uids', true ) ) );
 if ( ( $m4is_s2ge5 = array_search( $m4is_ig9p6, $m4is_cm_kch ) ) !== false ) { unset( $m4is_cm_kch[$m4is_s2ge5] );
 } $m4is_cm_kch = implode( ',', array_unique( $m4is_cm_kch ) );
 update_user_meta( current_user_id(), 'memberium_achievement_uids', $m4is_cm_kch );
 } } return '';
 } }

