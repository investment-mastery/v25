<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_op7f3u' ) || die();
 final 
class m4is_dvte { private $m4is_tu86mz;
 private $m4is_ns2ch;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { add_action( 'admin_init', [$this, 'm4is_ju94'] );
 add_action( 'admin_init', [$this, 'm4is_bjsf'] );
 } 
function m4is_ju94() { $this->elf_edd_core = m4is_op7f3u::m4is_e5l8a9();
 $this->m4is_tu86mz = m4is_q1zh2::get_instance();
 }    
function m4is_bjsf() { add_meta_box( 'memberium\edd\actions','Memberium for EDD', [$this, 'm4is_cpn2'], 'download', 'side' );
 add_action( 'save_post_download', [$this, 'm4is_yjhivb'], 10, 3 );
 }  
function m4is_cpn2( WP_Post $m4is_c2ah ) { $m4is_iystd2 = $this->elf_edd_core->m4is_isgbj( $m4is_c2ah->ID );
 $m4is_xvlqo = __( 'Access Tag', 'memberium' );
 $m4is_u3g_ = __( 'Cancel Tag', 'memberium' );
 $m4is_qa4x = __( 'Payment Failure Tag', 'memberium' );
 $m4is_qnmc = __( 'Trial Tag', 'memberium' );
 $m4is_swtx = wp_nonce_field( 'edd_download_actions', "memberium_edd_download_nonce_{$m4is_c2ah->ID}", true, false );
 echo <<<HTMLBLOCK
			{$m4is_swtx}
			<label for="_memberium_access_tag">
				{$m4is_xvlqo}:
			</label>
			<input name="_memberium_access_tag" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_iystd2['main']}">
			<br /><br />

			<label for="_memberium_payf_tag">
				{$m4is_qa4x}:
			</label>
			<input name="_memberium_payf_tag"  class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_iystd2['payf']}">
			<br /><br />

			<label for="_memberium_trial_tag">
				{$m4is_qnmc}:
			</label>
			<input name="_memberium_trial_tag" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_iystd2['trial']}">
			<br /><br />

			<label for="_memberium_canc_tag">
				{$m4is_u3g_}:
			</label>
			<input name="_memberium_canc_tag" class="taglistdropdown" style="width:100%; max-width:100%" value="{$m4is_iystd2['canc']}">
			<br /><br />
		HTMLBLOCK;
 } 
function m4is_yjhivb( int $m4is_cd8k, WP_Post $m4is_c2ah, bool $m4is_wlqsgr) { if ( ! $this->m4is_tu86mz->m4is_rphw1( $m4is_cd8k, "memberium_edd_download_nonce_{$m4is_cd8k}", 'edd_download_actions', 'edit_posts' ) ) { return;
 } $m4is_flx71n = [ '_memberium_access_tag', '_memberium_canc_tag', '_memberium_payf_tag', '_memberium_trial_tag', ];
 foreach ( $m4is_flx71n as $m4is_s2ge5 ) { if ( empty( $_POST[$m4is_s2ge5] ) ) { delete_post_meta( $m4is_cd8k, $m4is_s2ge5 );
 } else { update_post_meta( $m4is_cd8k, $m4is_s2ge5, trim( $_POST[$m4is_s2ge5], ',' ) );
 } } } }

