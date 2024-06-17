<?php

use IntroToursDP\Wp\Settings;



/**
 * The settings of the plugin.
 *
 * @link  http://github.com/
 * @since 1.0.0
 *
 * @package    GG_Interactive_Map
 * @subpackage GG_Interactive_Map/admin
 */

/**
 * Class Dp_Intro_Tours_Admin_Settings_PRO
 */


class Dp_Intro_Tours_Admin_Settings_PRO extends Dp_Intro_Tours_Admin_Settings {



	protected $adminator;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $adminator ) {
		parent::__construct();
		$this->adminator = $adminator;
		// backward compatibility
		$licenseKey = Settings::get_setting_array_field( 'dp_it_general_options', 'licenseKey', null );
		if ( $licenseKey ) {
			Settings::update_setting_array( 'dp_it_license_options', 'licenseKey', $licenseKey );
		}
	}

	public function render_admin_notice_container() {
		?>
		<div class="dp-notice-container" id="js--dp-admin-notice-container"></div>
		<?php
	}

	protected function render_active_tab_content( $active_tab ) {
		parent::render_active_tab_content( $active_tab );
		if ( $active_tab === 'license' ) {
			$this->adminator->after_license_settings();
		}
	}

	protected function get_settings_tab_cfg() {
		$use_wp_theme_text_styles = Settings::get_setting_array_bool( 'dp_it_general_options', 'useThemeDefaultFont', false );
		return [
			'general'            => [ 'title' => __( 'General', 'dp-intro-tours' ) ],
			'license'            => [ 'title' => __( 'License', 'dp-intro-tours' ) ],
			'labeling'           => [ 'title' => __( 'Labeling', 'dp-intro-tours' ) ],
			'text_styles'        => [
				'title'    => __( 'Text Styles', 'dp-intro-tours' ),
				'disabled' => $use_wp_theme_text_styles,
			],
			'mobile_menu'        => [ 'title' => __( 'Mobile Menu', 'dp-intro-tours' ) ],
			'mobile_breakpoints' => [ 'title' => __( 'Mobile Break Points', 'dp-intro-tours' ) ],
		];
	}

	protected function render_settings_tabs_inner( $active_tab ) {
		parent::render_settings_tabs_inner( $active_tab );
		if ( DP_INTRO_TOURS_DP_ADMIN_DEBUG_EN ) {
			Dp_Intro_Tours_DBG::render_dbg_settings( $active_tab );
		}
	}

	protected function render_submit_button( $active_tab ) {
		if ( $active_tab !== 'license' ) {
			submit_button();
		}
	}

	public function license_options_description() {
		?>
	<h2><?php _e( 'Plugin License Options', 'dp-intro-tours' ); ?></h2>
		<?php
		echo '<p>' . ( ( ! $this->adminator->is_adminated() ) ? __( 'Please, activate your plugin here.', 'dp-intro-tours' ) : __( 'Your license information', 'dp-intro-tours' ) ) . '</p>';
	}

	public function initialize_license_options() {
		Settings::init_setting_array(
			'dp_it_license_options',
			'license_options_section',
			'',
			'dp_it_license_options',
			[
				[
					'id'         => $this->adminator->get_license_key_settings_id(),
					'title'      => $this->adminator->get_license_key_title(),
					'defVal'     => '',
					'renderArgs' => [
						'type'        => 'text',
						'size'        => 50,
						'placeholder' => $this->adminator->get_license_key_placeholder(),
						'readonly'    => $this->adminator->is_adminated() ? '1' : '0',
						'inputType'   => 'password',
					],
				],
			],
			[ $this, 'license_options_description' ]
		);
	}

	public function mobile_menu_options_description() {
		echo '<p id="dp-it-mobile-menu-options-desc" class="dp-it-mobile-menu-options-desc">' . __( 'In case you intend to use main menu element as a reference element in your tour, please set visually or manually selectors of mobile menu opener / closer (hamburger menu)', 'dp-intro-tours' ) . '</p>';
	}

	public function mobile_breakpoints_options_description() {
		echo '<p class="dp-it-mobile-menu-options-desc">' . __( 'If you intend to use reference elements that are different for the mobile version, please adjust the mobile break point to correspond with your WordPress theme.', 'dp-intro-tours' ) . '</p>';
	}

	public function initialize_mobile_menu_options() {
		Settings::init_setting_array(
			'dp_it_mobile_menu_options',
			'mobile_menu_options_section',
			'Mobile Menu Support',
			'dp_it_mobile_menu_options',
			[
				[
					'id'         => 'opener_selector',
					'title'      => __( 'Mobile Menu Opener Selector', 'dp-intro-tours' ),
					'defVal'     => '',
					'renderArgs' => [
						'type'        => 'text',
						'size'        => 80,
						'placeholder' => '.mobile_menu_bar_toggle',
						'hint'        => __( 'CSS selector of element that is responsible for mobile menu opening (hamburger menu).', 'dp-intro-tours' ),
					],
				],
				[
					'id'         => 'closer_selector',
					'title'      => __( 'Mobile Menu Closer Selector', 'dp-intro-tours' ),
					'defVal'     => '',
					'renderArgs' => [
						'type'        => 'text',
						'size'        => 80,
						'placeholder' => '.mobile_menu_bar_toggle',
						'dp-intro-tours',
						'hint'        => __( 'CSS selector of element that is responsible for mobile menu closing ( x )', 'dp-intro-tours' ),
					],
				],
			],
			[ $this, 'mobile_menu_options_description' ]
		);

		Settings::init_setting_array(
			'dp_it_mobile_breakpoints_options',
			'mobile_breakpoints_options_section',
			'Mobile Break Points',
			'dp_it_mobile_breakpoints_options',
			[
				[
					'id'         => 'mobile',
					'title'      => __( 'Mobile Break Point', 'dp-intro-tours' ),
					'defVal'     => 480,
					'renderArgs' => [
						'type'        => 'text',
						'inputType'   => 'number',
						'min'         => 200,
						'max'         => 2000,
						'size'        => 20,
						'placeholder' => '480',
						'hint'        => __( 'Maximal width of screen in pixels, where mobile styles are still applied.<br><br>Each wordpress template has its own values, so for optimal functionality of the plugin it is recommended to identify this threshold value eg using developer tools (switch to mobile view - responsive and gradually reduce the width to the point where your template switches to mobile style)', 'dp-intro-tours' ),
					],
				],
			],
			[ $this, 'mobile_breakpoints_options_description' ]
		);
	}


	public function general_options_description() {
		if ( ! $this->adminator->is_adminated() ) {
			echo '<p>' . __( 'Please, activate your plugin at', 'dp-intro-tours' ) . ' <a href="' . get_dashboard_url( get_current_user_id(), 'admin.php?page=dp_intro_tours&tab=license' ) . '">' . __( 'License tab', 'dp-intro-tours' ) . '</a></p>';
		} else {
			parent::general_options_description();
		}
	}


	public function initialize_hidden_options() {
		if ( DP_INTRO_TOURS_DP_ADMIN_DEBUG_EN ) {
			Dp_Intro_Tours_DBG::initialize_hidden_options();
		}
	}

}
