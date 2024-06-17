<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_i5kp { 
function process_path_protect_rules() { $m4is_dji0t = $_SERVER['REQUEST_URI'];
 $m4is_v6fdv4 = '';
 $m4is_b5kaz0 = get_site_url();
 $m4is_w2w8 = $this->m4is_zabs();
 $m4is_i9a1gn = function_exists( 'is_user_logged_in' ) ? is_user_logged_in() : false;
 if (! empty($m4is_w2w8['rules']) && is_array($m4is_w2w8['rules'])) { foreach ( $m4is_w2w8['rules'] as $m4is_h2qh ) { $m4is_h2qh['urls'] = isset( $m4is_h2qh['urls'] ) ? $m4is_h2qh['urls'] : '';
 $m4is_kvoe1y = array_filter( array_map( 'trim', array_filter( explode( "\n", $m4is_h2qh['urls'] ) ) ) );
 if ( is_array($m4is_kvoe1y) ) { foreach( $m4is_kvoe1y as $m4is_imdo6 ) { if ( strpos( $m4is_dji0t, $m4is_imdo6 ) === 0 ) { $m4is_q10b76 = true;
 if ( $m4is_h2qh['logged_in'] == 1 && ! $m4is_i9a1gn ) { $m4is_q10b76 = false;
 } if ( $m4is_h2qh['anonymous_only'] == 1 && $m4is_i9a1gn ) { $m4is_q10b76 = false;
 } if ( ! $m4is_q10b76 ) { $m4is_v6fdv4 = $m4is_h2qh['prohibited_action'];
 $m4is_b5kaz0 = $m4is_h2qh['redirect_url'];
 break;
 } } } } } } if ( $m4is_v6fdv4 == 'hide' ) { include( get_query_template( '404' ) );
 exit;
 } elseif ( $m4is_v6fdv4 == 'redirect' ) { m4is_aoxw::m4is_djr4nd();
 nocache_headers();
 wp_redirect($m4is_b5kaz0);
 exit;
 } } private 
function m4is_zabs() { $m4is_s2ge5 = 'WPAL/pathprotect/settings';
 $m4is_eay0 = 'MemberiumPathProtect';
 $m4is_w2w8 = get_option($m4is_s2ge5, false);
 if ($m4is_w2w8 === false) { $m4is_w2w8 = get_option($m4is_eay0, '');
 if (is_array($m4is_w2w8) ) { update_option($m4is_s2ge5, $m4is_w2w8);
 } } if (! is_array($m4is_w2w8) ) { $m4is_w2w8 = [];
 } return $m4is_w2w8;
 } 
function __construct() { global $pagenow;
 if ( ! in_array($pagenow, ['wp-login.php', 'wp-register.php']) ) { add_action( 'init', [$this, 'process_path_protect_rules'] );
 } } }

