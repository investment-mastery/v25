<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_rnxqp {  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ww61so();
 }  private 
function m4is_ww61so() { add_action( 'memberium/memberships/edit', [ $this, 'm4is_pw9jz6' ], 10, 1 );
 add_filter( 'memberium/memberships/save', [ $this, 'm4is_vdev2c' ], 10, 3 );
 $this->m4is_q6veq();
 }  private 
function m4is_q6veq() { if ( ! class_exists( 'BP_Core_Members_Switching' ) ) { return;
 }  $m4is_k6wi2 = BP_Core_Members_Switching::get_instance();
 remove_action( 'personal_options', [$m4is_k6wi2, 'action_personal_options'] );
 remove_filter( 'ms_user_row_actions', [$m4is_k6wi2, 'filter_user_row_actions'] );
 remove_filter( 'user_row_actions', [$m4is_k6wi2, 'filter_user_row_actions'] );
 }  
function m4is_pw9jz6( array $m4is_o5xas ) : void { if ( ! function_exists( 'bp_get_member_types' ) ) { return;
 } $m4is_toz0 = bp_get_member_types( [], '' );
 if ( empty( $m4is_toz0 ) || ! is_array( $m4is_toz0 ) ) { return;
 } echo <<<HTMLBLOCK
			<h3>BuddyPress</h3>
			<li>
			<label>Profile Type</label>
			<input value="" name="buddypress_profile_type" type="hidden">
			<select style="width:400px; height:1.6em;" class="roles-selector" name="buddypress_profile_type" placeholder="Select the BuddyPress profile type to apply on login">
			<option value="">(None)</option>
		HTMLBLOCK;
 $m4is_o5xas['buddypress_profile_type'] = empty( $m4is_o5xas['buddypress_profile_type'] ) ? '' : $m4is_o5xas['buddypress_profile_type'];
 foreach( $m4is_toz0 as $m4is_s2ge5 => $m4is_gvpi6 ) { $m4is_unc_q = empty( $m4is_gvpi6->labels['name'] ) ? ucwords( $m4is_s2ge5 ) : $m4is_gvpi6->labels['name'];
 if ( ! empty( $m4is_unc_q ) ) { $m4is_xnwj4 = $m4is_o5xas['buddypress_profile_type'] == $m4is_s2ge5 ? ' selected ' : '';
 printf( '<option value="%s" %s>%s</option>', $m4is_s2ge5, $m4is_xnwj4, $m4is_unc_q );
 } } $m4is_yr0_ = m4is_wr40w::m4is_vgnp( 0000 );
 echo <<<HTMLBLOCK
			</select>{$m4is_yr0_}
			</li><br />
		HTMLBLOCK;
 }  
function m4is_vdev2c( $m4is_o5xas, $m4is_j5sy07, $m4is_c2ah ) { $m4is_o5xas[$m4is_j5sy07]['buddypress_profile_type'] = empty( $m4is_o5xas[$m4is_j5sy07]['buddypress_profile_type'] ) ? '' : $m4is_o5xas[$m4is_j5sy07]['buddypress_profile_type'];
 if ( isset( $m4is_c2ah['buddypress_profile_type'] ) ) { $m4is_o5xas[$m4is_j5sy07]['buddypress_profile_type'] = $m4is_c2ah['buddypress_profile_type'];
 } return $m4is_o5xas;
 } }

