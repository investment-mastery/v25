<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_kix7 { private $m4is_p9r_8e = [], $m4is_e2kg = 0, $m4is_yh5y = false, $m4is_fliw = '', $m4is_t6r3xw = [], $m4is_xf9b = '', $m4is_ydo2qh = [], $m4is_q8vgfd = 0, $m4is_c2ah = [], $m4is_x25z14 = [], $m4is_x0_hk = null, $m4is_o_7jn2 = null;
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = [] ) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw, array $m4is_c2ah ) { ini_set( 'display_errors', 1 );
 $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 m4is_aoxw::m4is_djr4nd();
 $this->m4is_gbqd0( $m4is_t6r3xw, $m4is_c2ah );
 $this->m4is_ynpw();
 $this->m4is_kx0u_d();
 $this->m4is_my9o();
 $this->m4is_daen();
 $this->m4is_k2n7z();
 } 
function __destruct() { if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { printf( "Exiting Delete Contact HTTP POST Process at %s\n", microtime( true ) );
 } } private 
function m4is_gbqd0( array $m4is_t6r3xw, array $m4is_c2ah ) { ksort( $this->m4is_c2ah );
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 } private 
function m4is_ynpw() { $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : $this->m4is_e2kg;
 $this->m4is_fliw = isset( $this->m4is_p9r_8e['Email'] ) ? $this->m4is_p9r_8e['Email'] : '';
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['debug'], false ) : false;
 $this->m4is_xf9b = empty( $this->m4is_t6r3xw['goal'] ) ? '' : $this->m4is_t6r3xw['goal'];
 $this->m4is_x25z14 = empty( $this->m4is_t6r3xw['tagids'] ) ? [] : array_filter( explode( ',', $this->m4is_t6r3xw['tagids'] ) );
 $this->m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $this->m4is_e2kg, 'httppost', 'Delete User' );
 $this->m4is_ydo2qh[] = sprintf( "Contact ID = %d, Email = %s", $this->m4is_e2kg, $this->m4is_fliw );
 if ( $this->m4is_yh5y ) { printf( "%s - %s\n", __LINE__, 'Begin Contact Deletion at ' . microtime( true ) );
 printf( "%s - %s\n", __LINE__, 'Debug Mode Enabled' );
 printf( "%s - %s = %s\n", __LINE__, 'Contact ID', $this->m4is_e2kg );
 printf( "%s - %s = %s\n", __LINE__, 'Email Address', $this->m4is_fliw );
 printf( "%s - %s = %s\n", __LINE__, 'API Goal', $this->m4is_xf9b );
 printf( "%s - %s = %s\n", __LINE__, 'Tag IDs', implode( ', ', $this->m4is_x25z14 ) );
 } } private 
function m4is_kx0u_d() { $this->m4is_x0_hk = get_user_by( 'email', $this->m4is_fliw );
 $this->m4is_ig9p6 = $this->m4is_x0_hk ? $this->m4is_x0_hk->ID : 0;
 $m4is_wbgl5s = sprintf( "Matched Contact ID = %d to User ID = %d", $this->m4is_e2kg, $this->m4is_ig9p6 );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 if ( $this->m4is_yh5y ) { printf( "%s - %s\n", __LINE__, $m4is_wbgl5s );
 } } private 
function m4is_my9o() { $m4is_p6_h = [];
 if ( ! $this->m4is_e2kg ) { $m4is_p6_h[] = 'Error:  Invalid Keap contact ID';
 } if ( empty( $this->m4is_fliw ) ) { $m4is_p6_h[] = 'Error:  Email address missing or invalid';
 } if ( $this->m4is_x0_hk && user_can( $this->m4is_x0_hk, 'edit_others_posts' ) ) { $m4is_p6_h[] = 'Error:  Contact email matches Editor access.';
 } if ( ! empty( $m4is_p6_h ) ) { if ( $this->m4is_yh5y ) { echo implode( "\n", $m4is_p6_h ), "\n";
 echo "Aborted User Deletion\n";
 } $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 exit;
 } } private 
function m4is_daen() { m4is_bnrdbo::m4is_ojk0r( $this->m4is_e2kg, true );
 $m4is_wbgl5s = sprintf( 'Purged local cache for contact ID %d', $this->m4is_e2kg );
 $this->m4is_p6_h[] = $m4is_wbgl5s;
 if ( $this->m4is_yh5y) { printf( "%s - %s\n", __LINE__, $m4is_wbgl5s );
 } } private 
function m4is_k2n7z() { if ( ! $this->m4is_ig9p6 ) { return;
 } $m4is_wbgl5s = '';
 require_once ABSPATH . '/wp-admin/includes/user.php';
 if ( function_exists( 'wp_delete_user' ) ) { if ( wp_delete_user( $this->m4is_ig9p6, false ) ) { $m4is_wbgl5s = sprintf( 'Deleted WordPress User ID %d', $this->m4is_ig9p6 );
 do_action( 'memberium/httppost/contact/delete', $this->m4is_ig9p6 );
 } else { $m4is_wbgl5s = 'Error:  WordPress user deletion failed.';
 } } if ( $m4is_wbgl5s ) { if ( $this->m4is_yh5y ) { echo __LINE__, ' - ', $m4is_wbgl5s, "\n";
 } $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 } } private 
function m4is_xb_9l() { if ( ! empty( $this->m4is_x25z14 ) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $this->m4is_x25z14, $this->m4is_e2kg );
 if ($m4is_xxcq3i) { echo __LINE__, " - Added Tags: ", implode(', ', $this->m4is_x25z14 ), "\n";
 } $this->m4is_ydo2qh[] = sprintf('Added Tags ', implode( ', ', $this->m4is_x25z14 ) );
 } if ( ! empty( $this->m4is_xf9b ) ) { $m4is_k93fd = array_filter( explode( ':', $this->m4is_xf9b ) );
 $m4is_h5fp = $m4is_k93fd[0];
 $m4is_xf9b = $m4is_k93fd[1];
 m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $m4is_xf9b, $m4is_h5fp );
 if ( $this->m4is_yh5y ) { printf( "%d - Goal Achieved with %s\n", __LINE__, implode( ', ', $this->m4is_xf9b ) );
 } } if ($m4is_xxcq3i) { echo __LINE__, " - Updated Contact\n";
 echo __LINE__, " - Sleeping: {$m4is_q5pwc} seconds\n";
 } sleep($m4is_q5pwc);
 } private 
function m4is_oyar9d( $m4is_w_o7al ) { return $m4is_w_o7al ? 'Yes' : 'No';
 } private 
function m4is_jbxts( $m4is_w_o7al, bool $m4is_koi38 = false ) : bool { $m4is_w_o7al = strtolower( substr( trim( $m4is_w_o7al ), 0, 1 ) );
 return in_array( $m4is_w_o7al, [ 'y', 't', '1' ] ) ? true : ( in_array( $m4is_w_o7al, [ 'n', 'f', '0' ] ) ? false : $m4is_koi38 );
 } private 
function m4is_lg2ho() { } }

