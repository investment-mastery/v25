<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_b3xbwf;
 
class m4is_b3xbwf { private $m4is_bnd6ti, $m4is_zq0k, $m4is_hpiwo9, $m4is_y_38pw, $m4is_b572w, $m4is_go9g, $m4is_e06y;
 
function __construct() { $this->m4is_x6wv();
 $this->m4is_wpg8ao();
 $this->m4is_fqhb();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $this->m4is_y_38pw = empty( $_GET['limit'] ) ? 5 : (int) trim( $_GET['limit'] );
 $this->m4is_e06y = empty( $_GET['start'] ) ? 0 : (int) trim( $_GET['start'] );
 $this->m4is_go9g = empty( $_GET['search'] ) ? '' : trim( $_GET['search'] );
 $this->m4is_hpiwo9 = empty( $_GET['ip'] ) ? '' : trim( $_GET['ip'] );
 $this->m4is_b572w = $this->m4is_hmen();
 } private 
function m4is_hmen() { global $wpdb;
 $m4is_dj_2 = m4is__gu52::m4is_f_1z();
 $m4is_nxge3 = [];
 $m4is_tevf6c = '';
 if ( ! empty( $this->m4is_hpiwo9 ) ) { $m4is_nxge3[] = " `ipaddress` LIKE '%" . $wpdb->esc_like( $this->m4is_hpiwo9 ) . "%' ";
 } if ( ! empty( $this->m4is_go9g ) ) { if ( is_numeric( $this->m4is_go9g ) ) { $m4is_nxge3[] = " `contactid` = '" . $wpdb->esc_like( (int) $this->m4is_go9g ) . "' OR `log` LIKE '%" . $wpdb->esc_like( $this->m4is_go9g ) . "%' ";
 } else { $m4is_nxge3[] = " `log` LIKE '%" . $wpdb->esc_like( $this->m4is_go9g ) . "%' ";
 } } if ( ! empty( $m4is_nxge3 ) ) { $m4is_tevf6c .= ' AND (' . implode( ' AND ', $m4is_nxge3 ) . ' )';
 } $m4is_tovizk = "SELECT UNIX_TIMESTAMP(`time`) as `time`, `ipaddress`, `contactid`, `log` FROM `{$m4is_dj_2}` WHERE `type` = 'loginfail' AND `appname` = '{$this->m4is_zq0k}' {$m4is_tevf6c} ORDER BY `id` DESC LIMIT {$this->m4is_y_38pw} ;";
 $m4is_hpn9y = $wpdb->get_results($m4is_tovizk, ARRAY_A );
 return $m4is_hpn9y;
 } private 
function m4is_wpg8ao() { $m4is_hpn9y = $this->m4is_b572w;
 if ( ! is_array( $this->m4is_b572w ) || empty( $this->m4is_b572w ) ) { if ( empty( $this->m4is_go9g ) && empty( $this->m4is_hpiwo9 ) ) { echo '<p>The Login Failure log is empty.</p>';
 } else { echo '<p>No login failure records were found matching your search.</p>';
 } } else { $m4is_u5if = get_option( 'timezone_string' );
 $m4is_u5if = empty( $m4is_u5if ) ? 'UTC' : $m4is_u5if;
 $m4is_e59k2d = date_default_timezone_get();
 date_default_timezone_set( $m4is_u5if );
 echo '<table class="widefat">';
 echo '<tr>';
 echo '<td width="175">Login Time</td>';
 echo '<td width="125">IP Address</td>';
 echo '<td width="100">Contact Id</td>';
 echo '<td>Log</td>';
 echo '</tr>';
 foreach ( $this->m4is_b572w as $m4is_ke_fr ) { echo '<tr>';
 printf( '<td>%s</td>', date( 'Y-m-d H:i:s', $m4is_ke_fr['time'] ) );
 printf( '<td>%s</td>', $m4is_ke_fr['ipaddress'] );
 printf( '<td>%s</td>', $m4is_ke_fr['contactid'] );
 printf( '<td>%s</td>', esc_html( $m4is_ke_fr['log'] ) );
 echo '</tr>';
 } echo '</table>';
 date_default_timezone_set( $m4is_e59k2d );
 } } private 
function m4is_fqhb() { echo '<form method="get" style="margin-top:12px;display:inline-block;">';
 echo '<input type="hidden" name="page" value="memberium-logs">';
 echo '<input type="hidden" name="tab" value="loginfail">';
 printf( "Search: <input type='text' name='search' value='%s' placeholder='Search'>  ", $this->m4is_go9g );
 printf( "IP Address: <input type='text' name='ip' value='%s' placeholder='IP Address'>  ",$this->m4is_hpiwo9 );
 printf( "Limit: <input type='text' name='limit' value='%s' placeholder='# Results'>  ", $this->m4is_y_38pw );
 echo '<input type="submit" value="Search" class="button-primary" style="margin-left:15px;">  ';
 echo '</form>';
 } }

