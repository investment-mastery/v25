<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_mzo6_8::m4is_xexw();
 
class m4is_mzo6_8 { private $m4is_bnd6ti;
 private $m4is_zq0k;
 private $m4is_zjo03f;
 private $m4is_jeyz9;
 private $m4is_dcjt_3;
 public static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ju94();
 $this->m4is_bnd6ti->m4is_q285('view_dashboard' );
 $this->m4is_ww61so();
 $this->m4is_w4yd_f();
 $this->m4is_bg7_e();
 $this->m4is_vs0_();
 $this->m4is_amx0l();
 $this->m4is_xai0mu();
 $this->m4is_nc_r7();
 $this->m4is_tvcqtg();
 $this->m4is_qu2h0y();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $this->m4is_zjo03f = false;
 $this->m4is_jeyz9 = false;
 $this->m4is_dcjt_3 = [];
 } private 
function m4is_ww61so() { add_filter( 'human_time_diff', [$this, 'm4is_girv'], 10, 4 );
  } 
function m4is_girv( $m4is_yjf_, $m4is_eiqm8, $m4is_st5p4v, $m4is_ljt4ua ) { return ( $m4is_st5p4v < 1325376000 || $m4is_eiqm8 > (20 * YEAR_IN_SECONDS ) ) ? 'Never' : $m4is_yjf_;
 }  private 
function m4is_w4yd_f() { $m4is_qcotu = m4is_q1zh2::get_instance()->m4is_t23_6();
 if ( count( $m4is_qcotu ) ) { m4is_fbl5x8::m4is_zvihy( false );
 } } private 
function m4is_bg7_e() { if ( class_exists( 'm4is_rg1kh' ) ) { $m4is_nhun = (int) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'session_timeout' );
 $m4is_nhun = empty( $m4is_nhun ) ? ini_get('session.gc_maxlifetime') : $m4is_nhun;
 m4is_rg1kh::m4is_a57hto( $m4is_nhun );
 } }  
function m4is_u6mkaw() {  if ( m4is_u68pu::m4is_i9k3m() ) { $m4is_t162q = '<strong class="membGood">Active</strong>';
 $m4is_aonj = m4is_u68pu::m4is_x3m4( get_option( $this->m4is_bnd6ti->license_key_name, '' ) );
 if ( $m4is_aonj['trial_mode'] ) { $m4is_t162q = '<strong class="membGood">Test Mode</strong> <strong class="membWarning">(Limited to ' . $m4is_aonj['max_users'] . ' Users )</strong>';
 } } else { $m4is_t162q = '<strong class="membWarning">Inactive</strong> ';
 } return $m4is_t162q;
 }  
function m4is_edk_t() { $m4is_byioc = 'memberium_tables_updated';
 $m4is_f986x5 = get_option( $m4is_byioc, [] );
 $m4is_f986x5 = is_array( $m4is_f986x5 ) ? $m4is_f986x5 : [];
 $m4is_tplu = [ 'actionsets', 'affiliates', 'i2sdk_customfields', 'invoices', 'products', 'social', 'tagcategories', 'tags', ];
 foreach ( $m4is_tplu as $m4is_dj_2 ) { $m4is_f986x5[$m4is_dj_2] = isset( $m4is_f986x5[$m4is_dj_2] ) ? $m4is_f986x5[$m4is_dj_2] : 0;
 } update_option( $m4is_byioc, $m4is_f986x5 );
 return $m4is_f986x5;
 } 
function m4is_b8p5x1() { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "SELECT count(`id`) from `{$m4is_tcw1l}` WHERE `fieldname` = 'Id' AND `appname` = '{$this->m4is_zq0k}' ";
 return (int) $wpdb->get_var($m4is_tovizk );
 } 
function m4is_tpaeb() { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_PRODUCTS;
 $m4is_tovizk = "SELECT count(`id`) from `{$m4is_tcw1l}` WHERE `appname` = '{$this->m4is_zq0k}' ";
 return (int) $wpdb->get_var($m4is_tovizk );
 } 
function m4is_kzqu_() { global $wpdb;
 $m4is_tcw1l = i2sdk_class::DB_API_LOG;
 $m4is_tovizk = "SELECT count(*) from {$m4is_tcw1l} WHERE `appname` = '{$this->m4is_zq0k}' ";
 return (int) $wpdb->get_var($m4is_tovizk );
 } 
function m4is_c2_l9() { global $wpdb;
 $m4is_tcw1l = m4is_pk8phc::m4is_f5buj();
 $m4is_tovizk = "SELECT count(*) from `{$m4is_tcw1l}` WHERE `fieldname` = 'Id' AND `appname` = '{$this->m4is_zq0k}'";
 return (int) $wpdb->get_var($m4is_tovizk );
 } 
function m4is_n6reg() { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_INVOICES;
 $m4is_tovizk = "SELECT count(*) from `{$m4is_tcw1l}` WHERE `appname` = '{$this->m4is_zq0k}'";
 return (int) $wpdb->get_var($m4is_tovizk );
 } 
function m4is__cl2k() { return 0;
 } 
function m4is_v1r83p() { global $wpdb;
 $m4is_tcw1l = MEMBERIUM_DB_SESSIONS;
 $m4is_tovizk = "SELECT count(`session_key`) from `{$m4is_tcw1l}` WHERE `email_key` > '' ";
 return $wpdb->get_var($m4is_tovizk );
 } 
function m4is_tvcqtg() { if (MEMBERIUM_BETA ) { echo '<label>Beta Mode</label><span class="metric"><strong class="membWarning">Beta</strong></span><br />';
 } if (MEMBERIUM_DEBUG ) { echo '<label>Debug Mode</label><span class="metric"><strong class="membWarning">ON</strong></span><br />';
 } if (WP_DEBUG ) { echo '<label>WordPress Debug Mode</label><span class="metric"><strong class="membWarning">ON</strong></span><br />';
 } } 
function m4is_s9_7s() { global $wpdb;
 $m4is_tcw1l = $wpdb->postmeta;
 $m4is_tovizk = "SELECT count(DISTINCT `post_id` ) FROM `{$m4is_tcw1l}` WHERE meta_key IN ('_is4wp_membership_levels', '_is4wp_access_tags', '_is4wp_access_tags2', '_is4wp_any_membership', '_is4wp_hide_completely', '_is4wp_force_public') AND meta_value > '' ";
 return (int)$wpdb->get_var($m4is_tovizk );
 } 
function m4is_qu2h0y() { require ABSPATH . WPINC . '/version.php';
 $m4is_q21_ = 0;
 $m4is_gfwhe = ini_get( 'memory_limit' );
 $m4is_ffck8 = intval( WP_MAX_MEMORY_LIMIT );
 $m4is_qfgl = (int) $this->m4is_bnd6ti->m4is_f25d();
 $m4is_oqu3j = defined('I2SDK_VERSION') ? I2SDK_VERSION : '<strong class="membWarning">None</strong>';
 $m4is__dbwz = php_uname('s') . ' ' . php_uname('m');
 $m4is_pi08fp = phpversion();
 $m4is_ekzt = ini_get('display_errors') ? '<strong class="membWarning">Yes' : '<strong class="membGood">No';
 $m4is_kc5ju8 = strtoupper(MEMBERIUM_SKU);
 $m4is_u_6a = count( get_plugin_updates() );
 $m4is_mb1od = count( get_theme_updates() );
 $m4is_wld3 = count( $this->m4is_bnd6ti->m4is_oiewvu( 'memberships' ) );
 $m4is_ys6ud9 = count( get_option( 'cron', [] ) );
 $m4is__zr_v4 = json_decode( get_transient( 'health-check-site-status-result' ), true);
 $m4is_y8al = wp_using_ext_object_cache() ? '<strong style="color:green;">Enabled</strong>' : '<strong style="color:red;">Unavailable</strong>';
 $m4is_byvr = get_core_updates();
 $m4is_ibepl4 = get_bloginfo( 'version' );
 $m4is_y5v1rl = esc_url( admin_url('site-health.php') );
 $m4is_y02q = is_ssl() ? '<strong style="color:green;">Yes</strong>' : '<strong style="color:red;">No</strong>';
 $m4is_mkdv = is_multisite() ? 'Yes' : 'No';
 $m4is_zts3 = $this->m4is_bnd6ti->m4is_lvmz1b() ? '<strong class="membGood">Yes' : '<strong class="membWarning">No';
 $m4is_udp8bk = ucwords( $this->m4is_bnd6ti->m4is_shfp8b() );
 $m4is_a29_4 = $this->m4is_bnd6ti->m4is_u04m();
 $m4is_yf71nc = m4is_u68pu::m4is_q8ry();
 $m4is_k_mi = m4is_vv5u::m4is_s15o8k() <> $_SERVER['REMOTE_ADDR'];
 $m4is_mt7de = $this->m4is_s9_7s();
 $m4is_wfrlep = $this->m4is_aahnx();
 $m4is_yclkvi = $wp_version;
 $m4is_d167h = empty( $m4is__zr_v4['recommended'] ) ? "None" : "<a href='{$m4is_y5v1rl}'><strong style='color:red;'>{$m4is__zr_v4['recommended']}</strong></a>";
 $m4is_vi60 = empty( $m4is__zr_v4['critical'] ) ? "None" : "<a href='{$m4is_y5v1rl}'><strong style='color:red;'>{$m4is__zr_v4['critical']}</strong></a>";
 if ( is_array( $m4is_byvr ) ) { foreach( $m4is_byvr as $m4is_wlqsgr ) { $m4is_q21_ += (int) version_compare($m4is_wlqsgr->version, $m4is_ibepl4, '>' );
 } } unset($m4is_byvr, $m4is_wlqsgr, $m4is_ibepl4 );
 echo '<hr>';
 echo '<h3>System Metrics</h3>';
 if ($m4is_q21_ || $m4is_u_6a || $m4is_mb1od ) { echo '<label>Missing Core Updates</label><span class="metric membWarning">', $m4is_q21_, '</span><br />';
 echo '<label>Missing Plugin Updates</label><span class="metric membWarning">', $m4is_u_6a, '</span><br />';
 echo '<label>Missing Theme Updates</label><span class="metric membWarning">', $m4is_mb1od, '</span><br />';
 echo '<hr>';
 } echo '<label>WordPress User Count</label><span class="metric">', $m4is_yf71nc, '</span><br />';
 echo '<label>Membership Levels</label><span class="metric">', $m4is_wld3, '</span><br />';
 echo '<label>Protected Pages/Posts</label><span class="metric">', $m4is_mt7de, '</span><br />';
 echo '<hr>';
 echo '<label>WordPress Version</label><span class="metric">', $m4is_yclkvi, '</span><br />';
 echo '<label>WordPress Environment</label><span class="metric">', $m4is_udp8bk, '</span><br />';
 echo '<label>WordPress Recommended Issues</label><span class="metric">', $m4is_d167h, '</span><br />';
 echo '<label>WordPress Critical Issues</label><span class="metric">', $m4is_vi60, '</span><br />';
 echo '<label>WordPress SSL</label><span class="metric">', $m4is_y02q, '</span><br />';
 echo '<label>Wordpress Multisite</label><span class="metric"><strong>', $m4is_mkdv, '</strong></span><br />';
 echo '<label>Wordpress Super Admin</label><span class="metric">', $m4is_zts3, '</strong></span><br />';
 echo '<label>WordPress Cron Jobs</label><span class="metric">', $m4is_ys6ud9, '</span><br />';
 echo '<label>Wordpress Object Caching</label><span class="metric">', $m4is_y8al, '</strong></span><br />';
 echo '<hr>';
 echo '<label>PHP Memory Allocated</label><span class="metric">', $m4is_gfwhe, 'B</span><br />';
 echo '<label>WordPress Memory Limit</label><span class="metric">', $m4is_qfgl, 'MB</span><br />';
 echo '<label>Admin Dashboard Memory Limit</label><span class="metric">', $m4is_ffck8, 'MB</span><br />';
 echo '<hr>';
 echo '<label>Memberium SKU</label><span class="metric">', $m4is_kc5ju8, '</span><br />';
 echo '<label>i2SDK Version</label><span class="metric">', $m4is_oqu3j, '</span><br />';
 echo '<label>XML RPC Library Version</label><span class="metric">', $m4is_wfrlep, '</span><br />';
 echo '<label>PHP Version</label><span class="metric">', $m4is_pi08fp, '</span><br />';
 echo '<label>Operating System</label><span class="metric">', $m4is__dbwz, '</span><br />';
 echo '<label>Display Errors</label><span class="metric">', $m4is_ekzt, '</strong></span><br />';
 echo '<label>Load Balancer / Proxy</label><span class="metric">', $m4is_k_mi ? '<strong class="membGood">Yes</strong>' : 'No' , '</span><br />';
 echo '</form>';
 } 
function m4is_aahnx() : string { if ( class_exists( 'i2sdk_ixr_client_class' ) ) { $version = '<strong style="color:green;">i2sdk-IXR</strong>';
 } else { $version = property_exists( 'PhpXmlRpc\PhpXmlRpc', 'xmlrpcVersion' ) ? PhpXmlRpc\PhpXmlRpc::$xmlrpcVersion : 'Unknown';
 $version = '<strong style="color:red;">' . $version . '</strong>';
 } return $version;
 } 
function m4is_ccf7() { $m4is_f986x5 = $this->m4is_edk_t();
 $m4is_f986x5['tagcategories'] = time();
 $m4is_f986x5['tags'] = time();
 $this->m4is_zjo03f = true;
 m4is_a18xl::m4is_nzf_t();
 m4is_pwtg7::m4is_jgs89();
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } 
function m4is_vs0_() { if ( isset( $_GET['action'] ) ) { if ( $_GET['action'] == 'sync-tags' ) { $this->m4is_ccf7();
 } elseif ($_GET['action'] == 'sync-actionsets') { m4is_tvc2xn::m4is_fre0();
 } elseif ($_GET['action'] == 'sync-fields') { m4is_a8iaym::m4is_j23h();
 } elseif($_GET['action'] == 'update-license') { m4is_u68pu::m4is_k6nh( true );
 } } } 
function m4is_amx0l() { if (! isset( $_GET['nosync'] ) ) { return;
 } if ( $this->m4is_zjo03f ) { return;
 } $m4is_f986x5 = $this->m4is_edk_t();
 if ( ( ! $this->m4is_zjo03f ) && ( time() - $m4is_f986x5['tags'] > 300 ) ) { m4is_pwtg7::m4is_jgs89();
 $m4is_f986x5['tags'] = time();
 $this->m4is_zjo03f = true;
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } if ( ( ! $this->m4is_zjo03f ) && ( time() - $m4is_f986x5['tagcategories'] > 300 ) ) { m4is_a18xl::m4is_nzf_t();
 $m4is_f986x5['tagcategories'] = time();
 $this->m4is_zjo03f = true;
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } if ( ( ! $this->m4is_zjo03f ) && ( time() - $m4is_f986x5['actionsets'] > 300 ) ) { m4is_tvc2xn::m4is_fre0();
 $m4is_f986x5['actionsets'] = time();
 $this->m4is_zjo03f = true;
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } if ( ( ! $this->m4is_zjo03f ) && ( time() - $m4is_f986x5['i2sdk_customfields'] > 300 ) ) { m4is_a8iaym::m4is_j23h();
 $m4is_f986x5['i2sdk_customfields'] = time();
 $this->m4is_zjo03f = true;
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } if ( ( ! $this->m4is_zjo03f ) && ( time() - $m4is_f986x5['products'] > 300 ) ) { m4is_untczd::m4is_ky94f();
 $m4is_f986x5['products'] = time();
 $this->m4is_zjo03f = true;
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } if ( ( ! $this->m4is_zjo03f ) && ( time() - $m4is_f986x5['invoices'] > 300 ) ) { m4is_untczd::m4is_ypsh6m();
 $m4is_f986x5['invoices'] = time();
 $this->m4is_zjo03f = true;
 update_option( 'memberium_tables_updated', $m4is_f986x5, false );
 } } 
function m4is_xai0mu() { $m4is_zq0k = strtoupper( $this->m4is_bnd6ti->m4is_d14zr( 'appname' ) );
 $m4is_zq0k = empty( $m4is_zq0k ) ? '<span class="membWarning">Missing</span>' : $m4is_zq0k;
 $m4is_gxdq7 = (bool) $this->m4is_bnd6ti->get_i2sdk_options()['server_verified'];
 $m4is_gxdq7 = $m4is_gxdq7 ? '<strong class="membGood">Connected</strong>' : '<strong class="membWarning">Not Connected</strong>';
 $m4is_t162q = $this->m4is_u6mkaw();
 echo '<h3>Keap Connection</h3>';
 echo '<form method="post" action="">';
 echo '<label>App Name</label><strong>', $m4is_zq0k, '</strong><br />';
 echo '<label>API Status</label>', $m4is_gxdq7, '<br />';
 echo '<label>License Status</label>', $m4is_t162q, '<br />';
 echo '<p>';
 echo '<input type="submit" name="save" value="Renew License" class="button-primary" style="margin-right:20px;">';
 echo '<input type="submit" name="save" value="Re-Activate Plugin" class="button-primary">';
 echo '</p>';
 } 
function m4is_nc_r7() { $m4is_dcjt_3 = $this->m4is_edk_t();
 $m4is_ifcyq3 = m4is_tvc2xn::m4is__p09();
 $m4is_k6hs = $this->m4is_kzqu_();
 $m4is_yng7 = m4is_a18xl::m4is_ay9g();
 $m4is_zetvnf = $this->m4is_b8p5x1();
 $m4is_ovdqwn = m4is_a8iaym::m4is__z5gv4();
 $m4is_jgp62 = $this->m4is_tpaeb();
 $m4is_awegl = m4is_pwtg7::m4is_c69nfv();
 $m4is_qyjnt = $this->m4is_c2_l9();
 $m4is_ocurf_ = $this->m4is_n6reg();
 $m4is__lxjf = $this->m4is__cl2k();
 $m4is_w2iv = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_tag_categories' );
 $m4is_s5yrs3 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' );
 $m4is_ep6vug = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'db_sessions' );
 $m4is_hxlo = count( array_filter( explode( ',', trim( $m4is_w2iv, ',' ) ) ) );
 $m4is_s5yrs3 = count( array_filter( explode( ',', trim( $m4is_s5yrs3 ) ) ) );
 $m4is__urq70 = $m4is_ep6vug ? $this->m4is_v1r83p() : 'Disabled';
 $m4is_tn2e7 = count( m4is_untczd::m4is_k896() );
 if ( $m4is_k6hs ) { $m4is_k6hs = "<strong style='color:red;''>{$m4is_k6hs}</strong>";
 } echo '<h3>Keap Cache Metrics</h3>';
 echo '<label>Synced Actionsets</label><span class="metric">', $m4is_ifcyq3, '</span> (', human_time_diff($m4is_dcjt_3['actionsets'] ), ')<br />';
 echo '<label>Synced Custom Fields</label><span class="metric">', $m4is_ovdqwn, '</span> (', human_time_diff($m4is_dcjt_3['i2sdk_customfields'] ), ')<br />';
 echo '<label>Synced Tag Categories</label><span class="metric">', $m4is_yng7, '</span> (', human_time_diff($m4is_dcjt_3['tagcategories'] ), ')<br />';
 echo '<label>Synced Tags</label><span class="metric">', $m4is_awegl, '</span> (', human_time_diff($m4is_dcjt_3['tags'] ), ')<br />';
 echo '<label>Synced Products</label><span class="metric">', m4is_untczd::m4is__a4j(), '</span> (', human_time_diff($m4is_dcjt_3['products'] ), ')<br />';
 echo '<label>Synced Subscription Plans</label><span class="metric">', $m4is_tn2e7, '</span><br />';
 echo '<label>Synced Invoices</label><span class="metric">', $m4is_ocurf_, '</span> (', human_time_diff($m4is_dcjt_3['invoices'] ), ')<br />';
 echo '<br />';
 echo '<label>Cached Affiliates</label><span class="metric">', $m4is_qyjnt, '</span><br />';
 echo '<label>Cached Contacts</label><span class="metric">', $m4is_zetvnf, '</span><br />';
 echo '<label>Database Backed Sessions</label><span class="metric">', $m4is__urq70, '</span><br />';
 echo '<label>Blocked Fields</label><span class="metric">', (empty($m4is_s5yrs3 ) ? "<strong class='membWarning'>0</strong>" : $m4is_s5yrs3 ), '</span><br />';
 echo '<label>Blocked Tag Categories</label><span class="metric">', (empty($m4is_hxlo ) ? 0 : '<strong class="membWarning">' . $m4is_hxlo .'</strong>' ), '</span><br />';
 echo '<label>API Log Entries</label><span class="metric">', $m4is_k6hs, '</span><br />';
 echo '<p>';
 echo '<input type="submit" name="save" value="Synchronize Keap" class="button-primary"> ', m4is_wr40w::m4is_vgnp(8470 );
 echo '</p>';
 } } ?>
<style>
	.membWarning {
		font-weight:bold;
		color:red;
	}
	.membGood {
		font-weight:bold;
		color:green;
	}
</style>
<?php

