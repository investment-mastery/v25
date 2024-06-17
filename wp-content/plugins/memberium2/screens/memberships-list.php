<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 $m4is_wld3 = count( $this->m4is_qh8p6 );
 $m4is_htv3h = '';
 $membership_help = m4is_wr40w::m4is_vgnp( 1222 );
 $m4is_at4xqr = m4is_pwtg7::m4is_i0au6j( false );
 $m4is_at4xqr = is_array( $m4is_at4xqr['mc'] ) ? $m4is_at4xqr['mc'] : array();
 if ( $m4is_wld3 == 0 ) { $m4is_htv3h = '<tr><td colspan="99">You have no membership levels created.</td></tr>';
 $m4is_gxfkg = '';
 } else { $m4is_gxfkg = '<input type="submit" name="main_action" value="Update Membership Levels" class="button-primary" />';
 foreach ($this->m4is_qh8p6 as $m4is_j5sy07 => $m4is_o5xas ) { $m4is_t65mr = wp_get_theme($m4is_o5xas['theme'] );
 $m4is_hqe1c = ! empty($m4is_at4xqr[$m4is_j5sy07]['name'] ) ? $m4is_at4xqr[$m4is_j5sy07]['name'] . ' (' . $m4is_j5sy07 . ')' : '<em>Tag Missing</em>';
 $m4is_hqe1c = ! empty($m4is_at4xqr[$m4is_j5sy07] ) ? $m4is_at4xqr[$m4is_j5sy07] . ' (' . $m4is_j5sy07 . ')' : '<em>Tag Missing</em>';
 $m4is_o5xas['level'] = isset( $m4is_o5xas['level'] ) ? (int) $m4is_o5xas['level'] : 0;
 $m4is_o5xas['login_redirect_priority'] = isset( $m4is_o5xas['login_redirect_priority'] ) ? (int) $m4is_o5xas['login_redirect_priority'] : 0;
 $m4is_bicp7u = empty( $_GET['page'] ) ? '' : (int) $_GET['page'];
 $m4is_c3pnb = empty( $m4is_j5sy07 ) ? '' : (int) $m4is_j5sy07;
 $m4is_m8u1 = get_submit_button('Delete', 'delete', 'main_action[' . $m4is_j5sy07 . ']', false );
 $m4is_c2ah = get_post( $m4is_o5xas['login_page'] );
 if ( is_a( $m4is_c2ah, 'WP_Post' ) ) { $m4is_yapf = empty($m4is_c2ah->post_title ) ? '(Default)' : $m4is_c2ah->post_title;
 $m4is_um3t1 = sprintf( '<a href="%s">%s (%d)</a>', get_permalink( $m4is_o5xas['login_page'] ), $m4is_yapf, $m4is_o5xas['login_page'] );
 } else { $m4is_um3t1 = '(Default)';
 } $m4is_htv3h .= <<<HTMLBLOCK
			<tr>
				<td>
					<a class="button-secondary" href="?page=memberium-memberships&action=edit&id={$m4is_c3pnb}">Edit</a>
				</td>
				<td>
					<strong><a href="?page=memberium-memberships&action=edit&id={$m4is_c3pnb}">{$m4is_o5xas['name']}</a></strong>
				</td>
				<td>
					{$m4is_hqe1c}
				</td>
				<td>
					<input type=number min=0 max=99999 maxlength=6 name="level[{$m4is_c3pnb}]" value="{$m4is_o5xas['level']}" style="width:80px;">
				</td>
				<td>
					<input type=number min=0 max=99999 maxlength=6 name="login_redirect_priority[{$m4is_c3pnb}]" value="{$m4is_o5xas['login_redirect_priority']}" style="width:80px;">
				</td>
				<td>
					{$m4is_um3t1}
				</td>
				<td>
					{$m4is_m8u1}
				</td>
			</tr>
		HTMLBLOCK;
 } } echo <<<HTMLBLOCK
<div class="wrap">
	<h1>Memberium Membership Settings</h1>
	<h3>Current Membership Levels {$membership_help}</h3>
	<div style="width:90%;">
		<p>
			These are the membership levels you have already set up, click the name of a membership level below to edit it or click the "Create New Membership Level" button to add a new membership level.
		</p>
		<hr />
		<form method="POST" action="">
			<input type="submit" name="main_action" value="Update Levels" style="position:absolute;left:-100%;" />
			<table class="widefat" style="white-space:nowrap;">
				<tr style="background-color:#eee">
				<th style="width:50px;"></th>
					<th style="width:250px;"><strong>Level&nbsp;Name</strong></th>
					<th><strong>Tag</strong></th>
					<th style="width:75px;"><strong>Level</strong></th>
					<th style="width:75px;"><strong>Login Priority</strong></th>
					<th><strong>Homepage</strong></th>
					<th></th>
				</tr>
				{$m4is_htv3h}
			</table>

		<p>
		<a href="?page=memberium-memberships&action=add" class="button-primary">Create New Membership Level</a> &nbsp;
		{$m4is_gxfkg}
	</form>
	<hr />
</div>
HTMLBLOCK;

