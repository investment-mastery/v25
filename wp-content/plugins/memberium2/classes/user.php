<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_wbc8os { const USER_FIELD = 'memberium::field::';
 const SESSION_KEY = 'memberium/session';
 static private $users = [];
 private $session = [];
 private $dirty = false;
 private $contact_id = 0;
 private $user_id = 0;
 private $defer_save = false;
     static 
function m4is_e5l8a9(int $m4is_ig9p6, bool $regen = false) { if (! array_key_exists($m4is_ig9p6, self::$users) ) { self::$users[$m4is_ig9p6] = new m4is_wbc8os($m4is_ig9p6, $regen);
 } return self::$users[$m4is_ig9p6];
 }  static 
function m4is_t7qz() { return array_keys(self::$users);
 } static 
function m4is_aai49z($m4is_ig9p6) { unset(self::$users[$m4is_ig9p6]);
 }  private 
function __construct($m4is_ig9p6 = 0, $m4is_em1l = false) { $this->user_id = $m4is_ig9p6;
 if ($m4is_em1l) { $this->m4is_akz3();
 } $this->session = $this->m4is_g1ym96();
 } 
function __destruct() { if ($this->dirty) { $this->m4is_y9zi();
 } unset(self::$users[$this->user_id]);
 } 
function m4is_oqxav6( bool $m4is_rs_zx = true ) { $this->defer_save = (bool) $m4is_rs_zx;
 if (! $m4is_rs_zx) { if ($this->dirty) { $this->m4is_y9zi();
 } } } 
function m4is_y9zi( array $m4is_etj2 ) { update_user_meta( $this->user_id, self::SESSION_KEY, $m4is_etj2 );
 $this->dirty = false;
 } 
function m4is_g1ym96() { $m4is_etj2 = get_user_meta($this->user_id, self::SESSION_KEY, true);
 if (! empty($m4is_etj2) ) { $this->session = $m4is_etj2;
 } else { $this->session = $this->m4is_akz3();
 } return $this->session;
 } 
function m4is_nekv() { $this->session = [];
 delete_user_meta($this->user_id, self::SESSION_KEY);
 }    
function m4is_fkajlu( $m4is_s2ge5, $m4is_koi38 = '' ) { $m4is_s2ge5 = strtolower( trim( $m4is_s2ge5 ) );
 return isset( $this->session['keap']['affiliate'][$m4is_s2ge5] ) ? $this->session['keap']['affiliate'][$m4is_s2ge5] : $m4is_koi38;
 } 
function m4is_jlxitv( string $m4is_s2ge5, $m4is_w_o7al ) { $m4is_s2ge5 = strtolower( trim( $m4is_s2ge5 ) );
 $this->session['keap']['affiliate'][$m4is_s2ge5] = $m4is_w_o7al;
 if (! $this->defer_save) { $this->m4is_y9zi();
 } return $m4is_w_o7al;
 } 
function m4is_oc8pb($m4is_s2ge5, $m4is_w_o7al ) { $m4is_s2ge5 = strtolower(trim($m4is_s2ge5) );
 $this->session['keap']['contact'][$m4is_s2ge5] = $m4is_w_o7al;
 if (! $this->defer_save) { $this->m4is_y9zi();
 } return $m4is_w_o7al;
 } 
function m4is_vrzp($m4is_s2ge5 = '', $m4is_koi38 = '') { $m4is_s2ge5 = strtolower(trim($m4is_s2ge5) );
 return isset($this->session['keap']['contact'][$m4is_s2ge5]) ? $this->session['keap']['contact'][$m4is_s2ge5] : $m4is_koi38;
 }    
function m4is_ayaw2c($m4is_pcve = '', $m4is_s2ge5 = '', $m4is_koi38 = '') { if (empty($m4is_pcve) ) { return $this->session;
 } if (empty($m4is_s2ge5) ) { return $this->session[$m4is_pcve];
 } return isset($this->session[$m4is_pcve][$m4is_s2ge5]) ? $this->session[$m4is_pcve][$m4is_s2ge5] : $m4is_koi38;
 } 
function m4is_hvuh($m4is_pcve = '', $m4is_s2ge5 = '', $m4is_w_o7al = '') { if (empty ($m4is_pcve) || empty ($m4is_s2ge5) ) { return $this->session[$m4is_pcve];
 } $m4is_w_o7al = isset($this->session[$m4is_pcve][$m4is_s2ge5]) ? $this->session[$m4is_pcve][$m4is_s2ge5] : $m4is_koi38;
 $this->dirty = true;
 if (! $this->defer_save) { $this->m4is_y9zi();
 } return $m4is_w_o7al;
 } 
function m4is_b6xzj($m4is_pcve = '', $m4is_s2ge5 = '') { if (empty($m4is_pcve) || empty($m4is_s2ge5) ) { return false;
 } unset($this->session[$m4is_pcve][$m4is_s2ge5]);
 $this->m4is_y9zi();
 return true;
 }    static 
function m4is_ehvrpa($m4is_iqdn = '', $m4is_w_o7al = '', $m4is_ig9p6 = 0) { $m4is_iqdn = strtolower(trim($m4is_iqdn) );
 $m4is_ig9p6 = empty($m4is_ig9p6) ? get_current_user_id() : $m4is_ig9p6;
 if ( (! $m4is_ig9p6) || empty($m4is_iqdn) ) { return false;
 } update_user_meta($m4is_ig9p6, self::USER_FIELD . $m4is_iqdn, $m4is_w_o7al);
 } static 
function m4is_u3dzkp( $m4is_iqdn = '', $m4is_ig9p6 = false) { $m4is_iqdn = strtolower(trim($m4is_iqdn) );
 $m4is_ig9p6 = empty( $m4is_ig9p6 ) ? get_current_user_id() : $m4is_ig9p6;
 if ( (! $m4is_ig9p6) || empty($m4is_iqdn) ) { return false;
 }  return get_user_meta($m4is_ig9p6, self::USER_FIELD . $m4is_iqdn, true);
 } static 
function m4is_jjgo() : int { $m4is_e2kg = 0;
 if (isset($_SESSION['memb_user']['crm_id']) ) { $m4is_e2kg = (int) $_SESSION['memb_user']['crm_id'];
 } elseif( is_user_logged_in() ) { $m4is_ig9p6 = get_current_user_id();
 $m4is_e2kg = (int) get_user_meta( $m4is_ig9p6, 'infusionsoft_user_id', true );
 } return $m4is_e2kg ;
 } static 
function m4is_mz_rq( string $m4is_s2ge5, $m4is_w_o7al = '' ) { $m4is_s2ge5 = strtolower( trim( $m4is_s2ge5 ) );
 if ( empty( $m4is_s2ge5 ) ) { return;
 } $_SESSION['keap']['contact'][$m4is_s2ge5] = $m4is_w_o7al;
 }  static 
function m4is_iqywok( string $m4is_s2ge5, string $m4is_koi38 = '' ) : string { return isset( $_SESSION['keap']['affiliate'][$m4is_s2ge5] ) ? $_SESSION['keap']['affiliate'][$m4is_s2ge5] : $m4is_koi38;
 }  static 
function m4is_sfnmc( string $m4is_s2ge5, string $m4is_koi38 = '' ) : string { $m4is_s2ge5 = strtolower( $m4is_s2ge5 );
 return isset( $_SESSION['keap']['contact'][$m4is_s2ge5] ) ? $_SESSION['keap']['contact'][$m4is_s2ge5] : $m4is_koi38;
 } static 
function m4is_r4eo($m4is_w_8g = [], $m4is_mpia = 0) { if (empty($m4is_w_8g['FirstName']) || empty($m4is_w_8g['Email']) ) { return false;
 } if ( get_user_by('email', $m4is_w_8g['Email']) || get_user_by('login', $m4is_w_8g['Email'] ) ) { return false;
 } $m4is_e2kg = 0;
 $m4is_dcf_7 = m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('settings', 'password_field', 'Password');
  if (empty($m4is_w_8g[$m4is_dcf_7]) ) { $m4is_w_8g[$m4is_dcf_7] = m4is_pms8y::m4is_e5l8a9()->m4is_e9m0g();
 }   if (! $m4is_e2kg) { }  if ($m4is_mpia) { }  } }

