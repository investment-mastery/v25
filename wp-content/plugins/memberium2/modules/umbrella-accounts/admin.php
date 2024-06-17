<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y') || die();
 
class m4is_ym8a { private $m4is_jno028, $m4is_m3y0u, $memberium_umbrella_core_class;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() {  $this->m4is_jno028 = m4is_pms8y::m4is_e5l8a9();
 $this->memberium_umbrella_core_class = m4is_sljnt::m4is_e5l8a9();
  if ( ! $this->m4is_jno028->m4is_lvmz1b() ) { return;
 }   add_action( 'admin_init', [$this, 'm4is_njuy'], 9 );
  add_action( 'memberium_admin_menu_addons', [$this, 'm4is_jcdzj'] );
  add_action( 'edit_user_profile', [$this, 'm4is_mcyw35'], 2010 );
  add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 }  
function m4is_s1jxg5( array $m4is_r1g2u ) : array {  return array_merge( $m4is_r1g2u, [ 'Umbrella Accounts for Memberium'  ]);
 }     
function m4is_njuy() {   $this->m4is_m3y0u = m4is_q1zh2::get_instance();
 }  
function m4is_jcdzj( string $m4is_i6f5 ) {  if ( $m4is_i6f5 ) {      add_submenu_page( $m4is_i6f5, 'Umbrella Accounts', 'Umbrella Accounts', 'manage_options', 'memberium-umbrella-accounts', [$this, 'm4is_nbqj17'] );
 } }  
function m4is_mcyw35($m4is_x0_hk) {  if (! m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b()) { return;
 }  $m4is_mdqgk = m4is_pms8y::m4is_e5l8a9()->m4is_akz3( $m4is_x0_hk->ID );
  $m4is_e2kg = isset( $m4is_mdqgk['keap']['contact']['id'] ) ? $m4is_mdqgk['keap']['contact']['id'] : 0;
  if ( ! $m4is_e2kg ) { return;
 }  $m4is_u6wol = m4is_sljnt::m4is_e5l8a9();
 $m4is_u_hn = strtolower( $m4is_u6wol->m4is_t8op() );
 $m4is_yynebu = strtolower( $m4is_u6wol->m4is_rptj() );
  echo '<table class="form-table">';
 echo '<tr>';
 echo '<th valign="top"><label for="infusionsoft_umbrella">Umbrella Accounts</label></th>';
 echo '<td>';
 echo 'Parent Code:  ', empty( $m4is_mdqgk['keap']['contact'][$m4is_u_hn] ) ? '<strong style="color:red;">None</strong>' : $m4is_mdqgk['keap']['contact'][$m4is_u_hn], '<br>';
  if ( $m4is_u_hn <> $m4is_yynebu ) { echo 'Child Code:  ', empty( $m4is_mdqgk['keap']['contact'][$m4is_yynebu] ) ? '<strong style="color:red;">None</strong>' : $m4is_mdqgk['keap']['contact'][$m4is_yynebu], '<br>';
 } echo '</td>';
 echo '</tr>';
 echo '</table>';
 }  
function m4is_nbqj17() {   require_once __DIR__ . '/screen.php';
 } }

