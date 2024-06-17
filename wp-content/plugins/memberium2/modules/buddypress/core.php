<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

  class_exists('m4is_pms8y') || die();
 final 
class m4is_pfmo { private $m4is_ds_2x = [];
 private $m4is_bnd6ti;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 if ( is_admin() ) { require_once __DIR__ . '/admin.php';
 m4is_rnxqp::m4is_e5l8a9();
 } else { require_once __DIR__ . '/frontend.php';
 m4is_w_dt8::m4is_e5l8a9();
 }  } private 
function m4is_ww61so() {  $this->m4is_hngu35();
 add_action( 'init', [$this, 'm4is_xgviu0'], 10 );
 add_action( 'bp_init', [$this, 'm4is_g4_568'] );
 add_action( 'xprofile_updated_profile', [$this, 'm4is_shbmz'], 0, 5 );
 add_action( 'memberium/session/updated', [$this, 'm4is_kuthbo'], 11, 2 );
 add_action( 'memberium/session/updated', [$this, 'm4is_ftxfsc'], 10, 2 );
 add_action( 'after_setup_theme', [$this, 'm4is_wn0ed'] );
  add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 add_filter( 'memberium/user/register/fields', [$this, 'm4is_lyzn2q'], 10, 2 );
 add_filter( 'memberium/wpuser/nickname', [$this, 'm4is_etdx'], PHP_INT_MAX, 2 );
 } 
function m4is_xgviu0() { if ( bp_is_active('friends') ) { } } private 
function m4is_hngu35() { if ( bp_is_active( 'groups' ) ) { require_once __DIR__ . '/groups.php';
 m4is_czbp::m4is_e5l8a9();
 } } 
function m4is_ftxfsc( int $m4is_ig9p6, array $m4is_mdqgk ) { $this->m4is_ds_2x[ $m4is_ig9p6 ] = $m4is_mdqgk;
 if ( ! did_action( 'bp_init' ) ) { add_action( 'bp_init', [$this, 'm4is_g4_568'] );
 } else { $this->m4is_g4_568();
 } } 
function m4is_g4_568() { $this->m4is_hngu35();
 foreach( $this->m4is_ds_2x as $m4is_ig9p6 => $m4is_mdqgk ) { if ( ! empty( $m4is_mdqgk['keap']['contact'] ) ) { $this->m4is_da0i( $m4is_mdqgk['keap']['contact'], $m4is_ig9p6 );
 } } } 
function m4is_etdx( string $m4is_orvx = '', array $m4is_p9r_8e = [] ) { $m4is_orvx = sanitize_title_with_dashes( $m4is_orvx, null, 'save' );
 return $m4is_orvx;
 } 
function m4is_lyzn2q($m4is_p9r_8e, $m4is_x0_hk) { if ( is_a( $m4is_x0_hk, 'WP_User' ) ) { $m4is_ig9p6 = $m4is_x0_hk->ID;
 $m4is_dcf_7 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
  $m4is_hyw1m4 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only' );
 if ( function_exists( 'bp_xprofile_firstname_field_id' ) && function_exists( 'bp_xprofile_lastname_field_id' ) ) { $m4is_p2dx = bp_xprofile_firstname_field_id();
 $m4is_i2kd6 = bp_xprofile_lastname_field_id();
 $m4is_kqbrd = bp_xprofile_nickname_field_id();
 $m4is_zp6jm = empty( $_POST["field_{$m4is_p2dx}"]) ? '' : $_POST["field_{$m4is_p2dx}"];
 $m4is__cn5r = empty( $_POST["field_{$m4is_i2kd6}"]) ? '' : $_POST["field_{$m4is_i2kd6}"];
 $m4is_orvx = empty( $_POST["field_{$m4is_kqbrd}"]) ? '' : $_POST["field_{$m4is_kqbrd}"];
 $m4is_p9r_8e['FirstName'] = empty( $m4is_p9r_8e['FirstName'] ) ? $m4is_zp6jm : $m4is_p9r_8e['FirstName'];
 $m4is_p9r_8e['LastName'] = empty( $m4is_p9r_8e['LastName'] ) ? $m4is__cn5r : $m4is_p9r_8e['LastName'];
 $m4is_p9r_8e['Nickname'] = empty( $m4is_p9r_8e['Nickname'] ) ? $m4is_orvx : $m4is_p9r_8e['Nickname'];
 if ( ! $m4is_hyw1m4 ) { $m4is_j485e = empty( $_POST['signup_password'] ) ? '' : trim( $_POST['signup_password'] );
 $m4is_p9r_8e[$m4is_dcf_7] = empty( $m4is_p9r_8e[$m4is_dcf_7] ) ? $m4is_j485e : $m4is_p9r_8e[$m4is_dcf_7];
 } } } return $m4is_p9r_8e;
 } 
function m4is_ezu9( $m4is_ig9p6 ) { $m4is_x0_hk = get_user_by('id', $m4is_ig9p6);
 if ( is_a( $m4is_x0_hk, 'WP_User' ) ) { $m4is_lg3b = $m4is_x0_hk->user_login;
 $m4is_i7nt = new BP_Signup;
 $m4is_etj2 = $m4is_i7nt->get( ['user_login' => $m4is_lg3b] );
 $m4is_jyg2u = isset( $m4is_etj2['signups'][0]->signup_id ) ? $m4is_etj2['signups'][0]->signup_id : 0;
 if ($m4is_jyg2u) { $m4is_i7nt->activate([$m4is_jyg2u]);
 } } } 
function m4is_wn0ed() { remove_filter( 'login_redirect', 'buddyboss_redirect_previous_page', 10 , 3 );
 } 
function m4is_s1jxg5( $m4is_r1g2u ) { global $buddyboss_platform_plugin_file;
 if (! empty( $buddyboss_platform_plugin_file ) ) { $m4is_t5ot4 = 'BuddyBoss Platform Support';
 } else { $m4is_t5ot4 = 'BuddyPress Support';
 } return array_merge( $m4is_r1g2u, [ $m4is_t5ot4, ] );
 } 
function m4is_wf3wh( $user_id ) { } 
function m4is_shbmz( $m4is_ig9p6, $m4is_yzre5, $m4is_p6_h, $m4is__s1_o, $m4is_z0g14 ) { if ( ! class_exists( 'BP_XProfile_Field' ) ) { return;
 } $m4is_vs6ob = get_option( 'memberium_xprofile_map', [] );
 $m4is_z5rzd = m4is_ho3l::m4is_o6zj4m();
 foreach ( $m4is_vs6ob as $m4is_o79s => $m4is_o7tdnl ) { if ( ! empty( $m4is_o7tdnl ) && ! empty( $m4is_o79s ) ) { $m4is__47wig = empty( $m4is_z5rzd[$m4is_o79s] ) ? 15 : $m4is_z5rzd[$m4is_o79s];
 $m4is_wuh95 = empty( $m4is_z0g14[$m4is_o7tdnl]['value'] ) ? '' : $m4is_z0g14[$m4is_o7tdnl]['value'];
 $m4is_rs0z_j = 'memb_' . $m4is_o79s;
 if ( $m4is__47wig == 13 || $m4is__47wig == 14 ) { if ( ! empty( $m4is_wuh95 ) ) { $m4is_wuh95 = date( 'Y-m-d\TH:i:s', strtotime( $m4is_wuh95 ) );
 } } update_user_meta( $m4is_ig9p6, $m4is_rs0z_j, $m4is_wuh95 );
 } }  }  
function m4is_kuthbo( int $m4is_ig9p6, array $m4is_mdqgk ) { if ( ! function_exists( 'bp_set_member_type' ) || ! function_exists( 'bp_get_member_type' ) ) { return;
 } $m4is_c3pnb = isset( $m4is_mdqgk['memb_user']['membership_id'] ) ? $m4is_mdqgk['memb_user']['membership_id'] : '';
 if ( $m4is_c3pnb ) { $m4is_o5xas = (array) $this->m4is_bnd6ti->m4is_oiewvu( 'memberships' )[$m4is_c3pnb];
 if (! empty($m4is_o5xas['buddypress_profile_type'])) { $m4is_g2udz = bp_get_member_type( $m4is_ig9p6 );
 $m4is_mg2xw0 = $m4is_o5xas['buddypress_profile_type'];
 if ( $m4is_mg2xw0 !== $m4is_g2udz ) { bp_set_member_type( $m4is_ig9p6, $m4is_mg2xw0 );
 } } } } 
function m4is_da0i( array $m4is_p9r_8e, int $m4is_ig9p6 ) { if ( ! function_exists( 'xprofile_set_field_data' ) ) { return;
 } if ( empty( $m4is_p9r_8e ) ) { return;
 } $m4is_vs6ob = get_option( 'memberium_xprofile_map', [] );
 $m4is_z5rzd = m4is_ho3l::m4is_o6zj4m();
 if ( empty( $m4is_vs6ob ) || empty( $m4is_z5rzd ) || ! is_array( $m4is_z5rzd ) || ! is_array( $m4is_vs6ob ) ) { return;
 } $m4is_vs6ob = array_change_key_case( $m4is_vs6ob, CASE_LOWER );
 $m4is_z5rzd = array_change_key_case( $m4is_z5rzd, CASE_LOWER );
 foreach ( $m4is_vs6ob as $m4is_o79s => $m4is_o7tdnl ) { if ( $m4is_o7tdnl ) { $m4is__47wig = empty( $m4is_z5rzd[ $m4is_o79s ] ) ? 15 : $m4is_z5rzd[ $m4is_o79s ];
 $m4is_w_o7al = empty( $m4is_p9r_8e[$m4is_o79s] ) ? '' : $m4is_p9r_8e[ $m4is_o79s ];
 if ( in_array( $m4is__47wig, [ 13, 14 ] ) ) { if ( ! empty( $m4is_w_o7al ) ) { $m4is_w_o7al = date( 'Y-m-d H:i:s', strtotime( $m4is_w_o7al ) );
 } } $m4is_oa_z = xprofile_set_field_data( $m4is_o7tdnl, $m4is_ig9p6, $m4is_w_o7al );
 } } } }

