<?php
/**
 * Copyright (c) 2011-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 if ( ! class_exists( 'm4is_pms8y' ) || defined( 'I2SDK_HOME' ) ) { return;
 } keap_sdk_class::m4is_x6wv();
 final 
class keap_sdk_class { private static $i2sdk;
 
	static 
function m4is_x6wv() { global $i2sdk;
 self::i2sdk_define_constants();
 require_once __DIR__ . '/lib/i2sdk_class.php';
 self::get_i2sdk();
 self::get_i2sdk()->initialize();
 $i2sdk = clone self::get_i2sdk();
 if ( is_admin() ) { require_once I2SDK_DIR . 'admin/admin.php';
 require_once I2SDK_DIR . 'admin/activate.php';
 require_once I2SDK_DIR . 'admin/deactivate.php';
 require_once I2SDK_DIR . 'admin/uninstall.php';
 self::register_activation_hooks();
 } else { $tracking_code = (string) self::get_i2sdk()->getConfigurationOption( 'tracking_code' );
 $analytics_enabled = (bool) self::get_i2sdk()->getConfigurationOption( 'infusionsoft_analytics' );
 if ( $tracking_code > '' && $analytics_enabled == 1 ) { add_action( 'wp_footer', [ self::get_i2sdk(), 'show_infusionsoft_web_analytics'] );
 } } do_action( 'i2sdk_init' );
 } 
	static 
function register_activation_hooks() { register_activation_hook( __FILE__, 'wpal_i2sdk_activate' );
 register_deactivation_hook( __FILE__, 'wpal_i2sdk_deactivate' );
 register_uninstall_hook( __FILE__, 'wpal_i2sdk_uninstall' );
 } 
	static 
function i2sdk_define_constants() { define( 'I2SDK_HOME', __FILE__ );
 define( 'I2SDK_VERSION', '5.0' );
 define( 'I2SDK_DIR', __DIR__ . '/' );
 } 
	static 
function get_i2sdk() : i2sdk_class { return self::$i2sdk ?? self::$i2sdk = new i2sdk_class;
 }  }

