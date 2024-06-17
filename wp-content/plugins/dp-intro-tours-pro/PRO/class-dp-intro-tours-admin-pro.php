<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Str;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link  https://deeppresentation.com
 * @since 1.0.0
 *
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/admin
 * @author     Tomas Groulik <tomas.groulik@gmail.com>
 */
class Dp_Intro_Tours_Admin_PRO extends Dp_Intro_Tours_Admin {

	protected $adminator = null;
	public function __construct( $adminator ) {
		$this->adminator = $adminator;
	}

	protected function load_js_scripts_at_all_admin_pages() {
		// Admin colors
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdmin',
			[
				'in_footer' => true,
			],
			'dp_main_admin_config',
			[
				'dpDebugEn'   => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'adminColors' => [
					'colors'       => get_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_admin_colors' ) ),
					'rootSelector' => 'body',
					'addRgbVars'   => true,
				],
			]
		);

		// Adminator
		$ui_active                     = Dp_Intro_Tours_Helper::get_url_param( 'page' ) === 'dp_intro_tours' && Dp_Intro_Tours_Helper::get_url_param( 'tab' ) === 'license';
		$current_time_s                = round( time() );
		$last_adminator_validation_str = Settings::get_setting_array_field( 'dp_it_hidden_options', 'lastValidationTimeS' );
		$should_validate               = false;
		if ( ! $last_adminator_validation_str ) {
			$should_validate = true;
		} else {
			$last_adminator_validation_s = intval( $last_adminator_validation_str );
			$should_validate             = $current_time_s > $last_adminator_validation_s + ( 86400 * 5 ); /** 5 days */
		}
		if ( $ui_active || $should_validate ) {
			$adminator_script_id = 'dpIntroToursAdminator' . Str::to_camel_case( strtolower( DP_INTRO_TOURS_ADMINATOR ), '_', true );
			Dp_Intro_Tours_Enqueue::enqueue(
				'main',
				$adminator_script_id,
				[
					'in_footer' => true,
				],
				'dp_adminator_config',
				[
					'siteUrl'                => get_site_url(),
					'currentTimeS'           => $current_time_s,
					'dpDebugEn'              => Dp_Intro_Tours_Helper::is_debug_console_en(),
					'APIEndPoint'            => DP_INTRO_TOURS_PRODUCT_ADMINATOR_END_POINT,
					'keyBuyLink'             => DP_INTRO_TOURS_PRODUCT_KEY_BUY_LINK_PRO,
					'adminatorInputSelector' => '#dp_it_license_options-text-' . $this->adminator->get_license_key_settings_id(),
					'uiActive'               => $ui_active,
					'nonces'                 => [
						'wp_rest' => wp_create_nonce( 'wp_rest' ),
					],
					'i18n'                   => [
						'activation_troubles'          => __( 'In case of troubles with activation, try it in 1 hour, if it doesn\'t work neither, don\'t hesitate to contact', 'dp-intro-tours' ) . ' <a href="' . DP_INTRO_TOURS_CONTACT_LINK . '" target="_blank">' . __( 'our support', 'dp-intro-tours' ) . '</a>.',
						'deactivate'                   => __( 'Deactivate', 'dp-intro-tours' ),
						'activate'                     => __( 'Activate', 'dp-intro-tours' ),
						'deactivation'                 => __( 'Deactivation', 'dp-intro-tours' ),
						'activation'                   => __( 'Activation', 'dp-intro-tours' ),
						'validation'                   => __( 'Validation', 'dp-intro-tours' ),
						'trying_to_activate_empty_key' => __( 'You are trying to %s plugin with empty key. Set valid activation key first!', 'dp-intro-tours' ),
						'unknown_error'                => __( 'Unknown error occurred.', 'dp-intro-tours' ),
						'expiration_of_license'        => __( 'Expiration of license', 'dp-intro-tours' ),
						'never_life_time_provided'     => __( 'NEVER (life-time update provided)', 'dp-intro-tours' ),
						'extend_call'                  => Dp_Intro_Tours_Helper::get_generic_i18n( 'extend_call' ),
						'u_licence_expired'            => __( 'Unfortunately your license already expired.', 'dp-intro-tours' ),
						'extend_now'                   => __( 'EXTEND NOW', 'dp-intro-tours' ),
						'your_lic_expire_at'           => __( 'Your license expired at', 'dp-intro-tours' ),
						'failed'                       => Dp_Intro_Tours_Helper::get_generic_i18n( 'failed' ),
						'was_successful'               => Dp_Intro_Tours_Helper::get_generic_i18n( 'was_successful' ),
						'lic_succ_activ'               => __( 'Congratulation! Your license for Intro Tour Tutorial PRO plugin is now active. Thank you!', 'dp-intro-tours' ),
						'one_instal_active'            => __( '1 installation covered by this key is active.', 'dp-intro-tours' ),
						'all_x_instal_active'          => __( 'All %d installations covered by this key are active.', 'dp-intro-tours' ),
						'x_instal_from_y_active'       => __( '%1$d from possible %2$s installations covered by this key are active.', 'dp-intro-tours' ),
						'deactivated_label'            => __( 'Your license key was deactivated. You can reuse it in another installation now.', 'dp-intro-tours' ),
						'deactivated_info_msg'         => sprintf( __( 'Regular update is now deactivated. Set a key, and activate it to gain full up-to-date power of %s.', 'dp-intro-tours' ), DP_INTRO_TOURS_PRODUCT_TITLE_PRO ),
						'response_processing'          => __( 'Deactivate', 'dp-intro-tours' ),
					],
				]
			);

		}

	}

	protected function load_js_scripts_at_admin_settings_page() {
		wp_enqueue_style( 'wp-color-picker' );
		$current_tab = Dp_Intro_Tours_Helper::get_url_param( 'tab', 'general' );
		$nonces      = null;
		if ( $current_tab !== 'license' ) {
			$nonces = [
				'wp_rest' => wp_create_nonce( 'wp_rest' ),
			];
		}
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdminSettings',
			[
				'in_footer' => true,
				'js_dep'    => [ 'wp-color-picker', 'jquery' ],
			],
			'dp_main_admin_settings_config',
			[
				'siteUrl'             => get_site_url(),
				'dpDebugEn'           => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'assetsUrl'           => plugin_dir_url( __FILE__ ) . '../admin/assets',
				'tab'                 => Dp_Intro_Tours_Helper::get_url_param( 'tab', 'general' ),
				'mobile_break_points' => get_option( 'dp_it_mobile_breakpoints_options', [] ),
				'queryParamsDefs'     => Dp_Intro_Tours_Helper::get_dp_intro_query_params(),
				'nonces'              => $nonces,
				'i18n'                => [
					'set_selectors_visually' => __( 'Set selectors visually', 'dp-intro-tours' ),
					'or_set_man'             => Dp_Intro_Tours_Helper::get_generic_i18n( 'or_set_man' ),
					'allow_popup_to_set_mob' => Dp_Intro_Tours_Helper::get_generic_i18n( 'allow_popup_to_set_mob' ),
				],
			]
		);
	}

	protected function filter_acf_table_cfg( array $config ) : array {
		$config['dpWpLink'] = Dp_Intro_Tours_Wplink::get_dwplink_config( true );
		return $config;
	}

	protected function load_js_scripts_at_admin_edit_tour_page( $acf_table_deps = null ) {
		set_transient( Dp_Intro_Tours_Helper::get_transient_id( 'is_this_admin_edit_tour_page' ), true, 50 );
		Dp_Intro_Tours_Wplink::enqueue_style();
		parent::load_js_scripts_at_admin_edit_tour_page();
	}
}
