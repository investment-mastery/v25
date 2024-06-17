<?php
 class_exists('m4is_pms8y') || die();
 if ( is_admin() ) { require_once( __DIR__ . '/admin.php' );
 add_filter( 'memberium/modules/active/names', function( $m4is_r1g2u ) { return array_merge($m4is_r1g2u, ['WPAL Path Protect for Memberium']);
 });
 new m4is_r6ry;
 } else { require_once( __DIR__ . '/frontend.php' );
 new m4is_i5kp;
 }

