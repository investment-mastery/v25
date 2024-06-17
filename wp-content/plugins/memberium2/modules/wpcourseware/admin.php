<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_y29s08 { private $m4is_tu86mz;
 private $m4is_bnd6ti;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ju94();
 $this->m4is_ww61so();
 } private 
function m4is_ju94() : void { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_tu86mz = m4is_q1zh2::get_instance();
 } private 
function m4is_ww61so() { add_action( 'admin_init', [$this, 'm4is_s_xr5'] );
 add_action( 'memberium_admin_menu_addons', [$this, 'm4is_jcdzj'] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is_s1jxg5'], 10, 1 );
 }    public 
function m4is_jcdzj() { $m4is_don1 = 'manage_options';
 if ( ! current_user_can( $m4is_don1 ) ) { return;
 } $m4is_i6f5 = 'memberium';
 $m4is_qht8e = $m4is_don1;
 add_submenu_page( $m4is_i6f5, 'Memberium WP Courseware', 'WP Courseware', $m4is_don1, 'memberium-wpcw', [$this, 'm4is_w6vlh'] );
 } 
function m4is_w6vlh() { require_once __DIR__ . '/screens/wpcourseware.php';
 } 
function m4is_s1jxg5( $m4is_r1g2u ) { return array_merge( $m4is_r1g2u, [ 'WP-Courseware for Memberium Support' ] );
 }     public 
function m4is_s_xr5() { $m4is_a_hn = $this->m4is_tu86mz->m4is_xdun();
 $m4is_yzjhw = [ 'course_unit', ];
 if ( in_array( $m4is_a_hn, $m4is_yzjhw ) ) { add_meta_box( 'is4wp-wpcw-actions', 'WP Courseware Memberium Integration', [$this, 'm4is_mn_v'], $m4is_a_hn, 'side' );
 } add_action( 'admin_footer', [$this->m4is_tu86mz, 'm4is_lf31a4']);
 add_action( 'save_post', [$this, 'm4is_z_gu'] );
 }  public 
function m4is_mn_v() { global $post;
  $m4is_auhoe = get_post_meta( $post->ID );
 $m4is_p51e_l = [];
 $m4is_lja67 = [ '_is4wp_wpcw_completion_tag', ];
 foreach($m4is_lja67 as $m4is_s2ge5) { $m4is_p51e_l[$m4is_s2ge5] = isset($m4is_auhoe[$m4is_s2ge5][0]) ? $m4is_auhoe[$m4is_s2ge5][0] : '';
 } wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), "memberium_membershipaccess_nonce_{$post->ID}");
 if ( in_array( $post->post_type, ['course_unit'] ) ) { $m4is_unc_q = _e( 'Unit Completion Tag', 'memberium' );
 $m4is_w_o7al = empty( $m4is_p51e_l['_is4wp_wpcw_completion_tag'] ) ? '' : $m4is_p51e_l['_is4wp_wpcw_completion_tag'];
 echo <<<HTMLBLOCK
				<label for="_is4wp_wpcw_completion_tag">{$m4is_unc_q}:</label>
				<input name="_is4wp_wpcw_completion_tag" class="multitaglist" style="width:100%; max-width:100%" value="{$m4is_w_o7al}"><br /><br />';
			HTMLBLOCK;
 } } public 
function m4is_z_gu( $m4is_cd8k ) { if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return;
 } $m4is_egt6k = $_POST;
 if ( empty( $m4is_egt6k["memberium_membershipaccess_nonce_{$m4is_cd8k}"] ) || ! wp_verify_nonce( $m4is_egt6k["memberium_membershipaccess_nonce_{$m4is_cd8k}"], $this->m4is_bnd6ti->m4is_wdqrsb() ) ) { return;
 } if ( ! current_user_can( 'edit_posts', $m4is_cd8k ) ) { return;
 } $fieldnames = [ '_is4wp_wpcw_completion_tag', ];
 foreach( $fieldnames as $key ) { $m4is_egt6k[$key] = isset( $m4is_egt6k[$key] ) ? $m4is_egt6k[$key] : '';
 add_post_meta( $m4is_cd8k, $key, $m4is_egt6k[$key], true ) or update_post_meta( $m4is_cd8k, $key, $m4is_egt6k[$key] );
 } } }

