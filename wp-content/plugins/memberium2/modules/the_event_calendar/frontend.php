<?php
/**
 * Copyright (c) 2012-2019 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_pou6l2 { 
function m4is_fbn13t($m4is_d71ub, $m4is_xdobe_, $m4is_uzfw8j, $m4is_a51ew) { if (is_null($m4is_d71ub) ) { $m4is_uqn1at = is_a($m4is_xdobe_, 'WP_Post') ? $m4is_xdobe_->ID : (int) $m4is_xdobe_;
 $m4is_d71ub = m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o($m4is_uqn1at) ? $m4is_d71ub : false;
 } return $m4is_d71ub;
 } private 
function m4is_ww61so() { add_filter('tribe_get_event_before', [$this, 'm4is_fbn13t'], 1, 4);
 } private 
function __construct() { $this->m4is_ww61so();
 } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

