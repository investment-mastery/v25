<?php
/**
 * Copyright (c) 2021-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_t2cd' ) || die();
 final 
class m4is_j5s0l { private $m4is_tu86mz;
 private $m4is_bnd6ti;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_x6wv();
 $this->m4is_ww61so();
 } 
function m4is_ww61so() { add_action( 'admin_init', [$this, 'm4is_hq97k'] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_tu86mz = m4is_q1zh2::get_instance();
 } private 
function m4is_y1n5z2() : array { return [ '_memberium_gamipress_badge_add', '_memberium_gamipress_rank_add', '_memberium_gamipress_tag_add', ];
 } private 
function m4is_vyzw2() : array { global $wpdb;
 $m4is_cx_zt = [];
  $m4is_tovizk = "SELECT `ID` as `id`, `post_title` as `name` FROM `{$wpdb->posts}` WHERE `post_status` = 'publish' AND `post_type` IN (SELECT `post_name` FROM `{$wpdb->posts}` WHERE `post_type` = 'achievement-type' AND `post_status` = 'publish'); ";
 $rows = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 foreach ($rows as $row) { $m4is_cx_zt[$row['id']] = $row['name'];
 } return $m4is_cx_zt;
 } private 
function m4is_i56s9v() { global $wpdb;
 $m4is_c2kt = [];
  $m4is_tovizk = "SELECT `ID` as `id`, `post_title` as `name` FROM `{$wpdb->posts}` WHERE `post_status` = 'publish' AND `post_type` IN (SELECT `post_name` FROM `{$wpdb->posts}` WHERE `post_type` = 'rank-type' AND `post_status` = 'publish'); ";
 $rows = $wpdb->get_results($m4is_tovizk, ARRAY_A);
 foreach ($rows as $row) { $m4is_c2kt[$row['id']] = $row['name'];
 } return $m4is_c2kt;
 } private 
function m4is_tj4vd() { $m4is_k4yeul = [ 'fields' => 'ids', 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'ID', 'post_status' => 'publish', 'post_type' => gamipress_get_achievement_types_slugs(),  ];
 $m4is_lyrv = get_posts( $m4is_k4yeul );
 $m4is_l106 = '_memberium_gamipress_badge_add';
 $m4is_byioc = 'memberium/gamipress/assign_by_tag';
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3, false );
 $m4is_l106 = '_memberium_gamipress_tag_add';
 $m4is_byioc = 'memberium/gamipress/tag_by_badge';
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3, false );
 $m4is_k4yeul = [ 'fields' => 'ids', 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'ID', 'post_status' => 'publish', 'post_type' => gamipress_get_rank_types_slugs(),  ];
 $m4is_l106 = '_memberium_gamipress_tag_add';
 $m4is_byioc = 'memberium/gamipress/rank/tag_by_rank';
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3, false );
 $m4is_l106 = '_memberium_gamipress_rank_add';
 $m4is_byioc = 'memberium/gamipress/rank/rank_by_tag';
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3, false );
 } private 
function m4is_pd8t() { $m4is_k4yeul = [ 'fields' => 'ids', 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'ID', 'post_status' => 'publish', 'post_type' => gamipress_get_rank_types_slugs(),  ];
 $m4is_lyrv = get_posts( $m4is_k4yeul );
 $m4is_l106 = '_memberium_gamipress_tag_add';
 $m4is_byioc = 'memberium/gamipress/rank/tag_by_rank';
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3 );
 $m4is_l106 = '_memberium_gamipress_rank_add';
 $m4is_byioc = 'memberium/gamipress/rank/rank_by_tag';
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3 );
 }    
function m4is_s1jxg5( array $m4is_r1g2u ) : array { return array_merge( $m4is_r1g2u, ['GamiPress for Keap'] );
 }    
function m4is_hq97k() { $m4is_vfyva = [ 'gamipress_get_achievement_types_slugs', 'gamipress_get_rank_types_slugs', ];
 foreach( $m4is_vfyva as $m4is_j8ih ) { if ( ! function_exists( $m4is_j8ih ) ) { return;
 } } $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
 $m4is_hz57vk = gamipress_get_achievement_types_slugs();
 $m4is_zxgv = gamipress_get_rank_types_slugs();
 $m4is_d9dsb = apply_filters( 'memberium/lms/module_post_types', [] );
 if ( in_array( $m4is_a_hn, $m4is_hz57vk ) ) { add_meta_box( 'memberium-gamipress-achievements', 'Memberium for GamiPress', [$this, 'm4is_p2x5zt'], $m4is_a_hn, 'side' );
 } if ( in_array( $m4is_a_hn, $m4is_zxgv ) ) { add_meta_box( 'memberium-gamipress-ranks', 'Memberium for GamiPress', [$this, 'm4is_etya32'], $m4is_a_hn, 'side' );
 } if ( in_array( $m4is_a_hn, $m4is_d9dsb ) ) { $m4is_em5b = apply_filters( 'memberium/lms/name', 'LMS' );
 add_meta_box( 'memberium-lms-achievements', "GamiPress for {$m4is_em5b}", [$this, 'm4is_pvd1_b'], $m4is_a_hn, 'side' );
 } add_action( 'save_post', [$this, 'm4is_lw3m5y'], 10, 3 );
 add_action( 'save_post', [$this, 'm4is_olq8e1'], 10, 3 );
 add_action( 'save_post', [$this, 'm4is_hkw4yv'], 10, 3 );
 }     public 
function m4is_etya32( WP_Post $m4is_c2ah ) : void { $m4is_cd8k = $m4is_c2ah->ID;
 $m4is_izrx = get_post_meta( $m4is_cd8k, '_memberium_gamipress_tag_add', true );
 $m4is_k0pkxm = get_post_meta( $m4is_cd8k, '_memberium_gamipress_rank_add', true );
 $m4is_g5whlt = wp_nonce_field( __FILE__, "memberium_gamipress_nonce_{$m4is_cd8k}", true, false );
 $m4is_izrx = empty( $m4is_izrx ) ? 0 : $m4is_izrx;
 $m4is_k0pkxm = empty( $m4is_k0pkxm ) ? 0 : $m4is_k0pkxm;
 $m4is_hn7td = __( 'Add Tag if Member has Rank', 'memberium' );
 $m4is_hwfgc = __( 'Add Rank if Member has Tag', 'memberium' );
 echo <<<HTMLBLOCK
			{$m4is_g5whlt}
			<label for="_memberium_gamipress_tag_add">
				{$m4is_hn7td}:
			</label>
			<input name="_memberium_gamipress_tag_add" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_izrx}">
			<br /><br />

			<label for="_memberium_gamipress_rank_add">
				{$m4is_hwfgc}:
			</label>
			<input name="_memberium_gamipress_rank_add" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_k0pkxm}">
			<br />
			<br />
		HTMLBLOCK;
 do_action( 'memberium/gamipress/rank_metabox' );
 } public 
function m4is_olq8e1( int $m4is_cd8k, WP_Post $m4is_c2ah, bool $m4is_wlqsgr ) : void { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium_gamipress_nonce_{$m4is_cd8k}", __FILE__ ) ) { return;
 } $m4is_flx71n = $this->m4is_y1n5z2();
 $m4is_zxgv = gamipress_get_rank_types_slugs();
 $this->m4is_tu86mz->m4is_sgi5( $m4is_cd8k, $m4is_flx71n, $_POST );
 $this->m4is_pd8t();
 }     public 
function m4is_p2x5zt( WP_Post $m4is_c2ah ) : void { $m4is_cd8k = $m4is_c2ah->ID;
 $m4is_ite9u = get_post_meta( $m4is_cd8k, '_memberium_gamipress_badge_add', true );
 $m4is_izrx = get_post_meta( $m4is_cd8k, '_memberium_gamipress_tag_add', true );
 $m4is_g5whlt = wp_nonce_field( MEMBERIUM_SKU, "memberium_gamipress_nonce_{$m4is_cd8k}", true, false );
 $m4is_ite9u = empty( $m4is_ite9u ) ? 0 : $m4is_ite9u;
 $m4is_izrx = empty( $m4is_izrx ) ? 0 : $m4is_izrx;
 $m4is_a3ip_b = __( 'Add Badge if Member has Tag', 'memberium' );
 $m4is_hn7td = __( 'Add Tag if Member has Badge', 'memberium' );
 echo <<<HTMLBLOCK
			{$m4is_g5whlt}
			<label for="_memberium_gamipress_badge_add">
				{$m4is_a3ip_b}:
			</label>
			<input name="_memberium_gamipress_badge_add" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_ite9u}">
			<br /><br />

			<label for="_memberium_gamipress_tag_add">
				{$m4is_hn7td}:
			</label>
			<input name="_memberium_gamipress_tag_add" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_izrx}">
			<br /><br />
		HTMLBLOCK;
 do_action('memberium/gamipress/achievement_metabox');
 } public 
function m4is_lw3m5y( int $m4is_cd8k, WP_Post $m4is_c2ah, bool $m4is_wlqsgr ) : void { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium_gamipress_nonce_{$m4is_cd8k}", MEMBERIUM_SKU ) ) { return;
 } $m4is_flx71n = $this->m4is_y1n5z2();
 $m4is_hz57vk = gamipress_get_achievement_types_slugs();
 foreach ( $m4is_flx71n as $m4is_s2ge5 ) { if ( isset( $_POST[$m4is_s2ge5] ) ) { if ( empty( $_POST[$m4is_s2ge5] ) ) { delete_post_meta( $m4is_cd8k, $m4is_s2ge5 );
 } else { update_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5] );
 } } }  $this->m4is_tj4vd();
 }     public 
function m4is_pvd1_b( WP_Post $m4is_c2ah ) { $m4is_cd8k = $m4is_cd8k;
 $m4is_s2ge5 = '_is4wp_learndash_achievement';
 $m4is_p51e_l = get_post_meta( $m4is_cd8k, $m4is_s2ge5, true );
 $m4is_p51e_l = empty( $m4is_p51e_l ) ? 0 : $m4is_p51e_l;
 $m4is_cx_zt = $this->m4is_vyzw2();
 $m4is_gsnlq7 = get_post_type_object( $m4is_c2ah->post_type )->labels->singular_name;
 $m4is_g5whlt = wp_nonce_field( MEMBERIUM_SKU, "memberium_gamipress_lms_nonce_{$post->ID}", true, false );
 $m4is_icaxzf = '';
 $m4is_a3ip_b = __( 'Add Badge on Completion of', 'memberium' );
 foreach ($m4is_cx_zt as $m4is_j5sy07 => $m4is_t5ot4) { $m4is_xnwj4 = ($m4is_p51e_l == $m4is_j5sy07) ? ' selected="selected" ' : '';
 $m4is_icaxzf = "<option value='{$m4is_j5sy07}' {$m4is_xnwj4}>{$m4is_t5ot4}</option>";
 } echo <<<HTMLBLOCK
			{$m4is_g5whlt}
			<label for="{$m4is_s2ge5}">
				{$m4is_a3ip_b} {$m4is_gsnlq7}:
			</label>
			<select class="actionset-selector" name="{$m4is_s2ge5}" style="width:100%; max-width:100%">
				<option value="0">(No Achievement)</option>
				{$m4is_icaxzf}
			</select>
			<br /><br />
		HTMLBLOCK;
 do_action('memberium/gamipress/achievement_metabox');
 } public 
function m4is_hkw4yv( int $m4is_cd8k, WP_Post $m4is_c2ah, bool $m4is_wlqsgr ) : void { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium_gamipress_lms_nonce_{$m4is_cd8k}", MEMBERIUM_SKU ) ) { return;
 } $m4is_flx71n = [ '_is4wp_learndash_achievement', ];
 foreach ( $m4is_flx71n as $m4is_s2ge5 ) { if ( isset( $_POST[$m4is_s2ge5] ) ) { if ( empty($_POST[$m4is_s2ge5] ) ) { delete_post_meta( $m4is_cd8k, $m4is_s2ge5 );
 } else { update_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5] );
 } } } } }

