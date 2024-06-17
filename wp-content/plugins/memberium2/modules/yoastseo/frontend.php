<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_n7gorq { static 
function m4is_e5l8a9() { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self();
 } private 
function __construct() { } private 
function m4is_r4i6uh() { if (class_exists('Yoast_GA_Options') ) { } add_filter( 'yoast-ga-custom-vars', [ $this, 'm4is_n_nd' ], 10, 2 );
 }  
function m4is_n_nd($m4is_wmjz, $m4is_ikvh) { m4is_aoxw::m4is_djr4nd();
 $m4is_d2vjs = (array) $this->m4is_bnd6ti->m4is_oiewvu('ga_customvars');
 if (is_array($m4is_d2vjs) ) { foreach ($m4is_d2vjs as $m4is_g69k) { unset($m4is_zhn2u);
 unset($m4is_yxwn);
 switch ($m4is_g69k['variable']) { case '!system.membership_level': $m4is_zhn2u = isset($_SESSION['memb_user']['membership_level']) ? $_SESSION['memb_user']['membership_level'] : '';
 break;
 case '!system.membership_name': $m4is_zhn2u = isset($_SESSION['memb_user']['membership_names']) ? $_SESSION['memb_user']['membership_names'] : '';
 break;
 case '!system.remote_auth': $m4is_zhn2u = isset($_SESSION['memb_user']['remote_auth']) ? $_SESSION['memb_user']['remote_auth'] : '';
 break;
 case '!system.source': $m4is_zhn2u = isset($_SESSION['memb_user']['source']) ? $_SESSION['memb_user']['source'] : '';
 break;
 } if (substr($m4is_g69k['variable'], 0, 9) == '!contact.') { $m4is_yxwn = strtolower(substr($m4is_g69k['variable'], 9) );
 } if (substr($m4is_g69k['variable'], 0, 11) == '!affiliate.') { $m4is_yxwn = 'affiliate.' . strtolower( substr( $m4is_g69k['variable'], 11 ) );
 } if (! empty($m4is_yxwn) ) { $m4is_zhn2u = m4is_wbc8os::m4is_sfnmc($m4is_yxwn);
 } $m4is_wmjz[] = "'_setCustomVar'," . $m4is_ikvh . ",'" . addslashes($m4is_g69k['name']) . "','" . addslashes($m4is_zhn2u) . "', 3";
 $m4is_ikvh++;
 } } return $m4is_wmjz;
 } }

