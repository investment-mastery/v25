<?php
/**
 * Copyright (c) 2017-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_uv6ib { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 }  private 
function __construct() {} 
function m4is_rngy3l(){ $m4is_hl8q = 'gutenberg';
 $m4is_twy4g0 = $this->m4is_iwim9( $m4is_hl8q );
 if( empty( $m4is_twy4g0 ) ){ return;
 }  $m4is_a97xh = $this->m4is_zga5_c();
 $m4is_qqwj1c = m4is_jf8abu::PREFIX;
 $m4is_n3zlk = m4is_jf8abu::NS;
 $m4is_etj2 = [ 'WPAL_BLOCKS_PREFIX' => $m4is_qqwj1c, 'WPAL_BLOCKS_SETTINGS_TITLE' => $m4is_a97xh['settings_title'], 'WPAL_BLOCKS_KEYS_REMOVED_TEXT' => $m4is_a97xh['keys_removed_text'], 'debug' => defined('WPAL_BLOCKS_DEBUG') ? WPAL_BLOCKS_DEBUG : 0, 'notices' => [] ];
  $m4is_iystd2 = $this->m4is_i0au6j();
 if( ! empty($m4is_iystd2) ){ $m4is_etj2['tags'] = array_map( function($m4is_g0wy) { return [ 'value' => $m4is_g0wy['id'], 'label' => $m4is_g0wy['text'] ];
 }, $m4is_iystd2 );
 }  $m4is_jucpr = [ 'type' => 'string', 'default' => '' ];
 $m4is_etj2['attributes'] = [ "{$m4is_qqwj1c}_memberships" => $m4is_jucpr ];
 foreach ($m4is_twy4g0 as $m4is_c5zg => $m4is_g0wy) { $m4is_u23rl = isset($m4is_g0wy['type']) && $m4is_g0wy['type'] > '' ? $m4is_g0wy['type'] : false;
 if ( isset($m4is_g0wy['level']) ) { $m4is_twy4g0[$m4is_c5zg]['label'] = str_replace("&nbsp;", " ", $m4is_g0wy['label']);
 } else { $m4is_etj2['attributes'][$m4is_g0wy['name']] = $m4is_jucpr;
 } } $m4is_etj2['controls'] = $m4is_twy4g0;
  $m4is_etj2['omitted_blocks'] = apply_filters("{$m4is_n3zlk}/{$m4is_hl8q}/settings/omitted_blocks", [ 'core/freeform', 'divi/placeholder', 'fl-builder/layout' ] );
  $m4is_c7yri = 'wpal-blocks-gutenberg-editor';
 $m4is_imdo6 = plugin_dir_url(MEMBERIUM_HOME);
 $m4is_smgy = "{$m4is_imdo6}js/gutenberg-editor-access.js";
 $m4is_dko3 = "{$m4is_imdo6}css/gutenberg-editor-access.css";
 $m4is_u5hkwa = [ 'react', 'react-dom', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-data', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-polyfill' ];
 wp_enqueue_script($m4is_c7yri, $m4is_smgy, $m4is_u5hkwa, '1.2.0', false);
 wp_enqueue_style("{$m4is_c7yri}-css", $m4is_dko3, [], '1.2.0', 'all');
 wp_localize_script($m4is_c7yri, 'wpal_blocks_params', $m4is_etj2);
 } 
function m4is_xqc07( $m4is_uqtla3 = false, string $m4is_c7yri = '' ) : string { $m4is_imdo6 = plugin_dir_url(MEMBERIUM_HOME);
 $m4is_bu7y = m4is_pms8y::m4is_e5l8a9()->m4is_u04m();
 wp_register_style("{$m4is_c7yri}_s2css", "{$m4is_imdo6}css/wpal-select2.min.css", false, '4.0.3', 'all');
 wp_register_script("{$m4is_c7yri}_s2js", "{$m4is_imdo6}js/wpal-select2.full.min.js", ['jquery'], '4.0.3', true);
 if( $m4is_uqtla3 ){ wp_enqueue_style("{$m4is_c7yri}_s2css");
 wp_enqueue_script("{$m4is_c7yri}_s2js");
 } return 'wpalSelect2';
 }  
function m4is_exbnvk( string $m4is_hl8q ) : array { $m4is__iju62 = [ 'asset_id' => 0, 'invert_results' => 0 ];
 $m4is_n3zlk = m4is_jf8abu::NS;
 $m4is__iju62 = apply_filters("{$m4is_n3zlk}/{$m4is_hl8q}/disabled/controls", $m4is__iju62);
 return is_array($m4is__iju62) ? $m4is__iju62 : [];
 }  
function m4is_iwim9( string $m4is_hl8q ) : array { $m4is_n3zlk = m4is_jf8abu::NS;
 $m4is_qqwj1c = m4is_jf8abu::PREFIX;
 $m4is_a97xh = $this->m4is_zga5_c();
 $m4is_tiq5k6 = 0;
 $m4is_twy4g0 = [];
 $m4is_mxh3 = 0;
 $m4is_e6c0u = 10;
 $m4is__iju62 = $this->m4is_exbnvk($m4is_hl8q);
 $m4is__mk6 = [ 'type' => 'checkbox', 'default' => '0', 'label_on' => _x('On', "{$m4is_n3zlk}/access/checkbox", $m4is_n3zlk), 'label_off' => _x('Off', "{$m4is_n3zlk}/access/checkbox", $m4is_n3zlk), 'return_value' => '1' ];
  if (! array_key_exists( 'any_membership', $m4is__iju62 ) ){ $m4is_twy4g0[$m4is_tiq5k6] = $m4is__mk6;
 $m4is_twy4g0[$m4is_tiq5k6]['name'] = "{$m4is_qqwj1c}_anymembership";
 $m4is_twy4g0[$m4is_tiq5k6]['label'] = sprintf( _x('Any %s', "{$m4is_n3zlk}/access/membership/level", $m4is_n3zlk), $m4is_a97xh['membership_levels']);
 $m4is_twy4g0[$m4is_tiq5k6]['priority'] = $m4is_mxh3 + $m4is_e6c0u;
 $m4is_twy4g0[$m4is_tiq5k6]['toggles'] = [ 'off' => false, 'on' => [ "{$m4is_qqwj1c}_membership_levels" => true, "{$m4is_qqwj1c}_anonymous_only" => false, "{$m4is_qqwj1c}_loggedin" => false, ] ];
 $m4is_tiq5k6 ++;
 }  $m4is_qh8p6 = $this->m4is_ozc58();
 $m4is_qh8p6 = isset( $m4is_qh8p6 ) && is_array( $m4is_qh8p6 ) ? $m4is_qh8p6 : false;
 $m4is_zbp4 = ! array_key_exists( 'memberships', $m4is__iju62 );
 if ( $m4is_qh8p6 && $m4is_zbp4 ) { foreach ( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { $m4is_twy4g0[$m4is_tiq5k6] = $m4is__mk6;
 $m4is_twy4g0[$m4is_tiq5k6]['name'] = "{$m4is_qqwj1c}_membership_levels-{$m4is_j5sy07}";
 $m4is_twy4g0[$m4is_tiq5k6]['label'] = stripslashes( $m4is_o5xas['name'] ) . "&nbsp;({$m4is_o5xas['level']})";
 $m4is_twy4g0[$m4is_tiq5k6]['priority'] = $m4is_mxh3 + $m4is_e6c0u;
 $m4is_twy4g0[$m4is_tiq5k6]['level'] = $m4is_j5sy07;
 $m4is_twy4g0[$m4is_tiq5k6]['toggles'] = [ 'on' => [ "{$m4is_qqwj1c}_anonymous_only" => false, "{$m4is_qqwj1c}_loggedin" => false ], 'off' => [ "{$m4is_qqwj1c}_anymembership" => false ] ];
 $m4is_tiq5k6 ++;
 } }  if ( ! array_key_exists( 'logged_in_only', $m4is__iju62 ) ){ $m4is_twy4g0[$m4is_tiq5k6] = $m4is__mk6;
 $m4is_twy4g0[$m4is_tiq5k6]['name'] = "{$m4is_qqwj1c}_loggedin";
 $m4is_twy4g0[$m4is_tiq5k6]['label'] = $m4is_a97xh['any_logged_in'];
 $m4is_twy4g0[$m4is_tiq5k6]['priority'] = $m4is_mxh3 + $m4is_e6c0u;
 $m4is_twy4g0[$m4is_tiq5k6]['toggles'] = [ 'on' => [ "{$m4is_qqwj1c}_membership_levels" => false, "{$m4is_qqwj1c}_anymembership" => false, "{$m4is_qqwj1c}_anonymous_only" => false ], 'off' => false, ];
 $m4is_tiq5k6 ++;
 }  if ( ! array_key_exists('logged_out_only', $m4is__iju62 ) ) { $m4is_twy4g0[$m4is_tiq5k6] = $m4is__mk6;
 $m4is_twy4g0[$m4is_tiq5k6]['name'] = "{$m4is_qqwj1c}_anonymous_only";
 $m4is_twy4g0[$m4is_tiq5k6]['label'] = $m4is_a97xh['logged_out_only'];
 $m4is_twy4g0[$m4is_tiq5k6]['priority'] = $m4is_mxh3 + $m4is_e6c0u;
 $m4is_twy4g0[$m4is_tiq5k6]['toggles'] = [ 'off' => false, 'on' => [ "{$m4is_qqwj1c}_membership_levels" => false, "{$m4is_qqwj1c}_anymembership" => false, "{$m4is_qqwj1c}_loggedin" => false ] ];
 $m4is_tiq5k6 ++;
 }  if (! array_key_exists('invert_results', $m4is__iju62) ) { $m4is_twy4g0[$m4is_tiq5k6] = $m4is__mk6;
 $m4is_twy4g0[$m4is_tiq5k6]['name'] = "{$m4is_qqwj1c}_invert_results";
 $m4is_twy4g0[$m4is_tiq5k6]['label'] = $m4is_a97xh['invert'];
 $m4is_twy4g0[$m4is_tiq5k6]['priority'] = $m4is_mxh3 + $m4is_e6c0u;
 $m4is_twy4g0[$m4is_tiq5k6]['description'] = $m4is_a97xh['invert_desc'];
 $m4is_tiq5k6 ++;
 }  $m4is_mcbp7 = [];
 if ( ! array_key_exists( 'tags1', $m4is__iju62 ) ){ $m4is_mcbp7["{$m4is_qqwj1c}_access_tags"] = $m4is_a97xh['require_key'];
 } if ( ! array_key_exists( 'tags2', $m4is__iju62 ) ){ $m4is_mcbp7["{$m4is_qqwj1c}_access_tags2"] = $m4is_a97xh['and_require_key'];
 } if (! empty($m4is_mcbp7) ){ foreach ($m4is_mcbp7 as $name => $label) { $m4is_twy4g0[$m4is_tiq5k6] = [ 'name' => $name, 'type' => 'SELECT2', 'label' => $label, 'priority' => $m4is_mxh3 + $m4is_e6c0u ];
 $m4is_tiq5k6 ++;
 } }  if (! array_key_exists('contact_ids', $m4is__iju62) ) { $m4is_twy4g0[$m4is_tiq5k6] = [ 'name' => "{$m4is_qqwj1c}_contact_ids", 'type' => 'textarea', 'label' => $m4is_a97xh['user_ids'], 'priority' => $m4is_mxh3 + $m4is_e6c0u, 'rows' => 1, 'description' => $m4is_a97xh['user_ids_desc'], 'sanitize' => 'number-csv' ];
 $m4is_tiq5k6 ++;
 }  if (! array_key_exists('eval', $m4is__iju62) ){ $m4is_twy4g0[$m4is_tiq5k6] = [ 'name' => "{$m4is_qqwj1c}_eval", 'type' => 'textarea', 'label' => $m4is_a97xh['eval'], 'priority' => $m4is_mxh3 + $m4is_e6c0u, 'rows' => 1, 'description' => $m4is_a97xh['eval_desc'] ];
 $m4is_tiq5k6 ++;
 }  if (! array_key_exists( 'asset_id', $m4is__iju62) ){ $m4is_twy4g0[$m4is_tiq5k6] = [ 'name' => "{$m4is_qqwj1c}_asset_id", 'type' => 'text', 'label' => $m4is_a97xh['asset_id'], 'priority' => $m4is_mxh3 + $m4is_e6c0u, 'description' => $m4is_a97xh['asset_id_desc'], 'sanitize' => 'slugify' ];
 } return apply_filters("{$m4is_n3zlk}/{$m4is_hl8q}/control/config", $m4is_twy4g0);
 }  
function m4is_ozc58(){ $m4is_qh8p6 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('memberships');
 return is_array($m4is_qh8p6) ? $m4is_qh8p6 : [];
 }  
function m4is_zga5_c( $m4is_s2ge5 = false, $m4is_hl8q = '' ) { $m4is_n3zlk = m4is_jf8abu::NS;
 $m4is_hl8q = ! empty( $m4is_hl8q ) ? "{$m4is_n3zlk}/access" : '';
  $m4is_a97xh = [ 'all_visitors' => 'All Visitors', 'and_key_desc' => 'The contact must have both the 1st Tag ID(s) AND this Tag ID(s) in order to view this item and these settings are only available for logged in users.', 'and_key_name' => 'AND Tag ID(s)', 'and_require_key' => 'AND Require Tag ID(s)', 'any_logged_in' => 'Any Logged In User', 'any_membership' => 'Any Membership Level', 'asset_id_desc' => 'Enter an admin ID to be used for filters. Non-leading _ and alpha / numerical characters only.', 'asset_id' => 'Asset ID', 'eval_desc' => 'Enter a boolean expression which evaluates to true to show or false to hide this element.', 'eval' => 'PHP Boolean Expression', 'hide' => 'Hide Completely', 'key_name' => 'Tag ID(s)', 'keys_removed_text' => 'Notice : The following Tag ID(s) have been removed', 'logged_in_msg' => 'settings are only available for logged in users.', 'logged_in_only' => 'Logged In Users Only', 'logged_out_only' => 'Logged Out Only', 'logged_out_user' => 'Logged Out Visitors Only', 'membership_levels' => 'Membership Levels', 'memberships' => 'Memberships', 'prohibited_action' => 'When Prohibited :', 'redirect_url' => 'Redirect URL', 'redirect' => 'Redirect', 'require_key' => 'Require Tag ID(s)', 'settings_title' => 'Memberium', 'user_ids_desc' => 'Comma Seperated values. Example : 123,456,789', 'user_ids' => 'Require User IDs', 'user_status' => 'User Status', ];
 if( is_string( $m4is_s2ge5 ) ){ return ! empty( $m4is_a97xh[$m4is_s2ge5] ) ? _x( $m4is_a97xh[$m4is_s2ge5], $m4is_hl8q, $m4is_n3zlk ) : '';
 } else{ return $m4is_a97xh;
 } }    
function m4is_l_cq( string $m4is_u23rl ) : array { $m4is_a97xh = $this->m4is_zga5_c();
 $m4is_twy4g0 = [ [ 'name' => 'status', 'label' => $m4is_a97xh['user_status'], 'type' => 'select2', 'data' => 'status', 'disable-search' => true, 'change' => "statusToggle", 'priority' => 100 ], [ 'name' => 'memberships', 'label' => $m4is_a97xh['memberships'], 'info' => "{$m4is_a97xh['memberships']} {$m4is_a97xh['logged_in_msg']}", 'type' => 'select2', 'data' => 'levels', 'change' => "contactToggle", 'multiple' => 1, 'priority' => 200 ], [ 'name' => 'tags1', 'label' => $m4is_a97xh['key_name'], 'info' => "{$m4is_a97xh['key_name']} {$m4is_a97xh['logged_in_msg']}", 'type' => 'select2', 'data' => 'keys', 'change' => "contactToggle", 'multiple' => 1, 'priority' => 300 ], [ 'name' => 'tags2', 'label' => $m4is_a97xh['and_key_name'], 'info' => $m4is_a97xh['and_key_desc'], 'type' => 'select2', 'data' => 'keys', 'change' => "contactToggle", 'multiple' => 1, 'priority' => 400 ], [ 'name' => 'eval', 'label' => $m4is_a97xh['eval'], 'type' => 'textarea', 'desc' => $m4is_a97xh['eval_desc'], 'priority' => 500 ], ];
 if( $m4is_u23rl === 'taxonomy' ){ $m4is_twy4g0[] = [ 'name' => 'prohibited_action', 'label' => $m4is_a97xh['prohibited_action'], 'type' => 'select2', 'data' => 'prohibited_actions', 'change' => 'prohibitedActionToggle', 'disable-search' => true, 'priority' => 600 ];
 $m4is_twy4g0[] = [ 'name' => 'redirect_url', 'label' => $m4is_a97xh['redirect_url'], 'type' => 'text', 'priority' => 700 ];
 } return $m4is_twy4g0;
 } 
function m4is_g6n14(){ return apply_filters('memberium/access/logged_in_only/fields', ['memberships', 'tags1', 'tags2'] );
 } 
function m4is_j4mv( array $m4is_etj2 ) : array { $m4is_z2gyof = apply_filters( 'memberium/access/logged_in_settings', [ 'any_membership' => 1, 'memberships' => 1, 'tags1' => 1, 'tags2' => 1 ]);
 if ( is_array( $m4is_z2gyof ) && ! empty( $m4is_z2gyof ) ) { foreach ( $m4is_z2gyof as $m4is_s2ge5 => $m4is_w_o7al ) { if ( array_key_exists( $m4is_s2ge5, $m4is_etj2 ) ) { unset( $m4is_etj2[$m4is_s2ge5] );
 } } } return $m4is_etj2;
 } 
function m4is_vi9m($m4is_p1hqu) { $m4is_qh8p6 = empty($m4is_p1hqu) ? [] : array_filter( explode(',', $m4is_p1hqu) );
 return in_array('any_membership', $m4is_qh8p6) ? 'any_membership' : $m4is_p1hqu;
 } 
function m4is_zomqs6( string $type ){ $m4is_juks10 = plugin_dir_url(MEMBERIUM_HOME);
 $m4is_smgy = "{$m4is_juks10}js/core-wp-asset-access.js";
 $m4is_bu7y = m4is_pms8y::m4is_e5l8a9()->m4is_u04m();
 $m4is_c7yri = "memb-core-wp-asset-access-js";
  $this->m4is_xqc07( true );
 wp_register_style('memberium_admin_css', $m4is_juks10 . 'css/admin.css', false, $m4is_bu7y, 'all');
 wp_enqueue_style('memberium_admin_css');
  $m4is_etj2 = [ 'type' => $type, 'select2Data' => [ 'levels' => $this->m4is_n1g9(), 'keys' => $this->m4is_i0au6j(), 'status' => $this->m4is_imyp(), 'prohibited_actions' => $this->m4is_ppi2ns() ], 'I18n' => [ 'ids_removed' => $this->m4is_zga5_c('keys_removed_text') ], 'loggedInOnlyKeys' => $this->m4is_g6n14() ];
  wp_enqueue_script($m4is_c7yri, $m4is_smgy, ['jquery'], $m4is_bu7y, true);
 wp_localize_script($m4is_c7yri, "membCoreAssetsAccessData", $m4is_etj2);
 unset($m4is_juks10, $m4is_smgy, $m4is_bu7y, $m4is_c7yri, $m4is_etj2);
 }    
function m4is_n1g9() : array { static $m4is_px1at = [];
 if ( empty( $m4is_px1at ) ) { $m4is_qh8p6 = $this->m4is_ozc58();
 $m4is_px1at = [ [ 'id' => 'any_membership', 'text' => $this->m4is_zga5_c( 'any_membership' ) ] ];
 if( ! empty( $m4is_qh8p6 ) ) { foreach ( $m4is_qh8p6 as $m4is_j5sy07 => $m4is_jzshu ) { $m4is_px1at[] = [ 'id' => $m4is_j5sy07, 'text' => stripslashes( $m4is_jzshu['name'] ) . " ({$m4is_jzshu['level']})" ];
 } } } return $m4is_px1at;
 } 
function m4is_i0au6j() : array { static $m4is_flx71n = [];
 if( empty( $m4is_flx71n ) ) { $m4is_jxhf = m4is_pwtg7::m4is_qasq2( [], '' );
 if( ! empty( $m4is_jxhf ) ) { $m4is_flx71n = array_map( function( $m4is_c5zg, $m4is_g0wy ) { return [ 'id' => $m4is_c5zg, 'text' => $m4is_g0wy ];
 }, array_keys( $m4is_jxhf ), $m4is_jxhf );
 } } return $m4is_flx71n;
 } 
function m4is_imyp() : array { $m4is_a97xh = $this->m4is_zga5_c();
 return [ [ 'id' => '', 'text' => $m4is_a97xh['all_visitors'] ], [ 'id' => '1', 'text' => $m4is_a97xh['logged_in_only'] ], [ 'id' => '2', 'text' => $m4is_a97xh['logged_out_user'] ] ];
 } 
function m4is_ppi2ns() : array { $m4is_a97xh = $this->m4is_zga5_c();
 return [ [ 'id' => '', 'text' => $m4is_a97xh['hide'] ], [ 'id' => '1', 'text' => $m4is_a97xh['redirect'] ] ];
 } }

