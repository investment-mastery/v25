<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 $m4is_w2w8 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings');
 $m4is_xb7ix = get_option('memberium_pages', [] );
 echo '<form method="POST" action="">';
 wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), 'memberium_options_nonce' );
 echo '<ul>';
 echo '<h3>System Pages</h3>';
 $m4is_l2qnzu = '';
 if (! empty($m4is_w2w8['login_url'] ) ) { $m4is_l2qnzu = ' <button formtarget="_blank" formaction="' . admin_url() . 'post.php?post=' . $m4is_w2w8['login_url'] . '&action=edit">Edit</button> <button formtarget="_blank" formaction="' . get_permalink($m4is_w2w8['login_url'] ) . '">View</button> ';
 } m4is_wr40w::m4is_mz70('Login Page <strong style="color:red;">(Caution)</strong>', 'login_url', (int) $m4is_w2w8['login_url'], 'pagelistdropdown', ['help_id' => 1206, 'units' => $m4is_l2qnzu]);
 $m4is_afnh = [];
 $m4is_afnh[] = ['n' => 'Membership Registration Page', 'k' => 'registration_page', 'h' => 0000];
 $m4is_afnh[] = ['n' => 'My Account Page', 'k' => 'my_account', 'h' => 0000];
 $m4is_afnh[] = ['n' => 'New Account Page', 'k' => 'new_account', 'h' => 0000];
 $m4is_afnh[] = ['n' => 'Member Profile Page', 'k' => 'profile_page', 'h' => 0000];
 foreach($m4is_afnh as $m4is_couz ) { $m4is_c5zg = $m4is_couz['k'];
 $m4is_cd8k = isset($m4is_xb7ix[$m4is_c5zg] ) ? (int) $m4is_xb7ix[$m4is_c5zg] : 0;
 echo '<li><label for="', $m4is_c5zg, '">', $m4is_couz['n'], '</label>';
 echo '<input value="', $m4is_cd8k, '" type="hidden" id="', $m4is_c5zg, '" name="pages[', $m4is_c5zg, ']" class="dropdown pagelistdropdown">';
 m4is_wr40w::m4is_vgnp($m4is_couz['h'] );
 if ($m4is_cd8k ) { echo ' <button formtarget="_blank" formaction="', admin_url() . 'post.php?post=', $m4is_cd8k, '&action=edit">Edit</button> ';
 echo ' <button formtarget="_blank" formaction="', get_permalink($m4is_cd8k ), '">View</button> ';
 } m4is_wr40w::m4is_vgnp(1208 );
 echo '</li>';
 } echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '&nbsp;<br>';
 echo '<h2>Templates</h2>';
 echo 'Load Page Templates from <select name="template_id" id="">';
 $m4is_fh4zg = m4is_q1zh2::get_instance()->m4is_a19w0();
 foreach($m4is_fh4zg as $m4is_s2ge5 => $m4is_w_o7al ) { echo '<option value="', ($m4is_s2ge5 + 1 ), '">', $m4is_w_o7al['name'], '</option>';
 } echo '</select> to page ';
 echo '<input value="0" type="hidden" id="" name="target_post_id" class="dropdown pagelistdropdown">';
 echo '&nbsp;<br>';
 echo '<p>';
 echo '<input type="submit" name="page_load" value="Load Single Template" class="button-primary">';
 echo '&nbsp;&nbsp;';
 echo '<input type="submit" name="page_load" value="Load All Templates" class="button-primary">';
 echo '</p>';
 echo '<p>';
 echo '<input type="submit" name="page_load" value="Install Email Templates" class="button-primary">';
 echo '</p>';
 if (isset($m4is_c3eq ) ) { echo '<p>Added ', $m4is_c3eq, ' Email templates</p>';
 } echo '</form>';

