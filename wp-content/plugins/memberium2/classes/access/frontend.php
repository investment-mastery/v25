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
class m4is_nfu7hp { private $m4is_rl8j = [],  $m4is_y_j1 = [],  $m4is_ssbvrt = [],  $m4is_yc9sj = [],  $m4is_e7sk = [ 'any_membership', 'contact_ids', 'eval', 'invert_results', 'logged_in_only', 'logged_out_only', 'memberships', 'tags1', 'tags2' ], $m4is_lulp1 = [ 'any_membership' => 0, 'asset_id' => '', 'contact_ids' => '', 'eval' => '', 'invert_results' => 0, 'logged_in_only' => 0, 'logged_out_only' => 0, 'memberships' => '', 'tags1' => '', 'tags2' => '' ];
 static 
function m4is_e5l8a9(){ static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 }  private 
function __construct() {} 
function m4is_gz5hgo( array $m4is_x2y8, string $m4is_u23rl ) : bool {  static $m4is_szi8 = [];
 $m4is_r6nh_b = [ 'any_membership' => 0, 'asset_id' => '', 'contact_ids' => '', 'eval' => '', 'invert_results' => 0, 'logged_in_only' => 0, 'logged_out_only' => 0, 'memberships' => '', 'tags1' => '', 'tags2' => '' ];
 $m4is_gy34l = wp_parse_args( $m4is_x2y8, $m4is_r6nh_b );
 if ( ! empty( $m4is_gy34l['contact_ids'] ) ) { $m4is_gy34l['contact_ids'] = $this->m4is_pnb1( (string) $m4is_gy34l['contact_ids'] );
 } if ( ! empty($m4is_gy34l['asset_id']) ){ $m4is_gy34l['asset_id'] = $this->m4is_pnb1( (string) $m4is_gy34l['asset_id'] );
 }  $m4is_q_ob6 = md5 (serialize( $m4is_gy34l ) );
 if ( ! array_key_exists( $m4is_q_ob6, $m4is_szi8 ) ) { $m4is_szi8[$m4is_q_ob6] = m4is_w0enbm::m4is_e5l8a9()->m4is_ux59ig( true, $m4is_gy34l, $m4is_u23rl, $m4is_gy34l['asset_id'] );
 } return $m4is_szi8[$m4is_q_ob6];
 } 
function m4is_pnb1( string $m4is_x_rxou ) : string { return trim( str_replace( [" ", "-", "\n", "\r", "\t"], '', $m4is_x_rxou ), ',' );
 }     
function m4is_ny06( $m4is_ig7q, $m4is_kc_2 ) { if( empty( $m4is_ig7q ) ) { return $m4is_ig7q;
  } $m4is_x2y8 = $m4is_kc_2['attrs'];
  if ( empty( $m4is_x2y8 ) ) {  if ( empty( $m4is_kc_2['blockName'] ) ) {  $m4is_kt0n = $this->m4is_gwq9b( $m4is_ig7q );
 if ($m4is_kt0n){ foreach ($m4is_kt0n as $m4is_kjxmq) { $m4is_ig7q = str_replace($m4is_kjxmq, '', $m4is_ig7q);
 } return $m4is_ig7q;
 }  else { return $m4is_ig7q;
 } }  else { return $m4is_ig7q;
 } }  else { $m4is_s_z6v = $this->m4is_o6vl( $m4is_x2y8 );
 return $m4is_s_z6v ? $m4is_ig7q : '';
 } }  
function m4is_gwq9b( $m4is_ig7q ){ $m4is_kt0n = [];
 preg_match_all( '/' . get_shortcode_regex() . '/', $m4is_ig7q, $m4is_ogxo, PREG_SET_ORDER );
 foreach ( $m4is_ogxo as $m4is_kjxmq ) { $m4is_x2y8 = empty( $m4is_kjxmq[3] ) ? false : shortcode_parse_atts( $m4is_kjxmq[3] );
 if ( $m4is_x2y8 ) {  $m4is_z1por = $this->m4is_o6vl( $m4is_x2y8 );
  if (! $m4is_z1por) { $m4is_kt0n[] = $m4is_kjxmq[0];
 } } } return empty( $m4is_kt0n ) ? false : $m4is_kt0n;
 }  
function m4is_o6vl( array $m4is_x2y8 ) : bool { $m4is_cwkrz = m4is_jf8abu::PREFIX;
 $m4is_gqid = [ 'memberships' => empty( $m4is_x2y8["{$m4is_cwkrz}_memberships"] ) ? '' : $m4is_x2y8["{$m4is_cwkrz}_memberships"], 'any_membership' => isset( $m4is_x2y8["{$m4is_cwkrz}_anymembership"] ) && $m4is_x2y8["{$m4is_cwkrz}_anymembership"] === 'on' ? 1 : 0, 'logged_in_only' => isset( $m4is_x2y8["{$m4is_cwkrz}_loggedin"] ) && $m4is_x2y8["{$m4is_cwkrz}_loggedin"] === 'on' ? 1 : 0, 'logged_out_only' => isset( $m4is_x2y8["{$m4is_cwkrz}_anonymous_only"] ) && $m4is_x2y8["{$m4is_cwkrz}_anonymous_only"] === 'on' ? 1 : 0, 'invert_results' => isset( $m4is_x2y8["{$m4is_cwkrz}_invert_results"] ) && $m4is_x2y8["{$m4is_cwkrz}_invert_results"] === 'on' ? 1 : 0, 'contact_ids' => empty( $m4is_x2y8["{$m4is_cwkrz}_contact_ids"] ) ? '' : sanitize_text_field( $m4is_x2y8["{$m4is_cwkrz}_contact_ids"] ), 'tags1' => empty( $m4is_x2y8["{$m4is_cwkrz}_access_tags"] ) ? '' : $m4is_x2y8["{$m4is_cwkrz}_access_tags"], 'tags2' => empty( $m4is_x2y8["{$m4is_cwkrz}_access_tags2"] ) ? '' : $m4is_x2y8["{$m4is_cwkrz}_access_tags2"], 'eval' => empty( $m4is_x2y8["{$m4is_cwkrz}_eval"] ) ? '' : trim( $m4is_x2y8["{$m4is_cwkrz}_eval"] ), 'asset_id' => empty( $m4is_x2y8["{$m4is_cwkrz}_asset_id"] ) ? '' : sanitize_text_field( $m4is_x2y8["{$m4is_cwkrz}_asset_id"] ), ];
 return $this->m4is_gz5hgo( $m4is_gqid, 'gutenberg' );
 }     
function m4is_r3ya6( $m4is__ql9vk, $m4is_n01k, $m4is_k4yeul ) { $m4is_agt62d = [];
 $m4is_i6f5 = is_object( $m4is_n01k ) && isset( $m4is_n01k->slug ) ? $m4is_n01k->slug : 'default';
 if ( is_array( $m4is__ql9vk ) && ! empty( $m4is__ql9vk ) ) { foreach ( $m4is__ql9vk as $m4is_tiq5k6 => $m4is_f852 ) { if ( $this->m4is_jo0_a($m4is_f852, $m4is__ql9vk, $m4is_i6f5) ) { $m4is_agt62d[] = $m4is_f852;
 } } $m4is__ql9vk = $m4is_agt62d;
 } return $m4is__ql9vk;
 }  
function m4is_jo0_a( $m4is_f852, $m4is__ql9vk, $m4is_i6f5 ) { $m4is_i6f5 = empty( $m4is_i6f5 ) ? 'default' : $m4is_i6f5;
 $m4is_j5sy07 = $m4is_f852->ID;
 $m4is_kb24ju = $m4is_f852->menu_item_parent;
 if ( ! isset( $this->m4is_y_j1[$m4is_i6f5] ) ) { $this->m4is_y_j1[$m4is_i6f5] = [];
 } $m4is_y_j1 = $this->m4is_y_j1[$m4is_i6f5];
  if ( isset( $m4is_y_j1[$m4is_j5sy07] ) ) { return $m4is_y_j1[$m4is_j5sy07];
 }  $m4is_p51e_l = m4is_jf8abu::m4is_e5l8a9()->m4is__9ao( $m4is_j5sy07 );
  if (empty($m4is_p51e_l) ) { $m4is_y_j1 = $this->m4is_aige($m4is_f852, $m4is__ql9vk, $m4is_i6f5);
 return $m4is_y_j1[$m4is_j5sy07];
 } $m4is_ny_s = apply_filters("wpal/menu/{$m4is_i6f5}/item/visibility", $m4is_p51e_l, $m4is_j5sy07);
 $m4is_gy34l = wp_parse_args( $m4is_ny_s, $this->m4is_lulp1 );
 if (m4is_aoxw::m4is_zshfjo() ) { $m4is_flx71n = $this->m4is_e7sk;
 foreach($this->m4is_e7sk as $m4is_s2ge5) { if (! empty($m4is_gy34l[$m4is_s2ge5]) ) { m4is_aoxw::m4is_djr4nd();
 break;
 } } } $m4is__osh1e = $this->m4is_gz5hgo( $m4is_gy34l, $m4is_i6f5 );
 if ($m4is__osh1e ) {  $m4is_y_j1 = $this->m4is_aige($m4is_f852, $m4is__ql9vk, $m4is_i6f5);
 $m4is__osh1e = $m4is_y_j1[$m4is_j5sy07];
 } return $m4is__osh1e;
 }  
function m4is_aige( $m4is_f852, $m4is__ql9vk, $m4is_i6f5 ) {  $m4is_kb24ju = $m4is_f852->menu_item_parent;
 $m4is_y_j1 = $this->m4is_y_j1[$m4is_i6f5];
 $m4is_s7bgu5 = $m4is_f852->ID;
 $m4is_y_j1[$m4is_s7bgu5] = true;
 if ($m4is_kb24ju > 0 ) {  if ( ! isset($m4is_y_j1[$m4is_kb24ju]) ) { $m4is_pjtbn = $this->m4is_odx3t($m4is_f852, $m4is__ql9vk);
 $m4is_y_j1[$m4is_kb24ju] = $this->m4is_jo0_a($m4is_pjtbn, $m4is__ql9vk, $m4is_i6f5);
 } $m4is_y_j1[$m4is_s7bgu5] = $m4is_y_j1[$m4is_kb24ju];
 }  $this->m4is_y_j1[$m4is_i6f5] = $m4is_y_j1;
 return $m4is_y_j1;
 }  
function m4is_odx3t($m4is_f852, $m4is__ql9vk) { $m4is_pjtbn = false;
 $m4is_kb24ju = $m4is_f852->menu_item_parent;
 if ($m4is_kb24ju > 0) { $m4is_fa7l = array_search( $m4is_kb24ju, array_column($m4is__ql9vk, 'ID') );
 if ($m4is_fa7l !== false ) { $m4is_pjtbn = $m4is__ql9vk[$m4is_fa7l];
 } } return $m4is_pjtbn;
 }    
function m4is_ovu4f($m4is_zvbig){ if ( is_customize_preview() ){ return $m4is_zvbig;
 } global $wp_registered_widgets;
 if( empty($wp_registered_widgets) ){ return $m4is_zvbig;
 } foreach($m4is_zvbig as $m4is_gkl21 => $m4is_rl8j){ if ($m4is_gkl21 == 'wp_inactive_widgets' || empty($m4is_rl8j)){ continue;
 } foreach($m4is_rl8j as $m4is_tiq5k6 => $m4is_j5sy07){ $m4is__osh1e = $this->m4is_dsgxw($m4is_j5sy07, $m4is_gkl21);
 if (is_null($m4is__osh1e) ) { $m4is_wqb_d0 = isset($wp_registered_widgets[$m4is_j5sy07]['callback'][0]->option_name) ? $wp_registered_widgets[$m4is_j5sy07]['callback'][0]->option_name : '';
 $m4is_s2ge5 = isset($wp_registered_widgets[$m4is_j5sy07]['params'][0]['number']) ? $wp_registered_widgets[$m4is_j5sy07]['params'][0]['number'] : '';
 $m4is_vz97b4 = get_option($m4is_wqb_d0);
 $m4is_vz97b4 = is_array($m4is_vz97b4) && isset($m4is_vz97b4[$m4is_s2ge5]) ? $m4is_vz97b4[$m4is_s2ge5] : null;
 if (is_array($m4is_vz97b4) && ! empty($m4is_vz97b4['content']) ){ $m4is_kc_2 = parse_blocks($m4is_vz97b4['content']);
 $m4is_x2y8 = isset($m4is_kc_2[0]) ? $m4is_kc_2[0]['attrs'] : [];
 $m4is__osh1e = $this->m4is_i4hld($m4is_j5sy07, $m4is_x2y8, $m4is_gkl21);
 } else{ $m4is__osh1e = $this->m4is_om9n($m4is_j5sy07, $m4is_gkl21);
 } } $this->m4is_rl8j[$m4is_gkl21][$m4is_j5sy07] = $m4is__osh1e;
 if( ! $m4is__osh1e ){ unset($m4is_zvbig[$m4is_gkl21][$m4is_tiq5k6]);
 } } } return $m4is_zvbig;
 }  
function m4is_pqd2x3($m4is_ye0_i, $m4is_zhfuk3, $m4is_k4yeul){ $m4is_slqy75 = empty($m4is_k4yeul['id']) ? 'custom' : $m4is_k4yeul['id'];
 $m4is__osh1e = $this->m4is_dsgxw($m4is_zhfuk3->id, $m4is_slqy75);
 if( is_null($m4is__osh1e) ){  if (is_a($m4is_zhfuk3, 'WP_Widget_Block')) { $m4is_kc_2 = empty($m4is_ye0_i['content']) ? [] : parse_blocks($m4is_ye0_i['content']);
 $m4is_x2y8 = isset($m4is_kc_2[0]) ? $m4is_kc_2[0]['attrs'] : [];
 $m4is__osh1e = $this->m4is_i4hld($m4is_zhfuk3->id, $m4is_x2y8, $m4is_slqy75);
 } else{ $m4is__osh1e = $this->m4is_om9n($m4is_zhfuk3->id, $m4is_slqy75);
 } } return $m4is__osh1e ? $m4is_ye0_i : false;
 } 
function m4is_i4hld( $m4is_j5sy07, $m4is_x2y8, $m4is_slqy75 ){ $m4is_x2y8 = empty($m4is_x2y8) ? $m4is_x2y8 : $this->m4is_o6vl($m4is_x2y8);
 $this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07] = $this->m4is_z13g8( $m4is_j5sy07, $m4is_x2y8, $m4is_slqy75 );
 return $this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07];
 }  
function m4is_om9n($m4is_j5sy07, $m4is_slqy75){ $m4is__osh1e = $this->m4is_dsgxw($m4is_j5sy07, $m4is_slqy75);
 if( is_null($m4is__osh1e) ){ if (preg_match('/^(.+)-(\d+)$/', $m4is_j5sy07, $m4is_szl_j) ){ $m4is__1jv = $m4is_szl_j[1];
 $m4is_tiq5k6 = $m4is_szl_j[2];
 $m4is_w2w8 = get_option("widget_{$m4is__1jv}");
 $m4is_w2w8 = empty($m4is_w2w8[$m4is_tiq5k6]) ? [] : $m4is_w2w8[$m4is_tiq5k6];
 $m4is__osh1e = $this->m4is_z13g8( $m4is_j5sy07, $m4is_w2w8, $m4is_slqy75 );
 $this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07] = $m4is__osh1e;
 } else{ $this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07] = true;
 } } return $this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07];
 } 
function m4is_dsgxw( $m4is_j5sy07, $m4is_slqy75 ){ if( ! isset($this->m4is_rl8j[$m4is_slqy75]) ){ $this->m4is_rl8j[$m4is_slqy75] = [];
 } return isset($this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07]) ? $this->m4is_rl8j[$m4is_slqy75][$m4is_j5sy07] : null;
 } 
function m4is_z13g8( $m4is_j5sy07, $m4is_w2w8, $m4is_slqy75 ){ $m4is_agt62d = apply_filters("memberium/widget/visibility", $m4is_w2w8, $m4is_j5sy07, $m4is_slqy75);
 $m4is_gy34l = wp_parse_args( $m4is_agt62d, $this->m4is_lulp1 );
 if (m4is_aoxw::m4is_zshfjo() ) { foreach ($this->m4is_e7sk as $m4is_s2ge5) { if (! empty($m4is_gy34l[$m4is_s2ge5]) ) { m4is_aoxw::m4is_djr4nd();
 break;
 } } } return $this->m4is_gz5hgo( $m4is_gy34l, 'widget-area' );
 }     
function m4is_fm6e_q($m4is_jo8fb) { if (! is_admin() && $m4is_jo8fb->is_main_query() ) {  if (is_archive() ) { $m4is_fa6l = m4is_jf8abu::m4is_e5l8a9()->m4is_i8vgc();
 $m4is_ef5iob = get_queried_object();
 $m4is_xtl7we = isset($m4is_ef5iob->taxonomy) ? $m4is_ef5iob->taxonomy : false;
 if( $m4is_xtl7we && in_array($m4is_xtl7we, $m4is_fa6l) ){ $this->m4is_s2ai5q($m4is_jo8fb);
 } } } }  
function m4is_rj9bp($m4is_zmzne8, $m4is_xtl7we, $m4is_pgowt, $m4is_dv5udg) { foreach($m4is_zmzne8 as $m4is_j5sy07 => $m4is_bnfo3) { if ( is_a($m4is_bnfo3, 'WP_Term') && $m4is_bnfo3->taxonomy == 'category' ) { if (! $this->m4is_kwngbr( $m4is_bnfo3->term_id, $m4is_bnfo3->taxonomy ) ) { unset($m4is_zmzne8[$m4is_j5sy07]);
 } } } return $m4is_zmzne8;
 } 
function m4is_s2ai5q( $m4is_jo8fb ){ $m4is_fgzy2l = isset($m4is_jo8fb->queried_object) ? $m4is_jo8fb->queried_object : false;
 if( ! $m4is_fgzy2l ){ return;
 }  $m4is_xtl7we = $m4is_fgzy2l->taxonomy;
 $m4is_akgp = $m4is_fgzy2l->term_taxonomy_id;
 $m4is__osh1e = $this->m4is_kwngbr($m4is_akgp, $m4is_xtl7we);
  if( $m4is__osh1e ){ $m4is_id9j = $this->m4is_w9avei($m4is_akgp, $m4is_xtl7we);
 if ( (int) $m4is_id9j > 0 ){ $m4is__osh1e = false;
 } }  if ( ! $m4is__osh1e ){ $m4is_b3h6t = 'hide';
 $m4is_yc9sj = $this->m4is_yc9sj[$m4is_akgp];
 $m4is_b3h6t = isset($m4is_yc9sj['prohibited_action']) ? (int)$m4is_yc9sj['prohibited_action'] : 0;
  if( $m4is_b3h6t === 1 ){ $m4is__7cx = isset($m4is_yc9sj['redirect_url']) ? $m4is_yc9sj['redirect_url'] : false;
 if( $m4is__7cx ){ wp_safe_redirect( $m4is__7cx );
 exit;
 } else { $m4is_b3h6t = 0;
 } }  if( $m4is_b3h6t === 0 ){ if( method_exists( $m4is_jo8fb, 'set_404') ){ $m4is_jo8fb->set_404();
 } } } }  
function m4is_kwngbr( $m4is_akgp, $m4is_xtl7we ) : bool {  if( isset($this->m4is_ssbvrt[$m4is_akgp]) ){ return $this->m4is_ssbvrt[$m4is_akgp];
 }  $m4is_p51e_l = m4is_jf8abu::m4is_e5l8a9()->m4is_ezm7($m4is_akgp);
  if( empty($m4is_p51e_l) ){ $this->m4is_yc9sj[$m4is_akgp] = [];
 return true;
 } $this->m4is_yc9sj[$m4is_akgp] = $m4is_p51e_l;
 $m4is_ny_s = apply_filters('wpal/taxonomy/access/visibility/settings', $m4is_p51e_l, $m4is_akgp);
 $m4is_gy34l = wp_parse_args($m4is_ny_s, $this->m4is_lulp1);
 if (m4is_aoxw::m4is_zshfjo() ) { $m4is_flx71n = $this->m4is_e7sk;
 foreach($this->m4is_e7sk as $m4is_s2ge5) { if (! empty($m4is_gy34l[$m4is_s2ge5]) ) { m4is_aoxw::m4is_djr4nd();
 break;
 } } } return $this->m4is_gz5hgo( $m4is_gy34l, $m4is_xtl7we );
 }  
function m4is_w9avei( $m4is_akgp, $m4is_xtl7we ){ $m4is_df7m8 = get_ancestors($m4is_akgp, $m4is_xtl7we, 'taxonomy');
 if( is_array($m4is_df7m8) && ! empty($m4is_df7m8) ){ foreach ($m4is_df7m8 as $m4is_id9j) {  if( ! $this->m4is_kwngbr($m4is_id9j, $m4is_xtl7we) ){ return $m4is_id9j;
 } } } return false;
 } }

