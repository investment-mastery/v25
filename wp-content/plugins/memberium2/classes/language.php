<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_ss2_7::m4is_x6wv();
 final 
class m4is_ss2_7 { static private $m4is_bsy5;
 static private $m4is_g5sqlc;
 static private $m4is_au70;
  static 
function m4is_x6wv() { global $wpdb;
 $_SERVER['HTTP_ACCEPT_LANGUAGE'] = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
 self::$m4is_bsy5 = $wpdb->prefix . 'memberium_lang';
 self::$m4is_g5sqlc = 'memberium';
 self::$m4is_au70 = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
 }    static 
function m4is_bskpcz() : string { return self::$m4is_bsy5;
 } static 
function m4is_wpngev() : array { global $wpdb;
 $m4is_nwue_ = $wpdb->get_charset_collate();
 $m4is_dj_2 = self::$m4is_bsy5;
 $m4is_tovizk = "CREATE TABLE {$m4is_dj_2} (\n" . "id int(11) NOT NULL AUTO_INCREMENT, \n" . "language varchar(10) NOT NULL, \n" . "context varchar(160) NOT NULL, \n" . "name varchar(40) NOT NULL, \n" . "origtext text NOT NULL, \n" . "value text NOT NULL, \n" . "KEY language (language), \n" . "KEY context (context), \n" . "KEY name (name), \n" . "KEY origtext (origtext(255) ), \n" . "PRIMARY KEY  (id) \n" . ") ENGINE=InnoDB {$m4is_nwue_};
";
 return [ 'table' => $m4is_dj_2, 'sql' => $m4is_tovizk ];
 }     static 
function m4is_la37r( $m4is_z964, $m4is_knyw0, $m4is_ml7s2b ) { if ( $m4is_ml7s2b <> 'memberium' ) { return $m4is_z964;
 } global $wpdb;
 static $m4is_aslae = [];
 $m4is_i978y = md5( strtolower( $m4is_ml7s2b . $m4is_knyw0 ) );
 if ( isset( $m4is_aslae[$m4is_i978y] ) ) { return $m4is_aslae[$m4is_i978y];
 } $m4is_b0gmh = self::m4is_an5li();
 $m4is_tovizk = "SELECT `value` FROM %i WHERE `language` IN ( {$m4is_b0gmh} ) AND `origtext` = %s ORDER BY id LIMIT 1";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_bsy5, $m4is_knyw0 );
 $m4is_w_o7al = $wpdb->get_var( $m4is_tovizk );
 if ( ! empty( $m4is_w_o7al ) ) { $m4is_aslae[$m4is_i978y] = $m4is_w_o7al;
 } else { $m4is_aslae[$m4is_i978y] = $m4is_z964;
 } return $m4is_aslae[$m4is_i978y];
 }  static 
function m4is_nxc9zw( $m4is_z964, $m4is_knyw0, $m4is_hl8q, $m4is_ml7s2b ) { if ( $m4is_ml7s2b <> 'memberium' ) { return $m4is_z964;
 } global $wpdb;
 static $m4is_aslae = [];
 $m4is_i978y = md5( strtolower( $m4is_ml7s2b . $m4is_hl8q . $m4is_knyw0 ) );
 if ( isset( $m4is_aslae[$m4is_i978y] ) ) { return $m4is_aslae[$m4is_i978y];
 } $m4is_b0gmh = self::m4is_an5li();
 $m4is_tovizk = "SELECT `value` FROM %i WHERE `language` IN ( {$m4is_b0gmh} ) AND `context` = %s AND `origtext` = %s ORDER BY `language` DESC, `id` ASC LIMIT 1";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_bsy5, $m4is_hl8q, $m4is_knyw0 );
 $m4is_w_o7al = $wpdb->get_var( $m4is_tovizk );
 if ( ! empty( $m4is_w_o7al ) ) { $m4is_z964 = $m4is_aslae[$m4is_i978y] = $m4is_w_o7al;
 } return $m4is_z964;
 }  static 
function m4is_sg0d6() { load_plugin_textdomain( 'memberium', FALSE, basename( __DIR__ . '/lang/' ) );
 }     public static 
function m4is_pphwds() { if ( isset( $_SESSION['memb_user']['languages'] ) ) { return $_SESSION['memb_user']['languages'];
 } static $m4is_b0gmh = [];
 if (empty($m4is_b0gmh) ) { $m4is_xql2 = self::$m4is_au70;
 foreach( self::$m4is_au70 as $m4is_rrm56) { $m4is_rrm56 = explode( ';q=', $m4is_rrm56 );
 $m4is_rrm56[0] = strtolower( $m4is_rrm56[0] );
 $m4is_rrm56[1] = isset( $m4is_rrm56[1]) ? $m4is_rrm56[1] : 1;
 $m4is_b0gmh[$m4is_rrm56[0]] = $m4is_rrm56[1];
 } foreach( $m4is_b0gmh as $m4is_jm1_ => $m4is_mxh3 ) { $m4is_gs0x = substr( $m4is_jm1_, 0, strpos( $m4is_jm1_, '-' ) );
 if ( ! empty( $m4is_gs0x ) ) { if (! isset( $m4is_b0gmh[$m4is_gs0x] ) ) { $m4is_b0gmh[$m4is_gs0x] = $m4is_mxh3 - .01;
 } } } arsort( $m4is_b0gmh, SORT_NUMERIC );
 } return $m4is_b0gmh;
 }    private static 
function m4is_an5li() : string { static $m4is_p1hqu;
 if ( $m4is_p1hqu ) { return $m4is_p1hqu;
 } $m4is_b0gmh = [];
 $m4is_b0gmh[] = '';
 $m4is_b0gmh[] = trim( get_option( 'WPLANG', 'en_us' ) );
 $m4is_flx71n = self::$m4is_au70;
 $m4is_flx71n = explode( ',', strtr( $m4is_flx71n[0], '-', '_' ) );
 if ( ! empty( $m4is_flx71n ) ) { foreach( $m4is_flx71n as $m4is_s2ge5 ) { $m4is_b0gmh[] = $m4is_s2ge5;
 if ( strlen( $m4is_s2ge5 ) > 2) { $m4is_b0gmh[] = substr( $m4is_s2ge5, 0, 2 );
 } } } $m4is_b0gmh = array_unique( $m4is_b0gmh );
 $m4is_p1hqu = "'" . implode( "','", $m4is_b0gmh ) . "'";
 return $m4is_p1hqu;
 }     static 
function m4is_qqi04c() : array { return [ 'ar' => 'Arabic', 'ar-AE' => 'Arabic (United Arab Emirates)', 'ar-BH' => 'Arabic (Bahrain)', 'ar-DZ' => 'Arabic (Algeria)', 'ar-EG' => 'Arabic (Egypt)', 'ar-IQ' => 'Arabic (Iraq)', 'ar-JO' => 'Arabic (Jordan)', 'ar-KW' => 'Arabic (Kuwait)', 'ar-LB' => 'Arabic (Lebanon)', 'ar-LY' => 'Arabic (Libya)', 'ar-MA' => 'Arabic (Morocco)', 'ar-OM' => 'Arabic (Oman)', 'ar-QA' => 'Arabic (Qatar)', 'ar-SA' => 'Arabic (Saudi Arabia)', 'ar-SD' => 'Arabic (Sudan)', 'ar-SY' => 'Arabic (Syria)', 'ar-TN' => 'Arabic (Tunisia)', 'ar-YE' => 'Arabic (Yemen)', 'be' => 'Belarusian', 'be-BY' => 'Belarusian (Belarus)', 'bg' => 'Bulgarian', 'bg-BG' => 'Bulgarian (Bulgaria)', 'ca' => 'Catalan', 'ca-ES' => 'Catalan (Spain)', 'cs' => 'Czech', 'cs-CZ' => 'Czech (Czech Republic)', 'da' => 'Danish', 'da-DK' => 'Danish (Denmark)', 'de' => 'German', 'de-AT' => 'German (Austria)', 'de-CH' => 'German (Switzerland)', 'de-DE' => 'German (Germany)', 'de-GR' => 'German (Greece)', 'de-LU' => 'German (Luxembourg)', 'el' => 'Greek', 'el-CY' => 'Greek (Cyprus)', 'el-GR' => 'Greek (Greece)', 'en' => 'English', 'en-AU' => 'English (Australia)', 'en-CA' => 'English (Canada)', 'en-GB' => 'English (United Kingdom)', 'en-IE' => 'English (Ireland)', 'en-IN' => 'English (India)', 'en-MT' => 'English (Malta)', 'en-NZ' => 'English (New Zealand)', 'en-PH' => 'English (Philippines)', 'en-SG' => 'English (Singapore)', 'en-US' => 'English (United States)', 'en-ZA' => 'English (South Africa)', 'es' => 'Spanish', 'es-AR' => 'Spanish (Argentina)', 'es-BO' => 'Spanish (Bolivia)', 'es-CL' => 'Spanish (Chile)', 'es-CO' => 'Spanish (Colombia)', 'es-CR' => 'Spanish (Costa Rica)', 'es-CU' => 'Spanish (Cuba)', 'es-DO' => 'Spanish (Dominican Republic)', 'es-EC' => 'Spanish (Ecuador)', 'es-ES' => 'Spanish (Spain)', 'es-GT' => 'Spanish (Guatemala)', 'es-HN' => 'Spanish (Honduras)', 'es-MX' => 'Spanish (Mexico)', 'es-NI' => 'Spanish (Nicaragua)', 'es-PA' => 'Spanish (Panama)', 'es-PE' => 'Spanish (Peru)', 'es-PR' => 'Spanish (Puerto Rico)', 'es-PY' => 'Spanish (Paraguay)', 'es-SV' => 'Spanish (El Salvador)', 'es-US' => 'Spanish (United States)', 'es-UY' => 'Spanish (Uruguay)', 'es-VE' => 'Spanish (Venezuela)', 'et' => 'Estonian', 'et-EE' => 'Estonian (Estonia)', 'fi' => 'Finnish', 'fi-FI' => 'Finnish (Finland)', 'fr' => 'French', 'fr-BE' => 'French (Belgium)', 'fr-CA' => 'French (Canada)', 'fr-CH' => 'French (Switzerland)', 'fr-FR' => 'French (France)', 'fr-LU' => 'French (Luxembourg)', 'ga' => 'Irish', 'ga-IE' => 'Irish (Ireland)', 'he' => 'Hebrew', 'he-IL' => 'Hebrew (Israel)', 'hi' => 'Hindi', 'hi-IN' => 'Hindi (India)', 'hr' => 'Croatian', 'hr-HR' => 'Croatian (Croatia)', 'hu' => 'Hungarian', 'hu-HU' => 'Hungarian (Hungary)', 'id' => 'Indonesian', 'id-ID' => 'Indonesian (Indonesia)', 'is' => 'Icelandic', 'is-IS' => 'Icelandic (Iceland)', 'it' => 'Italian', 'it-CH' => 'Italian (Switzerland)', 'it-IT' => 'Italian (Italy)', 'ja' => 'Japanese', 'ja-JP' => 'Japanese (Japan)', 'ko' => 'Korean', 'ko-KR' => 'Korean (South Korea)', 'lt' => 'Lithuanian', 'lt-LT' => 'Lithuanian (Lithuania)', 'lv' => 'Latvian', 'lv-LV' => 'Latvian (Latvia)', 'mk' => 'Macedonian', 'mk-MK' => 'Macedonian (Macedonia)', 'ms' => 'Malay', 'ms-MY' => 'Malay (Malaysia)', 'mt' => 'Maltese', 'mt-MT' => 'Maltese (Malta)', 'nl' => 'Dutch', 'nl-BE' => 'Dutch (Belgium)', 'nl-NL' => 'Dutch (Netherlands)', 'nn-NO' => 'Norwegian (Norway, Nynorsk)', 'no' => 'Norwegian', 'no-NO' => 'Norwegian (Norway)', 'pl' => 'Polish', 'pl-PL' => 'Polish (Poland)', 'pt' => 'Portuguese', 'pt-BR' => 'Portuguese (Brazil)', 'pt-PT' => 'Portuguese (Portugal)', 'ro' => 'Romanian', 'ro-RO' => 'Romanian (Romania)', 'ru' => 'Russian', 'ru-RU' => 'Russian (Russia)', 'sk' => 'Slovak', 'sk-SK' => 'Slovak (Slovakia)', 'sl' => 'Slovenian', 'sl-SI' => 'Slovenian (Slovenia)', 'sq' => 'Albanian', 'sq-AL' => 'Albanian (Albania)', 'sr' => 'Serbian', 'sr-BA' => 'Serbian (Bosnia and Herzegovina)', 'sr-CS' => 'Serbian (Serbia and Montenegro)', 'sr-Latn' => 'Serbian (Latin)', 'sr-Latn-BA' => 'Serbian (Latin, Bosnia and Herzegovina)', 'sr-Latn-ME' => 'Serbian (Latin, Montenegro)', 'sr-Latn-RS' => 'Serbian (Latin, Serbia)', 'sr-ME' => 'Serbian (Montenegro)', 'sr-RS' => 'Serbian (Serbia)', 'sv' => 'Swedish', 'sv-SE' => 'Swedish (Sweden)', 'th' => 'Thai', 'th-TH' => 'Thai (Thailand)', 'tr' => 'Turkish', 'tr-TR' => 'Turkish (Turkey)', 'uk' => 'Ukrainian', 'uk-UA' => 'Ukrainian (Ukraine)', 'vi' => 'Vietnamese', 'vi-VN' => 'Vietnamese (Vietnam)', 'zh' => 'Chinese', 'zh-CN' => 'Chinese (China)', 'zh-HK' => 'Chinese (Hong Kong)', 'zh-SG' => 'Chinese (Singapore)', 'zh-TW' => 'Chinese (Taiwan)', ];
 }  private static 
function m4is_i72_nk() : array { global $wpdb;
 $m4is_tovizk = "SELECT DISTINCT(`language`) FROM `" . self::$m4is_bsy5 . "`";
 $m4is_b0gmh = $wpdb->get_col( $m4is_tovizk );
 return $m4is_b0gmh;
 }  }

