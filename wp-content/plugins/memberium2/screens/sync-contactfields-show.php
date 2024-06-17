<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 ?>
<style>
	p.checkbox { margin-bottom: 6px; display: inline-block; width: 200px; white-space: nowrap; overflow:hidden; }
	div.indented {margin-left: 15px;}
	label.field_selected { font-weight:bold; color:red; }
</style>
<?php
 m4is_njmpx7::m4is_xexw();
 final 
class m4is_njmpx7 { private $m4is_bnd6ti;
 static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_k_i3nb();
 $this->m4is_vf8x30();
 } private 
function m4is_k_i3nb() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } if ( ! isset( $_POST['formtype'] ) || $_POST['formtype'] !== 'contactfields' ) { return;
 } $m4is_x5wxyr = isset( $_POST['is4wp_ignore_contact_fields'] ) ? array_filter( $_POST['is4wp_ignore_contact_fields'] ) : [];
 $m4is_o93g = is_array( $m4is_x5wxyr ) ? implode( ',', $m4is_x5wxyr ) : '';
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is_o93g, 'settings', 'ignore_contact_fields' );
 m4is_a8iaym::m4is_j23h();
 m4is_bnrdbo::m4is_x2c8n();
 m4is_wr40w::m4is_cxesuf( 'Contact Fields Ignore List Updated.' );
 } 
function m4is_vf8x30() { echo '<p>Please read our online help BEFORE changing these options.</p>';
  echo '<p>Contact fields marked in <strong style="color:red;">BOLD RED</strong> are not synced. ';
 echo 'We recommend blocking as many fields as possible to speed up performance, and reduce database usage. ';
 echo 'Be careful not to block fields you use.</p>';
 echo '<p>Please contact support@memberium.com if you have questions about this function.</p>';
  $this->m4is_ebtl();
 echo '<p><input type="submit" name="save" value="Save Contact Field Sync" class="button-primary" /></p>';
 } private 
function m4is_ebtl() { $m4is_a5gte = m4is_ho3l::m4is_kjedy2('Contact', false );
 $m4is_wk1bir = array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'sync', 'required_fields')['Contact'] ) );
 $m4is_vc9i07 = array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' ) ) );
 $m4is_wk1bir[] = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field');
 $m4is_wk1bir[] = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field');
 array_flip( $m4is_wk1bir );
 sort($m4is_a5gte);
 echo '<div class="indented">';
 foreach ( $m4is_a5gte as $m4is_cpns ) { $m4is_szi8 = '';
 $m4is_nz3t = '';
 $m4is_bxz0o = '';
 $m4is_bq_t = 'is4wp_ignore_contact_fields_' . $m4is_cpns;
 if ( in_array( $m4is_cpns, $m4is_vc9i07 ) ) { $m4is_szi8 = ' checked="checked" ';
 $m4is_bxz0o = ' field_selected ';
 } if ( ! in_array($m4is_cpns, $m4is_wk1bir ) ) { printf( '<p class="checkbox"><input value="%s" %s type="checkbox" id="%s" name="is4wp_ignore_contact_fields[]">', $m4is_cpns, $m4is_szi8, $m4is_bq_t );
 printf( '<label for="%s" class="%s">%s</label></p>', $m4is_bq_t, $m4is_bxz0o, $m4is_cpns );
 } } echo '</div>';
 } private 
function m4is_d76cd() { $m4is_dd1oi = '';
 $m4is_a5gte = m4is_ho3l::m4is_kjedy2( 'Contact', false );
 $m4is_wk1bir = array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'sync', 'required_fields')['Contact'] ) );
 $m4is_asn4 = array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields' ) ) );
 $m4is_wk1bir[] = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field' );
 $m4is_wk1bir[] = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 array_flip( (array) $m4is_wk1bir );
 echo '<select multiple="multiple" id="is4wp_ignore_contact_fields" name="is4wp_ignore_contact_fields[]" size="20" style="width:200px;">>';
 foreach ( $m4is_a5gte as $m4is_cpns ) { $m4is_xnwj4 = in_array( $m4is_cpns, $m4is_asn4 ) ? ' selected="selected" ' : '' ;
 if ( ! in_array($m4is_cpns, $m4is_wk1bir ) ) { printf( '<option value="%s" %s>%s</option>', $m4is_cpns, $m4is_xnwj4, $m4is_cpns );
 } } echo '</select>';
 } }

