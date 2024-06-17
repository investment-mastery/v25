<?php
/**
 * Copyright (c) 2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
  
class m4is_b1n6 { const VERSION = '1.0.0';
 const OPTION_SLUG = 'wpal/zoom/settings';
 private $config = [];
 private $options = null;
 private $connected = false;
  
function init($m4is_twy4g0) {  define('WPAL_ZOOM_HOME_DIR', dirname(__DIR__) . '/');
 $m4is_imdo6 = trailingslashit(plugins_url('', dirname(__FILE__) ) );
 define('WPAL_ZOOM_URL', $m4is_imdo6);
 $m4is_r6nh_b = [ 'parent_slug' => 'options-general.php', 'menu_slug' => 'wpal-zoom', 'shortcode_prefix' => 'wpal', 'I18n' => [ 'page_title' => __('Zoom Settings', 'wpal_ecomm'), 'menu_title' => __('Zoom', 'wpal_ecomm'), ] ];
 $this->config = wp_parse_args($m4is_twy4g0, $m4is_r6nh_b);
 $this->register_wp_hooks();
 }  
function register_wp_hooks(){ if( is_admin() ) {  add_action("admin_menu", function(){ $m4is_twy4g0 = $this->get_config();
 $m4is_a97xh = $m4is_twy4g0['I18n'];
 add_submenu_page( $m4is_twy4g0['parent_slug'], $m4is_a97xh['page_title'], $m4is_a97xh['menu_title'], 'manage_options', $m4is_twy4g0['menu_slug'], [$this, 'zoom_settings_page'] );
 }, PHP_INT_MAX );
 } else {  $m4is_qqwj1c = $this->config['shortcode_prefix'];
 add_shortcode("{$m4is_qqwj1c}_zoom_event", function( $m4is_qnjfv, $m4is_z50f, $m4is_mpia ) { $m4is_bh12zy = $this->frontend();
 $m4is_bh12zy->frontend_scripts();
 return $m4is_bh12zy->zoom_event_func( $m4is_qnjfv, $m4is_z50f, $m4is_mpia );
 } );
 } }  
function zoom_settings_page(){ $this->admin()->m4is_ke8at( $this->m4is_oiewvu(), $this->get_config() );
 }  
function frontend() { static $m4is_bh12zy;
 if( is_null($m4is_bh12zy) ){ require_once __DIR__ . '/frontend.php';
 $m4is_bh12zy = new m4is__tluz_( self::VERSION );
 } return $m4is_bh12zy;
 }  
function admin(){ static $m4is_tu86mz;
 if( is_null($m4is_tu86mz) ){ require_once __DIR__ . '/admin.php';
 $m4is_tu86mz = new m4is_jfea8j( self::OPTION_SLUG, self::VERSION );
 } return $m4is_tu86mz;
 }  
function api(){ static $m4is_ybcu = false;
 if(! $m4is_ybcu){ require_once __DIR__ . '/api.php';
 $m4is_s2ge5 = $this->m4is_oiewvu('api_key');
 $m4is__djm5 = $this->m4is_oiewvu('api_secret');
 $m4is_ybcu = new m4is_b4rbzn($m4is_s2ge5, $m4is__djm5);
 } return $m4is_ybcu;
 }  
function get_config( $m4is_s2ge5 = false ){ if( $m4is_s2ge5 ){ if( isset( $this->config[$m4is_s2ge5] ) ){ return $this->config[$m4is_s2ge5];
 } else { return false;
 } } else { return $this->config;
 } }  
function m4is_oiewvu( $m4is_s2ge5 = false ){ if( is_null( $this->options ) ){ $this->options = get_option( self::OPTION_SLUG, [ 'default_email' => get_bloginfo('admin_email'), 'api_key' => '', 'api_secret' => '', 'connected' => false ] );
 } if( $m4is_s2ge5 ){ if( isset( $this->options[$m4is_s2ge5] ) ){ return $this->options[$m4is_s2ge5];
 } else { return false;
 } } else { return $this->options;
 } }  private 
function __construct() { } static 
function get_wpal_zoom_instance() { static $m4is_z7iks = false;
 if (! $m4is_z7iks ) { $m4is_z7iks = new self;
 } return $m4is_z7iks;
 } }  
function m4is_b1n6(){ return m4is_b1n6::get_wpal_zoom_instance();
 }

