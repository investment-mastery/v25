<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_ew9p::m4is_xexw();
 
class m4is_ew9p { private $m4is_x28h6 = [], $m4is_a5gte = [];
 static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_x6wv();
 $this->m4is_k_i3nb();
 $this->m4is_vf8x30();
 $this->m4is_lo38du();
 } private 
function m4is_x6wv() { $this->m4is_a5gte = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 $this->m4is_x28h6 = $this->m4is_b9p8g( get_option( 'memberium_xprofile_map', [] ) );
 }  private 
function m4is_b9p8g( $m4is_jxhf ) {  $m4is_jxhf = array_filter( $m4is_jxhf );
  foreach( $m4is_jxhf as $m4is_qy5ql => $m4is_vxhqe ) { if ( ! array_key_exists( $m4is_qy5ql, $m4is_jxhf ) ) { unset( $m4is_jxhf[ $m4is_qy5ql ] );
 } }  foreach( $m4is_jxhf as $m4is_qy5ql => $m4is_vxhqe ) { if ( ! in_array( $m4is_vxhqe, $m4is_jxhf ) ) { unset( $m4is_jxhf[ $m4is_qy5ql ] );
 } } foreach( $m4is_jxhf as $m4is_qy5ql => $m4is_vxhqe ) { if ( empty( $m4is_qy5ql ) || empty ($m4is_vxhqe ) ) { unset( $m4is_jxhf[$m4is_qy5ql] );
 } } return $m4is_jxhf;
 } private 
function m4is_k_i3nb() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } $m4is_rvs7bp = isset( $_POST['xprofile_map_delete'] ) && is_array( $_POST['xprofile_map_delete'] ) ? $_POST['xprofile_map_delete'] : [];
 $m4is_m3qa8g = isset( $_POST['new_keap_map'] ) ? $_POST['new_keap_map'] : '';
 $m4is_muyjw5 = (int) isset( $_POST['new_xprofile_map'] ) ? $_POST['new_xprofile_map'] : '';
 foreach ( $m4is_rvs7bp as $m4is_mh9l => $m4is_vxhqe ) { unset( $this->m4is_x28h6[$m4is_mh9l] );
 } if ( $m4is_m3qa8g && $m4is_muyjw5 ) { $this->m4is_x28h6[$m4is_m3qa8g] = $m4is_muyjw5;
 } update_option( 'memberium_xprofile_map', $this->m4is_x28h6 );
 } private 
function m4is_wydelc() { global $wpdb;
 static $m4is_ibev = null;
 if ( is_null( $m4is_ibev ) ) {  $m4is_ao3p = buddypress();
 $m4is_ibev = [];
 $m4is_tovizk = "SELECT `id`, `name` FROM `{$m4is_ao3p->profile->table_name_fields}` WHERE 1 ";
 $m4is_oa_z = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 foreach ( $m4is_oa_z as $m4is_ke_fr ) { $m4is_ibev[ $m4is_ke_fr['id'] ] = $m4is_ke_fr['name'];
 } } return $m4is_ibev;
 } private 
function m4is_h58r() { echo '</table>';
 echo '<p><input type="submit" name="save" value="Save BuddyPress Field Sync" class="button-primary" /></p>';
 echo '</form>';
 echo '</div>';
 } private 
function m4is_ojvd() { echo '<div class="wrap">';
 echo '<form method="POST" action="">';
 echo '<input type="hidden" name="formtype" value="', $_GET['tab'], '">';
 wp_nonce_field(__FILE__);
 echo '<table class="widefat">';
 echo '<thead><tr></td><th>Keap Field</th><th>BuddyPress XProfile Field</th><th style="width:150px;"></th></tr></thead>';
 } private 
function m4is_vf8x30() { $m4is_ibev = $this->m4is_wydelc();
 $this->m4is_ojvd();
 foreach ($this->m4is_a5gte as $m4is_cpns ) { $m4is_w_o7al = empty( $this->m4is_x28h6[$m4is_cpns] ) ? 0 : $this->m4is_x28h6[$m4is_cpns];
 if ( $m4is_w_o7al ) { echo '<tr>';
 echo '<td style="width:300px;">', $m4is_cpns, '</td>';
 echo '<td>';
  echo '<input disabled type="text" value="', $m4is_ibev[ $m4is_w_o7al ], '" style="width:300px;">';
 echo '</td>';
 echo '<td><input type=submit name="xprofile_map_delete[', $m4is_cpns, ']" value="Remove" class="submitdelete"></td>';
 echo '</tr>';
 } } $this->m4is_t9_f();
 $this->m4is_h58r();
 } private 
function m4is_t9_f() { $m4is_gj0ivy = '';
 foreach( $this->m4is_a5gte as $m4is_mh9l ) { if ( ! array_key_exists( $m4is_mh9l, $this->m4is_x28h6 ) ) { $m4is_gj0ivy .= '<option value="' . $m4is_mh9l . '">' . $m4is_mh9l . '</option>';
 } } echo '<tr style="margin-top:20px;">';
 echo '<td>';
 echo '<select name="new_keap_map" class="basic-single" style="margin-right: 20px">', $m4is_gj0ivy, '</select>';
 echo '</td>';
 echo '<td>';
 echo '<select name="new_xprofile_map" class="requiredtaglistdropdown"></select>';
 echo '</td>';
 echo '<td></td>';
 echo '</tr>';
 } private 
function m4is_lo38du() { $m4is_ibev = $this->m4is_wydelc();
 if (! empty($m4is_ibev ) ) {  $m4is_i1pv0[] = [ 'id' => 0, 'text' => '(Don\'t Sync)' ];
 foreach ( (array) $m4is_ibev as $m4is_j5sy07 => $m4is_yxwn ) { if ( ! in_array( $m4is_j5sy07, $this->m4is_x28h6 ) ) { $m4is_i1pv0[] = [ 'id' => $m4is_j5sy07, 'text' => $m4is_yxwn ];
 } } $m4is_i1pv0 = json_encode($m4is_i1pv0 );
 unset($m4is_iystd2, $m4is_j5sy07, $m4is_mpia );
 echo '<script>';
 echo 'var requiredtaglist      = ', $m4is_i1pv0, ';';
 echo '</script>';
 unset($m4is_i1pv0 );
 } } }

