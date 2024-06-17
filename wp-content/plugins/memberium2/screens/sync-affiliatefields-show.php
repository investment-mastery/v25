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
 m4is__y6j::m4is_xexw();
 
class m4is__y6j { private $m4is_bnd6ti, $m4is_w_8g = [], $m4is_wrnxfy = [], $m4is_wk1bir = [];
 static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_k_i3nb();
 $this->m4is_x6wv();
 $this->m4is_atxsk();
 } private 
function m4is_x6wv() { $this->m4is_w_8g = m4is_ho3l::m4is_kjedy2( 'Affiliate', false );
  $this->m4is_wrnxfy = $this->m4is_tlr0uh();
 $this->m4is_wk1bir = $this->m4is_w17m();
 } private 
function m4is_pa4flt() { global $wpdb;
 if ( ! empty( $m4is_s2ypai ) ) { $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_tovizk = 'DELETE FROM `' . m4is_pk8phc::m4is_f5buj() . '` WHERE fieldname in (\'' . $m4is_s2ypai . '\') AND `appname` = "' . $m4is_zq0k . '" ';
 $wpdb->query( $m4is_tovizk );
 } } private 
function m4is_k_i3nb() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } $m4is_wrnxfy = isset( $_POST['ignore_affiliate_fields'] ) && is_array( $_POST['ignore_affiliate_fields'] ) ? implode( ',', $_POST['ignore_affiliate_fields'] ) : '';
 $this->m4is_bnd6ti->m4is_qdi_3o($m4is_wrnxfy, 'settings', 'ignore_affiliate_fields');
 m4is_a8iaym::m4is_j23h();
 m4is_wr40w::m4is_cxesuf('Affiliate Fields Ignore List Updated.');
 } private 
function m4is_atxsk() { echo '<p>Please read our online help BEFORE changing these options.</p>';
  echo '<p>Affiliate fields marked in <strong style="color:red;">BOLD RED</strong> are not synced. ';
 echo 'We recommend blocking as many fields as possible to speed up performance, and reduce database usage. ';
 echo 'Be careful not to block fields you use.</p>';
 echo '<p>Please contact support@memberium.com if you have questions about this function.</p>';
  $this->m4is_a42c();
 echo '<p><input type="submit" name="save" value="Save Affiliate Field Sync" class="button-primary" /></p>';
 } private 
function m4is_a42c() { $m4is_t1jt = m4is_ho3l::m4is_kjedy2( 'Affiliate', false );
 $m4is_wrnxfy = $this->m4is_tlr0uh();
 $m4is_wk1bir = $this->m4is_w17m();
 $m4is_wk1bir = array_flip( $m4is_wk1bir );
 sort( $m4is_t1jt );
 echo '<div class="indented">';
 foreach ( $m4is_t1jt as $m4is_yxwn ) { $m4is_szi8 = '';
 $m4is_nz3t = '';
 $m4is_bxz0o = '';
 $m4is_bq_t = 'ignore_affiliate_fields_' . $m4is_yxwn;
 if ( in_array( $m4is_yxwn, $m4is_wrnxfy ) ) { $m4is_szi8 = ' checked="checked" ';
 $m4is_bxz0o = ' field_selected ';
 } if ( ! in_array($m4is_yxwn, $m4is_wk1bir ) ) { printf( '<p class="checkbox"><input value="%s" %s type="checkbox" id="%s" name="ignore_affiliate_fields[]">', $m4is_yxwn, $m4is_szi8, $m4is_bq_t );
 printf( '<label for="%s" class="%s">%s</label></p>', $m4is_bq_t, $m4is_bxz0o, $m4is_yxwn );
 } } echo '</div>';
 } private 
function m4is_i9iyxr() { echo '<select multiple="multiple" id="ignore_affiliate_fields" name="ignore_affiliate_fields[]" size="20" style="width:200px;">';
 foreach ($this->m4is_w_8g as $m4is_g1ru50) { if ( ! array_key_exists( $m4is_g1ru50, $this->m4is_wk1bir ) ) { $m4is_xnwj4 = in_array( $m4is_g1ru50, $this->m4is_wrnxfy ) ? ' selected="selected" ' : '';
 printf( '<option value="%s" %s>%s</option>', $m4is_g1ru50, $m4is_xnwj4, $m4is_g1ru50 );
 } } echo '</select>';
 } private 
function m4is_tlr0uh() : array { return array_filter( explode( ',', $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_affiliate_fields', '' ) ) );
 } private 
function m4is_w17m() : array { $m4is_wk1bir = [];
 $m4is_wk1bir[] = 'AffCode';
 $m4is_wk1bir[] = 'AffName';
 $m4is_wk1bir[] = 'ContactId';
 $m4is_wk1bir[] = 'Id';
 $m4is_wk1bir[] = 'ParentId';
 $m4is_wk1bir[] = 'Password';
 $m4is_wk1bir[] = 'Status';
 return array_flip( $m4is_wk1bir );
 } }

