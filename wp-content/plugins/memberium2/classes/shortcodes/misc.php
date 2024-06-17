<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_gng906::m4is_x6wv();
 final 
class m4is_gng906 { static private $m4is_bnd6ti;
 static private $m4is_zq0k;
 static private $m4is_e2kg;
 static private $m4is_o3m_c5;
 static 
function m4is_x6wv() : void { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 self::$m4is_o3m_c5 = ! m4is_u68pu::m4is_u6mkaw();
 self::$m4is_e2kg = (int) self::$m4is_bnd6ti->m4is_dpuy9();
 }  static 
function m4is_uk5a7( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string {  if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'url' => '', 'background' => 0, 'resync' => 0, 'display' => false, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } if ( ! self::$m4is_e2kg ) { return '';
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 if ( ! empty( $m4is_qnjfv['url'] ) ) { $m4is_rbwn1z = [ 'contactId' => self::$m4is_e2kg, 'Email' => m4is_wbc8os::m4is_sfnmc('email'), ];
 $m4is_oa_z = wp_remote_post( $m4is_qnjfv['url'], ['body' => $m4is_rbwn1z] );
 } if ( $m4is_qnjfv['display'] ) { return isset( $m4is_oa_z['body'] ) ? $m4is_oa_z['body'] : '';
 } return '';
 }  static 
function m4is_t0wdb5( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } static $m4is_isu2kc = 0;
 if (is_feed() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_isu2kc++;
 $m4is_r6nh_b = [ 'style' => 'link', 'appname' => self::$m4is_zq0k, 'url' => '/', 'css_id' => $m4is_isu2kc, 'button_text' => 'Login', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = '';
 $m4is_gai6k = m4is_wbc8os::m4is_sfnmc('email');
 $m4is_j485e = m4is_wbc8os::m4is_sfnmc('password');
 $m4is_etj2 = new stdClass;
 if ($m4is_qnjfv['style'] == 'button') { $m4is_etj2->action = "https://{$m4is_qnjfv['appname']}.customerhub.net/web_services/auto_login";
 $m4is_etj2->appname = $m4is_qnjfv['appname'];
 $m4is_etj2->username = $m4is_gai6k;
 $m4is_etj2->password = $m4is_j485e;
 $m4is_etj2->button_text = $m4is_qnjfv['button_text'];
 $m4is_etj2->css_id = $m4is_qnjfv['css_id'];
 $m4is_etj2->url = $m4is_qnjfv['url'];
 $m4is_uzfw8j = m4is_crqo::m4is_yu7b1r($m4is_carw7y, $m4is_qnjfv, $m4is_z50f, $m4is_carw7y, $m4is_etj2);
 } else { $m4is_uzfw8j = 'https://' . $m4is_qnjfv['appname'] . '.customerhub.net/web_services/auto_login?email='. urlencode($m4is_gai6k) . '&password='. urlencode($m4is_j485e) . '&to=' . urlencode($m4is_qnjfv['url']);
 } return $m4is_uzfw8j;
 } static 
function m4is_mg70i( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = self::$m4is_bnd6ti->m4is_u04m() . ( MEMBERIUM_BETA === 1 ? 'beta' : '' );
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_ibqvy( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = m4is_u68pu::m4is_u6mkaw() ? _x('Valid', 'memb_license_status', 'memberium') : _x('Invalid', 'memb_license_status', 'memberium');
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_g8j6k2( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (is_feed() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
    static $m4is_nsjf = 0;
 $m4is_r6nh_b = [ 'id' => '', 'size' => 256, 'data' => trim($m4is_z50f), 'style' => '', 'class' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 if (empty($m4is_qnjfv['data']) ) { return '';
 } $m4is_nsjf++;
 $m4is_bq_t = empty($m4is_qnjfv['id']) ? 'qrcode_' . $m4is_nsjf : $m4is_qnjfv['id'];
 $m4is_qnjfv['style'] = "width:{$m4is_qnjfv['size']}px;height:{$m4is_qnjfv['size']}px; display:block; {$m4is_qnjfv['style']}";
 wp_enqueue_script('jquery-qrcode', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js', null, self::$m4is_bnd6ti->m4is_u04m(), true);
 $m4is_uzfw8j = "<p><div id=\"{$m4is_bq_t}\" style=\"{$m4is_qnjfv['style']}\" class=\"{$m4is_qnjfv['class']}\"></div></p>";
 $m4is_uzfw8j .= '
			<script>
			jQuery(document).ready(function() {
				jQuery("#' . $m4is_bq_t . '").qrcode({
					text : "' . $m4is_qnjfv['data'] . '",
					height : "' . $m4is_qnjfv['size'] . '",
					width : "' . $m4is_qnjfv['size'] . '"
				});
			});
			</script>';
 return $m4is_uzfw8j;
 }  static 
function m4is_la1b( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
    $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'feedurl' => 'http://feeds.feedburner.com/brainyquote/QUOTEBR', 'htmlattr' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = '';
 if ($m4is_qnjfv['feedurl'] > '') {  $m4is_p4jrc = fetch_feed($m4is_qnjfv['feedurl']);
 if (! is_a($m4is_p4jrc, 'WP_Error')) {  $m4is_r4m3h = $m4is_p4jrc->get_item_quantity(1);
 $m4is_npsq = $m4is_p4jrc->get_items(0, $m4is_r4m3h);
 $m4is_uzfw8j = '<span class="memberium_quotd_quote">' . $m4is_npsq[0]->get_description() . '<span> ' . '<span class="memberium_quotd_attribution">' . $m4is_npsq[0]->get_title() . '<span>';
 } } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_k2m0h( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (is_feed() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'capture' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } ob_start();
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_z50f = trim($m4is_z50f);
 $m4is_teq7 = self::$m4is_bnd6ti->m4is_wdqrsb('eval.php');
 $m4is_oa_z = include_once $m4is_teq7;
 if (! $m4is_oa_z) { error_log("Memberium: Eval Function Class file missing {$m4is_teq7}");
 if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { return "<p>ERROR: Eval Function Class file missing {$m4is_teq7}</p>";
 } } else { $m4is_oa_z = m4is_ejoxs5::evaluate($m4is_z50f, function($m4is_ca6q0f, $m4is_carw7y) { if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { global $post;
 $m4is_aocm8x = $m4is_ca6q0f->getMessage();
 $m4is_i_x0g = $m4is_ca6q0f->getLine();
 $m4is_cd8k = $post->ID;
 $m4is_wbgl5s = "Error in shortcode contents: {$m4is_aocm8x} at line {$m4is_i_x0g} in post ID {$m4is_cd8k}";
 $m4is_carw7y = htmlspecialchars($m4is_carw7y);
 error_log($m4is_wbgl5s);
 echo "<p><span style='color:red;font-weight:bold;'>Script Error:  </span>{$m4is_wbgl5s} / {$m4is_carw7y}</p>";
 } });
 } unset($m4is_z50f);
 $m4is_uzfw8j = ob_get_clean();
  return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], '', '', '');
 } static 
function m4is_rt7e( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (is_feed() ) { return '';
 } $m4is_r6nh_b = [ 'field' => 'language', 'default' => '', 'only' => '', 'except' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['field'] = strtolower($m4is_qnjfv['field']);
 $m4is_qnjfv['only'] = array_map('strtolower', array_filter(array_map('trim', explode(',', $m4is_qnjfv['only']) ) ) );
 $m4is_qnjfv['except'] = array_map('strtolower', array_filter(array_map('trim', explode(',', $m4is_qnjfv['except']) ) ) );
 $m4is_cxplv = m4is_wbc8os::m4is_sfnmc($m4is_qnjfv['field'], $m4is_qnjfv['default']);
 $m4is_b0gmh = m4is_ss2_7::m4is_qqi04c();
 $m4is_o0tads = (boolean) count($m4is_qnjfv['only']);
 $m4is_l6h1 = (boolean) count($m4is_qnjfv['except']);
 $m4is_b0gmh = apply_filters('memberium_language_class_list', $m4is_b0gmh);
  if (empty($m4is_cxplv) ) { $m4is_qnjfv['default'] = m4is_wbc8os::m4is_sfnmc('languages', $m4is_qnjfv['default']);
 } if ($m4is_o0tads || $m4is_l6h1) { foreach($m4is_b0gmh as $m4is_s2ge5 => $m4is_jm1_) { $m4is_jm1_ = strtolower($m4is_jm1_);
 if ($m4is_cxplv <> $m4is_jm1_) { if ($m4is_o0tads && ! in_array($m4is_jm1_, $m4is_qnjfv['only']) ) { unset($m4is_b0gmh[$m4is_s2ge5]);
 } if ($m4is_jm1_ <> $m4is_l6h1 && in_array($m4is_jm1_, $m4is_qnjfv['except']) ) { unset($m4is_b0gmh[$m4is_s2ge5]);
 } } } } unset($m4is_jm1_, $m4is_qnjfv['except'], $m4is_qnjfv['only'], $m4is_l6h1, $m4is_o0tads);
 $m4is_uzfw8j = '';
 foreach ($m4is_b0gmh as $m4is_c3t7f => $m4is_b05zi) { $m4is_uzfw8j .= '<option value="' . $m4is_c3t7f . '" ' . ( ($m4is_cxplv == strtolower($m4is_c3t7f) ) ? ' selected ' : ' ') . '>' . $m4is_b05zi . '</option>';
 } unset($m4is_c3t7f, $m4is_b05zi);
 m4is_aoxw::m4is_djr4nd();
 return $m4is_uzfw8j;
 } static 
function m4is_n8ofk( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) :string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (is_feed() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'default' => 'America/Los_Angeles', 'except' => '', 'field' => 'timezone', 'only' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['field'] = strtolower($m4is_qnjfv['field']);
 $m4is_qnjfv['only'] = array_map('strtolower', array_filter(array_map('trim', explode(',', $m4is_qnjfv['only']) ) ) );
 $m4is_qnjfv['except'] = array_map('strtolower', array_filter(array_map('trim', explode(',', $m4is_qnjfv['except']) ) ) );
 $m4is_jczwys = strtolower(trim (m4is_wbc8os::m4is_sfnmc($m4is_qnjfv['field'], $m4is_qnjfv['default']) ) );
 if (empty($m4is_jczwys) ) {   } $m4is_pjl0yk = m4is_kjmtw1::m4is_yj4s();
 $m4is_o0tads = (boolean) count($m4is_qnjfv['only']);
 $m4is_l6h1 = (boolean) count($m4is_qnjfv['except']);
 $m4is_pjl0yk = apply_filters('memberium_time_classzone_list', $m4is_pjl0yk);
 $m4is_uzfw8j = '';
 if ($m4is_o0tads || $m4is_l6h1) { foreach($m4is_pjl0yk as $m4is_s2ge5 => $m4is_grodai) { $m4is_grodai = strtolower($m4is_grodai);
 if ($m4is_jczwys <> $m4is_grodai) { if ($m4is_o0tads && ! in_array($m4is_grodai, $m4is_qnjfv['only']) ) { unset($m4is_pjl0yk[$m4is_s2ge5]);
 } if ($m4is_grodai <> $m4is_l6h1 && in_array($m4is_grodai, $m4is_qnjfv['except']) ) { unset($m4is_pjl0yk[$m4is_s2ge5]);
 } } } } unset($m4is_grodai, $m4is_qnjfv['except'], $m4is_qnjfv['only'], $m4is_l6h1, $m4is_o0tads);
 foreach ($m4is_pjl0yk as $m4is_ov60h => $m4is__dvb8) { $m4is_uzfw8j .= '<option value="' . $m4is_ov60h . '" ' . ( ($m4is_jczwys == strtolower($m4is_ov60h) ) ? ' selected ' : ' ') . '>' . $m4is__dvb8 . '</option>';
 } unset($m4is_ov60h, $m4is__dvb8);
 return $m4is_uzfw8j;
 } static 
function m4is_sx0l( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (is_feed() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
   $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'default' => '', 'field' => 'country_name', 'htmlattr' => '', 'ip_address' => m4is_vv5u::m4is_s15o8k(), 'provider' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['provider'] = strtolower(trim($m4is_qnjfv['provider']) );
 $m4is_qnjfv['field'] = strtolower(trim($m4is_qnjfv['field']) );
 $m4is_qnjfv['ip_address'] = empty($m4is_qnjfv['ip_address']) ? m4is_vv5u::m4is_s15o8k() : $m4is_qnjfv['ip_address'];
 $m4is_ahc2fb = m4is_sg9i6::m4is_on8t($m4is_qnjfv['ip_address'], $m4is_qnjfv['provider']);
 if ($m4is_qnjfv['field'] == 'country' ) $m4is_qnjfv['field'] = 'country_name';
 if ($m4is_qnjfv['field'] == 'province') $m4is_qnjfv['field'] = 'region_name';
 if ($m4is_qnjfv['field'] == 'region' ) $m4is_qnjfv['field'] = 'region_name';
 if ($m4is_qnjfv['field'] == 'state' ) $m4is_qnjfv['field'] = 'region_name';
 $m4is_w_o7al = isset($m4is_ahc2fb[$m4is_qnjfv['field']]) ? $m4is_ahc2fb[$m4is_qnjfv['field']] : $m4is_qnjfv['default'];
 $m4is_uzfw8j = htmlspecialchars($m4is_w_o7al);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_okjc( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return 'n/a';
 } global $wp_embed;
 return do_shortcode( $wp_embed->run_shortcode( $m4is_z50f ) );
 } static 
function m4is_w92of( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if (! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return 'n/a';
 } m4is_aoxw::m4is_djr4nd();
 global $wp_embed;
 $m4is_z50f = do_shortcode( $wp_embed->run_shortcode( $m4is_z50f ) );
 return m4is_crqo::m4is_sb62m9( $m4is_z50f );
 }  static 
function m4is_aizf( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'capture' => '', 'txtfmt' => '', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_uzfw8j = do_shortcode( m4is_crqo::m4is_t6b4e( $m4is_z50f ) );
 if ( ! empty( $m4is_qnjfv['txtfmt'] ) ) { $m4is_uzfw8j = m4is_crqo::m4is_mq57( $m4is_uzfw8j, $m4is_qnjfv['txtfmt'] );
 } if ( ! empty( $m4is_qnjfv['capture'] ) ) { $m4is_uzfw8j = m4is_crqo::m4is_uyv45q( $m4is_uzfw8j, $m4is_qnjfv['capture'] );
 } return $m4is_uzfw8j;
 } static 
function m4is_yyqpg( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'default' => 'United States', 'except' => '', 'field' => 'country', 'only' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['field'] = strtolower($m4is_qnjfv['field']);
 $m4is_qnjfv['only'] = array_map('strtolower', array_filter(array_map('trim', explode(',', $m4is_qnjfv['only']) ) ) );
 $m4is_qnjfv['except'] = array_map('strtolower', array_filter(array_map('trim', explode(',', $m4is_qnjfv['except']) ) ) );
 $m4is_ly58a = strtolower(trim(m4is_wbc8os::m4is_sfnmc($m4is_qnjfv['field'], $m4is_qnjfv['default']) ) );
 $m4is_o0tads = (boolean) count($m4is_qnjfv['only']);
 $m4is_l6h1 = (boolean) count($m4is_qnjfv['except']);
 $m4is_tru7i = apply_filters( 'memberium/country_list', self::$m4is_bnd6ti->m4is_se2n8()->getCountries() );
 if ($m4is_o0tads || $m4is_l6h1) { foreach($m4is_tru7i as $m4is_s2ge5 => $m4is_uwmf) { $m4is_uwmf = strtolower($m4is_uwmf);
 if ($m4is_ly58a <> $m4is_uwmf) { if ($m4is_o0tads && ! in_array($m4is_uwmf, $m4is_qnjfv['only']) ) { unset($m4is_tru7i[$m4is_s2ge5]);
 } if ($m4is_uwmf <> $m4is_l6h1 && in_array($m4is_uwmf, $m4is_qnjfv['except']) ) { unset($m4is_tru7i[$m4is_s2ge5]);
 } } } } unset($m4is_uwmf, $m4is_l6h1, $m4is_o0tads);
 $m4is_uzfw8j = '';
 foreach ($m4is_tru7i as $m4is_uwmf) { $m4is_uzfw8j .= '<option value="' . $m4is_uwmf . '" ' . ( ($m4is_ly58a == strtolower($m4is_uwmf) ) ? ' selected ' : ' ') . '>' . $m4is_uwmf . '</option>';
 } return $m4is_uzfw8j;
 } static 
function m4is_kgvk( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'date' => '', 'htmlattr' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = '';
 $m4is_dckze = 0;
 if ($m4is_qnjfv['date'] > '') { $m4is_dckze = (int) m4is_kjmtw1::m4is_gldrpj($m4is_qnjfv['date']);
 } if ($m4is_dckze < 0) { $m4is_uzfw8j = abs( $m4is_dckze ) . $m4is_qnjfv['before'];
 } elseif ($m4is_dckze > 0) { $m4is_uzfw8j = abs( $m4is_dckze ) . $m4is_qnjfv['after'];
 } else { $m4is_uzfw8j = 0;
 } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], '', '');
 } static 
function m4is_oljv_( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } static $m4is_bq_t = 0;
 if (! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } if (is_feed() ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'class' => 'memberium_message', 'names' => '', 'style' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_bq_t++;
 $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['names'] = array_filter(array_map('trim', explode(',', $m4is_qnjfv['names']) ) );
 $m4is_zds0g = [];
 if (! empty($_SESSION['flash']) ) { if (empty($m4is_qnjfv['names']) ) { foreach($_SESSION['flash'] as $m4is_s2ge5 => $m4is_wbgl5s) { $m4is_zds0g[] = $m4is_wbgl5s;
 unset($_SESSION['flash'][$m4is_s2ge5]);
 } } else { foreach($m4is_qnjfv['names'] as $name) { if (! empty($_SESSION['flash'][$name]) ) { $m4is_zds0g[] = $name;
 unset($_SESSION['flash'][$name]);
 } } } } $m4is_uzfw8j = '';
 foreach($m4is_zds0g as $m4is_wbgl5s) { if (empty($m4is_qnjfv['before']) && empty($m4is_qnjfv['after']) ) { $m4is_uzfw8j .= '<div class="' . $m4is_qnjfv['class'] . '" style="' . $m4is_qnjfv['style'] . '">' . $m4is_wbgl5s . '</div>';
 } else { $m4is_uzfw8j .= $m4is_qnjfv['before'] . $m4is_wbgl5s . $m4is_qnjfv['after'];
 } } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 } static 
function m4is_krv_4s( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return 'n/a';
 } return do_shortcode(do_shortcode(m4is_crqo::m4is_t6b4e($m4is_z50f) ) );
 } static 
function m4is_rlqzi( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'htmlattr' => '', 'value' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = $m4is_qnjfv['value'];
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, '', '', $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } static 
function m4is_rjzti( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'end' => 1, 'start' => 0, 'step' => 1, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = '';
  return $m4is_uzfw8j;
 } }

