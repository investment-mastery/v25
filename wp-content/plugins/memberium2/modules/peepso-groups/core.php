<?php
/**
 * Copyright (C) 2022 David Bullock
 * Web Power and Light, LLC
 */

 class_exists('m4is_pms8y') || die();
 
class m4is_gv3m0 { 
function m4is__q42k($m4is_r1g2u = []) { return array_merge($m4is_r1g2u, ['Peepso Groups for Memberium']);
 } 
function m4is_lqy4($m4is_ig9p6, $m4is_mdqgk) { global $wpdb;
 if (! $m4is_ig9p6 ) { return;
 } $m4is_iystd2 = isset($m4is_mdqgk['memb_user']['tags']) ? explode(',', $m4is_mdqgk['memb_user']['tags']) : [];
 if (empty($m4is_iystd2) ) { return;
 }  $m4is_tovizk = "SELECT `gm_group_id` FROM `{$wpdb->prefix}peepso_group_members` WHERE `gm_user_id` = {$m4is_ig9p6}";
 $m4is_vwdb4 = implode(',', array_keys($wpdb->get_results($m4is_tovizk, OBJECT_K) ) );
 if (! empty($m4is_vwdb4) ) { $m4is_tovizk = "SELECT `post_id`, `meta_value` FROM `{$wpdb->postmeta}` WHERE `post_id` IN ( {$m4is_vwdb4} ) AND `meta_key` = 'autojoin' AND `meta_value` > ''";
 $m4is_t7jk = $wpdb->get_results($m4is_tovizk, OBJECT_K);
 if (! empty($m4is_t7jk) ) { foreach($m4is_t7jk as $m4is_yc74o) { if (! in_array($m4is_yc74o->meta_value, $m4is_iystd2) ) { $peepso = new PeepSoGroupUser($m4is_yc74o->post_id, $m4is_ig9p6);
 $peepso->member_leave();
 } } } }  $m4is_tovizk = "SELECT distinct(`gm_group_id`) FROM `{$wpdb->prefix}peepso_group_members` WHERE `gm_user_id` <> {$m4is_ig9p6}";
 $m4is_vwdb4 = implode(',', array_keys($wpdb->get_results($m4is_tovizk, OBJECT_K) ) );
 if (! empty($m4is_vwdb4) ) { $m4is_tovizk = "SELECT `post_id`, `meta_value` FROM `{$wpdb->postmeta}` WHERE `post_id` IN ( {$m4is_vwdb4} ) AND `meta_key` = 'autojoin' AND `meta_value` > ''";
 $m4is_t7jk = $wpdb->get_results($m4is_tovizk, OBJECT_K);
 if (! empty($m4is_t7jk) ) { foreach($m4is_t7jk as $m4is_yc74o) { if (in_array($m4is_yc74o->meta_value, $m4is_iystd2) ) { $peepso = new PeepSoGroupUser($m4is_yc74o->post_id, $m4is_ig9p6);
 $peepso->member_join();
 } } } } } private 
function m4is_ww61so() { add_action('memberium/session/updated', [$this, 'm4is_lqy4'], 10, 2);
 if (is_admin() ) { add_filter('memberium/modules/active/names', [$this, 'm4is__q42k'], 10, 1);
 } } private 
function __construct() { $this->m4is_ww61so();
 } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

