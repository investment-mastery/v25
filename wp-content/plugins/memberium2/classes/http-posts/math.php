<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_yzp1a0 { private $m4is_ydo2qh = [], $m4is_p9r_8e = [], $m4is_e2kg = 0, $m4is_yh5y = false, $m4is_u2mp6q = '', $m4is_lja67 = [], $m4is_dp251a = '', $m4is_j8ih = '', $m4is_t6r3xw = [], $m4is_xf9b = '', $m4is_vfzl0 = '', $m4is_q8vgfd = null, $m4is_rk9_li = null, $m4is_ie9q70 = null, $m4is_n3zt = 'pure',  $m4is_c2ah = [], $m4is_a0qi6u = '', $m4is_oa_z = null, $m4is_w3lh = 0, $m4is_x25z14 = [], $m4is_nfuay3 = 0, $m4is_qhb3x = 0;
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = []) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw, array $m4is_c2ah ) { $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 $this->m4is_gbqd0( $m4is_t6r3xw, $m4is_c2ah );
 $this->m4is_ynpw();
 $this->m4is_ahjrux();
 $this->m4is_o4xs_();
 $this->m4is_a5y2();
 $this->m4is_n1q8();
 $this->m4is_t63z();
 $this->m4is_e3pnzx();
 } 
function __destruct() { $m4is_olnv = microtime( true ) - $this->m4is_pjkx2b;
 $m4is_wbgl5s = sprintf( "Completed Math HTTP POST.  Processing time: %0.3f seconds\n", $m4is_olnv );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 $this->m4is_ydo2qh = array_filter( $this->m4is_ydo2qh );
 if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { echo $m4is_wbgl5s;
 } } private 
function m4is_gbqd0( array $m4is_t6r3xw, array $m4is_c2ah ) { ini_set( 'display_errors', 1 );
 $this->m4is_pjkx2b = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 $this->m4is_lja67 = m4is_ho3l::m4is_kjedy2( 'Contact', false );
 }  private 
function m4is_ynpw() { ksort( $this->m4is_c2ah );
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] );
 $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : $this->m4is_e2kg;
 $this->m4is_u2mp6q = isset( $this->m4is_t6r3xw['destination'] ) ? trim( $this->m4is_t6r3xw['destination'] ) : $this->m4is_u2mp6q;
 $this->m4is_dp251a = isset( $this->m4is_t6r3xw['format'] ) ? strtolower( trim( $this->m4is_t6r3xw['format'] ) ) : $this->m4is_dp251a;
 $this->m4is_j8ih = isset( $this->m4is_t6r3xw['function'] ) ? strtolower( trim( $this->m4is_t6r3xw['function'] ) ) : $this->m4is_j8ih;
 $this->m4is_n3zt = isset( $this->m4is_t6r3xw['mode'] ) ? strtolower( trim( $this->m4is_t6r3xw['mode'] ) ) : $this->m4is_n3zt;
 $this->m4is_a0qi6u = isset( $this->m4is_t6r3xw['round'] ) ? (int) $this->m4is_t6r3xw['round'] : $this->m4is_a0qi6u;
 $this->m4is_x25z14 = isset( $this->m4is_t6r3xw['tagids'] ) && ! empty( $this->m4is_t6r3xw['tagids'] ) ? array_filter( explode( ',', $this->m4is_t6r3xw['tagids'] ) ) : $this->m4is_x25z14;
 $this->m4is_nfuay3 = isset( $this->m4is_t6r3xw['value1'] ) ? trim( $this->m4is_t6r3xw['value1'] ) : $this->m4is_nfuay3;
 $this->m4is_qhb3x = isset( $this->m4is_t6r3xw['value2'] ) ? trim( $this->m4is_t6r3xw['value2'] ) : $this->m4is_qhb3x;
 $this->m4is_a0qi6u = (float) $this->m4is_pbne( $this->m4is_a0qi6u );
 $this->m4is_nfuay3 = (float) $this->m4is_pbne( $this->m4is_nfuay3 );
 $this->m4is_qhb3x = (float) $this->m4is_pbne( $this->m4is_qhb3x );
 } private 
function m4is_my9o() { $m4is_p6_h = [];
 if ( ! $this->m4is_e2kg ) { $m4is_p6_h = 'Error:  No valid contact ID provided.';
 } if ( ! is_numeric( $this->m4is_nfuay3 ) ) { $m4is_p6_h = sprintf( 'Error:  No valid value provided for Value1 (%s).', $this->m4is_nfuay3 );
 } if ( ! is_numeric( $this->m4is_qhb3x ) ) { $m4is_p6_h = sprintf( 'Error:  No valid value provided for Value2 (%s).', $this->m4is_qhb3x );
 } if ( ! in_array( $this->m4is_u2mp6q, $m4is_lja67 ) ) { $m4is_p6_h = 'Error:  No valid destination contact field name provided.';
 } if ( ! in_array( $this->m4is_j8ih, [ 'subtract', 'add', 'max', 'min', 'multiply', 'divide', 'random' ] ) ) { $m4is_p6_h = sprintf( 'Error:  Invalid operation/function provided: %s', $this->m4is_j8ih );
 } if ( ! in_array( $this->m4is_n3zt, [ 'pure', 'credit' ] ) ) { $m4is_p6_h = sprintf( 'Error:  Invalid mode provided: %s', $this->m4is_n3zt );
 } if ( $this->m4is_j8ih == 'divide' && $this->m4is_qhb3x == 0 ) { $m4is_p6_h = 'Error:  Divide by zero.  Value2 cannot be zero.';
 } $m4is_p6_h = array_filter( $m4is_p6_h );
 if ( count( $m4is_p6_h ) ) { if ( $this->m4is_yh5y ) { foreach( $m4is_p6_h as $m4is_jadl06 ) { echo sprintf( "%s\n", $m4is_jadl06 );
 } } $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 header('HTTP/1.0 400 Bad Request');
 die();
 } } private 
function m4is_ahjrux() { m4is_aoxw::m4is_djr4nd();
 if ( $this->m4is_yh5y ) { echo __LINE__, ' - Debug Mode Enabled<br>';
 printf( '%d - %s: %s<br />', __LINE__, 'Contact ID', $this->m4is_e2kg );
 printf( '%d - %s: %s<br />', __LINE__, 'Value 1', $this->m4is_nfuay3 );
 printf( '%d - %s: %s<br />', __LINE__, 'Function', $this->m4is_j8ih );
 printf( '%d - %s: %s<br />', __LINE__, 'Value 2', $this->m4is_qhb3x );
 printf( '%d - %s: %s<br />', __LINE__, 'Destination', $this->m4is_u2mp6q );
 printf( '%d - %s: %s<br />', __LINE__, 'Precision', $this->m4is_a0qi6u );
 printf( '%d - %s: %s<br />', __LINE__, 'Formatting', $this->m4is_dp251a );
 printf( '%d - %s: %s<br />', __LINE__, 'Mode', $this->m4is_n3zt );
 } } private 
function m4is_n1q8() { if ( ! empty( $this->m4is_u2mp6q ) ) {  m4is_bnrdbo::m4is_cseh( $this->m4is_e2kg, [ $this->m4is_u2mp6q => $this->m4is_oa_z], true );
  if ( $this->m4is_yh5y ) { printf( '%d - Contact ID: %d --  %s: %s<br />', __LINE__, $this->m4is_e2kg, $this->m4is_u2mp6q, $this->m4is_oa_z );
 } if ( $this->m4is_yh5y ) echo __LINE__, " - Queued update to contact record\n";
 $m4is_z3682y = "Value1 = {$this->m4is_nfuay3} {$this->m4is_j8ih} {$this->m4is_qhb3x} = {$this->m4is_oa_z}\n" . "Destination = {$this->m4is_u2mp6q}";
 $this->m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $this->m4is_e2kg, 'httppost', "Math\n" . $m4is_z3682y );
 } }  private 
function m4is_o4xs_() { if ( $this->m4is_j8ih == 'add' ) { $this->m4is_oa_z = $this->m4is_nfuay3 + $this->m4is_qhb3x;
 } elseif ( $this->m4is_j8ih == 'divide' && $this->m4is_qhb3x != 0 ) { $this->m4is_oa_z = $this->m4is_nfuay3 / $this->m4is_qhb3x;
 } elseif ( $this->m4is_j8ih == 'max' ) { $this->m4is_oa_z = max( $this->m4is_nfuay3, $this->m4is_qhb3x );
 } elseif ( $this->m4is_j8ih == 'min' ) { $this->m4is_oa_z = min( $this->m4is_nfuay3, $this->m4is_qhb3x );
 } elseif ( $this->m4is_j8ih == 'multiply' ) { $this->m4is_oa_z = $this->m4is_nfuay3 * $this->m4is_qhb3x;
 } elseif ( $this->m4is_j8ih == 'random' ) { $this->m4is_oa_z = mt_rand( $this->m4is_nfuay3, $this->m4is_qhb3x );
 } elseif ( $this->m4is_j8ih == 'subtract' ) { $this->m4is_oa_z = $this->m4is_nfuay3 - $this->m4is_qhb3x;
 } if ( $this->m4is_yh5y ) printf( "%d - Calculating: %s %s %s = %s\n", __LINE__, $this->m4is_nfuay3, $this->m4is_j8ih, $this->m4is_qhb3x, $this->m4is_oa_z );
 if ( $this->m4is_a0qi6u ) { $this->m4is_oa_z = round( $tjhos->m4is_oa_z, $this->m4is_a0qi6u);
 if ($m4is_xxcq3i) printf( "%d - Rounded Result to (%s)\n", __LINE__, $this->m4is_oa_z );
 } if ( $this->m4is_oa_z == (int) $this->m4is_oa_z) { $this->m4is_oa_z = (int) $this->m4is_oa_z;
 } else { $this->m4is_oa_z = (float) $this->m4is_oa_z;
 } if ( ! empty( $this->m4is_dp251a ) ) { $this->m4is_oa_z = sprintf( $m4is_dp251a, $m4is_oa_z );
 if ($m4is_xxcq3i) echo __LINE__, " - Formatted Result to {$m4is_oa_z}\n";
 } return $this->m4is_oa_z;
 }  private 
function m4is_a5y2() { if ( isset( $_GET['min'] ) ) { $this->m4is_ie9q70 = isset( $this->m4is_t6r3xw['min'] ) ? $this->m4is_t6r3xw['min'] : $this->m4is_ie9q70;
 $this->m4is_ie9q70 = (float) $this->m4is_pbne( $this->m4is_ie9q70 );
 if ( $this->m4is_oa_z < $this->m4is_ie9q70 ) { if ( $this->m4is_yh5y ) printf( "%d - Result (%s) is less than min (%s)\n", __LINE__, $this->m4is_oa_z, $this->m4is_ie9q70 );
 if ( $this->m4is_n3zt == 'credit' ) { if ( $this->m4is_yh5y ) printf( "%d - Insufficient credit left.  Aborting transaction\n", __LINE__ );
 die();
 } else { $this->m4is_oa_z = $this->m4is_ie9q70;
 } } } if ( isset( $_GET['max'] ) ) { $this->m4is_rk9_li = isset( $this->m4is_t6r3xw['max'] ) ? $this->m4is_t6r3xw['max'] : $this->m4is_rk9_li;
 $this->m4is_rk9_li = (float) $this->m4is_pbne( $this->m4is_rk9_li );
 if ( $this->m4is_oa_z > $this->m4is_rk9_li ) { if ( $this->m4is_yh5y ) printf( "%d - Result (%s) is greater than max (%s)\n", __LINE__, $this->m4is_oa_z, $this->m4is_rk9_li );
 if ( $this->m4is_n3zt == 'credit' ) { if ( $this->m4is_yh5y ) printf( "%d - Credit ceiling exceeded.  Aborting transaction\n", __LINE__ );
 die();
 } else { $this->m4is_oa_z = $this->m4is_rk9_li;
 } } } } private 
function m4is_t63z() { if ( ! empty( $this->m4is_x25z14 ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $this->m4is_x25z14, $this->m4is_e2kg );
 if ( $this->m4is_yh5y ) { printf( "%d - Tagged contact with %s\n", __LINE__, implode( ', ', $this->m4is_x25z14 ) );
 } } if ( ! empty( $this->m4is_xf9b ) ) { $m4is_k93fd = array_filter( explode( ':', $this->m4is_xf9b ) );
 $m4is_h5fp = $m4is_k93fd[0];
 $m4is_xf9b = $m4is_k93fd[1];
 m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $m4is_xf9b, $m4is_h5fp );
 if ( $this->m4is_yh5y ) { printf( "%d - Goal Achieved with %s\n", __LINE__, implode( ', ', $this->m4is_xf9b ) );
 } } } private 
function m4is_e3pnzx() { m4is_pms8y::m4is_e5l8a9()->m4is_q285('send_http_post');
 echo "Operation Completed\n";
 }  private 
function m4is_pbne( $m4is_w_o7al ) { if ( ! is_null( $m4is_w_o7al ) && in_array( $m4is_w_o7al, $this->m4is_lja67 ) && array_key_exists( $m4is_w_o7al, $this->m4is_p9r_8e ) ) { $m4is_w_o7al = $this->m4is_p9r_8e[ $m4is_w_o7al ];
 } return $m4is_w_o7al;
 } }

