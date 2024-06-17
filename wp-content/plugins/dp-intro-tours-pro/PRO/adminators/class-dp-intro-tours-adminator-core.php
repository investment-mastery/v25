<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;

abstract class Dp_Intro_Tours_Adminator_Core {



	abstract public function get_license_key_settings_id();
	abstract protected function get_license_key_placeholder();

	public function __construct() {
		$this->check_update();
		add_action( 'rest_api_init', [ $this, 'register_api_routes' ] );
	}

	public function get_license_key_title() {
		return __( 'License Key', 'dp-intro-tours' );
	}

	protected function check_update() {
		if ( $this->is_adminated() ) {
			$pluginDir = realpath( dirname( __FILE__ ) . '/../..' );
			include $pluginDir . '/plugin-update-checker/plugin-update-checker.php';
			Puc_v4_Factory::buildUpdateChecker(
				'https://update.deeppresentation.com/?action=get_metadata&slug=dp-intro-tours-pro',
				$pluginDir . '/dp-intro-tours.php', //Full path to the main plugin file.
				'dp-intro-tours-pro' //Plugin slug. Usually it's the same as the name of the directory.
			);
		}
	}

	public function register_api_routes() {
		register_rest_route(
			'dpintrotours/v1',
			'get-adminator-data',
			[
				'methods'             => WP_REST_SERVER::READABLE,
				'callback'            => [ $this, 'api_init_data' ],
				'permission_callback' => function ( $request ) {
					return current_user_can( 'read' );
				},
			]
		);
		register_rest_route(
			'dpintrotours/v1',
			'set-data',
			[
				'methods'             => WP_REST_SERVER::ALLMETHODS,
				'callback'            => [ $this, 'api_set_data' ],
				'permission_callback' => function ( $request ) {
					return is_user_logged_in() && current_user_can( 'edit_posts' );
				},
			]
		);
	}

	public function filter_api_init_data( $data ) {
		return $data;
	}

	public function after_license_settings() {
	}

	public function api_init_data() {
		$hiddenOptions = get_option( 'dp_it_hidden_options', [] );
		return $this->filter_api_init_data(
			[
				'licenseKey'   => $this->get_license_key(),
				'adminated'    => Arr::sget( $hiddenOptions, 'adminated', '' ) == '1',
				'licenseLabel' => Arr::sget( $hiddenOptions, 'licenseLabel', '' ),
			]
		);
	}

	public function api_set_data( $data ) {
		$parameters = $data->get_params();
		if ( $parameters ) {
			Settings::update_setting_array( 'dp_it_license_options', 'licenseKey', $parameters['licenseKey'], true );
			$hiddenOptions = get_option( 'dp_it_hidden_options' );
			if ( ! $hiddenOptions ) {
				$hiddenOptions = [];
			}
			$hiddenOptions['adminated']           = ( $parameters['adminated'] ) ? '1' : '0';
			$hiddenOptions['licenseLabel']        = $parameters['licenseLabel'];
			$hiddenOptions['adminatedTill']       = $parameters['adminatedTill'];
			$hiddenOptions['lastValidationTimeS'] = $parameters['lastValidationTimeS'];
			update_option( 'dp_it_hidden_options', $hiddenOptions );
			return true;
		}
		wp_die();
	}

	public function action_links( $links ) {
		$base_url = admin_url( Dp_Intro_Tours_Helper::get_plugin_settings_page_path( 'license', true ) );
		$mylinks  = [ '<a href="' . $base_url . '">' . __( 'License settings', 'dp-intro-tours' ) . '</a>' ];
		return array_merge( $links, $mylinks );
	}

	public function is_adminated() {
		$adminated = Settings::get_setting_array_field( 'dp_it_hidden_options', 'adminated', '0' ) == 1;
		return $adminated && ! $this->is_adminity_expired();
	}

	public function is_adminity_expired() {
		$adminatedTillStr = Settings::get_setting_array_field( 'dp_it_hidden_options', 'adminatedTill', '' );
		if ( ! empty( $adminatedTillStr ) ) {
			$date_utc      = new DateTime( 'now', new DateTimeZone( 'UTC' ) );
			$adminatedTill = new DateTime( $adminatedTillStr );
			return $date_utc > $adminatedTill;
		}
		return false;
	}
	public function get_remaining_days() {
		$adminatedTillStr = Settings::get_setting_array_field( 'dp_it_hidden_options', 'adminatedTill', '' );
		if ( ! empty( $adminatedTillStr ) ) {
			$date_utc      = new DateTime( 'now', new DateTimeZone( 'UTC' ) );
			$adminatedTill = new DateTime( $adminatedTillStr );
			return $date_utc->diff( $adminatedTill )->days;
		}
		return null;
	}

	public function get_license_key() {
		return trim( Settings::get_setting_array_field( 'dp_it_license_options', $this->get_license_key_settings_id() ) );
	}
}
