<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Wp\Acf;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;
use IntroToursDP\Std\Core\Path;
use IntroToursDP\Std\Html\Html;

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
class Dp_Intro_Tours_Admin {


	public function change_tour_title_placeholder( string $text, WP_Post $post ) {
		if ( Dp_Intro_Tours_Helper::is_singular_intro_tour( $post ) ) {
			return __( 'Tour label (won\'t be displayed to the public)', 'dp-intro-tours' );
		} else {
			return $text;
		}
	}

	public function change_tour_permalink( $url, $post ) {
		if ( Dp_Intro_Tours_Helper::is_singular_intro_tour( $post ) ) {
			$url = Dp_Intro_Tours_Helper::get_tour_start_page_url( get_the_ID() );
		}
		return $url;
	}


	public function store_transient_current_admin_color() {
		global $_wp_admin_css_colors;
		$current_color_scheme = get_user_option( 'admin_color' );
		if ( $current_color_scheme ) {
			$colors_cfg = Arr::get( $_wp_admin_css_colors, $current_color_scheme );
			if ( $colors_cfg ) {
				$colors = $colors_cfg->colors;
				if ( count( $colors ) === 3 ) {
					$colors[] = '#E14D43'; // red
				}
				set_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_admin_colors' ), $colors );
			}
		}
	}



	public function redirect_from_transient( $location ) {
		$id = Arr::get( $_POST, 'post_ID' );
		if ( $id ) {
			$transient_id = Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_builder_transient' );
			$transient    = get_transient( $transient_id );
			if ( $transient !== false ) {
				delete_transient( $transient_id );
				$idFromTransient = $transient['postId'];
				if ( $id && $idFromTransient == $id ) {
					$queryString = Arr::get( $transient, 'redirectQueryString' );
					if ( ! empty( $queryString ) ) {
						$startPageUrl = Dp_Intro_Tours_Helper::get_tour_start_page_url( intval( $idFromTransient ), true, DPIT_STEPS_URL_TYPE_ABS, Arr::get( $transient, 'isGlobalStartAtAllPagesSet' ) == 1 );
						if ( ! empty( $startPageUrl ) ) {
							wp_redirect( Path::combine_url( $startPageUrl, $queryString ) );
							die;
						}
					}
				}
			}
		}
		return $location;
	}


	public function delete_dpintro_builder_transient( $scripts ) {
		delete_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_builder_transient' ) );
	}

	public function on_load_intro_steps_field( $value, $post_id, $field ) {
		$is_builder_on_admin = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qpb_builder_mode' ) !== null;
		if ( Acf::is_empty_table_field( $value ) && is_admin() && ! $is_builder_on_admin ) {
			return Dp_Intro_Tours_Helper::init_step_table();
		}
		return $value;
	}

	public function on_update_intro_steps_field( $value, $post_id, $field ) {
		// If no data - initialize table with header - column labels
		if ( Acf::is_empty_table_field( $value ) && ( is_admin() ) ) {
			return Dp_Intro_Tours_Helper::init_step_table();
		} else {
			return $this->filter_step_table( $value, $post_id );
		}
		return $value;
	}

	protected function filter_step_table( $value, $post_id ) {
		$stroredByVersion = Arr::get( $value, 'acftf.v' );
		if ( $stroredByVersion ) {
			if ( Str::compare_versions( $stroredByVersion, '1.3.10' ) < 0 ) {
				$stepDefNames = Dp_Intro_Tours_Helper::get_all_step_definitions_back_compat_1_3_10( 'PRO' );
				if ( array_key_exists( 'h', $value ) ) {
					$colCnt = count( $value['h'] );
					for ( $i = 0; $i < $colCnt; $i++ ) {

						$label = Arr::get( $value['h'][ $i ], 'c' );
						if ( $label && array_key_exists( $label, $stepDefNames ) ) {
							$val = Arr::get( $value['h'][ $i ], 'v' );
							if ( ! $val || strcasecmp( $val, $stepDefNames[ $label ] ) != 0 ) {
								$value['h'][ $i ]['v'] = $stepDefNames[ $label ];
							}
						}
					}
				}
			}
		}

		return $this->check_build_type_step_table_compatibility( $value, $post_id );
	}

	public function edit_form_after_title( $post ) {
		if ( Dp_Intro_Tours_Helper::is_singular_intro_tour( $post ) ) {
			$admin_colors = get_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_admin_colors' ) );
			$loader_color = Arr::sget( $admin_colors, 2, '' );
			$loader_style = '';
			if ( $loader_color ) {
				$loader_style = Html::get_style_str( [ 'color' => $loader_color ] );
			}
			?>

	  <style>
		.post-type-dp_intro_tours #post-body {
		  display: none;
		}
	  </style>
	  <div id="acf-intro-data-loader" class="dpit-loader dpit-loader--is-active dpit-loader--on-post-top" style="<?php echo $loader_style; ?>"></div>
			<?php
		}
	}


	protected function update_steps_url( $post_ID ) {
		Dp_Intro_Tours_Helper::update_steps_url( $post_ID );
	}

	public function on_post_updated( $post_ID ) {
		if ( Dp_Intro_Tours_Helper::is_singular_intro_tour( $post_ID ) ) {
			$this->update_steps_url( $post_ID );
			Dp_Intro_Tours_Helper::store_plugin_version( $post_ID );
			$this->fix_empty_title( $post_ID );
		}
	}



	public function prefix_plugin_update_message( $data, $response ) {
		$upgrade_notice = Arr::get( $data, 'upgrade_notice' );
		if ( $upgrade_notice ) {

			$upgrade_notice = str_replace( '<p>', '<br><br>', $upgrade_notice );
			$upgrade_notice = str_replace( '</p>', '<br><br>', $upgrade_notice );
			echo $upgrade_notice;
		} else {
			$new_verison = Arr::get( $data, 'new_version' );
			if ( $new_verison ) {
				$major_v_new     = Str::separed_first_part( $new_verison, '.' );
				$major_v_current = Str::separed_first_part( DP_INTRO_TOURS_VERSION, '.' );
				if ( $major_v_new > $major_v_current ) {
					_e( "<br><br>Heads up !! This is the major release with many new cool features :)<br>We've made all possible fixes to keep compatibility back, but we ask that you review all tours after the update.<br> If you encounter any problems after the update, please do not hesitate to contact our support.", 'dp-intro-tours' );
				}
			}
		}
	}

	public function fix_empty_title( $post_ID ) {
		$title = get_the_title( $post_ID );
		if ( ! $title ) {
			if ( $post_ID ) {
				$is_run_at_all_pages = Dp_Intro_Tours_Helper::is_tour_started_globally_at_all_pages( $post_ID );
				if ( $is_run_at_all_pages ) {
					$new_title_proposal = __( 'All pages', 'dp-intro-tours' );
				} else {
					$startPageId = Dp_Intro_Tours_Helper::get_tour_start_page_id( $post_ID );
					if ( $startPageId ) {
						$new_title_proposal = get_the_title( $startPageId );
					}
				}
				if ( $new_title_proposal ) {
					$new_title = Dp_Intro_Tours_Helper::get_default_name_for_new_tour( $new_title_proposal );
					wp_update_post(
						[
							'ID'         => $post_ID,
							'post_title' => $new_title,
						]
					);
				}
			}
		}
	}

	protected function should_be_table_recreated( $rawTable, $stepDefNames ) {
		$headers = Arr::get( $rawTable, 'h', null );
		if ( $headers ) {
			$headerTags = array_map(
				function ( $item ) {
					return Arr::get( $item, 'v', null );
				},
				$headers
			);

			foreach ( $stepDefNames as $defTag ) {
				if ( ! in_array( $defTag, $headerTags ) ) {
					return true;
				}
			}
		}
		return false;
	}

	protected function check_build_type_step_table_compatibility( $table_raw_data, $tour_id ) {
		// check if all columns of step table are created (FREE - PRO compatibility + broken tables)
		$stepDefNames = Dp_Intro_Tours_Helper::get_step_definition_names();
		if ( $this->should_be_table_recreated( $table_raw_data, $stepDefNames ) ) {  // Need to add columns and set to def values ?
			$recreate_res = Dp_Intro_Tours_Helper::recreate_step_table( $tour_id, $table_raw_data );
			if ( $recreate_res['was_changed'] ) {
				$table_raw_data = $recreate_res['raw_data'];
			}
		}
		return $table_raw_data;
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		$is_admin_settings_page  = $this->is_admin_settings_page();
		$is_admin_tour_edit_page = Dp_Intro_Tours_Helper::is_admin_tour_edit_page();
		$this->load_scripts_at_all_admin_pages( $is_admin_settings_page, $is_admin_tour_edit_page );

		if ( $is_admin_settings_page ) {
			$this->load_scripts_at_admin_settings_page();
		}
		// intro tour admin builder script
		if ( $is_admin_tour_edit_page ) {
			$this->load_scripts_at_admin_edit_tour_page();
		}
	}

	protected function load_scripts_at_all_admin_pages( bool $is_admin_settings_page, bool $is_admin_tour_edit_page ) {
		// styles
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdminStyle',
			[
				'css'   => true,
				'media' => 'all',
			]
		);

		Dp_Intro_Tours_Helper::enqueue_dynamic_css_admin_colors( 'dpIntroToursAdminStyle' );
		// js
		$page_out_of_scope_of_plugin = true;
		$screen                      = get_current_screen();
		if ( $is_admin_settings_page || $is_admin_tour_edit_page ) {
			$page_out_of_scope_of_plugin = false;
			$this->load_js_scripts_at_all_admin_pages();
		} else {
			if ( $screen && ( $screen->base === 'dashboard' || ( $screen->base === 'edit' && $screen->post_type === 'dp_intro_tours' ) ) ) {
				if ( $screen->base !== 'edit' ) {
					$page_out_of_scope_of_plugin = false;
				}
				$this->load_js_scripts_at_all_admin_pages();
			}
		}
		if ( ( ! $screen || $screen->base !== 'dashboard' ) && ( ! $page_out_of_scope_of_plugin || wp_validate_boolean( Settings::get_setting_array_field( 'dp_it_general_options', 'extend_toolbar_publish_buttons' ) ) ) ) {
			$this->load_admin_toolbar_script( $page_out_of_scope_of_plugin, $is_admin_tour_edit_page );
		}

	}

	protected function load_admin_toolbar_script( $load_accent_colors = false, $is_admin_tour_edit_page = false ) {
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroAdminToolBarPublishBtnStyle',
			[
				'css'   => true,
				'media' => 'all',
			]
		);

		$config = [
			'dpDebugEn'               => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'siteUrl'                 => get_site_url(),
			'isPRO'                   => DP_INTRO_TOURS_IS_PRO,
			'buttons_to_the_right'    => '1',
			'draft_button'            => '1',
			'preview_button'          => '1',
			'is_admin_tour_edit_page' => $is_admin_tour_edit_page ? '1' : '0',
		];
		if ( $load_accent_colors ) {
			$config['adminColors'] = [
				'colors'       => get_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_admin_colors' ) ),
				'rootSelector' => 'body',
				'addRgbVars'   => true,
			];
		}
		// admin edit tour script
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroAdminToolBarPublishBtn',
			[
				'in_footer' => true,
			],
			'dp_admin_toolbar_config',
			$config
		);
	}

	protected function load_js_scripts_at_all_admin_pages() {

			$config = [
				'siteUrl'            => get_site_url(),
				'dpDebugEn'          => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'proFeaturesLink'    => DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO,
				'adminColors'        => [
					'colors'       => get_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpintro_admin_colors' ) ),
					'rootSelector' => 'body',
					'addRgbVars'   => true,
				],
				'assetsUrl'          => plugin_dir_url( __FILE__ ) . 'assets',
				'ratingFeedbackLink' => DP_INTRO_TOURS_PRODUCT_RATING_FEEDBACK_LINK_FREE,
				'i18n'               => [
					'feature_pro_only' => __( 'This feature is available in PRO version only. Would you like to check it?', 'dp-intro-tours' ),
				],
			];
			Dp_Intro_Tours_Enqueue::enqueue(
				'main',
				'dpIntroToursAdmin',
				[
					'in_footer' => true,
					'js_dep'    => [ 'jquery' ],
				],
				'dp_main_admin_config',
				$config
			);
	}

	protected function load_scripts_at_admin_settings_page() {
		// style
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdminStyleSettings',
			[
				'css'   => true,
				'media' => 'all',
			]
		);
		//js
		$this->load_js_scripts_at_admin_settings_page();
	}

	public function publish_sticky() {
		//echo '<div id="dpit-submit-container-fixed" class="dpit-admin-submit dpit-admin-submit-fixed">';
		//submit_button( __( 'Save changes', 'dp-intro-tours' ) );
	}


	protected function load_js_scripts_at_admin_settings_page() {
		wp_enqueue_style( 'wp-color-picker' );
		$config = [
			'siteUrl'   => get_site_url(),
			'dpDebugEn' => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'assetsUrl' => plugin_dir_url( __FILE__ ) . 'assets',
			'tab'       => Dp_Intro_Tours_Helper::get_url_param( 'tab', 'general' ),
			'nonces'    => [
				'wp_rest' => wp_create_nonce( 'wp_rest' ),
			],
		];
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdminSettings',
			[
				'in_footer' => true,
				'js_dep'    => [ 'wp-color-picker', 'jquery' ],
			],
			'dp_main_admin_settings_config',
			$config
		);
	}


	protected function is_admin_settings_page() {
		return Dp_Intro_Tours_Helper::get_url_param( 'page', '' ) === 'dp_intro_tours';
	}

	protected function load_scripts_at_admin_edit_tour_page() {
		// style
		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdminStyleTourEdit',
			[
				'css'   => true,
				'media' => 'all',
			]
		);
		//js
		$this->load_js_scripts_at_admin_edit_tour_page();
	}

	protected function filter_acf_table_cfg( array $config ) : array {
		return $config;
	}

	protected function load_js_scripts_at_admin_edit_tour_page() {
		$tourId = get_the_ID();

		// acf table config
		$selectPositionOptions = [];
		foreach ( Dp_Intro_Tours_Helper::get_position_select_options() as $key => $value ) {
			$selectPositionOptions[] = "${key}:${value}";
		}

		$acf_table_config = $this->filter_acf_table_cfg(
			[
				'version'               => DP_ACF_TABLE_VERSION,
				'siteUrl'               => get_site_url(),
				'dpDebugEn'             => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'selectPositionOptions' => $selectPositionOptions,
				'assetsUrl'             => plugin_dir_url( __FILE__ ) . 'assets',
				'sysUrlVars'            => Dp_Intro_Tours_Helper::get_all_system_url_vars( $tourId ),
				'text_styles'           => Dp_Intro_Tours_Helper::get_text_style_options(),
				'tmce'                  => [
					'title' => __( 'Edit content of %s step', 'dp-intro-tours' ),
				],
			]
		);

		// admin edit tour script
		$config = [
			'siteUrl'          => get_site_url(),
			'dpDebugEn'        => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'proDemoLink'      => DP_INTRO_TOURS_PRODUCT_DEMO_LINK_PRO,
			'proCTAText'       => __( 'Try build your tour with PRO', 'dp-intro-tours' ),
			'assetsUrl'        => plugin_dir_url( __FILE__ ) . 'assets',
			'tourId'           => $tourId,
			'tourStartPageUrl' => Dp_Intro_Tours_Helper::get_tour_start_page_url( $tourId ) ?? '',
			'stepDefinitions'  => Dp_Intro_Tours_Helper::get_step_definitions( 'PRO' ),
			'queryParamsDefs'  => Dp_Intro_Tours_Helper::get_dp_intro_query_params(),
			'nonces'           => [
				'wp_rest' => wp_create_nonce( 'wp_rest' ),
			],
			'i18n'             => [
				'permalink_title'               => __( 'Start URL:', 'dp-intro-tours' ),
				'configure_steps_visually'      => __( 'Configure steps visually', 'dp-intro-tours' ),
				'set_first_step_url_PRO'        => __( 'First, in the "Steps" table, set the "Page/Post/CPT URL" field for the first step to enable the visual builder.', 'dp-intro-tours' ),
				'set_example_vars_first'        => __( 'Your first step has variables in url. Set all their example values first so we know where to run visual builder.', 'dp-intro-tours' ),
				'set_first_step_url_FREE'       => __( 'First, set the "Page / Post / Product" field to enable the visual builder', 'dp-intro-tours' ),
				'or_set_man'                    => Dp_Intro_Tours_Helper::get_generic_i18n( 'or_set_man' ),
				'or_set_adjust_man_in_tab'      => __( 'Or set / adjust manually in table below', 'dp-intro-tours' ),
				'set_trigger_selector_visually' => __( 'Set trigger selector visually', 'dp-intro-tours' ),
				'tour_id'                       => __( 'Tour ID', 'dp-intro-tours' ),
			],
			'acfTable'         => $acf_table_config,
		];

		Dp_Intro_Tours_Enqueue::enqueue(
			'main',
			'dpIntroToursAdminTourEdit',
			[
				'in_footer' => true,
			],
			'dpIntroToursAdminTourEditConfig',
			$config
		);
	}
}
