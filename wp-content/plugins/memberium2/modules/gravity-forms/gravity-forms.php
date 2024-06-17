<?php
 class_exists('m4is_pms8y') || die();
 if (is_admin() ) { add_filter( 'memberium/modules/active/names', function($m4is_r1g2u) { return array_merge($m4is_r1g2u, ['GravityForms Support']);
 });
 } else { require_once __DIR__ . '/core.php';
 m4is_hy59::m4is_e5l8a9();
 }

