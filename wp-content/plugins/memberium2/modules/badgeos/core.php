<?php
/**
 * Copyright (c) 2021-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_quopci { private $m4is_bnd6ti;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->m4is_ww61so();
 $this->m4is_jq0ld();
  }     private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 }  private 
function m4is_ww61so() { add_action( 'badgeos_award_achievement', [$this, 'm4is_kur2h'], 10, 2 );
 add_action( 'memberium/lms/completion', [$this, 'm4is_kxd0'], 10, 2 );
 add_filter( 'memberium/posts/unenhanced', [$this, 'm4is_k6m4'], 10, 1 );
 add_filter( 'memberium/session/updated', [$this, 'm4is_n7yz'], 10, 2 );
 }  private 
function m4is_jq0ld() : void { if ( is_admin() ) { require_once __DIR__ . '/admin.php';
 m4is_dgyr::m4is_e5l8a9();
 } }     
function m4is_k6m4( $m4is_fvc10 = [] ) { $m4is_fvc10[] = 'achievement-type';
 $m4is_fvc10[] = 'badgeos-log-entry';
 $m4is_fvc10[] = 'nomination';
 $m4is_fvc10[] = 'step';
 $m4is_fvc10[] = 'submission';
 $m4is_cx_zt = badgeos_get_achievement_types_slugs();
 $m4is_fvc10 = array_merge( $m4is_fvc10, $m4is_cx_zt );
 return $m4is_fvc10;
 }  
function m4is_kur2h( int $m4is_ig9p6, $m4is_w39p ) { $m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( $m4is_ig9p6 );
 if ( ! $m4is_e2kg ) { return;
 } $m4is_u6a2 = get_option( 'memberium/badgeos/tag_by_badge', [] );
 $m4is_u6a2 = is_array( $m4is_u6a2 ) ? array_filter( $m4is_u6a2 ) : [];
 if ( array_key_exists( $m4is_w39p, $m4is_u6a2 ) ) { $m4is_mpia = $m4is_u6a2[$m4is_w39p];
 $this->m4is_bnd6ti->m4is_tcle75( $m4is_mpia, $m4is_e2kg );
 } }  
function m4is_n7yz( int $m4is_ig9p6, $m4is_mdqgk ) { $m4is_iystd2 = array_filter( explode( ',', $m4is_mdqgk['keap']['contact']['groups'] ?? '' ) );
 if ( empty( $m4is_iystd2 ) ) { return;
 } $this->m4is_el2tc( $m4is_ig9p6, $m4is_iystd2 );
 } 
function m4is_kxd0( $m4is_ig9p6, $m4is_cd8k ) { if ( ! function_exists( 'badgeos_award_achievement_to_user' ) ) { return;
 } $m4is_flmv3z = get_post_meta( $m4is_cd8k, '_is4wp_learndash_achievement', true );
 if ( $m4is_flmv3z ) { badgeos_award_achievement_to_user( $m4is_flmv3z, $m4is_ig9p6 );
 } }  private 
function m4is__83s4p( $m4is_ig9p6 = 0 ) { $m4is_k4yeul = [ 'user_id' => $m4is_ig9p6, ];
 $m4is_cx_zt = badgeos_get_user_achievements( $m4is_k4yeul );
 $m4is_jp2kx = array_map( function( $m4is_d_1p ) { return $m4is_d_1p->ID;
 }, $m4is_cx_zt );
 return $m4is_jp2kx;
 } private 
function m4is_el2tc( int $m4is_ig9p6, array $m4is_iystd2 ) { if ( ! function_exists( 'badgeos_award_achievement_to_user' ) ) { return;
 } $m4is_u6a2 = get_option( 'memberium/badgeos/assign_by_tag', [] );
 $m4is_u6a2 = is_array( $m4is_u6a2 ) ? array_filter( $m4is_u6a2 ) : [];
 if ( empty( $m4is_u6a2) || empty( $m4is_iystd2 ) ) { return;
 } $m4is_cx_zt = $this->m4is__83s4p( $m4is_ig9p6 );
 foreach( $m4is_u6a2 as $m4is_w39p => $m4is_ndufnm ) { if ( ! empty( $m4is_ndufnm ) ) { if ( ! in_array( $m4is_w39p, $m4is_cx_zt ) ) { if ( in_array( $m4is_ndufnm, $m4is_iystd2 ) ) { badgeos_award_achievement_to_user( $m4is_w39p, $m4is_ig9p6 );
 } } } } } }

