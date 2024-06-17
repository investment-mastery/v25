<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_i1jld5::m4is_x6wv();
 final 
class m4is_i1jld5 { const DEV_UPDATE_URL = 'https://licenseserver.webpowerandlight.com/memberium-is/current-version.php';
 const PLUGIN_FULLSLUG = 'memberium2/memberium2.php';
 const PLUGIN_HOME = MEMBERIUM_HOME;
 const PLUGIN_SLUG = 'memberium2';
 const PLUGIN_UPDATE_URL = 'https://licenseserver.webpowerandlight.com/memberium-is/current-version.php';
 const PLUGIN_URL = 'https://memberium.com/';
 const PRODUCTION_UPDATE_URL = 'https://licenseserver.webpowerandlight.com/memberium-is/current-version.php';
 const UPDATE_ID = 31415926547;
 static private $m4is_bnd6ti;
 static private $m4is_esdzy;
 static private $m4is_r4a1r;
 static private $m4is_g31w0s;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_esdzy = 'memberium2/memberium2.php';
 self::$m4is_g31w0s = 31415926547;
 self::$m4is_r4a1r = 'https://licenseserver.webpowerandlight.com/memberium-is/current-version.php';
 } private 
function __construct() {}  static 
function m4is_m9l2() : string { self::m4is_t0w5q();
 return get_option('memberium/updater/version', 0);
 }  static 
function m4is_wtob() : string { $m4is_xm1h5_ = function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production';
  $m4is_jxhf = [ 'local' => self::DEV_UPDATE_URL, 'development' => self::DEV_UPDATE_URL, 'staging' => self::PRODUCTION_UPDATE_URL, 'production' => self::PRODUCTION_UPDATE_URL, ];
 $m4is_imdo6 = isset($m4is_jxhf[$m4is_xm1h5_]) ? $m4is_jxhf[$m4is_xm1h5_] : PRODUCTION_UPDATE_URL;
 $m4is_bu7y = self::$m4is_bnd6ti->m4is_u04m();
 $m4is_ovm5 = get_bloginfo('admin_email');
 $m4is_yf71nc = m4is_u68pu::m4is_q8ry();
 $m4is_pi08fp = phpversion();
 $m4is_ml7s2b = parse_url(get_bloginfo('url'), PHP_URL_HOST);
 $m4is_yclkvi = self::$m4is_bnd6ti->m4is_hh9s();
 $m4is_rbwn1z = [ 'admin' => rawurlencode($m4is_ovm5), 'domain' => rawurlencode($m4is_ml7s2b), 'env' => rawurlencode($m4is_xm1h5_), 'm4ac' => rawurlencode($m4is_bu7y), 'php' => rawurlencode($m4is_pi08fp), 'users' => rawurlencode($m4is_yf71nc), 'wp' => rawurlencode($m4is_yclkvi), ];
 $m4is_imdo6 = add_query_arg($m4is_rbwn1z, $m4is_imdo6);
 return $m4is_imdo6;
 } static 
function m4is_t0w5q(bool $m4is_dzkv = false) { if (! $m4is_dzkv) { $m4is_zbip = time() - get_option('memberium/updater/timestamp', 0);
 if ($m4is_zbip > 0 && $m4is_zbip < 3600) { return false;
 } } $m4is_a3mq5 = [ 'timeout' => 5, ];
 $m4is_zkrez = self::$m4is_bnd6ti->m4is_u04m();
 $m4is_l4zl = self::m4is_wtob();
 $m4is_d71ub = wp_remote_get($m4is_l4zl, $m4is_a3mq5);
 if (! is_a($m4is_d71ub, 'WP_Error') && isset($m4is_d71ub['body'])) { $m4is_wjqm0a = unserialize($m4is_d71ub['body']);
 if (isset($m4is_wjqm0a->version) ) { update_option('memberium/updater/data', $m4is_wjqm0a, false);
 update_option('memberium/updater/version', $m4is_wjqm0a->version, false);
 update_option('memberium/updater/timestamp', time(), false);
 } else { error_log('Memberium:  Plugin update check failed.  Cannot fetch current version information.  Please contact support@memberium.com');
 return false;
 } } return true;
 } static 
function m4is_hcyf($m4is_ca6e7, $m4is_k4yeul, $m4is_v6fdv4) { if (property_exists($m4is_v6fdv4, 'slug') ) { if ($m4is_v6fdv4->slug == self::PLUGIN_SLUG) { return true;
 } } return false;
 } static 
function m4is__c18pq($m4is_ca6e7, $m4is_k4yeul, $m4is_v6fdv4) { if (property_exists($m4is_v6fdv4, 'slug') ) { if ($m4is_v6fdv4->slug == self::PLUGIN_SLUG) { $m4is_m9g2qy = unserialize(m4is_vv5u::m4is_mh0v(self::PLUGIN_UPDATE_URL) );
 if (is_object($m4is_m9g2qy) ) { return $m4is_m9g2qy;
 } } } return $m4is_ca6e7;
 } static 
function m4is_b1dq($m4is__9uc) { $m4is_ca6e7 = unserialize(m4is_vv5u::m4is_mh0v(self::PLUGIN_UPDATE_URL) );
 if (is_object($m4is_ca6e7) ) { if (! function_exists('get_plugin_data') ) { require_once ABSPATH . 'wp-admin/includes/plugin.php';
 } $m4is_mqjcy4 = get_plugin_data(self::PLUGIN_HOME, false, false);
 $m4is_esdzy = self::PLUGIN_FULLSLUG;
 $m4is_xy5g = $m4is_ca6e7->version;
 $m4is_yselkq = $m4is_mqjcy4['Version'];
 $m4is_wlqsgr = new stdClass;
 $m4is_wlqsgr->id = self::UPDATE_ID;
 $m4is_wlqsgr->slug = self::PLUGIN_SLUG;
 $m4is_wlqsgr->plugin = $m4is_esdzy;
 $m4is_wlqsgr->new_version = $m4is_ca6e7->version;
 $m4is_wlqsgr->url = self::PLUGIN_URL;
 $m4is_wlqsgr->package = $m4is_ca6e7->download_link;
 $m4is_wlqsgr->upgrade_notice = $m4is_ca6e7->upgrade_notice;
 $m4is_wlqsgr->tested = $m4is_ca6e7->tested;
 $m4is_wlqsgr->icons = $m4is_ca6e7->icons;
 if (version_compare($m4is_xy5g, $m4is_yselkq, 'gt') ) { $m4is__9uc->response[$m4is_wlqsgr->plugin] = $m4is_wlqsgr;
 } elseif (! empty($m4is__9uc->response) ) { unset($m4is__9uc->response[$m4is_esdzy]);
 } } return $m4is__9uc;
 }  private static 
function m4is_vm0dx6() : bool { if ( ! is_writable( MEMBERIUM_HOME ) ) { return false;
 } $m4is_ibepl4 = strtolower( trim( self::$m4is_bnd6ti->m4is_u04m() ) );
 $m4is_mk7y = (bool) self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'autoupdate' );
 $m4is_mk7y = $m4is_mk7y || ! m4is_u68pu::m4is_i9k3m();
 if ( ! $m4is_mk7y ) { $m4is_hy_76 = ['dev', 'alpha', 'beta', 'rc', 'pl'];
 foreach ( $m4is_hy_76 as $m4is_rs_zx ) { if ( ! $m4is_mk7y ) { $m4is_mk7y = (bool) strpos( $m4is_ibepl4, $m4is_rs_zx );
 } } } return $m4is_mk7y;
 }  static 
function m4is_chswmy() { if ( ! self::m4is_vm0dx6() ) { return;
 } if ( ! function_exists( 'get_plugin_data' ) ) { require_once ABSPATH . 'wp-admin/includes/plugin.php';
 } $m4is_ca6e7 = wp_remote_get( self::PLUGIN_UPDATE_URL );
 $m4is_ca6e7 = is_array( $m4is_ca6e7 ) ? $m4is_ca6e7 = unserialize( $m4is_ca6e7['body'] ) : [];
 $m4is__8htld = false;
 $m4is_zcho = get_plugin_data( self::PLUGIN_HOME, false, false );
 $m4is_xy5g = is_object( $m4is_ca6e7 ) && property_exists( $m4is_ca6e7, 'version' ) ? $m4is_ca6e7->version : '';
 $m4is_yselkq = self::$m4is_bnd6ti->m4is_u04m();
 if ( version_compare( $m4is_xy5g, $m4is_yselkq, 'gt' ) ) { ignore_user_abort();
   require_once ABSPATH .'/wp-admin/includes/file.php';
  $m4is_s37d = WP_PLUGIN_DIR;
 $m4is_ldtv = download_url( $m4is_ca6e7->download_link, 300 );
  if ( file_exists( $m4is_ldtv ) ) {   require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
 require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';
 file_put_contents( ABSPATH . '.maintenance', '<?php $upgrading = time();' );
 WP_Filesystem();
 $m4is_koi_zv = new wp_filesystem_direct(null);
 $m4is_u_lhbg = self::$m4is_bnd6ti->m4is_znwy();
 $m4is_koi_zv->delete( $m4is_u_lhbg, true );
 if ( ! function_exists( 'disk_free_space' ) ) { add_filter( 'wp_doing_cron', '__return_false', 10, 1 );
 } unzip_file( $m4is_ldtv, $m4is_s37d );
 remove_filter( 'wp_doing_cron', '__return_false', 10 );
 if ( function_exists( 'opcache_reset' ) ) { opcache_reset();
 wp_cache_flush();
 } unlink( $m4is_ldtv );
 $m4is__8htld = true;
 } } if (file_exists(ABSPATH . '.maintenance') ) { unlink(ABSPATH . '.maintenance');
 } return $m4is__8htld;
 }  static 
function m4is_v346t( $m4is_pmbsie, $m4is_ymls48, $m4is__vgnju, $m4is_w3gc8 ) { if ( $m4is_pmbsie === false ) { self::m4is_t0w5q( false );
 $m4is_f7kqy = get_option( 'memberium/updater/data', [] );
 $m4is_hlfu = $m4is_ymls48['Version'] ?? '0.0.0';
 $m4is_xy5g = $m4is_f7kqy->version;
 $m4is_oy7t = version_compare( $m4is_hlfu, $m4is_xy5g, '<' );
 if ( $m4is_oy7t ) { $m4is_pmbsie = [ 'id' => $m4is_ymls48['UpdateURI'], 'slug' => plugin_basename( MEMBERIUM_HOME ), 'version' => $m4is_xy5g, 'url' => 'https://memberium.com/activecampaign/', 'package' => $m4is_f7kqy->download_link, 'tested' => $m4is_f7kqy->tested, 'requires_php' => $m4is_f7kqy->requires_php, 'autoupdate' => self::elf_autoupdate_enabled(), ];
 } }  return $m4is_pmbsie;
 } }

