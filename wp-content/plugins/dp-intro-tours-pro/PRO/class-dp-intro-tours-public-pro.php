<?php

use IntroToursDP\Wp\Acf;
use IntroToursDP\Wp\WpStd;
use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;
use IntroToursDP\Std\Core\Path;


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
class Dp_Intro_Tours_Public_PRO extends Dp_Intro_Tours_Public {

	protected function load_needed_theme_styles( array $needed_extra_themes, bool $load_all_themes_override ) {
		$theme = Settings::get_setting_array_field( 'dp_it_general_options', 'theme', null );
		if ( $theme ) {
			$load_all_themes = filter_var( Settings::get_setting_array_field( 'dp_it_general_options', 'load_all_themes', '0' ), FILTER_VALIDATE_BOOLEAN );
			if ( $load_all_themes || $load_all_themes_override ) {
				$theme_options = Dp_Intro_Tours_Helper::get_themes_select_options();
				foreach ( $theme_options as $theme_option_item ) {

					parent::load_theme_style( Str::separed_first_part( $theme_option_item, ':' ) );
				}
			} else {
				parent::load_theme_style( $theme );
				foreach ( $needed_extra_themes as $extra_theme ) {
					parent::load_theme_style( $extra_theme );
				}
			}
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		if ( ! $this->checkMobileMenuSelectorsBuilderMode() ) {
			parent::enqueue_scripts();
		}
	}

	protected function adjust_builder_url_params( $params, $urlPath, $tourId ) {
		if ( $this->step_data ) {
			$urlPath  = trim( $urlPath, '/' );
			$stepData = Arr::get( $this->step_data, $tourId );
			if ( $stepData ) {
				foreach ( $stepData as $idx => $step ) {
					$url_parts   = parse_url( $step['url'] );
					$stepUrlPath = trim( Arr::sget( $url_parts, 'path' ), '/' );
					if ( $stepUrlPath == $urlPath ) {
						$params[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qp_step' ) ] = $idx;
						$params[ Dp_Intro_Tours_Helper::get_dp_url_param_name( 'dp_qp_pch' ) ]  = true;
						return $params;
					}
				}
			}
		}
		return $params;
	}

	protected function get_step_processed_content( $content ) {
		return do_shortcode( $content );
	}


	protected function get_tour_behaviour_cfg( $tourId, $behaviour_cfg ) {
		$res                                     = parent::get_tour_behaviour_cfg( $tourId, $behaviour_cfg );
		$res['strictUrlCompare']                 = Arr::get( $behaviour_cfg, 'strict_url_compare', false );
		$res['allow_redirect_to_extraneous_url'] = Arr::get( $behaviour_cfg, 'allow_redirect_to_extraneous_url', false );

		return $res;
	}

	protected function filter_tour_script_config( $config, $tourId, $tour_boot_cfg ) {

		$config['url_vars_enabled'] = Acf::get_group_field( 'intro_url_variables', 'url_vars_enabled', $tourId, false, true );
		$config['url_vars']         = Arr::get( $tour_boot_cfg, 'url_vars', null );
		$config['sysUrlVars']       = Dp_Intro_Tours_Helper::get_all_system_url_vars( $tourId );

		// { increment_step_after_reload
		$query_params_defs = Dp_Intro_Tours_Helper::get_dp_intro_query_params();
		$pch               = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qp_pch', null, $query_params_defs );
		$step              = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qp_step', null, $query_params_defs );
		$tourIdFromUrl     = Dp_Intro_Tours_Helper::get_dp_url_param( 'dp_qp_tour_id', null, $query_params_defs );
		if ( $tourIdFromUrl == $tourId && $pch === '0' && $step !== null ) {
			$stepInt = intval( $step );
			if ( $step === '0' || $stepInt ) {
				if ( ! $this->builder_mode && Acf::get_group_field( 'dp_tour_behaviour', 'increment_step_after_reload', $tourId, false, true ) ) {
					$config['startStepOverride'] = $stepInt + 1;
				} else {
					$config['startStepOverride'] = $stepInt;
				}
			}
		}
		// { increment_step_after_reload
		return $config;
	}

	protected function filter_trigger_config( $trigger_config, $trigger_raw_options ) {
		$trigger_config['global_start_at_all_pages'] = Arr::get( $trigger_raw_options, 'global_start_at_all_pages', false );
		$trigger_config['lock_by_url_parameter']     = Arr::get( $trigger_raw_options, 'lock_by_url_parameter', false );
		$trigger_config['key_unlock']                = Arr::get( $trigger_raw_options, 'intro_tour_key_unlock', 'true' );
		$trigger_config['in_view_port_offset']       = Arr::get( $trigger_raw_options, 'in_view_port_offset' ) . Arr::get( $trigger_raw_options, 'in_view_port_offset_unit' );
		$trigger_config['allow_for_mobile']          = Arr::get( $trigger_raw_options, 'allow_for_mobile', true );
		$trigger_config['allow_for_wide_screens']    = Arr::get( $trigger_raw_options, 'allow_for_wide_screens', true );
		return $trigger_config;
	}

	protected function filter_main_script_config( $config ) {
		if ( is_admin() ) {
			$wp_admin_mob_menu_selector   = '#wp-admin-bar-menu-toggle';
			$config['mobile_menu_opener'] = $wp_admin_mob_menu_selector;
			$config['mobile_menu_closer'] = $wp_admin_mob_menu_selector;
		} else {
			$config['mobile_menu_opener'] = Settings::get_setting_array_field( 'dp_it_mobile_menu_options', 'opener_selector', '' );
			$config['mobile_menu_closer'] = Settings::get_setting_array_field( 'dp_it_mobile_menu_options', 'closer_selector', '' );
		}
		$config['queryParamsDefs']     = Dp_Intro_Tours_Helper::get_dp_intro_query_params();
		$config['mobile_break_points'] = get_option( 'dp_it_mobile_breakpoints_options', [] );

		return $config;
	}

	protected function process_url_variables( $url1_unified, $step_url_unified, array &$variables, ?array $system_vars ) {
		$start_idx = 0;
		do {
			$was_variable_found = false;
			$var_pos_start      = strpos( $step_url_unified, '{', $start_idx );
			if ( $var_pos_start !== false ) {
				$var_pos_end = strpos( $step_url_unified, '}', $var_pos_start );
				if ( $var_pos_end !== false ) {
					$var_id = substr( $step_url_unified, $var_pos_start + 1, $var_pos_end - $var_pos_start - 1 );
					if ( $var_id ) {
						$is_system_var = Str::starts_with( $var_id, '$' );
						$system_val    = Arr::get( $system_vars, $var_id );
						$start_idx     = $var_pos_start + 1;
						// map original
						if ( $var_pos_start < strlen( $url1_unified ) ) {
							$end_char = '/';
							if ( $var_pos_start > 0 ) {
								switch ( $url1_unified[ $var_pos_start - 1 ] ) {
									case '/':
										$end_char = '/';
										break;
									case '=':
										$end_char = '&';
										break;
								}
							}
							if ( $is_system_var && $system_val ) {
								$var_val_pos_end = $var_pos_start + strlen( $system_val );
							} else {
								$var_val_pos_end = strpos( $url1_unified, $end_char, $var_pos_start );
							}
							if ( $var_val_pos_end === false ) {
								$var_val = substr( $url1_unified, $var_pos_start );
							} else {
								$var_val = substr( $url1_unified, $var_pos_start, $var_val_pos_end - $var_pos_start );
							}
							if ( $var_val ) {
								$system_var_check = true;
								if ( $is_system_var ) {
									$system_var_check = $system_val == $var_val;
								}
								if ( $system_var_check ) {
									$was_variable_found = true;
									if ( ! $is_system_var ) {
										$variables[ $var_id ] = $var_val;
									}
									$start_idx        = $var_pos_start + strlen( $var_val );
									$step_url_unified = substr_replace( $step_url_unified, $var_val, $var_pos_start, strlen( $var_id ) + 2 );
								}
							}
						}
					}
				}
			}
			$step_unified_length = strlen( $step_url_unified );
		} while ( $was_variable_found && $start_idx < $step_unified_length );
		$step_url_unified = str_replace( [ '{', '}', '$' ], '', $step_url_unified );
		return $step_url_unified;
	}

	protected function has_url_variables( $url ) {
		$start = strpos( $url, '{' );
		$stop  = strpos( $url, '}' );
		return $start !== null && $stop !== null && $stop > $start;
	}

	protected function checkMobileMenuSelectorsBuilderMode() {
		if ( $this->builder_mode === '3' ) {
			$this->enqueue_styles( [], true );
			$assets        = $this->enqueue_main_public_script();
			$entry_point   = array_pop( $assets['js'] );
			$currentPostId = WpStd::get_post_ID_from_SERVER_REQ_URL( null, get_the_ID() );
			$config        = [
				'siteUrl'       => get_site_url(),
				'dpDebugEn'     => Dp_Intro_Tours_Helper::is_debug_console_en(),
				'currentPostId' => $currentPostId,
				'mobileMenu'    => [
					'opener' => Settings::get_setting_array_field( 'dp_it_mobile_menu_options', 'opener_selector', '' ),
					'closer' => Settings::get_setting_array_field( 'dp_it_mobile_menu_options', 'closer_selector', '' ),
				],
			];
			$config        = array_merge( $config, $this->get_builder_config() );
			wp_localize_script( $entry_point['handle'], 'dpIntroTourPublicConfig', $config );
			return true;
		}
		return false;
	}

	protected function get_builder_config() {
		$config             = parent::get_builder_config();
		$config['dpWpLink'] = Dp_Intro_Tours_Wplink::get_dwplink_config( true );
		return $config;
	}

	protected function get_triggers_configs( $tourId ) {
		$res                  = parent::get_triggers_configs( $tourId );
		$addAdditionalTrigger = Acf::get_field( 'add_additional_trigger', $tourId, true );
		if ( $addAdditionalTrigger ) {
			$res[1] = $this->get_trigger_config( $tourId, 'intro_trigger_2' );
		}
		return $res;
	}

	protected function filter_wp_admin_bar( $wp_admin_bar ) {
		$wp_admin_bar->add_node(
			[
				'parent' => 'intro-actions',
				'id'     => 'set-mobile-menu-opener',
				'title'  => __( 'Set Mobile Menu Opener', 'dp-intro-tours' ),
				'href'   => Path::combine_url( get_site_url(), Dp_Intro_Tours_Helper::get_plugin_settings_page_path( 'mobile_menu' ) ),
			]
		);
		return $wp_admin_bar;
	}


	protected function enqueue_main_public_script() {
		if ( $this->builder_mode ) {
			if ( $this->builder_mode < 2 ) {
				Dp_Intro_Tours_Wplink::enqueue_style();
			}
			return Dp_Intro_Tours_Enqueue::enqueue(
				'main',
				'dpIntroBuilder',
				[
					'in_footer' => true,
					'js_dep'    => [ 'jquery' ],
				]
			);
		} else {
			return Dp_Intro_Tours_Enqueue::enqueue(
				'main',
				'dpIntroToursPublic',
				[
					'in_footer' => true,
					'js_dep'    => [ 'jquery' ],
				]
			);
		}
	}
}
