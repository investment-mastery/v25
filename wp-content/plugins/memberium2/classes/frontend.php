<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_w0enbm { public $post_type = 0;
 public $set_cookie;
 private $m4is_kwy68;
 private $m4is_bnd6ti;
 private $m4is_dbhgup;
 private $m4is_z0f6;
 private $m4is_cd8k;
 private $m4is_gl7mx4;
 private $can_cache = FALSE;
 private $contact_count = 0;
 private $contact_id = 0;
 private $core;
 private $disable_login_redirect = FALSE;
 private $error_message = '';
 private $flash = '';
 private $footer_code;
 private $footer_json = [];
 private $forloop = 0;
 private $found_posts;
 private $i2sdk_options = [];
 private $in_init = FALSE;
 private $in_list = 0;
 private $index = 0;
 private $is_administrator = false;
 private $license_status = false;
 private $login_redirect_enabled = true;
 private $login_redirect_url = '';
 private $nested_shortcodes = [];
 private $optimizepress_page = false;
 private $options = [];
 private $redirect_url;
 private $shortcode_tags = [];
 private $shortcodes = [];
 private $shortcodes_registered = false;
 private $signature = false;
 private $successful_upload;
 private $url_id = 0;
 protected $httppost_service;
     static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->m4is_tpzl();
 $this->m4is_gbqd0();
 $this->m4is_ww61so();
 }  private 
function m4is_ju94() : void { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_dbhgup = 0;
 $this->m4is_kwy68 = [];
 $this->set_cookie = [];
 $this->m4is_z0f6 = [];
 $this->m4is_cd8k = 0;
 $this->m4is_gl7mx4 = false;
 }     private 
function m4is_tpzl() {  $m4is_b3z8 = [ 'm4is_gkbluj' => 'classes/shortcodes/access', 'm4is_jmf3' => 'classes/shortcodes/affiliates', 'm4is_eo51' => 'classes/shortcodes/aws', 'm4is_h08ul' => 'classes/shortcodes/browser', 'm4is_kfea' => 'classes/catchers', 'm4is_lldmt' => 'classes/shortcodes/crm', 'memberium_debug_shortcodes_class' => 'classes/shortcodes/debug', 'm4is_k78c' => 'classes/ecommerce', 'm4is__h0xmk' => 'classes/shortcodes/ecommerce', 'm4is_clpok' => 'classes/shortcodes/filebox', 'm4is_pybv' => 'classes/shortcodes/gamification', 'm4is_gng906' => 'classes/shortcodes/misc', 'm4is_g79rc' => 'classes/shortcodes/postgrid', 'm4is_crqo' => 'classes/scapi', 'm4is_mj1go' => 'classes/shortcodes/debug', 'm4is_a0qko' => 'classes/shortcodes/user', 'm4is_xcev' => 'classes/shortcodes/wordpress', ];
  $this->m4is_bnd6ti->m4is_gt7z( $m4is_b3z8 );
  include_once __DIR__ . '/shortcodes.php';
  m4is_dalr6::m4is_e5l8a9();
 }  private 
function m4is_gbqd0() { global $wpdb;
   do_action( 'memberium/shortcodes/add' );
  $this->options = $this->m4is_bnd6ti->m4is_oiewvu();
 if (!is_array($this->options)) {  } $this->i2sdk_options = $this->m4is_bnd6ti->get_i2sdk_options();
 if (!is_array($this->i2sdk_options)) {  } $this->m4is_kwy68 = [];
  if (is_array($_GET)) { foreach ($_GET as $m4is_s2ge5 => $m4is_w_o7al) { if (substr($m4is_s2ge5, 0, 4) == 'amp;') { $m4is_fonsz2 = substr($m4is_s2ge5, 4);
 $_GET[$m4is_fonsz2] = $m4is_w_o7al;
 unset($_GET[$m4is_s2ge5]);
 } } }  if (class_exists('m4is_rg1kh')) { $m4is_uln6ax = (int) $this->m4is_bnd6ti->m4is_oiewvu('settings', 'session_timeout');
 if ($m4is_uln6ax > 0) { if (session_id() == '') { ini_set('session.gc_maxlifetime', $m4is_uln6ax);
 } m4is_rg1kh::m4is_bk98($m4is_uln6ax);
 } }  if ($_SERVER['REQUEST_METHOD'] == 'GET') { add_action('template_redirect', [$this, 'm4is_dpsq6f'], 20);
 } $this->m4is_p6kc();
 $this->m4is_pwnd0x();
 add_filter('shortcode_atts_memberium', ['m4is_crqo', 'm4is_ryzl']);
 if (class_exists('WooCommerce')) { add_filter('woocommerce_login_redirect', [$this, 'm4is_jto3s'], PHP_INT_MAX, 2);
 }  if (m4is_u68pu::m4is_u6mkaw()) { if (!empty($_GET['memb_autologin'])) { $autologin_enabled = !empty($this->m4is_bnd6ti->m4is_oiewvu('settings', 'allow_autologin'));
 $autologin_enabled = $autologin_enabled || !empty($this->m4is_bnd6ti->m4is_oiewvu('settings', 'thrivecart_secret'));
 if ($autologin_enabled) { add_action('init', ['m4is_o968i', 'm4is_p50b'], 999999);
 } } if (!empty($_GET['memb_setcookie'])) { add_action('send_headers', [$this, 'm4is_gex0'], 1);
 } if (isset($_GET['memb_s3link']) && isset($_GET['verification'])) { add_action('init', ['m4is_eo51', 'm4is_t1i6w']);
 } } }  private 
function m4is_ww61so() { $this->m4is_v_sab0();
 $this->m4is_vy_15();
 $this->m4is_oqf9();
 $this->m4is_wdtncw();
 $this->m4is__i9cjs();
     add_action( 'init', [$this, 'm4is_xgviu0'], 1000 );
 add_action( 'login_head', [$this, 'm4is_b4sz'], PHP_INT_MAX );
 add_action( 'memberium_populate_session', [$this, 'm4is_dnqd_'], 10, 1 );
 add_action( 'memberium/shortcodes/add', [$this, 'm4is_ljhm'] );
 add_action( 'password_reset', [$this, 'm4is_ouygp'], 2 );
 add_action( 'plugins_loaded', [$this, 'm4is_cviw'] );
 add_action( 'plugins_loaded', [$this, 'm4is_ljhm'], 1000 );
 add_action( 'pre_get_posts', [$this, 'm4is_l8wk'], PHP_INT_MAX );
 add_action( 'profile_update', [$this, 'm4is_cg3r'], 10, 2 );
 add_action( 'register_form', [$this, 'm4is_lp79'], 5 );
 add_action( 'transition_comment_status', [$this, 'm4is_i0bwe'], 99, 3 );
 add_action( 'wp_enqueue_scripts', [$this, 'm4is_fxro'] );
  add_action( 'wp_footer', [$this, 'm4is_etmk9q'], 100 );
 add_action( 'wp_head', [$this, 'm4is_ya6gch'] );
 add_action( 'wp_head', [$this, 'm4is_b4sz'], PHP_INT_MAX );
 add_action( 'wp_insert_comment', [$this, 'm4is_gcfn'], 99, 2 );
  add_action( 'template_redirect', [$this, 'm4is_qkhpt'], 20 );
 add_action( 'template_redirect', [$this, 'm4is_by51u'] );
 add_action( 'template_redirect', [$this, 'm4is_trwmt'], 100 );
 add_action( 'template_redirect', [$this, 'm4is_dnl7qw'], 25 );
 add_action( 'template_redirect', [$this, 'm4is_wrnhc'], 15 );
 add_action( 'the_post', [$this, 'm4is_aotk8'], 10 );
 add_filter( 'the_posts', [$this, 'm4is_mul3i'], 10, 2 );
 add_filter( 'get_pages', [$this, 'm4is_yzvq'], 11, 2 );
 add_filter( 'memberium_has_post_access', [$this, 'm4is_dy70'], 10, 2 );
   add_filter( 'found_posts', [$this, 'm4is_tkgx'], 10, 2 );
 add_filter( 'memberium/hide_titlebar', [$this, 'm4is_v1z6p'], 10, 1 );
 add_filter( 'option_stylesheet', [$this, 'm4is_h8yz'] );
 add_filter( 'option_template', [$this, 'm4is_h8yz'] );
 add_filter( 'register', [$this, 'm4is_ocyx'], 10, 1 );
 add_filter( 'template', [$this, 'm4is_h8yz'] );
 add_filter( 'wp_search_stopwords', [$this, 'm4is_i5r8'], 10, 1 );
 add_filter( 'wpal/blocks/can_access_asset', [$this, 'm4is_ux59ig'], 10, 4 );
 add_filter( 'wpal/menu/can_access_item', [$this, 'm4is_ux59ig'], 10, 4 );
 add_filter( 'wpal/taxonomy/can_access_term', [$this, 'm4is_ux59ig'], 10, 4 );
 add_filter( 'wp_title', [$this, 'm4is_f64h'], PHP_INT_MAX, 3);
 add_filter( 'document_title_parts', [$this, 'm4is_g5_cl'], PHP_INT_MAX, 1);
 add_filter( 'x_redirect_by', [$this, 'm4is_b6fd'], 10, 3 );
  add_filter( 'wp_get_nav_menu_items', [$this, 'm4is_xp0vc'], 1, 3 );
 add_filter( 'wp_nav_menu_objects', [$this, 'm4is_mzl1jn'] );
  add_filter( 'widget_meta_poweredby', function() { return '';
 } );
 add_filter( 'wpal/widget/can_access_asset', [$this, 'm4is_ux59ig'], 10, 4 );
 add_filter( 'gettext', function( $m4is_u36ko, $m4is_knyw0, $m4is_ml7s2b ) { return $m4is_u36ko == 'Meta' ? 'Login' : $m4is_u36ko;
 }, 10, 3 );
  }   
function m4is_askjf() : int { return $this->m4is_dbhgup;
 static $m4is_cd8k = null;
 if ( is_null( $m4is_cd8k ) ) { if ( is_single() ) { if ( ! empty( $GLOBALS['wp_the_query']->queried_object) && is_a( $GLOBALS['wp_the_query']->queried_object, 'WP_Post' ) ) { $m4is_cd8k = $GLOBALS['wp_the_query']->queried_object->ID;
 } elseif (! empty($GLOBALS['wp_the_query']->posts[0]) && is_a($GLOBALS['wp_the_query']->posts[0], 'WP_Post') ) { $m4is_cd8k = $GLOBALS['wp_the_query']->posts[0]->ID;
 } } else { $m4is_cd8k = 0;
 } } return (int) $m4is_cd8k;
 }  
function m4is_d2vl() : string {  static $m4is_a_hn = null;
  if ( is_null( $m4is_a_hn ) ) {  if ( is_singular() ) {  if (!empty($GLOBALS['wp_the_query']->queried_object) && is_a($GLOBALS['wp_the_query']->queried_object, 'WP_Post')) {  $m4is_a_hn = $GLOBALS['wp_the_query']->queried_object->post_type;
 } } else {  $m4is_a_hn = '';
 } }  return (string) $m4is_a_hn;
 }     
function m4is_ljy_l() { return $this->error_message;
 }  
function m4is_c043n( $m4is_aocm8x ) { $this->error_message = $m4is_aocm8x;
 } 
function m4is_ix1iy() { return $this->flash;
 } 
function m4is_mhea($m4is_wbgl5s) { $this->flash = $m4is_wbgl5s;
 } 
function m4is_ciqgu3($m4is_s2ge5, $m4is_w_o7al = false) { if ($m4is_w_o7al) { $this->footer_json[$m4is_s2ge5] = $m4is_w_o7al;
 } else { unset($this->footer_json[$m4is_s2ge5]);
 } } 
function m4is_uuxv($m4is_s2ge5 = false) { if ($m4is_s2ge5) { return (isset($this->footer_json[$m4is_s2ge5]) ) ? $this->footer_json[$m4is_s2ge5] : NULL;
 } else { return $this->footer_json;
 } } 
function m4is_uq0e9g() { return $this->redirect_url;
 } 
function m4is_bs9z4($m4is_b5kaz0) { $this->m4is_b5kaz0 = $m4is_b5kaz0;
 } 
function m4is_y9bs6c() { $this->login_redirect_enabled = false;
 }  
function m4is_qmyc1j() { $this->login_redirect_enabled = true;
 } 
function m4is_y903nq($m4is_gl7mx4 = true) { $this->m4is_bnd6ti->m4is_y903nq($m4is_gl7mx4);
 } 
function m4is_e9cok() { return (bool) $this->m4is_bnd6ti->m4is_e9cok();
 } 
function m4is_gkqzph($caching) { $this->can_cache = (boolean) $caching;
 if (! $caching) { m4is_aoxw::m4is_djr4nd();
 } } 
function m4is_by_xfc() { return $this->can_cache;
 }     
function m4is_dpsq6f() {  $m4is_shi6 = time() + YEAR_IN_SECONDS;
  if ( isset( $_GET['affiliate'] ) ) { m4is_aoxw::m4is_djr4nd();
  $m4is_pa8jw = (int) $_GET['affiliate'];
  $m4is_kgpf_n = remove_query_arg( ['affiliate', 'cookieUUID', 'fbclid'] );
  $_SESSION = isset( $_SESSION ) ? $_SESSION : [];
  $_SESSION['infusionsoft_affiliate'] = $m4is_pa8jw;
 $_COOKIE['infusionsoft_affiliate'] = $m4is_pa8jw;
  setcookie( 'infusionsoft_affiliate', $m4is_pa8jw, 0, '/' );
 return;
 } else {  if ( empty( $_SESSION['infusionsoft_affiliate'] ) && isset( $_COOKIE['infusionsoft_affiliate'] ) && is_int( $_COOKIE['infusionsoft_affiliate'] ) ) { $_SESSION['infusionsoft_affiliate'] = (int) $_COOKIE['infusionsoft_affiliate'];
 } }  if ( isset( $_SESSION['infusionsoft_affiliate'] ) || isset( $_COOKIE['infusionsoft_affiliate'] ) ){ return;
 }  if ( is_admin() || $this->m4is_bnd6ti->m4is_lvmz1b() ) { return;
 }  if ( $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'affiliate_detect' ) ) { $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
  $_SESSION['infusionsoft_affiliate'] = 0;
  $_SERVER['HTTPS'] = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : '';
  setcookie( 'infusionsoft_affiliate', '0', $m4is_shi6, '/' );
  if ( strtolower( $_SERVER['REQUEST_METHOD']) == 'get' && ! isset( $_SESSION['affiliate_id'] ) ) {  $m4is_id_l = ($_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
 $m4is_id_l = urlencode($m4is_id_l);
 m4is_aoxw::m4is_djr4nd();
  header( sprintf( 'Location: https://%s.infusionsoft.com/aff.html?to=%s', $m4is_zq0k, $m4is_id_l ) );
 exit;
 } } }     
function m4is_p6kc() {  global $allowedposttags;
  $tagsAndAttributes = [ 'a' => ['href'], 'iframe' => ['src', 'srcdoc'], 'input' => ['name', 'placeholder', 'value'], 'option' => ['value'], 'progress' => ['max', 'value'], 'source' => ['src'], 'textarea' => ['placeholder', 'value'] ];
  foreach ($tagsAndAttributes as $tag => $attributes) {  foreach ($attributes as $attribute) {  $allowedposttags[$tag][$attribute] = 1;
 } } }    
function m4is_cviw() {  add_filter('op_check_page_availability', [$this, 'm4is_rcml05']);
  if (class_exists('WooCommerce') ) { add_action('woocommerce_customer_save_address', [$this, 'm4is_zlp6x1'], 10, 2);
 add_action('woocommerce_register_form_start', [$this, 'm4is_f06y']);
 add_action('woocommerce_register_post', [$this, 'm4is_aosq'], 10, 3);
 add_action('woocommerce_created_customer', [$this, 'm4is_bsk5de'], 999999, 3);
 }   add_filter('ninja_forms_field', [$this, 'm4is__yckx'], 10, 2);
 }  
function m4is_d8t1v() { return;
 if (! isset($_SERVER['PHP_AUTH_USER']) ) { header('WWW-Authenticate: Basic realm="RSS Feeds"');
 header('HTTP/1.0 401 Unauthorized');
 echo 'Feeds from this site are private';
 exit;
 } else { if (is_wp_error(wp_authenticate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) ) ) { header('WWW-Authenticate: Basic realm="RSS Feeds"');
 header('HTTP/1.0 401 Unauthorized');
 echo 'Username and password were not correct';
 exit;
 } } }  
function m4is_o19rd8($m4is_kt0n) {  $m4is_kt0n = array_merge($m4is_kt0n, ['memb_php', 'memb_raw']);
 return $m4is_kt0n;
 }  
function m4is_i5r8($m4is_wqfc) { $m4is_wqfc[] = 'memb_';
 $m4is_wqfc[] = 'membc_';
 return $m4is_wqfc;
 }  
function m4is_tkgx($m4is_sjcwp, $m4is_jo8fb) { if ($this->found_posts !== null) { $m4is_jo8fb->found_posts = $this->found_posts;
 $this->found_posts = null;
 return $m4is_jo8fb->found_posts;
 } return $m4is_sjcwp;
 } 
function m4is_c7c5yk(array $m4is_t0lr4, $m4is_jo8fb = false) { foreach($m4is_t0lr4 as $m4is_s2ge5 => $m4is_c2ah) { if (! $this->m4is_k_4p2o($m4is_c2ah->ID) ) { unset($m4is_t0lr4[$m4is_s2ge5]);
 } } return $m4is_t0lr4;
 }  
function m4is_gex0() { $m4is_t5ot4 = trim($_GET['memb_setcookie']);
 $m4is_numo = isset($_GET['expiration']) ? strtotime($_GET['expiration']) : time() + YEAR_IN_SECONDS;
 $m4is_w_o7al = isset($_GET['value']) ? $_GET['value'] : '';
 $m4is_n3zt = isset($_GET['mode']) ? strtolower($_GET['mode']) : 'replace';
 $m4is__7cx = isset($_GET['redir']) ? strtolower($_GET['redir']) : '/';
 $m4is_ea6ksm = isset($_GET['path']) ? strtolower($_GET['path']) : '/';
 $m4is_ml7s2b = isset($_GET['domain']) ? strtolower($_GET['domain']) : $_SERVER['HTTP_HOST'];
  if ($m4is_n3zt == 'append') { $m4is_w_o7al = implode(',', array_unique(explode(',', $_COOKIE[$m4is_t5ot4] . ',' . trim($m4is_w_o7al) ) ) );
 } $m4is_oa_z = setcookie($m4is_t5ot4, $m4is_w_o7al, $m4is_numo, $m4is_ea6ksm, $m4is_ml7s2b);
 m4is_aoxw::m4is_djr4nd();
 wp_redirect($m4is__7cx);
 exit;
 } 
function m4is_e0pvg() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } m4is_aoxw::m4is_djr4nd();
 if ( isset( $_GET['i4w_genpass'] ) && $_GET['i4w_genpass'] == substr( $this->i2sdk_options, 0, 6 ) ) { $_GET['operation'] = 'makepass';
 $_GET['adduser'] = isset( $_GET['autoreg'] ) && $_GET['autoreg'] == 'n' ? 'no' : '';
 $_GET['tagids'] = isset( $_GET['tagid'] ) ? $_GET['tagid'] : '';
 $_GET['goal'] = isset( $_GET['goal'] ) ? $_GET['goal'] : '';
 $_GET['default_pass'] = isset( $_GET['password'] ) ? $_GET['password'] : '';
 } if ( isset( $_GET['i4w_sync_user'] ) && $_GET['i4w_sync_user'] == substr( $this->i2sdk_options, 0, 6 ) ) { $_GET['operation'] = 'update-contact';
 } if (! isset($_GET['operation']) ) { return;
 } include_once __DIR__ . '/httpposts.php';
 m4is_fgf40::m4is_e5l8a9();
 $this->m4is_bnd6ti->m4is_gt7z( [ 'm4is_fpr57' => 'classes/http-posts/copy-fields', 'm4is_kix7' => 'classes/http-posts/delete-contact', 'm4is_namu' => 'classes/http-posts/makepass', 'm4is_yzp1a0' => 'classes/http-posts/math', 'm4is_s4xe' => 'classes/http-posts/prettify', 'm4is_m0ofg' => 'classes/http-posts/set-date', 'm4is_l17doi' => 'classes/http-posts/get-post', 'm4is_gm8cd' => 'classes/http-posts/update-contact', 'm4is_fabm4' => 'classes/http-posts/scan-subscriptions', ] );
 $m4is__dts9 = [ 'add-contact' => [$this, 'm4is_hecugo'], 'add-event' => [$this, 'm4is_l8l_5x'], 'add-issue' => [$this, 'm4is_htxsy'], 'add-tags' => [$this, 'm4is_e3onw'], 'add-user' => [$this, 'post_add_user'], 'copy-next-billing' => [$this, 'm4is_si26ex'], 'expire-subs' => [$this, 'm4is_c5e2q_'], 'foo' => [$this, 'm4is_d5mv'], 'gdpr-erase' => [$this, 'httppost_gdpr_erase'], 'gdpr-export' => [$this, 'httppost_gdpr_export'], 'optin' => [$this, 'm4is_jcy_'], 'optout' => [$this, 'm4is_ib8yv'], 'contact-delete' => ['m4is_kix7', 'm4is_xexw'], 'contact-update' => ['m4is_gm8cd', 'm4is_xexw'], 'copy-fields' => ['m4is_fpr57', 'm4is_xexw'],  'delete-contact' => ['m4is_kix7', 'm4is_xexw'], 'get-post' => ['m4is_l17doi', 'm4is_xexw'],  'makepass' => ['m4is_namu', 'm4is_xexw'], 'math' => ['m4is_yzp1a0', 'm4is_xexw'], 'prettify-contact' => ['m4is_s4xe', 'm4is_xexw'], 'set-date' => ['m4is_m0ofg', 'm4is_xexw'], 'update-contact' => ['m4is_gm8cd', 'm4is_xexw'],  'scan-subscriptions' => ['m4is_fabm4', 'm4is_xexw'],  ];
 $m4is__dts9 = apply_filters('memberium/httpppost_services/register', $m4is__dts9);
 $m4is_uv_rf = strtolower( $_GET['operation'] );
 if ( array_key_exists( $m4is_uv_rf, $m4is__dts9 ) ) { $m4is_j8ih = $m4is__dts9[$m4is_uv_rf];
 $this->m4is_bnd6ti->m4is_xb8k( true );
 add_action( 'i2sdk_http_post', $m4is_j8ih, 10, 2 );
 } }  
function m4is_trwmt() { if ( is_404() && $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'cache_flush' ) ) { flush_rewrite_rules();
 } } 
function m4is_xgviu0() { $this->is_administrator = current_user_can( 'manage_options' );
  if ( empty( $_SESSION['memb_user'] ) && is_user_logged_in() ) { $_SESSION = $this->m4is_bnd6ti->m4is_akz3();
 } if ( class_exists( 'WooCommerce' ) ) { $this->m4is_xc2y1h();
 } add_action( 'wp_login_failed', ['m4is_ypvg9', 'm4is_f4fy'], -1, 2 );
   $m4is_p3gz_2 = array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'allow_wpadmin_titlebar' ) ) );
 $m4is_cnd539 = true;
 if ( ! empty( $m4is_p3gz_2 ) ) { $m4is_ig9p6 = get_current_user_id();
 foreach( $m4is_p3gz_2 as $m4is_ferk6j ) { if ( user_can( $m4is_ig9p6, $m4is_ferk6j ) ) { $m4is_cnd539 = false;
 } } } $m4is_cnd539 = apply_filters( 'memberium/hide_titlebar', $m4is_cnd539 );
 if ( $m4is_cnd539 ) { add_filter( 'show_admin_bar', '__return_false', 999999 );
 } }  
function m4is_v1z6p( $m4is_cnd539 ) { if ( $m4is_cnd539 ) {  $m4is_ohcaol = [ 'impersonated_by_', 'wordpress_user_sw_olduser_', 'wordpress_user_sw_secure_', ];
 foreach( $m4is_ohcaol as $m4is_qqwj1c ) { if ( ! empty( $_COOKIE[$m4is_qqwj1c . COOKIEHASH] ) ) { return false;
 } } } return $m4is_cnd539;
 }  
function m4is_dnl7qw() { if ( is_user_logged_in() ) { return;
 } $m4is_ywiuj = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'site_lock_enabled' );
 if ( ! $m4is_ywiuj ) { return;
 } $m4is_cd8k = (int) $this->m4is_askjf();
 $m4is_x237 = (bool) apply_filters( 'memberium/sitelock/disable', false, $m4is_cd8k );
  if ( $m4is_x237 ) { return;
 } $m4is_c14oc = (int) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'login_url' );
 if ( $m4is_cd8k ) { if ( $m4is_cd8k === $m4is_c14oc) { return;
 }  $m4is_am5vxc = (bool) get_post_meta( $m4is_cd8k, '_is4wp_force_public', true );
 if ( $m4is_am5vxc ) { return;
 } } if ( $m4is_c14oc ) { $m4is_b5kaz0 = get_permalink( $m4is_c14oc );
 $m4is_b5kaz0 = add_query_arg( 'redirect_to', $_SERVER['REQUEST_URI'], $m4is_b5kaz0 );
 } else { $m4is_b5kaz0 = wp_login_url( $_SERVER['REQUEST_URI'] );
 } m4is_aoxw::m4is_g7bv();
 wp_redirect($m4is_b5kaz0, 302, 'Memberium Sitelock');
 exit;
 } 
function m4is_qkhpt() { global $post, $wp_query;
 if ( ! is_a( $post, 'WP_Post' ) ) { return;
 } if ( current_user_can( 'manage_options' ) ) { return;
 } $m4is_cd8k = $post->ID;
 $m4is_coyid_ = $this->m4is_k_4p2o( $m4is_cd8k );
 if ( ! $m4is_coyid_ ) { $m4is_b3h6t = $this->m4is_waob_( $m4is_cd8k, false );
 if ( $m4is_b3h6t == 'redirect' ) { $this->m4is_yhf0( $m4is_cd8k, 'General Redirect' );
 } elseif ( $m4is_b3h6t == 'hide' ) { global $wp_query;
 $wp_query->set_404();
 status_header( 404 );
 get_template_part( 404 );
 exit();
 } elseif ( $m4is_b3h6t == 'excerpt' ) { $post->post_excerpt = $this->m4is_el2h( $post );
 } } return;
 }  
function m4is_by51u() { global $bp;
 global $post;
 $m4is_cd8k = $this->m4is_askjf();
 $this->post_type = $this->m4is_d2vl();
 $_GET['viewable'] = isset( $_GET['viewable'] ) ? $_GET['viewable'] : '';
  if ( $this->m4is_bnd6ti->m4is_he_yjv() ) { m4is_aoxw::m4is_djr4nd();
 return;
 } if ( isset( $_GET['action'] ) && $_GET['action'] == 'confirmregistration' ) { m4is_aoxw::m4is_djr4nd();
 include_once __DIR__. '/link_handler.php';
 m4is_ot78::m4is_la8ic();
 }  if (! empty($_GET['filebox_id']) && $_GET['filebox_id'] > 0) { m4is_aoxw::m4is_djr4nd();
 m4is_ru7njr::m4is_ml7x0q( (int) $_GET['filebox_id'], $_GET['filename'], (bool) $_GET['viewable']);
 exit;
 } if (! empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'cache_bust') ) ) { m4is_aoxw::m4is_djr4nd();
 }  if (! empty($bp) ) { if (! empty($bp->groups->current_group->id) ) { return;
 } } if ( is_404() && substr($_SERVER['REQUEST_URI'], 0, 7) == '/prtctd') { $m4is__7cx = str_ireplace( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_page_redirect'), '{{current.url}}', get_site_url() );
 m4is_aoxw::m4is_g7bv();
 wp_redirect($m4is__7cx, 302, 'Prtctd Redirect');
 exit;
 } if (get_post_meta($m4is_cd8k, '_is4wp_discourage_cache', true) ) { m4is_aoxw::m4is_djr4nd();
 } if (is_singular() ) { if ($m4is_cd8k > 0 && ! $this->m4is_k_4p2o($m4is_cd8k) ) { $m4is_b3h6t = $this->m4is_waob_($m4is_cd8k, FALSE);
 if ($m4is_b3h6t == 'redirect') { m4is_aoxw::m4is_djr4nd();
 $this->m4is_yhf0($m4is_cd8k, 'General Redirect');
 } } } wp_enqueue_script('jquery');
 } 
function m4is_l8wk() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } if ( ! function_exists( 'is_user_logged_in' ) || ! function_exists( 'set_current_user' ) ) { return;
 }  if ( strpos( 'wp-json/', $_SERVER['REQUEST_URI'] ) !== false ) { return;
 } if ( is_user_logged_in() ) { return;
 } if ( defined( 'COOKIEHASH' ) ) { $m4is_hofqx = 'wordpress_logged_in_' . COOKIEHASH;
 $m4is_vlwi3 = isset( $_COOKIE[$m4is_hofqx] ) ? wp_parse_auth_cookie( $_COOKIE[$m4is_hofqx] ) : false;
 if ( ! empty( $m4is_vlwi3['username'] ) ) { wp_set_current_user( null, $m4is_vlwi3['username'] );
 return;
 } } if ( ! empty( $_SESSION['memb_user']['user_id'] ) ) { wp_set_current_user( (int) $_SESSION['memb_user']['id'] );
 } }     
function m4is_wrnhc() { if ( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'two_pass_shortcode_filter') ) { $m4is_cd8k = $this->m4is_askjf();
 if (defined('OP_VERSION') ) { $this->optimizepress_page = get_post_meta($m4is_cd8k, '_optimizepress_pagebuilder', true) == 'Y';
 if ($this->optimizepress_page) { add_filter('comment_text', [$this, 'm4is_keo1s'], 1, 1);
 $this->m4is_jq30();
 } } else { add_filter('the_content', [$this, 'm4is_jt5_p'], 1, 1);
 } } add_filter('no_texturize_shortcodes', [$this, 'm4is_o19rd8']);
 }  
function m4is_keo1s($m4is_z50f) { $m4is_z50f = preg_replace('/\[(\w.*)\]/', '[[$1]]', $m4is_z50f);
 return $m4is_z50f;
 }  
function m4is_rcml05( $m4is_m_mie7 ) { global $op_content_layout;
 $this->m4is_ljhm();
 $op_content_layout = do_shortcode( $op_content_layout );
 return $m4is_m_mie7;
 }     
function m4is_ru5vk() { }  
function m4is_lp79() { if ( ! $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'extended_reg_fields', false ) ) { return;
 } $m4is_j4lxnf = apply_filters( 'memberium/registration_fields/custom', false );
 if ( $m4is_j4lxnf ) { return;
 } ?>
		<script type="text/javascript" src="<?php echo site_url('/wp-includes/js/jquery/jquery.js');
 ?>"></script>
		<script>
		jQuery('#user_email').attr('type', 'email');
		jQuery('#user_reg_login').attr('type', 'email');

		jQuery('#registerform #user_login').parent().remove();
		jQuery('#user_reg_login').parent().remove();

		jQuery('#user_email').blur(function() {
			jQuery("#user_login2").val(jQuery("#user_email").val() );
		});
		jQuery('#user_reg_email').blur(function() {
			jQuery("#user_login2").val(jQuery("#user_reg_email").val() );
		});
		</script>
		<input type="hidden" id="user_login2" name="user_login" value="">
		<p>
		<label>
		First Name<br/>
		<input id="firstname" type="text" tabindex="30" size="25" value="" name="firstname" />
		</label>
		</p>
		<p>
		<label>
		Last Name<br/>
		<input id="lastname" type="text" tabindex="30" size="25" value="" name="lastname" />
		</label>
		</p>
		<?php
 }  
function m4is_z63p( $m4is_knyw0 ) { if ( $m4is_knyw0 == 'Lost your password?' ) { $m4is_knyw0 = '';
 } return $m4is_knyw0;
 }  
function m4is_xx7d3() { return FALSE;
 }      
function m4is_h8yz($m4is_t65mr) { if (empty($_SESSION['memb_user']['theme']) ) { return $m4is_t65mr;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_up5ag = $_SESSION['memb_user']['theme'];
 $m4is_uik8w = wp_get_themes();
 $m4is_gqcnu1 = current_filter();
 if (! isset($m4is_uik8w[$m4is_up5ag]) ) { return $m4is_t65mr;
 } if ($m4is_gqcnu1 == 'option_template' || $m4is_gqcnu1 == 'template') { return $m4is_uik8w[$m4is_up5ag]->Template;
 } else { return $m4is_up5ag;
 } }     
function m4is_fwd5yl( $m4is_a4lim8 = true ) { if (! empty($_GET['action']) && $_GET['action'] == 'logout') { $m4is_a4lim8 = true;
 }   $m4is_e2kg = $this->m4is_bnd6ti->m4is_cgzvln('logout/contact_id', 0);
 if (! empty($m4is_e2kg) ) { $m4is_lglp = (int) $this->m4is_bnd6ti->m4is_oiewvu('settings', 'logout_actionset', 0);
 $m4is_drd28 = (int) $this->m4is_bnd6ti->m4is_oiewvu('settings', 'logout_tag', 0);
 $this->m4is_bnd6ti->m4is_u86vzq($m4is_lglp, $m4is_e2kg);
 $this->m4is_bnd6ti->m4is_tcle75($m4is_drd28, $m4is_e2kg);
 } if (empty($_GET['redirect_to']) ) { $url = $this->m4is_bnd6ti->m4is__w02();
 } else { $url = $_GET['redirect_to'];
 } setcookie('nextend_uniqid', NULL, -1, '/');
 $this->m4is_bnd6ti->m4is_nekv();
 if ($m4is_a4lim8) { m4is_aoxw::m4is_g7bv();
 wp_redirect( $url );
 exit;
 } }  
function m4is_dnqd_($m4is_zyjs6 = false) { global $wpdb;
 $this->m4is_bnd6ti->m4is_veimgo();
 if (! $m4is_zyjs6) { $m4is_zyjs6 = wp_get_current_user();
 }    if (isset($_SESSION['memb_user']['user_id']) ) { if (! is_a($m4is_zyjs6, 'WP_User') || $m4is_zyjs6->ID == 0 || $m4is_zyjs6->ID != $_SESSION['memb_user']['user_id']) { $this->m4is_bnd6ti->m4is_nekv();
 } } if (is_user_logged_in() ) {  if ($this->m4is_br7kh() ) { $m4is_r3da4 = $m4is_zyjs6->user_email;
 } else { if (! empty($m4is_zyjs6->user_email) ) { $m4is_r3da4 = $m4is_zyjs6->user_email;
 } else { $m4is_r3da4 = $m4is_zyjs6->user_login;
 } } } $_SESSION = $this->m4is_bnd6ti->m4is_akz3();
 }  
function m4is_ouygp($m4is_x0_hk, $m4is_e82v = false) { $m4is_r36qyu = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'local_auth_only');
 if (! $m4is_r36qyu) { if (! $m4is_e82v) { if (isset($_POST['pass1']) && $_POST['pass1'] > '') { $m4is_e82v = $_POST['pass1'];
 } elseif (isset($_POST['password_1']) && $_POST['password_1'] > '') { $m4is_e82v = $_POST['password_1'];
 } } if (empty($m4is_e82v) ) { return;
 } $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs($m4is_x0_hk->ID);
 if (! $m4is_e2kg) { return;
 }    $m4is_azt2 = [ $this->m4is_bnd6ti->m4is_oiewvu('settings', 'password_field') => $m4is_e82v, ];
 $m4is_oa_z = m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is_azt2);
  } }  
function m4is_cg3r($m4is_ig9p6, $m4is_jvtyop = null) { if (is_admin() ) { return;
 } if ( $this->m4is_bnd6ti->m4is_mc71() ) { return;
 } $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if (empty($m4is_e2kg) ) { return;
 } $m4is_r36qyu = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only', false );
 $m4is_dcf_7 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field', 'Password' );
  if (isset($_REQUEST['email']) && ! empty($_REQUEST['email']) && isset($_POST['email']) && $_POST['email'] <> $_REQUEST['email']) { $m4is_wwd9 = strtolower(trim($_REQUEST['email']) );
 if (! empty($m4is_wwd9) ) { $this->m4is_bnd6ti->m4is_az3tn8($m4is_ig9p6, $m4is_wwd9, 0, false);
 } } if (empty($m4is_r36qyu) ) { $new_password = '';
  if (! empty($_POST['pass1']) && ! empty($_POST['pass2']) && $_POST['pass1'] == $_POST['pass2']) { $new_password = $_POST['pass2'];
 }  if (! empty($_POST['password_1']) && ! empty($_POST['password_2']) && $_POST['password_1'] == $_POST['password_2']) { $new_password = $_POST['password_1'];
 } if (empty($new_password) ) { return;
 } $load_fields = [ $m4is_dcf_7 => $new_password, ];
 $m4is_oa_z = m4is_bnrdbo::m4is_cseh($m4is_e2kg, $load_fields);
       } }  
function m4is_br7kh() {  if ($this->m4is_gl7mx4) { return TRUE;
 }  if (isset($_COOKIE['nextend_uniqid']) && $_COOKIE['nextend_uniqid'] > '') { return TRUE;
 }   return FALSE;
 }     
function m4is_c31zd( $m4is_yer1mp, $m4is_cd8k = 0 ) : int { if ( $m4is_yer1mp == 0 ) { return 0;
 } if ( isset( $this->m4is_z0f6[$m4is_cd8k] ) ) { return $this->m4is_z0f6[$m4is_cd8k];
 } if ( current_user_can( 'manage_options' ) ) { return $m4is_yer1mp;
 } $m4is_cd8k = empty( $m4is_cd8k ) ? get_the_id() : $m4is_cd8k;
  $m4is_k4yeul = [ 'post_id' => $m4is_cd8k, ];
 $m4is_pg1eul = get_comments($m4is_k4yeul);
 $m4is_pg1eul = $this->m4is_ec12x($m4is_pg1eul);
 $m4is_pg1eul = $this->m4is__iev($m4is_pg1eul);
 return count( $m4is_pg1eul );
 } 
function m4is_ec12x( $m4is_pg1eul ) { if (empty($m4is_pg1eul) ) { return $m4is_pg1eul;
 } if (current_user_can('manage_options')) { return $m4is_pg1eul;
 };
 $m4is_og6xjb = get_the_author_meta('ID');
 $m4is_ig9p6 = get_current_user_id();
 if ($m4is_og6xjb === $m4is_ig9p6) { return $m4is_pg1eul;
 } $m4is_cd8k = get_the_id();
 $m4is_v2hj = (bool) get_post_meta($m4is_cd8k, '_is4wp_private_comments', true);
 if ($m4is_v2hj) { m4is_aoxw::m4is_djr4nd();
 if (! $m4is_ig9p6) { return [];
 } if ($m4is_ig9p6 == $m4is_og6xjb) { return $m4is_pg1eul;
 } $m4is_a7b1 = [];
 if (is_array($m4is_pg1eul)) { usort($m4is_pg1eul, function($m4is_z9hvgk, $m4is_ovlj) { return $m4is_z9hvgk->comment_ID > $m4is_ovlj->comment_ID;
 });
 foreach($m4is_pg1eul as $m4is_j5sy07 => $m4is_doq8l) { $m4is__osh1e = false;
 $m4is__osh1e = $m4is__osh1e || ($m4is_ig9p6 == $m4is_doq8l->user_id);
  $m4is__osh1e = $m4is__osh1e || ($m4is_doq8l->user_id == $m4is_og6xjb);
  $m4is__osh1e = $m4is__osh1e || user_can($m4is_doq8l->user_id, 'manage_options');
  if (! $m4is__osh1e) { $m4is_a7b1[] = $m4is_doq8l->comment_ID;
 } } } if (! empty($m4is_a7b1)) { foreach($m4is_pg1eul as $m4is_j5sy07 => $m4is_doq8l) { if (in_array($m4is_doq8l->comment_ID, $m4is_a7b1) ) { unset($m4is_pg1eul[$m4is_j5sy07]);
 } if (in_array($m4is_doq8l->comment_parent, $m4is_a7b1) ) { $m4is_a7b1[] = $m4is_doq8l->comment_parent;
 unset($m4is_pg1eul[$m4is_j5sy07]);
 } } } } $this->m4is_z0f6[$m4is_cd8k] = count($m4is_pg1eul);
 return $m4is_pg1eul;
 } 
function m4is__iev($m4is_pg1eul) { global $wpdb;
 if (empty($m4is_pg1eul) ) { return $m4is_pg1eul;
 } $m4is_og6xjb = get_the_author_meta('ID');
 $m4is_ig9p6 = get_current_user_id();
 $m4is_gih5k = [];
 $m4is_cd8k = get_the_id();
 foreach($m4is_pg1eul as $m4is_doq8l) { $m4is_gih5k[] = (int) $m4is_doq8l->comment_ID;
 } if (! empty($m4is_gih5k) ) { $m4is_gih5k = implode(',', $m4is_gih5k);
 $m4is_tovizk = "SELECT `comment_id` FROM `{$wpdb->prefix}commentmeta` WHERE `meta_key` = 'memb_private' AND `meta_value` = '1' AND `comment_id` IN ( {$m4is_gih5k} )";
 $m4is_yab7 = $wpdb->get_col($m4is_tovizk);
 unset($m4is_tovizk);
 } if (! empty($m4is_yab7)) { m4is_aoxw::m4is_djr4nd();
 $m4is_n5qm = [];
 $m4is_gw9orb = $m4is_ig9p6 === $m4is_og6xjb;
 $m4is_zts3 = current_user_can('manage_options');
 $m4is_kc29lm = $m4is_zts3 || $m4is_gw9orb;
 $m4is__oyulg = is_user_logged_in();
  foreach ($m4is_pg1eul as $m4is_s2ge5 => $m4is_doq8l) { $m4is_y4li_ = $m4is__oyulg && ($m4is_ig9p6 == $m4is_doq8l->user_id);
 if (! $m4is_y4li_) { $m4is_rie2bz = in_array($m4is_doq8l->comment_ID, $m4is_yab7);
 if ($m4is_rie2bz) { if ($m4is_kc29lm) { $m4is_doq8l->comment_content = '<div class="memberium_private_comment"><strong>(' . __('MUTED') . ')</strong> ' . $m4is_doq8l->comment_content . '</div>';
 } else { $m4is_n5qm[] = $m4is_doq8l->comment_ID;
 unset($m4is_pg1eul[$m4is_s2ge5]);
 } } } }  if (! empty($m4is_n5qm)) { foreach ($m4is_pg1eul as $m4is_s2ge5 => $m4is_doq8l) { if (! empty($m4is_doq8l->comment_parent)) { if (in_array($m4is_doq8l->comment_parent, $m4is_n5qm) ) { $m4is_n5qm[] = $m4is_doq8l->comment_ID;
 unset($m4is_pg1eul[$m4is_s2ge5]);
 } } } } } $this->m4is_z0f6[$m4is_cd8k] = count($m4is_pg1eul);
 return $m4is_pg1eul;
 }     
function m4is_dy70( $m4is_oa_z, $m4is_cd8k ) { return $this->m4is_k_4p2o( $m4is_cd8k );
 }  
function m4is_it1zf( $m4is_c2ah ) : bool { $m4is_cd8k = 0;
 $m4is_ys1p9 = 0;
 if ( is_a( $m4is_c2ah, 'WP_Post' ) ) { $m4is_cd8k = $m4is_c2ah->ID;
 $m4is_ys1p9 = $m4is_c2ah->post_parent;
 } if ( is_int( $m4is_c2ah ) ) { $m4is_cd8k = $m4is_c2ah;
 $m4is_ys1p9 = wp_get_post_parent_id( $m4is_cd8k );
 } if ( ! empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'page_inheritance') ) ) { if (! empty($m4is_ys1p9) ) { $m4is_hjmi = $this->m4is_it1zf($m4is_ys1p9);
 if ($m4is_hjmi) { m4is_aoxw::m4is_djr4nd();
 return true;
 } } } $m4is_auhoe = get_post_meta( $m4is_cd8k );
 $m4is_flx71n = [ '_is4wp_access_tags', '_is4wp_access_tags2', '_is4wp_anonymous_only', '_is4wp_any_loggedin_user', '_is4wp_any_membership', '_is4wp_contact_ids', '_is4wp_membership_levels', ];
 foreach ($m4is_flx71n as $m4is_s2ge5) { if (! empty($m4is_auhoe[$m4is_s2ge5][0]) ) { m4is_aoxw::m4is_djr4nd();
 return true;
 } } return false;
 }  
function m4is_ux59ig($m4is__osh1e, $m4is_gy34l = [], $m4is_xozjum = '', $m4is_gpwr1c = '') { if ( current_user_can( 'manage_options' ) ) { return true;
 } $m4is_ig9p6 = get_current_user_id();
 $m4is_i9a1gn = is_user_logged_in();
 $m4is_hf04j = false;
 $m4is_r6nh_b = [ 'any_membership' => 0, 'contact_ids' => '', 'eval' => '', 'logged_in_only' => 0, 'logged_out_only' => 0, 'memberships' => '', 'tags1' => '', 'tags2' => '', ];
 $m4is_gy34l = wp_parse_args($m4is_gy34l, $m4is_r6nh_b);
 foreach($m4is_gy34l as $m4is_s2ge5 => $m4is_w_o7al) { if (! empty($m4is_w_o7al) ){ m4is_aoxw::m4is_djr4nd();
 break;
 } }   $m4is_tbpacm = (empty($m4is_gy34l['logged_in_only']) ? 0 : (int) (bool) $m4is_gy34l['logged_in_only']);
 if ($m4is_tbpacm && ! $m4is_i9a1gn) { return false;
 }  $m4is_ws5u0 = (empty($m4is_gy34l['logged_out_only']) ? 0 : (int) (bool) $m4is_gy34l['logged_out_only']);
 if ($m4is_ws5u0 && $m4is_i9a1gn) { return false;
 }  if (! empty($m4is_gy34l['any_membership']) ) { if (empty($_SESSION['memb_user']['membership_tags'] ) ) { return false;
 } }  if (! empty($m4is_gy34l['tags1']) ) { if (! $this->m4is_bnd6ti->m4is_sjmzx($m4is_gy34l['tags1']) ) { return false;
 } } if (! empty($m4is_gy34l['tags2']) ) { if (! $this->m4is_bnd6ti->m4is_sjmzx($m4is_gy34l['tags2']) ) { return false;
 } }  if ( $m4is_gy34l['contact_ids'] ) { $m4is_gy34l['contact_ids'] = trim( $m4is_gy34l['contact_ids'], ', ' );
 $m4is_e2kg = isset( $_SESSION['keap']['contact']['id'] ) ? (int) $_SESSION['keap']['contact']['id'] : 0;
 $m4is_k8uzp = array_filter( explode( ',', $m4is_gy34l['contact_ids'] ) );
 if ( ! in_array( $m4is_e2kg, $m4is_k8uzp ) ) { return false;
 } }   if (! empty($m4is_gy34l['memberships']) ) { $m4is_vbgri = isset($_SESSION['memb_user']['membership_tags']) ? explode(',', $_SESSION['memb_user']['membership_tags']) : [];
 $m4is_wtaorg = array_filter(explode(',', $m4is_gy34l['memberships']));
 $m4is_uz8_w = (bool) count(array_intersect($m4is_vbgri, $m4is_wtaorg) );
   if (! $m4is_uz8_w) { $m4is_xgx5td = isset($_SESSION['memb_user']['membership_level']) ? $_SESSION['memb_user']['membership_level'] : 0;
 $m4is_vew2s6 = 0;
 $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu('memberships');
  foreach ($m4is_wtaorg as $id) { if (isset($m4is_qh8p6[$id]['level']) && $m4is_qh8p6[$id]['level'] > 0) { $m4is_vew2s6 = ($m4is_qh8p6[$id]['level'] < $m4is_vew2s6) ? $m4is_qh8p6[$id]['level'] : $m4is_vew2s6;
 } } if ($m4is_vew2s6) { if ($m4is_xgx5td >= $m4is_vew2s6) { $m4is_uz8_w = true;
 } } } if (! $m4is_uz8_w) { return false;
 } } if ($m4is_gy34l['eval']) { $m4is_teq7 = $this->m4is_bnd6ti->m4is_wdqrsb('eval.php');
 $m4is_oa_z = include_once $m4is_teq7;
 if (! $m4is_oa_z) { error_log("Memberium: Eval Function Class file missing {$m4is_teq7}");
 } else { $m4is_gy34l['eval'] = 'return ' . trim(html_entity_decode($m4is_gy34l['eval'], ENT_QUOTES || ENT_HTML401 || ENT_XML1 || ENT_XHTML || ENT_HTML5)) . ';';
 $m4is_oa_z = m4is_ejoxs5::evaluate($m4is_gy34l['eval']);
 } if (! $m4is_oa_z) { return false;
 } } return true;
 } 
function m4is_k_4p2o( int $m4is_cd8k, $m4is_ig9p6 = false ) : bool { static $m4is_xrh2zj = [];
  if ( empty( $m4is_cd8k ) ) { return true;
 }  if ( function_exists( 'powerpress_is_custom_podcast_feed' ) && powerpress_is_custom_podcast_feed() ) { return true;
 } if ( function_exists( 'get_userdata' ) && user_can( $m4is_ig9p6, 'manage_options' ) ) { return true;
 } $_SESSION = empty( $_SESSION ) ? [] : $_SESSION;
 $m4is_ig9p6 = $m4is_ig9p6 === false ? get_current_user_id() : $m4is_ig9p6;
 $m4is_yvyb = empty( $_SESSION['memb_user']['user_id'] ) ? 0 : $_SESSION['memb_user']['user_id'];
 $m4is_mdqgk = $m4is_yvyb <> $m4is_ig9p6 ? $this->m4is_bnd6ti->m4is_akz3( $m4is_ig9p6 ) : $_SESSION;
 $m4is_c2ah = false;
 if ( is_super_admin() ) { return true;
 } if ( is_object( $m4is_cd8k ) ) { $m4is_c2ah = $m4is_cd8k;
 $m4is_cd8k = $m4is_c2ah->ID;
 } else { $m4is_c2ah = get_post( $m4is_cd8k );
 } if ( empty( $m4is_c2ah ) ) { return true;
 } $m4is_ss4y = $this->m4is_bnd6ti->m4is_cgzvln( 'prohibited_action_override' );
  if ( in_array( $m4is_ss4y, ['show', 'excerpt'] ) ) { return true;
 } if ( isset( $m4is_xrh2zj[$m4is_ig9p6][$m4is_cd8k] ) ) { return ! $m4is_xrh2zj[$m4is_ig9p6][$m4is_cd8k];
 }  if ( ! is_admin() ) { if ( $m4is_c2ah->post_type == 'attachment' ) { if ( $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'attachment_pages' ) ) { $m4is_xrh2zj[$m4is_ig9p6][$m4is_cd8k] = false;
 return false;
 } } } $m4is_iqd2 = $this->m4is_bnd6ti->m4is_oiewvu();
 $m4is_hf04j = false;
 $m4is_pb8p = false;
 $m4is_xz2btv = 0;
  $m4is_s275tl = 0;
 $m4is_auhoe = $this->m4is_bnd6ti->m4is_rvz2( $m4is_cd8k, '' );
 $m4is_qnh5xe = empty( $m4is_mdqgk['memb_user']['crm_id'] ) ? 0 : $m4is_mdqgk['memb_user']['crm_id'];
 $m4is_uik4q = $m4is_ig9p6 == $m4is_yvyb;
    if ( ! empty( $m4is_auhoe['_is4wp_force_public'] ) ) { return true;
 }  if ( function_exists( 'is_user_logged_in' ) && ! is_user_logged_in() ) {  if ( $m4is_auhoe['_is4wp_facebook_crawler'] ) { if ( $this->m4is_wpihx() || $this->m4is_c41tl() ) { return true;
 } }   if ( $m4is_auhoe['_is4wp_google_1stclick'] ) { if ( $this->m4is_rtjc58() || $this->m4is_ap8x() ) { return true;
 } if ( isset( $_SERVER['HTTP_REFERER'] ) && stristr( $_SERVER['HTTP_REFERER'], 'google.' ) !== FALSE ) { return true;
 }  if ( isset( $_SERVER['HTTP_REFERER'] ) && stripos( $_SERVER['HTTP_REFERER'], 'https://www.facebook.com/' ) === 0 ) { return true;
 } } } else {  if ( $m4is_auhoe['_is4wp_anonymous_only'] && function_exists( 'is_user_logged_in' ) && is_user_logged_in() ) { return false;
 } }   if ( isset( $m4is_iqd2['settings']['login_url'] ) && $m4is_iqd2['settings']['login_url'] > 0 && $m4is_iqd2['settings']['login_url'] == $m4is_cd8k ) { return true;
 }  if ( ( $m4is_c2ah->post_parent > 0) && ( ! empty( $m4is_iqd2['settings']['page_inheritance'] ) ) && ( ! $this->m4is_k_4p2o( $m4is_c2ah->post_parent, $m4is_ig9p6 ) ) ) { return false;
 }  if ( $m4is_auhoe['_is4wp_any_loggedin_user'] && function_exists( 'is_user_logged_in' ) && ! is_user_logged_in() ) { $m4is_hf04j = true;
 }  if ( ! $m4is_hf04j ) { if ( ! empty( trim( $m4is_auhoe['_is4wp_contact_ids'] ) ) ) { $m4is_k8uzp = array_filter( explode( ',', $m4is_auhoe['_is4wp_contact_ids'] ) );
 if ( ! in_array( $m4is_qnh5xe, $m4is_k8uzp ) ) { $m4is_hf04j = TRUE;
 } } }  if ( ! $m4is_hf04j ) { if ( $m4is_auhoe['_is4wp_any_membership'] && empty( $m4is_mdqgk['memb_user']['membership_tags'] ) ) { $m4is_hf04j = TRUE;
 } }  if ( ! $m4is_hf04j ) { $m4is_emqnd = FALSE;
 $m4is_qetrg = $m4is_auhoe['_is4wp_membership_levels'];
 if ( $m4is_qetrg > '' ) { $m4is_iystd2 = array_filter( explode( ',', $m4is_qetrg ) );
  if (is_array($m4is_iystd2) ) { foreach ($m4is_iystd2 as $m4is_mpia) { if (isset($m4is_iqd2['memberships'][$m4is_mpia]) ) { if ($m4is_s275tl == 0) { $m4is_s275tl = isset($m4is_iqd2['memberships'][$m4is_mpia]['level']) ? (int) $m4is_iqd2['memberships'][$m4is_mpia]['level'] : 0;
 } else { $m4is_s275tl = (int) ($m4is_iqd2['memberships'][$m4is_mpia]['level'] < $m4is_s275tl) ? $m4is_iqd2['memberships'][$m4is_mpia]['level'] : $m4is_s275tl;
 } } } } if ( ! empty ( $m4is_mdqgk['memb_user']['membership_tags'] ) ) { $m4is_iystd2 = array_filter( explode( ',', $m4is_qetrg ) );
 $m4is_x0vq = array_filter( explode( ',', $_SESSION['memb_user']['membership_tags'] ) );
 foreach ( $m4is_iystd2 as $m4is_mpia ) { $m4is_p4inde = $m4is_mpia;
 $m4is_o5xas = empty( $m4is_iqd2['memberships'][$m4is_mpia] ) ? [] : $m4is_iqd2['memberships'][$m4is_mpia];
 $m4is_mzkl8 = isset( $m4is_o5xas['payf_id'] ) ? $m4is_o5xas['payf_id'] : 0;
 $m4is_lj59 = isset( $m4is_o5xas['cancel_id'] ) ? $m4is_o5xas['cancel_id'] : 0;
 $m4is__old6 = isset( $m4is_o5xas['suspend_id'] ) ? $m4is_o5xas['suspend_id'] : 0;
  if ( in_array( $m4is_p4inde, $m4is_x0vq ) ) { if ( in_array( $m4is_mzkl8, $m4is_x0vq ) || in_array( $m4is_lj59, $m4is_x0vq ) || in_array( $m4is__old6, $m4is_x0vq ) ) { $m4is_xz2btv++;
 } else {  $m4is_s275tl = $m4is_o5xas['level'] > $m4is_s275tl ? $m4is_o5xas['level'] : $m4is_s275tl;
 $m4is_emqnd = TRUE;
 $m4is_xz2btv--;
 } } } } else { $m4is_emqnd = FALSE;
 } $m4is_l1nfij = isset( $m4is_mdqgk['memb_user']['membership_level'] ) ? $m4is_mdqgk['memb_user']['membership_level'] : 0;
 if ( $m4is_l1nfij > $m4is_s275tl ) { $m4is_emqnd = TRUE;
 } $m4is_hf04j = $m4is_hf04j || ! $m4is_emqnd;
 } else { $m4is_emqnd = TRUE;
 } }  if ( $m4is_xz2btv < 1 && ! $m4is_hf04j && ! empty( $m4is_auhoe['_is4wp_access_tags'] ) ) { if ( ! $this->m4is_bnd6ti->m4is_sjmzx( $m4is_auhoe['_is4wp_access_tags'] ) ) { $m4is_hf04j = true;
 } if (! $m4is_hf04j && ! empty($m4is_auhoe['_is4wp_access_tags2']) ) { if (! $this->m4is_bnd6ti->m4is_sjmzx($m4is_auhoe['_is4wp_access_tags2']) ) { $m4is_hf04j = true;
 } } } if ( $m4is_uik4q ) { $m4is_xrh2zj[$m4is_ig9p6][$m4is_cd8k] = (int) $m4is_hf04j;
 } return ! $m4is_hf04j;
 } 
function m4is_yzvq( $m4is_t0lr4, $m4is_jfhsgr ) { global $wp_query;
 if (function_exists('wp_get_current_user') && current_user_can('manage_options') ) { return $m4is_t0lr4;
 } if (! is_array($m4is_t0lr4) ) { $m4is_t0lr4 = [$m4is_t0lr4];
 } if (defined('DOING_AJAX') ) { return $m4is_t0lr4;
 } $m4is_bicp7u = $this->m4is_askjf();
 $m4is_sjcwp = count($m4is_t0lr4);
 $m4is_n7bvl = [];
 $m4is_mbn2q = is_singular();
 $m4is_j_fwpq = ! $m4is_mbn2q;
 foreach ($m4is_t0lr4 as $m4is_c2ah) { $m4is_cd8k = $m4is_c2ah->ID;
 $m4is__cxjmv = (int) $m4is_c2ah->post_parent;
 $post_visible = $this->m4is_k_4p2o($m4is_cd8k);
 $m4is_j_fwpq = $m4is_j_fwpq || ($m4is_bicp7u <> $m4is_cd8k);
 if ($post_visible) { $m4is_n7bvl[] = $m4is_c2ah;
 } else { if ( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_page_redirect') > '') { $m4is_uik4q = FALSE;
 } else { $m4is_uik4q = $this->can_cache;
 $m4is_uik4q = FALSE;
 }  $m4is_b3h6t = $this->m4is_waob_($m4is_cd8k, false);
 if ($m4is_b3h6t == 'redirect') { $m4is_b3h6t = 'hide';
 }     if ($m4is_b3h6t == 'excerpt') { if (trim($m4is_c2ah->post_excerpt) > '') { $m4is_c2ah->post_content = $m4is_c2ah->post_excerpt;
 } else { $m4is_c2ah->post_content = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'global_excerpt');
 } $m4is_c2ah->excerpt_only = 1;
 $m4is_n7bvl[] = $m4is_c2ah;
 } if ($m4is_j_fwpq && $m4is_b3h6t == 'redirect') { $m4is_b3h6t = 'hide';
 }   if ( $m4is_mbn2q ) { if ($m4is_b3h6t == 'hide') { if ( isset($GLOBALS['the_wp_query']) && method_exists($GLOBALS['the_wp_query'], 'set_404') && is_single($m4is_cd8k) ) { $GLOBALS['the_wp_query']->set_404();
 } } if ($m4is_b3h6t == 'redirect') { $this->m4is_yhf0($m4is_cd8k, 'Memberium Page Protection');
 } } } }  return $m4is_n7bvl;
 } 
function m4is_mul3i( $m4is_t0lr4, $m4is_jo8fb ) { global $wp_query;
 if ( current_user_can( 'manage_options' ) ) { return $m4is_t0lr4;
 }  if ( isset( $m4is_jo8fb->query['post_type'] ) && $m4is_jo8fb->query['post_type'] == 'wp_global_styles' ) { return $m4is_t0lr4;
 } if ( ! is_array($m4is_t0lr4) && ! is_object($m4is_t0lr4) ) { return $m4is_t0lr4;
 } if ( ! is_array($m4is_t0lr4) ) { $m4is_t0lr4 = [$m4is_t0lr4];
 } if ( empty( $m4is_t0lr4 ) ) { return $m4is_t0lr4;
 } if ( empty( $this->m4is_dbhgup ) ) { global $wp_the_query;
 if ( ! empty( $wp_the_query->is_singular ) ) { if ( isset( $m4is_jo8fb->posts[0]->ID ) ) { $this->m4is_dbhgup = $m4is_jo8fb->posts[0]->ID;
 } } } static $m4is_dypr = 0;
 $m4is_dypr++;
 $m4is_n7bvl = [];
 $m4is_sjcwp = count($m4is_t0lr4);
 $m4is_uik4q = false;
 $m4is_j7bh = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'force_learndash_inheritance', 0 );
 $m4is_gb7l2k = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'default_page_redirect', 0 );
 $m4is_hmc9v = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'global_excerpt', 0 );
 $m4is_mz6pm = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'autogenerate_excerpts', 0 );
 $m4is_axa0_j = apply_filters( 'memberium/ignored_post_types', ['elementor_library'] );
  $m4is_swz7g9 = [ 'reply', 'topic', ];
 foreach ( $m4is_t0lr4 as $m4is_c2ah ) { if ( in_array( $m4is_c2ah->post_type, $m4is_axa0_j ) ) { $m4is_n7bvl[] = $m4is_c2ah;
 break;
 } $m4is_a_hn = $m4is_c2ah->post_type;
 $m4is_cd8k = $m4is_c2ah->ID;
 $m4is__cxjmv = (int) $m4is_c2ah->post_parent;
 $m4is_r8owr = $this->m4is_k_4p2o( $m4is_cd8k );
 if (empty($m4is_c2ah->post_excerpt) ) { $m4is_c2ah->post_excerpt = $this->m4is_el2h($m4is_c2ah);
 } if (! empty($m4is_j7bh) ) {  $m4is_swz7g9 = [ 'sfwd-lessons', 'sfwd-quiz', 'sfwd-topic', ];
 if ( in_array( $m4is_a_hn, $m4is_swz7g9 ) ) { $m4is_nsnp = (int) get_post_meta( $m4is_c2ah->ID, 'course_id', true) ;
 $m4is_hc6lfy = (int) get_post_meta( $m4is_c2ah->ID, 'lesson_id', true) ;
 if ($m4is_r8owr && $m4is_nsnp) { $m4is_r8owr = $this->m4is_k_4p2o($m4is_nsnp);
 } if ($m4is_r8owr && $m4is_hc6lfy) { $m4is_r8owr = $this->m4is_k_4p2o($m4is_hc6lfy);
 } } } if ($m4is_r8owr) { $m4is_c2ah = $this->m4is_hui_o($m4is_c2ah);
 $m4is_n7bvl[] = $m4is_c2ah;
 } elseif (in_array($m4is_a_hn, $this->m4is_kwy68) ) { if (! empty($m4is_c2ah->post_excerpt) ) { $m4is_c2ah->post_excerpt = $this->m4is_el2h($m4is_c2ah);
 $m4is_c2ah->post_content = $m4is_c2ah->post_excerpt;
 } else { $m4is_c2ah->post_content = $this->m4is_dvu19('', $m4is_c2ah);
 } $m4is_c2ah->post_excerpt = $this->m4is_el2h($m4is_c2ah);
 $m4is_n7bvl[] = $m4is_c2ah;
 } else { if ( ! empty( $m4is_gb7l2k ) ) { $m4is_uik4q = false;
 } else { $m4is_uik4q = $this->can_cache;
 $m4is_uik4q = false;
 }  $m4is_b3h6t = $this->m4is_waob_( $m4is_cd8k, false );
 if ( $m4is_b3h6t == 'redirect' ) { $m4is_miakq = false;
  $m4is_miakq = $this->m4is_dbhgup !== $m4is_cd8k;
 $m4is_miakq = $m4is_miakq || headers_sent();
 $m4is_miakq = $m4is_miakq || wp_doing_ajax();
 $m4is_miakq = $m4is_miakq || $this->m4is_bnd6ti->m4is_uy_u();
 if ( $m4is_miakq ) { $m4is_b3h6t = 'hide';
 } }     if ($m4is_b3h6t == 'excerpt') { if (trim($m4is_c2ah->post_excerpt) > '') { $m4is_c2ah->post_content = $m4is_c2ah->post_excerpt;
 } else { $m4is_c2ah->post_excerpt = $this->m4is_el2h($m4is_c2ah);
 $m4is_c2ah->post_content = $m4is_c2ah->post_excerpt;
 $m4is_c2ah->post_content .= $m4is_hmc9v;
 } $m4is_c2ah->excerpt_only = 1;
 $m4is_n7bvl[] = $m4is_c2ah;
 } elseif ($m4is_b3h6t == 'hide') {  if (method_exists($m4is_jo8fb, 'set_404') && is_single() ) { $m4is_jo8fb->set_404();
 } } elseif ( $m4is_b3h6t == 'redirect' ) { $this->m4is_yhf0( $m4is_cd8k, 'Memberium Post Protection' );
 exit;
 } } } if ($m4is_mz6pm && ! is_singular() ) { foreach ($m4is_n7bvl as &$new_post) { $new_post->post_content = $new_post->post_excerpt;
 } }  $new_count = count($m4is_n7bvl);
 if ($new_count <> count($m4is_jo8fb->posts) ) { $m4is_jo8fb->posts = $m4is_n7bvl;
 $m4is_jo8fb->found_posts = ($m4is_jo8fb->found_posts - ($m4is_sjcwp - count($m4is_n7bvl) ) );
 if ($m4is_jo8fb->query_vars['posts_per_page']) { $m4is_jo8fb->max_num_pages = (int) ceil($m4is_jo8fb->found_posts / $m4is_jo8fb->query_vars['posts_per_page']);
 } } return $m4is_n7bvl;
 } private 
function m4is__i9cjs() { if ( is_admin() ) { return;
 } if ( ! $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'attachment_pages', 0 ) ) { return;
 } add_filter( 'attachment_link', function( $m4is_rlp0 ) { return;
 } );
 add_filter( 'rewrite_rules_array', function( $m4is_w3295z ) { foreach ( $m4is_w3295z as $m4is__dmn => $m4is_jo8fb ) { if ( strpos( $m4is__dmn, 'attachment' ) || strpos( $m4is_jo8fb, 'attachment' ) ) { unset( $m4is_w3295z[$m4is__dmn] );
 } } return $m4is_w3295z;
 });
 }    
function m4is_el2h($m4is_c2ah) { if (! is_a($m4is_c2ah, 'WP_Post') ) { return;
 } if (empty($m4is_c2ah->post_excerpt)) { $m4is_mz6pm = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'autogenerate_excerpts');
 $m4is_v9ex = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'include_default_excerpt');
 if ($m4is_mz6pm) { $m4is_c2ah->post_excerpt = trim($this->m4is_x940v($m4is_c2ah->post_excerpt) );
 $m4is__c2rqo = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'excerpt_length', 55);
 $m4is_c2ah->post_excerpt = wp_trim_words(strip_shortcodes($this->m4is_x940v($m4is_c2ah->post_content) ), $m4is__c2rqo);
 } if (! empty($m4is_v9ex) ) { $m4is_hmc9v = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'global_excerpt');
 if (! empty($m4is_hmc9v)) { if ($m4is_v9ex == 'append') { $m4is_c2ah->post_excerpt .= $m4is_hmc9v;
 } elseif ($m4is_v9ex == 'prepend') { $m4is_c2ah->post_excerpt = $m4is_hmc9v . $m4is_c2ah->post_excerpt;
 } elseif ($m4is_v9ex == 'embed') { $m4is_c2ah->post_excerpt = str_replace('{{excerpt}}', $m4is_c2ah->post_excerpt, $m4is_hmc9v);
 } } } } $m4is_c2ah->post_excerpt = str_replace('{{excerpt}}', '', $m4is_c2ah->post_excerpt);
 return $m4is_c2ah->post_excerpt;
 } 
function m4is_x940v($m4is_z50f) { if (strpos($m4is_z50f, '[vc_') !== false) { $m4is_z50f = preg_replace('/\[vc_.*\]/', '', $m4is_z50f);
 $m4is_z50f = preg_replace('/\[\/vc_.*\]/', '', $m4is_z50f);
 $m4is_z50f = preg_replace('/\[et_.*\]/', '', $m4is_z50f);
 $m4is_z50f = preg_replace('/\[\/et_.*\]/', '', $m4is_z50f);
 } return $m4is_z50f;
 } 
function m4is_aotk8($m4is_c2ah) { if (is_a($m4is_c2ah, 'WP_Post') ) { $m4is_c2ah->post_excerpt = $this->m4is_el2h($m4is_c2ah);
 } return $m4is_c2ah;
 } 
function m4is_yhf0(int $m4is_cd8k, string $m4is_unc_q = '') { if (headers_sent() ) { return;
 } $m4is_b5kaz0 = get_post_meta($m4is_cd8k, '_is4wp_redirect_url', TRUE);
 $m4is_c14oc = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'login_url');
 if ($m4is_b5kaz0 == '') { $m4is_b5kaz0 = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_page_redirect');
 } if ($m4is_b5kaz0 == '') { if ($m4is_c14oc < 1) { $m4is_b5kaz0 = wp_login_url(site_url() );
 } else { $m4is_b5kaz0 = get_permalink($m4is_c14oc);
 } } $m4is_b5kaz0 = str_replace('{{current.url}}', $_SERVER['REQUEST_URI'], $m4is_b5kaz0);
 $m4is_b5kaz0 = str_replace('{{cachebuster}}', mt_rand(1000000, 9999999), $m4is_b5kaz0);
 if (! empty($_SESSION['memb_user']['login_page']) ) { $m4is_b5kaz0 = str_replace('{{member.homepage}}', get_permalink($_SESSION['memb_user']['login_page']), $m4is_b5kaz0);
 } else { $m4is_b5kaz0 = str_replace('{{member.homepage}}', site_url(), $m4is_b5kaz0);
 } if (! empty($_SESSION['memb_user']['logout_page']) ) { $m4is_b5kaz0 = str_replace('{{member.logout}}', get_permalink($_SESSION['memb_user']['logout_page']), $m4is_b5kaz0);
 } else { $m4is_b5kaz0 = str_replace('{{member.logout}}', site_url(), $m4is_b5kaz0);
 } if (stripos($m4is_b5kaz0, '{{post.') !== FALSE) { $m4is_b5kaz0 = preg_replace_callback('|({{post\.(.*)}})|U', function($m4is_ogxo) { return get_permalink($m4is_ogxo[2]);
 }, $m4is_b5kaz0);
 } $m4is_b5kaz0 = trim(do_shortcode($m4is_b5kaz0) );
 $m4is_b5kaz0 = apply_filters('memberium_post_redirect_url', $m4is_b5kaz0, $m4is_cd8k);
 if (! empty( $m4is_b5kaz0 ) ) { m4is_aoxw::m4is_g7bv();
 wp_redirect($m4is_b5kaz0, 302, $m4is_unc_q);
 exit;
 } }  
function m4is_waob_( $m4is_cd8k, $m4is_f1ieo = NULL ) {  if ( ! function_exists( 'wp_get_current_user' ) ) { return 'granted';
 } if ( $this->m4is_bnd6ti->m4is_lvmz1b() ) { return 'granted';
 } if ( ! get_post_status( $m4is_cd8k ) ) { return 'hide';
 } $m4is_qro7t = true;
 $m4is_c2bc = [];
    if ( $this->m4is_bnd6ti->m4is_cgzvln( 'prohibited_action_override' ) == '' ) { $m4is_b3h6t = strtolower( trim ( get_post_meta( $m4is_cd8k, '_is4wp_prohibited_action', true ) ) );
 } else { $m4is_b3h6t = $this->m4is_bnd6ti->m4is_cgzvln('prohibited_action_override');
 $m4is_qro7t = false;
 $m4is_c2bc[] = 'Prohibited Action Override';
 } if ($m4is_b3h6t == 'show') { $m4is_b3h6t = 'granted';
 $m4is_c2bc[] = 'Prohibited Action  = Show';
 }  if ($m4is_b3h6t == 'default' || $m4is_b3h6t == '') { $m4is_b3h6t = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_prohibited_action');
 if ($m4is_b3h6t == '') { $m4is_b3h6t = 'hide';
 $m4is_c2bc[] = 'Prohibited Action is empty ' . __LINE__;
 } } if ($m4is_b3h6t == '') { $m4is_b3h6t = 'hide';
 $m4is_c2bc[] = 'Prohibited Action is empty ' . __LINE__;
 } if ($m4is_b3h6t == 'excerpt') { if (strtolower(wp_get_theme() ) == 'optimizepress') { $m4is_b3h6t = 'redirect';
 $m4is_c2bc[] = 'OptimizePress Theme ' . __LINE__;
 } } if ($m4is_b3h6t == 'redirect') { if ((! empty($post->ID) ) && $this->m4is_askjf() !== $m4is_cd8k) { $m4is_b3h6t = 'hide';
 } elseif ($this->in_list == 1) { $m4is_b3h6t = 'hide';
 } elseif (! is_singular() ) { $m4is_b3h6t = 'hide';
 } elseif (in_the_loop() ) { $m4is_b3h6t = 'hide';
 } elseif (is_search() ) { $m4is_b3h6t = 'hide';
 } elseif(is_archive() ) { $m4is_b3h6t = 'hide';
 } elseif(is_preview() ) { $m4is_b3h6t = 'hide';
 } elseif(is_feed() ) { $m4is_b3h6t = 'hide';
 } elseif(! is_main_query() ) { $m4is_b3h6t = 'hide';
 } }  if ($m4is_b3h6t == 'redirect') { }  if ($m4is_qro7t) { $m4is_xrh2zj[$m4is_cd8k] = $m4is_b3h6t;
 } return $m4is_b3h6t;
 }  
function m4is_lp275a( $m4is_nqoin = false, $m4is_gxzoyi = [] ) : bool { if ( $this->is_administrator ) { return false;
 } if ( $this->m4is_bnd6ti->m4is_dpuy9() == 0) { return false;
 }  $m4is_aj9m = [];
 $m4is_iystd2 = array_filter( explode( ',', $_SESSION['memb_user']['tags'] ) );
 $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu( 'memberships' );
  if (! is_array($m4is_gxzoyi) && $m4is_gxzoyi > '') { $m4is_gxzoyi = explode(',', $m4is_gxzoyi);
 } if (is_array($m4is_gxzoyi) ) { foreach ($m4is_gxzoyi as &$level) { $level = strtolower(trim($level) );
 } }  if (is_array($m4is_qh8p6) ) { foreach ($m4is_qh8p6 as $m4is_o5xas) { if (empty($m4is_gxzoyi) || in_array(trim(strtolower($m4is_o5xas['name']) ), $m4is_gxzoyi) ) { $m4is_aj9m[] = $m4is_o5xas['payf_id'];
 if (! $m4is_nqoin) { $m4is_aj9m[] = $m4is_o5xas['cancel_id'];
 $m4is_aj9m[] = $m4is_o5xas['suspend_id'];
 } } } } return (boolean) count(array_intersect($m4is_iystd2, $m4is_aj9m) );
 }     
function m4is_k6apl_($m4is_jjzfs, $m4is_cd8k) { if (! $m4is_jjzfs) { $m4is_omf81j = trim(get_post_meta($m4is_cd8k, '_is4wp_can_comment', true) );
 if (! empty($m4is_omf81j) ) { $m4is_jjzfs = (bool) $this->m4is_bnd6ti->m4is_sjmzx($m4is_omf81j);
 } } return $m4is_jjzfs;
 } 
function m4is_hui_o($m4is_c2ah) { if (is_integer($m4is_c2ah) ) { $m4is_c2ah = get_post($m4is_c2ah);
 } if (is_a($m4is_c2ah, 'WP_Post') ) { if ($m4is_c2ah->comment_status == 'open') { return $m4is_c2ah;
 } $m4is_myi97c = trim(get_post_meta($m4is_c2ah->ID, '_is4wp_can_comment', true) );
 if (empty($m4is_myi97c) ) { return $m4is_c2ah;
 } else { if ( $this->m4is_bnd6ti->m4is_sjmzx($m4is_myi97c) ) { $m4is_c2ah->comment_status = 'open';
 return $m4is_c2ah;
 } } } return $m4is_c2ah;
 }  
function m4is_i0bwe($m4is_q8wd, $m4is_ymqci, $m4is_doq8l) { if ($m4is_ymqci != $m4is_q8wd) { if ($m4is_q8wd == 'approved') { $m4is_cd8k = $m4is_doq8l->comment_post_ID;
 $m4is_e2kg = $this->m4is_bnd6ti->m4is_gz8a($m4is_doq8l->comment_author_email);
 if (! $m4is_e2kg || ! $m4is_cd8k) { return;
 } $m4is_iystd2 = get_post_meta($m4is_cd8k, '_is4wp_commenter_tag', true);
 $m4is_oa_j2 = get_post_meta($m4is_cd8k, '_is4wp_commenter_action', true);
 $m4is_w5rnb = get_post_meta($m4is_cd8k, '_is4wp_commenter_goal', true);
 if ($m4is_iystd2 > '') { $this->m4is_bnd6ti->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 } if ($m4is_oa_j2 > '') { $this->m4is_bnd6ti->m4is_u86vzq($m4is_oa_j2, $m4is_e2kg);
 } if ($m4is_w5rnb > '') { $this->m4is_bnd6ti->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg);
 } } } }  
function m4is_gcfn($m4is_qpno, $m4is_doq8l) { $m4is_ig9p6 = $m4is_doq8l->user_id;
 $m4is_cbpv = (bool) get_user_meta($m4is_ig9p6, 'memberium_private_comments', true );
 update_comment_meta($m4is_qpno, 'memb_private', $m4is_cbpv);
 if ($m4is_doq8l->comment_approved == 1) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 $m4is_cd8k = $m4is_doq8l->comment_post_ID;
 if (! $m4is_e2kg || ! $m4is_cd8k) { return;
 } $m4is_iystd2 = get_post_meta($m4is_cd8k, '_is4wp_commenter_tag', true);
 $m4is_oa_j2 = get_post_meta($m4is_cd8k, '_is4wp_commenter_action', true);
 $m4is_w5rnb = get_post_meta($m4is_cd8k, '_is4wp_commenter_goal', true);
 if ($m4is_iystd2 > '') { $this->m4is_bnd6ti->m4is_tcle75($m4is_iystd2, $m4is_e2kg );
 } if ($m4is_oa_j2 > '') { $this->m4is_bnd6ti->m4is_u86vzq($m4is_oa_j2, $m4is_e2kg);
 } if ($m4is_w5rnb > '') { $this->m4is_bnd6ti->m4is_cqe6_($m4is_w5rnb, $m4is_e2kg);
 } } }  
function m4is_xp0vc($m4is__ql9vk, $m4is_n01k, $m4is_k4yeul) { $this->in_list = 1;
 $m4is_gub8 = [];
 $m4is_zts3 = current_user_can('manage_options');
  if (is_array($m4is__ql9vk) ) { foreach ($m4is__ql9vk as $m4is_s2ge5 => $m4is_f852) { $m4is_coyid_ = true;
 $m4is_cd8k = (int) $m4is_f852->ID;
 $m4is_k4atn = (int) $m4is_f852->menu_item_parent;
 $m4is_rvlki9 = [ '{{' => '[', '}}' => ']', ];
 if (! $m4is_zts3) { if ($m4is_coyid_) { if ($m4is_f852->menu_item_parent > 0 && in_array($m4is_f852->menu_item_parent, $m4is_gub8) ) { $m4is_coyid_ = false;
 } } if ($m4is_coyid_) { $m4is_coyid_ = ! (boolean) get_post_meta($m4is_cd8k, '_is4wp_hide_from_menu', true);
 }  if ($m4is_coyid_) { if ($m4is_f852->type == 'post_type' && ! $this->m4is_k_4p2o($m4is_cd8k) ) { $m4is_b3h6t = $this->m4is_waob_($m4is_cd8k);
  if ($m4is_b3h6t == 'hide' || $m4is_b3h6t == 'redirect') { $m4is_coyid_ = false;
 } } } } if ($m4is_coyid_) { if (strpos($m4is_f852->name, '[') !== false || strpos($m4is_f852->name, '{{') !== false) { $m4is_carw7y = strtr($m4is__ql9vk[$m4is_s2ge5]->name, $m4is_rvlki9);
 $m4is__ql9vk[$m4is_s2ge5]->name = do_shortcode($m4is_carw7y);
 } if (strpos($m4is_f852->url, '[') !== false || strpos($m4is_f852->url, '{{') !== false) { $m4is_carw7y = strtr($m4is__ql9vk[$m4is_s2ge5]->url, $m4is_rvlki9);
 $m4is__ql9vk[$m4is_s2ge5]->url = do_shortcode(urldecode($m4is_carw7y) );
 } } if (! $m4is_coyid_) { $m4is_gub8[] = $m4is_cd8k;
 unset($m4is__ql9vk[$m4is_s2ge5]);
 } } } $this->in_list = 0;
 return $m4is__ql9vk;
 }  
function m4is_mzl1jn( $m4is_fj9_mf ) { if ( ! is_array( $m4is_fj9_mf ) || empty( $m4is_fj9_mf ) ) { return $m4is_fj9_mf;
 } $this->in_list = 1;
 $m4is_gub8 = [];
 $m4is_a3wr = empty( $_SESSION['memb_user']['logout_page'] ) ? site_url( '/' ) : get_permalink( $_SESSION['memb_user']['logout_page'] );
 $m4is_jfj8u = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'login_url');
 $m4is_zts3 = current_user_can('manage_options');
 foreach ($m4is_fj9_mf as $m4is_s2ge5 => $m4is_sa4k) { $m4is_coyid_ = true;
 $m4is_waly = (int) $m4is_sa4k->ID;
 $m4is_cd8k = (int) $m4is_sa4k->object_id;
 $m4is_k4atn = (int) $m4is_sa4k->menu_item_parent;
 if (! $m4is_zts3) {  if ($m4is_coyid_) { if ($m4is_sa4k->menu_item_parent > 0 && in_array($m4is_sa4k->menu_item_parent, $m4is_gub8) ) { $m4is_coyid_ = false;
 } } if ($m4is_coyid_ && $m4is_sa4k->type == 'post_type' ) { $m4is_coyid_ = ! (boolean) get_post_meta($m4is_sa4k->object_id, '_is4wp_hide_from_menu', true);
 }  if ($m4is_coyid_) { if ($m4is_sa4k->type == 'post_type' && ! $this->m4is_k_4p2o($m4is_cd8k) ) { $m4is_b3h6t = $this->m4is_waob_($m4is_cd8k);
  if ($m4is_b3h6t == 'hide' || $m4is_b3h6t == 'redirect') { $m4is_coyid_ = false;
 } } } }   if ( $m4is_coyid_ ) { if ( stripos( $m4is_sa4k->url, '/memberium:logout' ) !== false ) { if ( is_user_logged_in() ) { $m4is_mx6z7s = substr( $m4is_sa4k->url, 18 );
 if ( $m4is_mx6z7s == '' ) { $m4is_mx6z7s = $m4is_a3wr;
 } $m4is_fj9_mf[$m4is_s2ge5]->url = wp_logout_url( $m4is_mx6z7s );
 } else { $m4is_coyid_ = false;
 } }  if ( stripos( $m4is_sa4k->url, '/memberium:loginlogout') !== false ) { if ( is_user_logged_in() ) {  $m4is_fj9_mf[$m4is_s2ge5]->url = wp_logout_url( site_url('/') );
 } else {  if (! empty($m4is_jfj8u) ) { $m4is_fj9_mf[$m4is_s2ge5]->url = get_permalink($m4is_jfj8u);
 } else { $m4is_fj9_mf[$m4is_s2ge5]->url = wp_login_url();
 } } $m4is_mx6z7s = substr( $m4is_sa4k->url, 18 );
 if ( empty($m4is_mx6z7s) ) { $m4is_mx6z7s = site_url('/');
 } }  if (stripos($m4is_sa4k->url, '/memberium:autologin') !== FALSE) {   $parts = explode('|', $m4is_sa4k->url);
 }  $m4is_fj9_mf[$m4is_s2ge5]->title = do_shortcode($m4is_sa4k->title);
 } if (! $m4is_coyid_) { $m4is_gub8[] = $m4is_sa4k->ID;
 unset( $m4is_fj9_mf[$m4is_s2ge5] );
 } } $this->in_list = 0;
 return $m4is_fj9_mf;
 }  
function m4is_pcpsx() { $m4is_k4yeul = [ 'response' => 403, 'code' => __('Public RSS Feed Unavailable'), 'exit' => true, ];
 wp_die( __('No feed available, please visit our homepage.'), __('Access Denied'), $m4is_k4yeul );
 }  
function m4is_mw_a9($m4is_v6fdv4) { $m4is_v6fdv4 = strtolower(trim($m4is_v6fdv4) );
 $m4is_oa_j2 = [ 'default', 'excerpt', 'hide', 'redirect', ];
 if ($m4is_v6fdv4 == '' || in_array($m4is_v6fdv4, $m4is_oa_j2) ) { $this->m4is_bnd6ti->m4is_bbvp('prohibited_action_override', $m4is_v6fdv4);
 return true;
 } else { return false;
 } }  
function m4is_nnv5d($m4is_v6fdv4) { $m4is_v6fdv4 = strtolower(trim($m4is_v6fdv4) );
 $m4is_k13wb = [ 'hide', 'show', 'excerpt', 'default' , 'redirect' ];
 if ( in_array( $m4is_v6fdv4, $m4is_k13wb ) ) { $this->m4is_bnd6ti->m4is_bbvp( 'prohibited_action_override', $m4is_v6fdv4 );
 return true;
 } return false;
 } 
function m4is_uy2l( $m4is_vg0jw ) : int { $m4is_vg0jw = (int) $m4is_vg0jw;
 $m4is__c2rqo = (int) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'excerpt_length' );
 if ( $m4is__c2rqo > 0) { $m4is_vg0jw = $m4is__c2rqo;
 } return $m4is_vg0jw;
 }     
function m4is_nz9a() : bool { $i2sdk_options = $this->m4is_bnd6ti->get_i2sdk_options();
 return $i2sdk_options['server_verified'] == 1;
 }  
function m4is_fkajlu( string $m4is_yxwn, bool $m4is_uq5og = true ) : string { $m4is_yxwn = strtolower( trim( $m4is_yxwn ) );
 $m4is_w_o7al = m4is_wbc8os::m4is_iqywok( $m4is_yxwn );
 if ( $m4is_uq5og ) { $m4is_w_o7al = htmlspecialchars( $m4is_w_o7al );
 } return $m4is_w_o7al;
 }  
function m4is_tud7(string $m4is_yxwn, bool $m4is_uq5og = true) { $m4is_yxwn = strtolower(trim($m4is_yxwn) );
 $m4is_w_o7al = m4is_wbc8os::m4is_sfnmc($m4is_yxwn);
 if ($m4is_uq5og) { $m4is_w_o7al = htmlspecialchars($m4is_w_o7al);
 } return $m4is_w_o7al;
 }  
function m4is_x3yw9r($m4is_pzgsjx) { static $m4is_zg8z;
 $m4is_pzgsjx = strtolower(trim($m4is_pzgsjx) );
 if ($m4is_pzgsjx == '') { return 0;
 } if (isset($m4is_zg8z[$m4is_pzgsjx]) ) { return $m4is_zg8z[$m4is_pzgsjx];
 } $m4is_oop72h = 'memberium_emailstat_' .md5($m4is_pzgsjx);
 $m4is_in1u = get_transient($m4is_oop72h);
 if ($m4is_in1u) { return $m4is_in1u;
 } $m4is_zg8z[$m4is_pzgsjx] = $this->m4is_bnd6ti->m4is_zw_n()->optstatus($m4is_pzgsjx);
 set_transient($m4is_oop72h, $m4is_zg8z[$m4is_pzgsjx], 300);
 return $m4is_zg8z[$m4is_pzgsjx];
 } 
function m4is__mhc(string $m4is_lv7wu, string $m4is_avxtze = 'ec2') : bool { $m4is_cxh7 = m4is_vv5u::m4is_ddwu();
 $m4is_lv7wu = m4is_vv5u::m4is_s15o8k();
 if (is_array($m4is_cxh7) ) { foreach ($m4is_cxh7 as $m4is_o160v) { if (strtolower($m4is_o160v->service) == $m4is_avxtze) { if (m4is_vv5u::m4is_mu1k($m4is_lv7wu, $m4is_o160v->ip_prefix) ) { return true;
 } } } } return false;
 } 
function m4is_wpihx() : bool { if (empty($_SERVER['HTTP_X_BUFFERBOT']) ) { return false;
 } if ($this->m4is__mhc(m4is_vv5u::m4is_s15o8k() ) ) { return true;
 } return false;
 }  
function m4is_c41tl() : bool { $m4is_ew4ju8 = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
 if (empty($m4is_ew4ju8) ) { return false;
 } if (strpos($m4is_ew4ju8, 'facebookexternalhit') !== FALSE) { $m4is_lv7wu = m4is_vv5u::m4is_s15o8k();
     $m4is_cxh7 = [ '103.4.96.0/22', '173.252.64.0/18', '173.252.64.0/19', '173.252.70.0/24', '173.252.96.0/19', '204.15.20.0/22', '31.13.24.0/21', '31.13.64.0/18', '31.13.64.0/19', '31.13.64.0/24', '31.13.65.0/24', '31.13.66.0/24', '31.13.67.0/24', '31.13.68.0/24', '31.13.69.0/24', '31.13.70.0/24', '31.13.71.0/24', '31.13.72.0/24', '31.13.73.0/24', '31.13.74.0/24', '31.13.75.0/24', '31.13.76.0/24', '31.13.77.0/24', '31.13.78.0/24', '31.13.79.0/24', '31.13.80.0/24', '31.13.81.0/24', '31.13.82.0/24', '31.13.83.0/24', '31.13.84.0/24', '31.13.85.0/24', '31.13.86.0/24', '31.13.87.0/24', '31.13.88.0/24', '31.13.89.0/24', '31.13.90.0/24', '31.13.91.0/24', '31.13.92.0/24', '31.13.93.0/24', '31.13.94.0/24', '31.13.95.0/24', '31.13.96.0/19', '66.220.144.0/20', '66.220.144.0/21', '66.220.152.0/21', '66.220.159.0/24', '69.171.224.0/19', '69.171.224.0/20', '69.171.239.0/24', '69.171.240.0/20', '69.171.253.0/24', '69.171.255.0/24', '69.63.176.0/20', '69.63.176.0/20', '69.63.176.0/21', '69.63.176.0/24', '69.63.178.0/24', '69.63.184.0/21', '69.63.186.0/24', '74.119.76.0/22', ];
 foreach ($m4is_cxh7 as $m4is_o160v) { if (m4is_vv5u::m4is_mu1k($m4is_lv7wu, $m4is_o160v) ) { return true;
 } } } return false;
 } 
function m4is_ap8x() : bool { $m4is_ew4ju8 = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
 if (empty($m4is_ew4ju8) ) { return false;
 }   if (stristr($m4is_ew4ju8, 'applebot') ) { if (substr(m4is_vv5u::m4is_s15o8k(), 0, 3) == '17.') { return true;
 } } return false;
 } 
function m4is__do9() : bool { $m4is_ew4ju8 = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
 if (empty($m4is_ew4ju8) ) { return false;
 } return (stristr($m4is_ew4ju8, 'google.') !== false);
 } 
function m4is_rtjc58() : bool { $m4is_ew4ju8 = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
 if (empty($m4is_ew4ju8) ) { return false;
 }  if (stristr($m4is_ew4ju8, "googlebot") ) { if (stristr(gethostbyaddr(m4is_vv5u::m4is_s15o8k() ) , "googlebot.com") ) { return true;
 } } return false;
 } 
function m4is_pwmt29() : bool { return ! empty($_SESSION['memb_user']['membership_names']);
 }  
function m4is_vw9n($m4is_jzshu) : bool { if ($this->is_administrator) { return TRUE;
 } if (! m4is_u68pu::m4is_i9k3m() ) { return FALSE;
 } $m4is_jzshu = (int) $m4is_jzshu;
 if ($_SESSION['memb_user']['membership_level'] >= $m4is_jzshu || $this->is_administrator) { return TRUE;
 } else { return FALSE;
 } }  
function m4is_qst2(string $m4is_qorv6n, int $m4is_ig9p6 = 0) : bool { $m4is_qorv6n = strtolower(trim($m4is_qorv6n) );
 if (empty($m4is_qorv6n) ) { return false;
 } if (! m4is_u68pu::m4is_i9k3m() ) { return false;
 } $m4is_k5hg7 = get_current_user_id();
 if (! $m4is_ig9p6) { $m4is_ig9p6 = is_user_logged_in() ? $m4is_k5hg7 : 0;
 if (! $m4is_ig9p6) { return false;
 } } if ($m4is_ig9p6 && $this->m4is_bnd6ti->m4is_lvmz1b($m4is_ig9p6)) { return true;
  } $m4is_rt3vlo = $m4is_k5hg7 == $m4is_ig9p6;
 if ($m4is_rt3vlo && isset($_SESSION['memb_user']['membership_names'])) { $m4is_h12v = $_SESSION['memb_user']['membership_names'];
 } else { $m4is_mdqgk = $this->m4is_bnd6ti->m4is_akz3($m4is_ig9p6);
 $m4is_h12v = isset($m4is_mdqgk['memb_user']['membership_names']) ? $m4is_mdqgk['memb_user']['membership_names'] : '';
 } if (empty($m4is_h12v)) { return false;
 } $m4is_ng7jqn = explode(',', strtolower($m4is_h12v) );
 return in_array($m4is_qorv6n, $m4is_ng7jqn);
 }  
function m4is_kxc1($m4is_us4yqi) { if (! m4is_u68pu::m4is_i9k3m() ) { return FALSE;
 } $m4is_ig9p6 = get_current_user_id();
 if ($m4is_ig9p6 == 0) { return FALSE;
 } $m4is_us4yqi = strtolower(trim($m4is_us4yqi) );
 if ($m4is_us4yqi == '') { return FALSE;
 } $m4is_w_o7al = get_user_meta($m4is_ig9p6, 'memberium::field::' . $m4is_us4yqi, TRUE);
 if ($m4is_w_o7al == '') { $m4is_w_o7al = get_user_meta($m4is_ig9p6, 'memberium::counter::' . $m4is_us4yqi, TRUE);
 if ($m4is_w_o7al > '') { update_user_meta($m4is_ig9p6, 'memberium::field::' . $m4is_us4yqi, $m4is_w_o7al);
 delete_user_meta($m4is_ig9p6, 'memberium::counter::' . $m4is_us4yqi);
 } } return (int) $m4is_w_o7al;
 } 
function m4is_qwkq($m4is_us4yqi, $m4is_x5hmn, $m4is_ig9p6 = false ) { if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } if (! $m4is_ig9p6) { $m4is_ig9p6 = isset($_SESSION['memb_user']['user_id']) ? (int) $_SESSION['memb_user']['user_id'] : 0;
 } if ($m4is_ig9p6 == 0) { return FALSE;
 } $m4is_us4yqi = strtolower(trim($m4is_us4yqi) );
 if ($m4is_us4yqi == '') { return FALSE;
 } update_user_meta($m4is_ig9p6, 'memberium::field::' . $m4is_us4yqi, $m4is_x5hmn);
 }  
function m4is_iics3() : array { if (! m4is_u68pu::m4is_i9k3m() ) { return [];
 } $m4is_v4d9r = array_filter( explode( ',', $_SESSION['memb_user']['membership_names'] ) );
 return $m4is_v4d9r;
 }     
function m4is_ya6gch() { $m4is_tjg_9 = '<script type="text/javascript">';
 $m4is_tjg_9 .= 'var ajaxurl = "' . admin_url('admin-ajax.php') . '"';
 $m4is_tjg_9 .= '</script>';
 echo $m4is_tjg_9;
 }   
function m4is_b4sz() { $m4is_bu7y = $this->m4is_bnd6ti->m4is_u04m();
 $this->signature = true;
 printf( "<meta name='generator' content='Memberium v%s for WordPress' />\n", $m4is_bu7y );
 if ( is_singular() ) { global $post;
 $m4is_cd8k = $post->ID ?? 0;
  if ( ! empty( $post->ID ) ) { $m4is_auhoe = get_post_meta( $post->ID, '_iswp_custom_code', true );
 $m4is_r6nh_b = [ 'head' => '', 'css' => '', 'js' => '', ];
 $m4is_auhoe = wp_parse_args( $m4is_auhoe, $m4is_r6nh_b );
 echo ( ! empty( $m4is_auhoe['head'] ) ) ? do_shortcode( $m4is_auhoe['head'] ) . "\n" : '';
 echo ( ! empty( $m4is_auhoe['css'] ) ) ? "\n<style>\n" . do_shortcode( $m4is_auhoe['css'] ) . "\n</style>\n" : '';
 echo ( ! empty( $m4is_auhoe['js'] ) ) ? "\n<script>\n" . do_shortcode( $m4is_auhoe['js'] ) . "\n</script>\n" : '';
 } }  return true;
 }  
function m4is_etmk9q() {  if (! $this->signature) { $this->m4is_b4sz();
 }  if (! empty($this->footer_json)) { $m4is_jkodw = $this->footer_json;
  $m4is_jkodw['home_url'] = (!isset($m4is_jkodw['home_url'])) ? get_home_url() : $m4is_jkodw['home_url'];
 $m4is_jkodw['ajax_url'] = (!isset($m4is_jkodw['ajax_url'])) ? admin_url('admin-ajax.php') : $m4is_jkodw['ajax_url'];
 $m4is_jkodw['contact_id'] = (!isset($m4is_jkodw['contact_id'])) ? m4is_wbc8os::m4is_jjgo() : $m4is_jkodw['contact_id'];
  $json_data = json_encode($m4is_jkodw, JSON_PRETTY_PRINT);
  echo sprintf('<script>var %s=%s;</script>', 'memberium_data', $json_data);
 }  if (is_array($this->set_cookie) && ! empty($this->set_cookie)) { echo '<script>';
 foreach ($this->set_cookie as $m4is_l7ulz) { $m4is_t5ot4 = rawurlencode($m4is_l7ulz['name']);
 $m4is_w_o7al = rawurlencode($m4is_l7ulz['value']);
 $m4is_ea6ksm = $m4is_l7ulz['path'];
  echo "   document.cookie = '{$m4is_t5ot4}={$m4is_w_o7al}; ";
  if (!empty($m4is_l7ulz['domain'])) { echo "domain=", rawurlencode($m4is_l7ulz['domain']), "; ";
 }  if (!empty($m4is_l7ulz['path'])) { echo "path=", $m4is_l7ulz['path'], "; ";
 }  if (!empty($m4is_l7ulz['expiration'])) { echo "expires=", gmdate('D, d M Y H:i:s \G\M\T', $m4is_l7ulz['expiration']), "; ";
 }  if (!empty($m4is_l7ulz['secure'])) { echo "secure; ";
 }  echo "';\n";
 } echo '</script>';
 } }  
function m4is_blxh($m4is_ew4ju8 = null) {  $m4is_ew4ju8 = $m4is_ew4ju8 ? strtolower($m4is_ew4ju8) : strtolower($_SERVER['HTTP_USER_AGENT']);
 static $m4is_pu6wy;
  $cache_key = md5($m4is_ew4ju8);
  if (empty($m4is_pu6wy[$cache_key])) {  $m4is_pkr8a = [ 'os' => 'windows', 'type' => 'desktop', 'user' => 'browser', 'browser' => 'unknown' ];
  $patterns = [ "/applebot|bufferbot|adsbot|feedfetcher-google|googlebot|msnbot|pingdom\.com|watchmouse|yahooseeker|yahoobot/" => ['os' => 'bot', 'type' => 'bot', 'user' => 'bot'], "/phone|symbian|htc_|htc-|opera mini|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /" => ['os' => 'misc', 'type' => 'mobile', 'user' => 'browser'], "/iemobile|windows ce/" => ['os' => 'bot', 'type' => 'bot', 'user' => 'bot'], "/palmos/" => ['os' => 'palmos', 'type' => 'mobile', 'user' => 'browser'], "/blackberry/" => ['os' => 'blackberry', 'type' => 'mobile', 'user' => 'browser'], "/iphone|itouch|ipad|ipod/" => ['os' => 'ios', 'type' => 'mobile', 'user' => 'browser'], "/android/" => ['os' => 'android', 'type' => 'mobile', 'user' => 'browser'], "/chrome/" => ['browser' => 'chrome', 'user' => 'browser'], "/firefox/" => ['browser' => 'firefox', 'user' => 'browser'], "/kindle/" => ['os' => 'kindle', 'type' => 'mobile', 'user' => 'browser'], "/mac os/" => ['os' => 'mac', 'type' => 'desktop'], "/msie/" => ['browser' => 'internetexplorer', 'type' => 'desktop'], "/linux/" => ['os' => 'linux'], "/lynx/" => ['browser' => 'lynx', 'user' => 'browser'], "/netscape/" => ['browser' => 'netscape'], "/nintendo/" => ['browser' => 'nintendo', 'os' => 'nintendo', 'type' => 'mobile', 'user' => 'browser'], "/opera|opr/" => ['browser' => 'opera'], "/safari/" => ['browser' => 'safari'], "/silk/" => ['browser' => 'silk', 'os' => 'android', 'type' => 'mobile', 'user' => 'browser'], ];
  foreach ($patterns as $pattern => $info) { if (preg_match($pattern, $m4is_ew4ju8)) { $m4is_pkr8a = array_merge($m4is_pkr8a, $info);
 } }  $m4is_pu6wy[$cache_key] = $m4is_pkr8a;
 }  return $m4is_pu6wy[$cache_key];
 }     
function m4is_jt5_p( $m4is_z50f ) { global $shortcode_tags;
  $m4is__i9l4 = $shortcode_tags;
  remove_all_shortcodes();
  $this->shortcodes_registered = false;
  do_action('memberium/shortcodes/add');
  $m4is_z50f = do_shortcode($m4is_z50f);
  $shortcode_tags = $m4is__i9l4;
  return $m4is_z50f;
 }  
function m4is_o8ah( $force = false ) {  $found = false;
 $tags = wp_cache_get( 'custom_shortcodes', 'memberium2/core', false, $found );
  if ( $found === false || $force === true) { global $wpdb;
  $sql = "SELECT `post_name` FROM `{$wpdb->posts}` WHERE `post_type` = 'memb_shortcodeblocks' and `post_status` = 'publish' ";
 $posts = $wpdb->get_col( $sql );
  if ( is_array( $posts ) ) { $posts = array_filter( $posts );
 foreach ( $posts as $slug ) { $tags[] = 'membc_' . $slug;
 } }  wp_cache_set( 'custom_shortcodes', $tags, 'memberium2/core', 43200 );
 }  return $tags;
 }  private 
function m4is_ct5d() { global $wpdb;
 static $m4is_iystd2;
 if (! is_array($m4is_iystd2) ) { $m4is_ua348 = $this->m4is_bnd6ti->m4is_b8rm();
 $m4is_iystd2 = [];
 $m4is_iystd2['custom'] = $this->m4is_o8ah();
  $m4is_exwnv = 'm4is_gkbluj';
 $m4is_dn4u = 'm4is_jmf3';
 $m4is_txcw80 = 'm4is_eo51';
 $m4is_nvk2p = 'm4is_h08ul';
 $m4is_qe01 = 'm4is_lldmt';
 $m4is_ffn0 = 'm4is__h0xmk';
 $m4is_t701q = 'm4is_clpok';
 $m4is_xutce = 'm4is_pybv';
 $m4is_uy6v = 'm4is_gng906';
 $m4is_dt05 = 'm4is_a0qko';
 $m4is_zdop9 = 'm4is_xcev';
 $m4is_iystd2['nested'] = [ 'memb_can_view_post' => [$m4is_ua348, [$m4is_exwnv, 'm4is_dmzxyv']], 'memb_compare' => [$m4is_ua348, [$m4is_exwnv, 'm4is_u2mf0']], 'memb_has_all_roles' => [$m4is_ua348, [$m4is_exwnv, 'm4is_t1m7']], 'memb_has_all_tags' => [$m4is_ua348, [$m4is_exwnv, 'm4is_v9jbft']], 'memb_has_any_role' => [$m4is_ua348, [$m4is_exwnv, 'm4is_l92l48']], 'memb_has_any_tag' => [$m4is_ua348, [$m4is_exwnv, 'm4is_zziqp']], 'memb_has_any_token' => [$m4is_ua348, [$m4is_exwnv, 'm4is_oz4c']], 'memb_has_membership' => [$m4is_ua348, [$m4is_exwnv, 'm4is_fn5m3']], 'memb_has_payf' => [$m4is_ua348, [$m4is_exwnv, 'm4is_k7v4']], 'memb_hide_from' => [$m4is_ua348, [$m4is_exwnv, 'm4is_lnj8ob']], 'memb_if_cookie' => [$m4is_ua348, [$m4is_exwnv, 'm4is_av12wm']], 'memb_if_get' => [$m4is_ua348, [$m4is_exwnv, 'm4is_jkgc_']], 'memb_if_post' => [$m4is_ua348, [$m4is_exwnv, 'm4is_elkg']], 'memb_if_request' => [$m4is_ua348, [$m4is_exwnv, 'm4is_y457bn']], 'memb_if_user_counter' => [$m4is_ua348, [$m4is_exwnv, 'm4is__n1vep']], 'memb_if' => [$m4is_ua348, [$m4is_exwnv, 'm4is_u2mf0']], 'memb_is_after_tag_date' => [$m4is_ua348, [$m4is_exwnv, 'm4is_jn4rg7']], 'memb_show_after' => [$m4is_ua348, [$m4is_exwnv, 'm4is_tx3r5']], 'memb_show_between' => [$m4is_ua348, [$m4is_exwnv, 'm4is_o_aeq5']], 'memb_show_until' => [$m4is_ua348, [$m4is_exwnv, 'm4is_k1do']], 'memb_is_browser' => [5, [$m4is_exwnv, 'm4is_nr4jys']], 'memb_has_affiliate' => [1, [$m4is_dn4u, 'm4is_mbt4']], 'memb_is_1x_optin' => [3, [$m4is_qe01, 'm4is_a7qg3n']], 'memb_is_2x_optin' => [3, [$m4is_qe01, 'm4is_a7qg3n']], 'memb_is_no_optin' => [3, [$m4is_qe01, 'm4is_a7qg3n']], ];
 $m4is_iystd2['standard'] = [ 'memb_expires' => [$m4is_exwnv, 'm4is_vl08k'], 'memb_fade' => [$m4is_exwnv, 'm4is_qxp7z'], 'memb_hide' => [$m4is_exwnv, 'm4is_iw46e'], 'memb_hidefrom_feed' => [$m4is_exwnv, 'm4is_d3wdti'], 'memb_hidefrom' => [$m4is_exwnv, 'm4is_lnj8ob'], 'memb_if_lang' => [$m4is_exwnv, 'm4is_lz2o'], 'memb_is_admin' => [$m4is_exwnv, 'm4is_qhtyn'], 'memb_is_autologin' => [$m4is_exwnv, 'm4is_c8ij7'], 'memb_is_excerpt_only' => [$m4is_exwnv, 'm4is_j5hes1'], 'memb_is_first_login' => [$m4is_exwnv, 'm4is_kxa9'], 'memb_is_logged_in' => [$m4is_exwnv, 'm4is_f0d1q2'], 'memb_is_not_admin' => [$m4is_exwnv, 'm4is_qhtyn'], 'memb_is_post_type' => [$m4is_exwnv, 'm4is_gevb'], 'memb_is_single' => [$m4is_exwnv, 'm4is_cx5n7'], 'memb_is_trackable_link' => [$m4is_exwnv, 'm4is_hmw_'], 'memb_switch' => [$m4is_exwnv, 'm4is_n1pb6'], 'memb_affiliate_login' => [$m4is_dn4u, 'm4is_mrnf1'], 'memb_affiliate_running_totals' => [$m4is_dn4u, 'm4is_kg48f'], 'memb_affiliate' => [$m4is_dn4u, 'm4is_jtid5'], 'memb_detect_affiliate' => [$m4is_dn4u, 'm4is_axam'], 'memb_is_affiliate' => [$m4is_dn4u, 'm4is_as2zjy'], 'memb_referral_contact' => [$m4is_dn4u, 'm4is_r7cloz'], 'memb_s3_link' => [$m4is_txcw80, 'm4is_o41l0b'], 'memb_secure_audio' => [$m4is_txcw80, 'm4is_wndx'], 'memb_secure_video' => [$m4is_txcw80, 'm4is_vy0w'], 'memb_is_applebot' => [$m4is_nvk2p, 'm4is_egt14'], 'memb_is_chrome' => [$m4is_nvk2p, 'm4is_vfqu41'], 'memb_is_facebook_crawler' => [$m4is_nvk2p, 'm4is_mlmj4'], 'memb_is_feed' => [$m4is_nvk2p, 'm4is_u9j3'], 'memb_is_gecko' => [$m4is_nvk2p, 'm4is_ncsp'], 'memb_is_google1stclick' => [$m4is_nvk2p, 'm4is_didop'], 'memb_is_googlebot' => [$m4is_nvk2p, 'm4is_j6eydz'], 'memb_is_ie' => [$m4is_nvk2p, 'm4is_ic5_xj'], 'memb_is_ipad' => [$m4is_nvk2p, 'm4is_ldg6nh'], 'memb_is_iphone' => [$m4is_nvk2p, 'm4is_blnzjb'], 'memb_is_lynx' => [$m4is_nvk2p, 'm4is_uqgsu'], 'memb_is_macie' => [$m4is_nvk2p, 'm4is_qbdg'], 'memb_is_mobile' => [$m4is_nvk2p, 'm4is_hlsy'], 'memb_is_ns4' => [$m4is_nvk2p, 'm4is_vcj3p'], 'memb_is_opera' => [$m4is_nvk2p, 'm4is_n_ne'], 'memb_is_safari' => [$m4is_nvk2p, 'm4is_e_3w2k'], 'memb_is_ssl' => [$m4is_nvk2p, 'm4is_y6xfg'], 'memb_is_winie' => [$m4is_nvk2p, 'm4is_faq6cn'],  'memb_achieve_goal' => [$m4is_qe01, 'm4is_edqn'], 'memb_action_link' => [$m4is_qe01, 'm4is_x9_f'], 'memb_actionset_button' => [$m4is_qe01, 'm4is_wvid'], 'memb_add_fus' => [$m4is_qe01, 'm4is_fdy3'], 'memb_add_tag' => [$m4is_qe01, 'm4is_matq64'], 'memb_appname' => [$m4is_qe01, 'm4is_cxqv'], 'memb_appointments' => [$m4is_qe01, 'm4is_u21rsm'], 'memb_count_my_tags' => [$m4is_qe01, 'm4is_df39o'], 'memb_count_tags' => [$m4is_qe01, 'm4is_faip14'], 'memb_infusion_id' => [$m4is_qe01, 'm4is_zf1rn'], 'memb_link_contacts' => [$m4is_qe01, 'm4is_um90'], 'memb_list_linked_contacts' => [$m4is_qe01, 'm4is_xp0stv'], 'memb_pause_fus' => [$m4is_qe01, 'm4is_fpuk_'], 'memb_remove_fus' => [$m4is_qe01, 'm4is_qvwtig'], 'memb_remove_tag' => [$m4is_qe01, 'm4is_nz_23'], 'memb_run_actionset' => [$m4is_qe01, 'm4is_zs8c5u'], 'memb_set_tag' => [$m4is_qe01, 'm4is_xr0w'], 'memb_sync_contact' => [$m4is_qe01, 'm4is_nqic3'], 'memb_tag_date' => [$m4is_qe01, 'm4is_fw3u4t'], 'memb_tag_name' => [$m4is_qe01, 'm4is_kck0'], 'memb_unlink_contacts' => [$m4is_qe01, 'm4is_jjhk'], 'memb_is_app_connected' => [$m4is_qe01, 'm4is_za6r9'], 'memb_is_appconnected' => [$m4is_qe01, 'm4is_za6r9'], 'memb_debug' => ['m4is_mj1go', 'm4is_v3ip2'], 'memb_list_shortcodes' => ['m4is_mj1go', 'm4is_gd4c2o'], 'memb_performance' => ['m4is_mj1go', 'm4is_w2d1z'],  'memb_1click_order_product' => [$m4is_ffn0, 'm4is_u_1iv3'], 'memb_add_creditcard' => [$m4is_ffn0, 'm4is_mnkv'], 'memb_client_login' => [$m4is_ffn0, 'm4is_lt2q'], 'memb_creditcard_days_left' => [$m4is_ffn0, 'm4is_etsg'], 'memb_creditcard_expires' => [$m4is_ffn0, 'm4is_x8ld'], 'memb_creditcard' => [$m4is_ffn0, 'm4is_wr3dis'], 'memb_has_creditcard' => [$m4is_ffn0, 'm4is_zo_gr'], 'memb_has_product' => [$m4is_ffn0, 'm4is_k4o9'], 'memb_has_subscription' => [$m4is_ffn0, 'm4is_hdrlm'], 'memb_list_creditcards' => [$m4is_ffn0, 'm4is_r1a9'], 'memb_list_invoices' => [$m4is_ffn0, 'm4is_w12j7x'], 'memb_list_subscriptions' => [$m4is_ffn0, 'm4is_oaem'], 'memb_one_click_sale' => [$m4is_ffn0, 'm4is_cs8dxu'], 'memb_order_info' => [$m4is_ffn0, 'm4is_jtm6'], 'memb_order_product' => [$m4is_ffn0, 'm4is_cdyo'], 'memb_order_subscription' => [$m4is_ffn0, 'm4is_ak52t8'], 'memb_orderform' => [$m4is_ffn0, 'm4is_fyatqi'], 'memb_place_order' => [$m4is_ffn0, 'm4is_ax0y'], 'memb_product' => [$m4is_ffn0, 'm4is_msey'], 'memb_show_receipt' => [$m4is_ffn0, 'm4is_lhvm5'], 'memb_subscriptionplan' => [$m4is_ffn0, 'm4is_keqr4'], 'memb_total_lifetime_value' => [$m4is_ffn0, 'm4is_yvchd9'], 'memb_filebox_link' => [$m4is_t701q, 'm4is_opub6'], 'memb_filebox_url' => [$m4is_t701q, 'm4is_iczj7'], 'memb_list_filebox' => [$m4is_t701q, 'm4is_l6d8vf'], 'memb_upload_filebox' => [$m4is_t701q, 'm4is_dkvyw'], 'memb_upload_message_filebox' => [$m4is_t701q, 'm4is_lacp'], 'memb_capture' => [$m4is_uy6v, 'm4is_aizf'], 'memb_country_dropdown' => [$m4is_uy6v, 'm4is_yyqpg'], 'memb_customerhub_autologin' => [$m4is_uy6v, 'm4is_t0wdb5'], 'memb_days_difference' => [$m4is_uy6v, 'm4is_kgvk'], 'memb_do_shortcode' => [$m4is_uy6v, 'm4is_okjc'], 'memb_e' => [$m4is_uy6v, 'm4is_krv_4s'], 'memb_echo' => [$m4is_uy6v, 'm4is_rlqzi'], 'memb_forloop' => [$m4is_uy6v, 'm4is_rjzti'], 'memb_geoip' => [$m4is_uy6v, 'm4is_sx0l'], 'memb_http_post' => [$m4is_uy6v, 'm4is_uk5a7'], 'memb_js_encode' => [$m4is_uy6v, 'm4is_w92of'], 'memb_language_dropdown' => [$m4is_uy6v, 'm4is_rt7e'], 'memb_license_status' => [$m4is_uy6v, 'm4is_ibqvy'], 'memb_php' => [$m4is_uy6v, 'm4is_k2m0h'], 'memb_plusthis' => [$m4is_uy6v, 'm4is_uk5a7'], 'memb_qrcode' => [$m4is_uy6v, 'm4is_g8j6k2'], 'memb_quotd' => [$m4is_uy6v, 'm4is_la1b'], 'memb_show_messages' => [$m4is_uy6v, 'm4is_oljv_'], 'memb_timezone_dropdown' => [$m4is_uy6v, 'm4is_n8ofk'], 'memb_version' => [$m4is_uy6v, 'm4is_mg70i'], 'memb_coursegrid' => ['m4is_g79rc', 'm4is_sdy9l'], 'memb_change_email' => [$m4is_dt05, 'm4is_i8is'], 'memb_change_password' => [$m4is_dt05, 'm4is_qnpto'], 'memb_contact' => [$m4is_dt05, 'm4is_mdqf6'], 'memb_feedurl' => [$m4is_dt05, 'm4is_i7hm'], 'memb_generate_password' => [$m4is_dt05, 'm4is_e9m0g'], 'memb_getfield' => [$m4is_dt05, 'm4is_cayi'], 'memb_gravatar' => [$m4is_dt05, 'm4is_bm16ek'], 'memb_json_session' => [$m4is_dt05, 'm4is_mits_f'], 'memb_list_logins' => [$m4is_dt05, 'm4is_x4o8n'], 'memb_lost_password' => [$m4is_dt05, 'm4is_b61c'], 'memb_member_listing' => [$m4is_dt05, 'm4is_m9pxk'], 'memb_optin_status' => [$m4is_dt05, 'm4is_i5_0p'], 'memb_owner' => [$m4is_dt05, 'm4is_tqz7'], 'memb_registration_form' => [$m4is_dt05, 'm4is_lf_cgq'], 'memb_reset_feedurl' => [$m4is_dt05, 'm4is_h6adyc'], 'memb_reset_password' => [$m4is_dt05, 'm4is_l5mo'], 'memb_send_password' => [$m4is_dt05, 'm4is_x9vim1'], 'memb_set_token' => [$m4is_dt05, 'm4is_x9k5'], 'memb_showfield' => [$m4is_dt05, 'm4is_cayi'], 'memb_update_contact' => [$m4is_dt05, 'm4is_oehku'], 'memb_update_form' => [$m4is_dt05, 'm4is_w02w54'], 'memb_user_counter' => [$m4is_dt05, 'm4is_ddup'], 'memb_user_levels' => [$m4is_dt05, 'm4is_nen10'], 'memb_wp_user' => [$m4is_dt05, 'm4is_mi3n1y'], 'memb_cookie' => [$m4is_zdop9, 'm4is_hmnux'], 'memb_date' => [$m4is_zdop9, 'm4is_eycar'], 'memb_get_permalink' => [$m4is_zdop9, 'm4is_d5em4'], 'memb_get' => [$m4is_zdop9, 'm4is_hmnux'], 'memb_include_page' => [$m4is_zdop9, 'm4is__ptsvf'], 'memb_include_partial' => [$m4is_zdop9, 'm4is__ptsvf'], 'memb_include_post' => [$m4is_zdop9, 'm4is__ptsvf'], 'memb_login_url' => [$m4is_zdop9, 'm4is_iwtxip'], 'memb_loginform' => [$m4is_zdop9, 'm4is_i_1s4q'], 'memb_loginlogout' => [$m4is_zdop9, 'm4is__3yx6w'], 'memb_logout_link' => [$m4is_zdop9, 'm4is_k5yel'], 'memb_logout' => [$m4is_zdop9, 'm4is_niylr_'], 'memb_php_include_once' => [$m4is_zdop9, 'm4is_y4jr2g'], 'memb_php_include' => [$m4is_zdop9, 'm4is_y4jr2g'], 'memb_post_meta' => [$m4is_zdop9, 'm4is_pya5t'], 'memb_post' => [$m4is_zdop9, 'm4is_hmnux'], 'memb_raw' => [$m4is_zdop9, 'm4is_p0bnh'], 'memb_redirect' => [$m4is_zdop9, 'm4is_nd7u'], 'memb_request' => [$m4is_zdop9, 'm4is_hmnux'], 'memb_server' => [$m4is_zdop9, 'm4is_hmnux'], 'memb_session' => [$m4is_zdop9, 'm4is_hmnux'], 'memb_set_cookie' => [$m4is_zdop9, 'm4is_levsa'], 'memb_default_excerpt' => [$m4is_zdop9, 'm4is_s749s'], 'memb_registration_date' => [$m4is_zdop9, 'm4is_n3fcx6'], 'memb_registration_url' => [$m4is_zdop9, 'm4is_s3lhxe'], 'memb_remote_post_get' => [$m4is_zdop9, 'm4is_vfku8'], 'memb_system_link' => [$m4is_zdop9, 'm4is_hk8hq'], 'memb_set_prohibited_action' => [$m4is_zdop9, 'm4is_auav'],    'memb_award_achievement' => [$m4is_xutce, 'm4is__fbeu'], 'memb_revoke_achievement' => [$m4is_xutce, 'm4is_g_1f'], 'memb_list_achievements' => [$m4is_xutce, 'm4is_lbyfu1'], ];
 } return $m4is_iystd2;
 }  
function m4is_ljhm( $m4is_z50f = '' ) {  if (! $this->shortcodes_registered) { $m4is_iystd2 = $this->m4is_ct5d();
  if ( isset( $m4is_iystd2['custom'] ) && is_array( $m4is_iystd2['custom'] ) ) { foreach($m4is_iystd2['custom'] as $m4is_mpia) {  add_shortcode( $m4is_mpia, [$this, 'm4is_nprg69'] );
 } }  foreach($m4is_iystd2['standard'] as $m4is_mpia => $m4is_cwkrz) {  $m4is_h7j0 = is_array($m4is_cwkrz) ? $m4is_cwkrz : [$this, $m4is_cwkrz];
  add_shortcode($m4is_mpia, $m4is_h7j0);
 }  foreach($m4is_iystd2['nested'] as $m4is_mpia => $m4is_cwkrz) {  $m4is_h7j0 = is_array($m4is_cwkrz[1]) ? $m4is_cwkrz[1] : [$this, $m4is_cwkrz[1]];
  add_shortcode($m4is_mpia, $m4is_h7j0);
  for ($m4is_tiq5k6 = 1;
 $m4is_tiq5k6 < (int) $m4is_cwkrz[0];
 $m4is_tiq5k6++) { add_shortcode("{$m4is_mpia}{$m4is_tiq5k6}", $m4is_h7j0);
 } }  $this->shortcodes_registered = true;
 }  return $m4is_z50f;
 }  
function m4is_jq30( $m4is_z50f = '' ) {  if ($this->shortcodes_registered) { $m4is_iystd2 = $this->m4is_ct5d();
  $shortcode_types = ['custom', 'standard', 'nested'];
  foreach ($shortcode_types as $type) {  if (isset($m4is_iystd2[$type]) && is_array($m4is_iystd2[$type])) {  foreach($m4is_iystd2[$type] as $m4is_mpia => $m4is_cwkrz) { remove_shortcode($m4is_mpia);
  if ($type === 'nested') { for ($m4is_tiq5k6 = 1;
 $m4is_tiq5k6 < (int) $m4is_cwkrz[0];
 $m4is_tiq5k6++) { remove_shortcode($m4is_mpia . $m4is_tiq5k6);
 } } } } }  do_action('memberium/shortcodes/remove');
  $this->shortcodes_registered = false;
 }  return $m4is_z50f;
 } 
function m4is_fxro(){ wp_register_style('memb_coursegrid_css', plugin_dir_url(MEMBERIUM_HOME) . "css/memb_coursegrid.css", false, $this->m4is_bnd6ti->m4is_u04m(), 'all');
 }     
function m4is_cw_2qo($m4is_z50f = '', $m4is_ejhbmn = '') { if (empty($m4is_z50f) ) { return;
 } $m4is_uzfw8j = '';
 $m4is_o2ms = false;
 $m4is_hnmek = false;
 $m4is_gd3oc = '/(\[case.*\])|(\[else\])/U';
 $m4is_y8dwk = preg_split($m4is_gd3oc, $m4is_z50f, 0, PREG_SPLIT_DELIM_CAPTURE);
 foreach ($m4is_y8dwk as $m4is_g0bg) { $m4is_g0bg = trim($m4is_g0bg);
 if (empty($m4is_g0bg) ) { continue;
 } if (substr($m4is_g0bg, 0, 5) == '[case' || substr($m4is_g0bg, 0, 5) == '[else') { $m4is_hnmek = false;
 $m4is_gqid = shortcode_parse_atts(substr($m4is_g0bg, 1, -1) );
 if (! empty($m4is_gqid[0]) && strtolower($m4is_gqid[0]) == 'case') { if (! empty($m4is_gqid['any_tag']) ) { $m4is_hnmek = $this->m4is_bnd6ti->m4is_sjmzx(trim($m4is_gqid['any_tag']) );
 if ($m4is_hnmek) { $m4is_o2ms = true;
 } } if (! empty($m4is_gqid['all_tags']) ) { $m4is_hnmek = $this->m4is_bnd6ti->m4is_mhx6(trim($m4is_gqid['all_tags']) );
 if ($m4is_hnmek) { $m4is_o2ms = true;
 } } if (! empty($m4is_gqid['not_any_tagid']) ) { $m4is_hnmek = ! $this->m4is_bnd6ti->m4is_sjmzx(trim($m4is_gqid['not_any_tagid']) );
 if ($m4is_hnmek) { $m4is_o2ms = true;
 } } if (! empty($m4is_gqid['not_all_tagids']) ) { $m4is_hnmek = ! $this->m4is_bnd6ti->m4is_mhx6(trim($m4is_gqid['not_all_tagids']) );
 if ($m4is_hnmek) { $m4is_o2ms = true;
 } } } if (! empty($m4is_gqid[0]) && strtolower($m4is_gqid[0]) == 'else') { if (! $m4is_o2ms) { $m4is_hnmek = true;
 } } } else { if ($m4is_hnmek) { $m4is_uzfw8j .= $m4is_g0bg;
 } $m4is_hnmek = false;
 } } return do_shortcode($m4is_uzfw8j);
 }     
function m4is_nprg69($m4is_qnjfv, $m4is_z50f = null, $tag = '') { if (! m4is_u68pu::m4is_u6mkaw() ) { return;
 } m4is_aoxw::m4is_djr4nd();
 static $m4is_carw7y = [];
 static $m4is_bpuz = [];
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'txtfmt' => '', ];
 if (is_array($m4is_qnjfv) ) { foreach($m4is_qnjfv as $m4is_c5zg => $m4is_g0wy) { if (! isset($m4is_r6nh_b[$m4is_c5zg]) ) { $m4is_r6nh_b[$m4is_c5zg] = $m4is_g0wy;
 } } } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
  $m4is_vswaj = substr($tag, 6);
  if (! isset($m4is_bpuz[$m4is_vswaj]) ) { $m4is_bpuz[$m4is_vswaj] = 0;
 } $m4is_bpuz[$m4is_vswaj]++;
 if ($m4is_bpuz[$m4is_vswaj] > 10) { wp_die('Custom Shortcode Recursion Limit Exceeded.');
 } if (! isset($m4is_carw7y[$m4is_vswaj]) ) { $m4is_k4yeul = [ 'name' => $m4is_vswaj, 'post_type' => 'memb_shortcodeblocks' ];
 $m4is_t0lr4 = get_posts($m4is_k4yeul);
 $m4is_carw7y[$m4is_vswaj] = $m4is_t0lr4[0]->post_content;
 } $m4is_uzfw8j = $m4is_carw7y[$m4is_vswaj];
 $m4is_qnjfv = m4is_crqo::m4is_ryzl($m4is_qnjfv);
   if (is_array($m4is_qnjfv) ) { foreach ($m4is_qnjfv as $m4is_s2ge5=>$m4is_w_o7al) { $m4is_s2ge5 = strtolower($m4is_s2ge5);
 $m4is_ejhbmn = '{{atts:' . $m4is_s2ge5 . '}}';
 $m4is_uzfw8j = str_replace($m4is_ejhbmn, $m4is_w_o7al, $m4is_uzfw8j);
 $m4is_ejhbmn = '{{atts|' . $m4is_s2ge5 . '}}';
 $m4is_uzfw8j = str_replace($m4is_ejhbmn, $m4is_w_o7al, $m4is_uzfw8j);
 } } while (stripos($m4is_uzfw8j, '{{atts') !== false) { $m4is_uzfw8j = preg_replace_callback('|({{atts\:(.*)}})|U', function($m4is_ogxo) { return '';
 }, $m4is_uzfw8j);
 $m4is_uzfw8j = preg_replace_callback('|({{atts\|(.*)}})|U', function($m4is_ogxo) { return '';
 }, $m4is_uzfw8j);
 } $m4is_z50f = $m4is_uzfw8j;
 unset($m4is_uzfw8j);
  global $wp_embed;
 $m4is_z50f = do_shortcode( $wp_embed->run_shortcode( $m4is_z50f ) );
 if (! empty($m4is_qnjfv['txtfmt']) ) { $m4is_z50f = m4is_crqo::m4is_mq57($m4is_z50f, $m4is_qnjfv['txtfmt']);
 } $m4is_z50f = $m4is_qnjfv['before'] . $m4is_z50f . $m4is_qnjfv['after'];
 if (! empty($m4is_qnjfv['capture']) ) { $m4is_z50f = m4is_crqo::m4is_uyv45q($m4is_z50f, $m4is_qnjfv['capture']);
 } if (! empty($m4is_qnjfv['htmlattr']) ) { $m4is_z50f = $m4is_qnjfv['htmlattr'] . '="' . $m4is_z50f . '"';
 } $m4is_bpuz[$m4is_vswaj]--;
 return $m4is_z50f;
 }    
function m4is_l8l_5x() { m4is_aoxw::m4is_djr4nd();
 $m4is_xxcq3i = isset($_GET['debug']) ? TRUE : FALSE;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 if ($m4is_xxcq3i) echo __LINE__, " - POST: ", print_r($_POST, true) , "\n";
 $m4is_t5ot4 = empty($_GET['name']) ? '' : trim($_GET['name']);
 $m4is_n260nx = time();
 $this->m4is_bnd6ti->m4is_ywm48($m4is_t5ot4);
 echo 'Operation Completed';
 return;
 }  
function m4is_htxsy() { m4is_aoxw::m4is_djr4nd();
 global $wpdb;
 $m4is_qw6hxi = [];
 $m4is_m3bw = [];
 $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_mb6gy = date('Y-m-d h:i:s');
 $m4is_e2kg = (int) $_POST['Id'];
 $m4is_xxcq3i = isset($_GET['debug']) ? true : false;
 $m4is_n7d_4 = empty($_GET['channel']) ? 'm' : preg_replace("/[^[:alnum:][:space:]]/u", '', $_GET['channel']);
;
 $m4is_qo53 = isset($_GET['cat_id']) && (int) $_GET['cat_id'] > 0 ? (int) $_GET['cat_id'] : 0;
 $m4is_awegl = isset($_GET['tagcount']) && (int) $_GET['tagcount'] > 0 ? (int) $_GET['tagcount'] : 6;
 $m4is_fyh6 = isset($_GET['date_format']) && $_GET['date_format'] > '' ? $_GET['date_format'] : 'Ym';
 $m4is_o1dz = empty($_GET['interval']) ? '' : strtolower(trim($_GET['interval']) );
 $m4is_b90o = ['YM', 'Ym', 'M', 'm', 'F', 'n'];
 if ($m4is_o1dz == '') { if ($m4is_fyh6 == 'Yz') { $m4is_o1dz = 'days';
 } elseif ($m4is_fyh6 == 'YW') { $m4is_o1dz = 'weeks';
 } elseif (in_array($m4is_fyh6, $m4is_b90o) ) { $m4is_o1dz = 'months';
 } elseif ($m4is_fyh6 == 'Y') { $m4is_o1dz = 'years';
 } } if (empty($m4is_o1dz) ) { if ($m4is_xxcq3i) echo __LINE__, "Premature End - Empty Interval\n";
 exit;
 } m4is_wbc8os::m4is_mz_rq('id', $m4is_e2kg);
 m4is_wbc8os::m4is_mz_rq('groups', $_POST['Groups']);
 if ($m4is_xxcq3i) { echo __LINE__, " - Channel: ", print_r($m4is_n7d_4, true) , "\n";
 echo __LINE__, " - Category ID: ", print_r($m4is_qo53, true) , "\n";
 echo __LINE__, " - Tag Count: ", print_r($m4is_awegl, true) , "\n";
 echo __LINE__, " - Date Format: ", print_r($m4is_fyh6, true) , "\n";
 echo __LINE__, " - Interval: ", print_r($m4is_o1dz, true) , "\n";
 }  for ($m4is_tiq5k6 = 0;
 $m4is_tiq5k6 < $m4is_awegl;
 $m4is_tiq5k6++) { $m4is_qw6hxi[$m4is_tiq5k6] = $m4is_n7d_4 . date($m4is_fyh6, strtotime('now + ' . $m4is_tiq5k6 . ' ' . $m4is_o1dz) );
 $m4is_ndufnm = m4is_pwtg7::m4is_v6pu( $m4is_qw6hxi[$m4is_tiq5k6] );
 if (! $m4is_ndufnm) { if ($m4is_xxcq3i) echo __LINE__, " - Missing Tag: ", $m4is_qw6hxi[$m4is_tiq5k6], "\n";
 $m4is_m3bw[$m4is_tiq5k6] = $m4is_tiq5k6;
 } else { if ($m4is_xxcq3i) echo __LINE__, " - Found Existing Tag: ", $m4is_qw6hxi[$m4is_tiq5k6], "\n";
 } } if (is_array($m4is_m3bw) && ! empty($m4is_m3bw) ) { m4is_pwtg7::m4is_jgs89();
 foreach ($m4is_m3bw as $m4is_tiq5k6) { $m4is_qw6hxi[$m4is_tiq5k6] = $m4is_n7d_4 . date($m4is_fyh6, strtotime('now + ' . $m4is_tiq5k6 . ' ' . $m4is_o1dz) );
 $m4is_ndufnm = m4is_pwtg7::m4is_v6pu( $m4is_qw6hxi[$m4is_tiq5k6] );
 if ($m4is_xxcq3i) echo __LINE__, " - Found Tag: ", $m4is_qw6hxi[$m4is_tiq5k6], "\n";
 if ($m4is_ndufnm) { if ($m4is_xxcq3i) echo __LINE__, " - Found Missing Tag: ", $m4is_qw6hxi[$m4is_tiq5k6], "\n";
 unset($m4is_m3bw[$m4is_tiq5k6]);
 } } if ($m4is_xxcq3i) echo __LINE__, " - Still Missing Tags: ", print_r($m4is_m3bw, true), "\n";
 foreach ($m4is_m3bw as $m4is_tiq5k6) { $m4is_ndufnm = m4is_pwtg7::m4is_icnizm($m4is_qw6hxi[$m4is_tiq5k6], (int) $m4is_qo53, 'Magazine Issue Tag Auto-created by Memberium on ' . $m4is_mb6gy);
 if ($m4is_xxcq3i) echo __LINE__, " - Created Tag : ", $m4is_qw6hxi[$m4is_tiq5k6], "\n";
 } } if ($m4is_xxcq3i) echo __LINE__, " - Setting Tag: ", $m4is_qw6hxi[0] , "\n";
 $m4is_ndufnm = m4is_pwtg7::m4is_v6pu($m4is_qw6hxi[0]);
 $this->m4is_bnd6ti->m4is_tcle75( $m4is_ndufnm, $m4is_e2kg );
 $this->m4is_bnd6ti->m4is_q285('send_http_post');
 exit;
 } 
function m4is_hecugo() { m4is_aoxw::m4is_djr4nd();
 $m4is_xxcq3i = isset($_GET['debug']) ? TRUE : FALSE;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 if ($m4is_xxcq3i) echo __LINE__, " - POST: ", print_r($_POST, true) , "\n";
 $this->m4is_bnd6ti->m4is_dhpr($_POST);
 $this->m4is_bnd6ti->m4is_q285('send_http_post');
 echo __LINE__, " - Saved Contact Record To Local Cache\n";
 echo 'Operation Completed';
 return;
 } 
function m4is_e3onw() { m4is_aoxw::m4is_djr4nd();
 if (! empty($_POST['Id']) ) { $m4is_e2kg = (int) $_POST['Id'];
 } if (! empty($_POST['contactId']) ) { $m4is_e2kg = (int) $_POST['contactId'];
 } $m4is_xxcq3i = isset($_GET['debug']) ? true : false;
 $m4is_x25z14 = isset($_GET['tagids']) && $_GET['tagids'] > '' ? array_unique(explode(',', $_GET['tagids']) ) : [];
 $m4is_mdz7 = (boolean) strtolower($_GET['sync']) <> 'no';
 if ($m4is_xxcq3i) { echo __LINE__, " - Debug Mode Enabled\n";
 echo __LINE__, " - _POST = ", print_r($_POST, true),"\n";
 echo __LINE__, " - Tag ID's = ", print_r($m4is_x25z14, true),"\n";
 echo __LINE__, " - Contact Id = ", $m4is_e2kg, "\n";
 } if ($m4is_e2kg > 0) { $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol($m4is_e2kg, false);
 if ($m4is_xxcq3i) echo __LINE__, " - Contact Tags = ", $m4is_p9r_8e['Groups'], "\n";
 if (is_array($m4is_p9r_8e) && (isset($m4is_p9r_8e['Groups']) ) ) { $m4is_vwdb4 = array_unique(explode(',', $m4is_p9r_8e['Groups']) );
 if (is_array($m4is_x25z14) && ! empty($m4is_x25z14) ) { foreach($m4is_x25z14 as $m4is_zsged) { $m4is_zsged = (int) $m4is_zsged;
 if ($m4is_zsged > 0) { $m4is_vwdb4[] = $m4is_zsged;
 } if ($m4is_zsged < 0) { $m4is_zsged = abs($m4is_zsged);
 if ( ($m4is_s2ge5 = array_search($m4is_zsged, $m4is_vwdb4) ) !== false) { unset($m4is_vwdb4[$m4is_s2ge5]);
 } } } $m4is_vwdb4 = array_unique($m4is_vwdb4);
 sort($m4is_vwdb4);
 $m4is_p9r_8e['Groups'] = implode(',', $m4is_vwdb4);
 $m4is_p9r_8e['!LastUpdated'] = time();
 if ($m4is_xxcq3i) { echo __LINE__, " - Final Groups = ", implode(',', $m4is_vwdb4), "\n";
 echo __LINE__, " - Final Contact = ", print_r($m4is_p9r_8e, true), "\n";
 } $this->m4is_bnd6ti->m4is_dhpr($m4is_p9r_8e);
 } else { if ($m4is_xxcq3i) echo __LINE__, " - No Tag ID's passed\n";
 } } else { if ($m4is_xxcq3i) echo __LINE__, " - Contact ID ", $m4is_e2kg, " not found.\n";
 } } } 
function m4is_jcy_() { $m4is_xxcq3i = isset($_GET['debug']) ? TRUE : FALSE;
 $m4is_ig9p6 = m4is_yiyab($_REQUEST['Email']);
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 if ($m4is_ig9p6 > 0) { update_user_meta($m4is_ig9p6, 'memberium_optout', 0);
 if ($m4is_xxcq3i) echo __LINE__, " - User ID ", $m4is_ig9p6, " opted in\n";
 } else { if ($m4is_xxcq3i) echo __LINE__, " - User ID ", $m4is_ig9p6, " not found\n";
 } } 
function m4is_ib8yv() { m4is_aoxw::m4is_djr4nd();
 $m4is_xxcq3i = isset($_GET['debug']) ? TRUE : FALSE;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 $m4is_ig9p6 = m4is_yiyab($_REQUEST['Email']);
 if ($m4is_ig9p6 > 0) { update_user_meta($m4is_ig9p6, 'memberium_optout', 1);
 if ($m4is_xxcq3i) echo __LINE__, " - User ID ", $m4is_ig9p6, " opted out\n";
 } else { if ($m4is_xxcq3i) echo __LINE__, " - User ID ", $m4is_ig9p6, " not found\n";
 } } 
function m4is_d5mv() { m4is_aoxw::m4is_djr4nd();
 global $wpdb;
 $m4is_xxcq3i = isset($_GET['debug']) ? TRUE : FALSE;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 $m4is_powbq2 = $this->m4is_bnd6ti->m4is_oiewvu('ga_customvars', 'username_field');
 $m4is_gai6k = $_POST[$m4is_powbq2];
 $m4is_x0_hk = get_user_by('email', $m4is_gai6k);
 $m4is_us4yqi = $_GET['countername'];
 $m4is_v6fdv4 = strtolower($_GET['action']);
 $m4is_w_o7al = $_GET['value'];
 if ($m4is_xxcq3i) { echo __LINE__, " - Username Field:  {$m4is_powbq2}\n";
 echo __LINE__, " - Username:  {$m4is_gai6k}\n";
 echo __LINE__, " - User:  {$m4is_x0_hk}\n";
 echo __LINE__, " - Counter Name:  {$m4is_us4yqi}\n";
 echo __LINE__, " - Action:  {$m4is_v6fdv4}\n";
 echo __LINE__, " - Value:  {$m4is_w_o7al}\n";
 } if ($m4is_x0_hk) { if ($m4is_xxcq3i) echo __LINE__, " - Found User\n";
 switch ($m4is_v6fdv4) { case 'set': m4is_wbc8os::m4is_ehvrpa($m4is_us4yqi, $m4is_w_o7al, $m4is_x0_hk->ID);
 $this->m4is_bnd6ti->m4is_m3vz();
 if ($m4is_xxcq3i) echo __LINE__, " - Custom Counter Updated\n";
 break;
 }  } else { if ($m4is_xxcq3i) echo __LINE__, " - Username {$m4is_gai6k} not found.\n";
 } echo 'Operation Completed';
 $this->m4is_bnd6ti->m4is_q285('send_http_post');
 }  
function m4is_si26ex() { m4is_aoxw::m4is_djr4nd();
 $m4is_xxcq3i = isset($_GET['debug']) ? true : false;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_e2kg = isset($_POST['Id']) ? (int) $_POST['Id'] : 0;
 $m4is_k3wtue = isset($_GET['destfield']) ? trim($_GET['destfield']) : '';
 $m4is_b7ao5t = isset($_GET['subscriptionplans']) ? explode(',', $_GET['subscriptionplans']) : [];
 if ($m4is_xxcq3i) { echo __LINE__, " - Contact Id: ", $m4is_e2kg, "\n";
 echo __LINE__, " - Destination Field: ", $m4is_k3wtue, "\n";
 echo __LINE__, " - Subscription Types: ", $m4is_b7ao5t, "\n";
 } if ($m4is_e2kg > 0 && $m4is_k3wtue > '') { $m4is__u5v = [ 'Id', 'BillingCycle', 'Frequency', 'Status', 'contactId', 'EndDate', 'LastBillDate', 'NextBillDate', 'PaidThruDate', 'StartDate', 'SubscriptionPlanId' ];
 $m4is_jo8fb = [ 'contactId' => $m4is_e2kg, 'Status' => 'Active', ];
 $m4is_yvy8 = m4is_ho3l::m4is_mg4uyc('RecurringOrder', 997, 0, $m4is_jo8fb, $m4is__u5v);
 $m4is_n82x3k = '99991231T12:59:59';
 $m4is_jl7j9 = date('YmdTH:i:s');
 if (is_array($m4is_yvy8) ) { foreach ($m4is_yvy8 as $m4is_vky3j) { if ($m4is_xxcq3i) echo __LINE__, " - RecurringOrders\n", print_r($m4is_vky3j, true), "\n";
 if (! empty($m4is_vky3j['NextBillDate']) ) { if ($m4is_vky3j['NextBillDate'] < $m4is_n82x3k) { if ($m4is_vky3j['NextBillDate'] >= $m4is_jl7j9) { if (empty($m4is_b7ao5t) || in_array($x, $m4is_b7ao5t) ) { $m4is_n82x3k = $m4is_vky3j['NextBillDate'];
 } } } } } } if ($m4is_xxcq3i) echo __LINE__, " - Next Billing Date = ", $m4is_n82x3k, "\n";
 if ($m4is_n82x3k <> '99991231T12:59:59') { $this->m4is_bnd6ti->m4is_wzxl_1($m4is_k3wtue, $m4is_n82x3k, $m4is_e2kg);
 if ($m4is_xxcq3i) echo __LINE__, " - Contact Updated (", $m4is_e2kg, ")\n";
 } } }  
function m4is_c5e2q_() { m4is_aoxw::m4is_djr4nd();
 $m4is_xxcq3i = isset($_GET['debug']) ? true : false;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 $m4is_q8vgfd = m4is__gu52::m4is_eh6lg($_POST['Id'], 'httppost', 'Expire Subscriptions');
 date_default_timezone_set('America/New_York');
 $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_jl7j9 = date('Y-m-d');
 $m4is__u5v = [ 'Id', ];
 $m4is_jo8fb = [ 'Status' => 'Active', 'EndDate' => '~<=~' . $m4is_jl7j9, ];
 if ($m4is_xxcq3i) { echo '<pre>$elv_query = ', print_r($m4is_jo8fb, true), '</pre>';
 echo '<pre>$elv_recurringorders = ', print_r($m4is_yvy8, true), '</pre>';
 } $m4is_yvy8 = m4is_ho3l::m4is_mg4uyc('RecurringOrder', 995, 0, $m4is_jo8fb, $m4is__u5v);
 $m4is_mzcd = ['Status' => 'Inactive'];
 foreach($m4is_yvy8 as $m4is_vky3j) { m4is_ho3l::m4is_btu_('RecurringOrder', (int) $m4is_vky3j['Id'], $m4is_mzcd);
 m4is__gu52::m4is_qyunz0( $m4is_q8vgfd, "Deactivating Recurring Order #{$m4is_vky3j['Id']}" );
 if ($m4is_xxcq3i) { echo 'Deactivating Recurring Order #', $m4is_vky3j['Id'], '<br>';
 } sleep(1);
 } exit;
 }    
function m4is__yckx($m4is_etj2, $m4is_o7tdnl) {     if (isset($m4is_etj2['default_value']) ) { $m4is_etj2['default_value'] = do_shortcode($m4is_etj2['default_value']);
 }  return $m4is_etj2;
 }    
function m4is_dvu19($m4is_ei9bcp, $m4is_c2ah) { m4is_aoxw::m4is_djr4nd();
 if (! m4is_u68pu::m4is_u6mkaw() ) { return $m4is_ei9bcp;
 } $m4is__8htld = $this->m4is_k_4p2o($m4is_c2ah->ID);
 if (! $m4is__8htld) { return $m4is_c2ah->excerpt;
 } return null;
 }     
function m4is_zlp6x1($m4is_ig9p6, $m4is_v63t) { return;
 if (! class_exists('WooCommerce') ) { return;
 } global $woocommerce;
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if (! $m4is_e2kg) { return;
 } $m4is_h7k8j = m4is_wbc8os::m4is_jjgo();
 $m4is_r5wb = ($m4is_e2kg == $m4is_h7k8j);
 $m4is_m4df = apply_filters('memberium/usermeta/crm_field_maps', $m4is_m4df);
 $m4is_t1tnip = get_user_meta($m4is_ig9p6);
  $m4is_zy5wa4 = [];
 foreach ($m4is_m4df as $m4is_hkugrq => $isfield) { $session_fieldname = strtolower($isfield);
 if (isset($m4is_t1tnip[$m4is_hkugrq][0]) ) { $m4is_aa65og = $m4is_t1tnip[$m4is_hkugrq][0];
 if ($m4is_hkugrq == 'billing_country' || $m4is_hkugrq == 'shipping_country') { $m4is_aa65og = m4is_sg9i6::m4is_wqxe($m4is_aa65og);
 }  if ($m4is_r5wb) { m4is_wbc8os::m4is_mz_rq($session_fieldname, $m4is_aa65og);
 }  $m4is_zy5wa4[$isfield] = $m4is_aa65og;
 } } if (! empty($m4is_zy5wa4) ) {  m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is_zy5wa4);
   $m4is_ereh = m4is_bnrdbo::m4is_yvnol($m4is_e2kg);
 foreach ($m4is_zy5wa4 as $m4is_yxwn=>$m4is_n6yjk9) { $m4is_ereh[$m4is_yxwn] = $m4is_n6yjk9;
 } $this->m4is_bnd6ti->m4is_dhpr($m4is_ereh);
 } } 
function m4is_q06g4q($m4is_ereh, $m4is_ig9p6 = 0) { return;
 if (! class_exists('WooCommerce') ) { return;
 } if (empty($m4is_ig9p6) ) { return;
 } $m4is_m4df = apply_filters('memberium/usermeta/crm_field_maps', []);
 $m4is_powbq2 = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'username_field');
 if ( (int) $m4is_ig9p6 == 0) { $m4is_ig9p6 = get_current_user_id();
 } if ( (int) $m4is_ig9p6 == 0) { $m4is_f_v98a = get_user_by('email', $m4is_ereh[$m4is_powbq2]);
 $m4is_ig9p6 = $m4is_f_v98a->ID;
 } if ( (int) $m4is_ig9p6 == 0) { $m4is_f_v98a = get_user_by('login', $m4is_ereh[$m4is_powbq2]);
 $m4is_ig9p6 = $m4is_f_v98a->ID;
 } if ( (int) $m4is_ig9p6 > 0) { foreach ($m4is_m4df as $woofield => $isfield) { if (isset($m4is_ereh[$isfield]) ) { $m4is_aa65og = trim($m4is_ereh[$isfield]);
 if ($woofield == 'billing_country' || $woofield == 'shipping_country') { $m4is_aa65og = m4is_sg9i6::m4is_wqxe($m4is_aa65og);
 } update_user_meta($m4is_ig9p6, $woofield, $m4is_aa65og);
 } } } } 
function m4is_xc2y1h($user = NULL) { if (! class_exists('WooCommerce') ) { return;
 }  if (isset($_POST['password_1']) && isset($_POST['password_2']) && $_POST['password_1'] > '' && $_POST['password_1'] == $_POST['password_2']) { $user = wp_get_current_user();
 $this->m4is_ouygp($user);
 } }  
function m4is_f06y() { if (empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'extended_reg_fields') ) ) { return;
 } ?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="reg_billing_first_name">First Name <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="margin-bottom:-1em;">
		<label for="reg_billing_last_name">Last Name <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="" />
		</p>
			<?php
 } 
function m4is_aosq($m4is_gai6k, $m4is_fliw, $m4is_yo9b) { if (empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'extended_reg_fields') ) ) { return;
 } if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name']) ) { $m4is_yo9b->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce') );
 } if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name']) ) { $m4is_yo9b->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce') );
 } return $m4is_yo9b;
 }       
function m4is_je8_gj($m4is_x0_hk) { if (is_a($m4is_x0_hk, 'WP_User')) { $_SESSION = $this->m4is_bnd6ti->m4is_akz3($m4is_x0_hk->ID);
 } return $m4is_x0_hk;
 }  
function m4is_rxfm_($m4is_gai6k) { $m4is_powbq2 = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'username_field');
 if (! strpos($m4is_gai6k, '@') && ! in_array($m4is_powbq2, ['Email', 'EmailAddress2', 'EmailAddress3'] ) ) { $m4is_x0_hk = get_user_by('login', $m4is_gai6k);
 if (is_a($m4is_x0_hk, 'WP_User') ) { $m4is_gai6k = $m4is_x0_hk->data->user_email;
 } } return $m4is_gai6k;
 }  
function m4is_umgev() { if ( $this->m4is_bnd6ti->m4is_dpuy9() > 0) { $m4is_nhun = (int) $this->m4is_bnd6ti->m4is_oiewvu('settings', 'autologout_time');
 $m4is_cc36l = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_logout_page');
 if (! empty($_SESSION['memb_user']['logout_page']) ) { $m4is_gyv9 = wp_logout_url(get_permalink($_SESSION['memb_user']['logout_page']) );
 } elseif (! empty($m4is_cc36l) ) { $m4is_gyv9 = wp_logout_url($m4is_cc36l);
 } else { $m4is_gyv9 = wp_logout_url(get_site_url() );
 } echo '<meta http-equiv="refresh" content="', $m4is_nhun, ';url=', $m4is_gyv9, '">';
 } } 
function m4is_ejcl() { return $this->login_redirect_enabled;
 } 
function m4is_hyfr3($m4is_zg8z) { $this->login_redirect_enabled = (bool) $m4is_zg8z;
 }    
function m4is_acoq() { $m4is_v6fdv4 = isset($_POST['memb_form_type']) ? trim(strtolower($_POST['memb_form_type']) ) : '';
 if (! empty($m4is_v6fdv4) ) { $m4is_dsjv = 'm4is_kfea';
 $m4is_bic1p = [ 'memb_change_email' => [$m4is_dsjv, 'm4is_s1cdt8'], 'memb_change_password' => [$m4is_dsjv, 'm4is_rhcrdb'], ];
 $m4is_bic1p = apply_filters('memberium/user_catchers/get', $m4is_bic1p);
 if (! empty($m4is_bic1p[$m4is_v6fdv4])) { m4is_aoxw::m4is_djr4nd();
 call_user_func($m4is_bic1p[$m4is_v6fdv4]);
 } } } 
function m4is_i5b9l() { $m4is_v6fdv4 = isset($_POST['memb_form_type']) ? trim(strtolower($_POST['memb_form_type']) ) : '';
 if (! empty($m4is_v6fdv4) ) { $m4is_dsjv = 'm4is_kfea';
 $m4is_bic1p = [ 'memb_actionset_button' => [$m4is_dsjv, 'm4is_lqok_z'], 'memb_add_creditcard_button' => [$m4is_dsjv, 'm4is_iu7hr3'], 'memb_cancel_subscription' => [$m4is_dsjv, 'm4is_orwh3'], 'memb_filebox_upload' => [$m4is_dsjv, 'm4is_fj9mzr'], 'memb_pay_invoice' => [$m4is_dsjv, 'm4is_vbfq'], 'memb_place_order' => [$m4is_dsjv, 'm4is_ndgebf'], 'memb_placeorder_button' => [$m4is_dsjv, 'm4is_z9pmy'], 'memb_registration' => [$m4is_dsjv, 'm4is_mq2r'], 'memb_resetfeedurl_button' => [$m4is_dsjv, 'm4is_ni87f6'], 'memb_send_password' => [$m4is_dsjv, 'm4is_e0iq'], 'memb_update_contact_form' => [$m4is_dsjv, 'm4is_v2uwhg'], 'memb_lost_password' => [$m4is_dsjv, 'm4is_o73ps0'], ];
 $m4is_bic1p = apply_filters('memberium/catchers/get', $m4is_bic1p);
 if (! empty($m4is_bic1p[$m4is_v6fdv4])) { m4is_aoxw::m4is_djr4nd();
 call_user_func($m4is_bic1p[$m4is_v6fdv4]);
 } } } 
function m4is_ocyx($m4is_rlp0) { if (is_user_logged_in() ) { if ( $this->m4is_bnd6ti->m4is_lvmz1b() ) { return $m4is_rlp0;
 } return '';
 } return $m4is_rlp0;
 } 
function m4is_f64h( $m4is_azd3gq = '', $m4is_o3rg = '', $m4is_iqpe = '' ) { return html_entity_decode( $m4is_azd3gq, ENT_NOQUOTES );
 } 
function m4is_g5_cl( array $m4is_uvoeai ) { $m4is_uvoeai['title'] = html_entity_decode( $m4is_uvoeai['title'], ENT_NOQUOTES );
 return $m4is_uvoeai;
 }    private 
function m4is_v_sab0() { add_action('wp_logout', [$this, 'm4is_fwd5yl'] );
  add_filter('wp_authenticate_user', [$this, 'm4is_je8_gj'], 1);
 } private 
function m4is_vy_15() { add_filter('comments_array', [$this, 'm4is_ec12x'], 5);
 add_filter('comments_array', [$this, 'm4is__iev'], 7);
 add_filter('comments_open', [$this, 'm4is_k6apl_'], 100, 2);
 add_filter('get_comments_number', [$this, 'm4is_c31zd'], 10, 2);
 }  private 
function m4is_bjsyh2() { add_action( 'do_feed_atom_comments', [$this, 'm4is_pcpsx'], 1 );
 add_action( 'do_feed_atom', [$this, 'm4is_pcpsx'], 1 );
 add_action( 'do_feed_rdf', [$this, 'm4is_pcpsx'], 1 );
 add_action( 'do_feed_rss', [$this, 'm4is_pcpsx'], 1 );
 add_action( 'do_feed_rss2_comments', [$this, 'm4is_pcpsx'], 1 );
 add_action( 'do_feed_rss2', [$this, 'm4is_pcpsx'], 1 );
 add_action( 'do_feed', [$this, 'm4is_pcpsx'], 1 );
 add_filter( 'feed_link', function() { return '';
 } );
 add_filter( 'gettext', function( $m4is_u36ko, $m4is_knyw0, $m4is_ml7s2b ) { return in_array( $m4is_u36ko, ['Entries feed', 'Comments feed'] ) ? '' : $m4is_u36ko;
 }, 10, 3 );
 remove_action( 'wp_head', 'feed_links_extra', 3 );
 remove_action( 'wp_head', 'feed_links', 2 );
 remove_action( 'wp', 'bp_activity_action_favorites_feed', 3 );
 remove_action( 'wp', 'bp_activity_action_friends_feed', 3 );
 remove_action( 'wp', 'bp_activity_action_mentions_feed', 3 );
 remove_action( 'wp', 'bp_activity_action_my_groups_feed', 3 );
 remove_action( 'wp', 'bp_activity_action_personal_feed', 3 );
 remove_action( 'wp', 'bp_activity_action_sitewide_feed', 3 );
 remove_action( 'wp', 'groups_action_group_feed', 3 );
 }  private 
function m4is_qdhrj() { add_action('do_feed_atom', [$this, 'm4is_d8t1v'], 1);
 add_action('do_feed_rdf', [$this, 'm4is_d8t1v'], 1);
 add_action('do_feed_rss', [$this, 'm4is_d8t1v'], 1);
 add_action('do_feed_rss2', [$this, 'm4is_d8t1v'], 1);
 }  private 
function m4is_oqf9() { $m4is_i4gam = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'wp_autop');
 if ($m4is_i4gam == 1) { remove_filter('the_content', 'wpautop');
 } elseif ($m4is_i4gam == 2) { $m4is_mxh3 = has_filter('the_content', 'wpautop');
 if ($m4is_mxh3 !== false && $m4is_mxh3 < 11) { remove_filter('the_content', 'wpautop');
 add_filter('the_content', 'wpautop', 11);
 } } }  private 
function m4is_pwnd0x() { $m4is_utoc = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'disable_lost_password');
 $m4is_fiwfc6 = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'disable_password_reset');
 $m4is_oy26aw = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'autologout_time');
 $m4is_br_kby = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'protect_feeds');
 if ($m4is_utoc) { add_filter('gettext', [$this, 'm4is_z63p']);
 } if ($m4is_fiwfc6) { add_filter('allow_password_reset', [$this, 'm4is_xx7d3']);
 } if ($m4is_oy26aw) { add_action('wp_head', [$this, 'm4is_umgev']);
 } if (! empty($_GET['rss_user']) ) { add_filter('posts_pre_query', ['m4is_bea_0', 'm4is_x6ipr_'], 10, 2);
 } if ($m4is_br_kby) {  $this->m4is_bjsyh2();
 } else { $this->m4is_qdhrj();
 } if ( ! is_admin() ) {  add_filter('widget_text', 'do_shortcode');
 add_filter('widget_title', 'do_shortcode');
 add_filter('the_title', 'do_shortcode');
 add_filter('the_excerpt', 'do_shortcode');
 add_filter('get_the_excerpt', 'do_shortcode', 10);
 add_filter('get_the_author_description', 'do_shortcode');
 add_filter('excerpt_length', [$this, 'm4is_uy2l'], 999);
 } }  private 
function m4is_wdtncw() { if ($_SERVER['REQUEST_METHOD'] == 'POST') { $m4is_umg1 = ! empty($_GET['operation']) && ! empty($_GET['auth_key']) || (! empty($_GET['i4w_genpass']) || (! empty($_GET['i4w_sync_user'])));
 if ( $m4is_umg1 ) { add_action( 'plugins_loaded', [$this, 'm4is_e0pvg'], 100 );
 } else { add_action('template_redirect', [$this, 'm4is_acoq'], 1);
 add_action('init', [$this, 'm4is_i5b9l'], 11);
 } } }     
function m4is_b6fd( string $m4is_klo5m, $m4is_zg8z, $m4is_nqie ) : string { if ( ! m4is_vv5u::m4is_b4_tb() ) { return $m4is_klo5m;
 } if ( empty( $m4is_klo5m ) || $m4is_klo5m == 'WordPress' ) { $m4is_n98u = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS );
 $m4is_j5sy07 = 0;
 krsort( $m4is_n98u );
 foreach( $m4is_n98u as $m4is_jzshu => $m4is_iidm ) { if ( ! empty( $m4is_iidm['function'] ) && in_array( $m4is_iidm['function'], ['wp_safe_redirect', 'wp_redirect' ] ) ) { $m4is_j5sy07 = $m4is_jzshu + 1;
 break;
 } } if ( $m4is_j5sy07 && ! empty( $m4is_n98u[$m4is_j5sy07] ) ) { $m4is_iidm = $m4is_n98u[$m4is_j5sy07];
 $m4is_j8ih = empty( $m4is_iidm['function'] ) ? '' : 'Function ' . $m4is_iidm['function'] . '() @ ';
 $m4is_klo5m = sprintf( 'Line %d, %s in %s', $m4is_iidm['line'], $m4is_j8ih, substr( $m4is_iidm['file'], strlen( $_SERVER['DOCUMENT_ROOT'] ) ) );
 } } return $m4is_klo5m;
 }   
function m4is_jto3s($m4is_l579, $m4is_x0_hk) { if (! empty($_GET['redirect_to']) ) { return $_GET['redirect_to'];
 } if ( $this->m4is_bnd6ti->m4is_lvmz1b() ) { return get_dashboard_url();
 } if (! empty($this->login_redirect_url) ) { return $this->login_redirect_url;
 } return $m4is_l579;
 }   
function m4is_bsk5de($m4is_crd27b, $m4is_p8jb9, $m4is_tupm4s) { if (empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'sync_new_wp_users') ) ) { return;
 } if (empty($m4is_p8jb9['user_pass']) ) { return;
 } $m4is_w_8g = apply_filters('memberium/usermeta/crm_field_maps', []);
 $m4is_p9r_8e = [];
 $m4is_auhoe = get_user_meta($m4is_crd27b);
 foreach($m4is_w_8g as $meta_name => $crm_name) { if (isset($m4is_auhoe[$meta_name][0]) ) { $m4is_p9r_8e[$crm_name] = trim($m4is_auhoe[$meta_name][0]);
 } }  if (! empty($m4is_p9r_8e)) { $m4is_p9r_8e['Email'] = $m4is_p8jb9['user_email'];
 $m4is_e2kg = m4is_bnrdbo::m4is_klk1gy($m4is_p9r_8e);
 } } }

