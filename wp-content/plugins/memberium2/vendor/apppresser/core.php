<?php


class_exists('m4is_pms8y') || die();
 final 
class wpal_memberium_apppresser_bridge_class { 
function m4is_ww61so() { add_action('rest_api_init', [$this, 'add_api_fields']);
 add_action('rest_api_init', [$this, 'appp_cors']);
 		add_action('rest_api_init', [$this, 'register_routes']);
 add_filter('wp_authenticate_user', [$this, 'check_app_unverified'], 10, 2);
 	} 
function add_api_fields() { 
		register_rest_field('post', 'featured_image_urls', [ 'get_callback' => [$this, 'image_sizes'], 'update_callback' => null, 'schema' => null, ] );
 		$m4is_qtapuz = appp_get_setting('media_post_types');
 if (!empty($m4is_qtapuz) ) { foreach ($m4is_qtapuz as $m4is_u23rl) { register_rest_field($m4is_u23rl, 'appp_media', [ 'get_callback' => [$this, 'get_media_url'], 'update_callback' => null, 'schema' => null, ] );
 } } } 
	
function api_login($m4is_cme_a) { $m4is_fk6e78['user_login'] = ($_POST['username'] ? $_POST['username'] : $_SERVER['PHP_AUTH_USER']);
 $m4is_fk6e78['user_password'] = ($_POST['password'] ? $_POST['password'] : $_SERVER['PHP_AUTH_PW']);
 $m4is_fk6e78['remember'] = true;
 if (empty($m4is_fk6e78['user_login']) || empty($m4is_fk6e78['user_password']) ) { $m4is_k2p03k = [ 'success' => false, 'data' => [ 'message' => apply_filters('appp_login_error', __('Login missing required fields.', 'apppresser'), ''), 'success' => false ] ];
 return rest_ensure_response($m4is_k2p03k);
 } do_action('appp_before_signon', $m4is_fk6e78);
 $m4is_y4fk = wp_signon($m4is_fk6e78, false);
 do_action('appp_login_header');
 if (is_wp_error($m4is_y4fk) ) { $m4is_k2p03k = [ 'success' => false, 'data' => [ 'message' => apply_filters('appp_login_error', __('The login you have entered is not valid.', 'apppresser'), $m4is_fk6e78['user_login']), 'success' => false ] ];
 return rest_ensure_response($m4is_k2p03k);
 } else { 			$m4is_r4gm03 = $this->do_cookie_auth($m4is_y4fk->ID);
 $m4is_k2p03k = [ 'message' => apply_filters('appp_login_success', sprintf(__('Welcome back %s!', 'apppresser'), $m4is_y4fk->display_name), $m4is_y4fk->ID), 'username' => $m4is_fk6e78['user_login'], 'avatar' => get_avatar_url($m4is_y4fk->ID), 'cookie_auth' => $m4is_r4gm03, 'login_redirect' => AppPresser_Ajax_Extras::get_login_redirect(), 				'success' => true, 'user_id' => $m4is_y4fk->ID ];
 } $m4is_k2p03k = apply_filters('appp_login_data', $m4is_k2p03k, $m4is_y4fk->ID);
 $retval = rest_ensure_response($m4is_k2p03k);
 return $retval;
 } 
	
function api_logout($m4is_cme_a) { do_action('appp_logout_header');
 if (! defined('DOING_AJAX') ) { define('DOING_AJAX', true);
 } wp_logout();
 $m4is_d71ub = [ 'message' => __('Logout success.', 'apppresser'), 'success' => true ];
 $m4is__7cx = $this->get_logout_redirect();
 if ($m4is__7cx) { $m4is_d71ub['logout_redirect'] = $m4is__7cx;
 } $m4is_yjr3 = rest_ensure_response($m4is_d71ub);
 return $m4is_yjr3;
 } 
	
function appp_cors() { 		if (appp_get_setting('ap3_enable_cors', false) ) { add_filter('appp_allow_api_origin', function() { return '*';
 });
 $this->app_cors_header();
 } else { add_filter('appp_allow_api_origin', function() { return false;
 });
 } } 
	
function app_cors_header() { $m4is_nmn2 = apply_filters('appp_allow_api_origin', '*');
 $m4is_cvy9p = apply_filters('appp_allow_api_methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
 if ($appp_allow_origin) { header("Access-Control-Allow-Origin: {$m4is_nmn2}");
 header("Access-Control-Allow-Methods: {$m4is_cvy9p}");
 } } 
	
function check_app_unverified($m4is_x0_hk, $m4is_j485e) { if (get_user_meta($m4is_x0_hk->ID, 'app_unverified', true) ) { return new WP_Error('app_unverified_login', __('You have not verified your account by email, please contact support.', 'apppresser'), [ 'status' => 404, ] );
 } return $m4is_x0_hk;
 } 
	
function do_cookie_auth($m4is_ig9p6) { if (function_exists('openssl_encrypt') ) { $m4is_s2ge5 = substr(AUTH_KEY, 2, 5);
 $m4is_wf68 = substr(AUTH_KEY, 0, 16);
 $m4is_m48ngu = "AES-128-CBC";
 $m4is_sy54 = openssl_encrypt($m4is_ig9p6, $m4is_m48ngu, $m4is_s2ge5, null, $m4is_wf68);
 } else { 			$m4is_sy54 = $m4is_ig9p6;
 } update_user_meta($m4is_ig9p6, 'app_cookie_auth', $m4is_sy54);
 return $m4is_sy54;
 } 
	
function get_logout_redirect() { if (has_filter('appp_logout_redirect') ) { $m4is_l579 = apply_filters('appp_logout_redirect', '');
 return AppPresser_Ajax_Extras::add_redirect_title($m4is_l579);
 } else { return '';
 } } 
function get_media_url($m4is_c2ah) { $m4is_w_o7al = get_post_meta($m4is_c2ah['id'], 'appp_media_url', true);
 $m4is_etj2 = [];
 if (empty($m4is_w_o7al)) { return;
 } $m4is_etj2['media_url'] = $m4is_w_o7al;
 $m4is_o4bt = get_post_meta($m4is_c2ah['id'], 'appp_media_image', true);
 if (! empty($m4is_o4bt) ) { $m4is_etj2['media_image'] = $m4is_o4bt;
 } return $m4is_etj2;
 } 
	
function get_password_reset_code($m4is_cme_a) { $m4is_fliw = $m4is_cme_a['email'];
 $m4is_x0_hk = get_user_by('email', $m4is_fliw);
 if ($m4is_x0_hk) { $m4is_n260nx = current_time('mysql');
 $m4is_i978y = $this->get_short_reset_code();
 			update_user_meta($m4is_x0_hk->ID, 'app_hash', $m4is_i978y);
 $m4is_d6ts = __('App Password Reset', 'apppresser');
 $m4is_d6ts = apply_filters('appp_pw_reset_email_subject', $m4is_d6ts);
 $m4is_wbgl5s = __('Enter the code into the app to reset your password. Code: ', 'apppresser') . $m4is_i978y;
 $m4is_wbgl5s = apply_filters('appp_pw_reset_email', $m4is_wbgl5s, $m4is_i978y);
 $mail = wp_mail($m4is_x0_hk->user_email, $m4is_d6ts, $m4is_wbgl5s);
 $return = [ 'success' => true, 'got_code' => true, 'message' => __('Please check your email for your verification code.', 'apppresser') ];
 } else { $return = [ 'success' => false, 'message' => __('The email you have entered is not valid.', 'apppresser') ];
 } return $return;
 } 
function get_short_reset_code() { $m4is_cdps1r = str_split('1234567890');
 $m4is_b6_zv = str_split('abcdefghijklmnopqrstuvwxyz');
 shuffle($m4is_cdps1r);
 shuffle($m4is_b6_zv);
 $m4is_carw7y = $m4is_cdps1r[1] . $m4is_b6_zv[1] . $m4is_b6_zv[2] . $m4is_cdps1r[3];
 return $m4is_carw7y;
 } 
function image_sizes($m4is_c2ah) { $m4is_rera = get_post_thumbnail_id($m4is_c2ah['id']);
 $m4is_b67n = wp_get_attachment_metadata($m4is_rera);
 $m4is_deklht = new stdClass();
 if (! empty($m4is_b67n['sizes']) ) { foreach ($m4is_b67n['sizes'] as $key => $size) { 				$image_src = wp_get_attachment_image_src($m4is_rera, $key);
 if (! $image_src) { continue;
 } $m4is_deklht->$key = $image_src[0];
 } } return $m4is_deklht;
 } 
	
function register_routes() { 		if (! class_exists('WP_REST_Controller') ) { return;
 } $m4is_n3zlk = 'appp/v1';
 $m4is_szl_j = 'methods';
 $m4is_y2d1 = 'callback';
 $m4is_kmwlbe = WP_REST_Server::CREATABLE;
 $m4is_s287nm = WP_REST_Server::READABLE;
 register_rest_route($m4is_n3zlk, '/login', [ [ $m4is_szl_j => $m4is_kmwlbe, $m4is_y2d1 => [$this, 'api_login'] ], ]);
 register_rest_route($m4is_n3zlk, '/logout', [ [ $m4is_szl_j => $m4is_s287nm, $m4is_y2d1 => [$this, 'api_logout'] ], ]);
 register_rest_route($m4is_n3zlk, '/register', [ [ $m4is_szl_j => $m4is_kmwlbe, $m4is_y2d1 => [$this, 'register_user'] ], ]);
 register_rest_route($m4is_n3zlk, '/verify', [ [ $m4is_szl_j => $m4is_kmwlbe, $m4is_y2d1 => [$this, 'verify_user'] ], ]);
 register_rest_route($m4is_n3zlk, '/verify-resend', [ [ $m4is_szl_j => $m4is_kmwlbe, $m4is_y2d1 => [$this, 'send_verification_code'] ], ]);
 register_rest_route($m4is_n3zlk, '/reset-password', [ [ $m4is_szl_j => $m4is_kmwlbe, $m4is_y2d1 => [$this, 'reset_password'] ], ]);
 } 
	
function register_user($m4is_cme_a) { if (empty($m4is_cme_a['username']) || empty($m4is_cme_a['email']) ) { return new WP_Error('rest_invalid_registration', __('Missing required fields.', 'apppresser'), [ 'status' => 404, ] );
 } if (email_exists($m4is_cme_a['email']) || username_exists($m4is_cme_a['username']) ) { return new WP_Error('rest_invalid_registration', __('Email or username already exists.', 'apppresser'), [ 'status' => 404, ] );
 } if (empty($m4is_cme_a['password']) ) { $m4is_j485e = wp_generate_password(8);
 		} else { $m4is_j485e = $m4is_cme_a['password'];
 } $m4is_mhv_pw = [ 'user_login' => $m4is_cme_a['username'], 'user_pass' => $m4is_j485e, 'user_email' => $m4is_cme_a['email'], 'first_name' => $m4is_cme_a['first_name'], 'last_name' => $m4is_cme_a['last_name'] ];
 $m4is_ig9p6 = wp_insert_user( $m4is_mhv_pw );
 if ( is_wp_error( $m4is_ig9p6 ) ) { return new WP_Error('rest_invalid_registration', __('Something went wrong with registration.', 'apppresser'), [ 'status' => 404, ] );
 } update_user_meta($m4is_ig9p6, 'app_unverified', true);
 $m4is_i0wte = $this->send_verification_code($m4is_cme_a);
 
		if (! $m4is_i0wte) { return new WP_Error('rest_invalid_registration', __('We could not send your verification code by email, please contact support.', 'apppresser'), [ 'status' => 404, ] );
 } do_action('appp_register_unverified', $m4is_ig9p6);
 $m4is__8htld = __("Your verification code has been sent, please check your email.", "apppresser");
 $m4is_yjr3 = rest_ensure_response($m4is__8htld);
 return $m4is_yjr3;
 } 
	
function reset_password($m4is_cme_a) { $m4is_kof0 = [ 'success' => false, 'message' => 'Missing required fields.' ];
 if (isset($m4is_cme_a['code']) && isset($m4is_cme_a['password']) ) { $m4is_kof0 = $this->validate_reset_password($m4is_cme_a);
 } elseif (isset($m4is_cme_a['email']) ) { $m4is_kof0 = $this->get_password_reset_code($m4is_cme_a);
 } return $m4is_kof0;
 } 
	
function send_verification_code($m4is_cme_a) { if (empty($m4is_cme_a['email']) || empty($m4is_cme_a['username']) ) { return new WP_Error('rest_invalid_verification', __('Missing required field.', 'apppresser'), [ 'status' => 404, ] );
 } if (! email_exists($m4is_cme_a['email']) || ! username_exists($m4is_cme_a['username']) ) { return new WP_Error('rest_invalid_verification', __('Invalid username or email.', 'apppresser'), [ 'status' => 404, ] );
 } $m4is_on9o = hash('md5', $m4is_cme_a['username'] . $m4is_cme_a['email']);
 		$m4is_on9o = substr($m4is_on9o, 1, 4);
 		$m4is_d6ts = __('Your Verification Code', 'apppresser');
 $m4is_d6ts = apply_filters('appp_verification_email_subject', $m4is_d6ts);
 $m4is_z50f = sprintf(__("Hi, thanks for registering! Here is your verification code: %s \n\nPlease enter this code in the app. \n\nThanks!", "apppresser"), $m4is_on9o);
 $m4is_z50f = apply_filters('appp_verification_email', $m4is_z50f, $m4is_on9o);
 $m4is_i0wte = wp_mail($m4is_cme_a["email"], $m4is_d6ts, $m4is_z50f);
 return $m4is_i0wte;
 } 
	
function validate_reset_password($m4is_cme_a) { global $wpdb;
 $m4is_carw7y = $m4is_cme_a['code'];
 $m4is_j485e = $m4is_cme_a['password'];
 $m4is_k4yeul = [ 'meta_key' => 'app_hash', 'meta_value' => $m4is_carw7y ];
 $m4is_x0_hk = get_users($m4is_k4yeul);
 if ($m4is_x0_hk) { $m4is_k4yeul = [ 'ID' => $m4is_x0_hk[0]->data->ID, 'user_pass' => $m4is_j485e ];
 wp_update_user($m4is_k4yeul) ;
 delete_user_meta($m4is_x0_hk[0]->data->ID, 'app_hash');
 			$m4is_kof0 = [ 'message' => __('Your password has been changed, please login.', 'apppresser'), 'pw_changed' => true, 'success' => true ];
 } else { $m4is_kof0 = [ 'success' => false, 'message' => __('The code you have entered is not valid.', 'apppresser') ];
 } return $m4is_kof0;
 } 
	
function verify_user($m4is_cme_a) { if (empty($m4is_cme_a['email']) || empty($m4is_cme_a['verification']) ) { return new WP_Error('rest_invalid_verification', __('Missing required field.', 'apppresser'), [ 'status' => 404, ] );
 } $m4is_on9o = hash('md5', $m4is_cme_a['username'] . $m4is_cme_a['email']);
 $m4is_on9o = substr($m4is_on9o, 1, 4);
 if ($m4is_cme_a['verification'] != strval($m4is_on9o) ) { 			return new WP_Error('rest_invalid_verification', __('The verification code does not match.', 'apppresser'), [ 'status' => 404, ] );
 } $m4is_x0_hk = get_user_by('email', $m4is_cme_a['email']);
 delete_user_meta($m4is_x0_hk->ID, 'app_unverified');
 		$info = [];
 $info['user_login'] = $m4is_cme_a['username'];
 $info['user_password'] = $m4is_cme_a['password'];
 $info['remember'] = true;
 $user_signon = wp_signon($info, false);
 if (is_wp_error($user_signon) || !$m4is_x0_hk) { return new WP_Error('rest_invalid_verification', __('Verification succeeded, please login.', 'apppresser'), ['status' => 200,]);
 } $m4is_wbgl5s = [ 'message' => apply_filters('appp_login_success', sprintf(__('Welcome back %s!', 'apppresser'), $user_signon->display_name), $user_signon->ID), 'username' => $info['user_login'], 'avatar' => get_avatar_url($user_signon->ID), 			'success' => true, 'user_id' => $user_signon->ID ];
 		$m4is_wbgl5s = apply_filters('appp_login_data', $m4is_wbgl5s, $user_signon->ID);
 do_action('appp_register_verified', $user_signon->ID);
 $m4is_yjr3 = rest_ensure_response($m4is_wbgl5s);
 return $m4is_yjr3;
 } 
	
function __construct() { $this->m4is_ww61so();
 } }

