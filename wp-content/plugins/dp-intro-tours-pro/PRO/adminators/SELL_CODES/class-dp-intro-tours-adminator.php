<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Wp\AdminNotice;

class Dp_Intro_Tours_Adminator extends Dp_Intro_Tours_Adminator_Core {


	public function __construct() {
		if ( ! class_exists( 'Sellcodes_Plugin_Updater' ) ) {
			// load our custom updater
			$pluginDir = dirname( __FILE__ );
			include plugin_dir_path( $pluginDir ) . 'SELL_CODES/class-sellcodes-plugin-updater.php';
		}
		parent::__construct();

		add_action( 'admin_init', [ $this, 'activate_license' ] );
		add_action( 'admin_init', [ $this, 'deactivate_license' ] );
		add_action( 'admin_notices', [ $this, 'admin_notices' ] );
	}

	public function register_api_routes() {
	}

	public function filter_api_init_data( $data ) {
		$data['product_id'] = DP_INTRO_TOURS_PRODUCT_UPDATE_KEY;

		return $data;
	}

	public function after_license_settings() {
		$license     = $this->get_license_key();
		$adminated   = Settings::get_setting_array_field( 'dp_it_hidden_options', 'adminated', '0' );
		$statusText  = Settings::get_setting_array_field( 'dp_it_hidden_options', 'statusText', '' );
		$licenseInfo = Settings::get_setting_array_field( 'dp_it_hidden_options', 'licenseLabel', '' );
		?>
	<table class="form-table">
		<tbody>
		<?php if ( $license ) { ?>
			<tr valign="top">

			<th scope="row" valign="top">
			<?php _e( 'License Status', 'dp-intro-tours' ); ?>
			</th>
			<td>
			<?php
			if ( $statusText ) {
				echo $statusText;
			}
			?>
			<?php if ( $adminated == '1' ) { ?>
				<?php wp_nonce_field( 'sellcodes_dpintro_nonce', 'sellcodes_dpintro_nonce' ); ?>
				<input type="submit" class="button-secondary" name="sellcodes_license_deactivate" value="<?php _e( 'Deactivate License', 'dp-intro-tours' ); ?>"/>
				<?php
			} else {
				wp_nonce_field( 'sellcodes_dpintro_nonce', 'sellcodes_dpintro_nonce' );
				?>
				<input type="submit" class="button-secondary" name="sellcodes_license_activate" value="<?php _e( 'Activate License', 'dp-intro-tours' ); ?>"/>
			<?php } ?>
			</td>
		</tr>
			<?php if ( $licenseInfo ) { ?>
			<tr valign="top">
				<th scope="row" valign="top">
				<?php _e( 'License Info' ); ?>
				</th>
				<td>
				<?php if ( $adminated == '1' ) { ?>
					<span style="color:rgb(67, 119, 33);font-size: 13px;font-style: italic;"><?php echo $licenseInfo; ?></span>
				<?php } else { ?>
					<span style="color: rgb(170, 85, 15);font-size: 13px;font-style: italic;"><?php echo $licenseInfo; ?></span> 
				<?php } ?>
				</td>
			</tr>
			<?php } ?>
		<?php } ?>
		</tbody>
	</table>
		<?php
	}

	protected function check_update() {
		$license_key = $this->get_license_key();
		// setup the updater
		$sellcodes_updater = new Sellcodes_Plugin_Updater(
			DP_INTRO_TOURS_PRODUCT_ADMINATOR_END_POINT,
			__FILE__,
			$license_key,
			[
				'version'   => DP_INTRO_TOURS_VERSION,  // current version number
				'license'   => $license_key, // license key (used get_option above to retrieve from DB)
				'item_name' => DP_INTRO_TOURS_PRODUCT_UPDATE_KEY, // offer id of this plugin
			]
		);
	}

	public function get_license_key_settings_id() {
		return 'licenseKey_SC';
	}
	public function get_license_key_placeholder() {
		return __( 'License key, that you received after payment at', 'dp-intro-tours' ) . ' sellcodes.com';
	}

	public function admin_notices() {
		$activated = Dp_Intro_Tours_Helper::get_url_param( 'sc_dpit_activation' );
		if ( $activated !== null ) {
			$success = Dp_Intro_Tours_Helper::get_url_param( 'sc_dpit_success' );
			$message = urldecode( Dp_Intro_Tours_Helper::get_url_param( 'message' ) );
			switch ( $activated ) {
				case 'true':
					AdminNotice::render_notice( __( 'Your license is activated now.', 'dp-intro-tours' ) );
					break;
				default:
					if ( ! ( empty( $message ) ) ) {
						AdminNotice::render_notice( $message, $success == 'true' ? 'success' : 'error' );
					}
			}
		}
	}

	public function activate_license() {
		// listen for our activate button to be clicked
		$licensePost = Arr::sget( $_POST, 'dp_it_license_options.licenseKey_SC' );
		if ( isset( $_POST['sellcodes_license_activate'] ) && ! empty( $licensePost ) ) {//sellcodes_dpintro_license_key
			Settings::update_setting_array( 'dp_it_license_options', 'licenseKey_SC', trim( $licensePost ) );

			// run a quick security check
			if ( ! check_admin_referer( 'sellcodes_dpintro_nonce', 'sellcodes_dpintro_nonce' ) ) {
				return; // get out if we didn't click the Activate button
			}

			// retrieve the license from the database
			$license = self::get_license_key();

			// data to send in our API request
			$api_params = [
				'product_id'  => DP_INTRO_TOURS_PRODUCT_UPDATE_KEY,
				'license_key' => $license,
				'baseurl'     => home_url(),
			];

			// Call the  API.
			$response = wp_remote_post(
				DP_INTRO_TOURS_PRODUCT_ADMINATOR_END_POINT . '/activate_license',
				[
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				]
			);

			// make sure the response came back okay
			$httpCode = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $httpCode ) {

				switch ( $httpCode ) {

					case 500:
					case 0:
						$message = __( 'An error occurred, please try again.', 'dp-intro-tours' );

						break;

					case 400:
						$license_data = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $response ) ) );

						if ( false === $license_data->success ) {
							$message = $license_data->message;
						}

						break;
				}
			} else {
				$license_data = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $response ) ) );

				if ( false === $license_data->success ) {
					$message = $license_data->message;
				} else {

					if ( isset( $license_data->License_key_valid ) && false === $license_data->License_key_valid ) {
						$message = __( 'Your license key has been disabled.', 'dp-intro-tours' );
					}

					if ( isset( $license_data->Activation_ok ) && false === $license_data->Activation_ok ) {
						if ( $license_data->Activation_count == $license_data->Maximum_activations ) {

							$message = __( 'Your license key has reached its activation limit.', 'dp-intro-tours' );
						}
					}
				}
			}

			// Check if anything passed on a message constituting a failure

			$base_url = admin_url( Dp_Intro_Tours_Helper::get_plugin_settings_page_path( 'license', true ) );
			if ( isset( $license_data ) && isset( $license_data->license ) ) {
				Settings::update_setting_array( 'dp_it_hidden_options', 'status', $license_data->license );
			}
			if ( ! empty( $message ) ) {
				$redirect = add_query_arg(
					[
						'sc_dpit_activation' => 'false',
						'message'            => urlencode( $message ),
						'sc_dpit_success'    => 'false',
					],
					$base_url
				);
				wp_redirect( $redirect );
				exit();
			}

			$redirect = add_query_arg(
				[
					'sc_dpit_activation' => 'true',
					'message'            => 'true',
					'sc_dpit_success'    => 'true',
				],
				$base_url
			);
			Settings::update_setting_array( 'dp_it_hidden_options', 'adminated', '1' );

			wp_redirect( $redirect );
			exit();
		}
	}

	public function deactivate_license() {
		// listen for our activate button to be clicked
		if ( isset( $_POST['sellcodes_license_deactivate'] ) ) {
			// run a quick security check
			if ( ! check_admin_referer( 'sellcodes_dpintro_nonce', 'sellcodes_dpintro_nonce' ) ) {
				return; // get out if we didn't click the Activate button
			}

			// retrieve the license from the database
			$license = $this->get_license_key();

			// data to send in our API request
			$api_params = [
				'product_id'  => DP_INTRO_TOURS_PRODUCT_UPDATE_KEY,
				'license_key' => $license,
				'baseurl'     => home_url(),
			];

			// Call the custom API.
			$response = wp_remote_post(
				DP_INTRO_TOURS_PRODUCT_ADMINATOR_END_POINT . '/deactivate_license',
				[
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				]
			);

			$httpCode = wp_remote_retrieve_response_code( $response );

			$base_url = admin_url( Dp_Intro_Tours_Helper::get_plugin_settings_page_path( 'license', true ) );

			// make sure the response came back okay
			if ( 200 !== $httpCode ) {

				switch ( $httpCode ) {

					case 500:
					case 0:
						$message = __( 'An error occurred, please try again.', 'dp-intro-tours' );

						break;

					case 400:
						$license_data = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $response ) ) );

						if ( false === $license_data->success ) {
							$message = $license_data->message;
							Settings::update_setting_array( 'dp_it_hidden_options', 'adminated', '0' );
							Settings::update_setting_array( 'dp_it_hidden_options', 'adminatedTill', '' );
							Settings::update_setting_array( 'dp_it_hidden_options', 'licenseLabel', '' );
						}

						break;
				}
				if ( isset( $license_data->license ) ) {
					Settings::update_setting_array( 'dp_it_hidden_options', 'status', $license_data->license );
				}
				$redirect = add_query_arg(
					[
						'sc_dpit_activation' => 'false',
						'message'            => urlencode( $message ),
						'sc_dpit_success'    => 'false',
					],
					$base_url
				);

				wp_redirect( $redirect );
				exit();
			}

			// decode the license data
			$license_data = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $response ) ) );

			// $license_data->license will be either "deactivated" or "failed"
			if ( isset( $license_data->success ) && isset( $license_data->license ) ) {

				$success = 'false';
				if ( false != $license_data->success ) {

					if ( 'deactivated' == $license_data->license ) {
						$message = __( 'Your license is deactivated now.', 'dp-intro-tours' );
					}
					$success = 'true';
					Settings::update_setting_array( 'dp_it_hidden_options', 'adminated', '0' );
					Settings::update_setting_array( 'dp_it_hidden_options', 'adminatedTill', '' );
					Settings::update_setting_array( 'dp_it_hidden_options', 'licenseLabel', '' );
				} else {
					$message = $license_data->message;
				}
				Settings::update_setting_array( 'dp_it_hidden_options', 'status', $license_data->license );

				$redirect = add_query_arg(
					[
						'sc_dpit_activation' => 'false',
						'message'            => urlencode( $message ),
						'sc_dpit_success'    => $success,
					],
					$base_url
				);

				wp_redirect( $redirect );

				exit();
			}

			wp_redirect( $base_url );
			exit();
		}
	}
}
