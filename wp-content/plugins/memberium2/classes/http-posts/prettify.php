<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_s4xe { private $m4is_hrj9 = [], $m4is_t6r3xw = [], $m4is_xf9b = '', $m4is_vfzl0 = '', $m4is_q8vgfd = null, $m4is_c2ah = [], $m4is_qhyts = false, $m4is_pjkx2b = 0, $m4is_x25z14 = [], $m4is_qwx2 = [];
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = [] ) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw, array $m4is_c2ah ) { ini_set( 'display_errors', 1 );
 $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 $this->m4is_pjkx2b = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 $this->m4is_gbqd0();
 $this->m4is_ynpw();
 $this->m4is_k4fm();
 $this->m4is_kgsej7();
 $this->m4is_e3i8yv();
 $this->m4is_qastuh();
 $this->m4is_g36tku();
 $this->m4is_pk0v();
 $this->m4is_kvy187();
 $this->m4is_cseh();
 $this->m4is_t63z();
 } 
function __destruct() { $m4is_olnv = microtime( true ) - $this->m4is_pjkx2b;
 $m4is_wbgl5s = sprintf( "Completed Prettify Contact HTTP POST.  Processing time: %0.3f seconds\n", $m4is_olnv );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 $this->m4is_ydo2qh = array_filter( $this->m4is_ydo2qh );
 if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { echo $m4is_wbgl5s;
 } } private 
function m4is_gbqd0() { $this->m4is_lja67 = m4is_ho3l::m4is_kjedy2( 'Contact', false );
 $this->m4is_hrj9 = $this->m4is__0o_i();
 } private 
function m4is_ynpw() { ksort( $this->m4is_c2ah );
 $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : $this->m4is_e2kg;
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] );
 $this->m4is_qhyts = isset( $this->m4is_t6r3xw['noaccents'] );
 $this->m4is_x25z14 = isset( $this->m4is_t6r3xw['tagids'] ) && ! empty( $this->m4is_t6r3xw['tagids'] ) ? array_filter( explode( ',', $this->m4is_t6r3xw['tagids'] ) ) : $this->m4is_x25z14;
 }  private 
function m4is_k4fm() { foreach ( $this->m4is_p9r_8e as $m4is_yxwn => $m4is_w_o7al ) { $m4is_w_o7al = trim( $m4is_w_o7al );
 if ( $m4is_w_o7al > '' && in_array( $m4is_yxwn, $this->m4is_hrj9 ) ) { $this->m4is_qwx2[ $m4is_yxwn ] = $m4is_w_o7al;
 } else { unset( $this->m4is_p9r_8e[ $m4is_yxwn ] );
 } } if ( $this->m4is_yh5y ) { echo __LINE__, "\n";
 echo print_r( $this->m4is_p9r_8e, true ), "\n";
 } } private 
function m4is_kgsej7() { if ( ! $this->m4is_qhyts ) { return;
 } foreach ( $this->m4is_qwx2 as $m4is_yxwn => $m4is_w_o7al ) { $this->m4is_qwx2[ $m4is_yxwn ] = remove_accents( $m4is_w_o7al );
 } } private 
function m4is_e3i8yv() { $m4is_lja67 = $this->m4is_ere72j();
 foreach ( $m4is_lja67 as $m4is_yxwn ) { if ( isset( $this->m4is_qwx2[ $m4is_yxwn ] ) ) { $this->m4is_qwx2[ $m4is_yxwn ] = strtolower( $this->m4is_qwx2[ $m4is_yxwn ] );
 } } } private 
function m4is_qastuh() { $m4is_lja67 = $this->m4is_ecj1s();
 foreach ( $m4is_lja67 as $m4is_yxwn ) { if (! empty( $this->m4is_qwx2[ $m4is_yxwn ] ) ) { $this->m4is_qwx2[ $m4is_yxwn ] = ucwords( strtolower( $this->m4is_qwx2[ $m4is_yxwn ] ) );
 } } } private 
function m4is_g36tku() { $m4is_lja67 = $this->m4is_wbpvg();
 foreach ( $m4is_lja67 as $m4is_yxwn ) { if (! empty( $this->m4is_qwx2[ $m4is_yxwn ] ) ) { $this->m4is_qwx2[ $m4is_yxwn ] = strtoupper( $this->m4is_qwx2[ $m4is_yxwn ] );
 } } } private 
function m4is_pk0v() { $m4is_lja67 = $this->m4is_mj4ytc();
 foreach ( $m4is_lja67 as $m4is_yxwn) { if (! empty( $this->m4is_qwx2[ $m4is_yxwn ] ) ) { if ( strlen( $this->m4is_qwx2[ $m4is_yxwn ] ) < 4) { $this->m4is_qwx2[ $m4is_yxwn ] = strtoupper( strtolower( remove_accents( $this->m4is_qwx2[ $m4is_yxwn ] ) ) );
 } else { $this->m4is_qwx2[ $m4is_yxwn ] = ucwords( strtolower( $this->m4is_qwx2[ $m4is_yxwn ] ) );
 } } } } private 
function m4is_kvy187() { foreach( $this->m4is_qwx2 as $m4is_yxwn => $m4is_w_o7al ) { if ( $this->m4is_p9r_8e[ $m4is_yxwn ] == $m4is_w_o7al ) { unset( $this->m4is_qwx2[ $m4is_yxwn ] );
 } } print_r( $this->m4is_qwx2 );
 } private 
function m4is_cseh() { if ( empty( $this->m4is_qwx2 ) ) { return;
 } m4is_bnrdbo::m4is_cseh( $this->m4is_e2kg, $this->m4is_qwx2, true );
  } private 
function m4is_t63z() { if ( ! empty( $this->m4is_x25z14 ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $this->m4is_x25z14, $this->m4is_e2kg );
 if ( $this->m4is_yh5y ) { printf( "%d - Tagged contact with %s\n", __LINE__, implode( ', ', $this->m4is_x25z14 ) );
 } } if ( ! empty( $this->m4is_xf9b ) ) { $m4is_k93fd = explode( ':', $this->m4is_xf9b );
 $m4is_h5fp = $m4is_k93fd[0];
 $m4is_xf9b = $m4is_k93fd[1];
 m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $m4is_xf9b, $m4is_h5fp );
 if ( $this->m4is_yh5y ) { printf( "%d - Goal Achieved with %s\n", __LINE__, implode( ', ', $this->m4is_xf9b ) );
 } } m4is_pms8y::m4is_e5l8a9()->m4is_q285('send_http_post');
 }   private 
function m4is__0o_i() : array { static $m4is_lja67 = [];
 if ( empty( $m4is_lja67 ) ) { $m4is_lja67 = array_merge( $this->m4is_ere72j(), $this->m4is_ecj1s(), $this->m4is_mj4ytc(), $this->m4is_wbpvg() );
 } return $m4is_lja67;
 }  private 
function m4is_ecj1s() : array { static $m4is_lja67 = [];
 if ( empty( $m4is_lja67 ) ) { $m4is_lja67 = apply_filters( 'memberium/httppost/prettify/fields/propercase', [ 'Address2Street1', 'Address2Street2', 'Address3Street1', 'Address3Street2', 'AssistantName', 'City', 'City2', 'City3', 'Company', 'Country', 'Country2', 'Country3', 'FirstName', 'JobTitle', 'LastName', 'MiddleName', 'Nickname', 'SpouseName', 'StreetAddress1', 'StreetAddress2', ] );
 } return $m4is_lja67;
 }  private 
function m4is_wbpvg() : array { static $m4is_lja67 = [];
 if ( empty( $m4is_lja67 ) ) { $m4is_lja67 = apply_filters( 'memberium/httppost/prettify/fields/uppercase', [ 'PostalCode', 'PostalCode2', 'PostalCode3', ] );
 } return $m4is_lja67;
 }  private 
function m4is_ere72j() : array { static $m4is_lja67 = [];
 if ( empty( $m4is_lja67 ) ) { $m4is_lja67 = apply_filters( 'memberium/httppost/prettify/fields/lowercase', [ 'Email', 'EmailAddress2', 'EmailAddress3', ] );
 } return $m4is_lja67;
 }  private 
function m4is_mj4ytc() : array { static $m4is_lja67 = [];
 if ( empty( $m4is_lja67 ) ) { $m4is_lja67 = apply_filters( 'memberium/httppost/prettify/fields/states', [ 'State', 'State2', 'State3', ] );
 } return $m4is_lja67;
 }  }

