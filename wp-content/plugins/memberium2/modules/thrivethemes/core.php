<?php
 class_exists( 'm4is_pms8y') || die();
 final 
class m4is_d9r2 { private $m4is_bnd6ti, $m4is_zq0k;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $this->m4is_gbqd0();
 } private 
function m4is_gbqd0() { $m4is_b3z8 = [ 'm4is_ux9t' => __DIR__ . '/entities/memberium', 'm4is_w0xqih' => __DIR__ . '/fields/tags', 'm4is_akvn' => __DIR__ . '/fields/memberships', ];
 $this->m4is_bnd6ti->m4is_gt7z( $m4is_b3z8 );
 add_action( 'init', [ $this, 'm4is_gt7z' ] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 $this->m4is_c_kz3();
 } 
function m4is_s1jxg5( array $m4is_r1g2u ) : array { return array_merge( $m4is_r1g2u, [ 'ThriveThemes Integration' ] );
 } 
function m4is_gt7z() { tve_register_condition_entity( 'm4is_ux9t' );
 tve_register_condition_field( 'm4is_w0xqih' );
 tve_register_condition_field( 'm4is_akvn' );
 } 
function m4is_c_kz3( ?string $m4is_ntpnv = '') : array { $m4is__ql9vk = (array) $this->m4is_bnd6ti->m4is_oiewvu( 'memberships' );
 $m4is_qh8p6 = [];
 foreach ($m4is__ql9vk as $m4is_s2ge5 => $m4is_o5xas ) { if ( empty( $m4is_ntpnv ) || stripos( $m4is_o5xas['name'], $m4is_ntpnv ) !== false ) { $m4is_qh8p6[$m4is_s2ge5] = $m4is_o5xas['name'];
 } } return $m4is_qh8p6;
 } }

