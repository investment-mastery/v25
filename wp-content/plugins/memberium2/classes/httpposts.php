<?php
/**
* Copyright (c) 2021-2024 David J Bullock
* Web Power and Light, LLC
* https://webpowerandlight.com
* support@webpowerandlight.com
*
*/

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_fgf40 { private $m4is_bnd6ti;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  
function __construct() { $this->m4is_x6wv();
 $this->m4is_kdgs();
 } private 
function m4is_x6wv() { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 }  
function m4is_kdgs() { $i2sdk_options = $this->m4is_bnd6ti->get_i2sdk_options();
  if (isset($_GET['i4w_sync_user']) && $_GET['i4w_sync_user'] == substr($i2sdk_options['api_key'], 0, 6) ) { $_GET['operation'] = 'update-contact';
 } $m4is_sxye = trim(strtolower($_GET['operation']) );
 $m4is_gyk4cw = [     ];
 $m4is_gyk4cw = apply_filters('memberium/httpppost_services/register', $m4is_gyk4cw);
 if (array_key_exists($m4is_sxye, $m4is_gyk4cw) ) { $this->m4is_bnd6ti->m4is_xb8k(true);
 m4is_aoxw::m4is_djr4nd();
 add_action('i2sdk_http_post', $m4is_gyk4cw[$m4is_sxye], 10, 2 );
 } }  
function m4is_nt49w() { $m4is_xxcq3i = isset($_GET['debug']) ? TRUE : FALSE;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 $m4is_e2kg = isset($_POST['Id']) ? (int) $_POST['Id'] : 0;
 if (! $m4is_e2kg) { return;
 } $m4is__xn_jt = [];
 $m4is_j0bd = [ 'Country' => 'PostalCode', 'Country2' => 'PostalCode2', 'Country3' => 'PostalCode3', ];
 $m4is_zbmh = [ 'United States' => '/^\d{5}(-\d{4})?$/', 'Canada' => '/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/', 'United Kingdom' => '/^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/', ];
 if ($m4is_xxcq3i) { echo __LINE__, " - Set Contact ID: {$m4is_e2kg}\n";
 echo __LINE__, " - Set Country: {$_POST['Country']}\n";
 echo __LINE__, " - Set Country: {$_POST['Country2']}\n";
 echo __LINE__, " - Set Country: {$_POST['Country3']}\n";
 }  foreach ($m4is_j0bd as $m4is_i6en=>$m4is_w9zp) { if ($_POST[$m4is_i6en] == '' && $_POST[$m4is_w9zp] > '') { foreach ($m4is_zbmh as $m4is_y5tbo9 => $country_regex) { if (preg_match($country_regex, $_POST[$m4is_w9zp]) ) { $_POST[$m4is_i6en] = $m4is_y5tbo9;
 $m4is__xn_jt[$m4is_i6en] = $m4is_y5tbo9;
 if ($m4is_xxcq3i) echo __LINE__, " - Set {$_POST[$m4is_i6en]} to {$m4is_y5tbo9}\n";
 } } } } if ($m4is_xxcq3i) echo __LINE__, " - Updated Fields: ", print_r($m4is__xn_jt, TRUE), "\n";
 if (count($m4is__xn_jt) ) { m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt, true);
  if ($m4is_xxcq3i) echo __LINE__, " - Updated Contact Id: ", print_r($m4is_e2kg, TRUE), "\n";
 if ($m4is_xxcq3i) echo __LINE__, " - Synced Contact Id: ", print_r($m4is_e2kg, TRUE), "\n";
 $this->m4is_bnd6ti->m4is_m3vz($m4is_e2kg);
 if ($m4is_xxcq3i) { echo __LINE__, " - Cleared Cache Namespace\n";
 echo __LINE__, " - Contact Updated\n";
 } } $this->m4is_bnd6ti->m4is_q285('send_http_post');
 echo 'Operation Completed';
 }   
function m4is_c85uc() { $m4is_xxcq3i = isset($_GET['debug']) ? true : false;
 if ($m4is_xxcq3i) echo __LINE__, " - Debug Mode Enabled\n";
 $m4is_e2kg = (int) $_POST['Id'];
 $m4is__xn_jt = [];
 $m4is_hng4z = NULL;
 if ($m4is_xxcq3i) echo __LINE__, " - Set Contact ID: {$m4is_e2kg}\n";
 if ($_POST['PostalCode'] > '') { switch ($_POST['Country']) { case 'Canada': switch (strtolower($_POST['PostalCode'], 0, 1) ) { case 'a': $m4is_hng4z = 'NL';
 break;
 case 'b': $m4is_hng4z = 'NS';
 break;
 case 'c': $m4is_hng4z = 'PE';
 break;
 case 'g': case 'h': case 'j': $m4is_hng4z = 'QC';
 break;
 case 'k': case 'l': case 'm': case 'n': case 'p': $m4is_hng4z = 'ON';
 break;
 case 's': $m4is_hng4z = 'SK';
 break;
 case 't': $m4is_hng4z = 'AB';
 break;
 case 'v': $m4is_hng4z = 'BC';
 break;
 case 'x': $m4is_hng4z = 'NT';
 break;
 case 'y': $m4is_hng4z = 'YT';
 break;
 } switch (strtolower($_POST['PostalCode'], 0, 3) ) { case 'x0a': case 'x0b': case 'x0c': $m4is_hng4z = 'NU';
 break;
 } break;
 case 'United States': $m4is_czavu = [ ['region'=>'MA', 'min'=>'01001', 'max'=>'05544'], ['region'=>'RI', 'min'=>'02801', 'max'=>'02940'], ['region'=>'NH', 'min'=>'00210', 'max'=>'00215'], ['region'=>'NH', 'min'=>'03031', 'max'=>'03897'], ['region'=>'ME', 'min'=>'03901', 'max'=>'04992'], ['region'=>'VT', 'min'=>'05001', 'max'=>'05907'], ['region'=>'CT', 'min'=>'06001', 'max'=>'06928'], ['region'=>'NJ', 'min'=>'07001', 'max'=>'08989'], ['region'=>'NY', 'min'=>'00501', 'max'=>'00544'], ['region'=>'NY', 'min'=>'06390', 'max'=>'06390'], ['region'=>'NY', 'min'=>'10001', 'max'=>'14925'], ['region'=>'PA', 'min'=>'15001', 'max'=>'19640'], ['region'=>'DE', 'min'=>'19701', 'max'=>'19980'], ['region'=>'DC', 'min'=>'20001', 'max'=>'20599'], ['region'=>'VA', 'min'=>'20101', 'max'=>'24658'], ['region'=>'MD', 'min'=>'20601', 'max'=>'21930'], ['region'=>'WV', 'min'=>'24701', 'max'=>'26886'], ['region'=>'NC', 'min'=>'27006', 'max'=>'28909'], ['region'=>'SC', 'min'=>'29001', 'max'=>'29945'], ['region'=>'GA', 'min'=>'30002', 'max'=>'39901'], ['region'=>'FL', 'min'=>'32004', 'max'=>'34997'], ['region'=>'AL', 'min'=>'35004', 'max'=>'36925'], ['region'=>'TN', 'min'=>'37010', 'max'=>'38589'], ['region'=>'MS', 'min'=>'38601', 'max'=>'39776'], ['region'=>'KY', 'min'=>'40003', 'max'=>'42788'], ['region'=>'OH', 'min'=>'43001', 'max'=>'45999'], ['region'=>'IN', 'min'=>'46001', 'max'=>'47997'], ['region'=>'MI', 'min'=>'48001', 'max'=>'49971'], ['region'=>'IA', 'min'=>'50001', 'max'=>'52809'], ['region'=>'WI', 'min'=>'53001', 'max'=>'54990'], ['region'=>'MN', 'min'=>'55001', 'max'=>'56763'], ['region'=>'SD', 'min'=>'57001', 'max'=>'57799'], ['region'=>'ND', 'min'=>'58001', 'max'=>'58856'], ['region'=>'MT', 'min'=>'59001', 'max'=>'59937'], ['region'=>'IL', 'min'=>'60001', 'max'=>'62999'], ['region'=>'MS', 'min'=>'63001', 'max'=>'65899'], ['region'=>'KS', 'min'=>'66002', 'max'=>'67954'], ['region'=>'NE', 'min'=>'68001', 'max'=>'69367'], ['region'=>'NE', 'min'=>'68001', 'max'=>'69367'], ['region'=>'LA', 'min'=>'70001', 'max'=>'71497'], ['region'=>'AR', 'min'=>'71601', 'max'=>'72959'], ['region'=>'OK', 'min'=>'73001', 'max'=>'74966'], ['region'=>'TX', 'min'=>'73301', 'max'=>'88595'], ['region'=>'CO', 'min'=>'80001', 'max'=>'81658'], ['region'=>'WY', 'min'=>'82001', 'max'=>'83128'], ['region'=>'ID', 'min'=>'83201', 'max'=>'83888'], ['region'=>'UT', 'min'=>'84001', 'max'=>'84791'], ['region'=>'AZ', 'min'=>'85001', 'max'=>'86556'], ['region'=>'NM', 'min'=>'87001', 'max'=>'88441'], ['region'=>'NV', 'min'=>'88901', 'max'=>'89883'], ['region'=>'HI', 'min'=>'96701', 'max'=>'96898'], ['region'=>'OR', 'min'=>'97001', 'max'=>'97920'], ['region'=>'AK', 'min'=>'99501', 'max'=>'99950'], ['region'=>'WA', 'min'=>'98001', 'max'=>'99403'], ];
  break;
 } } if ($m4is_xxcq3i) echo __LINE__, " - Set Contact ID: {$m4is_e2kg}\n";
 if (count($m4is__xn_jt) ) { $m4is_e2kg = m4is_bnrdbo::m4is_cseh($m4is_e2kg, $m4is__xn_jt);
  $this->m4is_bnd6ti->m4is_leu58($m4is_e2kg);
 $this->m4is_bnd6ti->m4is_m3vz($m4is_e2kg);
 $debug_message .= "\n\n" . 'Contact Updated';
 } $this->m4is_bnd6ti->m4is_q285('send_http_post');
 echo 'Operation Completed';
 } }

