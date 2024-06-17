<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 
class m4is_zuis { static 
function m4is_xjg3ce() { $m4is_xpw0 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'default_reglink_tag');
 echo '<hr>';
 echo '<h3>Registration Link</h3>';
 m4is_wr40w::m4is_mz70('Default Registration Link Tag', 'default_reglink_tag', $m4is_xpw0, 'taglistdropdown', ['help_id' => 9289]);
 } static 
function m4is_a35b9w() { $m4is_up85 = stripslashes_deep( m4is_pms8y::m4is_e5l8a9()->get_i2sdk_options() );
 $m4is_xpw0 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'httppost_log');
 $m4is_y2qsn = empty($m4is_up85['http_post_key']) ? '' : $m4is_up85['http_post_key'];
 $m4is_h0sfm1 = array_filter(explode(',', $m4is_y2qsn) );
 $m4is_yzmj = count($m4is_h0sfm1);
 $m4is_m1hr = $m4is_h0sfm1[mt_rand(0, $m4is_yzmj -1)];
 $m4is_n6knez = get_site_url();
 echo '<hr>';
 echo '<h3>HTTP POST URLs</h3>';
 m4is_wr40w::m4is_hd8p('HTTP POST Log', 'httppost_log', 21923, $m4is_xpw0);
 m4is_wr40w::m4is_q_7l('HTTP POST Auth Keys', 'http_post_key', $m4is_y2qsn, ['help_id' => 3699, 'disabled' => true, 'style' => 'text-align:left;width:350px;']);
 echo '<p style="margin-left:25px;">For all provided links below, please verify the http/https in your links match the actual URL of your site.</p>';
 if ($m4is_yzmj > 0) { $m4is_imdo6 = $m4is_n6knez . '/?operation=contact-update&auth_key=' . urlencode($m4is_m1hr );
 echo '<p style="margin-left:25px;"><b>Update Contact Example:</b> <input type="text" value="' . $m4is_imdo6 . '" size="100">';
 echo m4is_wr40w::m4is_vgnp(0617);
 $m4is_imdo6 = $m4is_n6knez . '/?operation=makepass&auth_key=' . urlencode($m4is_m1hr );
 echo '<p style="margin-left:25px;"><b>Password Generator Example:</b> <input type="text" value="' . $m4is_imdo6 . '" size="100">';
 echo m4is_wr40w::m4is_vgnp(0613);
 $m4is_imdo6 = $m4is_n6knez . '/?operation=contact-delete&auth_key=' . urlencode($m4is_m1hr );
 echo '<p style="margin-left:25px;"><b style="color:red;">Delete User Example:</b> <input type="text" value="' . $m4is_imdo6 . '" size="100">';
 } else { echo '<p><b>Please create your Auth key in the i2SDK to enable functionality.</b></p>';
 } } static 
function m4is_yql6() { $m4is_jgoksv = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'allow_autologin');
 $m4is_powbq2 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'username_field');
 echo '<hr>', '<h3>Autologin URLs</h3>', '<div style="margin-left:25px">';
 if ($m4is_jgoksv) { $m4is_h0sfm1 = array_filter(explode(',', m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'autologin_authkeys') ) );
 $m4is_yzmj = count($m4is_h0sfm1);
 if ($m4is_yzmj) { $m4is_yr0_ = m4is_wr40w::m4is_vgnp(363);
 $m4is_n6knez = get_site_url();
 $m4is_m1hr = urlencode($m4is_h0sfm1[mt_rand(0, $m4is_yzmj - 1)]);
 $m4is_xomr = "{$m4is_n6knez}/?memb_autologin=yes&auth_key={$m4is_m1hr}&Id=~Contact.Id~&{$m4is_powbq2}=~Contact.Email~&redir=/your-page/";
 $m4is_fhdw0 = "{$m4is_n6knez}/?memb_autologin=yes&auth_key={$m4is_m1hr}&forcelogin=1&redir=/your-page/";
 echo "<p>For all provided links below, please verify the http/https in your links match the actual URL of your site. {$m4is_yr0_}</p>";
 echo '<p><b>Email Autologin Example:</b> <input type="text" value="' . $m4is_xomr . '" size="80"></p>';
 echo '<p><b>Order Form Autologin Example:</b> <input type="text" value="' . $m4is_fhdw0 . '" size="80"></p>';
 } else { echo '<p><b>Please create your Auth keys to enable functionality.</b></p>';
 } } else { echo '<p>Autologin Disabled</p>';
 } echo '</div>';
 } static 
function m4is_og9q5() { $m4is_h0sfm1 = array_filter(explode(',', m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'autologin_authkeys') ) );
 $m4is_n6knez = get_site_url();
 $m4is_yr0_ = m4is_wr40w::m4is_vgnp(16681, $m4is_knyw0 = 'What\'s this?');
 echo '<hr />';
 echo '<h3>New User Confirmation Links</h3>';
 echo '<p style="margin-left:25px;">For all provided links below, please verify the http/https in your links match the actual URL of your site. ', $m4is_yr0_, '</p>';
 foreach ($m4is_h0sfm1 as $m4is_m1hr ) { $m4is_imdo6 = "{$m4is_n6knez}/?action=confirmregistration&authkey={$m4is_m1hr}&email=~Contact.Email~&cid=~Contact.Id~";
 echo '<div style="margin-left:25px">';
 echo '<p><strong>Confirmation Link Example:</strong> <input type="text" value="' . $m4is_imdo6 . '" size="80"></p>';
 echo '</div>';
 } } static 
function m4is_u348() { $m4is_dcf_7 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'password_field');
 $m4is_knyw0 = "Password:  <input id='Contact0{$m4is_dcf_7}' name='Contact0{$m4is_dcf_7}' type='password' class='regula-validation' data-constraints='@Required(label=&quot;Your Password&quot;, groups=[customer])' /><br /><br />";
 $m4is_yr0_ = m4is_wr40w::m4is_vgnp(21931);
 if ($m4is_dcf_7 <> 'Password' ) { echo '<hr />';
 echo '<h3>Order Form Password HTML</h3>', '<div style="margin-left:25px">', $m4is_yr0_, '<p><strong>Order Form Password Field:</strong>', '<input type="text" name="" id="" size="80" value="', htmlentities($m4is_knyw0 ), '"></p>', '</div>';
 } } static 
function m4is_gm1n() { echo '<ul>';
 echo '<form method="POST" action="">';
 wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), 'memberium_options_nonce' );
 m4is_zuis::m4is_xjg3ce();
 m4is_zuis::m4is_a35b9w();
 m4is_zuis::m4is_yql6();
 m4is_zuis::m4is_og9q5();
 m4is_zuis::m4is_u348();
 echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 m4is_pms8y::m4is_e5l8a9()->m4is_q285('view_http_post' );
 } private 
function __construct() {} } m4is_zuis::m4is_gm1n();

