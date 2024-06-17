<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_xb1p6::m4is_xexw();
 
class m4is_xb1p6 { static private $m4is_bnd6ti;
 static private $m4is_xt67;
 static private $m4is_yfi93;
 static private $m4is_p5kpm;
 static private $m4is_w2w8;
 static private $m4is_smbscw;
 static 
function m4is_xexw() { self::m4is_ju94();
 self::m4is_co0_j4();
 self::m4is_gm1n();
 self::m4is_fcao();
 } private 
function __construct() {} private static 
function m4is_ju94() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_xt67 = self::$m4is_bnd6ti->m4is_bv0x();
 self::$m4is_smbscw = self::$m4is_bnd6ti->m4is_m1x4a7();
 self::$m4is_w2w8 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings' );
 self::$m4is_yfi93 = get_option( 'memberium_extensions', [] );
 self::$m4is_p5kpm = [];
  foreach( self::$m4is_yfi93 as $m4is_c5zg => $m4is_g0wy ) { if ( ! array_key_exists( $m4is_c5zg, self::$m4is_xt67 ) ) { unset( self::$m4is_yfi93[$m4is_c5zg] );
 } } ksort( self::$m4is_yfi93 );
 foreach( self::$m4is_xt67 as $m4is_f852 => $m4is_ea6ksm ) { if( array_key_exists( $m4is_f852, self::$m4is_smbscw ) ){ $m4is_m_mie7 = dirname( self::$m4is_bnd6ti->m4is_znwy() . 'vendor/' . $m4is_ea6ksm ) . '/info.txt';
 } else{ $m4is_m_mie7 = dirname( self::$m4is_bnd6ti->m4is_ikr4nx( $m4is_ea6ksm ) ) . '/info.txt';
 } if ( file_exists( $m4is_m_mie7 ) ) { self::$m4is_p5kpm[] = $m4is_m_mie7;
 } } } private static 
function m4is_co0_j4() { current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 } private static 
function m4is_ujn_() { foreach ( self::$m4is_p5kpm as $m4is_r34hj8 => $m4is_ea6ksm ) { $m4is_wmpof = dirname( $m4is_ea6ksm ) . '/info.txt';
 $m4is_etj2 = get_plugin_data( $m4is_wmpof, false, false );
 $m4is_ldjf8y = basename( dirname( $m4is_ea6ksm ) );
 $m4is_e3h27 = isset( self::$m4is_yfi93[$m4is_ldjf8y] ) ? self::$m4is_yfi93[$m4is_ldjf8y] : 1;
 if (! empty($m4is_etj2['Name'] ) ) { m4is_wr40w::m4is_hd8p( $m4is_etj2['Name'], "extensions[{$m4is_ldjf8y}]", $m4is_etj2['AuthorURI'], (bool) $m4is_e3h27 );
 } } } private static 
function m4is_fcao() { echo <<<HTMLBLOCK


			<script>
		HTMLBLOCK;
 if ( empty( self::$m4is_yfi93['facebook'] ) ) { echo <<<HTMLBLOCK
				jQuery('#facebook_app_id').attr('disabled', 'disabled');
				jQuery('#facebook_app_id').val('');
				jQuery('#facebook_app_id').attr('placeholder', 'Activate the Facebook extension to use this.');
			HTMLBLOCK;
 } if ( empty( self::$m4is_yfi93['spiffy'] ) ) { echo <<<HTMLBLOCK
				jQuery('#spiffy_api_key,#spiffy_subdomain').attr('disabled', 'disabled');
				jQuery('#spiffy_api_key,#spiffy_subdomain').val('');
				jQuery('#spiffy_api_key,#spiffy_subdomain').attr('placeholder', 'Activate the Spiffy extension to use this.');
			HTMLBLOCK;
 } echo <<<HTMLBLOCK
			</script>


		HTMLBLOCK;
 } private static 
function m4is_gm1n() { echo '<form method="POST" action="">';
 wp_nonce_field( self::$m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce' );
 echo '<ul>';
 echo '<h3>Optional Extensions</h3>';
 self::m4is_ujn_();
 echo '</ul>';
 echo '<ul>';
 echo '<h3>Optional Settings</h3>';
 m4is_wr40w::m4is_q_7l( 'Facebook App ID', 'facebook_app_id', self::$m4is_w2w8['facebook_app_id'], ['help_id' => 2571, 'style' => 'text-align:left;width:100px;']);
 echo '<br />';
 m4is_wr40w::m4is_q_7l( 'Spiffy Subdomain', 'spiffy_subdomain', self::$m4is_w2w8['spiffy_subdomain'], [ 'help_id' => 19699, 'pattern' => '[A-Za-z0-9][A-Za-z0-9\-]+', 'style' => 'text-align:left;width:100px;', 'placeholder' => 'Enter your Spiffy Subdomain here', ] );
 m4is_wr40w::m4is_q_7l( 'Spiffy API Key', 'spiffy_api_key', self::$m4is_w2w8['spiffy_api_key'], [ 'help_id' => 0, 'pattern' => '[A-Za-z0-9][A-Za-z0-9\-]+', 'style' => 'text-align:left;width:100px;', 'placeholder' => 'Enter your Spiffy API Key here', ] );
 if ( ! empty( self::$m4is_yfi93['spiffy'] ) ) { } echo '</ul>';
 echo '<p><input type="submit" value="Update" class="button-primary"></p>';
 echo '</form>';
 } }

