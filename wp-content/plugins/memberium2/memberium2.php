<?php
/*
Plugin Name: Memberium for Keap
Description: Membership system for Keap and WordPress
Author URI: http://www.webpowerandlight.com/
Author: David Bullock
License: Copyright (c) 2012-2024 David Bullock, Web Power and Light
Plugin URI: http://www.memberium.com/
Requires at least: 5.8
Requires PHP: 7.0
Text Domain: memberium
Update URI: https://memberium.com/
Version: 2.210
*/

 

defined( 'ABSPATH' ) || die();
 if ( ! function_exists( 'memberium_app' ) ) { if ( include_once __DIR__ . '/classes/core.php' ) { define( 'MEMBERIUM_HOME', __FILE__ );
 define( 'MEMBERIUM_HOME_DIR', __DIR__ . '/' );
 
function memberium_app() : m4is_pms8y { static $m4is_bnd6ti;
 return $m4is_bnd6ti ?? $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 } memberium_app();
 } }

