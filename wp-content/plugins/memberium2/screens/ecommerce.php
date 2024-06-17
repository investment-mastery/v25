<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_wdrso::m4is_xexw();
 final 
class m4is_wdrso { private $m4is_r2l5 = '';
 private $m4is_x_7a2 = 'general';
 private $m4is_jwjgx = [];
 private $m4is_zq0k = '';
 static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr( 'appname' );
 $this->m4is_wp4r();
 $this->m4is_k_i3nb();
 m4is_wr40w::m4is_kj4sp();
 $this->m4is_jbipxk();
 $this->m4is_fvw_aj();
 $this->m4is_hnvf();
 $this->m4is_zk_js();
 } 
function m4is_jdg01() { $this->m4is_jwjgx = [ 'general' => '<i class="fas fa-shopping-cart"></i> General', 'subscriptions' => '<i class="fas fa-sync-alt fa-spin"></i> Subscriptions', 'invoices' => '<i class="fas fa-file-invoice-dollar"></i> Invoices', ];
 return $this->m4is_jwjgx;
 } 
function m4is_wp4r() { if ( empty( $this->m4is_r2l5 ) ) { $this->m4is_r2l5 = isset( $_GET['tab'] ) ? strtolower( trim( $_GET['tab'] ) ) : $this->m4is_x_7a2;
 $this->m4is_r2l5 = array_key_exists( $this->m4is_r2l5, $this->m4is_jdg01() ) ? $this->m4is_r2l5 : $this->m4is_r2l5;
 } return $this->m4is_r2l5;
 } 
function m4is_k_i3nb() { if ( $_SERVER['REQUEST_METHOD'] <> 'POST') { return;
 } if ( ! wp_verify_nonce( $_POST['memberium_ecommerce_nonce'], m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb() ) ) { wp_die( 'nonce error' );
 return;
 } $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is_k9vt = $this->m4is_wp4r();
 if ( $m4is_k9vt == 'general' ) { $this->m4is_ytgo();
 } elseif ( $m4is_k9vt == 'subscriptions' ) { $this->m4is_ge_q();
 } elseif ( $m4is_k9vt == 'invoices' ) { $this->m4is_ggni7();
 } } private 
function m4is_ytgo() { $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is__sri = isset( $_POST['affiliate_detect'] ) ? (int) $_POST['affiliate_detect'] : $m4is_bnd6ti->m4is_oiewvu( 'settings', 'affiliate_detect' );
 $m4is_dm27 = isset( $_POST['merchant_account_id'] ) ? (int) $_POST['merchant_account_id'] : $m4is_bnd6ti->m4is_oiewvu( 'settings', 'merchant_account_id' );
 $m4is_bnd6ti->m4is_qdi_3o( $m4is__sri, 'settings', 'affiliate_detect' );
 $m4is_bnd6ti->m4is_qdi_3o( $m4is_dm27, 'settings', 'merchant_account_id' );
 m4is_wr40w::m4is_cxesuf( 'General eCommerce Options Updated' );
 } private 
function m4is_ge_q() { $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is_oa_j2 = [];
 foreach($_POST as $m4is_s2ge5 => $m4is_w_o7al ) { if ( is_array( $m4is_w_o7al ) ) { $m4is_oa_j2[$m4is_s2ge5] = $m4is_w_o7al;
 } $m4is_bnd6ti->m4is_qdi_3o( $m4is_oa_j2, 'ecommerce', 'actions' );
 } m4is_wr40w::m4is_cxesuf( 'Subscription Management Options Updated' );
 } private 
function m4is_ggni7() { $m4is_ks1fj2 = get_option( 'memberium_invoice_template', false );
 $m4is_ks1fj2['header'] = isset($_POST['invoice_header'] ) ? trim( stripslashes($_POST['invoice_header'] ) ) : '';
 $m4is_ks1fj2['items'] = isset($_POST['invoice_items'] ) ? trim( stripslashes($_POST['invoice_items'] ) ) : '';
 $m4is_ks1fj2['pre_payments'] = isset($_POST['invoice_pre_payments'] ) ? trim( stripslashes($_POST['invoice_pre_payments'] ) ) : '';
 $m4is_ks1fj2['payments'] = isset($_POST['invoice_payments'] ) ? trim( stripslashes($_POST['invoice_payments'] ) ) : '';
 $m4is_ks1fj2['pre_scheduled'] = isset($_POST['invoice_pre_scheduled'] ) ? trim( stripslashes($_POST['invoice_pre_scheduled'] ) ) : '';
 $m4is_ks1fj2['scheduled'] = isset($_POST['invoice_scheduled'] ) ? trim( stripslashes($_POST['invoice_scheduled'] ) ) : '';
 $m4is_ks1fj2['footer'] = isset($_POST['invoice_footer'] ) ? trim( stripslashes($_POST['invoice_footer'] ) ) : '';
 $m4is_ks1fj2 = update_option( 'memberium_invoice_template', $m4is_ks1fj2 );
 m4is_wr40w::m4is_cxesuf( 'Invoice Display Options Updated' );
 } 
function m4is_jbipxk() { echo '<div class="wrap">';
 echo '<h1>', __('eCommerce Settings' ), '</h1>';
 echo '<h2 class="nav-tab-wrapper">';
 foreach ($this->m4is_jwjgx as $m4is_r2l5 => $m4is_t5ot4 ) { $class = ($m4is_r2l5 == $this->m4is_r2l5 ) ? ' nav-tab-active' : '';
 if ( $m4is_r2l5 == $this->m4is_r2l5 ) { echo "<span class='nav-tab$class'>$m4is_t5ot4</span>";
 } else { echo "<a class='nav-tab{$class}' href='?page=", $_GET['page'], "&tab={$m4is_r2l5}'>{$m4is_t5ot4}</a>";
 } } echo '</h2>';
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 echo '<form method="POST" action="">';
 } 
function m4is_hnvf () { echo '</form>';
 echo '</div>';
 echo '</div>';
 } 
function m4is_fvw_aj() { if ( $this->m4is_r2l5 == 'general' ) { $this->m4is_opdm7();
 } elseif ( $this->m4is_r2l5 == 'subscriptions' ) { $this->m4is_refp();
 } elseif ( $this->m4is_r2l5 == 'invoices' ) { $this->m4is_w4xq_j();
 } } 
function m4is_refp() { ini_set('display_errors', 1);
 wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), 'memberium_ecommerce_nonce' );
 $m4is_jt5l9 = m4is_pms8y::m4is_e5l8a9()->m4is_nign();
 $m4is_z8sd = m4is_untczd::m4is_j68se();
 $m4is_oa_j2 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('ecommerce', 'actions');
 $m4is_vta5 = isset( $_POST['find'] ) ? sanitize_text_field( trim( $_POST['find'] ) ) : '';
 $m4is_sgr_vf = [];
 $m4is_koa5fw = is_array( $m4is_jt5l9 ) ? count( $m4is_jt5l9 ) : 0;
 if ( ! empty( $m4is_vta5 ) ) { foreach( $m4is_z8sd as $m4is_j5sy07 => $m4is_si73 ) { if ( stripos( $m4is_si73['ProductName'], $m4is_vta5 ) === false ) { $m4is_sgr_vf[] = $m4is_j5sy07;
 unset( $m4is_z8sd[$m4is_j5sy07] );
 } } if ( ! empty( $m4is_sgr_vf ) ) { foreach( $m4is_jt5l9 as $m4is_j5sy07 => $m4is_afusd3 ) { if ( in_array( $m4is_afusd3['ProductId'], $m4is_sgr_vf ) ) { unset( $m4is_jt5l9[$m4is_j5sy07] );
 } } } } else { if ( $m4is_koa5fw > 100 ) { $m4is_jt5l9 = array_slice( $m4is_jt5l9, $m4is_koa5fw - 100, 100 );
 } } echo '<P>Search: <input name="find" type="text" value="', $m4is_vta5, '"></P>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '<table class="widefat" style="white-space:nowrap;">';
 echo '<tr>';
 echo '<th>Subscription</th><th>Payment Action</th><th>Payment Goal</th><th>Cancel Action</th><th>Cancel Goal</th><th>End Date Action</th><th>End Date Goal</th>';
 echo '</tr>';
 if ( is_array( $m4is_jt5l9 ) ) { foreach ( $m4is_jt5l9 as $m4is_ke_fr ) { $m4is_j5sy07 = $m4is_ke_fr['Id'];
 $m4is_xbjma = $m4is_ke_fr['ProductId'];
 if ($m4is_ke_fr['Active'] ) { $cancel_action = empty( $m4is_oa_j2[ $m4is_j5sy07 ]['cancel_action'] ) ? 0 : $m4is_oa_j2[ $m4is_j5sy07 ]['cancel_action'];
 $cancel_goal = empty( $m4is_oa_j2[ $m4is_j5sy07 ]['cancel_goal'] ) ? '' : $m4is_oa_j2[ $m4is_j5sy07 ]['cancel_goal'];
 $end_action = empty( $m4is_oa_j2[ $m4is_j5sy07 ]['end_action'] ) ? 0 : $m4is_oa_j2[ $m4is_j5sy07 ]['end_action'];
 $end_goal = empty( $m4is_oa_j2[ $m4is_j5sy07 ]['end_goal'] ) ? '' : $m4is_oa_j2[ $m4is_j5sy07 ]['end_goal'];
 $pay_action = empty( $m4is_oa_j2[ $m4is_j5sy07 ]['pay_action'] ) ? 0 : $m4is_oa_j2[ $m4is_j5sy07 ]['pay_action'];
 $pay_goal = empty( $m4is_oa_j2[ $m4is_j5sy07 ]['pay_goal'] ) ? '' : $m4is_oa_j2[ $m4is_j5sy07 ]['pay_goal'];
 echo '<tr>';
 echo '<td>', $m4is_z8sd[ $m4is_xbjma ]['ProductName'], ' - $', sprintf('%01.2f', $m4is_ke_fr['PlanPrice'] ), ' / ', $m4is_ke_fr['FrequencyWord'], '</td>';
 echo '<td><input class="actionsetdropdown" type="text" value="', $pay_action, '" name="', $m4is_j5sy07, '[pay_action]"></td>';
 echo '<td><input type="text" value="', $pay_goal, '" name="', $m4is_j5sy07, '[pay_goal]"></td>';
 echo '<td><input class="actionsetdropdown" type="number" min="0" max="99999" size="3" value="', (int) $cancel_action, '" name="', $m4is_j5sy07, '[cancel_action]"></td>';
 echo '<td><input type="text" value="', $cancel_goal, '" name="', $m4is_ke_fr['Id'], '[cancel_goal]"></td>';
 echo '<td><input class="actionsetdropdown" type="number" min="0" max="99999" size="5" value="', (int) $end_action, '" name="', $m4is_j5sy07, '[end_action]"></td>';
 echo '<td><input type="text" value="', $end_goal, '" name="', $m4is_ke_fr['Id'], '[end_goal]"></td>';
 echo '</tr>';
 } } } echo '</table>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 } 
function m4is_opdm7() { $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is__sri = $m4is_bnd6ti->m4is_oiewvu( 'settings', 'affiliate_detect' );
 $m4is_zh02 = $m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_reset_tag' );
 $m4is_cxre = $m4is_bnd6ti->m4is_oiewvu( 'settings', 'merchant_account_id' );
 $m4is_olob = 'm4is_wr40w';
 wp_nonce_field(m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), 'memberium_ecommerce_nonce' );
 echo '<ul>';
 $m4is_olob::m4is_hd8p( 'Affiliate AutoDetect', 'affiliate_detect', 9124, $m4is__sri );
 $m4is_olob::m4is_ze6b( 'Default Merchant Account', 'merchant_account_id', $m4is_cxre, ['help_id' => 6167, 'min' => 0, 'max' => 999, 'size' => 4, 'style' => 'text-align:right;width:80px;'] );
 $m4is_olob::m4is_mz70( 'Password Reset Tag', 'first_login_page', $m4is_zh02, 'taglistdropdown', ['help_id' => 1183] );
 echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 } 
function m4is_w4xq_j() { wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), 'memberium_ecommerce_nonce' );
 echo '<ul>';
 echo '<h2>Invoice Display Styler</h2>';
 $m4is_yao_0n = get_option('memberium_invoice_template', false);
  echo '<style> textarea { background-color: antiquewhite; } </style>';
 echo '<li><label style="vertical-align:top;">Header ', m4is_wr40w::m4is_vgnp(0000 ), '</label>';
 echo '<textarea name="invoice_header" cols=80 rows=3>', isset($m4is_yao_0n['header'] ) ? $m4is_yao_0n['header'] : '', '</textarea>';
 echo '</li>';
  echo '<li><label style="vertical-align:top;">Line Items ', m4is_wr40w::m4is_vgnp(0000 ), '</label>';
 echo '<textarea name="invoice_items" cols=80 rows=3>',isset($m4is_yao_0n['items'] ) ? $m4is_yao_0n['items'] : '', '</textarea>';
 echo '</li>';
  echo '<li><label style="vertical-align:top;">Payments Header', m4is_wr40w::m4is_vgnp(0000 ), '</label>';
 echo '<textarea name="invoice_pre_payments" cols=80 rows=3>',isset($m4is_yao_0n['pre_payments'] ) ? $m4is_yao_0n['pre_payments'] : '', '</textarea>';
 echo '</li>';
  echo '<li><label style="vertical-align:top;">Payments ', m4is_wr40w::m4is_vgnp(0 ), '</label>';
 echo '<textarea name="invoice_payments" cols=80 rows=3>',isset($m4is_yao_0n['payments'] ) ? $m4is_yao_0n['payments'] : '', '</textarea>';
 echo '</li>';
  echo '<li><label style="vertical-align:top;">Scheduled Payments Header ', m4is_wr40w::m4is_vgnp(0000 ), '</label>';
 echo '<textarea name="invoice_pre_scheduled" cols=80 rows=3>',isset($m4is_yao_0n['pre_scheduled'] ) ? $m4is_yao_0n['pre_scheduled'] : '', '</textarea>';
 echo '</li>';
  echo '<li><label style="vertical-align:top;">Scheduled Payments ', m4is_wr40w::m4is_vgnp(0000 ), '</label>';
 echo '<textarea name="invoice_scheduled" cols=80 rows=3>',isset($m4is_yao_0n['scheduled'] ) ? $m4is_yao_0n['scheduled'] : '', '</textarea>';
 echo '</li>';
  echo '<li><label style="vertical-align:top;">Footer ', m4is_wr40w::m4is_vgnp(0000 ), '</label>';
 echo '<textarea name="invoice_footer" cols=80 rows=3>',isset($m4is_yao_0n['footer'] ) ? $m4is_yao_0n['footer'] : '', '</textarea>';
 echo '</li>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 echo '<li><label style="vertical-align:top;">%% Codes</label>';
 echo '<div style="display:inline-block;width:600px;">';
 $m4is_tplu = [ 'invoice', ['job', 'order'], 'contact', 'payplan', 'payment', ['payplanitem', 'scheduled'], ['orderitem', 'item'], ];
 foreach ($m4is_tplu as $m4is_dj_2 ) { if (is_array ($m4is_dj_2 ) ) { $prefix = $m4is_dj_2[1];
 $m4is_dj_2 = $m4is_dj_2[0];
 } else { $prefix = $m4is_dj_2;
 } $m4is_w_8g = m4is_ho3l::m4is_kjedy2($m4is_dj_2, false );
 sort($m4is_w_8g );
 echo '<strong>', ucwords($prefix ), '</strong><br />';
 if (is_array($m4is_w_8g ) ) { foreach($m4is_w_8g as $m4is_g1ru50 ) { $m4is_carw7y = '%%' . $prefix . '.' . strtolower($m4is_g1ru50 ) . '%%';
 echo '<input type="text" size="', strlen($m4is_carw7y ) + 2, '" value="', $m4is_carw7y, '" readonly style="text-align:center;"> ';
 } echo '<br><br>';
 } } echo '<strong>Custom Codes</strong><br />';
 $m4is_w_8g = [ 'subtotal' ];
 foreach($m4is_w_8g as $m4is_g1ru50 ) { $m4is_carw7y = '%%receipt.' . strtolower($m4is_g1ru50 ) . '%%';
 echo '<input type="text" size="', strlen($m4is_carw7y ) + 2, '" value="', $m4is_carw7y, '" readonly style="text-align:center;"> ';
 } echo '</div></li>';
 echo '</ul>';
 } 
function m4is_zk_js() { global $wpdb;
  $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_apvd = [];
 $m4is_apvd[] = [ 'id' => 0, 'text' => '(None)' ];
 foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => "{$m4is_mpia} ({$m4is_j5sy07})", ];
 } $m4is_apvd = json_encode($m4is_apvd );
 unset($m4is_iystd2, $m4is_j5sy07, $m4is_mpia );
 echo '<script>';
 echo 'var actionsetlist = ', m4is_tvc2xn::m4is_gi6g3l(), ';';
 echo 'var taglist       = ', $m4is_apvd, ';';
 echo '</script>';
 unset($m4is__u1ajd, $m4is_apvd );
 } }

