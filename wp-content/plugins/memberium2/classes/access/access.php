<?php
/**
 * Copyright (c) 2015-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_jf8abu { const NS = 'memberium', PREFIX = 'is4wp';
 static 
function m4is_e5l8a9(){ static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : new self;
 } private 
function __construct() {} 
function m4is_z4u6wr() {  add_filter( 'rest_pre_dispatch', [$this, 'm4is_i9x0j6'], 10, 3 );
 add_action( 'wpal/block/access/init', [$this, 'm4is_k9z32y'], 1 );
 do_action( 'wpal/block/access/init' );
   if ( version_compare( get_bloginfo( 'version' ), '5.4', '>=' ) ) { $this->m4is_qbyu_d();
 } $this->m4is_n7x_4m();
  $this->m4is_je34_6();
  }    
function m4is_k9z32y() { if ( is_admin() ) { add_action( 'enqueue_block_editor_assets', [ $this->m4is_ik4v9(), 'm4is_rngy3l' ], 1 );
  } else{  add_filter( 'render_block', [ $this->m4is_g37u(), 'm4is_ny06' ], PHP_INT_MAX, 2 );
 } }  
function m4is_i9x0j6( $m4is_oa_z, $m4is_uf0a, $m4is_cme_a ) { if ( strpos( $m4is_cme_a->get_route(), '/wp/v2/block-renderer' ) !== false) { if ( isset( $m4is_cme_a['attributes'] ) ){ $m4is_g7fr = $m4is_cme_a['attributes'];
 if( is_array( $m4is_g7fr ) && ! empty( $m4is_g7fr ) ) { foreach ($m4is_g7fr as $m4is_c5zg => $m4is_g0wy) { if ( strpos( $m4is_c5zg, self::PREFIX ) === 0 ) { unset( $m4is_g7fr[$m4is_c5zg] );
 } } $m4is_cme_a['attributes'] = $m4is_g7fr;
 } } } return $m4is_oa_z;
 }    
function m4is_qbyu_d(){ $m4is_v6fdv4 = false;
 if ( wp_doing_ajax() ) { $m4is_v6fdv4 = isset($_POST['action']) ? $_POST['action'] : false;
 } if ( is_admin() || $m4is_v6fdv4 === 'add-menu-item' ) { add_action('load-nav-menus.php', ['m4is_a8gw', 'm4is_ww61so'], 1);
   if ($m4is_v6fdv4 === 'add-menu-item' ) { m4is_a8gw::m4is_ww61so();
 } } else if ( ! is_admin() || $m4is_v6fdv4 ) { add_filter('wp_get_nav_menu_items', [$this->m4is_g37u(), 'm4is_r3ya6'], 1, 3);
 } } 
function m4is__9ao( $m4is_s7bgu5 ) { $m4is_p51e_l = get_post_meta( $m4is_s7bgu5, '_wpal/menu/access', true );
 return ( ! $m4is_p51e_l || ! is_array($m4is_p51e_l) || empty($m4is_p51e_l) ) ? [] : $m4is_p51e_l;
 }    
function m4is_n7x_4m() { $m4is_hnut76 = 'm4is_j3cux';
 add_action( 'in_widget_form', [ $m4is_hnut76, 'm4is_js4x_'], 10, 3 );
  add_filter( 'widget_update_callback', [ $m4is_hnut76, 'm4is_uty9'], 10, 2 );
  if( is_admin() ){ add_action('load-widgets.php', [ $m4is_hnut76, 'm4is_g5n2r'], 1 );
  } else { add_filter('sidebars_widgets', [ $this->m4is_g37u(), 'm4is_ovu4f'], 10 );
  add_filter('widget_display_callback', [ $this->m4is_g37u(), 'm4is_pqd2x3'], 10, 3 );
  } }    
function m4is_je34_6(){ if ( is_admin() && ! wp_doing_ajax() ) { add_action( 'load-term.php', ['m4is_c82oj9', 'm4is_dcubpx'], 1);
   $m4is_swtx = 'memberium/taxonomy/access';
 $m4is_a51pf6 = isset($_POST["_{$m4is_swtx}_name"]) ? $_POST["_{$m4is_swtx}_name"] : false;
 if ( $m4is_a51pf6 && wp_verify_nonce($_POST["_{$m4is_swtx}_name"], $m4is_swtx) ){ m4is_c82oj9::m4is_dcubpx();
 } } else { if (! m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b() ) { add_action('pre_get_posts', [$this->m4is_g37u(), 'm4is_fm6e_q']);
 add_filter('get_terms', [$this->m4is_g37u(), 'm4is_rj9bp'], -1, 4);
 } } }  
function m4is_i8vgc(){ static $m4is_kywgh1;
 if ( is_null($m4is_kywgh1) ) { $m4is_k4yeul = [ 'public' => true, 'show_ui' => true, ];
 $m4is_fa6l = get_taxonomies($m4is_k4yeul, 'names');
 foreach($m4is_fa6l as $m4is_s2ge5 => $m4is_w_o7al) { if (substr($m4is_s2ge5, -4, 4) == '_tag') { unset($m4is_fa6l[$m4is_s2ge5]);
 } } $m4is_fa6l = apply_filters('memberium/controlled/access/taxonomies', $m4is_fa6l);
  $m4is_kywgh1 = is_array($m4is_fa6l) ? $m4is_fa6l : [];
 } return $m4is_kywgh1;
 } 
function m4is_ezm7( $m4is_akgp ){ $m4is_p51e_l = get_term_meta($m4is_akgp, '_wpal/taxonomy/access', true);
 return ( ! $m4is_p51e_l || ! is_array($m4is_p51e_l) || empty($m4is_p51e_l) ) ? [] : $m4is_p51e_l;
 }    
function m4is_ik4v9() : m4is_uv6ib { static $m4is_tu86mz;
 return isset( $m4is_tu86mz ) ? $m4is_tu86mz : $m4is_tu86mz = m4is_uv6ib::m4is_e5l8a9();
 } 
function m4is_g37u() : m4is_nfu7hp { static $m4is_bh12zy;
 return isset( $m4is_bh12zy ) ? $m4is_bh12zy : $m4is_bh12zy = m4is_nfu7hp::m4is_e5l8a9();
 } }

