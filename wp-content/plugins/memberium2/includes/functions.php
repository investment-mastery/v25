<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 if (! function_exists('wp_new_user_notification') ) {  
function wp_new_user_notification( int $m4is_ig9p6, $m4is_y2vpq = '' ) { $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $m4is_kd_a34 = 0;
 $m4is_e2kg = 0;
 $m4is_wov2 = $m4is_bnd6ti->m4is_oiewvu();
 $m4is_x0_hk = get_userdata( $m4is_ig9p6 );
 $m4is_ptp26 = (bool) $m4is_bnd6ti->m4is_oiewvu( 'settings', 'sync_new_wp_users' );
 $m4is_dcf_7 = (string) $m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $m4is_r36qyu = (bool) $m4is_bnd6ti->m4is_oiewvu( 'settings', 'local_auth_only', false );
 $m4is_d0ju = (int) $m4is_bnd6ti->m4is_oiewvu( 'settings', 'new_user_registration_tag', 0 );
 $m4is_zh02 = (int) $m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_reset_tag', 0 );
 $m4is_p9r_8e = [ 'Email' => $m4is_x0_hk->user_email, $m4is_dcf_7 => $m4is_y2vpq, ];
 if ( $m4is_r36qyu ) { unset( $m4is_p9r_8e[$m4is_dcf_7] );
 } if ( ! empty( $m4is_ptp26 ) ) { $m4is_e2kg = m4is_bnrdbo::m4is_klk1gy( $m4is_p9r_8e );
 if ( $m4is_d0ju ) { $m4is_bnd6ti->m4is_zw_n()->grpAssign( $m4is_e2kg, $m4is_d0ju );
 } }   $m4is_np1s = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
 $m4is_wbgl5s = sprintf( __( 'New user registration on your site %s:' ), $m4is_np1s ) . "\r\n\r\n";
 $m4is_wbgl5s .= sprintf( __( 'Username: %s'), $m4is_x0_hk->user_login ) . "\r\n\r\n";
 $m4is_wbgl5s .= sprintf( __( 'E-mail: %s'), $m4is_x0_hk->user_email ) . "\r\n";
 @wp_mail( get_option( 'admin_email' ), sprintf( __( '[%s] New User Registration' ), $m4is_np1s ), $m4is_wbgl5s );
 if ( empty( $m4is_y2vpq ) ) { return;
 } $m4is_wbgl5s = sprintf( __( 'Username: %s' ), $m4is_x0_hk->user_login ) . "\r\n";
 $m4is_wbgl5s .= sprintf( __( 'Password: %s' ), $m4is_y2vpq ) . "\r\n";
 $m4is_wbgl5s .= wp_login_url() . "\r\n";
 wp_mail( $m4is_x0_hk->user_email, sprintf( __( '[%s] Your username and password' ), $m4is_np1s ), $m4is_wbgl5s );
 } }

