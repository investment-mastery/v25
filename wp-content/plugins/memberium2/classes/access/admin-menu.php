<?php
/**
 * Copyright (c) 2017-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_a8gw { static 
function m4is_ww61so() { add_action( 'wp_nav_menu_item_custom_fields', [__CLASS__, 'm4is_rh45l'], 10, 4 );
 add_action( 'wp_update_nav_menu_item', [__CLASS__, 'm4is_d45t'], 10, 3 );
 add_action( 'admin_enqueue_scripts', [__CLASS__, 'm4is_c8sq'] );
 add_filter( 'clean_url', [__CLASS__, 'm4is__y67'], 99, 3 );
 }  static 
function m4is_c8sq() { static $m4is_q6957 = false;
 if ( $m4is_q6957 ) { return;
 } m4is_uv6ib::m4is_e5l8a9()->m4is_zomqs6('menu');
 $m4is_q6957 = true;
 }  static 
function m4is_rh45l($m4is_s7bgu5, $m4is_f852, $m4is_ua348, $m4is_k4yeul) { $m4is_w_8g = self::m4is_tn7aj();
 if (! empty($m4is_w_8g) && is_array($m4is_w_8g) ) { $m4is_p51e_l = m4is_jf8abu::m4is_e5l8a9()->m4is__9ao($m4is_s7bgu5);
 $m4is_uqykhj = '';
 foreach ($m4is_w_8g as $m4is_tiq5k6 => $m4is_g1ru50){ $m4is_t5ot4 = $m4is_g1ru50['name'];
 $m4is_w_8g[$m4is_tiq5k6]['id'] = esc_attr("{$m4is_t5ot4}-{$m4is_s7bgu5}");
 $m4is_w_8g[$m4is_tiq5k6]['field_name'] = "wpal_menu[{$m4is_t5ot4}][{$m4is_s7bgu5}]";
 $m4is_w_8g[$m4is_tiq5k6]['value'] = isset($m4is_p51e_l[$m4is_t5ot4]) ? $m4is_p51e_l[$m4is_t5ot4] : '';
 $m4is_uqykhj = $m4is_t5ot4 === 'status' ? $m4is_w_8g[$m4is_tiq5k6]['value'] : $m4is_uqykhj;
 }  static $m4is_nwha3n = false;
 if (! $m4is_nwha3n ) { $m4is_swtx = 'memberium/menu/access';
 $m4is_nwha3n = true;
 wp_nonce_field($m4is_swtx, "_{$m4is_swtx}_name");
 }  $m4is_qqwj1c = 'wpal-menu-access';
 $m4is_gpwr1c = $m4is_s7bgu5;
 $m4is_r54a = 'menu';
 include m4is_pms8y::m4is_e5l8a9()->m4is_ev6n7e('core-wp-asset-access-meta.php');
 } }  static 
function m4is_d45t($m4is_waly, $m4is_s7bgu5, $m4is_k4yeul) {  $m4is_swtx = 'memberium/menu/access';
 if (! isset($_POST["_{$m4is_swtx}_name"]) || ! wp_verify_nonce($_POST["_{$m4is_swtx}_name"], $m4is_swtx) ) { return $m4is_waly;
 } $m4is_p51e_l = [];
 $m4is_mthe = [];
 $m4is_ip17tg = false;
 $m4is_xeusoh = false;
 $m4is_vbou5 = self::m4is_tn7aj();
 if (is_array($m4is_vbou5) && ! empty($m4is_vbou5) ) { $m4is_fl0p = isset($_POST['wpal_menu']) ? $_POST['wpal_menu'] : [];
 $m4is_mthe = m4is_jf8abu::m4is_e5l8a9()->m4is__9ao($m4is_s7bgu5);
 $m4is_ip17tg = ! empty($m4is_mthe);
 $m4is_p51e_l = $m4is_mthe;
 $m4is_uqykhj = 0;
  foreach ($m4is_vbou5 as $m4is_lc4ix => $m4is_g1ru50) { $m4is_t5ot4 = $m4is_g1ru50['name'];
 $m4is_lh4p70 = isset($m4is_fl0p[$m4is_t5ot4]) ? $m4is_fl0p[$m4is_t5ot4] : [];
 $m4is_w_o7al = isset($m4is_lh4p70[$m4is_s7bgu5]) ? $m4is_lh4p70[$m4is_s7bgu5] : '';
 $m4is_upbv7k = isset($m4is_mthe[$m4is_t5ot4]) ? $m4is_mthe[$m4is_t5ot4] : '';
 if ($m4is_g1ru50['type'] === 'select2' && $m4is_w_o7al > '' ) { $m4is_w_o7al = trim($m4is_w_o7al, ',');
  if ($m4is_t5ot4 === 'memberships' && $m4is_w_o7al > '' ) { $m4is_bkpa7w = m4is_uv6ib::m4is_e5l8a9()->m4is_vi9m($m4is_w_o7al);
 $m4is_w_o7al = $m4is_bkpa7w ? $m4is_bkpa7w : $m4is_w_o7al;
 $m4is_p51e_l['any_membership'] = $m4is_bkpa7w ? 1 : 0;
 } } if ($m4is_w_o7al != $m4is_upbv7k ) { $m4is_p51e_l[$m4is_t5ot4] = esc_attr($m4is_w_o7al);
 $m4is_xeusoh = true;
 } if ($m4is_t5ot4 === 'status' ) { $m4is_uqykhj = (int) $m4is_w_o7al;
 } }  if ($m4is_uqykhj === 1) { $m4is_p51e_l['logged_in_only'] = 1;
 $m4is_p51e_l['logged_out_only'] = 0;
 }  elseif ($m4is_uqykhj === 2) { $m4is_p51e_l['logged_in_only'] = 0;
 $m4is_p51e_l['logged_out_only'] = 1;
 $m4is_p51e_l = m4is_uv6ib::m4is_e5l8a9()->m4is_j4mv($m4is_p51e_l);
 }  else{ $m4is_p51e_l['logged_in_only'] = 0;
 $m4is_p51e_l['logged_out_only'] = 0;
 $m4is_p51e_l = m4is_uv6ib::m4is_e5l8a9()->m4is_j4mv($m4is_p51e_l);
 } } if ($m4is_xeusoh) {  if (! array_filter($m4is_p51e_l) ) {  if ($m4is_ip17tg) { delete_post_meta($m4is_s7bgu5, '_wpal/menu/access');
 } }  else{ update_post_meta($m4is_s7bgu5, '_wpal/menu/access', $m4is_p51e_l);
 } } m4is_pms8y::m4is_e5l8a9()->m4is_u7g91i();
 }  static 
function m4is__y67($m4is_imdo6, $m4is_u42kd, $m4is_hl8q) { $m4is_ci42fe = false !== strpos( $m4is_u42kd, '[' );
 $m4is_bmkv = false !== strpos( $m4is_u42kd, ']' );
 return $m4is_ci42fe && $m4is_bmkv ? $m4is_u42kd : $m4is_imdo6;
 } static 
function m4is_tn7aj(){ static $m4is_ad63i = false;
 if( $m4is_ad63i ){ return $m4is_ad63i;
 } $m4is_ad63i = m4is_uv6ib::m4is_e5l8a9()->m4is_l_cq('menu');
 return apply_filters( 'memberium/menu/access/fields', $m4is_ad63i );
 } }

