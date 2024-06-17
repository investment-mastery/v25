<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_v8pc::m4is_xexw();
 final 
class m4is_v8pc { static 
function m4is_xexw() {  $m4is_q13g = m4is_a18xl::m4is_rcws( true );
 $m4is_qoem = '';
 foreach ($m4is_q13g as $tag_category ) { $m4is_qoem .= '<option value="' . $tag_category['id'] . '">' . $tag_category['name'] . '</option>';
 } $create_membership_help = m4is_wr40w::m4is_vgnp( 8853 );
 $create_tag_help = m4is_wr40w::m4is_vgnp( 8852 );
 $create_drip_help = m4is_wr40w::m4is_vgnp( 8856 );
 $create_category_help = m4is_wr40w::m4is_vgnp( 8858 );
 echo <<<HTMLBLOCK
			<h3>Tag Builder Pro</h3>
			<table class="widefat">
				<form method="POST" action="">
					<tr>
						<td>Create Membership Level:</td>
						<td>
							<input name="tag_name" type="text" size="20" /> &nbsp;
							<select name="category_id" class="basic-single" style="width:200px;">{$m4is_qoem}</select> &nbsp;
							<input type=checkbox name="create_set" value=all /> Include SUSP/CANC &nbsp;
							<input type="submit" name="create-membership" value="Create" class="button-primary" /> &nbsp; {$create_membership_help}
						</td>
					</tr>
				</form>

				<form method="POST" action="">
					<tr>
						<td>Create New Tag:</td>
						<td>
						<input name=tag_name type=text size=20 required=required /> &nbsp;
						<select name=category_id class=basic-single required=required style="width:200px;">{$m4is_qoem}</select> &nbsp;
						<input type="submit" name="create-tag" value="Create" class="button-primary" /> &nbsp; {$create_tag_help}
					</td>
				</tr>
				</form>

				<form method="POST" action="">
					<tr>
						<td>Create Drip Tags:</td>
						<td>
							<input name="tag_name" type="text" size="20" required=required /> &nbsp;
							Start: <input name=start type=number min=1 value=1 max=300 size=3 required=required /> &nbsp;
							End: <input name=end type=number min=1 value=1 max=300 size=3 required=required/> &nbsp;
							<select name="category_id" class="basic-single" style="width:200px;">{$m4is_qoem}</select> &nbsp;
							<input type="submit" name="create-tags" value="Create All" class="button-primary" /> &nbsp;
							{$create_drip_help}
						'</td>
					</tr>
				</form>

				<form method="POST" action="">
					<tr>
						<td>Create New Category:</td>
						<td>
							<input name=category_name type=text size=20 required=required /> &nbsp;
							<input type="submit" name="create-category" value="Create" class="button-primary" /> &nbsp;
							{$create_category_help}
						</td>
					</tr>
				</form>
			</table>
			&nbsp;<br />
		HTMLBLOCK;
 } }

