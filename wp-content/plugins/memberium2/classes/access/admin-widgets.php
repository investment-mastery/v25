<?php
/**
 * Copyright (c) 2014-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_j3cux {  static 
function m4is_js4x_( $m4is_zhfuk3, $m4is_kof0, $m4is_ye0_i ) { $m4is_w_8g = self::m4is_kqz6();
 foreach ($m4is_w_8g as $m4is_tiq5k6 => $m4is_g1ru50){ $m4is_w_8g[$m4is_tiq5k6]['id'] = $m4is_zhfuk3->get_field_id($m4is_g1ru50['name']);
 $m4is_w_8g[$m4is_tiq5k6]['field_name'] = $m4is_zhfuk3->get_field_name($m4is_g1ru50['name']);
 $m4is_w_8g[$m4is_tiq5k6]['value'] = isset($m4is_ye0_i[$m4is_g1ru50['name']]) ? $m4is_ye0_i[$m4is_g1ru50['name']] : '';
 } $m4is_qqwj1c = 'wpal-widget-access';
 $m4is_gpwr1c = $m4is_zhfuk3->id;
 $m4is_r54a = 'widget';
 $m4is_uqykhj = isset($m4is_ye0_i['status']) ? $m4is_ye0_i['status'] : '';
 $m4is_og5oj = m4is_uv6ib::m4is_e5l8a9()->m4is_g6n14();
 include m4is_pms8y::m4is_e5l8a9()->m4is_ev6n7e('core-wp-asset-access-meta.php');
 return;
 } static 
function m4is_uty9( $m4is_ye0_i, $m4is_jc891 ){ $m4is_w_8g = self::m4is_kqz6();
 if( is_array($m4is_w_8g) && ! empty($m4is_w_8g) ){ $m4is_uqykhj = 0;
  foreach ($m4is_w_8g as $m4is_g1ru50) { $m4is_t5ot4 = $m4is_g1ru50['name'];
 $m4is_w_o7al = '';
 if( isset($m4is_jc891[$m4is_t5ot4]) ){ $m4is_u23rl = $m4is_g1ru50['type'];
 $m4is_w_o7al = $m4is_jc891[$m4is_t5ot4];
  if( $m4is_u23rl === 'select2' && !empty($m4is_w_o7al) ){ $m4is_w_o7al = trim($m4is_w_o7al, ',');
  if( $m4is_t5ot4 === 'memberships' && !empty($m4is_w_o7al) ){ $m4is_bkpa7w = m4is_uv6ib::m4is_e5l8a9()->m4is_vi9m($m4is_w_o7al);
 $m4is_w_o7al = $m4is_bkpa7w ? $m4is_bkpa7w : $m4is_w_o7al;
 $m4is_ye0_i['any_membership'] = $m4is_bkpa7w ? 1 : 0;
 } } if( $m4is_t5ot4 === 'status' ){ $m4is_uqykhj = (int)$m4is_w_o7al;
 } $m4is_ye0_i[$m4is_t5ot4] = $m4is_w_o7al;
 } }  if( $m4is_uqykhj === 1 ){ $m4is_ye0_i['logged_in_only'] = 1;
 $m4is_ye0_i['logged_out_only'] = 0;
 }  else if( $m4is_uqykhj === 2 ){ $m4is_ye0_i['logged_in_only'] = 0;
 $m4is_ye0_i['logged_out_only'] = 1;
 $m4is_ye0_i = m4is_uv6ib::m4is_e5l8a9()->m4is_j4mv($m4is_ye0_i);
 }  else{ $m4is_ye0_i['logged_in_only'] = 0;
 $m4is_ye0_i['logged_out_only'] = 0;
 $m4is_ye0_i = m4is_uv6ib::m4is_e5l8a9()->m4is_j4mv($m4is_ye0_i);
 } } m4is_pms8y::m4is_e5l8a9()->m4is_u7g91i();
 return $m4is_ye0_i;
 } static 
function m4is_g5n2r(){ static $m4is__2v71 = false;
 if ($m4is__2v71){ return;
 } m4is_uv6ib::m4is_e5l8a9()->m4is_zomqs6('widget');
 $m4is__2v71 = true;
 }  static 
function m4is_kqz6(){ static $m4is_sm2t = false;
 if( $m4is_sm2t ){ return $m4is_sm2t;
 } $m4is_sm2t = m4is_uv6ib::m4is_e5l8a9()->m4is_l_cq('widget');
 return apply_filters( 'memberium/widget/fields', $m4is_sm2t );
 } }

