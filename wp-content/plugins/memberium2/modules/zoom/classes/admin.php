<?php
/**
 * Copyright (c) 2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
  
class m4is_jfea8j { private $key;
 private $version;
  
function __construct( $m4is_s2ge5, $m4is_bu7y ) { $this->key = $m4is_s2ge5;
 $this->version = $m4is_bu7y;
 add_filter('memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1);
 } 
function m4is_s1jxg5($m4is_r1g2u) { return array_merge($m4is_r1g2u, [ 'Zoom for Memberium Support' ]);
 }  
function m4is_hh6o9() { $m4is_g0wy = $this->version;
 $m4is__1jv = WPAL_ZOOM_URL . 'assets/';
 wp_enqueue_style("wpal-zoom-admin-css", "{$m4is__1jv}wpal-zoom-admin.css", [], $m4is_g0wy, 'all');
 }  
function m4is_ke8at($m4is_wov2, $m4is_twy4g0) { $m4is_swtx = $this->key;
 $m4is_couz = $m4is_twy4g0['menu_slug'];
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { if( isset($_POST["{$m4is_couz}-submit"]) ){  if ( isset($_POST["_{$m4is_swtx}_name"]) ){ if( wp_verify_nonce($_POST["_{$m4is_swtx}_name"], $m4is_swtx) ){ $m4is_wov2 = $this->m4is_y8i9( $_POST, $m4is_wov2 );
 } } } } $this->m4is_hh6o9();
 $m4is_a97xh = $m4is_twy4g0['I18n'];
 $m4is_s2ge5 = $m4is_wov2['api_key'];
 $m4is__djm5 = $m4is_wov2['api_secret'];
 require_once WPAL_ZOOM_HOME_DIR . 'templates/auth-screen.php';
 } 
function m4is_y8i9($m4is_etj2, $m4is_wov2){ $m4is_w2w8 = ['api_key', 'api_secret'];
 $m4is_xeusoh = false;
 foreach ($m4is_w2w8 as $m4is_t5ot4) { $m4is_mthe = $m4is_wov2[$m4is_t5ot4];
 $m4is_l4z1kx = isset($m4is_etj2[$m4is_t5ot4]) ? esc_attr($m4is_etj2[$m4is_t5ot4]) : '';
 if( $m4is_l4z1kx != $m4is_mthe ){ $m4is_wov2[$m4is_t5ot4] = $m4is_l4z1kx;
 $m4is_xeusoh = true;
 } } if($m4is_xeusoh){ update_option($this->key, $m4is_wov2);
 } return $m4is_wov2;
 } }

