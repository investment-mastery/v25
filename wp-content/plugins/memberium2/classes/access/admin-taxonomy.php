<?php
/**
 * Copyright (c) 2017-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_c82oj9 { private static $m4is_xtl7we;
  private static $m4is_ndufnm;
  static 
function m4is_dcubpx () { $m4is_xtl7we = isset( $_REQUEST['taxonomy'] ) ? $_REQUEST['taxonomy'] : false;
 if ( ! $m4is_xtl7we ) { return;
 }   add_action( 'edited_term_taxonomy', [__CLASS__, 'm4is_zfcrue'], 10, 2 );
 $m4is_fa6l = m4is_jf8abu::m4is_e5l8a9()->m4is_i8vgc();
 if ( ! in_array( $m4is_xtl7we, $m4is_fa6l ) ) { return;
 } self::$m4is_xtl7we = $m4is_xtl7we;
 self::$m4is_ndufnm = isset( $_REQUEST['tag_ID'] ) ? $_REQUEST['tag_ID'] : 0;
 add_action( 'admin_enqueue_scripts', [__CLASS__, 'm4is_afh52_'] );
 add_action( "{$m4is_xtl7we}_edit_form_fields", [__CLASS__, 'm4is_rq3mtl'], 10, 2 );
 }  static 
function m4is_afh52_() { static $m4is_jlkjtu = false;
 if ( ! $m4is_jlkjtu ) { m4is_uv6ib::m4is_e5l8a9()->m4is_zomqs6( 'taxonomy' );
 $m4is_jlkjtu = true;
 } }  static 
function m4is_rq3mtl( $m4is_mpia, $m4is_xtl7we ) {  static $m4is_nwha3n = false;
 $m4is_akgp = $m4is_mpia->term_id;
 $m4is_w_8g = self::m4is_f7x480();
 if( is_array( $m4is_w_8g ) && ! empty( $m4is_w_8g ) ) { $m4is_p51e_l = m4is_jf8abu::m4is_e5l8a9()->m4is_ezm7( $m4is_akgp );
 $m4is_uqykhj = '';
 $m4is_b3h6t = '';
 foreach ( $m4is_w_8g as $m4is_tiq5k6 => $m4is_g1ru50 ){ $m4is_t5ot4 = $m4is_g1ru50['name'];
 $m4is_w_8g[$m4is_tiq5k6]['id'] = esc_attr( "{$m4is_t5ot4}-{$m4is_akgp}" );
 $m4is_w_8g[$m4is_tiq5k6]['field_name'] = "wpal_taxonomy[$m4is_t5ot4]";
 $m4is_w_8g[$m4is_tiq5k6]['value'] = isset( $m4is_p51e_l[$m4is_t5ot4] ) ? $m4is_p51e_l[$m4is_t5ot4] : '';
 $m4is_uqykhj = $m4is_t5ot4 === 'status' ? $m4is_w_8g[$m4is_tiq5k6]['value'] : $m4is_uqykhj;
 $m4is_b3h6t = $m4is_t5ot4 === 'prohibited_action' ? $m4is_w_8g[$m4is_tiq5k6]['value'] : $m4is_b3h6t;
 } if ( ! $m4is_nwha3n ) { $m4is_swtx = 'memberium/taxonomy/access';
 $m4is_nwha3n = true;
 wp_nonce_field( $m4is_swtx, "_{$m4is_swtx}_name" );
 }  $m4is_qqwj1c = 'wpal-taxonomy-access';
 $m4is_gpwr1c = $m4is_akgp;
 $m4is_r54a = 'taxonomy';
 echo "</tbody><tbody class=\"memberium-taxonomy-access-tbody\" data-prohibited-action=\"{$m4is_b3h6t}\">";
 echo "<tr><td colspan=\"2\">";
 include m4is_pms8y::m4is_e5l8a9()->m4is_ev6n7e( 'core-wp-asset-access-meta.php' );
 echo "</td></tr></tbody>";
 } } static 
function m4is_zfcrue( $m4is_akgp, $m4is__wmxb5 ) { $m4is_p51e_l = [];
 $m4is_mthe = [];
 $m4is_ip17tg = false;
 $m4is_xeusoh = false;
 $m4is_vbou5 = self::m4is_f7x480();
 if ( is_array( $m4is_vbou5 ) && ! empty( $m4is_vbou5 ) ) { $m4is_fl0p = isset( $_POST['wpal_taxonomy'] ) ? $_POST['wpal_taxonomy'] : [];
 $m4is_mthe = m4is_jf8abu::m4is_e5l8a9()->m4is_ezm7( $m4is_akgp );
 $m4is_ip17tg = ! empty( $m4is_mthe );
 $m4is_p51e_l = [];
 $m4is_uqykhj = 0;
 $m4is_b3h6t = '';
  foreach ( $m4is_vbou5 as $m4is_lc4ix => $m4is_g1ru50 ) { $m4is_t5ot4 = $m4is_g1ru50['name'];
 $m4is_w_o7al = isset( $m4is_fl0p[$m4is_t5ot4] ) ? $m4is_fl0p[$m4is_t5ot4] : [];
 $m4is_upbv7k = isset( $m4is_mthe[$m4is_t5ot4] ) ? $m4is_mthe[$m4is_t5ot4] : '';
 if ( $m4is_g1ru50['type'] === 'select2' && ! empty( $m4is_w_o7al ) ){ $m4is_w_o7al = trim( $m4is_w_o7al, ',' );
  if ( $m4is_t5ot4 === 'memberships' && ! empty( $m4is_w_o7al ) ) { $m4is_bkpa7w = m4is_uv6ib::m4is_e5l8a9()->m4is_vi9m( $m4is_w_o7al );
 $m4is_w_o7al = $m4is_bkpa7w ? $m4is_bkpa7w : $m4is_w_o7al;
 $m4is_p51e_l['any_membership'] = $m4is_bkpa7w ? 1 : 0;
 } } if ( $m4is_w_o7al != $m4is_upbv7k ) { $m4is_p51e_l[$m4is_t5ot4] = esc_attr( $m4is_w_o7al );
 $m4is_xeusoh = true;
 } else { $m4is_p51e_l[$m4is_t5ot4] = $m4is_upbv7k;
 } if ( $m4is_t5ot4 === 'status' ) { $m4is_uqykhj = (int) $m4is_w_o7al;
 } if ( $m4is_t5ot4 === 'prohibited_action' ) { $m4is_w_o7al = empty( $m4is_w_o7al ) ? '' : $m4is_w_o7al;
 $m4is_b3h6t = $m4is_p51e_l[$m4is_t5ot4] = $m4is_w_o7al;
 } if ( $m4is_t5ot4 === 'redirect_url' ) {  if ( esc_url_raw( $m4is_w_o7al ) != $m4is_w_o7al ) { $m4is_p51e_l['prohibited_action'] = $m4is_b3h6t = '';
 } } }  if ( $m4is_uqykhj === 1 ) { $m4is_p51e_l['logged_in_only'] = 1;
 $m4is_p51e_l['logged_out_only'] = 0;
 }  elseif ( $m4is_uqykhj === 2 ) { $m4is_p51e_l['logged_in_only'] = 0;
 $m4is_p51e_l['logged_out_only'] = 1;
 $m4is_p51e_l = m4is_uv6ib::m4is_e5l8a9()->m4is_j4mv( $m4is_p51e_l );
 }  else { $m4is_p51e_l['logged_in_only'] = 0;
 $m4is_p51e_l['logged_out_only'] = 0;
 $m4is_p51e_l = m4is_uv6ib::m4is_e5l8a9()->m4is_j4mv( $m4is_p51e_l );
 }  if ( (int) $m4is_b3h6t === 0 ) { unset( $m4is_p51e_l['redirect_url'] );
 $m4is_xeusoh = true;
 } } if ( $m4is_xeusoh ) { $m4is_ldjf8y = '_wpal/taxonomy/access';
  if ( ! array_filter( $m4is_p51e_l ) ) { if ( $m4is_ip17tg ) { delete_term_meta( $m4is_akgp, $m4is_ldjf8y );
  } } else{ update_term_meta( $m4is_akgp, $m4is_ldjf8y, $m4is_p51e_l );
  } } m4is_pms8y::m4is_e5l8a9()->m4is_u7g91i();
 } static 
function m4is_f7x480() { static $m4is_i_hvs0 = false;
 if ( $m4is_i_hvs0 ) { return $m4is_i_hvs0;
 } $m4is_i_hvs0 = m4is_uv6ib::m4is_e5l8a9()->m4is_l_cq( 'taxonomy' );
 return apply_filters( 'memberium/taxonomy/access/fields', $m4is_i_hvs0 );
 } }

