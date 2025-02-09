<?php

use IntroToursDP\Wp\Acf;
use IntroToursDP\Wp\WpStd;
use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;
use IntroToursDP\Std\Core\Path;
use IntroToursDP\Wp\AdminPromo;
use IntroToursDP\Wp\AdminNotice;

/**
 * The public-facing functionality of the plugin.
 *
 * @link  https://deeppresentation.com
 * @since 1.0.0
 *
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/public
 * @author     Tomas Groulik <tomas.groulik@gmail.com>
 */
class Dp_Intro_Tours_Public {

	protected $builder_mode;

	protected $step_data;

	protected $tours_to_inc;

	protected $trigger_cfg;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct() {
		$this->tours_to_inc = [];
		$this->builder_mode = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qpb_builder_mode', null );
		$this->step_data    = [];
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles( array $intro_themes_to_load, bool $load_all_themes_override = false, $dynamic_css_data = false ) {

		if ( ! $dynamic_css_data ) {
			$dynamic_css_data = '';
		}

		$dynamic_css_data .= Dp_Intro_Tours_Helper::get_dynamic_css( $this->builder_mode !== null, true );

		$res = Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-base-style', [], $dynamic_css_data );

		$this->load_needed_theme_styles( $intro_themes_to_load, $load_all_themes_override );
		if ( $this->builder_mode ) {
			Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-builder-style', [] );
		}
		return $res;
	}


	protected function load_needed_theme_styles( array $intro_themes_to_load, bool $load_all_themes_override ) {
		( $$load_all_themes_override ); // unused argument
		$available_theme_keys = Dp_Intro_Tours_Helper::get_available_themes_keys();

		foreach ( $intro_themes_to_load as $theme ) {
			$this->load_theme_style( $theme, $available_theme_keys );
		}
	}

	protected function load_theme_style( ?string $theme, array $available_theme_keys ) {
		if ( $theme && in_array( $theme, $available_theme_keys, true ) ) {
			Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-' . $theme . '-theme-style' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		$this->load_scripts_in_active_tour_pages();
	}

	public function enqueue_scripts_on_admin_board() {
		if ( ! Dp_Intro_Tours_Helper::is_dp_intro_cpt_admin() ) {
			$this->load_scripts_in_active_tour_pages();
		}
	}

	public function is_toolbar_custom_en() {
		if ( ! ( wp_get_current_user() instanceof WP_User ) ) {
			return false;
		}
		if ( ! current_user_can( 'edit_posts' ) ) {
			return false;
		}
		if ( $this->builder_mode ) {
			return false;
		}

		if ( is_admin() ) {
			if ( ! DP_INTRO_TOURS_IS_PRO ) {
				return false;
			}
			$customize_en = Settings::get_setting_array_field( 'dp_it_general_options', 'admin_board_tour_en', '0' ) !== '0';
			if ( $customize_en ) {
				if ( Dp_Intro_Tours_Helper::is_dp_intro_cpt_admin() ) {
					$customize_en = false;
				}
			}
			return $customize_en;
		}
		return true;
	}

	public function get_admin_bar_title( $text, $ico_content = false, $ico_class = '', $title = null ) {
		if ( ! is_string( $title ) ) {
			$title = $text;
		}
		$title_attr = $title ? ' title="' . $title . '"' : '';
		$res        = '<span class="dpit-ab-title"' . $title_attr . '>';
		if ( $ico_content !== false && $ico_content !== null ) {
			$ico_classes = Str::classes(
				[
					'dpit-ab-li__icon' => true,
					$ico_class         => $ico_class,
				]
			);
			$res        .= '<span class="' . $ico_classes . '">' . $ico_content . '</span>';
		}
		if ( $text ) {
			$res .= '<span class="dpit-ab-li__text">' . $text . '</span>';
		}
		$res .= '</span">';
		return $res;
	}

	public function customize_toolbar( $wp_admin_bar ) {
		$is_toolbar_custom_en = $this->is_toolbar_custom_en();

		if ( $is_toolbar_custom_en ) {
			$currentUrl = $_SERVER['REQUEST_URI'];
			$url_parts  = parse_url( $currentUrl );
			// if PRO or is post, page or product
			$add_create_new_item = true;
			if ( ! DP_INTRO_TOURS_IS_PRO ) {
				$add_create_new_item = in_array( get_post_type(), [ 'page', 'post', 'product' ], true );
			}

			$tour_to_inc = array_filter(
				$this->tours_to_inc,
				function ( $tour ) {
					return ! Arr::get( $tour, 'not_in_admin_bar', false );
				}
			);

			if ( count( $tour_to_inc ) || $add_create_new_item ) {
				$plugin_ico        = Dp_Intro_Tours_Helper::get_plugin_ico_svg();
				$query_params_defs = Dp_Intro_Tours_Helper::get_dp_intro_query_params();

				$params = [];
				$params[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_builder_mode', $query_params_defs ) ]      = Dpit_Builder_Target_Type::STEP;
				$params[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_builder_origin', $query_params_defs ) ]    = Dpit_Builder_Origin::FRONTEND;
				$params[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qp_run_always_on_load', $query_params_defs ) ] = '1';
				// Add a new node to the Toolbar
				// The link points to the pending posts admin page
				$wp_admin_bar->add_node(
					[
						'id'    => 'editor-menu',
						'title' => $this->get_admin_bar_title( __( 'Tours' ), $plugin_ico ),
						'href'  => get_dashboard_url( get_current_user_id(), 'edit.php?post_type=dp_intro_tours' ),
						'meta'  => [
							'class' => 'dpit-ab-li dpit-ab-li--main',
						],
					]
				);

				// Add group of links
				$wp_admin_bar->add_group(
					[
						'parent' => 'editor-menu',
						'id'     => 'tour-list',
					]
				);

				// Create new tour

				if ( $add_create_new_item ) {
					$paramsNew = $params;
					$paramsNew[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_create_new', $query_params_defs ) ] = '1';
					$new_query    = Path::add_params_to_url_query( Arr::sget( $url_parts, 'query' ), $paramsNew );
					$createNewUrl = $url_parts['path'] . '?' . $new_query;
					$wp_admin_bar->add_node(
						[
							'parent' => 'tour-list',
							'id'     => 'create-new-tour',
							'title'  => $this->get_admin_bar_title(
								__( 'Create a new one here', 'dp-intro-tours' ),
								'',
								'dashicons dashicons-plus',
								__( 'Create a new tour starting at current page', 'dp-intro-tours' )
							),
							'href'   => $createNewUrl,
							'meta'   => [ 'class' => 'dpit-ab-li dpit-ab-li--global' ],
						]
					);
				}

				$global_options_path = Dp_Intro_Tours_Helper::get_plugin_settings_page_url();

				$wp_admin_bar->add_node(
					[
						'parent' => 'tour-list',
						'id'     => 'dp-global-options',
						'title'  => __( 'Global Options', 'dp-intro-tours' ),
						'title'  => $this->get_admin_bar_title(
							__( 'Global Options', 'dp-intro-tours' ),
							'',
							'dashicons dashicons-admin-generic',
							__( 'Global options of ', 'dp-intro-tours' ) . DP_INTRO_TOURS_NAME
						),
						'href'   => $global_options_path,
						'meta'   => [
							'class' => 'dpit-ab-li dpit-ab-li--global',
						],
					]
				);

				$wp_admin_bar->add_node(
					[
						'parent' => 'dp-global-options',
						'id'     => 'dp-general-options',
						'title'  => $this->get_admin_bar_title(
							__( 'General', 'dp-intro-tours' ),
							'',
							'dashicons dashicons-admin-settings'
						),
						'href'   => $global_options_path,
					]
				);

				$wp_admin_bar = $this->filter_wp_admin_bar( $wp_admin_bar );

				// adjust in new menu
				if ( $add_create_new_item ) {
					$new_post_node       = $wp_admin_bar->get_node( 'new-dp_intro_tours' );
					$new_post_node->href = $createNewUrl;
					$wp_admin_bar->add_node( $new_post_node );
				} else {
					$wp_admin_bar->remove_node( 'new-dp_intro_tours' );
				}

				if ( count( $tour_to_inc ) ) {

					foreach ( array_keys( $tour_to_inc )  as $tourId ) {
						$tour         = get_post( $tourId );
						$is_active    = $tour->post_status === 'publish' && Acf::get_field( 'intro_enabled', $tourId, true, false );
						$status_label = '';
						$status_title = __( 'Active Tour', 'dp-intro-tours' );
						if ( ! $is_active ) {
							$status_label = $tour->post_status !== 'publish' ? $tour->post_status : __( 'Inactive', 'dp-intro-tours' );
							$status_title = ucfirst( $status_label ) . ' ' . __( 'Tour', 'dp-intro-tours' );
						}
						$status_title .= ': ' . $tour->post_title;
						if ( $tour ) {
							$tour_status = $status_label ? '<span class="dpit-ab-li__status"> - ' . $status_label . '</span>' : '';
							$params[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qp_tour_id', $query_params_defs ) ] = $tourId;
							$this->add_tour_sub_menu_to_admin_bar(
								$wp_admin_bar,
								'tour-list',
								$tourId,
								$this->get_admin_bar_title(
									$tour->post_title . $tour_status,
									'',
									'dashicons dashicons-edit',
									$status_title
								),
								$this->trigger_cfg[ $tourId ],
								$params,
								$url_parts,
								Str::classes(
									[
										'dpit-ab-li'       => true,
										'dpit-ab-li--tour' => true,
										'dpit-ab-li--not-active' => ! $is_active,
									]
								)
							);
							$this->add_tour_sub_menu_to_admin_bar(
								$wp_admin_bar,
								'edit',
								$tourId,
								$this->get_admin_bar_title(
									$tour->post_title . $tour_status,
									$plugin_ico,
									'',
									$status_title
								),
								$this->trigger_cfg[ $tourId ],
								$params,
								$url_parts,
								Str::classes(
									[
										'dpit-ab-li' => true,
										'dpit-ab-li--not-active' => ! $is_active,
									]
								)
							);
						}
					}
				}
			} else {
				$wp_admin_bar->remove_node( 'new-dp_intro_tours' );
			}
		}
	}

	protected function filter_wp_admin_bar( $wp_admin_bar ) {
		$site_url = get_site_url();
		$wp_admin_bar->add_node(
			[
				'parent' => 'dp-global-options',
				'id'     => 'dp-labeling-options',
				'title'  => $this->get_admin_bar_title(
					__( 'Labeling', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-tag'
				),
				'href'   => Dp_Intro_Tours_Helper::get_plugin_settings_page_url( 'labeling', $site_url ),
			]
		);
		$wp_admin_bar->add_node(
			[
				'parent' => 'dp-global-options',
				'id'     => 'dp-text-styles-options',
				'title'  => $this->get_admin_bar_title(
					__( 'Text Styles', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-editor-textcolor'
				),
				'href'   => Dp_Intro_Tours_Helper::get_plugin_settings_page_url( 'text_styles', $site_url ),
			]
		);
		$wp_admin_bar->add_node(
			[
				'parent' => 'dp-global-options',
				'id'     => 'dp-mobile-break-points',
				'title'  => $this->get_admin_bar_title(
					__( 'Mobile break point', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-laptop'
				),
				'href'   => Dp_Intro_Tours_Helper::get_plugin_settings_page_url( 'mobile_breakpoints', $site_url ),
			]
		);
		return $wp_admin_bar;
	}

	protected function add_tour_sub_menu_to_admin_bar( $wp_admin_bar, $parent_menu_item_id, $tour_id, $title, $triggersConfig, $url_params, $url_parts, $li_class = 'dpit-ab-li--tour', $sub_li_class = 'dpit-ab-li--action' ) {
		$query_params_defs                    = Dp_Intro_Tours_Helper::get_dp_intro_query_params();
		$origin_url_param_key                 = Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_origin_el_id', $query_params_defs );
		$dp_qpb_canceled                      = Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_canceled', $query_params_defs );
		$paramsSteps                          = $url_params;
		$urlPartsSteps                        = $url_parts;
		$paramsSteps[ $origin_url_param_key ] = 'dpit-step-table';
		$paramsSteps                          = $this->adjust_builder_url_params( $paramsSteps, $urlPartsSteps['path'], $tour_id );
		$urlPartsSteps['query']               = Path::add_params_to_url_query( Arr::sget( $urlPartsSteps, 'query' ), $paramsSteps );
		$editStepsUrl                         = $urlPartsSteps['path'] . '?' . Arr::sget( $urlPartsSteps, 'query' );

		// Add a new link for each post type
		$wp_admin_bar->add_node(
			[
				'parent' => $parent_menu_item_id,
				'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id,
				'title'  => $title,
				'href'   => $editStepsUrl,
				'meta'   => [
					'class' => $li_class,
				],
			]
		);

		$wp_admin_bar->add_node(
			[
				'parent' => $parent_menu_item_id . '-edit-tour-' . $tour_id,
				'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id . '-design-behave-admin',
				'title'  => $this->get_admin_bar_title(
					__( 'Activation | Design | Properties', 'dp-intro-tours' ) . ' - ' . __( 'Tour options', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-admin-settings'
				),
				'href'   => Path::combine_url( get_site_url(), "wp-admin/post.php?post={$tour_id}&action=edit&{$origin_url_param_key}=title&{$dp_qpb_canceled}=1" ),
				'meta'   => [
					'class' => $sub_li_class,
				],
			]
		);

		$wp_admin_bar->add_node(
			[
				'parent' => $parent_menu_item_id . '-edit-tour-' . $tour_id,
				'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id . '-steps-frontend',
				'title'  => $this->get_admin_bar_title(
					__( 'Steps', 'dp-intro-tours' ) . ' - ' . __( 'Visual builder', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-admin-comments'
				),
				'href'   => $editStepsUrl,
				'meta'   => [
					'class' => $sub_li_class,
				],
			]
		);

		$wp_admin_bar->add_node(
			[
				'parent' => $parent_menu_item_id . '-edit-tour-' . $tour_id,
				'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id . '-steps-admin',
				'title'  => $this->get_admin_bar_title(
					__( 'Steps table', 'dp-intro-tours' ) . ' - ' . __( 'Tour options', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-editor-table'
				),
				'href'   => Path::combine_url( get_site_url(), "wp-admin/post.php?post={$tour_id}&action=edit&{$origin_url_param_key}=dpit-step-table&{$dp_qpb_canceled}=1" ),
				'meta'   => [
					'class' => $sub_li_class,
				],
			]
		);

		$count_trigger_cfg = count( $triggersConfig );
		for ( $i = 0; $i < $count_trigger_cfg; $i++ ) {

			if ( $triggersConfig[ $i ]['selector'] !== 'window' ) {
				$paramsTrigger   = $url_params;
				$urlPartsTrigger = $url_parts;
				$paramsTrigger[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_builder_mode', $query_params_defs ) ] = Dpit_Builder_Target_Type::TRIGGER;
				$paramsTrigger[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_origin_el_id', $query_params_defs ) ] = "dp-select-trigger_{$i}_input";
				$paramsTrigger[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qp_trigger_id', $query_params_defs ) ]    = $i;
				$urlPartsTrigger['query'] = Path::add_params_to_url_query( Arr::sget( $urlPartsTrigger, 'query' ), $paramsTrigger );
				$editTriggerUrl           = Dp_Intro_Tours_Helper::get_tour_start_page_url( $tour_id ) . '?' . Arr::sget( $urlPartsTrigger, 'query' );

				$wp_admin_bar->add_node(
					[
						'parent' => $parent_menu_item_id . '-edit-tour-' . $tour_id,
						'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id . '-trigger-target-' . $i,
						'title'  => $this->get_admin_bar_title(
							__( 'Trigger', 'dp-intro-tours' ) . ' ' . ( $i + 1 ) . ' ' . __( 'Target', 'dp-intro-tours' ) . ' - ' . __( 'Visual builder', 'dp-intro-tours' ),
							'',
							'dashicons dashicons-controls-play'
						),
						'href'   => $editTriggerUrl,
						'meta'   => [
							'class' => $sub_li_class,
						],
					]
				);
			}
		}

		$wp_admin_bar->add_node(
			[
				'parent' => $parent_menu_item_id . '-edit-tour-' . $tour_id,
				'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id . '-trigger-admin',
				'title'  => $this->get_admin_bar_title(
					__( 'Trigger', 'dp-intro-tours' ) . ' - ' . __( 'Tour options', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-controls-play'
				),
				'href'   => Path::combine_url(
					get_site_url(),
					'wp-admin/post.php' . Dp_Intro_Tours_Helper::build_dp_query_string(
						[ 'dp_qpb_origin_el_id' => 'dpit-trigger-group-0' ],
						$query_params_defs,
						'?',
						[
							'post'   => $tour_id,
							'action' => 'edit',
						]
					)
				),
				'meta'   => [
					'class' => $sub_li_class,
				],
			]
		);

		$wp_admin_bar->add_node(
			[
				'parent' => $parent_menu_item_id . '-edit-tour-' . $tour_id,
				'id'     => $parent_menu_item_id . '-edit-tour-' . $tour_id . '-labeling-admin',
				'title'  => $this->get_admin_bar_title(
					__( 'Labeling', 'dp-intro-tours' ) . ' - ' . __( 'Tour options', 'dp-intro-tours' ),
					'',
					'dashicons dashicons-tag'
				),
				'href'   => Path::combine_url( get_site_url(), "wp-admin/post.php?post={$tour_id}&action=edit&{$origin_url_param_key}=dpit-admin-tour-edit-labeling&{$dp_qpb_canceled}=0" ),
				'meta'   => [
					'class' => $sub_li_class,
				],
			]
		);
	}

	protected function adjust_builder_url_params( $params, $url_path, $tour_id ) {
		( $url_path );
		( $tour_id );
		return $params;
	}

	protected function load_scripts_in_active_tour_pages() {
		$query_params_defs   = Dp_Intro_Tours_Helper::get_dp_intro_query_params();
		$tour_id_query_param = Dp_Intro_Tours_Helper::get_dp_url_param_int( 'dp_qp_tour_id', null, $query_params_defs );
		$user_can_edit_posts = current_user_can( 'edit_posts' );

		$is_wp_admin_bar = $user_can_edit_posts && is_admin_bar_showing();

		$tours_to_inc = [];
		$args         = [
			'post_type'      => 'dp_intro_tours',
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => '-1',
			'post_status'    => $is_wp_admin_bar ? [ 'publish', 'pending', 'draft' ] : 'publish',
		];

		// server performance optimization
		if ( $tour_id_query_param ) {
			$args['p'] = $tour_id_query_param;
		}
		if ( ! $user_can_edit_posts ) {
			$this->builder_mode = null;
		}
		if ( ! $is_wp_admin_bar ) {
			$args['meta_key']   = 'intro_enabled';
			$args['meta_value'] = '1';
		}

		$current_url              = Dp_Intro_Tours_Helper::get_current_url();
		$relatedPostsUrls         = [];
		$start_at_all_pages_tours = [];
		$tour_posts               = get_posts( $args );
		if ( $tour_posts && count( $tour_posts ) ) {
			foreach ( $tour_posts as $tour_post ) {
				$id = $tour_post->ID;
				if ( Dp_Intro_Tours_Helper::is_tour_started_at_all_pages_with_admin_feature( $id ) ) {
					$start_at_all_pages_tours[] = $id;
					$relatedPostsUrls[ $id ]    = [ Dp_Intro_Tours_Helper::unify_url( $current_url, ! Dp_Intro_Tours_Helper::is_url_comp_strict( $id ) ) ];
				} else {
					$steps_url = Dp_Intro_Tours_Helper::get_steps_url( $id );
					if ( $steps_url && count( $steps_url ) ) {
						$relatedPostsUrls[ $id ] = [];
						foreach ( $steps_url as $value ) {
							$relatedPostsUrls[ $id ][] = $value;
						}
					}
				}
			}
		}

		if ( $current_url ) {
			$step_query_param = Dp_Intro_Tours_Helper::get_dp_url_param_int( 'dp_qp_step', null, $query_params_defs );

			foreach ( $relatedPostsUrls as $tour_id => $related_url_list ) {
				$start_url_cnt   = Dp_Intro_Tours_Helper::get_start_step_count( $tour_id );
				$system_url_vars = Dp_Intro_Tours_Helper::get_all_system_url_vars( $tour_id );

				if ( is_array( $related_url_list ) ) {
					$url_variables = [];
					// server performance optimization
					$steps_to_look_for = null;
					/*if ( DP_INTRO_TOURS_IS_PRO && ! $user_can_edit_posts ) {
						$steps_to_look_for = range( 0, ( $start_url_cnt - 1 ) );

						if ( $step_query_param ) {
							$step_idx_to_look_for = $step_query_param - ( $start_url_cnt - 1 );
							if ( ! in_array( $step_idx_to_look_for, $steps_to_look_for ) ) {
								$steps_to_look_for[] = $step_idx_to_look_for;
							}
						}
					}*/

					$process_url_vars = Acf::get_group_field( 'intro_url_variables', 'url_vars_enabled', $tour_id, false, true );
					$step_idx         = $this->get_stp_idx_of_url(
						$current_url,
						$related_url_list,
						Dp_Intro_Tours_Helper::is_url_comp_strict( $tour_id ),
						$process_url_vars,
						$url_variables,
						$system_url_vars,
						$steps_to_look_for
					);
					if ( $step_idx >= 0 && ! array_key_exists( $tour_id, $tours_to_inc ) ) {

						$start_url_has_variables = false;
						if ( count( $related_url_list ) ) {
							$start_url_has_variables = $this->has_url_variables( $related_url_list[0] );
						}

						$is_start_at_all_pages_tours = in_array( $tour_id, $start_at_all_pages_tours, true );

						$tours_to_inc[ $tour_id ] = [
							'not_in_admin_bar' => $start_url_has_variables && $step_idx !== 0,
							'url_vars'         =>
								( $step_idx < $start_url_cnt || $is_start_at_all_pages_tours )

								&& $step_query_param === null
								&& count( $url_variables ) ? $url_variables : null,
							'force_load'       => $is_start_at_all_pages_tours,
							'add_to_script'    => $step_idx < $start_url_cnt
								|| $is_start_at_all_pages_tours
								|| ( $step_query_param !== null && $tour_id_query_param === $tour_id ),
						];
					}
				}
			}
			$tours_to_unload       = apply_filters( 'dpintro_unload_tours', [], $current_url );
			$tours_force_load      = apply_filters( 'dpintro_force_load_tours', [], $current_url );
			$tours_to_inc_filtered = [];
			foreach ( $tours_force_load as $tour_id ) {
				$tours_to_inc_filtered[ $tour_id ] = [
					'force_load'    => true,
					'add_to_script' => true,
				];
			}
			foreach ( $tours_to_inc as $tour_id => $tour_boot_cfg ) {
				if ( ! in_array( $tour_id, $tours_to_unload ) ) {
					if ( ! array_key_exists( $tour_id, $tours_to_inc_filtered ) ) {
						$tours_to_inc_filtered[ $tour_id ] = $tour_boot_cfg;
					}
				}
			}

			$this->assign_step_data_to_scripts( $tours_to_inc_filtered, $current_url );
		}
	}

	protected function has_url_variables( $url ) {
		( $url ); // unused argument
		return false;
	}

	protected function get_stp_idx_of_url( $url_to_test, $url_list, $strict, bool $process_url_vars, array &$variables, ?array $system_url_vars, ?array $steps_to_look_for ) {
		foreach ( $url_list as $idx => $url ) {
			if ( ! $steps_to_look_for || in_array( $idx, $steps_to_look_for, true ) ) {
				$vars_tmp = [];
				if ( $this->is_step_url_equal( $url_to_test, $url, $strict, $process_url_vars, $vars_tmp, $system_url_vars ) ) {
					$variables = $vars_tmp;
					return $idx;
				}
			}
		}
		return -1;
	}

	protected function process_url_variables( $url1_unified, $step_url_unified, array &$variables, ?array $system_vars ) {
		( $url1_unified ); // unused argument
		( $variables ); // unused argument
		( $system_vars ); // unused argument
		return $step_url_unified;
	}

	protected function is_step_url_equal( $url_to_test, $step_url_unified, $strict, bool $process_url_vars, array &$variables, ?array $system_vars ) {
		$url1_unified = Dp_Intro_Tours_Helper::unify_url( $url_to_test, ! $strict );
		if ( $process_url_vars ) {
			$step_url_unified = $this->process_url_variables( $url1_unified, $step_url_unified, $variables, $system_vars );
		}
		return $url1_unified === $step_url_unified;
	}

	private function post_process_step_data( $step_data, $force_load, $current_url, $tourId ) {
		$keys          = Dp_Intro_Tours_Helper::get_step_definition_ids();
		$new_step_data = [];
		foreach ( $step_data as $step_idx => $step ) {
			$new_step = [];
			foreach ( $step as $prop_key => $prop_val ) {
				if ( in_array( $prop_key, $keys, true ) ) {
					$val = trim( $prop_val );
					switch ( $prop_key ) {
						case 'url':
							if ( $step_idx === 0 ) {
								$current_url_unified = Dp_Intro_Tours_Helper::unify_url( $current_url, ! Dp_Intro_Tours_Helper::is_url_comp_strict( $tourId ), true, true );
								if ( $force_load ) {
									$val = $current_url_unified;
								} else {

									$sub_urls = array_filter( explode( ',', $prop_val ) );
									if ( $sub_urls && in_array( $current_url_unified, $sub_urls, true ) ) {
										$val = $current_url_unified;
									}
								}
							}

							$new_step[ $prop_key ] = rtrim( $val, '/' );
							if ( ! $new_step[ $prop_key ] ) {
								$new_step[ $prop_key ] = '/';
							}
							break;
						case 'intro':
							$processed_content = $this->get_step_processed_content( $prop_val );
							if ( $processed_content ) {
								$new_step['intro_proc'] = $processed_content;
							}
							$new_step[ $prop_key ] = $val;
							break;
						default:
							$new_step[ $prop_key ] = $val;
					}
				}
			}
			$new_step_data[] = $new_step;
		}
		return $new_step_data;
	}

	protected function get_step_processed_content( $content ) {
		( $content );// unused argument
		return null;
	}

	public function make_url_absolute( $val, $siteUrl ) {
		if ( Str::starts_with( $val, '/' ) ) {
			return Path::combine_url( $siteUrl, $val );
		}
		return $val;
	}

	protected function get_triggers_configs( $tourId ) {
		return [ 0 => $this->get_trigger_config( $tourId, 'intro_trigger' ) ];
	}

	protected function get_trigger_config( $id, $triggerId ) {
		$trigger               = Acf::get_field( $triggerId, $id, true );
		$trigger_mode          = Arr::get( $trigger, 'trigger_mode', 'pageLoad' );
		$selector_type         = 'page';
		$once_per_session_only = false;
		switch ( $trigger_mode ) {
			case 'pageLoad':
				$selector_type = 'page';
				break;
			case 'button':
				$selector_type = 'custom_selector';

				break;
			case 'elementInView':
				$selector_type         = 'custom_selector';
				$once_per_session_only = true;
				break;
			case 'advanced':
				$selector_type         = Arr::get( $trigger, 'trigger_object', 'page' );
				$once_per_session_only = Arr::get( $trigger, 'once_per_session_only', false );

				break;
		}

		$res = [
			'first_user_visit_only'          => Arr::get( $trigger, 'first_user_visit_only', false ),
			'first_n_user_visit'             => Arr::get( $trigger, 'first_n_user_visit', 1 ),
			'once_per_session_only'          => $once_per_session_only,
			'allow_just_for_logged_in_users' => Arr::get( $trigger, 'allow_just_for_logged_in_users', false ),
			'disable_for_roles'              => Arr::get( $trigger, 'disable_for_roles', false ),
			'in_view_port_offset'            => Arr::get( $trigger, 'in_view_port_offset' ) . Arr::get( $trigger, 'in_view_port_offset_unit' ),
			/* PRO */
			'lock_by_url_parameter'          => false,
			'global_start_at_all_pages'      => false,
		];

		switch ( $selector_type ) {
			case 'page':
				$res = array_merge(
					$res,
					[
						'selector' => 'window',
						'on'       => Dp_Intro_Tours_Helper::get_acf_select_val_safe( Arr::get( $trigger, 'intro_trigger_event_window' ) ),
					]
				);
				break;
			case 'custom_selector':
				$selector = Arr::get( $trigger, 'intro_trigger_selector' );

				if ( $trigger_mode === 'elementInView' ) {
					$event = 'inviewport';
				} else {
					$event = Dp_Intro_Tours_Helper::get_acf_select_val_safe( Arr::get( $trigger, 'intro_trigger_event' ) );
				}
				$res = array_merge(
					$res,
					[
						'selector'             => $selector,
						'on'                   => $event,
						'specific_key_pressed' => Arr::get( $trigger, 'specific_key_pressed' ),
					]
				);
				break;
		}
		return $this->filter_trigger_config( $res, $trigger, $id );
	}

	protected function filter_trigger_config( $trigger_config, $trigger_raw_options, $id ) {
		( $trigger_raw_options ); // unused argument
		( $id ); // unused argument
		return $trigger_config;
	}

	protected function enqueue_main_public_script() {

		return Dp_Intro_Tours_Enqueue::enqueue_js(
			'main',
			$this->builder_mode ? 'dpit-builder' : 'dpit-public',
			[
				'in_footer' => true,
				'js_dep'    => [ 'jquery' ],
			]
		);
	}

	private function try_add_new_tour( $startPageTitle ) {
		$query_params_defs = Dp_Intro_Tours_Helper::get_dp_intro_query_params();
		if ( Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qpb_create_new', null, $query_params_defs ) === '1' ) {
			$tourName = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qpb_tour_name', null, $query_params_defs );
			if ( ! $tourName ) {
				$tourName = Dp_Intro_Tours_Helper::get_default_name_for_new_tour( $startPageTitle );
			}

			$slug    = sanitize_title( $tourName );
			$tour_id = wp_insert_post(
				[
					'post_author' => get_current_user_id(),
					'post_title'  => $tourName,
					'post_name'   => $slug,
					'post_status' => 'publish',
					'post_type'   => 'dp_intro_tours',
				]
			);
			if ( $tour_id ) {
				Dp_Intro_Tours_Helper::store_plugin_version( $tour_id );
				Dp_Intro_Tours_Helper::set_steps_url( $tour_id, [ WpStd::get_current_url() ] );
				if ( ! DP_INTRO_TOURS_IS_PRO ) {
					$first_step_id = WpStd::get_post_ID_from_SERVER_REQ_URL( [ 'page', 'post', 'product' ] );
					if ( $first_step_id ) {
						Acf::update_group_field( 'intro_trigger', 'intro_related_posts', [ $first_step_id ], $tour_id );
					}
				}
				wp_update_post( get_post( $tour_id ) );
			}
			return $tour_id;
		}
	}

	protected function try_load_add_new_tour_script( $current_post_id, $tours_to_inc ) {
		if ( is_admin() ) {
			$start_page_title = 'Admin Board';
		} else {
			$start_page_title = get_the_title( $current_post_id );
		}

		$new_id = $this->try_add_new_tour( $start_page_title );
		if ( $new_id ) {
			if ( ! $tours_to_inc ) {
				$tours_to_inc = [];
			}
			$tours_to_inc[ $new_id ] = [
				'force_load'    => true,
				'add_to_script' => true,
			];
		}
		$is_toolbar_custom_en = $this->is_toolbar_custom_en();
		if ( $is_toolbar_custom_en ) {
			$admin_colors_cfg = ( $this->builder_mode || is_admin() )
				? null
				: Dp_Intro_Tours_Helper::get_admin_theme_colors_cfg();
			// Add new tour from admin bar
			Dp_Intro_Tours_Enqueue::enqueue_css( 'main', 'dpit-admin-bar-style', [], Dp_Intro_Tours_Helper::get_dynamic_css() );

			Dp_Intro_Tours_Enqueue::enqueue_js(
				'main',
				'dpit-admin-bar',
				[
					'in_footer' => true,
					'js_dep'    => [ 'jquery' ],
				],
				'dpIntroTourCreateNewConfig',
				[
					'dpDebugEn'          => Dp_Intro_Tours_Helper::is_debug_console_en(),
					'defaultTourName'    => Dp_Intro_Tours_Helper::get_default_name_for_new_tour( $start_page_title ),
					'tourNameQParamName' => Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qpb_tour_name' ),
					'i18n'               => [
						'setNewTourNamePrompt' => __( 'Please set a name for new tour', 'dp-intro-tours' ),
					],
					'adminColors'        => $admin_colors_cfg,
				]
			);
		}

		return [
			'tours_to_inc' => $tours_to_inc,
			'new_id'       => $new_id,
		];
	}

	protected function get_mixed_global_and_tour_cfg( $tour_id, $global_settings, $per_tour_settings ) {
		$res = [];
		if ( is_string( $global_settings ) ) {
			$global = get_option( $global_settings, [] );
		} elseif ( is_array( $global_settings ) ) {
			$global = $global_settings;
		}
		if ( is_string( $per_tour_settings ) ) {
			$per_tour = Acf::get_field( $per_tour_settings, $tour_id, true, [] );
		} elseif ( is_array( $per_tour_settings ) ) {
			$per_tour = $per_tour_settings;
		}
		if ( $global && $per_tour ) {
			foreach ( $global as $name => $value ) {
				$per_tour_val = Arr::sget( $per_tour, $name );
				if ( is_array( $per_tour_val ) && count( $per_tour_val ) ) {
					$per_tour_val = $per_tour_val[0];
				}
				if ( $per_tour_val && $per_tour_val !== 'default' ) {
					$res[ $name ] = $per_tour_val;
				} else {
					$res[ $name ] = $value;
				}
			}
		}
		return $res;
	}

	protected function get_tour_behavior_cfg( $tourId, $behavior_cfg ) {
		$bullet_anim_size          = Arr::get( $behavior_cfg, 'bullet_anim_size' );
		$bullet_anim_border_radius = Arr::get( $behavior_cfg, 'bullet_anim_border_radius' );
		$scroll_speed              = Arr::get( $behavior_cfg, 'scroll_speed' );
		$loading_delay             = Arr::get( $behavior_cfg, 'loading_delay' );

		$bullet_anim_size = Arr::get( $behavior_cfg, 'bullet_anim_size' );
		return [
			'exitOnOverlayClick'            => $this->builder_mode ? false : ! Arr::get( $behavior_cfg, 'disable_exit_on_backdrop_click', false ),
			'disableStartAnimation'         => $this->builder_mode ? false : Arr::get( $behavior_cfg, 'disable_starting_animation', false ),
			'bulletAnimSize'                => is_numeric( $bullet_anim_size ) ? intval( $bullet_anim_size ) : 30,
			'bulletAnimBorderRadius'        => is_numeric( $bullet_anim_border_radius ) ? intval( $bullet_anim_border_radius ) : 50,
			'scrollSpeed'                   => is_numeric( $scroll_speed ) ? intval( $scroll_speed ) : 30,
			'max_tooltip_width'             => intval( Arr::get( $behavior_cfg, 'max_tooltip_width', '' ) ),
			'loading_delay'                 => is_numeric( $loading_delay ) ? intval( $loading_delay ) : 0,
			//'skip_absent_ref_el'            => $this->builder_mode ? false : ( Acf::get_group_field( 'dp_tour_behaviour', 'skip_absent_ref_el', $tourId, false, true ) ),
			'skip_absent_ref_el'            => Acf::get_group_field( 'dp_tour_behaviour', 'skip_absent_ref_el', $tourId, false, true ),
			'hide_previous_step_button'     => Arr::get( $behavior_cfg, 'hide_previous_step_button', false ),
			'hide_skip_button'              => Arr::get( $behavior_cfg, 'hide_skip_button', false ),
			'disable_navigation_by_bullets' => Arr::get( $behavior_cfg, 'disable_navigation_by_bullets', false ),
			'show_bullet_navigation'        => Arr::get( $behavior_cfg, 'show_bullet_navigation', true ),
			'show_progress_bar'             => Arr::get( $behavior_cfg, 'show_progress_bar', false ),
			'show_step_numbers'             => Arr::get( $behavior_cfg, 'show_step_numbers', true ),
		];
	}

	protected function assign_step_data_to_scripts( $tours_to_inc, $current_url ) {
		Dp_Intro_Tours_Helper::dpit_console_log(
			[
				'toursToInc'  => $tours_to_inc,
				'builderMode' => $this->builder_mode,
			],
			'[dpit] INIT Server tour loading'
		);

		$current_post_id   = WpStd::get_post_ID_from_SERVER_REQ_URL( null, get_the_id() );
		$add_new_res       = $this->try_load_add_new_tour_script( $current_post_id, $tours_to_inc );
		$tours_to_inc      = $add_new_res['tours_to_inc'];
		$query_params_defs = Dp_Intro_Tours_Helper::get_dp_intro_query_params();

		if ( $tours_to_inc && count( $tours_to_inc ) ) {
			$this->tours_to_inc = $tours_to_inc;
			$shouldLoadScripts  = false;
			$options            = get_option( 'dp_it_general_options', [] );

			$use_custom_text_styles = ! Settings::get_setting_array_bool( 'dp_it_general_options', 'inherit_all_styles', false );
			$text_style_options     = Dp_Intro_Tours_Helper::get_text_style_options();

			$dynamic_css_data = Dp_Intro_Tours_Helper::get_text_style_options_inline_css();

			$toursCfg             = [];
			$intro_themes_to_load = [];

			$labeling_options = Dp_Intro_Tours_Helper::get_options_array(
				'dp_it_labeling_options',
				[
					'nextLabel' => __( 'Next', 'dp-intro-tours' ),
					'prevLabel' => __( 'Back', 'dp-intro-tours' ),
					'skipLabel' => __( 'Cancel', 'dp-intro-tours' ),
					'doneLabel' => __( 'Done', 'dp-intro-tours' ),
				]
			);

			foreach ( $tours_to_inc as $tour_id => $tour_boot_cfg ) {
				$status                        = get_post_status( $tour_id );
				$tour_enabled                  = Acf::get_field( 'intro_enabled', $tour_id, true );
				$shouldLoadScript              = $this->builder_mode || ( $status === 'publish' && $tour_enabled && Arr::get( $tour_boot_cfg, 'add_to_script', false ) );
				$this->trigger_cfg[ $tour_id ] = $this->get_triggers_configs( $tour_id );
				if ( $shouldLoadScript || DP_INTRO_TOURS_IS_PRO ) {
					$step_data = Acf::get_table_field_as_assoc_array_of_columns( 'intro_steps', $tour_id, true ) ?? [];
					if ( isset( $step_data ) ) {
						$force_load = false;
						if ( Dp_Intro_Tours_Helper::get_dp_url_param_int( 'dp_qp_step', 0, $query_params_defs ) === 0 && ! $this->builder_mode ) {
							$force_load = Arr::get( $tour_boot_cfg, 'force_load', false );// || Dp_Intro_Tours_Helper::is_tour_started_at_all_pages_with_admin_feature( $tour_id );
						}
						$this->step_data[ $tour_id ] = $this->post_process_step_data( $step_data, $force_load, $current_url, $tour_id );

						if ( $shouldLoadScript ) {
							$shouldLoadScripts = true;

							// button font override by tour
							$button_font_tour_cfg = Acf::get_group_field( 'intro_design', 'custom_font', $tour_id, '' );
							$button_font_final    = null;
							$text_styles_ts       = [];
							if ( $button_font_tour_cfg ) {
								$button_font_final = $button_font_tour_cfg;
							} elseif ( ! $use_custom_text_styles ) {
								$button_font_final = 'inherit';
							}
							if ( $button_font_final ) {
								$text_styles_ts = [ 'btn_font' => $button_font_final ];
							}
							// theme and accent overrides
							$theme             = null;
							$theme_override    = null;
							$do_not_load_theme = Acf::get_group_field_bool( 'intro_design', 'do_not_load_theme', $tour_id );
							if ( ! $do_not_load_theme ) {
								$theme          = Dp_Intro_Tours_Helper::fix_global_theme_option( Arr::sget( $options, 'theme' ) );
								$theme_override = Dp_Intro_Tours_Helper::get_acf_select_val_safe( Acf::get_group_field( 'intro_design', 'theme', $tour_id, 'default', true ) );
								if ( $theme_override && $theme_override !== 'default' ) {
									$theme = $theme_override;
								}
							}

							$accent_color = Dp_Intro_Tours_Helper::get_accent_color( $tour_id, $options );

							$tourCfg = $this->filter_tour_script_config(
								[
									'tourName'         => get_the_title( $tour_id ),
									'createNew'        => $add_new_res['new_id'] === $tour_id,
									'tourId'           => $tour_id,
									'theme'            => $theme,
									'triggers'         => $this->trigger_cfg[ $tour_id ],
									'steps'            => json_encode( $this->step_data[ $tour_id ] ),
									'labeling'         => $this->get_mixed_global_and_tour_cfg( $tour_id, $labeling_options, 'intro_labeling' ),
									'properties'       => $this->get_tour_behavior_cfg( $tour_id, Acf::get_field( 'dp_tour_behaviour', $tour_id, true ) ),
									'accentColor'      => $accent_color,
									'text_styles'      => $text_styles_ts,
									'tooltip_radius'   => Acf::get_group_field( 'intro_design', 'tooltip_radius', $tour_id, -1, true ),
									'button_radius'    => Acf::get_group_field( 'intro_design', 'button_radius', $tour_id, -1, true ),
									'highlight_radius' => Acf::get_group_field( 'intro_design', 'highlight_radius', $tour_id, -1, true ),
								],
								$tour_id,
								$tour_boot_cfg
							);
							if ( $this->builder_mode ) {
								$tourCfg['intro_enabled'] = $tour_enabled;
							} else {
								$tourCfg = apply_filters( 'dpintro_script_tour_config', $tourCfg, $tour_id, $current_url );
							}

							$toursCfg[]             = $tourCfg;
							$intro_themes_to_load[] = $theme;
						}
					}
				}
			}

			if ( $shouldLoadScripts ) {
				$user               = wp_get_current_user();
				$current_user_id    = 0;
				$current_user_roles = [];
				if ( $user ) {
					$current_user_id    = $user->ID;
					$current_user_roles = (array) $user->roles;
				}

				$logged_in_visit_cnt = 0;
				if ( ! $this->builder_mode && $current_user_id ) {
					if ( Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qp_step', null, $query_params_defs ) === null ) {
						$logged_in_visit_cnt = Dp_Intro_Tours_Visit_Count::process_visit( $current_user_id );
					} else {
						$logged_in_visit_cnt = Dp_Intro_Tours_Visit_Count::get_visit_count( $current_user_id );
					}
				}
				$assets      = $this->enqueue_main_public_script();
				$entry_point = array_pop( $assets['js'] );
				$this->enqueue_styles( array_unique( $intro_themes_to_load ), false, $dynamic_css_data ); // load styles just when needed
					// main global config
					//'assetsUrl'        => plugin_dir_url( __FILE__ ) . 'assets',
				$config = [
					'siteUrl'             => get_site_url(),
					'dpDebugEn'           => Dp_Intro_Tours_Helper::is_debug_console_en(),
					'isMultiSite'         => is_multisite(),
					'isAdmin'             => is_admin(),
					'zIndexBase'          => Arr::sget( $options, 'z_index_base' ),
					'i18n'                => $this->get_public_script_translations(),
					'currentPostId'       => $current_post_id,
					'text_styles'         => $text_style_options,
					'tours'               => $toursCfg,
					'currentUserId'       => $current_user_id,
					'currentUserRoles'    => $current_user_roles,
					'loggedInVisitCnt'    => $logged_in_visit_cnt,
					'mobile_break_points' => Dp_Intro_Tours_Helper::get_breakpoint_options(),
					'stepDefinitions'     => Dp_Intro_Tours_Helper::get_step_definitions( '', ! $this->builder_mode ),
				];
				if ( $this->builder_mode ) {
					$builder_config         = $this->get_builder_config( $tour_id );
					$builder_config['i18n'] = array_merge( $config['i18n'], $builder_config['i18n'] );
					$config                 = array_merge( $config, $builder_config );
					if ( $this->builder_mode === Dpit_Builder_Target_Type::STEP ) {
						wp_enqueue_media();

					}
				}
				$config = $this->filter_main_script_config( $config );
				if ( ! $this->builder_mode ) {
					$config = apply_filters( 'dpintro_script_main_config', $config, $current_url );
				}
				wp_localize_script( $entry_point['handle'], 'dpIntroTourPublicConfig', $config );
			}
		}
	}

	protected function get_public_script_translations() {
		return [
			'aria-main'     => __( 'Guided intro tour', 'dp-intro-tours' ),
			'step'          => __( 'Step', 'dp-intro-tours' ),
			'end-a-tour-q'  => __( 'Are you sure to end a tour?', 'dp-intro-tours' ),
			'aria-step-num' => __( 'tour step number', 'dp-intro-tours' ),
		];
	}

	protected function filter_main_script_config( $config ) {
		if ( ! $this->builder_mode ) {
			$config['queryParamsDefs'] = Dp_Intro_Tours_Helper::get_dp_intro_query_params_free_public_no_builder();
		}
		return $config;
	}

	protected function get_builder_config( $tour_id = 0 ) {
		( $tour_id ); // unused argument
		$select_position_options = [];
		foreach ( Dp_Intro_Tours_Helper::get_position_select_options() as $key => $value ) {
			$select_position_options[] = [
				'value' => $key,
				'label' => $value,
			];
		}

		$select_highlight_options = [];
		foreach ( Dp_Intro_Tours_Helper::get_highlight_select_options() as $key => $value ) {
			$select_highlight_options[] = [
				'value' => $key,
				'label' => $value,
			];
		}

		$is_right_time_4_ask_4_rating = false;
		$activated_days               = 0;
		$a4r_notice_id                = DP_INTRO_TOURS_PREFIX . '-a4r-notice';
		if ( ! DP_INTRO_TOURS_IS_PRO ) {
			$activated_days               = AdminPromo::get_activated_days( 'dp_it_basic_options' );
			$is_right_time_4_ask_4_rating = DPIT_PROMO_DBG || ( DPIT_ASR_ENABLED && AdminPromo::is_right_time_for_ask_4_rating( 8, $a4r_notice_id, 'dp_it_basic_options' ) );
		}
		return [
			'restApiUrl'             => get_rest_url(),
			'proFeaturesLink'        => DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO,
			'freeRatingLink'         => DP_INTRO_TOURS_PRODUCT_ASK_FOR_RATING_LINK_FREE,
			'ask4ratingText'         => $is_right_time_4_ask_4_rating ? AdminNotice::get_ask_for_rating_text( floor( $activated_days / 7 ), DP_INTRO_TOURS_NAME ) : '',
			'isRightTime4ask4Rating' => $is_right_time_4_ask_4_rating,
			'ratingFeedbackLink'     => DP_INTRO_TOURS_PRODUCT_RATING_FEEDBACK_LINK_FREE,
			'promoDebug'             => DPIT_PROMO_DBG,
			'asrEnabled'             => DPIT_ASR_ENABLED,
			'a4rCookieName'          => $a4r_notice_id,
			'isAdmin'                => is_admin(),
			'settingsPath'           => Dp_Intro_Tours_Helper::get_plugin_settings_page_path( 'mobile_menu' ),
			'queryParamsDefs'        => Dp_Intro_Tours_Helper::get_dp_intro_query_params(),
			'i18n'                   => [
				'allow_popup_to_set_mob'           => Dp_Intro_Tours_Helper::get_generic_i18n( 'allow_popup_to_set_mob' ),
				'redirecting_ext_q'                => __( 'Redirecting to extraneous URL ?', 'dp-intro-tours' ),
				'ext_url_current_step'             => __( 'The current step (or previous with $KEEP PREV. STEP URL) is set as a extraneous URL.', 'dp-intro-tours' ),
				'ext_url_current_just_set'         => __( 'You\'ve set extraneous URL.', 'dp-intro-tours' ),
				// translators: %s: Allow redirect to extraneous web option
				'ext_url_not_redirect'             => sprintf( __( 'You won\'t be redirected there in builder mode, but it is stored, and if %s is set in the tour options, your visitors will be redirected there. In this case, it should be the last step, because the tour of this site will end after such a redirect.', 'dp-intro-tours' ), '<strong>' . Dp_Intro_Tours_Helper::get_generic_i18n( 'allow_redirect_to_ext' ) . '</strong>' ),
				'tour_not_active_prompt'           => __( 'The tour is not yet activated for the public. Do you want to be redirected to a configuration where you can activate it?', 'dp-intro-tours' ),
				'unsaved_changes_prompt'           => Dp_Intro_Tours_Helper::get_generic_i18n( 'unsaved_changes_prompt' ),
				'new_unsaved_tour_prompt'          => __( 'No steps have been saved. By confirming, this newly created tour will be deleted.', 'dp-intro-tours' ),
				'tour_removing_notice'             => __( 'This tour is being removed', 'dp-intro-tours' ),
				'tour_ending_in_builder'           => __( 'Ending the tour is not allowed in builder mode. To close the builder, use the close button in the corner.', 'dp-intro-tours' ),
				'ui_disabled_in_edit_mode'         => __( 'User interaction in edit mode is not fully enabled. Close the edit panel to enable and test it.', 'dp-intro-tours' ),
				'remove_step_q'                    => __( 'Are you sure to remove current intro step?', 'dp-intro-tours' ),
				'would_save_and_go_for_it'         => __( 'Would you like to save and go for it?', 'dp-intro-tours' ),
				'would_go_for_it'                  => __( 'Would you like to go for it?', 'dp-intro-tours' ),
				'set_mob_menu_first'               => __( 'For setting up alternative mobile menu targets you need to set up mobile menu opener/closer first.', 'dp-intro-tours' ),
				'multi_page_only_pro_prompt'       => __( 'Multi-page feature is only available in PRO version.', 'dp-intro-tours' ),
				'url_examples_not_set_title'       => __( 'URL variable examples not set', 'dp-intro-tours' ),
				// translators: %s: URL
				'url_examples_not_set_desc'        => __( 'Selected URL "%s" contains variables, but not all of them has valid example values filled.', 'dp-intro-tours' ),
				'unknown_url_var_title'            => __( 'Unknown URL variable', 'dp-intro-tours' ),
				// translators: %1$s: URL, %2$s URL variable name
				'unknown_url_var_desc'             => __( 'Selected URL "%1$s" contains unknown variable "%2$s", that is not initialized in 1st step.', 'dp-intro-tours' ),
				'wrong_url_title'                  => __( 'Wrong URL', 'dp-intro-tours' ),
				// translators: %1$s: URL path, %2$s domain URL,
				'wrong_url_desc'                   => __( 'Selected path %1$s doesn\'t exist at %2$s or is not valid URL.', 'dp-intro-tours' ) . ' '
				// translators: %s: Allow redirect to extraneous web option
				. sprintf( __( 'If you really want to redirect to extraneous url, set %s option on first in tour options.', 'dp-intro-tours' ), '<strong>' . Dp_Intro_Tours_Helper::get_generic_i18n( 'allow_redirect_to_ext' ) . '</strong>' ),
				'enjoying_builder_q'               => __( 'Did you enjoy creating the tour?', 'dp-intro-tours' ),
				'yes_tou_deserve_it'               => __( 'Yes, you deserved it', 'dp-intro-tours' ),
				'not_good_enough'                  => __( 'Not good enough', 'dp-intro-tours' ),
				'five_stars'                       => __( '5 stars', 'dp-intro-tours' ),
				// translators: %s: Step index
				'edit_step'                        => __( 'Edit %s step', 'dp-intro-tours' ),
				// translators: %s: Step index
				'new_step'                         => __( 'New Step %s', 'dp-intro-tours' ),
				'trigger_setup'                    => __( 'Trigger Setup', 'dp-intro-tours' ),
				'close_hint'                       => __( 'Close hint', 'dp-intro-tours' ),
				// translators: %s: device (mobile, desktop)
				'skip_or_show'                     => __( 'SKIP or SHOW on %s', 'dp-intro-tours' ),
				'SKIP'                             => __( 'SKIP', 'dp-intro-tours' ),
				'SHOW'                             => __( 'SHOW', 'dp-intro-tours' ),
				'clear_target'                     => __( 'Clear target', 'dp-intro-tours' ),
				'saving_err_2'                     => __( 'Saving changes to database was successful but error occurred in onSuccess callback.', 'dp-intro-tours' ),
				'saving_err_1'                     => __( 'Saving changes to database failed. Try again later.', 'dp-intro-tours' ),
				'open_mob_menu_prompt'             => __( 'Open mobile menu (click/touch menu opener)', 'dp-intro-tours' ),
				'close_mob_menu_prompt'            => __( 'Close mobile menu (click/touch menu closer)', 'dp-intro-tours' ),
				'mobile_menu_alt'                  => __( 'mobile menu alt.', 'dp-intro-tours' ),
				'mobile_alt'                       => __( 'mobile alt.', 'dp-intro-tours' ),
				'did_not_menu_open_q'              => __( 'Didn\'t mobile menu open?', 'dp-intro-tours' ),
				'did_not_menu_open_q_2'            => __( 'If button above didn\'t open menu neither, try to open it manually please.', 'dp-intro-tours' ),
				// translators: %s: Target type
				'select_target_prompt'             => __( 'Select %s target by click/touch', 'dp-intro-tours' ),
				'cancel_sel_target_step'           => __( 'Cancel selecting of target element for current step', 'dp-intro-tours' ),
				'cancel_sel_target_trigger'        => __( 'Cancel selecting of trigger element', 'dp-intro-tours' ),
				'cancel'                           => __( 'Cancel', 'dp-intro-tours' ),
				'exit_builder'                     => __( 'Exit builder mode', 'dp-intro-tours' ),
				'exit_builder_admin'               => __( 'Exit back to admin', 'dp-intro-tours' ),
				'exit_c'                           => __( 'Exit', 'dp-intro-tours' ),
				'exit_to_frontend'                 => __( 'Exit a builder', 'dp-intro-tours' ),
				'exit_target_selection'            => __( 'Exit target selection' ),
				'move_this_button'                 => __( 'Move this button', 'dp-intro-tours' ),
				'pause_1_click'                    => __( 'Pause 1 click', 'dp-intro-tours' ),
				'go_to_tour_cfg'                   => __( 'Tour options', 'dp-intro-tours' ),
				'hide_builder_controls'            => __( 'Pause a builder', 'dp-intro-tours' ),
				'add_first_step'                   => __( 'Add first step', 'dp-intro-tours' ),
				'save_changes'                     => __( 'Save', 'dp-intro-tours' ),
				'save_changes_exit'                => __( 'Save and exit', 'dp-intro-tours' ),
				'saved'                            => __( 'Saved', 'dp-intro-tours' ),
				'saving_failed'                    => __( 'Saving failed', 'dp-intro-tours' ),
				'edit'                             => __( 'Edit', 'dp-intro-tours' ),
				'change_your_sel'                  => __( 'Repeat selection', 'dp-intro-tours' ),
				'mobile_view_pro_only'             => __( 'Skip a step or even select another target element depending on whether the step is displayed on a mobile or widescreen is only available in PRO.', 'dp-intro-tours' ),
				'mobile_menu_pro_only'             => __( 'Mobile menu support is only available in PRO.', 'dp-intro-tours' ),
				'short_code_pro_only'              => __( 'Short-code support is only available in PRO.', 'dp-intro-tours' ),
				'would_you_like_to_check_it'       => __( 'Would you like to check it ?', 'dp-intro-tours' ),
				'change_target_el'                 => __( 'Change a target element', 'dp-intro-tours' ),
				'select_target_el'                 => __( 'Select a target element', 'dp-intro-tours' ),
				'change_target'                    => __( 'Change target', 'dp-intro-tours' ),
				'set_target'                       => __( 'Set target', 'dp-intro-tours' ),
				'redirect_to_url'                  => __( 'Redirect to url', 'dp-intro-tours' ),
				'no_target_selected'               => __( 'No target selected', 'dp-intro-tours' ),
				'step_skip_wide'                   => __( 'This step will be skipped on wide screens', 'dp-intro-tours' ),
				'not_overridden_wide'              => __( 'Not overridden. Wide screen target is used.', 'dp-intro-tours' ),
				'skip_step_wide_mob_pro_only'      => __( 'Skip a step or even select another target element depending on whether the step is displayed on a mobile or widescreen is only available in PRO.', 'dp-intro-tours' ),
				'step_skip_mobile'                 => __( 'This step will be skipped on mobile', 'dp-intro-tours' ),
				'target_has_mob_men_alt'           => __( 'Target has configured mobile menu alternative.', 'dp-intro-tours' ),
				'target_does_not_have_mob_men_alt' => __( 'Target doesn\'t have configured mobile menu alternative.', 'dp-intro-tours' ),
				'mob_menu_only_pro'                => __( 'Mobile menu support is only available in PRO.', 'dp-intro-tours' ),
				'wide_screen'                      => __( 'wide screen', 'dp-intro-tours' ),
				'mobile'                           => __( 'mobile', 'dp-intro-tours' ),
				'change_target_mob'                => __( 'Change target for mobiles', 'dp-intro-tours' ),
				'override_target_mob'              => __( 'Override target for mobiles', 'dp-intro-tours' ),
				'other'                            => __( 'Other', 'dp-intro-tours' ),
				'in_mob_menu'                      => __( 'In mob. menu', 'dp-intro-tours' ),
				'target'                           => __( 'Target', 'dp-intro-tours' ),
				'allow_interact'                   => __( 'Allow user to interact with highlighted element', 'dp-intro-tours' ),
				'ON'                               => __( 'On', 'dp-intro-tours' ),
				'OFF'                              => __( 'Off', 'dp-intro-tours' ),
				'interaction'                      => __( 'Interaction', 'dp-intro-tours' ),
				'set_target_first'                 => __( 'Set a target first please', 'dp-intro-tours' ),
				'tooltip_pref_pos'                 => __( 'Tooltip preferred position', 'dp-intro-tours' ),
				'tooltip_pref_highlight'           => __( 'Highlight preferred type', 'dp-intro-tours' ),
				'position'                         => __( 'Position', 'dp-intro-tours' ),
				'URL'                              => __( 'URL', 'dp-intro-tours' ),
				'edit_tour_tip_text'               => __( 'Text / HTML', 'dp-intro-tours' ),
				'short_code'                       => __( 'short-code', 'dp-intro-tours' ),
				'new_short_code_needs_reload'      => __( 'Newly inserted short-codes are not rendered on the fly in visual builder mode. Save and reload to see them rendered.', 'dp-intro-tours' ),
				'back'                             => Dp_Intro_Tours_Helper::get_generic_i18n( 'back' ),
				'next'                             => Dp_Intro_Tours_Helper::get_generic_i18n( 'next' ),
				'go_to_prev_step'                  => __( 'Go to previous step', 'dp-intro-tours' ),
				'go_to_next_step'                  => __( 'Go to next step', 'dp-intro-tours' ),
				'add_after_hint'                   => __( 'Add new after current step', 'dp-intro-tours' ),
				'remove'                           => __( 'Remove', 'dp-intro-tours' ),
				'remove_current_step'              => __( 'Remove current step', 'dp-intro-tours' ),
				'url_validation_failed'            => __( 'URL validation request failed. Try again later.', 'dp-intro-tours' ),
				'url_validation_cbk_failed'        => __( 'Error occurred in url validation callback (onSuccess).', 'dp-intro-tours' ),
				'target_selector_err_title'        => __( 'Visual target selection failed', 'dp-intro-tours' ),
				'target_selector_err_desc'         => __( 'Please inspect an element in developer tools and set a selector manually in steps table in tour options on the admin board.', 'dp-intro-tours' ),
				'end-a-tour-builder-q'             => __( 'Are you sure to end a tour builder?', 'dp-intro-tours' ),
			],
			'adminColors'            => Dp_Intro_Tours_Helper::get_admin_theme_colors_cfg(),
			'nonces'                 => [
				'builder_api_key' => Dp_Intro_Tours_Helper::get_builder_api_key(),
				'wp_rest_nonce'   => wp_create_nonce( 'wp_rest' ),
			],
			'tour_step_editor'       => [
				'select_position'  => [
					'select' => [
						'options' => $select_position_options,
						'defIdx'  => 0,
					],
				],
				'select_highlight' => [
					'select' => [
						'options' => $select_highlight_options,
						'defIdx'  => 0,
					],
				],
			],
		];
	}

	protected function filter_tour_script_config( $config, $tour_id, $tour_boot_cfg ) {
		( $tour_id ); // unused argument
		( $tour_boot_cfg ); // unused argument
		return $config;
	}
}

?>
