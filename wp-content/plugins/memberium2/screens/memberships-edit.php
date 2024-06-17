<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 $m4is_c3pnb = empty( $_GET['id'] ) ? 0 : (int) $_GET['id'];
 if ( ! array_key_exists( $m4is_c3pnb, $this->m4is_qh8p6 ) || ! is_array( $this->m4is_qh8p6[$m4is_c3pnb] ) ) { echo '<p>Invalid Membership Id</p>';
 return;
 } $m4is_o5xas = $this->m4is_qh8p6[$m4is_c3pnb];
 $m4is_it1op = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'dynamic_menus' );
 if ( empty( $m4is_o5xas['main_id'] ) ) { $m4is_o5xas['main_id'] = $m4is_c3pnb;
 } if ( empty($m4is_o5xas['addltag_ids'] ) ) { $m4is_o5xas['addltag_ids'] = '';
 } if ( empty( $m4is_o5xas['roles'] ) ) { $m4is_o5xas['roles'] = [];
 } $m4is_uwtk = '';
 if (is_array($this->m4is_fe7xib ) ) { foreach ($this->m4is_fe7xib as $m4is_smxn ) { $m4is_xnwj4 = in_array( $m4is_smxn['id'], $m4is_o5xas['roles'] ) ? ' selected="selected" ' : '';
 $m4is_uwtk .= "<option value='{$m4is_smxn['id']}' {$m4is_xnwj4}>{$m4is_smxn['name']}</option>";
 } } $m4is_no_uf = m4is_wr40w::m4is_vgnp( 0000 );
 $m4is_xu87 = m4is_wr40w::m4is_vgnp( 0000 );
 $m4is_dq8er = m4is_wr40w::m4is_vgnp( 0000 );
 $m4is_zfm6xe = m4is_wr40w::m4is_vgnp( 0000 );
 $m4is_nw0n = m4is_wr40w::m4is_vgnp( 0000 );
 $m4is_aqx5y = m4is_wr40w::m4is_vgnp( 0000 );
 echo <<<HTMLBLOCK

	<div class="wrap memberium">
		<p>Return to <a href="?page=memberium-memberships">Membership Screen</a></p>
		<form method="post">
			<input name="action" value="edit" type="hidden">
			<h1 style="margin-bottom:10px;">Membership Level Editor</h1><br />
			<label style="margin-left:0px;">Membership Name:</label>
			<input type="text" name="name" value="{$m4is_o5xas['name']}" required="required" style="font-size:180%; margin-top:-10px;">
			<ul>
				<h3>Tags</h3>
				<li>
					<label style="color:green;"><strong>Access Tag</strong></label>
					<input disabled="disabled" value="{$m4is_c3pnb}" type="text" class="requiredtaglistdropdown" required="required" style="width:300px;"> {$m4is_no_uf}
				</li>
				<li>
					<label style="color:green;"><strong>Add\'l Access Tags</strong></label>
					<input value="{$m4is_o5xas['addltag_ids']}" type="text" class="multitaglist" name="addltag_ids" style="width:500px;"> {$m4is_xu87}
				</li>
				<li>
					<label style="color:red;"><strong>Payment Failure</strong></label>
					<input value="{$m4is_o5xas['payf_id']}" name="payf_id" type="text" class="taglistdropdown" style="width:350px;"> {$m4is_dq8er}
				</li>
				<li>
					<label style="color:red;"><strong>Cancellation</strong></label>
					<input value="{$m4is_o5xas['cancel_id']}" name="cancel_id" type="text" class="taglistdropdown" style="width:350px;"> {$m4is_zfm6xe}
				</li>
				<li>
					<label style="color:red;"><strong>Suspension Tag</strong></label>
					<input value="{$m4is_o5xas['suspend_id']}" name="suspend_id" type="text" class="taglistdropdown" style="width:350px;">' {$m4is_nw0n}
				</li>
				<hr>
				<h3>Level</h3>
				<li>
					<label>Level</label>
					<input type="number" value="{$m4is_o5xas['level']}" name="level" min="0" max="999999" required="required" style="text-align:right; width: 80px;"> {$m4is_aqx5y}
				</li>
				<hr>
				<h3>Special Pages</h3>
				<li>
					<label>Home Page Priority</label>
					<input type="number" value="{$m4is_o5xas['login_redirect_priority']}" name="login_redirect_priority" min="0" max="999999" required="required" style="text-align:right; width: 80px;">
				</li>
				<li>
					<label>First Login Page</label>
					<input value="{$m4is_o5xas['first_login_page']}" name="first_login_page" type="text" class="pagelistdropdown" style="width:500px;">
				</li>
				<li>
					<label>Membership Home Page</label>
					<input value="{$m4is_o5xas['login_page']}" name="login_page" type="text" class="pagelistdropdown" style="width:500px;">
				</li>
				<li>
					<label>Membership Logout Page</label>
					<input value="{$m4is_o5xas['logout_page']}" name="logout_page" type="text" class="pagelistdropdown" style="width:500px;">
				</li>
				<li>
					<label>PAYF Home Page</label>
					<input value="{$m4is_o5xas['payf_homepage']}" name="payf_homepage" type="text" class="pagelistdropdown" style="width:500px;">
				</li>
				<li>
				<li>
					<label>SUSP Home Page</label>
					<input value="{$m4is_o5xas['susp_homepage']}" name="susp_homepage" type="text" class="pagelistdropdown" style="width:500px;">
				</li>
				<li>
				<li>
					<label>CANC Home Page</label>
					<input value="{$m4is_o5xas['canc_homepage']}" name="canc_homepage" type="text" class="pagelistdropdown" style="width:500px;">
				</li>
				<li>
				<hr>
				<h3>Theme</h3>
				<li>
					<label>Theme</label>
					<input value="{$m4is_o5xas['theme']}" name="theme" type="text" class="themelistdropdown" style="width:250px;">
				</li>
HTMLBLOCK;
 if ( $m4is_it1op ) { m4is_wr40w::m4is_hd8p( 'Exclude from Personal Menus','dynamic_menus', 0, $m4is_o5xas['dynamic_menus'] );
 } else { echo '<input type="hidden" value="' . $m4is_o5xas['dynamic_menus'] . '" name="dynamic_menus">';
 } echo <<<HTMLBLOCK
	<hr>
		<h3>Roles</h3>
		<li>
			<label>WordPress Roles</label>
			<input value="" name="roles[]" type="hidden">
			<select style="width:400px; height:1.6em;" class="roles-selector" name="roles[]" multiple="multiple" placeholder="Select WordPress roles to apply on login">
				<option value="">(None)</option>
				{$m4is_uwtk}
			</select>
		</li>
		<br />
HTMLBLOCK;
 do_action('memberium/memberships/edit', $m4is_o5xas);
 echo <<<HTMLBLOCK
		<hr>
	</ul>
	<input type="submit" class="button-primary" value="Update Membership Level">
	</form>
</div>

HTMLBLOCK;
 $m4is_uik8w = wp_get_themes();
 $m4is_d3al = [];
 $m4is_d3al[] = [ 'id' => '', 'text' => '(Default)' ];
 foreach ($m4is_uik8w as $m4is_t5ot4 => $m4is_t65mr ) { $m4is_d3al[] = [ 'id' => $m4is_t5ot4, 'text' => $m4is_t65mr->Name ];
 } $m4is_d3al = json_encode($m4is_d3al );
 unset($m4is_t5ot4, $m4is_t65mr, $m4is_uik8w );
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_okba78 = [];
 $m4is_okba78[] = [ 'id' => 0, 'text' => '(None)' ];
 $m4is_pvg91b = [];
 $m4is_qh8p6 = (array) m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('memberships');
 foreach ($m4is_qh8p6 as $m4is_s2ge5 => $m4is_w_o7al ) { if ($m4is_s2ge5 <> $m4is_c3pnb) { $m4is_pvg91b[] = $m4is_s2ge5;
 $m4is_pvg91b[] = $m4is_w_o7al['payf_id'];
 $m4is_pvg91b[] = $m4is_w_o7al['cancel_id'];
 $m4is_pvg91b[] = $m4is_w_o7al['suspend_id'];
 } } $m4is_pvg91b = array_unique(array_filter($m4is_pvg91b ) );
 foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { if (! in_array($m4is_j5sy07, $m4is_pvg91b ) ) { $m4is_okba78[] = [ 'id' => $m4is_j5sy07, 'text' => "{$m4is_mpia} ({$m4is_j5sy07})" ];
 $m4is_f1rh0b[] = [ 'id' => $m4is_j5sy07, 'text' => "{$m4is_mpia} ({$m4is_j5sy07})", ];
 } } $m4is_okba78 = json_encode($m4is_okba78 );
 $m4is_f1rh0b = json_encode($m4is_f1rh0b );
 unset($m4is_iystd2, $m4is_j5sy07, $m4is_mpia );
 $m4is_mz13 = m4is_wr40w::m4is_x26o();
  echo '<script>';
 echo 'var themelist       = ', $m4is_d3al, ';';
 echo 'var taglist         = ', $m4is_okba78, ';';
 echo 'var requiredtaglist = ', $m4is_f1rh0b, ';';
 echo 'var pagelist        = ', $m4is_mz13, ';';
 echo '</script>';

