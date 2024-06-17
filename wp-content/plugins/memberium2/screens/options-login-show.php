<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_v_jm;
 final 
class m4is_v_jm { private $m4is_bnd6ti, $m4is_zq0k, $m4is_w2w8;
 
function __construct() { $this->m4is_x6wv();
 $this->m4is_gm1n();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $this->m4is_w2w8 = 'settings';
 } private 
function m4is_nei5hq() { $m4is_w_8g = $this->m4is_z6v2sd();
 $m4is_loxs = '';
 $m4is_majl_ = 'Password';
 $m4is_dcf_7 = $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'password_field', $m4is_majl_ );
  $m4is_wrnxfy = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' );
 $m4is_wrnxfy = is_string( $m4is_wrnxfy ) ? array_filter( explode( ',', $m4is_wrnxfy ) ) : [];
 if ( ! empty( $m4is_wrnxfy ) ) { foreach ( $m4is_w_8g as $m4is_s2ge5 => $m4is_g1ru50 ) { if ( in_array( $m4is_g1ru50, $m4is_wrnxfy ) ) { unset( $m4is_w_8g[$m4is_s2ge5] );
 } } }  foreach ( $m4is_w_8g as $m4is_ke_fr ) { $m4is_xnwj4 = $m4is_ke_fr == $m4is_dcf_7 ? 'selected="selected"' : '';
 $m4is_loxs = $m4is_loxs . sprintf( '<option value="%s" %s >%s</option>', $m4is_ke_fr, $m4is_xnwj4, $m4is_ke_fr );
 } echo '<li><label>CRM Password Field</label>';
 echo '<select id="password_field" name="password_field" class="basic-single" style="width:250px;">';
 echo $m4is_loxs;
 echo '</select>', m4is_wr40w::m4is_vgnp( 1171 );
 echo '</li>';
 if ( $m4is_majl_ == $m4is_dcf_7 ) { echo '<li><label>Create New Password Field</label>';
 echo '<input type="text" autocomplete="off" name="new_crm_field" size="20" value="" />';
 echo m4is_wr40w::m4is_vgnp( 5733 ), '</li>';
 } } private 
function m4is_gm1n() { echo '<form method="POST" action="">';
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce' );
 $this->m4is_e7ek();
 $this->m4is_dfgip();
 $this->m4is_e37vp();
 $this->m4is_bzr7t();
 $this->m4is_xovqkz();
 $this->m4is_z3s06t();
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 } private 
function m4is_e7ek() { $m4is_lxdu = $this->m4is_p7zgkt();
 $m4is_tfmod = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'min_password_length', 6 );
 $m4is_prps5 = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'password_strength', 0 );
 $m4is_zh02 = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'password_reset_tag', 0 );
 $m4is_r36qyu = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'local_auth_only', 0 );
 $m4is_fiwfc6 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'disable_password_reset', 0 );
 $m4is_utoc = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'disable_lost_password', 0 );
 echo '<h3>Password Settings</h3>';
 echo '<ul>';
 $this->m4is_s31r();
 $this->m4is_gj768();
 $this->m4is_nei5hq();
 $m4is_k4yeul = [ 'help_id' => 1185, 'min' => 6, 'max' => 64, 'size' => 6 ];
 m4is_wr40w::m4is_ze6b( 'Minimum Password Length', 'min_password_length', $m4is_tfmod, $m4is_k4yeul );
 m4is_wr40w::m4is_uftpvx( 'Password Strength', 'password_strength', $m4is_prps5, $m4is_lxdu, ['style' => 'width:250px;', 'help_id' => 21852] );
 m4is_wr40w::m4is_hd8p( 'Secure Passwords / Local Auth Only', 'local_auth_only', 6818, $m4is_r36qyu );
 m4is_wr40w::m4is_hd8p( 'Disable Lost Password', 'disable_lost_password', 4422, $m4is_utoc );
 m4is_wr40w::m4is_hd8p( 'Disable WordPress Password Reset', 'disable_password_reset', 4421, $m4is_fiwfc6 );
 m4is_wr40w::m4is_mz70( 'Password Reset Tag', 'password_reset_tag', $m4is_zh02, 'taglistdropdown', [ 'help_id' => 1183 ] );
 echo '</ul>';
 } private 
function m4is_dfgip() { $m4is_ly9pqf = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'site_ban_tag', 0 );
 $m4is_ppsx = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'maximum_login_ips', 0 );
 $m4is__29da = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'maximum_login_timeframe', 0 );
 $m4is_yxeh = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'bruteforce_check', 0 );
 $m4is_jng9m8 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'require_membership', 0 );
 $m4is_vzeli = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'known_logins_only', 0 );
 $m4is_c1no = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'allow_local_logins', 0 );
 $m4is_m5_i = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'simultaneous_logins', 0 );
 echo '<h3>Login Restrictions</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_hd8p( 'Require Membership', 'require_membership', 1202, $m4is_jng9m8 );
 m4is_wr40w::m4is_hd8p( 'Known Logins Only', 'known_logins_only', 6773, $m4is_vzeli );
 m4is_wr40w::m4is_hd8p( 'Allow Local Logins', 'allow_local_logins', 6367, $m4is_c1no );
 m4is_wr40w::m4is_hd8p( 'Prevent Simultaneous Logins', 'simultaneous_logins', 1197, $m4is_m5_i );
 m4is_wr40w::m4is_mz70( 'Site Ban Tag', 'site_ban_tag', $m4is_ly9pqf, 'taglistdropdown', [ 'help_id' => 1195 ] );
 m4is_wr40w::m4is_ze6b( 'Maximum Login IPs', 'maximum_login_ips', $m4is_ppsx, ['min' => 0, 'max' => 100, 'help_id' => 1204] );
 m4is_wr40w::m4is_ze6b( 'Maximum Login Window (Hours)', 'maximum_login_timeframe', $m4is__29da, ['min' => 0, 'max' => 672, 'help_id' => 1204] );
 m4is_wr40w::m4is_uftpvx( 'Bot Login Protection', 'bruteforce_check', $m4is_yxeh, $this->m4is_j8_gr(), [ 'style' => 'width:250px;', 'help_id' => 0 ] );
 if ($_SERVER['REMOTE_ADDR'] == '71.92.64.210') { m4is_wr40w::m4is_hd8p( 'Persistent Login', 'persistent_login', 0000, m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'persistent_login', 0) );
 } echo '</ul>';
 } private 
function m4is_e37vp() { $m4is_wy2gq = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'login_log', 0 );
 $m4is_s5a_x = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'login_log_length', 0 );
 $m4is_e364_ = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'last_login_field', '' );
 $m4is_r10h = $this->m4is__f89();
 echo '<hr>';
 echo '<h3>Login Logging</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_hd8p( 'Login Log', 'login_log', 1187, $m4is_wy2gq );
 m4is_wr40w::m4is_ze6b( 'Login Log Retention (Days)', 'login_log_length', $m4is_s5a_x, ['help_id' => 0000] );
 m4is_wr40w::m4is_uftpvx( 'Last Login Date Field', 'last_login_field', $m4is_e364_, $m4is_r10h, [ 'help_id' => 1173 ] );
 echo '</ul>';
 } private 
function m4is_bzr7t() { $m4is_ifcyq3 = m4is_tvc2xn::m4is__p09();
 $m4is_r8curx = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'login_url', 0 );
 $m4is_x1oayh = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'login_actionset', 0 );
 $m4is_ctsx = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'login_tag', 0 );
 $m4is_a_ye1h = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'disable_displayname_update', 0 );
 $m4is_zqac9 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'enable_slug_update', 0 );
 $m4is_qwaze = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'displayname_format', '' );
 $m4is_cqad = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'disable_login_sync', 0 );
 echo '<hr>';
 echo '<h3>Login Actions</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_mz70( 'Login Page <strong style="color:red;">(Caution)</strong>', 'login_url', $m4is_r8curx, 'pagelistdropdown', [ 'help_id' => 1208 ] );
 m4is_wr40w::m4is_hd8p( 'Disable Display Name Update', 'disable_displayname_update', 9634, $m4is_a_ye1h );
 m4is_wr40w::m4is_q_7l( 'Display Name Format', 'displayname_format', $m4is_qwaze, ['help_id' => 5731] );
 m4is_wr40w::m4is_hd8p( 'Enable User URL Slug Update', 'enable_slug_update', 21857, $m4is_zqac9 );
  m4is_wr40w::m4is_mz70( 'Login Tag', 'login_tag', $m4is_ctsx, 'taglistdropdown', [ 'help_id' => 000 ] );
 if ( $m4is_ifcyq3 ) { m4is_wr40w::m4is_mz70( 'Login Actionset', 'login_actionset', $m4is_x1oayh, 'actionsetdropdown', [ 'help_id' => 1175 ] );
 } if ( true ) { m4is_wr40w::m4is_hd8p( 'Disable Login Sync/Actions', 'disable_login_sync', 0, $m4is_cqad );
 } echo '</ul>';
 } private 
function m4is_xovqkz() { $m4is_ifcyq3 = m4is_tvc2xn::m4is__p09();
 $m4is_oy26aw = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'autologout_time', 0 );
 $m4is_lglp = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'logout_actionset', 0 );
 echo '<hr>';
 echo '<h3>Logout Actions</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_ze6b( 'Autologout/Inactivity Timer (Seconds)', 'autologout_time', $m4is_oy26aw, [ 'help_id' => 7688, 'max' => 86400, 'min' => 0, 'size' => 3, 'style' => 'text-align:right;width:80px;', ] );
 if ( $m4is_ifcyq3 ) { m4is_wr40w::m4is_mz70( 'Logout Actionset', 'logout_actionset', $m4is_lglp, 'actionsetdropdown', ['help_id' => 1178] );
 } echo '</ul>';
 echo '<hr>';
 } private 
function m4is_z3s06t() { $m4is_niyk = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'first_login_page', 0 );
 $m4is_jgoksv = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'allow_autologin', 0 );
 $m4is_pxu_6 = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'autologin_authkeys', '' );
 echo '<h3>Auto-Login Settings</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_hd8p( 'Allow Autologin', 'allow_autologin', 4398, $m4is_jgoksv );
 if ( ! $m4is_jgoksv ) { return;
 } m4is_wr40w::m4is_mz70( 'Autologin First Login Page', 'first_login_page', $m4is_niyk, 'pagelistdropdown', [ 'help_id' => 9670 ] );
 m4is_wr40w::m4is_q_7l( 'Autologin Auth Keys', 'autologin_authkeys', $m4is_pxu_6, [ 'help_id' => 2571, 'style' => 'text-align:left;width:350px;' ] );
 echo '<hr>';
 echo '</ul>';
 } private 
function m4is__f89() { $m4is_ilv6b = m4is_a8iaym::m4is_e_prox( m4is_a8iaym::CONTACT_FIELDS, m4is_a8iaym::DATE_TYPE );
 $m4is_bphlso = m4is_a8iaym::m4is_e_prox( m4is_a8iaym::CONTACT_FIELDS, m4is_a8iaym::DATETIME_TYPE );
 $m4is_hpn9y = array_merge( $m4is_ilv6b, $m4is_bphlso );
 $m4is_wov2 = [];
 $m4is_wov2[''] = '(None)';
 foreach( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_wov2[$m4is_ke_fr] = $m4is_ke_fr;
 } return $m4is_wov2;
 } private 
function m4is_j8_gr() { return [ '0' => 'Disabled', '1' => 'Basic (Cache Friendly)', '2' => 'Maximum' ];
 } private 
function m4is_s31r() { $m4is_r36qyu = $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'min_password_length', 6 );
 $m4is_dcf_7 = $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'password_field', 'Password' );
 if ( ! $m4is_r36qyu ) { echo '<p"><strong style="color:darkred;">RECOMMENDATION:</strong> Passwords are stored insecurely in Keap.  Turn on "Secure Passwords" below to only use encrypted passwords.</p>';
 } if ( $m4is_dcf_7 == 'Password') { echo '<p"><strong style="color:darkred;">RECOMMENDATION:</strong>  Using the default "Password" field may increase your API requirements.  We recommend using a custom field instead..</p>';
 echo '<p"><strong style="color:darkred;">WARNING:</strong>  Passwords are limited to 20 characters due to using the built-in "Password" field.</p>';
 } } private 
function m4is_gj768() { $m4is_powbq2 = $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'username_field', 'Email' );
 $m4is_h_gaj = '';
 $m4is_uca_ = 1;
 $m4is_qozrv = [ 'Email', ];
 if ( $m4is_powbq2 <> 'Email' ) { $m4is_qozrv[] = $m4is_powbq2;
 } foreach( $m4is_qozrv as $m4is_g0wy ) { $m4is_h_gaj .= "<option value='{$m4is_g0wy}' " . ( ($m4is_g0wy == $m4is_powbq2 ) ? ' selected="selected" ' : '' ) . ">{$m4is_g0wy}</option>";
 } $m4is_uca_ = count($m4is_qozrv);
 if ( $m4is_uca_ > 1 ) { echo '<li><label>Keap Username Field</label>';
 echo '<select id="username_field" name="username_field" class="basic-single" style="width:250px;">';
 echo $m4is_h_gaj;
 echo '</select>', m4is_wr40w::m4is_vgnp(1169 ), '</li>';
 } }   private 
function m4is_z6v2sd() : array { $m4is_w_8g = m4is_a8iaym::m4is_e_prox( m4is_a8iaym::CONTACT_FIELDS, m4is_a8iaym::TEXT_TYPE );
 $m4is_w_8g[] = 'Password';
 return $m4is_w_8g;
 } private 
function m4is_p7zgkt() { $m4is_wov2 = [ 0 => 'Simple Lowercase (Level 0)', 1 => '+ Uppercase Consonants (Level 1)', 2 => '+ Uppercase Vowels (Level 2)', 3 => '+ Numbers (Level 3)', 4 => '+ Symbols (Level 4)', ];
 if ( m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu( 'settings', 'password_field' ) !== 'Password' ) { $m4is_wov2[5] = '4 Word Passphrase';
 $m4is_wov2[6] = '5 Word Passphrase';
 } return $m4is_wov2;
 } }

