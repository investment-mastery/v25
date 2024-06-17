<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_vh73y8::m4is_z4xvz2();
 final 
class m4is_vh73y8 { private $m4is_bnd6ti;
 public static 
function m4is_z4xvz2() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? new self;
 } private 
function __construct() { $this->m4is_ju94();
 $this->m4is_gm1n();
 } private 
function m4is_ju94() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 } private 
function m4is_gm1n() { $m4is_w2w8 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings' );
 $m4is_ywiuj = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'site_lock_enabled' );
 $m4is_h3ld_w = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'page_inheritance' );
 $m4is_p7pn8l = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'force_learndash_inheritance' );
 $m4is_fqhf = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'default_prohibited_action' );
 $m4is_mdluc = $this->m4is_t_9pt();
 $m4is_j5_h6 = $this->m4is_p_ks9();
 $m4is_swtx = wp_nonce_field( $this->m4is_bnd6ti->m4is_wdqrsb(), 'memberium_options_nonce', true, false );
 echo <<<HTMLBLOCK
			<p>You can set your content protection options below but even though you can do some fun stuff, none of them are required to launch your site.</p>
			<form method="POST" action="">
				{$m4is_swtx}
				<h3>General Protection Options</h3>
				<ul>
		HTMLBLOCK;
 m4is_wr40w::m4is_hd8p( 'Site Lock', 'site_lock_enabled', 8354, $m4is_ywiuj );
 m4is_wr40w::m4is_hd8p( 'Page Security Inheritance', 'page_inheritance', 6374, $m4is_h3ld_w );
 m4is_wr40w::m4is_hd8p( 'Force LearnDash Security Inheritance', 'force_learndash_inheritance', 21594, $m4is_p7pn8l );
 m4is_wr40w::m4is_uftpvx( 'Default Prohibited Action', 'default_prohibited_action', $m4is_w2w8['default_prohibited_action'], $m4is_mdluc, ['help_id' => 1217] );
 m4is_wr40w::m4is_q_7l('Default Page Redirect', 'default_page_redirect', $m4is_w2w8['default_page_redirect'], ['help_id' => 1220, 'style' => 'text-align:left;width:250px;', 'placeholder' => 'Absolute or Relative URL.  Leave blank for login page.']);
  echo <<<HTMLBLOCK
			</ul>
			<hr>
			<h3>Excerpts/Teasers</h3>
			<ul>
		HTMLBLOCK;
 m4is_wr40w::m4is_hd8p( 'Always Generate Excerpts', 'autogenerate_excerpts', 6808, $m4is_w2w8['autogenerate_excerpts'] );
 m4is_wr40w::m4is_uftpvx( 'Auto Include Default Excerpt', 'include_default_excerpt', $m4is_w2w8['include_default_excerpt'], $m4is_j5_h6, ['help_id' => 6808] );
 m4is_wr40w::m4is_ze6b( 'Auto Excerpt Length', 'excerpt_length', $m4is_w2w8['excerpt_length'], ['help_id' => 6811, 'min' => 0, 'max' => 999, 'size' => 5] );
 $this->m4is_eof3m( $m4is_w2w8 );
 echo m4is_wr40w::m4is_vgnp(1224);
 echo <<<HTMLBLOCK
			</ul>
			<p><input type="submit" value="Update" class="button-primary"></p>
			</form>
		HTMLBLOCK;
 } private 
function m4is_t_9pt() {  return [ 'redirect' => 'Redirect', 'hide' => 'Hide Completely', 'excerpt' => 'Show Excerpt Only', '' => 'None', ];
 } private 
function m4is_p_ks9() { return [ '' => 'None', 'prepend' => 'Prepend Default Excerpt', 'append' => 'Append Default Excerpt', 'embed' => 'Embed Excerpt', ];
 } private 
function m4is_eof3m($m4is_w2w8) { echo '<table style="width:100%;">';
 echo '<tr><td width="300" valign="top">';
 echo '<p>Default Excerpt', m4is_wr40w::m4is_vgnp(1224), '</p>';
 echo '</td><td style="padding-right:25px;">';
 if (MEMBERIUM_NOWYSIWYG ) { echo '<textarea name="global_excerpt" cols="40" rows="5" placeholder="Enter your teaser content HTML here">', $m4is_w2w8['global_excerpt'], '</textarea>';
 } else { wp_editor($m4is_w2w8['global_excerpt'], 'global_excerpt' );
 } echo '</td></tr></table>';
 } }

