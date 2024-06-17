<?php
/**
 * Copyright (c) 2018-2022 David J Bullock
 * Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  final 
class m4is__0dkfa { public $slug = 'beaver_builder';
  public $container_els = ['section', 'column'];
  public $module_visibility = [];
  public $container_visibility = [];
  public $widget_visibility = [];
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_x6wv();
 } 
function m4is_x6wv() {  add_action( 'fl_builder_before_render_row', [$this, 'm4is_yl_7'], 10, 2 );
 add_action( 'fl_builder_after_render_row', [$this, 'm4is__0lic'], 10, 2 );
  add_action( 'fl_builder_before_render_column_group', [$this, 'm4is_cnyfw'], 10, 2 );
 add_action( 'fl_builder_after_render_column_group', [$this, 'm4is_zdzc3'], 10, 2 );
  add_action( 'fl_builder_before_render_module', [$this, 'm4is_zokt'], 10, 1 );
 add_action( 'fl_builder_after_render_module', [$this, 'm4is_ubefi0'], 10, 1 );
 }  
function m4is_yl_7( object $m4is_ke_fr ) { if ( ! $this->m4is_iw6f( $m4is_ke_fr->settings ) ){ $this->container_visibility[ $m4is_ke_fr->node ] = $m4is_ke_fr->node;
 add_filter('fl_builder_template_path', [$this, 'm4is_ji4z'], 1);
 } }  
function m4is__0lic( object $m4is_ke_fr ){ if ( isset( $this->container_visibility[ $m4is_ke_fr->node ] ) ){ remove_filter( 'fl_builder_template_path', [$this, 'm4is_ji4z'], 1 );
 unset( $this->container_visibility[ $m4is_ke_fr->node ] );
 } }  
function m4is_ji4z() { return false;
 }  
function m4is_cnyfw( object $m4is_evc54w, array $m4is_y6c5p ) { $m4is_vwiufq = true;
 $m4is_enaq = [];
 if ( $m4is_vwiufq ){ if ( is_array( $m4is_y6c5p ) ){ $m4is_vvxdk = count($m4is_y6c5p);
 foreach ($m4is_y6c5p as $m4is_y2d1 => $m4is_plyo) { if ( $m4is_plyo->type === 'column' && $m4is_plyo->settings > '' ){ if ( ! $this->m4is_iw6f( $m4is_plyo->settings ) ) { $m4is_vvxdk --;
 if ( ! isset( $m4is_enaq[ $m4is_evc54w->node ] ) ){ $m4is_enaq[ $m4is_evc54w->node ] = [];
 } $m4is_enaq[$m4is_evc54w->node][$m4is_plyo->node] = $m4is_plyo->node;
 } } }  if ( $m4is_vvxdk > 0 ){ if ( ! empty($m4is_enaq) ){ $this->container_visibility[$m4is_evc54w->parent] = $m4is_enaq;
 } }  else { if ( ! isset($this->container_visibility[$m4is_evc54w->parent]) ) { $this->container_visibility[ $m4is_evc54w->parent ] = [];
 } $this->container_visibility[ $m4is_evc54w->parent ][ $m4is_evc54w->node ] = true;
 add_filter('fl_builder_template_path', [$this, 'm4is_t7dyfm'], 2);
 } } } }  
function m4is_zdzc3( object $m4is_evc54w, array $m4is_y6c5p ) { $m4is_pjtbn = $m4is_evc54w->parent;
 $m4is_g0bg = $m4is_evc54w->node;
  if ( isset($this->container_visibility[$m4is_pjtbn]) ) {  if ( isset( $this->container_visibility[ $m4is_pjtbn ][ $m4is_g0bg ] ) ){  if ( is_array( $this->container_visibility[ $m4is_pjtbn ][ $m4is_g0bg ] ) ){  } else {  remove_filter('fl_builder_template_path', [$this, 'm4is_t7dyfm'], 2 );
 unset( $this->container_visibility[ $m4is_pjtbn ][ $m4is_g0bg ] );
 } }  if ( empty( $this->container_visibility[ $m4is_pjtbn ] ) ){ unset( $this->container_visibility[ $m4is_pjtbn ] );
 } } }  
function m4is_t7dyfm() { return false;
 }  
function m4is_zokt( object $m4is_xx25wq ){ $m4is_b0df = $this->m4is_iw6f( $m4is_xx25wq->settings );
 if ( $m4is_b0df ){  if ( is_array($this->container_visibility) && !empty($this->container_visibility) ){ foreach ($this->container_visibility as $m4is_no8uer => $m4is_ke_fr) {  if ( is_array($m4is_ke_fr) && !empty($m4is_ke_fr) ) { foreach ( $m4is_ke_fr as $m4is_shx3 => $m4is_v5di4 ) {  if ( is_array( $m4is_v5di4 ) && !empty( $m4is_v5di4 ) ){ foreach ($m4is_v5di4 as $m4is_g95oax => $m4is_yonf3) { if ( $m4is_g95oax === $m4is_xx25wq->parent ){ $m4is_b0df = false;
 } } } } } } } }  if ( ! $m4is_b0df ){ $this->module_visibility[] = $m4is_xx25wq->node;
 add_filter('fl_builder_template_path', [$this, 'm4is_qetuv'], 3 );
 } }  
function m4is_ubefi0( object $m4is_xx25wq ) { $m4is_h0zcv3 = array_search( $m4is_xx25wq->node, $this->module_visibility );
 if ( $m4is_h0zcv3 !== false ) { unset($this->module_visibility[$m4is_h0zcv3]);
  remove_filter('fl_builder_template_path', [$this, 'm4is_qetuv'], 3);
 } }  
function m4is_qetuv() { return false;
 }  
function m4is_iw6f( object $m4is_x2y8 ) : bool { $m4is_cwkrz = m4is_jf8abu::PREFIX;
 $m4is_qh8p6 = [];
  foreach ($m4is_x2y8 as $m4is_t5ot4 => $m4is_w_o7al) { if (strpos($m4is_t5ot4, "{$m4is_cwkrz}_membership_levels") !== false && $m4is_w_o7al === '1' ) { $m4is_qh8p6[] = (int) str_replace("{$m4is_cwkrz}_membership_levels-", "", $m4is_t5ot4);
 } } $m4is_lnbok = isset($m4is_x2y8->{"{$m4is_cwkrz}_access_tags"}) ? $m4is_x2y8->{"{$m4is_cwkrz}_access_tags"} : '';
 $m4is_lnbok = !empty($m4is_lnbok) && is_array($m4is_lnbok) ? implode(',', $m4is_lnbok) : $m4is_lnbok;
 $m4is_lldrmh = isset($m4is_x2y8->{"{$m4is_cwkrz}_access_tags2"}) ? $m4is_x2y8->{"{$m4is_cwkrz}_access_tags2"} : '';
 $m4is_lldrmh = !empty($m4is_lldrmh) && is_array($m4is_lldrmh) ? implode(',', $m4is_lldrmh) : $m4is_lldrmh;
 $m4is_gqid = [ 'memberships' => implode( ',', $m4is_qh8p6 ), 'any_membership' => isset($m4is_x2y8->{"{$m4is_cwkrz}_anymembership"}) && $m4is_x2y8->{"{$m4is_cwkrz}_anymembership"} === '1' ? 1 : 0, 'logged_in_only' => isset($m4is_x2y8->{"{$m4is_cwkrz}_loggedin"}) && $m4is_x2y8->{"{$m4is_cwkrz}_loggedin"} === '1' ? 1 : 0, 'logged_out_only' => isset($m4is_x2y8->{"{$m4is_cwkrz}_anonymous_only"}) && $m4is_x2y8->{"{$m4is_cwkrz}_anonymous_only"} === '1' ? 1 : 0, 'invert_results' => isset($m4is_x2y8->{"{$m4is_cwkrz}_invert_results"}) && $m4is_x2y8->{"{$m4is_cwkrz}_invert_results"} === '1' ? 1 : 0, 'contact_ids' => !empty($m4is_x2y8->{"{$m4is_cwkrz}_contact_ids"}) ? sanitize_text_field($m4is_x2y8->{"{$m4is_cwkrz}_contact_ids"}) : '', 'tags1' => !empty($m4is_lnbok) ? trim($m4is_lnbok, ',') : '', 'tags2' => !empty($m4is_lldrmh) ? trim($m4is_lldrmh, ',') : '', 'eval' => !empty($m4is_x2y8->{"{$m4is_cwkrz}_eval"}) ? trim($m4is_x2y8->{"{$m4is_cwkrz}_eval"}) : '', 'asset_id' => !empty($m4is_x2y8->{"{$m4is_cwkrz}_asset_id"}) ? sanitize_text_field($m4is_x2y8->{"{$m4is_cwkrz}_asset_id"}) : '' ];
 return m4is_jf8abu::m4is_e5l8a9()->m4is_g37u()->m4is_gz5hgo( $m4is_gqid, $this->slug );
 } }

