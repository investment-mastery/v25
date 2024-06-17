<?php
/**
 * Copyright (c) 2018-2022 David J Bullock
 * Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  
class m4is_vrcugn { public $slug = 'elementor';
 public $version = '1.1.0';
  public $to_json = [];
  public $omitted_blocks = [];
  public $ns = '';
  public $prefix = '';
  public $I18n = '';
  public $access_class;
  private 
function __construct(){} static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = null;
 if(is_null($m4is_ye0_i)){ $m4is_ye0_i = new self;
 $m4is_ye0_i->access_class = m4is_jf8abu::m4is_e5l8a9();
 $m4is_ye0_i->prefix = $m4is_ye0_i->access_class::PREFIX;
 $m4is_ye0_i->ns = $m4is_ye0_i->access_class::NS;
 $m4is_ye0_i->m4is_x6wv();
 } return $m4is_ye0_i;
 } 
function m4is_x6wv() { add_filter("{$this->ns}/{$this->slug}/editor/control/args", [$this, 'm4is_q34m85'], 10, 5 );
  $m4is_yk01i7 = $this->access_class->m4is_ik4v9();
 $this->I18n = $m4is_yk01i7->m4is_zga5_c( false, $this->slug );
 $this->to_json['WPAL_BLOCKS_PREFIX'] = $this->prefix;
 $this->to_json['WPAL_BLOCKS_KEYS_REMOVED_TEXT'] = $this->I18n['keys_removed_text'];
 $this->to_json['controls'] = $m4is_yk01i7->m4is_iwim9($this->slug);
  $this->to_json['tags'] = $m4is_yk01i7->m4is_i0au6j();
  $this->omitted_blocks = apply_filters("{$this->ns}/{$this->slug}/settings/omitted_blocks", ['column']);
 } 
function m4is__ho2rl() { $m4is_juks10 = plugin_dir_url(__FILE__);
 wp_enqueue_style('wpal-blocks-elementor-editor', "{$m4is_juks10}/editor.css", [], $this->version, 'all');
 wp_enqueue_script('wpal-blocks-elementor-editor', "{$m4is_juks10}/editor.js", ['jquery'], $this->version, true);
 wp_localize_script('wpal-blocks-elementor-editor', 'wpale_params', $this->to_json);
 } 
function m4is_qp1ki5( $m4is_pcve, $m4is_fbjy2 ){ if( in_array($m4is_pcve->get_type(), $this->omitted_blocks) ){ return;
 } $m4is_x0iy4 = $this->to_json['controls'];
 if ( ! $m4is_x0iy4 || empty($m4is_x0iy4) ) { return;
 }  $m4is_pcve->start_controls_section( 'wpal-blocks', [ 'label' => $this->I18n['settings_title'], 'tab' => \Elementor\Controls_Manager::TAB_ADVANCED ] );
 foreach ( $m4is_x0iy4 as $m4is_y2d1 => $m4is_g93t ) { $m4is_u23rl = isset($m4is_g93t['type']) ? $this->m4is_flyh( $m4is_g93t['type'] ) : false;
 $m4is_t5ot4 = isset($m4is_g93t['name']) ? $m4is_g93t['name'] : false;
 if ( $m4is_t5ot4 && $m4is_u23rl ){ $m4is_cwfbhs = [ 'label' => isset($m4is_g93t['label']) ? $m4is_g93t['label'] : false, 'type' => $m4is_u23rl ];
  $m4is_n9i1 = ['default', 'description', 'options', 'label_on', 'label_off', 'return_value', 'multiple', 'rows', 'separator', 'placeholder'];
 foreach ($m4is_n9i1 as $m4is_z4p1sx => $m4is_lh4p70) { if ( isset($m4is_g93t[$m4is_lh4p70]) ){ $m4is_cwfbhs[$m4is_lh4p70] = $m4is_g93t[$m4is_lh4p70];
 } } $m4is_cwfbhs = apply_filters( "{$this->ns}/elementor/editor/control/args", $m4is_cwfbhs, $m4is_t5ot4, $m4is_pcve, $m4is_fbjy2 );
 $m4is_pcve->add_control( $m4is_t5ot4, $m4is_cwfbhs );
 } }  $m4is_pcve->end_controls_section();
 }  
function m4is_flyh( string $m4is_u23rl = '' ){ $m4is_u23rl = !empty($m4is_u23rl) ? strtolower( $m4is_u23rl ) : $m4is_u23rl;
 if( $m4is_u23rl === 'checkbox' ){ return \Elementor\Controls_Manager::SWITCHER;
 } else if( $m4is_u23rl === 'select2' || $m4is_u23rl === 'text' ){ return \Elementor\Controls_Manager::TEXT;
 } else if( $m4is_u23rl === 'textarea' ){ return \Elementor\Controls_Manager::TEXTAREA;
 } return false;
 }  
function m4is_q34m85($m4is_cwfbhs, $m4is_t5ot4, $m4is_pcve, $m4is_fbjy2) { if ( $m4is_t5ot4 === "{$this->prefix}_loggedin" ){ $m4is_cwfbhs['separator'] = 'before';
 } if ( $m4is_t5ot4 === "{$this->prefix}_access_tags" ){ $m4is_cwfbhs['separator'] = 'before';
 } if ( $m4is_t5ot4 === "{$this->prefix}_access_tags" || $m4is_t5ot4 === "{$this->prefix}_access_tags2" ){ $m4is_cwfbhs['label_block'] = true;
 $m4is_cwfbhs['default'] = '';
 } if ( $m4is_t5ot4 === "{$this->prefix}_invert_results" ){ $m4is_cwfbhs['separator'] = 'before';
 } return $m4is_cwfbhs;
 } }

