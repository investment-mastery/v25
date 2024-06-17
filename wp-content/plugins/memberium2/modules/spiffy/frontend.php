<?php
/**
 * Copyright (c) 2022-2023 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_rgena { private $m4is_bnd6ti;
 
function __construct() { $this->m4is_x6wv();
 $this->m4is_pbaf3t();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 } private 
function m4is_pbaf3t() { $this->m4is_b8mx();
 add_action( 'memberium/shortcodes/add', [$this, 'm4is_b8mx'], 10, 0 );
 add_action( 'memberium/shortcodes/remove', [$this, 'm4is_bh73'], 10, 0 );
 if ( ! empty( $_POST['memb_form_type'] ) ) { add_action( 'template_redirect', [$this, 'm4is_i5b9l'], 1 );
 } } private 
function m4is_ct5d() { $m4is_kt0n['standard'] = [ 'memb_spiffy_login' => 'm4is_gf1yru', 'memb_spiffy_debug' => 'm4is_cybx', ];
 return $m4is_kt0n;
 } 
function m4is_i5b9l() { $m4is_xqro = strtolower( $_POST['memb_form_type'] );
 $m4is_bic1p = ['memberium/spiffy_login_button' => 'm4is_v8mc'];
 if ( array_key_exists( $m4is_xqro, $m4is_bic1p ) ) { $m4is_m_uwd1 = $m4is_bic1p[$m4is_xqro];
 $this->$m4is_m_uwd1();
 } } 
function m4is_b8mx() { $m4is_iystd2 = $this->m4is_ct5d();
  if ( isset( $m4is_iystd2['standard'] ) && is_array( $m4is_iystd2['standard'] ) ) { foreach( $m4is_iystd2['standard'] as $m4is_mpia => $m4is_cwkrz ) { add_shortcode( $m4is_mpia, [$this, $m4is_cwkrz] );
 } } } 
function m4is_bh73() { $m4is_iystd2 = $this->m4is_ct5d();
 if ( isset( $m4is_iystd2['standard'] ) && is_array( $m4is_iystd2['standard'] ) ) { foreach( $m4is_iystd2['standard'] as $m4is_mpia => $m4is_cwkrz ) { remove_shortcode( $m4is_mpia );
 } } }    
function m4is_gf1yru( $m4is_qnjfv = [], $m4is_z50f = '', $m4is_carw7y = '' ) : string { if ( ! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 if ( ! is_user_logged_in() ) { return '';
 } $m4is_apw6nh = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'spiffy_subdomain' );
 $m4is_r6nh_b = [ 'button_text' => 'Get Spiffy Login', 'button_url' => '', 'css_button_class' => 'memb_spiffy_login_button', 'css_button_id' => 'memb_spiffy_login_button', 'css_button_name' => 'memb_spiffy_login_button', 'css_button_style' => '', 'css_class' => 'memb_spiffy_login_form', 'css_id' => 'memb_spiffy_login_form', 'css_message_class' => 'memb_spiffy_login_message', 'css_message_id' => 'memb_spiffy_login_message', 'css_message_style' => '', 'css_name' => 'memb_spiffy_login_form', 'css_style' => '', 'email' => wp_get_current_user()->user_email, 'message' => 'Please check your email for your Spiffy login link.', 'style' => '', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } if ( empty( $m4is_apw6nh ) && $this->m4is_bnd6ti->m4is_lvmz1b() ) { return "<strong style='color:red;'>Admin Notice:  The [{$m4is_carw7y}] shortcode has been disabled due to missing configuration.</strong>";
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_rbwn1z = [ 'email' => $m4is_qnjfv['email'], 'message' => $m4is_qnjfv['message'], ];
 $m4is_rbwn1z = base64_encode( serialize( $m4is_rbwn1z ) );
 $m4is_k1k7oj = $this->m4is_bnd6ti->m4is_nbmk6( $m4is_rbwn1z );
 $m4is_swtx = wp_nonce_field( 'memb_spiffy_login_' . $m4is_qnjfv['css_id'], '_wpnonce', true, false );
 $m4is_tjg_9 = '';
 $m4is_wbgl5s = $this->m4is_bnd6ti->m4is_cgzvln( 'memb_spiffy_login' );
 if ( ! empty( $m4is_wbgl5s ) ) { $m4is_tjg_9 .= "<div id='{$m4is_qnjfv['css_message_id']}' class='{$m4is_qnjfv['css_message_class']}' style='{$m4is_qnjfv['css_message_style']}'>{$m4is_wbgl5s}</div>";
 } else { $m4is_tjg_9 .= "<form name='{$m4is_qnjfv['css_name']}' id='{$m4is_qnjfv['css_id']}' method='post' action=''>";
 $m4is_tjg_9 .= "<input type='hidden' name='memb_form_type' value='memberium/spiffy_login_button'>";
 $m4is_tjg_9 .= "<input type='hidden' name='form_id' value='{$m4is_qnjfv['css_id']}'>";
 $m4is_tjg_9 .= "<input type='hidden' name='parameters' value='{$m4is_rbwn1z}'>";
 $m4is_tjg_9 .= "<input type='hidden' name='signature' value='{$m4is_k1k7oj}'>";
 $m4is_tjg_9 .= $m4is_swtx;
 if ( empty( $m4is_qnjfv['button_url'] ) ) { $m4is_tjg_9 .= "<input type='submit' style='{$m4is_qnjfv['css_button_style']}' id='{$m4is_qnjfv['css_button_id']}' value='{$m4is_qnjfv['button_text']}'>";
 } else { $m4is_tjg_9 .= "<input type='image' src='{$button_url}' class='{$css_class}' id='{$m4is__0dt14}' >";
 } $m4is_tjg_9 .= "</form>";
 } return $m4is_tjg_9;
 } 
function m4is_cybx( $m4is_qnjfv = [], $m4is_z50f = '', $m4is_carw7y = '' ) : string { if ( ! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_apw6nh = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'spiffy_subdomain' );
 $m4is_d1rjyw = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'spiffy_api_key' );
 if ( is_super_admin() ) { }  return '';
 }    
function m4is_v8mc() { if (! m4is_u68pu::m4is_i9k3m() ) { return;
 } m4is_aoxw::m4is_djr4nd();
 if (! wp_verify_nonce($_POST['_wpnonce'], "memb_spiffy_login_{$_POST['form_id']}") ) { wp_die(_x('Security Check Failed - Nonce Validation Error', 'memb_spiffy_login', 'memberium') );
 exit;
 } if (! $this->m4is_bnd6ti->m4is_tjozx($_POST['signature'], $_POST['parameters']) ) { wp_die(_x('Security Check Failed - Signature Validation Error', 'memb_spiffy_login', 'memberium') );
 exit;
 } $m4is_w6l10_ = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'spiffy_subdomain');
 $m4is_rbwn1z = unserialize(base64_decode($_POST['parameters']));
  $m4is_imdo6 = 'https://api.spiffy.co/customer-portal/auth';
 $m4is_k4yeul = [ 'headers' => [ 'x-subdomain' => $m4is_w6l10_, ], 'body' => [ 'email' => $m4is_rbwn1z['email'], ], 'sslverify' => false, ];
 $m4is_oa_z = wp_remote_post($m4is_imdo6, $m4is_k4yeul);
 $this->m4is_bnd6ti->m4is_bbvp('memb_spiffy_login', $m4is_rbwn1z['message'] );
 } }

