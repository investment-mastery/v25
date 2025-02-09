<?php

use IntroToursDP\Wp\Acf;
use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;
use IntroToursDP\Std\Core\Path;
use IntroToursDP\Wp\AdminNotice;

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
			$res = Dp_Intro_Tours_Helper::get_tour_start_page_url( get_the_ID() );
			if ( $res ) {
				$url = $res;
			}
		}
		return $url;
	}


	public function profile_update( int $user_id ) {
		Dp_Intro_Tours_Helper::profile_update( $user_id );
	}


	public function admin_theme_colors_check() {
		$admin_theme_colors = Dp_Intro_Tours_Helper::get_admin_theme_colors();
		if ( ! $admin_theme_colors ) {
			Dp_Intro_Tours_Helper::profile_update();
		}
	}


	public function redirect_from_transient( $location ) {
		$id = Arr::get( $_POST, 'post_ID' );
		if ( $id ) {
			$transient_id = Dp_Intro_Tours_Helper::get_transient_id( 'dpit_builder_transient' );
			$transient    = get_transient( $transient_id );
			if ( $transient !== false ) {
				delete_transient( $transient_id );
				$idFromTransient = $transient['postId'];
				if ( $id && $idFromTransient === $id ) {
					$queryString = Arr::get( $transient, 'redirectQueryString' );
					if ( ! empty( $queryString ) ) {
						$startPageUrl = Dp_Intro_Tours_Helper::get_tour_start_page_url(
							intval( $idFromTransient ),
							true,
							DPIT_STEPS_URL_TYPE_ABS,
							Arr::get( $transient, 'isGlobalStartAtAllPagesSet' ) === '1'
						);
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

	public function manage_dp_intro_tours_posts_columns( $columns ) {
		$is_active_title  = __( 'Is active?', 'dp-intro-tours' );
		$step_count_title = __( 'Number of steps', 'dp-intro-tours' );
		$column_idx       = 2;
		if ( count( $columns ) > $column_idx ) {
			$columns = array_merge(
				array_slice( $columns, 0, $column_idx ),
				[
					'is_active'   => $is_active_title,
					'steps_count' => $step_count_title,
				],
				array_slice( $columns, $column_idx )
			);
		} else {
			$columns['is_active']   = $is_active_title;
			$columns['steps_count'] = $step_count_title;

		}
		return $columns;
	}

	public function manage_dp_intro_tours_posts_custom_column( $column, $post_id ) {
		if ( $column === 'is_active' ) {

			$start_url_cnt = Dp_Intro_Tours_Helper::get_start_step_count( $post_id );
			$is_active     = Acf::get_field( 'intro_enabled', $post_id, true, false );

			if ( $is_active && get_post_status( $post_id ) === 'publish' && $start_url_cnt > 0 ) {
				echo '<span class="dashicons dashicons-yes dpit-tour-active-state dpit-tour-active-state--yes"></span>';
			} else {
				echo '<span class="dashicons dashicons-no-alt dpit-tour-active-state dpit-tour-active-state--no"></span>';
			}
		} elseif ( $column === 'steps_count' ) {
			echo get_post_meta( $post_id, 'dpit_step_count', true );
		}
	}


	public function delete_dpit_builder_transient() {
		delete_transient( Dp_Intro_Tours_Helper::get_transient_id( 'dpit_builder_transient' ) );
	}

	public function on_load_intro_steps_field( $value ) {
		$is_builder_on_admin = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qpb_builder_mode' ) !== null;
		if ( Acf::is_empty_table_field( $value ) && is_admin() && ! $is_builder_on_admin ) {
			return Dp_Intro_Tours_Helper::init_step_table();
		}
		return $value;
	}

	public function on_update_intro_steps_field( $value, $post_id ) {
		// If no data - initialize table with header - column labels
		if ( Acf::is_empty_table_field( $value ) && ( is_admin() ) ) {
			return Dp_Intro_Tours_Helper::init_step_table();
		} else {
			return $this->filter_step_table( $value, $post_id );
		}
		return $value;
	}

	protected function filter_step_table( $value, $post_id ) {
		$stored_by_version = Arr::get( $value, 'acftf.v' );
		if ( $stored_by_version ) {
			if ( Str::compare_versions( $stored_by_version, '1.4.10' ) < 0 ) {
				$step_def_names = Dp_Intro_Tours_Helper::get_all_step_definitions_back_compat_1_3_10( 'PRO' );
				if ( array_key_exists( 'h', $value ) ) {
					$colCnt = count( $value['h'] );
					for ( $i = 0; $i < $colCnt; $i++ ) {

						$label = Arr::get( $value['h'][ $i ], 'c' );
						if ( $label && array_key_exists( $label, $step_def_names ) ) {
							$val = Arr::get( $value['h'][ $i ], 'v' );
							if ( ! $val || strcasecmp( $val, $step_def_names[ $label ] ) !== 0 ) {
								$value['h'][ $i ]['v'] = $step_def_names[ $label ];
							}
						}
					}
				}
			}
		}

		// store step count

		$steps_data_array = Arr::get( $value, 'b', [] );
		if ( is_array( $steps_data_array ) ) {
			update_post_meta( $post_id, 'dpit_step_count', count( $steps_data_array ) );
		}

		return $this->check_build_type_step_table_compatibility( $value, $post_id );
	}

	public function admin_permalink_notice() {
		$permalink_structure = get_option( 'permalink_structure' );
		if ( ! $permalink_structure ) {
			AdminNotice::render_notice(
				'<strong>' . __( 'IMPORTANT', 'dp-intro-tours' ) . '</strong>: '
				// translators: %s: plugin name
				. sprintf( __( '%s can\'t work with default (Plain) permalink structure, please change to other', 'dp-intro-tours' ), DP_INTRO_TOURS_NAME ),
				'warning',
				true,
				get_site_url( null, '/wp-admin/options-permalink.php' ),
				'button button-primary',
				__( 'Change permalinks', 'dp-intro-tours' ),
				false,
				'',
				'dpit-notice'
			);
		}
	}

	public function edit_form_acf_admin_head( $post ) {
		if ( Dp_Intro_Tours_Helper::is_singular_intro_tour( $post ) ) {
			$this->render_loader();
		}
	}


	public function render_loader() {
		?>
			<style>
			.post-type-dp_intro_tours #wpbody-content {
				opacity: 0;
				transition: opacity 700ms ease-in-out;
			}
			</style>

			<div id="dpit-admin-tour-edit-loader" class="dpit-loader dpit-loader dpit-loader--fixed">
				<div class="dpit-loader__title"> <?= __( 'Loading tour options', 'dp-intro-tours' ) ?> </div>
				<div class="dpit-loader__items">
					<span class="dpit-loader__item"></span>
					<span class="dpit-loader__item"></span>
					<span class="dpit-loader__item"></span>
					<span class="dpit-loader__item"></span>
				</div>
			</div>
		<?php
	}

	public function adjust_screen_layout_selection_to_one_column_only( $columns ) {
		$columns['dp_intro_tours'] = 1;
		return $columns;
	}


	public function adjust_screen_layout_to_to_one_column() {
		return 1;
	}

	public function on_post_updated( $post_ID ) {
		if ( Dp_Intro_Tours_Helper::is_singular_intro_tour( $post_ID ) ) {
			Dp_Intro_Tours_Helper::update_steps_url( $post_ID );
			Dp_Intro_Tours_Helper::store_plugin_version( $post_ID );
			$this->fix_empty_title( $post_ID );
		}
	}



	public function prefix_plugin_update_message( $data/*, $response*/ ) {
		$upgrade_notice_from_readme = Arr::get( $data, 'upgrade_notice' );
		if ( $upgrade_notice_from_readme ) {

			$upgrade_notice_from_readme = str_replace( '<p>', '<br><br>', $upgrade_notice_from_readme );
			$upgrade_notice_from_readme = str_replace( '</p>', '<br><br>', $upgrade_notice_from_readme );
			echo $upgrade_notice_from_readme;
		} /*else {
			$new_version = Arr::get( $data, 'new_version' );
			if ( $new_version ) {
				$major_v_new     = Str::first_part( $new_version, '.' );
				$major_v_current = Str::first_part( DP_INTRO_TOURS_VERSION, '.' );
				if ( $major_v_new > $major_v_current ) {
					echo '<br><br>' . Dp_Intro_Tours_Helper::get_generic_i18n( 'upgrade_notice' );
					echo '<br>' . Dp_Intro_Tours_Helper::get_generic_i18n( 'upgrade_link' );
				}
			}
		}*/
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

	protected function should_be_table_recreated( $raw_table, $step_def_names ) {
		$headers = Arr::get( $raw_table, 'h', null );
		if ( $headers ) {
			$header_tags = array_map(
				function ( $item ) {
					return Arr::get( $item, 'v', null );
				},
				$headers
			);

			foreach ( $step_def_names as $def_tag ) {
				if ( ! in_array( $def_tag, $header_tags, true ) ) {
					return true;
				}
			}
		}
		return false;
	}

	protected function check_build_type_step_table_compatibility( $table_raw_data, $tour_id ) {
		// check if all columns of step table are created (FREE - PRO compatibility + broken tables)
		$step_def_names = Dp_Intro_Tours_Helper::get_step_definition_names();
		if ( $this->should_be_table_recreated( $table_raw_data, $step_def_names ) ) {  // Need to add columns and set to def values ?
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
		$is_admin_settings_page      = $this->is_admin_settings_page();
		$is_admin_tour_edit_page_res = Dp_Intro_Tours_Helper::is_admin_tour_edit_page();
		$is_admin_tour_list_page_res = Dp_Intro_Tours_Helper::is_admin_tour_list_page();
		$this->load_scripts_at_all_admin_pages( $is_admin_settings_page, $is_admin_tour_edit_page_res, $is_admin_tour_list_page_res );

		if ( $is_admin_settings_page ) {
			$this->load_scripts_at_admin_settings_page();
		}
		// intro tour options script
		if ( $is_admin_tour_edit_page_res ) {
			$this->load_scripts_at_admin_edit_tour_page();
		}
	}

	protected function load_scripts_at_all_admin_pages( bool $is_admin_settings_page, bool $is_admin_tour_edit_page, bool $is_admin_tour_list_page ) {
		// styles
		Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-admin-style', [], Dp_Intro_Tours_Helper::get_dynamic_css( true, true ) );
		// js
		Dp_Intro_Tours_Enqueue::enqueue_js(
			'main',
			'dpit-admin-always',
			[],
			'dp_admin_always_config',
			[ 'dpDebugEn' => Dp_Intro_Tours_Helper::is_debug_console_en() ]
		);
		$page_out_of_scope_of_plugin = true;
		$screen                      = get_current_screen();
		if ( $is_admin_settings_page || $is_admin_tour_edit_page || $is_admin_tour_list_page ) {
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
		if ( ( ! $screen || $screen->base !== 'dashboard' )
			&& ! $is_admin_tour_edit_page
			&& ( ! $page_out_of_scope_of_plugin
				|| Settings::get_setting_array_bool( 'dp_it_general_options', 'extend_toolbar_publish_buttons' ) )
			) {
			$this->load_admin_toolbar_script( $page_out_of_scope_of_plugin );
		}

	}

	protected function load_admin_toolbar_script( $load_accent_colors = false ) {
		Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-admin-toolbar-style' );
		$config = [
			'dpDebugEn' => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'siteUrl'   => get_site_url(),

			'i18n'      => [
				'storingChanges' => Dp_Intro_Tours_Helper::get_generic_i18n( 'storingChanges' ),
				'redirecting'    => Dp_Intro_Tours_Helper::get_generic_i18n( 'redirecting' ),
				//'unsaved_changes_prompt' => Dp_Intro_Tours_Helper::get_generic_i18n( 'unsaved_changes_prompt' ),
			],

		];
		if ( $load_accent_colors ) {
			$config['adminColors'] = Dp_Intro_Tours_Helper::get_admin_theme_colors_cfg();
		}
		// admin edit tour script
		Dp_Intro_Tours_Enqueue::enqueue_js(
			'main',
			'dpit-admin-toolbar',
			[
				'in_footer' => true,
			],
			'dp_admin_toolbar_config',
			$config
		);
	}

	public function add_settings_navig_to_dpit_cpt_admin_menu() {
		$tours_menu_root = get_admin_page_parent( 'edit.php?post_type=dp_intro_tours' );
		add_submenu_page(
			$tours_menu_root,
			__( 'Global Options', 'dp-intro-tours' ) . ': ' . DP_INTRO_TOURS_NAME,
			__( 'Global Options', 'dp-intro-tours' ),
			'manage_options',
			'options-general.php?page=dp_intro_tours'
		);
		add_submenu_page(
			$tours_menu_root,
			__( 'How to', 'dp-intro-tours' ) . ': ' . DP_INTRO_TOURS_NAME,
			__( 'How to', 'dp-intro-tours' ),
			'edit_posts',
			DP_INTRO_TOURS_HOW_TO_DOC
		);
		if ( ! DP_INTRO_TOURS_IS_PRO ) {
			add_submenu_page(
				$tours_menu_root,
				__( 'Upgrade', 'dp-intro-tours' ) . 'to ' . DP_INTRO_TOURS_PRODUCT_TITLE_PRO,
				__( 'Upgrade', 'dp-intro-tours' ),
				'edit_posts',
				DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO
			);
		}
	}

	protected function load_js_scripts_at_all_admin_pages() {

			$config = [
				'siteUrl'            => get_site_url(),
				'restApiUrl'         => get_rest_url(),
				'nonces'             => [
					'wp_rest' => wp_create_nonce( 'wp_rest' ),
				],
				'dpDebugEn'          => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'proFeaturesLink'    => DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO,
				'adminColors'        => Dp_Intro_Tours_Helper::get_admin_theme_colors_cfg(),
				'assetsUrl'          => plugin_dir_url( __FILE__ ) . 'assets',
				'ratingFeedbackLink' => DP_INTRO_TOURS_PRODUCT_RATING_FEEDBACK_LINK_FREE,
				'i18n'               => [
					'feature_pro_only' => __( 'This feature is available in PRO version only. Would you like to check it?', 'dp-intro-tours' ),
				],
			];
			Dp_Intro_Tours_Enqueue::enqueue_js(
				'main',
				'dpit-admin',
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
		Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-admin-settings-style' );
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
			'siteUrl'             => get_site_url(),
			'dpDebugEn'           => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'assetsUrl'           => plugin_dir_url( __FILE__ ) . 'assets',
			'tab'                 => Dp_Intro_Tours_Helper::get_url_param( 'tab', 'general' ),
			'mobile_break_points' => Dp_Intro_Tours_Helper::get_breakpoint_options(),
			'nonces'              => [
				'wp_rest' => wp_create_nonce( 'wp_rest' ),
			],
		];
		Dp_Intro_Tours_Enqueue::enqueue_js(
			'main',
			'dpit-admin-settings',
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
		Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-admin-tour-edit-style' );
		//js
		$this->load_js_scripts_at_admin_edit_tour_page();
	}

	protected function filter_acf_table_cfg( array $config, $tour_id ) : array {
		( $tour_id ); // unused
		return $config;
	}

	protected function load_js_scripts_at_admin_edit_tour_page() {
		$tour_id = get_the_ID();

		// acf table config
		$selectPositionOptions = [];
		foreach ( Dp_Intro_Tours_Helper::get_position_select_options() as $key => $value ) {
			$selectPositionOptions[] = "{$key}:{$value}";
		}

		$acf_table_config = $this->filter_acf_table_cfg(
			[
				'version'               => DP_ACF_TABLE_VERSION,
				'siteUrl'               => get_site_url(),
				'dpDebugEn'             => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'selectPositionOptions' => $selectPositionOptions,
				'assetsUrl'             => plugin_dir_url( __FILE__ ) . 'assets',
				'sysUrlVars'            => Dp_Intro_Tours_Helper::get_all_system_url_vars( $tour_id ),
				'text_styles'           => Dp_Intro_Tours_Helper::get_text_style_options(),
				'tmce'                  => [
					// translators: %s: step index
					'title' => __( 'Edit the content of the %s step', 'dp-intro-tours' ),
				],
			],
			$tour_id
		);

		// admin edit tour script
		$config = [
			'siteUrl'          => get_site_url(),
			'restApiUrl'       => get_rest_url(),
			'nonces'           => [
				'wp_rest' => wp_create_nonce( 'wp_rest' ),
			],
			'dpDebugEn'        => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'proDemoLink'      => DP_INTRO_TOURS_PRODUCT_DEMO_LINK_PRO,
			'proCTAText'       => __( 'Try build your tour with PRO', 'dp-intro-tours' ),
			'assetsUrl'        => plugin_dir_url( __FILE__ ) . 'assets',
			'tourId'           => $tour_id,
			'tourStartPageUrl' => Dp_Intro_Tours_Helper::get_tour_start_page_url( $tour_id, true, DPIT_STEPS_URL_TYPE_REL ) ?? '',
			'stepDefinitions'  => Dp_Intro_Tours_Helper::get_step_definitions( 'PRO' ),
			'queryParamsDefs'  => Dp_Intro_Tours_Helper::get_dp_intro_query_params(),
			'acfRootElId'      => Dp_Intro_Tours_Helper::get_acf_root_key( 'acf-' ),
			'i18n'             => [
				'permalink_title'          => __( 'Start URL:', 'dp-intro-tours' ),
				'configure_steps_visually' => __( 'Configure steps visually', 'dp-intro-tours' ),
				'storingChanges'           => Dp_Intro_Tours_Helper::get_generic_i18n( 'storingChanges' ),
				'redirecting'              => Dp_Intro_Tours_Helper::get_generic_i18n( 'redirecting' ),
				//'unsaved_changes_prompt'   => Dp_Intro_Tours_Helper::get_generic_i18n( 'unsaved_changes_prompt' ),
				'loadingFB'                => __( 'Loading frontend builder', 'dp-intro-tours' ),
				'HOME_PAGE'                => __( 'HOME PAGE', 'dp-intro-tours' ),
				'EVERYWHERE'               => __( 'EVERYWHERE', 'dp-intro-tours' ),
				'button'                   => __( 'Button', 'dp-intro-tours' ),
				'element'                  => __( 'Element', 'dp-intro-tours' ),
				'tour_starts_at'           => __( 'Tour start', 'dp-intro-tours' ),
				'set_first_step_url_PRO'   => sprintf(
					// translators: %1$s: Page/Post/CPT URL table column, %2$s: Steps table
					__( 'To enable the visual builder, first set the %1$s field in the first step in the %2$s table.', 'dp-intro-tours' ),
					'<strong>' . __( 'Page/Post/CPT URL', 'dp-intro-tours' ) . '</strong>',
					'<strong>' . __( 'Steps', 'dp-intro-tours' ) . '</strong>'
				),
				'set_example_vars_first'   => __( 'Your first step has variables in url. Set all their example values first so we know where to run visual builder.', 'dp-intro-tours' ),
				'set_first_step_url_FREE'  => __( 'First, set the "Page / Post / Product" field to enable the visual builder', 'dp-intro-tours' ),
				'or_set_man'               => Dp_Intro_Tours_Helper::get_generic_i18n( 'or_set_man' ),
				'or_set_man_table'         => __( 'Or set / adjust manually in table below', 'dp-intro-tours' ),
				'set_visually'             => __( 'Set visually', 'dp-intro-tours' ),
				'tour_id'                  => __( 'Tour ID', 'dp-intro-tours' ),
			],
			'acfTable'         => $acf_table_config,
		];

		Dp_Intro_Tours_Enqueue::enqueue_js(
			'main',
			'dpit-admin-tour-edit',
			[
				'in_footer' => true,
			],
			'dpIntroToursAdminTourEditConfig',
			$config
		);
	}
}
?>
