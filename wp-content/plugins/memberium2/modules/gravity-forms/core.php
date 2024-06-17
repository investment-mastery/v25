<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_hy59 { private $m4is_bnd6ti;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 if ( is_admin() && include_once __DIR__ . '/admin.php' ) { m4is_kr0gxi::m4is_e5l8a9();
 } $this->m4is_ww61so();
 $this->m4is_ljhm();
 } private 
function m4is_ww61so() { add_filter('gform_pre_render', [$this, 'm4is_l4vdzt'], 1, 3);
 add_filter('gform_after_submission', [$this, 'm4is_up5k0i'], 10, 2);
 add_filter('gform_field_value_memb_city', [$this, 'm4is_zzxo']);
 add_filter('gform_field_value_memb_country', [$this, 'm4is_frk8fn']);
 add_filter('gform_field_value_memb_email', [$this, 'm4is_y6g1']);
 add_filter('gform_field_value_memb_firstname', [$this, 'm4is_f_lt']);
 add_filter('gform_field_value_memb_firstname', [$this, 'm4is_s8juhe']);
 add_filter('gform_field_value_memb_lastname', [$this, 'm4is_t5sty']);
 add_filter('gform_field_value_memb_phone', [$this, 'm4is_eao6b9']);
 add_filter('gform_field_value_memb_postalcode', [$this, 'm4is_xml2r']);
 add_filter('gform_field_value_memb_state', [$this, 'm4is__9qk']);
 add_filter('gform_field_value_memb_streetaddress1', [$this, 'm4is_jo2vyf']);
 add_filter('gform_field_value_memb_streetaddress2', [$this, 'm4is_zreg']);
 add_action( 'gform_editor_js', [$this, 'm4is_epcyl1'] );
 add_action( 'gform_field_advanced_settings', [$this, 'm4is_ohxom'], 10, 2 );
 add_action( 'gform_post_payment', [$this, 'm4is_dy7c'], 10, 2 );
 add_filter( 'gform_form_settings', [$this, 'm4is_lba6uk'], 10, 2 );
 add_filter( 'gform_pre_form_settings_save', [$this, 'm4is_rzhn2_'], 10, 2 );
 } 
function m4is_rzhn2_( $m4is_o9_6u ) { $m4is_o9_6u['memberiumformtag'] = rgpost( 'memberiumformtag' );
 return $m4is_o9_6u;
 }  
function m4is_dy7c( $m4is_zi19, $m4is_v6fdv4 ) {  } 
function m4is_ohxom( $m4is_ywn_a, $m4is_su4qk ) { static $seen = [];
 if ( ! empty( $seen[$m4is_su4qk][$m4is_ywn_a] ) ) { return;
 } if ( $m4is_ywn_a == 50 ) { $m4is_w_8g = m4is_ho3l::m4is_kjedy2('Contact');
 $m4is_x4kfl = [ $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field'), ];
 foreach($m4is_w_8g as $m4is_s2ge5 => $m4is_yxwn) { if ( in_array( $m4is_yxwn, $m4is_x4kfl ) ) { unset( $m4is_w_8g[$m4is_s2ge5] );
 } } unset( $m4is_s2ge5, $m4is_x4kfl );
 ?>
			<!-- li class="default_value_setting admin_label_setting field_setting" -->
			<li class="admin_label_setting field_setting">
			<label for="field_admin_label" class="section_label">
			Memberium Sync
			<?php ?>

			</label>
			<select id="memberiumfieldsync" onchange="SetFieldProperty('memberiumfieldsync', this.value);" >
			<option value="">(None)</option>
			<?php
 if ( is_array( $m4is_w_8g ) ) { foreach( $m4is_w_8g as $m4is_g1ru50 ) { printf( '<option value="%s">%s</option>', $m4is_g1ru50, $m4is_g1ru50 );
 } } ?>
			</select>
			</li>
			<?php
 } $seen[$m4is_su4qk][$m4is_ywn_a] = 1;
 } 
function m4is_lba6uk( $m4is_w2w8, $m4is_o9_6u ) { $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j();
 $m4is_w_o7al = rgar( $m4is_o9_6u, 'memberiumformtag' );
  $m4is_loxs = '<option value="">(None)</option>';
 foreach( $m4is_iystd2['mc'] as $m4is_c5zg => $m4is_g0wy ) { $m4is_xnwj4 = $m4is_w_o7al== $m4is_c5zg ? ' selected=selected ' : '';
 $m4is_loxs .= sprintf( '<option value="%s" %s >%s</option>', $m4is_c5zg, $m4is_xnwj4, $m4is_g0wy );
 } unset( $m4is_iystd2, $m4is_w_o7al );
 $m4is_w2w8['Form Options']['memberiumformtag'] = '
		<tr>
		<th><label for="memberiumformtag">Memberium Form Tag</label></th>
		<td><select name="memberiumformtag">' . $m4is_loxs . '</select></td>
		</tr>';
 return $m4is_w2w8;
 } 
function m4is_epcyl1() { ?>
		<script type='text/javascript'>
		//adding setting to fields of type "text"
		fieldSettings.text += ", .memberiumfieldsync";

		//binding to the load field settings event to initialize the checkbox
		jQuery(document).bind("gform_load_field_settings", function(event, field, form){
			jQuery("#memberiumfieldsync").val(field["memberiumfieldsync"]);
		});
		</script>
		<?php
 } 
function m4is_ljhm() { add_shortcode( 'memb_gravityform_field', [$this, 'm4is_lbqm']);
 } 
function m4is_v3i52($m4is_jj80m = '', $m4is_koi38 = '') { $m4is_w_o7al = '';
 if ( ! empty( $m4is_jj80m ) ) { if ( substr( $m4is_jj80m, 0, 13 ) == 'memb.contact.' ) { $m4is_yxwn = strtolower( substr( $m4is_jj80m, 13 ) );
 $m4is_w_o7al = m4is_wbc8os::m4is_sfnmc( $m4is_yxwn );
 } } if ( empty( $m4is_w_o7al ) && ! empty( $m4is_koi38 ) ) { $m4is_w_o7al = $m4is_koi38;
 } return do_shortcode( $m4is_w_o7al );
 } 
function m4is_up5k0i( $m4is_zi19, $m4is_o9_6u ) { if ( is_array( $m4is_o9_6u['fields'] ) ) { $m4is_tvmf_x = [];
 foreach( $m4is_o9_6u['fields'] as $m4is_o7tdnl => $m4is_g1ru50 ) { $m4is_kns83k = empty($m4is_g1ru50->memberiumfieldsync) ? '' : $m4is_g1ru50->memberiumfieldsync;
 if (! empty($m4is_kns83k) ) { if ($m4is_g1ru50->type == 'address') { $m4is_j5sy07 = $m4is_g1ru50->id;
 $m4is_lja67 = [];
 if ($m4is_kns83k == 'StreetAddress1') { $m4is_lja67 = [ 'street1' => 'StreetAddress1', 'street2' => 'StreetAddress2', 'city' => 'City', 'state' => 'State', 'postalcode' => 'PostalCode', 'country' => 'Country', ];
 } elseif ($m4is_kns83k == 'Address2Street1') { $m4is_lja67 = [ 'street1' => 'Address2Street1', 'street2' => 'Address2Street2', 'city' => 'City2', 'state' => 'State2', 'postalcode' => 'PostalCode2', 'country' => 'Country2', ];
 } elseif ($m4is_kns83k == 'Address3Street1') { $m4is_lja67 = [ 'street1' => 'Address3Street1', 'street2' => 'Address3Street2', 'city' => 'City3', 'state' => 'State3', 'postalcode' => 'PostalCode3', 'country' => 'Country3', ];
 } if (! empty($m4is_lja67) ) { $m4is_s2ge5 = "{$m4is_j5sy07}.1";
 if (isset( $m4is_zi19[$m4is_s2ge5]) ) { $m4is_yxwn = $m4is_lja67['street1'];
 if (empty($m4is_tvmf_x[$m4is_yxwn]) ) { $m4is_tvmf_x[$m4is_yxwn] = trim($m4is_zi19[$m4is_s2ge5]);
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.2";
 if (isset( $m4is_zi19[$m4is_s2ge5]) ) { $m4is_yxwn = $m4is_lja67['street2'];
 if (empty($m4is_tvmf_x[$m4is_yxwn]) ) { $m4is_tvmf_x[$m4is_yxwn] = trim($m4is_zi19[$m4is_s2ge5]);
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.3";
 if (isset($m4is_zi19[$m4is_s2ge5]) ) { $m4is_yxwn = $m4is_lja67['street2'];
 if (empty($m4is_tvmf_x[$m4is_yxwn]) ) { $m4is_tvmf_x[$m4is_yxwn] = trim($m4is_zi19[$m4is_s2ge5]);
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.4";
 if (isset($m4is_zi19[$m4is_s2ge5]) ) { $m4is_yxwn = $m4is_lja67['state'];
 if (empty($m4is_tvmf_x[$m4is_yxwn]) ) { $m4is_tvmf_x[$m4is_yxwn] = trim($m4is_zi19[$m4is_s2ge5]);
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.5";
 if ( isset( $m4is_zi19[$m4is_s2ge5] ) ) { $m4is_yxwn = $m4is_lja67['postalcode'];
 if (empty($m4is_tvmf_x[$m4is_yxwn]) ) { $m4is_tvmf_x[$m4is_yxwn] = trim($m4is_zi19[$m4is_s2ge5]);
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.6";
 if (isset( $m4is_zi19[$m4is_s2ge5]) ) { $m4is_yxwn = $m4is_lja67['country'];
 if (empty($m4is_tvmf_x[$m4is_yxwn]) ) { $m4is_tvmf_x[$m4is_yxwn] = trim( $m4is_zi19[$m4is_s2ge5] );
 } } } } elseif ($m4is_g1ru50->type == 'name') { $m4is_j5sy07 = $m4is_g1ru50->id;
 if ($m4is_kns83k == 'FirstName') { $m4is_s2ge5 = "{$m4is_j5sy07}.2";
 if (isset( $m4is_zi19[$m4is_s2ge5] ) ) { if (empty($m4is_tvmf_x['Title']) ) { $m4is_tvmf_x['Title'] = trim( $m4is_zi19[$m4is_s2ge5] );
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.3";
 if ( isset( $m4is_zi19[$m4is_s2ge5] ) ) { if (empty($m4is_tvmf_x['FirstName']) ) { $m4is_tvmf_x['FirstName'] = trim( $m4is_zi19[$m4is_s2ge5] );
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.4";
 if ( isset( $m4is_zi19[$m4is_s2ge5] ) ) { if (empty($m4is_tvmf_x['MiddleName']) ) { $m4is_tvmf_x['MiddleName'] = trim( $m4is_zi19[$m4is_j5sy07.'.4'] );
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.6";
 if ( isset( $m4is_zi19[$m4is_s2ge5] ) ) { if (empty($m4is_tvmf_x['LastName']) ) { $m4is_tvmf_x['LastName'] = trim( $m4is_zi19[$m4is_s2ge5] );
 } } $m4is_s2ge5 = "{$m4is_j5sy07}.8";
 if ( isset( $m4is_zi19[$m4is_s2ge5] ) ) { if (empty($m4is_tvmf_x['Suffix']) ) { $m4is_tvmf_x['Suffix'] = trim( $m4is_zi19[$m4is_s2ge5] );
 } } } else { $m4is_uz9ek = [];
 $m4is_s2ge5 = "{$m4is_j5sy07}.2";
 if ( ! empty($m4is_zi19[$m4is_s2ge5] ) ) { $m4is_uz9ek[] = $m4is_zi19[$m4is_s2ge5];
 } $m4is_s2ge5 = "{$m4is_j5sy07}.3";
 if ( ! empty( $m4is_zi19[$m4is_s2ge5] ) ) { $m4is_uz9ek[] = $m4is_zi19[$m4is_s2ge5];
 } $m4is_s2ge5 = "{$m4is_j5sy07}.4";
 if ( ! empty( $m4is_zi19[$m4is_s2ge5] ) ) { $m4is_uz9ek[] = $m4is_zi19[$m4is_s2ge5];
 } $m4is_s2ge5 = "{$m4is_j5sy07}.6";
 if ( ! empty( $m4is_zi19[$m4is_s2ge5] ) ) { $m4is_uz9ek[] = $m4is_zi19[$m4is_s2ge5];
 } $m4is_s2ge5 = "{$m4is_j5sy07}.8";
 if ( ! empty( $m4is_zi19[$m4is_s2ge5] ) ) { $m4is_uz9ek[] = $m4is_zi19[$m4is_s2ge5];
 } if (empty($m4is_tvmf_x[$m4is_kns83k]) ) { $m4is_tvmf_x[$m4is_kns83k] = trim(implode(' ', $m4is_uz9ek) );
 } } } elseif ($m4is_g1ru50->type == 'list') {    } elseif ( $m4is_g1ru50->type == 'date' ) { $m4is_w_o7al = trim( $m4is_zi19[$m4is_g1ru50->id] );
 if (! empty($m4is_w_o7al) ) { if (empty($m4is_tvmf_x[$m4is_kns83k]) ) { $m4is_tvmf_x[$m4is_kns83k] = date( 'Ymd\TH:i:s', strtotime($m4is_w_o7al) );
 } } } elseif ($m4is_g1ru50->type == 'number') { $m4is_tvmf_x[$m4is_kns83k] = (string) trim($m4is_zi19[$m4is_g1ru50->id] );
 } elseif (in_array($m4is_g1ru50->type, ['checkbox']) ) { $m4is_uz9ek = [];
 foreach ($m4is_g1ru50->inputs as $input_id => $input) { $m4is_dg8hy = $input['id'];
 if (! empty( $m4is_zi19[$m4is_dg8hy] ) ) { $m4is_uz9ek[] = $m4is_zi19[$m4is_dg8hy];
 } } if ( substr($m4is_uz9ek, 0, 2) == '["' ) { $m4is_uz9ek = json_decode( $m4is_uz9ek );
 } else { $m4is_uz9ek = implode(',', $m4is_uz9ek);
 } if (empty($m4is_tvmf_x[$m4is_kns83k]) ) { $m4is_tvmf_x[$m4is_kns83k] = $m4is_uz9ek;
 } } elseif (in_array($m4is_g1ru50->type, ['multiselect']) ) { $m4is_uz9ek = $m4is_zi19[$m4is_g1ru50->id];
 if (substr($m4is_uz9ek, 0, 2) == '["') { $m4is_uz9ek = implode(',', json_decode($m4is_uz9ek) );
 } if (empty($m4is_tvmf_x[$m4is_kns83k]) ) { $m4is_tvmf_x[$m4is_kns83k] = $m4is_uz9ek;
 } } else { if (empty($m4is_tvmf_x[$m4is_kns83k]) ) { $m4is_tvmf_x[$m4is_kns83k] = trim( $m4is_zi19[$m4is_g1ru50->id] );
 } } } } if (! empty($m4is_tvmf_x) ) { $m4is_powbq2 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'username_field');
 $m4is_dcf_7 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'password_field');
 $m4is_i9a1gn = is_user_logged_in();
 $m4is__1jyih = strtolower( m4is_wbc8os::m4is_sfnmc( 'email' ) );
 $m4is_bbeu = isset( $m4is_tvmf_x['Email'] ) ? strtolower( trim( $m4is_tvmf_x['Email'] ) ) : '';
 $m4is_e2kg = 0;
 $m4is_ig9p6 = get_current_user_id();
 $m4is_ndufnm = isset( $m4is_o9_6u['memberiumformtag'] ) ? (int) $m4is_o9_6u['memberiumformtag'] : 0;
 if ( empty($m4is_bbeu) && is_user_logged_in() ) { $m4is_x0_hk = wp_get_current_user();
 $m4is_bbeu = is_a($m4is_x0_hk, 'WP_User') ? $m4is_x0_hk->user_email : '';
 }  unset( $m4is_tvmf_x[$m4is_dcf_7] );
  if ( is_user_logged_in() ) { if ( empty( $m4is_bbeu ) || $m4is_bbeu == $m4is__1jyih ) { $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 } } if ( $m4is_e2kg ) { unset( $m4is_tvmf_x[$m4is_powbq2] );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_ndufnm, $m4is_e2kg );
 m4is_bnrdbo::m4is_cseh( $m4is_e2kg, $m4is_tvmf_x);
 m4is_pms8y::m4is_e5l8a9()->m4is_leu58( $m4is_e2kg );
 m4is_pms8y::m4is_e5l8a9()->m4is_b34y( $m4is_e2kg );
 $_SESSION = m4is_pms8y::m4is_e5l8a9()->m4is_akz3( $m4is_ig9p6 );
 } else { $m4is_e2kg = m4is_bnrdbo::m4is_klk1gy($m4is_tvmf_x);
 m4is_bnrdbo::m4is_xj2eb( $m4is_tvmf_x['Email'], "GravityForms Enrollment - Form '{$m4is_o9_6u['title']}'\nIP Address ' . {$m4is_zi19['ip']}" );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $m4is_ndufnm, $m4is_e2kg );
 }  if ( $m4is_e2kg ) {  $m4is_k4yeul = [ 'table' => -1, 'type' => 19, ];
 $m4is_onu8_4 = m4is_a8iaym::m4is_e_prox( m4is_a8iaym::CONTACT_FIELDS, m4is_a8iaym::EMAIL_TYPE);
 $m4is_onu8_4[] = 'Email';
 $m4is_onu8_4[] = 'EmailAddress2';
 $m4is_onu8_4[] = 'EmailAddress3';
 $m4is_hy9k = [];
 foreach( $m4is_tvmf_x as $m4is_yxwn => $m4is_n6yjk9 ) { if ( in_array( $m4is_yxwn, $m4is_onu8_4 ) ) { if ( ! empty( $m4is_n6yjk9 ) ) { $m4is_hy9k[] = strtolower( trim( $m4is_n6yjk9 ) );
 } } } $m4is_hy9k = array_unique( $m4is_hy9k );
 foreach( $m4is_hy9k as $m4is_fliw ) { if ( ! empty( $m4is_fliw ) ) { m4is_bnrdbo::m4is_xj2eb( $m4is_fliw, 'Memberium Gravity Form Submission' );
 } } } } } }  
function m4is_l4vdzt($m4is_o9_6u, $m4is_ifyxlv, $m4is__rc89) { if ( is_array( $m4is_o9_6u ) ) { foreach ( $m4is_o9_6u['fields'] as &$m4is_g1ru50 ) { $m4is__47wig = property_exists( $m4is_g1ru50, 'type' ) ? $m4is_g1ru50->type : '';
 $m4is_w_o7al = '';
 $m4is_jj80m = property_exists( $m4is_g1ru50, 'inputName' ) ? $m4is_g1ru50->inputName : '';
 $m4is_koi38 = property_exists( $m4is_g1ru50, 'defaultValue' ) ? $m4is_g1ru50->defaultValue : '';
 $m4is_w_o7al = $this->m4is_v3i52( $m4is_jj80m, $m4is_koi38 );
 if ( property_exists( $m4is_g1ru50, 'defaultValue' ) ) { $m4is_g1ru50->defaultValue = $m4is_w_o7al;
 } if ( $m4is__47wig == 'date' ) { if ( ! empty( $m4is_w_o7al ) ) { $m4is_i_q8ym = strtotime( $m4is_w_o7al );
 if ( $m4is_g1ru50->dateType == 'datepicker') { $m4is_g1ru50->defaultValue = date( 'm\/d\/Y', $m4is_i_q8ym );
 } elseif ( $m4is_g1ru50->dateType == 'datefield' ) { $m4is_g1ru50->inputs[0]['defaultValue'] = date( 'n', $m4is_i_q8ym );
 $m4is_g1ru50->inputs[1]['defaultValue'] = date( 'j', $m4is_i_q8ym );
 $m4is_g1ru50->inputs[2]['defaultValue'] = date( 'Y', $m4is_i_q8ym );
 } elseif ( $m4is_g1ru50->dateType == 'datedropdown' ) { $m4is_g1ru50->inputs[0]['defaultValue'] = date( 'n', $m4is_i_q8ym );
 $m4is_g1ru50->inputs[1]['defaultValue'] = date( 'j', $m4is_i_q8ym );
 $m4is_g1ru50->inputs[2]['defaultValue'] = date( 'Y', $m4is_i_q8ym );
 } } } elseif ( $m4is__47wig == 'name' ) { foreach( $m4is_g1ru50->inputs as $m4is_s2ge5 => $m4is_o7gi ) { $m4is_jj80m = isset( $m4is_o7gi['name'] ) ? $m4is_o7gi['name'] : '';
 $m4is_koi38 = isset( $m4is_o7gi['defaultValue'] ) ? $m4is_o7gi['defaultValue'] : '';
 $m4is_g1ru50->inputs[$m4is_s2ge5]['defaultValue'] = $this->m4is_v3i52( $m4is_jj80m, $m4is_koi38 );
 } } elseif ( $m4is__47wig == 'address' ) { foreach( $m4is_g1ru50->inputs as $m4is_s2ge5 => $m4is_o7gi ) { $m4is_jj80m = isset( $m4is_o7gi['name'] ) ? $m4is_o7gi['name'] : '';
 $m4is_koi38 = isset( $m4is_o7gi['defaultValue'] ) ? $m4is_o7gi['defaultValue'] : '';
 $m4is_g1ru50->inputs[$m4is_s2ge5]['defaultValue'] = $this->m4is_v3i52( $m4is_jj80m, $m4is_koi38 );
 } } elseif ( $m4is__47wig == 'checkbox' ) { $selections = [];
 if ( property_exists( $m4is_g1ru50, 'defaultValue' ) ) { $selections = strtolower( $m4is_g1ru50->defaultValue );
 $selections = array_filter( explode( ',', $selections ) );
  } foreach( $m4is_g1ru50->choices as $choice_id => $choice ) { if ( in_array( strtolower( $choice['value'] ), $selections ) ) { $m4is_g1ru50->choices[$choice_id]['isSelected'] = 1;
 } } } else { if ( is_array( $m4is_g1ru50->inputs ) ) { foreach( $m4is_g1ru50->inputs as $m4is_s2ge5 => $m4is_o7gi ) { $m4is_jj80m = isset( $m4is_o7gi['name'] ) ? $m4is_o7gi['name'] : '';
 $m4is_koi38 = isset( $m4is_o7gi['defaultValue'] ) ? $m4is_o7gi['defaultValue'] : '';
 $m4is_g1ru50->inputs[$m4is_s2ge5]['defaultValue'] = $this->m4is_v3i52( $m4is_jj80m, $m4is_koi38 );
 } } } } } return $m4is_o9_6u;
 } 
function m4is_mfpjsd($m4is_o9_6u, $m4is_ifyxlv, $m4is__rc89) { } 
function m4is_lbqm($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'debug' => 0, 'default' => '', 'field' => '', 'form_id' => 0, 'htmlattr' => '', 'input' => '', 'offset' => 0, 'order' => 'DESC', 'page_size' => 1, 'status' => 'active', 'txtfmt' => '', 'user_id' => get_current_user_id(), ];
 $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_qnjfv['field'] = strtolower( trim($m4is_qnjfv['field']) );
 $m4is_qnjfv['input'] = strtolower( trim($m4is_qnjfv['input']) );
 $m4is_qnjfv['form_id'] = (int) $m4is_qnjfv['form_id'];
 $m4is_qnjfv['page_size'] = (int) $m4is_qnjfv['page_size'];
 $m4is_qnjfv['offset'] = (int) $m4is_qnjfv['offset'];
 $m4is_o9_6u = GFAPI::get_form($m4is_qnjfv['form_id']);
 $m4is_o7tdnl = 0;
 if ( empty( $m4is_qnjfv['field'] ) ) { if ( m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b() ) return '<p>Error:  No Fieldname Provided.</pre>';
 return;
 } if ( empty( $m4is_o9_6u ) ) { if ( m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b() ) return '<p>Error:  Invalid Form Id.</p>';
 return;
 } if ( empty( $m4is_o9_6u['fields'] ) ) { if ( m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b() ) return '<p>Error:  This form has no fields.</p>';
 return;
 } $m4is_x_uh = [];
 $m4is_x_uh['status'] = 'active';
 $m4is_ba1e = 1;
 $m4is_st8w = [ 'direction' => $order, 'is_numeric' => true ];
 $m4is_lbzrqt = [ 'offset' => $m4is_qnjfv['offset'], 'page_size' => $m4is_qnjfv['page_size'] ];
 $m4is_x_uh['field_filters'][] = [ 'key' => 'created_by', 'value' => $m4is_qnjfv['user_id'] ];
 $m4is_zi19 = GFAPI::get_entries($m4is_qnjfv['form_id'], $m4is_x_uh, $m4is_st8w, $m4is_lbzrqt, $m4is_ba1e);
 if ( $debug ) { return print_r( $m4is_zi19, true );
 }  foreach( $m4is_o9_6u['fields'] as $m4is_w_8g ) { $m4is_tz42r0 = ( $m4is_qnjfv['field'] == strtolower( $m4is_w_8g->memberiumfieldsync ) );
 $m4is_tz42r0 = $m4is_tz42r0 || ( $m4is_qnjfv['field'] == strtolower( $m4is_w_8g->adminLabel ) );
 $m4is_tz42r0 = $m4is_tz42r0 || ( $m4is_qnjfv['field'] == strtolower( $m4is_w_8g->label ) );
 if ( $m4is_tz42r0 ) { if ( ! is_array( $m4is_w_8g->inputs ) ) { $m4is_o7tdnl = $m4is_w_8g->id;
 } else { foreach ( $m4is_w_8g->inputs as $m4is_ykl60 ) { if ( $m4is_qnjfv['input'] == strtolower( $m4is_ykl60['label'] ) || $m4is_qnjfv['input'] == strtolower( $m4is_ykl60['name'] ) ) { $m4is_o7tdnl = $m4is_ykl60['id'];
 } } } } } unset( $m4is_st8w, $m4is_x_uh, $m4is_lbzrqt, $m4is_ba1e, $m4is_d7lap );
 $m4is_o7tdnl = empty( $m4is_o7tdnl ) ? $m4is_qnjfv['field'] : $m4is_o7tdnl;
 if ( $m4is_o7tdnl ) { $m4is_w_o7al = isset( $m4is_zi19[0][$m4is_o7tdnl] ) ? $m4is_zi19[0][$m4is_o7tdnl] : $default;
 $m4is_d7lap = json_decode( $m4is_w_o7al );
 $m4is_w_o7al = empty( $m4is_d7lap ) ? $m4is_w_o7al : $m4is_d7lap;
 } return m4is_crqo::m4is__go6j( false, $m4is_w_o7al, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }    
function m4is_f_lt($m4is_w_o7al) { return m4is_wbc8os::m4is_jjgo();
 } 
function m4is_s8juhe($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('firstname');
 } 
function m4is_t5sty($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('lastname');
 } 
function m4is_y6g1($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('email');
 } 
function m4is_eao6b9($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('phone1');
 } 
function m4is_jo2vyf($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('streetaddress1');
 } 
function m4is_zreg($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('streetaddress2');
 } 
function m4is_zzxo($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('city');
 } 
function m4is__9qk($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('state');
 } 
function m4is_xml2r($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('postalcode');
 } 
function m4is_frk8fn($m4is_w_o7al) { return m4is_wbc8os::m4is_sfnmc('country');
 } 
function __call($m4is_h7j0, $m4is_k4yeul) { } }

