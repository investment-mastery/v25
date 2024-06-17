<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_us74 {    public static 
function m4is_o9ws4() { self::m4is_akho();
 self::m4is_a1gf();
 self::m4is_e7uz();
 self::m4is_idvgo();
 self::m4is_ml5ry();
 self::m4is_zph8();
 self::m4is_o0ebfi();
 self::m4is_ppsyz8();
 self::m4is_d1euj();
 self::m4is_k970();
 self::m4is_fng5h();
 self::m4is_r_quf();
 self::m4is_ajq65();
 self::m4is_lyczlw();
 self::m4is_ll7x4();
 self::m4is_i3jtl();
 self::m4is_fvkq4();
 self::m4is_fj9ts();
 self::m4is_jj78();
 }  public static 
function m4is_acidj() { global $wpdb;
 $m4is_oa3lc2 = get_option( m4is_u68pu::m4is_hx_jg() );
 $m4is_aonj = m4is_u68pu::m4is_x3m4( $m4is_oa3lc2 );
 $m4is_yfj6qe = (boolean) $m4is_aonj['active'];
 $m4is_haon5 = (boolean) $m4is_aonj['valid'];
 $m4is_p1qpn = (boolean) $m4is_aonj['trial_mode'];
 $m4is_sz5d = '<strong style="color:green;">Yes</strong>';
 $m4is_cbidtz = '<strong style="color:red;">No</strong>';
 echo '<h3>License Status</h3>';
 echo '<p class="indented">';
 echo '<label>Valid</label>';
 echo '<span>', ( $m4is_haon5 ? $m4is_sz5d : $m4is_cbidtz ), '</span><br />';
 echo '<label>Active</label>';
 echo '<span>', ( $m4is_yfj6qe ? $m4is_sz5d : $m4is_cbidtz ), '</span><br />';
 if ( $m4is_p1qpn ) { echo '<label>Test Mode</label>';
 echo '<span><strong style="color:red;">TEST LICENSE MODE</strong></span><br />';
 } echo '<label>Next Check</label>';
 echo '<span>', date('F jS, Y @ h:i:s', $m4is_aonj['next_check']), '</span><br />';
 echo '<label>Renewal Date</label>';
 echo '<span>', date('F jS, Y @ h:i:s', $m4is_aonj['renewal_date']), '</span><br />';
 echo '</p>';
 echo '<hr />';
 echo '<h3>License Detail</h3>';
 echo '<textarea cols="100" rows="20">';
 foreach ($m4is_aonj as $m4is_c5zg => $m4is_g0wy ) { echo ucwords( str_replace( '_', ' ', $m4is_c5zg ) ), ':  ', $m4is_g0wy, "\n";
 } echo '</textarea>';
 echo '<p></p>';
 }  public static 
function m4is_hty3iw() { $m4is_qh8p6 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('memberships');
 echo '<h3>Memberships</h3>';
 echo '<textarea cols="100" rows="20">', json_encode($m4is_qh8p6, JSON_PRETTY_PRINT), '</textarea>';
 }  public static 
function m4is_yn84() { $m4is_t162q = m4is_u68pu::m4is_i9k3m();
 echo '<label>License Status</label>';
 echo '<span>', (int) $m4is_t162q, '</span><br />';
 self::m4is_k3lju();
 }     private static 
function m4is_idvgo() { echo '<h3>Object Caching</h3>';
 echo '<div class="indented">';
 if ( wp_using_ext_object_cache() ) { $m4is_oq9nf = $GLOBALS['wp_object_cache'];
 $m4is_irw_a = [];
 $m4is_n8v3 = get_object_vars( $m4is_oq9nf );
 $m4is_irw_a['misses'] = empty( $m4is_n8v3['cache_misses'] ) ? 0 : $m4is_n8v3['cache_misses'];
 $m4is_irw_a['hits'] = empty( $m4is_n8v3['cache_hits'] ) ? 0 : $m4is_n8v3['cache_hits'];
 $m4is_irw_a['client'] = empty( $m4is_n8v3['redis_client'] ) ? 'Unknown' : $m4is_n8v3['redis_client'];
 if ( function_exists( 'wp_cache_get_stats' ) ) { $m4is_n8v3 = wp_cache_get_stats();
 echo '<p>Alternate Object Cache Detected (wp_cache_get_stats)</p>';
  } elseif ( method_exists( $m4is_oq9nf, 'getstats' ) ) { $m4is_n8v3 = $GLOBALS['wp_object_cache']->getStats();
 echo '<p>Alternate Object Cache Detected (getStats)</p>';
  } echo '<p>';
 echo "<strong>Object Cache Client:</strong>  {$m4is_irw_a['client']}<br />";
 echo "<strong>Object Cache Hits:</strong>  {$m4is_irw_a['hits']}<br />";
 echo "<strong>Object Cache Misses:</strong>  {$m4is_irw_a['misses']}</p>";
 echo '</p>';
 } else { echo '<p style="color:red;font-weight:bold;">Disabled</p>';
 } echo '</div>';
 }  private static 
function m4is_a1gf() { $m4is_kneg6 = [ 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR', 'CF-CONNECTING-IP', ];
 echo '<h3>Remote IP Address</h3>';
 echo '<div class="indented">';
 foreach($m4is_kneg6 as $m4is_s2op9m) { if ( ! empty( $_SERVER[$m4is_s2op9m] ) ) { echo $m4is_s2op9m, ' - ', $_SERVER[$m4is_s2op9m], '<br />';
 } } echo '</div>';
 }  private static 
function m4is_o0ebfi() { global $wpdb;
 $m4is_tplu = get_option('memberium_tables', [] );
 $m4is_qcotu = [];
 if (is_array($m4is_tplu)) { foreach($m4is_tplu as $m4is_aw4k6) {   $m4is_tovizk = "SELECT 1 FROM `{$m4is_aw4k6}` LIMIT 1;";
 $wpdb->get_var($m4is_tovizk);
 $m4is_zg8z = $wpdb->last_error;
 if ($m4is_zg8z) { $m4is_qcotu[] = "Table '{$m4is_aw4k6}' : <span style='font-weight:bold;color:red;'>{$m4is_zg8z}</span><br />";
 } } } echo '<h3>Missing Database Tables</h3>';
 echo '<div class="indented">';
 if (! empty($m4is_qcotu)) { foreach($m4is_qcotu as $m4is_f93i) { echo $m4is_f93i, '<br>';
 } } else { echo '<p>None</p>';
 } echo '</div>';
 } private static 
function m4is_lyczlw() { echo '<h3>wp-admin php.ini</h3>';
 if (file_exists(get_home_path() . '/wp-admin/php.ini') ) { echo '<textarea readonly=readonly cols="100" rows="10">', file_get_contents(get_home_path() . '/wp-admin/php.ini'), '</textarea>';
 } else { echo '<p>Not Found</p>';
 } } private static 
function m4is_fvkq4() { $m4is_k1hi0 = get_defined_constants(true);
 if (isset($m4is_k1hi0['user']) ) { ksort($m4is_k1hi0['user']);
 echo '<h3>Constants</h3>';
 echo '<table>';
 foreach($m4is_k1hi0['user'] as $k => $v) { echo '<tr><td>', $k, '</td><td>', $v, '</td></tr>';
 } echo '</table>';
 } } private static 
function m4is_domr() { $m4is_j_ni = '<strong style="color:red;">Unknown</strong>';
 $m4is_z9iapv = '/proc/cpuinfo';
 if ( @is_readable( $m4is_z9iapv ) ) { $m4is_h50zo = @file( $m4is_z9iapv );
 if ( is_array( $m4is_h50zo ) ) { foreach( $m4is_h50zo as $m4is_pv4alu ) { if ( substr( $m4is_pv4alu, 0, 9 ) == 'cpu cores' ) { $m4is_j_ni = intval( $m4is_j_ni ) + (int) substr( $m4is_pv4alu, strpos( $m4is_pv4alu, ':' ) + 1 );
 } } } } return $m4is_j_ni;
 } private static 
function m4is_i3jtl() { echo '<h3>Cron Jobs</h3>';
 echo '<div class="indented">';
 $m4is_ou9sn4 = [];
 $m4is_ys6ud9 = get_option('cron', [] );
 if (count($m4is_ys6ud9) ) { foreach ($m4is_ys6ud9 as $m4is_mlzmi1 => $m4is_yq74pt) { if (is_array($m4is_yq74pt) ) { foreach ($m4is_yq74pt as $jobname => $details) { if (stripos($jobname, 'memberium') === 0) { $m4is_ou9sn4[$jobname] = $m4is_mlzmi1;
 } } } } } echo '<strong style="margin-left:20px;display:inline-block;width:250px;">Cron Job Name</strong><strong>Next Run Time</strong><br>';
 if (! empty($m4is_ou9sn4) ) { foreach ($m4is_ou9sn4 as $m4is_t5ot4 => $m4is_n260nx) { echo '<span style="margin-left:20px;display:inline-block;width:250px;">', $m4is_t5ot4, '</span>', date("Y-m-d h:i:s", $m4is_n260nx), '<br>';
 } } echo '</div>';
 } private static 
function m4is_ppsyz8() { echo '<h3>CURL Library Support</h3>';
 echo '<div class="indented">';
 if (function_exists('curl_version') ) { $m4is_c1tr4w = curl_version();
 echo '<strong>Version</strong>: ', $m4is_c1tr4w['version'], '<br />';
 echo '<strong>Version Number</strong>: ', $m4is_c1tr4w['version_number'], '<br />';
 echo '<strong>SSL Version</strong>: ', $m4is_c1tr4w['ssl_version'], '<br />';
 echo '<strong>LibZ Version</strong>: ', $m4is_c1tr4w['libz_version'], '<br />';
 echo '<strong>Age</strong>: ', $m4is_c1tr4w['age'], '<br />';
 } else { echo '<p style="color:red;font-weight:bold;">CURL Library Support Missing</p>';
 } echo '</div>';
 } private static 
function m4is_zph8() { global $wpdb;
 echo '<h3>MySQL Configuration</h3>';
 echo '<div class="indented">';
 echo '<h3>Database Storage Engines:</h3>';
 $m4is_tovizk = 'SHOW STORAGE ENGINES;';
 $m4is_xm2h = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 echo '<table>';
 echo '<tr>';
 echo '<td>Engine Name</td>';
 echo '<td>Support</td>';
 echo '<td>Comments / Description</td>';
 echo '</tr>';
 foreach($m4is_xm2h as $m4is_oa_z) { echo '<tr>';
 echo '<td>',$m4is_oa_z['Engine'],'</td>';
 echo '<td>',$m4is_oa_z['Support'],'</td>';
 echo '<td>',$m4is_oa_z['Comment'],'</td>';
 echo '</tr>';
 } echo '</table>';
 echo '<h3>Cache Configuration</h3>';
 $m4is_tovizk = "show variables like 'have_query_cache';";
 $m4is_oa_z = $wpdb->get_results($m4is_tovizk);
 echo '<strong>', $m4is_oa_z[0]->Variable_name, '</strong> = ', $m4is_oa_z[0]->Value, '<br>';
 $m4is_tovizk = "show variables like '%query%';";
 $m4is_xm2h = $wpdb->get_results($m4is_tovizk);
 foreach($m4is_xm2h as $m4is_oa_z) { echo '<strong>', $m4is_oa_z->Variable_name, '</strong> = ', $m4is_oa_z->Value, '<br>';
 } echo '</div>';
 } private static 
function m4is_fj9ts() { echo '<h3>Debug Log:</h3>';
 if (file_exists(MEMBERIUM_DEBUGLOG) ) { $m4is_we6z87 = (0 - min(filesize(MEMBERIUM_DEBUGLOG), MB_IN_BYTES) );
 $m4is_we6z87 = $m4is_we6z87 < 0 ? 0 : $m4is_we6z87;
 echo '<form method="post" action=""><input type="submit" name="delete-debug" value="Delete Debug Log"></form>';
 echo '<textarea readonly=readonly cols="100" rows="20">', file_get_contents(MEMBERIUM_DEBUGLOG, false, null, $m4is_we6z87), '</textarea>';
 } else { echo '<p style="color:red;font-weight:bold;">No debug log found.</p>';
 } } private static 
function m4is_jj78() { $m4is_vf403l = ini_get( 'error_log' );
 if (! empty($m4is_vf403l) && file_exists($m4is_vf403l) ) { $m4is_v3hstc = (int) filesize($m4is_vf403l);
 $m4is_ehil57 = 10 * KB_IN_BYTES;
  $m4is_we6z87 = 0 - $m4is_ehil57;
 $m4is_we6z87 = $m4is_we6z87 < 0 ? 0 : $m4is_we6z87;
 echo '<h3>PHP Error Log:</h3>';
 if ( $m4is_vf403l ) { echo '<textarea readonly=readonly cols="100" rows="20">', file_get_contents( $m4is_vf403l, false, null, $m4is_we6z87, $m4is_ehil57 + 1024 ), '</textarea>';
 } else { echo '<p style="color:red;font-weight:bold;">No error log found.</p>';
 } } } private static 
function m4is_fng5h() { echo '<h3>.htaccess</h3>';
 if (file_exists(get_home_path() . '.htaccess') ) { echo '<textarea readonly=readonly cols="100" rows="10">', file_get_contents(get_home_path() . '.htaccess'), '</textarea>';
 } } private static 
function m4is_ajq65() { echo '<h3>Main php.ini</h3>';
 if (file_exists(get_home_path() . 'php.ini') ) { echo '<textarea readonly=readonly cols="100" rows="10">', file_get_contents(get_home_path() . 'php.ini'), '</textarea>';
 } else { echo '<p>Not Found</p>';
 } } private static 
function m4is_d1euj() { $m4is_z3z42g = [ 'licenseserver.webpowerandlight.com', ];
 $m4is_tghtiz = false;
 echo '<h3>Network</h3>';
 echo '<div class="indented">';
 echo '<h3>License Servers</h3>';
 echo '<div class="indented">';
 foreach ($m4is_z3z42g as $m4is_nymjfo) { $m4is_lv7wu = gethostbyname($m4is_nymjfo);
 if ($m4is_nymjfo == $m4is_lv7wu) { $m4is_lv7wu ='<span style="color:red;">Failed To Resolve</span>';
 $m4is_tghtiz = true;
 } else { $m4is_lv7wu ='<span style="color:green;">' . $m4is_lv7wu . '</span>';
 } echo '<p>', $m4is_nymjfo, ' resolves to <strong>', $m4is_lv7wu, '</strong></p>';
 } if ($m4is_tghtiz) { echo '<p style="color:red;">One or more hostnames failed to resolve due to DNS issues.</p>';
 } $m4is_tghtiz = false;
 $m4is_kvoe1y = [ 'https://licenseserver.webpowerandlight.com/getlicense.php', 'https://licenseserver.webpowerandlight.com/memberium-is/current-version.php', ];
 foreach ($m4is_kvoe1y as $m4is_imdo6) { $m4is_oa_z = wp_remote_get($m4is_imdo6);
 if (is_array($m4is_oa_z) ) { } else { echo '<p>', $m4is_oa_z->errors['http_request_failed'][0], '</pre>';
 $m4is_tghtiz = true;
 } } if (! $m4is_tghtiz) { echo '<p><strong style="color:green;">Connection Successful</strong></p>';
 } echo '</div>';
 } static 
function m4is_r_quf() { $m4is_bcw8 = ini_get_all();
 if ( ! empty( $m4is_bcw8 ) ) { ksort( $m4is_bcw8 );
 echo '<h3>PHP .ini Settings</h3>';
 echo '<table>';
 foreach( $m4is_bcw8 as $m4is_c5zg => $m4is_g0wy ) { $m4is_lh4p70 = isset( $m4is_g0wy['local_value'] ) ? $m4is_g0wy['local_value'] : $m4is_g0wy['global_value'];
 $m4is_lh4p70 = isset( $m4is_lh4p70 ) ? $m4is_lh4p70 : '';
 if ( strpos( $m4is_lh4p70, ',') !== false ) { $m4is_lh4p70 = implode( ', ', array_filter( explode( ',', $m4is_lh4p70 ) ) );
 } if (! empty($m4is_g0wy['local_value']) || ! empty($m4is_g0wy['global_value']) ) { echo '<tr><td>', $m4is_c5zg, '</td><td>', $m4is_lh4p70, '</td></tr>';
 } } echo '</table>';
 } } private static 
function m4is_k3lju() { $m4is_fybae0 = get_option('memberium/activation_log', '' );
 echo '<h3>Activation Log</h3>';
 echo '<textarea readonly=readonly cols="100" rows="10">', $m4is_fybae0, '</textarea>';
 } static 
function m4is_e7uz() { echo '<h3>PHP Modules Loaded</h3>';
 echo '<div class="indented">';
 echo '<div style="width:600px;">', implode(', ', get_loaded_extensions() ), '</div>';
 echo '</div>';
 } static 
function m4is_hnpfu0() { $m4is_w2w8 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings');
 echo '<h3>Settings</h3>';
 echo '<textarea cols="100" rows="20">', json_encode($m4is_w2w8, JSON_PRETTY_PRINT), '</textarea>';
 } static 
function m4is_ml5ry() { if (function_exists('sys_getloadavg') ) { $m4is_yubwc = sys_getloadavg();
 if (is_array($m4is_yubwc) && ! empty($m4is_yubwc) ) { echo '<h3>System Load</h3>';
 echo '<div class="indented">';
 echo '<strong>Last Minute</strong>:  ', $m4is_yubwc[0], '<br>';
 echo '<strong>Last 5 Minutes</strong>:  ', $m4is_yubwc[1], '<br>';
 echo '<strong>Last 15 Minutes</strong>:  ', $m4is_yubwc[2], '<br>';
 } else { echo '<p style="font-weight:bold;color:red;">Operating System Load Average Report Empty.</p>';
 } } else { echo '<p style="font-weight:bold;color:red;">Operating System missing Load Average Reports.</p>';
 } echo '</div>';
 echo '<p></p>';
 } static 
function m4is_akho() { global $wpdb;
 $m4is_bqi13k = m4is_pms8y::m4is_e5l8a9()->m4is_znwy() . 'build_id.dat';
 $m4is_mk945 = file_exists( $m4is_bqi13k ) ? file_get_contents( $m4is_bqi13k ) : 'Unknown';
 $m4is_j_ni = self::m4is_domr();
 $m4is_wjfz = php_uname('m');
 $m4is_ylbtcn = $wpdb->db_version();
 $m4is_conu = php_uname('n');
 $m4is__dbwz = php_uname('s');
 $m4is_sv87qs = php_uname('v');
 $m4is_pi08fp = phpversion();
 $m4is_rwo9i = php_sapi_name();
 $m4is_uf0a = isset( $_SERVER['SERVER_SOFTWARE'] ) ? $_SERVER['SERVER_SOFTWARE'] : '<strong style="color:red;">Unknown</strong>';
 $m4is_x0_hk = function_exists( 'get_current_user' ) ? get_current_user() : 'Unknown';
 require ABSPATH . WPINC . '/version.php';
 $m4is_ffbc = $wp_version;
 echo '<h3>Build Info</h3>';
 echo '<div class="indented">';
 echo "<strong>Build ID</strong>:  {$m4is_mk945}<br>";
 echo '</div>';
 echo '<h3>System Info</h3>';
 echo '<div class="indented">';
 echo "<strong>Hostname</strong>:  {$m4is_conu}<br>";
 echo "<strong>CPU Type</strong>:  {$m4is_wjfz}<br>";
 echo "<strong>CPU Cores</strong>:  {$m4is_j_ni}<br>";
 echo "<strong>Operating System</strong>:  {$m4is__dbwz}<br>";
 echo "<strong>Web Server Type</strong>:  {$m4is_uf0a}<br>";
 echo "<strong>Username</strong>:  {$m4is_x0_hk}<br>";
 echo "<strong>SAPI</strong>:  {$m4is_rwo9i}<br>";
 echo "<strong>PHP Version</strong>:  {$m4is_pi08fp}<br>";
 echo "<strong>WordPress Version</strong>:  {$m4is_ffbc}<br>";
 echo "<strong>Database Version</strong>:  {$m4is_ylbtcn}<br>";
 echo '<p></p>';
 echo '<strong>Home Path</strong>:  ', get_home_path(), '<br>';
 echo '<strong>Install Point</strong>: ', dirname(MEMBERIUM_HOME), '<br>';
 echo '<p></p>';
 echo '<strong>Remote Address</strong>:  ', $_SERVER['REMOTE_ADDR'], '<br>';
 if (isset($_SERVER['HTTP_X_REAL_IP']) ) { echo '<strong>Real IP</strong>:  ', $_SERVER['HTTP_X_REAL_IP'], '<br>';
 } if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ) { echo '<strong>Forwarded For</strong>:  ', $_SERVER['HTTP_X_FORWARDED_FOR'], '<br>';
 } if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) ) { echo '<strong>Cloudflre Connecting IP</strong>:  ', $_SERVER['HTTP_CF_CONNECTING_IP'], '<br>';
 } if (isset($_SERVER['HTTP_X_SUCURI_CLIENTIP']) ) { echo '<strong>Sucuri Client IP</strong>:  ', $_SERVER['HTTP_X_SUCURI_CLIENTIP'], '<br>';
 } echo '<p></p>';
 echo '</div>';
 } static 
function m4is_k970() { echo '</div>';
  return;
 echo '<h3>TLS Support</h3>';
 echo '<div class="indented">';
 echo '<h3>CURL SSL TLS 1.2 Test</h3>';
 $m4is_a0hil = curl_init('https://tlstest.paypal.com/');
 curl_setopt($m4is_a0hil, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($m4is_a0hil, CURLOPT_CONNECTTIMEOUT, 2);
 $m4is_a0hil = m4is_pms8y::m4is_e5l8a9()->m4is_jln7r1($m4is_a0hil);
 $m4is_oa_z = curl_exec($m4is_a0hil);
  echo '<strong>PayPal Test</strong><br />';
 echo $m4is_oa_z, '<br /><br />';
 $m4is_a0hil = curl_init('https://www.howsmyssl.com/a/check');
 curl_setopt($m4is_a0hil, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($m4is_a0hil, CURLOPT_CONNECTTIMEOUT, 2);
 $m4is_a0hil = m4is_pms8y::m4is_e5l8a9()->m4is_jln7r1($m4is_a0hil);
 $m4is_oa_z = curl_exec($m4is_a0hil);
  $m4is_oa_z = json_decode($m4is_oa_z);
 if (is_object($m4is_oa_z) ) { echo '<strong>SSL Protocol Test</strong><br />';
 echo '<strong>TLS Version</strong>: ', $m4is_oa_z->tls_version, '<br />';
 echo '<strong>TLS Compression</strong>: ', $m4is_oa_z->tls_compression_supported ? 'Yes' : 'No', '<br />';
 if (is_array($m4is_oa_z->given_cipher_suites) ) { echo '<strong>Cipher Suites</strong>: ', implode(', ', $m4is_oa_z->given_cipher_suites), '<br>';
 } } else { echo '<p style="color:red;font-weight:bold;">SSL Protocol Test Failed</p>';
 } echo '</div>';
 echo '</div>';
 } static 
function m4is_ll7x4() { echo '<h3>wp-config.php:</h3>';
 if (file_exists(get_home_path() . 'wp-config.php') ) { echo '<textarea readonly=readonly cols="100" rows="10">', file_get_contents(get_home_path() . 'wp-config.php'), '</textarea>';
 } } }

