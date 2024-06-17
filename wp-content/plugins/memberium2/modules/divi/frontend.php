<?php
/**
 * Copyright (c) 2018-2022 David J Bullock
 * Web Power and Light
*/

 class_exists('m4is_pms8y') || die();
  
class m4is_gby10{ private $pre_render_tags = [];
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self();
 } private 
function __construct() { $m4is_le5bk = ['et_pb_tab'];
 $this->pre_render_tags = (array) apply_filters( 'wpal/blocks/divi/pre_render_tags', $m4is_le5bk );
 } 
function m4is_x6wv() { add_filter( 'do_shortcode_tag', [$this, 'm4is_x6mvw'], PHP_INT_MAX, 3 );
 add_action( 'et_builder_module_loaded', [$this, 'm4is_vn6g9'], PHP_INT_MAX, 2 );
 $this->m4is_b8hdfn();
 }  
function m4is_x6mvw( $m4is_uzfw8j, $m4is_mpia, $m4is_qnjfv ){ return $this->m4is__2vz( (array) $m4is_qnjfv) ? $m4is_uzfw8j : '';
 }  
function m4is__2vz( array $m4is_x2y8 ) : bool { $m4is_cwkrz = m4is_jf8abu::PREFIX;
 $m4is_qh8p6 = [];
  if ( is_array( $m4is_x2y8 ) ) { foreach ( $m4is_x2y8 as $m4is_t5ot4 => $m4is_w_o7al ) { if ( strpos( $m4is_t5ot4, "{$m4is_cwkrz}_membership_levels" ) !== false && $m4is_w_o7al === 'on' ) { $m4is_qh8p6[] = (int) str_replace( "{$m4is_cwkrz}_membership_levels-", '', $m4is_t5ot4 );
 } } } $m4is_gqid = [ 'memberships' => implode( ',', array_filter( $m4is_qh8p6 ) ), 'any_membership' => isset( $m4is_x2y8["{$m4is_cwkrz}_anymembership"] ) && $m4is_x2y8["{$m4is_cwkrz}_anymembership"] === 'on' ? 1 : 0, 'logged_in_only' => isset( $m4is_x2y8["{$m4is_cwkrz}_loggedin"] ) && $m4is_x2y8["{$m4is_cwkrz}_loggedin"] === 'on' ? 1 : 0, 'logged_out_only' => isset( $m4is_x2y8["{$m4is_cwkrz}_anonymous_only"] ) && $m4is_x2y8["{$m4is_cwkrz}_anonymous_only"] === 'on' ? 1 : 0, 'invert_results' => isset( $m4is_x2y8["{$m4is_cwkrz}_invert_results"] ) && $m4is_x2y8["{$m4is_cwkrz}_invert_results"] === 'on' ? 1 : 0, 'contact_ids' => empty( $m4is_x2y8["{$m4is_cwkrz}_contact_ids"] ) ? '' : sanitize_text_field( $m4is_x2y8["{$m4is_cwkrz}_contact_ids"] ), 'tags1' => empty( $m4is_x2y8["{$m4is_cwkrz}_access_tags"] ) ? '' : $m4is_x2y8["{$m4is_cwkrz}_access_tags"], 'tags2' => empty( $m4is_x2y8["{$m4is_cwkrz}_access_tags2"] ) ? '' : $m4is_x2y8["{$m4is_cwkrz}_access_tags2"], 'eval' => empty( $m4is_x2y8["{$m4is_cwkrz}_eval"] ) ? '' : trim( $m4is_x2y8["{$m4is_cwkrz}_eval"] ), 'asset_id' => empty( $m4is_x2y8["{$m4is_cwkrz}_asset_id"] ) ? '' : sanitize_text_field( $m4is_x2y8["{$m4is_cwkrz}_asset_id"] ), ];
 if ( ! empty( $m4is_gqid['eval'] ) ) { $m4is_e21lu7 = [ '%91' => '[', '%93' => ']' ];
 $m4is_gqid['eval'] = strtr( $m4is_gqid['eval'], $m4is_e21lu7 );
 } return m4is_jf8abu::m4is_e5l8a9()->m4is_g37u()->m4is_gz5hgo( $m4is_gqid, 'divi' );
 }     
function m4is_b8hdfn(){ global $shortcode_tags;
 $m4is_zxag3_ = [];
 foreach ( $shortcode_tags as $m4is_mpia => $m4is_d4u9q ) { if ( is_array( $m4is_d4u9q ) ) { if ( $m4is_d4u9q[0] instanceof ET_Builder_Element || $m4is_d4u9q[0] instanceof ET_Builder_Module ) { if( $this->m4is_x_jhu7( $m4is_mpia ) ) { $m4is_zxag3_[$m4is_mpia] = $m4is_d4u9q;
 remove_shortcode( $m4is_mpia, $m4is_d4u9q );
 } } } } if ( ! empty( $m4is_zxag3_ ) ) { foreach ($m4is_zxag3_ as $m4is_mpia => $m4is_d4u9q) { $m4is_jcqzm = $m4is_d4u9q[0];
 $m4is_le129 = $m4is_d4u9q[1];
 add_shortcode( $m4is_mpia, function( $m4is_qnjfv, $m4is_z50f, $m4is_ixh6 ) use ( $m4is_jcqzm, $m4is_le129 ) { $m4is_oa_z = '';
 if ( $this->m4is__2vz( $m4is_qnjfv ) ) { $m4is_oa_z = $m4is_jcqzm->$m4is_le129($m4is_qnjfv, $m4is_z50f, $m4is_ixh6);
 } return $m4is_oa_z;
  } );
 } } }  
function m4is_vn6g9( $m4is_mpia, $m4is_xx25wq ){ if( $this->m4is_x_jhu7( $m4is_mpia ) ) { remove_shortcode( $m4is_mpia, $m4is_xx25wq );
 add_shortcode( $m4is_mpia, function( $m4is_qnjfv, $m4is_z50f, $m4is_ixh6 ) use ( $m4is_xx25wq ) { $m4is_oa_z = '';
 if( $this->m4is__2vz( $m4is_qnjfv ) ){ $m4is_oa_z = $m4is_xx25wq['instance']->_render( $m4is_qnjfv, $m4is_z50f, $m4is_ixh6 );
 } return $m4is_oa_z;
 } );
 } } 
function m4is_x_jhu7( $m4is_mpia ){ if( ! empty($this->pre_render_tags) && is_array($this->pre_render_tags) ){ return in_array($m4is_mpia, $this->pre_render_tags);
 } else { return false;
 } } }

