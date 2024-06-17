<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_i9md;
 final 
class m4is_i9md { private $m4is_bnd6ti, $m4is_f2y3n, $m4is_ie9q70, $m4is_w2w8, $m4is_q2icln, $m4is_ooiw, $m4is_l2qnzu, $m4is_psp1ka;
 
function __construct() { $this->m4is_x6wv();
 $this->m4is_gm1n();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_w2w8 = 'settings';
 $this->m4is_psp1ka = m4is_u68pu::m4is_u26m8u( ['unlimited'] );
 $this->m4is_ooiw = m4is_u68pu::m4is_u26m8u( ['trial'] );
 $this->m4is_f2y3n = m4is_u68pu::m4is_u26m8u( ['domain', 'unlimited', 'icc', 'qatest'] );
 $this->m4is_q2icln = [ 'style' => 'text-align:right;width:80px;' ];
 $this->m4is_ie9q70 = [ 'min' => 0 ];
 $this->m4is_l2qnzu = [ 'units' => 'seconds' ];
 } private 
function m4is_gm1n() { echo '<form method="POST" action="">';
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce' );
 $this->m4is_neku();
 $this->m4is_z3fq();
 $this->m4is_a20g();
 $this->m4is_zabjdw();
 $this->m4is_p3h7();
 echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 } private 
function m4is_neku() { $m4is_cqad = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'disable_login_sync', 0 );
 $m4is_du_v = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'max_contact_age', 0 );
 $m4is_qaei34 = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'max_affiliate_age', 0 );
 $m4is_uln6ax = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'session_timeout', 0 );
 echo '<ul>';
 echo '<h3>Cache Tuning</h3>';
 m4is_wr40w::m4is_hd8p( 'Disable Login Sync/Actions', 'disable_login_sync', 0, $m4is_cqad );
 m4is_wr40w::m4is_ze6b( 'Maximum Contact Cache Age', 'max_contact_age', $m4is_du_v, [ 'help_id' => 1189, $this->m4is_ie9q70, $this->m4is_q2icln, $this->m4is_l2qnzu ] );
 m4is_wr40w::m4is_ze6b( 'Maximum Affiliate Cache Age', 'max_affiliate_age', $m4is_qaei34, [ 'help_id' => 21913, $this->m4is_ie9q70, $this->m4is_q2icln, $this->m4is_l2qnzu, ] );
 m4is_wr40w::m4is_ze6b( 'Session Inactivity Timeout', 'session_timeout', $m4is_uln6ax, [ 'help_id' => 1200, $this->m4is_ie9q70, $this->m4is_q2icln, $this->m4is_l2qnzu, ] );
 echo '<hr>';
 } private 
function m4is_z3fq() { $m4is_j3f8jr = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'async_limit', 0 );
 $m4is_l_8hew = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'async_tag', 0 );
 echo '<h3>Background Sync</h3>';
 $m4is_k4yeul = [ 'min' => 0, 'max' => 1000, 'help_id' => 0, 'disabled' => (int) ! $this->m4is_psp1ka, $this->m4is_q2icln, $this->m4is_l2qnzu ];
 m4is_wr40w::m4is_ze6b( 'Sync Size (Pro+)', 'async_limit', $m4is_j3f8jr, $m4is_k4yeul );
 $m4is_k4yeul = [ 'help_id' => 0, 'disabled' => (int) ! $this->m4is_psp1ka, ];
 m4is_wr40w::m4is_mz70( 'Sync Tag (Pro+)', 'async_tag', $m4is_l_8hew, 'taglistdropdown', $m4is_k4yeul );
 echo '<hr>';
 } private 
function m4is_a20g() { $m4is_wh9g = defined( 'I2SDK_VERSION' ) && ( I2SDK_VERSION < 4 );
 $m4is_hvrc = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'fast_user_list', 0 );
 $m4is_l4yl = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'plaintext_db', 0 );
 $m4is_tk65_ = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'beta/oauth', 0 );
 echo '<h3>Misc Settings</h3>';
 if ( $this->m4is_psp1ka ) { m4is_wr40w::m4is_hd8p( 'Fast User List (Pro+)', 'fast_user_list', 22093, $m4is_hvrc );
 } m4is_wr40w::m4is_hd8p( 'Remove Accented Characters', 'plaintext_db', 13296, $m4is_l4yl );
 if ( $m4is_wh9g ) { echo '<p style="color:red;font-weight:bold;">i2SDK plugin Detected.  Please deactivate the i2SDK plugin.</p>';
 } else { if ( $this->m4is_f2y3n ) { echo '<hr>';
 echo '<h3>Keap Connection</h3>';
 m4is_wr40w::m4is_hd8p( '<strong style="color:red;">Oauth2 API</strong>', 'beta/oauth', 0, $m4is_tk65_ );
 } } echo '<hr>';
 } private 
function m4is_zabjdw() { $m4is_f58g = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_affiliate', 0 );
 $m4is_d213h = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_tag_details', 0 );
 $m4is_z75a = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_ecommerce', 0 );
 $m4is_c_m6p = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_meta_updates', 0 );
 echo '<h3>Login-Time Synchronization</h3>';
 echo '<p>Please review the online documentation, or contact support <em>before</em> activating these features.</p>';
 m4is_wr40w::m4is_hd8p( 'Synchronize Affiliate Records', 'sync_affiliate', 2686, $m4is_f58g );
 m4is_wr40w::m4is_hd8p( 'Synchronize Tag Dates', 'sync_tag_details', 4038, $m4is_d213h );
 m4is_wr40w::m4is_hd8p( 'Synchronize eCommerce Records', 'sync_ecommerce', 2689, $m4is_z75a );
 m4is_wr40w::m4is_hd8p( 'Sync Meta Updates', 'sync_meta_updates', 19152, $m4is_c_m6p );
 echo '<hr>';
 } private 
function m4is_p3h7() { $m4is_kj9g30 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'microcache_compat_session', 0 );
 $m4is_uru4o = (bool) $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'db_sessions', 0 );
 echo '<h3>Session Management</h3>';
 m4is_wr40w::m4is_hd8p( 'MicroCache Compatible Sessions', 'microcache_compat_session', 9641, $m4is_kj9g30 );
 m4is_wr40w::m4is_hd8p( 'Database Backed Sessions', 'db_sessions', 0, $m4is_uru4o );
 echo '<hr>';
 } }

