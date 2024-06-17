<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_zp1j;
 final 
class m4is_zp1j { private $m4is_bnd6ti;
 private $m4is_w2w8;
 
function __construct() { $this->m4is_x6wv();
 $this->m4is_gm1n();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_w2w8 = 'settings';
 } private 
function m4is_gm1n() { echo '<form method="POST" action="">';
 echo '<ul>';
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce' );
 $this->m4is_k4kj6();
 echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 } private 
function m4is_k4kj6() { $m4is_y3m1 = [ 0 => 'No action', 1 => 'Disable Automatic Paragraphs', 2 => 'Delay Automatic Paragraphs', ];
 $m4is_it1op = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'dynamic_menus', 0 );
 $m4is_cojws = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'two_pass_shortcode_filter', 0 );
 $m4is_i0c3 = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'multi_language', 0 );
 $m4is_t9f0ei = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'cache_flush', 0 );
 $m4is_mcul6x = (bool) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'cache_bust', 0 );
 $m4is_e_ms = (int) $this->m4is_bnd6ti->m4is_oiewvu( $this->m4is_w2w8, 'wp_autop', 0 );
  echo '<h3>Page Handling</h3>';
 m4is_wr40w::m4is_hd8p( 'Personal Menus', 'dynamic_menus', 11934, $m4is_it1op );
 m4is_wr40w::m4is_uftpvx( 'Automatic Paragraphs', 'wp_autop', $m4is_e_ms, $m4is_y3m1, [ 'help_id' => 21886 ] );
 m4is_wr40w::m4is_hd8p( 'Two Pass Shortcode Handling', 'two_pass_shortcode_filter', 8227, $m4is_cojws );
 m4is_wr40w::m4is_hd8p( 'Multi-Language Support', 'multi_language', 14684, $m4is_i0c3 );
 m4is_wr40w::m4is_hd8p( 'Force Rewrite Cache Flush', 'cache_flush', 9636, $m4is_t9f0ei );
 m4is_wr40w::m4is_hd8p( 'Discourage Browser Caching', 'cache_bust', 13292, $m4is_mcul6x );
  } }

