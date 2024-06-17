<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 $m4is_dv0wx = m4is_wr40w::m4is_vgnp( 1222, 'Click Here' );
 $m4is_yve74 = m4is_wr40w::m4is_vgnp( 0000, 'Click Here' );
 $m4is_c5wrv = m4is_wr40w::m4is_hd8p( 'Exclude from Personal Menus','dynamic_menus', 0, 0, false );
 $m4is_uwtk = '';
 foreach ( $this->m4is_fe7xib as $m4is_smxn ) { $m4is_uwtk .= sprintf( '<option value="%d">%s</option>', $m4is_smxn['id'], $m4is_smxn['name'] );
 } echo <<<HTMLBLOCK
	<div class="wrap memberium">
		<p>Return to <a href="?page=memberium-memberships">Membership Screen</a></p>
		<form method="post" action="?page=memberium-memberships">
			<input name="action" value="add" type="hidden">

			<h1 style="margin-bottom:20px;">Create Membership Tags and Level</h1>
			<p style="margin-bottom:20px;">
				Looking for help to understand how to create a membership level or questions about what to input where? {$m4is_dv0wx}
			</p>
				<label style="margin-left:0px;">Membership Name:</label>
				<input type="text" name="name" value="" placeholder="Enter Membership Name" required="required" size="25" tabindex="1" style="font-size:150%; margin-top:-10px;">
			<ul>
			<h3>Tags</h3>
			<li>
				<label><strong style="color:green;">Access Tag</strong> <strong>*</strong></label>
				<input value="" name="main_id" type="text" placeholder="This setting is required" class="requiredtaglistdropdown" required="required" style="width:350px;">
			</li>
			<li>
				<label><strong style="color:red;">Payment Failure (PAYF)</strong></label>
				<input value="0" name="payf_id" type="text" class="taglistdropdown" style="width:350px;">
			</li>
			<li>
				<label><strong style="color:red;">Cancellation (CANC)</strong></label>
				<input value="0" name="cancel_id" type="text" class="taglistdropdown" style="width:350px;">
			</li>
			<li>
				<label><strong style="color:red;">Suspension Tag (SUSP)</strong></label>
				<input value="0" name="suspend_id" type="text" class="taglistdropdown" style="width:350px;">
			</li>
			<hr>
			<h3>Level</h3>
			<li>
				<label>Level</label>
				<input type="number" value="0" name="level" min="0" max="999999" style="text-align:right; width: 80px;">
			</li>
			<hr>
			<h3>Special Pages</h3>
			<li>
				<label>First Login Page</label>
				<input value="0" name="first_login_page" type="text" class="pagelistdropdown" style="width:500px;">
			</li>
			<li>
				<label>Membership Home Page</label>
				<input value="0" name="login_page" type="text" class="pagelistdropdown" style="width:500px;">
			</li>
			<li>
				<label>Membership Logout Page</label>
				<input value="0" name="logout_page" type="text" class="pagelistdropdown" style="width:500px;">
			</li>
			<li>
				<label>PAYF Home Page</label>
				<input value="0" name="payf_homepage" type="text" class="pagelistdropdown" style="width:500px;">
			</li>
			<li>
				<label>SUSP Home Page</label>
				<input value="0" name="susp_homepage" type="text" class="pagelistdropdown" style="width:500px;">
			</li>
			<li>
				<label>CANC Home Page</label>
				<input value="0" name="canc_homepage" type="text" class="pagelistdropdown" style="width:500px;">
			</li>
			<li>
			<hr>
			<h3>Theme</h3>
			<li>
				<label>Theme</label>
				<input value="" name="theme" type="text" class="themelistdropdown" style="width:250px;">
			</li>
			{$m4is_c5wrv}
			<hr>
			<h3>Roles</h3>
			<li style="margin-bottom:10px;">
				<label>WordPress Roles</label>
				<input value="" name="roles[]" type="hidden">
				<select style="width:400px; height:1.6em;" class="roles-selector" name="roles[]" multiple="multiple" placeholder="Select WordPress roles to apply on login">
					<option value="">(None)</option>
					{$m4is_uwtk}
				</select>
			</li>
			<hr>
HTMLBLOCK;
 do_action( 'memberium/memberships/edit', [] );
 echo <<<HTMLBLOCK
			</ul>
			<input type="submit" class="button-primary" value="Create Membership Level">
		</form>
		<p style="margin-bottom:20px;">
			Looking for help to understand how to create a membership level or questions about what to input where? {$m4is_yve74}
		</p>
	</div>
HTMLBLOCK;
 $m4is_d3al = m4is_wr40w::m4is_iwfpy();
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true )['mc'];
 $m4is_f1rh0b = [];
 $m4is_okba78 = [];
 $m4is_okba78[] = [ 'id' => 0, 'text' => '(None)' ];
 $m4is_pvg91b = [];
 $m4is_qh8p6 = $this->m4is_bnd6ti->m4is_oiewvu('memberships');
 foreach ($m4is_qh8p6 as $m4is_s2ge5 => $m4is_w_o7al ) { $m4is_pvg91b[] = $m4is_s2ge5;
 $m4is_pvg91b[] = $m4is_w_o7al['payf_id'];
 $m4is_pvg91b[] = $m4is_w_o7al['cancel_id'];
 $m4is_pvg91b[] = $m4is_w_o7al['suspend_id'];
 } $m4is_pvg91b = array_unique(array_filter($m4is_pvg91b ) );
 foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { if (! in_array($m4is_j5sy07, $m4is_pvg91b ) ) { $m4is_okba78[] = [ 'id' => $m4is_j5sy07, 'text' => "{$m4is_mpia} ({$m4is_j5sy07})" ];
 $m4is_f1rh0b[] = [ 'id' => $m4is_j5sy07, 'text' => "{$m4is_mpia} ({$m4is_j5sy07})" ];
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

