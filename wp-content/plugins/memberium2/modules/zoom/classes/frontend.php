<?php
/**
 * Copyright (c) 2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
  
class m4is__tluz_ { private $version;
 private $to_json = [];
  
function __construct($m4is_bu7y) { $this->version = $m4is_bu7y;
 }  
function frontend_scripts() { $m4is_g0wy = $this->version;
 $m4is__1jv = WPAL_ZOOM_URL . 'assets/';
 wp_register_script("wpal-zoom-js", "{$m4is__1jv}wpal-zoom.js", [], $m4is_g0wy);
 wp_register_style("wpal-zoom-css", "{$m4is__1jv}wpal-zoom.css", [], $m4is_g0wy, 'all');
 add_action("wp_footer", [$this, "frontend_footer"]);
 }  
function zoom_event_func( $m4is_qnjfv, $m4is_z50f, $m4is_mpia ){ m4is_aoxw::m4is_djr4nd();
 $m4is_qnjfv = shortcode_atts([ 'className' => '', 'id' => 0, 'password' => '', 'host' => 0 ], $m4is_qnjfv );
  $m4is_c2ens9 = $m4is_qnjfv['className'] > "" ? esc_attr($m4is_qnjfv['className']) : "";
 $m4is_c2ens9 = $m4is_c2ens9 > '' ? " {$m4is_c2ens9}" : "";
 $m4is_bq_t = 'wpal-zoom-meetings';
 $m4is_c2ens9 .= $m4is_c2ens9 > '' ? " {$m4is_bq_t}" : $m4is_bq_t;
  $m4is_j5sy07 = esc_attr($m4is_qnjfv['id']);
 $m4is_j5sy07 = $m4is_j5sy07 > '' ? (int)str_replace(' ', '', $m4is_j5sy07) : 0;
 $m4is_j485e = esc_attr($m4is_qnjfv['password']);
 $m4is_nymjfo = (int)esc_attr($m4is_qnjfv['host']);
 $m4is_smxn = 0;
  $m4is_hq15 = m4is_b1n6()->m4is_oiewvu('api_key');
 $m4is_ig9p6 = get_current_user_id();
 if( $m4is_j5sy07 < 1 ) { return $this->display_error(__('Zoom event ID is required.', 'wpal-zoom'));
 } else if( empty($m4is_j485e) ){ return $this->display_error(__('Zoom event password is required.', 'wpal-zoom'));
 } else if( empty($m4is_hq15) ){ return $this->display_error(__('Zoom api key is missing.', 'wpal-zoom'));
 }  if( (int)$m4is_ig9p6 < 1 ){ return $this->display_error(__('You must be logged in to join this event.', 'wpal-zoom'));
 } else { $m4is_mhv_pw = get_userdata( $m4is_ig9p6 );
 $m4is_mp8mg = trim("{$m4is_mhv_pw->first_name} {$m4is_mhv_pw->last_name}");
 $m4is_n10t = strtolower($m4is_mhv_pw->user_email);
 $m4is_smxn = ( $m4is_nymjfo > 0 && $m4is_nymjfo === $m4is_ig9p6 ) ? 1 : 0;
 }  $m4is_rmd6 = 'wpal-zoom-iframe';
 $m4is_rdo4 = WPAL_ZOOM_URL . 'templates/zoom-frame.html';
  $m4is_tjg_9 = "<div id=\"{$m4is_bq_t}\" class=\"{$m4is_c2ens9}\">";
 $m4is_tjg_9 .= "<iframe id=\"{$m4is_rmd6}\" data-src=\"{$m4is_rdo4}\" allowfullscreen></iframe>";
 $m4is_tjg_9 .= "</div>";
  $this->set_to_json('zoom_meeting', [ 'frameId' => $m4is_rmd6, 'buttonId' => 'wpal-start-event', 'eventID' => $m4is_j5sy07, 'leaveUrl' => $m4is_rdo4, 'passWord' => $m4is_j485e, 'apiKey' => $m4is_hq15, 'userName' => $m4is_mp8mg, 'userEmail' => $m4is_n10t, 'role' => $m4is_smxn, 'signature' => m4is_b1n6()->api()->m4is_bvwhl($m4is_j5sy07, $m4is_smxn) ]);
 return $m4is_tjg_9;
 }  
function display_error($m4is_jadl06){ $m4is_tjg_9 = "<div class=\"wpal-zoom-error\">";
 $m4is_tjg_9 .= "<p>{$m4is_jadl06}</p>";
 $m4is_tjg_9 .= "</div>";
 return $m4is_tjg_9;
 }  
function frontend_footer() { $m4is_jkodw = $this->get_to_json();
 if( !empty($m4is_jkodw) ){ $m4is_ig9p6 = get_current_user_id();
 $m4is_jkodw['user_id'] = $m4is_ig9p6;
 if( isset($m4is_jkodw['zoom_meeting']) ){ wp_enqueue_style('wpal-zoom-css');
 wp_enqueue_script('wpal-zoom-js');
 wp_localize_script('wpal-zoom-js', 'wpal_zoom_data', $m4is_jkodw);
 } } }  
function set_to_json($m4is_s2ge5, $m4is_w_o7al = false) { if ($m4is_w_o7al) { $this->to_json[$m4is_s2ge5] = $m4is_w_o7al;
 } else { unset($this->to_json[$m4is_s2ge5]);
 } }  
function get_to_json($m4is_s2ge5 = false) { if ($m4is_s2ge5) { return (isset($this->to_json[$m4is_s2ge5])) ? $this->to_json[$m4is_s2ge5] : null;
 } else { return $this->to_json;
 } } }

