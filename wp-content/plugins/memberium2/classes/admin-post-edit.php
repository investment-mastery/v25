<?php
/**
* Copyright (c) 2018-2024 David J Bullock
* Web Power and Light
*/

 class_exists( 'm4is_q1zh2' ) || die();
 final 
class m4is_zucjs6 { static 
function m4is_e5l8a9() : self { return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_action( 'init', [$this, 'm4is_emixj'], 10 );
 add_action( 'admin_print_scripts-edit.php', [$this, 'm4is_m4mbj'] );
 add_action( 'wp_ajax_memberium_save_bulk_edit', [$this, 'm4is_ql2_do']);
 add_action( 'quick_edit_custom_box', [$this, 'm4is_fimy'], 10, 2 );
 add_action( 'bulk_edit_custom_box', [$this, 'm4is_or_5x8'], 10, 2 );
 add_filter( 'bulk_actions-edit-post', [ $this, 'm4is_j61eg'] );
 add_filter( 'bulk_actions-edit-page', [ $this, 'm4is_j61eg'] );
 add_filter( 'handle_bulk_actions-edit-post', [ $this, 'm4is_taw0b'], 10, 3 );
 add_filter( 'handle_bulk_actions-edit-page', [ $this, 'm4is_taw0b'], 10, 3 );
 }    
function m4is_emixj() { if ( ! isset( $_GET['memb_accesscontrol_bulkedit_nonce'] ) ) { return;
 } if ( ! isset( $_GET['screen'] ) || $_GET['screen'] != 'edit-post' ) { return;
 } if ( ! isset( $_GET['post'] ) || ! is_array( $_GET['post'] ) ) { return;
 } if ( ! current_user_can('edit_posts') ) { return;
 } $this->m4is_ql2_do();
 } 
function m4is_or_5x8( $m4is_t0hs8, $m4is_a_hn ) { static $m4is_d0tgj = true;
 if ($m4is_d0tgj) { $m4is_d0tgj = false;
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memb_accesscontrol_bulkedit_nonce');
 } echo '<fieldset class="inline-edit-col-right inline-edit-', $m4is_t0hs8, '">';
 echo '<div class="inline-edit-col column-', $m4is_t0hs8 , '">';
 echo '<label class="inline-edit-group">';
 switch ($m4is_t0hs8) { case 'memberships': $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu('memberships');
 $m4is_bdit4s = [];
 foreach ($m4is_qh8p6 as $m4is_s2ge5 => $m4is_ereh) { $m4is_bdit4s[] = $m4is_s2ge5;
 } $m4is_bdit4s = implode(',', $m4is_bdit4s);
 echo '<input type="hidden" name="bulkedit-membershiplist" id="bulkedit-membershiplist" value="', $m4is_bdit4s, '">';
  if (count($m4is_qh8p6) > 0) { echo '<ul class="cat-checklist category-checklist">';
 echo '<em>Membership Access</em>';
 echo '<label for="memb_useexisting"><input type="checkbox" name="memb_useexisting" value="1" id="memb_useexisting"> <em>Use Existing Memberships</em></label>';
 foreach ($m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas) { echo "<label for='memb_membership_level_{$m4is_j5sy07}'><input type='checkbox' name='memb_membership_level_{$m4is_j5sy07}' value='{$m4is_j5sy07}' id='memb_membership_level_{$m4is_j5sy07}'> " . stripslashes($m4is_o5xas['name']) . '</label>';
 } } echo '<label for="memb_anonymousonly"><input type="checkbox" name="memb_anonymousonly" value="1" id="memb_anonymousonly"> Logged Out Only</label>';
 echo '<label for="memb_anyloggedinuser"><input type="checkbox" name="memb_anyloggedinuser" value="1" id="memb_anyloggedinuser"> Any Logged In User</label>';
 echo '<label for="memb_google1stclick"><input type="checkbox" name="memb_google1stclick" value="1" id="memb_google1stclick"> Google 1st Click Free</label>';
 echo '<label for="memb_facebookcrawler"><input type="checkbox" name="memb_facebookcrawler" value="1" id="memb_facebookcrawler"> Facebook Crawler Access</label>';
 echo '</ul>';
 echo '<hr />';
 echo '<label for="memb_prohibitedaction"><span class="title" style="width:75px;">Prohibited</span><select name="memb_prohibitedaction" id="memb_prohibitedaction">';
 echo '<option value="default">Default</option>';
 echo '<option value="redirect">Redirect</option>';
 echo '<option value="hide">Hide Completely</option>';
 echo '<option value="excerpt">Show Excerpt Only</option>';
 echo '</select></label>';
 echo '<label><span class="title" style="width:75px;">Redirect URL  </span><input type="text" name="memb_redirecturl" value="" placeholder="" id="memb_redirecturl"></label>';
 break;
 } echo '</label></div></fieldset>';
 } 
function m4is_m4mbj() { $m4is_juks10 = plugins_url('memberium-ac');
 wp_enqueue_script('memberium-admin-edit', $m4is_juks10 . '/js/quickedit.js', ['jquery', 'inline-edit-post'], '', true);
 } 
function m4is_lj1c_($m4is_t0hs8, $m4is_a_hn) { static $m4is_r5bt = true;
 if ($m4is_t0hs8 <> 'memberships') { return;
 } if ($m4is_r5bt) { $m4is_r5bt = false;
 wp_nonce_field(MEMBERIUM_MODULES_DIR, 'memb_accesscontrol_quickedit_nonce');
 } echo '<div style="clear:both;"></div>';
 switch ($m4is_t0hs8) { case 'memberships': $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_c_kz3();
 echo '<fieldset class="inline-edit-col-left inline-edit-', $m4is_t0hs8, '">';
 echo '<div class="inline-edit-col column-', $m4is_t0hs8, '">';
 echo '<label class="inline-edit-group">';
 if (count($m4is_qh8p6) > 0) { echo '<em><strong>Membership Access</strong></em><br>';
 echo '<ul>';
 foreach ($m4is_qh8p6 as $id => $membership) { echo '<label for="memb_membership_' . $id . '" style="float:left;margin-right:25px;"><input type="checkbox" name="memb_membership_levels[' . $id . ']" value="' . $id . '" id="memb_membership_' . $id . '"> ' . stripslashes($membership['name']) . '</label>';
 } unset($m4is_qh8p6, $id, $membership);
 echo '</ul>';
 } echo '</label></div></fieldset>';
 echo '<fieldset class="inline-edit-col-right inline-edit-', $m4is_t0hs8, '">';
 echo '<div class="inline-edit-col column-', $m4is_t0hs8, '">';
 echo '<label class="inline-edit-group">';
 echo '<em><strong>Other Access Controls</strong></em><br>';
 echo '<label for="memb_anyloggedinuser"><input type="checkbox" name="memb_anyloggedinuser" value="1" id="memb_anyloggedinuser">Any Logged In User</label>';
 echo '<label for="memb_anonymousonly"><input type="checkbox" name="memb_anonymousonly" value="1" id="memb_anonymousonly">Logged Out Only</label>';
 echo '<label for="memb_google1stclick"><input type="checkbox" name="memb_google1stclick" value="1" id="memb_google1stclick">Google 1st Click Free</label>';
 echo '<label><span class="title" style="width:75px;">Prohibited</span><select name="memb_prohibitedaction" id="memb_prohibitedaction">';
 echo '<option value="default">Default</option>';
 echo '<option value="redirect">Redirect</option>';
 echo '<option value="hide">Hide Completely</option>';
 echo '<option value="excerpt">Show Excerpt Only</option>';
 echo '</select></label>';
 echo '<label><span class="title" style="width:75px;">Redirect URL  </span><input type="text" name="memb_redirecturl" value="" placeholder="" id="memb_redirecturl"></label>';
 echo '</label></div></fieldset>';
 } } 
function m4is_dak4( int $m4is_cd8k, WP_Post $m4is_c2ah, bool $m4is_wlqsgr ) { $m4is_swtx = 'memb_accesscontrol_quickedit_nonce';
 if ( ! isset( $_POST[ $m4is_swtx ] ) || !wp_verify_nonce( $_POST[ $m4is_swtx ], MEMBERIUM_MODULES_DIR ) ) { return;
 } if ( ! current_user_can( 'edit_post', $m4is_cd8k ) ) { return;
 }  $_POST['memb_anonymousonly'] = isset( $_POST['memb_anonymousonly'] ) ? $_POST['memb_anonymousonly'] : 0;
 $_POST['memb_google1stclick'] = isset( $_POST['memb_google1stclick'] ) ? $_POST['memb_google1stclick'] : 0;
 $_POST['memb_loggedin'] = isset( $_POST['memb_loggedin'] ) ? $_POST['memb_loggedin'] : '';
 $_POST['memb_membership_levels'] = isset( $_POST['memb_membership_levels'] ) ? $_POST['memb_membership_levels'] : '';
 $_POST['memb_redirecturl'] = isset( $_POST['memb_redirecturl'] ) ? trim( $_POST['memb_redirecturl'] ) : '';
  add_post_meta( $m4is_cd8k, '_memberium_google_1stclick', (int) $_POST['memb_google1stclick'], true) or update_post_meta($m4is_cd8k, '_memberium_google_1stclick', $_POST['memb_google1stclick']);
 add_post_meta( $m4is_cd8k, '_memberium_anonymous_only', (int) $_POST['memb_anonymousonly'], true) or update_post_meta($m4is_cd8k, '_memberium_anonymous_only', $_POST['memb_anonymousonly']);
 add_post_meta( $m4is_cd8k, '_memberium_loggedin', (int) $_POST['memb_loggedin'], true) or update_post_meta($m4is_cd8k, '_memberium_loggedin', $_POST['memb_loggedin']);
  if ( (int) $_POST['memb_anonymousonly'] == 1) { $_POST['memb_membership_levels'] = '';
 } $m4is_stgb6 = implode(',', (array)$_POST['memb_membership_levels']);
 add_post_meta($m4is_cd8k, '_memberium_membership_levels', $m4is_stgb6, true) or update_post_meta($m4is_cd8k, '_memberium_membership_levels', $m4is_stgb6);
  add_post_meta($m4is_cd8k, '_memberium_prohibited_action', $_POST['memb_prohibitedaction'], true) or update_post_meta($m4is_cd8k, '_memberium_prohibited_action', $_POST['memb_prohibitedaction']);
 delete_post_meta($m4is_cd8k, '_memberium_hide_completely');
 if ($_POST['memb_prohibitedaction'] != 'redirect') { $_POST['memb_redirecturl'] = '';
 }  add_post_meta($m4is_cd8k, '_memberium_redirect_url', $_POST['memb_redirecturl'], true) or update_post_meta($m4is_cd8k, '_memberium_redirect_url', $_POST['memb_redirecturl']);
 }  
function m4is_ql2_do() { if (! current_user_can('edit_posts') && ! current_user_can('edit_others_posts') ) { return;
 } echo __LINE__, ' @ ', __METHOD__;
 print_r( func_get_args(), true );
 die();
   $m4is_ws5u0 = empty($_POST['memb_anonymousonly']) ? 0 : (int) $_POST['memb_anonymousonly'];
 $m4is_p8et0i = empty($_POST['memb_anyloggedinuser']) ? 0 : (int) $_POST['memb_anyloggedinuser'];
 $m4is_emex6 = empty($_POST['memb_facebookcrawler']) ? 0 : (int) $_POST['memb_facebookcrawler'];
 $m4is_frzx = empty($_POST['memb_google1stclick']) ? 0 : (int) $_POST['memb_google1stclick'];
 $m4is_lyrv = empty($_POST['post_ids']) ? [] : $_POST['post_ids'];
 $m4is_b3h6t = empty($_POST['memb_prohibitedaction']) ? 'default' : $_POST['memb_prohibitedaction'];
 $m4is_b5kaz0 = empty($_POST['memb_redirecturl']) ? '' : trim($_POST['memb_redirecturl']);
 $m4is_lv8u16 = empty($_POST['memb_useexisting']) ? 0 : 1;
 $m4is_stgb6 = isset($_POST['memb_memberships']) && ! empty($_POST['memb_memberships']) ? $_POST['memb_memberships'] : '';
 if ($m4is_ws5u0 == 1) { $_POST['memb_memberships'] = '';
 } if (! empty($_POST['memb_memberships']) ) { } foreach ($m4is_lyrv as $m4is_cd8k) { if (current_user_can('edit_post', $m4is_cd8k) ) { $m4is_qht8e = [ 'prohibited_action' => $m4is_b3h6t, 'redirect_url' => $m4is_b5kaz0, 'facebook_crawler' => $m4is_emex6, 'google_1st_click' => $m4is_frzx, ];
 m4is_rv9lt::m4is_y34p($m4is_cd8k, $m4is_qht8e);
  if (! $m4is_lv8u16) { m4is_rv9lt::m4is_y34p($m4is_cd8k, 'memberships', $m4is_stgb6);
  if (! empty($_POST['memb_memberships']) ) { $m4is_qht8e = [ 'anonymous_only' => $m4is_ws5u0, 'any_loggedin_user' => $m4is_p8et0i, 'any_membership' => '', 'memberships' => $m4is_stgb6, ];
 m4is_rv9lt::m4is_y34p($m4is_cd8k, $m4is_qht8e);
 } else { $m4is_qht8e = [ 'anonymous_only' => $m4is_ws5u0, 'any_loggedin_user' => $m4is_p8et0i, 'any_membership' => '', ];
 m4is_rv9lt::m4is_y34p($m4is_cd8k, $m4is_qht8e);
 } } else { } } else { } } } 
function m4is_fimy($m4is_t0hs8, $m4is_a_hn) { static $m4is_r5bt = TRUE;
 if ($m4is_r5bt) { $m4is_r5bt = FALSE;
 wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memb_accesscontrol_quickedit_nonce');
 } echo '<fieldset class="inline-edit-col-right inline-edit-', $m4is_t0hs8, '">';
 echo '<div class="inline-edit-col column-', $m4is_t0hs8, '">';
 echo '<label class="inline-edit-group">';
 switch ($m4is_t0hs8) { case 'memberships': $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu('memberships');
 if (count($m4is_qh8p6) > 0) {  echo '<ul>';
 echo '<em>Membership Access</em>';
 foreach ($m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas) { echo '<label for="memb_membership_' . $m4is_j5sy07 . '"><input type="checkbox" name="memb_membership_levels[' . $m4is_j5sy07 . ']" value="' . $m4is_j5sy07 . '" id="memb_membership_' . $m4is_j5sy07 . '"> ' . stripslashes($m4is_o5xas['name']) . '</label>';
 } echo '<label for="memb_anonymousonly"><input type="checkbox" name="memb_anonymousonly" value="1" id="memb_anonymousonly">Logged Out Only</label>';
 echo '<label for="memb_google1stclick"><input type="checkbox" name="memb_google1stclick" value="1" id="memb_google1stclick">Google 1st Click Free</label>';
 echo '<label for="memb_facebookcrawler"><input type="checkbox" name="memb_facebookcrawler" value="1" id="memb_facebookcrawler">Facebook Crawler Access</label>';
 echo '</ul>';
 echo '<hr />';
 echo '<label><span class="title" style="width:75px;">Prohibited</span><select name="memb_prohibitedaction" id="memb_prohibitedaction">';
 echo '<option value="default">Default</option>';
 echo '<option value="redirect">Redirect</option>';
 echo '<option value="hide">Hide Completely</option>';
 echo '<option value="excerpt">Show Excerpt Only</option>';
 echo '</select></label>';
 echo '<label><span class="title" style="width:75px;">Redirect URL  </span><input type="text" name="memb_redirecturl" value="" placeholder="" id="memb_redirecturl"></label>';
 } break;
 } echo '</label></div></fieldset>';
 }  }

