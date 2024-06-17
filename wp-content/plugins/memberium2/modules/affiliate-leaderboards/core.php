<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_gk3xz { const VERSION = '1.0';
 private $m4is_bnd6ti, $m4is_tu86mz = false, $m4is_l7zw9b = false, $m4is_bh12zy = false, $m4is_toz0 = [];
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { if ( ! m4is_u68pu::m4is_i9k3m() ) { return;
 } $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_x6wv();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti->m4is_gt7z( [ 'm4is_e4e9x8' => __DIR__ . '/cron', 'm4is_o0rsc6' => __DIR__ . '/shortcodes', ] );
 $this->m4is_xibt1();
 if ( is_admin() ) { require_once __DIR__ . '/admin.php';
 m4is_upn4ai::m4is_e5l8a9();
 } else { $this->m4is_ljhm();
 } } private 
function m4is_xibt1() { $m4is_qni8fh = time();
 $m4is_bi3vq_ = [ 'memberium/affiliates/scan_stale_leaderboards' => [ 'i' => 'twicedaily', 'o' => 0 ], ];
 foreach( $m4is_bi3vq_ as $m4is_xdobe_ => $m4is_etj2 ) { $m4is_dr1k_ = $m4is_etj2['o'] == 0 ? $m4is_qni8fh : $m4is_qni8fh + rand( 0, 30 );
 wp_next_scheduled( $m4is_xdobe_ ) || wp_schedule_event( $m4is_dr1k_, $m4is_etj2['i'], $m4is_xdobe_ );
 } add_action( 'memberium/affiliates/scan_stale_leaderboards', ['m4is_e4e9x8', 'm4is_bkl5'] );
 } 
function m4is_u04m() { return self::VERSION;
 } 
function m4is_lxyv() { return (array) get_option( 'memberium_leaderboard_profiles', [] );
 } 
function m4is__j5k( $m4is_toz0 ) { update_option( 'memberium_leaderboard_profiles', $m4is_toz0 );
 $this->m4is_toz0 = $m4is_toz0;
 } 
function m4is_djaz_7( $m4is_j5sy07 ) { $this->m4is_toz0 = $this->m4is_lxyv();
 foreach( $this->m4is_toz0 as $m4is_s2ge5 => $m4is_gvpi6 ) { if ( $m4is_j5sy07 === $m4is_s2ge5 || 0 === strcasecmp( $m4is_j5sy07, $m4is_gvpi6['name'] ) ) { return $m4is_gvpi6;
 } } return false;
 } 
function m4is_ljhm() { add_action( 'memberium/shortcodes/add', [$this, 'm4is_ljhm'] );
 add_shortcode( 'memb_show_leaderboard', ['m4is_o0rsc6', 'm4is_a743'] );
 } }

