<?php
/**
 * Copyright (c) 2018-2022 David J Bullock
 * Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  
class m4is_vq4pn { public $slug = 'elementor';
  public $container_els = ['section', 'column'];
  public $container_visibility = [];
  public $widget_visibility = [];
  public $ns = '';
  private 
function __construct() {} static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = null;
 if( is_null( $m4is_ye0_i ) ) { $m4is_ye0_i = new self;
 $m4is_ye0_i->ns = m4is_jf8abu::NS;
 $m4is_ye0_i->m4is_x6wv();
 } return $m4is_ye0_i;
 } 
function m4is_x6wv() { $this->container_els = apply_filters("{$this->ns}/{$this->slug}/editor/container_slugs", $this->container_els);
  add_action('elementor/widgets/widgets_registered', [$this, 'm4is_vzi13'], 20 );
  add_action('elementor/frontend/before_render', [$this, 'm4is_mm4s'], 10, 1 );
  add_action('elementor/frontend/after_render', [$this, 'm4is_mm2u7'], 10, 1 );
  add_filter('elementor/frontend/section/should_render', [$this, 'm4is_nxek5p'], 1, 2 );
  add_filter('elementor/frontend/column/should_render', [$this, 'm4is_nxek5p'], 1, 2 );
 add_filter('elementor/frontend/widget/should_render', [$this, 'm4is_nxek5p'], 1, 2 );
 }  
function m4is_vzi13( $m4is_ixjyf ) { require_once __DIR__ . '/widget-shortcode.php';
 $m4is_ixjyf->unregister_widget_type( 'shortcode' );
 $m4is_ixjyf->register_widget_type( new m4is_ek09 );
 }  
function m4is_mm4s($m4is_h6a_0) {  if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || empty($m4is_h6a_0) ) { return;
 } $m4is_pc5zv = $m4is_h6a_0->get_type();
 $m4is_isu2kc = $m4is_h6a_0->get_id();
 $m4is_w2w8 = $m4is_h6a_0->get_settings_for_display();
 $m4is__osh1e = $this->m4is_hhu3($m4is_w2w8);
 $m4is_h2bi = in_array($m4is_pc5zv, $this->container_els);
  if ( $m4is_h2bi ){  if (! $m4is__osh1e) { $this->container_visibility[$m4is_isu2kc] = $this->m4is_k45v($m4is_h6a_0);
 } }  else { $m4is_vqw03 = $m4is_h6a_0->get_name();
  if ( $m4is__osh1e ) {  $m4is__osh1e = $this->m4is_k0gqk( $m4is_isu2kc, $m4is__osh1e );
  if ( ! $m4is__osh1e ) { $this->widget_visibility[] = $m4is_isu2kc;
 } }  else { $this->widget_visibility[] = $m4is_isu2kc;
 }  if ( ! $m4is__osh1e ) { if ($m4is_vqw03 === 'text-editor') { add_filter( 'widget_text', [$this, 'm4is_kgt9'], 1, 2 );
 } if ($m4is_vqw03 === 'shortcode') { add_filter("{$this->ns}/{$this->slug}/widget/shortcode/render", [$this, 'm4is_kgt9'], 1, 2 );
 } } } }  
function m4is_mm2u7($m4is_h6a_0) {  if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || empty( $m4is_h6a_0 ) ) { return;
 } $m4is_pc5zv = $m4is_h6a_0->get_type();
 $m4is_isu2kc = $m4is_h6a_0->get_id();
 $m4is_h2bi = in_array($m4is_pc5zv, $this->container_els);
  if ($m4is_h2bi) { }  else { $m4is_vqw03 = $m4is_h6a_0->get_name();
  if ( in_array( $m4is_isu2kc, $this->widget_visibility ) ){ if ( $m4is_vqw03 === 'text-editor' ){ remove_filter('widget_text', [$this, 'm4is_kgt9'], 1 );
 } if ( $m4is_vqw03 === 'shortcode' ){ remove_filter("{$this->ns}/{$this->slug}/widget/shortcode/render", [$this, 'm4is_kgt9'], 1, 2 );
 } } } }  
function m4is_k45v($m4is_h6a_0) { $m4is_xz27 = $m4is_h6a_0->get_data('elements');
 $m4is_rl8j = [];
 if ( is_array( $m4is_xz27 ) && !empty( $m4is_xz27 ) ){ foreach ($m4is_xz27 as $key => $m4is_hdf1) { $m4is_rl8j = $this->m4is_pm7fh5( $m4is_rl8j, $m4is_hdf1 );
 $m4is_jjrdxq = ( isset($m4is_hdf1['elements']) && !empty($m4is_hdf1['elements']) ) ? $m4is_hdf1['elements'] : false;
 if ( $m4is_jjrdxq ){ foreach ($m4is_jjrdxq as $m4is_h6a_0 => $m4is_s2op9m) { $m4is_rl8j = $this->m4is_pm7fh5( $m4is_rl8j, $m4is_s2op9m );
 $m4is_e4r6vq = isset($m4is_s2op9m['elements']) ? $m4is_s2op9m['elements'] : false;
 if ( $m4is_e4r6vq ){ foreach ($m4is_e4r6vq as $m4is_ca6q0f => $m4is_w_o7al) { $m4is_rl8j = $this->m4is_pm7fh5( $m4is_rl8j, $m4is_w_o7al );
 } } } } } } return $m4is_rl8j;
 }  
function m4is_pm7fh5($m4is_rl8j, $m4is_etj2) { $m4is_u23rl = !empty($m4is_etj2['elType']) ? $m4is_etj2['elType'] : false;
 $m4is_j5sy07 = !empty($m4is_etj2['id']) ? $m4is_etj2['id'] : false;
 if ( $m4is_u23rl === 'widget' && $m4is_j5sy07) { $m4is_rl8j[] = $m4is_j5sy07;
 } return $m4is_rl8j;
 }  
function m4is_k0gqk($m4is_isu2kc, $m4is__osh1e) {  $m4is_v5jqol = false;
 if ( !empty($this->container_visibility) ){ foreach ($this->container_visibility as $m4is_hib0 => $m4is_x_rxou) { if ( is_array( $m4is_x_rxou ) ){ foreach ($m4is_x_rxou as $m4is_j5sy07) { if ( $m4is_isu2kc === $m4is_j5sy07 ){ $m4is__osh1e = false;
 } } } } } return $m4is__osh1e;
 }  
function m4is_nxek5p($m4is_b81nyi, $m4is_h6a_0) {  if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || empty( $m4is_h6a_0 ) ) { return $m4is_b81nyi;
 } $m4is_pc5zv = $m4is_h6a_0->get_type();
 $m4is_isu2kc = $m4is_h6a_0->get_id();
 $m4is_h2bi = in_array( $m4is_pc5zv, $this->container_els );
  if ( $m4is_h2bi ){ if ( array_key_exists( $m4is_isu2kc, $this->container_visibility ) ){ if ( $m4is_pc5zv === 'section' ){ $m4is_b81nyi = false;
 } } }  else { if ( in_array($m4is_isu2kc, $this->widget_visibility) ){ $m4is_b81nyi = false;
 } } return $m4is_b81nyi;
 }  
function m4is_kgt9( $m4is_z50f, $m4is_w2w8 ) { return ' ';
 }  
function m4is_hhu3( array $m4is_x2y8 = [] ) : bool { $m4is_qh8p6 = [];
  $m4is_exwnv = m4is_jf8abu::m4is_e5l8a9();
 $m4is_cwkrz = $m4is_exwnv::PREFIX;
 foreach ($m4is_x2y8 as $m4is_t5ot4 => $m4is_w_o7al) { if ( strpos($m4is_t5ot4, "{$m4is_cwkrz}_membership_levels") !== false && $m4is_w_o7al === '1' ) { $m4is_qh8p6[] = (int) str_replace("{$m4is_cwkrz}_membership_levels-", "", $m4is_t5ot4);
 } } $m4is_lnbok = isset($m4is_x2y8["{$m4is_cwkrz}_access_tags"]) ? $m4is_x2y8["{$m4is_cwkrz}_access_tags"] : '';
 $m4is_lnbok = !empty($m4is_lnbok) && is_array($m4is_lnbok) ? implode(',', $m4is_lnbok) : $m4is_lnbok;
 $m4is_lldrmh = isset($m4is_x2y8["{$m4is_cwkrz}_access_tags2"]) ? $m4is_x2y8["{$m4is_cwkrz}_access_tags2"] : '';
 $m4is_lldrmh = !empty($m4is_lldrmh) && is_array($m4is_lldrmh) ? implode(',', $m4is_lldrmh) : $m4is_lldrmh;
 $m4is_gqid = [ 'memberships' => implode(',', $m4is_qh8p6), 'any_membership' => isset($m4is_x2y8["{$m4is_cwkrz}_anymembership"]) && $m4is_x2y8["{$m4is_cwkrz}_anymembership"] === '1' ? 1 : 0, 'logged_in_only' => isset($m4is_x2y8["{$m4is_cwkrz}_loggedin"] ) && $m4is_x2y8["{$m4is_cwkrz}_loggedin"] === '1' ? 1 : 0, 'logged_out_only' => isset($m4is_x2y8["{$m4is_cwkrz}_anonymous_only"] ) && $m4is_x2y8["{$m4is_cwkrz}_anonymous_only"] === '1' ? 1 : 0, 'invert_results' => isset($m4is_x2y8["{$m4is_cwkrz}_invert_results"] ) && $m4is_x2y8["{$m4is_cwkrz}_invert_results"] === '1' ? 1 : 0, 'contact_ids' => isset($m4is_x2y8["{$m4is_cwkrz}_contact_ids"]) ? sanitize_text_field($m4is_x2y8["{$m4is_cwkrz}_contact_ids"]) : '', 'eval' => isset($m4is_x2y8["{$m4is_cwkrz}_eval"]) ? trim($m4is_x2y8["{$m4is_cwkrz}_eval"]) : '', 'asset_id' => isset($m4is_x2y8["{$m4is_cwkrz}_asset_id"]) ? sanitize_text_field($m4is_x2y8["{$m4is_cwkrz}_asset_id"]) : '', 'tags1' => !empty($m4is_lnbok) ? trim($m4is_lnbok, ',') : '', 'tags2' => !empty($m4is_lldrmh) ? trim($m4is_lldrmh, ',') : '' ];
 return $m4is_exwnv->m4is_g37u()->m4is_gz5hgo( $m4is_gqid, 'elementor' );
 } }

