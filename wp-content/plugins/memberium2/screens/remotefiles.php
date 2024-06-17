<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists('m4is_pms8y') || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_uh2ao::m4is_xexw();
 
class m4is_uh2ao { private static $m4is_w2w8 = [];
 static 
function m4is_xexw() { self::m4is_x6wv();
 m4is_wr40w::m4is_kj4sp();
 self::m4is_qskw7m();
 self::self_show_header();
 self::m4is_ook2v();
 self::m4is_xabu7();
 self::m4is_h58r();
 } private static 
function m4is_xabu7() { $m4is_lkb9a = m4is_vv5u::m4is_sv9ma();
 echo '<h3>Add New S3 Profile</h3>';
 echo '<div style="width:800px;">';
 echo '<form method="POST" action="">';
 echo '<table class="widefat">';
 echo '<input type="hidden" name="type" value="s3">';
 echo '<tr>';
 echo '<th nowrap="nowrap">Profile Name</th>';
 echo '<th nowrap="nowrap">Profile Type</th>';
 echo '<th nowrap="nowrap">Default Host</th>';
 echo '<th nowrap="nowrap">Default Bucket</th>';
 echo '<th nowrap="nowrap">Region</th>';
 echo '<th nowrap="nowrap">Access Key</th>';
 echo '<th nowrap="nowrap">S3 Secret Key</th>';
 echo '<th nowrap="nowrap">Expiration</th>';
 echo '</tr>';
 echo '<tr>';
 echo '<td><input name="profile_name" type="text" size="10" autocomplete="off"/></td>';
 echo '<td><select name="profile_type"><option value="s3">Amazon S3</option></select></td>';
 echo '<td><input name="default_host" type="text" size="20" placeholder="s3.amazonaws.com" autocomplete="off"/></td>';
 echo '<td><input name="default_bucket" type="text" size="20" autocomplete="off"/></td>';
 echo '<td><select name="region"/>';
 foreach($m4is_lkb9a as $m4is_c5zg => $m4is_g0wy) { echo "<option value='{$m4is_g0wy}' ".($m4is_g0wy == 'us-east-1' ? ' selected ' : '') . ">{$m4is_c5zg}</option>";
 } echo '</select></td>';
 echo '<td><input name="s3_access_key" type="text" size="20" autocomplete="off"/></td>';
 echo '<td><input name="s3_secret_key" type="text" size="20" autocomplete="off"/></td>';
 echo '<td><input name="expiration" type="text" size="4" autocomplete="off"/></td>';
 echo '</tr>';
 echo '</table>';
 echo '&nbsp;<br />';
 echo '<input type="submit" name="add-profile" value="Add Remote Profile" class="button-primary" />';
 echo '<hr />';
 echo '</form>';
 } private static 
function m4is_ook2v() { $m4is_f7p9sm = ! empty(self::$m4is_w2w8['remote_files'] ) ? self::$m4is_w2w8['remote_files'] : [];
 $m4is_r2dj = count($m4is_f7p9sm );
 echo '<form method="POST" action="" autocomplete="off">';
 echo '<table class="widefat" style="white-space:nowrap;">';
 echo '<tr>';
 echo '<th nowrap="nowrap">Profile Name</th>';
 echo '<th nowrap="nowrap">Default Host</th>';
 echo '<th nowrap="nowrap">Default Bucket</th>';
 echo '<th nowrap="nowrap">Region</th>';
 echo '<th nowrap="nowrap">S3 Access Key</th>';
 echo '<th nowrap="nowrap">S3 Secret Key</th>';
 echo '<th nowrap="nowrap">Expiration</th>';
 echo '<th>Delete?</th>';
 echo '</tr>';
 if (empty($m4is_f7p9sm) ) { echo '<tr><td colspan="99">You have no remote storage defined.</td></tr>';
 } else { foreach ($m4is_f7p9sm as $m4is_c3pnb => $m4is_gvpi6 ) { if ($m4is_gvpi6['type'] == 's3' ) { echo '<tr>';
 echo '<td><i class="fab fa-aws"></i> ', $m4is_gvpi6['name'], '</td>';
 echo '<td>', $m4is_gvpi6['host'], '</td>';
 echo '<td>', $m4is_gvpi6['bucket'], '</td>';
 echo '<td>', isset($m4is_gvpi6['region']) ? $m4is_gvpi6['region'] : 'Default', '</td>';
 echo '<td>', $m4is_gvpi6['access_key'], '</td>';
 echo '<td>', substr($m4is_gvpi6['secret_key'], 0, 8 ), '********</td>';
 echo '<td>', (int)$m4is_gvpi6['expiration'], '</td>';
 echo '<td>';
 echo '<input type="checkbox" name="delete[' . $m4is_c3pnb . ']">';
 echo '</td>';
 echo '</tr>';
 } } } echo '</table>';
 echo '&nbsp;<br />';
 if ($m4is_r2dj > 0 ) { echo '<input type="submit" name="delete-profiles" value="Delete Profiles" class="button-secondary" />';
 } echo '</form>';
 echo '</div>';
 } private static 
function self_show_header() { echo '<h1>Memberium Remote Files</h1>';
 echo '<h3>Current Remote Storage Profiles', m4is_wr40w::m4is_vgnp(2578), '</h3>';
 echo '<div class="wrap">';
 echo '<hr />';
 } private static 
function m4is_h58r() { echo '</div>';
 } private static 
function m4is_qskw7m() { if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { if (isset($_POST['delete'] ) ) { foreach ($_POST['delete'] as $m4is_t5j6m2 => $m4is_zg8z ) { if ($m4is_zg8z == 'on' ) { unset(self::$m4is_w2w8['remote_files'][$m4is_t5j6m2] );
 m4is_wr40w::m4is_cxesuf('Remote Storage Profile Deleted', 'error' );
 } } } if (isset($_POST['add-profile'] ) && trim($_POST['profile_name'] ) > '' ) { $m4is_t5j6m2 = strtolower(trim($_POST['profile_name'] ) );
 $m4is_rvy65 = [];
 $m4is_rvy65['name'] = trim($_POST['profile_name'] );
 $m4is_rvy65['type'] = 's3';
 $m4is_rvy65['access_key'] = trim($_POST['s3_access_key'] );
 $m4is_rvy65['expiration'] = (int) $_POST['expiration'] > 0 ? (int)$_POST['expiration'] : 300;
 $m4is_rvy65['secret_key'] = trim($_POST['s3_secret_key'] );
 $m4is_rvy65['host'] = trim($_POST['default_host'] ) > '' ? trim($_POST['default_host'] ) : 's3.amazonaws.com';
 $m4is_rvy65['bucket'] = trim($_POST['default_bucket'] );
 $m4is_rvy65['region'] = isset($_POST['region']) ? trim($_POST['region'] ) : 'us-east-1';
 self::$m4is_w2w8['remote_files'][$m4is_t5j6m2] = $m4is_rvy65;
 } m4is_pms8y::m4is_e5l8a9()->m4is_d18lyg( self::$m4is_w2w8 );
 } } private static 
function m4is_x6wv() { self::$m4is_w2w8 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu();
 } }

