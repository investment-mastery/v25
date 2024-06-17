<?php
/**
 * Copyright (c) 2017-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_jmf3::m4is_x6wv();
 final 
class m4is_jmf3 { static private $m4is_bnd6ti;
 static private $m4is_zq0k;
 static private $m4is_e2kg;
 static private $m4is_o3m_c5;
  static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr('appname');
 self::$m4is_e2kg = (int) self::$m4is_bnd6ti->m4is_dpuy9();
 self::$m4is_o3m_c5 = ! m4is_u68pu::m4is_u6mkaw();
 }  static 
function m4is_mrnf1( $m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { static $m4is_xb09 = 0;
 if ( self::$m4is_o3m_c5 ) { return '';
 } if ( is_feed() || ! is_singular() ) { return '';
 } $m4is_xb09++;
 $m4is_r6nh_b = [ 'class' => '', 'label' => 'Open Affiliate Dashboard', 'style' => '', ];
 if ( isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts' ) { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_e2kg = self::$m4is_e2kg;
 if ( empty( self::$m4is_e2kg ) ) { return '';
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_pa8jw = m4is_pk8phc::m4is_rbugf( self::$m4is_e2kg );
 $m4is__b5x37 = m4is_pk8phc::m4is_lx94($m4is_pa8jw);
 $m4is_lvqogh = isset($m4is__b5x37['Status']) ? $m4is__b5x37['Status'] : 0;
 $m4is_ms_j = isset($m4is__b5x37['AffCode']) ? $m4is__b5x37['AffCode'] : '';
 $m4is_pn7m1j = isset($m4is__b5x37['Password']) ? $m4is__b5x37['Password'] : '';
 if (empty($m4is_lvqogh) || empty($m4is_ms_j) || empty($m4is_pn7m1j) ) { return '';
 } $m4is_zq0k = self::$m4is_zq0k;
 $m4is_etj2 = new stdClass;
 $m4is_etj2->form_name = "memb_affiliate_login_{$m4is_xb09}";
 $m4is_etj2->appname = self::$m4is_zq0k;
 $m4is_etj2->action = sprintf( 'https://%s.infusionsoft.com/j_spring_security_check', self::$m4is_zq0k );
 $m4is_etj2->affiliate_code = $m4is_ms_j;
 $m4is_etj2->affiliate_password = $m4is_pn7m1j;
 $m4is_etj2->button_label = $m4is_qnjfv['label'];
 $m4is_etj2->button_style = $m4is_qnjfv['style'];
 $m4is_etj2->button_class = $m4is_qnjfv['class'];
 m4is_aoxw::m4is_djr4nd();
 return m4is_crqo::m4is_yu7b1r($m4is_carw7y, $m4is_qnjfv, $m4is_z50f, $m4is_carw7y, $m4is_etj2);
 }  static 
function m4is_jtid5($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'fields' => '', 'htmlattr' => '', 'separator' => ' ', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 if (empty($m4is_qnjfv['fields']) ) { return '';
 } $m4is_e2kg = self::$m4is_e2kg;
 if (empty( self::$m4is_e2kg ) ) { return '';
 } if (! m4is_u68pu::m4is_u6mkaw() ) { return '';
 } $m4is_uzfw8j = '';
 $m4is_pa8jw = m4is_pk8phc::m4is_rbugf($m4is_e2kg);
 if ($m4is_pa8jw) { $m4is__b5x37 = array_change_key_case(m4is_pk8phc::m4is_lx94($m4is_pa8jw));
 if (! empty($m4is__b5x37) ) { $m4is_h_iu0 = array_filter(explode(',', $m4is_qnjfv['fields']));
 foreach ($m4is_h_iu0 as $m4is_yxwn) { $m4is_yxwn = strtolower(trim($m4is_yxwn) );
 $m4is_n6yjk9 = !empty($m4is__b5x37[$m4is_yxwn]) ? $m4is__b5x37[$m4is_yxwn] : '';
  $m4is_uzfw8j .= $m4is_n6yjk9;
 if (count($m4is_h_iu0) > 1) { $m4is_uzfw8j .= $m4is_qnjfv['separator'];
 } } } } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 }  static 
function m4is_kg48f($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } static $m4is_ereh = [];
 m4is_aoxw::m4is_djr4nd();
      $m4is_e2kg = m4is_wbc8os::m4is_jjgo();
 $m4is_r6nh_b = [ 'affiliate_id' => isset( $_SESSION['keap']['affiliate']['id'] ) ? $_SESSION['keap']['affiliate']['id'] : m4is_pk8phc::m4is_rbugf( $m4is_e2kg ), 'after' => '', 'before' => '', 'capture' => '', 'default' => '0.00', 'fields' => 'running_balance', 'format' => 'USD', 'htmlattr' => '', 'separator' => '', 'txtfmt' => '',  ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 if ( empty( $m4is_qnjfv['affiliate_id'] ) ) { return '';
 } $m4is_exnb = [$m4is_qnjfv['affiliate_id']];
 $m4is_qnjfv['fields'] = array_filter( explode( ',', strtolower( $m4is_qnjfv['fields'] ) ) );
 $m4is_uzfw8j = '';
 $m4is_veymi8 = [ 'amountearned' => 'amount_earned', 'runningbalance' => 'running_balance', ];
 foreach( $m4is_qnjfv['fields'] as $m4is_s2ge5 => $m4is_w_o7al ) { if ( array_key_exists( $m4is_w_o7al, $m4is_veymi8 ) ) { $m4is_qnjfv['fields'][$m4is_s2ge5] = $m4is_veymi8[$m4is_w_o7al];
 } } $m4is_pc9k = m4is_pk8phc::m4is_jcl6og( $m4is_qnjfv['affiliate_id']) ;
 $m4is_pc9k = array_change_key_case($m4is_pc9k, CASE_LOWER);
 $m4is_ereh[ $m4is_qnjfv['affiliate_id'] ] = $m4is_pc9k;
 if ( empty( $m4is_ereh[ $m4is_qnjfv['affiliate_id'] ] ) ) { if ( ! is_array( $m4is_pc9k ) ) { return '';
 } } else { $m4is_pc9k = $m4is_ereh[$m4is_qnjfv['affiliate_id']];
 } if ( class_exists( 'NumberFormatter' ) ) { $m4is_njsi = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
 } if (is_array($m4is_qnjfv['fields'])) { foreach($m4is_qnjfv['fields'] as $field) { if (class_exists('NumberFormatter')) { $m4is_o8gzjl = $m4is_njsi->formatCurrency($m4is_pc9k[$field], $m4is_qnjfv['format']);
 } else { $m4is_o8gzjl = $m4is_pc9k[$field];
 } $m4is_uzfw8j .= (isset($m4is_pc9k[$field]) ? $m4is_o8gzjl : $m4is_qnjfv['default']) . $m4is_qnjfv['separator'];
 } } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 }  static 
function m4is_as2zjy($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'capture' => '', 'txtfmt' => '', 'not' => '', ];
 if ( isset( $m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_zg8z = m4is_wbc8os::m4is_iqywok('status');
 if (! empty($m4is_zg8z) ) { $m4is_oa_z = (boolean) $m4is_zg8z || self::$m4is_bnd6ti->m4is_lvmz1b();
 } else { $m4is_oa_z = 0;
 } $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, TRUE, $m4is_oa_z);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 }  static 
function m4is_axam($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if ( is_feed() ) { return '';
 } if ( isset( $m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts' ) { return 'n/a';
 } m4is_aoxw::m4is_djr4nd();
 if (! isset( $_SESSION['infusionsoft_affiliate'] ) ) { self::$m4is_bnd6ti->m4is_dpsq6f();
 } return '';
 }  static 
function m4is_mbt4($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'capture' => '', 'affiliate_id' => false, 'not' => '', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['not'] = ! empty($m4is_qnjfv['not']);
 $m4is_i7vyag = isset($_SESSION['infusionsoft_affiliate']) ? $_SESSION['infusionsoft_affiliate'] : 0;
 if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { $m4is_uwdfj = true;
 } else { if (stripos($m4is_carw7y, '_not_') ) { $m4is_qnjfv['not'] = true;
 } if ($m4is_qnjfv['affiliate_id'] && $m4is_qnjfv['affiliate_id'] == $m4is_i7vyag) { $m4is_uwdfj = true;
 } else { $m4is_uwdfj = false;
 } } if ($m4is_qnjfv['not']) { $m4is_uwdfj = ! $m4is_uwdfj;
 } $m4is_uzfw8j = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is_uwdfj);
 return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 }  static 
function m4is_r7cloz($m4is_qnjfv, string $m4is_z50f = '', string $m4is_carw7y = '') : string { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'date_format' => '', 'default' => '', 'fields' => '', 'htmlattr' => '', 'separator' => ' ', 'txtfmt' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_e2kg = self::$m4is_bnd6ti->m4is_dpuy9();
  $m4is_pa8jw = self::$m4is_bnd6ti->m4is_q9of8a($m4is_e2kg);
 if ($m4is_pa8jw) { $m4is_zsi5 = m4is_pk8phc::m4is_lx94($m4is_pa8jw);
 $m4is_e2kg = isset($m4is_zsi5['ContactId']) ? (int) $m4is_zsi5['ContactId'] : 0;
 } else { $m4is_e2kg = 0;
 } if ($m4is_e2kg < 1) { return '';
 }  if (empty($m4is_qnjfv['fields']) ) { return '';
 } if ($m4is_e2kg <> m4is_wbc8os::m4is_jjgo() ) { $m4is_ereh = m4is_bnrdbo::m4is_yvnol($m4is_e2kg, true);
 } else { $m4is_ereh = $_SESSION['keap']['contact'];
 } $m4is_h_iu0 = explode(',', $m4is_qnjfv['fields']);
 $m4is_l436 = count($m4is_h_iu0);
 $m4is_i7j9_a = 0;
  $m4is_uzfw8j = '';
 foreach ($m4is_h_iu0 as $m4is_yxwn) { $m4is_yxwn = strtolower(trim($m4is_yxwn) );
 if (isset($m4is_ereh[$m4is_yxwn]) ) { $m4is_mb6gy = strtotime($m4is_ereh[$m4is_yxwn]);
 if ($m4is_qnjfv['date_format'] == '' || $m4is_mb6gy == 0) { $m4is_n6yjk9 = isset($m4is_ereh[$m4is_yxwn]) ? $m4is_ereh[$m4is_yxwn] : '';
 } else { $m4is_n6yjk9 = date($m4is_qnjfv['date_format'], strtotime($m4is_ereh[$m4is_yxwn]) );
 } } else { $m4is_n6yjk9 = $m4is_qnjfv['default'];
 } $m4is_uzfw8j .= $m4is_n6yjk9;
 if ($m4is_l436 > 1) { $m4is_uzfw8j .= $m4is_qnjfv['separator'];
 } } if ($m4is_l436 > 1 && strlen($m4is_qnjfv['separator']) > 0) { $m4is_uzfw8j = substr($m4is_uzfw8j, 0, -strlen($m4is_qnjfv['separator']) );
 } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 } }

