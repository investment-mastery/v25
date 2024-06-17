<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 m4is_mj1go::m4is_x6wv();
 final 
class m4is_mj1go { static private $m4is_bnd6ti;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 } static 
function m4is_gd4c2o( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) { if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return;
 } static $m4is_glto1 = 0;
 $output = '';
 $m4is_j4lxnf = [ 'memb_list_shortcodes', 'memb_debug', ];
 $m4is_kt0n = $GLOBALS['shortcode_tags'];
 ksort( $m4is_kt0n );
 foreach ( $m4is_kt0n as $m4is_kjxmq => $m4is_j8ih ) { $m4is_fc3_z = stripos( $m4is_kjxmq, 'memb_') !== false || $m4is_fc3_z = stripos($m4is_kjxmq, 'umbrella_') !== false;
 if ( $m4is_fc3_z ) { $m4is_glto1++;
 echo "<strong>[{$m4is_kjxmq}]</strong><br />";
 echo do_shortcode("[{$m4is_kjxmq} showatts]"), '<br /><br />';
 } } return $output;
 } static 
function m4is_w2d1z( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) { $m4is_etj2 = self::$m4is_bnd6ti->m4is_i3dg( false );
 self::$m4is_bnd6ti->m4is_ufc87o( true );
 return '<pre>' . print_r( $m4is_etj2, true ) . '</pre>';
 } static 
function m4is_v3ip2( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { $m4is_qnjfv = (array) $m4is_qnjfv;
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts') { return '';
 } if ( ! is_super_admin() ) { return '';
 }       return '';
 } }

