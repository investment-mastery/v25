<?php
/**
 * Copyright (c) 2017-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_dalr6 { private $core;
 private $m4is_bnd6ti;
 private $shortcodes_registered = false;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_ljhm();
 $this->m4is_ww61so();
 } 
function m4is_xgviu0() {} 
function m4is_ww61so() { add_action( 'init', [$this, 'm4is_xgviu0'] );
 add_action( 'memberium/shortcodes/add', [$this, 'm4is_ljhm'] );
 add_action( 'memberium/shortcodes/remove', [$this, 'm4is_jq30'] );
 if ( ! empty( $_POST['memb_form_type'] ) ) { add_action( 'template_redirect', [$this, 'm4is_i5b9l'], 1 );
 } if ( isset( $_GET['memb_actionlink'] ) && isset($_GET['verification'] ) ) { add_action( 'init', [$this, 'm4is_cqowcp'] );
 } }    
function m4is_ct5d() : array { $m4is_iystd2 = [];
 $m4is_iystd2['nested'] = [ ];
 $m4is_iystd2['standard'] = [ 'memb_spiffy_checkout' => 'm4is_bgske3', 'memb_video_progress' => 'm4is_mp7h43',  ];
 return $m4is_iystd2;
 } 
function m4is_ljhm() { $m4is_iystd2 = $this->m4is_ct5d();
  foreach ($m4is_iystd2['standard'] as $m4is_mpia => $m4is_cwkrz) { if (is_array($m4is_cwkrz)) { add_shortcode($m4is_mpia, $m4is_cwkrz);
 } else { add_shortcode($m4is_mpia, [$this, $m4is_cwkrz]);
 } }  foreach ($m4is_iystd2['nested'] as $m4is_mpia => $m4is_cwkrz) { $m4is_h7j0 = $m4is_cwkrz[1];
 add_shortcode($m4is_mpia, [$this, $m4is_h7j0] );
 for ($m4is_tiq5k6 = 1;
 $m4is_tiq5k6 < (int) $m4is_cwkrz[0];
 $m4is_tiq5k6++) { add_shortcode("{$m4is_mpia}{$m4is_tiq5k6}", [$this, $m4is_h7j0]);
 } } } 
function m4is_jq30() { $m4is_iystd2 = $this->m4is_ct5d();
 if (isset($m4is_iystd2['standard']) && is_array($m4is_iystd2['standard']) ) { foreach ($m4is_iystd2['standard'] as $m4is_mpia => $m4is_cwkrz) { remove_shortcode($m4is_mpia);
 } } if (isset($m4is_iystd2['nested']) && is_array($m4is_iystd2['nested']) ) { foreach ($m4is_iystd2['nested'] as $m4is_mpia => $m4is_cwkrz) { remove_shortcode($m4is_mpia);
 for ($m4is_tiq5k6 = 1;
 $m4is_tiq5k6 < (int) $m4is_cwkrz[0];
 $m4is_tiq5k6++) { remove_shortcode($m4is_mpia . $m4is_tiq5k6);
 } } } }     
function m4is_bgske3( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if (! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } if (is_feed() ) { return '';
 } $m4is_r6nh_b = [ 'url' => '',  'omit_js' => false, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } m4is_aoxw::m4is_djr4nd();
 $m4is_apw6nh = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'spiffy_subdomain');
 if ( empty( $m4is_apw6nh ) ) { if ( $this->m4is_bnd6ti->m4is_lvmz1b() ) { return '<p style="color:red;font-weight:bold;">Spiffy Subdomain not defined.</p>';
 } return '';
 } if ( $this->m4is_bnd6ti->m4is_lvmz1b() ) { return '<p style="color:red;font-weight:bold;">Spiffy Checkout not supported when logged in as Admin.</p>';
 } $m4is_x0_hk = wp_get_current_user();
 $m4is_fliw = $m4is_x0_hk ? $m4is_x0_hk->user_email : '';
 $m4is_r6nh_b = [ 'url' => '',  'omit_js' => false, ];
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 if ($m4is_fliw) { $m4is_qnjfv['url'] = $m4is_qnjfv['url'] . '?email=' . urlencode($m4is_fliw);
 } if (! $m4is_qnjfv['omit_js']) { add_action('wp_footer', [$this, 'm4is_p_plgh']);
 } return '<spiffy-checkout url="' . $m4is_qnjfv['url'] . '"></spiffy-checkout>';
   } 
function m4is_p_plgh() { $m4is_apw6nh = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'spiffy_subdomain');
 if ( empty( $m4is_apw6nh )) { return '';
 } echo '<script>
		"use strict";!function(t,e){var i=e.spiffy=e.spiffy||[];if(!i.init){
			if(i.invoked)return void(e.console&&console.error&&console.warn("Spiffy Elements included twice."))
			;i.invoked=!0,i.methods=["identify","config","reset","debug","off","on"],i.factory=function(t){
			return function(){var e=Array.prototype.slice.call(arguments);return e.unshift(t),i.push(e),i}},
			i.methods.forEach(function(t){spiffy[t]=i.factory(t)}),i.load=function(e){if(!spiffy.ACCOUNT){
			spiffy.ACCOUNT=e;var i=t.createElement("script");i.type="text/javascript",i.async=!0,
			i.crossorigin="anonymous",i.src="https://js.static.spiffy.co/spiffy.js?a="+e
			;var n=t.getElementsByTagName("script")[0];n.parentNode.insertBefore(i,n)}}}}(document,window),
			spiffy.SNIPPET_VERSION="1.0.2";

			spiffy.load("', $m4is_apw6nh, '");
		</script>';
 } 
function m4is_mp7h43( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if (! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } if (is_feed() ) { return '';
 } $m4is_r6nh_b = [ 'src' => '', 'time_tags' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } m4is_aoxw::m4is_djr4nd();
 if (! function_exists('m4is_bwztuy') ){ require_once $this->m4is_bnd6ti->m4is_wdqrsb() . '/shortcodes/video-progress/video-progress.php';
 }  if (current_user_can('manage_options') || !is_user_logged_in() ) { return '';
 } m4is_i4mz()->m4is_ahjrux($m4is_qnjfv, $m4is_z50f, $m4is_carw7y);
 return '';
 }    
function m4is_i5b9l() { m4is_aoxw::m4is_djr4nd();
 $m4is_xqro = strtolower($_POST['memb_form_type']);
 $m4is_bic1p = [ 'memb_reset_password' => 'm4is_eewt20', ];
 if ( array_key_exists( $m4is_xqro, $m4is_bic1p ) ) { $m4is_m_uwd1 = $m4is_bic1p[$m4is_xqro];
 $this->$m4is_m_uwd1();
 } } 
function m4is_cqowcp() { if (! wp_verify_nonce($_GET['verification'], $_GET['memb_actionlink']) ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_v6fdv4 = unserialize( base64_decode( $_GET['memb_actionlink'] ) );
 $m4is_yh5y = $m4is_v6fdv4['debug'];
 if ($m4is_yh5y) { echo '<pre>';
 echo __LINE__, " - Set ActionSet = {$m4is_v6fdv4['actionset']}<br />";
 echo __LINE__, " - Set ContactId = {$m4is_v6fdv4['contact_id']}<br />";
 echo __LINE__, " - Set FUS       = {$m4is_v6fdv4['fus']}<br />";
 echo __LINE__, " - Set Goals     = {$m4is_v6fdv4['goals']}<br />";
 echo __LINE__, " - Set Tags      = {$m4is_v6fdv4['tags']}<br />";
 echo __LINE__, " - Set Tokens    = {$m4is_v6fdv4['tokens']}<br />";
 echo __LINE__, " - Set Redirect  = {$m4is_v6fdv4['redirect']}<br />";
 } if ($m4is_v6fdv4['contact_id']) { if (! empty($m4is_v6fdv4['actionset']) ) { $this->m4is_bnd6ti->m4is_u86vzq($m4is_v6fdv4['actionset'], $m4is_v6fdv4['contact_id']);
 } if (! empty($m4is_v6fdv4['fus']) ) { $this->m4is_bnd6ti->m4is_rldxj3($m4is_v6fdv4['fus'], $m4is_v6fdv4['contact_id']);
 } if (! empty($m4is_v6fdv4['goals']) ) { $this->m4is_bnd6ti->m4is_cqe6_($m4is_v6fdv4['goals'], $m4is_v6fdv4['contact_id']);
 } if (! empty($m4is_v6fdv4['tags']) ) { $this->m4is_bnd6ti->m4is_tcle75($m4is_v6fdv4['tags'], $m4is_v6fdv4['contact_id']);
 } } if (! empty($m4is_v6fdv4['tokens']) ) { $this->m4is_bnd6ti->m4is_lrtqe8($m4is_v6fdv4['tokens']);
 } $this->m4is_bnd6ti->m4is_leu58($m4is_v6fdv4['contact_id']);
 $this->m4is_bnd6ti->m4is_m3vz($m4is_v6fdv4['contact_id']);
 do_action('memberium_populate_session', false);
 if ($m4is_yh5y) { echo print_r($_SESSION['keap']['contact'], true);
 echo '<a href="', $m4is_v6fdv4['redirect'], '">', _x('Continue...', 'memb_action_link', 'memberium'), '</a>';
 if ($m4is_yh5y) echo '</pre>';
 exit;
 } if ($m4is_v6fdv4['redirect'] > '') { m4is_aoxw::m4is_g7bv();
 wp_redirect($m4is_v6fdv4['redirect']);
 exit;
 } } 
function m4is_eewt20() { if (! wp_verify_nonce($_POST['_wpnonce'], 'memb_reset_password_' . $_POST['form_id'] . $_POST['parameters']) ) { wp_die(_x('Security Check Failed - Nonce Validation Error', 'memb_change_password', 'memberium') );
 exit;
 } if (is_user_logged_in() ) { return;
 } if (! wp_verify_nonce($_POST['_wpnonce'], 'memb_reset_password_' . $_POST['form_id']) ) { wp_die(_x('Invalid Password Reset Request', 'memb_reset_password', 'memberium') );
 exit;
 } m4is_aoxw::m4is_djr4nd();
 global $wpdb;
 $m4is_gqid = unserialize(base64_decode($_POST['params']) );
 if (! empty($_POST['email']) ) { $m4is_x0_hk = get_user_by('email', $_POST['email']);
 if ($m4is_x0_hk) { global $wp;
 $m4is_s2ge5 = get_password_reset_key($m4is_x0_hk);
 $m4is_lg3b = $m4is_x0_hk->data->user_login;
 $m4is_k4yeul = [ 'action' => 'rp', 'key' => $m4is_s2ge5, 'login' => $m4is_lg3b, ];
 $m4is_imdo6 = home_url(add_query_arg($m4is_k4yeul, $wp->request) );
 if ($m4is_gqid['template_id']) { $m4is_eng245 = $this->m4is_bnd6ti->m4is_yi52($m4is_gqid['template_id']);
 $m4is_eng245['textBody'] = str_ireplace('~Memberium.ResetURL~', $m4is_imdo6, $m4is_eng245['textBody']);
 $m4is_eng245['htmlBody'] = str_ireplace('~Memberium.ResetURL~', $m4is_imdo6, $m4is_eng245['htmlBody']);
 $m4is_z59dj = [m4is_bnrdbo::m4is_ltwpgs($m4is_x0_hk->ID)];
 $this->m4is_bnd6ti->m4is_zw_n()->sendEmail($m4is_z59dj, $m4is_eng245['fromAddress'], $m4is_eng245['toAddress'], '', '', $m4is_eng245['contentType'], $m4is_eng245['subject'], $m4is_eng245['htmlBody'], $m4is_eng245['txtBody']);
 } else { $m4is_qhkly = apply_filters('memberium_password_reset_to_email', $m4is_x0_hk->data->user_email);
 $m4is_d6ts = apply_filters('memberium_password_reset_subject', 'Password Reset Email');
 $m4is_wbgl5s = "Dear ~Contact.FirstName~,\n\nHere is your requested Password Reset Link:\n\n~Memberium.ResetURL~\n\n";
 $m4is_wbgl5s = apply_filters('memberium_password_reset_wpmail_body', $m4is_wbgl5s);
 $m4is_wbgl5s = str_ireplace('~Memberium.ResetURL~', $m4is_imdo6, $m4is_wbgl5s);
 $m4is_wbgl5s = str_ireplace('~Contact.FirstName~', $m4is_x0_hk->first_name, $m4is_wbgl5s);
 wp_mail($m4is_qhkly, $m4is_d6ts, $m4is_wbgl5s);
 } } else {  } } elseif ($_POST['password2'] == $_POST['password1']) { $m4is_haon5 = true;
 if (empty($_POST['password1']) || empty($_POST['password2']) ) { $m4is_haon5 = false;
 } if (strlen($_POST['password1']) < $this->m4is_bnd6ti->m4is_oiewvu('settings', 'min_password_length') ) { $m4is_haon5 = false;
 } $m4is_x0_hk = check_password_reset_key($_POST['key'], $_POST['login']);
 if ('WP_User' == get_class($m4is_x0_hk) ) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_x0_hk->ID);
 $m4is_nuwyb = wp_hash_password($_POST['password1']);
 $wpdb->query("UPDATE `" . $wpdb->users . "` SET `user_pass` = '{$m4is_nuwyb}' WHERE `ID` = '{$m4is_x0_hk->ID}';");
 if ($m4is_e2kg) {  $m4is_r36qyu = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'local_auth_only');
 if (empty($m4is_r36qyu) ) { $m4is_dcf_7 = $this->m4is_bnd6ti->m4is_oiewvu('settings', 'password_field');
 $m4is__xn_jt = [ $m4is_dcf_7 => $_POST['password1'], ];
 m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt);
   $m4is_zq0k = $this->m4is_bnd6ti->m4is_d14zr('appname');
 $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_dcf_7 = $m4is_dcf_7;
 $m4is_tovizk = "UPDATE {$m4is_tcw1l} SET `value` = '%s' WHERE id = %d AND `appname` = '%s' AND `fieldname` = '%s'; ";
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $password, $m4is_e2kg, $m4is_zq0k, $m4is_dcf_7);
 $m4is_oa_z = $wpdb->query($m4is_tovizk);
 } }  get_password_reset_key($m4is_x0_hk);
 } else {  } } } }

