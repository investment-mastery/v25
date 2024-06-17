<?php
/**
 * Copyright (C) 2018-2024 David Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_vmiwx { private $tabs = [];
 private $headers = [];
 private $default = '';
 private $current_tab = '';
 
function __construct() { $this->tabs = [];
 $this->headers = [];
 $this->default = '';
 $this->current_tab = '';
 }  
function m4is_nj5v9k(string $m4is__z1d = '', string $m4is_unc_q = '', string $m4is_ldjf8y = '', $m4is_h7j0 = '', string $m4is_canj = '') { $this->tabs[$m4is_ldjf8y] = [ 'icon' => $m4is__z1d, 'label' => $m4is_unc_q, 'slug' => strtolower(trim($m4is_ldjf8y) ), 'method' => $m4is_h7j0, 'post' => $m4is_canj, ];
 if (count($this->tabs) == 1) { $this->m4is_eliv($m4is_ldjf8y);
 } }  
function m4is_bbwv(array $m4is_jwjgx) { $this->tabs = $m4is_jwjgx;
 } 
function m4is_bx8u() : array { return $this->tabs;
 } 
function m4is_ktem6(string $m4is_jviu = '') { $this->headers[] = $m4is_jviu;
 } 
function m4is_eliv(string $m4is_ldjf8y = '') : bool { $slug = strtolower(trim($m4is_ldjf8y) );
 if (array_key_exists($m4is_ldjf8y, $this->tabs) ) { $this->default = $m4is_ldjf8y;
 return true;
 } return false;
 } 
function m4is__ufgp4() { if ( empty( $this->tabs ) ) { return;
 } $m4is_k9vt = $this->m4is_wp4r();
 if ( $this->tabs[$m4is_k9vt]['post'] ) { $this->m4is_g0rt3v( $this->tabs[$m4is_k9vt]['post'] );
 } m4is_wr40w::m4is_kj4sp();
 echo '<div class="wrap about-wrap memberium">';
 foreach($this->headers as $m4is_rrm56) { echo $this->m4is_g0rt3v($m4is_rrm56);
 } echo '</div>';
 echo '<div class="wrap">';
  echo '<h4 class="nav-tab-wrapper">';
 foreach ($this->tabs as $m4is_ldjf8y => $m4is_r2l5) { $m4is_nz3t = 'nav-tab';
 $m4is_nz3t .= ($m4is_r2l5['slug'] == $m4is_k9vt) ? ' nav-tab-active' : '';
 if ($m4is_r2l5['slug'] == $m4is_k9vt) { echo "<span class='{$m4is_nz3t}'><i class='{$m4is_r2l5['icon']}'></i> {$m4is_r2l5['label']}</span>";
 } else { echo "<a class='{$m4is_nz3t}' href='?page={$_GET['page']}&tab={$m4is_r2l5['slug']}'><i class='{$m4is_r2l5['icon']}'></i> {$m4is_r2l5['label']}</a>";
 } } echo '</h4>';
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 echo $this->m4is_g0rt3v($this->tabs[$m4is_k9vt]['method']);
 echo '</div>';
 } 
function m4is_wp4r() : string { $this->current_tab = isset($_GET['tab']) ? strtolower($_GET['tab']) : $this->default;
 if (! array_key_exists($this->current_tab, $this->tabs) ) { $this->current_tab = $this->default;
 } return $this->current_tab;
 }  private 
function m4is_g0rt3v($m4is_jviu = false) { if ( ! empty( $m4is_jviu ) ) { if ( is_array( $m4is_jviu ) ) { if (method_exists($m4is_jviu[0], $m4is_jviu[1]) ) { return call_user_func_array($m4is_jviu, [] );
 } else { echo '<p><span style="font-weight:bold;color:red;">Error:  </span>  ', $m4is_jviu[0], '->', $m4is_jviu[1], ' not found</p>';
 } } elseif (is_string($m4is_jviu) ) { if (function_exists($m4is_jviu) ) { return call_user_func($m4is_jviu);
 } elseif (file_exists($m4is_jviu) ) { include_once $m4is_jviu;
 } else { echo $m4is_jviu;
 } } } } }

