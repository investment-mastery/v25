<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_akcfiz::m4is_x6wv();
 final 
class m4is_akcfiz { private static $m4is_bnd6ti, $m4is_zq0k, $m4is_j_xo4w ;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 }  static 
function m4is_on_q( int $m4is_e2kg ) { return sprintf( 'memberium/creditcards/%s/%d', self::$m4is_zq0k, $m4is_e2kg );
 }  static 
function m4is_e8p0( int $m4is_e2kg ) : bool { if ( $m4is_e2kg ) { $m4is_wvr4fa = self::m4is_on_q( $m4is_e2kg );
 delete_transient( $m4is_wvr4fa );
 return true;
 } return false;
 }  static 
function m4is_l9v0jb( array $m4is_i3aq ) { return end( $m4is_i3aq );
 }  static 
function m4is_o63sh_( int $m4is_qjai ) : string { $m4is_hfxyia = [ 0 => 'Unknown',  1 => 'Error',  2 => 'Deleted',  3 => 'OK',  4 => 'Inactive',  ];
 return key_exists( $m4is_qjai, $m4is_hfxyia ) ? $m4is_hfxyia[$m4is_qjai] : 'Unknown';
 }  static 
function m4is_ms5b( int $m4is_e2kg, int $m4is_zg8z = 3) : array { $m4is_i3aq = [];
 if ( $m4is_e2kg > 0 ) { $m4is_wvr4fa = self::m4is_on_q( $m4is_e2kg );
 $m4is_i3aq = get_transient( $m4is_wvr4fa );
 $m4is_a6m52i = m4is_wbc8os::m4is_jjgo();
 if ( $m4is_i3aq === false ) { $m4is_i3aq = self::m4is__7phr_( $m4is_e2kg );
 } if ( $m4is_zg8z >= 0 ) { foreach( $m4is_i3aq as $m4is_s2ge5 => $m4is_l2waj ) { $m4is_ur3c8y = (int) $m4is_l2waj['Status'];
 if ( $m4is_ur3c8y <> $m4is_zg8z ) { unset( $m4is_i3aq[$m4is_s2ge5] );
 } } } if ( $m4is_e2kg === $m4is_a6m52i ) { $_SESSION['memb_user']['has_credit_card'] = is_array( $m4is_i3aq ) ? count( $m4is_i3aq ) : 0;
 } } return $m4is_i3aq;
 }  static 
function m4is__7phr_( int $m4is_e2kg ) { $m4is_wvr4fa = self::m4is_on_q( $m4is_e2kg );
 $m4is_x65bn_ = 300;
 $m4is_i3aq = get_transient( $m4is_wvr4fa );
 if ( $m4is_i3aq === false ) { $m4is_i3aq = [];
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_iiq6_ = 0;
 $m4is_dj_2 = 'CreditCard';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, false );
 $m4is_jo8fb = [ 'ContactId' => $m4is_e2kg,  ];
 do { $m4is_hpn9y = self::$m4is_j_xo4w->dsQueryOrderBy( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 if ( is_array( $m4is_hpn9y ) ) { foreach ( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_i3aq[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count( $m4is_hpn9y );
 } } while ( count( $m4is_hpn9y ) == $m4is_y_38pw );
 if ( is_array( $m4is_i3aq ) ) { set_transient( $m4is_wvr4fa, $m4is_i3aq, $m4is_x65bn_ );
 } } if ( m4is_wbc8os::m4is_jjgo() === $m4is_e2kg ) { $_SESSION['memb_user']['has_credit_card'] = is_array( $m4is_i3aq ) ? count( $m4is_i3aq ) : 0;
 } return $m4is_i3aq;
 } }

