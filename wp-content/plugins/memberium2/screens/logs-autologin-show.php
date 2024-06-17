<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_nbnez_;
 final 
class m4is_nbnez_ { private $m4is_bnd6ti;
 private $m4is_zq0k;
 private $m4is_e2kg;
 private $m4is_bsy5;
 private $m4is_y_38pw;
 private $m4is_go9g;
 private $m4is_e06y;
 
function __construct() { $this->m4is_ju94();
 $this->m4is_atxsk();
 $this->m4is_lhapsi();
 }  private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $this->m4is_bsy5 = m4is__gu52::m4is_f_1z();
 $this->m4is_e2kg = empty( $_GET['contact_id'] ) ? 0 : (int) $_GET['contact_id'];
 $this->m4is_y_38pw = empty( $_GET['limit'] ) ? 10 : (int) $_GET['limit'];
 $this->m4is_go9g = empty( $_GET['search'] ) ? '' : trim($_GET['search'] );
 $this->m4is_e06y = empty( $_GET['start'] ) ? 0 : (int) $_GET['start'];
 } private 
function m4is_atxsk() { $m4is_hpn9y = $this->m4is_scm0();
 if ( ! is_array($m4is_hpn9y ) || empty($m4is_hpn9y ) ) { echo '<p>The Autologin log is empty.</p>';
 } else { $m4is_u5if = get_option( 'timezone_string' );
 $m4is_u5if = empty( $m4is_u5if ) ? 'UTC' : $m4is_u5if;
 $m4is_e59k2d = date_default_timezone_get();
 date_default_timezone_set( $m4is_u5if );
 echo <<<HTMLBLOCK
				<table class="widefat" style="table-layout:fixed">
				<tr>
				<td width="150">Time</td>
				<td width="100">Contact ID</td>
				<td>Results</td>
				</tr>
			HTMLBLOCK;
 foreach($m4is_hpn9y as $m4is_ke_fr ) { echo '<tr>';
 echo '<td>', date('Y-m-d H:i:s', $m4is_ke_fr['time'] ), '</td>';
 echo '<td>', $m4is_ke_fr['contactid'], '</td>';
 echo '<td style="word-wrap: break-word;">', nl2br($m4is_ke_fr['log'] ), '</td>';
 echo '</tr>';
 } echo '</table>';
 date_default_timezone_set($m4is_e59k2d );
 } }  private 
function m4is_scm0() { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `id`, UNIX_TIMESTAMP(`time`) AS `time`, `contactid`, `log` FROM %i WHERE `type` = 'autologin' AND `appname` = %s ", $this->m4is_bsy5, $this->m4is_zq0k );
 if ( $this->m4is_e2kg ) { $m4is_tovizk .= $wpdb->prepare( " AND `contactid` = %d ", $this->m4is_e2kg );
 } if ( $this->m4is_go9g ) { $m4is_tovizk .= " AND `log` LIKE '%" . $wpdb->esc_like( $this->m4is_go9g ) . "%' ";
 } $m4is_tovizk .= $wpdb->prepare( " ORDER BY `id` DESC LIMIT %d", $this->m4is_y_38pw );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_hpn9y;
 } private 
function m4is_lhapsi() { echo <<<HTMLBLOCK
			<form method="get" style="margin-top:12px;">
			<input type="hidden" name="page" value="memberium-logs">
			<input type="hidden" name="tab" value="autologin">
			Contact ID: <input type='text' name='contact_id' value='{$this->m4is_e2kg}' placeholder='Contact ID'>
			Search: <input type='text' name='search' value='{$this->m4is_go9g}' placeholder='Search'>
			Limit: <input type='text' name='limit' value='{$this->m4is_y_38pw}' placeholder='# Results'>
			<input type="submit" value="Search" class="button-primary" style="margin-left:15px;">
			</form>

			<form method="post">
			<input type="hidden" name="page" value="memberium-logs">
			<input type="hidden" name="tab" value="autologin">
			<p><input type="submit" name="delete_autologin" value="Delete Log" class="button delete"></p>
			</form>
		HTMLBLOCK;
 } }

