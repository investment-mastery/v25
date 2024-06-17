<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_tdhy::m4is_xexw();
 final 
class m4is_tdhy { private $m4is_bnd6ti;
 private $makepass_scheduled;
 static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ju94();
 $this->m4is_k_i3nb();
 $this->m4is_atxsk();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->makepass_scheduled = false;
 } private 
function m4is_k_i3nb() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } $m4is_hu76e = isset( $_POST['makepass_scan_size'] ) ? (int) $_POST['makepass_scan_size'] : 0;
 $m4is_o3do = isset( $_POST['makepass_scan_tag'] ) ? (int) $_POST['makepass_scan_tag'] : 0;
 $m4is_bb0a = isset( $_POST['makepass_success_actionset'] ) ? (int) $_POST['makepass_success_actionset'] : 0;
 $m4is_jt91 = isset( $_POST['makepass_success_tag'] ) ? (int) $_POST['makepass_success_tag'] : 0;
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is_hu76e, 'settings', 'makepass_scan_size' );
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is_o3do, 'settings', 'makepass_scan_tag' );
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is_bb0a, 'settings', 'makepass_success_actionset', );
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is_jt91, 'settings', 'makepass_success_tag', );
 m4is_wr40w::m4is_cxesuf('MakePass Scanner Options Updated.' );
 } 
function m4is_ddpirx() : array { $m4is_a51ew = function( $m4is_g0wy, $m4is_c5zg ) { if ( $m4is_g0wy > time() - 3600 ) { foreach( $m4is_g0wy as $k2 => $v2 ) { if ( $k2 == 'memberium/contacts/makepass_scan' ) { return true;
 } } } return false;
 };
 $m4is_ys6ud9 = get_option('cron', [] );
 return array_filter( $m4is_ys6ud9, $m4is_a51ew, ARRAY_FILTER_USE_BOTH );
 } 
function m4is_atxsk() { $m4is_olob = 'm4is_wr40w';
 $m4is_ys6ud9 = $this->m4is_ddpirx();
 if ( empty( $m4is_ys6ud9 ) ) { echo '<p><strong>Warning:</strong>  The MakePass Scanner process (WP CRON) is not running.  This service will reinstall each hour.</p>';
 } $m4is_hu76e = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_scan_size' );
 $m4is_o3do = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_scan_tag' );
 $m4is_bb0a = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_success_actionset' );
 $m4is_jt91 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'makepass_success_tag' );
 echo '<h3>Password Generation Scanner</h3>';
 echo '<p><strong style="color:red;">This tool is only recommended if you cannot reliably use HTTP POST to create users.</strong></p>';
 echo '<p>This tool is slower, and uses a large number of API calls to operate.</p>';
 echo '<ul>';
 $m4is_olob::m4is_mz70( 'Makepass Start Tag', 'makepass_scan_tag', $m4is_o3do, 'taglistdropdown', ['help_id' => 12526] );
 $m4is_olob::m4is_mz70( 'Makepass Complete Tag', 'makepass_success_tag', $m4is_jt91, 'taglistdropdown', ['help_id' => 12526] );
 $m4is_olob::m4is_mz70( 'Makepass Complete Actionset', 'makepass_success_actionset', $m4is_bb0a, 'actionsetdropdown', ['help_id' => 12526] );
 $m4is_olob::m4is_ze6b( 'Contacts Per Scan', 'makepass_scan_size', $m4is_hu76e, ['min' => 1, 'max' => 100, 'help_id' => 12526, 'style' => 'text-align:right;width:80px;'] );
 if ( $m4is_o3do && $m4is_hu76e ) { m4is_m_rh3::m4is_jdjyia();
 } echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 } }

