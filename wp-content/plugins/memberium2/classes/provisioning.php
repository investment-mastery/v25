<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
  m4is_u68pu::m4is_x6wv();
 final 
class m4is_u68pu {  const LICENSE_SERVER_URL = 'https://licenseserver.webpowerandlight.com/getlicense.php';
 private static $m4is_bnd6ti;
 private static $m4is_fuyivh;
 private static $m4is_t162q;
 private static $m4is_p1qpn;
 private static $m4is_yvn7gf;
 private 
function __construct() { } static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_fuyivh = 'wpal/census';
 self::$m4is_yvn7gf = 'memberium/licenseserver/updated';
 self::$m4is_t162q = false;
 self::$m4is_p1qpn = false;
 }  static 
function m4is_tlsf() { global $wpdb;
 $m4is_yf71nc = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$wpdb->users}`" );
 update_option( self::$m4is_fuyivh, base_convert( $m4is_yf71nc, 10, 36 ), true );
 return $m4is_yf71nc;
 }  static 
function m4is_q8ry() { $m4is_yf71nc = base_convert( get_option( self::$m4is_fuyivh, 0 ), 36, 10 );
 if ( ! $m4is_yf71nc ) { $m4is_yf71nc = self::m4is_tlsf();
 } return $m4is_yf71nc;
 }  static 
function m4is_u6mkaw() { return self::$m4is_t162q;
 }   static 
function m4is_n7obik() { $m4is_oa3lc2 = self::m4is_x3m4();
 $m4is_iystd2 = isset( $m4is_oa3lc2['tags'] ) ? $m4is_oa3lc2['tags'] : '';
 $m4is_iystd2 = array_filter( explode( ',', strtolower( $m4is_iystd2 ) ) );
 return $m4is_iystd2;
 }  static 
function m4is_o3ey18() { return (boolean) self::$m4is_p1qpn;
 }  static 
function m4is_x3m4( $m4is_ndte = '' ) { $m4is_uu0g = self::m4is_o84q0a();
 $m4is_n52a = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'random_seed' );
 if ( empty( $m4is_ndte ) ) { $m4is_ndte = self::m4is_hx_jg();
 } $m4is_n3zt = 3;
 $m4is_dh_e1 = 32;
 $m4is_oa_z['valid'] = 0;
 $m4is_oa_z['trial_mode'] = 0;
 $m4is_conu = self::m4is_w0hvzb();
 $m4is_wcs02 = strtolower( trim( $m4is_n52a . $m4is_conu ) );
 $m4is_szias = $m4is_n52a;
 if ( $m4is_n3zt == 3 ) { $m4is_iydqu = unserialize( base64_decode( substr( $m4is_ndte, 32 ) ) );
 $m4is_enx4r = substr( $m4is_ndte, 0, 32 );
 $m4is_fb5xj = md5( serialize( $m4is_iydqu ) . strtolower( $m4is_szias ) . strtolower( $m4is_conu ) );
 $m4is_oa_z = $m4is_iydqu;
 if ($m4is_fb5xj == $m4is_enx4r) { $m4is_oa_z['valid'] = 1;
 } else { $m4is_oa_z['valid'] = 0;
 } $m4is_oa_z['active'] = isset( $m4is_iydqu['active'] ) ? $m4is_iydqu['active'] : 0;
 $m4is_oa_z['kill'] = isset( $m4is_iydqu['kill'] ) ? $m4is_iydqu['kill'] : 0;
 $m4is_oa_z['max_users'] = isset( $m4is_iydqu['max_users'] ) ? $m4is_iydqu['max_users'] : 999999999;
 $m4is_oa_z['max_version'] = isset( $m4is_iydqu['max_version'] ) ? $m4is_iydqu['max_version'] : 0;
 $m4is_oa_z['min_version'] = isset( $m4is_iydqu['min_version'] ) ? $m4is_iydqu['min_version'] : 0;
 $m4is_oa_z['next_check'] = isset( $m4is_iydqu['next_check'] ) ? $m4is_iydqu['next_check'] : 0;
 $m4is_oa_z['renewal_date'] = isset( $m4is_iydqu['renewal_date'] ) ? $m4is_iydqu['renewal_date'] : 0;
 $m4is_oa_z['tags'] = isset( $m4is_iydqu['tags'] ) ? $m4is_iydqu['tags'] : '';
 $m4is_oa_z['trial_mode'] = isset( $m4is_iydqu['trial_mode'] ) ? $m4is_iydqu['trial_mode'] : 0;
 $m4is_oa_z['version'] = isset( $m4is_iydqu['version'] ) ? $m4is_iydqu['version'] : 0;
 $m4is_oa_z['now'] = time();
 $m4is_oa_z['check_ttl'] = $m4is_oa_z['next_check'] - time();
 $m4is_oa_z['expiration_ttl'] = $m4is_oa_z['renewal_date'] - time();
 if ( ! empty( $m4is_oa_z['kill'] ) ) { if (! function_exists('deactivate_plugins') ) { require_once ABSPATH . '/wp-admin/includes/plugin.php';
 } $m4is_oa_z['active'] = 0;
 $m4is__vgnju = plugin_basename( MEMBERIUM_HOME );
 deactivate_plugins( $m4is__vgnju, true, false );
 deactivate_plugins( $m4is__vgnju, true, true );
 wp_cache_flush();
 if ( ! headers_sent() ) { $m4is_imdo6 = is_admin() ? admin_url() : get_home_url();
 header( "Location: {$m4is_imdo6}" );
 } exit;
 } }  if ( $m4is_oa_z['expiration_ttl'] < 1 ) { $m4is_oa_z['active'] = 0;
 } if ( $m4is_oa_z['max_users'] < self::m4is_q8ry() ) { $m4is_oa_z['active'] = 0;
 } self::$m4is_p1qpn = (int) $m4is_oa_z['trial_mode'];
 return $m4is_oa_z;
 }   static 
function m4is_o84q0a() { static $m4is_s2ge5 = '';
 if ( empty( $m4is_s2ge5 ) ) { $m4is_imdo6 = self::m4is_w0hvzb();
  $m4is_s2ge5 = 'memberium/license/' . strtolower( soundex( $m4is_imdo6 ) . metaphone( $m4is_imdo6, 16 ) ) . '_' . abs( crc32( $m4is_imdo6 ) );
 } return $m4is_s2ge5;
 }  static 
function m4is_hx_jg() { return get_option( m4is_u68pu::m4is_o84q0a() );
 } static 
function m4is_w0hvzb() { static $m4is_e7qd9m = '';
 if ( empty( $m4is_e7qd9m ) ) { $m4is_e7qd9m = preg_replace( '/^www\./', '', strtolower( parse_url( get_option( 'home' ), PHP_URL_HOST ) ) );
 } return $m4is_e7qd9m;
 }  static 
function m4is_k6nh( bool $m4is_dzkv = false ) { $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 if ( empty( $m4is_zq0k ) ) { return false;
 } if ( $m4is_dzkv === false ) { $m4is_xaqg = time() - (int) get_option( self::$m4is_yvn7gf, 0 );
 $m4is_py0waz = function_exists( 'is_admin' ) && is_admin() ? 300 : HOUR_IN_SECONDS;
 if ( $m4is_xaqg < $m4is_py0waz ) { return self::m4is_hx_jg();
 } } $m4is_n52a = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'random_seed');
 $m4is_uu0g = self::m4is_o84q0a();
 $m4is_xm1h5_ = function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production';
 $m4is_mikeyc = 'None';
 $m4is_oa3lc2 = '';
 $m4is_twy4g0 = [ 'method' => 'POST', 'timeout' => 10, 'redirection' => 5, 'httpversion' => '1.0', 'blocking' => true, 'headers' => [], 'cookies' => [], 'body' => [ 'admin_email' => get_bloginfo('admin_email'), 'appname' => $m4is_zq0k, 'environment' => $m4is_xm1h5_, 'checksum' => $m4is_n52a, 'hostname' => self::m4is_w0hvzb(), 'interval' => 32, 'ioncube_version' => $m4is_mikeyc, 'ip_address' => $_SERVER['SERVER_ADDR'], 'license_key' => '', 'php_version' => phpversion(), 'protocol_version' => 3, 'sku' => 'M4IS', 'url' => get_bloginfo('url'), 'user_count' => self::m4is_q8ry(), 'version' => self::$m4is_bnd6ti->m4is_u04m(), ], ];
 $m4is_d71ub = wp_remote_post( self::LICENSE_SERVER_URL, $m4is_twy4g0 );
 if ( is_array( $m4is_d71ub ) ) { $m4is_oa3lc2 = $m4is_d71ub['body'];
 $m4is_aonj = self::m4is_x3m4( $m4is_oa3lc2 );
 update_option( 'memberium/licenseserver/status', 'pass', true );
 if ( $m4is_aonj['valid'] == 1 ) { update_option( $m4is_uu0g, $m4is_oa3lc2 );
 } else { $m4is_oa3lc2 = self::m4is_hx_jg();
 } } elseif ( is_a( $m4is_d71ub, 'WP_ERROR' ) ) { update_option('memberium/licenseserver/status', 'fail', true);
 } update_option( self::$m4is_yvn7gf, time(), 'yes');
 return $m4is_oa3lc2;
 }   static 
function m4is_i9k3m() : bool { static $m4is_t162q = -1;
  if ( is_bool( $m4is_t162q ) ) { return (boolean) $m4is_t162q;
 } $m4is_oa3lc2 = self::m4is_hx_jg();
 $m4is_aonj = self::m4is_x3m4( $m4is_oa3lc2 );
 $m4is_a5jl = false;
 if ( ! $m4is_aonj['active'] ) { $m4is_a5jl = true;
 } if ( ! $m4is_aonj['valid'] ) { $m4is_a5jl = true;
 } if ( $m4is_aonj['check_ttl'] < 10800 ) { $m4is_a5jl = true;
 } if ( false && $m4is_a5jl ) { $m4is_oa3lc2 = self::m4is_k6nh();
 $m4is_aonj = self::m4is_x3m4( $m4is_oa3lc2 );
 }  $m4is_t162q = isset( $m4is_aonj['active'] ) ? (int) $m4is_aonj['active'] : 0;
  if ( $m4is_t162q && isset( $m4is_aonj['max_users'] ) ) { if ($m4is_aonj['max_users'] < self::m4is_q8ry() ) { $m4is_t162q = 0;
 } } if ($m4is_t162q && isset($m4is_aonj['max_version']) ) { if (version_compare($m4is_aonj['max_version'], self::$m4is_bnd6ti->m4is_u04m() ) <= 0) { $m4is_t162q = 0;
 } } self::$m4is_t162q = (bool) $m4is_t162q;
 return self::$m4is_t162q;
 }   static 
function m4is_u26m8u( array $m4is__kqia = [] ) : bool { $m4is_zuv1 = self::m4is_n7obik();
 foreach( $m4is__kqia as $m4is_mpia ) { if ( in_array( $m4is_mpia, $m4is_zuv1 ) ) { return true;
 } } return false;
 } }

