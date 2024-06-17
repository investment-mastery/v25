<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_or93 { static 
function m4is_ij5_0(string $m4is_za92q = '', string $m4is_ycsv = '') { $m4is_ycsv = empty($m4is_ycsv) ? get_temp_dir() : $m4is_ycsv;
 $m4is_za92q = empty($m4is_za92q) ? uniqid() : $m4is_za92q;
 $m4is_ea6ksm = $m4is_ycsv . $m4is_za92q;
 mkdir($m4is_ea6ksm);
 $m4is_ea6ksm = realpath($m4is_ea6ksm);
 return $m4is_ea6ksm . '/';
 } static 
function m4is_hyfqs( $m4is_cd8k = 0 ) { if (is_object($m4is_cd8k) ) { $m4is_c2ah = $m4is_cd8k;
 $m4is_cd8k = $m4is_c2ah->ID;
 } $m4is_c2ah = get_post($m4is_cd8k);
 $m4is_auhoe = get_post_meta($m4is_cd8k);
 $m4is_flx71n = [ '_elementor_css', '_elementor_data', '_elementor_edit_mode', '_elementor_page_settings', '_elementor_template_type', '_elementor_version', '_et_builder_version', '_et_pb_custom_css', '_et_pb_enable_shortcode_tracking', '_et_pb_old_content', '_et_pb_page_layout', '_et_pb_post_hide_nav', '_et_pb_side_nav', '_et_pb_use_builder', '_fl_builder_data_settings', '_fl_builder_data', '_fl_builder_draft_settings', '_fl_builder_draft', '_fl_builder_enabled', '_is4wp_anonymous_only', '_is4wp_any_loggedin_user', '_is4wp_any_membership', '_is4wp_can_comment', '_is4wp_discourage_cache', '_is4wp_force_public', '_is4wp_hide_from_menu', '_is4wp_private_comments', '_is4wp_prohibited_action', '_is4wp_redirect_url', '_iswp_custom_code', '_optimizepress_color_scheme_advanced', '_optimizepress_color_scheme_template', '_optimizepress_exit_redirect', '_optimizepress_fb_share', '_optimizepress_feature_area', '_optimizepress_feature_title', '_optimizepress_footer_area', '_optimizepress_header_layout', '_optimizepress_launch_funnel', '_optimizepress_launch_gateway', '_optimizepress_lightbox', '_optimizepress_membership', '_optimizepress_mobile_redirect', '_optimizepress_page_thumbnail_preset', '_optimizepress_page_thumbnail', '_optimizepress_pagebuilder', '_optimizepress_scripts', '_optimizepress_seo', '_optimizepress_theme', '_optimizepress_typography', '_wp_page_template', ];
 $m4is_w4q1 = [ 'signature' => 'Web Power and Light Post Sherpa', 'version' => 1, 'title' => isset($m4is_auhoe['_template_title'][0]) ? $m4is_auhoe['_template_title'][0] : $m4is_c2ah->post_title, 'post' => [ 'post_content' => $m4is_c2ah->post_content, 'post_title' => $m4is_c2ah->post_title, 'post_excerpt' => $m4is_c2ah->post_excerpt, 'comment_status' => $m4is_c2ah->comment_status, 'ping_status' => $m4is_c2ah->ping_status, 'post_type' => $m4is_c2ah->post_type, ], 'meta' => [], ];
 foreach($m4is_flx71n as $m4is_c5zg) { if (isset($m4is_auhoe[$m4is_c5zg][0]) ) { $m4is_w4q1['meta'][$m4is_c5zg] = base64_encode($m4is_auhoe[$m4is_c5zg][0]);
 } } $m4is_w4q1 = json_encode($m4is_w4q1);
 return $m4is_w4q1;
 } static 
function m4is_aqv14(array $m4is_lyrv = [] ) { if (! count($m4is_lyrv) ) { return;
 } require_once ABSPATH .'/wp-admin/includes/file.php';
 $m4is_pap_7 = wp_upload_dir();
 $m4is_y57s = $m4is_pap_7['path'] . '/';
 $m4is_ht9w = $m4is_y57s . 'page-export-' . time() . '-' . count($m4is_lyrv) . '.zip';
 $m4is_doq8l = "\n\nPost Sherpa Export\n" . 'Copyright (c) ' . date('Y') . " Web, Power and Light LLC\n\n";
 $m4is_v24u = new ziparchive;
 $m4is_v24u->open($m4is_ht9w, ziparchive::CREATE || ziparchive::OVERWRITE);
 $m4is_v24u->setArchiveComment($m4is_doq8l);
  $m4is_v34d = [];
 foreach($m4is_lyrv as $m4is_j5sy07) { $m4is_c2ah = get_post($m4is_j5sy07);
 $m4is_etj2 = self::m4is_hyfqs($m4is_c2ah);
 $m4is_za92q = 'memberium-page-export-' . $m4is_c2ah->post_name . '.json';
 $m4is_v24u->addfromstring($m4is_za92q, $m4is_etj2);
 } $m4is_v24u->close();
  if (! function_exists('media_handle_upload') ) { require_once(ABSPATH . 'wp-admin/includes/image.php');
 require_once(ABSPATH . 'wp-admin/includes/file.php');
 require_once(ABSPATH . 'wp-admin/includes/media.php');
 } $m4is_jc37 = [];
 $m4is_jc37['name'] = basename($m4is_ht9w);
 $m4is_jc37['tmp_name'] = $m4is_ht9w;
 $m4is_mtgjc = media_handle_sideload($m4is_jc37, 0, 'Memberium Page Export Created on ' . date('Y-m-d') );
 return $m4is_mtgjc;
 } static 
function m4is_wyrnek(string $m4is_za92q) { if (! class_exists('ZipArchive') ) { return false;
 } $m4is_obl4j7 = new ZipArchive;
 } static 
function m4is_wz5s6(string $m4is_m_9zme = '', int $m4is_cd8k = 0) { $m4is_m_9zme = json_decode($m4is_m_9zme, true);
 if ($m4is_m_9zme['signature'] == 'Web Power and Light Post Sherpa') { $m4is_c2ah = [ 'ID' => $m4is_cd8k, 'post_title' => $m4is_m_9zme['post']['post_title'], 'post_content' => $m4is_m_9zme['post']['post_content'], 'post_excerpt' => $m4is_m_9zme['post']['post_excerpt'], 'post_author' => get_current_user_id(), 'comment_status' => $m4is_m_9zme['post']['comment_status'], 'ping_status' => $m4is_m_9zme['post']['ping_status'], 'post_type' => $m4is_m_9zme['post']['post_type'], ];
 $m4is_cd8k = wp_insert_post($m4is_c2ah, false);
 foreach($m4is_m_9zme['meta'] as $m4is_c5zg => $m4is_g0wy) { $m4is_g0wy = base64_decode($m4is_g0wy);
 $m4is_g0wy = maybe_unserialize($m4is_g0wy);
 if (is_string($m4is_g0wy) ) { $m4is_g0wy = addslashes($m4is_g0wy);
 } $m4is_j5sy07 = add_post_meta($m4is_cd8k, $m4is_c5zg, $m4is_g0wy, false);
 } echo 'post id = ', $m4is_cd8k, "<br>";
 $m4is_lixqnk = get_post_meta($m4is_cd8k, '_elementor_data', true);
 echo "\n\n\n", $m4is_lixqnk, "\n\n\n";
 die();
 } die();
 } }

