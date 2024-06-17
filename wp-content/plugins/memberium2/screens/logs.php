<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_q8gr;
 
class m4is_q8gr { private $m4is_bnd6ti;
 private $m4is_k9vt;
 private $m4is_x_7a2;
 private $m4is_zc5zn;
 private $m4is_jwjgx;
 
function __construct() { $this->m4is_x6wv();
 $this->m4is_rgx_();
 m4is_wr40w::m4is_kj4sp();
 $this->m4is_ojvd();
 $this->m4is_m3mb();
 $this->m4is_h58r();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zc5zn = 'memberium/log_count';
 $this->m4is_x_7a2 = 'login';
 $this->m4is_jwjgx = [ 'login' => '<i class="fa fa-history"></i> Logins', 'loginfail' => '<i class="fa fa-ban"></i> Login Error', 'httppost' => '<i class="fa fa-paper-plane"></i> HTTP POST', 'autologin' => '<i class="fa fa-magic"></i> Autologin', 'cron' => '<i class="fa fa-clock"></i> Cron', 'phperror' => '<i class="fa fa-bug"></i> PHP Errors',  ];
 $this->m4is_k9vt = $this->m4is_wp4r();
 } private 
function m4is_wp4r() { $m4is_r2l5 = isset( $_GET['tab'] ) ? strtolower( $_GET['tab'] ) : '';
 $m4is_r2l5 = array_key_exists( $m4is_r2l5, $this->m4is_jwjgx ) ? $m4is_r2l5 : $this->m4is_x_7a2;
 return $m4is_r2l5;
 } private 
function m4is_rgx_() { global $wpdb;
 if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } $m4is_jo8fb = false;
 if ( $this->m4is_k9vt == 'login' ) { if ( ! empty( $_POST['delete_login_log'] ) ) { $m4is_jo8fb = $wpdb->prepare( "TRUNCATE TABLE %i", m4is_ypvg9::m4is_hjqcz2() );
 delete_transient( $this->m4is_zc5zn );
 } } elseif ( $this->m4is_k9vt == 'httppost' ) { if ( ! empty( $_POST['delete_httppost'] ) ) { $m4is_jo8fb = $wpdb->prepare( "DELETE FROM %i WHERE `type` = 'httppost'", MEMBERIUM_DB_HTTPPOST );
 } } elseif ( $this->m4is_k9vt == 'autologin' ) { if ( ! empty( $_POST['delete_autologin'] ) ) { $m4is_jo8fb = $wpdb->prepare( "DELETE FROM %i WHERE `type` = 'autologin'", MEMBERIUM_DB_HTTPPOST );
 } } if ( $m4is_jo8fb ) { $wpdb->query( $m4is_jo8fb );
 } } private 
function m4is_ojvd() { echo '<div class="wrap">';
 echo '<h1>', __('Memberium Logs' ), '</h1>';
 echo '<h2 class="nav-tab-wrapper">';
 foreach ( $this->m4is_jwjgx as $m4is_r2l5 => $m4is_t5ot4 ) { $m4is_nz3t = ( $m4is_r2l5 == $this->m4is_k9vt ) ? ' nav-tab-active' : '';
 if ( $m4is_r2l5 == $this->m4is_k9vt ) { echo "<span class='nav-tab{$m4is_nz3t}'>{$m4is_t5ot4}</span>";
 } else { echo "<a class='nav-tab{$m4is_nz3t}' href='?page=", $_GET['page'], "&tab={$m4is_r2l5}'>{$m4is_t5ot4}</a>";
 } } echo '</h2>';
 } private 
function m4is_m3mb() { $m4is_ea6ksm = $this->m4is_bnd6ti->m4is_ev6n7e( "logs-{$this->m4is_k9vt}-show.php" );
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 if ( file_exists( $m4is_ea6ksm ) ) { require_once $m4is_ea6ksm;
 } else { echo '<p>Screen Missing</p>';
 } echo '</div>';
 } private 
function m4is_h58r() { echo '</div>';
 } }

