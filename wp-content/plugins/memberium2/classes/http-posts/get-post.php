<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_l17doi { private  $m4is_p9r_8e = [], $m4is_a5gte = [], $m4is_e2kg = 0, $m4is_yh5y = false, $m4is_q5pwc = 0, $m4is_sow6df = [], $m4is_t6r3xw = [], $m4is_xf9b = '', $m4is_ydo2qh = [], $m4is_q8vgfd = '', $m4is_c2ah = [], $m4is_e9c2 = 'content', $m4is_pjkx2b = 0, $m4is_x25z14 = [], $m4is__xn_jt = [],  $m4is_cd8k = 0;
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = [] ) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw, array $m4is_c2ah ) { ini_set( 'display_errors', 1 );
 $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 $this->m4is_gbqd0( $m4is_t6r3xw, $m4is_c2ah );
 $this->m4is_ynpw();
 $this->m4is_my9o();
 $this->m4is_cseh();
 } 
function __destruct() { $m4is_olnv = microtime( true ) - $this->m4is_pjkx2b;
 $m4is_wbgl5s = sprintf( "Completed Get Post HTTP POST.  Processing time: %0.3f seconds\n", $m4is_olnv );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 $this->m4is_ydo2qh = array_filter( $this->m4is_ydo2qh );
 if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { echo $m4is_wbgl5s;
 } } private 
function m4is_gbqd0( array $m4is_t6r3xw, array $m4is_c2ah ) { $this->m4is_pjkx2b = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 $this->m4is_a5gte = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 ksort( $this->m4is_c2ah );
 } private 
function m4is_ynpw() { $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : $this->m4is_e2kg;
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['debug'], false ) : false;
 $this->m4is_q5pwc = empty( $this->m4is_t6r3xw['delay'] ) ? 0 : (int) $this->m4is_t6r3xw['delay'];
 $this->m4is_sow6df = empty( $this->m4is_t6r3xw['format'] ) ? [] : array_filter( explode( ',', $this->m4is_t6r3xw['format'] ) );
 $this->m4is_xf9b = empty( $this->m4is_t6r3xw['goal'] ) ? '' : $this->m4is_t6r3xw['goal'];
 $this->m4is_pkd7 = isset( $this->m4is_t6r3xw['overwrite'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['overwrite'], false ) : false;
 $this->m4is_cd8k = empty( $this->m4is_t6r3xw['post_id'] ) ? 0 : (int) $this->m4is_t6r3xw['post_id'];
 $this->m4is_x25z14 = empty( $this->m4is_t6r3xw['tagids'] ) ? [] : array_filter( explode( ',', $this->m4is_t6r3xw['tagids'] ) );
 $this->m4is_p4izs = empty( $this->m4is_t6r3xw['target'] ) ? [] : array_filter( explode( ',', $this->m4is_t6r3xw['target'] ) );
 $this->m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $this->m4is_e2kg, 'httppost', 'MakePass' );
  if ( $this->m4is_yh5y ) { echo __LINE__, " - Begin Get Post at ", microtime( true ) ,"\n";
 echo __LINE__, " - Debug Mode Enabled\n";
 echo __LINE__, " - Contact ID = ", $this->m4is_e2kg, "\n";
 echo __LINE__, " - Post ID = ", $this->m4is_cd8k, "\n";
 echo __LINE__, " - Format = ", implode( ', ', $this->m4is_sow6df ), "\n";
 echo __LINE__, " - Overwrite = ", $this->m4is_oyar9d( $this->m4is_pkd7 ), "\n";
 echo __LINE__, " - Delay = ", $this->m4is_q5pwc, "\n";
 echo __LINE__, " - Goal = ", $this->m4is_xf9b, "\n";
 echo __LINE__, " - Tag IDs = ", implode( ', ', $this->m4is_x25z14 ), "\n";
 } } private 
function m4is_my9o() { $m4is_p6_h = [];
 $m4is_e6y2v = [];
 if ( ! $this->m4is_e2kg ) { $m4is_p6_h[] = 'Error:  Invalid Keap contact ID';
 } foreach( $this->m4is_p4izs as $m4is_s2ge5 => $m4is_yxwn ) { if ( ! in_array( $m4is_yxwn, $this->m4is_a5gte ) ) { $m4is_e6y2v[] = 'Error:  Invalid Keap field name: ' . $m4is_yxwn;
 unset( $this->m4is_p4izs[ $m4is_s2ge5 ] );
 } } if ( empty( $this->m4is_p4izs ) ) { $m4is_p6_h[] = 'Error:  No valid target fields.';
 } if ( empty( $this->m4is_cd8k ) || get_post_status( $this->m4is_cd8k ) !== 'publish' ) { $m4is_p6_h[] = 'Error:  Invalid Post ID';
 } if ( ! empty( $m4is_p6_h ) ) { if ( $this->m4is_yh5y ) { echo implode( "\n", $m4is_p6_h ), "\n";
 printf( "%d - Aborted Get Post at %s\n", __LINE__, microtime( true ) );
 } $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 exit;
 } } private 
function m4is_cseh() { $m4is_c2ah = get_post( $this->m4is_cd8k, ARRAY_A );
 $m4is_z50f = [];
 if ($this->m4is_e9c2 == 'content' ) { $m4is_z50f = $m4is_c2ah['post_content'];
 } elseif ($this->m4is_e9c2 == 'excerpt' ) { $m4is_z50f = $m4is_c2ah['post_excerpt'];
 } $m4is_z50f = m4is_crqo::m4is_mq57( do_shortcode( $m4is_z50f ), implode( ',', $this->m4is_sow6df ) );
 foreach( $this->m4is_p4izs as $m4is_yxwn ) { $this->m4is__xn_jt[ $m4is_yxwn ] = $m4is_z50f;
 $this->m4is_p9r_8e[ $m4is_yxwn ] = $m4is_z50f;
 } if ( $m4is_z50f ) { m4is_bnrdbo::m4is_cseh( $this->m4is_e2kg, $this->m4is__xn_jt, true );
  m4is_pms8y::m4is_e5l8a9()->m4is_dhpr( $this->m4is_p9r_8e );
 } } private 
function m4is_xb_9l() { if ( ! empty( $this->m4is_x25z14 ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $this->m4is_x25z14, $this->m4is_e2kg );
 if ($m4is_xxcq3i) { echo __LINE__, " - Added Tags: ", implode(', ', $this->m4is_x25z14 ), "\n";
 } $this->m4is_ydo2qh[] = sprintf('Added Tags ', implode( ', ', $this->m4is_x25z14 ) );
 } if ( ! empty( $this->m4is_xf9b ) ) { $m4is_k93fd = array_filter( explode( ':', $this->m4is_xf9b ) );
 $m4is_h5fp = $m4is_k93fd[0];
 $m4is_xf9b = $m4is_k93fd[1];
 m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $m4is_xf9b, $m4is_h5fp );
 if ( $this->m4is_yh5y ) { printf( "%d - Goal Achieved with %s\n", __LINE__, implode( ', ', $this->m4is_xf9b ) );
 } } if ( $this->m4is_yh5y ) { echo __LINE__, " - Updated Contact\n";
 echo __LINE__, " - Sleeping: {$this->m4is_q5pwc} seconds\n";
 } m4is_pms8y::m4is_e5l8a9()->m4is_m3vz( $this->m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_q285('send_http_post');
 sleep( $this->m4is_q5pwc );
 } private 
function m4is_oyar9d( $m4is_w_o7al ) { return $m4is_w_o7al ? 'Yes' : 'No';
 } private 
function m4is_jbxts( $m4is_w_o7al, bool $m4is_koi38 = false ) : bool { $m4is_w_o7al = strtolower( substr( trim( $m4is_w_o7al ), 0, 1 ) );
 return in_array( $m4is_w_o7al, [ 'y', 't', '1' ] ) ? true : ( in_array( $m4is_w_o7al, [ 'n', 'f', '0' ] ) ? false : $m4is_koi38 );
 } }

