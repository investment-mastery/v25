<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_kt3p::m4is_e5l8a9();
 final 
class m4is_kt3p { private $m4is_bnd6ti;
 private $m4is_w2w8;
 public static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ju94();
 $this->m4is_gm1n();
 } 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_w2w8 = 'settings';
 } private 
function m4is_gm1n() { echo <<<HTMLBLOCK
			<form method="POST" action="">
		HTMLBLOCK;
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce' );
 $this->m4is_b8msd();
 $this->m4is_k4kj6();
 $this->m4is_jjkot6();
 $this->m4is_j13rnq();
 $this->m4is_n_phz();
 echo <<<HTMLBLOCK
			<p><input type="submit" value="Update" class="button-primary"></p>
			</form>
		HTMLBLOCK;
 $this->m4is_slbg6();
 } private 
function m4is_b8msd() { $m4is_awpz7 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'allow_wpadmin', 'manage_options' );
 $m4is_vedpu = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'attachment_pages', 0 );
 $m4is_br_kby = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'protect_feeds', 0 );
 $m4is_lxh8 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'disable_xframe', 0 );
 $m4is_f70z = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'allow_wpadmin_dashboard', 'manage_options' );
 $m4is_p3gz_2 = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'allow_wpadmin_titlebar', 'manage_options' );
 echo '<h3>Site Restrictions</h3>';
 echo '<ul>';
 if ( empty( $m4is_f70z ) ) { m4is_wr40w::m4is_hd8p( 'Allow Access to WP Dashboard', 'allow_wpadmin', 1192, $m4is_awpz7 );
 } m4is_wr40w::m4is_mz70( 'Allow WP Admin Dashboard', 'allow_wpadmin_dashboard', $m4is_f70z, 'capabilitylistdropdown', ['style' => 'width:400px !important;', 'multiple' => 'multiple', 'help_id' => 1192] );
 m4is_wr40w::m4is_mz70( 'Show Titlebar', 'allow_wpadmin_titlebar', $m4is_p3gz_2, 'capabilitylistdropdown', ['style' => 'width:400px !important;', 'multiple' => 'multiple', 'help_id' => 21894]);
 m4is_wr40w::m4is_hd8p( 'Disable Attachment Pages', 'attachment_pages', 17276, $m4is_vedpu );
 m4is_wr40w::m4is_hd8p( 'Disable RSS Feeds', 'protect_feeds', 1214, $m4is_br_kby );
 m4is_wr40w::m4is_hd8p( 'Disable Clickjacking Protection', 'disable_xframe', 26493, $m4is_lxh8 );
 echo '</ul>';
 echo '<hr>';
 } private 
function m4is_k4kj6() { $m4is_quh_ = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'show_post_columns', true );
 echo '<h3>Page Handling</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_hd8p( 'Show All Columns in Post List', 'show_post_columns', 13294, $m4is_quh_ );
 echo '</ul>';
 echo '<hr>';
 } private 
function m4is_jjkot6() { $m4is_pwyi = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'registration_url', 0 );
 $m4is_d0ju = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'new_user_registration_tag', 0 );
 $m4is_ptp26 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'sync_new_wp_users', 0 );
 $m4is_pp83yw = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'extended_reg_fields', 0 );
 echo '<h3>New User Registration</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_mz70('Registration Page', 'registration_url', $m4is_pwyi, 'pagelistdropdown', ['help_id' => 1211, 'style' => 'width:400px !important;'] );
 m4is_wr40w::m4is_mz70('New User Registration Tag', 'new_user_registration_tag', $m4is_d0ju, 'taglistdropdown', ['help_id' => 1181, 'style' => 'width:400px !important;'] );
 m4is_wr40w::m4is_hd8p('Sync New Registrations to Keap', 'sync_new_wp_users', 21903, $m4is_ptp26 );
 m4is_wr40w::m4is_hd8p('Extended Registration Fields', 'extended_reg_fields', 21908, $m4is_pp83yw );
 echo '</ul>';
 } private 
function m4is_slbg6() { $m4is_coej7 = m4is_q1zh2::get_instance()->m4is_vp83();
 echo '<script>';
 echo 'var capabilitylist = ', $m4is_coej7, ';';
 echo '</script>';
 } private 
function m4is_j13rnq() { $m4is_z3blx = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'recaptcha_v2', 0 );
 $m4is_go7q = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'recaptcha_v2_site_key', '' );
 $m4is_lfgj = (string) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'recaptcha_v2_secret_key', '' );
 echo '<hr />';
 echo '<h3>reCAPTCHA v2</h3>';
 echo '<ul>';
 m4is_wr40w::m4is_hd8p( 'Enable reCAPTCHA v2', 'recaptcha_v2', 0, $m4is_z3blx );
 m4is_wr40w::m4is_q_7l( 'Site Key', 'recaptcha_v2_site_key', $m4is_go7q, [ 'help_id' => 0, 'style' => 'text-align:left;width:400px !important' ] );
 m4is_wr40w::m4is_q_7l( 'Secret Key', 'recaptcha_v2_secret_key', $m4is_lfgj, [ 'help_id' => 0, 'style' => 'text-align:left;width:400px !important;' ] );
 echo '</ul>';
 } private 
function m4is_n_phz() { echo '<hr>';
 echo '<h3>Secure Debug</h3>';
 $m4is_k4yeul = [ 'label' => 'Debug IP Addresses', 'value' => (string) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'debug_ip', '' ), 'style' => 'width:375px;', 'help_id' => 0000, 'placeholder' => 'Comma separated list of IP addresses', 'help_text' => null,  ];
 m4is_wr40w::m4is_ymnfe7( 'debug_ip', $m4is_k4yeul ) ;
 } }

