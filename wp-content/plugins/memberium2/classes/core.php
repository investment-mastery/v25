<?php
/**
* Copyright (c) 2012-2024 David J Bullock
* Web Power and Light, LLC
* https://webpowerandlight.com
* support@webpowerandlight.com
*
*/

 defined( 'ABSPATH' ) || die();
 final 
class m4is_pms8y { public $license_key_name = '';
 public $login_error = '';
 public $servername = '';
  const DELIMITER = '|';
 const DEBUGLOG = '/tmp/debuglog.txt';
  const PLUGIN_UPDATE_URL = 'https://licenseserver.webpowerandlight.com/memberium-is/current-version.php';
 private $m4is_b3z8 = [], $m4is_oqfa = [], $m4is_oc0pi1 = [], $m4is_irfv8_ = false, $m4is_tq3sh = false, $m4is_vyh4 = [], $m4is_nzx0t = [], $m4is_wov2 = [], $m4is_d9m5k = null, $m4is__vgnju = null, $m4is_qjai = [], $m4is_ciovx = [], $isdk = null, $i2sdk = null, $i2sdk_options = [];
 protected $m4is_jal63 = 0, $m4is_ppcswv = false, $m4is_gl7mx4 = 0, $license_status = false, $options = [], $trial_mode = 0;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self();
 }  
function __construct() { $m4is_hi_3 = get_option( 'memberium/disable/plugin', '' );
 if ( $this->m4is_vuz8ta( $m4is_hi_3 ) ) { return;
 } $this->m4is_d9m5k = MEMBERIUM_HOME_DIR;
 $this->m4is__vgnju = MEMBERIUM_HOME;
 $this->m4is_ohw9();
 $this->m4is_mbyh();
  add_action( 'plugins_loaded', [$this, 'm4is_z4u6wr'], 1 );
 add_action( 'plugins_loaded', [$this, 'm4is_tmpk'], 2 );
  $this->m4is_fodf3r();
 $this->m4is_t8lw();
 $this->m4is_gbqd0();
 $this->m4is_vmsrgl();
  } 
function m4is_tf12() : string { global $wpdb;
 static $m4is_tq0t5;
 if ( is_null( $m4is_tq0t5 ) ) { $m4is_fufa25 = $wpdb->dbname . '|' . $wpdb->prefix . '|' . ABSPATH . '|' . site_url();
 $m4is_tq0t5 = hash_hmac( 'sha256', $m4is_fufa25, wp_salt( 'nonce' ) );
 } return $m4is_tq0t5;
 }  private 
function m4is_vuz8ta() : bool { $m4is_hi_3 = get_option( 'memberium/debug/ip_disable', '' );
 if ( empty( $m4is_hi_3 ) ) { return false;
 } $m4is_hi_3 = array_filter( explode( ',', $m4is_hi_3 ) );
 $m4is_flx71n = [ 'REMOTE_ADDR', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'HTTP_X_SUCURI_CLIENTIP', 'HTTP_X_REAL_IP', ];
 foreach ( $m4is_flx71n as $m4is_s2ge5 ) { if ( in_array( $_SERVER[$m4is_s2ge5], $m4is_hi_3 ) ) { return true;
 } } return false;
 }  private 
function m4is_gbqd0() { $this->m4is_xdm1c();
  if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {  if ( function_exists( 'error_reporting' )) {  error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_PARSE | E_USER_ERROR );
 }  if ( function_exists( 'ini_set' ) ) {  @ini_set( 'display_errors', 0 );
 } } }    private 
function m4is_ohw9() { $this->m4is_nzx0t['start'] = [ 'time' => empty( $_SERVER['REQUEST_TIME_FLOAT'] ) ? microtime( true ) : $_SERVER['REQUEST_TIME_FLOAT'], 'memory' => memory_get_usage(), 'http_calls' => 0, 'api_calls' => 0, 'api_time' => 0, ];
 add_filter( 'pre_http_request', [$this, 'm4is_d5mq'], 1, 3);
 } 
function m4is_i3dg( bool $m4is_o7b8 = true ) { if ( $m4is_o7b8 ) { $m4is_oa_z = [ 'time' => microtime( true ) - $this->m4is_nzx0t['start']['time'], 'memory' => memory_get_usage() - $this->m4is_nzx0t['start']['memory'], 'http_calls' => (int) $this->m4is_nzx0t['start']['http_calls'], 'api_calls' => (int) $this->m4is_nzx0t['start']['api_calls'], ];
 } else { $m4is_oa_z = [ 'time' => microtime( true ) - $this->m4is_nzx0t['start']['time'], 'memory' => memory_get_usage(), 'http_calls' => (int) $this->m4is_nzx0t['start']['http_calls'], 'api_calls' => (int) $this->m4is_nzx0t['start']['api_calls'], ];
 } return $m4is_oa_z;
 } 
function m4is_rvpyu() { global $wp_object_cache;
 $m4is_utg0q = number_format_i18n( microtime( true ) - $this->m4is_nzx0t['start']['time'], 3 ) . 's';
 $m4is_kxsrn = size_format( $this->m4is_nzx0t['end']['memory'], 2 );
 $m4is_ba61e4 = (int) $this->m4is_nzx0t['start']['http_calls'];
 $m4is_ybcu = (int) $this->m4is_nzx0t['start']['api_calls'];
 $m4is_qexph9 = get_num_queries();
 $m4is_tw0mqo = property_exists( $wp_object_cache, 'cache_hits' ) ? (int) $wp_object_cache->cache_hits : 0;
 $m4is_r_pk = property_exists( $wp_object_cache, 'cache_misses' ) ? (int) $wp_object_cache->cache_misses : 0;
 $m4is_azd3yf = [ 'wpal-memberium-time' => $m4is_utg0q, 'wpal-memberium-memory' => $m4is_kxsrn, 'wpal-memberium-http-calls' => $m4is_ba61e4, 'wpal-memberium-crm-api' => $m4is_ybcu,  'wpal-memberium-db-queries' => $m4is_qexph9, 'wpal-memberium-cache-hits' => $m4is_tw0mqo, 'wpal-memberium-cache-misses' => $m4is_r_pk, ];
 echo "<script>\n";
 echo ' document.addEventListener( "DOMContentLoaded", function() { ' . "\n";
 foreach( $m4is_azd3yf as $m4is_s2ge5 => $m4is_w_o7al ) { echo '  document.getElementById( "' . $m4is_s2ge5 . '" ).innerHTML = "' . $m4is_w_o7al . '";' . "\n";
 } echo ' }); ' . "\n";
 echo "\n</script>";
 } 
function m4is_ufc87o( bool $m4is_dzkv = false ) { global $wp_object_cache;
 $this->m4is_nzx0t['end'] = [ 'time' => microtime( true ), 'memory' => memory_get_usage(), ];
 if ( is_admin_bar_showing() ) { $this->m4is_rvpyu();
 } return;
 if ( $m4is_dzkv == false && ! is_admin_bar_showing() ) { return;
 } $m4is_azd3yf = [ 'wpal-memberium-time' => $m4is_utg0q, 'wpal-memberium-memory' => $m4is_kxsrn, 'wpal-memberium-http-calls' => $m4is_ba61e4, 'wpal-memberium-crm-api' => $m4is_ybcu,  'wpal-memberium-db-queries' => $m4is_qexph9, 'wpal-memberium-cache-hits' => $m4is_tw0mqo, 'wpal-memberium-cache-misses' => $m4is_r_pk, ];
 echo "<script>\n";
 echo ' document.addEventListener( "DOMContentLoaded", function() { ' . "\n";
 foreach( $m4is_azd3yf as $m4is_s2ge5 => $m4is_w_o7al ) { echo '  document.getElementById( "' . $m4is_s2ge5 . '" ).innerHTML = "' . $m4is_w_o7al . '";' . "\n";
 } echo ' }); ' . "\n";
 echo "\n</script>";
 } 
function m4is_bodh() { return;
  }  
function m4is_xzocb( float $m4is_utg0q = 0.0, string $m4is_u23rl = '' ): void {  $this->m4is_nzx0t['start']['api_calls']++;
  $this->m4is_nzx0t['start']['api_time'] += $m4is_utg0q;
 } 
function m4is_d5mq( $m4is_oa_z, $m4is_k4yeul, $m4is_imdo6) {  $this->m4is_nzx0t['start']['http_calls']++;
  return $m4is_oa_z;
 }     private 
function m4is_t8lw() { if ( empty( $this->m4is_b3z8 ) ) { $m4is_olcsg = $this->m4is_wdqrsb();
 $m4is_gdczn = $this->m4is_ikr4nx();
 $this->m4is_b3z8 = [ 'm4is_tvc2xn' => 'classes/crm/keap/actionsets', 'm4is_pk8phc' => 'classes/crm/keap/affiliate', 'm4is_ho3l' => 'classes/crm/keap/interface', 'm4is_bnrdbo' => 'classes/crm/keap/contact', 'm4is_akcfiz' => 'classes/crm/keap/creditcard', 'm4is_a8iaym' => 'classes/crm/keap/custom_fields', 'm4is_untczd' => 'classes/crm/keap/ecommerce', 'm4is_ru7njr' => 'classes/crm/keap/filebox', 'm4is__gu52' => 'classes/crm/keap/httppost_log', 'm4is_dcig' => 'classes/crm/keap/owner', 'm4is_frey' => 'classes/crm/keap/social', 'm4is_a18xl' => 'classes/crm/keap/tag_categories', 'm4is_pwtg7' => 'classes/crm/keap/tags', 'keap_sdk_class' => 'vendor/i2sdkng/i2sdk',  'm4is_uv6ib' => 'classes/access/admin', 'm4is_jf8abu' => 'classes/access/access', 'm4is_nfu7hp' => 'classes/access/frontend', 'm4is_fbl5x8' => 'classes/activate', 'm4is_q1zh2' => 'classes/access/admin', 'm4is_a8gw' => 'classes/access/admin-menu', 'm4is_c82oj9' => 'classes/access/admin-taxonomy', 'm4is_j3cux' => 'classes/access/admin-widgets', 'm4is_kix1' => 'classes/adminbar', 'm4is_o968i' => 'classes/autologin', 'm4is_cclk5' => 'classes/cpt', 'm4is_kro2' => 'classes/cron', 'm4is_ior6_7' => 'classes/debuglog', 'm4is_us74' => 'classes/diagnostics', 'm4is_w0enbm' => 'classes/frontend', 'm4is_u_pahy' => 'classes/gdpr', 'm4is_sg9i6' => 'classes/geolocation', 'm4is_ss2_7' => 'classes/language', 'm4is_ypvg9' => 'classes/login', 'm4is_m_rh3' => 'classes/maintenance', 'm4is_h58oas' => 'classes/members', 'm4is_jwi_ok' => 'classes/memberships', 'm4is_vv5u' => 'classes/network_tools', 'm4is_aoxw' => 'classes/pagehandling', 'm4is_or93' => 'classes/post_sherpa', 'm4is_rv9lt' => 'classes/posts', 'm4is_u68pu' => 'classes/provisioning', 'm4is_de1d_6' => 'classes/relationships', 'm4is_bea_0' => 'classes/rss', 'm4is_rg1kh' => 'classes/sessions', 'm4is_ntvqsw' => 'classes/sitehealth', 'm4is_kjmtw1' => 'classes/time', 'm4is_i1jld5' => 'classes/updater', 'm4is_wbc8os' => 'classes/user', 'm4is_kk7m' => 'classes/words', 'm4is_n9cgzx' => 'classes/wpuser', 'm4is_s_yija' => 'classes/reset',  'm4is_juokma' => 'modules/discourse/core', 'm4is_en2tq' => 'modules/facebook/admin', 'm4is_hdrzb7' => 'modules/facebook/core', 'm4is_bzvmwb' => 'modules/facebook/shortcodes', 'm4is_pfmo' => 'modules/buddypress/core',  ];
 spl_autoload_register( [$this, 'm4is_og521'] );
 } }  
function m4is_og521( string $m4is_nz3t ) { $m4is_nz3t = strtolower( $m4is_nz3t );
 if ( $m4is_nz3t == 'i2sdk_class' ) { $m4is_dod29c = $this->m4is_oiewvu( 'settings', 'beta/oauth' ) ? 'i2sdkng' : 'i2sdk';
 include $this->m4is_h03as2( $m4is_dod29c . '/i2sdk.php' );
 } else { if ( array_key_exists( $m4is_nz3t, $this->m4is_b3z8 ) ) { $m4is_ea6ksm = substr( $this->m4is_b3z8[$m4is_nz3t], 0, 1 ) == '/' ? $this->m4is_b3z8[$m4is_nz3t] . '.php' : $this->m4is_znwy() . $this->m4is_b3z8[$m4is_nz3t] . '.php';
 if ( file_exists( $m4is_ea6ksm ) ) { include $m4is_ea6ksm;
 } } } }  
function m4is_p345( string $m4is_nz3t, string $m4is_m_mie7) { $m4is_nz3t = strtolower( trim($m4is_nz3t) );
 if (! array_key_exists($m4is_nz3t, $this->m4is_b3z8) ) { $this->m4is_b3z8[$m4is_nz3t] = $m4is_m_mie7;
 } }  
function m4is_gt7z( array $m4is_b3z8 ) { $this->m4is_b3z8 = array_merge( $this->m4is_b3z8, $m4is_b3z8 );
 }    private 
function m4is_xdm1c() { $this->m4is_wov2 = get_option( 'memberium', [] );
 $m4is_wov2 = is_array($this->m4is_wov2) ? $this->m4is_wov2 : [];
 $m4is_d4yg = empty($this->m4is_wov2);
 $m4is_r6nh_b = [ 'affiliate_detect' => 0, 'allow_autologin' => 0, 'allow_local_logins' => 1, 'allow_wpadmin_dashboard' => 'edit_others_posts', 'allow_wpadmin_titlebar' => 'edit_others_posts', 'allow_wpadmin' => 1, 'async_limit' => 0, 'async_tags' => 0, 'attachment_pages' => 1, 'autogenerate_excerpts' => 0, 'autologout_time' => 0, 'autoupdate' => 1, 'beta_update_check' => 0, 'beta/oauth' => 0, 'bruteforce_check' => 0, 'cache_bust' => 0, 'cache_flush' => 0, 'choose_affiliate' => 1, 'db_sessions' => 1, 'default_logout_page' => 0, 'default_page_redirect' => '', 'default_prohibited_action' => 'redirect', 'default_reglink_tag' => 0, 'disable_displayname_update' => 0, 'disable_login_sync' => 0, 'disable_lost_password' => 0, 'disable_password_reset' => 0, 'disable_xframe' => 0, 'display_errors' => 0, 'displayname_format' => '', 'dynamic_menus' => 0, 'enable_slug_update' => 0, 'excerpt_length' => 55, 'extended_reg_fields' => 0, 'facebook_app_id' => '', 'fast_user_list' => 0, 'first_login_page' => 0, 'force_learndash_inheritance' => defined('LEARNDASH_VERSION') ? 1 : 0, 'global_excerpt' => '', 'hashing_mode' => 'plain', 'html_shortcode_embed' => 1, 'httppost_log' => 1, 'ignore_affiliate_fields' => '', 'ignore_contact_fields' => 'ContactNotes', 'ignore_tag_categories' => '', 'include_default_excerpt' => '', 'known_logins_only' => 0, 'last_login_field' => '', 'license_key' => '', 'local_auth_only' => 0, 'login_actionset' => 0, 'login_log' => 1, 'login_log_length' => 30, 'login_tag' => 0, 'login_url' => 0, 'logout_actionset' => 0, 'logout_tag' => 0, 'makepass_scan_size' => 5, 'makepass_scan_tag' => 0, 'makepass_success_actionset' => 0, 'makepass_success_tag' => 0, 'max_affiliate_age' => 0, 'max_contact_age' => 0, 'maximum_login_ips' => 0, 'maximum_login_timeframe' => 0, 'memberium_user_registration_tag' => 0, 'merchant_account_id' => 0, 'microcache_compat_session' => 0, 'min_password_length' => 8, 'multi_language' => 0, 'new_user_registration_tag' => 0, 'page_inheritance' => 1, 'password_field' => 'Password', 'password_reset_tag' => 0, 'password_strength' => 0, 'persistent_login' => 0, 'plaintext_db' => 0, 'plaintext_db' => 0, 'preview_mode' => 0, 'protect_feeds' => 1, 'referral_partner_order' => 1,  'registration_url' => 0, 'require_membership' => 0, 'session_timeout' => 0, 'show_advanced_options' => 0, 'show_post_columns' => 0, 'simultaneous_logins' => 0, 'site_ban_tag' => 0, 'site_lock_enabled' => 0, 'spiffy_subdomain' => '', 'spiffy_api_key' => '', 'sync_affiliate' => 0, 'sync_ecommerce' => 0, 'sync_meta_updates' => 0, 'sync_new_wp_users' => 0, 'sync_users' => 0, 'telemetry' => 1, 'thrivecart_secret' => '', 'two_pass_shortcode_filter' => 0, 'user_registration_tag' => 0, 'username_field' => 'Email', 'version' => $this->m4is_u04m(), 'wp_autop' => 0, 'wplogin_redirect_to' => 0, ];
 $m4is_w2w8 = $this->m4is_wov2['settings'];
 $m4is_w2w8 = wp_parse_args($m4is_w2w8, $m4is_r6nh_b);
 $this->m4is_wov2['settings'] = $m4is_w2w8;
 return $this->m4is_wov2;
 } private 
function m4is_h7cls() { $i2sdk_options = $this->get_i2sdk_options();
 $m4is_jzhji7 = $this->m4is_se2n8();
 $m4is_j_xo4w = $this->m4is_zw_n();
 $this->m4is_oqfa['appname'] = method_exists( $m4is_j_xo4w, 'getAppName' ) ? $m4is_j_xo4w->getAppName() : '';
 $this->m4is_oqfa['verified'] = method_exists( $m4is_jzhji7, 'isVerified' ) ? $m4is_jzhji7->isVerified() : false;
 $this->m4is_oqfa['api_key'] = isset( $i2sdk_options['api_key'] ) ? $i2sdk_options['api_key'] : '';
 }    
function m4is_edq5( $m4is_zj46 ) { if ( $m4is_zj46 !== $this->m4is__vgnju ) { return;
 } } 
function m4is_z4u6wr() { static $m4is_k8n6k1 = false;
 if ( $m4is_k8n6k1 ) { return;
 } require_once $this->m4is_s3po7k( 'memberium_api.php' );
 require_once $this->m4is_s3po7k( 'functions.php' );
 $this->m4is_els9();
 $this->m4is_h7cls();
 $this->m4is_rrapgd();
 $this->m4is_y2aj();
  $m4is_k8n6k1 = true;
 $this->servername = preg_replace( '/^www\./', '', strtolower( parse_url( get_bloginfo( 'url' ), PHP_URL_HOST ) ) );
 $this->i2sdk = keap_sdk_class::get_i2sdk();
  $this->isdk = $this->i2sdk->isdk;
 $this->i2sdk_options = $this->get_i2sdk_options();
 $this->license_key_name = m4is_u68pu::m4is_o84q0a();
 m4is_u68pu::m4is_i9k3m();
  $this->m4is_xzglo();
 $this->m4is_ww61so();
 $this->m4is_k_fr5();
 if ( isset( $_COOKIE['login_error'] ) ) { $this->login_error = esc_html( __( $_COOKIE['login_error'] ) );
 setcookie( 'login_error', '', ( time() - 86400 ) );
 } } 
function m4is_tmpk() {  if ( ! m4is_u68pu::m4is_i9k3m() ) { return;
 } $this->m4is_uq3z();
 $this->m4is_lhw5_q();
 $this->m4is_gvg5pi();
 $this->m4is_zzes();
  }  private 
function m4is_els9() {  if ( ! defined( 'I2SDK_HOME' )) {  $m4is_oqu3j = $this->m4is_oiewvu( 'settings', 'beta/oauth' ) ? 'i2sdkng' : 'i2sdk';
  $m4is_hdj8xi = $this->m4is_znwy() . "vendor/{$m4is_oqu3j}/i2sdk.php";
  require_once $m4is_hdj8xi;
 } }     
function m4is_bcb0() {  static $m4is_lq7v = false;
  if ($m4is_lq7v) { return $m4is_lq7v;
 }  $m4is_lq7v = get_option( 'memberium/system/config/timestamp', 0 );
 return $m4is_lq7v;
 }  
function m4is_u7g91i() : float {  $m4is_yt9k4 = microtime( true );
  update_option( 'memberium_system_config_timestamp', $m4is_yt9k4, true );
 return $m4is_yt9k4;
 }  
function m4is_b8rm() : int { return (int) MEMBERIUM_NESTING_LEVELS;
 }  
function m4is_d14zr ( string $m4is_s2ge5 ) {   return isset( $this->m4is_oqfa[$m4is_s2ge5] ) ? $this->m4is_oqfa[$m4is_s2ge5] : FALSE;
 }  
function m4is_c8vw6r ( string $m4is_s2ge5, string $m4is_w_o7al ) { $this->m4is_oqfa[$m4is_s2ge5] = $m4is_w_o7al;
 }  
function m4is_d18lyg( $m4is_wov2 = false ) {  if ( is_array( $m4is_wov2 ) ) {  $this->m4is_wov2 = $m4is_wov2;
 }  update_option('memberium', $this->m4is_wov2, TRUE);
  $this->m4is_u7g91i();
 }  
function m4is_oiewvu( string $m4is_ml7s2b = '', string $m4is_s2ge5 = '', string $m4is_koi38 = '' ) {  if (empty($this->m4is_wov2)) { $this->m4is_wov2 = $this->m4is_xdm1c();
 }  $m4is_w_o7al = $m4is_koi38;
  if (!empty($m4is_ml7s2b)) {  if (!empty($m4is_s2ge5)) {  if (isset($this->m4is_wov2[$m4is_ml7s2b][$m4is_s2ge5])) { $m4is_w_o7al = $this->m4is_wov2[$m4is_ml7s2b][$m4is_s2ge5];
 } } else {  if (isset($this->m4is_wov2[$m4is_ml7s2b])) { $m4is_w_o7al = $this->m4is_wov2[$m4is_ml7s2b];
 } else {  $m4is_w_o7al = [];
 } } } else {  $m4is_w_o7al = $this->m4is_wov2;
 } return $m4is_w_o7al;
 }  
function m4is_qdi_3o( $m4is_w_o7al = '', string $m4is_ml7s2b = '', string $m4is_s2ge5 = '' ) {  if (empty($m4is_ml7s2b) && empty($m4is_s2ge5)) { $this->m4is_wov2 = $m4is_w_o7al;
 }  elseif (!empty($m4is_ml7s2b) && empty($m4is_s2ge5)) { $this->m4is_wov2[$m4is_ml7s2b] = $m4is_w_o7al;
 }  elseif (!empty($m4is_ml7s2b) && !empty($m4is_s2ge5)) { $this->m4is_wov2[$m4is_ml7s2b][$m4is_s2ge5] = $m4is_w_o7al;
 }  $this->m4is_d18lyg();
 }  
function m4is_bbvp( string $m4is_s2ge5, $m4is_w_o7al = '' ) {  $m4is_s2ge5 = strtolower( trim($m4is_s2ge5) );
  $m4is_w_o7al = trim($m4is_w_o7al);
    $this->m4is_qjai[$m4is_s2ge5] = $m4is_w_o7al;
 } 
function m4is_cgzvln(string $m4is_s2ge5, $m4is_koi38 = false) { $m4is_s2ge5 = strtolower( trim($m4is_s2ge5) );
 return isset( $this->m4is_qjai[$m4is_s2ge5] ) ? $this->m4is_qjai[$m4is_s2ge5] : $m4is_koi38;
 } 
function m4is_cb8qj(string $m4is_s2ge5 = '', $m4is_m07ps = 1) { $this->m4is_qjai[$m4is_s2ge5] = isset($this->m4is_qjai[$m4is_s2ge5]) ? $this->m4is_qjai[$m4is_s2ge5] : 0;
 $this->m4is_qjai[$m4is_s2ge5] = $this->m4is_qjai[$m4is_s2ge5] + $m4is_m07ps;
 return $this->m4is_qjai[$m4is_s2ge5];
 } 
function m4is_q0oz(string $m4is_s2ge5 = '', $m4is_m07ps = 1) { $this->m4is_qjai[$m4is_s2ge5] = isset($this->m4is_qjai[$m4is_s2ge5]) ? $this->m4is_qjai[$m4is_s2ge5] : 0;
 $this->m4is_qjai[$m4is_s2ge5] = $this->m4is_qjai[$m4is_s2ge5] - $m4is_m07ps;
 return $this->m4is_qjai[$m4is_s2ge5];
 }     
function m4is_fyvf() { return;
 $m4is_p5kpm = [ ];
 foreach( $m4is_p5kpm as $m4is_r34hj8 ) { $m4is_m_mie7 = $this->m4is_znwy() . "vendor/{$m4is_r34hj8}/init.php";
 if ( file_exists( $m4is_m_mie7 ) ) { include_once $m4is_m_mie7;
 } } }  
function m4is_ok97x() { $m4is_p5kpm = $this->m4is_bv0x();
 $m4is_yfi93 = get_option( 'memberium_extensions', [] );
 $m4is_k5wd = $this->m4is_m1x4a7();
 foreach( $m4is_p5kpm as $m4is_r34hj8 => $m4is_ea6ksm ) { if ( ! empty( $m4is_yfi93[$m4is_r34hj8] ) ) { if ( array_key_exists( $m4is_r34hj8, $m4is_k5wd ) ) { include_once $this->m4is_znwy() . 'vendor/' . $m4is_ea6ksm;
 } else{ include_once $this->m4is_ikr4nx( $m4is_ea6ksm );
 } } } }  
function m4is_m1x4a7(){ return [  ];
 }  
function m4is_bv0x() { $m4is_p5kpm = [ 'affiliate-leaderboards' => 'affiliate-leaderboards/init.php', 'facebook' => 'facebook/init.php', 'pathprotect' => 'pathprotect/init.php', 'spiffy' => 'spiffy/core.php', 'umbrella-accounts' => 'umbrella-accounts/init.php',  ];
 return $m4is_p5kpm;
 }     
function m4is_mbyh() {   $this->m4is_vyh4 = [ 'i18n/contact_memberium' => 'Please contact Memberium Support for assistance.', 'i18n/error' => 'Error', 'i18n/forbidden' => 'Forbidden', 'i18n/login_failed' => 'Login Failed', 'i18n/maximum_logins_exceeded' => 'Maximum Logins Exceeded', ];
 }  
function m4is_tcuib( array $m4is_gx0fq ) { $this->m4is_vyh4 = array_merge( $this->m4is_vyh4, $m4is_gx0fq );
 }  
function m4is_zga5_c( string $m4is_mpia, string $m4is_hl8q = 'memberium' ) { $m4is_uzfw8j = empty( $this->m4is_vyh4[$m4is_mpia] ) ? '' : _x( $this->m4is_vyh4[$m4is_mpia], $m4is_hl8q, 'memberium' );
 $m4is_uzfw8j = apply_filters( 'memberium/i18n/translation', $m4is_uzfw8j, $m4is_mpia );
 return empty( $this->m4is_vyh4[$m4is_mpia] ) ? '' : _x( $this->m4is_vyh4[$m4is_mpia], $m4is_hl8q, 'memberium' );
 }  
function m4is_snyx( bool $m4is_w_o7al ) { $this->m4is_tq3sh = $m4is_w_o7al;
 } 
function m4is_mc71() : bool { return $this->m4is_tq3sh;
 }     
function m4is_nhtyc() : array {  $m4is_qtapuz = get_post_types(['public' => false]);
  $m4is_fvc10 = [  'attachment',  'elementor_library',  'et_pb_layout',  'llms_engagement', 'llms_membership', 'llms_question', 'nomination', 'shop_coupon', 'shop_order', 'shop_subscription', 'submission',  'fl-builder-template', ];
  if (is_array($m4is_qtapuz)) {  foreach($m4is_qtapuz as $m4is_a_hn) {  if (! in_array($m4is_a_hn, ['memb_shortcodeblocks', 'partials'])) { $m4is_fvc10[] = $m4is_a_hn;
 } } }  unset($m4is_qtapuz, $m4is_a_hn);
  $m4is_fvc10 = apply_filters('memberium/posts/unenhanced', $m4is_fvc10);
  return $m4is_fvc10;
 }     
function m4is_jln7r1($m4is_a0hil) {  if (defined('WPAL_DISABLE_SSL_VERIFY') && WPAL_DISABLE_SSL_VERIFY == true) {  curl_setopt($m4is_a0hil, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($m4is_a0hil, CURLOPT_SSL_VERIFYPEER, false);
 }  return $m4is_a0hil;
 }  
function m4is_fv0i5e($m4is_mp3x, $m4is_imdo6) {  if ( $m4is_mp3x['sslverify'] == true ) { if ( defined( 'WPAL_DISABLE_SSL_VERIFY' ) && WPAL_DISABLE_SSL_VERIFY == true ) { $m4is_mp3x['sslverify'] = false;
 } }  return $m4is_mp3x;
 }  
function m4is_se2n8() { return $this->m4is_jzhji7 ?? keap_sdk_class::get_i2sdk();
  }  
function m4is_zw_n() {      return $this->isdk ?? $this->m4is_se2n8()->isdk;
 }  
function get_i2sdk_options() {  if ( method_exists( 'i2sdk_class', 'get_i2sdk_options' ) ) {  return i2sdk_class::get_i2sdk_options();
 }  $m4is_ch4d = get_option( 'i2sdk' );
  if (! $m4is_ch4d) { $m4is_ch4d = [];
 }  $m4is_r6nh_b = [ 'access_token' => '', 'api_key' => '', 'api_log' => 0, 'app_name' => '', 'db_prefix' => '', 'debug_mode' => '', 'delete_on_uninstall' => 0, 'email_notification' => 0, 'error_email' => '', 'error_log' => 0, 'http_post_key' => '', 'infusionsoft_analytics' => 0, 'oauth_enabled' => 0, 'retry_count' => 3, 'server_verified' => 0, 'tracking_code' => '', 'version' => I2SDK_VERSION, ];
   $m4is_ch4d = wp_parse_args( $m4is_ch4d, $m4is_r6nh_b );
  return $m4is_ch4d;
 }    
function m4is_soflk3() {   }  
function m4is_pv3s( array $m4is_qtapuz ) : array { $m4is_qtapuz[] = 'memb_shortcodeblocks';
 $m4is_qtapuz[] = 'partials';
 return $m4is_qtapuz;
 }    
function m4is_znwy() { return $this->m4is_d9m5k;
 } 
function m4is_t7exn() { return $this->m4is__vgnju;
 } 
function m4is_wdqrsb( string $m4is_ea6ksm = '' ) : string { return $this->m4is_znwy() . 'classes/' . $m4is_ea6ksm;
 } 
function m4is_ikr4nx( string $m4is_ea6ksm = '' ) : string { return $this->m4is_znwy() . 'modules/' . $m4is_ea6ksm;
 } 
function m4is_ev6n7e( string $m4is_ea6ksm = '' ) : string { return $this->m4is_znwy() . 'screens/' . $m4is_ea6ksm;
 } 
function m4is_s3po7k( string $m4is_ea6ksm = '' ) : string { return $this->m4is_znwy() . 'includes/' . $m4is_ea6ksm;
 } 
function m4is_h03as2( string $m4is_ea6ksm = '' ) : string { return $this->m4is_znwy() . 'vendor/' . $m4is_ea6ksm;
 }    
function m4is_f25d() : string { return ini_get( 'memory_limit' );
 } 
function m4is_hh9s() : string { static $m4is_yclkvi = '';
 if ( empty( $m4is_yclkvi ) ) { include ABSPATH . WPINC . '/version.php';
 $m4is_yclkvi = $wp_version;
 } return $m4is_yclkvi;
 } 
function m4is_shfp8b() : string { return function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production';
 } 
function m4is_lvmz1b( $m4is_ig9p6 = 0 ) : bool { $m4is_oa_z = false;
 $m4is_x0_hk = empty( $m4is_ig9p6 ) ? wp_get_current_user() : get_user_by( 'ID', $m4is_ig9p6 );
 if ( is_a( $m4is_x0_hk, 'WP_User' ) ) { $m4is_a3nxjy = [ 'activate_plugins', 'manage_options', 'update_plugins', ];
 foreach($m4is_a3nxjy as $m4is_ulh3b) { $m4is_oa_z = $m4is_x0_hk->has_cap($m4is_ulh3b);
 if ( $m4is_oa_z ) { break;
 } } } return $m4is_oa_z;
 } 
function m4is_rvz2(int $m4is_cd8k, string $m4is_koi38 = '') : array { static $m4is_flx71n = [ '_is4wp_access_tags', '_is4wp_access_tags2', '_is4wp_anonymous_only', '_is4wp_any_loggedin_user', '_is4wp_any_membership', '_is4wp_contact_ids', '_is4wp_facebook_crawler', '_is4wp_force_public', '_is4wp_google_1stclick', '_is4wp_membership_levels', ];
 $m4is_q_ob6 = "postmeta:access:{$m4is_cd8k}:";
 $m4is_uwdfj = false;
 $m4is_oa_z = wp_cache_get($m4is_q_ob6, 'memberium2/postmeta', false, $m4is_uwdfj);
 if (! $m4is_uwdfj) { global $wpdb;
 $m4is_ahsbm8 = "'" . implode("','", $m4is_flx71n) . "'";
 $m4is_tovizk = "SELECT `meta_key`, `meta_value` FROM {$wpdb->postmeta} WHERE `post_id` = {$m4is_cd8k} AND `meta_key` IN ( {$m4is_ahsbm8} )";
 $m4is_hpn9y = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_oa_z = [];
 foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_oa_z[$m4is_ke_fr['meta_key']] = $m4is_ke_fr['meta_value'];
 } wp_cache_set($m4is_q_ob6, $m4is_oa_z, 'memberium2/postmeta', 10800);
 } if (! is_null($m4is_koi38) ) { foreach($m4is_flx71n as $m4is_s2ge5) { if (! isset($m4is_oa_z[$m4is_s2ge5])) { $m4is_oa_z[$m4is_s2ge5] = $m4is_koi38;
 } } } return $m4is_oa_z;
 } 
function m4is_z3y0(int $m4is_cd8k) { wp_cache_delete("postmeta:access:{$m4is_cd8k}", 'memberium2/postmeta');
 }    
function m4is_bd7z() { static $m4is_bu7y = false;
 if ( include_once ABSPATH . '/wp-admin/includes/plugin.php' ) { $m4is_bu7y = trim(get_plugin_data(MEMBERIUM_HOME, false, false)['Version']);
 if ($m4is_bu7y) { $this->m4is_qdi_3o($m4is_bu7y, 'settings', 'version');
 } } return $m4is_bu7y;
 } 
function m4is_u04m() : string { static $m4is_bu7y = false;
 if (! $m4is_bu7y) { require_once ABSPATH . '/wp-admin/includes/plugin.php';
 $m4is_bu7y = trim(get_plugin_data(MEMBERIUM_HOME, false, false)['Version']);
 } if (! $m4is_bu7y) { $m4is_bu7y = $this->m4is_oiewvu('settings', 'version', false);
 } return $m4is_bu7y;
 } 
function m4is_he_yjv() : bool { return (bool) $this->m4is_irfv8_;
 } 
function m4is_xb8k(bool $m4is_n3zt) { $this->m4is_irfv8_ = $m4is_n3zt;
 } 
function m4is_dpuy9() : int { return (int) m4is_wbc8os::m4is_jjgo();
 } 
function m4is_je8_gj(int $m4is_e2kg) { if (isset($_SESSION['memb_user']['crm_id']) && $m4is_e2kg <> $_SESSION['memb_user']['crm_id']) { if ($m4is_e2kg == 0) { $this->m4is_nekv();
 } } } 
function m4is_y903nq(bool $m4is_gl7mx4 = true) { $this->m4is_gl7mx4 = (boolean) $m4is_gl7mx4;
 } 
function m4is_e9cok() : bool { return (bool) $this->m4is_gl7mx4;
 } 
function m4is_raqc($m4is_yer1mp = 20) { global $wpdb;
 $m4is_yer1mp = (int) $m4is_yer1mp;
 $m4is_tovizk = "SELECT {$wpdb->users}.*, {$wpdb->usermeta}.meta_key FROM {$wpdb->users} LEFT OUTER JOIN {$wpdb->usermeta} ON ({$wpdb->usermeta}.user_id = {$wpdb->users}.ID AND {$wpdb->usermeta}.meta_key = 'infusionsoft_user_id') WHERE {$wpdb->usermeta}.meta_key IS NULL LIMIT {$m4is_yer1mp};
";
  $m4is_tovizk = "SELECT {$wpdb->users}.* FROM {$wpdb->users} LEFT OUTER JOIN {$wpdb->usermeta} ON ({$wpdb->usermeta}.user_id = {$wpdb->users}.ID AND {$wpdb->usermeta}.meta_key = 'infusionsoft_user_id') WHERE {$wpdb->usermeta}.meta_key IS NULL LIMIT {$m4is_yer1mp};
";
  $m4is_jfds = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 foreach($m4is_jfds as $m4is_x0_hk) {  $m4is_p9r_8e = [];
 $m4is_p9r_8e['Email'] = $m4is_x0_hk['user_email'];
 $m4is_p9r_8e['Leadsource'] = 'Memberium User Sync';
 if (! empty($m4is_x0_hk['user_url']) ) { $m4is_p9r_8e['Website'] = $m4is_x0_hk['user_url'];
 } if (! empty($m4is_x0_hk['user_nicename']) ) { $m4is_p9r_8e['Nickname'] = $m4is_x0_hk['user_nicename'];
 } $m4is_tovizk = "SELECT {$wpdb->usermeta}.meta_key, {$wpdb->usermeta}.meta_value FROM {$wpdb->usermeta} WHERE user_id = {$m4is_x0_hk['ID']};
";
 $m4is_auhoe = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_m4df = apply_filters('memberium/usermeta/crm_field_maps', $m4is_m4df);
 foreach($m4is_auhoe as $m4is_p51e_l) { foreach ($m4is_m4df as $m4is_q7vyl4=>$m4is_q4kyz) { if ($m4is_p51e_l['meta_key'] == $m4is_q7vyl4 && ! empty($m4is_p51e_l['meta_value']) ) { $m4is_p9r_8e[$m4is_q4kyz] = $m4is_p51e_l['meta_value'];
 } } } if (isset($m4is_p9r_8e['Country']) ) { $m4is_p9r_8e['Country'] = m4is_sg9i6::m4is_wqxe($m4is_p9r_8e['Country']);
 } if (isset($m4is_p9r_8e['Country2']) ) { $m4is_p9r_8e['Country2'] = m4is_sg9i6::m4is_wqxe($m4is_p9r_8e['Country2']);
 } if (isset($m4is_p9r_8e['Country3']) ) { $m4is_p9r_8e['Country3'] = m4is_sg9i6::m4is_wqxe($m4is_p9r_8e['Country3']);
 } $m4is_e2kg = m4is_bnrdbo::m4is_klk1gy($m4is_p9r_8e);
 m4is_bnrdbo::m4is_xj2eb($m4is_p9r_8e['Email'], 'Memberium User Sync');
 sleep(1);
 $this->m4is_wday($m4is_e2kg, $m4is_x0_hk['ID']);
 } if ($m4is_i5cm39 && (count($m4is_jfds) == $m4is_yer1mp) ) { wp_redirect($_SERVER['REQUEST_URI'], 302, 'SyncUser Redirect');
 echo '<meta http-equiv="refresh" content="1;URL=\'"', $_SERVER['REQUEST_URI'], '\'" /> ';
 exit;
 } }    
function m4is_extib(array $m4is_r6nh_b) : array { $m4is_a97xh = $m4is_r6nh_b['I18n'];
 $m4is_a97xh['menu_name'] = __('MemberiumPay', 'memberium');
 $m4is_a97xh['keys_title'] = __('Tags', 'memberium');
 $m4is_a97xh['key_title'] = __('Tag', 'memberium');
 return [ 'debug' => 0, 'shortcode_prefix' => 'memb', 'database_prefix' => 'memberium_', 'menu_position' => 2, 'min_password_length' => $this->m4is_oiewvu('settings', 'min_password_length', 8), 'is_pro_install' => 1,  'tmpl_theme_dir' => 'memberium/ecomm/', 'tmpl_plugin_path' => $this->m4is_znwy() . '/templates/ecomm/', 'report_page' => false, 'report_name' => 'memberium-ecomm-orders', 'I18n' => $m4is_a97xh ];
 } 
function m4is_fp7l2t($m4is_x0_hk = false, $m4is_fx7a0 = false, $m4is_qmj0el = []) {  if( ! $m4is_fx7a0 ){ $m4is_fliw = !empty($m4is_qmj0el['billing_email']) ? $m4is_qmj0el['billing_email'] : false;
 $m4is_j485e = false;
 }  else{ $m4is_fliw = $m4is_fx7a0['user_email'];
 $m4is_j485e = ( !empty($m4is_fx7a0['user_pass']) ) ? $m4is_fx7a0['user_pass'] : false;
 }  $m4is_x0_hk = ( $m4is_x0_hk ) ? $m4is_x0_hk : get_user_by('email', $m4is_fliw);
 $m4is_ig9p6 = ( $m4is_x0_hk ) ? $m4is_x0_hk->ID : false;
 $m4is_e2kg = ( $m4is_ig9p6 ) ? get_user_meta($m4is_ig9p6, 'infusionsoft_user_id', true) : false;
 $elvmap_filter = ( $m4is_x0_hk ) ? 'memberium/usermeta/crm_field_maps' : 'memberium_registration_field_map';
  $m4is_m4df = apply_filters($elvmap_filter, []);
 $m4is_p9r_8e = [];
 foreach($m4is_m4df as $m4is_rs0z_j => $m4is_e0dhw) { if (isset($m4is_qmj0el[$m4is_rs0z_j]) ) { $m4is_p9r_8e[$m4is_e0dhw] = trim($m4is_qmj0el[$m4is_rs0z_j]);
  if( $m4is_rs0z_j === 'billing_country' && !empty($m4is_p9r_8e[$m4is_e0dhw]) ){ $m4is_p9r_8e[$m4is_e0dhw] = memb_wpal_ecomm_countrycode_to_infusionsoft($m4is_p9r_8e[$m4is_e0dhw]);
 }  else if( $m4is_rs0z_j === 'billing_postcode' && !empty($m4is_p9r_8e[$m4is_e0dhw]) ){ $m4is_p9r_8e[$m4is_e0dhw] = strtoupper($m4is_p9r_8e[$m4is_e0dhw]);
 } } } $m4is_p9r_8e['Email'] = $m4is_fliw;
  if( $m4is_e2kg ){ $m4is_xncrh = m4is_bnrdbo::m4is_yvnol($m4is_e2kg);
 if( empty($m4is_xncrh) ){ $m4is_e2kg = false;
 } else{  foreach ($m4is_p9r_8e as $m4is_iqdn => $m4is_wuh95) { if( isset($m4is_xncrh[$m4is_iqdn]) ){ if( $m4is_xncrh[$m4is_iqdn] === $m4is_wuh95 ){ unset($m4is_p9r_8e[$m4is_iqdn]);
 } } } if( ! empty($m4is_p9r_8e) ){ m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is_p9r_8e);
 } } }  if( ! $m4is_e2kg ){ if( $m4is_j485e ){ $m4is_dcf_7 = $this->m4is_oiewvu('settings', 'password_field', 'Password');
 $m4is_p9r_8e[$m4is_dcf_7] = $m4is_j485e;
 } $m4is_e2kg = m4is_bnrdbo::m4is_klk1gy($m4is_p9r_8e);
 m4is_bnrdbo::m4is_xj2eb($m4is_fliw, 'Membership Site Purchase');
 $this->m4is_leu58($m4is_e2kg);
  } $m4is_ig9p6 = $this->m4is_b34y($m4is_e2kg, $m4is_j485e);
 return ( (int)$m4is_ig9p6 > 0 ) ? get_user_by('ID', $m4is_ig9p6) : false;
 }    
function m4is_zljisd(string $m4is_imdo6, string $m4is__7cx, bool $m4is_t07p) : string { $m4is_c14oc = $this->m4is_oiewvu('settings', 'login_url');
 if ($m4is_c14oc < 1) { if (! empty($m4is__7cx) ) { $m4is_imdo6 = add_query_arg('redirect_to', $m4is__7cx, $m4is_imdo6);
 } } else { $m4is_kulvg = get_permalink($m4is_c14oc);
 if (! empty($m4is_kulvg) ) { if (! empty($m4is__7cx) ) { $m4is_imdo6 = add_query_arg('redirect_to', $m4is__7cx, $m4is_kulvg);
 } } } return $m4is_imdo6;
 }    
function m4is_jpd4( $m4is_vs6ob = [] ) { $m4is_al5ej7 = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 $m4is_vs6ob['first_name'] = 'FirstName';
 $m4is_vs6ob['last_name'] = 'LastName';
 foreach( $m4is_al5ej7 as $m4is_iqdn ) { $m4is_rs0z_j = 'memb_' . $m4is_iqdn;
 $m4is_vs6ob[$m4is_rs0z_j] = $m4is_iqdn;
 } return $m4is_vs6ob;
 } 
function m4is_j6aw9( $m4is_eacwb, $m4is_ig9p6, $m4is_yx0i, $m4is_ra9ly, $m4is_fo0y_x ) { global $wpdb;
  if ( $m4is_ra9ly == $m4is_fo0y_x ) { return $m4is_eacwb;
 } if ( $this->m4is_mc71() ) { return $m4is_eacwb;
 }  $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_e2kg ) { return $m4is_eacwb;
 } $m4is_i_q2 = empty( $m4is_i_q2 ) ? apply_filters( 'memberium/usermeta/crm_field_maps', [] ) : $m4is_i_q2;
  if ( ! isset( $m4is_i_q2[$m4is_yx0i] ) ) { return $m4is_eacwb;
 }  $m4is_yxwn = $m4is_i_q2[$m4is_yx0i];
 $this->m4is_wzxl_1( $m4is_i_q2[$m4is_yx0i], $m4is_ra9ly, $m4is_e2kg );
 return $m4is_eacwb;
  }     
function m4is_pk8yj($m4is_x0_hk, $m4is_g_ou = '') { if ( $this->m4is_oiewvu('settings', 'local_auth_only') ) { return;
 } if (empty($m4is_g_ou) ) { $m4is_g_ou = (isset($_POST['password_1']) && isset($_POST['password_2']) ) ? $_POST['password_1'] : '';
 }  $m4is_e2kg = (int) $this->m4is_gz8a($m4is_x0_hk->user_email);
 if ($m4is_e2kg > 0) {  $m4is_dcf_7 = $this->m4is_oiewvu('settings', 'password_field');
 $m4is_p9r_8e = [ $m4is_dcf_7 => $m4is_g_ou ];
 m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is_p9r_8e, true);
  } } 
function m4is_xgviu0() { if (! is_user_logged_in() ) { $this->m4is_nekv();
 }  if ( ( $this->m4is_dpuy9() > 0 ) && empty( $_SESSION['keap']['contact'] ) ) { $this->m4is_akz3();
 } if (m4is_u68pu::m4is_i9k3m() ) { $this->m4is_stywla();
 add_post_type_support('sfwd-courses', 'excerpt');
 add_post_type_support('sfwd-lessons', 'excerpt');
 add_post_type_support('sfwd-topic', 'excerpt');
 } }    private 
function m4is_fcjwg() { if ( defined( 'ET_BUILDER_PLUGIN_VERSION' ) ) { return true;
 } $m4is_t65mr = wp_get_theme()->parent() ? wp_get_theme()->parent()->get( 'Name' ) : wp_get_theme()->get( 'Name' );
 if ( stripos( $m4is_t65mr, 'Divi' ) !== false ) { return true;
 } return false;
 } 
function m4is_axw_() {  } private 
function m4is_gvg5pi() { $m4is_oghvl = m4is_u68pu::m4is_u26m8u( [ 'unlimited', 'icc' ] );
 if( class_exists( 'FLBuilder' ) ) { if ( include_once $this->m4is_ikr4nx( 'beaver-builder/core.php' ) ) { m4is_f1zdq::m4is_e5l8a9()->m4is_z4u6wr();
 } } if ( $this->m4is_fcjwg() ) { if ( include_once $this->m4is_ikr4nx( 'divi/core.php' ) ){ m4is_qci52x::m4is_e5l8a9()->m4is_z4u6wr();
 } } if( defined( 'ELEMENTOR_VERSION' ) ){ if ( include_once $this->m4is_ikr4nx('elementor/core.php') ){ m4is_teku3::m4is_e5l8a9()->m4is_z4u6wr();
 } } if ( defined( 'CT_VERSION' ) ) { if ( include_once $this->m4is_ikr4nx( 'oxygen/oxygen.php' ) ) { m4is_ok6vg::m4is_e5l8a9();
 } }  if ( $m4is_oghvl ) { if ( class_exists( '\TCB\ConditionalDisplay\Main' ) ) { if ( include_once $this->m4is_ikr4nx( 'thrivethemes/core.php' ) ) { m4is_d9r2::m4is_e5l8a9();
 } } if ( defined( 'FUSION_CORE_VERSION' ) ) { if ( include_once $this->m4is_ikr4nx( 'avada/core.php' ) ) { m4is_cpe5d::m4is_e5l8a9();
 } } } include_once __DIR__ . '/access/access.php';
 m4is_jf8abu::m4is_e5l8a9()->m4is_z4u6wr();
 } private 
function m4is_zzes() { if ( ! in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '71.92.64.210'] )) { return;
 } if (class_exists('Easy_Digital_Downloads') ) { if (include_once $this->m4is_ikr4nx('easy-digital-downloads/core.php') ) { m4is_op7f3u::m4is_e5l8a9();
 } } if (defined('FLUENTFORM_VERSION')) { include_once $this->m4is_ikr4nx('fluentforms/core.php');
 } } private 
function m4is_uq3z() { if ( class_exists( 'AppPresser' ) ) { include_once MEMBERIUM_DIR . '/vendor/apppresser/apppresser.php';
 } if ( class_exists( 'bbPress' ) ) { if ( include_once $this->m4is_ikr4nx( 'bbpress/core.php' ) ) { m4is_izdk::m4is_e5l8a9();
 } } if ( class_exists( 'BadgeOS' ) ) { if ( include_once $this->m4is_ikr4nx( 'badgeos/core.php' ) ) { m4is_quopci::m4is_e5l8a9();
 } } if ( function_exists( 'bp_is_active' ) || function_exists( 'buddypress' ) ) { if ( include_once $this->m4is_ikr4nx( 'buddypress/core.php' ) ) { m4is_pfmo::m4is_e5l8a9();
 } } if ( class_exists( 'WP_E_Digital_Signature' ) ) { if ( include_once $this->m4is_ikr4nx( 'wpesignature/core.php' ) ) { m4is_vstu::m4is_e5l8a9();
 } } if ( class_exists( 'GamiPress' ) ) { if ( include_once $this->m4is_ikr4nx( 'gamipress/core.php' ) ) { m4is_t2cd::m4is_e5l8a9();
 } } if ( defined( 'LEARNDASH_VERSION' ) && version_compare( LEARNDASH_VERSION, 3, '>=' ) ) { if ( include_once $this->m4is_ikr4nx( 'learndash/core.php' ) ) { m4is_qqx6yv::m4is_e5l8a9();
 } } if ( defined( 'LLMS_VERSION' ) ) { if ( include_once $this->m4is_ikr4nx( 'lifterlms/core.php' ) ) { m4is_tcv7lh::m4is_e5l8a9();
 } } if ( class_exists( 'LearnPress' ) ) { if ( include_once $this->m4is_ikr4nx( 'learnpress/core.php' ) ) { m4is_u0j7b2::m4is_e5l8a9();
 } } if ( class_exists( 'PeepSoGroupsPlugin' ) ) { if ( include_once $this->m4is_ikr4nx( 'peepso-groups/core.php' ) ) { m4is_gv3m0::m4is_e5l8a9();
 } } if ( function_exists( 'sensei' ) ) { if ( include_once $this->m4is_ikr4nx( 'sensei/core.php' ) ) { m4is_btu_h::m4is_e5l8a9();
 } }  if ( class_exists( 'um' ) ) { if ( include_once $this->m4is_ikr4nx( 'ultimatemember/core.php' ) ) { m4is_u7nzl::m4is_e5l8a9();
 } }  if ( defined( 'PROFILE_BUILDER_VERSION' ) ) { require_once $this->m4is_ikr4nx( 'profile-builder/init.php' );
 }  if ( class_exists('woocommerce') ) { if ( include_once $this->m4is_ikr4nx( 'woocommerce/core.php' ) ) { m4is_wxe3hj::m4is_e5l8a9();
 } }  if ( class_exists( 'WPComplete' ) ) { if ( include_once $this->m4is_ikr4nx( 'wpcomplete/core.php' ) ) { m4is_hfep::m4is_e5l8a9();
 } } if ( defined( 'WPCW_PLUGIN_ID' ) ) { if ( include_once $this->m4is_ikr4nx( 'wpcourseware/core.php' ) ) { m4is_dule::m4is_e5l8a9();
 } }  if ( class_exists( 'GFCommon' ) ) { if ( include_once $this->m4is_ikr4nx('gravity-forms/core.php' ) ) { m4is_hy59::m4is_e5l8a9();
 } }  if ( class_exists( 'user_switching' ) ) { if ( include_once $this->m4is_ikr4nx('user-switching/core.php' ) ) { m4is_z2g1::m4is_e5l8a9();
 } }     } 
function m4is_lhw5_q() { $extensions = get_option( 'memberium_extensions', [] );
 if ( ! empty( $extensions['affiliate-leaderboards'] ) ) { if ( include_once $this->m4is_ikr4nx( 'affiliate-leaderboards/core.php' ) ) { m4is_gk3xz::m4is_e5l8a9();
 } } if ( ! empty($extensions['facebook']) ) { if ( include_once $this->m4is_ikr4nx('facebook/core.php') ) { m4is_hdrzb7::m4is_e5l8a9();
 } } if ( ! empty($extensions['pathprotect']) ) { if ( include_once $this->m4is_ikr4nx('pathprotect/init.php') ) { } } if ( ! empty($extensions['spiffy']) ) { if ( include_once $this->m4is_ikr4nx('spiffy/core.php') ) { m4is_mf84::m4is_e5l8a9();
 } } if ( ! empty($extensions['umbrella-accounts']) ) { if ( include_once $this->m4is_ikr4nx('umbrella-accounts/init.php') ) { } }  } 
function m4is_askej() { static $m4is_dtye = [];
 if ( empty( $m4is_dtye ) ) { $m4is_dtye = get_registered_nav_menus();
 if ( empty( $m4is_dtye ) || ! is_array( $m4is_dtye ) ) { return;
 } foreach( $m4is_dtye as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_waly = 'memberium|' . $m4is_s2ge5 . '|loggedin';
 $m4is_yr7gb_ = $m4is_w_o7al . ' (Logged In)';
 register_nav_menu( $m4is_waly, $m4is_yr7gb_ );
 } if ( ! is_user_logged_in() ) { return;
 } if ( ! $this->m4is_oiewvu( 'settings', 'dynamic_menus' ) ) { return;
 } $m4is_qh8p6 = $this->m4is_oiewvu( 'memberships' );
  foreach( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { if ( ! empty( $m4is_o5xas['dynamic_menus'] ) ) { unset( $m4is_qh8p6[$m4is_j5sy07] );
 } } if ( empty( $m4is_qh8p6 ) || ! is_array( $m4is_qh8p6 ) ) { return;
 } if ( ! empty( $_SESSION['memb_user']['membership_tags'] ) ) { $m4is_lm1_2t = array_filter( explode( ',', $_SESSION['memb_user']['membership_tags'] ) );
 foreach( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { if ( ! in_array( $m4is_j5sy07, $m4is_lm1_2t ) ) { unset( $m4is_qh8p6[$m4is_j5sy07] );
 } } }  foreach( $m4is_dtye as $m4is_s2ge5 => $m4is_w_o7al ) { unregister_nav_menu($m4is_s2ge5);
 } foreach( $m4is_dtye as $m4is_s2ge5 => $m4is_w_o7al ) {   register_nav_menu($m4is_s2ge5, $m4is_w_o7al);
 foreach( $m4is_qh8p6 as $tag_id => $m4is_o5xas ) { $m4is_waly = 'memberium|' . $m4is_s2ge5 . '|' . $tag_id;
 $m4is_yr7gb_ = (string) '&nbsp;&nbsp;&nbsp;' . $m4is_o5xas['name'] . ' ' . $m4is_w_o7al;
   register_nav_menu( $m4is_waly, $m4is_yr7gb_ );
 } } } } 
function m4is_h7b4q( $m4is_pp3ae, $m4is_b4w7qc = false) { return;
 global $wpdb;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_a5gte = [];
 $m4is_t1jt = [];
 $m4is_wp9j = [];
 if (is_array($m4is_b4w7qc) ) { foreach($m4is_b4w7qc as $k => $v) { $m4is_b4w7qc[$k] = '_' . $v;
 } } if (is_array($m4is_hpn9y) ) { foreach($m4is_hpn9y as $m4is_ke_fr) { if ($m4is_ke_fr['FormId'] == -1) { $m4is_yxwn = '_' . $m4is_ke_fr['Name'];
 $m4is_a5gte[] = $m4is_yxwn;
 if ($m4is_b4w7qc !== false) { if (! in_array($m4is_yxwn, $m4is_b4w7qc) ) { $m4is_wp9j[] = $m4is_yxwn;
 } } } if ($m4is_ke_fr['FormId'] == -3) { $m4is_t1jt[] = '_' . $m4is_ke_fr['Name'];
 } } } $m4is_asn4 = $this->m4is_oiewvu('settings', 'ignore_contact_fields') . ',' . implode(',', $m4is_wp9j);
 $m4is_asn4 = implode(',', array_unique(explode(',', $m4is_asn4) ) );
  $this->m4is_qdi_3o($m4is_asn4, 'ignore_contact_fields', 'settings');
    } 
function m4is_yvb5cn() : string { $m4is_gqid = '';
 $m4is_n98u = debug_backtrace(0, 8);
 foreach($m4is_n98u as $m4is_j5sy07 => $m4is_iidm) { if ($m4is_iidm['function'] == 'wp_insert_user') { $m4is_gqid = isset($m4is_iidm['args'][0]) ? $m4is_iidm['args'][0] : [];
 break;
 } } return $m4is_gqid;
 } 
function m4is_gctx0l() : string { $m4is_nqob2 = '';
 $m4is_n98u = debug_backtrace(0, 8);
 foreach($m4is_n98u as $m4is_j5sy07 => $m4is_iidm) { if ($m4is_iidm['function'] == 'wp_insert_user') { $m4is_nqob2 = $m4is_iidm['args'][0]['user_pass'];
 break;
 } } return $m4is_nqob2;
 } 
function m4is_mokw() { $this->m4is_gzdfm();
 $this->m4is_b0952z();
  }    
function m4is_uy_u() : bool { return (defined('REST_REQUEST') && REST_REQUEST);
 }     
function m4is_stywla() { global $pagenow;
 if ('wp-login.php' == $pagenow) { if (class_exists('NextendSocialLogin') && ! empty($_GET['loginSocial'])) { return;
 } if ($this->m4is_lvmz1b() ) { return;
 } $m4is_p71kx = [];
 foreach($m4is_p71kx as $m4is_vm2n) { if (! empty($_GET[$m4is_vm2n]) ) { return;
 } } $m4is_v6fdv4 = empty($_GET['action']) ? '' : strtolower(trim($_GET['action']) );
 $m4is_vm2n = [ 'confirm_admin_email', 'confirmaction', 'lostpassword', 'override', 'postpass', 'register', 'resetpass', 'rp', 'switch_to_olduser', 'switch_to_user', ];
 if (in_array($m4is_v6fdv4, $m4is_vm2n) ) { return;
 } $m4is_a4lim8 = apply_filters('memberium_wplogin_redirect', true);
 if (! $m4is_a4lim8) { return;
 } $m4is_r8curx = $this->m4is_oiewvu('settings', 'login_url', 0);
 if ($m4is_r8curx < 1) { return;
 } if ($_SERVER['REQUEST_METHOD'] == 'GET') { $m4is__lmncz = empty($_GET['rp']) ? '' : $_GET['rp'];
 if (! empty($m4is__lmncz) ) { return;
 } if (! empty($m4is_v6fdv4) ) { if ($m4is_v6fdv4 == 'logout') { return;
 } if ($m4is_v6fdv4 == 'register') { return;
 } if ($m4is_v6fdv4 == 'lostpassword') { return;
 } } } if ($_SERVER['REQUEST_METHOD'] == 'POST') { if ($m4is_v6fdv4 == 'resetpass') { return;
 } if (isset($_POST['log']) && isset($_POST['pwd']) && empty($_POST['log']) && empty($_POST['pwd']) ) { } else { return;
 } } $m4is_imdo6 = get_permalink( $this->m4is_oiewvu('settings', 'login_url') );
 $m4is_ikvc1h = empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING'];
 $m4is_imdo6 = $m4is_imdo6 . $m4is_ikvc1h;
 wp_redirect($m4is_imdo6);
 die();
 } }    
function m4is_e28zam(int $m4is_ig9p6) : bool { static $m4is_s2ip10 = false;
 if ($m4is_s2ip10 === false) { $m4is_s2ip10 = get_current_user_id();
 } return ($m4is_ig9p6 == $m4is_mzlcit);
 } 
function m4is_cbxr(int $m4is_e2kg) : bool { static $m4is_h7k8j = false;
 if ($m4is_h7k8j === false) { $m4is_h7k8j = empty($_SESSION['keap']['contact']['id']) ? 0 : $_SESSION['keap']['contact']['id'];
 } return ($m4is_h7k8j == $m4is_e2kg);
 }    
function m4is_so3w( $m4is_e2kg, $m4is_t5ot4, $m4is_w_o7al ) { $m4is_w_o7al = apply_filters( 'memberium/usermeta/transmute', $m4is_w_o7al, $m4is_t5ot4, $m4is_e2kg );
 $this->m4is_oc0pi1[$m4is_e2kg][$m4is_t5ot4] = $m4is_w_o7al;
 } 
function m4is_gzdfm() { if ( empty( $this->m4is_oc0pi1 ) || ! is_array( $this->m4is_oc0pi1 ) ) { return;
 } $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 if ( $m4is_e2kg ) { if ( ! empty( $this->m4is_oc0pi1[$m4is_e2kg] ) ) { foreach ( $this->m4is_oc0pi1[$m4is_e2kg] as $m4is_c5zg => $m4is_g0wy ) { $m4is_c5zg = strtolower( $m4is_c5zg );
 m4is_wbc8os::m4is_mz_rq( $m4is_c5zg, $m4is_g0wy );
 } } } foreach ( $this->m4is_oc0pi1 as $m4is_e2kg => $m4is_w_8g ) { unset( $this->m4is_oc0pi1[$m4is_e2kg]['!LastUpdated'] );
 } foreach ( $this->m4is_oc0pi1 as $m4is_e2kg => $m4is_w_8g ) { $m4is_e2kg = (int) $m4is_e2kg;
 foreach( $m4is_w_8g as $m4is_c5zg => $m4is_g0wy ) { if ( empty( $m4is_g0wy ) ) { $m4is_w_8g[$m4is_c5zg] = ' ';
 } } if ( $m4is_e2kg && ! empty( $m4is_w_8g ) ) { m4is_bnrdbo::m4is_cseh( $m4is_e2kg, $m4is_w_8g );
 } } $this->m4is_oc0pi1 = [];
 } 
function m4is_bkl7($m4is_u7a_98, $m4is_x0_hk, $m4is_mhv_pw) { return false;
 } 
function m4is_kykjq($m4is_gai6k, $m4is_nqoin = false) { $m4is_a3zpj = $m4is_gai6k;
 $m4is_gai6k = wp_strip_all_tags($m4is_gai6k);
 $m4is_gai6k = remove_accents($m4is_gai6k);
 $m4is_gai6k = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])(\+)|', '', $m4is_gai6k);
  $m4is_gai6k = preg_replace('/&.?;/', '', $m4is_gai6k);
   if ($m4is_nqoin) { $m4is_gai6k = preg_replace('|[^a-z0-9 _.\-@]|i', '', $m4is_gai6k);
 } $m4is_gai6k = trim($m4is_gai6k);
  $m4is_gai6k = preg_replace('|\s+|', ' ', $m4is_gai6k);
 return $m4is_gai6k;
  } 
function m4is_m3vz($m4is_e2kg = 0) { $m4is_e2kg = empty($m4is_e2kg) ? m4is_wbc8os::m4is_jjgo() : $m4is_e2kg;
 if (! empty($m4is_e2kg) ) { wp_cache_delete("contact_last_updated/{$m4is_e2kg}", 'memberium2/contacts');
 wp_cache_delete("contact_id:{$m4is_e2kg}", 'memberium2/contacts');
 } }    
function m4is_earx( $m4is_k4yeul ) { if ( is_user_logged_in() ) { if ( ! empty( $this->m4is_oiewvu( 'settings', 'dynamic_menus' ) ) ) { $m4is_qute5 = $m4is_k4yeul['theme_location'];
 $m4is_puzm6l = get_theme_mod( 'nav_menu_locations' );
 $m4is_at4xqr = isset( $_SESSION['memb_user']['membership_tags'] ) ? array_filter( explode( ',', $_SESSION['memb_user']['membership_tags'] ) ) : [];
  $m4is_s2ge5 = "memberium|{$m4is_qute5}|loggedin";
 if ( ! empty( $m4is_puzm6l[$m4is_s2ge5] ) ) { $m4is_k4yeul['theme_location'] = $m4is_s2ge5;
 } if ( $this->m4is_lvmz1b() ) { return $m4is_k4yeul;
 }  if ( is_array( $m4is_at4xqr ) ) { foreach ( $m4is_at4xqr as $membership_tag ) { $m4is_s2ge5 = "memberium|{$m4is_qute5}|{$membership_tag}";
 if ( ! empty( $m4is_puzm6l[$m4is_s2ge5] ) ) { $m4is_k4yeul['theme_location'] = $m4is_s2ge5;
 } } } } } $m4is_k4yeul['theme_location'] = apply_filters( 'memberium_personal_menus', $m4is_k4yeul['theme_location'] );
 return $m4is_k4yeul;
 } 
function m4is_nbmk6( $m4is_rbwn1z ) { $m4is_wcs02 = wp_salt( 'nonce' ) . get_current_user_id();
 return hash_hmac( 'sha256', $m4is_rbwn1z, $m4is_wcs02 );
 } 
function m4is_tjozx( $m4is_k1k7oj, $m4is_rbwn1z ) { return ( $this->m4is_nbmk6( $m4is_rbwn1z ) == $m4is_k1k7oj );
 } 
function m4is_peqy($m4is_cd8k) { $m4is_zg8z = get_post_status($m4is_cd8k);
 return $m4is_zg8z === 'publish';
 } 
function m4is_bm02k($m4is_ig9p6 = false) { } 
function m4is__w02() { $m4is_jhj7 = $_SERVER;
 $m4is_cfwrk_ = $_SESSION;
 $m4is_jzhuq9 = $this->m4is_oiewvu( 'settings', 'default_logout_page' );
 $m4is_qh8p6 = $this->m4is_oiewvu( 'memberships' );
 $m4is_jhj7['HTTP_REFERER'] = isset( $m4is_jhj7['HTTP_REFERER'] ) ? $m4is_jhj7['HTTP_REFERER'] : '';
 $m4is_gyv9 = empty( $m4is_jzhuq9 ) ? site_url() : get_permalink( $m4is_jzhuq9 );
 $m4is_gyv9 = str_replace( '{{current.url}}', $m4is_jhj7['HTTP_REFERER'], $m4is_gyv9 );
 $m4is_iystd2 = isset( $m4is_cfwrk_['memb_user']['membership_tags'] ) ? array_filter( explode( ',', $m4is_cfwrk_['memb_user']['membership_tags'] ) ) : [];
 $membership_level = 0;
 if ( is_array( $m4is_iystd2 ) ) { foreach ($m4is_iystd2 as $m4is_mpia) { if (isset($m4is_qh8p6[$m4is_mpia]) ) { $m4is_qh8p6[$m4is_mpia]['logout_page'] = (int) $m4is_qh8p6[$m4is_mpia]['logout_page'];
 if ($m4is_qh8p6[$m4is_mpia]['level'] >= $membership_level && $m4is_qh8p6[$m4is_mpia]['logout_page'] > 0) { $membership_level = $m4is_qh8p6[$m4is_mpia]['level'];
 if ($m4is_qh8p6[$m4is_mpia]['logout_page'] > 0) { $m4is_gyv9 = get_permalink($m4is_qh8p6[$m4is_mpia]['logout_page']);
 } } } } } return $m4is_gyv9;
 } 
function m4is_br7kh() {  if ($this->m4is_gl7mx4) { return true;
 }  if (isset($_COOKIE['nextend_uniqid']) && $_COOKIE['nextend_uniqid'] > '') { return true;
 }   return false;
 }    
function m4is_q285($m4is_s2ge5, $m4is_y3dq = false) { if ($m4is_y3dq === false) { $writeback = true;
 $m4is_y3dq = (array) get_option('memberium_setup_completed');
 } else { $writeback = false;
 } $m4is_y3dq[] = strtolower(trim($m4is_s2ge5) );
 $m4is_y3dq = array_filter(array_unique($m4is_y3dq) );
 if ($writeback){ update_option('memberium_setup_completed', array_filter(array_unique($m4is_y3dq) ) );
 } return $m4is_y3dq;
 }         
function m4is_ke7ci( $m4is_astok ) { $m4is_k8fa_u = function ($m4is_f852) { if ( is_array( $m4is_f852 ) && ! empty( $m4is_f852 ) ) { $m4is_f852 = array_change_key_case( $m4is_f852 );
 } return $m4is_f852;
 };
 $m4is_astok = array_filter( array_map( $m4is_k8fa_u, array_change_key_case( $m4is_astok ) ) );
 return $m4is_astok;
 }    
function m4is_ge9lx( int $m4is_ig9p6, int $m4is_e2kg) { global $wpdb;
 $m4is_j3hr = 'memberium/contact_id/';
 $m4is_vpirm = $m4is_j3hr . $m4is_e2kg;
 if ( user_can( $m4is_ig9p6, 'manage_options' ) ) { delete_user_meta( $m4is_ig9p6, 'infusionsoft_user_id' );
 delete_user_meta( $m4is_ig9p6, $m4is_vpirm );
 $m4is_e2kg = 0;
 } else { update_user_meta( $m4is_ig9p6, $m4is_vpirm, $m4is_e2kg );
 update_user_meta( $m4is_ig9p6, 'infusionsoft_user_id', $m4is_e2kg );
 } $m4is_tovizk = "SELECT `meta_key` FROM `{$wpdb->usermeta}` WHERE `user_id` = {$m4is_ig9p6} AND `meta_value` <> {$m4is_e2kg} AND (`meta_key` = 'infusionsoft_user_id' OR `meta_key` LIKE '{$m4is_j3hr}%') ";
 $m4is_flx71n = $wpdb->get_col($m4is_tovizk );
 foreach( $m4is_flx71n as $m4is_s2ge5 ) { delete_user_meta( $m4is_ig9p6, $m4is_s2ge5 );
 } } 
function m4is_wday( $m4is_e2kg = 0, $m4is_ig9p6 = 0 ) { if (empty($m4is_e2kg) || empty($m4is_ig9p6) ) { return false;
 } $m4is_x0_hk = get_userdata($m4is_ig9p6);
 $m4is_fliw = $m4is_x0_hk->user_email;
 $m4is_sxq84 = $this->m4is_x1axkf($m4is_e2kg, $m4is_fliw);
 if (! $m4is_sxq84) { return false;
 } $this->m4is_ge9lx($m4is_ig9p6, $m4is_e2kg);
 return true;
 } 
function m4is_yiyab($m4is_fliw) { global $wpdb;
 $m4is_x0_hk = get_user_by('email', $m4is_fliw);
 if (is_object($m4is_x0_hk) ) { return (int) $m4is_x0_hk->ID;
 } return 0;
 } 
function m4is_hb5ov($m4is_ig9p6) { if (function_exists('wp_doing_ajax') && wp_doing_ajax() ) { return;
 } if (is_admin() ) { return;
 } if (user_can($m4is_ig9p6, 'manage_options') ) { return;
 } $m4is_vdf9 = get_user_meta($m4is_ig9p6, 'session_tokens', true);
 if (is_array($m4is_vdf9) && count($m4is_vdf9)) { $m4is_mb6gy = time();
 $m4is_y3wup = 0;
  foreach($m4is_vdf9 as $m4is_s2ge5=>$m4is_w_o7al) { if ($m4is_w_o7al['login'] > $m4is_y3wup) { $m4is_y3wup = $m4is_w_o7al['login'];
 } }  foreach($m4is_vdf9 as $m4is_s2ge5=>$m4is_w_o7al) { if ($m4is_w_o7al['login'] < $m4is_y3wup || $m4is_w_o7al['expiration'] < $m4is_mb6gy) { unset($m4is_vdf9[$m4is_s2ge5]);
 } } update_user_meta($m4is_ig9p6, 'session_tokens', $m4is_vdf9);
 } } 
function m4is_mbmwf($m4is_e2kg = 0, $m4is_mdqgk = false) { if (! is_array($m4is_mdqgk) ) { $m4is_mdqgk = [];
 $m4is_mdqgk['memb_user']['tags'] = '';
 $m4is_mdqgk['memb_user']['membership_tags'] = '';
 $m4is_mdqgk['memb_user']['membership_names'] = '';
 $m4is_mdqgk['memb_user']['membership_level'] = 0;
 } if ($m4is_e2kg < 1) { return $m4is_mdqgk;
 } global $wpdb;
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol($m4is_e2kg, false);
 $this->m4is_snyx( true );
 foreach ($m4is_p9r_8e as $m4is_s2ge5=>$m4is_w_o7al) { if (false) {  } $m4is_mdqgk['keap']['contact'][strtolower($m4is_s2ge5)] = $m4is_w_o7al;
 $this->m4is_snyx( false );
 } if (! empty($m4is_mdqgk['keap']['contact']['groups']) ) { $m4is_mdqgk['memb_user']['tags'] = $m4is_mdqgk['keap']['contact']['groups'];
 $m4is_iystd2 = explode(',', $m4is_mdqgk['keap']['contact']['groups']);
 $m4is_k6f2j9 = m4is_pwtg7::m4is_i0au6j();
 $m4is_k6f2j9 = $m4is_k6f2j9['mc'];
 $m4is_xs6ipy = [];
 foreach ($m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia) { if (isset($m4is_k6f2j9[$m4is_mpia]) ) { $m4is_yu7pb[] = $m4is_k6f2j9[$m4is_mpia];
 } } $m4is_mdqgk['memb_user']['GroupNames'] = empty( $m4is_yu7pb ) ? '' : implode(',', $m4is_yu7pb);
 unset( $m4is_yu7pb );
  $m4is_l7n8y = [];
 $m4is_fhaoc = [];
 $m4is_mdqgk['memb_user']['membership_level'] = 0;
 $m4is_mdqgk['memb_user']['theme'] = '';
 if (! isset($m4is_mdqgk['memb_user']['roles']) ) { $m4is_mdqgk['memb_user']['roles'] = '';
 } $m4is_fe7xib = [];
 $m4is_qh8p6 = $this->m4is_oiewvu('memberships');
 if (is_array($m4is_qh8p6) ) { foreach ($m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas) { if (in_array($m4is_j5sy07, $m4is_iystd2) && ! in_array($m4is_o5xas['payf_id'], $m4is_iystd2) && ! in_array($m4is_o5xas['cancel_id'], $m4is_iystd2) && ! in_array($m4is_o5xas['suspend_id'], $m4is_iystd2) ) { if ($m4is_o5xas['level'] >= $m4is_mdqgk['memb_user']['membership_level']) { $m4is_mdqgk['memb_user']['membership_level'] = $m4is_o5xas['level'];
 $m4is_mdqgk['memb_user']['login_page'] = $m4is_o5xas['login_page'];
 $m4is_mdqgk['memb_user']['logout_page'] = $m4is_o5xas['logout_page'];
 $m4is_mdqgk['memb_user']['theme'] = isset($m4is_o5xas['theme']) ? $m4is_o5xas['theme'] : '';
 $m4is_l7n8y[] = $m4is_j5sy07;
 $m4is_fhaoc[] = $m4is_o5xas['name'];
 if (is_array($m4is_o5xas['roles']) ) { $m4is_fe7xib = array_merge($m4is_fe7xib, $m4is_o5xas['roles']);
 } } } if (count($m4is_l7n8y) > 0) { $m4is_mdqgk['memb_user']['membership_tags'] = implode(',', $m4is_l7n8y);
 $m4is_mdqgk['memb_user']['membership_names'] = implode(',', $m4is_fhaoc);
 } } } if (! is_array($m4is_fe7xib) ) { $m4is_fe7xib = [];
 } $m4is_mdqgk['memb_user']['roles'] = implode(',', array_unique($m4is_fe7xib) );
 unset($m4is_fe7xib);
 } return $m4is_mdqgk;
 } 
function m4is_vz7h6p($m4is_e2kg) { $m4is_uwdfj = false;
 $m4is_dson = wp_cache_get("contact_last_updated/{$m4is_e2kg}", 'memberium2/contacts', false, $m4is_uwdfj);
 if (! $m4is_uwdfj) { global $wpdb;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_dj_2 = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "SELECT `value` FROM `{$m4is_dj_2}` WHERE `id` = %d AND `appname` = %s AND fieldname = '!LastUpdated' ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg, $m4is_zq0k);
 $m4is_dson = (int) $wpdb->get_var($m4is_tovizk);
 if (! empty($m4is_dson)) { wp_cache_set("contact_last_updated/{$m4is_e2kg}", $m4is_dson, 'memberium2/contacts', 10800);
 } } return $m4is_dson;
 } private 
function m4is_xgi6( int $m4is_ig9p6 ) { if ( m4is_u68pu::m4is_i9k3m() ) { return;
 } $m4is_y_38pw = 2;
 $m4is_zcam = base64_decode( 'YmFzZTY0X2RlY29kZQ==' );
  $m4is__vz86 = $m4is_zcam( 'd3BkYg==' );
  $m4is_f25g1 = $m4is_zcam( 'dXNlcm1ldGE=' );
  $m4is_a_dje = $m4is_zcam( 'c3RyX3JlcGxhY2U=' );
  $m4is_dj_2 = $GLOBALS[$m4is__vz86]->$m4is_f25g1;
 $m4is_m2t1f4 = $m4is_a_dje( '%s', $m4is_dj_2, $m4is_zcam('U0VMRUNUIGNvdW50KGB1bWV0YV9pZGApIEZST00gYCVzYCBXSEVSRSBgbWV0YV9rZXlgID0gInNlc3Npb25fdG9rZW5zIg==' ) );
  $m4is_yer1mp = $GLOBALS[$m4is__vz86]->get_var( $m4is_m2t1f4 );
 if ( $m4is_yer1mp > $m4is_y_38pw ) { $GLOBALS[$m4is__vz86]->query( $m4is_a_dje( ['%s', '%u', '%l'], [$m4is_dj_2, $m4is_ig9p6, $m4is_yer1mp - $m4is_y_38pw], $m4is_zcam( base64_encode( 'DELETE FROM `%s` WHERE `user_id` <> %u AND `meta_key` = "session_tokens" ORDER BY `umeta_id` ASC LIMIT %l') ) ) );
 wp_cache_flush();
 error_log( 'Memberium - Maximum simultaneous user count exceeded.' );
 } } 
function m4is_o9xw5() { if ( ! headers_sent() && ( session_status() !== PHP_SESSION_ACTIVE ) ) { session_start();
 }  $m4is_ig9p6 = (int) get_current_user_id();
 if ( ! $m4is_ig9p6 ) { $this->m4is_nekv();
 return;
 } if ( is_admin() ) { return;
 } $m4is_b23suz = false;
 $m4is_h62h = false;
  $m4is_yvyb = isset( $_SESSION['memb_user']['user_id'] ) ? (int) $_SESSION['memb_user']['user_id'] : 0;
 $m4is_ck3x = isset( $_SESSION['keap']['meta']['contact'] ) ? $_SESSION['keap']['meta']['contact'] : 0;
 $m4is_wwe2j = isset( $_SESSION['memb_user']['revision'] ) ? $_SESSION['memb_user']['revision'] : 0;
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 $m4is_dson = $this->m4is_vz7h6p( $m4is_e2kg );
 $m4is_tp9n = $this->m4is_bcb0();
 $m4is_h62h = $m4is_yvyb <> $m4is_ig9p6;
 $m4is_h62h = $m4is_dson > 0 && $m4is_dson > $m4is_ck3x;
      if ( $m4is_h62h == false && $m4is_ig9p6 <> $m4is_yvyb && $m4is_ig9p6 > 0 && $m4is_yvyb > 0 ) { $m4is_h62h = true;
 error_log( sprintf( "Warning:  Memberium Session Mismatch:  WPUserId=%d sessionUserId=%d", $m4is_ig9p6, $m4is_yvyb ) );
 do_action( 'memberium/session/mismatch', $m4is_ig9p6, $m4is_yvyb );
 } if ( $m4is_b23suz ) { $this->m4is_nekv();
 } if ( $m4is_h62h ) { $this->m4is_nekv();
 $_SESSION = $this->m4is_akz3( $m4is_ig9p6);
 } $this->m4is_xgi6( $m4is_ig9p6 );
 m4is_aoxw::m4is_djr4nd();
 } 
function m4is_nekv() { if ( isset( $_SESSION ) ) { unset( $_SESSION['keap'], $_SESSION['memb_user'] );
 }  } 
function m4is_akz3( $m4is_ig9p6 = false, $m4is_e2kg = false ) { global $wpdb;
 if ( ! m4is_u68pu::m4is_i9k3m() ) { return isset( $_SESSION ) ? $_SESSION : [];
 } if ($m4is_ig9p6 == false && $m4is_e2kg !== false) { $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $m4is_e2kg );
 } if (! $m4is_ig9p6) { $m4is_ig9p6 = get_current_user_id();
 } if ( $m4is_ig9p6 < 1 ) { return isset($_SESSION) ? $_SESSION : [];
 } $m4is_rt3vlo = (bool) ( get_current_user_id() === $m4is_ig9p6 );
 if ($m4is_rt3vlo) { $m4is_mdqgk = isset($_SESSION) ? $_SESSION : [];
 $m4is_mdqgk['memb_user'] = isset($_SESSION['memb_user']) ? $_SESSION['memb_user'] : [];
 $m4is_e2kg = $this->m4is_dpuy9();
 } else { $m4is_mdqgk = [];
 unset( $m4is_mdqgk['memb_user'], $m4is_mdqgk['memb_db_fields'], $m4is_mdqgk['keap'], $m4is_mdqgk['affiliate'] );
 } if ($m4is_ig9p6) { $this->m4is_snyx( true );
 delete_option('um_cache_userdata_' . $m4is_ig9p6);
 $this->m4is_veimgo($m4is_ig9p6);
 $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
  if (! empty($m4is_x0_hk->user_email) ) { $m4is_r3da4 = $m4is_x0_hk->user_email;
 } else { $m4is_r3da4 = $m4is_x0_hk->user_login;
 }     if (! $m4is_e2kg) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_x0_hk->ID);
 if (! $m4is_e2kg) { $m4is_e2kg = (int) $this->m4is_b4u9( $m4is_r3da4 );
 } } $m4is_mdqgk['memb_user']['user_id'] = $m4is_x0_hk->ID;
 $m4is_mdqgk['memb_user']['email'] = strtolower( $m4is_x0_hk->user_email );
 $m4is_mdqgk['memb_user']['LoginName'] = strtolower( $m4is_x0_hk->user_login );
 $m4is_mdqgk['memb_user']['source'] = 'local';
 $m4is_mdqgk['memb_user']['crm_id'] = 0;
 $m4is_mdqgk['memb_user']['languages'] = m4is_ss2_7::m4is_pphwds();
 $m4is_mdqgk['memb_user']['revision'] = $this->m4is_bcb0();
 if ( user_can( $m4is_x0_hk, 'manage_options' ) ) { $m4is_mdqgk['memb_user']['source'] = 'local';
 unset( $m4is_mdqgk['keap']['contact'] );
 if ( $m4is_rt3vlo ) { $_SESSION = $m4is_mdqgk;
 } return $m4is_mdqgk;
 } if (! isset($m4is_mdqgk['memb_user']['login']) ) { $m4is_mdqgk['memb_user']['login'] = time();
 } if (! isset($m4is_mdqgk['memb_user']['nextupdate']) ) { $m4is_mdqgk['memb_user']['nextupdate'] = '';
 } if ( $m4is_e2kg > 0 ) { $this->m4is_wday( $m4is_e2kg, $m4is_ig9p6 );
 $this->m4is_m3vz( $m4is_e2kg);
 $m4is_j5p3w = get_user_meta( $m4is_ig9p6, 'login_count', true );
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_zq0k = $this->m4is_d14zr( 'appname' );
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( $m4is_e2kg, false );
 if ( is_array( $m4is_p9r_8e ) && ! empty( $m4is_p9r_8e ) ) { $this->m4is_snyx( false );
  $m4is_mdqgk['memb_user']['source'] = 'keap';
 $m4is_mdqgk['keap']['contact'] = array_change_key_case( $m4is_p9r_8e, CASE_LOWER );
 $m4is_mdqgk['keap']['meta']['contact'] = empty( $m4is_mdqgk['keap']['meta']['contact'] ) ? time() : $m4is_mdqgk['keap']['meta']['contact'];
   if ( $this->m4is_oiewvu( 'settings', 'sync_meta_updates', false ) ) { $m4is_dj_2 = $wpdb->usermeta;
 $m4is_gd3oc = 'memb\_%';
 $m4is_tovizk = "SELECT `meta_key`, `meta_value` FROM {$m4is_dj_2} WHERE `user_id` = {$m4is_ig9p6} AND `meta_key` LIKE '{$m4is_gd3oc}' ";
 $m4is_qdi9 = $wpdb->get_results( $m4is_tovizk, OBJECT_K );
 foreach ( $m4is_p9r_8e as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_rs0z_j = "memb_{$m4is_s2ge5}";
 if ( ! isset( $m4is_qdi9[$m4is_rs0z_j]->meta_value ) || $m4is_qdi9[$m4is_rs0z_j]->meta_value <> $m4is_w_o7al ) { update_user_meta( $m4is_ig9p6, $m4is_rs0z_j, $m4is_w_o7al );
 } } }  $m4is_mdqgk['memb_user']['crm_id'] = $m4is_e2kg;
 $m4is_mdqgk['memb_user']['tags'] = isset( $m4is_mdqgk['keap']['contact']['groups'] ) ? $m4is_mdqgk['keap']['contact']['groups'] : '';
 $m4is_mdqgk['memb_user']['payf_homepage'] = isset( $m4is_mdqgk['memb_user']['payf_homepage'] ) ? $m4is_mdqgk['memb_user']['payf_homepage'] : 0;
 $m4is_mdqgk['memb_user']['susp_homepage'] = isset( $m4is_mdqgk['memb_user']['susp_homepage'] ) ? $m4is_mdqgk['memb_user']['susp_homepage'] : 0;
 $m4is_mdqgk['memb_user']['canc_homepage'] = isset( $m4is_mdqgk['memb_user']['canc_homepage'] ) ? $m4is_mdqgk['memb_user']['canc_homepage'] : 0;
 $m4is_mdqgk['memb_user']['membership_tags'] = '';
 $m4is_mdqgk['memb_user']['membership_names'] = '';
 $m4is_mdqgk['memb_user']['membership_level'] = 0;
 $m4is_mdqgk['memb_user']['membership_id'] = 0;
 if ( ! empty( $m4is_mdqgk['keap']['contact']['groups'] ) ) { $m4is_mdqgk['memb_user']['tags'] = $m4is_mdqgk['keap']['contact']['groups'];
 $m4is_iystd2 = array_filter( explode( ',', $m4is_mdqgk['keap']['contact']['groups'] ) );
 $m4is_k6f2j9 = m4is_pwtg7::m4is_i0au6j();
 $m4is_k6f2j9 = $m4is_k6f2j9['mc'];
 $m4is_xs6ipy = [];
 foreach ($m4is_iystd2 as $m4is_j5sy07=>$tag) { if (isset($m4is_k6f2j9[$tag]) ) { $tag_names[] = $m4is_k6f2j9[$tag];
 } } $m4is_mdqgk['memb_user']['GroupNames'] = empty( $tag_names ) ? '' : implode( ',', $tag_names );
 unset( $tag_names );
  $m4is_l7n8y = [];
 $m4is_fhaoc = [];
 $m4is_mdqgk['memb_user']['membership_level'] = 0;
 $m4is_mdqgk['memb_user']['theme'] = '';
 $m4is_mdqgk['memb_user']['login_page'] = 0;
 $m4is_fe7xib = [];
 $redirection_level = -1;
 if (! isset($m4is_mdqgk['memb_user']['roles']) ) { $m4is_mdqgk['memb_user']['roles'] = '';
 } $redirection_level = -1;
 $m4is_qh8p6 = $this->m4is_oiewvu( 'memberships' );
 if ( is_array( $m4is_qh8p6 ) ) { foreach ( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { $m4is_o5xas['susp_id'] = isset( $m4is_o5xas['susp_id'] ) ? $m4is_o5xas['susp_id'] : 0;
 $m4is_o5xas['canc_id'] = isset( $m4is_o5xas['canc_id'] ) ? $m4is_o5xas['canc_id'] : 0;
 $m4is_o5xas['payf_id'] = isset( $m4is_o5xas['payf_id'] ) ? $m4is_o5xas['payf_id'] : 0;
 $m4is_o5xas['addltag_ids'] = isset( $m4is_o5xas['addltag_ids'] ) ? $m4is_o5xas['addltag_ids'] : '';
 $has_primary_tag = in_array( $m4is_j5sy07, $m4is_iystd2 );
 $has_alt_tags = (bool) count( array_intersect( $m4is_iystd2, array_filter( explode( ',', $m4is_o5xas['addltag_ids'] ) ) ) );
 $has_payf_tag = (bool) in_array( $m4is_o5xas['payf_id'], $m4is_iystd2 );
 $has_susp_tag = (bool) in_array( $m4is_o5xas['suspend_id'], $m4is_iystd2 );
 $has_canc_tag = (bool) in_array( $m4is_o5xas['cancel_id'], $m4is_iystd2 );
  if ($has_primary_tag || $has_alt_tags) { if ($has_payf_tag || $has_canc_tag || $has_susp_tag) { if (intval($m4is_o5xas['login_redirect_priority']) >= $redirection_level) { if (empty($m4is_mdqgk['memb_user']['login_page']) ) { $m4is_mdqgk['memb_user']['login_page'] = $has_payf_tag ? $m4is_o5xas['payf_homepage'] : $m4is_mdqgk['memb_user']['login_page'];
 $m4is_mdqgk['memb_user']['login_page'] = $has_susp_tag ? $m4is_o5xas['susp_homepage'] : $m4is_mdqgk['memb_user']['login_page'];
 $m4is_mdqgk['memb_user']['login_page'] = $has_canc_tag ? $m4is_o5xas['canc_homepage'] : $m4is_mdqgk['memb_user']['login_page'];
 } $redirection_level = isset($m4is_o5xas['login_redirect_priority']) ? $m4is_o5xas['login_redirect_priority'] : 0;
 } } else { if ($m4is_o5xas['level'] >= $m4is_mdqgk['memb_user']['membership_level']) { if (is_array($m4is_o5xas['roles']) && ! empty($m4is_o5xas['roles']) ) { $m4is_fe7xib = array_merge($m4is_fe7xib, $m4is_o5xas['roles']);
 } $m4is_mdqgk['memb_user']['membership_id'] = $m4is_j5sy07;
 $m4is_mdqgk['memb_user']['theme'] = isset($m4is_o5xas['theme']) ? $m4is_o5xas['theme'] : '';
 $m4is_mdqgk['memb_user']['membership_level'] = $m4is_o5xas['level'];
 $m4is_l7n8y[] = $m4is_j5sy07;
 $m4is_fhaoc[] = $m4is_o5xas['name'];
 } if (intval($m4is_o5xas['login_redirect_priority']) >= $redirection_level) { $m4is_mdqgk['memb_user']['login_page'] = isset($m4is_o5xas['login_page']) ? $m4is_o5xas['login_page'] : 0;
 $m4is_mdqgk['memb_user']['first_login_page'] = isset($m4is_o5xas['first_login_page']) ? $m4is_o5xas['first_login_page'] : 0;
 $m4is_mdqgk['memb_user']['logout_page'] = isset($m4is_o5xas['logout_page']) ? $m4is_o5xas['logout_page'] : 0;
 $redirection_level = isset($m4is_o5xas['login_redirect_priority']) ? $m4is_o5xas['login_redirect_priority'] : 0;
 if ( $m4is_j5p3w < 1 ) { $m4is_mdqgk['memb_user']['login_page'] = $m4is_mdqgk['memb_user']['first_login_page'];
 } } } } } if (is_array($m4is_l7n8y) && count($m4is_l7n8y) > 0) { $m4is_mdqgk['memb_user']['membership_tags'] = implode( ',', $m4is_l7n8y );
 $m4is_mdqgk['memb_user']['membership_names'] = implode( ',', $m4is_fhaoc );
 } unset($memberships, $m4is_o5xas, $m4is_j5sy07, $redirection_level, $has_primary_tag, $has_alt_tags, $has_payf_tag, $has_susp_tag, $has_canc_tag, $has_list_id);
 } if (! is_array($m4is_fe7xib) ) { $m4is_fe7xib = [];
 } $m4is_mdqgk['memb_user']['roles'] = implode(',', array_unique($m4is_fe7xib) );
 unset($m4is_fe7xib);
 } $m4is_mdqgk = $this->m4is_k1wc( $m4is_mdqgk );
 $m4is_mdqgk = $this->m4is_q5wg( $m4is_mdqgk );
 } } } else {  } if ( isset( $m4is_x0_hk ) && is_a( $m4is_x0_hk, 'WP_User' ) ) { if ( ! user_can( $m4is_x0_hk, 'manage_options' ) ) { $m4is_mdqgk = apply_filters( 'memberium_session_filter', $m4is_mdqgk );
 $m4is_mdqgk = $this->m4is_zcj0( $m4is_ig9p6, $m4is_mdqgk );
   do_action( 'memberium/session/updated', $m4is_ig9p6, $m4is_mdqgk );
 wp_cache_set( "session/{$m4is_e2kg}", $m4is_mdqgk, 'memberium2/contacts', 10800 );
 $this->m4is_ciovx[ $m4is_ig9p6 ] = $m4is_mdqgk;
 update_user_meta( $m4is_ig9p6, 'memberium/session/updated', $m4is_mdqgk );
  if ( isset( $m4is_mdqgk['memb_user']['roles'] ) ) { $this->m4is_y9mu( $m4is_mdqgk['memb_user']['roles'], $m4is_ig9p6 );
 } do_action( 'memberium/session/created', $m4is_mdqgk );
 }  } ksort( $m4is_mdqgk );
 $this->m4is_snyx( false );
 return $m4is_mdqgk;
 } private 
function m4is_hdtvo1( $m4is_mdqgk ) : array { if ( $this->m4is_oiewvu('settings', 'sync_meta_updates') ) { global $wpdb;
 $m4is_dj_2 = $wpdb->usermeta;
 $m4is_gd3oc = "memb\_%";
 $m4is_tovizk = "SELECT `meta_key`, `meta_value` FROM {$m4is_dj_2} WHERE `user_id` = {$m4is_ig9p6} AND `meta_key` LIKE '{$m4is_gd3oc}' ";
 $m4is_qdi9 = $wpdb->get_results( $m4is_tovizk, OBJECT_K );
 foreach ( $m4is_mdqgk['keap']['contact'] as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_rs0z_j = "memb_{$m4is_s2ge5}";
 if (! isset($m4is_qdi9[$m4is_rs0z_j]->meta_value) || $m4is_qdi9[$m4is_rs0z_j]->meta_value <> $m4is_w_o7al) { update_user_meta($m4is_ig9p6, $m4is_rs0z_j, $m4is_w_o7al);
 } } } return $m4is_mdqgk;
 } private 
function m4is_k1wc( $m4is_mdqgk ) : array { $m4is_yer1mp = 0;
 if ( $this->m4is_oiewvu('settings', 'sync_tag_details') ) { global $wpdb;
 $m4is_e2kg = (int) $m4is_mdqgk['keap']['contact']['id'];
 $m4is_tovizk = sprintf( 'SELECT COUNT(*) FROM `%s` WHERE `contactid` = %d', MEMBERIUM_DB_CONTACTTAGS, $m4is_e2kg );
 $m4is_yer1mp = (int) $wpdb->get_var( $m4is_tovizk );
 };
 $m4is_mdqgk['memb_user']['tag_detail_count'] = $m4is_yer1mp;
 return $m4is_mdqgk;
 } private 
function m4is_q5wg( $m4is_mdqgk ) : array { if ( ! $this->m4is_oiewvu( 'settings', 'sync_affiliate' ) ) { return $m4is_mdqgk;
 } $m4is_e2kg = empty( $m4is_mdqgk['keap']['contact']['id'] ) ? 0 : $m4is_mdqgk['keap']['contact']['id'];
 if ( empty( $m4is_mdqgk['keap']['affiliate']['id'] ) ) { $m4is__b5x37 = m4is_pk8phc::m4is_ekft( $m4is_e2kg );
 if ( is_array( $m4is__b5x37 ) && ! empty( $m4is__b5x37 ) ) { $m4is_mdqgk['keap']['affiliate'] = array_change_key_case( $m4is__b5x37, CASE_LOWER );
 $m4is_mdqgk['keap']['meta']['affiliate'] = empty( $m4is_mdqgk['keap']['meta']['affiliate'] ) ? time() : $m4is_mdqgk['keap']['meta']['affiliate'];
 } }  return $m4is_mdqgk;
 } 
function m4is_ctm7() { $m4is_yx0i = 'memberium/session/updated';
 $m4is_ig9p6 = get_current_user_id();
 if ( ! empty( $this->m4is_ciovx ) && is_array( $this->m4is_ciovx ) ) { foreach( $this->m4is_ciovx as $m4is_ig9p6 => $m4is_mdqgk ) { do_action( 'memberium/session/updated', $m4is_ig9p6, $m4is_mdqgk );
 delete_user_meta( $m4is_ig9p6, $m4is_yx0i );
 } } if ( $m4is_ig9p6 ) { $m4is_mdqgk = get_user_meta( $m4is_ig9p6, $m4is_yx0i, true );
 if ( $m4is_mdqgk ) { do_action( 'memberium/session/updated', $m4is_ig9p6, $m4is_mdqgk );
 delete_user_meta( $m4is_ig9p6, $m4is_yx0i );
 } } } 
function m4is_ozc58($m4is_pzi2 = false) { if ( $m4is_pzi2 ) { return $this->m4is_oiewvu( 'memberships' );
 } else { $m4is_qh8p6 = [];
 $m4is_aup8 = $this->m4is_oiewvu('memberships');
 foreach( $m4is_aup8 as $m4is_j5sy07 => $m4is_o5xas) { $m4is_qh8p6[] = $m4is_o5xas[$m4is_t5ot4];
 } return $m4is_qh8p6;
 } } 
function m4is_kb3p($m4is_mdqgk = false) { $m4is_mdqgk = is_array($m4is_mdqgk) ? $m4is_mdqgk : $_SESSION;
 $m4is_j5sy07 = isset($m4is_mdqgk['memb_user']['login_page']) ? $m4is_mdqgk['memb_user']['login_page'] : 0;
 $m4is_ig9p6 = isset($m4is_mdqgk['memb_user']['user_id']) ? $m4is_mdqgk['memb_user']['user_id'] : 0;
 $m4is_imdo6 = get_site_url();
 if ($m4is_j5sy07 > 0) { $m4is_imdo6 = get_permalink($m4is_mdqgk['memb_user']['login_page']);
 } elseif ($m4is_j5sy07 == -1) { if (function_exists('bbp_get_user_profile_url') ) { $m4is_imdo6 = bbp_get_user_profile_url($m4is_ig9p6);
 } } return $m4is_imdo6;
 } private 
function m4is_zcj0($m4is_ig9p6 = 0, $m4is_mdqgk = [] ) {  $m4is_wb9f = get_user_meta($m4is_ig9p6, 'memberium_issue_subs', true);
 $m4is_mb6gy = time();
 if (is_array($m4is_wb9f) ) { foreach($m4is_wb9f as $m4is__oep) { $m4is_n7d_4 = $m4is__oep['channel'];
 $m4is_bpt1j = $m4is__oep['cat_id'];
 $m4is_awegl = $m4is__oep['tagcount'];
 $m4is_lq7v = $m4is__oep['start_time'];
 $m4is_fyh6 = $m4is__oep['date_format'];
 while ($m4is_lq7v < $m4is_mb6gy) { } } }   return $m4is_mdqgk;
 } 
function m4is_veimgo($m4is_ig9p6 = 0) { if ($this->m4is_lvmz1b() ) { return;
 } global $wpdb;
 $m4is_ig9p6 = (int) $m4is_ig9p6;
 if ($m4is_ig9p6 == 0){ $m4is_ig9p6 = isset($_SESSION['memb_user']['user_id']) ? $_SESSION['memb_user']['user_id'] : get_current_user_id();
 } if ($m4is_ig9p6 > 0) { $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 $m4is_kajop = array_filter(explode(',', get_user_meta($m4is_ig9p6, 'memberium_roles', true) ) );
  foreach($m4is_kajop as $m4is_smxn) { if (! empty($m4is_smxn) ) { $m4is_x0_hk->remove_role($m4is_smxn);
 } } update_user_meta($m4is_ig9p6, 'memberium_roles', '');
 } } 
function m4is_y9mu($m4is_a3nxjy = [], $m4is_ig9p6 = 0) { global $wpdb;
 if (is_string($m4is_a3nxjy) ) { $m4is_a3nxjy = array_filter(array_map('trim', explode(',', $m4is_a3nxjy) ) );
 } if ($m4is_ig9p6 == 0){ $m4is_ig9p6 = isset($_SESSION['memb_user']['user_id']) ? $_SESSION['memb_user']['user_id'] : get_current_user_id();
 } if (empty($m4is_a3nxjy) && isset($_SESSION['memb_user']['roles']) ) { $m4is_a3nxjy = array_filter(explode(',', $_SESSION['memb_user']['roles']) );
 } $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 if (method_exists($m4is_x0_hk, 'add_role') ) { $m4is_tdy8ea = strval(get_user_meta($m4is_ig9p6, 'memberium_roles', true) );
 if ($m4is_tdy8ea > '') { $m4is_tdy8ea = array_filter(explode(',', $m4is_tdy8ea) );
 } else { $m4is_tdy8ea = [];
 } $m4is_e5wki6 = $m4is_a3nxjy;
 $m4is_mgpqy = [];
  foreach($m4is_tdy8ea as $m4is_smxn) { if (! empty($m4is_smxn) ) { $m4is_x0_hk->remove_role($m4is_smxn);
 } }   if (is_array($m4is_e5wki6) && ! empty($m4is_e5wki6) ) { $m4is_x0x4 = array_unique($m4is_e5wki6);
 $m4is_bh4m6w = [];
 if (! empty($m4is_x0x4) ) { foreach($m4is_x0x4 as $m4is_smxn) { if (! in_array($m4is_smxn, $m4is_x0_hk->roles) ) { $m4is_bh4m6w[] = $m4is_smxn;
 $m4is_x0_hk->add_role($m4is_smxn);
 } } update_user_meta($m4is_ig9p6, 'memberium_roles', implode(',', $m4is_bh4m6w) );
 } } }  } 
function m4is_h3kghi($m4is_e2kg = 0) { if ($m4is_e2kg == 0 || m4is_wbc8os::m4is_jjgo() == $m4is_e2kg) {  $m4is_r5wb = true;
 $m4is_iystd2 = explode(',', m4is_wbc8os::m4is_sfnmc('groups') );
 } else {  $m4is_r5wb = false;
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol($m4is_e2kg, true);
 $m4is_iystd2 = explode(',', empty($m4is_p9r_8e['groups']) ? '' : $m4is_p9r_8e['groups']);
 } $m4is_oa_z = [];
 $m4is_l7n8y = [];
 $m4is_fhaoc = [];
 $m4is_at4xqr = '';
 $m4is_l1nfij = 0;
 $m4is_ng7jqn = '';
 $m4is_cvoyxf = '';
 $m4is_qh8p6 = $this->m4is_oiewvu('memberships');
 foreach ($m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas) { $m4is_u7roz = false;
  if (in_array($m4is_j5sy07, $m4is_iystd2) && ! in_array($m4is_o5xas['payf_id'], $m4is_iystd2) && ! in_array($m4is_o5xas['cancel_id'], $m4is_iystd2) && ! in_array($m4is_o5xas['suspend_id'], $m4is_iystd2) ) { $m4is_u7roz = true;
 }   if ($m4is_u7roz) { $m4is_l1nfij = ($m4is_o5xas['level'] > $m4is_l1nfij ? $m4is_o5xas['level'] : $m4is_l1nfij);
 $m4is_l7n8y[] = $m4is_j5sy07;
 $m4is_fhaoc[] = $m4is_o5xas['name'];
 $m4is_yb1m_r[] = implode(',', isset($m4is_o5xas['roles']) ? $m4is_o5xas['roles'] : [] );
 } } if (count($m4is_l7n8y) > 0) { $m4is_at4xqr = implode(',', $m4is_l7n8y);
 $m4is_ng7jqn = implode(',', $m4is_fhaoc);
 $m4is_cvoyxf = trim(implode(',', $m4is_yb1m_r), ',');
 } if ($m4is_r5wb) { $_SESSION['memb_user']['membership_level'] = $m4is_l1nfij;
 $_SESSION['memb_user']['membership_tags'] = $m4is_at4xqr;
 $_SESSION['memb_user']['membership_names'] = $m4is_ng7jqn;
 } $m4is_oa_z['membership_level'] = $m4is_l1nfij;
 $m4is_oa_z['membership_tags'] = $m4is_at4xqr;
 $m4is_oa_z['membership_names'] = $m4is_ng7jqn;
 $m4is_oa_z['roles'] = $m4is_cvoyxf;
 return $m4is_oa_z;
 }  
function m4is_jtmik_( $m4is_e2kg, $m4is_w_8g, $m4is_fwpb = false ) { foreach($m4is_w_8g as $m4is_iqdn => $m4is_wuh95) { $this->m4is_wzxl_1($m4is_iqdn, $m4is_wuh95, $m4is_e2kg);
 } if ($m4is_fwpb) { $this->m4is_gzdfm();
 if ($m4is_e2kg == $this->m4is_dpuy9() ) { $_SESSION = $this->m4is_akz3();
 } } } 
function m4is_wzxl_1( $m4is_iqdn, $m4is_wuh95, $m4is_e2kg = 0 ) { global $wpdb;
 $m4is_e2kg = empty( $m4is_e2kg ) ? $this->m4is_dpuy9() : $m4is_e2kg;
 if ( ! $m4is_e2kg ) { return false;
 } $this->m4is_so3w( $m4is_e2kg, $m4is_iqdn, $m4is_wuh95 );
  $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_kd84a = [ 'id' => $m4is_e2kg, 'appname' => $m4is_zq0k, 'fieldname' => $m4is_iqdn, 'value' => $m4is_wuh95 ];
 $m4is_ato38 = [ '%d', '%s', '%s', '%s' ];
 $wpdb->replace( MEMBERIUM_DB_CONTACTS, $m4is_kd84a, $m4is_ato38 );
  $m4is_jcz18 = strtolower( $m4is_iqdn );
 if ( $m4is_e2kg == m4is_wbc8os::m4is_jjgo() ) { m4is_wbc8os::m4is_mz_rq( $m4is_jcz18, $m4is_wuh95 );
 } return true;
 } 
function m4is_az3tn8( $m4is_ig9p6, $m4is_fliw, $m4is_e2kg = 0, $m4is_ekoy = null ) { global $wpdb;
 $m4is_fliw = strtolower( trim( $m4is_fliw ) );
 $m4is_e2kg = (int) $m4is_e2kg;
 if ( $m4is_ig9p6 < 1 || empty( $m4is_fliw ) ) { return false;
 } if ( null === $m4is_ekoy ) { $m4is_x0_hk = get_user_by( 'id', $m4is_ig9p6 );
 $m4is_ekoy = ( $m4is_x0_hk->user_login === sanitize_user( $m4is_x0_hk->user_email ) );
 }  $m4is_tovizk = "SELECT COUNT(`ID`) FROM `{$wpdb->users}` WHERE ( `user_login` = %s OR `user_email` = %s ) AND `ID` <> %d";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, sanitize_user($m4is_fliw, true), $m4is_fliw, $m4is_ig9p6 );
 $m4is_ogxo = $wpdb->get_var( $m4is_tovizk );
 if ( $m4is_ogxo ) { return false;
 } if ( $m4is_e2kg ) { update_user_meta( $m4is_ig9p6, 'infusionsoft_user_id', $m4is_e2kg );
 }  $m4is__u5v = [ 'Id', 'Email', 'EmailAddress2', 'EmailAddress3' ];
 $m4is_k8uzp = m4is_bnrdbo::m4is_e5j_xv( $m4is_fliw, $m4is__u5v );
 if ( is_array( $m4is_k8uzp ) ) { foreach( $m4is_k8uzp as $m4is_s2ge5 => $m4is_p9r_8e ) { if ( $m4is_p9r_8e['Id'] == $m4is_e2kg ) { unset( $m4is_k8uzp[$m4is_s2ge5] );
 } } } if ( ! empty( $m4is_k8uzp ) && is_array( $m4is_k8uzp ) ) { return false;
 } $m4is_x0_hk = get_user_by( 'id', $m4is_ig9p6 );
 $m4is_vrzp6o = strtolower( $m4is_x0_hk->user_email );
  if ($m4is_ekoy) { $m4is_tovizk = "UPDATE `{$wpdb->users}` SET `user_login` = %s , `user_email` = %s WHERE `ID` = %d ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, sanitize_user( $m4is_fliw, true), $m4is_fliw, $m4is_ig9p6 );
 } else { $m4is_tovizk = "UPDATE `{$wpdb->users}` SET `user_email` = %s WHERE `ID` = %d ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_fliw, $m4is_ig9p6 );
 } $m4is_oa_z = $wpdb->query( $m4is_tovizk );
  unset( $m4is_ogxo, $m4is_tovizk );
 if ( class_exists( 'WooCommerce' ) ) { update_user_meta( $m4is_ig9p6, 'billing_email', $m4is_fliw );
 }  $m4is__xn_jt = [ 'Email' => $m4is_fliw ];
 if ( $m4is_e2kg ) { $m4is_oa_z = m4is_bnrdbo::m4is_cseh( $m4is_e2kg, $m4is__xn_jt);
  } else { $m4is__u5v = [ 'Id', ];
 $m4is_jo8fb = [ 'Email' => $m4is_vrzp6o, ];
 $m4is_k8uzp = m4is_ho3l::m4is_mg4uyc('Contact' ,1000, 0, $m4is_jo8fb, $m4is__u5v);
 if (is_array($m4is_k8uzp) && ! empty($m4is_k8uzp) ) { foreach($m4is_k8uzp as $m4is_p9r_8e) { if ($m4is_p9r_8e['Id']) { $m4is_oa_z = m4is_bnrdbo::m4is_cseh($m4is_p9r_8e['Id'], $m4is__xn_jt);
  } } } } m4is_bnrdbo::m4is_xj2eb( $m4is_fliw, 'Memberium Subscriber Email Change' );
 $m4is_k4yeul = [ 'contact_id' => $m4is_e2kg, 'cache_ttl' => 0, ];
 $this->m4is_pmj8bu($m4is_k4yeul);
 do_action( 'memberium_email_change', $m4is_e2kg, $m4is_ig9p6, $m4is_vrzp6o, $m4is_fliw );
 clean_user_cache($m4is_ig9p6);
 wp_cache_delete($m4is_ig9p6, 'users');
 wp_cache_delete($m4is_gai6k, 'userlogins');
 if ( get_current_user_id() == $m4is_ig9p6 ) { wp_clear_auth_cookie();
 wp_set_current_user( $m4is_ig9p6 );
 wp_set_auth_cookie( $m4is_ig9p6, true, false );
 $this->m4is_akz3();
 } return true;
 }    
function m4is_a1w0q( $m4is_j485e, $m4is_e2kg = false) { if ( ! m4is_u68pu::m4is_i9k3m() ) { return false;
 } if ( ! $m4is_e2kg) { $m4is_e2kg = (int) $this->m4is_dpuy9();
 if (! $m4is_e2kg ) { return false;
 } } $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na($m4is_e2kg);
 if (! $m4is_ig9p6) { return false;
 } if (strpos($m4is_j485e, '\\') !== false) { return false;
 } $m4is_j485e = trim($m4is_j485e);
 if (empty($m4is_j485e) ) { return false;
 }  if ( strlen( $m4is_j485e ) < $this->m4is_oiewvu( 'settings', 'min_password_length' ) ) { return false;
 } $m4is_haon5 = true;
 $m4is_gai6k = $_SESSION['memb_user']['LoginName'];
 $m4is_nuwyb = wp_hash_password($m4is_j485e);
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_dcf_7 = $this->m4is_oiewvu('settings', 'password_field');
 $m4is_r36qyu = (bool) $this->m4is_oiewvu('settings', 'local_auth_only');
 global $wpdb;
  if (! $m4is_r36qyu) { $m4is__xn_jt = [ $m4is_dcf_7 => $m4is_j485e ];
 m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt);
   $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "UPDATE {$m4is_tcw1l} SET `value` = '%s' WHERE id = %d AND `appname` = '%s' AND `fieldname` = '%s'; ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_j485e, $m4is_e2kg, $m4is_zq0k, $m4is_dcf_7);
 $m4is_oa_z = $wpdb->query( $m4is_tovizk );
  m4is_wbc8os::m4is_mz_rq( $m4is_dcf_7, $m4is_j485e );
 $this->m4is_m3vz( $m4is_e2kg );
 }   $wpdb->query( "UPDATE `{$wpdb->users}` SET `user_pass` = '{$m4is_nuwyb}' WHERE `ID` = '{$m4is_ig9p6}';" );
 clean_user_cache($m4is_ig9p6);
 wp_cache_delete($m4is_ig9p6, 'users');
 wp_cache_delete($m4is_gai6k, 'userlogins');
 $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 $this->disable_login_redirect = true;
 if ( $m4is_x0_hk && $m4is_ig9p6 == get_current_user_id() ) { wp_clear_auth_cookie();
 wp_set_current_user( $m4is_ig9p6 );
 wp_set_auth_cookie( $m4is_ig9p6, true, false );
 $this->m4is_akz3();
 } $this->disable_login_redirect = false;
 return true;
 }  
function m4is_e9m0g($m4is_vg0jw = false, $m4is_tglj = false) { $m4is_vg0jw = $m4is_vg0jw ? $m4is_vg0jw : $this->m4is_oiewvu('settings', 'min_password_length', 8);
 $m4is_tglj = $m4is_tglj ? $m4is_tglj : $this->m4is_oiewvu('settings', 'password_strength', 0);
 $m4is_dcf_7 = $this->m4is_oiewvu('settings', 'password_field', 'Password');
 if ($m4is_tglj < 5) { if ($m4is_vg0jw < 6) { $m4is_vg0jw = 6;
 } if ($m4is_dcf_7 == 'Password' && $m4is_vg0jw > 20) { $m4is_vg0jw = 20;
 } $m4is_tbykt8 = 'aeuy';
 $m4is_apn6 = 'bdghjmnpqrstvz';
 $m4is_d8rvf5 = '';
 $m4is_cdps1r = '';
 if ($m4is_tglj > 0) { $m4is_apn6 .= 'BDGHJLMNPQRSTVWXZ';
 } if ($m4is_tglj > 1) { $m4is_tbykt8 .= "AEUY";
 } if ($m4is_tglj > 2) {  $m4is_cdps1r = '23456789';
 } if ($m4is_tglj > 3) {  $m4is_d8rvf5 = '@#$%';
 } $m4is_tglj = max($m4is_tglj, 2);
 $m4is_j485e = '';
 $m4is_g_8zt9 = time() % $m4is_tglj;
 for ($i = 0;
 $i < $m4is_vg0jw;
 $i++) { $m4is_g_8zt9 = mt_rand(1, 100) % $m4is_tglj;
 if ($m4is_g_8zt9 == 0) { $m4is_j485e .= $m4is_apn6[(rand() % strlen($m4is_apn6) )];
  } elseif ($m4is_g_8zt9 == 1) { $m4is_j485e .= $m4is_tbykt8[(rand() % strlen($m4is_tbykt8) )];
  } elseif ($m4is_g_8zt9 == 2 && $m4is_tglj > 2) { $m4is_j485e .= $m4is_cdps1r[(rand() % strlen($m4is_cdps1r) )];
  } elseif ($m4is_g_8zt9 == 3 && $m4is_tglj > 3) { $m4is_j485e .= $m4is_d8rvf5[(rand() % strlen($m4is_d8rvf5) )];
  } } } else { $m4is_j485e = $this->m4is_qikfzq(null, $m4is_vg0jw, null, null);
 } return $m4is_j485e;
 }      
function m4is_qikfzq($m4is_j485e, $m4is_vg0jw = 0, $m4is_mcvp = '', $m4is_x5ka6 = '') { global $wpdb;
 $m4is_vg0jw = empty($m4is_vg0jw) ? $this->m4is_oiewvu('settings', 'min_password_length') : $m4is_vg0jw;
 if ($m4is_vg0jw < 20) { $m4is_tglj = $this->m4is_oiewvu('settings', 'password_strength');
 $m4is_dcf_7 = $this->m4is_oiewvu('settings', 'password_field');
 if ($m4is_tglj == 5 || $m4is_tglj == 6 && $m4is_dcf_7 !== 'Password') { if ($m4is_dcf_7 !== 'Password') { if ($m4is_tglj == 5) { $m4is_vg0jw = 4;
 } elseif ($m4is_tglj == 6) { $m4is_vg0jw = 5;
 } $m4is_nx2vs5 = [];
 $m4is_g42hy = false;
 $m4is_spr_i = get_option( 'memberium/database/words', 0 );
 if ($m4is_spr_i > 1000) { while (count($m4is_nx2vs5) < $m4is_vg0jw) { $m4is_xrlwu0 = mt_rand(1, $m4is_spr_i);
 $m4is_dj_2 = MEMBERIUM_DB_WORDS;
 $m4is_tovizk = $wpdb->prepare("SELECT `word` FROM `{$m4is_dj_2}` WHERE `id` = %d ", $m4is_xrlwu0);
 $m4is_wm9a7 = $wpdb->get_var($m4is_tovizk);
 if ( mt_rand( 1, 100 ) > 50 ) { $m4is_wm9a7 = ucwords($m4is_wm9a7);
 } if ( $m4is_g42hy == false && mt_rand( 1, 100 ) > 80 ) { $m4is_wm9a7 = mt_rand(1, 100) < 51 ? $m4is_wm9a7 . mt_rand(1, 99) : mt_rand(1, 99) . $m4is_wm9a7;
 $m4is_g42hy = true;
 } if (! empty($m4is_wm9a7) && ! in_array($m4is_wm9a7, $m4is_nx2vs5)) { $m4is_nx2vs5[] = $m4is_wm9a7;
 } } $m4is_j485e = implode('-', $m4is_nx2vs5);
 } } } } return $m4is_j485e;
 } 
function m4is_ga37( array $m4is_k4yeul ) : string { $m4is_r6nh_b = [ 'contact' => [], 'user_id' => 0, 'user' => false, 'contact_id' => 0, ];
 $m4is_k4yeul = wp_parse_args ($m4is_k4yeul, $m4is_r6nh_b );
 $m4is_k3o0 = '';
 if ( ! empty( $m4is_k4yeul['contact_id'] ) ) { $m4is_k4yeul['contact'] = m4is_bnrdbo::m4is_yvnol( $m4is_k4yeul['contact_id'] );
 } $m4is_k4yeul['contact'] = array_change_key_case( $m4is_k4yeul['contact'], CASE_LOWER );
 if ( ! empty( $m4is_k4yeul['user_id'] ) ) { $m4is_k4yeul['user'] = get_user_by( 'id', $m4is_k4yeul['user_id'] );
 } if ( $m4is_k4yeul['user'] ) { $m4is_k3o0 = $m4is_k4yeul['user']->display_name;
 } else { $m4is_k3o0 = '';
 } $m4is_ks1fj2 = $this->m4is_oiewvu( 'settings', 'displayname_format' );
 if ( empty( $m4is_ks1fj2 ) ) { $m4is_zp6jm = empty( $m4is_k4yeul['contact']['firstname'] ) ? '' : trim( $m4is_k4yeul['contact']['firstname'] );
 $m4is__cn5r = empty( $m4is_k4yeul['contact']['lastname'] ) ? '' : trim( $m4is_k4yeul['contact']['lastname'] );
 $m4is_ks1fj2 = trim( $m4is_zp6jm . ' ' . $m4is__cn5r );
 } if ( empty( $m4is_k3o0 ) || empty( $this->m4is_oiewvu( 'settings', 'disable_displayname_update' ) ) ) { $m4is_k3o0 = trim( preg_replace_callback( '|({{contact\.(.*)}})|U', function( $m4is_ogxo ) use ( $m4is_k4yeul ) { $m4is_s2ge5 = strtolower( $m4is_ogxo[2] );
 if ( isset( $m4is_k4yeul['contact'][$m4is_s2ge5] ) ) { $m4is_oa_z = $m4is_k4yeul['contact'][$m4is_s2ge5];
 } else { $m4is_oa_z = '';
 } return htmlspecialchars( $m4is_oa_z );
 }, $m4is_ks1fj2) );
 } return (string) $m4is_k3o0;
 } 
function m4is_gwho( $m4is_imdo6 ) : string { return mb_substr( (string) $m4is_imdo6, 0, 100 );
 } private 
function m4is_jzp3( WP_User $m4is_x0_hk ) : WP_User { $m4is_fe7xib = is_array( $m4is_x0_hk->roles ) ? array_filter( $m4is_x0_hk->roles ) : [];
 if ( ! empty( $m4is_fe7xib ) ) { return $m4is_x0_hk;
 } $m4is_lg3b = $m4is_x0_hk->user_login;
 $m4is_e_u17 = get_option( 'default_role' );
 error_log( sprintf( "Memberium: User '%s' has no role assigned.", $m4is_lg3b ) );
 if ( ! empty( $m4is_e_u17 ) ) { $m4is_x0_hk->set_role( $m4is_e_u17 );
 error_log( sprintf( "Memberium: Assinged Default Role of '%s' to user '%s'.", $m4is_e_u17, $m4is_lg3b ) );
 } else { error_log( sprintf( "Memberium: No Default Role Set for user '%s'.", $m4is_lg3b ) );
 } return $m4is_x0_hk;
 }    
function m4is_b34y( int $m4is_e2kg, string $m4is_j485e = '') { global $wpdb;
  $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol($m4is_e2kg);
 $m4is_powbq2 = $this->m4is_oiewvu( 'settings', 'username_field', 'Email' );
 $m4is_dcf_7 = $this->m4is_oiewvu( 'settings', 'password_field', 'Password' );
 $m4is_r36qyu = $this->m4is_oiewvu( 'settings', 'local_auth_only' );
 $m4is_ygqi60 = $this->m4is_oiewvu( 'settings', 'disable_displayname_update' );
 $m4is_r36qyu = $this->m4is_oiewvu( 'settings', 'local_auth_only');
 $m4is_gai6k = isset( $m4is_p9r_8e[$m4is_powbq2] ) ? $m4is_p9r_8e[$m4is_powbq2] : '';
 $m4is_gai6k = apply_filters( 'memberium_wordpress_username', $m4is_gai6k, $m4is_p9r_8e );
 $m4is_ski9jq = 94;
 if ( empty( $m4is_gai6k ) ) { return false;
 } if ( empty( $m4is_p9r_8e['Email'] ) ) { return false;
 } if ( empty( $m4is_j485e ) ) { $m4is_j485e = isset( $m4is_p9r_8e[ $m4is_dcf_7 ] ) ? $m4is_p9r_8e[ $m4is_dcf_7 ] : '';
 }  if ( empty( $m4is_r36qyu ) ) { if ( empty( $m4is_j485e ) ) { return false;
 } }  $m4is__migxk = (int) m4is_bnrdbo::m4is_d3na( $m4is_e2kg );
  if ( ! $m4is__migxk ) { $m4is__migxk = (int) $this->m4is_emfaw( $m4is_gai6k );
 }  if ( $m4is__migxk ) { $m4is_av461f = [];
 $m4is_fsvkh3 = get_user_by( 'id', $m4is__migxk );
 if ( is_object( $m4is_fsvkh3 ) && strtolower( $m4is_fsvkh3->user_email ) == strtolower( $m4is_p9r_8e['Email'] ) ) { $m4is_p9r_8e['Email'] = $m4is_fsvkh3->user_email;
 } $m4is_pvlb5 = [];
 $m4is_pvlb5['display_name'] = $m4is_fsvkh3->display_name;
 $m4is_pvlb5['first_name'] = $m4is_fsvkh3->first_name;
 $m4is_pvlb5['last_name'] = $m4is_fsvkh3->last_name;
 $m4is_pvlb5['nickname'] = $m4is_fsvkh3->nickname;
 $m4is_pvlb5['user_email'] = $m4is_fsvkh3->user_email;
 $m4is_pvlb5['user_nicename'] = $m4is_fsvkh3->user_nicename;
 $m4is_pvlb5['user_url'] = wp_specialchars_decode( $m4is_fsvkh3->user_url );
 $m4is_pvlb5['user_url'] = substr( $m4is_pvlb5['user_url'], 0, $m4is_ski9jq );
 $m4is_x5hmn = [];
 $m4is_x5hmn['first_name'] = isset( $m4is_p9r_8e['FirstName'] ) ? $m4is_p9r_8e['FirstName'] : $m4is_pvlb5['display_name'];
 $m4is_x5hmn['last_name'] = isset( $m4is_p9r_8e['LastName'] ) ? $m4is_p9r_8e['LastName'] : $m4is_pvlb5['last_name'];
 $m4is_x5hmn['user_email'] = strtolower( trim( $m4is_p9r_8e['Email'] ) );
 $m4is_x5hmn['user_url'] = empty( $m4is_p9r_8e['Website'] ) ? $m4is_pvlb5['user_url'] : $m4is_p9r_8e['Website'];
  if ( empty( $m4is_ygqi60 ) ) { $m4is_k4yeul = [ 'contact' => $m4is_p9r_8e, 'user_id' => $m4is__migxk, ];
 $m4is_x5hmn['display_name'] = (string) apply_filters( 'memberium/wpuser/display_name', $this->m4is_ga37( $m4is_k4yeul ), $m4is_p9r_8e );
 $m4is_x5hmn['nickname'] = (string) apply_filters( 'memberium/wpuser/nickname', (string) $m4is_pvlb5['display_name'], $m4is_p9r_8e );
 }  if ($this->m4is_oiewvu('settings', 'enable_slug_update', false) ) { $m4is_x5hmn['display_name'] = $m4is_x5hmn['display_name'] ?? '';
 $m4is_x5hmn['user_nicename'] = apply_filters( 'memberium/wpuser/nicename', sanitize_title( (string) $m4is_x5hmn['display_name'] ), $m4is_p9r_8e );
 } if ( empty( $m4is_r36qyu ) ) { $m4is_a6s3d = isset( $_POST['pwd'] ) ? $_POST['pwd'] : '';
 $m4is_a6s3d = isset( $_POST['password'] ) && isset( $_POST['woocommerce-login-nonce'] ) ? $_POST['password'] : $m4is_a6s3d;
 if ( ! empty( trim( $m4is_a6s3d ) ) ) { if ( in_array( $m4is_j485e, ['', 'PASSWORD_PLACEHOLDER'] ) ) { if ( ! empty( $m4is_a6s3d ) ) { if ( ( ! @wp_check_password( $m4is_a6s3d, $m4is_fsvkh3->data->user_pass, $m4is__migxk ) ) ) { $m4is_av461f['user_pass'] = $m4is_p9r_8e[$m4is_dcf_7];
 } } } else { if ( ( ! @wp_check_password( $m4is_j485e, $m4is_fsvkh3->data->user_pass, $m4is__migxk ) ) ) { $m4is_av461f['user_pass'] = $m4is_p9r_8e[$m4is_dcf_7];
 } } } } foreach ( $m4is_x5hmn as $m4is_s2ge5 => $m4is_w_o7al ) { if ( isset( $m4is_pvlb5[$m4is_s2ge5] ) && $m4is_pvlb5[$m4is_s2ge5] !== $m4is_w_o7al && ! empty( $m4is_w_o7al ) ) { $m4is_av461f[$m4is_s2ge5] = $m4is_w_o7al;
 } } if (! empty($m4is_av461f)) { $m4is_av461f['ID'] = $m4is__migxk;
  $this->m4is_xb8k(true);
 add_filter('send_password_change_email', [$this, 'm4is_bkl7'], PHP_INT_MAX, 3);
 wp_update_user( $m4is_av461f );
 remove_filter('send_password_change_email', [$this, 'm4is_bkl7'], PHP_INT_MAX);
  if (stripos($m4is_fsvkh3->user_login, '@') !== false) { $m4is_c14gi2 = sanitize_user($m4is_p9r_8e['Email'], true);
 if ($m4is_fsvkh3->user_login <> $m4is_c14gi2) { $this->m4is_u_7wja($m4is__migxk, $m4is_c14gi2);
 } } } } else {  $m4is_av461f = [];
 $m4is_av461f['user_pass'] = $m4is_j485e;
  $m4is_av461f['user_email'] = strtolower($m4is_p9r_8e['Email']);
 $m4is_av461f['first_name'] = isset($m4is_p9r_8e['FirstName']) ? $m4is_p9r_8e['FirstName'] : '';
 $m4is_av461f['last_name'] = isset($m4is_p9r_8e['LastName']) ? $m4is_p9r_8e['LastName'] : '';
 $m4is_av461f['user_url'] = isset($m4is_p9r_8e['Website']) ? $m4is_p9r_8e['Website'] : '';
 $m4is_k4yeul = [ 'contact' => $m4is_p9r_8e, ];
 $m4is_av461f['display_name'] = apply_filters( 'memberium/wpuser/display_name', (string) $this->m4is_ga37($m4is_k4yeul), $m4is_p9r_8e);
 $m4is_av461f['nickname'] = apply_filters( 'memberium/wpuser/nickname', (string) $m4is_av461f['display_name'], $m4is_p9r_8e);
 $m4is_av461f['user_login'] = apply_filters( 'memberium/wpuser/login', (string) $m4is_gai6k, $m4is_p9r_8e);
    $this->m4is_xb8k(true);
 $m4is__migxk = wp_insert_user( $m4is_av461f );
   if (function_exists('WPCW_actions_users_newUserCreated') ) { WPCW_actions_users_newUserCreated( $m4is__migxk );
 } $m4is_fsvkh3 = get_user_by( 'id', $m4is__migxk );
 } $m4is_fsvkh3 = $this->m4is_jzp3( $m4is_fsvkh3 );
 clean_user_cache( $m4is__migxk );
 $this->m4is_wday( $m4is_e2kg, $m4is__migxk );
 $this->m4is_xb8k(false);
 return $m4is__migxk;
 }  
function m4is_u_7wja( int $m4is_ig9p6, string $m4is_gai6k ) : bool { if ( user_can( $m4is_ig9p6, 'manage_options' ) ) { return false;
 } $m4is_c14gi2 = sanitize_user( $m4is_gai6k, true );
 $m4is_ngaqxl = get_user_by( 'login', $m4is_c14gi2 );
 if ( empty( $m4is_c14gi2 ) || $m4is_ngaqxl ) { return false;
 } $m4is_fsvkh3 = get_user_by( 'ID', $m4is_ig9p6 );
 global $wpdb;
 if ( $m4is_c14gi2 <> $m4is_fsvkh3->user_login ) { $sql = $wpdb->prepare( "UPDATE %i SET `user_login` = %s WHERE `ID` = %d", $wpdb->users, $m4is_c14gi2, $m4is_ig9p6 );
 $wpdb->query( $sql );
 wp_clean_user_cache( $m4is_ig9p6 );
 } return true;
 }  
function m4is_ku4k( $m4is_gai6k, $m4is_o4nx0 = false) { global $wpdb;
 $m4is_gai6k = stripslashes( $m4is_gai6k );
 $m4is_onu8_4 = [ 'Email', 'EmailAddress2', 'EmailAddress3' ];
 if ( empty( $m4is_gai6k ) ) { return;
 } if ( $this->m4is_jal63 == 1 ) { return;
 } $m4is_powbq2 = $this->m4is_oiewvu( 'settings', 'username_field' );
 $m4is_x0_hk = get_user_by('login', $m4is_gai6k);
 if ( ! $m4is_x0_hk && ! strpos( $m4is_gai6k, '@' ) && in_array( $m4is_powbq2, $m4is_onu8_4 ) ) { if (is_a($m4is_x0_hk, 'WP_User') ) { $m4is_gai6k = $m4is_x0_hk->data->user_email;
 } } if (empty($m4is_gai6k) ) { return;
 } if (! $m4is_o4nx0) { $m4is_o4nx0 = (int) $this->m4is_oiewvu('settings', 'max_contact_age');
 } $m4is_k8w1p = time() - $m4is_o4nx0;
 $m4is_kepn = MEMBERIUM_DB_CONTACTS;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_pnyj8 = 0;
 $m4is_gai6k = $this->m4is_rxfm_($m4is_gai6k);
 if ($m4is_o4nx0) { $m4is_tovizk = "
			SELECT
			COUNT(`{$m4is_kepn}`.`id`)
			FROM
			`{$m4is_kepn}`,
			`{$m4is_kepn}` as `{$m4is_kepn}_1`
			WHERE	`{$m4is_kepn}`.`appname`     = %s
			AND 	`{$m4is_kepn}`.`fieldname`   = %s
			AND		`{$m4is_kepn}`.`value`       = %s
			AND		`{$m4is_kepn}_1`.`id`        = `{$m4is_kepn}`.`id`
			AND		`{$m4is_kepn}_1`.`fieldname` = '!LastUpdated'
			AND		`{$m4is_kepn}_1`.`value`     > %d";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_powbq2, $m4is_gai6k, $m4is_k8w1p);
 $m4is_pnyj8 = (int) $wpdb->get_var($m4is_tovizk);
 } if ($m4is_pnyj8 == 0) { $m4is__u5v = m4is_ho3l::m4is_kjedy2('Contact', true);
 $m4is_jo8fb = [ ( ($m4is_powbq2) ? $m4is_powbq2 : 'Email') => $m4is_gai6k, ];
  if (is_object($m4is_x0_hk) && $m4is_x0_hk->ID > 0) {  } $m4is_k8uzp = m4is_ho3l::m4is_mlhu4('Contact', 1000, 0, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 if (is_array($m4is_k8uzp) && ! empty($m4is_k8uzp) ) { $m4is_z59dj = [];
 foreach($m4is_k8uzp as $m4is_p9r_8e) { if (isset($m4is_p9r_8e['Id']) ) { $m4is_z59dj[] = $m4is_p9r_8e['Id'];
 } } $m4is_z59dj = implode(',', $m4is_z59dj);
 $m4is_tovizk = "SELECT `id`
				FROM`{$m4is_kepn}`
				WHERE `{$m4is_kepn}`.`appname` = %s
				AND   `{$m4is_kepn}`.`fieldname` = %s
				AND   `{$m4is_kepn}`.`value` = %s
				AND   `{$m4is_kepn}`.`id` NOT IN ({$m4is_z59dj}) ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_powbq2, $m4is_gai6k);
 $m4is_wn5b = $wpdb->get_col($m4is_tovizk);
 if (is_array($m4is_wn5b) && ! empty($m4is_wn5b) ) { $m4is_tovizk = "DELETE FROM `{$m4is_kepn}`
					WHERE `{$m4is_kepn}`.`appname` = %s
					AND `{$m4is_kepn}`.`id` IN (" . implode(',', $m4is_wn5b) . "); ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_powbq2);
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 } foreach ($m4is_k8uzp as $m4is_p9r_8e) { $this->m4is_dhpr($m4is_p9r_8e);
 } unset($m4is_tovizk, $m4is_wn5b, $m4is_z59dj);
 if (count($m4is_k8uzp) > 0) { $this->m4is_jal63 = 1;
 } } } else {  } }  
function m4is_gz8a( $m4is_gai6k = '' ) : int { global $wpdb;
 if ( empty( $m4is_gai6k ) ) { return 0;
 } $m4is_gai6k = strtolower( trim( stripslashes( $m4is_gai6k ) ) );
 if ( empty( $m4is_gai6k ) ) { return 0;
 }  $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 if ($m4is_e2kg > 0) { if (isset($_SESSION['memb_user']['LoginName']) && $m4is_gai6k == $_SESSION['memb_user']['LoginName'] ) { return $m4is_e2kg;
 } } $m4is_iqd2 = $this->m4is_oiewvu();
 $m4is_kepn = MEMBERIUM_DB_CONTACTS;
 $m4is_k8w1p = intval( time() - $this->m4is_oiewvu( 'settings', 'max_contact_age' ) ) - 10;
 $m4is_zq0k = $this->m4is_d14zr( 'appname' );
 $m4is_powbq2 = $this->m4is_oiewvu( 'settings', 'username_field' );
 $m4is_dcf_7 = $this->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_f_v98a = get_user_by( 'email', $m4is_gai6k );
 if (! $m4is_f_v98a) { $m4is_f_v98a = get_user_by( 'login', $m4is_gai6k );
 } if ( is_object( $m4is_f_v98a ) && user_can( $m4is_f_v98a, 'manage_options' ) ) { return 0;
 } $m4is__migxk = is_a( $m4is_f_v98a, 'WP_User' ) ? $m4is_f_v98a->ID : 0;
 $m4is_from3 = m4is_bnrdbo::m4is_ltwpgs( $m4is__migxk );
 if ( $m4is_from3 ) { $m4is_fscf8 = m4is_bnrdbo::m4is_yvnol( $m4is_from3 );
 if ( ! empty( $m4is_fscf8['id'] ) && $m4is_fscf8['id'] == $m4is_from3 ) { return $m4is_from3;
 } }    $m4is__u5v = [ 'Id', $m4is_powbq2, $m4is_dcf_7, ];
  $m4is_jo8fb = [ $m4is_powbq2 => $m4is_gai6k,  ];
 $m4is_k8uzp = m4is_ho3l::m4is_mlhu4('Contact', 1, 0, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 $m4is_q19dh = 0;
  if (! is_array($m4is_k8uzp) ) { return 0;
 }  if (! empty($this->m4is_oiewvu('settings', 'local_auth_only') ) ) { return (int) $m4is_k8uzp[0]['Id'];
 }   foreach($m4is_k8uzp as $m4is_e2kg => $m4is_p9r_8e) { if (! empty($m4is_p9r_8e[$m4is_dcf_7]) ) { $m4is_q19dh = (int) $m4is_p9r_8e['Id'];
 break;
 } } return $m4is_q19dh;
 } 
function m4is_l1i7($m4is_ig9p6) { global $wpdb;
 $m4is_e2kg = 0;
 if ($m4is_ig9p6) { if (get_current_user_id() == $m4is_ig9p6 && ! empty($_SESSION['memb_user']['crm_id']) ) { $m4is_e2kg = $_SESSION['memb_user']['crm_id'];
 } else { $m4is_tovizk = "SELECT `meta_value` FROM `{$wpdb->usermeta}` WHERE `meta_key` = 'infusionsoft_user_id' AND `user_id` = %d LIMIT 1";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_ig9p6);
 $m4is_e2kg = (int) $wpdb->get_var($m4is_tovizk);
 if ( ! $m4is_e2kg ) { $m4is_x0_hk = get_user_by( 'id', $m4is_ig9p6 );
 $m4is_fliw = is_a($m4is_x0_hk, 'WP_user') ? $m4is_x0_hk->user_email : false;
 if ($m4is_fliw) { $m4is_xm2h = m4is_bnrdbo::m4is_e5j_xv($m4is_fliw, ['id']);
 $m4is_e2kg = empty( $m4is_xm2h[0]['id'] ) ? 0 : $m4is_xm2h[0]['id'];
 if ($m4is_e2kg) { $this->m4is_wday($m4is_e2kg, $m4is_ig9p6);
 } } } } } return $m4is_e2kg;
 } 
function m4is_rxfm_( $m4is_gai6k ) { $m4is_onu8_4 = [ 'Email', 'EmailAddress2', 'EmailAddress3' ];
 if ( ! in_array( $this->m4is_oiewvu( 'settings', 'username_field' ), $m4is_onu8_4 ) ) { return $m4is_gai6k;
 } $m4is_x0_hk = get_user_by( 'email', $m4is_gai6k ) || $m4is_x0_hk = get_user_by( 'login', $m4is_gai6k );
 if (is_a($m4is_x0_hk, 'WP_User') ) { $m4is_gai6k = $m4is_x0_hk->data->user_email;
 } else { $m4is_x0_hk = get_user_by('email', $m4is_gai6k);
 if (is_a($m4is_x0_hk, 'WP_User') ) { $m4is_gai6k = $m4is_x0_hk->data->user_email;
 } } return $m4is_gai6k;
 } 
function m4is_ku54f($m4is_lg3b) { $m4is_x0_hk = get_user_by('email', $m4is_lg3b);
 if (! $m4is_x0_hk) { $m4is_x0_hk = get_user_by('login', $m4is_lg3b);
 } return $m4is_x0_hk;
 } 
function m4is_emfaw($m4is_gai6k) { $m4is_gai6k = strtolower(trim($m4is_gai6k));
 $m4is_oa_z = false;
 $m4is_x0_hk = get_user_by('login', $m4is_gai6k);
 if (is_a($m4is_x0_hk, 'WP_User') && $m4is_x0_hk->ID > 0 ) { $m4is_oa_z = $m4is_x0_hk->ID;
 } else { $m4is_x0_hk = get_user_by('email', $m4is_gai6k);
 if ( is_a($m4is_x0_hk, 'WP_User') && $m4is_x0_hk->ID > 0 ) { $m4is_oa_z = $m4is_x0_hk->ID;
 } } return $m4is_oa_z;
 } 
function m4is_e6w2m($m4is_e2kg) { global $wpdb;
 $m4is_tovizk = "SELECT `user_id` FROM `{$wpdb->usermeta}`, `{$wpdb->users}` WHERE `{$wpdb->usermeta}`.`meta_value` = %s AND `{$wpdb->usermeta}`.`meta_key` = 'infusionsoft_user_id' AND `{$wpdb->users}`.`ID` = `{$wpdb->usermeta}`.`user_id` LIMIT 1;";
  $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg);
 $m4is_ig9p6 = (int) $wpdb->get_var($m4is_tovizk);
 if ($m4is_ig9p6 > 0) { $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 return $m4is_x0_hk;
 } else { return false;
 } } 
function m4is_b4u9( $m4is_gai6k, $m4is_j485e = '', $m4is_x9v4 = false) {  static $m4is_ogxo = [];
 $m4is_gai6k = stripslashes( $m4is_gai6k );
 $m4is_j485e = stripslashes( $m4is_j485e );
 if (isset($m4is_ogxo[$m4is_gai6k]) ) { return $m4is_ogxo[$m4is_gai6k];
 } global $wpdb;
 if ($m4is_gai6k == '') { return false;
 } $m4is_gai6k = $this->m4is_rxfm_($m4is_gai6k);
 $m4is_ig9p6 = $this->m4is_emfaw($m4is_gai6k);
 if ($this->m4is_dpuy9() > 0 && $m4is_ig9p6 == get_current_user_id() ) { return $this->m4is_dpuy9();
 } $m4is_r36qyu = $this->m4is_oiewvu('settings', 'local_auth_only', false);
 if (! $m4is_ig9p6 && $m4is_r36qyu) { return false;
 } else { $m4is_v4md5o = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 } $m4is_iqd2 = $this->m4is_oiewvu();
 $m4is_e2kg = 0;
 $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 $m4is_powbq2 = $this->m4is_oiewvu('settings', 'username_field');
 $m4is_dcf_7 = $this->m4is_oiewvu('settings', 'password_field');
 $m4is_sbn5 = $this->m4is_oiewvu('settings', 'max_contact_age');
  $m4is_kepn = MEMBERIUM_DB_CONTACTS;
 $m4is_k8w1p = intval(time() - $m4is_sbn5);
 $m4is_zq0k = $this->m4is_d14zr('appname');
 if (! empty($m4is_r36qyu) ) { $m4is_tovizk = "
			SELECT
			`c1`.`id`,
			'' as `password`,
			0 as `score`
			FROM
			`{$m4is_kepn}` as `c1`
			WHERE	`c1`.`appname` = '{$m4is_zq0k}'
			AND 	`c1`.`fieldname` = '{$m4is_powbq2}'
			AND		`c1`.`value` = %s
			ORDER BY
			`c1`.`id` ASC";
 } else { $m4is_tovizk = "
			SELECT
			`c1`.`id`,
			`c2`.`value` as `password`,
			0 as `score`
			FROM
			`{$m4is_kepn}` as `c1`,
			`{$m4is_kepn}` as `c2`
			WHERE	`c1`.`appname` = '{$m4is_zq0k}'
			AND 	`c1`.`fieldname` = '{$m4is_powbq2}'
			AND		`c1`.`value` = %s
			AND 	`c2`.`id` = `c1`.`id`
			AND 	`c2`.`appname` = '{$m4is_zq0k}'
			AND 	`c2`.`fieldname` = '{$m4is_dcf_7}'
			ORDER BY
			`c1`.`id` ASC";
 } $m4is_tovizk = $wpdb->prepare($m4is_tovizk, stripslashes($m4is_gai6k) );
 $m4is_k8uzp = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 if ($m4is_r36qyu) {  $m4is_e2kg = isset($m4is_k8uzp[0]['id']) ? $m4is_k8uzp[0]['id'] : 0;
 } else {  if (is_array($m4is_k8uzp) && ! empty($m4is_k8uzp) ) { foreach ($m4is_k8uzp as $m4is_s2ge5=>$m4is_p9r_8e) { $m4is_k8uzp[$m4is_s2ge5]['password'] = stripslashes(html_entity_decode(trim($m4is_p9r_8e['password']) ) );
 } $m4is_en2rlm = false;
  if (false && count($m4is_k8uzp) == 1) { $m4is_e2kg = (int) $m4is_k8uzp[0]['id'];
 $m4is_en2rlm = 0;
 $m4is_p9r_8e[0]['score'] = $m4is_k8uzp[0]['score'] + 25;
 } else { $m4is_k8uzp[0]['score'] = $m4is_k8uzp[0]['score'] + 2;
 foreach ($m4is_k8uzp as $m4is_s2ge5=>$m4is_p9r_8e) { if ($m4is_j485e > '' && $m4is_p9r_8e['password'] == stripslashes(trim($m4is_j485e) ) ) {  $m4is_k8uzp[$m4is_s2ge5]['score'] = $m4is_k8uzp[$m4is_s2ge5]['score'] + 10;
 } elseif ($m4is_j485e > '' && $m4is_p9r_8e['password'] > '' && $m4is_p9r_8e['password'] != 'PASSWORD_PLACEHOLDER') { $m4is_p9r_8e['score'] = $m4is_p9r_8e['score'] + 5;
 } elseif ($m4is_j485e > '' && $m4is_j485e != $m4is_p9r_8e['password'] && $m4is_p9r_8e['password'] == 'PASSWORD_PLACEHOLDER') { $m4is_k8uzp[$m4is_s2ge5]['score'] = $m4is_k8uzp[$m4is_s2ge5]['score'] + 3;
 } elseif ($m4is_j485e == '' && $m4is_p9r_8e['password'] == '') { $m4is_k8uzp[$m4is_s2ge5]['score'] = $m4is_k8uzp[$m4is_s2ge5]['score'] + 1;
 } elseif ($m4is_p9r_8e['id'] == $m4is_v4md5o) { $m4is_k8uzp[$m4is_s2ge5]['score'] + 10;
 } }  $m4is_jtfbop = 0;
 foreach ($m4is_k8uzp as $m4is_s2ge5 => $m4is_p9r_8e) { if ($m4is_p9r_8e['score'] > $m4is_jtfbop) { $m4is_en2rlm = $m4is_s2ge5;
 } } unset($m4is_jtfbop);
 } if ($m4is_en2rlm !== FALSE) { if ($m4is_j485e == '' || ($m4is_j485e > '' && $m4is_k8uzp[$m4is_en2rlm]['password'] == $m4is_j485e) ) {  $m4is_e2kg = (int) $m4is_k8uzp[$m4is_en2rlm]['id'];
 } elseif ($m4is_j485e > '' && $m4is_j485e <> 'PASSWORD_PLACEHOLDER' && $m4is_k8uzp[$m4is_en2rlm]['password'] == 'PASSWORD_PLACEHOLDER') {  if (is_a($m4is_x0_hk, 'WP_User')) { if ( ($m4is_x0_hk->ID > 0) && wp_check_password($m4is_j485e, $m4is_x0_hk->data->user_pass, $m4is_x0_hk->ID) ) { $m4is_e2kg = (int) $m4is_k8uzp[$m4is_en2rlm]['id'];
 $m4is_mzcd = [ $this->m4is_oiewvu('settings', 'password_field') => $m4is_j485e ];
 m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is_mzcd, true);
  } } } else { } } if ($m4is_e2kg > 0) { $m4is_p9r_8e = $m4is_k8uzp[$m4is_en2rlm];
  } } } if (! $m4is_x0_hk) { $m4is_x0_hk = get_user_by('email', $m4is_gai6k);
 } if (is_a($m4is_x0_hk, 'WP_User') && $m4is_e2kg > 0) { $this->m4is_wday($m4is_e2kg, $m4is_x0_hk->ID);
 }  if ($m4is_gai6k > '' && $m4is_j485e > '' && $m4is_e2kg > 0) { $m4is_ogxo[$m4is_gai6k] = $m4is_e2kg;
 } return $m4is_e2kg;
 } 
function m4is_dhpr( $m4is_h_iu0, $m4is_wmjz = false) { global $wpdb;
 static $m4is_hrj9 = [], $m4is_zq0k = '', $m4is_ygqi60 = null, $m4is_asn4 = null, $m4is_dcf_7 = null, $m4is_l4yl = null, $m4is_c_m6p = null, $m4is_d213h = null;
 $this->m4is_snyx( true );
 $m4is_j5sy07 = isset( $m4is_h_iu0['Id'] ) ? (int) $m4is_h_iu0['Id'] : 0;
  if (! $m4is_j5sy07 ) { return false;
 }  if ( empty( trim( $m4is_h_iu0['Email'] ) ) ) { return false;
 }  if ( isset( $m4is_h_iu0['CompanyID'] ) && $m4is_h_iu0['CompanyID'] == $m4is_j5sy07 ) { return false;
 }  $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $m4is_j5sy07 );
 if ( user_can( $m4is_ig9p6, 'manage_options' ) ) { return false;
 } $m4is_dcf_7 = is_null( $m4is_dcf_7 ) ? $this->m4is_oiewvu( 'settings', 'password_field' ) : $m4is_dcf_7;
 $m4is_l4yl = is_null( $m4is_l4yl ) ? $this->m4is_oiewvu( 'settings', 'plaintext_db' ) : $m4is_l4yl;
 $m4is_asn4 = is_null( $m4is_asn4 ) ? array_filter( explode( ',', $this->m4is_oiewvu( 'settings', 'ignore_contact_fields' ) ) ) : $m4is_asn4;
 $m4is_d213h = is_null( $m4is_d213h ) ? $this->m4is_oiewvu( 'settings', 'sync_tag_details' ) : $m4is_d213h;
 $m4is_ygqi60 = is_null( $m4is_ygqi60 ) ? $this->m4is_oiewvu( 'settings', 'disable_displayname_update' ) : $m4is_ygqi60;
 $m4is_c_m6p = is_null( $m4is_c_m6p ) ? $this->m4is_oiewvu( 'settings', 'sync_meta_updates' ) : $m4is_c_m6p;
 $m4is_zq0k = empty( $m4is_zq0k ) ? $this->m4is_d14zr( 'appname' ) : $m4is_zq0k;
 $m4is_hrj9 = empty( $m4is_hrj9 ) ? m4is_ho3l::m4is_kjedy2( 'Contact', true ) : $m4is_hrj9;
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_zts3 = get_user_by( 'email', $m4is_h_iu0['Email'] );
 $m4is_fgy9n = [ 'Email', 'FirstName', 'Groups', 'LastName', ];
 foreach( $m4is_h_iu0 as $m4is_s2ge5 => $m4is_w_o7al ) { if ( in_array( $m4is_s2ge5, $m4is_asn4 ) ) { unset( $m4is_h_iu0[$m4is_s2ge5] );
 } } $m4is_h_iu0 = $this->m4is_mgdfhw( $m4is_h_iu0 );
  foreach( $m4is_h_iu0 as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_h_iu0[$m4is_s2ge5] = ( $m4is_w_o7al == 'null' ) ? '' : trim( $m4is_w_o7al );
 }  foreach( $m4is_h_iu0 as $m4is_s2ge5 => $m4is_w_o7al ) { if ( $m4is_w_o7al == '' && ! in_array( $m4is_s2ge5, $m4is_fgy9n ) ) { unset( $m4is_h_iu0[$m4is_s2ge5] );
 } }  if ( $m4is_wmjz ) { m4is_bnrdbo::m4is_cseh( $m4is_j5sy07, $m4is_h_iu0 );
  }  $m4is_h_iu0['!LastUpdated'] = time();
 $m4is_wrc_a = m4is_bnrdbo::m4is_yvnol( $m4is_j5sy07, false, true );
 foreach( $m4is_h_iu0 as $m4is_s2ge5 => $m4is_w_o7al ) { if ( in_array( $m4is_s2ge5, $m4is_asn4 ) ) { unset( $m4is_h_iu0[$m4is_s2ge5] );
 } }  foreach( $m4is_fgy9n as $m4is_tlvagb ) { $m4is_h_iu0[$m4is_tlvagb] = $m4is_h_iu0[$m4is_tlvagb] ?? '';
 } $m4is_h_iu0['Groups'] = implode( ',', array_filter( array_unique( explode( ',', $m4is_h_iu0['Groups'] ) ) ) );
 $m4is_hok0j = $this->m4is_bp1omz( $m4is_wrc_a, $m4is_h_iu0 );
 $m4is_i2ek1 = $this->m4is_eod7l( $m4is_wrc_a, $m4is_h_iu0 );
 $m4is_olyhm2 = $this->m4is_br18( $m4is_wrc_a, $m4is_h_iu0 );
 $m4is_olyhm2 = $this->m4is_wb_v( $m4is_olyhm2, $m4is_i2ek1 );
 $m4is_olyhm2 = $this->m4is_wb_v( $m4is_olyhm2, array_keys( $m4is_hok0j ) );
  if ( ! empty($m4is_i2ek1) ) { $m4is_tovizk = "DELETE FROM {$m4is_tcw1l} WHERE `appname` = %s AND `id` = %d AND `fieldname` IN ('" . implode("','", $m4is_i2ek1) . "');";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_j5sy07);
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 }  if ( ! empty( $m4is_hok0j ) ) { $m4is_vnhq = [];
 foreach( $m4is_hok0j as $m4is_c5zg => $m4is_g0wy ) { $m4is_vnhq[] = $wpdb->prepare('(%d, %s, %s, %s)', $m4is_j5sy07, $m4is_zq0k, $m4is_c5zg, $m4is_g0wy);
 } if (! empty($m4is_vnhq) ) { $m4is_tovizk = "INSERT INTO {$m4is_tcw1l} (id, appname, fieldname, value) VALUES " . implode(',', $m4is_vnhq);
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 } } if ( ! empty( $m4is_olyhm2 ) ) { foreach ( $m4is_olyhm2 as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_tovizk = "UPDATE `{$m4is_tcw1l}` SET `value` = %s WHERE `id` = %d AND `appname` = %s AND `fieldname` = %s ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_w_o7al, $m4is_j5sy07, $m4is_zq0k, $m4is_s2ge5 );
 $wpdb->query( $m4is_tovizk );
 } } if ($m4is_c_m6p) { $this->m4is_svf4($m4is_ig9p6, $m4is_j5sy07, $m4is_h_iu0);
 } if (! empty( $m4is_d213h ) ) { $this->m4is_mlq_( (int) $m4is_h_iu0['Id']);
 } if ( $m4is_ig9p6 ) { $this->m4is_b34y( $m4is_j5sy07 );
 clean_user_cache( $m4is_ig9p6 );
 } $this->m4is_m3vz($m4is_j5sy07);
 do_action('memberium_save_contact', $m4is_h_iu0['Id'], $m4is_ig9p6, $m4is_h_iu0);
 $this->m4is_snyx( false );
 } 
function m4is_svf4( int $m4is_ig9p6, int $m4is_e2kg, $m4is_w_8g ) { global $wpdb;
 if (! $this->m4is_oiewvu( 'settings', 'sync_meta_updates' ) ) { return;
 } if (empty( $m4is_w_8g ) || empty( $m4is_ig9p6 ) ) { return;
 } $m4is_gd3oc = "memb\_%";
 $m4is_tovizk = "SELECT `meta_key`, `meta_value` FROM {$wpdb->usermeta} WHERE `user_id` = {$m4is_ig9p6} AND `meta_key` LIKE '{$m4is_gd3oc}' ";
 $m4is_qdi9 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_qdi9 = $this->m4is_da9or( $m4is_qdi9, 'meta_key', 'meta_value' );
 foreach( $m4is_w_8g as $m4is_s2ge5 => $m4is_w_o7al ) { if ( substr( $m4is_s2ge5, 0, 1 ) !== '!' ) { $m4is_d2l7au = "memb_{$m4is_s2ge5}";
 if ( ! array_key_exists( $m4is_d2l7au, $m4is_qdi9 ) || $m4is_w_o7al == '' ) { delete_user_meta( $m4is_ig9p6, $m4is_d2l7au );
 } elseif ( array_key_exists( $m4is_d2l7au, $m4is_qdi9 ) && $m4is_qdi9[$m4is_d2l7au] !== $m4is_w_o7al ) { update_user_meta( $m4is_ig9p6, $m4is_d2l7au, $m4is_w_o7al );
 } elseif ( ! array_key_exists( $m4is_d2l7au, $m4is_qdi9 ) && ! empty( $m4is_w_o7al) ) { add_user_meta( $m4is_ig9p6, $m4is_d2l7au, $m4is_w_o7al );
 } } } } 
function m4is_i0air( int $m4is_e2kg ) { global $wpdb;
 $m4is_tovizk = 'SELECT `value` FROM `' . MEMBERIUM_DB_CONTACTS . '` WHERE `id` = %d AND `fieldname` = "!LastUpdated";';
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $m4is_e2kg );
 $m4is_nxoznj = (int) $wpdb->get_var( $m4is_tovizk );
 return $m4is_nxoznj;
 } 
function m4is_leu58($m4is_e2kg = 0, $m4is_o4hoex = false) { $m4is_iiq6_ = 0;
 if ( ! $m4is_e2kg ) { return $m4is_iiq6_;
 } global $wpdb;
 $m4is_iqd2 = $this->m4is_oiewvu();
 $m4is_up85 = $this->get_i2sdk_options();
 $m4is_e2kg = (int) $m4is_e2kg;
 $m4is__u5v = m4is_ho3l::m4is_kjedy2('Contact', true);
 $m4is_hpn9y = [];
 $m4is_iiq6_ = 0;
 $m4is_mb6gy = time() - 3;
 $m4is_z5wiy = $this->m4is_i0air( $m4is_e2kg );
 if ( $m4is_z5wiy <= $m4is_mb6gy ) { $m4is_hpn9y = m4is_bnrdbo::m4is_i38y7c( $m4is_e2kg, $m4is__u5v );
 } if ( is_string( $m4is_hpn9y ) && stripos( $m4is_hpn9y, 'RecordNotFound' ) !== false) { m4is_bnrdbo::m4is_ojk0r( $m4is_e2kg );
 } if (is_array($m4is_hpn9y) && count($m4is_hpn9y) > 0) { $this->m4is_dhpr($m4is_hpn9y);
 $m4is_iiq6_ = count($m4is_hpn9y);
 if (! empty($this->m4is_oiewvu('settings','sync_tag_details') ) ) { $this->m4is_mlq_( (int) $m4is_hpn9y['Id']);
 } $this->m4is_m3vz($m4is_e2kg);
 } return $m4is_iiq6_;
 } 
function m4is_pmj8bu( $m4is_k4yeul = [] ) { $m4is_r6nh_b = [ 'contact_id' => 0, 'cascade' => false, 'cache_ttl' => 0, ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_e2kg = $m4is_k4yeul['contact_id'];
 $m4is_o4hoex = $m4is_k4yeul['cascade'];
 $m4is_lkcr2 = $m4is_k4yeul['cache_ttl'];
 $m4is_iiq6_ = 0;
 if ($m4is_e2kg > 0) { global $wpdb;
 $m4is_iqd2 = $this->m4is_oiewvu();
 $m4is_up85 = $this->get_i2sdk_options();
 $m4is_e2kg = (int) $m4is_e2kg;
 $m4is__u5v = m4is_ho3l::m4is_kjedy2('Contact', true);
 $m4is_hpn9y = [];
 $m4is_iiq6_ = 0;
 $m4is_tovizk = 'SELECT `value` FROM `' . MEMBERIUM_DB_CONTACTS . '` WHERE `id` = %d AND `fieldname` = "!LastUpdated";';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg);
 $m4is_z5wiy = $wpdb->get_var($m4is_tovizk);
 $m4is_mb6gy = time();
 if ($m4is_z5wiy < ($m4is_mb6gy - $m4is_lkcr2) ) { $m4is_hpn9y = m4is_bnrdbo::m4is_i38y7c($m4is_e2kg, $m4is__u5v);
 if (is_string($m4is_hpn9y) && stripos($m4is_hpn9y, 'RecordNotFound') !== false) { m4is_bnrdbo::m4is_ojk0r($m4is_e2kg);
 } if (is_array($m4is_hpn9y) && count($m4is_hpn9y) > 0) { $this->m4is_dhpr($m4is_hpn9y);
 $m4is_iiq6_ = count($m4is_hpn9y);
 if (! empty($this->m4is_oiewvu('settings','sync_tag_details') ) ) { $this->m4is_mlq_( (int) $m4is_ke_fr['Id']);
 } } } $this->m4is_m3vz($m4is_e2kg);
 } return $m4is_iiq6_;
 } 
function m4is_j30vf1( $m4is_k4yeul ) { $m4is_r6nh_b = [ 'email' => is_string( $m4is_k4yeul ) ? strtolower( trim( $m4is_k4yeul ) ) : '', 'return' => 'row_count',  ];
 if ( is_string( $m4is_k4yeul ) ) { $m4is_r6nh_b['email'] = strtolower( trim( $m4is_k4yeul ) );
 $m4is_k4yeul = [];
 } $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
 $m4is_fliw = $m4is_k4yeul['email'];
 if ( empty( $m4is_fliw ) ) { return;
 } $m4is_c4mtkr = $this->m4is_oiewvu( 'settings', 'sync_tag_details' );
 $m4is_dj_2 = 'Contact';
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, true );
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_iiq6_ = 0;
 $contact_count = 0;
 $contact_ids = [];
 $contacts = [];
 $m4is_jo8fb = [ 'Email' => $m4is_fliw ];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 if ( is_array( $m4is_hpn9y ) && ! empty( $m4is_hpn9y ) ) { foreach ( $m4is_hpn9y as $m4is_ke_fr ) { if ( $m4is_k4yeul['return'] == 'contacts' ) { $contacts[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 } $contact_count++;
 $contact_ids[] = $m4is_ke_fr['Id'];
 $this->m4is_dhpr( $m4is_ke_fr );
 if ( $m4is_c4mtkr ) { $this->m4is_mlq_( (int) $m4is_ke_fr['Id'] );
 } $this->m4is_m3vz( $m4is_ke_fr['Id'] );
 } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count( $m4is_hpn9y );
 } } while ( is_array( $m4is_hpn9y ) && count( $m4is_hpn9y ) == $m4is_y_38pw );
  if ( $m4is_k4yeul['return'] == 'contact_count' ) { return $contact_count;
 } elseif ( $m4is_k4yeul['return'] == 'contact_ids' ) { return $contact_ids;
 } elseif ( $m4is_k4yeul['return'] == 'contacts' ) { return $contacts;
 } return $m4is_iiq6_;
 } 
function m4is_mlq_( int $m4is_e2kg ) { if (! $m4is_e2kg ) { return;
 } global $wpdb;
 $m4is_zq0k = $this->m4is_d14zr( 'appname' );
 $m4is_e2kg = $m4is_e2kg;
 $m4is_y_38pw = 1000;
 $m4is_dj_2 = 'ContactGroupAssign';
 $m4is_couz = 0;
 $m4is_oxei6v = 'ContactId';
 $m4is_wqzi = $m4is_e2kg;
 $m4is__u5v = [ 'GroupId', 'DateCreated' ];
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTTAGS;
 $m4is_iiq6_ = 0;
 $wpdb->delete( $m4is_tcw1l, ['contactid' => $m4is_e2kg, 'appname' => $m4is_zq0k] );
 do { $m4is_hpn9y = $this->m4is_zw_n()->dsfind( $m4is_dj_2, (int) $m4is_y_38pw, (int) $m4is_couz, $m4is_oxei6v, (string) $m4is_wqzi, $m4is__u5v );
 if (is_array($m4is_hpn9y) ) { foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_kb4hx = (int) strtotime( $m4is_ke_fr['DateCreated'] );
 $wpdb->insert( MEMBERIUM_DB_CONTACTTAGS, [ 'appname' => $m4is_zq0k, 'contactid' => $m4is_e2kg, 'tagid' => (int) $m4is_ke_fr['GroupId'], 'created' => date( 'Y-m-d H:i:s', $m4is_kb4hx ), ], ['%s', '%d', '%d', '%s'] );
 } } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count($m4is_hpn9y);
 } while (count($m4is_hpn9y) == $m4is_y_38pw);
 $current_contact_id = m4is_wbc8os::m4is_jjgo();
 if ($current_contact_id == $m4is_e2kg) { $_SESSION['memb_user']['tags_synced'] = 1;
 } } 
function m4is_x1axkf( int $m4is_e2kg, $m4is_fliw) { global $wpdb;
 if (empty($m4is_fliw) ) { return false;
 } if (empty($m4is_e2kg) ) { return false;
 } $m4is_yxwn = $this->m4is_oiewvu('settings','username_field');
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_tovizk = "SELECT count(`id`) FROM `" . MEMBERIUM_DB_CONTACTS . "` WHERE `id` = %d AND `fieldname` = %s AND appname = %s AND VALUE = %s ;";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg, $m4is_yxwn, $m4is_zq0k, $m4is_fliw);
 $m4is_uwdfj = $wpdb->get_var($m4is_tovizk);
 if (! $m4is_uwdfj) { } else { } return $m4is_uwdfj;
 } 
function m4is_f80gv3( int $m4is_qo53, $m4is_mdqgk = []) : bool { global $wpdb;
 if ( empty( $m4is_mdqgk ) ) {  if ( current_user_can( 'manage_options' ) ) { return true;
 } }  if ( ! m4is_u68pu::m4is_u6mkaw() ) { return false;
 } if ( $m4is_mdqgk === false ) { if (m4is_wbc8os::m4is_sfnmc( 'groups' ) == '' ) { $m4is_mdqgk['keap']['contact']['groups'] = '';
 $m4is_mdqgk['memb_user']['GroupNames'] = '';
 } else { $m4is_he6sy = m4is_wbc8os::m4is_sfnmc( 'groups' );
 $m4is_izmlui = $_SESSION['memb_user']['GroupNames'];
 } } else { $m4is_he6sy = isset( $m4is_mdqgk['keap']['contact']['groups'] ) ? $m4is_mdqgk['keap']['contact']['groups'] : '';
 $m4is_izmlui = isset( $m4is_mdqgk['memb_user']['GroupNames'] ) ? $m4is_mdqgk['memb_user']['GroupNames'] : '';
 } $m4is_ygajo = m4is_pwtg7::m4is_p95imw( explode( ',', $m4is_he6sy ) );
 $m4is_gu5l = in_array( $m4is_qo53, $m4is_ygajo );
 return $m4is_gu5l;
 } 
function m4is_v1dwme( $m4is_nxhwu, $m4is_vdw7io ) { if ( empty( $m4is_nxhwu ) || empty( $m4is_vdw7io ) ) { return false;
 } $m4is__lqf = false;
 $m4is_nxhwu = is_array( $m4is_nxhwu ) ? $m4is_nxhwu : array_filter( explode( ',', $m4is_nxhwu ) );
 $m4is_nxhwu = m4is_pwtg7::m4is_rk2s( $m4is_nxhwu );
 $m4is_nxhwu = array_map( 'trim', $m4is_nxhwu );
 $m4is_pvg91b = array_filter( $m4is_nxhwu, function( $m4is_w_o7al ) { if ( substr( $m4is_w_o7al, 0, 1 ) == '-' ) { return true;
 } });
 $m4is_nxhwu = array_filter( $m4is_nxhwu, function( $m4is_w_o7al ) { if ( $m4is_w_o7al > 0 ) { return true;
 } });
 $m4is_pvg91b = array_map( 'abs', $m4is_pvg91b );
 $m4is_vdw7io = is_array( $m4is_vdw7io ) ? $m4is_vdw7io : array_filter( explode( ',', $m4is_vdw7io ) );
  if (! array_intersect( $m4is_vdw7io, $m4is_pvg91b ) ) { if ( array_intersect( $m4is_vdw7io, $m4is_nxhwu ) ) { return true;
 } } return false;
 }  
function m4is_sjmzx($m4is_iystd2, $m4is_mdqgk = []) {  if ( ! m4is_u68pu::m4is_u6mkaw() ) { return false;
 } if (! isset($m4is_mdqgk['keap']['contact']['groups']) ) { $m4is_ig9p6 = isset($m4is_mdqgk['memb_user']['user_id']) ? $m4is_mdqgk['memb_user']['user_id'] : get_current_user_id();
 if (user_can($m4is_ig9p6, 'manage_options')) { return true;
 } } $m4is_he6sy = '';
 $m4is_izmlui = '';
 if ($m4is_mdqgk === [] ) { if ( m4is_wbc8os::m4is_sfnmc('groups') == '') { $m4is_mdqgk['keap']['contact']['groups'] = '';
 $m4is_mdqgk['memb_user']['GroupNames'] = '';
 } else { $m4is_he6sy = m4is_wbc8os::m4is_sfnmc('groups');
 $m4is_izmlui = $_SESSION['memb_user']['GroupNames'];
 } } else { $m4is_he6sy = isset($m4is_mdqgk['keap']['contact']['groups']) ? $m4is_mdqgk['keap']['contact']['groups'] : '';
 $m4is_izmlui = isset($m4is_mdqgk['memb_user']['GroupNames']) ? $m4is_mdqgk['memb_user']['GroupNames'] : '';
 } if (empty($m4is_he6sy) && strpos($m4is_iystd2, '-') === false) { return false;
 } if (is_array($m4is_iystd2) ) { $m4is_iystd2 = trim(implode(',', $m4is_iystd2), ',');
 } if ($m4is_iystd2 === $m4is_he6sy) { return true;
 } $m4is_uwdfj = false;
 $m4is_iystd2 = preg_replace(['/, */', '/ *,/'], ',', $m4is_iystd2);
 $m4is_iystd2 = preg_replace(['/^,/', '/,$/'], '', $m4is_iystd2);
 $m4is_iystd2 = trim($m4is_iystd2);
 $m4is_osi9 = array_filter(explode(',', strtolower(trim($m4is_iystd2) ) ) );
 $m4is_xb_6 = implode(',', $m4is_osi9);
 $m4is_he6sy = array_filter(explode(',', $m4is_he6sy) );
 $m4is_izmlui = array_filter(explode(',', strtolower($m4is_izmlui) ) );
 $m4is_ffgh = [];
 $m4is_is54qo = [];
  foreach($m4is_osi9 as $m4is_mpia) { if (substr($m4is_mpia, 0, 1) <> '-') { $m4is_ffgh[] = $m4is_mpia;
 } else { $m4is_is54qo[] = substr($m4is_mpia, 1);
 } }  $m4is_qgrf = false;
 $m4is__dsf = 0;
 if (count($m4is_ffgh) ) { $m4is__dsf = count(array_intersect($m4is_ffgh, $m4is_he6sy) ) + count(array_intersect($m4is_ffgh, $m4is_izmlui) );
 $m4is_qgrf = (boolean) $m4is__dsf;
 } else { $m4is__dsf = 0;
 $m4is_qgrf = true;
 }  $m4is_td10bm = false;
 $m4is_xht8f2 = 0;
 if (count($m4is_is54qo) ) { $m4is_xht8f2 = count(array_intersect($m4is_is54qo, $m4is_he6sy) ) + count(array_intersect($m4is_is54qo, $m4is_izmlui) );
 $m4is_td10bm = ! (boolean) $m4is_xht8f2;
 } else { $m4is_xht8f2 = 0;
 $m4is_td10bm = true;
 }  $m4is_uwdfj = false;
 if (count($m4is_ffgh) ) { $m4is_uwdfj = $m4is_uwdfj || $m4is_qgrf;
 } if (count($m4is_is54qo) ) { $m4is_uwdfj = $m4is_uwdfj || $m4is_td10bm;
 } return $m4is_uwdfj;
 }  
function m4is_mhx6($m4is_iystd2, $m4is_e2kg = false) {  if (empty($m4is_iystd2) ) { return false;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 }  if (! $m4is_e2kg) { if (current_user_can('manage_options') ) { return true;
 } return false;
 }  if (! m4is_u68pu::m4is_u6mkaw() ) { return false;
 } if (! is_array($m4is_iystd2) ) { $m4is_iystd2 = explode(',', $m4is_iystd2);
 } if ($m4is_e2kg == m4is_wbc8os::m4is_jjgo() ) { $m4is_he6sy = m4is_wbc8os::m4is_sfnmc('groups');
 $m4is_izmlui = $_SESSION['memb_user']['GroupNames'];
 } else { $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na($m4is_e2kg);
 if ($m4is_ig9p6) { $m4is_mdqgk = $this->m4is_akz3($m4is_ig9p6);
 $m4is_he6sy = $m4is_mdqgk['keap']['contact']['groups'];
 $m4is_izmlui = $m4is_mdqgk['memb_user']['GroupNames'];
 } } if ($m4is_e2kg > 0) { $m4is_he6sy = explode(',', $m4is_he6sy);
 $m4is_izmlui = explode(',', strtolower($m4is_izmlui) );
 foreach ($m4is_iystd2 as $m4is_mpia) { if (substr($m4is_mpia, 0, 1) == '-') { $m4is_mpia = strtolower(ltrim($m4is_mpia, '-') );
 if (in_array($m4is_mpia, $m4is_he6sy) || in_array($m4is_mpia, $m4is_izmlui) ) { return false;
 } } else { $m4is_mpia = strtolower($m4is_mpia);
 if (! in_array($m4is_mpia, $m4is_he6sy) && ! in_array($m4is_mpia, $m4is_izmlui) ) { return false;
 } } } return true;
 } return false;
 }    
function m4is_q9of8a($m4is_e2kg) { global $wpdb;
 static $cached_affiliate_id = [];
 if (isset($cached_affiliate_id[$m4is_e2kg]) ) { return $cached_affiliate_id[$m4is_e2kg];
 } if (empty($m4is_e2kg) ) { $m4is_e2kg = (int) m4is_wbc8os::m4is_jjgo();
 } if ($m4is_e2kg < 1) { return 0;
 }  $m4is_e2kg = (int) $m4is_e2kg;
 $m4is_wj89g = [];
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_dj_2 = 'Referral';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_iiq6_ = 0;
;
 $m4is_jo8fb = [ 'ContactId' => $m4is_e2kg, ];
 $m4is_f8qb1a = $this->m4is_oiewvu('settings','referral_partner_order') == 1;
 do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4($m4is_dj_2, (int) $m4is_y_38pw, (int) $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true);
 if (is_array($m4is_hpn9y) ) { foreach ($m4is_hpn9y as $m4is_ke_fr) { if (! isset($m4is_ke_fr['DateExpires']) || $m4is_ke_fr['DateExpires'] >= date( 'Ymd\T00:00:00' ) ) { $m4is_wj89g[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 } } $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count($m4is_hpn9y);
 } } while (count($m4is_hpn9y) == $m4is_y_38pw);
 if ($m4is_f8qb1a) { $m4is_uie3s = array_shift($m4is_wj89g);
 } else { $m4is_uie3s = array_pop($m4is_wj89g);
 } unset($m4is_wj89g, $m4is_hpn9y);
 $cached_affiliate_id[$m4is_e2kg] = isset($m4is_uie3s['AffiliateId']) ? $m4is_uie3s['AffiliateId'] : 0;
 return $cached_affiliate_id[$m4is_e2kg];
 } 
function m4is_nf09rk( int $m4is_e2kg, bool $m4is_dzkv = false ) : bool { global $wpdb;
 if ( empty( $m4is_e2kg ) ) { return false;
 } if ( wp_doing_ajax() ) { return false;
 } $m4is_h1ntyh = $this->m4is_oiewvu( 'settings', 'max_affiliate_age', 0 );
 $m4is_zq0k = $this->m4is_d14zr( 'appname' );
 $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na( $m4is_e2kg );
 $m4is_hxgi = 'memberium/' . $m4is_zq0k . '/affiliate/updated';
 $m4is_lq7v = time();
 $m4is_z5wiy = 0;
  if ( $m4is_h1ntyh && $m4is_dzkv == false ) { $m4is_jt0xp = $m4is_lq7v - (int) get_user_meta( $m4is_ig9p6, $m4is_hxgi, true ) - 30;
 if ( $m4is_jt0xp < $m4is_h1ntyh ) { return true;
 } } $m4is__b5x37 = m4is_pk8phc::m4is_wtngi7( $m4is_e2kg );
 if ( is_array ($m4is__b5x37 ) ) { m4is_pk8phc::m4is_ewdv( $m4is__b5x37 );
 update_user_meta($m4is_ig9p6, $m4is_hxgi, $m4is_lq7v);
 return true;
 } return false;
  } 
function m4is_se_9hv($m4is_e2kg = 0) { global $wpdb;
 static $m4is_t0o97;
 if ( ! empty( $m4is_e2kg ) && isset( $m4is_t0o97[$m4is_e2kg] ) ) { return $m4is_t0o97[$m4is_e2kg];
 } $m4is_iqd2 = $this->m4is_oiewvu();
 $m4is_up85 = $this->i2sdk_options;
 $m4is_qhyts = $this->m4is_oiewvu( 'settings', 'plaintext_db', false );
 $m4is_dcf_7 = $this->m4is_oiewvu( 'settings','password_field', '' );
 $m4is_zq0k = $this->m4is_d14zr( 'appname' );
 $m4is_e2kg = (int) $m4is_e2kg;
 $m4is_y_38pw = 1000;
 $m4is_dj_2 = 'Affiliate';
 $m4is_couz = 0;
 $m4is_oxei6v = 'ContactId';
 $m4is_wqzi = ( $m4is_e2kg > 0 ) ? (int) $m4is_e2kg : '%';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, true );
 $m4is_tcw1l = m4is_pk8phc::m4is_f5buj();
 $m4is_iiq6_ = 0;
 $m4is_x_rxou = [];
 if ( $m4is_e2kg == 0 ) { $m4is_jo8fb = [ 'ContactId' => '%' ];
 } else { $m4is_jo8fb = [ 'ContactId' => $m4is_e2kg ];
 } do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4( $m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true );
 if ( is_array( $m4is_hpn9y ) && ! empty( $m4is_hpn9y ) ) { $m4is_flx71n = [];
 $m4is_vnhq = [];
 foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_ke_fr['!LastUpdated'] = time();
 $m4is_j5sy07 = (int) $m4is_ke_fr['Id'];
 $m4is_x_rxou[] = $m4is_j5sy07;
 $m4is_w_8g[] = [];
 foreach ( $m4is_ke_fr as $m4is_s2ge5 => $m4is_w_o7al ) { if ( $m4is_qhyts ) { $m4is_w_o7al = remove_accents( $m4is_w_o7al );
  } $m4is_w_o7al = $m4is_w_o7al == 'null' ? '' : $m4is_w_o7al;
 $m4is_vnhq[] = $wpdb->prepare( '(%d, %s, %s, %s)', $m4is_j5sy07, $m4is_zq0k, $m4is_s2ge5, $m4is_w_o7al );
 $m4is_w_8g[] = $m4is_s2ge5;
 $m4is_w_o7al = ( $m4is_s2ge5 != $m4is_dcf_7 ) ? wp_strip_all_tags( $m4is_w_o7al ) : $m4is_w_o7al;
 } } $m4is_tovizk = "INSERT INTO {$m4is_tcw1l} (id, appname, fieldname, value) VALUES " . implode(',', $m4is_vnhq) . " ON DUPLICATE KEY UPDATE id=VALUES(id), appname=VALUES(appname), fieldname=VALUES(fieldname), value=VALUES(value);";
 $wpdb->query($m4is_tovizk);
 $m4is_couz++;
 $m4is_iiq6_ = $m4is_iiq6_ + count($m4is_hpn9y);
 } } while (is_array($m4is_hpn9y) && count($m4is_hpn9y) == $m4is_y_38pw);
 if (! empty($m4is_x_rxou) ) { $m4is_tovizk = "DELETE FROM {$m4is_tcw1l} WHERE `appname` = '{$m4is_zq0k}' AND `id` NOT IN (" . implode(',', $m4is_x_rxou) . ");";
 $wpdb->query($m4is_tovizk);
 } if ($m4is_e2kg == 0) {   set_transient('memberium_affiliates_updated', time() );
 } $m4is_t0o97[$m4is_e2kg] = $m4is_iiq6_;
 return $m4is_iiq6_;
 } 
function m4is_qkohaq() { global $wpdb;
 } 
function m4is_s_jc( $m4is_pa8jw, $m4is_mndpkr = '', $m4is_zopt = '' ) { $m4is_pa8jw = (int) $m4is_pa8jw;
 $m4is_tovizk = prepare('SELECT count(id) FROM `' . MEMBERIUM_DB_INVOICES . '` WHERE affiliateid = %d ', $m4is_pa8jw);
 $m4is_t9sduc = (int) strtotime($m4is_mndpkr);
 $m4is_t53xq = (int) strtotime($m4is_zopt);
 if ($m4is_mndpkr) { $m4is_tovizk .= $wpdb->prepare( 'AND datecreated >= %s ', date( 'Y-m-d h:i:s', $m4is_t9sduc ) );
 } if ($m4is_zopt) { $m4is_tovizk .= $wpdb->prepare( 'AND datecreated <= %s ', date('Y-m-d h:i:s', $m4is_t53xq ) );
 } }    
function m4is_u3zvs( $m4is_k4yeul ) { $m4is_r6nh_b = [ 'format' => 'serial', 'invoice_id' => 0, 'contact_id' => $this->m4is_dpuy9(), ];
 $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
 $m4is_c4lk = (int) $m4is_k4yeul['invoice_id'];
 $m4is_e2kg = (int) $m4is_k4yeul['contact_id'];
 $m4is_dp251a = strtolower( trim( $m4is_k4yeul['format'] ) );
 $m4is_zq0k = $this->m4is_d14zr( 'appname' );
 $m4is_wvr4fa = 'Memberium:' . $m4is_zq0k . '::Receipt:' . $m4is_c4lk . '::Contact:' . $m4is_e2kg;
  $m4is_kfsn9d = get_transient( $m4is_wvr4fa );
 if ($m4is_kfsn9d === false) { if ($m4is_c4lk) {  $m4is_dj_2 = 'Invoice';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, false );
 $m4is_etwy_q = m4is_ho3l::m4is_kjosf7( $m4is_dj_2, (int) $m4is_c4lk, $m4is__u5v );
 if ( ! $this->m4is_lvmz1b() ) { if ( isset($m4is_etwy_q['ContactId']) && $m4is_etwy_q['ContactId'] == $m4is_e2kg) { $m4is_c4lk = empty($m4is_etwy_q['Id']) ? 0 : (int) $m4is_etwy_q['Id'];
 $m4is_jwfnh = empty($m4is_etwy_q['JobId']) ? 0 : (int) $m4is_etwy_q['JobId'];
 } else { $m4is_c4lk = 0;
 } } if ($m4is_c4lk) { $m4is_kfsn9d['invoice'] = array_change_key_case($m4is_etwy_q, CASE_LOWER);
 $m4is_kfsn9d['invoice']['totaldue'] = $m4is_kfsn9d['invoice']['totaldue'];
 $m4is_kfsn9d['invoice']['invoicetotal'] = $m4is_kfsn9d['invoice']['invoicetotal'];
 $m4is_kfsn9d['invoice']['totalpaid'] = $m4is_kfsn9d['invoice']['totalpaid'];
  $m4is_kfsn9d['contact'] = m4is_bnrdbo::m4is_yvnol($m4is_e2kg, true);
  if ($m4is_jwfnh) { $m4is_dj_2 = 'Job';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_auoz = $this->m4is_zw_n()->dsLoad($m4is_dj_2, (int) $m4is_jwfnh, $m4is__u5v);
 if (is_array($m4is_auoz) ) { $m4is_kfsn9d['job'] = array_change_key_case($m4is_auoz, CASE_LOWER);
 }  $m4is_dj_2 = 'OrderItem';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_jo8fb = ['OrderId' => $m4is_jwfnh];
 $m4is_jkocm = 'Id';
 $m4is_f8qb1a = true;
 $m4is_cq9e = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 if (is_array($m4is_cq9e) ) { foreach($m4is_cq9e as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_cq9e[$m4is_s2ge5] = array_change_key_case($m4is_w_o7al, CASE_LOWER);
 $m4is_cq9e[$m4is_s2ge5]['ppu'] = $m4is_cq9e[$m4is_s2ge5]['ppu'];
 $m4is_cq9e[$m4is_s2ge5]['cpu'] = $m4is_cq9e[$m4is_s2ge5]['cpu'];
 } $m4is_kfsn9d['orderitems'] = $m4is_cq9e;
 } }  $m4is_dj_2 = 'InvoiceItem';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_jo8fb = ['InvoiceId' => $m4is_c4lk];
 $m4is_jkocm = 'Id';
 $m4is_f8qb1a = true;
 $m4is_cq9e = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 if (is_array($m4is_cq9e) ) { foreach($m4is_cq9e as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_cq9e[$m4is_s2ge5] = array_change_key_case($m4is_w_o7al, CASE_LOWER);
 $m4is_cq9e[$m4is_s2ge5]['ppu'] = $m4is_cq9e[$m4is_s2ge5]['ppu'];
 $m4is_cq9e[$m4is_s2ge5]['cpu'] = $m4is_cq9e[$m4is_s2ge5]['cpu'];
 $m4is_cq9e[$m4is_s2ge5]['invoiceamt'] = $m4is_cq9e[$m4is_s2ge5]['invoiceamt'];
 } $m4is_kfsn9d['invoiceitems'] = $m4is_cq9e;
 }  $m4is_dj_2 = 'Payment';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_jo8fb = ['InvoiceId' => $m4is_c4lk];
 $m4is_jkocm = 'Id';
 $m4is_f8qb1a = true;
 $m4is_nb6yzq = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 $m4is_rvw64a = 0;
 if (is_array($m4is_nb6yzq) ) { foreach($m4is_nb6yzq as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_nb6yzq[$m4is_s2ge5] = array_change_key_case($m4is_w_o7al, CASE_LOWER);
 $m4is_nb6yzq[$m4is_s2ge5]['payamt'] = $m4is_nb6yzq[$m4is_s2ge5]['payamt'];
 } $m4is_kfsn9d['payments'] = $m4is_nb6yzq;
 } if ($m4is_etwy_q['TotalPaid'] < $m4is_etwy_q['InvoiceTotal']) {  $m4is_dj_2 = 'PayPlan';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_jo8fb = ['InvoiceId' => $m4is_c4lk];
 $m4is_jkocm = 'Id';
 $m4is_f8qb1a = true;
 $m4is_seyd = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 if (is_array($m4is_seyd) ) { foreach($m4is_seyd as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_seyd[$m4is_s2ge5] = array_change_key_case($m4is_w_o7al, CASE_LOWER);
 $m4is_seyd[$m4is_s2ge5]['amtdue'] = $m4is_seyd[$m4is_s2ge5]['amtdue'];
 $m4is_seyd[$m4is_s2ge5]['firstpayamt'] = $m4is_seyd[$m4is_s2ge5]['firstpayamt'];
 } $m4is_kfsn9d['paymentplan'] = $m4is_seyd[0];
 }  $m4is_dj_2 = 'PayPlanItem';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_jo8fb = ['PayPlanId' => $m4is_seyd[0]['id'] ];
 $m4is_jkocm = 'Id';
 $m4is_f8qb1a = true;
 $m4is_h0qxt = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 if (is_array($m4is_h0qxt) ) { foreach($m4is_h0qxt as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_h0qxt[$m4is_s2ge5] = array_change_key_case($m4is_w_o7al, CASE_LOWER);
 } $m4is_kfsn9d['paymentplanitems'] = $m4is_h0qxt;
 } } } } } set_transient( $m4is_wvr4fa, $m4is_kfsn9d, HOUR_IN_SECONDS * 3 );
 if ( $m4is_dp251a == 'json' ) { $m4is_kfsn9d = json_encode( $m4is_kfsn9d );
 } return $m4is_kfsn9d;
 } 
function m4is_ow9yjk($m4is_e2kg, $m4is_elmj3 = true, $m4is_ytr_ = true, $m4is_tuc7 = false) { $m4is_e2kg = (int) $m4is_e2kg;
 if ($m4is_e2kg < 1) { return [];
 } $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_wvr4fa = 'Memberium::' . $m4is_zq0k . '::Invoices::' . $m4is_e2kg;
 $m4is_craco = [];
 if (! $m4is_tuc7) { $m4is_hpn9y = get_transient($m4is_wvr4fa);
 } if (empty($m4is_craco) ) { $m4is_f8qb1a = true;
 $m4is_jkocm = 'DateCreated';
 $m4is_jo8fb = [ 'ContactId' => (int) $m4is_e2kg ];
 $m4is__u5v = [ 'Id', 'CreditStatus', 'DateCreated', 'Description', 'InvoiceTotal', 'InvoiceType', 'JobId', 'PayPlanStatus', 'PayStatus', 'ProductSold', 'RefundStatus', 'TotalDue', 'TotalPaid', ];
 $m4is_hpn9y = m4is_ho3l::m4is_mlhu4('Invoice', 1000, 0, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 set_transient($m4is_wvr4fa, $m4is_hpn9y, 1800);
 } foreach($m4is_hpn9y as $m4is_ke_fr) { $m4is_e5snw = false;
 $m4is_j5sy07 = $m4is_ke_fr['Id'];
 $m4is__jwd73 = max($m4is_ke_fr['TotalDue'], $m4is_ke_fr['InvoiceTotal']);
 $m4is_e5snw = $m4is_ke_fr['TotalPaid'];
  $m4is_ke_fr['!payment_due'] = $m4is__jwd73 - $m4is_e5snw;
 $m4is_e5snw = $m4is_ke_fr['!payment_due'] == 0;
 if ( $m4is_elmj3 && empty( $m4is_ke_fr['!payment_due'] ) ) { $m4is_craco[$m4is_j5sy07] = $m4is_ke_fr;
  } if ($m4is_ytr_ && (! empty($m4is_ke_fr['!payment_due']) ) ) { $m4is_craco[$m4is_j5sy07] = $m4is_ke_fr;
 } } return $m4is_craco;
 } 
function m4is_ffs2n4($m4is_c4lk = 0) { $m4is_c4lk = (int) $m4is_c4lk;
 if ($m4is_c4lk < 1) { return [];
 } $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_wvr4fa = "Memberium::{$m4is_zq0k}::Invoice::{$m4is_c4lk}";
 $m4is_craco = [];
 $m4is_hpn9y = get_transient($m4is_wvr4fa);
 if (empty($m4is_hpn9y) ) { $m4is_craco = $this->m4is_ow9yjk($m4is_e2kg, true, true);
 } if (empty($m4is_hpn9y) ) { $m4is_f8qb1a = true;
 $m4is_jkocm = 'DateCreated';
 $m4is_jo8fb = [ 'ContactId' => (int) $m4is_e2kg ];
 $return_fields = [ 'Id', 'CreditStatus', 'DateCreated', 'Description', 'InvoiceTotal', 'InvoiceType', 'PayPlanStatus', 'PayStatus', 'ProductSold', 'RefundStatus', 'TotalDue', 'TotalPaid', ];
 $m4is_hpn9y = m4is_ho3l::m4is_mlhu4('Invoice', 1000, 0, $m4is_jo8fb, $return_fields, $m4is_jkocm, $m4is_f8qb1a);
 set_transient($m4is_wvr4fa, $m4is_hpn9y, 1800);
 } foreach ($m4is_hpn9y as $m4is_ke_fr) { if ($m4is_elmj3 && $m4is_ke_fr['PayStatus'] == 1) { $m4is_craco[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 $m4is_craco[$m4is_ke_fr['Id']]['!amountdue'] = 0;
 $m4is_craco[$m4is_ke_fr['Id']]['!amountpaid'] = $m4is_ke_fr['TotalPaid'];
 } if ($unpaid && $m4is_ke_fr['InvoiceTotal'] > $m4is_ke_fr['TotalPaid']) { $m4is_craco[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 $m4is_craco[$m4is_ke_fr['Id']]['!payplan'] = m4is_untczd::m4is__gco6n( (int) $m4is_ke_fr['Id']);
 $m4is_craco[$m4is_ke_fr['Id']]['!payplanitems'] = m4is_untczd::m4is_snbx( (int) $m4is_craco[$m4is_ke_fr['Id']]['!payplan']['Id']);
 foreach ($m4is_craco[$m4is_ke_fr['Id']]['!payplanitems'] as $payplanitem) { if (isset($payplanitem['AmtDue']) && $payplanitem['AmtDue'] > 0) { $m4is_craco[$m4is_ke_fr['Id']]['!amountdue'] = $payplanitem['AmtDue'];
 $m4is_craco[$m4is_ke_fr['Id']]['!amountpaid'] = $payplanitem['AmtPaid'];
 break;
 } else { } } } } return $m4is_craco;
 } 
function m4is_rn7a4y($m4is_jwfnh = 0) { $m4is_jwfnh = (int) $m4is_jwfnh;
 if ($m4is_jwfnh < 1) { return [];
 } $m4is_jo8fb = ['JobId' => $m4is_jwfnh];
 $m4is_dj_2 = 'Invoice';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2);
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_craco = m4is_ho3l::m4is_mlhu4($m4is_dj_2, 1, 0, $m4is_jo8fb, $m4is__u5v);
 $m4is_etwy_q = [];
 if (is_array($m4is_craco) && isset($m4is_craco[0]) ) { $m4is_etwy_q = (is_array($m4is_craco) && isset($m4is_craco[0]) ) ? $m4is_craco[0] : [];
 $m4is_wvr4fa = "Memberium::{$m4is_zq0k}::Invoice::{$m4is_etwy_q['Id']}";
 set_transient($m4is_wvr4fa, $m4is_etwy_q, 1800);
 } return $m4is_etwy_q;
 } 
function m4is_nign() { $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_wvr4fa = 'Memberium::' . $m4is_zq0k . '::SubscriptionPlans';
 $m4is_jt5l9 = get_transient($m4is_wvr4fa);
 if (empty($m4is_jt5l9) ) { $m4is_jt5l9 = m4is_untczd::m4is_k896();
 } return $m4is_jt5l9;
 } 
function m4is_crewgb($m4is_jwfnh = 0) { if ($m4is_jwfnh == 0) { return FALSE;
 } $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_jwfnh = (int) $m4is_jwfnh;
 $m4is_wvr4fa = "Memberium::{$m4is_zq0k}::OrderItems::{$m4is_jwfnh}";
 $m4is_t3h2 = get_transient($m4is_wvr4fa);
 if (! empty($m4is_t3h2) ) { return $m4is_t3h2;
 } unset($m4is_t3h2);
 $m4is_dj_2 = 'OrderItem';
 $m4is_jo8fb = ['OrderId' => $m4is_jwfnh];
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2);
 $m4is_t3h2 = m4is_ho3l::m4is_mg4uyc($m4is_dj_2, 1000, 0, $m4is_jo8fb, $m4is__u5v);
 if (! empty($m4is_t3h2) ) { if (is_array($m4is_t3h2) ) { set_transient($m4is_wvr4fa, $m4is_t3h2, 1800);
 return $m4is_t3h2;
 } } return FALSE;
 } 
function m4is_ts0h3x($m4is_e2kg = 0, $m4is_tuc7 = false) { if ($m4is_e2kg == 0) { $m4is_e2kg = $this->m4is_dpuy9();
 } $m4is_wvr4fa = 'memberium_subscriptions::' . $m4is_e2kg;
 $m4is_wb9f = get_transient($m4is_wvr4fa);
 if ($m4is_wb9f === false || $m4is_tuc7) { $m4is_jo8fb = ['ContactId' => $m4is_e2kg];
 $m4is__u5v = m4is_ho3l::m4is_kjedy2('RecurringOrder');
 $m4is_jkocm = 'Id';
 $m4is_f8qb1a = false;
 $m4is_hpn9y = m4is_ho3l::m4is_mlhu4('RecurringOrder', 999, 0, $m4is_jo8fb, $m4is__u5v, $m4is_jkocm, $m4is_f8qb1a);
 if (is_array($m4is_hpn9y) && ! empty($m4is_hpn9y) ) { foreach ($m4is_hpn9y as $m4is_ke_fr) { $m4is_wb9f[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 } } set_transient($m4is_wvr4fa, $m4is_wb9f, HOUR_IN_SECONDS / 12);
 unset($m4is_hpn9y, $m4is_ke_fr, $m4is__u5v, $m4is_jo8fb);
 } if (is_array($m4is_wb9f) ) { foreach($m4is_wb9f as $m4is_c5zg => $m4is_g0wy) { if (! empty($m4is_g0wy['EndDate']) && $m4is_g0wy['Status'] == 'Active' && $m4is_g0wy['EndDate'] < date( 'Ymd' ) ) { $m4is_g0wy['Status'] = 'Inactive';
 } if ($m4is_g0wy['Status'] <> 'Active') { $m4is_g0wy['NextBillDate'] = '';
 } $m4is_wb9f[$m4is_c5zg] = $m4is_g0wy;
 } } return $m4is_wb9f;
 } 
function m4is_lf3ds2($m4is_e2kg = 0) { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_INVOICES;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_tovizk = "SELECT MAX(`jobid`) FROM `{$m4is_tcw1l}` WHERE `appname` = '{$m4is_zq0k}' AND `contactid` = {$m4is_e2kg};
";
 return (int) $wpdb->get_var($m4is_tovizk);
 } 
function m4is_g43l() { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_INVOICES;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_tovizk = "SELECT MAX(`jobid`) FROM `{$m4is_tcw1l}` WHERE `appname` = '{$m4is_zq0k}';";
 return (int) $wpdb->get_var($m4is_tovizk);
 } 
function m4is_ud0p() { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_INVOICES;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_tovizk = "SELECT MAX(`datecreateed`) FROM `{$m4is_tcw1l}` WHERE `appname` = '{$m4is_zq0k}';";
 return strtotime($wpdb->get_var($m4is_tovizk) );
 } 
function m4is_bek5($m4is_e2kg = false) { global $wpdb;
 if (! $m4is_e2kg) { $m4is_e2kg = $this->m4is_dpuy9();
 } $m4is_wvr4fa = "memberium_jobs::{$m4is_e2kg}";
 $m4is_yq74pt = get_transient($m4is_wvr4fa);
 $m4is_yq74pt = false;
 if ($m4is_yq74pt === false) { $m4is_iqd2 = $this->m4is_oiewvu();
 $m4is_up85 = $this->i2sdk_options;
 $m4is_tcw1l = MEMBERIUM_DB_JOBS;
 $m4is_dj_2 = 'Job';
 $m4is__u5v = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false);
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is_iiq6_ = 0;
 $m4is_yq74pt = [];
 $m4is_jo8fb = ['ContactId' => (int) $m4is_e2kg];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mlhu4($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v, 'Id', true);
 if (is_array($m4is_hpn9y) ) { foreach($m4is_hpn9y as $m4is_ke_fr) { $m4is_yq74pt[$m4is_ke_fr['Id']] = $m4is_ke_fr;
 } } $m4is_couz++;
 } while (count($m4is_hpn9y) == $m4is_y_38pw);
 $m4is_iiq6_ = count($m4is_yq74pt);
 if ($m4is_iiq6_) { set_transient($m4is_wvr4fa, $m4is_yq74pt, HOUR_IN_SECONDS);
 } else { set_transient($m4is_wvr4fa, $m4is_yq74pt, 300);
 } } $m4is_iiq6_ = count($m4is_yq74pt);
 return $m4is_yq74pt;
 }  
function m4is_yep9($m4is_gqid) { $m4is_vbz8 = strtolower(substr($m4is_gqid['bypass_commissions'], 0, 1) );
 $m4is_vbz8 = ($m4is_vbz8 == 'y' || $m4is_vbz8 == 1) ? TRUE : FALSE;
 $m4is_vbz8 = (bool) $m4is_gqid['bypass_commissions'];
 $m4is_sfqk_ = strtolower(substr($m4is_gqid['delete_failed'], 0, 1) );
 $m4is_sfqk_ = ($m4is_sfqk_ == 'y' || $m4is_sfqk_ == 1) ? TRUE : FALSE;
 $m4is_sn9hp = (int) $m4is_gqid['product_type'];
 $m4is_sn9hp = ($m4is_gqid['product_type'] > 0 && $m4is_gqid['product_type'] < 15) ? $m4is_gqid['product_type'] : 4;
 $m4is__muv = (bool) $m4is_gqid['autorun'];
 $m4is__4en6o = (int) $m4is_gqid['creditcard_id'];
 $m4is_sfqk_ = (bool) $m4is_gqid['delete_failed'];
 $m4is_sn9hp = (int) $m4is_gqid['item_type'];
 $m4is_q6l9t = (int) $m4is_gqid['lead_affiliate_id'];
 $m4is_cxre = (int) $m4is_gqid['merchant_id'];
 $m4is_xbjma = (int) $m4is_gqid['product_id'];
 $m4is_wyq6fv = trim($m4is_gqid['product_description']);
 $m4is_zzni9h = (float) $m4is_gqid['product_price'];
 $m4is_i7hqn = (int) $m4is_gqid['quantity'];
 $m4is_rulxbm = (int) $m4is_gqid['sales_affiliate_id'];
 $m4is_x_8b = (int) $m4is_gqid['has_payment_plan'];
 $m4is_d4vorb = $m4is_gqid['order_date'];
 $m4is_i7zkhx = (bool) $m4is_gqid['taxable'];
 $m4is_kl95 = trim($m4is_gqid['success_action']);
 $m4is_kinf1 = trim($m4is_gqid['success_goals']);
 $m4is_bfljdr = trim($m4is_gqid['success_tags']);
 $m4is_y7y2 = trim($m4is_gqid['fail_action']);
 $m4is_kv49s = trim($m4is_gqid['fail_goals']);
 $m4is_hiu6 = trim($m4is_gqid['fail_tags']);
 if ($m4is_x_8b) { $m4is_sbpe = (bool) $m4is_gqid['payplan_autocharge'];
 $m4is_sxmbp = (int) $m4is_gqid['payplan_max_retries'];
 $m4is_vvyf = (int) $m4is_gqid['payplan_retry_days'];
 $m4is_a0uev7 = (float) $m4is_gqid['payplan_initial_amount'];
 $m4is__wf6qy = (int) $m4is_gqid['payplan_payment_count'];
 $m4is_grx0 = (int) $m4is_gqid['payplan_days_between'];
 }  $m4is_d4vorb = date( 'Y-m-d\TH:i:s' );
 $m4is_c4lk = $this->m4is_zw_n()->blankOrder($m4is_e2kg, $m4is_wyq6fv, $m4is_d4vorb, $m4is_q6l9t, $m4is_rulxbm);
 $this->m4is_zw_n()->addOrderItem($m4is_c4lk, $m4is_xbjma, $m4is_sn9hp, $m4is_zzni9h, $m4is_i7hqn, $product_name, $m4is_wyq6fv);
 if ($m4is_x_8b) { $m4is_u6lnkp = $app->infuDate("10-11-2008");
 $m4is_r26jr = $app->infuDate("10-25-2008");
 $m4is_oa_z = $app->payPlan($m4is_c4lk, $m4is_sbpe, $m4is__4en6o, $m4is_cxre, $m4is_vvyf, $m4is_sxmbp, $m4is_a0uev7, $payplan_initial_date, $payplan_startdate, $m4is__wf6qy, $m4is_grx0);
 } if ($m4is_i7zkhx) { $ret = $this->m4is_zw_n()->recalculateTax($m4is_c4lk);
 } $m4is_oa_z = $this->m4is_zw_n()->chargeInvoice($m4is_c4lk, 'Memberium API Order', $m4is__4en6o, $m4is_cxre, false );
 if (in_array(strtolower($m4is_oa_z['Code']), ['approved', 'skipped']) ) {  $m4is_oa_z = $m4is_c4lk;
 if ($success_action > '') { $this->m4is_u86vzq($m4is_kl95, $m4is_e2kg);
 } if ($success_goals > '') { $this->m4is_cqe6_($m4is_kinf1, $m4is_e2kg);
 } if ($success_tags > '') { $this->m4is_tcle75($m4is_bfljdr, $m4is_e2kg);
 } } else { if ($m4is_sfqk_ && $m4is_c4lk > 0) { $this->m4is_zw_n()->deleteInvoice($m4is_c4lk);
 }  if ($m4is_y7y2 > '') { $this->m4is_u86vzq($fail_action, $m4is_e2kg);
 } if ($m4is_kv49s > '') { $this->m4is_cqe6_($fail_goals, $m4is_e2kg);
 } if ($m4is_hiu6 > '') { $this->m4is_tcle75($fail_tags, $m4is_e2kg);
 } $m4is_oa_z = false;
 } $this->m4is_leu58($m4is_e2kg);
 } 
function m4is_wgpyh($m4is_w2w8) { $m4is__8htld = false;
 $m4is_pa8jw = (int) $m4is_w2w8['affiliate_id'];
 $m4is_e2kg = (int) $m4is_w2w8['contact_id'];
 $m4is__4en6o = (int) $m4is_w2w8['creditcard_id'];
 $m4is__a13 = (boolean) $m4is_w2w8['delete_failures'];
 $m4is_cxre = (int) $m4is_w2w8['merchant_id'];
 $m4is_q6k3i = (int) $m4is_w2w8['plan_id'];
 $m4is_e2ra5 = (double) $m4is_w2w8['price'];
 $m4is_i7hqn = (int) $m4is_w2w8['quantity'];
 $m4is_i7zkhx = (boolean) $m4is_w2w8['taxable'];
 $m4is_rynmq = (int) $m4is_w2w8['trial_days'];
 if ($m4is_e2kg < 1 || $m4is_q6k3i < 1 || $m4is_i7hqn < 1 || $m4is_cxre < 1 || $m4is__4en6o < 1 || $m4is_e2ra5 < 0 || $m4is_a6sgq < 0 || $m4is_ya06wt < 0) { $m4is_haon5 = false;
 } else { $m4is_haon5 = true;
 } if ($m4is_haon5) { $m4is_d9ybqg = (int) $this->m4is_zw_n()->addRecurringAdv($m4is_e2kg, $m4is_q6k3i, $m4is_i7hqn, $m4is_e2ra5, $m4is_i7zkhx, $m4is_cxre, $m4is__4en6o, $m4is_pa8jw, $m4is_rynmq);
 if ($m4is_d9ybqg > 0) { if ($m4is_rynmq == 0) { $m4is_c4lk = $this->m4is_zw_n()->recurringInvoice($m4is_d9ybqg);
 $m4is_oa_z = $this->m4is_zw_n()->chargeInvoice($m4is_c4lk, 'Memberium Subscription Payment', $m4is__4en6o, $m4is_cxre, false);
 if (in_array(strtolower($m4is_oa_z['Code']), ['approved', 'skipped'] ) ) { $m4is__8htld = true;
 } else { if ($m4is__a13) { $this->m4is_zw_n()->deleteSubscription($m4is_d9ybqg);
 } } } else { $m4is__8htld = true;
 } } } else { } if (! $m4is__8htld) { return false;
 } else { return $m4is_d9ybqg;
 } }     
function m4is_lrtqe8( $m4is_zc_qlk, $m4is_ig9p6 = false, $m4is_yh5y = false ) { if ( empty( $m4is_zc_qlk ) ) { return;
 } if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! is_array($m4is_zc_qlk) ) { $m4is_zc_qlk = array_filter( explode( ',', trim( $m4is_zc_qlk ) ) );
 } $m4is_zc_qlk = array_filter(array_map('strtolower', $m4is_zc_qlk) );
 if ( empty( $m4is_zc_qlk ) ) { return;
 } if (! $m4is_ig9p6) { $m4is_ig9p6 = get_current_user_id();
 } if ($m4is_ig9p6 < 1) { return;
 } $m4is_xs4me_ = get_user_meta($m4is_ig9p6, 'memberium_tokens', true);
 if (! $m4is_xs4me_) { $m4is_xs4me_ = [];
 } $m4is_xs4me_ = array_filter(array_map('strtolower', $m4is_xs4me_) );
 foreach ($m4is_zc_qlk as $m4is_ejhbmn) { if (substr($m4is_ejhbmn, 0, 1) === '-') { $m4is_ejhbmn = substr($m4is_ejhbmn, 1);
 $m4is_s2ge5 = array_search($m4is_ejhbmn, $m4is_xs4me_);
 unset($m4is_xs4me_[$m4is_s2ge5]);
 do_action('memb_remove_token', $m4is_ig9p6, $m4is_ejhbmn);
 } else { $m4is_xs4me_[] = $m4is_ejhbmn;
 do_action('memb_add_token', $m4is_ig9p6, $m4is_ejhbmn);
 } } $m4is_xs4me_ = array_unique($m4is_xs4me_);
 update_user_meta($m4is_ig9p6, 'memberium_tokens', $m4is_xs4me_);
 } 
function m4is_w3ilk($m4is_zc_qlk, $m4is_ig9p6 = false) { if (current_user_can('manage_options') ) { return true;
 }  if (! m4is_u68pu::m4is_i9k3m() ) { return false;
 } if (! $m4is_ig9p6) { $m4is_ig9p6 = get_current_user_id();
 } if ($m4is_ig9p6 < 1) { return;
 } $m4is_zc_qlk = array_filter(array_map('strtolower', explode(',', trim($m4is_zc_qlk) ) ) );
 $m4is_xs4me_ = get_user_meta($m4is_ig9p6, 'memberium_tokens', true);
 if (! $m4is_xs4me_) { $m4is_xs4me_ = [];
 } $m4is_xs4me_ = array_filter(array_map('strtolower', $m4is_xs4me_) );
 if (count(array_intersect($m4is_zc_qlk, $m4is_xs4me_) ) ) { return true;
 } return false;
 }     
function m4is_efrv1($m4is_koi38, $m4is_xozjum){ $m4is_qh8p6 = $this->m4is_oiewvu('memberships');
 $m4is_qh8p6 = is_array($m4is_qh8p6) ? $m4is_qh8p6 : [];
 return $m4is_qh8p6;
 }  
function m4is_zk1pv7( $m4is_e2kg, $m4is_iystd2 ) { global $wpdb;
 $m4is_e2kg = (int) $m4is_e2kg;
 if (is_int($m4is_iystd2) || is_string($m4is_iystd2) ) { $m4is_iystd2 = explode(',', $m4is_iystd2);
 }  foreach ($m4is_iystd2 as $m4is_mpia) { if ( (int) $m4is_mpia > 0) { $this->m4is_zw_n()->grpAssign($m4is_e2kg, (int) $m4is_mpia);
 $this->m4is_m3vz($m4is_e2kg);
 } else { $this->m4is_se2n8()->grpRemove($m4is_e2kg, (int) abs($m4is_mpia) );
 $this->m4is_m3vz($m4is_e2kg);
 } } if (isset($_SESSION['memb_user']['user_id']) && $_SESSION['memb_user']['user_id'] == $m4is_e2kg) { $m4is_osrq6 = explode(',', $_SESSION['memb_user']['tags']);
 foreach ($m4is_iystd2 as $m4is_mpia) { if ($m4is_mpia > 0) { $m4is_osrq6[] = $m4is_mpia;
 } else { $m4is_mpia = (int) abs($m4is_mpia);
 unset($m4is_osrq6[$m4is_mpia]);
 } } $_SESSION['memb_user']['tags'] = implode(',', $m4is_osrq6);
 $wpdb->query("REPLACE INTO `" . MEMBERIUM_DB_CONTACTS ."` SET `value`='' WHERE `id` = {$m4is_e2kg} AND `appname` = `{$this->i2sdk_options['app_name']}` ");
 $this->m4is_m3vz($m4is_e2kg);
 $this->disable_login_redirect = TRUE;
 if (m4is_wbc8os::m4is_jjgo() == $m4is_e2kg) { $_SESSION = $this->m4is_akz3();
 } else { $this->m4is_akz3();
 } } }    
function m4is_yi52($m4is_zeos) { $m4is_zeos = (int) $m4is_zeos;
 $m4is_q_ob6 = 'memberium::email_template::' . $m4is_zeos;
  $m4is_ks1fj2 = get_transient($m4is_q_ob6);
 if ($m4is_ks1fj2 === false) { $m4is_ks1fj2 = $this->m4is_zw_n()->getEmailTemplate($m4is_zeos);
 if (is_array($m4is_ks1fj2) ) { set_transient($m4is_q_ob6, $m4is_ks1fj2, DAY_IN_SECONDS);
 } else { $m4is_ks1fj2 = false;
 } } return $m4is_ks1fj2;
 } 
function m4is_ozg73($m4is_ks1fj2) { }      
function m4is_jstm1() { }    
function m4is_lmbz($m4is_e2kg, $m4is_iystd2 = '', $m4is_kzkrv1 = '', $m4is_w5rnb = '', $m4is_zq0k = false, $m4is_usfwlq = false, $m4is_yh5y = false) { if (! empty($m4is_w5rnb) ) { $this->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg, $m4is_zq0k);
 } if (! empty($m4is_kzkrv1) ) { $this->m4is_u86vzq($m4is_kzkrv1, $m4is_e2kg);
 } if (! empty($m4is_iystd2) ) { $this->m4is_tcle75($m4is_iystd2, $m4is_e2kg, $m4is_usfwlq, $m4is_yh5y);
 } } 
function m4is_i2tp1($m4is_e2kg = 0, $m4is_oa_j2 = []) { $m4is_r6nh_b = [ 'actionsets' => '', 'api_goals' => '', 'tags' => '', 'full_update' => false, 'debug' => false, 'appname' => false, ];
 $m4is_oa_j2 = wp_parse_args($m4is_oa_j2, $m4is_r6nh_b);
 do_action('memberium/do_actions_before', $m4is_e2kg, $m4is_oa_j2);
 if ($m4is_e2kg) { if (! empty($m4is_oa_j2['tags']) ) { $this->m4is_tcle75($m4is_oa_j2['tags'], $m4is_e2kg, $m4is_usfwlq, $m4is_yh5y);
 } if (! empty($m4is_oa_j2['actionsets']) ) { $this->m4is_u86vzq($m4is_oa_j2['actionsets'], $m4is_e2kg);
 } if (! empty($m4is_oa_j2['api_goals']) ) { $this->m4is_cqe6_($m4is_oa_j2['api_goals'], $m4is_e2kg, $m4is_zq0k);
 } } do_action('memberium/do_actions_after', $m4is_e2kg, $m4is_oa_j2);
 } 
function m4is_cqe6_($m4is_w5rnb = '', $m4is_e2kg = false, $m4is_zq0k = false) { if (empty($m4is_w5rnb) ) { return;
 } if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } $m4is_e2kg = (int) $m4is_e2kg;
 if ($m4is_e2kg < 1) { return;
 } if (! $m4is_zq0k) { $m4is_zq0k = $this->m4is_d14zr('appname');
 } if (! is_array($m4is_w5rnb) ) { $m4is_w5rnb = array_filter(explode(',', $m4is_w5rnb) );
 } $this->m4is_gzdfm();
 $m4is_mdx84 = false;
 foreach ($m4is_w5rnb as $m4is_xf9b) { if ($m4is_xf9b > '') { $m4is_oa_z = m4is_ho3l::m4is_xy3j($m4is_e2kg, $m4is_xf9b, $m4is_zq0k);
 $m4is_mdx84 = (boolean) ($m4is_oa_z[0]['success'] == 1);
 } } if ($m4is_mdx84) { $this->m4is_m3vz($m4is_e2kg);
 } } 
function m4is_rldxj3($m4is_q1ojyb, $m4is_e2kg = false) { if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } $m4is_e2kg = (int) $m4is_e2kg;
 if ($m4is_e2kg < 1) { return;
 } if (! is_array($m4is_q1ojyb) ) { $m4is_q1ojyb = array_filter(explode(',', $m4is_q1ojyb) );
 } foreach ($m4is_q1ojyb as $fus_id) { if ($fus_id > 0) { $this->m4is_zw_n()->campAssign($m4is_e2kg, $fus_id);
 } } } 
function m4is_kvu8_($fus_ids, $m4is_e2kg = false) { if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } $m4is_e2kg = (int) $m4is_e2kg;
 if ($m4is_e2kg < 1) { return;
 } if (! is_array($m4is_q1ojyb) ) { $m4is_q1ojyb = array_filter(explode(',', $m4is_q1ojyb) );
 } foreach ($m4is_q1ojyb as $m4is_k2lwb7) { if ($m4is_k2lwb7 > 0) { $this->m4is_zw_n()->campPause($m4is_e2kg, $m4is_k2lwb7);
 } } } 
function m4is_u86vzq($m4is_kzkrv1, $m4is_e2kg = false) { if (empty($m4is_kzkrv1) ) { return;
 } if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } $m4is_e2kg = (int) $m4is_e2kg;
 if ($m4is_e2kg < 1) { return;
 } if (! is_array($m4is_kzkrv1) ) { $m4is_kzkrv1 = array_filter(explode(',', $m4is_kzkrv1) );
 }   $this->m4is_gzdfm();
 $m4is_mdx84 = false;
 foreach ($m4is_kzkrv1 as $m4is_rrny) { $m4is_rrny = (int) $m4is_rrny;
 if ($m4is_rrny > 0) { $m4is_xm2h = m4is_tvc2xn::m4is_znq_1($m4is_e2kg, (int) $m4is_rrny);
 if (is_array($m4is_xm2h) ) { foreach ($m4is_xm2h as $m4is_oa_z) { if (strtolower($m4is_oa_z['Message']) <> 'nothing to do') { $m4is_mdx84 = true;
 } } unset($m4is_oa_z);
 } } }  if ($m4is_mdx84) { $this->m4is_leu58($this->m4is_dpuy9() );
 $this->m4is_m3vz($this->m4is_dpuy9() );
 if (m4is_wbc8os::m4is_jjgo() == $m4is_e2kg) { $_SESSION = $this->m4is_akz3();
 } else { $this->m4is_akz3();
 } } return $m4is_xm2h;
 } 
function m4is_yfn9($m4is_q1ojyb, $m4is_e2kg = false) { if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } $m4is_e2kg = (int) $m4is_e2kg;
 if ($m4is_e2kg < 1) { return;
 } if (! is_array($m4is_q1ojyb) ) { $m4is_q1ojyb = array_filter(explode(',', $m4is_q1ojyb) );
 } foreach ($m4is_q1ojyb as $m4is_k2lwb7) { if ($m4is_k2lwb7 > 0) { $this->m4is_zw_n()->campRemove($m4is_e2kg, $m4is_k2lwb7);
 } } } 
function m4is_tcle75( $m4is_iystd2 = '', $m4is_e2kg = false, $m4is_usfwlq = false, $m4is_yh5y = false ) { global $wpdb;
 if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_e2kg) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } if ($m4is_e2kg < 1) { return;
 } if (! is_array($m4is_iystd2) ) { $m4is_iystd2 = array_filter(explode(',', $m4is_iystd2) );
 } if (count($m4is_iystd2) == 0) { return;
 } $m4is_iystd2 = array_unique( m4is_pwtg7::m4is_rk2s( $m4is_iystd2 ) );
  if( count($m4is_iystd2) > 1 ){ if( ( $this->m4is_oiewvu('settings', 'beta/oauth') == 1 ) && $this->m4is_se2n8()->isRestAvailable() ){ return $this->m4is_go68( $m4is_iystd2, $m4is_e2kg );
 } } $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_mdx84 = false;
 $m4is_vwdb4 = [];
 $m4is_zyjs6 = ($m4is_e2kg == m4is_wbc8os::m4is_jjgo() );
 $this->m4is_gzdfm();
  if ($m4is_zyjs6 && (m4is_wbc8os::m4is_sfnmc('groups') > '') ) { $m4is_vwdb4 = array_flip(array_filter(explode(',', m4is_wbc8os::m4is_sfnmc('groups') ) ) );
 } else { $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( $m4is_e2kg, true );
 $m4is_vwdb4 = isset( $m4is_p9r_8e['groups'] ) ? array_flip( array_filter( explode( ',', $m4is_p9r_8e['groups'] ) ) ) : [];
 } foreach ($m4is_iystd2 as $m4is_mpia) { $m4is_mpia = (int) $m4is_mpia;
 if ($m4is_mpia < 0) { $m4is_ndufnm = abs($m4is_mpia);
 $m4is_oa_z = $this->m4is_zw_n()->grpRemove($m4is_e2kg, $m4is_ndufnm);
 if ($m4is_oa_z) { $m4is_mdx84 = true;
 unset($m4is_vwdb4[$m4is_ndufnm]);
 } if ($this->m4is_oiewvu( 'settings', 'sync_tag_details' ) == 1) { $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_CONTACTTAGS . '` WHERE `contactid` = %d AND `tagid` = %d AND `appname` = %s ;';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg, abs($m4is_mpia), $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 };
 do_action('memb_remove_tag', $m4is_e2kg, abs($m4is_mpia) );
 do_action('memberium/tag/remove', $m4is_e2kg, abs($m4is_ndufnm) );
 } elseif ($m4is_mpia > 0) { $m4is_oa_z = $this->m4is_zw_n()->grpAssign($m4is_e2kg, $m4is_mpia);
 if ($m4is_oa_z) { $m4is_vwdb4[ $m4is_mpia ] = ! empty($m4is_vwdb4) ? max($m4is_vwdb4) + 1 : 1;
 $m4is_mdx84 = true;
 } if ($this->m4is_oiewvu('settings', 'sync_tag_details') == 1) { $m4is_tovizk = 'INSERT IGNORE INTO `' . MEMBERIUM_DB_CONTACTTAGS . '` (`appname`, `contactid`, `tagid`) VALUES (%s, %d, %d);';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_e2kg, abs($m4is_mpia) );
 $wpdb->query($m4is_tovizk);
 };
 do_action('memb_add_tag', $m4is_e2kg, $m4is_mpia);
 do_action('memberium/tag/assign', $m4is_e2kg, $m4is_mpia);
 } } $m4is_vwdb4 = array_flip($m4is_vwdb4);
 sort($m4is_vwdb4);
 $m4is_vwdb4 = implode(',', $m4is_vwdb4);
  $m4is_tovizk = 'UPDATE `' . MEMBERIUM_DB_CONTACTS . '` SET `value` = %s WHERE `id` = %d AND `appname` = %s AND `fieldname` = "Groups";';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_vwdb4, $m4is_e2kg, $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 $this->m4is_m3vz($m4is_e2kg);
 if ( $m4is_zyjs6 ) { $_SESSION = $this->m4is_akz3();
 } else { $this->m4is_akz3();
 }  } 
function m4is_go68( array $m4is_iystd2, int $m4is_e2kg = 0 ){ if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if( empty($m4is_iystd2) ){ return false;
 } if ( empty($m4is_e2kg) ) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } if ($m4is_e2kg < 1) { return;
 } $m4is_xm2h = $this->m4is_se2n8()->addRemoveContactTags($m4is_e2kg, $m4is_iystd2);
 if( empty($m4is_xm2h) || ! is_array($m4is_xm2h) || is_wp_error($m4is_xm2h) ){ return;
 } $m4is_laue15 = !empty($m4is_xm2h['add']) && !empty($m4is_xm2h['add']['SUCCESS']) ? $m4is_xm2h['add']['SUCCESS'] : false;
 $m4is_x8vzt = !empty($m4is_xm2h['remove']) && !empty($m4is_xm2h['remove']['SUCCESS']) ? $m4is_xm2h['remove']['SUCCESS'] : false;
 if( ! $m4is_laue15 && ! $m4is_x8vzt ){ return;
 } global $wpdb;
 $m4is_mdz7 = ( $this->m4is_oiewvu('settings', 'sync_tag_details') == 1 );
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_mdx84 = false;
 $m4is_vwdb4 = [];
 $m4is_zyjs6 = ($m4is_e2kg == m4is_wbc8os::m4is_jjgo() );
 $this->m4is_gzdfm();
  if ($m4is_zyjs6 && (m4is_wbc8os::m4is_sfnmc('groups') > '') ) { $m4is_vwdb4 = array_flip(array_filter(explode(',', m4is_wbc8os::m4is_sfnmc('groups') ) ) );
 } else { $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol($m4is_e2kg, true);
 $m4is_vwdb4 = array_flip(array_filter(explode(',', $m4is_p9r_8e['groups']) ) );
 }  if( $m4is_laue15 ){ foreach ($m4is_laue15 as $m4is_ndufnm) { if( ! array_key_exists($m4is_ndufnm, $m4is_vwdb4) ){ if( $m4is_mdz7 ){ $m4is_tovizk = 'INSERT IGNORE INTO `' . MEMBERIUM_DB_CONTACTTAGS . '` (`appname`, `contactid`, `tagid`) VALUES (%s, %d, %d);';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_e2kg, $m4is_ndufnm );
 $wpdb->query($m4is_tovizk);
 } $m4is_vwdb4[ $m4is_ndufnm ] = ! empty($m4is_vwdb4) ? max($m4is_vwdb4) + 1 : 1;
 $m4is_mdx84 = true;
 do_action('memb_add_tag', $m4is_e2kg, $m4is_ndufnm);
 do_action('memberium/tag/assign', $m4is_e2kg, $m4is_mpia);
 } } } unset($m4is_laue15);
  if( $m4is_x8vzt ){ foreach ($m4is_x8vzt as $m4is_ndufnm) { if( array_key_exists($m4is_ndufnm, $m4is_vwdb4) ){ if( $m4is_mdz7 ){ $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_CONTACTTAGS . '` WHERE `contactid` = %d AND `tagid` = %d AND `appname` = %s ;';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg, $m4is_ndufnm, $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 } unset($m4is_vwdb4[ $m4is_ndufnm ]);
 $m4is_mdx84 = true;
 do_action('memb_remove_tag', $m4is_e2kg, $m4is_ndufnm);
 do_action('memberium/tag/remove', $m4is_e2kg, $m4is_ndufnm);
 } } } unset($m4is_x8vzt);
  if ( $m4is_mdx84 ) { $m4is_vwdb4 = array_flip($m4is_vwdb4);
 sort($m4is_vwdb4);
 $m4is_vwdb4 = implode(',', $m4is_vwdb4);
 $m4is_tovizk = 'UPDATE `' . MEMBERIUM_DB_CONTACTS . '` SET `value` = %s WHERE `id` = %d AND `appname` = %s AND `fieldname` = "Groups";';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_vwdb4, $m4is_e2kg, $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 $this->m4is_m3vz($m4is_e2kg);
  if ($m4is_zyjs6) { $_SESSION = $this->m4is_akz3();
 } else { $this->m4is_akz3();
 } } return;
 } 
function m4is_b3iq( array $m4is_z59dj, int $m4is_ndufnm ){ if (! m4is_u68pu::m4is_i9k3m() ) { return false;
 } if( empty($m4is_z59dj) || empty($m4is_ndufnm) ){ return false;
 } $m4is_v6fdv4 = $m4is_ndufnm < 0 ? 'remove' : 'add';
 $m4is_xm2h = $this->m4is_se2n8()->addRemoveTagContacts($m4is_z59dj, $m4is_ndufnm);
 $m4is_ndufnm = abs($m4is_ndufnm);
 if( empty($m4is_xm2h) || ! array_key_exists($m4is_ndufnm, $m4is_xm2h) ){ return false;
 } $m4is_xm2h = $m4is_xm2h[$m4is_ndufnm];
 if( empty($m4is_xm2h['SUCCESS']) ){ return false;
 } global $wpdb;
 $m4is_mdz7 = ( $this->m4is_oiewvu('settings', 'sync_tag_details') == 1 );
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_kqkbu = m4is_bnrdbo::m4is_b0i8kq($m4is_xm2h['SUCCESS']);
  foreach ($m4is_xm2h['SUCCESS'] as $m4is_e2kg) { $m4is_mdx84 = false;
 $m4is_vwdb4 = array_key_exists($m4is_e2kg, $m4is_kqkbu) ? $m4is_kqkbu[$m4is_e2kg]->value : '';
 $m4is_vwdb4 = empty($m4is_vwdb4) ? [] : array_flip(array_filter(explode(',', $m4is_vwdb4) ) );
  if( $m4is_v6fdv4 === 'add' ){ if( ! array_key_exists($m4is_ndufnm, $m4is_vwdb4) ){ if( $m4is_mdz7 ){ $m4is_tovizk = 'INSERT IGNORE INTO `' . MEMBERIUM_DB_CONTACTTAGS . '` (`appname`, `contactid`, `tagid`) VALUES (%s, %d, %d);';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_e2kg, $m4is_ndufnm );
 $wpdb->query($m4is_tovizk);
 } $m4is_vwdb4[ $m4is_ndufnm ] = ! empty($m4is_vwdb4) ? max($m4is_vwdb4) + 1 : 1;
 $m4is_mdx84 = true;
 do_action('memb_add_tag', $m4is_e2kg, $m4is_ndufnm);
 do_action('memberium/tag/assign', $m4is_e2kg, $m4is_mpia);
 } }  else{ if( array_key_exists($m4is_ndufnm, $m4is_vwdb4) ){ if( $m4is_mdz7 ){ $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_CONTACTTAGS . '` WHERE `contactid` = %d AND `tagid` = %d AND `appname` = %s ;';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_e2kg, $m4is_ndufnm, $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 } unset($m4is_vwdb4[ $m4is_ndufnm ]);
 $m4is_mdx84 = true;
 do_action('memb_remove_tag', $m4is_e2kg, $m4is_ndufnm);
 do_action('memberium/tag/remove', $m4is_e2kg, $m4is_ndufnm);
 } }  if( $m4is_mdx84 ){ $m4is_vwdb4 = array_flip($m4is_vwdb4);
 sort($m4is_vwdb4);
 $m4is_vwdb4 = implode(',', $m4is_vwdb4);
 $m4is_tovizk = 'UPDATE `' . MEMBERIUM_DB_CONTACTS . '` SET `value` = %s WHERE `id` = %d AND `appname` = %s AND `fieldname` = "Groups";';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_vwdb4, $m4is_e2kg, $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 $this->m4is_m3vz($m4is_e2kg);
 } } return $m4is_xm2h;
 }    
function m4is_b0952z() { $m4is_yq74pt = $this->m4is_cpzm75();
 foreach ($m4is_yq74pt as $m4is_auoz) { $m4is_e2kg = 0;
 if (! empty($m4is_auoz['data']['contact_id']) ) { $m4is_e2kg = (int) $m4is_auoz['data']['contact_id'];
 } else { $m4is_j5sy07 = (int) $m4is_auoz['data']['recurringorder_id'];
 if ($m4is_j5sy07 > 0) { $m4is_w_8g = ['ContactId'];
 $m4is_ke_fr = $this->m4is_zw_n()->dsLoad('RecurringOrder', $m4is_j5sy07, $m4is_w_8g);
 if (is_array($m4is_ke_fr) ) { $m4is_e2kg = (int) $m4is_ke_fr['ContactId'];
 } } } if ($m4is_e2kg > 0) { if ($m4is_auoz['actiontype'] == 'achievegoal') { $m4is_xf9b = $m4is_auoz['data']['end_goal'];
 m4is_ho3l::m4is_xy3j($m4is_e2kg, $m4is_xf9b, $m4is_auoz['appname']);
 $this->m4is_t5q0($m4is_auoz);
 } elseif ($m4is_auoz['actiontype'] == 'actionset') { $m4is_rrny = (int) $m4is_auoz['data']['end_action'];
 m4is_tvc2xn::m4is_znq_1( $m4is_e2kg, $m4is_rrny );
 $this->m4is_t5q0($m4is_auoz);
 } elseif ($m4is_auoz['actiontype'] == 'settags') { } elseif ($m4is_auoz['actiontype'] == 'sendemail') { } } } } 
function m4is_i7lmig($m4is_zv2ly, $m4is_yldm, $m4is_etj2) { global $wpdb;
 $m4is_zq0k = $this->m4is_d14zr('appname');
 $m4is_zv2ly = strtolower(trim($m4is_zv2ly) );
 $m4is_lq7v = strtotime($m4is_yldm);
 $m4is_tovizk = 'INSERT INTO `' . MEMBERIUM_DB_QUEUE . '` (`pidlock`, `appname`, `actiontype`, `scheduled`, `data`) VALUES (-1, %s, %s, %s, %s);';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_zv2ly, $m4is_yldm, json_encode($m4is_etj2) );
 $wpdb->query($m4is_tovizk);
 $m4is_j5sy07 = $wpdb->insert_id;
 return $m4is_j5sy07;
 } 
function m4is_cpzm75() { global $wpdb;
 $m4is_zq0k = $this->m4is_d14zr('appname');
  $m4is_w_me = mt_rand( 1000000, 9999999 );
 $m4is_tovizk = 'UPDATE `' . MEMBERIUM_DB_QUEUE . '` SET `pidlock` = %d WHERE `appname`= %s AND `scheduled` <= NOW() AND `pidlock` < 1 ;';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_w_me, $m4is_zq0k);
 $wpdb->query($m4is_tovizk);
 $m4is_tovizk = 'SELECT * FROM `' . MEMBERIUM_DB_QUEUE . '` WHERE `pidlock` = %d AND `appname`= %s ;';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_w_me, $m4is_zq0k);
 $m4is_gn7e = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 foreach ($m4is_gn7e as $m4is_s2ge5 => $m4is_w_o7al) { $m4is_etj2 = json_decode($m4is_w_o7al['data'], true);
 if ($m4is_etj2) { $m4is_gn7e[$m4is_s2ge5]['data'] = $m4is_etj2;
 } } return $m4is_gn7e;
 } 
function m4is_t5q0($m4is_auoz) { $m4is_j5sy07 = (int) $m4is_auoz['id'];
 if ($m4is_j5sy07) { global $wpdb;
 $m4is_tovizk = 'DELETE FROM `' . MEMBERIUM_DB_QUEUE . '` WHERE `id` = %d and `appname` = %s;';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_auoz['id'], $m4is_auoz['appname']);
 $wpdb->query($m4is_tovizk);
 } }    
function m4is_ywm48($m4is_t5ot4, $m4is_w_o7al = 1) { $m4is_t5ot4 = trim($m4is_t5ot4);
 if (empty($m4is_t5ot4) ) { return false;
 } global $wpdb;
 $m4is_tovizk = '';
 return false;
 }    
function m4is_k_2ck() { $m4is_oa_j2 = unserialize(base64_decode($_POST['payload']) );
 $m4is_e2kg = (int) $m4is_oa_j2['contact_id'];
 $m4is_iystd2 = $m4is_oa_j2['tag_id'];
 $m4is_w5rnb = $m4is_oa_j2['goals'];
 $m4is_kzkrv1 = $m4is_oa_j2['action_id'];
 $m4is_k1k7oj = '';
  if ($m4is_iystd2 > '') { $this->m4is_zk1pv7($m4is_e2kg, $m4is_iystd2);
 } if ($m4is_kzkrv1 > '') { $this->m4is_u86vzq($m4is_e2kg, $m4is_kzkrv1);
 } if ($m4is_w5rnb > '') { $this->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg);
 } $this->m4is_leu58($m4is_e2kg);
 die();
 } 
function m4is_aerbyl($m4is_ig4pl, $precision = 2) { $m4is_l2qnzu = ['B', 'KB', 'MB', 'GB', 'TB'];
 $m4is_ig4pl = max($m4is_ig4pl, 0);
 $m4is_nsp8u5 = floor( ($m4is_ig4pl ? log($m4is_ig4pl) : 0) / log(1024) );
 $m4is_nsp8u5 = min($m4is_nsp8u5, count($m4is_l2qnzu) - 1);
 $m4is_ig4pl /= (1 << (10 * $m4is_nsp8u5) );
 return round($m4is_ig4pl, $precision) . ' ' . $m4is_l2qnzu[$m4is_nsp8u5];
 }    
function m4is_l03w7( $m4is_t5ot4 = '' ) { $m4is_t5ot4 = strtolower(trim($m4is_t5ot4) );
 $m4is_gvpi6 = false;
 $m4is_toz0 = $this->m4is_oiewvu( 'remote_files' );
 if ($m4is_t5ot4) { if (array_key_exists($m4is_t5ot4, $m4is_toz0) ) { $m4is_gvpi6 = $m4is_toz0[$m4is_t5ot4];
 $m4is_r6nh_b = [ 'region' => 'us-east-1', ];
 $m4is_gvpi6 = wp_parse_args($m4is_gvpi6, $m4is_r6nh_b);
 } } return $m4is_gvpi6;
 }        
function m4is_xi1t28() {  } 
function m4is_v1ajw() { $m4is_dj_2 = 'SavedFilter';
 $m4is_de8nwt = [];
 $m4is_y_38pw = 1000;
 $m4is_couz = 0;
 $m4is__u5v = m4is_ho3l::m4is_kjedy2('SavedFilter');
 $m4is_jo8fb = [ 'ReportStoredName' => 'AffiliateActivitySummary', ];
 do { $m4is_hpn9y = m4is_ho3l::m4is_mg4uyc($m4is_dj_2, $m4is_y_38pw, $m4is_couz, $m4is_jo8fb, $m4is__u5v);
 foreach($m4is_hpn9y as $m4is_ke_fr) { $m4is_de8nwt[$m4is_ke_fr['Id']] = [ 'UserId' => (int) $m4is_ke_fr['UserId'], 'FilterName' => $m4is_ke_fr['FilterName'], ];
 } $m4is_couz++;
 } while (count($m4is_hpn9y) >= $m4is_y_38pw);
 unset($m4is_hpn9y, $m4is_ke_fr, $m4is_couz, $m4is_y_38pw, $m4is_dj_2, $m4is__u5v, $m4is_jo8fb);
 if (count($m4is_de8nwt) == 1) { } return $m4is_de8nwt;
 } 
function m4is_w2ah($m4is_e2kg = 0, $m4is_wdjmn = 'first') { } 
function m4is_tud7($m4is_e2kg, $m4is_yxwn) { if (! $m4is_e2kg || empty($m4is_yxwn) ) { return;
 } $m4is_yxwn = strtolower($m4is_yxwn);
 $session_contact_id = m4is_wbc8os::m4is_jjgo();
 $m4is_oa_z = '';
 if ($m4is_e2kg == $session_contact_id) { $m4is_oa_z = m4is_wbc8os::m4is_sfnmc($m4is_yxwn);
 } else { $m4is_ig9p6 = m4is_bnrdbo::m4is_d3na($m4is_e2kg);
 $m4is_mdqgk = $this->m4is_akz3($m4is_ig9p6);
 $m4is_oa_z = isset($m4is_mdqgk['keap']['contact'][$m4is_yxwn]) ? $m4is_mdqgk['keap']['contact'][$m4is_yxwn] : '';
 } return $m4is_oa_z;
 }    
function m4is_by8c( $m4is_p7_q, $m4is_vg0jw, $m4is_ig9p6 ) { $m4is_isrh = (bool) $this->m4is_oiewvu('settings', 'persistent_login');
 if ($m4is_isrh) { if (! user_can($m4is_ig9p6, 'manage_options')) { $m4is_tpmkx = $m4is_isrh ? 1 * MONTH_IN_SECONDS : 3 * DAY_IN_SECONDS;
 $m4is_p7_q = $m4is_tpmkx;
 } else { $m4is_tpmkx = YEAR_IN_SECONDS;
 } } return $m4is_p7_q;
 } 
function m4is_chen7( array $m4is_r6nh_b ) { if (! $m4is_r6nh_b['value_remember']) { if ($this->m4is_oiewvu('settings', 'persistent_login') ) { $m4is_r6nh_b['value_remember'] = true;
 } } return $m4is_r6nh_b;
 } 
function m4is_uhgr() { if ( $this->m4is_oiewvu( 'settings', 'persistent_login' ) ) { echo '<input type="hidden" name="rememberme" value="on" />';
 } }  
function m4is_z5uz3( $m4is_j485e, $m4is_vg0jw = 0, $m4is_rbftse = true, $m4is_pyz8ix = true ) { if ($this->m4is_oiewvu('settings', 'password_field') == 'Password') { $m4is_j485e = substr($m4is_j485e, 0, 20);
 } return $m4is_j485e;
 } private 
function m4is_rrapgd() { if ( headers_sent() ) { return;
 } $m4is_bu7y = $this->m4is_oiewvu( 'settings', 'version', $this->m4is_u04m() );
 $m4is_lxh8 = $this->m4is_oiewvu( 'settings', 'disable_xframe', false );
 header( 'X-Powered-By: Memberium ' . $m4is_bu7y, false );
 if (! $m4is_lxh8) { header('X-Frame-Options: SAMEORIGIN');
 } } private 
function m4is_v_sab0() { add_action('clear_auth_cookie', ['m4is_ypvg9', 'm4is_hp8bu']);
 add_action('wp_authenticate', ['m4is_ypvg9', 'm4is__tje'], 10);
 add_action('wp_authenticate', ['m4is_ypvg9', 'm4is_n_3i5'], 1);
 add_action('wp_login', ['m4is_ypvg9', 'm4is_p9pxq'], 900, 2);
  add_action('wp_login', ['m4is_ypvg9', 'm4is_fx4ly'], 20, 2);
 add_filter('authenticate', ['m4is_ypvg9', 'm4is_kvoe'], 10, 3);
 add_filter('authenticate', ['m4is_ypvg9', 'm4is_lv4fel'], 10, 3);
 add_filter('authenticate', ['m4is_ypvg9', 'm4is__ik7lz'], 100, 3);
 add_filter('authenticate', ['m4is_ypvg9', 'm4is_ce_f'], -10, 3);
  add_filter('authenticate', ['m4is_ypvg9', 'm4is_xnl5'], -15, 3);
 add_filter('login_form_defaults', [$this, 'm4is_chen7']);
 add_filter('login_redirect', ['m4is_ypvg9', 'm4is_nrfm'], 999999, 3);
 add_filter('login_url', [$this, 'm4is_zljisd'], 999999, 3);
 add_filter('wp_login', ['m4is_ypvg9', 'm4is_xjafo'], PHP_INT_MAX);
  add_filter('authenticate', ['m4is_ypvg9', 'm4is_hdpc'], -1000, 3);
 add_filter('login_form_bottom', ['m4is_ypvg9', 'm4is_dow7at'], 10, 2);
 add_action('login_form', ['m4is_ypvg9', 'm4is_dow7at']);
 } private 
function m4is_k_fr5() { $m4is_mb6gy = time() - 300;
 $m4is_yq74pt = [ 'memberium_maintenance' => 'hourly', 'memberium/contacts/makepass_scan' => '3min', ];
 foreach($m4is_yq74pt as $m4is_auoz => $m4is_o1dz) { $m4is_n260nx = time() + mt_rand(600,900);
 $m4is_q2dm = (int) wp_next_scheduled($m4is_auoz);
 if ($m4is_q2dm < $m4is_mb6gy) { wp_clear_scheduled_hook($m4is_auoz);
 wp_schedule_event(time() + mt_rand(600,900), $m4is_o1dz, $m4is_auoz);
 } } } private 
function m4is_ejdep() {  add_filter( 'cron_schedules', ['m4is_kro2', 'm4is_t6d9ng'], 1 );
  add_action( 'memberium/actionsets/sync', ['m4is_tvc2xn', 'm4is_fre0'] );
 add_action( 'memberium/contacts/async', [ 'm4is_bnrdbo', 'm4is_aumx_'] );
 add_action( 'memberium/contacts/makepass_scan', ['m4is_m_rh3', 'm4is_jdjyia'] );
 add_action( 'memberium/contacts/sync_custom_fields', ['m4is_a8iaym', 'm4is_j23h'] );
 add_action( 'memberium/invoices/sync', ['m4is_untczd', 'm4is_ypsh6m'] );
 add_action( 'memberium/maintenance/logs/trim', ['m4is__gu52', 'm4is_asnet'] );
 add_action( 'memberium/maintenance/logs/trim', ['m4is_ypvg9', 'm4is_d0xjvu'] );
 add_action( 'memberium/maintenance/updater', ['m4is_i1jld5','m4is_chswmy'] );
 add_action( 'memberium/products/sync', ['m4is_untczd', 'm4is_ky94f'] );
 add_action( 'memberium/subscriptions/scan_expired', ['m4is_m_rh3', 'm4is_ucv1x'] );
 add_action( 'memberium/subscriptions/sync', ['m4is_untczd', 'm4is_k896'] );
 add_action( 'memberium/tags/categories/sync', ['m4is_a18xl', 'm4is_nzf_t'] );
 add_action( 'memberium/tags/sync', ['m4is_pwtg7', 'm4is_jgs89'] );
 add_action( 'wp_version_check', ['m4is_u68pu', 'm4is_k6nh'] );
 add_action( 'memberium/affiliates/running_totals', ['m4is_pk8phc', 'm4is_c75kdb'] );
  add_action( 'memberium_maintenance', ['m4is_m_rh3', 'm4is_ai4wb'] );
 } private 
function m4is_lzns() { add_filter( 'wp_privacy_personal_data_erasers', ['m4is_u_pahy', 'm4is_w3jf5y'], 11 );
 add_filter( 'wp_privacy_personal_data_exporters', ['m4is_u_pahy', 'm4is_oymhg'], 10 );
 } private 
function m4is_sufyc() {  if ($this->m4is_oiewvu('settings', 'multi_language', 0) ) { add_filter('gettext', ['m4is_ss2_7', 'm4is_la37r'], PHP_INT_MAX, 3);
 add_filter('gettext_with_context', ['m4is_ss2_7', 'm4is_nxc9zw'], PHP_INT_MAX, 4);
 } } private 
function m4is_frne() { if ( $this->m4is_oiewvu( 'settings', 'sync_meta_updates' ) ) {   add_filter( 'update_user_metadata', [$this, 'm4is_j6aw9'], 10, 5 );
 add_filter( 'memberium/usermeta/crm_field_maps', [$this, 'm4is_jpd4'], 10, 1 );
 } } private 
function m4is_x2fu() {  add_filter('wpal/ecomm/config', [$this, 'm4is_extib'], PHP_INT_MAX, 1);
 add_filter('wpal/ecomm/customer/add_update', [$this, 'm4is_fp7l2t'], 10, 3);
 } private 
function m4is_qbyu_d() { add_action( 'init', [$this, 'm4is_askej'], PHP_INT_MAX );
 } private 
function m4is_a4lzps() { add_filter('site_status_tests', ['m4is_ntvqsw', 'm4is_vjd_k']);
  add_filter('debug_information', ['m4is_ntvqsw', 'm4is_pktn']);
 } private 
function m4is_eqblk() { $m4is_nz3t = 'm4is_i1jld5';
 add_filter( 'updater_plugins_api_result', [$m4is_nz3t, 'm4is__c18pq'], 10, 3 );
 add_filter( 'updater_plugins_api', [$m4is_nz3t, 'm4is_hcyf'], 10, 3 );
 add_filter( 'updater_pre_set_site_transient_update_plugins', [$m4is_nz3t, 'm4is_b1dq'], 10, 1 );
 add_filter( 'update_plugins_memberium.com', [$m4is_nz3t, 'm4is_v346t'], 20, 4 );
 } private 
function m4is_ww61so() { $this->m4is_ejdep();
 $this->m4is_eqblk();
 $this->m4is_v_sab0();
 $this->m4is_lzns();
 $this->m4is_soflk3();
 $this->m4is_a4lzps();
 $this->m4is_sufyc();
 $this->m4is_frne();
 $this->m4is_x2fu();
 $this->m4is_qbyu_d();
 add_filter( 'pre_user_url', [$this, 'm4is_gwho'], PHP_INT_MAX, 1 );
 add_filter( 'admin_email_check_interval', '__return_false' );
 add_filter( 'auth_cookie_expiration', [$this, 'm4is_by8c'], PHP_INT_MAX - 1, 3 );
 add_filter( 'http_request_args', [$this, 'm4is_fv0i5e'], PHP_INT_MAX, 2 );
 add_filter( 'random_password', [$this, 'm4is_z5uz3'], 10, 4 );
 add_filter( 'wp_nav_menu_args', [$this, 'm4is_earx'] );
 add_filter( 'random_password', [$this, 'm4is_qikfzq'], 20, 4 );
     add_action( 'plugins_loaded', [$this, 'm4is_ok97x'], 11, 0 );
 add_action( 'plugins_loaded', [$this, 'm4is_fyvf'], 12, 0 );
 add_action( 'after_setup_theme', [$this, 'm4is_axw_'], 10 );
 add_action( 'admin_bar_menu', ['m4is_kix1', 'm4is_donvx'], 71 );
  add_action( 'admin_bar_menu', ['m4is_kix1', 'm4is_mbo1yw'], 101 );
  add_action( 'after_password_reset', [$this, 'm4is_pk8yj'], 10, 2 );
 add_action( 'deleted_user', ['m4is_u68pu', 'm4is_tlsf'], PHP_INT_MAX, 0 );
 add_action( 'i2sdk_custom_fields_sync', [$this, 'm4is_h7b4q'], 10, 2 );
 add_action( 'init', ['m4is_cclk5', 'm4is_mi9d'], 1 );
 add_action( 'init', [$this, 'm4is_xgviu0'] );
 add_action( 'plugins_loaded', [$this, 'm4is_tmpk'], 1 );
 add_action( 'post_updated', [$this, 'm4is_z3y0'], PHP_INT_MAX, 1 );
 add_action( 'set_current_user', [$this, 'm4is_o9xw5'], 1 );
 add_action( 'shutdown', [$this, 'm4is_mokw'], 10, 0 );
 add_action( 'init', [$this, 'm4is_ctm7'], 20 );
 add_action( 'wp_footer', [$this, 'm4is_ufc87o'], PHP_INT_MAX );
 add_action( 'shutdown', [$this, 'm4is_bodh'], PHP_INT_MAX );
 add_action( 'user_register', ['m4is_u68pu', 'm4is_tlsf'], PHP_INT_MAX, 0 );
 add_action( 'user_register', ['m4is_n9cgzx', 'm4is_y0gv_'], 10, 2 );
 add_action( 'wp_ajax_memb_ajax_actions', [$this, 'm4is_k_2ck'], 99 );
 add_action( 'wp_ajax_nopriv_memb_ajax_actions', [$this, 'm4is_k_2ck'], 99 );
     add_action( 'woocommerce_customer_reset_password', [$this, 'm4is_pk8yj'], 10, 1);
  add_filter( 'wpseo_indexable_excluded_post_types', [$this, 'm4is_pv3s']);
  add_action( 'wpdc_sso_provider_before_sso_redirect', ['m4is_juokma', 'm4is_qy4mft'], 10, 2 );
  } private 
function m4is_xzglo() { if ( (defined('DOING_AJAX') && DOING_AJAX) || (! is_admin() ) ) { include_once __DIR__ . '/frontend.php';
 m4is_w0enbm::m4is_e5l8a9();
  } if (is_admin() ) { include_once __DIR__ . '/admin.php';
 m4is_q1zh2::get_instance();
 } } private 
function m4is_fodf3r() { global $wpdb;
 $m4is_z9hvgk = [ 'MEMBERIUM_BETA' => 0, 'MEMBERIUM_DB_CONTACTS' => 'memberium_contacts', 'MEMBERIUM_DB_CONTACTTAGS' => 'memberium_contacttags', 'MEMBERIUM_DB_EVENTS' => "{$wpdb->prefix}memberium_events", 'MEMBERIUM_DB_HTTPPOST' => 'memberium_httppost', 'MEMBERIUM_DB_INVOICES' => 'memberium_invoices', 'MEMBERIUM_DB_JOBS' => 'memberium_jobs', 'MEMBERIUM_DB_LOGINLOG' => 'memberium_loginlog', 'MEMBERIUM_DB_PAGETRACKING' => "{$wpdb->prefix}memberium_pagetracking", 'MEMBERIUM_DB_PRODUCTS' => 'memberium_products', 'MEMBERIUM_DB_QUEUE' => 'memberium_queue', 'MEMBERIUM_DB_RELATIONSHIPS' => "{$wpdb->prefix}memberium_relationships", 'MEMBERIUM_DB_RELATIONSHIP_TYPES' => "{$wpdb->prefix}memberium_relationship_types", 'MEMBERIUM_DB_SESSIONS' => "{$wpdb->prefix}memberium_sessions", 'MEMBERIUM_DB_SOCIAL' => "{$wpdb->prefix}memberium_socialaccount", 'MEMBERIUM_DB_WORDS' => "{$wpdb->prefix}memberium_words", 'MEMBERIUM_DEBUG' => 0, 'MEMBERIUM_DEBUGLOG' => "{$_SERVER['DOCUMENT_ROOT']}/debuglog.txt", 'MEMBERIUM_DELIMITER' => ',', 'MEMBERIUM_ERRORLOG' => 0, 'MEMBERIUM_INSTALLED' => 1, 'MEMBERIUM_NESTING_LEVELS' => 10, 'MEMBERIUM_NOWYSIWYG' => 0, 'MEMBERIUM_SKU' => 'm4is',  ];
 foreach($m4is_z9hvgk as $m4is_c5zg => $m4is_g0wy) { defined($m4is_c5zg) ? '' : define($m4is_c5zg, $m4is_g0wy);
 } }  private 
function m4is_vmsrgl() {  $m4is_m_mie7 = MEMBERIUM_HOME;
  $m4is_nz3t = 'm4is_fbl5x8';
  register_activation_hook( $m4is_m_mie7, [$m4is_nz3t, 'm4is_nd36nj'] );
  register_uninstall_hook( $m4is_m_mie7, [$m4is_nz3t, 'm4is_jdj3gq'] );
  register_deactivation_hook( $m4is_m_mie7, [$m4is_nz3t, 'm4is_nj2zui'] );
 }  private 
function m4is_y2aj() {  if (! headers_sent() ) {  $m4is_cd2cih = session_status();
  if ($m4is_cd2cih === PHP_SESSION_DISABLED) { error_log('PHP Sessions Disabled');
 return;
 }  elseif ($m4is_cd2cih === PHP_SESSION_ACTIVE) { return;
 }  $m4is_e1j0z = $this->m4is_oiewvu( 'settings', 'db_sessions' );
 $m4is_f2h1k3 = $this->m4is_oiewvu( 'settings', 'microcache_compat_session' );
  if ($m4is_e1j0z) { m4is_rg1kh::m4is_x6wv();
 }  if ( empty( $m4is_f2h1k3 ) ) { @session_start();
 } } }  
function m4is_duik9p() {   return $this->m4is_ppcswv;
 }     
function m4is_mgdfhw( array $m4is_hpn9y ) : array {  if (!$this->m4is_oiewvu('settings', 'plaintext_db', false)) { return $m4is_hpn9y;
 }  foreach ($m4is_hpn9y as $m4is_t5ot4 => $m4is_w_o7al) {  $m4is_hpn9y[$m4is_t5ot4] = remove_accents($m4is_w_o7al);
  $m4is_hpn9y[$m4is_t5ot4] = filter_var( $m4is_hpn9y[$m4is_t5ot4], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH );
 }  return $m4is_hpn9y;
 }  
function m4is_da9or(array $m4is_b572w, $m4is_t5ot4 = 'fieldname', $m4is_w_o7al = 'value'): array {  $m4is_hpn9y = [];
  foreach ($m4is_b572w as $m4is_ereh) {   $m4is_hpn9y[$m4is_ereh[$m4is_t5ot4]] = $m4is_ereh[$m4is_w_o7al];
 }  return $m4is_hpn9y;
 } 
function m4is_br18( array $m4is_n76d, array $m4is_ibtmg5 ) { $m4is_azd3yf = [];
 foreach( $m4is_n76d as $m4is_s2ge5 => $m4is_w_o7al ) { if ( ! array_key_exists( $m4is_s2ge5, $m4is_ibtmg5 ) ) { $m4is_azd3yf[$m4is_s2ge5] = '';
 } elseif ( $m4is_w_o7al !== $m4is_ibtmg5[$m4is_s2ge5] ) { $m4is_azd3yf[$m4is_s2ge5] = $m4is_ibtmg5[$m4is_s2ge5];
 } } return $m4is_azd3yf;
  }  
function m4is_eod7l(array $m4is_n76d, array $m4is_ibtmg5) : array {    return array_keys(array_diff_key($m4is_n76d, $m4is_ibtmg5));
 }  
function m4is_bp1omz(array $m4is_n76d, array $m4is_ibtmg5) : array {    return array_diff_key($m4is_ibtmg5, $m4is_n76d);
 }  
function m4is_wb_v( array $m4is_olyhm2, array $m4is_i2ek1 ): array {  foreach ( $m4is_i2ek1 as $m4is_iwv8n ) { unset( $m4is_olyhm2[$m4is_iwv8n] );
 }  return $m4is_olyhm2;
 }    static 
function m4is_q3jv2() : string { return i2sdk_class::DB_API_LOG;
 } static 
function m4is_xv06x9() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_q3jv2();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(20) NOT NULL AUTO_INCREMENT, \n" . "appname varchar(32) NOT NULL, \n" . "timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, \n" . "duration float NOT NULL DEFAULT '0', \n" . "retries int(11) NOT NULL DEFAULT '0', \n" . "ip_address varchar(45) DEFAULT NULL, \n" . "user varchar(32) DEFAULT NULL, \n" . "service varchar(32) DEFAULT NULL, \n" . "caller longtext, \n" . "result longtext, \n" . "PRIMARY KEY  (id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } static 
function m4is_yx3uc() : string { return MEMBERIUM_DB_QUEUE;
 } static 
function m4is_kgx6() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_yx3uc();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL AUTO_INCREMENT, \n" . "pidlock int(11) NOT NULL default 0, \n" . "appname varchar(16) NOT NULL, \n" . "actiontype varchar(20) NOT NULL, \n" . "scheduled timestamp NOT NULL, \n" . "contactid int(11) NOT NULL default 0, \n" . "userid int(11) NOT NULL default 0, \n" . "data text NOT NULL, \n" . "KEY scheduled (scheduled), \n" . "KEY actiontype (actiontype), \n" . "KEY contactid (contactid), \n" . "KEY userid (userid), \n" . "PRIMARY KEY  (id,appname) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } static 
function m4is_dga1q() : string { return MEMBERIUM_DB_WORDS;
 } static 
function m4is_k4eg0k() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::m4is_dga1q();
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(10) unsigned NOT NULL AUTO_INCREMENT, \n" . "word varchar(10) NOT NULL, \n" . "PRIMARY KEY (id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 } }

