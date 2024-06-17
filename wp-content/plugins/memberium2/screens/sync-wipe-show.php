<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_q1zh2' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_s21p0a::m4is_xexw();
 final 
class m4is_s21p0a { static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_hxbp4();
 $this->m4is_f37d10();
 } private 
function m4is_f37d10() { $m4is_g5whlt = wp_nonce_field( 'memberium_sync_wipe', 'memberium_sync_wipe_nonce', true, false );
 echo <<<HTMLBLOCK
		<style>
			.red-warning {
				margin:50px;
				padding:50px;
				background-color:red;
				color:white;
				border-radius:25px;
				font-size:16px !important;
			}
			.warning-text {
				font-size:16px !important;
				font-weight: bold;
			}
		</style>
		<form method="post">
			{$m4is_g5whlt}
			<div class="red-warning">
			<p class="warning-text">
				Click the button below to delete all Memberium data from the database.
				This will remove all Memberium data from the database, including all settings, custom fields, and tags.
			</p>
			<p>
				<input type="text" placeholder="Type 'ETERNAL PAIN' to confirm" name="wipe_confirm" class="regular-text" />
			</p>
			<p class="warning-text">
				This action cannot be undone.
			</p>
			<p class="warning-text">
				<input type="submit" name="wipe" value="Wipe Memberium Data" class="button-primary" />
			</p>
			</div>
		</form>
		HTMLBLOCK;
 } private 
function m4is_hxbp4() { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } deactivate_plugins( plugin_basename( __MEMBERIUM_HOME__ ) );
 } private 
function m4is_bni80o() { global $wpdb;
 $m4is_ig9p6 = get_current_user_id();
 file_put_contents( ABSPATH . '.maintenance', '<?php $upgrading = time();' );
 $m4is_eboe9 = [ 'i2sdk%', 'memberium%', ];
 foreach( $m4is_eboe9 as $m4is_wqb_d0 ) { $m4is_hp1q8i = $wpdb->esc_like( $m4is_wqb_d0 );
 $m4is_tovizk = $wpdb->prepare( "SELECT `option_name` FROM %i WHERE `option_name` LIKE %s", $wpdb->options, $m4is_hp1q8i );
 $m4is_bdm2l = $wpdb->get_col( $m4is_tovizk );
 foreach( $m4is_bdm2l as $m4is_wqb_d0 ) {   } } $m4is_btr7 = [ 'infusionsoft_user_id', 'memberium/contact_id/%', 'm4is%', 'memberium%', ];
 foreach( $m4is_btr7 as $m4is_yx0i ) { $m4is_hp1q8i = $wpdb->esc_like( $m4is_yx0i );
 $m4is_tovizk = $wpdb->prepare( "SELECT `user_id`, `meta_key` FROM %i WHERE `meta_key` LIKE %s", $wpdb->usermeta, $m4is_hp1q8i );
 $m4is_x2eu84 = $wpdb->query( $m4is_tovizk );
 foreach( $m4is_x2eu84 as $m4is_ig9p6 => $m4is_yx0i ) { update_user_meta( $m4is_ig9p6, $m4is_yx0i, '' );
 delete_user_meta( $m4is_ig9p6, $m4is_yx0i );
 } } $m4is_r5hj = [ '%is4wp%', ];
 foreach( $m4is_r5hj as $m4is_yx0i ) { $m4is_hp1q8i = $wpdb->esc_like( $m4is_yx0i );
 $m4is_tovizk = $wpdb->prepare( "SELECT `post_id`, `meta_key` FROM %i WHERE `meta_key` LIKE %s", $wpdb->postmeta, $m4is_hp1q8i );
 $m4is_x2eu84 = $wpdb->query( $m4is_tovizk );
 foreach( $m4is_x2eu84 as $m4is_ig9p6 => $m4is_yx0i ) { update_post_meta( $m4is_ig9p6, $m4is_yx0i, '' );
 delete_post_meta( $m4is_ig9p6, $m4is_yx0i );
 } } $m4is_tplu = get_option( 'memberium_tables', [] );
 foreach( $m4is_tplu as $m4is_dj_2 ) { $wpdb->query( "TRUNCATE TABLE {$m4is_dj_2}" );
 }  if ( file_exists( ABSPATH . '.maintenance' ) ) { unlink( ABSPATH . '.maintenance' );
 } } }

