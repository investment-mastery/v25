<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_debx::m4is_xexw();
 final 
class m4is_debx { private $m4is_bnd6ti;
 private $m4is_qh8p6;
 private $m4is_fe7xib;
  static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->m4is_gm1n();
 }  private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_qh8p6 = (array) $this->m4is_bnd6ti->m4is_oiewvu( 'memberships' );
 $this->m4is_fe7xib = m4is_wr40w::m4is_t4m9w();
 }  private 
function m4is_k_i3nb() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } if ( ! empty( $_POST['main_action'] ) ) { $this->m4is_kk2p7c();
 } if ( ! empty( $_POST['action'] ) ) { if ( $_POST['action'] === 'edit' ) { $this->m4is_p83p();
 } elseif ( $_POST['action'] === 'add' ) { $this->m4is_ensw();
 } elseif ( $_POST['action'] === 'delete' ) { $this->m4is_yh8fy();
 } } if ( ! empty( $_POST['create-category'] ) ) { $this->m4is_lp_qd();
 } if ( ! empty( $_POST['create-tag'] ) ) { $this->m4is_icnizm();
 } if ( ! empty( $_POST['create-tags'] ) ) { $this->m4is_hexjq();
 } if ( ! empty( $_POST['create-membership'] ) ) { $this->m4is_rg3e();
 } $this->m4is_o2oxpj();
 m4is_wr40w::m4is_kj4sp();
 }  private 
function m4is_gm1n() { $this->m4is_k_i3nb();
 $m4is_v6fdv4 = isset( $_GET['action'] ) ? trim( $_GET['action'] ) : '';
 $m4is_j5sy07 = isset( $_GET['id'] ) ? (int) $_GET['id'] : 0;
 if ( $m4is_v6fdv4 == 'edit' && $m4is_j5sy07 > 0 ) { require_once $this->m4is_bnd6ti->m4is_ev6n7e( '/memberships-edit.php' );
 } elseif ( $m4is_v6fdv4 == 'add' ) { require_once $this->m4is_bnd6ti->m4is_ev6n7e( '/memberships-add.php' );
 } else { require_once $this->m4is_bnd6ti->m4is_ev6n7e( '/memberships-list.php' );
 require_once $this->m4is_bnd6ti->m4is_ev6n7e( '/memberships-tagbuilder.php' );
 } $this->m4is_bnd6ti->m4is_q285( 'view_memberships' );
 } private 
function m4is_o2oxpj() { uasort( $this->m4is_qh8p6, function ($m4is_isfb, $m4is_af8vum ) { if ($m4is_isfb['level'] == $m4is_af8vum['level'] ) { if ($m4is_isfb['name'] == $m4is_af8vum['name'] ) { return 0;
 } return ($m4is_isfb['name'] < $m4is_af8vum['name'] ) ? -1 : 1;
 } return ($m4is_isfb['level'] < $m4is_af8vum['level'] ) ? -1 : 1;
 } );
 $this->m4is_bnd6ti->m4is_qdi_3o( $this->m4is_qh8p6, 'memberships' );
 } private 
function m4is_kk2p7c() { $_POST['main_action'] = $_POST['main_action'] ?? [];
 $_POST['level'] = $_POST['level'] ?? [];
 $_POST['login_redirect_priority'] = $_POST['login_redirect_priority'] ?? [];
 if ( ! empty( $_POST['level'] ) && is_array( $_POST['level'] ) ) { foreach( $_POST['level'] as $m4is_s2ge5 => $m4is_w_o7al ) { $this->m4is_qh8p6[$m4is_s2ge5]['level'] = $m4is_w_o7al;
 } } if ( ! empty( $_POST['login_redirect_priority'] ) && is_array( $_POST['login_redirect_priority'] ) ) { foreach( $_POST['login_redirect_priority'] as $m4is_s2ge5 => $m4is_w_o7al ) { $this->m4is_qh8p6[$m4is_s2ge5]['login_redirect_priority'] = $m4is_w_o7al;
 } } if ( ! empty( $_POST['main_action'] ) && is_array( $_POST['main_action'] ) ) { $deleted_memberships = [];
 foreach( $_POST['main_action'] as $m4is_s2ge5 => $m4is_w_o7al ) { if ( $m4is_w_o7al == 'Delete' ) { m4is_wr40w::m4is_cxesuf( 'Your membership level &ldquo;<strong>' . $this->m4is_qh8p6[$m4is_s2ge5]['name'] . '</strong>&rdquo; has been deleted.' );
  $m4is__t_zel = 'Memberium ' . $this->m4is_qh8p6[$m4is_s2ge5]['name'];
 $m4is_p5y94c = sanitize_key( 'memberium_' . $this->m4is_qh8p6[$m4is_s2ge5]['name'] );
 remove_role( $m4is_p5y94c );
 unset( $this->m4is_qh8p6[$m4is_s2ge5] );
 $deleted_memberships[] = $m4is_s2ge5;
 } } $this->m4is_xpeli( $deleted_memberships );
 } } private 
function m4is_ensw() { $m4is_j5sy07 = isset( $_POST['main_id'] ) ? (int) $_POST['main_id'] : 0;
 if ( empty( $_POST['name'] ) || empty( $m4is_j5sy07 ) ) { m4is_wr40w::m4is_cxesuf( 'Failed to add Membership Level.  Missing Fields' );
 return;
 } $m4is_szl_j = [];
 $m4is_szl_j['name'] = ucwords( trim( $_POST['name'] ) );
 $m4is_szl_j['main_id'] = (int) $_POST['main_id'];
 $m4is_szl_j['addltag_ids'] = empty( $_POST['addltag_ids'] ) ? '' : $_POST['addltag_ids'];
 $m4is_szl_j['payf_id'] = (int) $_POST['payf_id'];
 $m4is_szl_j['cancel_id'] = (int) $_POST['cancel_id'];
 $m4is_szl_j['suspend_id'] = (int) $_POST['suspend_id'];
 $m4is_szl_j['level'] = (int) $_POST['level'];
 $m4is_szl_j['roles'] = array_filter( (array) $_POST['roles'] );
 $m4is_szl_j['login_page'] = (int) $_POST['login_page'];
 $m4is_szl_j['first_login_page'] = (int) $_POST['first_login_page'];
 $m4is_szl_j['logout_page'] = (int) $_POST['logout_page'];
 $m4is_szl_j['theme'] = $_POST['theme'];
 $m4is_szl_j['payf_homepage'] = (int) $_POST['payf_homepage'];
 $m4is_szl_j['susp_homepage'] = (int) $_POST['susp_homepage'];
 $m4is_szl_j['canc_homepage'] = (int) $_POST['canc_homepage'];
 $m4is_szl_j['dynamic_menus'] = isset( $_POST['dynamic_menus'] ) ? (int) $_POST['dynamic_menus'] : 0;
  $m4is__t_zel = 'Memberium ' . $m4is_szl_j['name'];
 $m4is_p5y94c = sanitize_key('memberium_' . $m4is_szl_j['name'] );
 $m4is_smxn = get_role($m4is_p5y94c );
 if (! $m4is_smxn ) { $m4is_smxn = add_role($m4is_p5y94c, $m4is__t_zel );
 } $m4is_smxn->add_cap('read');
 $this->m4is_qh8p6[$m4is_j5sy07] = $m4is_szl_j;
 } private 
function m4is_p83p() { $m4is_j5sy07 = (int) $_GET['id'] ?? (int) $_GET['id'];
 if ( empty( $_GET['id'] ) || ! array_key_exists( $m4is_j5sy07, $this->m4is_qh8p6 ) ) { return;
 } $m4is_yy6bl = $this->m4is_qh8p6[$m4is_j5sy07];
 $m4is_q48f1 = $this->m4is_qh8p6[$m4is_j5sy07];
 $m4is_q48f1['main_id'] = $m4is_j5sy07;
 $m4is_q48f1['cancel_id'] = isset( $_POST['cancel_id'] ) ? (int) $_POST['cancel_id'] : $m4is_yy6bl['cancel_id'];
 $m4is_q48f1['level'] = isset( $_POST['level'] ) ? (int) $_POST['level'] : $m4is_yy6bl['level'];
 $m4is_q48f1['login_page'] = isset( $_POST['login_page'] ) ? (int) $_POST['login_page'] : $m4is_yy6bl['login_page'];
 $m4is_q48f1['first_login_page'] = isset( $_POST['first_login_page'] ) ? (int) $_POST['first_login_page'] : $m4is_yy6bl['first_login_page'];
 $m4is_q48f1['addltag_ids'] = isset( $_POST['addltag_ids'] ) ? $_POST['addltag_ids'] : $m4is_yy6bl['addltag_ids'];
 $m4is_q48f1['logout_page'] = isset( $_POST['logout_page'] ) ? (int) $_POST['logout_page'] : $m4is_yy6bl['logout_page'];
 $m4is_q48f1['name'] = isset( $_POST['name'] ) ? $_POST['name'] : $m4is_yy6bl['name'];
 $m4is_q48f1['payf_id'] = isset( $_POST['payf_id'] ) ? (int) $_POST['payf_id'] : $m4is_yy6bl['payf_id'];
 $m4is_q48f1['suspend_id'] = isset( $_POST['suspend_id'] ) ? (int) $_POST['suspend_id'] : $m4is_yy6bl['suspend_id'];
 $m4is_q48f1['theme'] = isset( $_POST['theme'] ) ? $_POST['theme'] : $m4is_yy6bl['theme'];
 $m4is_q48f1['login_redirect_priority'] = isset( $_POST['login_redirect_priority'] ) ? (int) $_POST['login_redirect_priority'] : $m4is_yy6bl['login_redirect_priority'];
 $m4is_q48f1['payf_homepage'] = isset( $_POST['payf_homepage'] ) ? (int) $_POST['payf_homepage'] : $m4is_yy6bl['payf_homepage'];
 $m4is_q48f1['susp_homepage'] = isset( $_POST['susp_homepage'] ) ? (int) $_POST['susp_homepage'] : $m4is_yy6bl['payf_homepage'];
 $m4is_q48f1['canc_homepage'] = isset( $_POST['canc_homepage'] ) ? (int) $_POST['canc_homepage'] : $m4is_yy6bl['canc_homepage'];
 $m4is_q48f1['dynamic_menus'] = isset( $_POST['dynamic_menus'] ) ? (int) $_POST['dynamic_menus'] : $m4is_yy6bl['dynamic_menus'];
 $m4is_q48f1['roles'] = array_filter( isset( $_POST['roles'] ) ? $_POST['roles'] : $m4is_yy6bl['roles'] );
$m4is_q48f1;
 $this->m4is_qh8p6[$m4is_j5sy07] = $m4is_q48f1;
  m4is_wr40w::m4is_cxesuf('Your membership level &ldquo;<strong>' . trim( $_POST['name'] ) . '</strong>&rdquo; has been updated.' );
 } private 
function m4is_hexjq() { $m4is_oyzib = trim( $_POST['tag_name'] );
 $m4is_e06y = (int) $_POST['start'];
 $m4is_gdyr = (int) $_POST['end'];
 $m4is_qo53 = (int) abs( trim( $_POST['category_id'] ) );
 $m4is__8htld = false;
 if ( false === strpos( $m4is_oyzib, '%d' ) ) { $m4is_oyzib .= ' %d';
 } for ( $m4is_tiq5k6 = $m4is_e06y;
 $m4is_tiq5k6 <= $m4is_gdyr;
 $m4is_tiq5k6++ ) { $m4is_hqe1c = sprintf( $m4is_oyzib, $m4is_tiq5k6 );
 if ( ! m4is_pwtg7::m4is_vx0z5( $m4is_hqe1c ) ) { m4is_pwtg7::m4is_icnizm( $m4is_hqe1c . $m4is__4bd, $m4is_qo53 );
 $m4is__8htld = true;
 } } if ( $m4is__8htld ) { m4is_pwtg7::m4is_jgs89();
 m4is_wr40w::m4is_cxesuf( 'Your Drip Tags for &ldquo;<strong>' . $m4is_hqe1c . '</strong>&rdquo; have been created.' );
 } else { m4is_wr40w::m4is_cxesuf( 'Your Drip Tags for &ldquo;<strong>' . $m4is_hqe1c . '</strong>&rdquo; already exist.' );
 } } private 
function m4is_yh8fy() { $m4is_j5sy07 = isset( $_POST['membership_id'] ) ? (int) $_POST['membership_id'] : 0;
 if ( array_key_exists( $m4is_j5sy07, $this->m4is_qh8p6 ) ) { $m4is_t5ot4 = $this->m4is_qh8p6[$_POST[$m4is_j5sy07]]['name'];
 unset( $m4is_qh8p6[$m4is_j5sy07] );
 m4is_wr40w::m4is_cxesuf( sprintf( 'Your membership level &ldquo;<strong>%s</strong>&rdquo; has been deleted.' ), $m4is_t5ot4 );
 } } private 
function m4is_lp_qd() { $m4is_t5ot4 = isset( $_POST['category_name'] ) ? $_POST['category_name'] : '';
 $m4is_j5sy07 = m4is_a18xl::m4is_oh8mn2( $m4is_t5ot4 );
 if ( $m4is_j5sy07 ) { m4is_wr40w::m4is_cxesuf( 'Your Category &ldquo;<strong>' . $m4is_sxohk . '</strong>&rdquo; has been created.' );
 } else { m4is_wr40w::m4is_cxesuf( 'Your Category &ldquo;<strong>' . $m4is_sxohk . '</strong>&rdquo; already exists.' );
 } return $m4is_j5sy07;
 }  private 
function m4is_xpeli( array $m4is_fanr5 ) : bool { if ( empty( $m4is_fanr5 ) ) { return false;
 } global $wpdb;
 $m4is_tovizk = "SELECT `post_id`, `meta_value` FROM `{$wpdb->postmeta}` WHERE `meta_key` = '_is4wp_membership_levels' AND `meta_value` > '' ";
 $m4is_t0lr4 = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 foreach ( $m4is_t0lr4 as $m4is_c2ah ) { $m4is_wpyerj = array_filter( explode( ',', $m4is_c2ah['meta_value'] ) );
 $m4is_ot65o = implode( ',', array_diff( $m4is_wpyerj, $m4is_fanr5 ) );
 m4is_rv9lt::m4is_y34p( $m4is_c2ah['post_id'], 'memberships', $m4is_ot65o );
 } $this->m4is_bnd6ti->m4is_u7g91i();
 return true;
 } private 
function m4is_icnizm() {  $m4is_hqe1c = isset( $_POST['tag_name'] ) ? trim( $_POST['tag_name'] ) : '';
 $m4is_qo53 = isset( $_POST['category_id'] ) ? (int) abs( trim( $_POST['category_id'] ) ) : 0;
 if ( empty( $m4is_hqe1c ) ) { m4is_wr40w::m4is_cxesuf( 'Tag name missing.' );
 return;
 } $m4is_njoths = m4is_pwtg7::m4is_vx0z5( $m4is_hqe1c );
 if ( ! $m4is_njoths ) { m4is_pwtg7::m4is_icnizm( $m4is_hqe1c, $m4is_qo53 );
 m4is_wr40w::m4is_cxesuf('Your Tag &ldquo;<strong>' . $m4is_hqe1c . '</strong>&rdquo; has been created.' );
 } else { m4is_wr40w::m4is_cxesuf('Your Tag &ldquo;<strong>' . $m4is_hqe1c . '</strong>&rdquo; already exists.' );
 } m4is_pwtg7::m4is_jgs89();
 } private 
function m4is_rg3e() {  $m4is_hqe1c = trim( $_POST['tag_name'] );
 $m4is_qo53 = (int) abs( trim( $_POST['category_id'] ) );
 $m4is_b9ixb = ! empty( $_POST['create_set'] );
 $m4is_c6im0 = $m4is_b9ixb ? ['', 'PAYF', 'CANC', 'SUSP'] : ['', 'PAYF'];
 $m4is__8htld = false;
 $m4is__m3_q8 = [];
 foreach( $m4is_c6im0 as $m4is__4bd ) { $m4is_jec4ob = $m4is_hqe1c . $m4is__4bd;
 $m4is_yer1mp = m4is_pwtg7::m4is_vx0z5( $m4is_jec4ob );
 if ( ! $m4is_yer1mp ) { $m4is__m3_q8['Tag' . $m4is__4bd] = m4is_pwtg7::m4is_icnizm( $m4is_hqe1c . $m4is__4bd, $m4is_qo53 );
 $m4is__8htld = true;
 } } if ($m4is__8htld ) { m4is_pwtg7::m4is_jgs89();
 $m4is_xni7 = [ 'name' => $m4is_hqe1c, 'main_id' => $m4is__m3_q8['Tag'], 'payf_id' => isset($m4is__m3_q8['TagPAYF'] ) ? $m4is__m3_q8['TagPAYF'] : 0, 'cancel_id' => isset($m4is__m3_q8['TagCANC'] ) ? $m4is__m3_q8['TagCANC'] : 0, 'suspend_id' => isset($m4is__m3_q8['TagSUSP'] ) ? $m4is__m3_q8['TagSUSP'] : 0, 'level' => 0, 'roles' => [], 'login_page' => 0, 'first_login_page' => 0, 'logout_page' => 0, 'theme' => '', 'login_redirect_priority' => 0, 'addltag_ids' => '', 'payf_homepage' => 0, 'susp_homepage' => 0, 'canc_homepage' => 0, 'dynamic_menus' => 0, ];
 $this->m4is_qh8p6[$m4is__m3_q8['Tag']] = $m4is_xni7;
  $m4is__t_zel = 'Memberium ' . $m4is_hqe1c;
 $m4is_p5y94c = sanitize_key( 'memberium_' . $m4is_hqe1c );
 $m4is_smxn = get_role( $m4is_p5y94c );
 if ( ! $m4is_smxn ) { $m4is_smxn = add_role( $m4is_p5y94c, $m4is__t_zel );
 } $m4is_smxn->add_cap( 'read' );
 m4is_wr40w::m4is_cxesuf( 'Your Membership Tags for &ldquo;<strong>' . $m4is_hqe1c . '</strong>&rdquo; and Level have been created.' );
 } else { m4is_wr40w::m4is_cxesuf('Your Membership Tags for &ldquo;<strong>' . $m4is_hqe1c . '</strong>&rdquo; already exist.' );
 } } }

