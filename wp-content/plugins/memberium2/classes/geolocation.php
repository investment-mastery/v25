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
class m4is_sg9i6 { const DEFAULT_PROVIDER = 'query_extreme';
 static 
function m4is_on8t($m4is_lv7wu = '', $m4is_el8x2 = '') {  $m4is_zl4avm = self::m4is_xtpds();
 if ($m4is_el8x2 == 'query_geoip' && ! function_exists('geoip_detect_get_info_from_ip') ) { $m4is_el8x2 = '';
 } if (! empty($m4is_el8x2)) { if (substr($m4is_el8x2, 0, 6) !== 'query_') { $m4is_el8x2 = 'query_' . $m4is_el8x2;
 } } $m4is_el8x2 = empty($m4is_el8x2) ? self::DEFAULT_PROVIDER : $m4is_el8x2;
 $m4is_lv7wu = empty($m4is_lv7wu) ? m4is_vv5u::m4is_s15o8k() : $m4is_lv7wu;
  $m4is_q_ob6 = self::m4is_mdhic2($m4is_lv7wu, $m4is_el8x2);
  $m4is_ahc2fb = get_transient($m4is_q_ob6);
  $m4is_h7j0 = $m4is_el8x2;
 if ($m4is_ahc2fb) { return $m4is_ahc2fb;
 } if ( method_exists('m4is_sg9i6', $m4is_h7j0)) { $m4is_ahc2fb = self::$m4is_h7j0($m4is_lv7wu);
 } if (! empty($m4is_ahc2fb) ) { set_transient($m4is_q_ob6, $m4is_ahc2fb, MONTH_IN_SECONDS);
 } return $m4is_ahc2fb;
 } static 
function m4is_mdhic2($m4is_lv7wu = '', $m4is_el8x2 = '') { $m4is_lv7wu = empty($m4is_lv7wu) ? m4is_vv5u::m4is_s15o8k() : $m4is_lv7wu;
 $m4is_q_ob6 = "memberium/geolocation" . (empty($m4is_el8x2) ? '' : "::{$m4is_el8x2}") . "::{$m4is_lv7wu}";
 return $m4is_q_ob6;
 } static 
function m4is_xtpds() { return [ 'query_extreme',  'query_geoip',  'query_hostip',  'query_ipapi',  'query_ipinfodb',  'query_ipstack',  ];
 } private static 
function m4is_k53w() { return self::DEFAULT_PROVIDER;
 }    private static 
function query_extreme($m4is_lv7wu = '') {  $m4is_ahc2fb = [];
 $m4is_zs1mw2 = "http://extreme-ip-lookup.com/json/{$m4is_lv7wu}";
 $m4is_etj2 = json_decode(m4is_vv5u::m4is_mh0v($m4is_zs1mw2) );
 if (is_object($m4is_etj2) && property_exists($m4is_etj2, 'status') && $m4is_etj2->status == 'success') { $m4is_ahc2fb['city'] = $m4is_etj2->city;
 $m4is_ahc2fb['continent'] = $m4is_etj2->continent;
 $m4is_ahc2fb['country_name'] = $m4is_etj2->country;
 $m4is_ahc2fb['countrycode'] = $m4is_etj2->countryCode;
 $m4is_ahc2fb['isp'] = $m4is_etj2->isp;
 $m4is_ahc2fb['latitude'] = $m4is_etj2->lat;
 $m4is_ahc2fb['longitude'] = $m4is_etj2->lon;
 $m4is_ahc2fb['region_name'] = $m4is_etj2->region;
 $m4is_ahc2fb['timezone'] = '';
 $m4is_ahc2fb['postalcode'] = '';
 } return $m4is_ahc2fb;
 } private static 
function query_geoip($m4is_lv7wu = '') { $m4is_etj2 = geoip_detect_get_info_from_ip($m4is_lv7wu);
 $m4is_ahc2fb['city'] = $m4is_etj2->city;
 $m4is_ahc2fb['country_name'] = $m4is_etj2->country_name;
 $m4is_ahc2fb['countrycode'] = $m4is_etj2->countryCode;
 $m4is_ahc2fb['isp'] = '';
 $m4is_ahc2fb['latitude'] = $m4is_etj2->latitude;
 $m4is_ahc2fb['longitude'] = $m4is_etj2->longitude;
 $m4is_ahc2fb['postalcode'] = $m4is_etj2->postal_code;
 $m4is_ahc2fb['region'] = $m4is_etj2->region;
 $m4is_ahc2fb['region_name'] = $m4is_etj2->region_name;
 $m4is_ahc2fb['timezone'] = $m4is_etj2->timezone;
 return $m4is_ahc2fb;
 } private static 
function query_hostip($m4is_lv7wu = '') { $m4is_ahc2fb = [];
 $m4is_zs1mw2 = "http://api.hostip.info/get_json.php?ip={$m4is_lv7wu}&position=true";
 $m4is_etj2 = json_decode(m4is_vv5u::m4is_mh0v($m4is_zs1mw2) );
 if (is_object($m4is_etj2) ) { $m4is_ahc2fb['country_name'] = ucwords(strtolower($m4is_etj2->country_name) );
 $m4is_ahc2fb['city'] = substr($m4is_etj2->city, 0, strpos($m4is_etj2->city, ',') );
 $m4is_ahc2fb['region'] = substr($m4is_etj2->city, 2 + strpos($m4is_etj2->city, ', ') );
 $m4is_ahc2fb['latitude'] = $m4is_etj2->lat;
 $m4is_ahc2fb['longitude'] = $m4is_etj2->lng;
 $m4is_ahc2fb['countrycode'] = $m4is_etj2->country_code;
 $m4is_ahc2fb['isp'] = '';
 $m4is_ahc2fb['postalcode'] = '';
 $m4is_ahc2fb['region_name'] = '';
 $m4is_ahc2fb['timezone'] = '';
 } return $m4is_ahc2fb;
 } private static 
function query_ipstack($m4is_lv7wu = '') {  $m4is_ahc2fb = [];
 $m4is_hq15 = defined('IPSTACK_API_KEY') ? constant('IPSTACK_API_KEY') : false;
 if ($m4is_hq15) { $m4is_zs1mw2 = "http://api.ipstack.com/{$m4is_lv7wu}?access_key={$m4is_hq15}&output=json";
 $m4is_etj2 = json_decode(m4is_vv5u::m4is_mh0v($m4is_zs1mw2) );
 $m4is_ahc2fb['city'] = $m4is_etj2->city;
 $m4is_ahc2fb['country_name'] = $m4is_etj2->country_name;
 $m4is_ahc2fb['countrycode'] = $m4is_etj2->country_code;
 $m4is_ahc2fb['isp'] = '';
 $m4is_ahc2fb['latitude'] = $m4is_etj2->latitude;
 $m4is_ahc2fb['longitude'] = $m4is_etj2->longitude;
 $m4is_ahc2fb['postalcode'] = $m4is_etj2->zip;
 $m4is_ahc2fb['region'] = $m4is_etj2->region_code;
 $m4is_ahc2fb['region_name'] = $m4is_etj2->region_name;
 $m4is_ahc2fb['timezone'] = '';
 } return $m4is_ahc2fb;
 } private static 
function query_ipapi($m4is_lv7wu = '') { $m4is_ahc2fb = [];
 $m4is_hq15 = defined('IPAPI_API_KEY') ? constant('IPAPI_API_KEY') : false;
 if ($m4is_hq15) { $m4is_zs1mw2 = "http://api.ipapi.com/{$m4is_lv7wu}?access_key={$m4is_hq15}&format=1";
 $m4is_etj2 = json_decode(m4is_vv5u::m4is_mh0v($m4is_zs1mw2) );
 $m4is_ahc2fb['city'] = $m4is_etj2->city;
 $m4is_ahc2fb['country_name'] = $m4is_etj2->country_name;
 $m4is_ahc2fb['countrycode'] = $m4is_etj2->country_code;
 $m4is_ahc2fb['isp'] = '';
 $m4is_ahc2fb['latitude'] = $m4is_etj2->latitude;
 $m4is_ahc2fb['longitude'] = $m4is_etj2->longitude;
 $m4is_ahc2fb['postalcode'] = $m4is_etj2->zip;
 $m4is_ahc2fb['region'] = $m4is_etj2->region_code;
 $m4is_ahc2fb['region_name'] = $m4is_etj2->region_name;
 $m4is_ahc2fb['timezone'] = '';
 } return $m4is_ahc2fb;
 } private static 
function query_ipinfodb($m4is_lv7wu = '') { $m4is_ahc2fb = [];
 $m4is_hq15 = defined('IPINFODB_API_KEY') ? constant('IPINFODB_API_KEY') : false;
 if ($m4is_hq15) { $m4is_zs1mw2 = "http://api.ipinfodb.com/v3/ip-city/?key={$m4is_hq15}&ip={$m4is_lv7wu}&format=json";
 $m4is_etj2 = json_decode(m4is_vv5u::m4is_mh0v($m4is_zs1mw2) );
 $m4is_ahc2fb['city'] = $m4is_etj2->cityName;
 $m4is_ahc2fb['country_name'] = $m4is_etj2->countryName;
 $m4is_ahc2fb['countrycode'] = $m4is_etj2->countryCode;
 $m4is_ahc2fb['isp'] = '';
 $m4is_ahc2fb['postalcode'] = $m4is_etj2->zipCode;
 $m4is_ahc2fb['region_name'] = $m4is_etj2->regionName;
 $m4is_ahc2fb['timezone'] = $m4is_etj2->timeZone;
 $m4is_ahc2fb['latitude'] = $m4is_etj2->latitude;
 $m4is_ahc2fb['longitude'] = $m4is_etj2->longitude;
 $m4is_ahc2fb['region'] = '';
 } sleep(1);
 return $m4is_ahc2fb;
 }    static 
function m4is_yqf5r() { return [ '&Aring;land Islands' => 'AX', 'Afghanistan' => 'AF', 'Aland Islands' => 'AX', 'Albania' => 'AL', 'Algeria' => 'DZ', 'American Samoa' => 'AS', 'Andorra' => 'AD', 'Angola' => 'AO', 'Anguilla' => 'AI', 'Antarctica' => 'AQ', 'Antigua and Barbuda' => 'AG', 'Argentina' => 'AR', 'Armenia' => 'AM', 'Aruba' => 'AW', 'Australia' => 'AU', 'Austria' => 'AT', 'Azerbaijan' => 'AZ', 'Bahamas (the)' => 'BS', 'Bahrain' => 'BH', 'Bangladesh' => 'BD', 'Barbados' => 'BB', 'Belarus' => 'BY', 'Belgium' => 'BE', 'Belize' => 'BZ', 'Benin' => 'BJ', 'Bermuda' => 'BM', 'Bhutan' => 'BT', 'Bolivia (Plurinational State of)' => 'BO', 'Bonaire, Sint Eustatius and Saba' => 'BQ', 'Bosnia and Herzegovina' => 'BA', 'Botswana' => 'BW', 'Bouvet Island' => 'BV', 'Brazil' => 'BR', 'British Indian Ocean Territory (the)' => 'IO', 'Brunei Darussalam' => 'BN', 'Bulgaria' => 'BG', 'Burkina Faso' => 'BF', 'Burundi' => 'BI', 'Cabo Verde' => 'CV', 'Cambodia' => 'KH', 'Cameroon' => 'CM', 'Canada' => 'CA', 'Cayman Islands (the)' => 'KY', 'Central African Republic (the)' => 'CF', 'Chad' => 'TD', 'Chile' => 'CL', 'China' => 'CN', 'Christmas Island' => 'CX', 'Cocos (Keeling) Islands (the)' => 'CC', 'Colombia' => 'CO', 'Comoros (the)' => 'KM', 'Congo (the Democratic Republic of the)' => 'CD', 'Congo (the)' => 'CG', 'Cook Islands (the)' => 'CK', 'Costa Rica' => 'CR', 'Croatia' => 'HR', 'Cuba' => 'CU', 'Cura&ccedil;ao' => 'CW', 'Cyprus' => 'CY', 'Czech Republic (the)' => 'CZ', 'Denmark' => 'DK', 'Djibouti' => 'DJ', 'Dominica' => 'DM', 'Dominican Republic (the)' => 'DO', 'Ecuador' => 'EC', 'Egypt' => 'EG', 'El Salvador' => 'SV', 'Equatorial Guinea' => 'GQ', 'Eritrea' => 'ER', 'Estonia' => 'EE', 'Ethiopia' => 'ET', 'Falkland Islands (the) [Malvinas]' => 'FK', 'Faroe Islands (the)' => 'FO', 'Fiji' => 'FJ', 'Finland' => 'FI', 'France' => 'FR', 'French Guiana' => 'GF', 'French Polynesia' => 'PF', 'French Southern Territories (the)' => 'TF', 'Gabon' => 'GA', 'Gambia (the)' => 'GM', 'Georgia' => 'GE', 'Germany' => 'DE', 'Ghana' => 'GH', 'Gibraltar' => 'GI', 'Greece' => 'GR', 'Greenland' => 'GL', 'Grenada' => 'GD', 'Guadeloupe' => 'GP', 'Guam' => 'GU', 'Guatemala' => 'GT', 'Guernsey' => 'GG', 'Guinea-Bissau' => 'GW', 'Guinea' => 'GN', 'Guyana' => 'GY', 'Haiti' => 'HT', 'Heard Island and McDonald Islands' => 'HM', 'Holy See (the)' => 'VA', 'Honduras' => 'HN', 'Hong Kong' => 'HK', 'Hungary' => 'HU', 'Iceland' => 'IS', 'India' => 'IN', 'Indonesia' => 'ID', 'Iran (Islamic Republic of)' => 'IR', 'Iraq' => 'IQ', 'Ireland' => 'IE', 'Isle of Man' => 'IM', 'Israel' => 'IL', 'Italy' => 'IT', 'Jamaica' => 'JM', 'Japan' => 'JP', 'Jersey' => 'JE', 'Johnston Island' => 'JT', 'Jordan' => 'JO', 'Kazakhstan' => 'KZ', 'Kenya' => 'KE', 'Kiribati' => 'KI', 'Korea (the Republic of)' => 'KR', 'Kuwait' => 'KW', 'Kyrgyzstan' => 'KG', 'Laos' => 'LA', 'Latvia' => 'LV', 'Lebanon' => 'LB', 'Lesotho' => 'LS', 'Liberia' => 'LR', 'Libya' => 'LY', 'Liechtenstein' => 'LI', 'Lithuania' => 'LT', 'Luxembourg' => 'LU', 'Macao' => 'MO', 'Macedonia (the former Yugoslav Republic of)' => 'MK', 'Madagascar' => 'MG', 'Malawi' => 'MW', 'Malaysia' => 'MY', 'Maldives' => 'MV', 'Mali' => 'ML', 'Malta' => 'MT', 'Marshall Islands (the)' => 'MH', 'Martinique' => 'MQ', 'Mauritania' => 'MR', 'Mauritius' => 'MU', 'Mayotte' => 'YT', 'Mexico' => 'MX', 'Micronesia (Federated States of)' => 'FM', 'Midway Islands' => 'MI', 'Moldova (the Republic of)' => 'MD', 'Monaco' => 'MC', 'Mongolia' => 'MN', 'Montenegro' => 'ME', 'Montserrat' => 'MS', 'Morocco' => 'MA', 'Mozambique' => 'MZ', 'Myanmar' => 'MM', 'Namibia' => 'NA', 'Nauru' => 'NR', 'Nepal' => 'NP', 'Netherlands (the)' => 'NL', 'Netherlands Antilles' => 'AN', 'New Caledonia' => 'NC', 'New Zealand' => 'NZ', 'Nicaragua' => 'NI', 'Niger (the)' => 'NE', 'Nigeria' => 'NG', 'Niue' => 'NU', 'Norfolk Island' => 'NF', 'Northern Mariana Islands (the)' => 'MP', 'Norway' => 'NO', 'Oman' => 'OM', 'Pakistan' => 'PK', 'Palau' => 'PW', 'Palestine, State of' => 'PS', 'Panama' => 'PA', 'Papua New Guinea' => 'PG', 'Paraguay' => 'PY', 'Peru' => 'PE', 'Philippines (the)' => 'PH', 'Pitcairn' => 'PN', 'Poland' => 'PL', 'Portugal' => 'PT', 'Puerto Rico' => 'PR', 'Qatar' => 'QA', 'R&eacute;union' => 'RE', 'Romania' => 'RO', 'Russian Federation (the)' => 'RU', 'Rwanda' => 'RW', 'Saint Barth&eacute;lemy' => 'BL', 'Saint Helena, Ascension and Tristan da Cunha' => 'SH', 'Saint Kitts and Nevis' => 'KN', 'Saint Lucia' => 'LC', 'Saint Martin (French part)' => 'MF', 'Saint Pierre and Miquelon' => 'PM', 'Saint Vincent and the Grenadines' => 'VC', 'Samoa' => 'WS', 'San Marino' => 'SM', 'Sao Tome and Principe' => 'ST', 'Saudi Arabia' => 'SA', 'Senegal' => 'SN', 'Serbia' => 'RS', 'Seychelles' => 'SC', 'Sierra Leone' => 'SL', 'Singapore' => 'SG', 'Sint Maarten (Dutch part)' => 'SX', 'Slovakia' => 'SK', 'Slovenia' => 'SI', 'Solomon Islands' => 'SB', 'Somalia' => 'SO', 'South Africa' => 'ZA', 'South Georgia and the South Sandwich Islands' => 'GS', 'South Sudan' => 'SS', 'Southern Rhodesia' => 'RH', 'Spain' => 'ES', 'Sri Lanka' => 'LK', 'St. Barthelemy' => 'BL', 'Sudan (the)' => 'SD', 'Suriname' => 'SR', 'Svalbard and Jan Mayen' => 'SJ', 'Swaziland' => 'SZ', 'Sweden' => 'SE', 'Switzerland' => 'CH', 'Syrian Arab Republic' => 'SY', 'Taiwan (Province of China)' => 'TW', 'Tajikistan' => 'TJ', 'Tanzania, United Republic of' => 'TZ', 'Thailand' => 'TH', 'Timor-Leste' => 'TL', 'Togo' => 'TG', 'Tokelau' => 'TK', 'Tonga' => 'TO', 'Trinidad and Tobago' => 'TT', 'Tunisia' => 'TN', 'Turkey' => 'TR', 'Turkmenistan' => 'TM', 'Turks and Caicos Islands (the)' => 'TC', 'Tuvalu' => 'TV', 'Uganda' => 'UG', 'Ukraine' => 'UA', 'United Arab Emirates (the)' => 'AE', 'United Kingdom' => 'UK', 'United States Minor Outlying Islands (the)' => 'UM', 'United States' => 'US', 'Upper Volta' => 'HV', 'Uruguay' => 'UY', 'Uzbekistan' => 'UZ', 'Vanuatu' => 'VU', 'Venezuela (Bolivarian Republic of)' => 'VE', 'Viet Nam' => 'VN', 'Virgin Islands (British)' => 'VG', 'Virgin Islands (U.S.)' => 'VI', 'Wallis and Futuna' => 'WF', 'Western Sahara' => 'EH', 'Yemen' => 'YE', 'Zambia' => 'ZM', 'Zimbabwe' => 'ZW', "C&ocirc;te d'Ivoire" => 'CI', "Korea (the Democratic People's Republic of)" => 'KP', "Lao People's Democratic Republic (the)" => 'LA', ];
 } static 
function m4is_qvli0e($m4is_uwmf = '') { if (strlen($m4is_uwmf) == 2) { return $m4is_uwmf;
 } $m4is_uzqd = strtolower($m4is_uwmf);
 $m4is_um6g = self::m4is_yqf5r();
 foreach($m4is_um6g as $m4is_t5ot4 => $m4is_carw7y) { if ($m4is_uzqd == $m4is_t5ot4) { return $m4is_carw7y;
 } } return $m4is_uwmf;
 }  static 
function m4is_prxf($m4is_ehoq = '') { if (strlen($m4is_ehoq) > 2) { return $m4is_ehoq;
 } $m4is_um6g = self::m4is_yqf5r();
 $m4is_ehoq = strtoupper($m4is_ehoq);
 foreach($m4is_um6g as $m4is_t5ot4 => $m4is_carw7y) { if ($m4is_ehoq == $m4is_carw7y) { return $m4is_t5ot4;
 } } return $m4is_ehoq;
 } static 
function m4is_wqxe($m4is_uwmf = '') { if (empty($m4is_uwmf) ) { return;
 } $m4is_um6g = self::m4is_yqf5r();
 if (strlen($m4is_uwmf) > 2) { if (isset($m4is_um6g[$m4is_uwmf]) ) { return $m4is_um6g[$m4is_uwmf];
 } } else { $m4is_uwmf = strtoupper($m4is_uwmf);
 foreach ($m4is_um6g as $m4is_y5tbo9 => $country_code) { if ($country_code == $m4is_uwmf) { return $m4is_y5tbo9;
 } } } return '';
 } }

