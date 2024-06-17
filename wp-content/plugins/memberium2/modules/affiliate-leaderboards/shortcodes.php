<?php
 class_exists('m4is_pms8y') || die();
 m4is_o0rsc6::m4is_x6wv();
 final 
class m4is_o0rsc6 { private static $m4is_bnd6ti;
 private static $m4is_b8m9p2;
 private static $m4is_n3zlk;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_b8m9p2 = m4is_gk3xz::m4is_e5l8a9();
 self::$m4is_n3zlk = 'memberium';
 } static 
function m4is_a743( $m4is_qnjfv = [], $m4is_z50f = '', $m4is_carw7y = '' ) : string { static $m4is_aslae = [];
 m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'amount' => false, 'css_id' => '', 'except' => '', 'id' => 0, 'limit' => 0, ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 if ( empty( $m4is_qnjfv['id'] ) ) { return self::$m4is_bnd6ti->m4is_lvmz1b() ? '<p style="font-weight:bold">Leaderboard ID Missing</p>' : '';
 } $m4is_qnjfv['amount'] = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['amount'], false );
 $m4is_qnjfv['except'] = array_filter( explode( ',', $m4is_qnjfv['except'] ), 'trim' );
 $m4is_uzfw8j = '';
 $m4is_q_ob6 = md5( serialize( $m4is_qnjfv ) );
 $m4is_gvpi6 = self::$m4is_b8m9p2->m4is_djaz_7($m4is_qnjfv['id']);
 if ( empty( $m4is_gvpi6 ) || empty( $m4is_gvpi6['cache'] ) ) { return '';
 } $m4is_ga0d = $m4is_gvpi6['cache'];
 foreach( $m4is_qnjfv['except'] as $m4is_s2ge5 ) { unset( $m4is_ga0d[$m4is_s2ge5] );
 } $m4is_yer1mp = 0;
 $m4is_uzfw8j .= '<div class="memberium-leaderboard">';
 foreach( $m4is_ga0d as $m4is_i_0fli => $m4is_w_o7al ) { $m4is__b5x37 = m4is_pk8phc::m4is_lx94( $m4is_i_0fli );
 $m4is_uzfw8j .= '<div class="leaderboard-row">';
 $m4is_uzfw8j .= '<span class="leaderboard-order">' . ( 1 + $m4is_yer1mp ) . '</span>';
 $m4is_uzfw8j .= '<span class="leaderboard-name">' . $m4is__b5x37['AffName'];
 if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { $m4is_uzfw8j .= " ({$m4is_i_0fli})";
 } $m4is_uzfw8j .= '</span>';
 if ( $m4is_qnjfv['amount'] ) { $m4is_uzfw8j .= '<span class="leaderboard-value">' . $m4is_w_o7al . '</span>';
 } $m4is_uzfw8j .= '</div>';
 $m4is_yer1mp++;
 if ( $m4is_yer1mp == $m4is_qnjfv['limit'] ) { break;
 } } $m4is_uzfw8j .= '</div>';
 return $m4is_uzfw8j;
 } }

