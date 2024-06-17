<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_qzm8g {  static 
function m4is__sm0xo( int $m4is_ig9p6 = 0, int $m4is_u23rl = 0 ) : int { $m4is_ig9p6 = $m4is_ig9p6 == 0 ? get_current_user_id() : (int) $m4is_ig9p6;
 $m4is_u23rl = (int) $m4is_u23rl;
 if ( function_exists( 'badgeos_get_users_points' ) ) { $m4is_zua17 = badgeos_get_users_points( $m4is_ig9p6 );
 } elseif (function_exists( 'gamipress_get_user_points' ) ) { $m4is_zua17 = gamipress_get_user_points( $m4is_ig9p6 );
 } else { $m4is_s2ge5 = empty( $m4is_u23rl ) ? '_memberium_points' : "_memberium_{$m4is_u23rl}_points";
 $m4is_zua17 = get_user_meta( $m4is_ig9p6, $m4is_s2ge5, true );
 } return (int) $m4is_zua17;
 }  static 
function m4is_zkyuej(int $m4is_ig9p6 = 0, int $m4is_hd6gy = 0, int $m4is_u23rl = 0) : int { $m4is_ig9p6 = $m4is_ig9p6 == 0 ? get_current_user_id() : $m4is_ig9p6;
 $m4is_hd6gy = $m4is_hd6gy;
 $m4is_u23rl = $m4is_u23rl;
 if ($m4is_ig9p6 == 0) { return false;
 } $m4is_u23rl = self::m4is_vjf6e($m4is_u23rl);
 if (function_exists('badgeos_update_users_points') ) { $m4is_xp5z3 = badgeos_update_users_points($m4is_ig9p6, $m4is_hd6gy);
 badgeos_log_users_points($m4is_ig9p6, $m4is_hd6gy, $m4is_xp5z3, 0, 0);
 } elseif (function_exists('gamipress_update_user_points') ) { $m4is_xp5z3 = gamipress_update_user_points($m4is_ig9p6, $m4is_hd6gy);
 gamipress_log_user_points($m4is_ig9p6, $m4is_hd6gy, $m4is_xp5z3, 0, 0);
 } else { $m4is_s2ge5 = empty($m4is_u23rl) ? '_memberium_points' : "_memberium_{$m4is_u23rl}_points";
 $m4is_xp5z3 = $m4is_hd6gy + self::m4is__sm0xo($m4is_ig9p6);
 update_user_meta($m4is_ig9p6, $m4is_s2ge5, $m4is_xp5z3);
 } return $m4is_xp5z3;
 }  static 
function m4is_kdjtuf($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { $m4is_ig9p6 = isset($m4is_qnjfv['user_id']) ? (int) $m4is_qnjfv['user_id'] : get_current_user_id();
 $m4is_u23rl = isset($m4is_qnjfv['type']) ? (int) $m4is_qnjfv['type'] : '';
 $m4is_zua17 = self::m4is__sm0xo($m4is_ig9p6, $m4is_u23rl);
 return (string) $m4is_zua17;
 }     private static 
function m4is_vjf6e($m4is_nwq3dx = null) : string { if (empty($m4is_nwq3dx) ) { return '';
 } if (function_exists('gamipress_update_user_points') ) { $m4is_u23rl = gamipress_get_points_type($m4is_u23rl);
 } else { $m4is_u23rl = (string) $m4is_nwq3dx;
 } return $m4is_u23rl;
 } }

