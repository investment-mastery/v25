<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_aca2h::m4is_xexw();
 final 
class m4is_aca2h { private $m4is_bnd6ti;
 private $m4is_zq0k;
 private $m4is_lv7wu;
 private $m4is_y_38pw;
 private $m4is_e06y;
 private $m4is_gai6k;
 static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } 
function __construct() { $this->m4is_ju94();
 $this->m4is_v0uw();
 $this->m4is_edt9i();
 $this->m4is_lhapsi();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr( 'appname' );
 $this->m4is_lv7wu = '';
 $this->m4is_y_38pw = 15;
 $this->m4is_e06y = 0;
 $this->m4is_gai6k = '';
 } private 
function m4is_v0uw() { $this->m4is_lv7wu = empty( $_GET['ip'] ) ? '' : trim( $_GET['ip'] );
 $this->m4is_y_38pw = empty( $_GET['limit'] ) ? 15 : (int) trim( $_GET['limit'] );
 $this->m4is_e06y = empty( $_GET['start'] ) ? 0 : (int) trim( $_GET['start'] );
 $this->m4is_gai6k = empty( $_GET['name'] ) ? '' : strtolower( trim ( $_GET['name'] ) );
 } private 
function m4is_scm0() { global $wpdb;
 $m4is_tovizk = "SELECT `logintime`, `ipaddress`, `username` FROM %i WHERE `appname` = %s ";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, m4is_ypvg9::m4is_hjqcz2(), $this->m4is_zq0k );
 if ( ! empty( $this->m4is_gai6k ) ) { $m4is_tovizk .= " AND `username` LIKE '%" . $wpdb->esc_like( $this->m4is_gai6k ) . "%' ";
;
 } if ( ! empty( $this->m4is_lv7wu ) ) { $m4is_tovizk .= " AND `ipaddress` LIKE '%" . $wpdb->esc_like( $this->m4is_lv7wu ) . "%' ";
 } $m4is_tovizk .= $wpdb->prepare( " ORDER BY `id` DESC LIMIT %d, %d", $this->m4is_e06y, $this->m4is_y_38pw );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_hpn9y;
 } private 
function m4is_edt9i() { $m4is_hpn9y = $this->m4is_scm0();
 if (! is_array($m4is_hpn9y ) || empty($m4is_hpn9y ) ) { echo '<p>The login log is empty.</p>';
 } else { $m4is_ahc2fb = [];
 $m4is_u5if = get_option('timezone_string');
 $m4is_e59k2d = date_default_timezone_get();
 if (! empty($m4is_u5if) ) { date_default_timezone_set($m4is_u5if );
 } echo '<table class="widefat">';
 echo '<tr>';
 echo '<td width="150">Login Time</td>';
 echo '<td width="125">IP Address</td>';
 echo '<td>Username</td>';
 echo '<td>Location</td>';
 echo '</tr>';
 foreach($m4is_hpn9y as $m4is_ke_fr ) { $m4is_tmk3i = $m4is_ke_fr['ipaddress'];
 if (! isset($m4is_ahc2fb[$m4is_tmk3i] ) ) { $m4is_ahc2fb[$m4is_tmk3i] = m4is_sg9i6::m4is_on8t($m4is_tmk3i );
 } echo '<tr>';
 echo '<td>', date('Y-m-d H:i:s', $m4is_ke_fr['logintime'] ), '</td>';
 echo '<td><a href="https://geoiptool.com/en/?ip=' . $m4is_ke_fr['ipaddress'] . '" target="geoip">', $m4is_ke_fr['ipaddress'], '</a></td>';
 echo '<td>', $m4is_ke_fr['username'], '</td>';
 echo '<td>';
 if (! empty($m4is_ahc2fb[$m4is_tmk3i]['latitude'] ) ) { echo '<a target="map" href="https://www.google.com.au/maps/@', $m4is_ahc2fb[$m4is_tmk3i]['latitude'], ',', $m4is_ahc2fb[$m4is_tmk3i]['longitude'], ',13z">';
 echo '<em class="fa fa-map-marker"></em> ';
 echo '</a>&nbsp;';
 } if (isset($m4is_ahc2fb[$m4is_tmk3i] ) && is_array($m4is_ahc2fb[$m4is_tmk3i] ) ) { if (isset($m4is_ahc2fb[$m4is_tmk3i]['city'] ) ) { echo $m4is_ahc2fb[$m4is_tmk3i]['city'], ', ', $m4is_ahc2fb[$m4is_tmk3i]['region_name'], ' ', $m4is_ahc2fb[$m4is_tmk3i]['country_name'];
 } } else { echo '<em>Unknown</em>';
 } echo '</td>';
 echo '</tr>';
 } date_default_timezone_set($m4is_e59k2d );
 echo '</table>';
 } } private 
function m4is_lhapsi() { echo <<<HTMLBLOCK
			<form method="get" style="margin-top:12px;display:inline-block;">
				<input type="hidden" name="page" value="memberium-logs">
				Username: <input type='text' name='name' value='{$this->m4is_gai6k}' placeholder='Username'>"
				IP Address: <input type='text' name='ip' value='{$this->m4is_lv7wu}' placeholder='IP Address'>
				Limit: <input type='text' name='limit' value='{$this->m4is_y_38pw}' placeholder='# Results'>
				<input type="submit" value="Search" class="button-primary" style="margin-left:15px;">
			</form>

			<form method="post" style="margin-top:10px;">
				<input type="hidden" name="page" value="memberium-logs">
				<input type="hidden" name="tab" value="login">
				<input type="submit" name="delete_login_log" value="Delete Log" class="button delete">
			</form>
		HTMLBLOCK;
 } }

