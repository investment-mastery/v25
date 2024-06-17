<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

set_site_transient( 'update_plugins', null );

/**
 * Allows plugins to use their own update API.
 */
class Sellcodes_Plugin_Updater {



	private $api_url     = '';
	private $api_data    = [];
	private $name        = '';
	private $slug        = '';
	private $version     = '';
	private $wp_override = false;
	private $license_key = '';

	/**
	 * Class constructor.
	 *
	 * @uses plugin_basename()
	 * @uses hook()
	 *
	 * @param string $_api_url     The URL pointing to the custom API endpoint.
	 * @param string $_plugin_file Path to the plugin file.
	 * @param array  $_api_data    Optional data to send with API calls.
	 */
	public function __construct( $_api_url, $_plugin_file, $license_key, $_api_data = null ) {
		global $sc_plugin_data;

		$this->license_key = $license_key;
		$this->api_url     = trailingslashit( $_api_url );
		$this->api_data    = $_api_data;
		$this->name        = DP_INTRO_TOURS_PLUGIN_BASE_NAME;
		$this->slug        = 'dp-intro-tours-pro';//basename( DP_INTRO_TOURS_PLUGIN_BASE_NAME, '.php' );
		$this->version     = $_api_data['version'];
		$this->wp_override = isset( $_api_data['wp_override'] ) ? (bool) $_api_data['wp_override'] : false;

		$sc_plugin_data[ $this->slug ] = $this->api_data;

		// Set up hooks.
		$this->init();
	}

	/**
	 * Set up WordPress filters to hook into WP's update process.
	 *
	 * @uses add_filter()
	 *
	 * @return void
	 */
	public function init() {
		if ( ! empty( $this->license_key ) && $this->sc_check_license() ) {
			add_filter( 'pre_set_site_transient_update_plugins', [ $this, 'check_update' ] );
			add_filter( 'plugins_api', [ $this, 'plugins_api_filter' ], 10, 3 );
			remove_action( 'after_plugin_row_' . $this->name, 'wp_plugin_update_row', 10 );
			add_action( 'after_plugin_row_' . $this->name, [ $this, 'show_update_notification' ], 10, 2 );
			add_action( 'admin_init', [ $this, 'show_changelog' ] );
		}
	}

	public function sc_check_license() {
		$check_api_url = DP_INTRO_TOURS_PRODUCT_ADMINATOR_END_POINT . '/check_license';

		$api_params = [
			'product_id'  => DP_INTRO_TOURS_PRODUCT_UPDATE_KEY,
			'license_key' => $this->license_key,
			'baseurl'     => home_url(),
			'slug'        => $this->slug,
		];

		$response = wp_remote_post(
			$check_api_url,
			[
				'timeout'   => 30,
				'sslverify' => false,
				'body'      => $api_params,
			]
		);
		$httpCode = wp_remote_retrieve_response_code( $response );

		if ( 500 == $httpCode || 0 == $httpCode ) {
			return false;
		}

		$license_data = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $response ) ) );

		$license_check = false;

		if ( false != isset( $license_data->license ) && ! empty( $license_data->license ) ) {

			$options          = get_option( 'dp_it_hidden_options', [] );
			$activatedCntInfo = '';
			$expireInfo       = '';

			if ( false != isset( $license_data->site_count ) && ! empty( $license_data->site_count ) && false != isset( $license_data->license_limit ) && ! empty( $license_data->license_limit ) ) {
				if ( $license_data->site_count == $license_data->license_limit && $license_data->site_count ) {
					if ( $license_data->site_count == 1 ) {
						$activatedCntInfo = $license_data->site_count . ' ' . __( 'installation covered by this key is active', 'dp-intro-tours' );
					} else {
						$activatedCntInfo = __( 'All', 'dp-intro-tours' ) . ' ' . $license_data->site_count . ' ' . __( 'installations covered by this key are used', 'dp-intro-tours' );
					}
				} else {
					$activatedCntInfo = $license_data->site_count . ' ' . __( 'from possible', 'dp-intro-tours' ) . ' ' . $license_data->license_limit . ' ' . __( 'installations covered by this key are active', 'dp-intro-tours' );
				}
			}

			if ( false != isset( $license_data->expires ) && ! empty( $license_data->expires ) ) {
				$expireInfo               = __( 'License expiration', 'dp-intro-tours' ) . ': ' . $license_data->expires;
				$options['adminatedTill'] = $license_data->expires;
			}

			$options['licenseLabel'] = implode( '. ', array_filter( [ $activatedCntInfo, $expireInfo ] ) );

			$statusTextColor = 'rgb(170, 85, 15)';
			if ( strtolower( $license_data->license ) === 'valid' ) {
				$statusTextColor      = 'rgb(67, 119, 33)';
				$options['adminated'] = '1';
				// Check for updates only when offer is WordPress product & allowing automatic updates
				if ( false != isset( $license_data->is_wordpress_product ) && false != isset( $license_data->offering_automatic_updates ) ) {

					if ( false != $license_data->is_wordpress_product && false != $license_data->offering_automatic_updates ) {
						$license_check = true;
					}
				}
			} else {
				$options['adminated'] = '0';
			}

			$options['statusText'] = '<span style="text-transform:uppercase;display:block;color:' . $statusTextColor . ';margin-right:10px;line-height:2;font-weight:bold">' . $license_data->message . '</span>';
			update_option( 'dp_it_hidden_options', $options );
		}
		return $license_check;
	}

	/**
	 * Check for Updates at the defined API endpoint and modify the update array.
	 *
	 * This function dives into the update API just when WordPress creates its update array,
	 * then adds a custom API call and injects the custom plugin data retrieved from the API.
	 * It is reassembled from parts of the native WordPress plugin update code.
	 * See wp-includes/update.php line 121 for the original wp_update_plugins() function.
	 *
	 * @uses api_request()
	 *
	 * @param  array $_transient_data Update array build by WordPress.
	 * @return array Modified update array with custom plugin data.
	 */
	public function check_update( $_transient_data ) {
		global $pagenow;

		if ( ! is_object( $_transient_data ) ) {
			$_transient_data = new stdClass();
		}

		if ( 'plugins.php' == $pagenow && is_multisite() ) {
			return $_transient_data;
		}

		if ( ! empty( $_transient_data->response ) && ! empty( $_transient_data->response[ $this->name ] ) && false === $this->wp_override ) {
			return $_transient_data;
		}

		$version_info = $this->api_request( 'plugin_latest_version', [ 'slug' => $this->slug ] );

		if ( false !== $version_info && is_object( $version_info ) && isset( $version_info->new_version ) ) {

			if ( version_compare( $this->version, $version_info->new_version, '<' ) ) {

				$_transient_data->response[ $this->name ] = $version_info;

			}

			$_transient_data->last_checked           = current_time( 'timestamp' );
			$_transient_data->checked[ $this->name ] = $this->version;

		}

		return $_transient_data;
	}

	/**
	 * show update nofication row -- needed for multisite subsites, because WP won't tell you otherwise!
	 *
	 * @param string $file
	 * @param array  $plugin
	 */
	public function show_update_notification( $file, $plugin ) {
		if ( is_network_admin() ) {
			return;
		}

		if ( ! current_user_can( 'update_plugins' ) ) {
			return;
		}

		if ( ! is_multisite() ) {
			return;
		}

		if ( $this->name != $file ) {
			return;
		}

		// Remove our filter on the site transient
		remove_filter( 'pre_set_site_transient_update_plugins', [ $this, 'check_update' ], 10 );

		$update_cache = get_site_transient( 'update_plugins' );

		$update_cache = is_object( $update_cache ) ? $update_cache : new stdClass();

		if ( empty( $update_cache->response ) || empty( $update_cache->response[ $this->name ] ) ) {

			$cache_key    = md5( 'sc_plugin_' . sanitize_key( $this->name ) . '_version_info' );
			$version_info = get_transient( $cache_key );

			if ( false === $version_info ) {

				$version_info = $this->api_request( 'plugin_latest_version', [ 'slug' => $this->slug ] );

				set_transient( $cache_key, $version_info, 3600 );
			}

			if ( ! is_object( $version_info ) ) {
				return;
			}

			if ( version_compare( $this->version, $version_info->new_version, '<' ) ) {

				$update_cache->response[ $this->name ] = $version_info;

			}

			$update_cache->last_checked           = current_time( 'timestamp' );
			$update_cache->checked[ $this->name ] = $this->version;

			set_site_transient( 'update_plugins', $update_cache );

		} else {

			$version_info = $update_cache->response[ $this->name ];

		}

		// Restore our filter
		add_filter( 'pre_set_site_transient_update_plugins', [ $this, 'check_update' ] );

		if ( ! empty( $update_cache->response[ $this->name ] ) && version_compare( $this->version, $version_info->new_version, '<' ) ) {

			// build a plugin list row, with update notification
			$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );

			// <tr class="plugin-update-tr"><td colspan="' . $wp_list_table->get_column_count() . '" class="plugin-update colspanchange">
			echo '<tr class="plugin-update-tr" id="' . $this->slug . '-update" data-slug="' . $this->slug . '" data-plugin="' . $this->slug . '/' . $file . '">';
			echo '<td colspan="3" class="plugin-update colspanchange">';
			echo '<div class="update-message notice inline notice-warning notice-alt">';

			$changelog_link = self_admin_url( 'index.php?sc_action=view_plugin_changelog&plugin=' . $this->name . '&slug=' . $this->slug . '&TB_iframe=true&width=772&height=911' );

			if ( empty( $version_info->download_link ) ) {
				printf(
					__( 'There is a new version of %1$s available. %2$sView version %3$s details%4$s.', 'sellcodes' ),
					esc_html( $version_info->name ),
					'<a target="_blank" class="thickbox" href="' . esc_url( $changelog_link ) . '">',
					esc_html( $version_info->new_version ),
					'</a>'
				);
			} else {
				printf(
					__( 'There is a new version of %1$s available. %2$sView version %3$s details%4$s or %5$supdate now%6$s.', 'sellcodes' ),
					esc_html( $version_info->name ),
					'<a target="_blank" class="thickbox" href="' . esc_url( $changelog_link ) . '">',
					esc_html( $version_info->new_version ),
					'</a>',
					'<a href="' . esc_url( wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $this->name, 'upgrade-plugin_' . $this->name ) ) . '">',
					'</a>'
				);
			}

			do_action( "in_plugin_update_message-{$file}", $plugin, $version_info );

			echo '</div></td></tr>';
		}
	}

	/**
	 * Updates information on the "View version x.x details" page with custom data.
	 *
	 * @uses api_request()
	 *
	 * @param  mixed  $_data
	 * @param  string $_action
	 * @param  object $_args
	 * @return object $_data
	 */
	public function plugins_api_filter( $_data, $_action = '', $_args = null ) {
		if ( $_action !== 'plugin_information' ) {
			return $_data;
		}

		if ( ! isset( $_args->slug ) || ( $_args->slug != $this->slug ) ) {
			return $_data;
		}

		$to_send = [
			'slug'   => $this->slug,
			'is_ssl' => is_ssl(),
			'fields' => [
				'banners' => [],
				'reviews' => false,
			],
		];

		$cache_key = 'sc_api_request_' . substr( md5( serialize( $this->slug ) ), 0, 15 );

		//Get the transient where we store the api request for this plugin for 24 hours
		$sc_api_request_transient = get_site_transient( $cache_key );

		//If we have no transient-saved value, run the API, set a fresh transient with the API value, and return that value too right now.
		if ( empty( $sc_api_request_transient ) ) {

			$api_response = $this->api_request( 'plugin_information', $to_send );

			//Expires in 1 day
			set_site_transient( $cache_key, $api_response, DAY_IN_SECONDS );

			if ( false !== $api_response ) {
				$_data = $api_response;
			}
		} else {
			$_data = $sc_api_request_transient;
		}

		if ( isset( $_data->sections['description'] ) ) {
			$_data->sections['description'] = wpautop( $_data->sections['description'] );
		}

		if ( isset( $_data->sections['changelog'] ) ) {
			$_data->sections['changelog'] = wpautop( $_data->sections['changelog'] );
		}

		if ( isset( $_data->sections['frequently_asked_questions'] ) ) {
			$_data->sections['frequently_asked_questions'] = wpautop( $_data->sections['frequently_asked_questions'] );
		}

		if ( isset( $_data->sections['screenshots'] ) ) {
			unset( $_data->sections['screenshots'] );
		}

		return $_data;
	}

	/**
	 * Disable SSL verification in order to prevent download update failures
	 *
	 * @param  array  $args
	 * @param  string $url
	 * @return object $array
	 */
	public function http_request_args( $args, $url ) {
		// If it is an https request and we are performing a package download, disable ssl verification
		if ( strpos( $url, 'https://' ) !== false && strpos( $url, 'scc_action=package_download' ) ) {
			$args['sslverify'] = false;
		}
		return $args;
	}

	/**
	 * Calls the API and, if successfull, returns the object delivered by the API.
	 *
	 * @uses get_bloginfo()
	 * @uses wp_remote_post()
	 * @uses is_wp_error()
	 *
	 * @param  string $_action The requested action.
	 * @param  array  $_data   Parameters for the API action.
	 * @return false|object
	 */
	private function api_request( $_action, $_data ) {
		global $wp_version;

		$data = array_merge( $this->api_data, $_data );

		if ( $data['slug'] != $this->slug ) {
			return;
		}

		$update_api_url = $this->api_url . 'get_version';

		$api_params = [
			'license_key' => ! empty( $data['license'] ) ? $data['license'] : '',
			'product_id'  => isset( $data['item_name'] ) ? $data['item_name'] : false,
			'baseurl'     => home_url(),
			'slug'        => $data['slug'],
		];

		$request  = wp_remote_post(
			$update_api_url,
			[
				'timeout'   => 60,
				'sslverify' => false,
				'body'      => $api_params,
			]
		);
		$httpCode = wp_remote_retrieve_response_code( $request );

		if ( 500 == $httpCode || 0 == $httpCode ) {
			return false;
		}

		$body = wp_remote_retrieve_body( $request );

		$request = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $request ) ) );

		if ( $request && isset( $request->sections ) ) {
			$request->sections = maybe_unserialize( $request->sections );
		} else {
			$request = false;
		}

		return $request;
	}

	public function show_changelog() {
		global $sc_plugin_data;

		if ( empty( $_REQUEST['sc_action'] ) || 'view_plugin_changelog' != $_REQUEST['sc_action'] ) {
			return;
		}

		if ( empty( $_REQUEST['plugin'] ) ) {
			return;
		}

		if ( empty( $_REQUEST['slug'] ) ) {
			return;
		}

		if ( ! current_user_can( 'update_plugins' ) ) {
			wp_die( __( 'You do not have permission to install plugin updates', 'sellcodes' ), __( 'Error', 'sellcodes' ), [ 'response' => 403 ] );
		}

		$data         = $sc_plugin_data[ $_REQUEST['slug'] ];
		$cache_key    = md5( 'sc_plugin_' . sanitize_key( $_REQUEST['plugin'] ) . '_version_info' );
		$version_info = get_transient( $cache_key );

		if ( false === $version_info ) {

			$update_api_url = $this->api_url . 'get_version';

			$api_params = [
				'license_key' => ! empty( $data['license'] ) ? $data['license'] : '',
				'product_id'  => isset( $data['item_name'] ) ? $data['item_name'] : false,
				'baseurl'     => home_url(),
			];

			$request = wp_remote_post(
				$update_api_url,
				[
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				]
			);

			if ( 500 == $httpCode || 0 == $httpCode ) {
				return;
			}

			$version_info = json_decode( str_replace( "\xEF\xBB\xBF", '', wp_remote_retrieve_body( $request ) ) );

			if ( ! empty( $version_info ) && isset( $version_info->sections ) ) {
				$version_info->sections = maybe_unserialize( $version_info->sections );
			} else {
				$version_info = false;
			}
			set_transient( $cache_key, $version_info, 3600 );
		}

		if ( ! empty( $version_info ) && isset( $version_info->sections['changelog'] ) ) {
			echo '<div style="background:#fff;padding:10px;">' . $version_info->sections['changelog'] . '</div>';
		}

		exit;
	}

}
