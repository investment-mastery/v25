<?php
 class_exists( 'm4is_pms8y' ) || die();
 if (! current_user_can('manage_options') ) {  wp_die( __('You do not have sufficient permissions to access this page.') );
 }  
function m4is_khfx() {  $m4is_x5wxyr = [ 'AccountId', 'CreatedBy', 'DateCreated', 'Email', 'Groups', 'Id', 'LastUpdated', 'LastUpdatedBy', 'Validated', ];
  $m4is_w_8g = [];
  $m4is_jdc9_7 = m4is_ho3l::m4is_kjedy2( 'Contact', true );
  foreach($m4is_jdc9_7 as $m4is_g1ru50) {  if (! in_array($m4is_g1ru50, $m4is_x5wxyr)) { $m4is_w_8g[$m4is_g1ru50] = $m4is_g1ru50;
 } }  return $m4is_w_8g;
 }  
function m4is_v6jn2() {  $m4is_bhy3df = [ 'Address3Street1', 'Address3Street2', 'Address3Type', 'AssistantName', 'City2', 'City3', 'Fax1Type', 'Fax2Type', 'Phone3Type', 'Phone4Type', 'Phone5Type', 'ReferralCode', 'SpouseName', ];
  $m4is_w_8g = [];
  $m4is_jdc9_7 = m4is_ho3l::m4is_kjedy2('Contact', true);
  foreach( $m4is_jdc9_7 as $m4is_g1ru50 ) {  if (in_array($m4is_g1ru50, $m4is_bhy3df) || substr($m4is_g1ru50, 0, 1) == '_') { $m4is_w_8g[$m4is_g1ru50] = $m4is_g1ru50;
 } }  return $m4is_w_8g;
 }  
function m4is_oeay3() : array { return [ 6 => 'Days', 3 => 'Weeks', 2 => 'Months', 1 => 'Years', ];
 }  
function m4is_dlc0b( $m4is_w2w8 ) : array {  if (! empty($_POST['child_added_goal']) ) {  $_POST['child_added_actionset'] = '';
 }  if (! empty($_POST['child_cancel_goal']) ) {  $_POST['child_cancel_actionset'] = '';
 }  if (! empty($_POST['parent_added_goal']) ) {  $_POST['parent_added_actionset'] = '';
 }  $m4is_flx71n = [  ];
  foreach( $m4is_flx71n as $m4is_s2ge5 ) {   $m4is_w2w8[$m4is_s2ge5] = isset($_POST[$m4is_s2ge5]) ? (int) (bool) $_POST[$m4is_s2ge5] : $m4is_w2w8[$m4is_s2ge5];
 }  $m4is_flx71n = [ 'child_count_add', 'child_field', 'parent_field', 'child_added_goal', 'child_cancel_goal', 'parent_added_goal', 'whitelist_memberships', ];
  foreach( $m4is_flx71n as $m4is_s2ge5 ) {   $m4is_w2w8[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? trim( $_POST[$m4is_s2ge5]) : $m4is_w2w8[$m4is_s2ge5];
 }  $m4is_flx71n = [ 'inherited_fields', 'parent_tags', 'tag_whitelist', ];
  foreach( $m4is_flx71n as $m4is_s2ge5 ) {    $m4is_w2w8[$m4is_s2ge5] = isset($_POST[$m4is_s2ge5]) ? trim(implode(',', $_POST[$m4is_s2ge5])) : $m4is_w2w8[$m4is_s2ge5];
 }  $m4is_flx71n = [ 'child_added_actionset', 'child_cancel_actionset', 'parent_added_actionset', 'max_child_accounts', 'parent_cache_ttl', ];
  foreach( $m4is_flx71n as $m4is_s2ge5 ) {    $m4is_w2w8[$m4is_s2ge5] = isset($_POST[$m4is_s2ge5]) ? trim($_POST[$m4is_s2ge5]) : $m4is_w2w8[$m4is_s2ge5];
 }  if ( ! empty( $_POST['subscription'] ) ) {  unset( $m4is_w2w8['subscriptions'] );
  $m4is_w2w8['subscriptions'] = array_map( 'intval', $_POST['subscription'] );
  $m4is_w2w8['ecommerce'] = (int) ( array_sum( $m4is_w2w8['subscriptions'] ) > 0 );
 }  if ( isset( $_POST['add-tag-grant'] ) ) {   $m4is_w2w8['tag_grants'][$_POST['tag']] = (int) $_POST['seats'];
 }  if ( isset( $_POST['update-tag-grants'] ) ) {  $m4is_w2w8['tag_grants'] = $_POST['tag_grants'];
  foreach( $_POST['tag_grants'] as $m4is_mpia => $m4is_o8gzjl ) {  if ( $m4is_o8gzjl == 0 ) { unset( $m4is_w2w8['tag_grants'][$m4is_mpia] );
 } } }  if ( isset( $_POST['add-tag-translation'] ) ) {  if ( $_POST['oldtag'] <> $_POST['newtag'] ) {   $_POST['oldtag'] = (int) $_POST['oldtag'];
 $_POST['newtag'] = (int) $_POST['newtag'];
 $m4is_w2w8['tag_translation'][$_POST['oldtag']] = $_POST['newtag'];
 }  if ( ( $_POST['oldtag'] == $_POST['newtag'] ) || $_POST['newtag'] == 0 ) { unset( $m4is_w2w8['tag_translation'][$_POST['oldtag']] );
 } }  if ( isset( $_POST['update-tag-translation'] ) ) {   }   m4is_sljnt::m4is_e5l8a9()->m4is_wenps( $m4is_w2w8 );
   m4is_pms8y::m4is_e5l8a9()->m4is_u7g91i();
   return $m4is_w2w8;
 }  
function build_json_tag_list() : string {   $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
   $m4is_iystd2 = (array) $m4is_iystd2['mc'];
  $m4is_apvd = [ [ 'id' => 0, 'text' => '(None)' ] ];
  foreach ( $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) {  $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => "{$m4is_mpia} ({$m4is_j5sy07})", ];
 }  return json_encode( $m4is_apvd );
 }  
function build_json_field_list() : string {   $m4is_jdc9_7 = m4is_ho3l::m4is_kjedy2( 'Contact', true );
  $m4is_xv4z = [ [ 'id' => '', 'text' => '(None)' ] ];
  foreach ( $m4is_jdc9_7 as $m4is_g1ru50 ) {  $m4is_xv4z[] = [ 'id' => $m4is_g1ru50, 'text' => $m4is_g1ru50 ];
 } return json_encode( $m4is_xv4z );
 } /**
 * Displays the about tab.
 *
 * This function retrieves the version of the Memberium Umbrella Account Extension for Keap,
 * then outputs an HTML block that displays the title of the extension, the version, the copyright notice,
 * and a link to the documentation.
 *
 * @return void
 */

 
function m4is_clg3() {  $m4is_bu7y = m4is_sljnt::m4is_e5l8a9()->m4is_u04m();
  echo <<<HTMLBLOCK
	<h2>Memberium Umbrella Account Extension for Keap</h2> <!-- Display the title of the extension -->
	<p>Version {$m4is_bu7y}</p> <!-- Display the version of the extension -->
	<p>Copyright &copy; 2015-2024 David Bullock</p> <!-- Display the copyright notice -->
	<p>For documentation on this extension, please <a href="https://memberium.com/?p=12000" target="_blank">view our help page</a>.</p> <!-- Provide a link to the documentation -->
	HTMLBLOCK;
 }  
function m4is_refp() { $m4is_bzug = m4is_oeay3();
 $m4is_w2w8 = m4is_sljnt::m4is_e5l8a9()->m4is__ntzc();
 $m4is_klcw4 = m4is_pms8y::m4is_e5l8a9()->m4is_nign();
 $m4is_z8sd = m4is_untczd::m4is_j68se();
 if ( ! empty( $m4is_klcw4 ) ) { echo '<form method="post">';
 echo '<table class="widefat">';
 echo '<tr style="font-weight:bold;">';
 echo '<td style="width:150px;">Children/Active Sub</td>';
 echo '<td>Subscription Plan Name</td>';
 echo '<td>Charge</td>';
 echo '<td>Frequency</td>';
 echo '<td>Cycles</td>';
 echo '</tr>';
 foreach( $m4is_klcw4 as $m4is_ce1f6 ) { if ( $m4is_ce1f6['Active'] ) { $m4is_ce1f6['name'] = $m4is_z8sd[$m4is_ce1f6['ProductId']]['ProductName'];
 $m4is_ce1f6['period'] = $m4is_bzug[$m4is_ce1f6['Cycle']];
 $m4is_ce1f6['NumberOfCycles'] = isset( $m4is_ce1f6['NumberOfCycles'] ) ? $m4is_ce1f6['NumberOfCycles'] : 0;
 $m4is_w_o7al = ( empty( $m4is_w2w8['subscriptions'][$m4is_ce1f6['Id']] ) ? 0 : $m4is_w2w8['subscriptions'][$m4is_ce1f6['Id']] );
 echo '<tr>';
 echo '<td><input min=0 step=1 type="number" name="subscription[',$m4is_ce1f6['Id'],']" value="', $m4is_w_o7al, '" style="width:70px; !important"></td>';
 echo '<td>', $m4is_ce1f6['name'], '</td>';
 echo '<td>$', $m4is_ce1f6['PlanPrice'], '</td>';
 echo '<td>', $m4is_ce1f6['Frequency'], ' ', $m4is_ce1f6['period'], '</td>';
 echo '<td>', $m4is_ce1f6['NumberOfCycles'] > 0 ? $m4is_ce1f6['NumberOfCycles'] : 'Unlimited', '</td>';
 echo '</tr>';
 } } echo '</table>';
 echo '<p><input type="submit" class="button-primary"></p>';
 echo '</form>';
 } }  
function m4is_q73l() {  $m4is_apvd = build_json_tag_list();
  $m4is_xv4z = build_json_field_list();
  $m4is__u1ajd = m4is_tvc2xn::m4is_gi6g3l();
 echo <<<HTMLBLOCK
		<script>
			var actionsetlist = {$m4is__u1ajd};
			var fieldlist     = {$m4is_xv4z};
			var taglist       = {$m4is_apvd};
		</script>
		</div>
		</div>

	HTMLBLOCK;
 }  
function m4is_q0i5pe( $m4is_lb_pj, array $m4is_iystd2 ) {  $m4is_k4yeul = [ 'class' => 'basic-single',  'echo' => false, 'required' => true,  'style' => 'width:250px;margin-right:30px;'  ];
  $m4is_ch17 = ['0' => '(None)'] + $m4is_iystd2;
  $m4is_p_gr = $m4is_lb_pj->m4is_xevs( 'oldtag', $m4is_iystd2, '', $m4is_k4yeul );
  $m4is_jaudn = $m4is_lb_pj->m4is_xevs( 'newtag', $m4is_ch17, '', $m4is_k4yeul );
 $m4is_unc_q = __( 'Set Tag Translation', 'memberium' );
  echo <<<HTMLBLOCK
		<form method="post">
			<p>
				<label>Create New Tag Translation</label>
				{$m4is_p_gr}
				{$m4is_jaudn}
				<input type="submit" class="button-primary" name="add-tag-translation" value="{$m4is_unc_q}">
			</p>
		</form>
	HTMLBLOCK;
 }  
function m4is_hs9_6c() {  $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is_lb_pj = m4is_q1zh2::get_instance();
 $m4is_qf47 = m4is_sljnt::m4is_e5l8a9();
  $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true )['mc'];
  $m4is_w2w8 = $m4is_qf47->m4is__ntzc();
  $m4is_aaos3 = $m4is_w2w8['tag_grants'] ?? [];
  $m4is_uw_4jr = count( $m4is_aaos3 );
  echo '<h3>Tag Grants</h3>';
  if ( $m4is_uw_4jr > 0 ) { m4is_fosc( $m4is_aaos3, $m4is_iystd2 );
 } else {  echo '<p>You have no tags assigned to give child account slots.  Create a new tag grant below:</p>';
 }  m4is_dnsk5d( $m4is_lb_pj, $m4is_iystd2 );
  echo '<hr>';
 echo '<h3>Tag Translations</h3>';
  if ( ! empty( $m4is_w2w8['tag_translation'] ) ) { m4is_npngd($m4is_w2w8['tag_translation'], $m4is_iystd2);
 } else {  echo '<p>You have no tag translations created.  Create a new tag translation below:</p>';
 }  m4is_q0i5pe( $m4is_lb_pj, $m4is_iystd2 );
 }  
function m4is_fosc( array $m4is_aaos3, array $m4is_iystd2) {  $output = '<form method="post">
			   <table class="widefat">
			   <tr style="font-weight:bold;">
			   <td style="width:150px;">Children/Tag</td>
			   <td style="width:100px;">Tag Id</td>
			   <td>Tag Name</td>
			   </tr>';
  foreach( $m4is_aaos3 as $m4is_s2ge5 => $m4is_w_o7al ) { $output .= '<tr>
					<td><input min=0 step=1 type="number" name="tag_grants[' . $m4is_s2ge5 . ']" value="' . $m4is_w_o7al . '" style="width:70px; !important"></td>
					<td>' . $m4is_s2ge5 . '</td>
					<td>' . $m4is_iystd2[$m4is_s2ge5] . '</td>
					</tr>';
 }  $output .= '</table>
				<p><input type="submit" class="button-primary" name="update-tag-grants" value="Update"></p>
				</form>';
 echo $output;
 }  
function m4is_dnsk5d($m4is_lb_pj, array $m4is_iystd2) {  $m4is_k4yeul = [ 'class' => 'basic-single', 'echo' => false, 'required' => true, 'style' => 'width:250px;margin-right:30px;', ];
  $m4is_loxs = $m4is_lb_pj->m4is_xevs('tag', $m4is_iystd2, '', $m4is_k4yeul);
  $output = <<<HTMLBLOCK
		<form method="post">
			<p>
				<label>Create New Tag Grant</label>
				$m4is_loxs
				Seats: <input name="seats" type="number" min="1" value="1" style="width:60px;margin-right:30px;">
				<input type="submit" class="button-primary" name="add-tag-grant" value="Add Tag Grant">
			</p>
		</form>
		HTMLBLOCK;
  echo $output;
 }  
function m4is_npngd( array $m4is_l8nz, array $m4is_iystd2 ) {  $output = <<<HTMLBLOCK
		<form method="post">
			<table class="widefat">
				<tr style="font-weight:bold;">
					<td style="width:350px;">Original Tag</td>
					<td style="width:350px;">New Tag</td>
					<td></td>
				</tr>
	HTMLBLOCK;
  foreach( $m4is_l8nz as $m4is_q69eq => $m4is__m3_q8 ) { $output .= <<<HTMLBLOCK
			<tr>
				<td>{$m4is_iystd2[$m4is_q69eq]} ({$m4is_q69eq})</td>
				<td>{$m4is_iystd2[$m4is__m3_q8]} ({$m4is__m3_q8})</td>
			</tr>
		HTMLBLOCK;
 }  $output .= <<<HTMLBLOCK
			</table>
		</form>
	HTMLBLOCK;
  echo $output;
 } $m4is_w2w8 = m4is_sljnt::m4is_e5l8a9()->m4is__ntzc();
 $m4is_r6nh_b = [ 'child_added_goal' => '',  'child_cancel_goal' => '',  'parent_added_goal' => '',  'child_added_actionset' => 0,  'child_cancel_actionset' => 0,  'parent_added_actionset' => 0,  'whitelist_memberships' => false,  'tag_whitelist' => '', ];
 $m4is_w2w8 = wp_parse_args( $m4is_w2w8, $m4is_r6nh_b );
 $_GET['tab'] = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
 if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { $m4is_w2w8 = m4is_dlc0b($m4is_w2w8);
 } m4is_wr40w::m4is_kj4sp();
 $m4is_jwjgx = [ 'general' => '<i class="fa fa-umbrella"></i> General', 'tags' => '<i class="fa fa-tags"></i> Tags', 'subscriptions' => '<i class="fa fa-shopping-cart"></i> Subscriptions', 'about' => '<i class="fa fa-users"></i> About', ];
 $m4is_k9vt = isset( $_GET['tab'] ) ? strtolower( $_GET['tab'] ) : 'general';
 echo '<div class="wrap">';
 echo '<h2>', __( 'Umbrella Account Settings' ), '</h2>';
 echo '<h2 class="nav-tab-wrapper">';
 foreach ($m4is_jwjgx as $m4is_r2l5 => $m4is_t5ot4) {  $class = $m4is_r2l5 == $m4is_k9vt ? ' nav-tab-active' : '';
  if ($m4is_r2l5 == $m4is_k9vt) { echo "<span class='nav-tab{$class}'>{$m4is_t5ot4}</span>";
 }  else { echo "<a class='nav-tab{$class}' href='?page=", $_GET['page'], "&tab={$m4is_r2l5}'>{$m4is_t5ot4}</a>";
 } } echo '</h2>';
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 if ( $m4is_k9vt == 'general' ) {  $m4is_pwc3bz = m4is_v6jn2();
 $m4is_hky3 = (bool) m4is_tvc2xn::m4is__p09();
 $m4is_eqg_y = ! empty($m4is_w2w8['child_added_actionset']) || ! empty($m4is_w2w8['child_cancel_actionset']) || ! empty($m4is_w2w8['parent_added_actionset']);
 echo '<form method="POST" action="">';
 wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), 'memberium_umbrella_account_nonce' );
 echo '<ul>';
 echo '<h3>Management Automations</h3>';
 if ($m4is_hky3 || $m4is_eqg_y) { if ($m4is_eqg_y) { echo '<h4>Legacy Actionsets</h4>';
 } if (empty($m4is_w2w8['child_added_goal']) ) { echo '<li><label>Child Added Actionset</label>';
 echo '<input value="', $m4is_w2w8['child_added_actionset'], '"  name="child_added_actionset" id="child_added_actionset" type="text" class="dropdown actionsetdropdown">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 } if (empty($m4is_w2w8['child_cancel_goal']) ) { echo '<li><label>Child Cancel Actionset</label>';
 echo '<input value="', $m4is_w2w8['child_cancel_actionset'], '"  name="child_cancel_actionset" id="child_cancel_actionset" type="text" class="dropdown actionsetdropdown">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 } if (empty($m4is_w2w8['parent_added_goal']) ) { echo '<li><label>Parent Added Actionset</label>';
 echo '<input value="', $m4is_w2w8['parent_added_actionset'], '"  name="parent_added_actionset" id="parent_added_actionset" type="text" class="dropdown actionsetdropdown">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 } } echo '<h4>Campaign Builder API Goals <em>(New / Replaces Actionsets)</em></h4>';
 echo '<li><label>Child Added Goal</label>';
 echo '<input value="', $m4is_w2w8['child_added_goal'], '" name="child_added_goal" id="child_added_goal" type="text" style="width:400px;" maxlength="32">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 echo '<li><label>Child Cancel Goal</label>';
 echo '<input value="', $m4is_w2w8['child_cancel_goal'], '" name="child_cancel_goal" id="child_cancel_goal" type="text" style="width:400px;" maxlength="32">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 echo '<li><label>Parent Added Goal</label>';
 echo '<input value="', $m4is_w2w8['parent_added_goal'], '" name="parent_added_goal" id="parent_added_goal" type="text" style="width:400px;" maxlength="32">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 echo '<hr>';
 echo '<h3>Profile</h3>';
 echo '<li><label>Parent Tags</label>';
 echo '<input value="', $m4is_w2w8['parent_tags'], '" type="text" class="multitaglist" id="parent_tags" name="parent_tags[]" style="width:500px;">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 $m4is_k4yeul = [ 'class' => 'basic-single', 'disabled' => ! isset($_GET['safety-override']), 'id' => 'child_field', 'style' => 'width:400px;', ];
 echo "<li><label>Child's Field to Match to Parent</label>";
 echo m4is_q1zh2::get_instance()->m4is_xevs('child_field', $m4is_pwc3bz, $m4is_w2w8['child_field'], $m4is_k4yeul);
 echo m4is_wr40w::m4is_vgnp( 0000 ), ' <strong style="color:red;">Do Not Change Unless Advised by Support</strong></li>';
 $m4is_k4yeul = [ 'class' => 'basic-single', 'disabled' => ! isset($_GET['safety-override']), 'id' => 'parent_field', 'style' => 'width:400px;', ];
 echo '<li><label>Parent Field to Match To</label>';
 echo m4is_q1zh2::get_instance()->m4is_xevs('parent_field', $m4is_pwc3bz, $m4is_w2w8['parent_field'], $m4is_k4yeul);
 echo m4is_wr40w::m4is_vgnp( 0000 ), ' <strong style="color:red;">Do Not Change Unless Advised by Support</strong></li>';
 $m4is_w_8g = m4is_khfx();
 $m4is_k4yeul = [ 'class' => 'basic-single', 'id' => 'inherited_fields', 'multiple' => true, 'size' => 2, 'style' => 'width:400px;', ];
 echo '<li><label>Inherited Fields</label>';
 echo m4is_q1zh2::get_instance()->m4is_xevs('inherited_fields[]', $m4is_w_8g, $m4is_w2w8['inherited_fields'], $m4is_k4yeul );
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 $m4is_k4yeul = [ 'id' => 'whitelist_memberships', 'label' => 'Whitelist Memberships', ];
 echo '<li><label>Whitelist Memberships</label>';
 m4is_wr40w::m4is_le8h( 'whitelist_memberships', $m4is_w2w8['whitelist_memberships'], $m4is_k4yeul );
 echo '<li><label>Tag Whitelist</label>';
 echo '<input value="', $m4is_w2w8['tag_whitelist'], '" type="text" class="multitaglist" id="tag_whitelist" name="tag_whitelist[]" style="width:500px;">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 echo '<hr>';
 echo '<h3>Child Accounts</h3>';
 echo '<li><label>Minimum Child Accounts</label>';
 echo '<input value="', $m4is_w2w8['max_child_accounts'], '"  name="max_child_accounts" id="max_child_accounts" type="number" min="-1" max="999999" class="">';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 $m4is_k4yeul = [ 'id' => 'child_count_add', 'class' => 'basic-single', 'style' => 'width:400px;', ];
 $this_fields = array_merge(['' => '(None)'], $m4is_w_8g);
 $m4is_w2w8['child_count_add'] = isset( $m4is_w2w8['child_count_add'] ) ? $m4is_w2w8['child_count_add'] : '';
 echo '<li><label>Additional Children Field</label>';
 echo m4is_q1zh2::get_instance()->m4is_xevs( 'child_count_add', $this_fields, $m4is_w2w8['child_count_add'], $m4is_k4yeul );
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 echo '<hr>';
 echo '<h3>Performance</h3>';
 echo '<li><label>Parent Cache TTL</label>';
 echo '<input value="', $m4is_w2w8['parent_cache_ttl'], '"  name="parent_cache_ttl" id="parent_cache_ttl" type="number" min="0" max="999999" class=""> seconds';
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 } elseif ( $m4is_k9vt == 'tags' ) { m4is_hs9_6c();
 } elseif ( $m4is_k9vt == 'about' ) { m4is_clg3();
 } elseif ( $m4is_k9vt == 'subscriptions' ) { m4is_refp();
 } m4is_q73l();

