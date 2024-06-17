<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_j918q7::m4is_xexw();
 final 
class m4is_j918q7 { private $m4is_bnd6ti;
  static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ju94();
 $this->process_updates();
 $this->m4is_vf8x30();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 }  private 
function process_updates() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } $this->m4is_u7ptg5();
 } private 
function m4is_u7ptg5() { if ( ! isset( $_POST['is4wp_ignore_tag_categories'] ) || ! is_array( $_POST['is4wp_ignore_tag_categories'] ) ) { return;
 } $m4is_kpi7 = $_POST['is4wp_ignore_tag_categories'];
 $m4is_ju_rw = m4is_a18xl::m4is_oeb7( false, true );
 $m4is__uakc = implode( ',', array_diff( $m4is_ju_rw, $m4is_kpi7 ) );
 $this->m4is_bnd6ti->m4is_qdi_3o( $m4is__uakc, 'settings', 'ignore_tag_categories' );
 m4is_pwtg7::m4is_jgs89();
 m4is_wr40w::m4is_cxesuf( 'Tag Categories Ignore List Updated.' );
 }  
function m4is_vf8x30() { $this->m4is_scyk();
 echo '<p>Select which tag categories <strong>are</strong> synchronized.</p>';
 echo '<p><strong>For best performance, sync either ALL categories, or only ONE category.</strong></p>';
 echo '<p>Tags in the <strong style="color:red;">BOLD RED</strong> categories are not synced.</p>';
 $this->m4is_ptf36h();
 echo '<p><input type="submit" name="save" value="Save Category Sync" class="button-primary" /></p>';
 }  private 
function m4is_ptf36h() { $m4is__uakc = m4is_a18xl::m4is_ks3u();
 $m4is_q13g = m4is_a18xl::m4is_rcws( false );
 echo '<div class="indented">';
 foreach( $m4is_q13g as $m4is_he8g ) { $m4is_szi8 = '';
 $m4is_bxz0o = ' field_selected ';
 if ( ! in_array( $m4is_he8g['id'], $m4is__uakc ) ) { $m4is_szi8 = ' checked="checked" ';
 $m4is_bxz0o = '';
 } $m4is_szi8 = ! in_array( $m4is_he8g['id'], $m4is__uakc ) ? ' checked="checked" ' : '';
 $m4is_bq_t = 'is4wp_category_' . $m4is_he8g['id'];
 printf( '<p class="checkbox"><input value=%s %s type="checkbox" id="%s" name="is4wp_ignore_tag_categories[]">', $m4is_he8g['id'], $m4is_szi8, $m4is_bq_t );
 printf( '<label class="%s" for="%s" >%s</label></p>', $m4is_bxz0o, $m4is_bq_t, $m4is_he8g['name'] );
 } echo '</div>';
 } private 
function m4is_scyk() { echo <<<CSSBLOCK
		<style>
			p.checkbox { margin-bottom: 6px; display: inline-block; width: 250px; white-space: nowrap; overflow:hidden; }
			div.indented {margin-left: 15px;}
			label.field_selected { font-weight:bold; color:red; }
		</style>
		CSSBLOCK;
 } }

