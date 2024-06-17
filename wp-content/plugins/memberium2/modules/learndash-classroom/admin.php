<?php
/**
 * Copyright (c) 2012-2020 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_mu8sx6 { 
function m4is_g21ul($m4is_c2ah) { $m4is_cd8k = $m4is_c2ah->ID;
 $m4is_auhoe = m4is_pms8y::m4is_e5l8a9()->elf_get_post_metas($m4is_c2ah->ID, m4is_u3cvz4::m4is_e5l8a9()->m4is_y1n5z2(), '');
 $m4is_qetrg = m4is_pwtg7::m4is_i0au6j('array');
  wp_nonce_field('save_post', "memberium_learndash_classroom_nonce_{$m4is_c2ah->ID}");
 m4is_wr40w::m4is_mz70( 'Classroom Auto-Enroll Tag<br>', '_memberium_lms_groupcourse_autoenroll[]', $m4is_auhoe['_memberium_lms_groupcourse_autoenroll'], 'multitaglist', [ 'help_id' => 0, 'multiple' => false, 'naked' => true, 'style' => 'width:100%;max-width:100%;', ] );
 m4is_q1zh2::get_instance()->elf_generate_json_select_lists();
 } 
function m4is_b9c6j($m4is_cd8k = 0, $m4is_yezyb = null, $m4is_wlqsgr = false) { if (! m4is_q1zh2::get_instance()->m4is_rphw1($m4is_cd8k, "memberium_learndash_classroom_nonce_{$m4is_cd8k}", 'save_post') ) { return;
 } m4is_pms8y::m4is_e5l8a9()->elf_save_post_metas($m4is_cd8k, m4is_u3cvz4::m4is_e5l8a9()->m4is_y1n5z2());
 } 
function m4is_hq97k() { $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
 if (in_array($m4is_a_hn, ['sfwd-courses']) ) { add_meta_box('memberium-learndash-classroom-actions', 'Classrooms for Memberium', [$this, 'm4is_g21ul'], $m4is_a_hn, 'side');
 } add_action('save_post_sfwd-courses', [$this, 'm4is_b9c6j']);
 } 
function m4is_ww61so() { add_action('admin_init', [$this, 'm4is_hq97k']);
 } private 
function __construct() { $this->m4is_ww61so();
 } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

