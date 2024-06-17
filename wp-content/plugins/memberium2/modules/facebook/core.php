<?php
/**
 * Copyright (c) 2021-2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_hdrzb7 { private 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() { if (is_admin() ) { m4is_en2tq::m4is_e5l8a9();
 } else { $this->m4is_ljhm();
 add_action('wp_head', [$this, 'm4is_oce7']);
 } } 
function m4is_oce7() { $m4is_x6mds = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'facebook_app_id');
 if (! empty($m4is_x6mds) ) { echo '
			<script>
				window.fbAsyncInit = function() {
				FB.init({
					appId            : \'' . $m4is_x6mds . '\',
					autoLogAppEvents : true,
					xfbml            : true,
					version          : \'v4.0\'
				});
				};
			</script>
			<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
			';
 } } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function m4is_ljhm() { $m4is_nz3t = 'm4is_bzvmwb';
 add_shortcode('memb_fb_comments', [$m4is_nz3t, 'm4is_pntk'] );
 add_shortcode('memb_fb_embed_comment', [$m4is_nz3t, 'm4is_s153_l'] );
 add_shortcode('memb_fb_follow', [$m4is_nz3t, 'm4is_xsdjr'] );
 add_shortcode('memb_fb_like', [$m4is_nz3t, 'm4is_s0smo'] );
 add_shortcode('memb_fb_page', [$m4is_nz3t, 'm4is_hre5k'] );
 add_shortcode('memb_fb_save_button', [$m4is_nz3t, 'm4is_k8x6j'] );
 add_shortcode('memb_fb_send', [$m4is_nz3t, 'm4is_o2wlr0'] );
 add_shortcode('memb_fb_share', [$m4is_nz3t, 'm4is_wztlbm'] );
 add_shortcode('memb_fb_video', [$m4is_nz3t, 'm4is__5_aw'] );
 } private 
function get_app_id() { if ($this->app_id === false) { $this->app_id = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'facebook_app_id');
 } return $this->app_id;
 } }

