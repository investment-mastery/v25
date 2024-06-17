<?php
/**
 * Copyright (c) 2023-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_mf84 { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_x6wv();
 } 
function m4is_x6wv() { if ( ! is_admin() ) { require_once __DIR__ . '/frontend.php';
 new m4is_rgena;
 if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) { require_once __DIR__ . '/webhooks.php';
 m4is_wjy4p::m4is_e5l8a9();
 } } else { add_filter( 'memberium/modules/active/names', function( $m4is_r1g2u ) { return array_merge( $m4is_r1g2u, ['Spiffy for Memberium'] );
 });
 } } }

