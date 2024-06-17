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
 $i2sdk = clone self::get_i2sdk();
 if ( is_admin() ) { require_once __DIR__ . '/admin/admin.php';
 require_once __DIR__ . '/admin/activate.php';
 require_once __DIR__ . '/admin/deactivate.php';
 require_once __DIR__ . '/admin/uninstall.php';
 self::register_activation_hooks();
 } else { $tracking_code = (string) $i2sdk->getConfigurationOption( 'tracking_code' );
 $keap_analytics = (bool) $i2sdk->getConfigurationOption( 'infusionsoft_analytics' );
 if ( $keap_analytics && $tracking_code > '' ) { add_action( 'wp_footer', [$i2sdk, 'show_infusionsoft_web_analytics'] );
 } } do_action( 'i2sdk_init' );
 } 
	static 
function register_activation_hooks() { if ( ! is_admin() ) { return;
 } register_activation_hook( __FILE__, 'wpal_i2sdk_activate' );
 register_deactivation_hook( __FILE__, 'wpal_i2sdk_deactivate' );
 register_uninstall_hook( __FILE__, 'wpal_i2sdk_uninstall' );
 } 
	static 
function i2sdk_define_constants() : void { defined( 'I2SDK_HOME' ) || define( 'I2SDK_HOME', __FILE__ );
 defined( 'I2SDK_VERSION' ) || define( 'I2SDK_VERSION', '4.0' );
 defined( 'I2SDK_DIR' ) || define( 'I2SDK_DIR', __DIR__ . '/' );
 } 
	static 
function get_i2sdk() : i2sdk_class { return self::$i2sdk ?? self::$i2sdk = new i2sdk_class;
 } }

