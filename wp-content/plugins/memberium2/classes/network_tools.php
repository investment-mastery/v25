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
class m4is_vv5u {  static 
function m4is_s15o8k( ?array $m4is_xm1h5_ = null ) : string { static $m4is_i_c7 = null;
 if ( ! is_null( $m4is_i_c7 ) ) { return $m4is_i_c7;
 } $m4is_xm1h5_ = $m4is_xm1h5_ ?? $_SERVER;
 $m4is_i_c7 = $m4is_xm1h5_['REMOTE_ADDR'];
 $m4is_inzuq = [ 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'HTTP_X_SUCURI_CLIENTIP', 'HTTP_X_REAL_IP', ];
 foreach ( $m4is_inzuq as $m4is_s2ge5 ) { if (array_key_exists($m4is_s2ge5, $_SERVER) === true) { foreach (explode(',', $m4is_xm1h5_[$m4is_s2ge5]) as $m4is_tmk3i) { $m4is_tmk3i = trim($m4is_tmk3i);
 if (self::m4is_rzie($m4is_tmk3i) ) { $m4is_i_c7 = $m4is_tmk3i;
 } } } } return $m4is_i_c7;
 }  private static 
function m4is_rzie( string $m4is_tmk3i ) : bool { if (filter_var($m4is_tmk3i, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) { return false;
 } return true;
 }  static 
function m4is_mh0v( string $m4is_imdo6 = '', bool $m4is_al35 = false, array $m4is_k4yeul = [] ) : string { $m4is_r6nh_b = [ 'timeout' => 3, ];
 $m4is_k4yeul = wp_parse_args( $m4is_k4yeul, $m4is_r6nh_b );
 $m4is_d71ub = wp_remote_get( $m4is_imdo6, $m4is_k4yeul );
 if ( is_array( $m4is_d71ub ) ) { if ( empty( $m4is_d71ub['body'] ) ) { $m4is_d71ub['body'] = '';
 } if ( ! $m4is_al35 ) { return $m4is_d71ub['body'];
 } else { return $m4is_d71ub;
 } } return '';
 }  static 
function m4is_mu1k( string $m4is_tmk3i, string $m4is_kbs0hu ) : bool { list( $subnet, $m4is_wp9j ) = array_filter( explode( '/', $m4is_kbs0hu ) );
 if ( ( ip2long( $m4is_tmk3i ) & ~( ( 1 << ( 32 - $m4is_wp9j ) ) - 1 ) ) == ip2long( $subnet ) ) { return true;
 } return false;
 }  static 
function m4is_ddwu() { $m4is_wvr4fa = 'memberium/aws_subnets';
 $m4is_cxh7 = get_transient($m4is_wvr4fa);
 if ($m4is_cxh7 === false) {  $m4is_d71ub = wp_remote_get('https://ip-ranges.amazonaws.com/ip-ranges.json');
  $m4is_d71ub = json_decode($m4is_d71ub['body']);
 $m4is_cxh7 = $m4is_d71ub->prefixes;
 set_transient($m4is_wvr4fa, $m4is_cxh7, 24 * HOUR_IN_SECONDS);
 unset($m4is_d71ub);
 } return $m4is_cxh7;
 }  static 
function m4is_sv9ma() : array { $m4is_cxh7 = m4is_vv5u::m4is_ddwu();
 $m4is_lkb9a = [];
 foreach( $m4is_cxh7 as $m4is_o160v ) { if ( 'S3' == $m4is_o160v->service ) { $m4is_lkb9a[ $m4is_o160v->region ] = $m4is_o160v->region;
 } } ksort( $m4is_lkb9a );
 return $m4is_lkb9a;
 }  static public 
function m4is_b4_tb( ?string $m4is_i9on = null ) : bool { $m4is_d2hq = array_filter( explode( ',', m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu( 'settings', 'debug_ip', '' ) ) );
 if ( empty ( $m4is_d2hq ) ) { return false;
 } $m4is_i9on = $m4is_i9on ?? m4is_vv5u::m4is_s15o8k();
 if ( in_array( $m4is_i9on, $m4is_d2hq ) ) { return true;
 } return false;
 } }

