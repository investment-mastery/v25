<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_xcev::m4is_ju94();
 final 
class m4is_xcev { private static $m4is_bnd6ti;
 private static $m4is_e2kg;
 private static $m4is_bh12zy;
 private static $m4is_o3m_c5;
 private static $m4is_n3zlk;
  static 
function m4is_ju94() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_e2kg = (int) self::$m4is_bnd6ti->m4is_dpuy9();
 self::$m4is_o3m_c5 = ! m4is_u68pu::m4is_u6mkaw();
 self::$m4is_bh12zy = m4is_w0enbm::m4is_e5l8a9();
 self::$m4is_n3zlk = 'memberium';
 }  static 
function m4is_d5em4( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'leavename' => 0, 'post_id' => 0, 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] === 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_w6bl = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['leavename'], false );
 $m4is_cd8k = (int) $m4is_qnjfv['post_id'];
 $m4is_z50f = $m4is_cd8k == 0 ? get_permalink( NULL, $m4is_qnjfv['leavename'] ) : get_permalink( $m4is_cd8k, $m4is_w6bl );
  if ( $m4is_z50f === false ) { error_log( sprintf( 'Memberium: %s failed to retrieve permalink for post ID %d', $m4is_carw7y, $m4is_cd8k ) );
 return 'Error: Failed to retrieve the permalink.';
 }  return m4is_crqo::m4is__go6j( false, $m4is_z50f, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }  static 
function m4is_i_1s4q( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( is_feed() ) { return '';
 }  $m4is_r6nh_b = [ 'redirect' => isset( $_GET['redirect_to'] ) ? $_GET['redirect_to'] : get_admin_url(), 'button_label' => 'Log In', 'form_id' => 'loginform', 'password_label' => 'Password:', 'remember_label' => 'Remember Me', 'username_label' => 'Username:', 'remember_value' => false, 'remember' => false, 'secure' => false, 'show' => false, ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is__7cx = $m4is_qnjfv['redirect'];
 $m4is_su4qk = $m4is_qnjfv['form_id'];
 $m4is_ub9f8 = $m4is_qnjfv['button_label'];
 $m4is_e3qte = $m4is_qnjfv['password_label'];
 $m4is_n_t4 = $m4is_qnjfv['remember_label'];
 $m4is_s4je = $m4is_qnjfv['username_label'];
 $m4is_lwnk = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['secure'], false );
 $m4is_zrtu9 = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['remember'], false );
 $m4is_j8hx71 = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['remember_value'], false );
 $m4is_okdt = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['show'], false );
 $m4is__n8_uh = function_exists( 'stopbadbots_addfieldlogin' );
  if ( is_user_logged_in() && ! $m4is_okdt ) { if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { return '<p>' . _x( 'Logged in as Admin', 'memb_loginform', self::$m4is_n3zlk ) . '</p>';
 } return '';
 }  $m4is_k4yeul = [ 'echo' => false, 'form_id' => $m4is_su4qk, 'label_log_in' => $m4is_ub9f8, 'label_password' => $m4is_e3qte, 'label_remember' => $m4is_n_t4, 'label_username' => $m4is_s4je, 'redirect' => $m4is__7cx, 'remember' => $m4is_zrtu9, 'value_remember' => $m4is_j8hx71, ];
  $m4is_oa_z = "\n\n<!-- Memberium-WordPress Login Form -->\n";
  if ( !empty($_GET['login']) && $_GET['login'] == 'failed' ) { $m4is_qbnj3 = apply_filters( 'login_errors', self::$m4is_bnd6ti->login_error );
 if (! empty($m4is_qbnj3) ) { $m4is_oa_z .= '<p class="memberium-login-error">' . _x( $m4is_qbnj3, 'memb_loginform', self::$m4is_n3zlk ) . '</pre>';
 } else { $m4is_oa_z .= '<p class="memberium-login-error">' . _x( 'Login Failed', 'memb_loginform', self::$m4is_n3zlk ) . '</p>';
 } }  if ( $m4is__n8_uh ) { add_filter( 'login_form_middle', function( $m4is_z50f, $m4is_k4yeul ) { return '<input name=stopbadbots_key type=hidden value=1 />';
 }, 10, 2);
 }  $m4is_oa_z .= wp_login_form( $m4is_k4yeul );
  $m4is_oa_z = do_shortcode( $m4is_oa_z );
  if ( $m4is__n8_uh ) { remove_filter( 'login_form_middle', 'stopbadbots_addfieldlogin' );
 }  if ( $m4is_lwnk ) { $m4is_oa_z = m4is_crqo::m4is_sb62m9( $m4is_oa_z );
 }  return $m4is_oa_z;
 }  static 
function m4is_pya5t( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'date_format' => '', 'default' => '', 'fields' => '', 'htmlattr' => '', 'post_id' => 0, 'separator' => ' ', 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_cd8k = empty( $m4is_qnjfv['post_id'] ) ? get_the_ID() : (int) $m4is_qnjfv['post_id'];
  $m4is_w_8g = array_filter( explode( ',', $m4is_qnjfv['fields'] ) );
  $m4is_fyh6 = $m4is_qnjfv['date_format'];
  $m4is_koi38 = $m4is_qnjfv['default'];
  $m4is_tni3w9 = $m4is_qnjfv['separator'];
  if ( empty( $m4is_cd8k ) || empty( $m4is_w_8g ) ) { return '';
 }  $m4is_l436 = count( $m4is_w_8g );
  $m4is_c2ah = get_post( $m4is_cd8k );
  $m4is_uzfw8j = '';
  foreach ( $m4is_w_8g as $m4is_yxwn ) {  $m4is_y5f1 = get_post_meta( $m4is_cd8k, $m4is_yxwn, true );
  if ( ! empty( $m4is_y5f1 ) ) {  $m4is_mb6gy = strtotime( $m4is_y5f1 );
   if ( empty( $m4is_fyh6 ) || empty( $m4is_mb6gy ) ) { $m4is_n6yjk9 = $m4is_y5f1;
 } else { $m4is_n6yjk9 = date( $m4is_fyh6, $m4is_mb6gy );
 } }  elseif ( ! empty( $m4is_c2ah->$m4is_yxwn ) ) { $m4is_n6yjk9 = $m4is_c2ah->$m4is_yxwn;
 }  else { $m4is_n6yjk9 = $m4is_koi38;
 }  $m4is_uzfw8j .= $m4is_n6yjk9;
  if ( --$m4is_l436 > 0 ) { $m4is_uzfw8j .= $m4is_tni3w9;
 } }  return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }  static 
function m4is_iwtxip( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'after' => '',  'before' => '',  'htmlattr' => '',  ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_r8curx = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'login_url' );
  $m4is_z50f = $m4is_r8curx < 1 ? wp_login_url() : get_permalink( $m4is_r8curx );
  return m4is_crqo::m4is__go6j( false, $m4is_z50f, '', '', $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }  static 
function m4is__ptsvf( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { global $wp_embed;
 if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'bypass_permissions' => 0, 'capture' => '', 'field' => 'post_content', 'id' => 0, 'length' => 0, 'tagid' => '', 'txtfmt' => '', 'type' => '', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_osi9 = array_filter( explode( ',', $m4is_qnjfv['tagid'] ) );
 $m4is_a_hn = strtolower( trim( $m4is_qnjfv['type'] ) );
 $m4is_yxwn = trim( $m4is_qnjfv['field'] );
 $m4is_yxwn = empty( $m4is_yxwn ) ? 'post_content' : $m4is_yxwn;
 $m4is_cd8k = (int) $m4is_qnjfv['id'];
 if ( empty( $m4is_cd8k ) ) { return '';
 } if ( ! empty( $m4is_osi9 ) ) { if ( ! self::$m4is_bnd6ti->m4is_sjmzx( $m4is_osi9 ) ) { return '';
 } } if ( empty( $m4is_a_hn ) ) { switch ( $m4is_carw7y ) { case 'memb_include_partial': $m4is_a_hn = 'partials';
 break;
 case 'memb_include_page': $m4is_a_hn = 'page';
 break;
 default: $m4is_a_hn = 'post';
 break;
 } }  if ( is_int( $m4is_cd8k ) ) { $m4is_i8q4sc = get_post( $m4is_cd8k, ARRAY_A );
 $m4is_cd8k = $m4is_i8q4sc['ID'];
 } elseif ( $m4is_cd8k == 0 ) { $m4is_i8q4sc = get_page_by_path( $m4is_cd8k, ARRAY_A, $m4is_a_hn );
 $m4is_cd8k = empty( $m4is_i8q4sc['ID'] ) ? 0 : $m4is_i8q4sc['ID'];
 } elseif ( $m4is_cd8k == 0 ) { $m4is_i8q4sc = get_page_by_title( $m4is_cd8k, ARRAY_A, $m4is_a_hn );
 }  if ( self::$m4is_bh12zy->m4is_k_4p2o( (int) $m4is_i8q4sc['ID'] ) ) { $m4is_uzfw8j = do_shortcode( $wp_embed->run_shortcode( $m4is_i8q4sc[$m4is_yxwn] ) );
 } else { $m4is_uzfw8j = do_shortcode( $wp_embed->run_shortcode( $m4is_i8q4sc['post_excerpt'] ) );
 } if ( $m4is_qnjfv['length'] ) { $m4is_uzfw8j = substr( $m4is_uzfw8j, 0, $m4is_qnjfv['length'] );
 } return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'] );
 } static 
function m4is__3yx6w( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'logintext' => 'Login', 'logouttext' => 'Logout', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 return is_user_logged_in() ? $m4is_qnjfv['logouttext'] : $m4is_qnjfv['logintext'];
 } static 
function m4is_k5yel( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'linktext' => 'Logout', 'url' => '' ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_imdo6 = trim( $m4is_qnjfv['url'] );
 $m4is_imdo6 = empty( $m4is_imdo6 ) ? self::$m4is_bnd6ti->m4is__w02() : $m4is_imdo6;
 $m4is_dxpuyg = trim( $m4is_qnjfv['htmlattr'] );
 $m4is_gyv9 = wp_logout_url( $m4is_imdo6 );
 $m4is__jdge = trim( $m4is_qnjfv['linktext'] );
 if ( empty( $m4is_dxpuyg ) ) { $m4is_v8g5 = _x('Logout', 'memb_logout_link', self::$m4is_n3zlk );
 $m4is_z50f = sprintf( '<a href="%s" title="%s" class="memb_logout_link">%s</a>', $m4is_gyv9, $m4is_v8g5, $m4is__jdge );
 } else { $m4is_z50f = $m4is_gyv9;
 } return m4is_crqo::m4is__go6j( false, $m4is_z50f, '', $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 } static 
function m4is_niylr_( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string { if ( self::$m4is_o3m_c5 ) { return '';
 } if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return 'n/a';
 } if ( ! is_singular() ) { return '';
 } unset( $_SESSION['keap'], $_SESSION['memb_user'] );
 wp_destroy_current_session();
 wp_clear_auth_cookie();
 wp_logout();
 return '';
 }  static 
function m4is_nd7u( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  if ( is_feed() || self::$m4is_bnd6ti->m4is_lvmz1b() ) { return '';
 }  $m4is_r6nh_b = [ 'automatic' => true, 'delay' => 0, 'forcejs' => true, 'target' => '_self', 'url' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_imdo6 = trim( $m4is_qnjfv['url'] );
 $m4is_cd8k = get_the_id();
 $m4is_q5pwc = (int) $m4is_qnjfv['delay'] * 1000;
 $m4is_qe8o = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['automatic'], true );
 $m4is_tybt = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['forcejs'], true );
 $m4is_p4izs = strtolower( trim( $m4is_qnjfv['target'] ) );
 $m4is_yoq0z = ! headers_sent();
 $m4is_yoq0z = $m4is_yoq0z && empty( $m4is_q5pwc );
 $m4is_yoq0z = $m4is_yoq0z && ( is_single( $m4is_cd8k ) || is_page( $m4is_cd8k ) );
 $m4is_yoq0z = $m4is_yoq0z && $m4is_qe8o;
 $m4is_yoq0z = $m4is_yoq0z && ! $m4is_tybt;
  if ( $m4is_yoq0z ) { wp_redirect( html_entity_decode( $m4is_imdo6 ) );
 exit;
 }  $m4is_e67db3 = $m4is_p4izs == '_self' || empty( $m4is_p4izs ) ? sprintf( 'window.location  = ("%s");', $m4is_imdo6 ) : sprintf( 'window.open( "%s", "%s" );', $m4is_imdo6, $m4is_p4izs );
  if ( $m4is_q5pwc ) { $m4is_ud8l = <<<JAVASCRIPTBLOCK
				'<script>
					jQuery(document).ready(function() {
						setTimeout(function() {
							{$m4is_e67db3}
						}, {$m4is_q5pwc} );
					});
				</script>
			JAVASCRIPTBLOCK;
 } else { $m4is_ud8l = "<script> {$m4is_e67db3} </script>";
 }  return html_entity_decode( $m4is_ud8l );
 }  static 
function m4is_y4jr2g( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'capture' => '', 'txtfmt' => '', 'filename' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_carw7y = strtolower( $m4is_carw7y );
  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  if ( substr( $m4is_qnjfv['filename'], 0, 1 ) !== '/' && substr( $m4is_qnjfv['filename'], 0, 1 ) !== '\\' ) { $m4is_qnjfv['filename'] = ABSPATH . '/' . $m4is_qnjfv['filename'];
 }  $m4is_qnjfv['filename'] .= '.php';
  if ( ! file_exists( $m4is_qnjfv['filename'] ) ) { if ( self::$m4is_bnd6ti->m4is_lvmz1b() ) { return _x( 'Not Found.', 'memb_php_include', self::$m4is_n3zlk );
 } else { return '';
 } }  ob_start();
  if ( $m4is_carw7y == 'memb_phpinclude_once' ) { include_once $m4is_qnjfv['filename'];
 } else { include $m4is_qnjfv['filename'];
 }  $m4is_uzfw8j = ob_get_clean();
  return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'] );
 }  static 
function m4is_hmnux( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'default' => '', 'htmlattr' => '', 'name' => '', 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 }  $m4is_veymi8 = [ 'memb_cookie' => $_COOKIE, 'memb_get' => $_GET, 'memb_post' => $_POST, 'memb_request' => $_REQUEST, 'memb_server' => $_SERVER, 'memb_session' => isset( $_SESSION ) ? $_SESSION : [], ];
  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_uzfw8j = '';
 $m4is_carw7y = strtolower( $m4is_carw7y );
  $m4is_j2fam = array_key_exists( $m4is_carw7y, $m4is_veymi8 ) ? $m4is_veymi8[ $m4is_carw7y ] : false;
  $m4is_geb0fn = array_filter( explode( ',', $m4is_qnjfv['name'] ) );
  if ( ! $m4is_j2fam ) { return '';
 }  foreach ( $m4is_geb0fn as $m4is_i7j9_a ) { if ( ! empty( $m4is_j2fam[$m4is_i7j9_a] ) ) { $m4is_j2fam = $m4is_j2fam[$m4is_i7j9_a];
 } else { $m4is_j2fam = $m4is_qnjfv['default'];
 break;
 } }  $m4is_uzfw8j = is_array( $m4is_j2fam ) ? htmlspecialchars( print_r( $m4is_j2fam, true ) ) : htmlspecialchars( $m4is_j2fam );
  return (string) m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }  static 
function m4is_p0bnh( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'capture' => '', 'shortcodes' => false, 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_z50f = preg_replace( '#</p>\s*<p>#', '', $m4is_z50f );
  $m4is_kt0n = m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['shortcodes'], false );
  $m4is_z50f = $m4is_kt0n ? do_shortcode( $m4is_z50f ) : $m4is_z50f;
  return m4is_crqo::m4is__go6j( false, $m4is_z50f, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'] );
 }  static 
function m4is_levsa( $m4is_qnjfv = [], string $m4is_z50f = '', string $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  if ( is_feed() ) { return '';
 }  $m4is_wm_ta = [ '__utma', '__utmc', '__utmz', 'NREUM', 'PHPSESSID', 'wordpress_test_cookie', 'wp-settings-1', 'wp-settings-time-1', ];
  $m4is_r6nh_b = [ 'domain' => $_SERVER['HTTP_HOST'], 'expiration' => 'forever', 'httponly' => false, 'name' => '', 'path' => '/', 'secure' => false, 'value' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ', ', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_hofqx = trim( $m4is_qnjfv['name'] );
 if ( empty( $m4is_hofqx ) || in_array( $m4is_hofqx, $m4is_wm_ta ) ) { return '';
 }  $m4is_qnjfv['expiration'] = strtolower( trim( $m4is_qnjfv['expiration'] ) );
 if ( $m4is_qnjfv['expiration'] === 'forever' ) { $m4is_qnjfv['expiration'] = '2038-01-19 00:00:00';
 } elseif ( $m4is_qnjfv['expiration'] == '' || $m4is_qnjfv['expiration'] == 'session' ) { $m4is_qnjfv['expiration'] = 0;
 } elseif ( $m4is_qnjfv['expiration'] === (int) $m4is_qnjfv['expiration'] ) { $m4is_qnjfv['expiration'] += time();
 } else { $m4is_qnjfv['expiration'] = strtotime( $m4is_qnjfv['expiration'] );
 }  $_COOKIE[ $m4is_hofqx ] = $m4is_qnjfv['value'];
  m4is_w0enbm::m4is_e5l8a9()->set_cookie[$m4is_hofqx] = [ 'name' => $m4is_hofqx, 'value' => $m4is_qnjfv['value'], 'expiration' => $m4is_qnjfv['expiration'], 'path' => $m4is_qnjfv['path'], 'domain' => $m4is_qnjfv['domain'], 'secure' => m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['secure'], false ), 'httponly' => m4is_crqo::m4is_c0cy5i( $m4is_qnjfv['httponly'], false ), ];
 return '';
 }  static 
function m4is_eycar( $m4is_qnjfv = [], $m4is_z50f = '', $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
  $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'date' => 'now', 'format' => 'l, F dS, Y, g:sA e', 'host_timezone' => get_option( 'timezone_string' ), 'htmlattr' => '', 'modifier' => '', 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_uzfw8j = '';
 $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
 $m4is_knog = timezone_identifiers_list();
  $m4is_qnjfv['host_timezone'] = empty( $m4is_qnjfv['host_timezone']) ? 'UTC' : $m4is_qnjfv['host_timezone'];
  if (! in_array( $m4is_qnjfv['host_timezone'], $m4is_knog ) ) { $m4is_m1_u2 = array_search( strtolower( $m4is_qnjfv['host_timezone'] ), array_map( 'strtolower', $m4is_knog ) );
 if ( $m4is_m1_u2 !== false ) { $m4is_qnjfv['host_timezone'] = $m4is_knog[ $m4is_m1_u2 ];
 } }  if ( in_array( $m4is_qnjfv['host_timezone'], $m4is_knog ) ) { $m4is_jnep2 = date_default_timezone_get();
 date_default_timezone_set( $m4is_qnjfv['host_timezone'] );
 $m4is_uzfw8j = date( $m4is_qnjfv['format'], strtotime( $m4is_qnjfv['date'] . ' ' . $m4is_qnjfv['modifier'] ) );
 date_default_timezone_set( $m4is_jnep2 );
 } return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }  static 
function m4is_s749s( $m4is_qnjfv = [], $m4is_z50f = null, $tag = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  m4is_aoxw::m4is_djr4nd();
  $m4is_r6nh_b = [ 'capture' => '', 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 }  $m4is_uzfw8j = '';
  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_ryw0 = self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'global_excerpt' );
  if (! empty( $m4is_ryw0 ) ) { $m4is_uzfw8j = do_shortcode( $m4is_ryw0 );
 }  return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'] );
 }  static 
function m4is_n3fcx6( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'date_format' => 'F jS, Y', 'htmlattr' => '', 'txtfmt' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 }  if ( ! is_user_logged_in() ) { return '';
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_uzfw8j = date( $m4is_qnjfv['date_format'], strtotime( get_userdata( get_current_user_id() )->user_registered ) );
  return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after'] );
 }  static 
function m4is_s3lhxe($m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '') : string {  if (self::$m4is_o3m_c5) { return '';
 } m4is_aoxw::m4is_djr4nd();
  if (!m4is_u68pu::m4is_u6mkaw()) { return wp_login_url();
 }  $m4is_r6nh_b = [ 'after' => '', 'before' => '', 'capture' => '', 'htmlattr' => '', 'txtfmt' => '', ];
  if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b));
 }  $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk);
  $m4is_cd8k = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'registration_url');
 $m4is_c14oc = self::$m4is_bnd6ti->m4is_oiewvu('settings', 'login_url');
  if (!$m4is_cd8k && $m4is_c14oc > 0) { $m4is_cd8k = $m4is_c14oc;
 }  $m4is_uzfw8j = $m4is_cd8k ? get_permalink($m4is_cd8k) : get_site_url();
  return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], $m4is_qnjfv['before'], $m4is_qnjfv['after']);
 }  static 
function m4is_vfku8( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  m4is_aoxw::m4is_djr4nd();
  $m4is_r6nh_b = [ 'authkey' => '', 'cachetime' => 3600, 'capture' => '', 'field' => 'post_content', 'id' => 0, 'txtfmt' => '', 'url' => '', ];
  if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 }  $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk);
  if (empty($m4is_qnjfv['id']) || empty($m4is_qnjfv['url']) || empty($m4is_qnjfv['authkey']) || empty($m4is_qnjfv['field']) ) { return '';
 }  $m4is_ojkdn7 = [ 'user-agent' => 'Memberium', 'body' => ['contactId' => self::$m4is_e2kg ], ];
  $m4is_tlwgy = $m4is_qnjfv['url'] . '?operation=get-post&auth_key=' . urlencode(trim($m4is_qnjfv['authkey']) ) . '&post_id=' . $m4is_qnjfv['id'] . '&field=' . urlencode(trim($m4is_qnjfv['field']) );
  $response = wp_remote_post($m4is_tlwgy, $m4is_ojkdn7);
  $m4is_uzfw8j = do_shortcode($response['body']);
  return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, $m4is_qnjfv['txtfmt'], $m4is_qnjfv['capture']);
 }  static 
function m4is_hk8hq( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  m4is_aoxw::m4is_djr4nd();
  $m4is_r6nh_b = [ 'type' => 'lostpassword', 'htmlattr' => '', 'redirect' => '', ];
  if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_u23rl = strtolower( trim( $m4is_qnjfv['type'] ) );
  $m4is_afnh = get_option( 'memberium_pages' );
    $m4is_uzfw8j = $m4is_u23rl == 'lostpassword' ? wp_lostpassword_url( $m4is_qnjfv['redirect'] ) : ( array_key_exists( $m4is_u23rl, $m4is_afnh ) ? get_permalink( $m4is_afnh[ $m4is_u23rl ] ) : '' );
  return m4is_crqo::m4is__go6j( false, $m4is_uzfw8j, '', '', $m4is_qnjfv['htmlattr'] );
 }  static 
function m4is_auav( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) : string {  if ( self::$m4is_o3m_c5 ) { return '';
 }  m4is_aoxw::m4is_djr4nd();
  $m4is_r6nh_b = [ 'action' => 'default', ];
  if ( array_key_exists(0, $m4is_qnjfv) && $m4is_qnjfv[0] === 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 }  $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, self::$m4is_n3zlk );
  $m4is_hfxyia = [ 'default', 'excerpt', 'hide', 'redirect', 'show', ];
  $m4is_v6fdv4 = in_array( strtolower(trim($m4is_qnjfv['action'])), $m4is_hfxyia ) ? strtolower(trim($m4is_qnjfv['action'])) : 'default';
  m4is_w0enbm::m4is_e5l8a9()->m4is_nnv5d( $m4is_v6fdv4 );
  return '';
 }  }

