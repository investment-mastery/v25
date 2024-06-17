<?php
/**
 * Copyright (c) 2022-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_kix1 { private 
function __construct() { } static 
function m4is_donvx($m4is_gguno7) { if ( m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b() ) { $m4is_qqwj1c = 'wpal-memberium-';
 $m4is_pjtbn = 'new-content';
 $m4is__ql9vk = [ [ 'group' => '', 'href' => get_admin_url( null, 'admin.php?page=memberium-memberships&action=add' ), 'id' => $m4is_qqwj1c . 'membership', 'meta' => [], 'parent' => $m4is_pjtbn, 'title' => 'Membership', ], [ 'group' => '', 'href' => get_admin_url( null, 'post-new.php?post_type=partials' ), 'id' => $m4is_qqwj1c . 'partial', 'meta' => [], 'parent' => $m4is_pjtbn, 'title' => 'Partial', ], [ 'group' => '', 'href' => get_admin_url( null, 'post-new.php?post_type=memb_shortcodeblocks' ), 'id' => $m4is_qqwj1c . 'customshortcode', 'meta' => [], 'parent' => $m4is_pjtbn, 'title' => 'Custom Shortcode', ], ];
 foreach ( $m4is__ql9vk as $m4is_f852 ) { $m4is_gguno7->add_node( $m4is_f852 );
 } $m4is_pjtbn = 'wpal-memberium';
 $m4is__ql9vk = [ [ 'id' => $m4is_pjtbn, 'title' => 'Memberium', 'parent' => '', 'href' => '', 'group' => '', 'meta' => [], ], [ 'id' => $m4is_qqwj1c . 'sync-tags', 'title' => 'Sync Tags', 'parent' => $m4is_pjtbn, 'href' => get_admin_url( null, 'admin.php?page=memberium-support&tab=dashboard&action=sync-tags' ), 'group' => '', 'meta' => [], ], [ 'id' => $m4is_qqwj1c . 'sync-fields', 'title' => 'Sync Custom Fields', 'parent' => $m4is_pjtbn, 'href' => get_admin_url( null, 'admin.php?page=memberium-support&tab=dashboard&action=sync-fields' ), 'group' => '', 'meta' => [], ], [ 'id' => $m4is_qqwj1c . 'sync-actionsets', 'title' => 'Sync Actionsets', 'parent' => $m4is_pjtbn, 'href' => get_admin_url( null, 'admin.php?page=memberium-support&tab=dashboard&action=sync-actionsets' ), 'group' => '', 'meta' => [], ], [ 'id' => $m4is_qqwj1c . 'update-license', 'title' => 'Update License', 'parent' => $m4is_pjtbn, 'href' => get_admin_url( null, 'admin.php?page=memberium-support&tab=dashboard&action=update-license' ), 'group' => '', 'meta' => [], ], [ 'id' => $m4is_qqwj1c . 'dashboard', 'title' => 'Dashboard', 'parent' => $m4is_pjtbn, 'href' => get_admin_url( null, 'admin.php?page=memberium-support&tab=dashboard'), 'group' => '', 'meta' => [], ], [ 'id' => $m4is_qqwj1c . 'support', 'title' => 'Support', 'parent' => $m4is_pjtbn, 'href' => get_admin_url( null, 'admin.php?page=memberium-support&tab=support' ), 'group' => '', 'meta' => [], ], ];
 foreach($m4is__ql9vk as $m4is_f852) { $m4is_gguno7->add_node($m4is_f852);
 } } } static 
function m4is_mbo1yw( $m4is_gguno7 ) { if ( defined( 'QM_VERSION' ) ) { return;
 } if ( ! current_user_can( 'manage_options' ) ) { return;
 } $m4is_nzx0t = m4is_pms8y::m4is_e5l8a9()->m4is_i3dg( false );
 $m4is_j_8u = wp_using_ext_object_cache();
 $m4is_oxgs = ! empty( $_SERVER['HTTP_CF_RAY'] );
 $m4is__fxwqd = ! empty( $_SERVER['HTTP_X_SUCURI_CLIENTIP'] );
 $m4is_ye_a2 = $m4is_oxgs || $m4is__fxwqd;
 $m4is_dqten = is_admin() ? WP_MAX_MEMORY_LIMIT : ini_get( 'memory_limit' );
 $m4is__tb71 = count( get_option( 'active_plugins', [] ) );
 $m4is_pjtbn = 'wpal-memberium-performance';
 $m4is__ql9vk = [ [ 'id' => $m4is_pjtbn, 'title' => 'Performance', 'parent' => '', 'href' => '', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-time', 'title' => 'Time: <span style="color:white;" id="wpal-memberium-time">' . number_format_i18n( $m4is_nzx0t['time'], 3 ) . 's</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-wpmemory', 'title' => 'Total Memory: <span style="color:white;">' . size_format( intval( $m4is_dqten ) * 1024 * 1024) . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-memory', 'title' => 'Used Memory: <span style="color:white;" id="wpal-memberium-memory">' . size_format( $m4is_nzx0t['memory'], 2 ) . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-plugins', 'title' => 'Plugins: <span style="color:white;">' . number_format_i18n( $m4is__tb71 ). '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-queries', 'title' => 'SQL Queries: <span style="color:white;" id="wpal-memberium-db-queries">' . get_num_queries() . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-http', 'title' => 'HTTP Calls: <span style="color:white;" id="wpal-memberium-http-calls">' . (int) $m4is_nzx0t['http_calls'] . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], [ 'id' => 'wpal-memberium-crm-api', 'title' => 'API Calls: <span style="color:white;" id="wpal-memberium-crm-api">' . (int) $m4is_nzx0t['api_calls'] . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ], ];
 if ( $m4is_j_8u ) { global $wp_object_cache;
 $m4is_qlinr2 = property_exists( $wp_object_cache, 'cache_hits' ) ? $wp_object_cache->cache_hits : 0;
 $m4is_urxa2q = property_exists( $wp_object_cache, 'cache_misses' ) ? $wp_object_cache->cache_misses : 0;
 if ( true ) { $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-cache-divider', 'title' => '<hr />', 'parent' => 'wpal-memberium-performance', 'href' => '#', 'group' => '', 'meta' => [], ];
 $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-caching-label', 'title' => 'Object Caching', 'parent' => 'wpal-memberium-performance', 'href' => '#', 'group' => '', 'meta' => [], ];
 $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-cache-hits', 'title' => 'Cache Hits: <span style="color:white;" id="wpal-memberium-cache-hits">' . (int) $m4is_qlinr2 . '</span>', 'parent' => 'wpal-memberium-performance', 'href' => '#', 'group' => '', 'meta' => [], ];
 $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-cache-misses', 'title' => 'Cache Misses: <span style="color:white;" id="wpal-memberium-cache-misses">' . (int) $m4is_urxa2q . '</span>', 'parent' => 'wpal-memberium-performance', 'href' => '#', 'group' => '', 'meta' => [], ];
 } } else { $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-caching-label', 'title' => 'Object Cache:  <span style="color:white;">Not Found</span>', 'parent' => 'wpal-memberium-performance', 'href' => '#', 'group' => '', 'meta' => [], ];
 } if ( $m4is_ye_a2 ) { $m4is_pjtbn = 'wpal-memberium-performance';
 $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-cache-divider', 'title' => '<hr />', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ];
 $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-cloudflare', 'title' => 'Cloudflare: <span style="color:white;">' . ( $m4is_oxgs ? 'Yes' : 'No' ) . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ];
 $m4is__ql9vk[] = [ 'id' => 'wpal-memberium-sucuri', 'title' => 'Sucuri: <span style="color:white;">' . ( $m4is__fxwqd ? 'Yes' : 'No' ) . '</span>', 'parent' => $m4is_pjtbn, 'href' => '#', 'group' => '', 'meta' => [], ];
 } foreach ( $m4is__ql9vk as $m4is_f852 ) { $m4is_gguno7->add_node( $m4is_f852 );
 } } }

