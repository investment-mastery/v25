<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_crqo::m4is_x6wv();
 final 
class m4is_crqo { private static $m4is_bnd6ti, $m4is_dked ;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 }     private static 
function m4is_s_rcke() : array { return [ 'abs', 'addslashes', 'bin2hex', 'ceil', 'convert_uudecode', 'convert_uuencode', 'crc32', 'crypt', 'floor', 'html_entity_decode', 'htmlentities', 'htmlspecialchars_decode', 'htmlspecialchars', 'intval', 'lcfirst', 'ltrim', 'md5', 'nl2br', 'rawurlencode', 'remove_accents', 'rtrim', 'sha1', 'str_rot13', 'strip_tags', 'stripslashes', 'strlen', 'strrev', 'strtolower', 'strtoupper', 'trim', 'ucfirst', 'ucwords', 'wptexturize', ];
 }  static 
function m4is_c0cy5i( $m4is_w_o7al, $m4is_koi38 = false ) : bool { $m4is_w_o7al = strtolower( trim( $m4is_w_o7al ) );
 if ( $m4is_w_o7al == 'on' ) { return true;
 } elseif ( $m4is_w_o7al == 'off' ) { return false;
 } $m4is_w_o7al = substr( $m4is_w_o7al, 0, 1 );
 switch($m4is_w_o7al) { case 'y': case 't': case '1': return true;
 break;
 case 'n': case 'f': case '0': return false;
 break;
 } return (binary) $m4is_koi38;
 }  static 
function m4is_l0cy( $m4is_nfuay3, $m4is_lixqnk, $m4is_qhb3x, $m4is_q8ru = true ) { $m4is_lixqnk = strtolower( trim( $m4is_lixqnk ) );
 if ( self::m4is_c0cy5i( $m4is_q8ru, true ) ) { $m4is_nfuay3 = strtolower( trim( $m4is_nfuay3 ) );
 $m4is_qhb3x = strtolower( trim( $m4is_qhb3x ) );
 } $m4is__8htld = false;
 if ( in_array( $m4is_lixqnk, [ '=', '==', '===', 'eq' ] ) ) { $m4is__8htld = ($m4is_nfuay3 == $m4is_qhb3x);
 } elseif ( in_array( $m4is_lixqnk, [ 'gt', '>' ] ) ) { $m4is__8htld = ($m4is_nfuay3 > $m4is_qhb3x);
 } elseif ( in_array( $m4is_lixqnk, [ 'lt', '<' ] ) ) { $m4is__8htld = ($m4is_nfuay3 < $m4is_qhb3x);
 } elseif ( in_array( $m4is_lixqnk, [ 'le', '<=' ] ) ) { $m4is__8htld = ($m4is_nfuay3 <= $m4is_qhb3x);
 } elseif ( in_array( $m4is_lixqnk, [ 'ge', '>=', '=>' ] ) ) { $m4is__8htld = ($m4is_nfuay3 >= $m4is_qhb3x);
 } elseif ( in_array( $m4is_lixqnk, [ 'ne', '!=', '!==' ] ) ) { $m4is__8htld = ($m4is_nfuay3 <> $m4is_qhb3x);
 } elseif ( in_array( $m4is_lixqnk, [ 'bw', '~=' ] ) ) {  $m4is__8htld = ( strpos( $m4is_nfuay3, $m4is_qhb3x ) === 0 );
 } elseif ( in_array( $m4is_lixqnk, [ 'ew', '=~' ] ) ) {  if ($m4is_nfuay3 == $m4is_qhb3x) { $m4is__8htld = true;
 } else { if ( strlen( $m4is_nfuay3 ) > strlen( $m4is_qhb3x ) ) { $m4is__8htld = @substr_compare( $m4is_nfuay3, $m4is_qhb3x, -strlen( $m4is_qhb3x ), strlen( $m4is_qhb3x ) ) === 0;
 } else { $m4is__8htld = false;
 } } } elseif ( in_array( $m4is_lixqnk, [ 'contains', '~~' ] ) ) { $m4is__8htld = strpos( $m4is_nfuay3, $m4is_qhb3x ) !== false;
 } elseif ( $m4is_lixqnk == 'in' ) { $m4is_qhb3x = array_filter( array_map( 'trim', explode( ',', $m4is_qhb3x ) ) );
 $m4is__8htld = in_array( $m4is_nfuay3, $m4is_qhb3x );
 } elseif ( $m4is_lixqnk == '!in' ) { $m4is_qhb3x = array_filter( array_map( 'trim', explode( ',', $m4is_qhb3x ) ) );
 $m4is__8htld = ! in_array( $m4is_nfuay3, $m4is_qhb3x );
 } elseif ( $m4is_lixqnk == 'range' ) { $m4is_zkl9mx = explode( ',', $m4is_qhb3x );
 $m4is__8htld = $m4is_nfuay3 >= $m4is_zkl9mx[0] && $m4is_nfuay3 <= $m4is_zkl9mx[1];
 } elseif ( $m4is_lixqnk == '!range' ) { $m4is_zkl9mx = explode( ',', $m4is_qhb3x );
 $m4is__8htld = $m4is_nfuay3 < $m4is_zkl9mx[0] || $m4is_nfuay3 > $m4is_zkl9mx[1];
 } elseif ( $m4is_lixqnk == 'datebefore' ) { $m4is_rdr4n = (int) strtotime($m4is_qhb3x . ' - ' . $m4is_nfuay3);
 $m4is_pjgr2 = (int) strtotime($m4is_qhb3x);
 $m4is__8htld = ( time() >= $m4is_rdr4n && time() <= $m4is_pjgr2 );
 } elseif ( $m4is_lixqnk == 'dateafter' ) { $m4is_i4erv2 = strtotime($m4is_qhb3x . ' + ' . $m4is_nfuay3);
 $m4is_pjgr2 = strtotime($m4is_qhb3x);
 $m4is__8htld = (time() <= $m4is_i4erv2 && time() >= $m4is_pjgr2);
 } return (bool) $m4is__8htld;
 }  static 
function m4is_mq57( string $m4is_vvimh, string $m4is_h0xm_ ) : string { static $m4is__1jk;
 $m4is_aqcezb = $m4is_aqcezb ?? self::m4is_s_rcke();
 $m4is_qdz9iu = array_filter( explode( ',', $m4is_h0xm_ ) );
 foreach ( $m4is_qdz9iu as $m4is_h0xm_ ) { if ( in_array( strtolower( $m4is_h0xm_ ), $m4is__1jk ) ) { $m4is_vvimh = $m4is_h0xm_($m4is_vvimh);
 } else { if ( $m4is_h0xm_ == 'sanitize_title' ) { $m4is_vvimh = sanitize_title( $m4is_vvimh, $m4is_vvimh );
 } } } return (string) $m4is_vvimh;
 }  static 
function m4is_uyv45q( $m4is_z50f, $m4is_ebv8a = '' ) : string { $m4is_hnmek = false;
 if ( $m4is_ebv8a == '' ) { $m4is_ebv8a = 'display';
 } if ( ! is_array( $m4is_ebv8a ) ) { $m4is_ebv8a = explode(',', $m4is_ebv8a);
 } $contact_update = [];
 if ( is_array( $m4is_ebv8a ) ) { foreach ( $m4is_ebv8a as $m4is_uzfw8j ) { $m4is_uzfw8j = strtolower( trim( $m4is_uzfw8j ) );
 if ( $m4is_uzfw8j == 'display' ) { $m4is_hnmek = true;
 } if ( strtolower( substr( $m4is_uzfw8j, 0, 6 ) ) == 'field:' ) { $m4is_iqdn = substr( $m4is_uzfw8j, 6 );
 if ( ! is_user_logged_in() ) { self::$m4is_dked[$m4is_iqdn] = $m4is_z50f;
 } else { m4is_wbc8os::m4is_ehvrpa( $m4is_iqdn, $m4is_z50f );
 } } if ( substr( $m4is_uzfw8j, 0, 4 ) == 'var:' ) { $m4is_pwyg = substr( $m4is_uzfw8j, 4 );
 }  } }  if ( $m4is_hnmek ) { return $m4is_z50f;
 } return '';
 }  static 
function m4is_mm2xd( $m4is_z50f = '', $m4is_ejhbmn = '', $m4is_idwhqr = true, $m4is__8htld = false ) : string { if ( $m4is_z50f == '' ) { if ( $m4is__8htld ) { return __( 'Yes', 'memberium' );
 } else { return __( 'No', 'memberium' );
 } } $m4is_w_wq = strtolower( '[else_' . $m4is_ejhbmn . ']' );
 $m4is_s5pm = strtolower( '[else_' . substr( $m4is_ejhbmn, 5 ) . ']' );
 $m4is_z50f = str_ireplace( $m4is_s5pm, $m4is_w_wq, $m4is_z50f );
 $m4is_vciamj = false;
 if ( stripos( $m4is_z50f, $m4is_w_wq ) !== false ) { $m4is_vciamj = true;
 } if ( $m4is_vciamj === false ) { $m4is_osw8 = [ 'success' => $m4is_z50f, 'failure' => '' ];
 } else { $m4is_w_wq = str_replace( ['[', ']'], ['\[', '\]'], $m4is_w_wq );
 $m4is_oa_z = preg_split( '/' . $m4is_w_wq . '/i', $m4is_z50f );
 $m4is_osw8 = [ 'success' => $m4is_oa_z[0], 'failure' => $m4is_oa_z[1] ];
 } if ( $m4is_idwhqr ) { if ($m4is__8htld == true) { return do_shortcode( $m4is_osw8['success'] );
 } else { return do_shortcode( $m4is_osw8['failure'] );
 } } return $m4is_osw8;
 }  static 
function m4is__go6j( $m4is_pj4c = true, $m4is_z50f = '', $m4is_oju3a2 = '', $m4is_nbu4n = '', $m4is_wlico_ = '', $m4is_xysh = '', $m4is_dqjy30 = '' ) : string { if ( $m4is_pj4c ) { $m4is_z50f = do_shortcode( $m4is_z50f );
 } if ( ! empty( $m4is_oju3a2 ) ) { $m4is_z50f = m4is_crqo::m4is_mq57($m4is_z50f, $m4is_oju3a2);
 } $m4is_z50f = $m4is_xysh . $m4is_z50f . $m4is_dqjy30;
 if ( ! empty( $m4is_nbu4n ) ) { $m4is_z50f = m4is_crqo::m4is_uyv45q( $m4is_z50f, $m4is_nbu4n );
 } if (! empty( $m4is_wlico_ ) ) { $m4is_z50f = $m4is_wlico_ . '="' . $m4is_z50f . '"';
 } return $m4is_z50f;
 }  static 
function m4is_t9dq( string $m4is_z50f = '', $m4is_b0gmh = '', string $m4is_carw7y = '') : string { if ( empty( $m4is_z50f ) ) { return '';
 } $m4is_wy71hq = [];
 $m4is_hnmek = false;
 $m4is_o2ms = false;
 $m4is_ek7po = 'default';
 $m4is_uzfw8j = '';
 $m4is_gd3oc = '/(\[lang.*\])/U';
 $m4is_y8dwk = preg_split( $m4is_gd3oc, $m4is_z50f, 0, PREG_SPLIT_DELIM_CAPTURE );
  foreach($m4is_y8dwk as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_w_o7al = trim($m4is_w_o7al);
 if (substr($m4is_w_o7al, 0, 1) == '[') { $m4is_gqid = shortcode_parse_atts(substr($m4is_w_o7al, 1, -1) );
 if (isset($m4is_gqid['lang']) ) { $m4is_ek7po = $m4is_gqid['lang'];
 } } else { $m4is_wy71hq[$m4is_ek7po] = $m4is_w_o7al;
 } } unset($m4is_y8dwk, $m4is_s2ge5, $m4is_w_o7al, $m4is_gqid);
  $m4is_tcmvt = 0;
 if (isset($m4is_wy71hq['default']) ) { $m4is_z50f = $m4is_wy71hq['default'];
 } else { $m4is_z50f = reset($m4is_wy71hq);
 } foreach($m4is_b0gmh as $m4is_jm1_ => $m4is_mxh3) { if (isset($m4is_wy71hq[$m4is_jm1_]) && $m4is_mxh3 > $m4is_tcmvt) { $m4is_z50f = $m4is_wy71hq[$m4is_jm1_];
 $m4is_tcmvt = $m4is_mxh3;
 } } return $m4is_z50f;
 }  static 
function m4is__huia9($m4is_nzmvj, $m4is_y8dwk, $m4is_koi38 = '') {  $m4is_y8dwk = explode(',', $m4is_y8dwk);
 foreach ($m4is_y8dwk as $m4is_g0bg) { if (isset($m4is_nzmvj[$m4is_g0bg]) ) { $m4is_nzmvj = $m4is_nzmvj[$m4is_g0bg];
 } else { $m4is_nzmvj = $m4is_koi38;
 break;
 } } return $m4is_nzmvj;
 }  static 
function m4is_t8a572( $m4is_t5ot4, $m4is_g5sqlc = 'shortcodes' ) { $m4is_qmr46 = get_stylesheet_directory();
 $m4is_za92q = '/' . $m4is_g5sqlc . '/' . $m4is_t5ot4 . '.php';
 $m4is_ita98 = [  $m4is_qmr46 . '/memberium' . $m4is_za92q, $m4is_qmr46 . '/memberium' . $m4is_za92q, self::$m4is_bnd6ti->m4is_znwy() . '/templates' . $m4is_za92q, ];
 $m4is_ita98 = apply_filters('memberium/shortcodes/template-paths', $m4is_ita98);
 foreach($m4is_ita98 as $m4is_ea6ksm) { if ( file_exists($m4is_ea6ksm) ) { return $m4is_ea6ksm;
 } } error_log("Memberium: Shortcode template for {$m4is_t5ot4} not found.");
 return false;
 }  static 
function m4is_yu7b1r( $name = '', $atts = '', $content = '', $code = '', $data = '' ) { $m4is_um8c3n = self::m4is_t8a572( $name );
 ob_start();
 if ( $m4is_um8c3n ) { include $m4is_um8c3n;
 } else { if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { echo "<P>Template Missing {$name}</P>";
  } } $m4is_uzfw8j = preg_replace( '/\s+/', ' ', ob_get_clean() );
  return $m4is_uzfw8j;
 }  static 
function m4is_sb62m9( $m4is_z50f ) { if (! empty( $m4is_z50f ) ) { $m4is_z50f = '<script type="text/javascript"> document.write(atob("' . substr( base64_encode( utf8_decode( $m4is_z50f ) ), 0, -2 ) . '" + "==") ); </script>';
 } return $m4is_z50f;
 }  static 
function m4is_ryzl($m4is_qnjfv) { $m4is_qnjfv = ( is_array( $m4is_qnjfv ) ) ? $m4is_qnjfv : (array) $m4is_qnjfv;
 foreach ( $m4is_qnjfv as $m4is_s2ge5 => $m4is_jl9zk ) { $m4is_qnjfv[$m4is_s2ge5] = self::m4is_t6b4e( $m4is_jl9zk );
 } return $m4is_qnjfv;
 } static 
function m4is_t6b4e($m4is_ehs5 = '') { if (stripos($m4is_ehs5, '{{') !== false) {  $m4is_ehs5 = str_ireplace('{{ip_address}}', m4is_vv5u::m4is_s15o8k(), $m4is_ehs5);
 $m4is_ehs5 = str_ireplace('{{system_link.home}}', get_home_url(), $m4is_ehs5);
 $m4is_ehs5 = str_ireplace('{{system_link.site}}', get_site_url(), $m4is_ehs5);
 $m4is_ehs5 = str_ireplace('{{current.url}}', $_SERVER['REQUEST_URI'], $m4is_ehs5);
 $m4is_ehs5 = str_ireplace('{{contact_id}}', (isset($_SESSION['memb_user']['crm_id']) ? $_SESSION['memb_user']['crm_id'] : 0), $m4is_ehs5);
 $m4is_ehs5 = str_ireplace('{{post_id}}', get_the_ID(), $m4is_ehs5);
 $m4is_ehs5 = str_ireplace('{{author_contact_id}}', get_the_author_meta('infusionsoft_user_id'), $m4is_ehs5);
    if (stripos($m4is_ehs5, '{{registration_date}}') !== FALSE) { $m4is_x0_hk = wp_get_current_user();
 if ($m4is_x0_hk) { $m4is_ehs5 = str_replace('{{registration_date}}', $m4is_x0_hk->user_registered, $m4is_ehs5);
 } else { $m4is_ehs5 = str_replace('{{registration_date}}', 'Not Registered', $m4is_ehs5);
 } } if (stripos($m4is_ehs5, '{{member.homepage}}') !== FALSE) { if (! empty($_SESSION['memb_user']['login_page']) ) { $m4is_ehs5 = str_ireplace('{{member.homepage}}', get_permalink($_SESSION['memb_user']['login_page']), $m4is_ehs5);
 } else { $m4is_ehs5 = str_replace('{{member.homepage}}', site_url(), $m4is_ehs5);
 } } if (stripos($m4is_ehs5, '{{system_link.') !== FALSE) { $m4is_ehs5 = preg_replace_callback('|({{system_link\.(.*)}})|U', function($m4is_ogxo) { $m4is_afnh = get_option('memberium_pages');
 $m4is_ogxo[2] = isset($m4is_ogxo[2]) ? strtolower($m4is_ogxo[2]) : 'none';
 if (isset($m4is_afnh[$m4is_ogxo[2]]) ) { return get_permalink($m4is_afnh[$m4is_ogxo[2]]);
 } return;
 }, $m4is_ehs5);
 } $m4is_ehs5 = self::m4is_k37rh( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_ip91l( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_uo1t( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_yy8i2( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_q4iygj( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_hexi( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_a9am18( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_gaj1( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_apil8m( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_x45w( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_vgeyi( $m4is_ehs5 );
 $m4is_ehs5 = self::m4is_hj481q( $m4is_ehs5 );
  } $m4is_ehs5 = self::m4is_vg1n( $m4is_ehs5 );
 return $m4is_ehs5;
 }  private static 
function m4is_ga3y( string $m4is_uzfw8j ) : void { if ( strtolower( substr( $m4is_uzfw8j, 0, 6 ) ) === 'field:' ) { $m4is_iqdn = substr( $m4is_uzfw8j, 6 );
 if ( is_user_logged_in() ) { m4is_wbc8os::m4is_ehvrpa( $m4is_iqdn, $m4is_z50f );
 } else { self::$m4is_dked[$m4is_iqdn] = $m4is_z50f;
 } } }    private static 
function m4is_k37rh( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{author_contact_id}}' ) === false ) { return $m4is_wtsqwg;
 } $m4is_uwa1j = get_the_author_meta( 'infusionsoft_user_id' );
 $m4is_wtsqwg = str_ireplace( '{{author_contact_id}}', $m4is_uwa1j, $m4is_wtsqwg );
  return $m4is_wtsqwg;
 } private static 
function m4is_ip91l( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{permalink.' ) === false ) { return $m4is_wtsqwg;
 } $m4is_ehs5 = preg_replace_callback( '|({{permalink\.(.*)}})|U', function( $m4is_ogxo ) { return get_permalink( $m4is_ogxo[2] );
 }, $m4is_ehs5 );
 return $m4is_wtsqwg;
 } private static 
function m4is_uo1t( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{affiliate.' ) === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{affiliate\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_s2ge5 = $m4is_ogxo[2];
 $m4is_oa_z = m4is_wbc8os::m4is_iqywok( $m4is_s2ge5, '' );
 return $m4is_oa_z;
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 } private static 
function m4is_yy8i2( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{contact.' ) === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{contact\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_s2ge5 = $m4is_ogxo[2];
 $m4is_oa_z = m4is_wbc8os::m4is_sfnmc( $m4is_s2ge5, '' );
 return $m4is_oa_z;
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 } private static 
function m4is_hexi( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{cookie.' ) === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{cookie\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_s2ge5 = $m4is_ogxo[2];
 $m4is_oa_z = self::m4is__huia9( $_COOKIE, $m4is_s2ge5 );
 return $m4is_oa_z;
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 } private static 
function m4is_gaj1( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{date.' ) === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{date\.(.*)}})|U', function( $m4is_ogxo ) { $date_format = $m4is_ogxo[2];
 return date( $date_format );
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 } private static 
function m4is_apil8m( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{get.') === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{get\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_s2ge5 = $m4is_ogxo[2];
 $m4is_oa_z = self::m4is__huia9( $_GET, $m4is_s2ge5 );
 return $m4is_oa_z;
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 }  private static 
function m4is_x45w( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{post.') === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{post\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_s2ge5 = $m4is_ogxo[2];
 $m4is_oa_z = self::m4is__huia9( $_POST, $m4is_s2ge5 );
 return $m4is_oa_z;
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 }  private static 
function m4is_vg1n( string $m4is_ehs5 ) : string { $m4is_go9g = ['{{::', '::}}', '<:', ':>'];
 $m4is_a_dje = ['[', ']', '[', ']'];
 $m4is_ehs5 = str_replace( $m4is_go9g, $m4is_a_dje, $m4is_ehs5 );
  return $m4is_ehs5;
 }  private static 
function m4is_pqsy1w( string $m4is_ehs5 ) : string { return str_ireplace( '{{ip_address}}', m4is_vv5u::m4is_s15o8k(), $m4is_ehs5 );
 }  private static 
function m4is_vgeyi( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{random.') === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback( '|({{random\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_zkl9mx = explode( ',', $m4is_ogxo[2] );
 return mt_rand( (int) $m4is_zkl9mx[0], (int) $m4is_zkl9mx[1] );
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 }  private static 
function m4is_a9am18( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{field.') === false ) { return $m4is_wtsqwg;
 } $m4is_ig9p6 = get_current_user_id();
 $m4is_wtsqwg = preg_replace_callback('|({{field\.(.*)}})|U', function( $m4is_ogxo ) use ( $m4is_ig9p6 ) { $m4is_s2ge5 = $m4is_ogxo[2];
 if ( $m4is_ig9p6 ) { return htmlspecialchars( m4is_wbc8os::m4is_u3dzkp( $m4is_s2ge5 ) );
 } return empty( self::$m4is_dked[$m4is_s2ge5] ) ? '' : self::$m4is_dked[$m4is_s2ge5];
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 }  private static 
function m4is_q4iygj( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{usermeta.') === false ) { return $m4is_wtsqwg;
 } $m4is_ig9p6 = get_current_user_id();
 $m4is_wtsqwg = preg_replace_callback('|({{usermeta\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_rs0z_j = ! empty( $m4is_ogxo[2] ) ? strtolower( $m4is_ogxo[2] ) : '';
 if ( $m4is_ig9p6 > 0 && $m4is_rs0z_j > '' ) { return empty( $m4is_rs0z_j ) ? '' : get_user_meta( $m4is_ig9p6, $m4is_rs0z_j, true );
 } else { return '';
 } }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 }  private static 
function m4is_hj481q( string $m4is_wtsqwg ) : string { if ( stripos( $m4is_wtsqwg, '{{session.') === false ) { return $m4is_wtsqwg;
 } $m4is_wtsqwg = preg_replace_callback('|({{session\.(.*)}})|U', function( $m4is_ogxo ) { $m4is_s2ge5 = $m4is_ogxo[2];
 $m4is_oa_z = self::m4is__huia9( $_SESSION, $m4is_s2ge5 );
 return $m4is_oa_z;
 }, $m4is_wtsqwg );
 return $m4is_wtsqwg;
 }  static 
function m4is_eu9s( $m4is_r6nh_b = [], $m4is_qnjfv = [], $m4is_gge4j = '' ) { $m4is_qnjfv = array_merge( (array) $m4is_r6nh_b, (array) $m4is_qnjfv );
 $m4is_a51ew = empty( $m4is_gge4j ) ? 'shortcode_atts' : "shortcode_atts_{$m4is_gge4j}";
 return apply_filters( $m4is_a51ew, $m4is_qnjfv, $m4is_qnjfv, $m4is_r6nh_b, $m4is_gge4j );
 } static 
function m4is_mzob( $m4is_qnjfv = [], array $m4is_r6nh_b = [] ) { $m4is_uzfw8j = '';
 if ( empty( $m4is_qnjfv[0] ) || $m4is_qnjfv[0] !== 'showatts' ) { return false;
 } if ( empty( $m4is_r6nh_b ) ) { $m4is_uzfw8j = 'N/A';
 } else { $m4is_uzfw8j = implode( ',', array_keys( $m4is_r6nh_b ) );
 } return $m4is_uzfw8j;
 } }

