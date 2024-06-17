<?php
/**
 * Copyright (c) 2017-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_lldmt::m4is_x6wv();
 final 
class m4is_lldmt { private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_e2kg;
 private static $m4is_zts3;
 private static $m4is_j_xo4w;
 private static $m4is_o3m_c5;
 private static $m4is_n3zlk;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_e2kg = self::$m4is_bnd6ti->m4is_dpuy9();
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_o3m_c5 = ! m4is_u68pu::m4is_u6mkaw();
 self::$m4is_n3zlk = 'memberium';
 }  static 
function m4is_cxqv( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'txtfmt' => '', ];
 if ( $m4is_nehd = m4is_crqo::m4is_mzob( $m4is_qnjfv, $m4is_r6nh_b ) ) { return $m4is_nehd;
 };
 $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_uzfw8j = htmlspecialchars( self::$m4is_zq0k );
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 }  static 
function m4is_wvid( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } static $form_id = 1;
 m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'action_id' => '', 'button_text' => 'Submit', 'button_url' => '', 'contact_id' => self::$m4is_e2kg, 'css_class' => '', 'debug' => 'no', 'form_action' => '', 'fus_ids' => '', 'goals' => '', 'redirect_url' => '', 'tag_ids' => '', 'tagids' => '', 'target' => '_self', 'tokens' => '', ];
 if ( $m4is_nehd = m4is_crqo::m4is_mzob( $m4is_qnjfv, $m4is_r6nh_b ) ) { return $m4is_nehd;
 };
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['debug'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['debug'], false);
 $m4is_v6fdv4 = [];
 $m4is_v6fdv4['action_id'] = $m4is_qnjfv['action_id'];
 $m4is_v6fdv4['contact_id'] = $m4is_qnjfv['contact_id'];
 $m4is_v6fdv4['debug'] = $m4is_qnjfv['debug'];
 $m4is_v6fdv4['fus'] = $m4is_qnjfv['fus_ids'] ;
 $m4is_v6fdv4['goals'] = $m4is_qnjfv['goals'];
 $m4is_v6fdv4['redirect'] = $m4is_qnjfv['redirect_url'];
 $m4is_v6fdv4['tags'] = trim($m4is_qnjfv['tagids'] . ',' . $m4is_qnjfv['tag_ids'], ',');
 $m4is_v6fdv4['tokens'] = trim($m4is_qnjfv['tokens']);
 $m4is_rbwn1z = base64_encode(serialize( $m4is_v6fdv4 ) );
 $m4is_npof41 = 'memb_actionset_button-' . $form_id;
 $m4is__0dt14 = 'memb_actionset_button_' . $form_id;
 $m4is_k1k7oj = self::$m4is_bnd6ti->m4is_nbmk6( $m4is_rbwn1z );
 $form_id++;
 if ( current_user_can( 'manage_options' ) ) { $m4is_tjg_9 = "<input type='submit' class='{$m4is_qnjfv['css_class']}' id='{$m4is__0dt14}' value='Actionset Button disabled for Admin'>";
 return $m4is_tjg_9;
 } if ( $m4is_v6fdv4['contact_id'] < 1 ) { return;
 } $m4is_tjg_9 = '';
 $m4is_tjg_9 .= "<form name='{$m4is_npof41}' id='{$m4is_npof41}' method='post' target='{$m4is_qnjfv['target']}' action='{$m4is_qnjfv['form_action']}'>";
 $m4is_tjg_9 .= "<input type='hidden' name='memb_form_type' value='memb_actionset_button'>";
 $m4is_tjg_9 .= "<input type='hidden' name='form_id' value='{$form_id}'>";
 $m4is_tjg_9 .= "<input type='hidden' name='action' value='{$m4is_rbwn1z}'>";
 $m4is_tjg_9 .= "<input type='hidden' name='signature' value='{$m4is_k1k7oj}'>";
 $m4is_tjg_9 .= wp_nonce_field('memb_actionset_' . $form_id, '_wpnonce', true, false);
 if ($m4is_qnjfv['button_url'] == '') { $m4is_tjg_9 .= "<input type='submit' class='{$m4is_qnjfv['css_class']}' id='{$m4is__0dt14}' value='{$m4is_qnjfv['button_text']}'>";
 } else { $m4is_tjg_9 .= "<input type='image' src='{$m4is_qnjfv['button_url']}' class='{$m4is_qnjfv['css_class']}' id='{$m4is__0dt14}' >";
 } $m4is_tjg_9 .= "</form>";
 return $m4is_tjg_9;
 } static 
function m4is_matq64( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if ( is_feed() ) { return;
 } $m4is_r6nh_b = [ 'contact_id' => self::$m4is_e2kg, 'debug' => 'no', 'force' => 'no', 'tag_id' => '', 'tag_ids' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(', ', array_keys($m4is_r6nh_b) );
 } if ( empty( self::$m4is_e2kg ) ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['debug'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['debug'], false);
 $m4is_qnjfv['force'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['force'], false);
 $m4is_qnjfv['tag_id'] = trim($m4is_qnjfv['tag_id'] . ',' . $m4is_qnjfv['tag_ids'], ',');
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_qnjfv['tag_id'], $m4is_qnjfv['contact_id'], (boolean) $m4is_qnjfv['force'], $m4is_qnjfv['debug']);
 } static 
function m4is_u21rsm( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'contact_id' => self::$m4is_e2kg, 'date_format' => 'F j, Y g:i a', 'debug' => 'no', 'force' => 'no', 'limit' => 1, 'tag_id' => '', 'tag_ids' => '', 'upcomingonly' => 'yes', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } if ( self::$m4is_e2kg < 1) { return;
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['upcomingonly'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['upcomingonly'], true);
 $m4is_qnjfv['limit'] = (int) $m4is_qnjfv['limit'];
 $m4is_qnjfv['limit'] = $m4is_qnjfv['limit'] < 0 ? 1 : $m4is_qnjfv['limit'];
 $m4is_qnjfv['limit'] = $m4is_qnjfv['limit'] > 1000 ? 1000 : $m4is_qnjfv['limit'];
  $m4is_jo8fb = [ 'IsAppointment' => 1, 'ContactId' => self::$m4is_e2kg, ];
  if ($m4is_qnjfv['upcomingonly']) { $m4is_jo8fb['ActionDate'] = '~>~' . date('Y-m-d');
 } $m4is_dj_2 = 'ContactAction';
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2($m4is_dj_2);
 $m4is_mxq92s = m4is_ho3l::m4is_mg4uyc($m4is_dj_2, $m4is_qnjfv['limit'], 0, $m4is_jo8fb, $m4is_w_8g);
 $m4is_encb = 0;
 $m4is_uzfw8j = '';
 $m4is__32_p = 0;
 $m4is_r10h = [ 'ActionDate', 'CompletionDate', 'CreationDate', 'EndDate', 'LastUpdated', 'PopupDate', ];
 if (is_array($m4is_mxq92s) ) { if (! empty($m4is_mxq92s) ) { $m4is_encb = count($m4is_mxq92s);
 foreach($m4is_mxq92s as $m4is_xnzp) { $m4is__32_p++;
 $m4is_ks1fj2 = $m4is_z50f;
 $m4is_p5ehv = ($m4is__32_p % 2) ? $m4is_p5ehv = 'odd': $m4is_p5ehv = 'even';
 $m4is_ks1fj2 = str_ireplace('%%cycler%%', $m4is_p5ehv, $m4is_ks1fj2);
 $m4is_ks1fj2 = str_ireplace('%%line%%', $m4is__32_p, $m4is_ks1fj2);
 foreach($m4is_r10h as $m4is_lugsa) { $m4is_gd3oc = '/(%%'.strtolower($m4is_lugsa) . '(\|?)(.*)%%)/U';
 if (stripos($m4is_ks1fj2, '%%' . $m4is_lugsa) !== false) { $m4is_ks1fj2 = preg_replace_callback($m4is_gd3oc, function($m4is_ogxo) use ($m4is_xnzp, $m4is_lugsa, $m4is_qnjfv) { $m4is_ogxo[3] = substr($m4is_ogxo[3], 1);
 if ($m4is_ogxo[3] > '') { $m4is_dp251a = $m4is_ogxo[3];
 } else { $m4is_dp251a = $m4is_qnjfv['date_format'];
 } return date($m4is_dp251a, strtotime($m4is_xnzp[$m4is_lugsa]) );
 }, $m4is_ks1fj2);
 } } foreach($m4is_w_8g as $m4is_g1ru50) { if (! in_array($m4is_g1ru50, $m4is_r10h) ) { if (! isset($m4is_xnzp[$m4is_g1ru50]) ) { $m4is_xnzp[$m4is_g1ru50 ] = '';
 } $m4is_ks1fj2 = str_ireplace('%%' . $m4is_g1ru50 . '%%', $m4is_xnzp[$m4is_g1ru50], $m4is_ks1fj2);
 } } $m4is_uzfw8j .= $m4is_ks1fj2;
 } } } $m4is_uzfw8j = str_ireplace('%%appt.count%%', $m4is_encb, $m4is_ks1fj2);
 return do_shortcode($m4is_uzfw8j);
 } static 
function m4is_xp0stv( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'contact_id' => self::$m4is_e2kg, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_wn9l = self::$m4is_j_xo4w->listLinkedContacts($m4is_qnjfv['contact_id']);
 return '<pre>' . print_r($m4is_wn9l, true) . '</pre>';
 } static 
function m4is_fpuk_( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'fus_id' => 0, 'fus_ids' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['fus_ids'] = trim($m4is_qnjfv['fus_id'] . ',' . $m4is_qnjfv['fus_ids'], ',');
 m4is_pms8y::m4is_e5l8a9()->m4is_kvu8_($m4is_qnjfv['fus_ids'], m4is_pms8y::m4is_e5l8a9()->m4is_dpuy9() );
 } static 
function m4is_qvwtig( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'fus_id' => 0, 'fus_ids' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } if (! self::$m4is_e2kg ) { return;
 } if (is_feed() ) { return;
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['fus_ids'] = trim($m4is_qnjfv['fus_id'] . ',' . $m4is_qnjfv['fus_ids'], ', ');
 m4is_pms8y::m4is_e5l8a9()->m4is_yfn9( $m4is_qnjfv['fus_ids'], self::$m4is_e2kg );
 } static 
function m4is_nz_23( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if (is_feed() ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'tag_id' => 0, 'contact_id' => self::$m4is_e2kg, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 if ($m4is_qnjfv['tag_id'] > '') { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_qnjfv['tag_id'], $m4is_qnjfv['contact_id']);
 } } static 
function m4is_zs8c5u( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 if (is_feed() ) { return;
 } $m4is_r6nh_b = [ 'action_id' => 0, 'force_sync' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq($m4is_qnjfv['action_id'], self::$m4is_e2kg );
 } static 
function m4is_xr0w( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if (is_feed() ) { return;
 } $m4is_r6nh_b = [ 'tag_id' => 0, 'contact_id' => self::$m4is_e2kg, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } if (! self::$m4is_e2kg ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 m4is_pms8y::m4is_e5l8a9()->m4is_tcle75($m4is_qnjfv['tag_id'], $m4is_qnjfv['contact_id']);
 }  static 
function m4is_nqic3( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } static $m4is_neowf = false;
 if ( $m4is_nehd = m4is_crqo::m4is_mzob( $m4is_qnjfv, [] ) ) { return $m4is_nehd;
 };
 if ( ! self::$m4is_e2kg ) { return;
 } if ( $m4is_neowf ) { error_log( sprintf( 'Memberium Error:  [%s] throttled.  Excess usage of [%s] will cause API stability issues.', $m4is_carw7y, $m4is_carw7y ) );
 return;
 } if ( is_feed() ) { return;
 } $m4is_neowf = true;
 $m4is_bnd6ti = self::$m4is_bnd6ti;
 $m4is_e2kg = self::$m4is_e2kg;
 m4is_aoxw::m4is_djr4nd();
 if ( ! empty( $m4is_e2kg ) ) { $m4is_bnd6ti->m4is_leu58( $m4is_e2kg );
 } else { $m4is_x0_hk = wp_get_current_user();
 $m4is_bnd6ti->m4is_j30vf1( $m4is_x0_hk->user_email );
 usleep( 500000 );
 } m4is_w0enbm::m4is_e5l8a9()->m4is_dnqd_();
 } static 
function m4is_jjhk( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'contact_id1' => self::$m4is_e2kg, 'contact_id2' => 0, 'link_type' => 0, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_oa_z = self::$m4is_j_xo4w->unlinkContacts( $m4is_qnjfv['contact_id1'], $m4is_qnjfv['contact_id2'], $m4is_qnjfv['link_type'] );
 } static 
function m4is_a7qg3n( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '') { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'capture' => '', 'exact' => false, 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is__8htld = false;
 $m4is_mvq5 = 0;
 $m4is_ja3n = 0;
 $m4is_pzgsjx = ! empty($_SESSION['memb_user']['email']) ? $_SESSION['memb_user']['email'] : '';
 switch ($m4is_carw7y) { case 'memb_is_no_optin': $m4is_mvq5 = 0;
 break;
 case 'memb_is_1x_optin': $m4is_mvq5 = 1;
 break;
 case 'memb_is_2x_optin': $m4is_mvq5 = 2;
 break;
 } $m4is_ja3n = m4is_w0enbm::m4is_e5l8a9()->m4is_x3yw9r($m4is_pzgsjx);
 $m4is_zts3 = self::$m4is_bnd6ti->m4is_lvmz1b();
 if ($m4is_qnjfv['exact'] || $m4is_mvq5 == 0) { $m4is__8htld = ( $m4is_zts3 || $m4is_ja3n == $m4is_mvq5);
 } else { $m4is__8htld = ( $m4is_zts3 || $m4is_ja3n >= $m4is_mvq5);
 } $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is__8htld);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 } static 
function m4is_edqn( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if (is_feed() ) { return;
 } $m4is_r6nh_b = [ 'call_name' => '', 'debug' => false, 'integration' => self::$m4is_zq0k, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } if (! self::$m4is_e2kg ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['call_name'] = trim($m4is_qnjfv['call_name']);
 $m4is_qnjfv['integration'] = trim($m4is_qnjfv['integration']);
 if ( empty($m4is_qnjfv['call_name'] ) || empty( $m4is_qnjfv['integration'] ) ) { return;
 } $m4is_qnjfv['debug'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['debug'], false);
 if ($m4is_qnjfv['debug']) { echo "Achieving Goal {$m4is_qnjfv['integration']}:{$m4is_qnjfv['call_name']}<br>";
 } self::$m4is_bnd6ti->m4is_cqe6_( $m4is_qnjfv['call_name'], self::$m4is_e2kg, $m4is_qnjfv['integration'] );
 } static 
function m4is_kck0( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'delimiter' => ',', 'htmlattr' => '', 'separator' => ',', 'tag_ids' => '', 'tagids' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_uzfw8j = '';
 $m4is_qnjfv['tagids'] = trim($m4is_qnjfv['tagids'] . ',' . $m4is_qnjfv['tag_ids'], ', ');
 if ($m4is_qnjfv['tagids'] > '') { $m4is_qetrg = m4is_pwtg7::m4is_i0au6j();
 $m4is_iystd2 = explode($m4is_qnjfv['delimiter'], $m4is_qnjfv['tagids']);
 foreach ($m4is_iystd2 as $m4is_mpia) { if (isset($m4is_qetrg['mc'][$m4is_mpia]) ) { $m4is_uzfw8j .= htmlspecialchars($m4is_qetrg['mc'][$m4is_mpia]) . $m4is_qnjfv['separator'];
 } } $m4is_uzfw8j = substr($m4is_uzfw8j, 0, strlen($m4is_uzfw8j) - strlen($m4is_qnjfv['separator']) );
 } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_fw3u4t( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { global $wpdb;
 if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'date_format' => 'l, F dS, Y, g:sA', 'default' => '', 'htmlattr' => '', 'mode' => 'newest',  'tag_ids' => '', 'tagids' => '', 'txtfmt' => '', 'tz' => 'America/New_York', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } if ( self::$m4is_e2kg == 0 || self::$m4is_bnd6ti->m4is_lvmz1b() ) { return;
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['tagids'] = trim( $m4is_qnjfv['tagids'] . ',' . $m4is_qnjfv['tag_ids'], ', ' );
 $m4is_qnjfv['mode'] = strtolower( trim( $m4is_qnjfv['mode'] ) );
 $m4is_jnep2 = date_default_timezone_get();
 date_default_timezone_set( $m4is_qnjfv['tz'] );
 $m4is_uzfw8j = $m4is_qnjfv['default'];
 if ( $m4is_qnjfv['tagids'] > '' ) { $m4is_iystd2 = m4is_pwtg7::m4is_rk2s( explode( ',', $m4is_qnjfv['tagids'] ) );
 if ( false ) { echo '<pre>', print_r( $m4is_iystd2, true ), '</pre>';
 die();
 } $m4is_k0z93l = implode(',', $m4is_iystd2);
 if (! empty($m4is_iystd2) ) { if ($m4is_qnjfv['mode'] == 'newest') { $m4is_xo_nv = 'DESC';
 } else { $m4is_xo_nv = 'ASC';
 } if ( self::$m4is_bnd6ti->m4is_sjmzx($m4is_iystd2) ) { if ($_SESSION['memb_user']['tag_detail_count'] == 0 && self::$m4is_bnd6ti->m4is_oiewvu('settings', 'sync_tag_details') == 0) { self::$m4is_bnd6ti->m4is_mlq_(m4is_pms8y::m4is_e5l8a9()->m4is_dpuy9());
 } $m4is_k4yeul = [ self::$m4is_e2kg, self::$m4is_zq0k, ];
 $m4is_tovizk = 'SELECT `created` FROM `' . MEMBERIUM_DB_CONTACTTAGS . '` WHERE `contactid` = %d AND `tagid` IN (' . $m4is_k0z93l . ') AND `appname` = %s ORDER BY `created` ' . $m4is_xo_nv . ' LIMIT 1';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $m4is_k4yeul);
 $m4is_btw6n2 = $wpdb->get_var($m4is_tovizk);
 $m4is_uzfw8j = date($m4is_qnjfv['date_format'], strtotime($m4is_btw6n2) );
 } } } date_default_timezone_set($m4is_jnep2);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_df39o( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'capture' => '', 'format' => '', 'htmlattr' => '', 'tags' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['tags'] = explode(',', $m4is_qnjfv['tags']);
 $m4is_vwdb4 = m4is_wbc8os::m4is_sfnmc('groups');
 $m4is_idce = empty($m4is_vwdb4) ? [] : explode(',', $m4is_vwdb4);
 $m4is_mkti7_ = count($m4is_qnjfv['tags']);
 $m4is_v64e = 0;
 foreach($m4is_idce as $m4is_d6whb) { if (in_array($m4is_d6whb, $m4is_qnjfv['tags']) ) { $m4is_v64e++;
 } } $m4is_uzfw8j = '';
 if ($m4is_qnjfv['format'] == '%') { $m4is_uzfw8j = ( ($m4is_v64e / $m4is_mkti7_) * 100);
 } else { $m4is_uzfw8j = $m4is_v64e;
 } return m4is_crqo::m4is__go6j(true, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr']);
 } static 
function m4is_faip14( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'cachetime' => 900, 'capture' => '', 'tag_id' => 0, 'txtfmt' => '', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['tag_id'] = (int) m4is_pwtg7::m4is_v6pu( $m4is_qnjfv['tag_id'] );
 $m4is_qnjfv['cachetime'] = $m4is_qnjfv['cachetime'] < 450 ? $m4is_qnjfv['cachetime'] = 450 : (int) $m4is_qnjfv['cachetime'];
 if ($m4is_qnjfv['tag_id'] < 1) { return;
 } $m4is_wvr4fa = 'memberium::tag_count::' . $m4is_qnjfv['tag_id'];
 $m4is_yer1mp = get_transient($m4is_wvr4fa);
 if ($m4is_yer1mp === false) { if ( method_exists( self::$m4is_j_xo4w, 'dscount') ) { $m4is_dj_2 = 'ContactGroupAssign';
 $m4is_yer1mp = self::$m4is_j_xo4w->dscount($m4is_dj_2, ['GroupId' => $m4is_qnjfv['tag_id']] );
 set_transient($m4is_wvr4fa, $m4is_yer1mp, $m4is_qnjfv['cachetime']);
 } else { $m4is_yer1mp = 'Count Unavailable';
 } } return m4is_crqo::m4is__go6j(true, $m4is_yer1mp, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], '');
 } static 
function m4is_um90( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if ( is_feed() ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'contact_id1' => self::$m4is_e2kg, 'contact_id2' => 0, 'link_type' => 0, ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $result = self::$m4is_j_xo4w->linkContacts( $m4is_qnjfv['contact_id1'], $m4is_qnjfv['contact_id2'], $m4is_qnjfv['link_type'] );
 } static 
function m4is_zf1rn( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'txtfmt' => '', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_uzfw8j = m4is_wbc8os::m4is_jjgo();
 return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], '', $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 } static 
function m4is_fdy3( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if ( is_feed() ) { return;
 } $m4is_r6nh_b = [ 'fus_id' => 0, 'fus_ids' => '', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } if ( self::$m4is_e2kg < 1 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_q1ojyb = trim( $m4is_qnjfv['fus_id'] . ',' . $m4is_qnjfv['fus_ids'], ',' );
 self::$m4is_bnd6ti->m4is_rldxj3( $m4is_q1ojyb, self::$m4is_e2kg );
 } static 
function m4is_x9_f( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } if ( is_feed() ) { return;
 } $m4is_r6nh_b = [ 'action_ids' => '', 'debug' => 'no', 'fus_ids' => '', 'goals' => '', 'redirect' => '', 'tag_ids' => '', 'tagids' => '', 'tokens' => '', 'url' => get_site_url(), ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 } m4is_aoxw::m4is_djr4nd();
 $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_qnjfv['debug'] = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['debug'], false );
 if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { return $m4is_qnjfv['url'];
 } if ( ! self::$m4is_e2kg ) { return $m4is_qnjfv['url'];
 } $m4is_v6fdv4 = [ 'actionset' => $m4is_qnjfv['action_ids'], 'contact_id' => self::$m4is_e2kg, 'debug' => $m4is_qnjfv['debug'], 'fus' => $m4is_qnjfv['fus_ids'], 'goals' => $m4is_qnjfv['goals'], 'redirect' => $m4is_qnjfv['redirect'], 'tags' => trim( "{$m4is_qnjfv['tagids']},{$m4is_qnjfv['tag_ids']}", ',' ), 'tokens' => trim( $m4is_qnjfv['tokens'] ), ];
 $m4is_rbwn1z = base64_encode( serialize( $m4is_v6fdv4 ) );
 $m4is_imdo6 .= sprintf( '?memb_actionlink=%s', $m4is_rbwn1z );
 $m4is_t5ot4 = 'verification';
 $m4is_v6fdv4 = $m4is_rbwn1z;
 $m4is_iac374 = wp_nonce_url( $m4is_imdo6, $m4is_v6fdv4, $m4is_t5ot4 );
 return $m4is_iac374;
 } static 
function m4is_za6r9( $m4is_qnjfv, $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'capture' => '', 'txtfmt' => '', ];
 if ( $m4is_nehd = m4is_crqo::m4is_mzob( $m4is_qnjfv, $m4is_r6nh_b ) ) { return $m4is_nehd;
 };
 $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_oa_z = m4is_ho3l::m4is_epr341();
 $m4is_uzfw8j = m4is_crqo::m4is_mm2xd( $m4is_z50f, $m4is_carw7y, true, $m4is_oa_z );
 return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], '', '', '' );
 } }

