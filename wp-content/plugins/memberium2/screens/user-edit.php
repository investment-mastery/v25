<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 
class m4is_wy9a { private static $m4is_bnd6ti = null, $m4is_e2kg = 0, $m4is_mdqgk = [], $m4is_x0_hk = null, $m4is_ig9p6 = 0;
 static 
function m4is_gm1n( $m4is_x0_hk ) { self::$m4is_x0_hk = $m4is_x0_hk;
 self::$m4is_ig9p6 = $m4is_x0_hk->ID;
 self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 if ( self::m4is_co0_j4() ) { if ( ! self::m4is_d_3dc() ) { self::$m4is_bnd6ti->m4is_j30vf1( self::$m4is_x0_hk->user_email );
 self::$m4is_e2kg = (int) m4is_bnrdbo::m4is_ltwpgs( self::$m4is_ig9p6 );
 self::$m4is_mdqgk = self::$m4is_bnd6ti->m4is_akz3( self::$m4is_ig9p6 );
 if ( self::m4is_nqgvs() ) { echo '<h3>Memberium User Data</h3>';
 echo '<table class="form-table">';
 self::m4is_hebn2x();
 self::m4is_hzysm();
 self::m4is_pzq9();
 self::m4is_ca25f();
 self::m4is_e5hbz();
 self::m4is_b_b5();
 self::m4is_vdw1it();
 self::m4is_nb6g();
 echo '</table>';
 self::m4is_xavl();
 } else { echo '<h2>Memberium</h2>';
 echo '<table class="form-table">';
 self::m4is_xavl();
 echo '</table>';
 } } } } private 
function __construct() {} static 
function m4is_d_3dc() { if ( user_can( self::$m4is_x0_hk, 'manage_options' ) ) { echo '<tr>';
 echo '<th>WARNING:</th>';
 echo '<td>';
 echo '<p style="font-weight:bold;color:red;">This user has the Admin / "manage_options" capability.</p>';
 echo '<p>Admin users cannnot be linked to Keap contacts.</p>.</p>';
 echo '</td>';
 echo '</tr>';
 return true;
 } return false;
 } static 
function m4is_co0_j4() { return current_user_can( 'manage_options' );
 } static 
function m4is_nqgvs() { return isset( self::$m4is_mdqgk['keap']['contact']['id'] ) && self::$m4is_mdqgk['keap']['contact']['id'] > 0;
 } static 
function m4is_hebn2x() { self::m4is_nabq24();
 self::m4is_lej0q();
 self::m4is_yl8ap();
 self::m4is_spn7om();
 self::m4is_crm5();
 self::m4is_x9qkus();
 } static 
function m4is_nabq24() { echo '<tr>';
 echo '<th><label for="infusionsoft_id">Keap Contact ID</label></th>';
 echo '<td><input name="infusionsoft_id" disabled="disabled" size="10" value="', self::$m4is_e2kg, '"></td>';
 echo '</tr>';
 } static 
function m4is_lej0q() { echo '<tr>';
 echo '<th><label>User Creation Date</label></th>';
 echo '<td>', date('l, F j, Y @ g:i A', strtotime( self::$m4is_x0_hk->user_registered ) ), '</td>';
 echo '</tr>';
 } static 
function m4is_yl8ap() { $m4is_asaqw = (int) get_user_meta( self::$m4is_ig9p6, 'memberium_private_comments', true );
 $m4is_szi8 = $m4is_asaqw == 1 ? ' checked="checked" ' : ' ';
 echo '<tr>';
 echo '<th><label for="memberium_private_comments">Private Comments</label></th>';
 echo '<td>';
 echo '<input name="memberium_private_comments" type="hidden" value="0">';
 echo '<input name="memberium_private_comments" id="memberium_private_comments"', $m4is_szi8, 'type="checkbox" value="1"> Enable Private Comments<br />';
 echo '</td>';
 echo '</tr>';
 } static 
function m4is_spn7om() { $m4is_fliw = strtolower( trim( self::$m4is_x0_hk->user_email ) );
 $m4is_gai6k = strtolower( trim( self::$m4is_x0_hk->user_login ) );
 $m4is_ho6m = $m4is_fliw === $m4is_gai6k ? ' checked=checked ' : ' ';
 echo '<h3>Sync Username and Email</h3>';
 echo '<tr>';
 echo '<th><label for="new_emailaddress">Update Email Address</label></th>';
 echo '<td>';
 echo '<input name="memb_update_email_confirm" id="memb_update_email_confirm" ', $m4is_ho6m, ' type="checkbox" value="1"> Update Username to match email address<br />';
 echo '</td>';
 echo '</tr>';
 } static 
function m4is_crm5() { if ( ! empty( self::$m4is_mdqgk['memb_user']['theme'] ) ) { echo '<tr>';
 echo '<th>WARNING:</th>';
 echo "<td><p style='font-weight:bold;color:red;'>This user's membership level is set to use the \"{$m4is_mdqgk['memb_user']['theme']}\" theme.</p></td>";
 echo '</tr>';
 } } static 
function m4is_x9qkus() { $m4is_ejhbmn = m4is_bea_0::m4is_f5sc(self::$m4is_ig9p6);
 $m4is_ubzv = add_query_arg('rss_user', $m4is_ejhbmn, get_feed_link() );
 echo '<tr>';
 echo '<th valign="top"><label for="rss_user_id">RSS User ID</label></th>';
 echo '<td>';
 echo '<input disabled=disabled size="30" value="', $m4is_ejhbmn, '"><br />';
 echo '<input disabled=disabled size="60" value="', $m4is_ubzv, '"><br />';
 echo '</td>';
 echo '</tr>';
 } static 
function m4is_hzysm() { if ( m4is_bnrdbo::m4is_v83u( self::$m4is_x0_hk->user_email ) > 1 ) { echo '<tr>';
 echo '<th>WARNING:</th>';
 echo '<td><p style="font-weight:bold;color:red;">DUPLICATE KEAP CONTACT RECORDS FOUND</p></td>';
 echo '</tr>';
 } }  static 
function m4is_pzq9() { $m4is_dcf_7 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_p9r_8e = m4is_bnrdbo::m4is_yvnol( self::$m4is_e2kg );
 echo '<tr>';
 echo '<th><label for="infusionsoft_fields">Keap Fields</label></th>';
 echo '<td>';
 if ( ! empty( $m4is_p9r_8e ) ) { if ( ! empty( $m4is_p9r_8e[$m4is_dcf_7] ) ) { echo "\n\n<!--\nToken: ", substr( base64_encode( $m4is_p9r_8e[$m4is_dcf_7] ), 0, -1), "\n -->\n\n";
 } foreach ( $m4is_p9r_8e as $m4is_s2ge5 => $m4is_w_o7al ) { if ( $m4is_s2ge5 != 'Groups' && $m4is_w_o7al <> 'null' && $m4is_w_o7al > '' && $m4is_s2ge5 != $m4is_dcf_7 ) { echo "\n", '<input style="color:#000;width:200px;margin-right:25px;" disabled value="', $m4is_s2ge5, '"> <input name="', $m4is_s2ge5 ,'" disabled style="color:#000;width:300px;" value="', $m4is_w_o7al, '"><br>', "\n";
 } } } echo '</td>';
 echo '</tr>';
 } static 
function m4is_e5hbz() { $m4is_qh8p6 = empty( self::$m4is_mdqgk['memb_user']['membership_names'] ) ? [] : explode(',', self::$m4is_mdqgk['memb_user']['membership_names'] );
 $m4is_jzshu = empty( self::$m4is_mdqgk['memb_user']['membership_level'] ) ? 0 : self::$m4is_mdqgk['memb_user']['membership_level'];
 echo '<tr>';
 echo '<th valign="top"><label for="infusionsoft_memberships">Memberships</label></th>';
 echo '<td>';
 if ( empty( $m4is_qh8p6 ) ) { echo '<em>(None)</em>';
 } else { foreach( $m4is_qh8p6 as $m4is_o5xas ) { echo '<input type=text disabled value="', $m4is_o5xas,'" size="', strlen( $m4is_o5xas ), '"> ';
  }  } echo '<br>';
 echo 'Level: ', $m4is_jzshu, '<br />';
 echo '<br />';
 echo '</td>';
 echo '</tr>';
 } static 
function m4is_b_b5() { if ( isset( self::$m4is_mdqgk['memb_user']['login_page'] ) ) { $m4is_outac = self::$m4is_mdqgk['memb_user']['login_page'];
 $m4is_nj6aw = $m4is_outac > 0 ? get_the_title($m4is_outac) : '';
 $m4is_nj6aw = $m4is_outac == -1 ? 'Profile Page' : $m4is_nj6aw;
 $m4is_vdxmu = self::$m4is_bnd6ti->m4is_kb3p( self::$m4is_mdqgk );
 echo '<tr>';
 echo '<th><label for="membership_homepage">Homepage</label></th>';
 echo '<td>';
 echo "<a target='_blank' href='{$m4is_vdxmu}'>{$m4is_nj6aw}</a> ({$m4is_outac})";
 echo '</td>';
 echo '</tr>';
 } } static 
function m4is_vdw1it() { remove_action( 'admin_footer', [m4is_q1zh2::get_instance(), 'm4is_lf31a4'] );
 echo '<tr>';
 echo '<th><label for="infusionsoft_tags">Keap Tags</label></th>';
 echo '<td>';
 $m4is_he6sy = isset( self::$m4is_mdqgk['keap']['contact']['groups'] ) ? array_filter( explode( ',', self::$m4is_mdqgk['keap']['contact']['groups'] ) ) : [];
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( false, false )['mc'];
 $m4is_wov2 = [];
 foreach ( $m4is_he6sy as $m4is_wf6o_h ) { if ( isset( $m4is_iystd2[$m4is_wf6o_h] ) ) { $m4is_wov2[$m4is_wf6o_h] = $m4is_iystd2[$m4is_wf6o_h];
 } } uasort( $m4is_wov2, function( $m4is_oki4bp, $m4is_qpmo ) { if ( $m4is_oki4bp == $m4is_qpmo ) { return 0;
 } return ( $m4is_oki4bp < $m4is_qpmo ) ? -1 : 1;
 });
 echo "<select id='current_tags' multiple='multiple' disabled='disabled' class='disabledmultitaglist' style='width:600px !important;'>";
 foreach ( $m4is_wov2 as $m4is_s2ge5 => $m4is_w_o7al ) { echo '<option value="', $m4is_s2ge5, '" selected=selected>', $m4is_w_o7al, ' (' . $m4is_s2ge5 . ')</option>';
 } echo '</select><br />';
 $m4is_apvd = [];
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true )['mc'];
 foreach ( $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { if ( in_array( $m4is_j5sy07, $m4is_he6sy ) ) { $m4is_apvd[] = [ 'id' => '-' . $m4is_j5sy07, 'text' => 'Remove ' . $m4is_mpia . ' (-' . $m4is_j5sy07 . ')' ];
 } else { $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => $m4is_mpia . ' (' . $m4is_j5sy07 . ')' ];
 } } echo '<script>';
 echo 'var taglist = ', json_encode($m4is_apvd), ';';
 echo '</script>';
 echo '<br />';
 echo '<span class="description">Add/Remove Tags:</span><br />';
 echo '<input type="text" value="" id="updated_tags" name="updated_tags" class="multitaglist" style="width:600px !important;"><br>';
 echo '</td>';
 echo '</tr>';
 } static 
function m4is_xavl() { echo '<table class="form-table">';
 echo '<tr>';
 echo '<th>';
 echo '<label for="infusionsoft_tags">Synchronize Keap Contact</label>';
 echo '</th>';
 echo '<td>';
 echo '<input type="submit" name="memberium_sync" value="Re-Synchronize Contact" class="button-secondary"><br />';
 echo '<span class="description">Synchronizing will delete any local cached contact data, and resync from Keap.</span>';
 echo '</td>';
 echo '</tr>';
 echo '</table>';
 } static 
function m4is_nb6g() { $m4is_u5if = get_option( 'timezone_string' );
 $m4is_e59k2d = date_default_timezone_get();
 if ( ! empty( $m4is_u5if ) ) { date_default_timezone_set( $m4is_u5if );
 } $m4is_lh7d = get_user_meta(self::$m4is_ig9p6, 'last_login_time', true);
 $m4is_wd0vj = get_user_meta(self::$m4is_ig9p6, 'login_ip_address', true);
 $m4is_f_sxr = (int) get_user_meta(self::$m4is_ig9p6, 'login_count', true);
 $m4is_lh7d = $m4is_lh7d > 1 ? date('Y-m-d h:i:s', $m4is_lh7d ) : 'None';
 $m4is_wd0vj = $m4is_wd0vj > '' ? $m4is_wd0vj : 'None';
 date_default_timezone_set($m4is_e59k2d );
 echo '<table class="form-table">';
 echo '<tr>';
 echo '<th><label>Last Login:</label></th>';
 echo '<td>';
 echo "Date: {$m4is_lh7d}<br />";
 echo "IP Address: {$m4is_wd0vj}<br>";
 echo "Total Logins: {$m4is_f_sxr}<br>";
 echo '</td>';
 echo '</tr>';
 echo '</table>';
 } static 
function m4is_ca25f() { $m4is_x0_hk = self::$m4is_x0_hk;
 if ( ! self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'allow_autologin' ) ) { return;
 } if ( user_can( $m4is_x0_hk, 'edit_others_posts' ) ) { return;
 } $m4is_powbq2 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field' );
 $m4is_pxu_6 = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'autologin_authkeys' ) ) );
 $m4is_kdhnc = isset( $m4is_pxu_6[0] ) ? $m4is_pxu_6[0] : '';
 if ( empty( $m4is_kdhnc ) ) { return;
 } $m4is_kdhnc = urlencode( $m4is_kdhnc );
 $m4is_e2kg = self::$m4is_e2kg;
 $m4is_fliw = urlencode( self::$m4is_x0_hk->user_email );
 $m4is_v40s = get_site_url();
 $m4is_imdo6 = $m4is_v40s . "/?memb_autologin=yes&auth_key=" . $m4is_kdhnc . "&Id=" . $m4is_e2kg . "&Email=" . $m4is_fliw;
 echo '<tr>';
 echo '<th valign="top"><label for="memberium_autologin_link">Autologin Link</label></th>';
 echo '<td>';
 echo "<input id='memberium_autologin_link' disabled='disabled' size='90' value='", $m4is_imdo6, "'>";
 echo '&nbsp; <span class="memberium-copy-button">Copy</span>';
 echo '</td>';
 echo '</tr>';
 echo '<style>
				.memberium-copy-button {
                padding: 5px 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                cursor: pointer;
            }
	        </style>';
 } }

