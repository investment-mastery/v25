<?php
/**
 * Copyright (c) 2021-2022 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_c5_vi { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() {  add_action( 'esig_display_right_sidebar', [$this, 'm4is_wpy63'], 10 );
 add_action( 'esig_document_after_save', [$this, 'm4is_rq5ld'] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is__q42k'], 10, 1 );
 add_filter( 'memberium/enhanced_admin_scripts', [$this, 'm4is_hh6o9'] );
 } 
function m4is__q42k( $m4is_r1g2u = [] ) { return array_merge( $m4is_r1g2u, ['WP E-Signature for Memberium'] );
 } 
function m4is_kxub8() { return [ 'esign', ];
 } 
function m4is_wpy63( $m4is_etj2 = '' ) { $m4is_g1oq = isset( $_GET['document_id'] ) ? $_GET['document_id'] : 0;
 $m4is_ws29 = "memberium_esignature_nonce_{$m4is_g1oq}";
 $m4is_osi9 = WP_E_Sig()->meta->get( $m4is_g1oq, '_is4wp_esignature_tags' );
 $m4is_tu86mz = m4is_q1zh2::get_instance();
 $m4is_swtx = wp_nonce_field( __FILE__, $m4is_ws29, true, false);
 $m4is_xhro8 = $m4is_osi9 > '' ? $m4is_osi9 : '';
 $m4is_uzfw8j .= '<div class="postbox esign-form-panel">';
 $m4is_uzfw8j .= '<h3 class="esig-section-title" style="padding-left:0">Memberium Integration</h3>';
 $m4is_uzfw8j .= '<div class="esig-inside">';
 $m4is_uzfw8j .= $m4is_swtx;
 $m4is_uzfw8j .= '<label for="_is4wp_esignature_tags">Add Tag when signed:</label>';
 $m4is_uzfw8j .= '<input value="' . $m4is_xhro8 . '" name="_is4wp_esignature_tags" class="multitaglist" style="width:95%; max-width:95%"><br /><br />';
 $m4is_uzfw8j .= '</div>';
 $m4is_uzfw8j .= '</div>';
 add_action( 'admin_footer', [$m4is_tu86mz, 'm4is_lf31a4'] );
 echo $m4is_uzfw8j;
 return $m4is_etj2;
 } 
function m4is_rq5ld( $m4is_rnqg ) {  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return;
 } $m4is_g1oq = isset($m4is_rnqg['document']->document_id) ? $m4is_rnqg['document']->document_id : 0;
 $m4is_ws29 = "memberium_esignature_nonce_{$m4is_g1oq}";
 if ( empty( $_POST[$m4is_ws29] ) || ! wp_verify_nonce( $_POST[$m4is_ws29], __FILE__ ) ) { return;
 }  $m4is_lja67 = [ '_is4wp_esignature_tags', ];
 foreach( $m4is_lja67 as $m4is_s2ge5 ) { $_POST[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? $_POST[$m4is_s2ge5] : '';
 if (empty($_POST[$m4is_s2ge5])) { WP_E_Sig()->meta->delete($m4is_g1oq,$m4is_s2ge5);
 } else { WP_E_Sig()->meta->add($m4is_g1oq, $m4is_s2ge5, $_POST[$m4is_s2ge5]) or WP_E_Sig()->meta->update($m4is_g1oq, $m4is_s2ge5, $_POST[$m4is_s2ge5]);
 } } } 
function m4is_hh6o9($m4is_afnh) { $m4is_afnh[] = 'admin_page_esign-edit-document';
 return $m4is_afnh;
 } }

