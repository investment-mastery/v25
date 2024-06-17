<?php
 defined( 'ABSPATH' ) || die();
  add_filter( 'recovery_mode_email', function ( $m4is_fliw, $m4is_imdo6 ) { $m4is_hl8q = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS );
 foreach( $m4is_hl8q as $m4is_iidm ) { if ( stripos( $m4is_iidm['file'], 'memberium' ) !== false || stripos( $m4is_iidm['file'], 'm4is' ) !== false ) { $m4is_fliw = 'support@webpowerandlight.com';
 break;
 } } return $m4is_fliw;
 }, 10, 2 );

