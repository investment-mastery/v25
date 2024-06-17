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
class m4is_k78c {  private static 
function m4is_p6f2l() : array { return [ 'American Express' => ['34', '37'], 'China UnionPay' => ['62', '88'], 'Diners Club Carte Blanche' => ['300', '305'], 'Diners Club International' => ['300', '305', '309', '36', '38,39'], 'Diners Club' => ['54', '55'], 'Discover Card' => ['6011', '622126', '622925', '644,649', '65'], 'JCB' => ['3528', '3589'], 'Laser' => ['6304', '6706', '6771', '6709'], 'Maestro' => ['5018', '5020', '5038', '5612', '5893', '6304', '6759', '6761', '6762', '6763', '0604', '6390'], 'Dankort' => ['5019'], 'MasterCard' => ['50', '55'], 'Visa' => ['4'], 'Visa Electron' => ['4026', '417500', '4405', '4508', '4844', '4913', '4917'], ];
 }  static 
function m4is_cdru( string $m4is_cfrc2l ) : string { $m4is_u23rl = 'Unknown';
 $m4is_ima9 = self::m4is_p6f2l();
 foreach( $m4is_ima9 as $m4is_t5ot4 => $m4is_kk81yr ) { foreach( $m4is_kk81yr as $m4is_qqwj1c ) { if ( strpos( $m4is_qqwj1c, ',' ) ) { $m4is_dqgzh_ = array_filter( explode( ',', $m4is_qqwj1c ) );
 $m4is_xa86 = substr( $m4is_cfrc2l, 0, strlen( $m4is_dqgzh_[0] ) );
 if ( $m4is_xa86 >= $m4is_dqgzh_[0] and $m4is_xa86 <= $m4is_dqgzh_[1] ) { $m4is_u23rl = $m4is_t5ot4;
 } } else {  if ( strpos( $m4is_cfrc2l, $m4is_qqwj1c) === 0 ) { $m4is_u23rl = $m4is_t5ot4;
 } } } } return $m4is_u23rl;
 }  static 
function m4is_neax( string $m4is_xa86 ) : bool { $m4is_xa86 = preg_replace( '/\D/', '', $m4is_xa86 );
 $m4is_vdbco = strlen( $m4is_xa86 );
 $m4is_vwa4_h = $m4is_vdbco % 2;
 $m4is_kmtfz4 = 0;
 for ( $m4is_tiq5k6 = 0;
 $m4is_tiq5k6 < $m4is_vdbco;
 $m4is_tiq5k6++ ) { $m4is_oxgs5 = $m4is_xa86[$m4is_tiq5k6];
  if ($m4is_tiq5k6 % 2 == $m4is_vwa4_h) { $m4is_oxgs5 *= 2;
  if ($m4is_oxgs5 > 9) { $m4is_oxgs5-=9;
 } }  $m4is_kmtfz4+=$m4is_oxgs5;
 }  return ($m4is_kmtfz4 % 10 == 0) ? true : false;
 } }

