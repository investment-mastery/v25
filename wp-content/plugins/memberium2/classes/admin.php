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
class m4is_q1zh2 { private $m4is_n3zlk;
 private $settings;
 private $notices;
 private $core;
 private $appname;
 private $non_enhanced_post_types = [];
 private $public_post_types = [];
 private $preview_mode = false;
 private $minimum_i2sdk_version = 3.55;
 private $m4is_bnd6ti;
  static 
function get_instance() : self { static $instance;
 return $instance ?? $instance = new self;
 } private 
function __construct() { $this->m4is_n3zlk = 'memberium';
 $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->notices = [];
 $this->appname = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $this->preview_mode = (int) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'preview_mode' );
 $m4is_oz2y = (string) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'version' );
 $this->m4is_tpzl();
 add_action( 'admin_menu', [$this, 'm4is_jcdzj'] );
  if ( ! method_exists( $this->m4is_bnd6ti->m4is_se2n8(), 'isVerified' ) || ! $this->m4is_bnd6ti->m4is_se2n8()->isVerified() ) { return;
 } if ($m4is_oz2y !== $this->m4is_bnd6ti->m4is_u04m() ) { m4is_fbl5x8::m4is_nd36nj();
 } if ( ! m4is_u68pu::m4is_i9k3m() ) { m4is_u68pu::m4is_k6nh();
 } add_action('admin_enqueue_scripts', [$this, 'm4is_ag9e'], 1);
 add_action('admin_init', [$this, 'm4is_i0pz1'], 100);
 add_action('admin_notices', [$this, 'm4is_i8cb1'] );
 add_action('admin_post_memberium_scan_users', [$this, 'm4is_eyjhr']);
 add_action('wpmu_new_blog', [$this, 'm4is_xnlsr'], 10, 6);
 add_filter('plugin_action_links', [$this, 'm4is_xogxrd'], 10, 2);
 add_filter('plugin_action_links', [$this, 'm4is_y9o3si'], 10, 4);
 if ( ! m4is_u68pu::m4is_i9k3m() ) { return;
 } add_action( 'wp_loaded', [$this, 'm4is_kz8o'], 1 );
 add_action( 'admin_init', [$this, 'm4is_s_xr5'] );
 add_action( 'admin_print_scripts-edit.php', [$this, 'm4is_a274'] );
 add_action( 'edit_form_after_title', [$this, 'm4is_zvu3a'] );
 add_action( 'init', [$this, 'm4is_qb6xu'], 5 );
 add_action( 'init', [$this, 'm4is_mhtv'], 999999 );
 add_action( 'save_post', [$this, 'm4is_tnsptr'], 1, 3 );
   if ( m4is_u68pu::m4is_u26m8u(['unlimited' ] ) ) { if ( $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'fast_user_list' ) ) { add_filter( 'manage_users_columns', [ $this, 'm4is_mgxa' ], PHP_INT_MAX );
 } }  add_post_type_support('page', 'excerpt');
 if ( function_exists( 'wp_generate_password' ) ) { if ( empty( $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'random_seed' ) ) ) { $this->m4is_bnd6ti->m4is_qdi_3o( wp_generate_password( 16, FALSE, FALSE), 'settings', 'random_seed' );
 } } require_once ABSPATH . 'wp-admin/includes/plugin.php';
 $this->m4is_bnd6ti->m4is_qdi_3o( is_plugin_active( 'google-analytics-for-wordpress/googleanalytics.php'), 'plugins', 'google-analytics-for-wordpress' );
 $this->m4is_bnd6ti->m4is_qdi_3o( is_plugin_active( 'nextend-facebook-connect/nextend-facebook-connect.php'), 'plugins', 'nextend-facebook-connect' );
 add_filter( 'bulk_actions-edit-post', [ $this, 'm4is_j61eg'] );
 add_filter( 'bulk_actions-edit-page', [ $this, 'm4is_j61eg'] );
 add_filter( 'handle_bulk_actions-edit-post', [ $this, 'm4is_taw0b'], 10, 3 );
 add_filter( 'handle_bulk_actions-edit-page', [ $this, 'm4is_taw0b'], 10, 3 );
 add_filter( 'gutenberg_can_edit_post_type', [$this, 'm4is__51ehq'], PHP_INT_MAX, 2 );
 add_action( 'user_new_form', [$this, 'm4is__g5o'] );
 if ( isset( $_GET['memberium_ignore_notice'] ) ) { add_action( 'init', [$this, 'm4is_phuz0t'] );
 } $this->m4is_ww61so();
 require_once $this->m4is_bnd6ti->m4is_ikr4nx( 'marketplace/init.php' );
 }  
function m4is_ww61so() {  $this->m4is_gbavpe();
  $this->m4is_obaw9();
  add_filter( 'site_status_tests', [$this, 'm4is_g689'], 1, 1 );
  add_filter( 'http_response', [$this, 'm4is_dciy'], 1, 3 );
  add_filter( 'pre_http_request', [$this, 'm4is_n3g5z'], 1, 3 );
  add_filter( 'manage_users_columns', [$this, 'm4is_q4qr'] );
  add_filter( 'manage_users_custom_column', [$this, 'm4is_ia9zrg'], 10, 3 );
 } 
function m4is__e1o() : bool { return (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'show_advanced_options', 0 );
 }  private 
function m4is_tpzl() { $classes = [ 'm4is_xm5qfa' => 'classes/admin_banner', 'm4is_a8gw' => 'classes/access/admin-menu', 'm4is_zucjs6' => 'classes/admin-post-edit', 'm4is_vmiwx' => 'classes/admin-tabs', 'm4is_c82oj9' => 'classes/access/admin-taxonomy', 'm4is_wr40w' => 'classes/admin-ui', 'm4is_j3cux' => 'classes/access/admin-widgets', 'm4is_us74' => 'classes/diagnostics', 'm4is_or93' => 'classes/post_sherpa', ];
 $this->m4is_bnd6ti->m4is_gt7z( $classes );
 } 
function m4is_bvk_su() : int { $m4is_cd8k = 0;
 $m4is_cd8k = empty( $_POST['post_ID'] ) ? $m4is_cd8k : (int) $_POST['post_ID'];
 $m4is_cd8k = empty( $_GET['post'] ) ? $m4is_cd8k : (int) $_GET['post'];
 return $m4is_cd8k;
  }   
function m4is_xdun() : string { $m4is_u23rl = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
 $m4is_u23rl = empty( $m4is_u23rl ) ? get_post_type( $this->m4is_bvk_su() ) : $m4is_u23rl;
 $m4is_u23rl = empty( $m4is_u23rl ) ? 'post' : $m4is_u23rl;
 return $m4is_u23rl;
 }    
function m4is_rphw1( int $m4is_cd8k, string $m4is_p57jr0, string $m4is_v6fdv4, $m4is_a3nxjy = 'edit_posts' ) : bool { if ( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) { return false;
 } if ( empty( $_POST[$m4is_p57jr0] ) || ! wp_verify_nonce( $_POST[$m4is_p57jr0], $m4is_v6fdv4 ) ) { return false;
 } $m4is_a3nxjy = is_array( $m4is_a3nxjy ) ? $m4is_a3nxjy : array_filter( explode( ',', $m4is_a3nxjy ) );
 foreach( $m4is_a3nxjy as $m4is_ferk6j ) { if ( ! current_user_can( $m4is_mygduq, $m4is_cd8k ) ) { return true;
 } } return false;
 } 
function m4is_sgi5( int $m4is_cd8k, array $m4is_flx71n, array $m4is_uz9ek ) { foreach ( $m4is_flx71n as $m4is_s2ge5 ) { if ( isset( $m4is_uz9ek[$m4is_s2ge5] ) ) { if ( empty( $m4is_uz9ek[$m4is_s2ge5] ) ) { delete_post_meta( $m4is_cd8k, $m4is_s2ge5 );
 } else { update_post_meta( $m4is_cd8k, $m4is_s2ge5, $m4is_uz9ek[$m4is_s2ge5] );
 } } } }    
function m4is_j61eg( array $m4is_oa_j2 ) : array { $m4is_oa_j2['memberium-page-export'] = 'Page Export';
 return $m4is_oa_j2;
 } 
function m4is_taw0b(string $m4is_l579, string $m4is_mlsik, $m4is_lyrv) : string { if ($m4is_mlsik == 'memberium-page-export') { $m4is_mtgjc = m4is_or93::m4is_aqv14($m4is_lyrv);
 return get_admin_url() . 'upload.php?item=' .(int) $m4is_mtgjc;
 return get_permalink($m4is_mtgjc);
 } return $m4is_l579;
 } 
function m4is_xogxrd( array $m4is_xk2iz, string $m4is_m_mie7 ) { if ( stripos( $m4is_m_mie7, '/memberium2.php' ) === false ) { return $m4is_xk2iz;
 } $m4is_o2rm = get_admin_url( null, 'admin.php?page=memberium-support&tab=support' );
 $m4is_x7ezp6 = get_admin_url( null, 'admin.php?page=memberium-support&tab=updates' );
 $m4is_xk2iz['updates'] = sprintf( '<a href="%s"> %s </a>', $m4is_x7ezp6, __( 'Check Updates', 'plugin_domain' ) );
 $m4is_xk2iz['support'] = sprintf( '<a href="%s"> %s </a>', $m4is_o2rm, __( 'Support', 'plugin_domain' ) );
  return $m4is_xk2iz;
 } 
function m4is__51ehq(bool $m4is_epcnjm, string $m4is_a_hn) : bool { if ($m4is_epcnjm) { $m4is_sznc = [ 'memb_shortcodeblocks', 'partials', ];
 $m4is_a_hn = strtolower($m4is_a_hn);
 $m4is_epcnjm = ! in_array($m4is_a_hn, $m4is_sznc);
 } return $m4is_epcnjm;
 } 
function m4is_y9o3si(array $m4is_oa_j2, string $m4is__vgnju, $m4is_ymls48, $m4is_hl8q) : array { if ($m4is__vgnju == 'i2sdk2/i2sdk2.php') { $m4is_oa_j2['activate'] = '<em style="color:red;">No longer needed.  Please delete.</em>';
 } return $m4is_oa_j2;
 }    
function m4is_qb6xu() { add_action( 'personal_options_update', [$this, 'm4is_idoj'], 1 );
 add_filter( 'get_sample_permalink_html', [$this, 'm4is_dya54'], 10, 5 );
 if ( current_user_can( 'manage_options' ) ) { add_action( 'delete_user', [$this, 'm4is_y5xl'] );
 add_action( 'load-users.php', [$this, 'm4is_y47ue'] );
 add_action( 'edit_user_profile', [$this, 'm4is_ob17'], 2000 );
 add_action( 'edit_user_profile_update', [$this, 'm4is_idoj'], 1 );
 add_action( 'profile_update', [$this, 'm4is_vpxmo'], 10, 2 );
 add_action( 'show_user_profile', [$this, 'm4is_ob17'] );
 } if ( current_user_can( 'manage_options' ) ) { if ( MEMBERIUM_BETA ) { add_action( 'admin_notices', [$this, 'm4is_m9bun'] );
 } } if ( is_plugin_active( 'memberium2-installer/memberium2-installer.php' ) ) { deactivate_plugins( 'memberium2-installer/memberium2-installer.php' );
 } } 
function m4is_dya54( $m4is_kof0, $m4is_cd8k, $m4is_shpn, $new_slug, $m4is_c2ah ) { if ( property_exists( $m4is_c2ah, 'post_type' ) ) { if ( in_array( $m4is_c2ah->post_type, ['partials', 'memb_shortcodeblocks'] ) ) { return null;
 } } return $m4is_kof0;
 } 
function m4is_mhtv() { $this->non_enhanced_post_types = $this->m4is_bnd6ti->m4is_nhtyc();
 $m4is_a_hn = isset($_GET['post_type']) ? $_GET['post_type'] : 'post';
 $m4is_zsijpm = ! in_array($m4is_a_hn, $this->non_enhanced_post_types);
 $m4is_zsijpm = $m4is_zsijpm || in_array($m4is_a_hn, ['memb_shortcodeblocks']);
 if ( $m4is_zsijpm ) { add_action( 'manage_pages_custom_column', [$this, 'm4is_r485_q'], 10, 2 );
 add_action( 'manage_posts_custom_column', [$this, 'm4is_r485_q'], 10, 2 );
   add_filter( 'manage_pages_columns', [$this, 'm4is_vg_i95'] );
 add_filter( 'manage_posts_columns', [$this, 'm4is_vg_i95'] );
 } } 
function m4is_zvu3a() { if ( isset( $_GET['post'] ) ) { $m4is_c2ah = get_post( $_GET['post'] );
 if ( empty( $m4is_c2ah->post_name ) ) { return;
 } } else { return;
 } $m4is_knyw0 = '';
 if ( $m4is_c2ah->post_type == 'partials' ) { $m4is_knyw0 = '[memb_include_partial id=' . $m4is_c2ah->ID . ']';
 } elseif ( $m4is_c2ah->post_type == 'memb_shortcodeblocks' ) { $m4is_knyw0 = '[membc_' . $m4is_c2ah->post_name . ']';
 } if ( ! empty( $m4is_knyw0 ) ) { echo '<h2>', $m4is_knyw0, '</h2>';
 } }    private 
function m4is_us5c6() { global $wpdb;
 $m4is_tovizk = "DELETE FROM `{$wpdb->options}` WHERE `option_name` LIKE '%transient_memberium%' OR `option_name` LIKE '%transient_timeout_memberium%' ; ";
 $wpdb->query($m4is_tovizk);
 } 
function m4is_tk7h4() { global $wpdb;
 $this->m4is_us5c6();
 $m4is_zcvsth = m4is_pk8phc::m4is_pkgv();
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is_zcvsth, 'settings', 'referral_partner_order' );
 m4is_tvc2xn::m4is_fre0();
 m4is_a8iaym::m4is_j23h();
 m4is_a18xl::m4is_nzf_t();
 m4is_pwtg7::m4is_jgs89();
 m4is_dcig::m4is_p0e1g5();
 m4is_untczd::m4is_ky94f();
 m4is_untczd::m4is_k896();
 if (! empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'sync_ecommerce') ) ) { m4is_untczd::m4is_ypsh6m();
 } $this->m4is_bnd6ti->m4is_se_9hv();
 $m4is_dcjt_3 = get_option('memberium_tables_updated', [] );
 $m4is_dcjt_3['actionsets'] = time();
 $m4is_dcjt_3['i2sdk_customfields'] = time();
 $m4is_dcjt_3['tagcategories'] = time();
 $m4is_dcjt_3['tags'] = time();
 $m4is_dcjt_3['products'] = time();
 $m4is_dcjt_3['subscriptionplans'] = time();
 update_option('memberium_tables_updated', $m4is_dcjt_3);
 m4is_wr40w::m4is_cxesuf('Keap Synchronized', 'update');
 } 
function m4is_t23_6() { global $wpdb;
 $m4is_myuzdv = get_option( 'memberium_tables', [] );
 $m4is_qcotu = [];
 $m4is_tovizk = 'SHOW TABLES';
 $m4is_sor7t2 = $wpdb->get_col( $m4is_tovizk );
 foreach( $m4is_myuzdv as $m4is_dj_2 ) { if ( ! in_array( $m4is_dj_2, $m4is_sor7t2 ) ) { $m4is_qcotu[] = $m4is_dj_2;
 } } return $m4is_qcotu;
 } 
function m4is_cr6q45() {       } 
function m4is_ag9e($m4is_vfzl0) {   $m4is__7h5s = false;
 $m4is__7h5s = $m4is__7h5s || strpos($m4is_vfzl0, 'memberium') !== false;
 $m4is_afnh = [ 'edit.php', 'post-new.php', 'post.php', 'user-edit.php', 'users.php' ];
 $m4is_afnh = apply_filters('memberium/enhanced_admin_scripts', $m4is_afnh);
  $m4is__7h5s = $m4is__7h5s || in_array($m4is_vfzl0, $m4is_afnh);
 if ($m4is__7h5s) { $m4is_juks10 = plugin_dir_url(MEMBERIUM_HOME);
 $m4is_r4tza = $this->m4is_bnd6ti->m4is_u04m();
 wp_register_style('wpal_s2css', $m4is_juks10 . 'css/wpal-select2.min.css', false, '4.0.3', 'all');
 wp_register_script('wpal_s2js', $m4is_juks10 . 'js/wpal-select2.full.min.js', ['jquery'], '4.0.3', true);
 wp_enqueue_style('wpal_s2css');
 wp_enqueue_script('wpal_s2js');
 wp_register_style('memberium_admin_css', $m4is_juks10 . 'css/admin.css', false, $m4is_r4tza, 'all');
 wp_enqueue_style('memberium_admin_css');
 wp_register_script('memberium_adminsettings', $m4is_juks10 . 'js/admin-settings.js', false, $m4is_r4tza);
 wp_enqueue_script('memberium_adminsettings');
 wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.12.0/css/all.css', false, '5.12.0');
 } } 
function m4is_i0pz1() {  if (is_network_admin() || isset($_GET['activate-multi']) ) { return;
 } if (is_admin() ) { $m4is_s2ge5 = 'memberium/activation_timestamp';
 $m4is_h0dmj = (time() - get_option($m4is_s2ge5, time()) );
 if ($m4is_h0dmj < 5) { update_option($m4is_s2ge5, time() );
  wp_safe_redirect(add_query_arg(['page' => 'memberium'], admin_url('admin.php') ) );
 exit;
 } } } 
function m4is_m9bun() { $m4is_t6r3xw = $_GET;
 if (isset($m4is_t6r3xw['tab']) && $m4is_t6r3xw['tab'] == 'checklist' || ! current_user_can('manage_options') ) { return;
 } if (! get_user_meta(get_current_user_id(), 'memberium_ignore_notice_checklist', true) ) { $m4is_gvida = $this->m4is_oipd3(true);
 if (! empty($m4is_gvida['active']) ) { $m4is_rlp0 = m4is_wr40w::m4is_fhpvr7('checklist');
 $m4is_nz3t = "updated";
 $m4is_wbgl5s = '<h3 style="margin-bottom:6px;">Memberium Setup CheckList</h3>' . '<p>Your next setup checklist step is to ' . $m4is_gvida['active'][0]['t'] . '</p><p><a href="admin.php?page=dashboard&tab=checklist"><strong>Click here</strong></a> to return to the setup checklist.</p>' . '<div style="text-align:right;"><p><a href="'. $m4is_rlp0 .'">Hide these Reminders</a></p></div>';
 echo"<div class='{$m4is_nz3t}'>{$m4is_wbgl5s}</div>";
 } } } 
function m4is_phuz0t() { $m4is_t6r3xw = $_GET;
 $m4is_ig9p6 = get_current_user_id();
 $m4is_s2ge5 = isset($m4is_t6r3xw['memberium_ignore_notice']) ? sanitize_text_field($m4is_t6r3xw['memberium_ignore_notice']) : '';
 if (! empty($m4is_s2ge5) ) { update_option("memberium/notice/{$m4is_s2ge5}", 1);
 if (wp_get_referer() ) { wp_safe_redirect(wp_get_referer() );
 } else { wp_safe_redirect(site_url() );
 } } } 
function m4is_i8cb1() { $m4is_rlp0 = m4is_wr40w::m4is_vgnp(1226);
 if (false && ! m4is_u68pu::m4is_i9k3m() ) { echo '<div class="error"><p><strong style="font-size:150%;color:red;">Memberium License Missing / Expired', $m4is_rlp0, '</strong></p>';
 echo '<p>For possible causes, <a target="_blank" href="https://memberium.com/?p=1226">click here</a>.</p>';
 echo '<p>If you have not yet purchased a license, please <a target="_blank" href="https://memberium.com/pricing/">purchase a license by clicking here</a></p>';
 echo '<p>If you already have a license please <a target="_blank" href="https://memberium.com/support/">contact support by clicking here</a>.</p></div>';
 } } private 
function m4is_ak9uzq() { $m4is_hf04j = false;
 $m4is_ig9p6 = get_current_user_id();
 $m4is_f70z = array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'allow_wpadmin_dashboard' ) ) );
 if ( ! empty( $m4is_f70z ) ) { $m4is_hf04j = true;
 foreach ( $m4is_f70z as $m4is_ferk6j ) { if ( user_can( $m4is_ig9p6, $m4is_ferk6j ) ) { $m4is_hf04j = false;
 break;
 } } } else { if ( ! $m4is_hf04j ) { $m4is_rmw25k = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'allow_wpadmin', false );
 if ($m4is_awpz7) { $m4is_hf04j = false;
 } else { $m4is_hf04j = true;
 } } } return ! $m4is_hf04j;
 }  
function m4is_kz8o() { static $m4is_sbxo = false;
 $m4is_sbxo = $m4is_sbxo || defined( 'DOING_AJAX' ) && DOING_AJAX;
 $m4is_sbxo = $m4is_sbxo || function_exists( 'wp_doing_ajax' ) && wp_doing_ajax();
 $m4is_sbxo = $m4is_sbxo || isset($_SERVER['SCRIPT_NAME']) && ( basename($_SERVER['SCRIPT_NAME']) == 'admin-post.php' );
 $m4is_sbxo = $m4is_sbxo || $this->m4is_bnd6ti->m4is_lvmz1b();
 $m4is_sbxo = $m4is_sbxo || $this->m4is_ak9uzq();
 $m4is_sbxo = apply_filters( 'memberium/wpadmin/allow', $m4is_sbxo );
 if ( $m4is_sbxo ) { return;
 }    $m4is_b5kaz0 = wp_login_url($_SERVER['REQUEST_URI']);
  if (is_user_logged_in() ) { $m4is_mdqgk = isset( $_SESSION ) ? $_SESSION : $this->m4is_bnd6ti->m4is_akz3( get_current_user_id() );
 if ($m4is_mdqgk['memb_user']['login_page'] > 0) { $m4is_b5kaz0 = get_permalink($m4is_mdqgk['memb_user']['login_page']);
 } else { $m4is_b5kaz0 = get_site_url();
 } if ($m4is_mdqgk['memb_user']['login_page'] == -1) { if (function_exists('bbp_get_user_profile_url') ) { $m4is_b5kaz0 = bbp_get_user_profile_url($m4is_ig9p6);
 } else { $m4is_mdqgk['memb_user']['login_page'] = 0;
 } }  $m4is_z2i5jp = function_exists('get_current_screen') ? get_current_screen() : false;
 if ($m4is_z2i5jp && $m4is_z2i5jp->id == 'user-edit') { if (function_exists('bp_loggedin_user_domain') ) { $m4is_b5kaz0 = bp_loggedin_user_domain();
 } else { $pages = get_option('memberium_pages', [] );
 $m4is_b5kaz0 = isset($pages['profile_page']) ? get_permalink($pages['profile_page']) : $m4is_b5kaz0;
 } } } if (! $m4is_b5kaz0) { $m4is_b5kaz0 = get_site_url();
 } wp_redirect($m4is_b5kaz0, 302, 'Memberium Admin Dashboard Protection');
 exit;
 }    
function m4is_xnlsr( $m4is_zjx_, $m4is_ig9p6, $m4is_ml7s2b, $m4is_ea6ksm, $m4is_v7a2, $m4is_p51e_l ) { global $wpdb;
 if (is_plugin_active_for_network('memberium2/memberium2.php') ) { $m4is__4kes = $wpdb->blogid;
 switch_to_blog($m4is_zjx_);
 m4is_fbl5x8::m4is_zvihy( false );
 switch_to_blog($m4is__4kes);
 } }    
function admin_menu_alert( $count = 0, $text = '' ) { $count = (int) $count;
 if ( ! $count ) { return;
 } if ( empty( $text ) ) { $text = $count;
 } return "<span class='update-plugins count-{$count}' title='{$text}'><span class='update-count'>{$text}</span></span>";
 }  
function admin_menu_logcount() { global $wpdb;
 static $count;
 $log_counter_key = 'memberium/log_count';
 $count = (int) get_transient( $log_counter_key );
 if ( ! $count ) { $login_log_db = m4is_ypvg9::m4is_hjqcz2();
 $event_log_db = m4is__gu52::m4is_f_1z();
 $crm_id = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $count = $wpdb->get_var( "SELECT count(*) FROM `{$login_log_db}` WHERE `appname` = '{$crm_id}';" );
 $count = $count + $wpdb->get_var( "SELECT count(*) FROM `{$event_log_db}` WHERE `appname` = '{$crm_id}';" );
 set_transient( $log_counter_key, $count, 180 );
 } return (int) $count;
 } 
function m4is_f4y0() { static $m4is_yer1mp;
 if ($m4is_yer1mp) { return $m4is_yer1mp;
 } $i2sdk_options = $this->m4is_bnd6ti->get_i2sdk_options();
 $m4is_yer1mp = $i2sdk_options['server_verified'] ? 0 : 1;
 $m4is_yer1mp = $m4is_yer1mp + empty($i2sdk_options['app_name']) ? 1 : 0;
 $m4is_yer1mp = $m4is_yer1mp + empty($i2sdk_options['api_key']) ? 1 : 0;
 $m4is_yer1mp = $m4is_yer1mp + class_exists('i2sdk_class') ? 0 : 1;
 return $m4is_yer1mp;
 } 
function m4is_jcdzj() { $m4is_don1 = 'manage_options';
 if (! current_user_can($m4is_don1) ) { return;
 } $m4is_t162q = m4is_u68pu::m4is_i9k3m();
 $m4is__z1d = 'dashicons-groups';
  $m4is_up85 = $this->m4is_bnd6ti->get_i2sdk_options();
 $m4is_i6f5 = 'memberium';
 $m4is_qht8e = $m4is_don1;
 $m4is_nj80c = 2;
 $m4is_tiq5k6 = $this->m4is_f4y0();
   if (! empty($m4is_tiq5k6) ) { add_menu_page('', 'Memberium ' . $this->admin_menu_alert(1, 'Alert'), $m4is_don1, $m4is_i6f5, [$this, 'm4is_unqu9'], $m4is__z1d, $m4is_nj80c);
 add_submenu_page($m4is_i6f5, 'Memberium Support', 'Support', $m4is_qht8e, 'memberium-support', [$this, 'm4is_vlgr49']);
 if (class_exists('i2sdk_class') ) { add_submenu_page($m4is_i6f5, 'Keap Connection', 'Keap Connection ' . $this->admin_menu_alert(1, 'Unconfigured'), $m4is_don1, 'i2sdk-admin', 'i2sdk_admin_menu');
 } return;
 }  if (! $m4is_t162q) { add_menu_page('Memberium', 'Memberium', $m4is_don1, $m4is_i6f5, [$this, 'm4is_unqu9'], $m4is__z1d, $m4is_nj80c);
 add_submenu_page($m4is_i6f5, 'Memberium Support', 'Support', $m4is_qht8e, 'memberium-support', [$this, 'm4is_vlgr49']);
 add_submenu_page($m4is_i6f5, 'Keap Connection', 'Keap Connection', $m4is_don1, 'i2sdk-admin', 'i2sdk_admin_menu');
 add_submenu_page($m4is_i6f5, '', '', $m4is_don1, $m4is_i6f5, [$this, 'm4is_d0tqb']);
 return;
 }  if (! class_exists('i2sdk_class') || ! method_exists( $this->m4is_bnd6ti->m4is_se2n8(), 'isVerified') || ! $this->m4is_bnd6ti->m4is_se2n8()->isVerified() ) { add_menu_page('Memberium', 'Memberium', $m4is_don1, $m4is_i6f5, [$this, 'm4is_unqu9'], $m4is__z1d, $m4is_nj80c);
 add_submenu_page($m4is_i6f5, 'Memberium Support', 'Support', $m4is_qht8e, 'memberium-support', [$this, 'm4is_vlgr49']);
 if (class_exists('i2sdk_class') ) { add_submenu_page($m4is_i6f5, 'Keap Connection', 'Keap Connection', $m4is_don1, 'i2sdk-admin', 'i2sdk_admin_menu');
 } return;
 }  add_menu_page( '', 'Memberium', $m4is_qht8e, $m4is_i6f5, '', $m4is__z1d, $m4is_nj80c );
 add_submenu_page( $m4is_i6f5, 'Start Here', 'Start Here', $m4is_qht8e, $m4is_i6f5, [$this, 'm4is_d0tqb']);
 add_submenu_page( $m4is_i6f5, 'Memberium Support', 'Support', $m4is_qht8e, 'memberium-support', [$this, 'm4is_vlgr49']);
 add_submenu_page( $m4is_i6f5, 'Memberium Settings', 'Settings', $m4is_qht8e, 'memberium-options', [$this, 'm4is__hze9']);
 add_submenu_page( $m4is_i6f5, 'Memberium Memberships', 'Memberships', $m4is_qht8e, 'memberium-memberships', [$this, 'm4is_eyf6l']);
 add_submenu_page( $m4is_i6f5, 'Memberium Partials', 'Partials', $m4is_qht8e, 'edit.php?post_type=partials');
 add_submenu_page( $m4is_i6f5, 'Memberium Custom Shortcodes', 'Custom Shortcodes', $m4is_qht8e, 'edit.php?post_type=memb_shortcodeblocks');
 add_submenu_page( $m4is_i6f5, 'Memberium eCommerce Integration', 'eCommerce', $m4is_qht8e, 'memberium-ecommerce', [$this, 'm4is_l3h1nq']);
 add_submenu_page( $m4is_i6f5, 'Memberium Remote Files Configuration', 'Remote Files', $m4is_qht8e, 'memberium-remote-files', [$this, 'm4is_q6tk8o']);
 add_submenu_page( $m4is_i6f5, 'Sync Options', 'Sync Options', $m4is_qht8e, 'memberium-sync-options', [$this, 'm4is_gwjs']);
 do_action('memberium_admin_menu_addons', $m4is_i6f5);
 if (defined('WPSEO_FILE') || defined('GAWP_FILE') ) { add_submenu_page($m4is_i6f5, 'Memberium Google Analytics', 'Google Analytics', $m4is_don1, 'memberium-ga', [$this, 'm4is__au6y4']);
 } $m4is_tiq5k6 = $this->admin_menu_logcount();
 add_submenu_page($m4is_i6f5, 'Memberium Logs', 'Logs '. $this->admin_menu_alert($m4is_tiq5k6), $m4is_don1, 'memberium-logs', [$this, 'm4is_hq5zvr']);
 add_submenu_page($m4is_i6f5, 'Keap Connection', 'Keap Connection', $m4is_don1, 'i2sdk-admin', 'i2sdk_admin_menu');
  add_submenu_page( '', '', '', $m4is_qht8e, 'dashboard', [$this, 'm4is_d0tqb']);
 add_submenu_page( '', '', '', $m4is_qht8e, 'memberium-welcome-screen', [$this, 'm4is_d0tqb']);
 }     
function m4is_xtx3() { $m4is_wvr4fa = 'memberium::manualupdate::list';
 $m4is_i5zbvx = base64_decode( 'aHR0cHM6Ly9saWNlbnNlc2VydmVyLndlYnBvd2VyYW5kbGlnaHQuY29tL3VwZGF0ZXMvdXBkYXRlLWxpc3QucGhw' );
  $m4is_etj2 = get_transient( $m4is_wvr4fa );
 $result = [];
 if ( is_array( $m4is_etj2 ) ) { $result = $m4is_etj2;
 } else { $m4is_etj2 = wp_remote_get( $m4is_i5zbvx );
  if ( is_array( $m4is_etj2 ) ) { $m4is_etj2 = json_decode( $m4is_etj2['body'], true );
 set_transient( $m4is_wvr4fa, $m4is_etj2, 600 );
 } } return $m4is_etj2;
 } 
function m4is_is_k($m4is_ybzkf6 = 'memberium2') { if ( ! wp_is_writable( __DIR__ ) ) { echo 'Plugin Folder Not Writeable</p>';
 return;
 } $m4is_azd3yf = $this->m4is_xtx3();
 $m4is_a29_4 = $this->m4is_bnd6ti->m4is_u04m();
 $output = '<select name="manual_upgrade" style="width:250px !important;">';
 if ( is_array( $m4is_azd3yf ) ) { foreach ( $m4is_azd3yf as $m4is_j5sy07=>$m4is_wlqsgr ) { $output .= '<option value="' . $m4is_j5sy07 . '" ' .($m4is_a29_4 == $m4is_wlqsgr['version'] ? ' selected="selected" ' : '') . '>' . $m4is_wlqsgr['name'] . ' ' . $m4is_wlqsgr['comments'] . '</option>';
 } } $output .= '</select>&nbsp;<input name="manual_upgrade_confirm" value="1" type="checkbox">Confirm Update';
 return $output;
 } 
function m4is_ev_7( int $m4is_g31w0s, string $m4is_ybzkf6 ) { $m4is_azd3yf = $this->m4is_xtx3($m4is_ybzkf6);
 if (isset($m4is_azd3yf[$m4is_g31w0s]['url']) ) { $m4is_s37d = WP_PLUGIN_DIR;
 $m4is_l5_ov = ABSPATH . '.maintenance';
 $m4is_qchw = 'PD9waHAgJHVwZ3JhZGluZyA9IHRpbWUoKTs=';
  $m4is_edx7w = $m4is_azd3yf[$m4is_g31w0s]['url'];
  ignore_user_abort();
  $m4is_ldtv = $m4is_d71ub = download_url( $m4is_edx7w, 300 );
  if ( file_exists( $m4is_ldtv ) ) {   require_once ABSPATH .'/wp-admin/includes/file.php';
  WP_Filesystem();
 file_put_contents( $m4is_l5_ov, $m4is_qchw );
 if ( ! function_exists( 'disk_free_space' ) ) { add_filter( 'wp_doing_cron', '__return_false', 10, 1 );
 } unzip_file($m4is_ldtv, $m4is_s37d);
 remove_filter( 'wp_doing_cron', '__return_false', 10 );
 unlink(ABSPATH . '.maintenance');
 unlink($m4is_ldtv);
 } if ( function_exists( 'opcache_reset' ) ) { opcache_reset();
 } echo '<p>Upgrade Process Completed.</p>';
 echo '<p><a href="', admin_url(), 'admin.php?page=memberium">Continue</a></p>';
 exit;
 } else { m4is_wr40w::m4is_cxesuf('<p><strong>Memberium</strong>:  Unable to install update</p>', 'error');
 } }    
function m4is_vpxmo($user_id, $old_user_data) {   } 
function m4is_y5xl( $m4is_ig9p6 ) { $m4is_x0_hk = get_userdata($m4is_ig9p6);
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if ( $m4is_e2kg > 0 ) { m4is_bnrdbo::m4is_ojk0r( $m4is_e2kg );
 } }  
function m4is_erz_8($m4is_gqid = [] ) { global $wpdb;
 $m4is_r6nh_b = [ 'exclude' => 'topic,reply' . (defined('MEMBERIUM_IGNORE_POSTTYPE') ? (',' . MEMBERIUM_IGNORE_POSTTYPE) : ''), 'entries' => [], ];
 $m4is_gqid = wp_parse_args($m4is_gqid, $m4is_r6nh_b);
 $m4is_gqid['exclude'] = "'" . implode("','", explode(',', $m4is_gqid['exclude']) ) . "'";
 unset($m4is_r6nh_b);
 $m4is_tovizk = "SELECT `ID`, `post_title` FROM `{$wpdb->posts}` WHERE `post_status` = 'publish' AND `post_type` IN ('" . implode("','", m4is_wr40w::m4is_c21wl() ) . "') AND `post_type` NOT IN (" . $m4is_gqid['exclude'] . ") ORDER BY `id` ASC;";
 $m4is_afnh = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_mz13[] = [ 'id' => 0, 'text' => '(Default / Homepage)' ];
 foreach ($m4is_afnh as $m4is_j5sy07=>$m4is_couz) { $m4is_mz13[] = [ 'id' => $m4is_couz['ID'], 'text' => "{$m4is_couz['post_title']} ({$m4is_couz['ID']})", ];
 unset($m4is_afnh[$m4is_j5sy07]);
 } unset($m4is_couz, $m4is_tovizk);
 $m4is_mz13 = json_encode($m4is_mz13, JSON_INVALID_UTF8_SUBSTITUTE);
 return $m4is_mz13;
 }  
function m4is_vp83($m4is_k4yeul = [] ) { $m4is_x0_hk = get_user_by('id', get_current_user_id() );
 $m4is_z0rhum = $m4is_x0_hk->allcaps;
 $m4is_a3nxjy = [];
 foreach($m4is_z0rhum as $cap => $caps) { $m4is_a3nxjy[] = [ 'id' => $cap, 'text' => ucwords(strtr($cap, '_', ' ') ) ];
 } return json_encode($m4is_a3nxjy);
 } 
function m4is_qve_if($args = [] ) { }    
function m4is_ziep($m4is_g6xgv3) { $m4is_g6xgv3['allow_unsafe_link_target'] = true;
 return $m4is_g6xgv3;
 } 
function m4is_s_xr5() { $m4is_a_hn = $this->m4is_xdun();
 $m4is_g5opra = m4is_wr40w::m4is_c21wl();
 add_action( 'admin_footer', [$this, 'm4is_lf31a4']) ;
 if ( in_array( $m4is_a_hn, $this->non_enhanced_post_types ) ) { return;
 } add_meta_box( 'is4wp-member-access' , 'Memberium Protection', [$this, 'm4is_xfpjk'], $m4is_a_hn, 'side' );
 add_meta_box( 'is4wp-page-templates', 'Membership Templates', [$this, 'm4is_ystr'], $m4is_a_hn, 'normal' );
 add_meta_box( 'is4wp-course-grid', 'Membership Course Grid', [$this, 'm4is_yydtxa'], $m4is_a_hn, 'side' );
 add_action( 'save_post', [$this, 'm4is_a6x79c'] );
 add_action( 'save_post', [$this, 'm4is_w8mbe'] );
 add_action( 'save_post', [$this, 'm4is_ms5g'] );
 if ( ! in_array( $m4is_a_hn, $m4is_g5opra ) ) { return;
 } if ( in_array( $m4is_a_hn, ['partials', 'memb_shortcodeblocks', 'elementor_library'] ) ) { return;
 } if ( ! current_user_can( 'manage_options' ) ) { return;
 } add_meta_box( 'is4wp-custom-code', 'Memberium Custom Page Code', [$this, 'm4is_vvlyr1'], $m4is_a_hn, 'normal' );
 add_action( 'save_post', [$this, 'm4is_vtoy4x'] );
 } 
function m4is_lf31a4() { echo '<!-- metabox footer -->';
  $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_apvd = [];
 $m4is_apvd[] = [ 'id' => 0, 'text' => '(None)' ];
 foreach ( (array) $m4is_iystd2 as $m4is_wirps => $m4is_mpia) { $m4is_apvd[] = [ 'id' => $m4is_wirps, 'text' => "{$m4is_mpia} ({$m4is_wirps})" ];
 } $m4is_akret1 = [];
 $m4is_akret1[] = [ 'id' => 0, 'text' => '(None)' ];
 foreach ( (array) $m4is_iystd2 as $m4is_wirps => $m4is_mpia) { $m4is_akret1[] = [ 'id' => $m4is_wirps, 'text' => "{$m4is_mpia} ({$m4is_wirps})" ];
 $m4is_akret1[] = [ 'id' => - $m4is_wirps, 'text' => "Not {$m4is_mpia} (-{$m4is_wirps})" ];
 } $m4is_apvd = json_encode( $m4is_apvd );
 $m4is_akret1 = json_encode( $m4is_akret1 );
 unset( $m4is_iystd2, $m4is_wirps, $m4is_mpia );
 echo '<script>';
 echo '	var taglist = ', $m4is_apvd, ';';
 echo '	var taglist2 = ', $m4is_akret1, ';';
 echo '	var memb_coursegrid_i18n = '. json_encode([ 'locked' => [ 'title' => __('Select Locked Course Thumbnail', 'memberium'), 'button' => __('Set Locked Course Thumbnail', 'memberium'), 'remove' => __('Remove Locked Course Thumbnail', 'memberium'), ], 'unlocked' => [ 'title' => __('Select Unlocked Course Thumbnail', 'memberium'), 'button' => __('Set Unlocked Course Thumbnail', 'memberium'), 'remove' => __('Remove Unlocked Course Thumbnail', 'memberium'), ] ]) .';';
 echo '</script>';
 unset($actionsets, $m4is_iystd2);
 $m4is_oz2y = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'version' );
 wp_register_script('memberium_postmeta', plugin_dir_url( MEMBERIUM_HOME ) . 'js/postmetabox.js', [], $m4is_oz2y, true);
 wp_enqueue_script('memberium_postmeta');
 } 
function m4is_ystr() { $m4is__2o5j = $this->m4is_a19w0();
 echo '<div class="memb_template_options">';
 echo '<label for="_is4wp_page_template">' . _e("Install Page Template", 'memberium') . '</label> ';
 echo '<select class="actionset-selector" name="_is4wp_page_template" style="width:100%; max-width:100%">';
 echo '<option value="">(No Template)</option>';
 if (is_array($m4is__2o5j) ) { foreach ($m4is__2o5j as $m4is_qhma => $m4is_ks1fj2) { echo '<option value="', $m4is_qhma + 1, '">', $m4is_ks1fj2['name'], '</option>';
 } } echo '</select>';
 echo '</div>';
 } 
function m4is_w8mbe() { $m4is_c2ah = $_POST;
 if (! empty($m4is_c2ah['_is4wp_page_template']) ) { $this->m4is_qyu_c($m4is_c2ah['post_ID'], ($m4is_c2ah['_is4wp_page_template'] - 1) );
 } return;
 } 
function m4is_yydtxa(){ global $post;
 $m4is_p51e_l = get_post_meta( $post->ID, '_memberium/coursegrid/config', true );
 $m4is_m7ilfy = [ 'unlocked' => __('Unlocked', 'memberium'), 'locked' => __('Locked', 'memberium') ];
 echo '<div class="memb_coursegrid_options">';
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), "memberium_coursegrid_nonce_{$post->ID}");
 $m4is_adhlf = '_memb_coursegrid';
 foreach ($m4is_m7ilfy as $m4is_c5zg => $m4is_unc_q) { $m4is_o4bt = empty( $m4is_p51e_l[$m4is_c5zg] ) ? '' : $m4is_p51e_l[$m4is_c5zg];
 $m4is_woh1fq = empty( $m4is_o4bt['url'] ) ? '' : esc_url( $m4is_o4bt['url'] );
 $m4is_bd_512 = empty( $m4is_o4bt['id'] ) ? 0 : (int) $m4is_o4bt['id'];
 echo "<div class=\"memb_coursegrid_thumbnail\" data-key=\"{$m4is_c5zg}\">";
 if( ! empty( $m4is_woh1fq ) ){ $m4is_xtmh2 = sprintf( __( 'Remove %s Course Thumbnail', 'memberium' ), $m4is_unc_q );
 echo "<a class=\"memb_coursegrid_thumbnail_remove\" href=\"#\" title=\"{$m4is_xtmh2}\">";
 echo "<span class=\"dashicons dashicons-dismiss\"></span>";
 echo "</a>";
 } echo "<br><label for=\"{$m4is_c5zg}_url\">" . sprintf( __( '%s Thumbnail', 'memberium' ), $m4is_unc_q) . "</label> ";
 echo "<div class=\"memb_coursegrid_preview\">";
 echo ! empty($m4is_woh1fq) ? "<img src=\"{$m4is_woh1fq}\"/>" : '';
 echo "</div>";
 echo "<div class=\"memb_coursegrid_input_button_wrap wp-clearfix\">";
 echo "<input type=\"url\" class=\"large-text memb_coursegrid_thumbnail_url\" name=\"{$m4is_adhlf}[{$m4is_c5zg}][url]\" id=\"{$m4is_c5zg}_url\" value=\"{$m4is_woh1fq}\">";
 echo "<button type=\"button\" class=\"button memb_coursegrid_thumbnail_upload\" id=\"{$m4is_o4bt}_upload\">";
 echo "<span class=\"dashicons dashicons-format-image\"></span>";
 echo "<span class=\"screen-reader-text\">";
 echo sprintf( __( 'Set %s Thumbnail', 'memberium' ), $m4is_unc_q );
 echo "</span>";
 echo "</button>";
 echo "</div>";
 echo "<input type=\"hidden\" class=\"memb_coursegrid_thumbnail_id\" name=\"{$m4is_adhlf}[{$m4is_c5zg}][id]\" id=\"{$m4is_c5zg}_id\" value=\"{$m4is_bd_512}\">";
 echo "</div>";
 } $m4is_yrz91b = empty( $m4is_p51e_l['locked_url'] ) ? '' : esc_url( $m4is_p51e_l['locked_url'] );
  $m4is_ryw0 = empty( $m4is_p51e_l['excerpt'] ) ? '' : $m4is_p51e_l['excerpt'];
  $m4is_wdjmn = empty( $m4is_p51e_l['order'] ) ? 0 : $m4is_p51e_l['order'];
  echo "<br><label for=\"memb_coursegrid_locked_url\">" . __( 'Locked Course URL', 'memberium' ) . "</label> ";
 echo "<input name=\"{$m4is_adhlf}[locked_url]\" type=\"text\" id=\"memb_coursegrid_locked_url\" value=\"{$m4is_yrz91b}\" class=\"widefat\">";
 echo "<br><br><label for=\"memb_coursegrid_excerpt\">" . __( 'Course Excerpt', 'memberium' ) . "</label> ";
 echo "<textarea id=\"memb_coursegrid_excerpt\" rows=\"4\" name=\"{$m4is_adhlf}[excerpt]\" class=\"widefat\">{$m4is_ryw0}</textarea>";
 echo "<br><br><label for=\"memb_coursegrid_order\">" . __( 'Course Order', 'memberium' ) . "</label> ";
 echo "<input name=\"{$m4is_adhlf}[order]\" type=\"number\" max=\"9999\" id=\"memb_coursegrid_order\" value=\"{$m4is_wdjmn}\">";
 echo '</div>';
 } 
function m4is_ms5g( $m4is_cd8k ){  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return;
 } $m4is_egt6k = $_POST;
  if (empty($m4is_egt6k["memberium_coursegrid_nonce_{$m4is_cd8k}"]) || ! wp_verify_nonce($m4is_egt6k["memberium_coursegrid_nonce_{$m4is_cd8k}"], $this->m4is_bnd6ti->m4is_wdqrsb() ) ) { return;
 }  if (! empty($m4is_egt6k['post_type']) && 'page' == $m4is_egt6k['post_type']) { if (! current_user_can('edit_pages', $m4is_cd8k) ) { return;
 } } else { if (! current_user_can('edit_posts', $m4is_cd8k) ) { return;
 } }  $m4is_etj2 = [];
 if (! empty($m4is_egt6k['_memb_coursegrid']) ) { $m4is_feovs = $m4is_egt6k['_memb_coursegrid'];
  foreach (['unlocked', 'locked'] as $m4is_c5zg) { $m4is_o4bt = !empty($m4is_feovs[$m4is_c5zg]) ? $m4is_feovs[$m4is_c5zg] : [];
 $m4is_woh1fq = !empty($m4is_o4bt['url']) ? esc_url($m4is_o4bt['url']) : '';
 $m4is_bd_512 = !empty($m4is_o4bt['id']) ? (int)$m4is_o4bt['id'] : 0;
 if( !empty($m4is_woh1fq) || !empty($m4is_bd_512) ){ $m4is_etj2[$m4is_c5zg] = [ 'url' => $m4is_woh1fq, 'id' => $m4is_bd_512 ];
 } }  if( !empty($m4is_feovs['locked_url']) ){ $m4is_yrz91b = esc_url($m4is_feovs['locked_url']);
 if( !empty($m4is_yrz91b) ){ $m4is_etj2['locked_url'] = $m4is_yrz91b;
 } }  if( !empty($m4is_feovs['excerpt']) ){ $m4is_ryw0 = sanitize_text_field( htmlentities(trim($m4is_feovs['excerpt'])) );
 if( !empty($m4is_feovs['excerpt']) ){ $m4is_etj2['excerpt'] = $m4is_ryw0;
 } }  $m4is_wdjmn = !empty($m4is_feovs['order']) ? (int)$m4is_feovs['order'] : 0;
 if( !empty($m4is_etj2) || $m4is_wdjmn > 0 ){ $m4is_etj2['order'] = $m4is_wdjmn;
 } } $m4is_yx0i = '_memberium/coursegrid/config';
 $m4is_kqkbu = get_post_meta($m4is_cd8k, $m4is_yx0i, true);
 if( empty($m4is_etj2) ){ if( $m4is_kqkbu ){ delete_post_meta($m4is_cd8k, $m4is_yx0i);
 } } else{ $m4is_kqkbu = !$m4is_kqkbu ? [] : $m4is_kqkbu;
 if( ! empty(array_diff($m4is_etj2, $m4is_kqkbu)) ){ update_post_meta($m4is_cd8k, $m4is_yx0i, $m4is_etj2);
 } } } 
function m4is_vvlyr1() { global $post;
 $m4is_p51e_l = get_post_meta($post->ID, '_iswp_custom_code', true);
 $defaults = [ 'head' => '', 'css' => '', 'js' => '', ];
 $m4is_p51e_l = wp_parse_args($m4is_p51e_l, $defaults);
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_customcode_nonce');
 echo '<p>HTML Head Code</p>';
 echo '<textarea id="is4wp_html_head" name="is4wp_html_head" placeholder="Head HTML Code" rows="3" cols="30" style="width:100%;">', $m4is_p51e_l['head'], '</textarea>';
 echo '<p>CSS Code</p>';
 echo '<textarea id="is4wp_css" name="is4wp_css" placeholder="Enter your custom CSS code here.  <style> tags are automatically included." rows="3" cols="30" style="width:100%;">', $m4is_p51e_l['css'], '</textarea>';
 echo '<p>JavaScript Code</p>';
 echo '<textarea id="is4wp_js" name="is4wp_js" rows=3 cols=30 placeholder="JavaScript Code.  <script> tags are automatically included." style="width:100%;">', $m4is_p51e_l['js'], '</textarea>';
 $m4is_sje5 = method_exists('wp_screen','is_block_editor') ? get_current_screen()->is_block_editor() : false;
  if (! $m4is_sje5) { echo '<style>
				.CodeMirror { height: auto !important; border: 1px solid #ddd; }
				.CodeMirror-scroll { min-height: 100px !important; max-height:300px !important; }
				</style>';
  if (get_bloginfo('version') >= '4.9') { $m4is_msncb = [ 'is4wp_css' => 'text/css', 'is4wp_html_head' => 'text/html',  'is4wp_js' => 'application/javascript', ];
 foreach($m4is_msncb as $m4is_j5sy07 => $m4is_n3zt) { $m4is_w2w8 = wp_enqueue_code_editor(['type' => $m4is_n3zt]);
 wp_add_inline_script('code-editor', sprintf('jQuery(function() { wp.codeEditor.initialize("' . $m4is_j5sy07 . '", %s); });', wp_json_encode($m4is_w2w8) ) );
 } } } } 
function m4is_vtoy4x($m4is_cd8k) { $m4is_c2ah = $_POST;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return;
 }  if (empty($m4is_c2ah['memberium_customcode_nonce']) || ! wp_verify_nonce($m4is_c2ah['memberium_customcode_nonce'], $this->m4is_bnd6ti->m4is_wdqrsb()) ) { return;
 }  if (! empty($m4is_c2ah['post_type']) && 'page' == $m4is_c2ah['post_type']) { if (! current_user_can('edit_pages', $m4is_cd8k) ) { return;
 } } else { if (! current_user_can('edit_posts', $m4is_cd8k) ) { return;
 } } $m4is_p51e_l = [ 'head' => isset($m4is_c2ah['is4wp_html_head']) ? trim($m4is_c2ah['is4wp_html_head']) : '', 'css' => isset($m4is_c2ah['is4wp_css']) ? trim($m4is_c2ah['is4wp_css']) : '', 'js' => isset($m4is_c2ah['is4wp_js']) ? trim($m4is_c2ah['is4wp_js']) : '', ];
 m4is_rv9lt::m4is_y34p($m4is_cd8k, 'custom_code', $m4is_p51e_l);
 } 
function m4is_a274() { wp_enqueue_script('memberium-admin-edit', plugins_url('js/quickedit.js', MEMBERIUM_HOME), ['jquery', 'inline-edit-post'], '', TRUE);
 }       
function m4is_vg_i95( $m4is_yonf3 ) { $m4is_a_hn = isset( $_GET['post_type'] ) ? $_GET['post_type'] : 'post';
 $m4is_w_js = m4is_wr40w::m4is_c21wl();
 $m4is_jw_97 = [];
 $m4is_jklcdy = [];
 if ( false ) { $m4is_jw_97['memberships'] = __( 'Membership Levels');
 $m4is_jw_97['tag_ids'] = __( "Tag ID's" );
 $m4is_jw_97['contact_ids'] = __( "Contact ID's" );
 $m4is_jw_97['prohibited_action'] = __( 'Prohibited Action' );
 $m4is_jw_97['anonymous_only'] = __( 'Logged Out Only' );
 $m4is_jw_97['facebook_crawler'] = __( 'Facebook crawler' );
 $m4is_jw_97['google_1stclick'] = __( 'Google First Click Free' );
 } if ( $m4is_a_hn == 'memb_shortcodeblocks' ) { $m4is_jw_97['memb_custom_shortcode'] = __( 'Shortcode' );
 $m4is_jklcdy[] = 'categories';
 $m4is_jklcdy[] = 'date';
 } else { if ($m4is_a_hn == 'partials') { $m4is_jw_97['memb_partial_shortcode'] = __('Shortcode');
 unset($m4is_yonf3['categories'], $m4is_yonf3['date']);
 } $m4is_jw_97['memberships'] = __('Membership Levels');
 $m4is_jw_97['tag_ids'] = __('Tag ID\'s');
 $m4is_jw_97['prohibited_action'] = __('Prohibited Action');
 if (! empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'show_post_columns') ) ) { $m4is_jw_97['contact_ids'] = __('Contact ID\'s');
 $m4is_jw_97['anonymous_only'] = __('Logged Out Only');
 $m4is_jw_97['facebook_crawler'] = __('Facebook crawler');
 $m4is_jw_97['google_1stclick'] = __('Google First Click Free');
 } } foreach ( $m4is_jklcdy as $m4is_jlb_6j ) { unset( $m4is_yonf3[ $m4is_jlb_6j ] );
 }  $m4is_yonf3 = array_merge( $m4is_yonf3, $m4is_jw_97 );
 return $m4is_yonf3;
 } 
function m4is_r485_q( $m4is_ef9wx, $m4is_cd8k ) { switch ($m4is_ef9wx) { case 'memb_custom_shortcode': echo '<div style="white-space:nowrap;">', '[membc_', get_post($m4is_cd8k)->post_name, ']', '</div>';
 break;
 case 'memb_partial_shortcode': echo '<div style="white-space:nowrap;">', '[memb_include_partial id=', $m4is_cd8k, ']', '</div>';
 break;
 case 'anonymous_only': $m4is_w_o7al = get_post_meta($m4is_cd8k, '_is4wp_anonymous_only', TRUE);
 if ($m4is_w_o7al) { $m4is_knyw0 = '<strong style="color:green;">Yes</strong>';
 $m4is_rs_zx = 1;
 } else { $m4is_knyw0 = '<strong style="color:red;">No</strong>';
 $m4is_rs_zx = 0;
 } echo '<div>', $m4is_knyw0, '</div>';
  echo '<input type="hidden" id="memb-anonymousonly-', $m4is_cd8k, '" value="', $m4is_rs_zx, '">';
 break;
 case 'contact_ids': $m4is_w_o7al = get_post_meta($m4is_cd8k, '_is4wp_contact_ids', true);
 echo '<div id="memb-contactids-' . $m4is_cd8k . '">' . $m4is_w_o7al . '</div>';
 break;
 case 'facebook_crawler': $m4is_w_o7al = get_post_meta($m4is_cd8k, '_is4wp_facebook_crawler', true);
 if ($m4is_w_o7al) { $m4is_knyw0 = '<strong style="color:green;">Yes</strong>';
 $m4is_rs_zx = 1;
 } else { $m4is_knyw0 = '<strong style="color:red;">No</strong>';
 $m4is_rs_zx = 0;
 } echo '<div>', $m4is_knyw0, '</div>';
  echo '<input type="hidden" id="memb-facebookcrawler-', $m4is_cd8k, '" value="', $m4is_rs_zx, '">';
 break;
 case 'google_1stclick': $m4is_w_o7al = get_post_meta($m4is_cd8k, '_is4wp_google_1stclick', true);
 if ($m4is_w_o7al) { $m4is_knyw0 = '<strong style="color:green;">Yes</strong>';
 $m4is_rs_zx = 1;
 } else { $m4is_knyw0 = '<strong style="color:red;">No</strong>';
 $m4is_rs_zx = 0;
 } echo '<div>', $m4is_knyw0, '</div>';
  echo '<input type="hidden" id="memb-google1stclick-', $m4is_cd8k, '" value="', $m4is_rs_zx, '">';
 break;
 case 'memberships': $m4is_qh8p6 = array_filter(explode(',', get_post_meta($m4is_cd8k, '_is4wp_membership_levels', true) ) );
 $m4is__i94 = count($m4is_qh8p6);
 $m4is_kd32 = [];
 $m4is_glto1 = 0;
 $m4is_p8et0i = get_post_meta($m4is_cd8k, '_is4wp_any_loggedin_user', true);
 $m4is_bkpa7w = get_post_meta($m4is_cd8k, '_is4wp_any_membership', true);
 $m4is_paed = $this->m4is_bnd6ti->m4is_oiewvu('memberships');
 if ($m4is__i94 > 0) { foreach($m4is_qh8p6 as $m4is_s2ge5 => $m4is_o5xas) { $m4is_kd32[] = $m4is_o5xas;
 echo isset($m4is_paed[$m4is_o5xas]['name']) ? $m4is_paed[$m4is_o5xas]['name'] : '';
 if (++$m4is_glto1 < $m4is__i94) { echo ', ';
 } } echo '<input type="hidden" id="memb-memberships-', $m4is_cd8k, '" value="', implode(',', $m4is_kd32), '" >';
 } if ($m4is_p8et0i) { echo '<span style="white-space:nowrap;">(Any Logged In User)</span> ';
 } if ($m4is_bkpa7w) { echo '<span style="white-space:nowrap;">(Any Membership)</span> ';
 } break;
 case 'prohibited_action': $m4is_ojtf = get_post_meta( $m4is_cd8k, '_is4wp_prohibited_action', true );
 $m4is_b5kaz0 = trim( get_post_meta( $m4is_cd8k, '_is4wp_redirect_url', true ) );
   echo '<input type="hidden" id="memb-prohibitedaction-', $m4is_cd8k, '" value="', $m4is_ojtf, '">';
 echo '<input type="hidden" id="memb-redirecturl-', $m4is_cd8k, '" value="', $m4is_b5kaz0, '">';
 echo ucwords($m4is_ojtf), '<br />';
 echo $m4is_b5kaz0, '<br />';
 break;
 case 'tag_ids': $m4is_w_o7al = trim( get_post_meta( $m4is_cd8k, '_is4wp_access_tags', true ), ',' );
 $m4is_w_o7al = implode( ', ', array_filter( explode( ',', $m4is_w_o7al ) ) );
 echo '<div id="memb-accesstagids-', $m4is_cd8k, '">', $m4is_w_o7al, '</div>';
 break;
 } } 
function m4is_tnsptr( int $m4is_cd8k, WP_Post $m4is_c2ah, bool $m4is_wlqsgr ) { $m4is_tyisr = [ 'memb_shortcodeblocks', ];
 if ( isset( $m4is_c2ah->post_type ) && ! in_array( $m4is_c2ah->post_type, $m4is_tyisr ) ) { return;
 };
 if ( ! current_user_can( 'edit_post', $m4is_cd8k ) ) { return;
 } m4is_w0enbm::m4is_e5l8a9()->m4is_o8ah( true );
  }    
function m4is_yt21() { if (!current_user_can('manage_options') ) { wp_die(__('You do not have sufficient permissions to access this page.') );
 } } 
function m4is__au6y4() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('googleanalytics.php');
 } 
function m4is_fu8o() {   } 
function m4is_xpeli( $m4is_fanr5 ) { if ( ! is_array( $m4is_fanr5 ) || empty( $m4is_fanr5 ) ) { return false;
 } global $wpdb;
 $m4is_tovizk = "SELECT `post_id`, `meta_value` FROM `{$wpdb->postmeta}` WHERE `meta_key` = '_is4wp_membership_levels' AND `meta_value` > '' ";
 $m4is_t0lr4 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 foreach ( $m4is_t0lr4 as $m4is_c2ah ) { $m4is_wpyerj = array_filter( explode( ',', $m4is_c2ah['meta_value'] ) );
 $m4is_ot65o = implode( ',', array_diff( $m4is_wpyerj, $m4is_fanr5) );
 m4is_rv9lt::m4is_y34p($m4is_c2ah['post_id'], 'memberships', $m4is_ot65o);
 } $this->m4is_bnd6ti->m4is_u7g91i();
 return true;
 } 
function m4is_q6tk8o() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('remotefiles.php');
 }  
function m4is_a19w0() { $m4is_wvr4fa = 'memberium::page_templates';
 $m4is_tsdi = 'https://licenseserver.webpowerandlight.com/updates/page-templates.php';
  $m4is_etj2 = get_transient($m4is_wvr4fa, false);
 $m4is_oa_z = [];
 if (is_array($m4is_etj2) ) { $m4is_oa_z = $m4is_etj2;
 } else { $m4is_gqid = [ 'timeout' => 10, ];
 $m4is_etj2 = wp_remote_get($m4is_tsdi, $m4is_gqid);
 if (is_a($m4is_etj2, 'WP_Error') ) { $m4is_jadl06 = $m4is_etj2->get_error_message();
 if (! empty($m4is_jadl06) ) { echo '<div class="notice notice-error"><h3>', print_r($m4is_jadl06, true), '</h3></div>';
 return;
 } } if (is_array($m4is_etj2) ) { $m4is_oa_z = json_decode($m4is_etj2['body'], true);
 if (is_array($m4is_oa_z) ) { set_transient($m4is_wvr4fa, $m4is_oa_z, 3600);
 } } else { $m4is_oa_z = [];
 } } return $m4is_oa_z;
 } 
function m4is_m0u3() { $m4is_gujxqw = 'https://licenseserver.webpowerandlight.com/updates/email-templates.php';
 $m4is_gqid = [ 'timeout' => 10, ];
 $m4is__2o5j = wp_remote_get($m4is_gujxqw, $m4is_gqid);
 if (is_a($m4is__2o5j, 'WP_Error') ) { $m4is_jadl06 = $m4is__2o5j->get_error_message();
 if (! empty($m4is_jadl06) ) { echo '<div class="notice notice-error"><h3>', print_r($m4is_jadl06, true), '</h3></div>';
 return;
 } } $m4is__2o5j = json_decode($m4is__2o5j['body'], true);
 if (is_array($m4is__2o5j) ) { $m4is__u5v = [ 'Id', 'PieceTitle' ];
 $m4is_jo8fb = [ 'PieceTitle' => 'MEMBERIUM TEMPLATE - %' ];
 $m4is_ag0tir = m4is_ho3l::m4is_mg4uyc( 'Template', 1000, 0, $m4is_jo8fb, $m4is__u5v );
 $m4is_k3sg = 0;
 array_walk ($m4is_ag0tir, function(&$m4is_w_o7al) { $m4is_w_o7al['PieceTitle'] = strtolower(trim($m4is_w_o7al['PieceTitle']) );
 });
 foreach($m4is__2o5j as $m4is_ks1fj2) { if (is_array($m4is_ag0tir) ) { $m4is_uwdfj = false;
 foreach($m4is_ag0tir as $m4is_qhma) { if (strtolower($m4is_qhma['PieceTitle']) == strtolower($m4is_ks1fj2['pieceTitle']) ) { $m4is_uwdfj = true;
 } } if (! $m4is_uwdfj) {  $id = $this->m4is_bnd6ti->m4is_zw_n()->addEmailTemplate( $m4is_ks1fj2['pieceTitle'], $m4is_ks1fj2['categories'], $m4is_ks1fj2['fromAddress'], $m4is_ks1fj2['toAddress'], $m4is_ks1fj2['ccAddress'], $m4is_ks1fj2['bccAddress'], $m4is_ks1fj2['subject'], $m4is_ks1fj2['textBody'], $m4is_ks1fj2['htmlBody'], $m4is_ks1fj2['contentType'], $m4is_ks1fj2['mergeContext'] );
 $m4is_k3sg++;
 } } } } return $m4is_k3sg;
 } 
function m4is_qyu_c( $m4is_cd8k, $m4is_qhma) { if ($m4is_cd8k === '') { return;
 } $m4is__2o5j = $this->m4is_a19w0();
 if (! isset($m4is__2o5j[$m4is_qhma]) ) { return;
 } $m4is_ks1fj2 = $m4is__2o5j[$m4is_qhma];
 unset($m4is__2o5j);
 if ($m4is_cd8k > 0) { $m4is_fx7z = get_post($m4is_cd8k, 'ARRAY_A');
 } else { $m4is_fx7z = [];
 } if (! empty($m4is_ks1fj2['content_url']) ) { $m4is_d71ub = wp_remote_get($m4is_ks1fj2['content_url']);
 $m4is_z1im = [];
 if (is_array($m4is_d71ub) ) { $m4is_z1im = json_decode($m4is_d71ub['body'], true);
 $m4is_ks1fj2['post']['post_content'] = $m4is_z1im['post']['post_content'];
 $m4is_ks1fj2['post']['post_excerpt'] = $m4is_z1im['post']['post_excerpt'];
 } } $m4is_c2ah = [];
 $m4is_c2ah['ID'] = $m4is_cd8k;
 $m4is_c2ah['post_title'] = empty($m4is_fx7z['post_title']) ? $m4is_ks1fj2['post']['post_title'] : $m4is_fx7z['post_title'];
 $m4is_c2ah['post_content'] = $m4is_ks1fj2['post']['post_content'];
 $m4is_c2ah['post_type'] = empty($m4is_fx7z['post_type']) ? $m4is_ks1fj2['post']['post_type'] : $m4is_fx7z['post_type'];
 $m4is_c2ah['post_status'] = empty($m4is_fx7z['post_status']) ? 'draft' : $m4is_fx7z['post_status'];
 $m4is_c2ah['meta_input'] = $m4is_ks1fj2['meta'];
 $_POST['post_content'] = $m4is_c2ah['post_content'];
 $_POST['post_excerpt'] = $m4is_c2ah['post_excerpt'];
 remove_action('save_post', [$this, 'm4is_w8mbe']);
 $foo = wp_insert_post($m4is_c2ah, false);
 foreach($m4is_ks1fj2['meta'] as $m4is_s2ge5 => $m4is_w_o7al) { update_post_meta($m4is_cd8k, $m4is_s2ge5, $m4is_w_o7al);
 } add_action('save_post', [$this, 'm4is_w8mbe']);
 }  
function m4is_oipd3($m4is_l7yz_2 = false) { $m4is_wvr4fa = 'memberium::setup::checklist';
 if (defined('MEMBERIUM_BETA') && MEMBERIUM_BETA) { delete_transient($m4is_wvr4fa);
 } $m4is_p7qk = get_transient($m4is_wvr4fa, [] );
 if (! $m4is_p7qk) { $m4is_etj2 = wp_remote_get('https://licenseserver.webpowerandlight.com/welcome/checklist.php');
 if (! is_object($m4is_etj2) && ! empty($m4is_etj2['body']) ) { $m4is_p7qk = json_decode($m4is_etj2['body'], true);
 set_transient($m4is_wvr4fa, $m4is_p7qk, 3600);
 } } if (is_array($m4is_p7qk) ) { usort($m4is_p7qk, function($a, $b) { return $a['o'] - $b['o'];
 });
 }  $m4is_y3dq = (array) get_option('memberium_setup_completed');
  $m4is_oa3lc2 = get_option( $this->m4is_bnd6ti->license_key_name);
 $m4is_aonj = m4is_u68pu::m4is_x3m4($m4is_oa3lc2);
 if ($m4is_aonj['valid']) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('get_license', $m4is_y3dq);
 } unset($m4is_aonj);
  $m4is_up85 = $this->m4is_bnd6ti->get_i2sdk_options();
 if ($m4is_up85['server_verified']) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('configure_i2sdk', $m4is_y3dq);
 } unset($m4is_up85);
 if ( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_page_redirect') > '' ) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('set_default_redirect', $m4is_y3dq);
 } if ( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'show_advanced_options') > '') { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('view_advanced', $m4is_y3dq);
 } if (count( $this->m4is_bnd6ti->m4is_oiewvu('memberships') ) ) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('create_membership', $m4is_y3dq);
 } if (! empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'global_excerpt') ) ) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('set_default_excerpt', $m4is_y3dq);
 } global $wpdb;
  $m4is_tovizk = "SELECT count(*) FROM `{$wpdb->postmeta}` WHERE `meta_key` LIKE '_is4wp_%' AND `meta_value` > '0';";
 $m4is_yer1mp = $wpdb->get_col();
  if ($m4is_yer1mp > 0) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('protect_pages', $m4is_y3dq);
 } unset($m4is_tovizk, $m4is_yer1mp);
  $m4is_yer1mp = (int) m4is_u68pu::m4is_q8ry();
 if ($m4is_yer1mp > 0) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('1user', $m4is_y3dq);
 } if ($m4is_yer1mp > 9) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('10users', $m4is_y3dq);
 } if ($m4is_yer1mp > 24) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('25users', $m4is_y3dq);
 } if ($m4is_yer1mp > 99) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('100users', $m4is_y3dq);
 } if ($m4is_yer1mp > 499) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('500users', $m4is_y3dq);
 } if ($m4is_yer1mp > 999) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('1kusers', $m4is_y3dq);
 } if ($m4is_yer1mp > 2499) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('2500users', $m4is_y3dq);
 } if ($m4is_yer1mp > 9999) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('10kusers', $m4is_y3dq);
 } if ($m4is_yer1mp > 24999) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('25kusers', $m4is_y3dq);
 } if ($m4is_yer1mp > 49999) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('50kusers', $m4is_y3dq);
 } if ($m4is_yer1mp > 99999) { $m4is_y3dq = $this->m4is_bnd6ti->m4is_q285('100kusers', $m4is_y3dq);
 } unset($m4is_tovizk, $m4is_yer1mp);
 update_option('memberium_setup_completed', array_filter(array_unique($m4is_y3dq) ) );
 update_option('memberium_checklist', $m4is_p7qk);
  if ($m4is_l7yz_2) { foreach ($m4is_p7qk as $m4is_s2ge5 => $m4is_f852) { if (! isset($m4is_f852['n']) || $m4is_f852['n'] < 1) { unset($m4is_p7qk[$m4is_s2ge5]);
 } } }  $m4is_yonf3 = [];
 $m4is_yonf3['active'] = [];
 $m4is_yonf3['completed'] = [];
 if (is_array($m4is_p7qk) ) { foreach ($m4is_p7qk as $m4is_f852) { $m4is_sx9c5w = false;
 $m4is_l1nb6h = false;
  if (in_array($m4is_f852['k'], $m4is_y3dq) ) { $m4is_sx9c5w = true;
 }  $m4is_nfxo3m = isset($m4is_f852['p']) ? explode(',', $m4is_f852['p']) : [];
 if (empty($m4is_nfxo3m) ) { $m4is_l1nb6h = true;
 } else { $m4is_l1nb6h = (count(array_intersect($m4is_y3dq, $m4is_nfxo3m) ) > 0);
 }   $m4is_nfxo3m = isset($m4is_f852['r']) ? explode(',', $m4is_f852['r']) : [];
 if (empty($m4is_nfxo3m) ) { $m4is_nv3u28 = false;
 } else { $m4is_nv3u28 = (count(array_intersect($m4is_y3dq, $m4is_nfxo3m) ) > 0);
 } if (! $m4is_sx9c5w) { if ($m4is_l1nb6h) { $m4is_yonf3['active'][] = $m4is_f852;
 } } else { if (! $m4is_nv3u28) { $m4is_yonf3['completed'][] = $m4is_f852;
 } } } } return $m4is_yonf3;
 } 
function m4is_fy16_b() {  $m4is_amovfr = $this->m4is_oipd3();
 $m4is_y3dq = (array) get_option('memberium_setup_completed');
 $m4is_yonf3 = [];
 $m4is_yonf3['active'] = [];
 $m4is_yonf3['completed'] = [];
 foreach ($m4is_amovfr as $m4is_jws36) { $m4is_sx9c5w = false;
 $m4is_l1nb6h = false;
  if (in_array($m4is_jws36['k'], $m4is_y3dq) ) { $m4is_sx9c5w = true;
 }  $m4is_nfxo3m = isset($m4is_jws36['p']) ? explode(',', $m4is_jws36['p']) : [];
 if (empty($m4is_nfxo3m) ) { $m4is_l1nb6h = true;
 } else { $m4is_l1nb6h = (count(array_intersect($m4is_y3dq, $m4is_nfxo3m) ) > 0);
 }   $m4is_nfxo3m = isset($m4is_jws36['r']) ? explode(',', $m4is_jws36['r']) : [];
 if (empty($m4is_nfxo3m) ) { $m4is_nv3u28 = false;
 } else { $m4is_nv3u28 = (count(array_intersect($m4is_y3dq, $m4is_nfxo3m) ) > 0);
 } if (! $m4is_sx9c5w) { if ($m4is_l1nb6h) { if ($m4is_jws36['m'] == 'm') { $m4is_knyw0 = '<input type="hidden" value="0" name="' . $m4is_jws36['k'] . '">' . '<input name="' . $m4is_jws36['k'] . '" id="' . $m4is_jws36['k'] . '" value="1" type="checkbox"> ' . $m4is_jws36['t'];
 if ($m4is_jws36['l'] > 0) { $m4is_knyw0 .= ' - ' . m4is_wr40w::m4is_vgnp($m4is_jws36['l']);
 } $m4is_yonf3['active'][] = $m4is_knyw0;
 } elseif ($m4is_jws36['m'] == 'a') { $m4is_yonf3['active'][] = '<input type="checkbox"> ' . $m4is_jws36['t'];
 } } } else { if (! $m4is_nv3u28) { $m4is_yonf3['completed'][] = '<input type="checkbox" disabled="disabled" checked="checked"> ' . $m4is_jws36['t'];
 } } } return $m4is_yonf3;
 } 
function m4is_nx13() { $m4is_gvida = $this->m4is_oipd3();
 echo '<form method="post" style="margin-left:25px;">';
 echo '<p>Complete the checklist below to launch your site, most settings are optional since you can just use the defaults we provide but click the steps below and follow the directions on each page.</p><p>It\'s easier than you think, and you\'ll be done in no time!</p>';
 echo '<div style="float:left; width:400px;">';
 echo '<h3>Upcoming Tasks and Goals</h3>';
 if (! empty($m4is_gvida['active']) ) { foreach ($m4is_gvida['active'] as $m4is_cla2) { if ($m4is_cla2['m'] == 'm') { echo '<p style="text-indent:-25px;margin-left:25px;"><input type="hidden" value="0" name="', $m4is_cla2['k'], '">';
 echo '<input name="', $m4is_cla2['k'], '" id="', $m4is_cla2['k'], '" value="1" type="checkbox"> ', $m4is_cla2['t'];
 if ($m4is_cla2['l'] > 0) { echo ' ', m4is_wr40w::m4is_vgnp($m4is_cla2['l']);
 } '</p>';
 } elseif ($m4is_cla2['m'] == 'a') { echo '<p style="text-indent:-25px;margin-left:25px;"><input type="checkbox" class="automatic"> <em>' . $m4is_cla2['t'], ' <strong>*</strong></em></p>';
 } } } else { echo '<p>All goals have been achieved!</p>';
 } echo '</div>';
 echo '<div style="float:left; width:400px; margin-left:80px;">';
 echo '<h3>Completed Tasks and Goals</h3>';
 if (! empty($m4is_gvida['completed']) ) { $m4is_gvida['completed'] = array_reverse($m4is_gvida['completed']);
 foreach ($m4is_gvida['completed'] as $m4is_cla2) { echo '<p style="text-indent:-25px;margin-left:25px;"><strike>', $m4is_cla2['t'], '</strike></p>';
 } } else { echo '<p>You have no completed tasks.</p>';
 } echo '</div>';
 echo '<div style="clear:both;"></div>';
 echo '<input type="submit" value="Mark Complete" class="button-primary"> &nbsp;&nbsp; ';
 echo '<p>View <a href="https://memberium.com/documentation/" target="_blank">More Documentation Online</a></p>';
 echo '</form>';
 echo '<p><em><strong>*</strong> Automatically detected tasks and goals</em> cannot be manually checked.</p>';
 echo '<script>';
 echo 'jQuery("input:checkbox.automatic").click(function() { return false; });';
 echo '</script>';
 } 
function m4is_wbx0_($m4is_pkr8a) { $m4is_iju6ns = [];
 $m4is__nuc = 'memberium::environment_signatures';
 $m4is_iju6ns = get_transient( $m4is__nuc );
 $m4is_iju6ns = false;
 if ( ! is_array( $m4is_iju6ns ) ) { $m4is_imdo6 = 'https://licenseserver.webpowerandlight.com/memberium/environment-fingerprints.php';
 $m4is_peum = wp_remote_get( $m4is_imdo6 );
 if ( is_array( $m4is_peum ) && ! empty( $m4is_peum['body'] ) ) { $m4is_iju6ns = json_decode( $m4is_peum['body'], true );
  foreach( $m4is_iju6ns as $m4is_s2ge5 => $m4is_k1k7oj) { if ( ! empty( $m4is_k1k7oj['platforms'] ) ) { if ( false === stripos( $m4is_k1k7oj['platforms'], $m4is_pkr8a ) ) { unset( $m4is_iju6ns[$m4is_s2ge5] );
 } } } set_transient( $m4is__nuc, $m4is_iju6ns, ( 12 * HOUR_IN_SECONDS ) );
 } } return $m4is_iju6ns;
 } 
function m4is_emq3_5() { $m4is_u_nwe = [];
 $m4is_pkr8a = 'm4is';
 if ( defined('GD_VIP') && GD_VIP ) { define('GD_MANAGED_HOSTING', 1);
 }   $m4is_iju6ns = $this->m4is_wbx0_($m4is_pkr8a);
 $m4is_ey2tl = get_option('active_plugins');
 $m4is_anxtk = wp_get_theme();
 $m4is_anxtk = $m4is_anxtk->parent() ? $m4is_anxtk->parent() : $m4is_anxtk;
 foreach ($m4is_iju6ns as $m4is_k1k7oj) { $m4is_uwdfj = false;
 if ($m4is_k1k7oj['type'] == 'extension') { $m4is_uwdfj = extension_loaded($m4is_k1k7oj['fingerprint']);
 } elseif ($m4is_k1k7oj['type'] == 'function') { $m4is_uwdfj = function_exists($m4is_k1k7oj['fingerprint']);
 } elseif ($m4is_k1k7oj['type'] == 'class') { $m4is_uwdfj = class_exists($m4is_k1k7oj['fingerprint']);
 } elseif ($m4is_k1k7oj['type'] == 'environment') { $m4is_uwdfj = isset($_SERVER[$m4is_k1k7oj['fingerprint']]);
 } elseif ($m4is_k1k7oj['type'] == 'theme') { $m4is_uwdfj = $m4is_anxtk->get_stylesheet() == $m4is_k1k7oj['fingerprint'];
 } elseif ($m4is_k1k7oj['type'] == 'plugin') { $m4is_uwdfj = in_array($m4is_k1k7oj['fingerprint'], $m4is_ey2tl);
 } elseif ($m4is_k1k7oj['type'] == 'constant') { $m4is_uwdfj = defined($m4is_k1k7oj['fingerprint']);
 } if ($m4is_uwdfj) { if ($m4is_k1k7oj['class'] == 'good') { $m4is_u_nwe['detected'][] = $m4is_k1k7oj;
 } else { $m4is_u_nwe['problem'][] = $m4is_k1k7oj;
 } } else { if ($m4is_k1k7oj['class'] == 'good') { $m4is_u_nwe['available'][] = $m4is_k1k7oj;
 } } } return $m4is_u_nwe;
 }    
function m4is_unqu9() { $m4is_tiq5k6 = $this->m4is_f4y0();
 echo '<div class="wrap about-wrap">';
  echo '<h3 style="font-size:225%">', __('Invalid License'), '</h3>';
 echo '<p class="about-text" style="margin-bottom:-30px;padding-bottom:0px;">';
 echo 'We are unable to license this site for one of the following reasons:';
 echo '</p>';
 echo '<ul style="margin-left:20px;">';
 if (! empty($m4is_tiq5k6) ) { echo '<li>Your i2SDK setup is incomplete or missing.  <a href="admin.php?page=i2sdk-admin">Click here to configure it</a>.</li>';
 } else { echo '<li>The domain you installed this on does not match the domain that the license was purchased for.</li>';
 echo '<li>You purchased an unlimited license but used a different Keap app or sandbox to connect to.</li>';
 echo '<li>Your webhost has outbound connections to our license server blocked.</li>';
 } echo '</ul>';
 echo '<p>';
 echo '&ndash; The Memberium Team<br />';
 echo '<a href="https://memberium.com/support/" target="_blank">https://memberium.com/support/</a>';
 echo '</p>';
 echo '</div>';
 } 
function m4is_d0tqb() { $this->m4is_bnd6ti->m4is_b0952z();
 $m4is_egt6k = $_POST;
 $m4is_jhj7 = $_SERVER;
 $m4is_jwjgx = new m4is_vmiwx();
   $m4is_jwjgx->m4is_nj5v9k( 'fa fa-tasks', 'Setup Checklist', 'checklist', [$this, 'm4is_nx13'] );
 $m4is_jwjgx->m4is_nj5v9k( 'fa fa-users', 'About Memberium', 'about', [$this, 'm4is_mo49'] );
 $m4is_jwjgx->m4is_ktem6( $this->m4is_bnd6ti->m4is_ev6n7e( 'header.php' ) );
 $m4is_k9vt = $m4is_jwjgx->m4is_wp4r();
 if ($m4is_jhj7['REQUEST_METHOD'] == 'POST') { if ($m4is_k9vt == 'checklist') { if (is_array($m4is_egt6k) ) { foreach ($m4is_egt6k as $m4is_s2ge5 => $m4is_w_o7al) { if ($m4is_w_o7al == '1') { $this->m4is_bnd6ti->m4is_q285($m4is_s2ge5);
 } } } } elseif ($m4is_k9vt == 'updates') { m4is_wr40w::m4is_cxesuf('Updates Options Updated');
  $m4is_w2w8 = [ 'autoupdate', ];
 foreach($m4is_w2w8 as $m4is_s2ge5) { if (isset($m4is_egt6k[$m4is_s2ge5]) ) { $m4is_w_o7al = (int) (bool) trim($m4is_egt6k[$m4is_s2ge5]);
 $this->m4is_bnd6ti->m4is_qdi_3o($m4is_w_o7al, 'settings', $m4is_s2ge5);
 } }  if (! empty($m4is_egt6k['manual_upgrade_confirm']) ) { $this->m4is_ev_7($m4is_egt6k['manual_upgrade'], 'memberium2');
 } } elseif ($m4is_k9vt == 'debug' && isset($m4is_egt6k['delete-debug']) && $m4is_egt6k['delete-debug'] > '') { unlink( MEMBERIUM_DEBUGLOG );
 } } $m4is_jwjgx->m4is__ufgp4();
 } 
function m4is_vlgr49() { $this->m4is_bnd6ti->m4is_b0952z();
 $m4is_cuis = $this->m4is_bnd6ti->m4is_ev6n7e();
 $m4is_jwjgx = new m4is_vmiwx();
 $m4is_egt6k = $_POST;
 $m4is_jhj7 = $_SERVER;
 $m4is_jwjgx->m4is_ktem6('<h1>Memberium Support</h1>');
 $m4is_jwjgx->m4is_nj5v9k('fa fa-life-ring', 'Support', 'support', [$this, 'm4is_nyha']);
 $m4is_jwjgx->m4is_nj5v9k('fa fa-tachometer-alt', 'Dashboard', 'dashboard', $this->m4is_bnd6ti->m4is_ev6n7e('starthere-dashboard-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-cogs', 'Integrations', 'integrations', $this->m4is_bnd6ti->m4is_ev6n7e('starthere-integrations-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-download', 'Updates', 'updates', $this->m4is_bnd6ti->m4is_ev6n7e('starthere-updates-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-bug', 'Debug', 'debug', [$this, 'm4is_h46v']);
 $m4is_k9vt = $m4is_jwjgx->m4is_wp4r();
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { if ($m4is_k9vt == 'dashboard') { if (isset($m4is_egt6k['save']) && $m4is_egt6k['save'] == 'Renew License') { m4is_u68pu::m4is_k6nh( true );
 m4is_wr40w::m4is_cxesuf('License Updated', 'update');
 } elseif (isset($m4is_egt6k['save']) && $m4is_egt6k['save'] == 'Re-Activate Plugin') { m4is_fbl5x8::m4is_zvihy( false );
 m4is_wr40w::m4is_cxesuf('System Activation Re-Run', 'update');
 } elseif (isset($m4is_egt6k['save']) && $m4is_egt6k['save'] == 'Synchronize Keap') { $this->m4is_tk7h4();
 } elseif (isset($_GET['purge-contacts']) ) { $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "TRUNCATE `{$m4is_tcw1l}` ";
 $m4is_zetvnf = $wpdb->query($m4is_tovizk);
 m4is_wr40w::m4is_cxesuf('Local Contact Database Purged', 'update');
 } } elseif ($m4is_k9vt == 'updates') { m4is_wr40w::m4is_cxesuf('Updates Options Updated');
 $m4is_w2w8 = ['autoupdate',];
  foreach($m4is_w2w8 as $m4is_s2ge5) { if (isset($m4is_egt6k[$m4is_s2ge5]) ) { $m4is_w_o7al = (int) (bool) trim($m4is_egt6k[$m4is_s2ge5]);
 $this->m4is_bnd6ti->m4is_qdi_3o($m4is_w_o7al, 'settings', $m4is_s2ge5);
 } }  if (! empty($m4is_egt6k['manual_upgrade_confirm']) ) { $this->m4is_ev_7($m4is_egt6k['manual_upgrade'], 'memberium2');
 } } elseif ($m4is_k9vt == 'debug' && isset($m4is_egt6k['delete-debug']) && $m4is_egt6k['delete-debug'] > '') { unlink(MEMBERIUM_DEBUGLOG);
 } } $m4is_jwjgx->m4is__ufgp4();
 } 
function m4is__hze9() { $this->m4is_bnd6ti->m4is_b0952z();
 $m4is_cuis = $this->m4is_bnd6ti->m4is_ev6n7e();
 $m4is_i0c3 = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'multi_language');
 $m4is_jwjgx = new m4is_vmiwx();
 $m4is_jwjgx->m4is_ktem6('<h3 style="font-size:200%;">Memberium Settings</h3>');
 $m4is_jwjgx->m4is_nj5v9k('fa fa-users', 'Logins', 'logins', $this->m4is_bnd6ti->m4is_ev6n7e('options-login-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-file', 'Content Protection', 'content', $this->m4is_bnd6ti->m4is_ev6n7e('options-content-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-unlock-alt', 'Page Handling', 'pagehandling', $this->m4is_bnd6ti->m4is_ev6n7e('options-pagehandling-show.php') );
 if (! empty($m4is_i0c3) ) { $m4is_jwjgx->m4is_nj5v9k('fa fa-language', 'Language', 'language', $this->m4is_bnd6ti->m4is_ev6n7e('options-language-show.php') );
 } $m4is_jwjgx->m4is_nj5v9k('fa fa-sitemap', 'Pages', 'pages', $this->m4is_bnd6ti->m4is_ev6n7e('options-pages-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-shield-alt', 'Security', 'security', $this->m4is_bnd6ti->m4is_ev6n7e('options-sitesecurity-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-rocket', 'Performance', 'performance', $this->m4is_bnd6ti->m4is_ev6n7e('options-performance-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-plug', 'Extensions', 'extensions', $this->m4is_bnd6ti->m4is_ev6n7e('options-extensions-show.php') );
 $m4is_jwjgx->m4is_nj5v9k('fa fa-exchange-alt', 'HTTP Posts/Links', 'httppost', $this->m4is_bnd6ti->m4is_ev6n7e('options-httppost-show.php') );
 $current_tab = $m4is_jwjgx->m4is_wp4r();
 include $this->m4is_bnd6ti->m4is_ev6n7e('options.php');
 $m4is_jwjgx->m4is__ufgp4();
 } 
function m4is_gwjs() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('sync.php');
 } 
function m4is_eyf6l() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('memberships.php');
 } 
function m4is_l3h1nq() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('ecommerce.php');
 } 
function m4is_hq5zvr() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('logs.php');
 }    
function m4is_mo49() { echo m4is_wr40w::m4is_atay('credits');
 } 
function m4is_nyha() { echo m4is_wr40w::m4is_atay('support');
 } 
function m4is_h46v() { require_once $this->m4is_bnd6ti->m4is_ev6n7e('support-debug.php');
 }    
function m4is_q4qr($m4is_yonf3) { $m4is_jw_97 = [];
 foreach($m4is_yonf3 as $m4is_s2ge5 => $m4is_azd3gq) { $m4is_jw_97[$m4is_s2ge5] = $m4is_azd3gq;
 if ($m4is_s2ge5 == 'username') { $m4is_jw_97['user_id_contact_id'] = 'User ID / Contact ID';
 } } return $m4is_jw_97;
 } 
function m4is_ia9zrg($m4is_w_o7al, $m4is_t0hs8, $m4is_ig9p6) { if ($m4is_t0hs8 === 'user_id_contact_id') { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 $m4is_w_o7al = $m4is_ig9p6 . ' / ' . ($m4is_e2kg ? $m4is_e2kg : '(None)');
 } return $m4is_w_o7al;
 } 
function m4is__g5o() { if ( $this->m4is_bnd6ti->m4is_lvmz1b() ) { $m4is_szi8 = current_filter() == 'user_new_form' ? 'checked = "checked" ' : '';
 ?>
			<table class="form-table">
				<tr class="form-field">
					<th scope="row"><label for="keap">Keap</label></th>
					<td>
						<label for="mail_chimp">
							<input type="hidden" name="memberium_add_contact" value="off">
							<input style="width: auto;" type="checkbox" name="memberium_add_contact" id="memberium_add_contact" <?php echo $m4is_szi8;
 ?> /> Create a matching contact for this user
						</label>
					</td>
				</tr>
			</table>
			<?php
 } } 
function m4is_y47ue(){  } 
function m4is_ob17($m4is_x0_hk) { include_once $this->m4is_bnd6ti->m4is_ev6n7e('user-edit.php');
 m4is_wy9a::m4is_gm1n($m4is_x0_hk);
  } 
function m4is_idoj( $m4is_ig9p6 ) { global $wpdb;
 $m4is_egt6k = $_POST;
 if (! current_user_can('manage_options') ) { return;
 } $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 $m4is_e2kg = (int) $this->m4is_bnd6ti->m4is_gz8a( $m4is_x0_hk->user_email );
 if ( ! $m4is_e2kg ) { $m4is_e2kg = (int) $this->m4is_bnd6ti->m4is_l1i7( $m4is_ig9p6 );
 } $m4is_p9r_8e = $this->m4is_bnd6ti->m4is_akz3( $m4is_ig9p6 );
 $m4is_ba81 = strtolower(trim($m4is_x0_hk->login) );
 $m4is_c14gi2 = isset($m4is_egt6k['new_emailaddress']) ? strtolower(trim($m4is_egt6k['new_emailaddress']) ) : $m4is_ba81;
 $m4is_q09lj = strtolower(trim($m4is_x0_hk->user_email) );
 $m4is_yq5ie1 = strtolower(trim($m4is_egt6k['email']) );
  $m4is_rz7l = isset($m4is_egt6k['memberium_private_comments']) ? (int) (bool) $m4is_egt6k['memberium_private_comments'] : 0;
  update_user_meta($m4is_ig9p6, 'memberium_private_comments', $m4is_rz7l);
  if ( ! empty( $m4is_egt6k['updated_tags'] ) ) { $this->m4is_bnd6ti->m4is_tcle75( $m4is_egt6k['updated_tags'], $m4is_e2kg );
 }   if ( ! empty( $m4is_yq5ie1 ) && ( $m4is_q09lj <> $m4is_yq5ie1 ) || ( $m4is_yq5ie1 <> $m4is_x0_hk->user_login ) ) { $m4is_ekoy = ! empty($m4is_egt6k['memb_update_email_confirm']);
 if ($m4is_e2kg) { $this->m4is_bnd6ti->m4is_az3tn8($m4is_ig9p6, $m4is_yq5ie1, $m4is_e2kg, $m4is_ekoy);
 } $m4is_egt6k['email'] = $m4is_yq5ie1;
 }    if ( empty( $this->m4is_bnd6ti->m4is_oiewvu('settings', 'local_auth_only', false ) ) ) { if ($m4is_egt6k['pass1'] > '' && $m4is_egt6k['pass1'] === $m4is_egt6k['pass2']) { $m4is_e2kg = (int) $this->m4is_bnd6ti->m4is_gz8a($m4is_egt6k['email']);
 if ($m4is_e2kg > 0) { $m4is__xn_jt = [ $this->m4is_bnd6ti->m4is_oiewvu('settings', 'password_field') => $m4is_egt6k['pass1'], ];
 m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt, true);
 } } }  if (! empty( $m4is_egt6k['memberium_sync'] ) ) { $this->m4is_bnd6ti->m4is_j30vf1( $m4is_x0_hk->user_email );
 $m4is_aatglm = (int) $this->m4is_bnd6ti->m4is_gz8a( $m4is_x0_hk->user_email );
 $this->m4is_bnd6ti->m4is_ge9lx( $m4is_ig9p6, $m4is_aatglm );
   $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "SELECT `id` FROM `{$m4is_tcw1l}` WHERE `appname` = %s AND `fieldname` = 'email' and `value` = %s AND `id` <> %d";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k, $m4is_egt6k['email'], $m4is_aatglm );
 $m4is_hpn9y = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 $m4is_w49bym = [];
 foreach ($m4is_hpn9y as $row) { $m4is_w49bym[] = $row['id'];
 } if ( ! empty($m4is_w49bym) ) { $m4is_w49bym = implode(',', $m4is_w49bym);
 $m4is_tovizk = "DELETE FROM `{$m4is_tcw1l}` WHERE `appname` = %s AND `id` IN ({$m4is_w49bym}) ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_zq0k);
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 } $m4is_e2kg = $m4is_aatglm;
  } $m4is_mdqgk = $this->m4is_bnd6ti->m4is_akz3( $m4is_ig9p6 );
 do_action('memberium/session/updated', $m4is_egt6k['user_id'], $m4is_mdqgk);
 }  
function m4is_xevs( $m4is_t5ot4 = '', $m4is_wov2 = [], $m4is_uz9ek = '', $m4is_k4yeul = [] ) {  if ( empty( $m4is_wov2 ) || empty( $m4is_t5ot4 ) ) { return;
 } $m4is_uz9ek = $m4is_uz9ek ?? '';
  if ( ! is_array( $m4is_uz9ek ) ) { $m4is_uz9ek = explode( ',', $m4is_uz9ek );
 }  $m4is_r6nh_b = [ 'autofocus' => false, 'case_sensitive' => false, 'class' => '', 'disabled' => false, 'echo' => true, 'form' => '', 'id' => $m4is_t5ot4, 'multiple' => false, 'required' => false, 'size' => 1, 'style' => '', ];
  $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
 $m4is_k4yeul['size'] = (int) $m4is_k4yeul['size'];
 $m4is_j_9byj = '';
 $m4is_i2wh = '';
 $m4is_h80owh = [ 'autofocus', 'disabled', 'multiple', 'required', ];
 $m4is_mbq6j = [ 'class', 'form', 'id', 'size', 'style', ];
  foreach ( $m4is_k4yeul as $m4is_s2ge5 => $m4is_w_o7al ) {  if ( in_array( $m4is_s2ge5, $m4is_h80owh ) ) { if ( $m4is_w_o7al ) { $m4is_i2wh .= " {$m4is_s2ge5}=\"{$m4is_s2ge5}\"";
 } }  } foreach ( $m4is_mbq6j as $m4is_ixr_fz ) { if ( ! empty( $m4is_k4yeul[$m4is_ixr_fz] ) ) { $m4is_w_o7al = $m4is_k4yeul[$m4is_ixr_fz];
  $m4is_i2wh .= " {$m4is_ixr_fz}=\"{$m4is_w_o7al}\" ";
 } }  foreach( $m4is_wov2 as $m4is_w_o7al => $m4is_unc_q ) { $m4is_xnwj4 = false;
  foreach($m4is_uz9ek as $m4is_koi38) {  if ($m4is_k4yeul['case_sensitive']) {  $m4is_xnwj4 = $m4is_xnwj4 || (bool) ($m4is_w_o7al == $m4is_koi38);
 } else {  $m4is_xnwj4 = $m4is_xnwj4 || (bool) (0 === strcasecmp($m4is_w_o7al, $m4is_koi38) );
 } }  $m4is_j_9byj .= '<option value="' . $m4is_w_o7al . '" ' . ($m4is_xnwj4 ? ' selected="selected" ' : '') . '>' . $m4is_unc_q . '</option>';
 }  $m4is_uzfw8j = <<<HTMLBLOCK
			<input type="hidden" name="{$m4is_t5ot4}" value="">
			<select name="{$m4is_t5ot4}" {$m4is_i2wh}>
			{$m4is_j_9byj}
			</select>
		HTMLBLOCK;
  if ( $m4is_k4yeul['disabled'] ) { $m4is_uz9ek = implode( ',', $m4is_uz9ek );
 $m4is_uzfw8j .= "<input type=\"hidden\" name=\"{$m4is_t5ot4}\" value=\"{$m4is_uz9ek}\">";
 } $m4is_uzfw8j = "\n\n{$m4is_uzfw8j}\n\n";
  if ( $m4is_k4yeul['echo'] ) { echo $m4is_uzfw8j;
 } else { return $m4is_uzfw8j;
 } }  
function m4is_lzj8g() : array {  global $wp_roles;
  $m4is_a3nxjy = [];
  foreach($wp_roles->roles as $role) {  foreach($role['capabilities'] as $k => $v) {  $m4is_a3nxjy[] = $k;
 } }  $m4is_a3nxjy = array_unique($m4is_a3nxjy);
  sort($m4is_a3nxjy);
  return $m4is_a3nxjy;
 }  
function m4is_xfpjk() { global $post;
 $m4is_ml7oq = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'site_lock_enabled' );
 $m4is_h3ld_w = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'page_inheritance' );
 $m4is_fqhf = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'default_prohibited_action' );
  $m4is_auhoe = get_post_meta( $post->ID );
  $m4is_w_8g = [ '_is4wp_commenter_action' => '_is4wp_commenter_action', '_is4wp_commenter_goal' => '_is4wp_commenter_goal', '_is4wp_commenter_tag' => '_is4wp_commenter_tag', '_is4wp_hide_from_menu' => '_is4wp_hide_from_menu', '_is4wp_private_comments' => '_is4wp_private_comments', 'access_tags' => '_is4wp_access_tags', 'access_tags2' => '_is4wp_access_tags2', 'anonymous_only' => '_is4wp_anonymous_only', 'any_membership' => '_is4wp_any_membership', 'contact_ids' => '_is4wp_contact_ids', 'facebook_crawler' => '_is4wp_facebook_crawler', 'google_1stclick' => '_is4wp_google_1stclick', 'hide_completely' => '_is4wp_hide_completely', 'is4wp_can_comment' => '_is4wp_can_comment', 'is4wp_discourage_cache' => '_is4wp_discourage_cache', 'is4wp_force_public' => '_is4wp_force_public', 'logged_in' => '_is4wp_any_loggedin_user', 'membership_levels' => '_is4wp_membership_levels', 'prohibited_action' => '_is4wp_prohibited_action', 'redirect_url' => '_is4wp_redirect_url', ];
 foreach ($m4is_w_8g as $m4is_y5ltx => $m4is_kgx87i) { if (isset($m4is_auhoe[$m4is_kgx87i][0]) ) { $m4is_p51e_l[$m4is_y5ltx] = $m4is_auhoe[$m4is_kgx87i][0];
 } else { $m4is_p51e_l[$m4is_y5ltx] = '';
 } } unset( $m4is_auhoe );
  if ($m4is_p51e_l['hide_completely'] == 1) { $m4is_p51e_l['prohibited_action'] = 'hide';
 } if ($m4is_p51e_l['prohibited_action'] == '') { if (! empty($m4is_fqhf) ) { $m4is_p51e_l['prohibited_action'] = $m4is_fqhf;
 } } wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), "memberium_membershipaccess_nonce_{$post->ID}" );
 if ( $post->post_parent > 0 && $m4is_h3ld_w ) { echo <<<HTMLBLOCK
				<p style="color:red;text-align:center;">
					<strong>Inherits Access from the
						<a href="post.php?post={$post->post_parent}&action=edit">Parent Page</a>
					</strong>
				</p>
			HTMLBLOCK;
 } $m4is_szi8 = $m4is_p51e_l['any_membership'] == 1 ? ' checked="checked" ' : '';
 $m4is_unc_q = __( 'Any Membership Level', $this->m4is_n3zlk );
 echo <<<HTMLBLOCK
			<div class="memb_access_options">
			<input type="checkbox" name="is4wp_anymembership" id="is4wp_anymembership" value="1" {$m4is_szi8}>
			<label for="is4wp_anymembership">{$m4is_unc_q}</label><br />
		HTMLBLOCK;
 $m4is_stgb6 = array_filter( explode( ',', $m4is_p51e_l['membership_levels'] ) );
 $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu( 'memberships' );
 if ( is_array($m4is_qh8p6) ) { foreach ($m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas) { echo '<input type="checkbox" class="memberium_membership_checkbox" name="is4wp_membership_levels[' . $m4is_j5sy07 . ']" value="' . $m4is_j5sy07 . '" id="is4wp_membership_' . $m4is_j5sy07 . '" ' . (in_array($m4is_j5sy07, $m4is_stgb6) ? ' checked="checked" ' : '') . '>&nbsp;<label class="memberium_membership_checkbox" for="is4wp_membership_' . $m4is_j5sy07 . '">' . stripslashes($m4is_o5xas['name']) . '&nbsp;(' . $m4is_o5xas['level'] . ')</label><br />';
 } } echo <<<HTMLBLOCK
			</div>
			<hr />
		HTMLBLOCK;
 if ( $m4is_ml7oq ) { $m4is_szi8 = $m4is_p51e_l['is4wp_force_public'] == 1 ? ' checked="checked" ' : '';
 $m4is_unc_q = __( 'Force Public', 'memberium' );
 echo <<<HTMLBLOCK
				<input type="checkbox" name="is4wp_force_public" id="is4wp_force_public" value="1"{$m4is_szi8}>
				<label for="is4wp_force_public">{$m4is_unc_q}</label><br />
			HTMLBLOCK;
 } $m4is_uawl = $m4is_p51e_l['logged_in'] == 1 ? ' checked="checked" ' : '';
 $m4is_kzmxpj = $m4is_p51e_l['anonymous_only'] == 1 ? ' checked="checked" ' : '';
 $m4is_z59dj = $m4is_p51e_l['contact_ids'] > '' ? $m4is_p51e_l['contact_ids'] : '';
 $m4is_svmlz = $m4is_p51e_l['access_tags'] > '' ? $m4is_p51e_l['access_tags'] : '';
 $m4is_loglh = $m4is_p51e_l['access_tags2'] > '' ? $m4is_p51e_l['access_tags2'] : '';
 $m4is_cdrfcl = $m4is_p51e_l['_is4wp_hide_from_menu'] == 1 ? ' checked="checked" ' : '';
 $m4is_f0q51n = $m4is_p51e_l['google_1stclick'] == 1 ? ' checked="checked" ' : '';
 $m4is_ys2o = $m4is_p51e_l['facebook_crawler'] == 1 ? ' checked="checked" ' : '';
 $m4is_tbpacm = __( 'Any Logged In User', $this->m4is_n3zlk );
 $m4is_f8q906 = __( 'Logged Out Only', $this->m4is_n3zlk );
 $m4is_xfov_ = __( "Require Contact ID's", $this->m4is_n3zlk );
 $m4is_lb9z = __( "Require Tag ID&#39;s", $this->m4is_n3zlk );
 $m4is_g94fsi = __( "AND Require Tag ID&#39;s", $this->m4is_n3zlk );
 $m4is_el38a = __( 'Hide from Menus', $this->m4is_n3zlk );
 $m4is_dx41zo = __( 'Google 1st Click Free', $this->m4is_n3zlk );
 $m4is_l5exp = __( 'Facebook Crawler Access', $this->m4is_n3zlk );
 $m4is_v7ca2f = __( 'When Prohibited', $this->m4is_n3zlk );
 echo <<<HTMLBLOCK
			<div class="memb_access_options">
			<input type="checkbox" name="is4wp_loggedin" id="is4wp_loggedin" value="1"{$m4is_uawl}> <label for="is4wp_loggedin">{$m4is_tbpacm}</label><br />
			<input type="checkbox" name="is4wp_anonymous_only" id="is4wp_anonymous_only" value="1"{$m4is_kzmxpj}> <label for="is4wp_anonymous_only">{$m4is_f8q906}</label><br />
			<label for="is4wp_contact_ids">{$m4is_xfov_}</label>
			<textarea name="is4wp_contact_ids" rows="1" style="width:100%; max-width:100%">{$m4is_z59dj}</textarea>
			<label for="is4wp_access_tags">{$m4is_lb9z}</label>
			<input type="text" name="is4wp_access_tags" value="{$m4is_svmlz}" class="multitaglist2" style="width:100%; max-width:100%">
			<label for="is4wp_access_tags2">{$m4is_g94fsi}</label>
			<input type="text" name="is4wp_access_tags2" value="{$m4is_loglh}" class="multitaglist2" style="width:100%; max-width:100%">
			</div>
			<hr />
			<input type="checkbox" name="is4wp_hide_from_menu" id="is4wp_hide_from_menu" value="1"{$m4is_cdrfcl}> <label for="is4wp_hide_from_menu">{$m4is_el38a}</label><br />
			<div class="memb_access_options">
			<input type="checkbox" name="is4wp_google_1stclick" id="is4wp_google_1stclick" value="1"{$m4is_f0q51n}> <label for="is4wp_google_1stclick">{$m4is_dx41zo}</label><br />
			<input type="checkbox" name="is4wp_facebook_crawler" id="is4wp_facebook_crawler" value="1"{$m4is_ys2o}> <label for="is4wp_facebook_crawler">{$m4is_l5exp}</label><br />
			</div>
			<hr />
			<div class="memb_access_options">
			{$m4is_v7ca2f}: <select id="is4wp_prohibited_action" name="is4wp_prohibited_action">
		HTMLBLOCK;
 $m4is_w47l3u = [];
 if ($m4is_fqhf > '') { $m4is_w47l3u['default'] = 'Site Default (' . ucwords($m4is_fqhf) . ')';
 } $m4is_w47l3u['hide'] = 'Hide Completely';
 if (post_type_supports($post->post_type, 'excerpt') ) { $m4is_w47l3u['excerpt'] = 'Show Excerpt Only';
 } $m4is_w47l3u['redirect'] = 'Redirect';
 foreach ($m4is_w47l3u as $m4is_w_o7al => $m4is_unc_q) { $m4is_xnwj4 = $m4is_p51e_l['prohibited_action'] == $m4is_w_o7al ? 'selected="selected"' : '';
 echo '<option value="' . $m4is_w_o7al . '" ' . $m4is_xnwj4 . '>' . $m4is_unc_q . '</option>';
 } echo '</select><br />';
 echo '</div>';
 $m4is_gb7l2k = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'default_page_redirect');
 $m4is_vnpt = ($m4is_gb7l2k > '' ? 'Default Redirect to ' . $m4is_gb7l2k : 'Leave blank for sitewide default');
 $m4is_unc_q = __('Redirect URL', 'memberium');
 $m4is_w_o7al = $m4is_p51e_l['redirect_url'];
 $m4is_vnpt = $m4is_vnpt;
 echo <<<HTMLBLOCK
			<div class="memb_redirect_options">
			<label for="is4wp_redirect_url">{$m4is_unc_q}</label>
			<input type="text" id="is4wp_redirect_url" name="is4wp_redirect_url" style="width:100%; max-width:100%" rows="1" value="{$m4is_w_o7al}" placeholder="{$m4is_vnpt}">
			</div>
		HTMLBLOCK;
 if ( post_type_supports( $post->post_type, 'comments' ) ) { $m4is_kzkrv1 = m4is_tvc2xn::m4is__r78so();
 $m4is_jn031 = '';
 if ( is_array( $m4is_kzkrv1 ) ) { foreach ( $m4is_kzkrv1 as $m4is_rrny => $m4is_inxo ) { $selected = ( $m4is_p51e_l['_is4wp_commenter_action'] == $m4is_rrny ) ? ' selected="selected" ' : '';
 $m4is_jn031 .= "<option value=\"{$m4is_rrny}\"{$selected}>{$m4is_inxo}</option>";
 } } $m4is_szi8 = $m4is_p51e_l['_is4wp_private_comments'] == 1 ? ' checked="checked" ' : '';
 $m4is_q2kv = $m4is_p51e_l['is4wp_can_comment'] > '' ? $m4is_p51e_l['is4wp_can_comment'] : '';
 $m4is_ucu_o = $m4is_p51e_l['_is4wp_commenter_tag'] > '' ? $m4is_p51e_l['_is4wp_commenter_tag'] : '';
 $m4is_su2rc = $m4is_p51e_l['_is4wp_commenter_goal'] > '' ? $m4is_p51e_l['_is4wp_commenter_goal'] : '';
 $m4is_tdvs3p = __( 'Private Commenting', $this->m4is_n3zlk );
 $m4is_hvdcmo = __( 'Enable Comments if Tag Present', $this->m4is_n3zlk );
 $m4is_bfpx = __( 'Apply Tags on Comment', $this->m4is_n3zlk );
 $m4is_f5cvnl = __( 'Achieve Goal on Comment', $this->m4is_n3zlk );
 $m4is_ezmbn = __( 'Run Actionset on Comment', $this->m4is_n3zlk );
 echo <<<HTMLBLOCK
				<p style="margin-top:20px;"><strong>Advanced Comment Functions</strong></p>

				<input type="hidden" name="_is4wp_private_comments" value="0">
				<input type="checkbox" name="_is4wp_private_comments" id="_is4wp_private_comments" value="1"{$m4is_szi8}>
				<label for="_is4wp_private_comments">{$m4is_tdvs3p}</label><br />

				<label for="is4wp_can_comment">{$m4is_hvdcmo}</label>
				<input type="text" name="is4wp_can_comment" value="{$m4is_q2kv}" class="multitaglist" style="width:100%; max-width:100%">

				<label for="_is4wp_commenter_tag">{$m4is_bfpx}</label>
				<input type="text" name="_is4wp_commenter_tag" value="{$m4is_ucu_o}" class="multitaglist" style="width:100%; max-width:100%">

				<label for="_is4wp_commenter_goal">{$m4is_f5cvnl}</label>
				<input type="text" name="_is4wp_commenter_goal" style="width:100%; max-width:100%" value="{$m4is_su2rc}">

				<label for="_is4wp_commenter_action">{$m4is_ezmbn}</label>
				<select class="actionset-selector" name="_is4wp_commenter_action" style="width:100%; max-width:100%">
				<option value="0">(No Actions)</option>
					{$m4is_jn031}
				</select>
			HTMLBLOCK;
 unset( $m4is_kzkrv1, $m4is_rrny, $m4is_inxo, $m4is_jn031 );
 } $m4is_szi8 = $m4is_p51e_l['is4wp_discourage_cache'] == 1 ? ' checked="checked" ' : '';
 $m4is_unc_q = __( 'Discourage Caching', $this->m4is_n3zlk );
 echo <<<HTMLBLOCK
			<p>
			<input type="hidden" name="is4wp_discourage_cache" value="0">
			<input type="checkbox" name="is4wp_discourage_cache" id="is4wp_discourage_cache" value="1"{$m4is_szi8}>
			<label for="is4wp_discourage_cache">{$m4is_unc_q}</label><br />
			</p>
		HTMLBLOCK;
 } 
function m4is_a6x79c( $m4is_cd8k ) {  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return;
 } $m4is_egt6k = $_POST;
  if (empty($m4is_egt6k["memberium_membershipaccess_nonce_{$m4is_cd8k}"]) || ! wp_verify_nonce($m4is_egt6k["memberium_membershipaccess_nonce_{$m4is_cd8k}"], $this->m4is_bnd6ti->m4is_wdqrsb() ) ) { return;
 }  if (! empty($m4is_egt6k['post_type']) && 'page' == $m4is_egt6k['post_type']) { if (! current_user_can('edit_pages', $m4is_cd8k) ) { return;
 } } else { if (! current_user_can('edit_posts', $m4is_cd8k) ) { return;
 } } $m4is_egt6k['is4wp_discourage_cache'] = isset($m4is_egt6k['is4wp_discourage_cache']) ? $m4is_egt6k['is4wp_discourage_cache'] : '';
 $m4is_egt6k['is4wp_access_tags'] = isset($m4is_egt6k['is4wp_access_tags']) ? $m4is_egt6k['is4wp_access_tags'] : '';
 $m4is_egt6k['is4wp_access_tags2'] = isset($m4is_egt6k['is4wp_access_tags2']) ? $m4is_egt6k['is4wp_access_tags2'] : '';
 $m4is_egt6k['is4wp_anonymous_only'] = isset($m4is_egt6k['is4wp_anonymous_only']) ? $m4is_egt6k['is4wp_anonymous_only'] : 0;
 $m4is_egt6k['is4wp_anymembership'] = isset($m4is_egt6k['is4wp_anymembership']) ? $m4is_egt6k['is4wp_anymembership'] : 0;
 $m4is_egt6k['is4wp_contact_ids'] = isset($m4is_egt6k['is4wp_contact_ids']) ? $m4is_egt6k['is4wp_contact_ids'] : '';
 $m4is_egt6k['is4wp_facebook_crawler'] = isset($m4is_egt6k['is4wp_facebook_crawler']) ? $m4is_egt6k['is4wp_facebook_crawler'] : 0;
 $m4is_egt6k['is4wp_force_public'] = isset($m4is_egt6k['is4wp_force_public']) ? $m4is_egt6k['is4wp_force_public'] : '';
 $m4is_egt6k['is4wp_google_1stclick'] = isset($m4is_egt6k['is4wp_google_1stclick']) ? $m4is_egt6k['is4wp_google_1stclick'] : 0;
 $m4is_egt6k['is4wp_hide_completely'] = isset($m4is_egt6k['is4wp_hide_completely']) ? $m4is_egt6k['is4wp_hide_completely'] : 0;
 $m4is_egt6k['is4wp_hide_from_menu'] = isset($m4is_egt6k['is4wp_hide_from_menu']) ? $m4is_egt6k['is4wp_hide_from_menu'] : '';
 $m4is_egt6k['is4wp_loggedin'] = isset($m4is_egt6k['is4wp_loggedin']) ? $m4is_egt6k['is4wp_loggedin'] : 0;
 $m4is_egt6k['is4wp_prohibited_action'] = isset($m4is_egt6k['is4wp_prohibited_action']) ? $m4is_egt6k['is4wp_prohibited_action'] : '';
 $m4is_egt6k['is4wp_redirect_url'] = isset($m4is_egt6k['is4wp_redirect_url']) ? trim($m4is_egt6k['is4wp_redirect_url']) : '';
 if ($m4is_egt6k['is4wp_anymembership'] == 0) { $m4is_egt6k['is4wp_membership_levels'] = isset($m4is_egt6k['is4wp_membership_levels']) ? $m4is_egt6k['is4wp_membership_levels'] : [];
 } else { $m4is_egt6k['is4wp_membership_levels'] = [];
 } if (isset($m4is_egt6k['_is4wp_private_comments']) ) { m4is_rv9lt::m4is_y34p($m4is_cd8k, 'private_comments', $m4is_egt6k['_is4wp_private_comments']);
 } if (isset($m4is_egt6k['is4wp_can_comment']) ) { m4is_rv9lt::m4is_y34p($m4is_cd8k, 'can_comment', $m4is_egt6k['is4wp_can_comment']);
 } if (isset($m4is_egt6k['_is4wp_commenter_tag']) ) { m4is_rv9lt::m4is_y34p($m4is_cd8k, 'commenter_tag', $m4is_egt6k['_is4wp_commenter_tag']);
 } if (isset($m4is_egt6k['_is4wp_commenter_action']) ) { m4is_rv9lt::m4is_y34p($m4is_cd8k, 'commenter_action', $m4is_egt6k['_is4wp_commenter_action']);
 } if (isset($m4is_egt6k['_is4wp_commenter_goal']) ) { m4is_rv9lt::m4is_y34p($m4is_cd8k, 'commenter_goal', $m4is_egt6k['_is4wp_commenter_goal']);
 } if ( (int)$m4is_egt6k['is4wp_anonymous_only'] == 1) { $m4is_egt6k['is4wp_membership_levels'] = '';
 } $m4is_stgb6 = implode(',', (array) $m4is_egt6k['is4wp_membership_levels']);
 $m4is_qht8e = [ 'access_tags' => $m4is_egt6k['is4wp_access_tags'], 'access_tags2' => $m4is_egt6k['is4wp_access_tags2'], 'anonymous_only' => (int) $m4is_egt6k['is4wp_anonymous_only'], 'any_loggedin_user' => (int) $m4is_egt6k['is4wp_loggedin'], 'any_membership' => $m4is_egt6k['is4wp_anymembership'], 'contact_ids' => $m4is_egt6k['is4wp_contact_ids'], 'discourage_cache' => (int) $m4is_egt6k['is4wp_discourage_cache'], 'facebook_crawler' => (int) $m4is_egt6k['is4wp_facebook_crawler'], 'force_public' => (int) $m4is_egt6k['is4wp_force_public'], 'google_1st_click' => (int) $m4is_egt6k['is4wp_google_1stclick'], 'hide_from_menu' => (int) $m4is_egt6k['is4wp_hide_from_menu'], 'memberships' => $m4is_stgb6, 'prohibited_action' => $m4is_egt6k['is4wp_prohibited_action'], 'redirect_url' => $m4is_egt6k['is4wp_redirect_url'], ];
 m4is_rv9lt::m4is_y34p($m4is_cd8k, $m4is_qht8e);
 $this->m4is_bnd6ti->m4is_u7g91i();
 delete_post_meta($m4is_cd8k, '_is4wp_hide_completely');
 return;
 }  
function m4is_eyjhr() { return;
 }  
function m4is_mgxa($m4is_yonf3 = []) { static $m4is_c_g6f = false;
  if ( ! is_array( $m4is_c_g6f ) ) {  $m4is_y40u7_ = [ 'cb', 'email', 'name', 'username', ];
  $m4is_y40u7_ = apply_filters( 'memberium/admin/user/columns', $m4is_y40u7_, $m4is_yonf3 );
  foreach( $m4is_yonf3 as $m4is_s2ge5 => $m4is_unc_q ) {  if ( ! in_array( $m4is_s2ge5, $m4is_y40u7_) ) { unset( $m4is_yonf3[$m4is_s2ge5] );
 } }  $m4is_c_g6f = $m4is_yonf3;
 }  return $m4is_c_g6f;
 }     
function m4is_dciy( $m4is_d71ub, $m4is_mp3x, $m4is_imdo6 ) {  if (session_status() !== PHP_SESSION_ACTIVE && ! headers_sent() ) {  session_start();
 }  return $m4is_d71ub;
 }  
function m4is_n3g5z( $m4is_iolc, $m4is_k4yeul, $m4is_imdo6 ) {  if (session_status() === PHP_SESSION_ACTIVE) {  session_write_close();
 }  return $m4is_iolc;
 }  
function m4is_g689($m4is_ocuzs) {  if (session_status() == PHP_SESSION_ACTIVE) {  session_write_close();
 }  return $m4is_ocuzs;
 }  private 
function m4is_obaw9() {   }  private 
function m4is_gbavpe() {  add_action('admin_notices', ['m4is_xm5qfa', 'm4is_s31r']);
 } }

