<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 $m4is_rl98 = 'memberium_sync_api';
 $m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr( 'appname' );
 $m4is_f58g = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu( 'settings', 'sync_affiliate' );
 m4is_a18xl::m4is_nzf_t();
 m4is_a8iaym::m4is_j23h();
 m4is_wr40w::m4is_kj4sp();
 $_GET['tab'] = isset($_GET['tab'] ) ? $_GET['tab'] : 'operations';
 $m4is_jwjgx = [ 'operations' => '<i class="fa fa-plug"></i> Operations', 'categories' => '<i class="fa fa-tags"></i> Tag Categories', 'contactfields' => '<i class="fa fa-user"></i> Contact Fields', ];
 if ( $m4is_f58g ) { $m4is_jwjgx['affiliatefields'] = '<i class="fa fa-user-plus"></i> Affiliate Fields';
 } if ( function_exists( 'bp_is_active' ) && bp_is_active( 'xprofile' ) ) { $m4is_jwjgx['buddypress'] = '<i class="fa fa-user-plus"></i> BuddyPress Fields';
 } $m4is_k9vt = empty($_GET['tab'] ) ? 'categories' : strtolower($_GET['tab'] );
 echo '<div class="wrap">';
 echo '<h1>', __('Sync Options' ), '</h1>';
 echo '<h3 class="nav-tab-wrapper">';
 foreach ($m4is_jwjgx as $m4is_r2l5 => $m4is_t5ot4 ) { $class = ($m4is_r2l5 == $m4is_k9vt ) ? ' nav-tab-active' : '';
 if ($m4is_r2l5 == $m4is_k9vt ) { echo "<span class='nav-tab{$class}'>{$m4is_t5ot4}</span>";
 } else { echo "<a class='nav-tab{$class}' href='?page={$_GET['page']}&tab={$m4is_r2l5}'>{$m4is_t5ot4}</a>";
 } } echo '</h3>';
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 echo '<div class="wrap">';
 echo '<form method="POST" action="">';
 echo '<input type="hidden" name="formtype" value="', $_GET['tab'], '">';
 wp_nonce_field(m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), $m4is_rl98 );
 $m4is_ttr6f = [ 'operations' => 'sync-operations-show.php', 'categories' => 'sync-categories-show.php', 'contactfields' => 'sync-contactfields-show.php', 'buddypress' => 'sync-buddypress-show.php', 'affiliatefields' => 'sync-affiliatefields-show.php', 'wipe' => 'sync-wipe-show.php', ];
 if (array_key_exists($m4is_k9vt, $m4is_ttr6f)) { require_once m4is_pms8y::m4is_e5l8a9()->m4is_ev6n7e($m4is_ttr6f[$m4is_k9vt]);
 } else { m4is_pms8y::m4is_e5l8a9()->m4is_q285('easter_egg' );
 echo wp_oembed_get('https://www.youtube.com/watch?v=zgvXtexdgAM', ['autoplay' => '1']);
 echo '<p>Klaatu Barada N... Necktie... Neckturn... Nickel...</p><p>It\'s an "N" word, it\'s definitely an "N" word!</p><p>Klaatu... Barada... N...</p>';
 } echo '</form>';
 echo '</div>';
 echo '</div>';
 echo '</div>';
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_apvd = [];
 $m4is_apvd[] = [ 'id' => 0, 'text' => '(None)' ];
 foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => $m4is_mpia . ' (' . $m4is_j5sy07 . ')' ];
 } $m4is_apvd = json_encode($m4is_apvd );
 unset($m4is_iystd2, $m4is_j5sy07, $m4is_mpia );
 echo '<script>';
 echo 'var actionsetlist = ', m4is_tvc2xn::m4is_gi6g3l(), ";\n";
 echo 'var taglist = ', $m4is_apvd, ";\n";
 echo '</script>';
 unset( $m4is_apvd );

