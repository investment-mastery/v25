<?php

use IntroToursDP\Wp\Acf;
use IntroToursDP\Wp\WpStd;
use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;
use IntroToursDP\Std\Core\Path;
use IntroToursDP\Std\Html\Html;
use IntroToursDP\Std\Core\Color;

define( 'DPIT_STEPS_URL_TYPE_UNIFIED', 'UNIFIED' );
define( 'DPIT_STEPS_URL_TYPE_REL', 'REL' );
define( 'DPIT_STEPS_URL_TYPE_ABS', 'ABS' );

/**
 *
 * @link  https://deeppresentation.com
 * @since 1.0.0
 *
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/includes
 */

/**
 *
 *
 * @since      1.0.0
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/includes
 * @author     Tomas Groulik <tomas.groulik@gmail.com>
 */
class Dp_Intro_Tours_Helper {

	public static function get_all_step_definitions() {

		// acf table config
		$selectPositionOptions = [];
		foreach ( Dp_Intro_Tours_Helper::get_position_select_options() as $key => $value ) {
			$selectPositionOptions[] = "${key}:${value}";
		}
		$highlightStyleOptions = [];
		foreach ( Dp_Intro_Tours_Helper::get_highlight_select_options() as $key => $value ) {
			$highlightStyleOptions[] = "${key}:${value}";
		}
		$mobile_breakpoint = Settings::get_setting_array_field( 'dp_it_mobile_breakpoints_options', 'mobile', '480' );
		$intro_label       = ( DP_INTRO_TOURS_IS_PRO )
		? __( 'Content (text/html/short-code) *', 'dp-intro-tours' )
		: __( 'Content (text/html/<span class="dpit-pro-only">short-code PRO</span>) *', 'dp-intro-tours' );
		$intro_hint        = ( DP_INTRO_TOURS_IS_PRO )
		? __( "Text, html code or wp short-code, that is shown in current tour's step.", 'dp-intro-tours' )
		: __( "Text or html code, that is shown in current tour's step. Short-code content is available in PRO version only.", 'dp-intro-tours' );
		return [
			'element'             => [
				'title' => __( 'Reference Selector *', 'dp-intro-tours' ),
				'hint'  => __( "Defines reference element for current step in form of css selector eg '.testimonial-box', '#section-1'. In case of selector for multiple elements, first is used.", 'dp-intro-tours' ),
				'def'   => '',
				'type'  => 'text',
			],
			'intro'               => [
				'title' => $intro_label,
				'hint'  => $intro_hint,
				'def'   => '',
				'type'  => 'text_wp_edit',
			],
			'url'                 => [
				'title' => __( 'Page/Post/CPT URL', 'dp-intro-tours' ),
				'hint'  => __( 'Relative URL of page, post or other custom post type, where specified target element is at. (Eg. "/" = root of your web). If required url is not listed in Insert/edit link tool, just type it manually as all CPTs are supported. In case of linking to extraneous web, use absolute url of course.', 'dp-intro-tours' ),
				'def'   => '',
				'type'  => 'link',
				'hide'  => ! DP_INTRO_TOURS_IS_PRO,
			],
			'position'            => [
				'title'   => __( 'Tooltip Position', 'dp-intro-tours' ),
				'hint'    => __( "Optionally you can alter tooltip position. However, this preference won't be in effect in all cases, as if there is no space enough for required positioning, algorithm choose position automatically.", 'dp-intro-tours' ),
				'def'     => '',
				'type'    => 'select',
				'options' => $selectPositionOptions,
			],
			'highlight'           => [
				'title'   => __( 'Highlight Style', 'dp-intro-tours' ),
				'hint'    => __( 'Optionally you can alter target highlight style. Our automatic mode works fine in the most cases, however in some cases it could fail, so you can override it to your choice.', 'dp-intro-tours' ),
				'def'     => '',
				'type'    => 'select',
				'options' => $highlightStyleOptions,
			],
			'enable_interaction'  => [
				'title' => __( 'Interaction', 'dp-intro-tours' ),
				'hint'  => __( "Enable / disable user's interaction with reference element (don't block click and other events).", 'dp-intro-tours' ),
				'def'   => '0',
				'type'  => 'checkbox',
				'ext'   => [
					'iterate_after_click'          => [
						'def'   => '0',
						'title' => __( 'click&rarr;next', 'dp-intro-tours' ),
						'type'  => 'checkbox',
					],
					'iterate_after_click_delay_ms' => [
						'def'   => 500,
						'title' => __( 'click delay[ms]', 'dp-intro-tours' ),
						'type'  => 'number',
						'min'   => 0,
						'max'   => 60000,
						'step'  => 100,
					],
					'iterate_after_hover'          => [
						'def'   => '0',
						'title' => __( 'hover&rarr;next', 'dp-intro-tours' ),
						'type'  => 'checkbox',
					],
					'iterate_after_hover_delay_ms' => [
						'def'   => 500,
						'title' => __( 'hover delay[ms]', 'dp-intro-tours' ),
						'type'  => 'number',
						'min'   => 0,
						'max'   => 60000,
						'step'  => 100,
					],
					'hide_next_btn'                => [
						'def'   => '0',
						'title' => __( 'hide next', 'dp-intro-tours' ),
						'type'  => 'checkbox',
					],
					'hide_overlay'                 => [
						'def'   => '0',
						'title' => __( 'hide overlay', 'dp-intro-tours' ),
						'type'  => 'checkbox',
					],
				],
			],
			'alt_mobile_selector' => [
				'title' => __( 'Mobile Ref. Selector', 'dp-intro-tours' ),
				'hint'  => sprintf( __( 'Defines an alternative reference element for mobile devices with a display width less than or equal to %dpx. This only makes sense if the reference element in the mobile display differs from the standard reference element or is part of mobile MENU. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours' ), $mobile_breakpoint ),
				'def'   => '',
				'type'  => 'text',
				'hide'  => ! DP_INTRO_TOURS_IS_PRO,
			],
			'is_in_mobile_menu'   => [
				'title' => __( 'Is in Mob. MENU?', 'dp-intro-tours' ),
				'hint'  => __( 'Check the box if the reference element is in the main mobile menu. It allows to automatically open and close the mobile menu during the tour. It only takes effect if the Mobile Ref. Selector is set and the selectors for opening and closing the mobile menu are set on the global plugin options page.', 'dp-intro-tours' ),
				'def'   => '0',
				'type'  => 'checkbox',
				'hide'  => ! DP_INTRO_TOURS_IS_PRO,
			],
			'skip_on_mobile'      => [
				'title' => __( 'Skip on mobile', 'dp-intro-tours' ),
				'hint'  => sprintf( __( 'To skip step on mobile phones with a screen width of less then or equal to %d pixels, check the box. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours' ), $mobile_breakpoint ),
				'def'   => '0',
				'type'  => 'checkbox',
				'hide'  => ! DP_INTRO_TOURS_IS_PRO,
			],
			'skip_on_big_screen'  => [
				'title' => __( 'Skip on wide screens', 'dp-intro-tours' ),
				'hint'  => sprintf( __( 'To skip step on devices with a screen larger than %d pixels, check the box. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours' ), $mobile_breakpoint ),
				'def'   => '0',
				'type'  => 'checkbox',
				'hide'  => ! DP_INTRO_TOURS_IS_PRO,
			],
			'hidden_meta'         => [
				'title' => 'Hidden meta',
				'hide'  => ! DP_INTRO_TOURS_DP_DEBUG_EN,
				'type'  => 'ext_only',
				'ext'   => [
					'build_with_wp_editor' => [
						'def'   => '0',
						'title' => __( 'wp editor', 'dp-intro-tours' ),
						'type'  => 'checkbox',
					],
				],
			],

		];
	}

	// sprintf(__("Defines an alternative reference element for mobile devices with a display less than or equal to %dpx. This only makes sense if the reference element in the mobile display differs from the standard reference element or is a mobile menu element. You can adjust the mobile screen width limit in the global settings of the plugin.", 'dp-intro-tours'), $mobile_breakpoint)

	public static function get_step_definition_ids( $useBuild = '' ) {
		return ( DP_INTRO_TOURS_IS_PRO || $useBuild === 'PRO' )
		? [ 'element', 'intro', 'url', 'position', 'highlight', 'enable_interaction', 'alt_mobile_selector', 'is_in_mobile_menu', 'skip_on_mobile', 'skip_on_big_screen', 'hidden_meta' ]
		: [ 'element', 'intro', 'position', 'highlight', 'enable_interaction', 'hidden_meta' ];
	}

	public static function is_singular_intro_tour( $_post = null ) {
		if ( ! $_post ) {
			global $post;
			$_post = $post;
		}
		if ( is_int( $_post ) ) {
			$_post = get_post( $_post );
		}
		return ! is_archive() && $_post && is_object( $_post ) && $_post->post_type === 'dp_intro_tours';
	}

	public static function get_text_style_options() {

		$use_custom_text_styles = Settings::get_setting_array_field( 'dp_it_general_options', 'useThemeDefaultFont', '0' ) === '0';
		return $use_custom_text_styles ? get_option( 'dp_it_text_styles_options', null ) : null;
	}

	public static function h_text_styles_interpolation( $text_styles ) {
		$res = [];
		if ( $text_styles && count( $text_styles ) ) {
			foreach ( $text_styles as $key => $val ) {
				if ( $val || $val === '0' ) {
					$final_val = $val;
					if ( ! Str::ends_with( $key, 'font' ) ) {
						$final_val .= 'px';
					}
					$res[ $key ] = $final_val;
				}
			}
			$h2_font_size = Arr::sget( $text_styles, 'h2_font_size', null );
			$h5_font_size = Arr::sget( $text_styles, 'h5_font_size', null );
			if ( $h2_font_size || $h2_font_size === '0' && $h5_font_size || $h5_font_size === '0' ) {
				$unit = ( $h2_font_size - $h5_font_size ) / 4;
				for ( $i = 1; $i <= 6; $i++ ) {
					if ( $i === 2 || $i === 5 ) {
						continue;
					}
					$unitCnt                  = $i - 2;
					$res[ "h${i}_font_size" ] = round( $h2_font_size - $unitCnt * $unit ) . 'px';
				}
			}

			$h2_mb = Arr::sget( $text_styles, 'h2_mb', null );
			$h5_mb = Arr::sget( $text_styles, 'h5_mb', null );
			if ( $h2_mb || $h2_mb === '0' && $h5_mb || $h5_mb === '0' ) {
				$unit = ( $h2_mb - $h5_mb ) / 4;
				for ( $i = 1; $i <= 6; $i++ ) {
					if ( $i === 2 || $i === 5 ) {
						continue;
					}
					$unitCnt           = $i - 2;
					$res[ "h${i}_mb" ] = round( $h2_mb - $unitCnt * $unit ) . 'px';
				}
			}
		}
		return $res;
	}

	public static function generate_inline_text_styles( $text_styles_cfg ) {
		$res         = '';
		$text_styles = self::h_text_styles_interpolation( $text_styles_cfg );
		if ( $text_styles && count( $text_styles ) ) {
			$css_variables = [];
			foreach ( $text_styles as $key => $val ) {
				$css_variables[ "--${key}" ] = $val;
			}
			$res = 'body{' . Html::get_style_str( $css_variables ) . '}';
		}
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$file_path = plugin_dir_path( __FILE__ ) . 'assets/css/editor-content.css';
		if ( file_exists( $file_path ) ) {
			$content = file_get_contents( $file_path );
			if ( $content ) {
				$res .= $content;
			}
		}
		$file_path = plugin_dir_path( __FILE__ ) . 'assets/css/editor-content-color.css';
		if ( file_exists( $file_path ) ) {
			$content = file_get_contents( $file_path );
			if ( $content ) {
				$res .= $content;
			}
		}
		return self::minimize_css_simple( $res );
	}

	public static function minimize_css_simple( $css ) {
		$css = preg_replace( '/\/\*((?!\*\/).)*\*\//', '', $css ); // negative look ahead
		$css = preg_replace( '/\s{2,}/', ' ', $css );
		$css = preg_replace( '/\s*([:;{}])\s*/', '$1', $css );
		$css = preg_replace( '/;}/', '}', $css );
		return $css;
	}

	public static function render_tiny_mce() {
		$custom_inline_style = '';
		$text_style_options  = self::get_text_style_options();
		if ( $text_style_options ) {
			$custom_inline_style = self::generate_inline_text_styles( $text_style_options );
		}

		?>
		<div id="dp-step-content-edit__backdrop" class="dp-tmce-dialog__backdrop"></div>
		<div id="dp-step-content-edit" class="dp-tmce-dialog wp-editor-expand" role="dialog">
			<span class="dashicons dashicons-no-alt dp-tmce-dialog__close"></span>
			<div class="dp-tmce-dialog__content">
				<div class="dp-tmce-dialog__title"><?php _e( 'Edit step content', 'dp-intro-tours' ); ?></div>
				<?php
				wp_editor(
					'',
					'dp-tmce-editor',
					[
						'editor_height'    => 350,
						'default_editor'   => 'TinyMCE',
						'drag_drop_upload' => true,
						'tabindex'         => 0,
						'wpautop'          => false,
						'tinymce'          => [
							'block_formats' => 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Address=address;Pre=pre',
							'content_style' => $custom_inline_style,
						],
					]
				);
				?>
				<br/>
				<div class="dp-tmce-dialog__btn-wrap">
					<div class="dp-tmce-dialog__btn"><?php _e( 'Confirm', 'dp-intro-tours' ); ?></div>
				</div>
			</div>
		</div>
		<?php
	}



	public static function filter_mce_toolbar( $toolbar_items, $toolbar_idx = 1 ) {
		$all_items_to_remove = [
			0 => [],
			1 => [ 'wp_more' ],
			2 => [ 'fontselect', 'fontsizeselect' ],
		];
		$items_to_remove     = Arr::get( $all_items_to_remove, $toolbar_idx, [] );
		return array_filter(
			$toolbar_items,
			function( $item ) use ( $items_to_remove ) {
				return ! in_array( $item, $items_to_remove, true );
			}
		);
	}


	public static function get_dp_intro_query_params( $include_builder_params = true ) {
		$res = [
			'dp_qp_step'               => 'dp_step',
			'dp_qp_tour_id'            => 'dp_id',
			'dp_qp_backward'           => 'dp_back',
			'dp_qp_trigger_id'         => 'dp_trg',
			'dp_qp_theme'              => 'dp_theme',
			'dp_qp_pch'                => 'dp_pch',
			'dp_qp_accent_color'       => 'dp_ac',
			'dp_qp_run_always_on_load' => 'dp_ra',
			'dp_qp_lock'               => 'start-intro-tour', // Don't change val since it is already used by users
			'dp_qp_url_vars'           => 'dp_uvs',
			'dp_qp_sss'                => 'dp_sss',
			'dp_qp_ses'                => 'dp_ses',
		];
		if ( $include_builder_params ) {
			$res = array_merge(
				$res,
				[
					'dp_qpb_builder_mode'         => 'dpb_mode',
					'dp_qpb_builder_origin'       => 'dpb_origin',
					'dp_qpb_origin_el_id'         => 'dpb_oeid',
					'dp_qpb_canceled'             => 'dpb_canceled',
					'dp_qpb_total_saved_changes'  => 'dpb_tsch',
					'dp_qpb_init_state'           => 'dpb_state',
					'dp_qpb_mobile_alt_step_mode' => 'dpb_mob_asm',
					'dp_qpb_in_new_window'        => 'dpb_in_new_win',
					'dp_qpb_create_new'           => 'dpb_create_new',
					'dp_qpb_tour_name'            => 'dpb_tour_name',
				]
			);
		}
		return $res;
	}

	public static function get_dp_url_param_name( string $id, ?array $query_params_definitions = null ) {

		$res = $id;
		if ( ! $query_params_definitions ) {
			$query_params_definitions = self::get_dp_intro_query_params( true );
		}
		$res = Arr::get( $query_params_definitions, $id );
		return $res;
	}

	public static function get_dp_url_param( string $id, $defVal = null, ?array $query_params_definitions = null ) {
		$res = $defVal;
		$key = self::get_dp_url_param_name( $id, $query_params_definitions );
		if ( $key ) {
			$res = self::get_url_param( $key, $defVal );
		}
		return $res;
	}


	public static function set_dp_url_param( string $id, ?array $query_params_definitions, $val, bool $postfixAmpersand = true ) {
		$res = '';
		$key = self::get_dp_url_param_name( $id, $query_params_definitions );
		if ( $key ) {
			$res = $key . '=' . $val;
			if ( $postfixAmpersand ) {
				$res .= '&';
			}
		}
		return $res;
	}

	public static function build_dp_query_string( array $params, ?array $query_params_definitions, string $prefix = '?', array $non_mapped_params = [] ) {
		$res = $prefix;
		if ( $non_mapped_params ) {
			foreach ( $non_mapped_params as $id => $val ) {
				if ( isset( $val ) ) {
					$res .= $id . '=' . $val . '&';
				}
			}
		}
		if ( $params ) {
			foreach ( $params as $id => $val ) {
				if ( isset( $val ) ) {
					$res .= self::set_dp_url_param( $id, $query_params_definitions, $val );
				}
			}
		}
		$res = rtrim( $res, '&' );
		if ( $res === $prefix ) {
			$res = '';
		}
		return $res;
	}

	public static function build_url( array $parts ) {
		return rtrim(
			( isset( $parts['scheme'] ) ? "{$parts['scheme']}:" : '' ) .
			( ( isset( $parts['user'] ) || isset( $parts['host'] ) ) ? '//' : '' ) .
			( isset( $parts['user'] ) ? "{$parts['user']}" : '' ) .
			( isset( $parts['pass'] ) ? ":{$parts['pass']}" : '' ) .
			( isset( $parts['user'] ) ? '@' : '' ) .
			( isset( $parts['host'] ) ? "{$parts['host']}" : '' ) .
			( isset( $parts['port'] ) ? ":{$parts['port']}" : '' ) .
			( isset( $parts['path'] ) ? "{$parts['path']}" : '' ) .
			( isset( $parts['query'] ) ? "?{$parts['query']}" : '' ) .
			( isset( $parts['fragment'] ) ? "#{$parts['fragment']}" : '' ),
			'?&'
		);
	}

	public static function get_transient_id( $name, $current_user_id = null ) {
		if ( ! $current_user_id ) {
			$current_user_id = get_current_user_id();
		}
		if ( ! $current_user_id ) {
			return $name;
		} else {
			return $name . '_' . $current_user_id;
		}
	}

	public static function fill_url_variables( $url_to_fill, $url_vars ) {
		if ( DP_INTRO_TOURS_IS_PRO ) {
			if ( $url_vars ) {
				foreach ( $url_vars as $var_id => $var_val ) {
					$url_to_fill = str_replace( '{' . $var_id . '}', $var_val, $url_to_fill );
				}
			}
		}
		return $url_to_fill;
	}

	public static function fill_stored_url_variables( $url_to_fill, $tour_id ) {
		$url_var_examples = [];
		$process_url_vars = Acf::get_group_field( 'intro_url_variables', 'url_vars_enabled', $tour_id, false, true );
		if ( $process_url_vars ) {
			$url_var_examples_str = Acf::get_group_field( 'intro_url_variables', 'url_vars_examples' );
			if ( $url_var_examples_str ) {

				$url_var_examples = Arr::explode_assoc( $url_var_examples_str, "\n", '=' );
			}
		}
		return self::fill_url_variables( $url_to_fill, $url_var_examples );
	}

	public static function get_current_url( $clear_intro_query = true ) {
		$url = WpStd::get_current_url();
		if ( $url && $clear_intro_query ) {
			try {
				$url_obj = parse_url( $url );
				$query   = Arr::get( $url_obj, 'query' );
				if ( $url_obj && $query ) {
					$query_arr = Arr::explode_assoc( $query, '&', '=' );
					if ( $query_arr && count( $query_arr ) ) {
						$new_query = [];
						foreach ( $query_arr as $key => $val ) {
							if ( ! in_array( $key, self::get_dp_intro_query_params() ) ) {
								$new_query[ $key ] = $val;
							}
						}
						$url_obj['query'] = Arr::implode_assoc( $new_query, '&', '=' );
						$url              = self::build_url( $url_obj );
					}
				}
			} catch ( Exception $e ) {
				error_log( "get_current_url error: $e" );
			}
		}
		return $url;
	}

	public static function is_tour_started_globally_at_all_pages( $tour_ID ) {
		return DP_INTRO_TOURS_IS_PRO ? Acf::get_group_field( 'intro_trigger', 'global_start_at_all_pages', $tour_ID, false, true ) : false;
	}

	public static function get_step_definition_names_by_ids( $ids ) {
		$res         = [];
		$definitions = self::get_all_step_definitions();
		foreach ( $ids as $id ) {
			$definition                               = Arr::get( $definitions, $id );
			$res[ Arr::sget( $definition, 'title' ) ] = $id;
		}
		return $res;
	}

	public static function get_step_definition_names( $useBuild = '' ) {
		return self::get_step_definition_names_by_ids( self::get_step_definition_ids( $useBuild ) );
	}

	public static function get_all_step_definitions_back_compat_1_3_10( $useBuild = '' ) {
		$names = self::get_step_definition_names( $useBuild );
		$res   = [];
		foreach ( $names as $key => $val ) {
			switch ( $val ) {
				case 'element':
					$res['Selector *'] = $val;
					break;
				case 'intro':
					$res['Intro text *'] = $val;
					break;

				default:
					$res[ $key ] = $val;
			}
		}
		return $res;
	}

	public static function get_step_definitions( $useBuild = '', bool $compact = false ) {
		$res         = [];
		$definitions = self::get_all_step_definitions();
		$ids         = self::get_step_definition_ids( $useBuild );
		foreach ( $ids as $id ) {
			if ( array_key_exists( $id, $definitions ) ) {
				if ( $compact ) {
					$res[ $id ] = [];
					$ext_cfg    = Arr::get( $definitions[ $id ], 'ext' );
					$def        = Arr::sget( $definitions[ $id ], 'def' );
					if ( $def ) {
						$res[ $id ]['def'] = $def;
					}
					if ( $ext_cfg ) {
						$res[ $id ]['ext'] = [];
						foreach ( $ext_cfg as $ext_id => $ext_val ) {
							$res[ $id ]['ext'][ $ext_id ] = [
								'def' => Arr::sget( $ext_val, 'def' ),
							];
						}
					}
				} else {
					$res[ $id ] = $definitions[ $id ];
				}
			}
		}
		return $res;
	}

	public static function get_plugin_settings_page_path( $tab, $without_wp_admin = false ) {
		$show_in_main_menu = Settings::get_setting_array_field( 'dp_it_general_options', 'show_in_main_menu', '0' ) === '1';
		if ( $without_wp_admin ) {
			return ! $show_in_main_menu ? "options-general.php?page=dp_intro_tours&tab=${tab}" : "admin.php?page=dp_intro_tours&tab=${tab}";
		} else {
			return ! $show_in_main_menu ? "wp-admin/options-general.php?page=dp_intro_tours&tab=${tab}" : "wp-admin/admin.php?page=dp_intro_tours&tab=${tab}";
		}
	}

	public static function get_generic_i18n( $key ) {
		$data = [
			'allow_popup_to_set_mob'      => __( "To allow setting up mobile alternative menu element, you need to allow popup for current url as it seems your browser is blocking it and we'd like to simulate mobile view in popup window.", 'dp-intro-tours' ),
			'or_set_man'                  => __( 'Or set manually', 'dp-intro-tours' ),
			'failed'                      => __( 'failed', 'dp-intro-tours' ),
			'was_successful'              => __( 'was successful', 'dp-intro-tours' ),
			'extend_call'                 => __( 'Extend to maintain full functionality with compatibility and security updates and new features. You do not need to upload a new zip package of plugin for an extension, which you will receive after payment. Just use the newly generated license key, which you will also receive.', 'dp-intro-tours' ),
			'custom_url_vars_desc'        => sprintf( __( '%s are configured and evaluated in the first step for the entire tour.', 'dp-intro-tours' ), '<strong>' . __( 'Custom variables', 'dp-intro-tours' ) . '</strong>' ),
			'custom_url_vars_example'     => __( 'Eg.', 'dp-intro-tours' ) . ' /products/<strong>{product-id}</strong>?variant=<strong>{product-variant}</strong>',
			'custom_url_vars_desc_detail' => __( 'Their value is set as the corresponding part of the URL where the tour begins. The variable name can be any string enclosed in curly braces that DOESN\'T begin with \'$\'. You can define them in the 1st step by writing {my-var-name} (with curly braces included) into URL field (you choose your own name instead of my-var-name). Then you can use these variables as placeholders in the following steps.', 'dp-intro-tours' ),
			'system_url_vars_desc'        => sprintf( __( '%1$s are predefined and always available. Their name always starts by %2$s. Their value is set internally by calling a system function, eg. %3$s.', 'dp-intro-tours' ), '<strong>' . __( 'System variables', 'dp-intro-tours' ) . '</strong>', '<strong>\'$\'</strong>', '<i>get_current_user_id</i>' ),
			'system_url_vars_example'     => __( 'Eg.', 'dp-intro-tours' ) . ' /member-dashboard/<strong>{$current-user-login}</strong>',
			'system_url_vars_desc_detail' => sprintf( __( 'You can also extend them with own code based variables by %1$s with %2$s filter.', 'dp-intro-tours' ), '<a href=\'' . DP_INTRO_TOURS_HOOK_TUTORIAL_LINK . '\' target=\'_blank\'>' . __( 'integrated hook system', 'dp-intro-tours' ) . '</a>', '<strong>dpintro_sys_url_var</strong>' ),
			'allow_redirect_to_ext'       => __( 'Allow Redirect To Extraneous Web', 'dp-intro-tours' ),
			'back'                        => __( 'Back', 'dp-intro-tours' ),
			'next'                        => __( 'Next', 'dp-intro-tours' ),
			'font_option_hint'            => __( 'You can use single value or multiple fonts used as a fallback delimited by commas.', 'dp-intro-tours' ) . '<br><strong>' . __( 'Plugin won\'t load fonts for you. You should use already loaded fonts.', 'dp-intro-tours' ) . '</strong>',
		];
		return Arr::sget( $data, $key );
	}

	public static function is_debug_console_en() {
		$debug_console = Settings::get_setting_array_field( 'dp_it_general_options', 'debug_console', '0' ) === '1';
		return $debug_console || DP_INTRO_TOURS_DP_DEBUG_EN;
	}

	public static function dp_intro_tours_console_log( $data ) {
		if ( self::is_debug_console_en() ) {
			echo '<script>';
			echo 'console.log("backend-log:",' . json_encode( $data ) . ')';
			echo '</script>';
		}
	}

	public static function get_full_step_definition_names() {
		return self::get_step_definition_names( 'PRO' );
	}

	public static function get_url_param( $key, $def = null ) {
		return key_exists( $key, $_GET ) ? htmlspecialchars( $_GET[ $key ] ) : $def;
	}

	public static function is_url_comp_strict( $tour_id ) {
		if ( ! DP_INTRO_TOURS_IS_PRO ) {
			return false;
		} else {
			return Acf::get_group_field( 'dp_tour_behaviour', 'strict_url_compare', $tour_id, false, true );
		}
	}

	public static function get_tour_start_page_id( $tourId, $is_run_at_all_pages_override = null, $all_start_urls = false ) {
		$start_url = self::get_tour_start_page_url( $tourId, false, DPIT_STEPS_URL_TYPE_ABS, $is_run_at_all_pages_override, $all_start_urls );
		if ( $start_url ) {
			if ( is_array( $start_url ) ) {
				$res = [];
				foreach ( $start_url as $sub_url ) {
					$post  = WpStd::get_post_by_url_path( $sub_url );
					$res[] = $post ? $post->ID : null;
				}
				return $res;
			} else {
				$post = WpStd::get_post_by_url_path( $start_url );
				return $post ? $post->ID : null;
			}
		}
		return null;
	}

	public static function get_tour_start_page_url( $tourId, $fillExampleUrlVars = false, $type = DPIT_STEPS_URL_TYPE_ABS, $is_run_at_all_pages_override = null, $all_start_urls = false ) {
		$is_run_at_all_pages = $is_run_at_all_pages_override ?? self::is_tour_started_globally_at_all_pages( $tourId );
		if ( $is_run_at_all_pages ) {
			return get_site_url();
		}

		$urls = self::get_steps_url( $tourId, $type );
		if ( $all_start_urls ) {
			$res           = [];
			$start_url_cnt = max( intval( Acf::get_field( 'start_url_cnt', $tourId, true, 1 ) ), 1 );
			if ( $start_url_cnt ) {
				for ( $i = 0; $i < $start_url_cnt; $i++ ) {
					$sub_res = Arr::get( $urls, $i, null );
					if ( $fillExampleUrlVars && ! empty( $sub_res ) ) {
						$sub_res = self::fill_stored_url_variables( $sub_res, $tourId );
					}
					$res[] = $sub_res;
				}
			}
		} else {
			$res = Arr::get( $urls, 0, null );
			if ( $fillExampleUrlVars && ! empty( $res ) ) {
				$res = self::fill_stored_url_variables( $res, $tourId );
			}
		}
		return $res;
	}



	public static function get_steps_url( $tourId, $type = DPIT_STEPS_URL_TYPE_UNIFIED ) {
		/*if ( $type === DPIT_STEPS_URL_TYPE_UNIFIED ) {
			return get_post_meta( $tourId, 'dpit_steps_url_unified', true );
		} else*/
		if ( $type === DPIT_STEPS_URL_TYPE_REL ) {
			return get_post_meta( $tourId, 'dpit_steps_url_relative', true );
		} else {

			$res_urls  = [];
			$steps_url = get_post_meta( $tourId, 'dpit_steps_url_relative', true );
			if ( $steps_url && count( $steps_url ) ) {
				$site_url = get_site_url();
				if ( $type === DPIT_STEPS_URL_TYPE_UNIFIED ) {
					$site_url = self::unify_url( $site_url );
				}
				foreach ( $steps_url as $url ) {
					$res_url = $url;
					if ( Str::starts_with( $url, '/' ) ) {
						$res_url = rtrim( Path::combine_url( $site_url, $url ), '/' );
					}
					$res_urls[] = $res_url;
				}
			}
			return $res_urls;
		}
	}

	public static function set_steps_url( $tourId, array $steps_url, int $start_url_cnt = 1 ) {
		$steps_url_unified  = [];
		$steps_url_relative = [];
		$is_url_comp_strict = self::is_url_comp_strict( $tourId );
		$site_url           = get_site_url();

		foreach ( $steps_url as $url ) {
			$abs_url = $url;
			$rel_url = $url;
			if ( Str::starts_with( $url, '/' ) ) {
				$abs_url = Path::combine_url( $site_url, $url );
			} elseif ( Str::starts_with( $url, $site_url ) ) {
				$rel_url = Str::separed_last_part( $url, $site_url, $url );
			}
			$force_q_mark_without_slash = Str::starts_with( $rel_url, '/wp-admin' );
			$steps_url_unified[]        = self::unify_url( $abs_url, ! $is_url_comp_strict, false, true, false, $force_q_mark_without_slash );
			$steps_url_relative[]       = self::unify_url( $rel_url, ! $is_url_comp_strict, false, false, false, $force_q_mark_without_slash );
		}

		update_post_meta( $tourId, 'dpit_steps_url_unified', $steps_url_unified );
		update_post_meta( $tourId, 'dpit_steps_url_relative', $steps_url_relative );
		update_post_meta( $tourId, 'start_url_cnt', $start_url_cnt );
		update_field( 'start_url_cnt', $start_url_cnt );

		// dbg
		update_field( 'steps_url_unified_serialized', implode( PHP_EOL, $steps_url_unified ), $tourId );
		update_field( 'steps_url_relative_serialized', implode( PHP_EOL, $steps_url_relative ), $tourId );
	}

	public static function get_plugin_version_from_intro_data( $tour_ID, $build_type_only = false ) {
		$res = Acf::get_field( 'plugin_version', $tour_ID ) ?? '';
		if ( $res && $build_type_only ) {
			$res = Str::separed_first_part( $res, '_' );
		}
		return $res;
	}

	public static function update_steps_url( $tour_ID, $force_build_type = null ) {
		$build_type = $force_build_type ?? DP_INTRO_TOURS_DP_BUILD_TYPE;
		switch ( $build_type ) {
			case 'FREE':
				$intro_related_posts = Acf::get_group_field( 'intro_trigger', 'intro_related_posts', $tour_ID, [] );
				$steps_url           = [];
				if ( $intro_related_posts ) {
					foreach ( $intro_related_posts as $related_post_id ) {
						$steps_url[] = get_permalink( $related_post_id );
					}
				}
				self::set_steps_url( $tour_ID, $steps_url, count( $steps_url ) );
				break;
			case 'PRO':
				self::update_pro_url_relationships( $tour_ID );
				break;
		}
	}

	public static function fix_relative_url_without_leading_slash( $url ) {
		if ( ! Str::starts_with( $url, 'http://' )
			&& ! Str::starts_with( $url, 'https://' )
			&& ! Str::starts_with( $url, 'www.' )
			&& ! Str::starts_with( $url, '/' )
			&& ! Str::starts_with( $url, '$' )
		) {
			$url = '/' . $url;
		}
		return $url;
	}

	public static function recreate_step_table( $tour_ID, $table_raw_data, $force_first_step_url = false, $force_relative_url_leading_slash = false, $on_new_step_prop_cb = null, $on_step_data_cb = null ) {
		if ( ! $table_raw_data ) {
			$table_raw_data = Acf::get_field( 'intro_steps', $tour_ID, false );
		}
		$res          = [
			'was_changed'           => false,
			'raw_data'              => $table_raw_data,
			'was_start_url_changed' => false,
		];
		$stepDefNames = self::get_step_definition_names();
		if ( $table_raw_data && is_array( $table_raw_data ) ) {
			$start_urls_raw = self::get_tour_start_page_url( $tour_ID, false, DPIT_STEPS_URL_TYPE_REL, false, true );
			$start_urls     = $start_urls_raw;
			if ( $force_relative_url_leading_slash ) {
				$start_urls = [];
				foreach ( $start_urls_raw as $start_url ) {
					$fixed_rel_url = self::fix_relative_url_without_leading_slash( $start_url );
					if ( $fixed_rel_url !== $start_url ) {
						$res['was_changed']           = true;
						$res['was_start_url_changed'] = true;
						$start_urls[]                 = $fixed_rel_url;
					} else {
						$start_urls[] = $start_url;
					}
				}
			}
			$labels              = array_keys( $stepDefNames );
			$step_data           = Acf::decode_raw_to_assoc_array_of_columns( $table_raw_data, true );
			$res['decoded_data'] = $step_data;
			$new_step_data       = [];
			foreach ( $step_data as $idx => $step ) {
				$new_step = [];
				foreach ( $stepDefNames as $val ) {
					if ( array_key_exists( $val, $step ) ) {
						if ( $val === 'url' ) {
							if ( $force_first_step_url ) {
								if ( $idx === 0 ) {
									if ( $start_urls && count( $start_urls ) ) {
										$new_val          = implode( ',', $start_urls );
										$new_step[ $val ] = $new_val;
									}
								} elseif ( ! $step[ $val ] ) {
									$new_step[ $val ] = '$keep-prev-step-url';
								} else {
									$new_step[ $val ] = $step[ $val ];
								}
								if ( $new_step[ $val ] !== $step[ $val ] ) {
									$res['was_changed']           = true;
									$res['was_start_url_changed'] = true;
								}
							} elseif ( $force_relative_url_leading_slash ) {
								$new_step[ $val ] = self::fix_relative_url_without_leading_slash( $step[ $val ] );
								if ( $new_step[ $val ] !== $step[ $val ] ) {
									$res['was_changed']           = true;
									$res['was_start_url_changed'] = true;
								}
							} else {
								$new_step[ $val ] = $step[ $val ];
							}
						} else {
							$new_step[ $val ] = $step[ $val ];
						}
					} else {

						$res['was_changed'] = true;
						switch ( $val ) {
							case 'url':
								$res['was_start_url_changed'] = true;
								if ( $idx === 0 ) {
									$new_step[ $val ] = Arr::get( $start_urls, '0', '/' );

								} else {
									$new_step[ $val ] = '$keep-prev-step-url';
								}
								break;
							case 'skip_on_big_screen':
							case 'skip_on_mobile':
							case 'is_in_mobile_menu':
							case 'enable_interaction':
								$new_step[ $val ] = '0';
								break;
							default:
								$new_step[ $val ] = '';
						}
						if ( $on_new_step_prop_cb ) {
							$new_step = call_user_func_array( $on_new_step_prop_cb, [ $step, $new_step ] );
						}
					}
				}
				if ( $on_step_data_cb ) {
					$new_step_after_cb = call_user_func_array( $on_step_data_cb, [ $new_step ] );
					if ( $new_step_after_cb !== $new_step ) {
						$res['was_changed'] = true;
					}
					$new_step_data[] = $new_step_after_cb;
				} else {
					$new_step_data[] = $new_step;
				}
			}
			$res['decoded_data'] = $new_step_data;
			$table_raw_data      = Acf::create_table_field_from_assoc_array_of_columns_ntn( $new_step_data, false, true, $labels, DP_ACF_TABLE_VERSION );
			$res['raw_data']     = $table_raw_data;
			if ( $force_first_step_url || $res['was_start_url_changed'] || $force_relative_url_leading_slash ) {
				self::readjust_first_tour_page( $tour_ID, $start_urls, $new_step_data );
			}
		}
		return $res;
	}

	public static function readjust_first_tour_page( $tour_ID, $start_urls = null, $new_step_data = null ) {
		$_start_urls = $start_urls;
		if ( ! $_start_urls ) {
			$_start_urls = self::get_tour_start_page_url( $tour_ID, false, DPIT_STEPS_URL_TYPE_REL, false, true );
		}
		switch ( DP_INTRO_TOURS_DP_BUILD_TYPE ) {
			case 'FREE':
				$startPageId = self::get_tour_start_page_id( $tour_ID, false, true );
				if ( $startPageId ) {
					Acf::update_group_field( 'intro_trigger', 'intro_related_posts', $startPageId, $tour_ID );
				}
				self::set_steps_url( $tour_ID, $_start_urls, $_start_urls ? count( $_start_urls ) : 1 );
				break;
			case 'PRO':
				self::update_pro_url_relationships( $tour_ID, $new_step_data );
				break;
		}
	}

	public static function is_admin_tour_edit_page() {
		$screen = get_current_screen();
		return ( $screen && $screen->base == 'post' && $screen->post_type == 'dp_intro_tours' );
	}

	public static function store_plugin_version( $post_ID ) {
		if ( get_post_type( $post_ID ) == 'dp_intro_tours' ) {
			update_field( 'plugin_version', DP_INTRO_TOURS_DP_BUILD_TYPE . '_' . DP_INTRO_TOURS_VERSION, $post_ID );
		}
	}

	public static function init_step_table() {
		$stepDefs  = self::get_step_definitions();
		$step_data = array_map(
			function ( $val ) {
				return Arr::sget( $val, 'def' );
			},
			$stepDefs
		);
		$colValues = array_values( self::get_step_definition_names() );
		return Acf::create_table_field_from_assoc_array_of_columns_ntn( [ $step_data ], false, false, $colValues, DP_ACF_TABLE_VERSION );
	}

	public static function update_pro_url_relationships( $tour_ID, $step_data_assoc_array = null ) {
		if ( ! $step_data_assoc_array ) {
			$step_data_assoc_array = Acf::get_table_field_as_assoc_array_of_columns( 'intro_steps', $tour_ID, true );
		}

		$steps_url     = [];
		$start_url_cnt = 1;
		if ( $step_data_assoc_array ) {
			foreach ( $step_data_assoc_array as $idx => $step ) {
				$url = $step['url'];
				// manage post id of pages with this intro tour
				if ( $idx === 0 ) {
					$sub_urls = array_unique( array_filter( explode( ',', $url ) ) );
					if ( $sub_urls && count( $sub_urls ) ) {
						$start_url_cnt = count( $sub_urls );
						foreach ( $sub_urls as $sub_url ) {
							if ( $sub_url == '$keep-prev-step-url' || $sub_url == '$keep-current-url' ) {
								$steps_url[] = '/';
							} else {
								$steps_url[] = $sub_url;
							}
						}
					}
				} else {
					$steps_url[] = $url;
				}
			}
		}
		self::set_steps_url( $tour_ID, $steps_url, $start_url_cnt );
	}

	public static function unify_url(
		?string $url,
		bool $remove_query = true,
		bool $force_slash_q_mark = false,
		bool $remove_http_prefix = true,
		bool $relative = false,
		bool $force_q_mark_without_slash = false
	) {
		if ( $url ) {
			if ( $relative ) {
				$site_url = get_site_url();
				if ( Str::starts_with( $url, $site_url ) ) {
					$url = Str::separed_last_part( $url, $site_url, $url );
				}
			}
			if ( $remove_http_prefix ) {
				$url = Str::separed_last_part( $url, '://', $url );
				if ( $url ) {
					$url = ltrim( $url, 'www.' );
				}
			}
			if ( $url && $remove_query ) {
				$url = Str::separed_first_part( $url, '?', $url );
			} else {

				$url = Str::separed_first_part( $url, '#', $url );
				if ( $force_slash_q_mark ) {
					$url = self::force_slash_before_q_mark( $url );
				} elseif ( $force_q_mark_without_slash ) {
					$url = self::force_q_mark_without_slash( $url );
				}
			}
			if ( $url ) {
				$url = rtrim( $url, '/' );
			}
		}
		if ( empty( $url ) ) {
			$url = '/';
		}
		return $url;
	}

	public static function force_slash_before_q_mark( $url ) {
		$q_mark_idx = strpos( $url, '?' );
		if ( $q_mark_idx !== false ) {
			if ( $q_mark_idx === 0 || $url[ $q_mark_idx - 1 ] != '/' ) {
				$url = substr( $url, 0, $q_mark_idx ) . '/' . substr( $url, $q_mark_idx );
			}
		}
		return $url;
	}

	public static function force_q_mark_without_slash( $url ) {
		$q_mark_idx = strpos( $url, '?' );
		if ( $q_mark_idx !== false ) {
			if ( $q_mark_idx > 0 && $url[ $q_mark_idx - 1 ] == '/' ) {
				$url = substr( $url, 0, $q_mark_idx - 1 ) . substr( $url, $q_mark_idx );
			}
		}
		return $url;
	}

	public static function get_builder_api_key() {
		return 'ff125cb12ab';
	}

	public static function get_default_name_for_new_tour( $startPageTitle ) {
		if ( ! is_admin() ) {
			include_once ABSPATH . 'wp-admin/includes/post.php';
		}
		$idx = 0;
		do {
			$idx++;
			$tourName = $startPageTitle . ' Tour ' . $idx;
		} while ( post_exists( $tourName ) );
		return $tourName;
	}

	public static function is_dp_intro_cpt_admin() {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( $screen ) {
			return ( $screen->base === 'post' || $screen->base === 'edit' ) && $screen->post_type == 'dp_intro_tours';
		} else {
			return false;
		}
	}

	public static function get_position_select_options() {
		return [
			''       => __( 'Auto', 'dp-intro-tours' ),
			'bottom' => __( 'Bottom', 'dp-intro-tours' ),
			'top'    => __( 'Top', 'dp-intro-tours' ),
			'right'  => __( 'Right', 'dp-intro-tours' ),
			'left'   => __( 'Left', 'dp-intro-tours' ),
			'center' => __( 'Center', 'dp-intro-tours' ),
		];
	}

	public static function get_highlight_select_options() {
		return [
			''         => __( 'Auto', 'dp-intro-tours' ),
			'light_bg' => __( 'Light bg', 'dp-intro-tours' ),
			'dark_bg'  => __( 'Dark bg', 'dp-intro-tours' ),
		];
	}



	public static function get_themes_select_options() {
		return ( DP_INTRO_TOURS_IS_PRO )
		? [ 'light:Light', 'light2:Light Fancy', 'dark:Dark', 'dark2:Dark Fancy', 'colored:Colored', 'flat:Flat', 'flat2:Flat Adaptive', 'modern:Modern', 'fancybar:Fancy bar' ]
		: [ 'light:Light', 'light2:Light Fancy', 'colored:Colored', 'modern:Modern' ];
	}

	public static function get_themes_select_placeholder() {
		return ( DP_INTRO_TOURS_IS_PRO )
		? 'choose from: Light|Light Fancy|Dark|Dark Fancy|Colored|Flat|Flat Adaptive|Modern|Fancy bar'
		: 'choose from: Light|Light Fancy|Colored|Modern';
	}

	public static function get_pro_link_html( $postfix = null, $title = null ) {
		$link = DP_INTRO_TOURS_PRODUCT_LINK_PRO;
		if ( $postfix ) {
			$link .= $postfix;
		}
		$title = $title ? $title : DP_INTRO_TOURS_PRODUCT_TITLE_PRO;
		return '<a href="' . $link . '" target="_blank"><strong>' . $title . '</strong></a>';
	}

	public static function get_themes_select_def_val() {
		return 'light2';
	}

	public static function enqueue_dynamic_css( $already_enqueued_style_handle, $cssText ) {
		if ( $cssText && $already_enqueued_style_handle ) {
			wp_add_inline_style( "wpackio_dpIntroToursmain_main/${already_enqueued_style_handle}.css_style", $cssText );
		}
	}

	public static function enqueue_dynamic_css_admin_colors( $already_enqueued_style_handle ) {
		$colors = get_transient( self::get_transient_id( 'dpintro_admin_colors' ) );
		if ( $colors ) {
			$dynamic_data = '';
			$idx          = 1;
			foreach ( $colors as $color_str ) {
				$color_rgb_arr = Color::text2rgba( $color_str );
				if ( $color_rgb_arr && count( $color_rgb_arr ) >= 3 ) {
					$dynamic_data .= "--dpu-color-${idx}: " . $color_rgb_arr[0] . ', ' . $color_rgb_arr[1] . ', ' . $color_rgb_arr[2] . '; ' . PHP_EOL;
					$idx++;
				}
			}
			if ( $dynamic_data ) {
				$css_data = 'body{' . PHP_EOL . $dynamic_data . ' }';
				self::enqueue_dynamic_css( $already_enqueued_style_handle, $css_data );
			}
		}
	}

	private static function get_system_url_var_val( $id ) {
		switch ( $id ) {
			case '$current-user-id':
				return strval( get_current_user_id() );
			case '$current-user-login':
				$current_user = wp_get_current_user();
				return $current_user ? sanitize_title( $current_user->user_login ) : '';
			default:
				return '';
		}
	}

	public static function get_all_system_url_vars( $tour_id ) {
		$variables = [];
		foreach ( [ '$current-user-id', '$current-user-login' ] as $var_id ) {
			$variables[ $var_id ] = self::get_system_url_var_val( $var_id );
		}
		$variables = apply_filters( 'dpintro_sys_url_var', $variables, $tour_id );

		return $variables;
	}

}
