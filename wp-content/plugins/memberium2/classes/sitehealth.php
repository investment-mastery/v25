<?php
/**
* Copyright (c) 2022-2024 David J Bullock
* Web Power and Light, LLC
* https://webpowerandlight.com
* support@webpowerandlight.com
*
*/

 class_exists('m4is_pms8y') || die();
 m4is_ntvqsw::m4is_x6wv();
 final 
class m4is_ntvqsw {  static private $m4is_xm1h5_ = 'production';
 static private $m4is_yr0_ = '<a href="https://memberium.com/support/" target="_blank">contact support</a>';
 static private $m4is_bnd6ti;
 private 
function __construct() { } static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 }     static 
function m4is_pktn( array $m4is_fk6e78 ) : array { self::$m4is_xm1h5_ = defined( 'WP_ENVIRONMENT_TYPE' ) ? WP_ENVIRONMENT_TYPE : self::$m4is_xm1h5_;
 self::$m4is_xm1h5_ = function_exists( 'WP_ENVIRONMENT_TYPE' ) ? wp_get_environment_type() : self::$m4is_xm1h5_;
 $m4is_azd3yf = wp_get_update_data();
 $m4is_conu = php_uname( 'n' );
 $m4is_oqu3j = defined( 'I2SDK_VERSION' ) ? I2SDK_VERSION : 'Unknown';
 $m4is_kc5ju8 = defined( 'MEMBERIUM_SKU' ) ? strtoupper( MEMBERIUM_SKU ) : 'Unknown';
 $m4is_kxsrn = self::$m4is_bnd6ti->m4is_f25d();
 $m4is_a29_4 = self::$m4is_bnd6ti->m4is_u04m();
 $m4is_wfrlep = property_exists( 'PhpXmlRpc\PhpXmlRpc', 'xmlrpcVersion' ) ? PhpXmlRpc\PhpXmlRpc::$xmlrpcVersion : 'Unknown';
 $m4is_oa3lc2 = m4is_u68pu::m4is_x3m4( get_option( self::$m4is_bnd6ti->license_key_name, '' ) );
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 $m4is_qh8p6 = count( self::$m4is_bnd6ti->m4is_oiewvu( 'memberships' ) );
 $m4is_dv4rg = self::$m4is_bnd6ti->m4is_hh9s();
 $m4is_fjy0 = self::m4is_ahjf();
 $m4is_fnb8 = self::m4is_u_h1();
 $m4is__58b = self::m4is_rw7rk();
 $m4is_s5yrs3 = count( array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'ignore_contact_fields' )['settings'] ) ) );
 $m4is_wxj9 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'autoupdate' );
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_wlvf = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only' ) ? 'Yes' : 'No';
 $m4is_jng9m8 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'require_membership' ) ? 'Yes' : 'No';
 $m4is_xpw0 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'httppost_log' ) ? 'Yes' : 'No';
 if ( isset( $m4is_fk6e78['wp-core']['fields']['version'] ) ) { $m4is_fk6e78['wp-core']['fields']['version']['value'] = $m4is_dv4rg;
 $m4is_fk6e78['wp-core']['fields']['version']['debug'] = $m4is_dv4rg;
 } if ( is_array( $m4is_oa3lc2 ) ) { $m4is_nuam = [ 'Active' => empty( $m4is_oa3lc2['active'] ) ? 'No' : 'Yes', 'Max Users' => empty( $m4is_oa3lc2['max_users'] ) ? 0 : $m4is_oa3lc2['max_users'], 'Hostname' => isset( $m4is_oa3lc2['hostname'] ) ? $m4is_oa3lc2['hostname'] : 'Unknown', 'Owner Email' => isset( $m4is_oa3lc2['owner_email'] ) ? $m4is_oa3lc2['owner_email'] : 'Unknown', 'License Name' => isset( $m4is_oa3lc2['license_name'] ) ? $m4is_oa3lc2['license_name'] : 'Unknown', 'Tags' => isset( $m4is_oa3lc2['tags'] ) ? $m4is_oa3lc2['tags'] : 'None', ];
 } else { $m4is_nuam = 'None';
 } $m4is_efj8 = [ 'wp-core' => $m4is_fk6e78['wp-core'], 'wpal-memberium' => [ 'label' => 'Memberium', 'fields' => [ 'sku' => [ 'label' => 'SKU', 'value' => $m4is_kc5ju8, 'private' => false, ], 'version' => [ 'label' => 'Installed Version', 'value' => $m4is_a29_4, 'private' => false, ], 'license' => [ 'label' => 'License', 'value' => $m4is_nuam, 'private' => false, ], 'autoupdate' => [ 'label' => 'Autoupdate', 'value' => empty($m4is_wxj9) ? 'No' : 'Yes', 'private' => false, ], 'i2sdk/version' => [ 'label' => 'Keap Connection Version', 'value' => $m4is_oqu3j, 'private' => false, ], 'i2sdk/app' => [ 'label' => 'Keap App Name', 'value' => $m4is_zq0k, 'private' => false, ], 'i2sdk/xmlrpcversion' => [ 'label' => 'XML/RPC Library Version', 'value' => $m4is_wfrlep, 'private' => false, ], 'hostname' => [ 'label' => 'Hostname', 'value' => $m4is_conu, 'private' => false, ], 'proxies' => [ 'label' => 'Proxies', 'value' => empty($m4is_fjy0['data']) ? 'None' : $m4is_fjy0['data'], 'private' => false, ], 'ssl' => [ 'label' => 'SSL', 'value' => is_ssl() ? 'Yes' : 'No', 'private' => false, ], 'php_version' => [ 'label' => 'PHP Version', 'value' => phpversion(), 'private' => false, ], 'wp_version' => [ 'label' => 'WordPress Version', 'value' => self::$m4is_bnd6ti->m4is_hh9s(), 'private' => false, ], 'plugins/caching' => [ 'label' => 'Caching Plugins', 'value' => empty($m4is_fnb8['data']) ? 'None' : $m4is_fnb8['data'], 'private' => false, ], 'plugins/membership' => [ 'label' => 'Membership Plugins', 'value' => empty($m4is__58b['data']) ? 'None' : $m4is__58b['data'], 'private' => false, ], 'updates/plugins' => [ 'label' => 'Outdated Plugins', 'value' => empty($m4is_azd3yf['plugins']) ? 0 : $m4is_azd3yf['plugins'], 'private' => false, ], 'updates/themes' => [ 'label' => 'Outdated Themes', 'value' => empty($m4is_azd3yf['themes']) ? 0 : $m4is_azd3yf['themes'], 'private' => false, ], 'updates/core' => [ 'label' => 'Outdated WordPress Core', 'value' => empty($m4is_azd3yf['wordpress']) ? 0 : $m4is_azd3yf['wordpress'], 'private' => false, ], 'object_cache' => [ 'label' => 'Object Cache', 'value' => wp_using_ext_object_cache() ? 'Yes' : 'No', 'private' => false, ], 'users' => [ 'label' => 'Users', 'value' => m4is_u68pu::m4is_q8ry(), 'private' => false, ], 'tags/count' => [ 'label' => 'Tags', 'value' => m4is_pwtg7::m4is_c69nfv(), 'private' => false, ], 'categories/count' => [ 'label' => 'Tag Categories', 'value' => m4is_a18xl::m4is_ay9g(), 'private' => false, ], 'fields/custom/count' => [ 'label' => 'Custom Fields', 'value' => m4is_a8iaym::m4is__z5gv4(), 'private' => false, ], 'fields/synced/count' => [ 'label' => 'Synced Contact Fields', 'value' => count(m4is_ho3l::m4is_kjedy2('Contact', true) ), 'private' => false, ], 'fields/blocked/count' => [ 'label' => 'Blocked Contact Fields', 'value' => $m4is_s5yrs3, 'private' => false, ], 'fields/password' => [ 'label' => 'Password Field', 'value' => $m4is_dcf_7, 'private' => false, ], 'settings/secure_password' => [ 'label' => 'Secure Passwords', 'value' => $m4is_wlvf, 'private' => false, ], 'settings/require_membership' => [ 'label' => 'Require Membership', 'value' => $m4is_jng9m8, 'private' => false, ], 'settings/httppost_log' => [ 'label' => 'HTTP POST Log', 'value' => $m4is_xpw0, 'private' => false, ], 'actionsets/count' => [ 'label' => 'Actionsets', 'value' => m4is_tvc2xn::m4is__p09(), 'private' => false, ], 'products/count' => [ 'label' => 'Products', 'value' => self::m4is_q4lma3(), 'private' => false, ], 'invoices/count' => [ 'label' => 'Invoices', 'value' => self::m4is_m0rna5(), 'private' => false, ], 'merchant_id' => [ 'label' => 'Merchant ID', 'value' => self::$m4is_bnd6ti->m4is_oiewvu('settings', 'merchant_account_id'), 'private' => false, ], 'memberships/count' => [ 'label' => 'Membership Levels', 'value' => $m4is_qh8p6, 'private' => false, ],               'shortcodes/nesting' => [ 'label' => 'Shortcode Nesting Levels', 'value' => MEMBERIUM_NESTING_LEVELS, 'private' => false, ], ], ] ];
 return array_merge($m4is_efj8, $m4is_fk6e78);
 } static 
function m4is_vjd_k( array $m4is_ocuzs ) : array { self::$m4is_xm1h5_ = defined( 'WP_ENVIRONMENT_TYPE' ) ? WP_ENVIRONMENT_TYPE : self::$m4is_xm1h5_;
 self::$m4is_xm1h5_ = function_exists( 'WP_ENVIRONMENT_TYPE' ) ? wp_get_environment_type() : self::$m4is_xm1h5_;
 if ( self::$m4is_xm1h5_ === 'staging' || self::$m4is_xm1h5_ == 'local' ) { unset( $m4is_ocuzs['direct']['wpal/server/phpinfo'] );
  } $m4is_ocuzs['direct']['wpal/memberium/server/sessions'] = [ 'label' => 'Session Storage', 'test' => [__CLASS__, 'm4is_w8jx_'], ];
 $m4is_ocuzs['direct']['wpal/memberium/wordpress/securitykeys'] = [ 'label' => 'Security Keys', 'test' => [__CLASS__, 'm4is_r0u67v'], ];
 $m4is_ocuzs['direct']['wpal/memberium/security/plaintext_password'] = [ 'label' => 'Plaintext Password', 'test' => [__CLASS__, 'm4is_stuvoe'], ];
 $m4is_ocuzs['direct']['wpal/memberium/performance/memory'] = [ 'label' => 'Memory Allocation', 'test' => [__CLASS__, 'm4is__opf'], ];
 $m4is_ocuzs['direct']['wpal/memberium/security/default_role'] = [ 'label' => 'Default Role', 'test' => [__CLASS__, 'm4is_iofz_'], ];
 $m4is_ocuzs['direct']['wpal/memberium/security/caching'] = [ 'label' => 'Caching Plugins', 'test' => [__CLASS__, 'm4is_g6zg'], ];
 $m4is_ocuzs['direct']['wpal/memberium/security/cloudflare'] = [ 'label' => 'Cloudflare', 'test' => [__CLASS__, 'm4is_ahjf'], ];
 $m4is_ocuzs['direct']['wpal/memberium/tables'] = [ 'label' => 'Database Tables', 'test' => [__CLASS__, 'm4is_zcjp'], ];
 $m4is_ocuzs['direct']['wpal/memberium/flywheel'] = [ 'label' => 'FlyWheel Caching', 'test' => [__CLASS__, 'm4is_im5q'], ];
 $m4is_ocuzs['direct']['wpal/memberiums/security/licenseserver'] = [ 'label' => 'Memberium License Server', 'test' => [__CLASS__, 'm4is_jko2_'], ];
 $m4is_ocuzs['direct']['wpal/memberium/network_activation'] = [ 'label' => 'Memberium Network Activation', 'test' => [__CLASS__, 'm4is_k16jcf'], ];
 $m4is_ocuzs['direct']['wpal/memberium/memberships'] = [ 'label' => 'Membership Setup', 'test' => [__CLASS__, 'm4is_xl945'], ];
 $m4is_ocuzs['direct']['wpal/memberium/contact/contactnotes'] = [ 'label' => 'ContactNotes Sync', 'test' => [__CLASS__, 'm4is_u1xf92'], ];
 $m4is_ocuzs['direct']['wpal/memberium/tags'] = [ 'label' => 'CRM Tag Sync', 'test' => [__CLASS__, 'm4is_uk0u'], ];
 $m4is_ocuzs['direct']['wpal/memberium/installer/active'] = [ 'label' => 'Memberium Installer Plugin', 'test' => [__CLASS__, 'm4is_wkcr0'], ];
 $m4is_ocuzs['direct']['wpal/memberium/file_permissions'] = [ 'label' => 'Memberium File Permissions', 'test' => [__CLASS__, 'm4is_q_e5il'], ];
 $m4is_ocuzs['direct']['wpal/i2sdk/installed'] = [ 'label' => 'i2SDK Plugin Installed', 'test' => [__CLASS__, 'm4is_xb9q0'], ];
  $m4is_ocuzs['direct']['wpal/memberium/version'] = [ 'label' => 'Memberium Version', 'test' => [__CLASS__, 'm4is_k0e5'], ];
 $m4is_ocuzs['direct']['wpal/memberium/autoupdate'] = [ 'label' => 'Memberium Autoupdate', 'test' => [__CLASS__, 'elf_test_memberium_autoupdate'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/admin_is_admin'] = [ 'label' => 'Admin User should be renamed', 'test' => [__CLASS__, 'm4is_l4gib'], ];
 $m4is_ocuzs['direct']['wpal/memberium/support_account'] = [ 'label' => 'Memberium Support users should be removed', 'test' => [__CLASS__, 'm4is_d_28p'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/missing_autoincrement'] = [ 'label' => 'WordPress Database Corruption', 'test' => [__CLASS__, 'm4is_i9g8q0'], ];
 $m4is_ocuzs['direct']['wpal/server/phpinfo'] = [ 'label' => 'PHPinfo() Security Issue', 'test' => [__CLASS__, 'm4is_hom4'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/open_registration'] = [ 'label' => 'Open Registration', 'test' => [__CLASS__, 'm4is_rhv2'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/object_cache'] = [ 'label' => 'Object Caching', 'test' => [__CLASS__, 'm4is_lcnm'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/administrator_email'] = [ 'label' => 'Site Administrator Email', 'test' => [__CLASS__, 'm4is_n9r6'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/goaddy/managed'] = [ 'label' => 'GoDaddy Managed Hosting', 'test' => [__CLASS__, 'm4is_ouih'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/plugins/caching'] = [ 'label' => 'Caching Plugins', 'test' => [__CLASS__, 'm4is_u_h1'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/plugins/membership'] = [ 'label' => 'Membership Plugins', 'test' => [__CLASS__, 'm4is_rw7rk'], ];
 $m4is_ocuzs['direct']['wpal/wordpress/plugins/buddypress_private_network'] = [ 'label' => 'Possible BuddyPress Site Security Conflict', 'test' => [__CLASS__, 'm4is_ap_cr'], ];
 $m4is_ocuzs['direct']['wpal/memberium/password/blocked'] = [ 'label' => 'Memberium Password Sync', 'test' => [__CLASS__, 'm4is_ttc62f'], ];
 $m4is_ocuzs['direct'][] = [ 'label' => 'wpal/woocommerce/guest_checkout', 'test' => [__CLASS__, 'm4is_ew7b0'], ];
 return $m4is_ocuzs;
 }    static 
function m4is_q4lma3() : int { global $wpdb;
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_tcw1l = MEMBERIUM_DB_PRODUCTS;
 $m4is_tovizk = "SELECT count(`id`) from `{$m4is_tcw1l}` WHERE `appname` = '{$m4is_zq0k}'";
 return (int) $wpdb->get_var($m4is_tovizk);
 } static 
function m4is_m0rna5() : int { global $wpdb;
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_tcw1l = MEMBERIUM_DB_INVOICES;
 $m4is_tovizk = "SELECT count(`id`) from `{$m4is_tcw1l}` WHERE `appname` = '{$m4is_zq0k}'";
 return (int) $wpdb->get_var($m4is_tovizk);
 } static 
function m4is_sfzx() : string { $m4is_nymjfo = 'Unknown';
 $m4is_nymjfo = empty($_SERVER['PRESSIDIUM_INSTALL_NAME']) ? $m4is_nymjfo : 'Pressidium';
 $m4is_nymjfo = empty($_SERVER['PRESSIDIUM_ACCOUNT_NAME']) ? $m4is_nymjfo : 'Pressidium';
 $m4is_nymjfo = empty($_SERVER['PRESSIDIUM_ENVIRONMENT']) ? $m4is_nymjfo : 'Pressidium';
 return $m4is_nymjfo;
 }  static 
function m4is_ap_cr() : array { $m4is_oa_z = [];
 if (function_exists('bp_is_active') || function_exists('buddypress') ) { $m4is_zftouj = get_option('bp-enable-private-network', 1);
 if ($m4is_zftouj == 0) { $m4is_oa_z = [ 'label' => 'BuddyPress Private Networking', 'status' => 'recommended', 'badge' => [ 'label' => __('Security'), 'color' => 'orange', ], 'description' => "<p>Memberium has detected that you're using BuddyPress/BuddyBoss's private network feature.</p>", 'actions' => "<p>This feature may cause problems with page access controls.  We recommmend disabling this feature and letting Memberium manage site access.</p>", 'test' => 'wpal_wordpress_plugins_buddypress_private_network', ];
 } } return $m4is_oa_z;
 } static 
function m4is_u_h1() : array { if (! function_exists('get_plugins') ) { require_once ABSPATH . 'wp-admin/includes/plugin.php';
 } $m4is_oa_z = [];
 $m4is_ey2tl = array_merge(get_plugins(), get_mu_plugins() );
 $m4is_she09 = [];
 $m4is_sjnrgx = [ 'endurance-page-cache.php', 'breeze/breeze.php', 'cache-enabler/cache-enabler.php', 'cachify/cachify.php', 'comet-cache/comet-cache.php', 'ezcache/ezcache.php', 'hummingbird-performance/wp-hummingbird.php', 'litespeed-cache/litespeed-cache.php', 'nginx-cache/nginx-cache.php', 'nginx-helper/nginx-helper.php', 'preload-fullpage-cache/preload-fullpage-cache.php', 'purge-varnish/class_purge_varnish.php', 'rapid-cache/rapid-cache.php', 'sg-cachepress/sg-cachepress.php', 'simple-cache/simple-cache.php', 'swift-performance-lite/performance.php', 'vcaching/vcaching.php', 'widget-output-cache/widget-output-cache.php', 'wp-cloudflare-page-cache/wp-cloudflare-super-page-cache.php', 'wp-fastest-cache/wpFastestCache.php', 'wp-super-cache/wp-cache.php', 'wpcacheon/wp-cache-on.php', ];
 foreach($m4is_sjnrgx as $m4is_tsdhmx) { if (array_key_exists($m4is_tsdhmx, $m4is_ey2tl)) { $m4is_mqjcy4 = $m4is_ey2tl[$m4is_tsdhmx];
 $m4is_oc8ayu = isset($m4is_mqjcy4['Name']) ? $m4is_mqjcy4['Name'] : $m4is_ijs9k;
 $m4is_r4tza = isset($m4is_mqjcy4['Version']) ? $m4is_mqjcy4['Version'] : '';
 $m4is_she09[] = $m4is_oc8ayu . ' v' . $m4is_r4tza;
 } } if (! empty($m4is_she09)) { $m4is_oa_z = [ 'label' => 'Caching Plugins Found', 'status' => 'recommended', 'badge' => [ 'label' => __('Security'), 'color' => 'red', ], 'description' => "<p>The following caching plugins were found installed on your system.  " . "Improper configuration of these plugins can cause problems including access controls being broken, data corruption, and the wrong information displayed to the wrong user.</p>", 'actions' => '<p>We recommend deactivating and removing these plugins.  ' . 'If the plugin is required, please ensure it is not caching logged in users or pages with secure forms.</p>', 'test' => 'wpal_wordpress_plugins_caching', 'data' => $m4is_she09, ];
 foreach($m4is_she09 as $m4is_pj3t7) { $m4is_oa_z['description'] .= $m4is_pj3t7 . '<br />';
 } } return $m4is_oa_z;
 } static 
function m4is_u1xf92() : array { $m4is_vc9i07 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' );
 $m4is_vc9i07 = array_filter (explode( ',', $m4is_vc9i07 ) );
 $m4is_irel = count( $m4is_vc9i07 );
 $m4is_vc0z = get_admin_url( null, 'admin.php?page=memberium-sync-options&tab=contactfields' );
 $m4is_oa_z = [ 'label' => 'Contact Field Sync Options', 'status' => 'good', 'badge' => [ 'label' => __('Performance'), 'color' => 'green', ], 'description' => '', 'actions' => '', 'test' => 'wpal_memberium_contact_contactnotes', ];
 if (empty($m4is_vc9i07)) { $m4is_oa_z['status'] = 'recommended';
 $m4is_oa_z['badge']['color'] = 'orange';
 $m4is_oa_z['description'] = '<p>Your system is set to sync all contact fields.  Most sites do not need all fields, and can save memory, disk space, and increase performance by only syncing the needed contact fields from Keap.</p>';
 $m4is_oa_z['description'] .= '<p>At a minimum, the <strong>ContactNotes</strong> field should be blocked from syncing.</p>';
 $m4is_oa_z['actions'] = "<p><a href='{$m4is_vc0z}'>Click Here</a> to choose which fields to block from being synced.</p>";
 } else { if (! in_array('ContactNotes', $m4is_vc9i07) ) { $m4is_oa_z['status'] = 'recommended';
 $m4is_oa_z['badge']['color'] = 'orange';
 $m4is_oa_z['description'] = '<p>Your Memberium system is set to sync the <strong>ContactNotes</strong> field.  The <strong>ContactNotes</strong> field is almost never used in membership sites, however it can also be very large causing performance and memory problems.</p>';
 $m4is_oa_z['actions'] = "<p><a href='{$m4is_vc0z}'>Click Here</a> to choose which fields to block from being synced.</p>";
 } } if ($m4is_oa_z['status'] == 'good') { $m4is_oa_z['description'] = '<p>Your contact field sync options are setup correctly.</p>';
 } return $m4is_oa_z;
 } static 
function m4is_i9g8q0() : array { global $wpdb;
 $m4is_xm2h = [];
 $m4is_p6_h = [];
 $m4is_tplu = [ $wpdb->commentmeta => 'meta_id', $wpdb->comments => 'comment_ID', $wpdb->postmeta => 'meta_id', $wpdb->posts => 'ID', $wpdb->usermeta => 'umeta_id', $wpdb->users => 'ID', ];
 foreach($m4is_tplu as $m4is_dj_2 => $m4is_ef9wx) { $m4is_tovizk = "SELECT count(`{$m4is_ef9wx}`) FROM `{$m4is_dj_2}` WHERE `{$m4is_ef9wx}` = 0";
 $m4is_yer1mp = (int) $wpdb->get_var($m4is_tovizk);
 if ($m4is_yer1mp) { $m4is_p6_h[$m4is_dj_2] = $m4is_ef9wx;
 } } if (count($m4is_p6_h) ) { $m4is_xm2h = [ 'label' => 'WordPress Database AutoIncrement Corruption', 'status' => 'critical', 'badge' => [ 'label' => __('Database'), 'color' => 'red', ], 'description' => "<p>Your WordPress database AutoIncrement columns are corrupted or missing, and is causing data loss.</p><p>The following tables are affected:</p>", 'actions' => '<p>We recommend you contact your hosting service and ask them to repair the damaged columns and indexes.</p>', 'test' => 'wpal_wordpress_autoincrement', ];
 foreach($m4is_p6_h as $m4is_dj_2 => $m4is_ef9wx) { $m4is_xm2h['description'] .= "Table: '{$m4is_dj_2}', on column '{$m4is_ef9wx}'<br />";
 } } return $m4is_xm2h;
 } static 
function m4is_iofz_() : array { $m4is_e_u17 = get_option('default_role');
 $m4is_smxn = get_role($m4is_e_u17);
 $m4is_ij9w = $m4is_smxn->has_cap('read');
 $m4is_denwm = $m4is_smxn->has_cap('manage_options');
 $m4is_oa_z = null;
 $m4is_e_u17 = ucwords($m4is_e_u17);
 $m4is_oa_z = [ 'label' => 'Default Role Permissions', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green' ], 'description' => '', 'actions' => '', 'test' => 'wpal_default_role', ];
 if ($m4is_denwm) { $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['description'] .= "<p>Your default role ({$m4is_e_u17}) appears to be mis-configured as an admin user.  The default role should have minimum access.</p>";
 } if (! $m4is_ij9w) { $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['description'] .= "<p>Your default role ({$m4is_e_u17}) appears to be mis-configured without the 'Read' capability.  This capability should be added to the role.</p>";
 } if ($m4is_oa_z['status'] == 'good') { $m4is_oa_z['description'] = 'Your default role appears to be properly configured.';
 } else { $m4is_oa_z['actions'] = '<p>Please contact <a href="https://memberium.com/support/" target="_blank">Memberium Support</a> for assistance and include a copy of this message.</p>';
 } return $m4is_oa_z;
 } static 
function m4is_xb9q0() : array { $m4is__tb71 = get_option('active_plugins');
 $m4is_uwdfj = false;
 $m4is_oa_z = [];
 foreach($m4is__tb71 as $m4is_mqjcy4) { if (stripos($m4is_mqjcy4, 'i2sdk') !== false) { $m4is_uwdfj = true;
 break;
 } } if ($m4is_uwdfj) { $m4is_juks10 = get_admin_url(null, 'plugins.php?s=i2sdk&plugin_status=all');
 $m4is_oa_z = [ 'label' => 'Deactivate External i2SDK Plugin', 'status' => 'critical', 'badge' => [ 'label' => __('Security'), 'color' => 'red', ], 'description' => '<p>Memberium has detected that you have the old version of the i2SDK plugin installed, and activated.  This version is no longer maintained, and is missing performance improvements, features and bug fixes.</p>', 'actions' => "<p>We recommend <a href='{$m4is_juks10}'>deactivating</a> the i2SDK plugin to avoid conflicts.</p>", 'test' => 'wpal_memberium_external_i2sdk', ];
 } return $m4is_oa_z;
 } static 
function m4is_q_e5il() : array { $m4is_cglewx = new RecursiveIteratorIterator(new RecursiveDirectoryIterator( self::$m4is_bnd6ti->m4is_znwy() ) );
 $m4is_z_23h = true;
 $m4is_oa_z = [];
 foreach ($m4is_cglewx as $m4is_m_mie7) { $m4is_za92q = $m4is_m_mie7->getPathname();
 if (! stripos($m4is_za92q, '.git')) { if (! is_writeable($m4is_za92q)) { $m4is_z_23h = false;
 break;
 } } } if (! $m4is_z_23h) { $m4is_oa_z = [ 'label' => 'Memberium Plugin Folder is not Writeable', 'status' => 'recommended', 'badge' => [ 'label' => __('Updates'), 'color' => 'orange', ], 'description' => '<p>One or more files in your Memberium plugin folder are not writeable.</p><p>This may prevent updates or debugging builds from working.</p>', 'actions' => '<p>Reset the permissions on the Memberium plugin folder to be writeable.</p>', 'test' => 'm4is_q_e5il', ];
 } return $m4is_oa_z;
 } static 
function m4is_im5q() : array { $m4is_uf0a = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
 $m4is_oa_z = [];
 if (stripos($m4is_uf0a, 'flywheel') !== false) { $m4is_oa_z = [ 'label' => 'FlyWheel Hosting detected', 'status' => 'critical', 'badge' => [ 'label' => __('Performance'), 'color' => 'orange' ], 'description' => 'FlyWheel hosting was detected.  Fly/Wheel uses aggressive caching which may display private member info to other members, break autologins, and other problems.  Turning on Dev Mode will often fix these issues.', 'actions' => '', 'test' => 'wpal_healthcheck_flywheel', ];
 } return $m4is_oa_z;
 } static 
function m4is_ouih() : array { $m4is_xm2h = [];
 $m4is_uwdfj = false;
 $m4is_w1ifb = defined('GD_PLAN_NAME') ? strtolower(GD_PLAN_NAME) : '';
 if (strpos($m4is_w1ifb, 'managed wordpress') !== false) { $m4is_xm2h = [ 'label' => 'GoDaddy Managed WordPress Hosting', 'status' => 'critical', 'badge' => [ 'label' => __('Security'), 'color' => 'red' ], 'description' => '<p>GoDaddy Managed WordPress hosting was detected.   GoDaddy Managed WordPress is incompatible with Memberium and is not a supported hosting plan.  This will cause Memberium to not work properly.</p>', 'actions' => '<p>We recommend switching to another hosting provider, or to GoDaddy cPanel Linux hosting.</p>', 'test' => 'wpal_hosting_godaddy_managed', ];
 } return $m4is_xm2h;
 } static 
function m4is_jko2_() : array {  $m4is_oa_z = [ 'label' => 'Can Communicate with Memberium License Server', 'status' => 'good', 'badge' => [ 'label' => __( 'Memberium' ), 'color' => 'green'], 'description' => 'Your connection to the license server appears to be working properly.', 'actions' => '', 'test' => 'wpal_healthcheck_hostblocking', ];
 if (defined('WP_HTTP_BLOCK_EXTERNAL') && constant('WP_HTTP_BLOCK_EXTERNAL') == 1) { $m4is_jp_b = defined('WP_ACCESSIBLE_HOSTS') ? strtolower(constant('WP_ACCESSIBLE_HOSTS') ) : '';
 $m4is_ra5_y = array_filter(explode(',', $m4is_jp_b) );
 $m4is_ra5_y = array_filter($m4is_ra5_y);
 $m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_f9ixbg = [ 'licenseserver.webpowerandlight.com', "{$m4is_zq0k}.infusionsoft.com" ];
 foreach($m4is_f9ixbg as $k => $m4is_g0wy) { if (in_array($m4is_g0wy, $m4is_ra5_y) ) { unset($m4is_f9ixbg[$k]);
 } } if (! empty($m4is_f9ixbg) ) { $m4is_z3z42g = trim($m4is_jp_b . "," . implode(',', $m4is_f9ixbg), ',');
 $m4is_nz3t = 'notice notice-error';
 $m4is_wbgl5s = '<h3>External Hosts Blocked</h3>' . '<p>Memberium has detected that you are blocking access to external hosts, through your wp-config.php file.' . 'You will either need to remove the <strong>WP_HTTP_BLOCK_EXTERNAL</strong> setting, or add our hosts to the <strong>WP_ACCESSIBLE_HOSTS</strong> setting.' . 'Leaving this problem unaddressed will cause your plugin to stop working.</p>' . "<p style='font-family:\"courier new\",monospace;font-size:120%;'>define('WP_ACCESSIBLE_HOSTS', '" . $m4is_z3z42g . "');</p>" . '<p>If you would like assistance, please contact <a target="_blank" href="https://memberium.com/support/">Memberium Support.</a></p>';
 $m4is_oa_z['label'] = 'Memberium License Server is blocked';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] = $m4is_wbgl5s;
 } } return $m4is_oa_z;
 } static 
function m4is_wkcr0() : array {   $m4is__tb71 = get_option('active_plugins');
 $m4is_y9g2 = get_plugins();
 $m4is_oa_z = [];
 $m4is_vwrf6g = [];
 $m4is_ey2tl = [];
 $m4is_juks10 = get_admin_url(null, 'plugins.php?s=memberium install&plugin_status=all');
 $m4is_oa_z = [ 'label' => 'Remove Memberium Installer Plugin', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green', ], 'description' => '', 'actions' => '', 'test' => 'wpal_memberium_installer', ];
 foreach($m4is_y9g2 as $m4is_mqjcy4 => $m4is_qnjfv) { if (stripos($m4is_mqjcy4, 'memberium') !== false && (stripos($m4is_mqjcy4, 'install') !== false || stripos($m4is_mqjcy4, 'wizard') !== false) ) { $m4is_vwrf6g[] = $m4is_mqjcy4;
 $m4is_oa_z['status'] = 'recommended';
 $m4is_oa_z['badge']['color'] = 'orange';
 } } foreach($m4is__tb71 as $m4is_mqjcy4) { if (stripos($m4is_mqjcy4, 'memberium') !== false && (stripos($m4is_mqjcy4, 'install') !== false || stripos($m4is_mqjcy4, 'wizard') !== false) ) { $m4is_vwrf6g[] = $m4is_mqjcy4;
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 } } if (! empty($m4is_vwrf6g)) { foreach($m4is_vwrf6g as $m4is_mqjcy4) { if (isset($m4is_y9g2[$m4is_mqjcy4])) { $m4is_ey2tl[] = "<em>{$m4is_y9g2[$m4is_mqjcy4]['Name']}</em> by {$m4is_y9g2[$m4is_mqjcy4]['Author']}";
 } } } if (! empty($m4is_ey2tl)) { $m4is_oa_z['description'] = '<p>The Memberium installation wizard plugin was found in your system.  This plugin is no longer needed once Memberium is installed, and will only slow down your system.</p>';
 $m4is_oa_z['actions'] = '<p>We recommend <a href="' . $m4is_juks10 . '">deactivating and removing</a> the following plugins:</p>';
 foreach($m4is_ey2tl as $m4is_mqjcy4) { $m4is_oa_z['actions'] .= "<p>{$m4is_mqjcy4}</p>";
 } } if ($m4is_oa_z['status'] !== 'good') { return $m4is_oa_z;
 } return [];
 } static 
function m4is_n9r6() : array { $m4is_oa_z = [];
 if ( self::$m4is_bnd6ti->m4is_shfp8b() === 'production' ) { $m4is_tz42r0 = false;
 $m4is_fliw = strtolower( trim( get_bloginfo( 'admin_email' ) ) );
 $m4is__7f1 = [ '.secureserver.net', '.sg-host.com', '.wpengine.com', 'liquidwebsites.com', '@cloudways', '@example', '@flywheel.local', '@localhost', '@entre.cloud', '@admin.com', '@admin.com', ];
 if (empty($m4is_fliw) ) { $m4is_tz42r0 = true;
 } foreach($m4is__7f1 as $m4is_gd3oc) { if (stripos($m4is_fliw, $m4is_gd3oc) !== false) { $m4is_tz42r0 = true;
 break;
 } } if ($m4is_tz42r0) { $m4is_vc0z = '<a href="' . get_admin_url(null, 'options-general.php') . '"> target="_blank">here</a>';
 $m4is_fliw = esc_html($m4is_fliw);
 $m4is_oa_z = [ 'label' => 'Invalid Site Administrator Contact Email', 'status' => 'critical', 'badge' => [ 'label' => __('Security'), 'color' => 'red', ], 'description' => "<p>An invalid email ({$m4is_fliw}) was detected in the site's <strong>Administration Email Address</strong> setting.  This may affect your software license management.</p>", 'actions' => '<p>We recommend setting your Administrator email address to a valid email.  You can update this setting ' . $m4is_vc0z . '</p>', 'test' => 'wpal_wordpress_administrator_email', ];
 } } return $m4is_oa_z;
 } static 
function m4is_l4gib() : array { $m4is_oa_z = [];
 $m4is_deqd = [  'administrator', 'memberium', 'sitemanager', 'support', 'test', ];
 foreach ($m4is_deqd as $m4is_lg3b) { $m4is_x0_hk = get_user_by('login', $m4is_lg3b);
 if ($m4is_x0_hk && self::$m4is_bnd6ti->m4is_lvmz1b($m4is_x0_hk->ID) ) { break;
 } $m4is_x0_hk = false;
 } if ($m4is_x0_hk && is_a($m4is_x0_hk, 'WP_User') ) { $m4is_lg3b = $m4is_x0_hk->user_login;
 $m4is_rlp0 = '<a href="' . get_admin_url(null, "user-edit.php?user_id={$m4is_x0_hk->ID}") . '">view the user here</a>';
 $m4is_oa_z = [ 'label' => 'Default Admin Account Logins', 'status' => 'recommended', 'badge' => [ 'label' => __('Security'), 'color' => 'orange', ], 'description' => "<p>Your install of Memberium has one or more admin user using the default admin name of '{$m4is_lg3b}'.  This increases the exposure of your site to attack by hackers bruteforcing your admin login.</p>", 'actions' => '<p>You can ' . $m4is_rlp0 . '. We recommend changing your WordPress admin username to something non-obvious.</p><p>If you have questions, please ' . self::$m4is_yr0_ . '</p>', 'test' => 'wpal_wordpress_admin_is_admin', ];
 } return $m4is_oa_z;
 } static 
function m4is_k0e5() : array { $m4is_oa_z = [];
 $m4is_x94f = self::$m4is_bnd6ti->m4is_u04m();
 $m4is_w3rz = m4is_i1jld5::m4is_m9l2();
 $m4is_vc0z = get_admin_url(null, 'admin.php?page=memberium-support&tab=updates');
 $m4is_oa_z = [ 'label' => 'Memberium Plugin Version', 'status' => 'good', 'badge' => [ 'label' => __('Performance'), 'color' => 'green', ], 'description' => "<p>Your install of Memberium is running the latest available version.</p>", 'actions' => '', 'test' => 'wpal_memberium_outdated', ];
 if (version_compare($m4is_w3rz, $m4is_x94f, '>') ) { $m4is_oa_z['label'] = 'Memberium Plugin Requires Update';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] = "<p>Your install of Memberium is running an older version (v{$m4is_x94f}).  Your version is missing features, performance, and security improvements.   Only current versions are eligible for some kinds of support.</p>";
 $m4is_oa_z['actions'] = "<p>We recommend <a href='{$m4is_vc0z}'>updating to the latest version</a> v{$m4is_w3rz}.</p><p>If you would like assistance, please contact <a href='https://memberium.com/support/' target='_blank'>Memberium Support</a>.</p>";
 } return $m4is_oa_z;
 } static 
function m4is_d_28p() : array { $m4is_oa_z = [];
 $m4is_deqd = [ 'support@memberium.com', 'support@memberium.zendesk.com', ];
 foreach ($m4is_deqd as $m4is_lg3b) { $m4is_x0_hk = get_user_by('email', $m4is_lg3b);
 if ($m4is_x0_hk && self::$m4is_bnd6ti->m4is_lvmz1b($m4is_x0_hk->ID) ) { break;
 } $m4is_x0_hk = false;
 } if ($m4is_x0_hk) { $m4is_lg3b = $m4is_x0_hk->user_login;
 $m4is_rlp0 = '<a href="' . get_admin_url(null, "user-edit.php?user_id={$m4is_x0_hk->ID}") . '">view the user here</a>';
 $m4is_oa_z = [ 'label' => 'Memberium Support Admins', 'status' => 'recommended', 'badge' => [ 'label' => __('Security'), 'color' => 'orange', ], 'description' => "<p>Your install of Memberium has one or more admin users belonging to Memberium support.</p>", 'actions' => "<p>We recommend changing the user's role to 'Subscriber', or deleting the user completely once the login is no longer needed.</p><p>If you have questions, please " . self::$m4is_yr0_ . "</p><p>You can {$m4is_rlp0}.</p>", 'test' => 'wpal_memberium_support_account', ];
 } return $m4is_oa_z;
 } static 
function m4is_rw7rk() : array { if (! function_exists('get_plugins') ) { require_once ABSPATH . 'wp-admin/includes/plugin.php';
 } $m4is_oa_z = [];
 $m4is_ey2tl = array_merge(get_plugins(), get_mu_plugins() );
 $m4is_she09 = [];
 $m4is_sjnrgx = [ 'accessally/accessally.php', 'infusion4wp/infusion4wpload.php', 'memberful-wp/memberful-wp.php', 'members/members.php', 'paid-member-subscriptions/index.php', 'paid-memberships-pro/paid-memberships-pro.php', 'restrict-content/restrictcontent.php', 's2member/s2member.php', 'simple-membership-after-login-redirection/swpm-after-login-redirection.php', 'simple-membership/simple-wp-membership.php', 'wishlist-member/wpm.php', 'wp-members/wp-members.php', ];
 foreach($m4is_sjnrgx as $m4is_tsdhmx) { if (array_key_exists($m4is_tsdhmx, $m4is_ey2tl)) { $m4is_mqjcy4 = $m4is_ey2tl[$m4is_tsdhmx];
 $m4is_oc8ayu = isset($m4is_mqjcy4['Name']) ? $m4is_mqjcy4['Name'] : $m4is_ijs9k;
 $m4is_r4tza = isset($m4is_mqjcy4['Version']) ? $m4is_mqjcy4['Version'] : '';
 $m4is_she09[] = $m4is_oc8ayu . ' v' . $m4is_r4tza;
 } } if (! empty($m4is_she09)) { $m4is_oa_z = [ 'label' => 'Conflicting Membership Plugins Found', 'status' => 'critical', 'badge' => [ 'label' => __('Security'), 'color' => 'red', ], 'description' => "<p>The following membership plugins were found installed on your system.  " . "Running multiple membership plugins is not supported. " . "Installation and of these plugins can cause problems including access controls being broken, data corruption, and the wrong information displayed to the wrong users.</p>", 'actions' => '<p>We recommend deactivating and removing these plugins.</p>', 'test' => 'wpal_wordpress_plugins_membership', 'data' => $m4is_she09, ];
 foreach($m4is_she09 as $m4is_pj3t7) { $m4is_oa_z['description'] .= $m4is_pj3t7 . '<br />';
 } } return $m4is_oa_z;
 } static 
function m4is_xl945() : array { $m4is_qh8p6 = self::$m4is_bnd6ti->m4is_oiewvu( 'memberships' );
 $m4is_yer1mp = count( $m4is_qh8p6 );
 $m4is_oa_z = [ 'label' => 'Memberium Membership Levels', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green', ], 'description' => '', 'actions' => '', 'test' => 'wpal_memberium_membership_levels', ];
 if ( $m4is_yer1mp == 0 ) { $m4is_oa_z['status'] = 'recommended';
 $m4is_oa_z['badge']['color'] = 'orange';
 $m4is_oa_z['description'] .= '<p>No Memberium membership levels were found.</p>';
 $m4is_oa_z['actions'] .= '<p>We recommend creating one or more Memberium membership levels to properly secure your site.</p>';
 } else { $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( false );
 $m4is_wymt0 = [ 'main_id', 'payf_id', 'cancel_id', 'suspend_id' ];
 $m4is_at4xqr = [];
 $m4is_m3bw = [];
 foreach($m4is_qh8p6 as $m4is_o5xas) { foreach($m4is_wymt0 as $m4is_s2ge5) { if (! empty($m4is_o5xas[$m4is_s2ge5]) ) { $m4is_mpia = $m4is_o5xas[$m4is_s2ge5];
 $m4is_at4xqr[$m4is_mpia] = $m4is_o5xas['name'];
 } } if (! empty($m4is_o5xas['addltag_ids'])) { $m4is_ske3 = array_filter( explode(',', $m4is_o5xas['addltag_ids'] ) );
 foreach($m4is_ske3 as $m4is_mpia) { $m4is_at4xqr[$m4is_mpia] = $m4is_o5xas['name'];
 } } } array_unique($m4is_at4xqr);
 uasort($m4is_at4xqr, function($a, $b) { return (int) ($a > $b);
 });
 foreach( $m4is_at4xqr as $m4is_mpia => $m4is_t5ot4 ) { if ( ! array_key_exists($m4is_mpia, $m4is_iystd2['mc'] )) { $m4is_m3bw[$m4is_t5ot4][] = $m4is_mpia;
 } } if (! empty($m4is_m3bw)) { $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 foreach($m4is_m3bw as $m4is_o5xas => $m4is_iystd2) { if (! empty($m4is_iystd2)) { $m4is_oa_z['description'] .= "<p>Your {$m4is_o5xas} membership level is missing the following tag IDs: " . implode(',', $m4is_iystd2) . "</p>";
 } } $m4is_oa_z['actions'] = '<p>Check your tag sync options to ensure you are not blocking any tag categories used by your membership levels.</p>';
 $m4is_oa_z['actions'] .= '<p>If the referenced tags no longer exist, remove them from your membership, or delete the membership level.</p>';
 } } if ($m4is_oa_z['status'] == 'good') { $m4is_oa_z['description'] = "<p>Your {$m4is_yer1mp} membership levels appear to be present and properly configured.</p>";
 } return $m4is_oa_z;
 } static 
function m4is__opf() : array { $m4is_kxsrn = self::$m4is_bnd6ti->m4is_f25d();
 $m4is_yior = intval( wp_convert_hr_to_bytes( $m4is_kxsrn ) / 1024 / 1024);
 $m4is_ak0jcv = intval( wp_convert_hr_to_bytes( $m4is_kxsrn ) / 1024 / 1024);
 $m4is_oa_z = [ 'label' => 'Sufficient Memory Allocated', 'status' => 'good', 'badge' => [ 'label' => __('Performance'), 'color' => 'green', ], 'description' => "You have {$m4is_yior}MB allocated to the frontend, and {$m4is_ak0jcv}MB allocated to the admin dashboard.", 'actions' => '', 'test' => 'wpal_healthcheck_memory', ];
 if ($m4is_yior < 41) { $m4is_wbgl5s = "<p>Your site is configured with a memory limit of {$m4is_yior}MB<br />" . 'You can increase your WordPress memory limit by adding or updating the following line in your wp-config.php:<br />' . "<code>define('WP_MEMORY_LIMIT', '64M');</code><br />" . 'For sites with many or complex plugins or themes, you may want to set it to 96M, 128M, 160M or more.</p>';
 $m4is_oa_z['label'] = 'Memory Warning';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] = $m4is_wbgl5s;
 } if ($m4is_yior > 256) { $m4is_wbgl5s = "<p>Your site is configured with WP_MEMORY_LIMIT set to {$m4is_yior}MB.<br />" . 'Sites needing high memory allocations often can cause performance issues due to misconfiguration and this is not normal even for large sites.  ' . 'We recommend contacting <a href="https:://memberium.com/support/">Memberium support</a> for assistance.</p>';
 $m4is_oa_z['label'] = 'Memory Warning';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] = $m4is_wbgl5s;
 } if ($m4is_ak0jcv < 40) { $m4is_wbgl5s = "<p>Your site is configured with an Admin memory limit of {$m4is_ak0jcv}MB<br />" . 'You can increase your WordPress memory limit by adding or updating the following line in your wp-config.php:<br />' . "<code>define('WP_MAX_MEMORY_LIMIT', '64M');</code><br />" . 'For sites with many or complex plugins or themes, you may want to set it to 96M, 128M, 160M or more.</p>';
 $m4is_oa_z['label'] = 'Memory Warning';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] .= $m4is_wbgl5s;
 }  return $m4is_oa_z;
 } static 
function m4is_zcjp() : array { global $wpdb;
 $m4is_tplu = get_option( 'memberium_tables', [] );
 $m4is_tplu[] = 'i2sdk_apilog';
 $m4is_qcotu = [];
 $m4is_oa_z = [ 'label' => __('Memberium Database Tables'), 'status' => 'good', 'badge' => [ 'label' => __('Database'), 'color' => 'green', ], 'description' => '', 'actions' => '', 'test' => 'wpal_database_tables', ];
 if (is_array($m4is_tplu)) { foreach($m4is_tplu as $m4is_aw4k6) { $m4is_tovizk = "SELECT 1 FROM `{$m4is_aw4k6}` LIMIT 1;";
 $wpdb->get_var($m4is_tovizk);
 $m4is_zg8z = $wpdb->last_error;
 if ($m4is_zg8z) { $m4is_qcotu[] = $m4is_aw4k6;
 } } sort($m4is_qcotu);
 } if (! empty($m4is_qcotu)) { $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] = '<p>The following essential database tables are missing or unreadable.</p>';
 foreach($m4is_qcotu as $m4is_t5ot4) { $m4is_oa_z['description'] .= "{$m4is_t5ot4}<br />";
 } } else { $m4is_oa_z['description'] = '<p>All Memberium and i2SDK database tables are present.</p>';
 } return $m4is_oa_z;
 } static 
function m4is_ly0jm() : array { $m4is__tb71 = get_option('active_plugins');
 $m4is_uwdfj = false;
 $m4is_oa_z = [];
 foreach($m4is__tb71 as $m4is_mqjcy4) { if (stripos($m4is_mqjcy4, 'menu-items-visibility-control') !== false) { $m4is_uwdfj = true;
 break;
 } } if ($m4is_uwdfj) { $m4is_juks10 = get_admin_url(null, 'plugins.php?s=menu items visibility control&plugin_status=search');
 $m4is_oa_z = [ 'label' => 'Deactivate Menu Items Visibility Control Plugin', 'status' => 'critical', 'badge' => [ 'label' => __('Performance'), 'color' => 'red', ], 'description' => "<p>Memberium has detected that you have the Menu Items Visibility Control plugin installed.  The function provided by this plugin has been replaced by Memberium's enhanced native Menu visibility controls with more features and better security.</p><p>Memberium has already imported the settings from this plugin.</p>", 'actions' => "<p>We recommend <a href='{$m4is_juks10}'>deactivating</a> this plugin.</p>", 'test' => 'wpal_memberium_mivc_plugin', ];
 } return $m4is_oa_z;
 } static 
function m4is_k16jcf() : array { $m4is_oa_z = [];
 if (defined('MULTISITE') && MULTISITE) { $m4is_oa_z = [ 'label' => 'Memberium is not Network Activated', 'status' => 'good', 'badge' => [ 'label' => __('Performance'), 'color' => 'green', ], 'description' => '', 'actions' => '', 'test' => 'wpal_m4is_network_activation', ];
 $m4is_dig5x4 = (array) get_site_option('active_sitewide_plugins');
 $m4is_f90k = isset($m4is_dig5x4['memberium2/memberium2.php']) ? $m4is_dig5x4['memberium2/memberium2.php'] > 0 : false;
 if ($m4is_f90k) { $m4is_oa_z['label'] = 'Memberium is Network Activated';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'orange';
 $m4is_oa_z['description'] .= '<p>It is recommended to only activate Memberium only on a per-site basis, unless ALL sites in the network are always actively being used for memberships.</pre>';
 $m4is_oa_z['actions'] .= '<p>We recommend Network Deactivating Memberium, and activating it on any individual network sites it is actively being used on.</p>';
 } } return $m4is_oa_z;
 }  static 
function m4is_lcnm() : array { $m4is_oa_z = [];
 $m4is_mhf4m3 = function_exists('wp_using_ext_object_cache') ? wp_using_ext_object_cache() : 'production';
 $m4is_oa_z = [ 'label' => 'Object Caching Missing / Inactive', 'status' => 'recommended', 'badge' => [ 'label' => __('Performance'), 'color' => 'red', ], 'description' => '<p>Object caching was not detected.  Memberium is designed to use object caching to both speed up operations and reduce database loads.</p>', 'actions' => '<p>Install and activate object caching.</p>', 'test' => 'wpal_wordpress_object_cache', ];
 if ($m4is_mhf4m3) { $m4is_oa_z['label'] = 'Object Caching Active';
 $m4is_oa_z['status'] = 'good';
 $m4is_oa_z['badge']['color'] = 'green';
 $m4is_oa_z['description'] = '<p>Object Caching was detected.  Most Excellent!</p>';
 $m4is_oa_z['actions'] = '';
 } return $m4is_oa_z;
 }  static 
function m4is_rhv2() : array { $m4is_xm2h = [];
 $m4is_jjzfs = get_option('users_can_register', false);
 if ($m4is_jjzfs) { $m4is_xm2h = [ 'label' => 'Open Registration', 'status' => 'recommended', 'badge' => [ 'label' => __('Security'), 'color' => 'red', ], 'description' => '<p>Your WordPress site has been configured to allow any user to register.</p>', 'actions' => '<p>It is recommended that you disable this setting, and use Keap to handle new user registrations.</p>' . '<p>You can change this setting <a href="options-general.php">here</a>, by unchecking "<strong>Anyone can register</strong>".</p>', 'test' => 'wpal_wordpress_open_registration', ];
 } return $m4is_xm2h;
 }  static 
function m4is_hom4() : array { $m4is_xm2h = [];
 if ( self::$m4is_bnd6ti->m4is_shfp8b() === 'production' ) { $m4is_p1ihx = array_diff( scandir( ABSPATH ), ['.', '..'] );
 $m4is_i2rao = [];
 foreach($m4is_p1ihx as $m4is_m_mie7) { $m4is_m_mie7 = ABSPATH . $m4is_m_mie7;
 if (! is_dir($m4is_m_mie7)) { if (stripos(file_get_contents($m4is_m_mie7, false, null, 0, 256), '<?') !== false) { if (stripos(file_get_contents($m4is_m_mie7, false, null, 0, 256), 'phpinfo(') !== false) { $m4is_i2rao[] = $m4is_m_mie7;
 } } } } if (count($m4is_i2rao) ) { $m4is_xm2h = [ 'label' => 'PHPinfo() Security Issue', 'status' => 'critical', 'badge' => [ 'label' => __('Security'), 'color' => 'red', ], 'description' => "<p>Files with the phpinfo() debug code have been detected in your top level WordPress directory.  These files are not used by WordPress, and they expose sensitive security information about your server and site that can be used by attackers.</p>", 'actions' => '<p>Please ask your web host to review and remove the following files:</p>', 'test' => 'wpal_server_phpinfo', ];
 foreach($m4is_i2rao as $m4is_m_mie7) { $m4is_xm2h['actions'] .= "{$m4is_m_mie7}<br>";
 } } } return $m4is_xm2h;
 } static 
function m4is_stuvoe() : array { $m4is_oa_z = [ 'label' => 'Membership Password Security', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green', ], 'description' => 'Passwords are securely stored in WordPress only.', 'actions' => '', 'test' => 'wpal_memberium_plaintext_password', ];
 $m4is_vc0z = get_admin_url(null, 'admin.php?page=memberium-options');
 $m4is_oqj67 = 'https://memberium.com/?p=6818';
 $m4is_hyw1m4 = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'local_auth_only');
 if (empty($m4is_hyw1m4) ) { $m4is_oa_z['status'] = 'recommended';
 $m4is_oa_z['badge']['color'] = 'orange';
 $m4is_oa_z['description'] = '<p>Your Memberium system is set to sync passwords in plaintext from WordPress to Keap.  ';
 $m4is_oa_z['description'] .= 'This may put members at risk who carelessly re-use passwords on multiple sites.  ';
 $m4is_oa_z['description'] .= 'It may also not be compliant with various privacy regulations and laws governing you or your members.</p>';
 $m4is_oa_z['actions'] = "<p><strong>Please review our <a href='{$m4is_oqj67}' target='_blank'>documentation</a> and <a href='https://memberium.com/support/' target='_blank'>contact support</a> to understand this feature <span style='color:red;'>before</span> making any changes.</strong></p>";
 $m4is_oa_z['actions'] .= "<p><a href='{$m4is_vc0z}'>Click Here</a> to review your setting for 'Secure Passwords / Local Auth Only'.</p>";
 } return $m4is_oa_z;
 } static 
function m4is_ahjf() : array { $m4is_oa_z = [ 'label' => 'No Proxies detected', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green' ], 'description' => 'No web proxies were detected.  Web Proxies like Cloudflare and Securi are services to secure and speed up your website, however they may interfere with HTTP POSTs coming from Keap.', 'actions' => '', 'test' => 'wpal_healthcheck_cloudflare', ];
 if (! empty($_SERVER['HTTP_CF_RAY']) ) { $m4is_wbgl5s = '<p>Memberium has detected that you are using CloudFlare.  We recommend reviewing your CloudFlare configuration to ensure that page caching is disabled.</p>';
 $m4is_oa_z['label'] = 'CloudFlare Detected';
 $m4is_oa_z['status'] = 'recommended';
 $m4is_oa_z['badge']['color'] = 'orange';
 $m4is_oa_z['description'] = $m4is_wbgl5s;
 $m4is_oa_z['data'] = 'CloudFlare';
 } return $m4is_oa_z;
 }  static 
function m4is_uk0u() : array { $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( false );
 $m4is_yer1mp = isset($m4is_iystd2['mc']) && is_array($m4is_iystd2['mc']) ? count($m4is_iystd2['mc']) : 0;
 $m4is_dcjt_3 = get_option('memberium_tables_updated', [] );
 $m4is__2nb0 = empty($m4is_dcjt_3['tags']) ? 0 : $m4is_dcjt_3['tags'];
 $m4is_oa_z = [ 'label' => 'Memberium Tags', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green', ], 'description' => "<p>We found {$m4is_yer1mp} tags synced from Keap.</p>", 'actions' => '', 'test' => 'wpal_memberium_tags', ];
 if ($m4is_yer1mp) { $m4is_vc0z = get_admin_url(null, 'admin.php?page=memberium-support&tab=dashboard');
 $m4is_oa_z['actions'] = '<p>If you are missing some tags, you can <a href="' . $m4is_vc0z . '"> resynchronize the tag list here</a>:</p>';
 if ($m4is__2nb0) { $m4is_oa_z['description'] .= '<p>Your tags were last synced ' . human_time_diff($m4is__2nb0) . ' ago.</p>';
 } } else { $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] = '<p>No tags have been synced from Keap.</p>';
 $m4is_oa_z['actions'] = '';
 } return $m4is_oa_z;
 }   static 
function m4is_r0u67v() : array { $m4is_flx71n = [ 'AUTH_KEY', 'AUTH_SALT', 'LOGGED_IN_KEY', 'LOGGED_IN_SALT', 'NONCE_KEY', 'NONCE_SALT', 'SECURE_AUTH_KEY', 'SECURE_AUTH_SALT', ];
 $m4is_p6_h = 0;
 $m4is_oa_z = [ 'label' => 'WordPress Security Keys', 'status' => 'good', 'badge' => [ 'label' => __('Security'), 'color' => 'green', ], 'description' => "<p>Your WordPress security keys need to be defined with unique, secure values.</p>", 'actions' => '', 'test' => 'wpal_wp_security_keys', ];
 foreach($m4is_flx71n as $m4is_s2ge5) { if ( ! defined($m4is_s2ge5) ) { $m4is_p6_h++;
 } else { $m4is_w_o7al = trim( strtolower( constant($m4is_s2ge5) ) );
 if ( empty($m4is_w_o7al) || $m4is_w_o7al == 'put your unique phrase here' ) { $m4is_p6_h++;
 } } } if ($m4is_p6_h) { $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['actions'] = 'Please review your wp-config.php file to update your KEYS and SALTS.  ' . 'You can find a new set of keys here <a href="https://api.wordpress.org/secret-key/1.1/salt/" target="_blank">here</a>. ' . 'Please contact your webhost if you would like assistance making thsi change.';
 } return $m4is_oa_z;
 } static 
function m4is_ew7b0() : array { if ( ! class_exists( 'woocommerce' ) ) { return [];
 } $m4is_tbj9v = get_option( 'woocommerce_enable_guest_checkout' );
 $m4is_x1sbqr = get_option( 'woocommerce_enable_signup_and_login_from_checkout' );
   if ( $m4is_tbj9v == 'no' && $m4is_x1sbqr == 'yes' ) { return [];
 } $m4is_ljzrq0 = '';
 if ( $m4is_tbj9v == 'yes' ) { $m4is_ljzrq0 .= '<p>Guest checkout is enabled.  This option should be turned off to require customers to create an account/login during checkout.</p>';
 } if ( $m4is_x1sbqr == 'no' ) { $m4is_ljzrq0 .= '<p>Account signup is disabled.  This enbales customers to create an account during checking out.</p>';
 } $m4is_ljzrq0 .= '<p>In order for Memberium to sync new purchases to your CRM and run actions or apply tags, an account must be created.  Please configure your WooCommerce settings to enforce account creation during checkout.</p>';
 $m4is_oa_z = [ 'label' => 'WooCommerce Guest Checkout', 'status' => 'critical', 'badge' => [ 'label' => __('Security'), 'color' => 'red' ], 'description' => $m4is_ljzrq0, 'actions' => '', 'test' => 'wpal_healthcheck_wooocommerce_guest_checkout', 'data' => false, ];
 return $m4is_oa_z;
 }     static 
function m4is_g6zg() : array { $m4is_oa_z = [ 'label' => 'No Page Caching Plugins Found', 'status' => 'good', 'badge' => [ 'label' => __( 'Security' ), 'color' => 'green', ], 'description' => '', 'actions' => '', 'test' => 'wpal_healthcheck_caching', ];
 if (function_exists('wpsc_init')) { $m4is_oa_z['label'] = 'Page Caching Plugins Found';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] .= '<p>WP Super Cache is installed and active.</p>';
 } if (defined('W3TC')) { $m4is_oa_z['label'] = 'Page Caching Plugins Found';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] .= '<p>W3 Total Cache is installed and active.</p>p>';
 } if (defined('WP_ROCKET_VERSION') ) { $m4is_oa_z['label'] = 'Page Caching Plugins Found';
 $m4is_oa_z['status'] = 'critical';
 $m4is_oa_z['badge']['color'] = 'red';
 $m4is_oa_z['description'] .= '<p>WP Rocket is installed and active.</p>';
 } if (empty($m4is_oa_z['description'])) { $m4is_oa_z['description'] = '<p>No caching plugin conflicts detected.<br />Installing Caching plugins can cause data corruption and security issues.</p>';
 } else { $m4is_oa_z['description'] .= '<p>Running caching plugins with your membership site can cause corruption and security problems.  To fix this problem, disable your caching plugins.</p>';
 } return $m4is_oa_z;
 } static 
function m4is_w8jx_() : array { $m4is_d8xn2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'db_sessions' );
 $m4is_oa_z = [];
 if ( $m4is_d8xn2) { return $m4is_oa_z;
 } $m4is_p6_h = [];
 $m4is_oa_j2 = [];
 $m4is_e8ix = session_save_path();
 if ( $m4is_e8ix == false ) { $m4is_p6_h[] = 'The session path is not set in your server PHP configuration.';
 $m4is_oa_j2[] = 'Your PHP installation is misconfigured and does not have a session path set.  Please fix the configuration, or switch to database backed sessions.';
 } else { if ( ! file_exists( $m4is_e8ix ) ) { $m4is_p6_h[] = sprintf( 'The session directory does not exist.  Please create the "<strong>%s</strong>" directory and make sure your website can write to it', $m4is_e8ix );
 $m4is_oa_j2[] = 'Your PHP installation is misconfigured and points to a non-existent directory.  Please fix the configuration, create the directory, or switch to database backed sessions.';
 } elseif ( ! is_writeable( $m4is_e8ix ) ) { $m4is_p6_h[] = sprintf( 'The session directory  "<strong>%s</strong>" exists, but is not writeable.', $m4is_e8ix );
 $m4is_oa_j2[] = 'The read/write permissions of your PHP session directory prevent your webserver from writing to it. Please fix the directory permissions, or switch to database backed sessions.';
 } } if ( count( $m4is_p6_h ) ) { $m4is__6oivt = '';
 foreach ( $m4is_p6_h as $m4is_jadl06 ) { $m4is__6oivt .= '<p>' . $m4is_jadl06 . '</p>';
 } foreach ( $m4is_oa_j2 as $m4is_v6fdv4 ) { $m4is_w4u0j2 .= '<p>' . $m4is_v6fdv4 . '</p>';
 } $m4is_oa_z = [ 'actions' => $m4is_w4u0j2, 'description' => "<p>There appears to be a problem with your Website Session Storage.</p>" . $m4is__6oivt, 'label' => 'PHP Session Storage', 'status' => 'critical', 'test' => 'wpal_memberium_session_storage', 'badge' => [ 'label' => __('Server'), 'color' => 'red', ], ];
 } return $m4is_oa_z;
 } static 
function m4is_ttc62f() : array { $m4is_x5wxyr = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' ) ) );
 $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field', 'Password' );
 $m4is_oa_z = [];
 $m4is_oa_j2 = [];
 if ( in_array( $m4is_dcf_7, $m4is_x5wxyr ) ) { $m4is_oa_j2[] = sprintf( '<p>You need to unblock the <em>%s</em> field from being synced with your CRM, or choose a different password field.</p>', $m4is_dcf_7 );
 $m4is_oa_j2[] = sprintf( '<p>Password field settings are <strong><a href="%s">here</a></strong>.</p>', admin_url( 'admin.php?page=memberium-options' ) );
 $m4is_oa_j2[] = sprintf( '<p>Blocked field settings are <strong><a href="%s">here</a></strong>.</p>', admin_url( 'admin.php?page=memberium-sync-options&tab=contactfields' ) );
 $m4is_oa_j2[] = '<p></p>';
 $m4is_oa_z = [ 'actions' => implode( "\n", $m4is_oa_j2 ), 'description' => "<p>The CRM field you are using to store the password has been blocked from syncing.  This may cause problems with the password being generated or updated.</p>", 'label' => 'Memberium Password Field Sync Blocked', 'status' => 'critical', 'test' => 'wpal_memberium_password_blocked', 'badge' => [ 'label' => __('Server'), 'color' => 'red', ], ];
 } return $m4is_oa_z;
 }         }

