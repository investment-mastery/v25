<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_tv7bk::m4is_xexw();
 final 
class m4is_tv7bk { private $m4is_bnd6ti;
 private $m4is_tu86mz;
 private $m4is_rupw;
 public static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self();
 } private 
function __construct() { $this->m4is_ju94();
 $this->m4is_gm1n();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_tu86mz = m4is_q1zh2::get_instance();
 $this->m4is_rupw = m4is_u68pu::m4is_i9k3m();
 } private 
function m4is_gm1n() { $m4is_w2w8 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings' );
 $m4is_wxj9 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'autoupdate' );
 echo '<form method="POST" action="">';
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce');
 if ( ! is_writable( MEMBERIUM_HOME ) ) { echo '<h3 style="color:red;">Warning</h3>';
 echo '<p>System updates disabled because the plugin folder cannot be written to.</p>';
 } else { echo '<ul>';
 echo '<h3>Updater</h3>';
 if ( $this->m4is_rupw ) { m4is_wr40w::m4is_hd8p( 'Auto-Update Plugin', 'autoupdate', 12523, $m4is_w2w8['autoupdate'] );
 } echo '<li><label>Memberium Manual Updater</label>';
 echo $this->m4is_tu86mz->m4is_is_k();
 echo m4is_wr40w::m4is_vgnp(9891), '</li>';
 echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 } echo '</form>';
 } }

