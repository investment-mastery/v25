<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_wxe3hj { private $m4is_mrmn = [ 'active', 'completed', 'pending-cancel', 'processing', ], $m4is_jv_y = [ 'cancelled', 'expired',  ], $m4is_u0qi6y = [ 'pending', 'on-hold', ], $m4is_cip0 = [ 'account_first_name' => 'FirstName', 'account_last_name' => 'LastName', 'first_name' => 'FirstName', 'last_name' => 'LastName', 'billing_address_1' => 'StreetAddress1', 'billing_address_2' => 'StreetAddress2', 'billing_city' => 'City', 'billing_company' => 'Company', 'billing_country' => 'Country', 'billing_email' => 'Email', 'billing_phone' => 'Phone1', 'billing_postcode' => 'PostalCode', 'billing_state' => 'State', 'shipping_address_1' => 'Address2Street1', 'shipping_address_2' => 'Address2Street2', 'shipping_city' => 'City2', 'shipping_country' => 'Country2', 'shipping_email' => 'Email2', 'shipping_phone' => 'Phone2', 'shipping_postcode' => 'PostalCode2', 'shipping_state' => 'State2', ];
 public $post_keys = [ 'canc' => '_memberium_canc_tag', 'main' => '_memberium_main_tag', 'payf' => '_memberium_payf_tag', 'susp' => '_memberium_susp_tag', ];
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 $this->m4is_mrmn = wc_get_is_paid_statuses();
 if (is_admin() ) { require_once __DIR__ . '/admin.php';
 m4is_u_mq::m4is_e5l8a9();
 } else { require_once __DIR__ . '/frontend.php';
 m4is_ag6nr::m4is_e5l8a9();
 } } private 
function m4is_ww61so() { add_action( 'woocommerce_order_status_changed', [$this, 'm4is_cp4v9o'], 10, 3 );
 add_action( 'woocommerce_subscription_status_updated', [$this, 'm4is_g14e'], 10, 3 );
  add_filter( 'memberium/registration/field_map', [$this, 'm4is_ym4oe'], 10, 1 );
 add_filter( 'memberium/usermeta/crm_field_maps', [$this, 'm4is_ym4oe'], 10, 1 );
 add_filter( 'memberium/usermeta/transmute', [$this, 'm4is_wify'], 10, 3 );
 add_filter( 'woocommerce_new_customer_data', [$this, 'm4is_vq5dy'], 10 );
 } 
function m4is_cp4v9o( $m4is_ae8w, $m4is_ymqci, $m4is_q8wd ) { $m4is_wdjmn = wc_get_order( $m4is_ae8w );
 $m4is_ig9p6 = $m4is_wdjmn->get_user_id();
 if ( ! $m4is_ig9p6 ) { return;
 } $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if (! $m4is_e2kg) { return;
 } $m4is__ql9vk = $m4is_wdjmn->get_items();
 if (is_array($m4is__ql9vk) && ! empty($m4is__ql9vk) ) { foreach ($m4is__ql9vk as $item_key => $m4is_f852 ) { $m4is_xbjma = $m4is_f852->get_product_id();
 $this->m4is_m0o7( $m4is_e2kg, $m4is_ig9p6, $m4is_xbjma, $m4is_ae8w, $m4is_q8wd, $m4is_ymqci );
 } } } private 
function m4is_z8437m( $m4is_cd8k = 0, $m4is_ig9p6 = 0, $m4is_knyw0 = '' ) { $m4is_cd8k = (int) $m4is_cd8k;
 $m4is_ig9p6 = (int) $m4is_ig9p6;
 if ( empty( $m4is_cd8k ) || empty( $m4is_ig9p6 ) || empty( $m4is_knyw0 ) ) { return;
 } if ( $m4is_ig9p6 ) { $m4is_x0_hk = get_user_by( 'id', $m4is_ig9p6 );
 $m4is_ig9p6 = $m4is_x0_hk->ID;
 $m4is_euyfd = $m4is_x0_hk->user_login;
 $m4is_n10t = $m4is_x0_hk->user_email;
 } else { $m4is_ig9p6 = 0;
 $m4is_euyfd = 'Memberium';
 $m4is_n10t = '';
 } $m4is_doq8l = [ 'comment_agent' => 'Memberium', 'comment_approved' => 1, 'comment_author_email' => $m4is_n10t, 'comment_author_IP' => '', 'comment_author_url' => '', 'comment_author' => $m4is_euyfd, 'comment_content' => trim( $m4is_knyw0 ), 'comment_date' => current_time( 'mysql' ), 'comment_parent' => 0, 'comment_post_ID' => (int) $m4is_cd8k, 'comment_type' => 'order_note', 'user_id' => $m4is_ig9p6, ];
 wp_insert_comment( $m4is_doq8l );
 } private 
function m4is_m0o7( $m4is_e2kg, $m4is_ig9p6, $m4is_xbjma, $m4is_ae8w, $m4is_zg8z, $m4is_ymqci ) { $m4is_e2kg = (int) $m4is_e2kg;
 $m4is_ig9p6 = (int) $m4is_ig9p6;
 $m4is_xbjma = (int) $m4is_xbjma;
 $m4is_ae8w = (int) $m4is_ae8w;
 $m4is_zg8z = (string) $m4is_zg8z;
 $m4is_ymqci = (string) $m4is_ymqci;
 if ($m4is_zg8z <> $m4is_ymqci) { if ($m4is_e2kg && $m4is_xbjma) { $m4is_iystd2 = $this->m4is_iswzo5($m4is_xbjma);
 $m4is_p6t7 = '';
 $m4is_qqwj1c = 'Memberium ';
 $m4is_y1te2 = in_array($m4is_ymqci, $this->m4is_mrmn);
 if (in_array($m4is_zg8z, $this->m4is_mrmn) ) { if ($m4is_iystd2['main']) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2['main'], $m4is_e2kg);
 $m4is_p6t7 .= "{$m4is_qqwj1c} added tag {$m4is_iystd2['main']}<br>";
 }  if ($m4is_iystd2['canc']) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75(-abs($m4is_iystd2['canc']), $m4is_e2kg);
 $m4is_p6t7 .= "{$m4is_qqwj1c} removed tag {$m4is_iystd2['canc']}<br>";
 } if ($m4is_iystd2['payf']) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75(-abs($m4is_iystd2['payf']), $m4is_e2kg);
 $m4is_p6t7 .= "{$m4is_qqwj1c} removed tag {$m4is_iystd2['payf']}<br>";
 }  if ($m4is_iystd2['susp']) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75(-abs($m4is_iystd2['susp']), $m4is_e2kg);
 $m4is_p6t7 .= "{$m4is_qqwj1c} removed tag {$m4is_iystd2['susp']}<br>";
 } } elseif ($m4is_zg8z == 'failed') { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2['payf'], $m4is_e2kg);
 if ($m4is_iystd2['main']) $m4is_p6t7 .= "{$m4is_qqwj1c} added tag {$m4is_iystd2['payf']}<br>";
 } elseif ( in_array($m4is_zg8z, $this->m4is_jv_y) ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2['canc'], $m4is_e2kg);
 if ($m4is_iystd2['main']) $m4is_p6t7 .= "{$m4is_qqwj1c} added tag {$m4is_iystd2['canc']}<br>";
 } elseif ($m4is_zg8z == 'expired') { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75(0 - $m4is_iystd2['main'], $m4is_e2kg);
 if ($m4is_iystd2['main']) $m4is_p6t7 .= "{$m4is_qqwj1c} removed tag {$m4is_iystd2['main']}<br>";
 } elseif ($m4is_zg8z == 'on-hold') { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_iystd2['susp'], $m4is_e2kg);
 if ($m4is_iystd2['main']) $m4is_p6t7 .= "{$m4is_qqwj1c} added tag {$m4is_iystd2['susp']}<br>";
 } $this->m4is_z8437m($m4is_ae8w, $m4is_ig9p6, $m4is_p6t7);
 } } } private 
function m4is_hi8zb4( int $m4is_ig9p6, int $m4is_xbjma, int $m4is_e6zfi ) : bool { $m4is_ig9p6 = (int) $m4is_ig9p6;
 $m4is_xbjma = (int) $m4is_xbjma;
 $m4is_e6zfi = (int) $m4is_e6zfi;
 $m4is_k4yeul = [ 'subscriptions_per_page' => -1, 'customer_id' => $m4is_ig9p6, 'product_id' => $m4is_xbjma, 'subscription_status' => $this->m4is_mrmn, ];
 $m4is_wb9f = wcs_get_subscriptions( $m4is_k4yeul );
 unset( $m4is_wb9f[$m4is_e6zfi] );
 return (bool) count($m4is_wb9f);
 }  
function m4is__2a89( int $m4is_ig9p6, int $m4is_xbjma, int $m4is_t15t ) : bool { $m4is_k4yeul = [ 'customer_id' => $m4is_ig9p6, 'return' => 'ids', 'status' => $this->m4is_mrmn, 'product_id' => $m4is_xbjma, ];
 $m4is_ykw19o = wc_get_orders( $m4is_k4yeul );
  $m4is_ykw19o = array_diff( $m4is_ykw19o, [ $m4is_t15t ]);
 foreach( $m4is_ykw19o as $m4is_ae8w ) { $m4is_wdjmn = wc_get_order( $m4is_ae8w );
 $m4is__ql9vk = $m4is_wdjmn->get_items();
 foreach( $m4is__ql9vk as $m4is_f852 ) { if ( $m4is_f852->get_product_id() == $m4is_xbjma ) { return true;
 } } } return false;
 }  
function m4is_akf2q3() { return $this->post_keys;
 } 
function m4is_iswzo5( int $m4is_xbjma ) { $m4is_auhoe = get_post_meta( $m4is_xbjma );
 $m4is_iystd2 = [];
 if (is_array($m4is_auhoe) ) { foreach($this->post_keys as $m4is_t5ot4 => $m4is_s2ge5) { $m4is_iystd2[$m4is_t5ot4] = empty($m4is_auhoe[$m4is_s2ge5][0]) ? 0 : $m4is_auhoe[$m4is_s2ge5][0];
 } } return $m4is_iystd2;
 }  
function m4is_auxer( $m4is_d9ybqg, $m4is_gmpa ) { if ( ! function_exists( 'wc_get_subscription_item_products' ) ) { return;
 } $m4is_iystd2 = [];
 $m4is_wdjmn = wc_get_order( $m4is_d9ybqg );
 $m4is_ig9p6 = $m4is_wdjmn->get_user_id();
 $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_ig9p6 ) { $this->m4is_z8437m( $m4is_d9ybqg, 0, 'Memberium skipped applying tags due to no assigned WordPress user.' );
 return;
 } if ( ! $m4is_e2kg ) { $this->m4is_z8437m( $m4is_d9ybqg, 0, 'Memberium skipped applying tags due to no assigned CRM user.' );
 return;
 } $m4is_oa_o = wc_get_subscription_item_products( $m4is_gmpa );
 if ( is_array( $m4is_oa_o ) && ! empty( $m4is_oa_o ) ) { foreach ( $m4is_oa_o as $m4is_xbjma ) {  } } } 
function m4is_ysrw( $m4is_d9ybqg ) { }  
function m4is_vq5dy($m4is_m4nmc) { if (empty($m4is_m4nmc['user_pass']) ) { $m4is_m4nmc['user_pass'] = m4is_pms8y::m4is_e5l8a9()->m4is_e9m0g();
 } if (isset($_POST['account_first_name']) && ! empty($_POST['account_first_name'])) { $m4is_m4nmc['first_name'] = trim($_POST['account_first_name']);
 } if (isset($_POST['account_last_name']) && ! empty($_POST['account_last_name'])) { $m4is_m4nmc['last_name'] = trim($_POST['account_last_name']);
 } if (get_option('woocommerce_registration_generate_username') !== 'no') { if (! username_exists($m4is_m4nmc['user_email']) ) { $m4is_m4nmc['user_login'] = $m4is_m4nmc['user_email'];
 } } return $m4is_m4nmc;
 } 
function m4is_g14e($m4is__oep, $m4is_q8wd, $m4is_ymqci) { $m4is_d9ybqg = $m4is__oep->get_id();
 $m4is_ig9p6 = $m4is__oep->get_user_id();
 if (! $m4is_ig9p6) { $this->m4is_z8437m($m4is_d9ybqg, 0, 'Memberium skipped applying tags due to no assigned WordPress user.');
 return;
 } $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if (! $m4is_e2kg) { $this->m4is_z8437m($m4is_d9ybqg, $m4is_ig9p6, 'Memberium skipped applying tags due to no assigned CRM contact.');
 return;
 } $m4is__ql9vk = $m4is__oep->get_items();
 if (is_array($m4is__ql9vk) && ! empty($m4is__ql9vk) ) { foreach($m4is__ql9vk as $m4is_gnecqu => $m4is_f852) { $m4is_xbjma = $m4is_f852->get_product_id();
 if (! in_array($m4is_q8wd, $this->m4is_mrmn) ) { $m4is_fxah = $this->m4is_hi8zb4($m4is_ig9p6, $m4is_xbjma, $m4is_d9ybqg);
 if ($m4is_fxah) { $this->m4is_z8437m($m4is_d9ybqg, $m4is_ig9p6, 'Memberium skipped applying deactivation tag due to other active subscriptions.');
 break;
 } } $this->m4is_m0o7($m4is_e2kg, $m4is_ig9p6, $m4is_xbjma, $m4is__oep->id, $m4is_q8wd, $m4is_ymqci);
 } } } 
function m4is_ym4oe( array $m4is_i_q2 ) : array { return array_merge( $m4is_i_q2, $this->m4is_cip0 );
 } 
function m4is_c6lfc($m4is_w_o7al, $m4is_yxwn, $m4is_e2kg = 0) { return $m4is_w_o7al;
 } 
function m4is_wify($m4is_w_o7al, $m4is_yxwn, $m4is_e2kg = 0) { if (in_array($m4is_yxwn, ['Country', 'Country2', 'Country3'])) { if (strlen($m4is_w_o7al) < 4) { $m4is_w_o7al = m4is_sg9i6::m4is_prxf($m4is_w_o7al);
 } } elseif (in_array($m4is_yxwn, ['PostalCode', 'PostalCode2', 'PostalCode3'])) { $m4is_w_o7al = strtoupper($m4is_w_o7al);
 } return trim($m4is_w_o7al);
 }  }

