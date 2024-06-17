<?php
 class_exists( 'm4is_pms8y') || die();
 final 
class m4is_cpe5d { private $m4is_bnd6ti;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_filter( 'fusion_builder_element_params', [$this, 'm4is_juv0'], 10, 2 );
 } public 
function m4is_juv0( $m4is_gqid, $m4is_kjxmq ) { $m4is_wov2 = [ [ 'id' => 'memberium_has_membership', 'title' => esc_html__( 'Has Memberium Membership', 'fusion-builder' ), 'type' => 'select', 'options' => [ 'in' => esc_html__( 'In', 'fusion-builder' ), 'empty' => esc_html__( 'Empty', 'fusion-builder' ), ], 'comparisons' => [ 'equal' => esc_attr__( 'Equal To', 'fusion-builder' ), 'not-equal' => esc_attr__( 'Not Equal To', 'fusion-builder' ), ], ], ];
 return $m4is_gqid;
 } }

