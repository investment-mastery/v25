<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 global $wpdb;
 $m4is_cax_0q = 5;
 $m4is_up85 = m4is_pms8y::m4is_e5l8a9()->get_i2sdk_options();
 $m4is_d2vjs = (array) m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('ga_customvars');
 $m4is_ry8ks = [ '' => '[Select the Variable]', '!system.membership_level' => 'Membership Level', '!system.membership_name' => 'Membership Name', ];
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2('Contact', TRUE );
 $m4is_x5wxyr = [''];
 foreach ($m4is_w_8g as $m4is_jcz18 => $m4is_g1ru50 ) { $m4is_ry8ks['!contact.' . strtolower($m4is_g1ru50 ) ] = 'Contact ' . $m4is_g1ru50;
 } $m4is_w_8g = m4is_ho3l::m4is_kjedy2('Affiliate', TRUE);
 foreach ($m4is_w_8g as $m4is_jcz18 => $m4is_g1ru50 ) { $m4is_ry8ks['!affiliate.' . strtolower($m4is_g1ru50 ) ] = 'Affiliate ' . $m4is_g1ru50;
 } if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  if (isset($_POST['add-variable'] ) ) { $m4is_d2vjs[$_POST['slot_id']] = [ 'name' => $_POST['slot_name'], 'variable' => $_POST['slot_variable'], 'label' => $m4is_ry8ks[$_POST['slot_variable']], ];
 m4is_wr40w::m4is_cxesuf('Custom Variable Added' );
 }  if (!empty($_POST['delete'] ) ) { foreach ($_POST['delete'] as $m4is_s2ge5 => $m4is_w_o7al ) { if ($m4is_w_o7al == 'on' ) { unset($m4is_d2vjs[$m4is_s2ge5] );
 m4is_wr40w::m4is_cxesuf('Custom Variable Deleted' );
 } } }  m4is_pms8y::m4is_e5l8a9()->m4is_qdi_3o($m4is_d2vjs, 'ga_customvars');
 } $m4is_u70f = [];
 for ($i = 1;
 $i <= $m4is_cax_0q;
 $i++ ) { if (!isset($m4is_d2vjs[$i] ) ) { $m4is_u70f[] = $i;
 } } m4is_wr40w::m4is_kj4sp();
 ?>
<div class="wrap">
	<h1>Memberium Google Analytics Settings</h1>
	<?php
 if (count($m4is_d2vjs ) > $m4is_cax_0q ) { echo '<tr><td colspan="6">', _e('All custom variable slots are assigned.' ), '</td></tr>';
 } else { $m4is_ju4z = '';
 foreach ($m4is_ry8ks as $m4is_w_o7al => $m4is_unc_q ) { $m4is_ju4z.= '<option value="' . $m4is_w_o7al . '">' . $m4is_unc_q . '</option>';
 } $m4is_sd5z = '';
 foreach ($m4is_u70f as $m4is_unc_q ) { $m4is_sd5z.= '<option value="' . $m4is_unc_q . '">' . $m4is_unc_q . '</option>';
 } ?>
		<h3>Add New Custom Variable</h3>
		<div style="width:800px;">
			<form method="POST" action="">
				<table class="widefat">
					<tr>
						<th>Custom Variable Label</th>
						<th>Order</th>
						<th>Value</th>
					</tr>
					<tr>
						<td><input name="slot_name" type="text" size="25" required="required" placeholder="Your name for this variable"/></td>
						<td><select name="slot_id" required="required"><?php echo $m4is_sd5z;
 ?></select></td>
						<td><select name="slot_variable" required="required"><?php echo $m4is_ju4z;
 ?></select></td>
					</tr>
				</table>
				&nbsp;<br />
				<input type="submit" name="add-variable" value="Add Custom Variable" class="button-primary" />
				<hr />
			</form>
		</div>
		<?php
 } ?>
	<h3>Current Custom Variables</h3>
	<div style="width:800px;">
		<form method="POST" action="">
			<hr />
			<table class="widefat" style="white-space:nowrap;">
				<tr>
					<th>Custom Variable Label</th>
					<th>Order</th>
					<th>Value</th>
					<th>Delete?</th>
				</tr>
				<?php
 if (count($m4is_d2vjs ) == 0 ) { echo '<td colspan="99">You have no custom variables defined.</td>';
 } else { foreach ( (array)$m4is_d2vjs as $m4is_k81u4p => $m4is_g69k ) { echo '<tr>';
 echo '<td>';
 echo $m4is_g69k['name'];
 echo '</td>';
 echo '<td>';
 echo $m4is_k81u4p;
 echo '</td>';
 echo '<td>';
 echo $m4is_g69k['label'];
 echo '</td>';
 echo '<td>';
 echo '<input type="checkbox" name="delete[' . $m4is_k81u4p . ']">';
 echo '</td>';
 echo '</tr>';
 } } ?>
			</table>
			&nbsp;<br />
			<input type="submit" name="delete-variables" value="Delete Custom Variables" class="button-secondary" />
		</form>
	</div>
</div>
<hr />

