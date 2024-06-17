<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  final 
class m4is_fe3s { protected $ext_ver = '1.0.5';
 public $slug = 'beaver_builder';
 public $to_json = [];
  public $omitted_blocks = [];
  public $ns = '';
  public $prefix = '';
  public $I18n = [];
  public $access_class;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->access_class = m4is_jf8abu::m4is_e5l8a9();
 $this->prefix = $this->access_class::PREFIX;
 $this->ns = $this->access_class::NS;
 $this->m4is_x6wv();
 } 
function m4is_x6wv() {  add_filter( "{$this->ns}/{$this->slug}/control/config", [$this, 'm4is_z543tv'], 10, 1 );
 $m4is_yk01i7 = $this->access_class->m4is_ik4v9();
 $this->I18n = $m4is_yk01i7->m4is_zga5_c( false, $this->slug );
 $this->to_json['WPAL_BLOCKS_PREFIX'] = $this->prefix;
 $this->to_json['WPAL_BLOCKS_KEYS_REMOVED_TEXT'] = $this->I18n['keys_removed_text'];
 $this->to_json['controls'] = $m4is_yk01i7->m4is_iwim9( $this->slug );
 $this->to_json['tags'] = $m4is_yk01i7->m4is_i0au6j();
  $this->omitted_blocks = apply_filters( "{$this->ns}/{$this->slug}/settings/omitted_blocks", ['col'] );
 add_filter( 'fl_builder_register_settings_form', [$this, 'm4is_q1ay'], PHP_INT_MAX, 2 );
  add_filter( 'fl_builder_custom_fields', [$this, 'm4is_qyic5f'] );
  add_action( 'wp_enqueue_scripts', [$this, 'm4is_e48f'], PHP_INT_MAX );
  }  
function m4is_z543tv( array $m4is_twy4g0 ) : array { foreach ( $m4is_twy4g0 as $m4is_y2d1 => $m4is_g93t ) { if ( $m4is_g93t['type'] === 'checkbox' ) { $m4is_twy4g0[$m4is_y2d1]['type'] = 'wpal_blocks_toggle';
 $m4is_twy4g0[$m4is_y2d1]['description'] = '';
 } elseif ( $m4is_g93t['type'] === 'SELECT2' ) { $m4is_twy4g0[$m4is_y2d1]['type'] = 'text';
 $m4is_twy4g0[$m4is_y2d1]['class'] = 'bb-wpal-blocks-select2';
 } } return $m4is_twy4g0;
 }  
function m4is_qyic5f( array $m4is_w_8g ) { $m4is_w_8g['wpal_blocks_toggle'] = trailingslashit( __DIR__ ) . 'toggle.php';
 return $m4is_w_8g;
 }  
function m4is_q1ay( array $m4is_o9_6u, string $m4is_ldjf8y ) : array { $m4is_h2bi = ($m4is_ldjf8y === 'row' || $m4is_ldjf8y === 'col');
  if ($m4is_h2bi) { $m4is_o9_6u['tabs'] = isset( $m4is_o9_6u['tabs'] ) ? $m4is_o9_6u['tabs'] : [];
 $m4is_o9_6u['tabs']['advanced'] = isset( $m4is_o9_6u['tabs']['advanced'] ) ? $m4is_o9_6u['tabs']['advanced'] : [ 'title' => __( 'Advanced', $this->ns ) ];
 $m4is_o9_6u['tabs']['advanced']['sections'] = isset( $m4is_o9_6u['tabs']['advanced']['sections'] ) ? $m4is_o9_6u['tabs']['advanced']['sections'] : [];
 $m4is_o9_6u['tabs']['advanced']['sections'] = $this->m4is_ga5r0m( $m4is_o9_6u['tabs']['advanced']['sections'], $m4is_ldjf8y );
  } else {  if ($m4is_ldjf8y === 'module_advanced') { $m4is_o9_6u['sections'] = isset( $m4is_o9_6u['sections'] ) ? $m4is_o9_6u['sections'] : [];
 $m4is_o9_6u['sections'] = $this->m4is_ga5r0m( $m4is_o9_6u['sections'], $m4is_ldjf8y );
 } } return $m4is_o9_6u;
 }  
function m4is_ga5r0m( array $m4is_qza_f, string $m4is_ldjf8y) : array { $m4is_s84pm5 = [];
 $m4is_s2ge5 = 'visibility';
 if ( array_key_exists( $m4is_s2ge5, $m4is_qza_f ) ) { foreach ( $m4is_qza_f as $m4is_z4p1sx => $m4is_pcve ) { $m4is_s84pm5[$m4is_z4p1sx] = $m4is_pcve;
 if ( $m4is_z4p1sx === $m4is_s2ge5 ) { $m4is_w_8g = $this->m4is_lt5bay( $m4is_ldjf8y );
 if ( $m4is_w_8g ){ $m4is_s84pm5['wpal-blocks'] = $m4is_w_8g;
 } } } } else { $m4is_s84pm5 = $m4is_qza_f;
 $m4is_w_8g = $this->m4is_lt5bay( $m4is_ldjf8y );
 if ( $m4is_w_8g ) { $m4is_s84pm5['wpal-blocks'] = $m4is_w_8g;
 } } return $m4is_s84pm5;
 }  
function m4is_lt5bay( string $m4is_ldjf8y ) { $m4is_x0iy4 = in_array( $m4is_ldjf8y, $this->omitted_blocks ) ? false : $this->to_json['controls'];
  if ( ! $m4is_x0iy4 || empty( $m4is_x0iy4 ) ){ return;
 } $m4is_kof0 = [ 'title' => $this->I18n['settings_title'], 'fields' => [] ];
 foreach ( $m4is_x0iy4 as $m4is_y2d1 => $m4is_g93t ) { $m4is_u23rl = isset( $m4is_g93t['type'] ) ? $m4is_g93t['type'] : false;
 $m4is_t5ot4 = isset( $m4is_g93t['name'] ) ? $m4is_g93t['name'] : false;
 if ( $m4is_u23rl && $m4is_t5ot4 ) { $m4is_cwfbhs = [ 'type' => $m4is_u23rl, 'label' => $m4is_g93t['label'] ];
 $conditional_settings = [ 'class', 'default', 'description', 'help', 'multi-select', 'options', 'placeholder', 'rows', ];
 foreach ( $conditional_settings as $m4is_z4p1sx => $m4is_lh4p70 ) { if ( isset( $m4is_g93t[$m4is_lh4p70] ) ) { $m4is_cwfbhs[$m4is_lh4p70] = $m4is_g93t[$m4is_lh4p70];
 } } $m4is_cwfbhs = apply_filters("{$this->ns}/{$this->slug}/editor/control/args", $m4is_cwfbhs, $m4is_t5ot4, $m4is_u23rl, $m4is_ldjf8y );
 $m4is_kof0['fields'][$m4is_t5ot4] = $m4is_cwfbhs;
 } } return $m4is_kof0;
 }  
function m4is_e48f() { if ( ! FLBuilderModel::is_builder_active() ) { return;
 } $m4is_c7yri = 'wpal-blocks-bb';
 $m4is_imdo6 = plugin_dir_url( __FILE__ );
 $m4is_vd5m = ['jquery', "{$m4is_c7yri}_s2js"];
 $m4is_jrjaq_ = $m4is_c7yri . '-editor-js';
 $m4is_nju0c = $m4is_c7yri . '-editor-css';
 $this->access_class->m4is_ik4v9()->m4is_xqc07( false, $m4is_c7yri );
 wp_enqueue_style( "{$m4is_c7yri}_s2css");
 wp_enqueue_script( "{$m4is_c7yri}_s2js");
 wp_register_script( $m4is_jrjaq_, "{$m4is_imdo6}editor.js", $m4is_vd5m, $this->ext_ver, true );
 wp_register_style( $m4is_nju0c, "{$m4is_imdo6}editor.css", false, $this->ext_ver, 'all' );
 wp_enqueue_script( $m4is_jrjaq_ );
 wp_enqueue_style( $m4is_nju0c );
 wp_localize_script( $m4is_jrjaq_, 'wpalbb_params', $this->to_json );
 } }

