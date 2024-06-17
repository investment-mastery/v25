<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_gm8cd { private $m4is_bnd6ti, $m4is_p9r_8e = [], $m4is_e2kg = 0, $m4is_yh5y = false, $m4is_fliw = '', $m4is_t6r3xw = [], $m4is_q8vgfd = 0, $m4is_c2ah = [], $m4is_pjkx2b = 0, $m4is_s54hod = [], $m4is_x0_hk = null, $m4is_ig9p6 = 0;
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = [] ) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw, array $m4is_c2ah ) { ini_set( 'display_errors', 1 );
 $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 m4is_aoxw::m4is_djr4nd();
 $this->m4is_gbqd0( $m4is_t6r3xw, $m4is_c2ah );
 $this->m4is_ynpw();
 $this->m4is_my9o();
 $this->m4is_hrd7();
 $this->m4is_dhpr();
 $this->m4is_kl2ewm();
 $this->m4is_ypsh6m();
 $this->m4is__7phr_();
 $this->m4is_bp2ra6();
 $this->m4is_akz3();
 } 
function __destruct() { $m4is_olnv = microtime( true ) - $this->m4is_pjkx2b;
 $m4is_wbgl5s = sprintf( "Completed Contact Update HTTP POST.  Processing time: %0.3f seconds\n", $m4is_olnv );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 $this->m4is_ydo2qh = array_filter( $this->m4is_ydo2qh );
 if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { echo $m4is_wbgl5s;
 } } private 
function m4is_gbqd0( array $m4is_t6r3xw, array $m4is_c2ah ) { $this->m4is_pjkx2b = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 } private 
function m4is_ynpw() { ksort( $this->m4is_c2ah );
 $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : $this->m4is_e2kg;
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['debug'], false ) : false;
 $this->m4is_fliw = isset( $this->m4is_c2ah['Email'] ) ? $this->m4is_c2ah['Email'] : '';
 $this->m4is_s54hod = empty( $this->m4is_t6r3xw['sync'] ) ? [] : array_filter( explode( ',', strtolower( trim( $this->m4is_t6r3xw['sync'] ) ) ) );
 $this->m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $this->m4is_e2kg, 'httppost', "Update Contact\n");
 if ( $this->m4is_yh5y ) { printf( "Contact ID = %d\n", $this->m4is_e2kg );
 } } private 
function m4is_my9o() { $m4is_p6_h = [];
 if ( ! $this->m4is_e2kg ) { $m4is_p6_h[] = "Error: No Contact ID provided";
 } if ( empty( $this->m4is_fliw ) ) { $m4is_p6_h[] = "Error: No Email address provided";
 } if ( count( $m4is_p6_h ) ) { $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 die();
 } } private 
function m4is_hrd7() { $this->m4is_x0_hk = m4is_pms8y::m4is_e5l8a9()->m4is_ku54f( $this->m4is_fliw );
 if ( ! $this->m4is_x0_hk ){ $this->m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $this->m4is_e2kg );
 } else { $this->m4is_ig9p6 = $this->m4is_x0_hk->ID;
 } if ( $this->m4is_yh5y ) { printf( "Matched Contact ID = %d to User ID = %d\n", $this->m4is_e2kg, $this->m4is_ig9p6 );
 $this->m4is_ydo2qh[] = sprintf( "Matched Contact ID = %d to User ID = %d", $this->m4is_e2kg, $this->m4is_ig9p6 );
 } if ( $this->m4is_ig9p6 == 0) { $this->m4is_ydo2qh[] = sprintf( "No user found for email %s or Contact ID %d", $this->m4is_fliw, $this->m4is_e2kg );
 exit;
 } } private 
function m4is_dhpr() { $this->m4is_bnd6ti->m4is_dhpr( $this->m4is_p9r_8e );
 $m4is_oa_z = $this->m4is_bnd6ti->m4is_akz3( $this->m4is_ig9p6 );
 $this->m4is_ydo2qh[] = 'Contact Saved';
 } private 
function m4is_kl2ewm() { if ( ! $this->m4is_e2kg ) { return;
 } if ( ! $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_affiliate', false ) ) { return;
 } if ( ! in_array( 'affiliate', $this->m4is_s54hod ) ) { return;
 } $this->m4is_bnd6ti->m4is_nf09rk( $this->m4is_e2kg );
 m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, sprintf( "Syncing Affiliate Record for Contact %s\n", $this->m4is_fliw ) );
 if ( $this->m4is_yh5y ) { printf( "Synced Affiliate record for %s\n", $this->m4is_fliw );
 $m4is__b5x37 = m4is_pk8phc::m4is_ekft( $this->m4is_e2kg );
 if ( is_array( $m4is__b5x37 ) ) { foreach( $m4is__b5x37 as $m4is_g1ru50 => $m4is_w_o7al ) { echo sprintf( "%s = '%s'\n", $m4is_g1ru50, $m4is_w_o7al );
 } } else { echo 'No Affiliate Records Found';
 } } }    private 
function m4is_ypsh6m() { if ( ! $this->m4is_e2kg ) { return;
 } if ( ! $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_ecommerce', false ) ) { return;
 } if ( ! in_array( 'invoices', $this->m4is_s54hod ) ) { return;
 } } private 
function m4is__7phr_() { if ( ! $this->m4is_e2kg ) { return;
 } if ( ! $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_ecommerce', false ) ) { return;
 } if ( ! in_array( 'creditcards', $this->m4is_s54hod ) ) { return;
 } } private 
function m4is_bp2ra6() { if ( ! $this->m4is_e2kg ) { return;
 } if ( ! $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_ecommerce', false ) ) { return;
 } if ( ! in_array( 'creditcards', $this->m4is_s54hod ) ) { return;
 } } private 
function m4is_akz3() { $this->m4is_bnd6ti->m4is_akz3( $this->m4is_ig9p6 );
 }  private 
function m4is_oyar9d( $m4is_w_o7al ) { return $m4is_w_o7al ? 'Yes' : 'No';
 } private 
function m4is_jbxts( $m4is_w_o7al, bool $m4is_koi38 = false ) : bool { $m4is_w_o7al = strtolower( substr( trim( $m4is_w_o7al ), 0, 1 ) );
 return in_array( $m4is_w_o7al, [ 'y', 't', '1' ] ) ? true : ( in_array( $m4is_w_o7al, [ 'n', 'f', '0' ] ) ? false : $m4is_koi38 );
 } }

