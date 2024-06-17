<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;



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
 * Class Dp_Intro_Tours_Admin_Settings
 */
class Dp_Intro_Tours_Admin_Settings {





	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct() {

	}


	public function render_admin_notice_container() {
	}


	protected function get_settings_tab_cfg() {
		$use_wp_theme_text_styles = Settings::get_setting_array_bool( 'dp_it_general_options', 'useThemeDefaultFont', false );
		return [
			'general'     => [ 'title' => __( 'General', 'dp-intro-tours' ) ],
			'labeling'    => [ 'title' => __( 'Labeling', 'dp-intro-tours' ) ],
			'text_styles' => [
				'title'    => __( 'Text Styles', 'dp-intro-tours' ),
				'disabled' => $use_wp_theme_text_styles,
			],
		];
	}

	protected function render_settings_tabs_inner( $active_tab ) {
		$tab_cfg = $this->get_settings_tab_cfg();
		foreach ( $tab_cfg as $id => $data ) {
			if ( ! Arr::get( $data, 'disabled', false ) ) {
				?>
				<a href="?page=dp_intro_tours&tab=<?php echo $id; ?>" class="nav-tab <?php echo $active_tab === $id ? 'nav-tab-active' : ''; ?>"><?php echo Arr::get( $data, 'title', $id ); ?></a>
				<?php
			}
		}
	}

	protected function render_settings_tabs( $active_tab ) {
		?>
		<nav class="nav-tab-wrapper">
		<?php
		$this->render_settings_tabs_inner( $active_tab );
		?>
		</nav>
		<?php
	}


	public function setup_plugin_options_menu() {
		$show_in_main_menu = Settings::get_setting_array_field( 'dp_it_general_options', 'show_in_main_menu', '0' ) === '1';
		if ( ! $show_in_main_menu ) {
			add_options_page(
				__( 'Intro Tour Tutorial Options', 'dp-intro-tours' ), // The title to be displayed in the browser window for this page.
				__( 'Intro Tour Tutorial', 'dp-intro-tours' ),         // The text to be displayed for this menu item
				'manage_options',                // Which type of users can see this menu item
				'dp_intro_tours', // The unique ID - that is, the slug - for this menu item
				[ $this, 'render_settings_page_content' ] // The name of the function to call when rendering this menu's page
			);
		} else {
			add_menu_page(
				__( 'Intro Tour Tutorial Options', 'dp-intro-tours' ), // The title to be displayed in the browser window for this page.
				__( 'Intro Tour Tutorial', 'dp-intro-tours' ),         // The text to be displayed for this menu item
				'manage_options',                // Which type of users can see this menu item
				'dp_intro_tours', // The unique ID - that is, the slug - for this menu item
				[ $this, 'render_settings_page_content' ], // The name of the function to call when rendering this menu's page
				plugin_dir_url( __FILE__ ) . '../admin/assets/icons/deep-presentation-icon(16x16)__dark.png'
			);
			$this->add_plugin_submenu_options();

		}
	}

	protected function add_plugin_submenu_options() {
		$tab_cfg = $this->get_settings_tab_cfg();
		foreach ( $tab_cfg as $id => $data ) {
			if ( ! Arr::get( $data, 'disabled', false ) ) {
				$title = Arr::get( $data, 'title', $id );
				add_submenu_page( 'dp_intro_tours', $title, $title, 'manage_options', $id === 'general' ? 'dp_intro_tours' : "?page=dp_intro_tours&tab=${id}" );
			}
		}
	}

	public function highlight_submenu_active_item( $parent_file ) {
		 global $submenu_file;
		if ( isset( $_GET['page'] ) && $_GET['page'] === 'dp_intro_tours' ) {
			if ( isset( $_GET['tab'] ) ) {
				$submenu_file = '?page=' . $_GET['page'] . '&tab=' . $_GET['tab'];
			}
		}

		return $parent_file;
	}


	/**
	 * Renders a simple page to display for the theme menu defined above.
	 */
	public function render_settings_page_content( $type = '' ) {
		?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<h1><?php _e( 'Intro Tour Tutorial Global Options', 'dp-intro-tours' ); ?></h1>
		<?php $this->render_admin_notice_container(); ?>
		<?php settings_errors(); ?>

		<?php
		if ( isset( $_GET['tab'] ) ) {
			$active_tab = $_GET['tab'];
		}
		$active_tab = empty( $active_tab ) ? 'general' : $active_tab;
		$this->render_settings_tabs( $active_tab );
		switch ( $active_tab ) {
			default:
				?>
		<form method="post" action="options.php">
				<?php
				$this->render_active_tab_content( $active_tab );
				$this->render_submit_button( $active_tab );
				?>
		</form>

		<?php } ?>

	</div>
		<?php
	}

	protected function render_submit_button( $active_tab ) {
		submit_button();
	}

	protected function render_active_tab_content( $active_tab ) {
		$optionId = 'dp_it_' . $active_tab . '_options';
		settings_fields( $optionId );
		do_settings_sections( $optionId );
	}


	public function general_options_description() {
		?>
	<h2><?php echo __( 'Plugin General Options', 'dp-intro-tours' ); ?></h2>
	<p>
		<span style="text-transform: uppercase"><?php echo __( 'Thank you for using', 'dp-intro-tours' ); ?> <?php echo DP_INTRO_TOURS_NAME; ?></span>
		<br> 
		<span><?php echo __( 'You can setup global style and behavior here. Some of these options are overridable by', 'dp-intro-tours' ); ?> <a href="<?php echo get_dashboard_url( get_current_user_id(), 'edit.php?post_type=dp_intro_tours' ); ?>"><?php echo __( 'specific tour configuration', 'dp-intro-tours' ); ?></a></span>
		<br>
		<span><strong><?php echo __( 'NEW: ', 'dp-intro-tours' ); ?></strong> <a href="<?php echo DP_INTRO_TOURS_HOOK_TUTORIAL_LINK; ?>" target="_blank"><?php echo __( 'Advanced integration with hooks', 'dp-intro-tours' ); ?></a></span>
	</p>
		<?php
	}



	protected function option_hint_pro_promo( $override_by_specific_tour_cfg = false, $prefix_by_space = true ) {
		$link_to_pro = Dp_Intro_Tours_Helper::get_pro_link_html();
		$res         = '';
		if ( $override_by_specific_tour_cfg ) {
			$res = $this->option_hint_pro_promo_override_tour_spec( $link_to_pro, $prefix_by_space );
		} elseif ( ! DP_INTRO_TOURS_IS_PRO ) {
			$res = ( $prefix_by_space ? ' ' : '' ) . __( 'Available in', 'dp-intro-tours' ) . ' ' . $link_to_pro;
		}
		return $res;
	}

	protected function option_hint_pro_promo_override_tour_spec( $link_to_pro, $prefix_by_space = true ) {
		$res = $prefix_by_space ? ' ' : '';
		if ( ! DP_INTRO_TOURS_IS_PRO ) {
			$res .= __( 'This can be overridden by specific tour configuration in', 'dp-intro-tours' ) . ' ' . $link_to_pro;
		} else {
			$res .= __( 'This can be overridden by specific tour configuration.', 'dp-intro-tours' );
		}
		return $res;
	}

	protected function get_general_options_cfg_arr() {
		$query_params_defs = Dp_Intro_Tours_Helper::get_dp_intro_query_params( false );
		$proOnly           = ! DP_INTRO_TOURS_IS_PRO ? '1' : '0';
		$res               = [
			[
				'id'         => 'useThemeDefaultFont',
				'title'      => __( 'Use WordPress Theme Text Styles', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'type' => 'checkbox',
					'hint' => __( 'Use default fonts and text styles from your WordPress theme. If disabled, text styles option tab is available to customize fonts and text styles', 'dp-intro-tours' ) . $this->option_hint_pro_promo(),
				],
			],
			[
				'id'         => 'dp_it_accent_color',
				'title'      => __( 'Default Accent Color', 'dp-intro-tours' ),
				'defVal'     => '',
				'renderArgs' => [
					'type'        => 'color',
					'size'        => 5,
					'placeholder' => '#653eff',
					'hint'        => __( 'Global accent color for all intro tours', 'dp-intro-tours' ) . $this->option_hint_pro_promo( true ),
				],
			],
			[
				'id'         => 'theme',
				'title'      => __( 'Default Theme', 'dp-intro-tours' ),
				'defVal'     => Dp_Intro_Tours_Helper::get_themes_select_def_val(),
				'renderArgs' => [
					'options'     => Dp_Intro_Tours_Helper::get_themes_select_options(),
					'type'        => 'select',
					'placeholder' => Dp_Intro_Tours_Helper::get_themes_select_placeholder(),
					'size'        => 95,
					'hint'        => DP_INTRO_TOURS_IS_PRO
					? __( 'Global design of intro.', 'dp-intro-tours' ) . $this->option_hint_pro_promo( true ) . ' ' . Dp_Intro_Tours_Helper::get_pro_link_html( Dp_Intro_Tours_Helper::build_dp_query_string( [ 'dp_qp_lock' => 'start-theme-demo' ], $query_params_defs )/*dp_to_check '?dp_qp_lock=start-theme-demo'*/, 'Choose your theme visually' )
					: __( 'Global design of intro. In PRO there is another 5 themes and global theme can be overridden by configuration of specific tour. ', 'dp-intro-tours' ) . ' ' . Dp_Intro_Tours_Helper::get_pro_link_html( Dp_Intro_Tours_Helper::build_dp_query_string( [ 'dp_qp_lock' => 'start-theme-demo' ], $query_params_defs ), 'Choose your theme visually' ),
				],
			],
			[
				'id'         => 'admin_board_tour_en',
				'title'      => __( 'Enable Tours on Admin Board', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'type'     => 'checkbox',
					'hint'     => __( 'Enable creating and running a tours on WordPress admin board.', 'dp-intro-tours' ),
					'pro_only' => $proOnly,
				],
			],
			[
				'id'         => 'hideStepNumbers',
				'title'      => __( 'Hide Step Number', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'hint' => __( 'Disable visualization of index of current intro step.', 'dp-intro-tours' ),
					'type' => 'checkbox',
				],
			],
			[
				'id'         => 'hideBullets',
				'title'      => __( 'Hide Step Bullets', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'hint' => __( 'Hide graphical visualization of tour progress in form of bullets. These are also possible to use for navigation to specific step.', 'dp-intro-tours' ),
					'type' => 'checkbox',
				],
			],
			[
				'id'         => 'showProgress',
				'title'      => __( 'Show Tour Progress Bar', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'hint' => __( 'Show graphical visualization of tour progress in form of progress bar.', 'dp-intro-tours' ),
					'type' => 'checkbox',
				],
			],
			[
				'id'         => 'show_in_main_menu',
				'title'      => __( 'Show Global Plugin\'s Options in Main Menu', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'hint' => __( 'Plugin\'s global options are shown in main admin board menu instead of in wordpress setting sub-menu.', 'dp-intro-tours' ),
					'type' => 'checkbox',
				],
			],
			[
				'id'         => 'extend_toolbar_publish_buttons',
				'title'      => __( 'Extend admin toolbar publish buttons', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'type' => 'checkbox',
					'hint' => __( 'Duplicate WordPress admin board action buttons (publish, save draft, preview etc.) at all applicable WordPress admin board pages (not intro tours only)', 'dp-intro-tours' ),
				],
			],
			[
				'id'         => 'load_all_themes',
				'title'      => __( 'Load all themes (ADVANCED)', 'dp-intro-tours' ),
				'defVal'     => '0',

				'renderArgs' => [
					'hint'     => sprintf( __( 'Enables changing themes on the fly on frontend by adding theme id %1$s as class into %2$s.', 'dp-intro-tours' ), '[dark, light, flat, modern, fancybar]', '.dpintro-wrapper element' ) . $this->option_hint_pro_promo(),
					'type'     => 'checkbox',
					'pro_only' => $proOnly,
				],
			],
			[
				'id'         => 'hide_elements_at_start',
				'title'      => __( 'Hide elements when tour starts (ADVANCED)', 'dp-intro-tours' ),
				'defVal'     => '',
				'renderArgs' => [
					'type'        => 'text',
					'size'        => 40,
					'placeholder' => '#wpadminbar, #chat-application-iframe, .class-of-elements-i-want-to-hide',
					'hint'        => __( 'Selectors (delimited by \',\') of elements, that should be hidden, when tour starts and shown again when tour ends.', 'dp-intro-tours' ),
				],
			],
			[
				'id'         => 'debug_console',
				'title'      => __( 'Debug Console Output', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'type' => 'checkbox',
					'hint' => __( 'Activate only for debug purposes.', 'dp-intro-tours' ),
				],
			],
		];
		if ( current_user_can( 'edit_users' ) ) {
			$res[] = [
				'id'         => 'clear_visit_count',
				'title'      => __( 'Clear Logged-In Visit Count', 'dp-intro-tours' ),
				'defVal'     => '0',
				'renderArgs' => [
					'type'        => 'action',
					'name'        => 'clear_visit_count',
					'msg_success' => __( 'Successfully cleared', 'dp-intro-tours' ),
					'msg_failed'  => __( 'Clearing failed', 'dp-intro-tours' ),
					'title'       => __( 'Clear', 'dp-intro-tours' ),
					'hint'        => __( 'Clear visit count to reset First User Visit feature for logged in users', 'dp-intro-tours' ),
				],
			];
		}
		return $res;
	}

	public function initialize_general_options() {
		Settings::init_setting_array(
			'dp_it_general_options',
			'general_options_section',
			'',
			'dp_it_general_options',
			$this->get_general_options_cfg_arr(),
			[ $this, 'general_options_description' ]
		);
	}


	public function labeling_options_description() {
		?>
	<h2><?php _e( 'Labeling options', 'dp-intro-tours' ); ?></h2>
	<p><?php echo __( 'You can customize texts of intro elements globally for all tours here. It is possible to override that by ', 'dp-intro-tours' ); ?><a href="<?php echo get_dashboard_url( get_current_user_id(), 'edit.php?post_type=dp_intro_tours' ); ?>"><?php echo __( 'specific tour configuration', 'dp-intro-tours' ); ?></a>.</p>
		<?php
	}

	public function initialize_labeling_options() {
		Settings::init_setting_array(
			'dp_it_labeling_options',
			'labeling_options_section',
			'',
			'dp_it_labeling_options',
			[
				[
					'id'         => 'nextLabel',
					'title'      => __( 'Next Step Button', 'dp-intro-tours' ),
					'defVal'     => '',
					'renderArgs' => [
						'placeholder' => 'Next',
						'type'        => 'text',
						'size'        => 10,
						'hint'        => __( 'Custom text for next step button.', 'dp-intro-tours' ),
					],
				],
				[
					'id'         => 'prevLabel',
					'title'      => __( 'Previous Step Button', 'dp-intro-tours' ),
					'defVal'     => '',
					'renderArgs' => [
						'placeholder' => 'Back',
						'type'        => 'text',
						'size'        => 10,
						'hint'        => __( 'Custom text for previous step button.', 'dp-intro-tours' ),
					],
				],
				[
					'id'         => 'skipLabel',
					'title'      => __( 'Cancel Tour Button', 'dp-intro-tours' ),
					'defVal'     => '',
					'renderArgs' => [
						'placeholder' => 'Skip',
						'type'        => 'text',
						'size'        => 10,
						'hint'        => __( 'Custom text for cancel tour button.', 'dp-intro-tours' ),
					],
				],
				[
					'id'         => 'doneLabel',
					'title'      => __( 'Finished Tour Button', 'dp-intro-tours' ),
					'defVal'     => '',
					'renderArgs' => [
						'placeholder' => 'Done',
						'type'        => 'text',
						'size'        => 10,
						'hint'        => __( 'Custom text of finished tour button.', 'dp-intro-tours' ),
					],
				],
			],
			[ $this, 'labeling_options_description' ]
		);
	}

	public function text_styles_options_description() {
		?>
	<h2><?php _e( 'Text styles options', 'dp-intro-tours' ); ?></h2>
	<p><?php _e( 'You can customize fonts and styles of intro texts here.', 'dp-intro-tours' ); ?></p>
		<?php
	}

	public function initialize_text_styles_options() {
		$use_wp_theme_text_styles = Settings::get_setting_array_field( 'dp_it_general_options', 'useThemeDefaultFont', '0' ) === '1';
		$font_hint_addition       = Dp_Intro_Tours_Helper::get_generic_i18n( 'font_option_hint' );
		$heading_approx_hint      = __( 'All other heading sizes (h1 - h6) and the bottom margins of the headings are approximated based on the values of h2 and h5.', 'dp-intro-tours' );
		if ( ! $use_wp_theme_text_styles ) {
			Settings::init_setting_array(
				'dp_it_text_styles_options',
				'text_styles_options_section',
				'',
				'dp_it_text_styles_options',
				[
					[
						'id'         => 'p_font',
						'title'      => __( 'Font family of general text (paragraph)', 'dp-intro-tours' ),
						'defVal'     => '',
						'renderArgs' => [
							'type'        => 'text',
							'size'        => 30,
							'placeholder' => __( 'e.g. Ubuntu, Tahoma, Sans-Serif', 'dp-intro-tours' ),
							'hint'        => __( 'Font family of paragraph inside a intro tooltip.', 'dp-intro-tours' ) . ' ' . $font_hint_addition,
						],
					],
					[
						'id'         => 'h_font',
						'title'      => __( 'Font family of all heading texts', 'dp-intro-tours' ),
						'defVal'     => '',
						'renderArgs' => [
							'type'        => 'text',
							'size'        => 30,
							'placeholder' => __( 'e.g. Ubuntu, Tahoma, Sans-Serif', 'dp-intro-tours' ),
							'hint'        => __( 'Font family of all heading texts inside a intro tooltip.', 'dp-intro-tours' ) . ' ' . $font_hint_addition,
						],
					],
					[
						'id'         => 'btn_font',
						'title'      => __( 'Font family of the buttons', 'dp-intro-tours' ),
						'defVal'     => '',
						'renderArgs' => [
							'type'        => 'text',
							'size'        => 30,
							'placeholder' => __( 'e.g. Ubuntu, Tahoma, Sans-Serif', 'dp-intro-tours' ),
							'hint'        => __( 'Font family of the buttons inside a intro tooltip. It is overridable by specific tour configuration.', 'dp-intro-tours' ) . ' ' . $font_hint_addition,
						],
					],
					[
						'id'         => 'p_font_size',
						'title'      => __( 'Font size of general text (paragraph) [px]', 'dp-intro-tours' ),
						'defVal'     => 16,
						'renderArgs' => [
							'type'      => 'text',
							'inputType' => 'number',
							'min'       => 5,
							'max'       => 100,
							'size'      => 1,
							'hint'      => __( 'Font size of paragraph inside a intro tooltip [px]', 'dp-intro-tours' ),
						],
					],
					[
						'id'         => 'p_mb',
						'title'      => __( 'Bottom margin of general text (paragraph)', 'dp-intro-tours' ),
						'defVal'     => 10,
						'renderArgs' => [
							'type'      => 'text',
							'inputType' => 'number',
							'min'       => 0,
							'max'       => 100,
							'size'      => 1,
							'hint'      => __( 'Bottom margin of paragraph inside a intro tooltip [px]', 'dp-intro-tours' ),
						],
					],
					[
						'id'         => 'h2_font_size',
						'title'      => __( 'Font size of heading 2 [px]', 'dp-intro-tours' ),
						'defVal'     => 34,
						'renderArgs' => [
							'type'      => 'text',
							'inputType' => 'number',
							'min'       => 5,
							'max'       => 200,
							'size'      => 1,
							'hint'      => __( 'Font size of heading 2 inside a intro tooltip [px]', 'dp-intro-tours' ) . ' ' . $heading_approx_hint,
						],
					],
					[
						'id'         => 'h2_mb',
						'title'      => __( 'Bottom margin of heading 2', 'dp-intro-tours' ),
						'defVal'     => 13,
						'renderArgs' => [
							'type'      => 'text',
							'inputType' => 'number',
							'min'       => 0,
							'max'       => 100,
							'size'      => 1,
							'hint'      => __( 'Bottom margin of heading 2 inside a intro tooltip [px]', 'dp-intro-tours' ) . ' ' . $heading_approx_hint,
						],
					],
					[
						'id'         => 'h5_font_size',
						'title'      => __( 'Font size of heading 5 [px]', 'dp-intro-tours' ),
						'defVal'     => 17,
						'renderArgs' => [
							'type'      => 'text',
							'inputType' => 'number',
							'min'       => 5,
							'max'       => 100,
							'size'      => 1,
							'hint'      => __( 'Font size of heading 5 inside a intro tooltip [px]', 'dp-intro-tours' ) . ' ' . $heading_approx_hint,
						],
					],
					[
						'id'         => 'h5_mb',
						'title'      => __( 'Bottom margin of heading 5', 'dp-intro-tours' ),
						'defVal'     => 10,
						'renderArgs' => [
							'type'      => 'text',
							'inputType' => 'number',
							'min'       => 0,
							'max'       => 100,
							'size'      => 1,
							'hint'      => __( 'Bottom margin of heading 5 inside a intro tooltip [px]', 'dp-intro-tours' ) . ' ' . $heading_approx_hint,
						],
					],

				],
				[ $this, 'text_styles_options_description' ]
			);
		}
	}

}
