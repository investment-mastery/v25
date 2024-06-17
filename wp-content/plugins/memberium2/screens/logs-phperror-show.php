<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_ybg9sx;
 
class m4is_ybg9sx { 
function __construct() { $this->m4is_gm1n();
 } private 
function m4is_gm1n() { $m4is_vf403l = ini_get( 'error_log' );
 echo '<h3>PHP Error Log</h3>';
 if ( empty( $m4is_vf403l ) ) { echo '<p>PHP Error log file is empty.</p>';
 } else { if ( file_exists( $m4is_vf403l ) ) { $m4is_ehil57 = 32 * KB_IN_BYTES;
 $m4is_v3hstc = filesize( $m4is_vf403l );
 $m4is_wavg = ceil( $m4is_v3hstc / MB_IN_BYTES );
 $m4is_we6z87 = $m4is_ehil57 > $m4is_v3hstc ? $m4is_v3hstc : -$m4is_ehil57;
 echo '<textarea style="width:80%" rows="20">';
 echo esc_html( file_get_contents( $m4is_vf403l, false, null, $m4is_we6z87, $m4is_ehil57 ) );
 echo '</textarea><br />';
 echo 'Total Error Log Length:  ', $m4is_wavg, 'MB<br>';
 } else { echo '<p>Error log defined, but not found.</p>';
 } } } }

