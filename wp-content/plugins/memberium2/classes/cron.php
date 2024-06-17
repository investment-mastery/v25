<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_kro2 { private static $m4is_em87 = 'memberium/cron';
  public static 
function m4is_t6d9ng( array $m4is_tt2r41 ) : array { return array_merge( $m4is_tt2r41, [ '1min' => [ 'interval' => 60, 'display' => __( 'Every minute' ) ], '3min' => [ 'interval' => 3 * 60, 'display' => __( 'Every 3 minutes' ) ], '5min' => [ 'interval' => 5 * 60, 'display' => __( 'Every 5 minutes' ) ], '20min' => [ 'interval' => 20 * 60, 'display' => __( 'Every 20 minutes' ) ], '30min' => [ 'interval' => 30 * 60, 'display' => __( 'Every 30 minutes' ) ], ] );
 return $m4is_tt2r41;
 }  private static 
function m4is_zx5hrm() : array { return [ 'memberium/actionsets/sync' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/affiliates/running_totals' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/contacts/sync_custom_fields' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/contacts/async' => [ 'i' => '3min', 'o' => 0 ], 'memberium/contacts/makepass_scan' => [ 'i' => '3min', 'o' => 0 ], 'memberium/invoices/sync' => [ 'i' => '3min', 'o' => 0 ], 'memberium/maintenance/logs/trim' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/maintenance/updater' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/products/sync' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/subscriptions/scan_expired' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/subscriptions/sync' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/tags/categories/sync' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium/tags/sync' => [ 'i' => 'twicedaily', 'o' => 0 ], 'memberium_maintenance' => [ 'i' => 'hourly', 'o' => 0 ],  ];
 }  static 
function m4is_pyh02w() { $m4is_qni8fh = time();
 $m4is_bi3vq_ = self::m4is_zx5hrm();
 foreach( $m4is_bi3vq_ as $m4is_xdobe_ => $m4is_etj2 ) { $m4is_dr1k_ = $m4is_etj2['o'] == 0 ? $m4is_qni8fh : $m4is_qni8fh + rand( 0, 180 );
 wp_next_scheduled( $m4is_xdobe_ ) || wp_schedule_event( $m4is_dr1k_, $m4is_etj2['i'], $m4is_xdobe_ );
 } update_option( self::$m4is_em87, $m4is_qni8fh );
 }  static 
function m4is_bxhm5e() { $m4is_bi3vq_ = self::m4is_zx5hrm();
 foreach( $m4is_bi3vq_ as $m4is_xdobe_ => $m4is_etj2 ) { wp_clear_scheduled_hook( $m4is_xdobe_ );
 } delete_option( self::$m4is_em87 );
 }  static 
function m4is__tsov() { } }

