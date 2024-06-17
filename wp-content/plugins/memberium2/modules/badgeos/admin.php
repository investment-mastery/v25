<?php
/**
 * Copyright (c) 2021-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_dgyr { private $m4is_tu86mz;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_tu86mz = m4is_q1zh2::get_instance();
 $this->m4is_ww61so();
 }  private 
function m4is_ww61so() : void { add_action( 'admin_init', [$this, 'm4is_hq97k'] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 }    public 
function m4is_s1jxg5( array $m4is_r1g2u ) : array { return array_merge( $m4is_r1g2u, [ 'BadgeOS for Memberium Integration' ] );
 }    public 
function m4is_hq97k() : void { $m4is_vfyva = [ 'badgeos_get_achievement_types_slugs', 'badgeos_get_rank_types_slugs', ];
 foreach( $m4is_vfyva as $m4is_j8ih ) { if ( ! function_exists( $m4is_j8ih ) ) { return;
 } } $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
 $m4is_hz57vk = badgeos_get_achievement_types_slugs();
 $m4is_zxgv = badgeos_get_rank_types_slugs();
 $m4is_d9dsb = apply_filters( 'memberium/lms/module_post_types', [] );
 $m4is_em5b = apply_filters( 'memberium/lms/name', 'LMS' );
 if ( in_array( $m4is_a_hn, $m4is_hz57vk ) ) { add_meta_box( 'memberium-badgeos-achievements', 'BadgeOS for Memberium', [$this, 'm4is_p2x5zt'], $m4is_a_hn, 'side' );
 } if ( in_array( $m4is_a_hn, $m4is_zxgv ) ) { add_meta_box( 'memberium-badgeos-ranks', 'BadgeOS for Memberium', [$this, 'm4is_etya32'], $m4is_a_hn, 'side' );
 } if ( in_array( $m4is_a_hn, $m4is_d9dsb ) ) { add_meta_box( 'memberium-lms-achievements', "BadgeOS for {$m4is_em5b}", [$this, 'm4is_pvd1_b'], $m4is_a_hn, 'side' );
 } if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { add_action( 'save_post', [$this, 'm4is_hkw4yv'], 10, 3 );
 if ( isset( $_POST['post_type'] ) && in_array( $_POST['post_type'], $m4is_hz57vk ) ) { add_action( 'save_post', [$this, 'm4is_lw3m5y'] );
 } if ( isset( $_POST['post_type'] ) && in_array( $_POST['post_type'], $m4is_zxgv ) ) { add_action( 'save_post', [$this, 'm4is_olq8e1'] );
 } } }     public 
function m4is_etya32( WP_Post $m4is_c2ah ) : void { $m4is_g5whlt = wp_nonce_field( MEMBERIUM_SKU, "memberium/badgeos/tag_map/{$m4is_c2ah->ID}", true, false );
 $m4is_izrx = get_post_meta( $m4is_c2ah->ID, '_memberium_badgeos_tag_add', true );
 $m4is_izrx = empty( $m4is_izrx ) ? 0 : $m4is_izrx;
 $m4is_bha1i4 = __( 'Add Tag if member has Badge', 'memberium' );
  echo <<<HTMLBLOCK
			{$m4is_g5whlt}
			<label for  = "_memberium_badgeos_tag_add">{$m4is_bha1i4}:</label>
			<input name = "_memberium_badgeos_tag_add" class = "taglistdropdown" style = "width:100%; max-width:100%" value = "{$m4is_izrx}"><br /><br />';
		HTMLBLOCK;
 do_action( 'memberium/badgeos/rank_metabox' );
 }  public 
function m4is_olq8e1( int $m4is_cd8k, $m4is_c2ah, $m4is_wlqsgr ) : void { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium/badgeos/tag_map/{$m4is_cd8k}", MEMBERIUM_SKU ) ) { return;
 } $m4is_flx71n = [ '_memberium_badgeos_rank_add', '_memberium_badgeos_tag_add', ];
 $this->m4is_tu86mz->m4is_sgi5( $m4is_cd8k, $m4is_flx71n, $_POST );
  $this->m4is_pd8t();
 }    public 
function m4is_p2x5zt( WP_Post $m4is_c2ah ) { global $post;
 $m4is_swtx = wp_nonce_field( MEMBERIUM_SKU, "memberium/badgeos/tag_map/{$m4is_c2ah->ID}", true, false );
 $m4is_ite9u = get_post_meta( $m4is_c2ah->ID, '_memberium_badgeos_badge_add', true );
 $m4is_ite9u = empty( $m4is_ite9u ) ? 0 : $m4is_ite9u;
 $m4is_swdav = __( 'Add Badge if Member has Tag', 'memberium' );
 $m4is_izrx = get_post_meta( $m4is_c2ah->ID, '_memberium_badgeos_tag_add', true );
 $m4is_izrx = empty( $m4is_izrx ) ? 0 : $m4is_izrx;
 $m4is_bha1i4 = __( 'Add Tag if Member has Badge', 'memberium' );
 echo <<<HTMLDOCK
			{$m4is_swtx}
			<label for="_memberium_badgeos_badge_add">{$m4is_swdav}:</label>
			<input name="_memberium_badgeos_badge_add" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_ite9u}"><br /><br />

			<label for="_memberium_badgeos_tag_add">{$m4is_bha1i4}:</label>
			<input name="_memberium_badgeos_tag_add" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_izrx}"><br /><br />
		HTMLDOCK;
 do_action('memberium/badgeos/achievement_metabox');
 }  public 
function m4is_lw3m5y( int $m4is_cd8k , $m4is_c2ah, $m4is_wlqsgr) : void { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium/badgeos/tag_map/{$m4is_cd8k}", MEMBERIUM_SKU ) ) { return;
 } $m4is_flx71n = [ '_memberium_badgeos_badge_add', '_memberium_badgeos_tag_add', ];
 $this->m4is_tu86mz->m4is_sgi5( $m4is_cd8k, $m4is_flx71n, $_POST );
  $this->m4is_tj4vd();
 }     public 
function m4is_pvd1_b( WP_Post $m4is_c2ah ) : void { global $post;
 $m4is_s2ge5 = '_is4wp_learndash_achievement';
 $m4is_g5whlt = wp_nonce_field( MEMBERIUM_SKU, "memberium_badgeos_lms_nonce_{$m4is_c2ah->ID}", true, false );
 $m4is_p51e_l = get_post_meta( $m4is_c2ah->ID, $m4is_s2ge5, true );
 $m4is_p51e_l = empty( $m4is_p51e_l ) ? 0 : $m4is_p51e_l;
 $m4is_gsnlq7 = get_post_type_object( $m4is_c2ah->post_type )->labels->singular_name;
 $m4is_swdav = __('Add Badge on Completion of ', 'memberium');
 $m4is_cx_zt = $this->m4is_fhuex();
 $m4is_icaxzf = '';
 if ( is_array( $m4is_cx_zt ) ) { foreach ( $m4is_cx_zt as $m4is_j5sy07 => $m4is_t5ot4 ) { $m4is_xnwj4 = $m4is_p51e_l == $m4is_j5sy07 ? ' selected="selected" ' : '';
 $m4is_icaxzf .= "<option value='{$m4is_j5sy07}' {$m4is_xnwj4}>{$m4is_t5ot4}</option>";
 } } echo <<<HTMLBLOCK
			<label for='{$m4is_s2ge5}'>
				{$m4is_swdav} {$m4is_gsnlq7}:
			</label>
			<select class="actionset-selector" name="{$m4is_s2ge5}" style="width:100%; max-width:100%">
				<option value="0">(No Achievement)</option>
				{$m4is_icaxzf}
			</select>
			<br />
			<br />
		HTMLBLOCK;
 do_action( 'memberium/badgeos/achievement_metabox' );
 }  public 
function m4is_hkw4yv( int $m4is_cd8k, $m4is_c2ah, $m4is_wlqsgr ) { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium_badgeos_lms_nonce_{$m4is_cd8k}", MEMBERIUM_SKU ) ) { return;
 } $m4is_flx71n = [ '_is4wp_learndash_achievement', ];
 $this->m4is_tu86mz->m4is_sgi5( $m4is_cd8k, $m4is_flx71n, $_POST );
 }     private 
function m4is_fhuex() : array { global $wpdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `ID` as `id`, `post_title` as `name` FROM %i WHERE `post_status` = 'publish' AND `post_type` IN ( SELECT `post_name` FROM %i WHERE `post_type` = 'achievement-type' AND `post_status` = 'publish' ) )", $wpdb->posts, $wpdb->posts );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 $m4is_cx_zt = [];
 foreach ( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_cx_zt[$m4is_ke_fr['id']] = $m4is_ke_fr['name'];
 } return $m4is_cx_zt;
 }  private 
function m4is_tj4vd() { $m4is_l106 = '_memberium_badgeos_badge_add';
 $m4is_byioc = 'memberium/badgeos/assign_by_tag';
 $m4is_ueuy = 'memberium/badgeos/tag_by_badge';
 $m4is_tomnt3 = [];
 $m4is_k4yeul = [ 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'ID', 'post_status' => 'publish', 'post_type' => badgeos_get_achievement_types_slugs(), 'fields' => 'ids', ];
 $m4is_lyrv = get_posts( $m4is_k4yeul );
 foreach ( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3 );
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_ueuy, $m4is_tomnt3 );
 }  private 
function m4is_pd8t() { $m4is_l106 = '_memberium_badgeos_rank_add';
  $m4is_byioc = 'memberium/badgeos/tag_by_rank';
 $m4is_tomnt3 = [];
 $m4is_k4yeul = [ 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'ID', 'post_status' => 'publish', 'post_type' => badgeos_get_rank_types_slugs(), 'fields' => 'ids', ];
 $m4is_lyrv = get_posts( $m4is_k4yeul );
 $m4is_tomnt3 = [];
 foreach( $m4is_lyrv as $m4is_j5sy07 ) { $m4is_mpia = get_post_meta( $m4is_j5sy07, $m4is_l106, true );
 if ( $m4is_mpia ) { $m4is_tomnt3[$m4is_j5sy07] = $m4is_mpia;
 } } update_option( $m4is_byioc, $m4is_tomnt3 );
  } }

