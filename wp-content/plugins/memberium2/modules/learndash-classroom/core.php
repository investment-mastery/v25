<?php
/**
 * Copyright (c) 2012-2020 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_u3cvz4 { public 
function m4is_y1n5z2() { return [ '_memberium_lms_groupcourse_autoenroll', ];
 } 
function m4is_gonajs(int $m4is_ig9p6, int $m4is_nvkre) { $m4is_e2kg = m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_v948s = learndash_group_enrolled_courses($m4is_nvkre);
 $m4is_pist5 = [];
 foreach($m4is_v948s as $m4is_nsnp) { $m4is_bs8p = array_filter(explode(',', get_post_meta($m4is_nvkre, '_memberium_lms_groupcourse_autoenroll', true) ) );
 $m4is_pist5 = array_merge($m4is_pist5, $m4is_bs8p);
 } if (! empty($m4is_pist5)) { $m4is_pist5 = array_unique($m4is_pist5);
 $m4is_e2kg = m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 if ($m4is_e2kg) { m4is_pms8y::m4is_e5l8a9()->elf_add_remove_crm_tags($m4is_pist5, $m4is_e2kg);
 } } } } 
function m4is_dumpj8(int $m4is_ig9p6, int $m4is_nvkre) { $m4is_e2kg = m4is_pms8y::m4is_e5l8a9()->m4is_l1i7($m4is_ig9p6);
 if ($m4is_e2kg) { $m4is_v948s = learndash_group_enrolled_courses($m4is_nvkre);
 $m4is_pist5 = [];
 foreach($m4is_v948s as $m4is_nsnp) { $m4is_bs8p = array_filter(explode(',', get_post_meta($m4is_nvkre, '_memberium_lms_groupcourse_autoenroll', true) ) );
 $m4is_pist5 = array_merge($m4is_pist5, $m4is_bs8p);
 } if (! empty($m4is_pist5)) { $m4is_pist5 = array_unique($m4is_pist5);
 foreach($m4is_pist5 as $m4is_s2ge5 => $m4is_mpia) { $m4is_pist5[$m4is_s2ge5] = (int) "-{$m4is_mpia}";
 } $m4is_pist5 = implode(',', $m4is_iystd2);
 m4is_pms8y::m4is_e5l8a9()->elf_add_remove_crm_tags($m4is_pist5, $m4is_e2kg);
 } } } private 
function m4is_ww61so() { add_action('ld_removed_group_access', [$this, 'm4is_dumpj8'], 10, 2);
 add_action('ld_added_group_access', [$this, 'm4is_gonajs'], 10, 2);
  } private 
function __construct() { $this->m4is_ww61so();
 if (is_admin() && require_once(__DIR__ . '/admin.php') ) { m4is_mu8sx6::m4is_e5l8a9();
 } } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

