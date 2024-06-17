<?php
 class_exists('m4is_pfmo') || die();
 final 
class m4is_c0adf extends BP_Group_Extension { 
function __construct() { add_filter('memberium/enhanced_admin_scripts', [$this, 'm4is_goh49w'], 10, 1);
 $m4is_k4yeul = [ 'access' => 'noone', 'name' => 'BuddyPress Groups for Memberium', 'slug' => 'bp-groups-for-memberium', ];
 parent::init( $m4is_k4yeul );
 } 
function m4is_goh49w($m4is_ldt2) { $m4is_ldt2[] = 'toplevel_page_bp-groups';
  $m4is_ldt2[] = 'buddyboss_page_bp-groups';
  return $m4is_ldt2;
 } 
function display( $m4is_nvkre = null ) { $m4is_nvkre = bp_get_group_id();
 } 
function settings_screen($m4is_nvkre = null) { if ( empty($m4is_nvkre) ) { return;
 } $m4is_lh4p70 = groups_get_groupmeta($m4is_nvkre, '_is4wp_autojoin');
 $m4is_lh4p70 = empty( $m4is_lh4p70 ) ? [] : $m4is_lh4p70;
 $m4is_lh4p70['autojoin_admin'] = isset( $m4is_lh4p70['autojoin_admin'] ) ? $m4is_lh4p70['autojoin_admin'] : '';
 $m4is_lh4p70['autojoin_moderator'] = isset( $m4is_lh4p70['autojoin_moderator'] ) ? $m4is_lh4p70['autojoin_moderator'] : '';
 $m4is_lh4p70['autojoin_member'] = isset( $m4is_lh4p70['autojoin_member'] ) ? $m4is_lh4p70['autojoin_member'] : '';
 $m4is_lh4p70['autoban'] = isset( $m4is_lh4p70['autoban'] ) ? $m4is_lh4p70['autoban'] : '';
 echo '<style>';
 echo ' .memberium_label { display:inline-block; width:175px; margin-right: 20px; }';
 echo ' .multitaglist .tag-selector { margin-bottom:6px; }';
 echo '</style>';
 echo '<label class="memberium_label">Autojoin as Admin:</label>';
 echo '<input type="text" id="is4wp_autojoin_admin" name="is4wp_autojoin_admin" value="', $m4is_lh4p70['autojoin_admin'], '" class="multitaglist" style="width:500px;">';
 echo '<br>';
 echo '<label class="memberium_label">Autojoin as Moderator:</label>';
 echo '<input type="text" id="is4wp_autojoin_moderator"  name="is4wp_autojoin_moderator" value="', $m4is_lh4p70['autojoin_moderator'], '" class="multitaglist" style="width:500px;">';
 echo '<br>';
 echo '<label class="memberium_label">Autojoin as Member:</label>';
 echo '<input type="text" name="is4wp_autojoin_member" value="', ( $m4is_lh4p70['autojoin_member'] > '' ? $m4is_lh4p70['autojoin_member'] : '' ), '" class="multitaglist" style="width:500px;">';
 echo '<br>';
 echo '<label class="memberium_label">Auto-Ban:</label>';
 echo '<input type="text" name="is4wp_autoban" value="', ( $m4is_lh4p70['autoban'] > '' ? $m4is_lh4p70['autoban'] : '' ), '" class="multitaglist" style="width:500px;">';
 echo '<br>';
 return;
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_apvd = [];
 foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => $m4is_mpia . ' (' . $m4is_j5sy07 . ')' ];
 } $m4is_apvd = json_encode( $m4is_apvd );
 unset( $m4is_iystd2, $m4is_j5sy07, $m4is_mpia );
 echo '<script>';
 echo '	var taglist = ', $m4is_apvd, ';';
 echo '</script>';
 unset( $m4is_iystd2, $m4is_apvd );
 echo '<script> ';
 echo '	jQuery(document).ready( function() { ';
 echo '		jQuery(".multitaglist").wpalSelect2({ ';
 echo '			placeholder: "Select the tags for this role.", ';
 echo '			tags: taglist ';
 echo '		}); ';
 echo '}); ';
 echo '</script>';
 } 
function settings_screen_save( $m4is_nvkre = NULL ) { $m4is_lh4p70 = [];
 $m4is_lh4p70['autojoin_admin'] = isset( $_POST['is4wp_autojoin_admin'] ) ? $_POST['is4wp_autojoin_admin'] : '';
 $m4is_lh4p70['autojoin_moderator'] = isset( $_POST['is4wp_autojoin_moderator'] ) ? $_POST['is4wp_autojoin_moderator'] : '';
 $m4is_lh4p70['autojoin_member'] = isset( $_POST['is4wp_autojoin_member'] ) ? $_POST['is4wp_autojoin_member'] : '';
 $m4is_lh4p70['autoban'] = isset( $_POST['is4wp_autoban'] ) ? $_POST['is4wp_autoban'] : '';
 groups_update_groupmeta( $m4is_nvkre, '_is4wp_autojoin', $m4is_lh4p70 );
 } } final 
class m4is_czbp { private $m4is_ig9p6 = 0;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { if ( ( ! class_exists( 'BP_Groups_Group' ) ) || ( ! class_exists( 'BP_Group_Extension' ) ) ) { return;
 } if ( function_exists( 'bp_register_group_extension' ) ) { if ( is_admin() ) { bp_register_group_extension( 'm4is_c0adf' );
 } } $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_action( 'memberium/session/updated', [$this, 'm4is_uqveb'], 20, 2 );
 } private 
function m4is_w6jhx1( $m4is_vwdb4 ) { $m4is_x_rxou = [];
 if ( is_array( $m4is_vwdb4 ) ) { foreach( $m4is_vwdb4 as $m4is_evc54w ) { $m4is_x_rxou[] = $m4is_evc54w->id;
 } } return $m4is_x_rxou;
 } 
function m4is_xvzjh( $m4is_ig9p6 ) { $this->m4is_ig9p6 = $m4is_ig9p6;
 } 
function m4is_h4s0r( $m4is_j5sy07 ) { return empty( $this->m4is_ig9p6 ) ? $m4is_j5sy07 : $this->m4is_ig9p6;
 }  
function m4is_uqveb( $m4is_ig9p6, $m4is_mdqgk ) : void { if ( apply_filters( 'memberium/buddypress/groups/autojoin', false, $m4is_ig9p6 ) ) { return;
 } if ( ! function_exists( 'groups_get_groups' ) || ! class_exists( 'bp_groups_group' ) ) { return;
 } if ( ! defined( 'BP_GROUPS_SLUG' ) ) { return;
 } if ( defined( 'WPAL_DISABLE_BUDDYPRESS_AUTOJOIN' ) && WPAL_DISABLE_BUDDYPRESS_AUTOJOIN ) { return;
 } if ( user_can( $m4is_ig9p6, 'manage_options' ) ) { return;
 } $m4is_k4yeul = [ 'show_hidden' => true, 'per_page' => 0, 'page' => 0, ];
 $m4is_vwdb4 = groups_get_groups( $m4is_k4yeul );
 $m4is_vwdb4 = isset( $m4is_vwdb4['groups'] ) ? $m4is_vwdb4['groups'] : [];
 $m4is_iystd2 = isset( $m4is_mdqgk['memb_user']['tags'] ) ? array_filter( explode( ',', $m4is_mdqgk['memb_user']['tags'] ) ) : [];
 if ( is_array( $m4is_vwdb4 ) ) { $this->m4is_xvzjh( $m4is_ig9p6 );
 add_filter( 'bp_loggedin_user_id', [$this, 'm4is_h4s0r'], PHP_INT_MAX, 1 );
 $m4is_qtqa5 = BP_Groups_Member::get_group_ids( $m4is_ig9p6 )['groups'];
 $m4is_rs5ikv = $this->m4is_w6jhx1( BP_Groups_Member::get_is_banned_of( $m4is_ig9p6 )['groups'] );
 $m4is_pzvn4y = $this->m4is_w6jhx1( BP_Groups_Member::get_is_admin_of( $m4is_ig9p6 )['groups'] );
 $m4is_jry2 = $this->m4is_w6jhx1( BP_Groups_Member::get_is_mod_of( $m4is_ig9p6 )['groups'] );
 remove_filter( 'bp_loggedin_user_id', [$this, 'm4is_h4s0r'] );
 $this->m4is_xvzjh( 0 );
 foreach ( $m4is_vwdb4 as $m4is_evc54w ) { $m4is_bo0sx = new BP_Groups_Member( $m4is_ig9p6, $m4is_evc54w->id );
 $m4is_lh4p70 = groups_get_groupmeta( $m4is_evc54w->id, '_is4wp_autojoin' );
 $m4is_lh4p70 = is_array( $m4is_lh4p70 ) ? $m4is_lh4p70 : [];
 if ( ! empty( $m4is_lh4p70 ) ) { $m4is_lh4p70['autoban'] = isset( $m4is_lh4p70['autoban'] ) ? array_filter( explode( ',', $m4is_lh4p70['autoban'] ) ) : [];
 $m4is_lh4p70['autojoin_admin'] = isset( $m4is_lh4p70['autojoin_admin'] ) ? array_filter( explode( ',', $m4is_lh4p70['autojoin_admin'] ) ) : [];
 $m4is_lh4p70['autojoin_moderator'] = isset( $m4is_lh4p70['autojoin_moderator'] ) ? array_filter( explode( ',', $m4is_lh4p70['autojoin_moderator'] ) ) : [];
 $m4is_lh4p70['autojoin_member'] = isset( $m4is_lh4p70['autojoin_member'] ) ? array_filter( explode( ',', $m4is_lh4p70['autojoin_member'] ) ) : [];
 $m4is_uqh5 = ! empty( $m4is_lh4p70['autoban'] );
 $m4is_d8fi = ! empty( $m4is_lh4p70['autojoin_moderator'] );
 $m4is_jjxc = ! empty( $m4is_lh4p70['autojoin_admin'] );
 $m4is_v1h_wy = $m4is_jjxc || $m4is_d8fi || ( ! empty($m4is_lh4p70['autojoin_member'] ) );
 $m4is_ftu4 = in_array( $m4is_evc54w->id, $m4is_rs5ikv );
 $m4is_nwdegn = in_array( $m4is_evc54w->id, $m4is_jry2 );
 $m4is_zts3 = in_array( $m4is_evc54w->id, $m4is_pzvn4y );
 $m4is__vb6 = $m4is_zts3 || $m4is_nwdegn || in_array( $m4is_evc54w->id, $m4is_qtqa5 );
 $m4is_x5pqu = ! empty( array_intersect( $m4is_lh4p70['autoban'], $m4is_iystd2 ) );
 $m4is_jnyx09 = ! empty( array_intersect( $m4is_lh4p70['autojoin_moderator'], $m4is_iystd2 ) );
 $m4is_fyd0q = ! empty( array_intersect( $m4is_lh4p70['autojoin_admin'], $m4is_iystd2 ) );
 $m4is_u_j9 = $m4is_jnyx09 || $m4is_fyd0q || ( ! empty( array_intersect( $m4is_lh4p70['autojoin_member'], $m4is_iystd2 ) ) );
  if ( $m4is_uqh5 ) { if ( $m4is_x5pqu && ! $m4is_ftu4 ) { $m4is_bo0sx->demote();
 $m4is_bo0sx->ban();
 $m4is_ftu4 = true;
 } if ( ( ! $m4is_x5pqu ) && $m4is_ftu4 ) { $m4is_bo0sx->unban();
 $m4is_ftu4 = false;
 } } if ( ! $m4is_ftu4 ) { if ( $m4is_v1h_wy ) { if ( ( ! $m4is__vb6 ) && $m4is_u_j9 ) { groups_join_group( $m4is_evc54w->id, $m4is_ig9p6 );
 $m4is__vb6 = true;
 } elseif ( $m4is__vb6 && ( ! $m4is_u_j9 ) ) { $m4is_bo0sx->remove();
 $m4is__vb6 = false;
 } } } if ((! $m4is_ftu4) && $m4is_v1h_wy) { if ($m4is_d8fi) { if ($m4is_jnyx09 && (! $m4is_fyd0q) ) { $m4is_bo0sx->promote('mod');
 } elseif ($m4is_nwdegn && ! $m4is_jnyx09 && ! $m4is_fyd0q) { $m4is_bo0sx->demote('mod');
 } } if ($m4is_jjxc) { if (! $m4is_zts3 && $m4is_fyd0q) { $m4is_bo0sx->promote('admin');
 } elseif ($m4is_zts3 && ! $m4is_fyd0q) { $m4is_bo0sx->demote('admin');
 } } } } } } } }

