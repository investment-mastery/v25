<?php
/**
 * Copyright (c) 2018-2022 David J Bullock
 * Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  
class m4is_lwxq { public $slug = 'divi';
  public $script_version = '1.0.7';
  public $to_json = [];
  public $omitted_blocks = [];
  public $ns = '';
  public $prefix = '';
  public $I18n = '';
  public $access_class;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self();
 } private 
function __construct() { $this->access_class = m4is_jf8abu::m4is_e5l8a9();
 $this->prefix = $this->access_class::PREFIX;
 $this->ns = $this->access_class::NS;
 } 
function m4is_x6wv() { add_filter( "{$this->ns}/{$this->slug}/control/config", [$this, 'm4is_x5oxp'], 10, 1 );
 $m4is_yk01i7 = $this->access_class->m4is_ik4v9();
 $this->I18n = $m4is_yk01i7->m4is_zga5_c( false, $this->slug );
 $this->to_json['WPAL_BLOCKS_SETTINGS_TITLE'] = $this->I18n['settings_title'];
 $this->to_json['WPAL_BLOCKS_PREFIX'] = $this->prefix;
 $this->to_json['WPAL_BLOCKS_KEYS_REMOVED_TEXT'] = $this->I18n['keys_removed_text'];
 $this->to_json['tags'] = $m4is_yk01i7->m4is_i0au6j();
  $this->to_json['controls'] = $m4is_yk01i7->m4is_iwim9( $this->slug );
  $this->omitted_blocks = apply_filters( "{$this->ns}/{$this->slug}/settings/omitted_blocks", ['et_pb_column', 'et_pb_column_inner'] );
  add_action('et_builder_ready', [$this, 'm4is_m3lck'], 9999 );
  add_action(is_admin() ? 'admin_enqueue_scripts' : 'wp_enqueue_scripts', [$this, 'm4is_e48f'], 9999);
  }  
function m4is_m3lck(){ global $shortcode_tags;
 $m4is_zxag3_ = [];
 foreach ( $shortcode_tags as $m4is_mpia => $m4is_d4u9q ) { if ( is_array( $m4is_d4u9q ) ) { if ( $m4is_d4u9q[0] instanceof ET_Builder_Element || $m4is_d4u9q[0] instanceof ET_Builder_Module ) { $m4is_zxag3_[$m4is_mpia] = $m4is_d4u9q;
 remove_shortcode($m4is_mpia, $m4is_d4u9q);
 } } } if ( !empty($m4is_zxag3_) ){ foreach ( $m4is_zxag3_ as $m4is_mpia => $m4is_d4u9q ) { $m4is_jcqzm = $m4is_d4u9q[0];
 $m4is_le129 = $m4is_d4u9q[1];
 $m4is_jcqzm->settings_modal_toggles['custom_css']['toggles']['wpal-blocks'] = ['title' => $this->I18n['settings_title'], 'priority' => 100];
 if ( !isset($m4is_jcqzm->fields_unprocessed["{$this->prefix}_anymembership"] ) ){ $m4is_x0iy4 = in_array($m4is_mpia, $this->omitted_blocks) ? [] : $this->to_json['controls'];
 if ( is_array($m4is_x0iy4) && !empty($m4is_x0iy4) ){ $m4is_jcqzm->fields_unprocessed = array_merge($m4is_jcqzm->fields_unprocessed, $m4is_x0iy4);
 } } add_shortcode( $m4is_mpia, function($m4is_qnjfv, $m4is_z50f, $m4is_ixh6) use ($m4is_jcqzm, $m4is_le129) { return $m4is_jcqzm->$m4is_le129( $m4is_qnjfv, $m4is_z50f, $m4is_ixh6 );
 });
 } } }  
function m4is_x5oxp( array $m4is_twy4g0 ) : array { $m4is_me8hpy = [];
 if ( is_array($m4is_twy4g0) && !empty($m4is_twy4g0) ){ foreach( $m4is_twy4g0 as $m4is_jcz18 => $m4is_g1ru50 ) { $m4is_u23rl = !empty($m4is_g1ru50['type']) ? $m4is_g1ru50['type'] : false;
 $m4is_t5ot4 = !empty($m4is_g1ru50['name']) ? $m4is_g1ru50['name'] : false;
 $m4is_vqlmz = !empty($m4is_g1ru50['description']) ? $m4is_g1ru50['description'] : false;
 $m4is_uq5og = !empty($m4is_g1ru50['sanitize']) ? $m4is_g1ru50['sanitize'] : false;
 if ( $m4is_u23rl && $m4is_t5ot4 ){ switch ($m4is_u23rl) { case 'checkbox': $m4is_me8hpy[$m4is_t5ot4] = [ 'wpald' => 'toggle', 'wpald_level' => empty( $m4is_g1ru50['level'] ) ? '' : $m4is_g1ru50['level'], 'wpald_toggles' => isset( $m4is_g1ru50['toggles'] ) && is_array( $m4is_g1ru50['toggles'] ) ? $m4is_g1ru50['toggles'] : false, 'type' => 'yes_no_button', 'label' => $m4is_g1ru50['label'], 'default' => isset( $m4is_g1ru50['default'] ) && (int) $m4is_g1ru50['default'] > 0 ? 'on' : 'off', 'options' => [ 'off' => empty( $m4is_g1ru50['label_off']) ? _x( 'Off', 'divi', $this->ns ) : $m4is_g1ru50['label_off'], 'on' => empty( $m4is_g1ru50['label_on'] ) ? _x('On', 'divi', $this->ns ) : $m4is_g1ru50['label_on'], ], ];
 break;
 case 'textarea': $m4is_me8hpy[$m4is_t5ot4] = [ 'wpald' => 'textarea', 'type' => 'text', 'label' => $m4is_g1ru50['label'], 'default' => '' ];
 break;
 case 'text': $m4is_me8hpy[$m4is_t5ot4] = [ 'wpald' => 'text', 'type' => 'text', 'label' => $m4is_g1ru50['label'], 'default' => '' ];
 break;
 case 'SELECT2': $m4is_me8hpy[$m4is_t5ot4] = [ 'wpald' => 'select2', 'type' => 'text', 'label' => $m4is_g1ru50['label'] ];
 break;
 default: break;
 } if ( $m4is_vqlmz ){ $m4is_me8hpy[$m4is_t5ot4]['description'] = $m4is_vqlmz;
 } if ( $m4is_uq5og ){ $m4is_me8hpy[$m4is_t5ot4]['sanitize'] = $m4is_uq5og;
 } $m4is_me8hpy[$m4is_t5ot4]['additional_att'] = empty($m4is_g1ru50['additional_att']) ? $m4is_t5ot4 : $m4is_g1ru50['additional_att'];
 $m4is_me8hpy[$m4is_t5ot4]['option_category'] = empty($m4is_g1ru50['option_category']) ? 'configuration' : $m4is_g1ru50['option_category'];
 $m4is_me8hpy[$m4is_t5ot4]['tab_slug'] = empty($m4is_g1ru50['tab_slug']) ? 'custom_css' : $m4is_g1ru50['tab_slug'] ;
 $m4is_me8hpy[$m4is_t5ot4]['toggle_slug'] = empty($m4is_g1ru50['toggle_slug']) ? 'wpal-blocks' : $m4is_g1ru50['toggle_slug'] ;
 } } } return $m4is_me8hpy;
 }  
function m4is_e48f(){ $m4is_c7yri = 'wpal-blocks-divi-editor';
 $m4is_d9m5k = plugin_dir_url( __FILE__ );
 $m4is_yb10 = $m4is_c7yri . '_main';
 $m4is_uw3ob = 'select2css_divi';
 $this->access_class->m4is_ik4v9()->m4is_xqc07( false, $m4is_c7yri );
 wp_register_style( $m4is_uw3ob, $m4is_d9m5k . 'select2_divi.css', false, $this->script_version, 'all' );
 wp_register_script( $m4is_yb10, $m4is_d9m5k . 'editor.js', ['jquery'], $this->script_version, true) ;
 wp_enqueue_style( $m4is_uw3ob );
 wp_enqueue_script( "{$m4is_c7yri}_s2js" );
 wp_enqueue_script( $m4is_yb10 );
 wp_localize_script( $m4is_yb10, 'wpald_params', $this->to_json );
 } }

