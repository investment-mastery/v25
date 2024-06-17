<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 
class m4is_ag6nr { 
function m4is_sgn9d( $m4is_w_8g ) { if (is_user_logged_in() ) { if (! wp_doing_ajax() ) { $m4is_w_8g['billing']['billing_email']['required'] = 0;
 echo '
				<style>
				#billing_email_field {visibility:hidden;}
				#billing_email_field label span {visibility:hidden;}
				</style>';
 } } return $m4is_w_8g;
 } 
function m4is_ljhm() { $m4is_ua348 = m4is_pms8y::m4is_e5l8a9()->m4is_b8rm();
 $m4is_iystd2['nested'] = [ 'memb_has_in_cart' => [$m4is_ua348, 'm4is_j78nlp'], 'memb_has_purchased_product' => [$m4is_ua348, 'm4is_irgjdu'], 'memb_is_cart_empty' => [$m4is_ua348, 'm4is_eqbp65'], ];
 $m4is_iystd2['standard'] = [];
 foreach( $m4is_iystd2['standard'] as $m4is_mpia => $m4is_cwkrz ) { add_shortcode( $m4is_mpia, [$this, $m4is_cwkrz]);
 } foreach( $m4is_iystd2['nested'] as $m4is_mpia => $m4is_cwkrz ) { add_shortcode( $m4is_mpia, [$this, $m4is_cwkrz[1] ] );
 for ( $i = 1;
 $i < (int) $m4is_cwkrz[0];
 $i++ ) { add_shortcode( $m4is_mpia . $i, [$this, $m4is_cwkrz[1]]);
 } } } 
function m4is_irgjdu( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'product_id' => '', 'txtfmt' => '', 'capture' => '', ];
 $m4is_qnjfv =shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_oa_o = array_filter( explode( ',', $m4is_qnjfv['product_id'] ) );
 $m4is_ig9p6 = get_current_user_id();
 $m4is_uwdfj = false;
 foreach( $m4is_oa_o as $m4is_xbjma ) { $m4is_uwdfj = $m4is_uwdfj || wc_customer_bought_product(null, $m4is_ig9p6, $m4is_xbjma);
 } $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is_uwdfj);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 } 
function m4is_j78nlp( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { global $woocommerce;
 m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'product_id' => '', 'txtfmt' => '', 'capture' => '', ];
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uwdfj = false;
 $m4is_oa_o = explode(',', $m4is_qnjfv['product_id']);
 $m4is_q4om = $woocommerce->cart->get_cart();
 foreach( $m4is_q4om as $m4is_c5zg => $m4is_g0wy ) { $m4is_uwdfj = $m4is_uwdfj || in_array( $m4is_g0wy['product_id'], $m4is_oa_o );
 } $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is_uwdfj);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 } 
function m4is_eqbp65( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { global $woocommerce;
 m4is_aoxw::m4is_djr4nd();
 $m4is_q4om = $woocommerce->cart->get_cart();
 $m4is_uwdfj = empty( $m4is_q4om );
 $m4is_oju3a2 = '';
 $m4is_nbu4n = '';
 $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is_uwdfj);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_oju3a2, $m4is_nbu4n);
 } 
function m4is_asxd( $m4is_ae8w ) { return;
 if ($_SERVER['REMOTE_ADDR'] !== '71.92.64.210') { return;
 } else { $m4is_ae8w = empty($m4is_ae8w) ? 6389 : $m4is_ae8w;
 } $m4is_wdjmn = wc_get_order($m4is_ae8w);
 echo '<Pre>', print_r($m4is_wdjmn, true), '</Pre>';
 die();
 if (is_object($m4is_wdjmn)) { if (! $m4is_wdjmn->has_status('failed') ) { $m4is_b5kaz0 = trim(get_post_meta($m4is_ae8w, 'memberium/purchase/redirect_url', true) );
 if (! empty($m4is_b5kaz0)) { wp_redirect($m4is_b5kaz0);
 exit;
 } } } }    
function m4is_vknw() { echo m4is_ypvg9::m4is_dow7at('', ['display' => true]);
 } 
function m4is_ww61so() { add_action('init', [$this, 'm4is_ljhm'], 1 );
 add_action('woocommerce_thankyou', [$this, 'm4is_asxd'], 20);
 add_action('woocommerce_login_form', [$this, 'm4is_vknw']);
 add_filter('woocommerce_checkout_fields', [$this, 'm4is_sgn9d'], 100, 1);
 } private 
function __construct() { $this->m4is_ww61so();
 if ($_SERVER['REMOTE_ADDR'] == '71.92.64.210') { add_action('template_redirect', [$this, 'm4is_asxd']);
 } } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

