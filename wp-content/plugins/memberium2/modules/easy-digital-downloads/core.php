<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_op7f3u' ) || die();
 final 
class m4is_op7f3u { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 $this->m4is_jq0ld();
 }    private 
function m4is_jq0ld() { if ( is_admin() ) { include_once __DIR__ . '/admin.php';
 m4is_dvte::m4is_e5l8a9();
 } }    
function m4is_f9tu() { return [ '_memberium_access_tag', '_memberium_canc_tag', '_memberium_main_tag', '_memberium_payf_tag', '_memberium_trial_tag', ];
 } 
function m4is_isgbj($m4is_cd8k) { return [ 'main' => (string) get_post_meta($m4is_cd8k, '_memberium_access_tag', true), 'trial' => (string) get_post_meta($m4is_cd8k, '_memberium_trial_tag', true), 'payf' => (string) get_post_meta($m4is_cd8k, '_memberium_payf_tag', true), 'canc' => (string) get_post_meta($m4is_cd8k, '_memberium_canc_tag', true), ];
 } 
function m4is_nkzarw( $m4is_xbjma, $m4is_ig9p6 = 0 ) { $m4is_hfxyia = [ 'active', 'trialling', 'failing', ];
 $m4is_ig9p6 = empty($m4is_ig9p6) ? get_current_user_id() : $ev_user_id;
 $m4is_p5pi = new EDD_Recurring_Subscriber( $m4is_ig9p6, true );
 $m4is_wb9f = $m4is_p5pi->get_subscriptions( $m4is_xbjma, $m4is_hfxyia );
 return count($m4is_wb9f) > 1;
 }    
function m4is_mw0x($m4is_c0b6) { $m4is_e2kg = 0;
 $m4is_hgw8mf = edd_get_payment_meta($m4is_c0b6);
 $m4is_ig9p6 = empty($m4is_hgw8mf['user_info']['id']) ? 0 : $m4is_hgw8mf['user_info']['id'];
 $m4is_kwf563 = edd_get_payment_meta_cart_details($m4is_c0b6);
  if (! $m4is_ig9p6) { $m4is_n10t = empty($m4is_hgw8mf['user_info']['email']) ? '' : $m4is_hgw8mf['user_info']['email'];
 if ($m4is_n10t) { $m4is_x0_hk = get_user_by('email', $m4is_n10t);
 $m4is_ig9p6 = is_a( $m4is_x0_hk, 'WP_User' ) ?$m4is_x0_hk->ID : 0;
 } }  if ($m4is_ig9p6) { $m4is_e2kg = (int) m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_osi9 = [];
 foreach ($m4is_kwf563 as $m4is_qqec2k) { $m4is_xs4t = empty($m4is_qqec2k['id']) ? 0 : $m4is_qqec2k['id'];
 $m4is_oa_j2 = $this->m4is_isgbj($m4is_xs4t);
 $m4is_osi9[] = $m4is_oa_j2['main'];
 $m4is_osi9[] = (0 - $m4is_oa_j2['canc']);
 $m4is_osi9[] = (0 - $m4is_oa_j2['payf']);
 } $m4is_osi9 = array_unique($m4is_osi9, SORT_NUMERIC);
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_osi9, $m4is_e2kg );
 } } } 
function m4is_uij9eu($m4is_d9ybqg, $m4is_etj2) { $m4is_crd27b = empty($m4is_etj2['customer_id']) ? 0 : $m4is_etj2['customer_id'];
 $m4is_zg8z = empty($m4is_etj2['status']) ? '' : $m4is_etj2['status'];
 $m4is_xbjma = empty($m4is_etj2['product_id']) ? 0 : $m4is_etj2['product_id'];
 $m4is_ig9p6 = empty($m4is_etj2['user_id']) ? 0 : $m4is_etj2['user_id'];
 if ($m4is_ig9p6) { $m4is_e2kg = (int) m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_oa_j2 = $this->m4is_isgbj($m4is_xbjma);
 $m4is_osi9 = [];
 if ($m4is_zg8z == 'trialling') { $m4is_osi9[] = $m4is_oa_j2['trial'];
 } $m4is_osi9 = array_unique($m4is_osi9, SORT_NUMERIC);
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_osi9, $m4is_e2kg );
 } } } 
function m4is_x6nq( $m4is_ymqci, $m4is_q8wd, $m4is__oep ) { if ($m4is_ymqci !== $m4is_q8wd) { $m4is_crd27b = $m4is__oep->customer_id;
 $m4is_zt_2o8 = new EDD_Customer($m4is_crd27b);
 $m4is_ig9p6 = $m4is_zt_2o8->user_id;
 $m4is_xbjma = $m4is__oep->product_id;
 $m4is_vdp2 = $self->m4is_nkzarw( $m4is_xbjma, $m4is_ig9p6 );
 if ($m4is_ig9p6) { $m4is_e2kg = (int) m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_osi9 = [];
 $m4is_oa_j2 = $this->m4is_isgbj($m4is_xbjma);
 if ($m4is_q8wd == 'active') { $m4is_osi9[] = $m4is_oa_j2['main'];
 $m4is_osi9[] = ( 0 - $m4is_oa_j2['trial'] );
 $m4is_osi9[] = ( 0 - $m4is_oa_j2['canc'] );
 $m4is_osi9[] = ( 0 - $m4is_oa_j2['payf'] );
 } elseif ($m4is_q8wd == 'cancelled') { $m4is_osi9[] = $m4is_oa_j2['canc'];
 $m4is_osi9[] = ( 0 - $m4is_oa_j2['trial'] );
 } elseif ($m4is_q8wd == 'expired') { $m4is_osi9[] = $m4is_oa_j2['payf'];
 $m4is_osi9[] = ( 0 - $m4is_oa_j2['trial'] );
 } elseif ($m4is_q8wd == 'completed') { $m4is_osi9[] = ( 0 - $m4is_oa_j2['main'] );
 $m4is_osi9[] = ( 0 - $m4is_oa_j2['trial'] );
 } elseif ($m4is_q8wd == 'failing') {  } m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_osi9, $m4is_e2kg );
 } } } }    private 
function m4is_ww61so() { add_action( 'edd_complete_purchase', [$this, 'm4is_mw0x'] );
 add_action( 'edd_subscription_post_create', [$this, 'm4is_uij9eu'], 10, 2);
 add_action( 'edd_subscription_status_change', [$this, 'm4is_x6nq'], 10, 3 );
 } }

