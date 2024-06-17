<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_r6ry { private $module_settings, $settings;
 
function __construct() { $this->module_settings = get_option('MemberiumPathProtect', [] );
 unset( $this->module_settings['active'] );
 add_action('init', [$this, 'm4is_duntz'], 9 );
 } 
function m4is_duntz() { if ( ! defined( 'DOING_CRON' ) && current_user_can( 'manage_options' ) ) { add_action('admin_menu', [$this, 'm4is_idlza9']);
 } } 
function m4is_idlza9() { if ( current_user_can( 'manage_options' ) ) { add_options_page( __('WPaL Path Protect'), __('WPaL Path Protect'), 'manage_options', 'pathprotect', [$this, 'm4is_gsy2bz']);
 } } 
function m4is_gsy2bz() { if ( ! current_user_can( 'manage_options' ) ) { wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 } $m4is_w2w8 = $this->m4is_zabs();
 $m4is_c2ah = $_POST;
 $m4is_uf0a = $_SERVER;
 if ( $m4is_uf0a['REQUEST_METHOD'] == 'POST' ) { if (! empty($m4is_c2ah['update_rules']) ) { $m4is_w2w8['rules'] = [];
 if ( isset($_POST['rules']) && is_array( $_POST['rules'] ) ) { foreach( $_POST['rules'] as $m4is_h2qh ) { $m4is_h2qh['urls'] = trim( $m4is_h2qh['urls'] );
 if ( $m4is_h2qh['anonymous_only'] ) { $m4is_h2qh['logged_in'] = 0;
 } if ( $m4is_h2qh['logged_in'] ) { $m4is_h2qh['anonymous_only'] = 0;
 } if ( ! $m4is_h2qh['anonymous_only'] && ! $m4is_h2qh['logged_in'] ) { $m4is_h2qh['logged_in'] = 1;
 } if ( $m4is_h2qh['prohibited_action'] == 'redirect' && empty( $m4is_h2qh['redirect_url'] ) ) { $m4is_h2qh['redirect_url'] = get_site_url();
 } if ( ! empty( $m4is_h2qh['urls'] ) && $m4is_h2qh['delete'] == 0 ) { $m4is_w2w8['rules'][] = $m4is_h2qh;
 } } } } if (! empty($_POST['add_rules']) ) { $m4is_w2w8['rules'][] = [ 'urls' => '', 'logged_in' => 0, 'anonymous_only' => 0, 'prohibited_action' => 'redirect', ];
 } $this->m4is_y_4let($m4is_w2w8);
 } $m4is_w47l3u = [];
 $m4is_w47l3u['hide'] = 'Hide Completely';
 $m4is_w47l3u['redirect'] = 'Redirect';
 echo '<style>';
 echo 'label { width:200px; display:inline-block; }';
 echo '#htmlmessage { width:500px !important; }';
 echo '</style>';
 echo '<div class="wrap">';
 echo '<h1>Path Protect for Membership Sites</h1>';
 echo '<form method="POST" action="">';
 echo '<ul>';
 echo '</ul>';
 echo '<h3>Current Rules</h3>';
 echo '<div style="width:800px;">';
 echo '<hr />';
 echo '<table class="widefat" style="white-space:nowrap;">';
 echo '<tr style="font-weight:bold;">';
 echo '<th>Requirements</th>';
 echo '<th>URLs</th>';
 echo '<th>Prohibited Action</th>';
 echo '<th>Delete?</th>';
 echo '</tr>';
 if (! empty($m4is_w2w8['rules']) && is_array($m4is_w2w8['rules']) ) { foreach ( $m4is_w2w8['rules'] as $m4is_s2ge5 => $m4is_h2qh ) { $m4is_h2qh['logged_in'] = isset( $m4is_h2qh['logged_in'] ) ? $m4is_h2qh['logged_in'] : 0;
 $m4is_h2qh['anonymous_only'] = isset( $m4is_h2qh['anonymous_only'] ) ? $m4is_h2qh['anonymous_only'] : 0;
 $m4is_h2qh['urls'] = isset( $m4is_h2qh['urls'] ) ? $m4is_h2qh['urls'] : '';
 $m4is_h2qh['redirect_url'] = isset( $m4is_h2qh['redirect_url'] ) ? $m4is_h2qh['redirect_url'] : '';
 echo '<tr>';
 echo '<td>';
 echo '<input type="hidden" name="rules[', $m4is_s2ge5, '][logged_in]" value="0">';
 echo '<input type="checkbox" value="1" name="rules[', $m4is_s2ge5, '][logged_in]"', $m4is_h2qh['logged_in'] == 1 ? ' checked="checked" ' : '', ' /> Logged In<br>';
 echo '<input type="hidden" name="rules[', $m4is_s2ge5, '][anonymous_only]" value="0">';
 echo '<input type="checkbox" value="1" name="rules[', $m4is_s2ge5, '][anonymous_only]"', $m4is_h2qh['anonymous_only'] == 1 ? ' checked="checked" ' : '', ' /> Anonymous Only<br>';
 echo '</td>';
 $m4is_df4y = count( array_filter( explode( "\n", $m4is_h2qh['urls'] ) ) );
 echo '<td>';
 echo '<textarea cols="80" rows="', $m4is_df4y + 1, '" name="rules[', $m4is_s2ge5, '][urls]">', $m4is_h2qh['urls'], '</textarea>';
 echo '</td>';
 echo '<td>';
 echo '<select name="rules[', $m4is_s2ge5, '][prohibited_action]">';
 foreach ( $m4is_w47l3u as $m4is_w_o7al => $m4is_unc_q ) { $m4is_xnwj4 = $m4is_h2qh['prohibited_action'] == $m4is_w_o7al ? ' selected="selected" ' : '';
 echo '<option value="' . $m4is_w_o7al . '" ' . $m4is_xnwj4 . '>' . $m4is_unc_q . '</option>';
 } echo '</select><br />';
 echo 'Redirection URL<br>';
 echo '<input type="text" name="rules[', $m4is_s2ge5, '][redirect_url]" value="', $m4is_h2qh['redirect_url'],'">';
 echo '</td>';
 echo '<td>';
 echo '<input type="hidden" name="rules[', $m4is_s2ge5, '][delete]" value="0">';
 echo '<input type="checkbox" name="rules[', $m4is_s2ge5, '][delete]" value="1">';
 echo '</td>';
 echo '</tr>';
 } } else { echo '<tr><td colspan="99">You have no rules created</td></tr>';
 } echo '</table>';
 echo '&nbsp;<br>';
 echo '<input type="submit" name="update_rules" value="Save Changes" class="button-primary" />';
 echo '</form>';
 echo '<form method="post">';
 echo '&nbsp;<br>';
 echo '<input type="submit" name="add_rules" value="Add Ruleset" class="button-primary" />';
 echo '</form>';
 echo '</div>';
 echo '</div>';
 } private 
function m4is_zabs() { $m4is_s2ge5 = 'WPAL/pathprotect/settings';
 $m4is_eay0 = 'MemberiumPathProtect';
 $m4is_w2w8 = get_option($m4is_s2ge5, false);
 if ($m4is_w2w8 === false) { $m4is_w2w8 = get_option($m4is_eay0, '');
 if (is_array($m4is_w2w8) ) { update_option($m4is_s2ge5, $m4is_w2w8);
 } } if (! is_array($m4is_w2w8) || empty($m4is_w2w8) ) { $m4is_w2w8 = [ 'rules' => [], ];
 } return $m4is_w2w8;
 } private 
function m4is_y_4let($m4is_w2w8) { $m4is_s2ge5 = 'WPAL/pathprotect/settings';
 $m4is_eay0 = 'MemberiumPathProtect';
 update_option($m4is_s2ge5, $m4is_w2w8);
 delete_option($m4is_eay0);
 } }

