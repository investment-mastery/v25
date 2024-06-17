<?php
 class_exists('m4is_pms8y') || die();
 
class m4is_upn4ai { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 add_action( 'memberium_admin_menu_addons', [$this, 'm4is_jcdzj'] );
 } 
function m4is_s1jxg5( $m4is_r1g2u ) { return array_merge( $m4is_r1g2u, [ 'Affiliate Leaderboards for Keap' ] );
 } 
function m4is_jcdzj( $m4is_i6f5 ) { add_submenu_page( $m4is_i6f5, 'Affiliates', 'Affiliates', 'manage_options', 'memberium-affiliate-leaderboards', [$this, 'm4is_nbqj17'] );
 } 
function m4is_nbqj17() { require_once __DIR__ . '/screen.php';
 } }

