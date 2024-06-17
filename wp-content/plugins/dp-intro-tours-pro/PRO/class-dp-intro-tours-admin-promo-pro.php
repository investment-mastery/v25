<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Wp\AdminNotice;
use IntroToursDP\Std\Html\Element;

class Dp_Intro_Tours_Admin_Promo_PRO {

	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;


	protected $adminator;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $adminator ) {
		$this->plugin_name = '<strong>' . DP_INTRO_TOURS_NAME . '</strong>';
		$this->adminator   = $adminator;
		$this->extend_info = Dp_Intro_Tours_Helper::get_generic_i18n( 'extend_call' );
	}

	public function add_admin_notice() {
		$screen = get_current_screen();
		if ( ! $screen ) {
			return;
		}

		switch ( $screen->base ) {
			case 'dashboard':
				$this->try_render_notices( 10, true );
				break;
			case 'toplevel_page_dp_intro_tours':
				$this->try_render_notices( 10, true, false );
				break;
			case 'post':
			case 'edit':
				if ( $screen->post_type === 'dp_intro_tours' ) {
					$this->try_render_notices( 30, false );
				} else {
					$this->try_render_notices( 10, false );
				}
				break;
			default:
				$this->try_render_notices( 10, false );
		}

	}

	public function try_render_notices( $lessDaysThenExpiredSoon = 20, $createFirstTourEnabled = true, $notActiveEn = true ) {
		if ( ! $this->try_render_expired_notice() ) {
			if ( ! $notActiveEn || ! $this->try_render_not_active() ) {
				if ( ! $this->try_render_expired_soon_notice( $lessDaysThenExpiredSoon ) ) {
					if ( $createFirstTourEnabled ) {
						$this->try_render_create_your_first_tour_notice();
					}
				}
			}
		}
	}

	public function try_render_not_active() {
		if ( Settings::get_setting_array_field( 'dp_it_hidden_options', 'adminated', '0' ) != 1 ) {
			AdminNotice::render_notice(
				$this->plugin_name . ' ' . __( 'is not activated. Activate to maintain full functionality with compatibility and security updates and new features.', 'dp-intro-tours' ),
				'warning',
				true,
				get_site_url( null, '/wp-admin/admin.php?page=dp_intro_tours&tab=license' ),
				'button button-primary dp-notice__button--sub-smcaps',
				__( 'ACTIVATE', 'dp-intro-tours' ),
				false,
				__( 'at plugin options page', 'dp-intro-tours' )
			);
			return true;
		}
		return false;
	}

	public function try_render_expired_notice() {
		if ( $this->adminator->is_adminity_expired() ) {
			AdminNotice::render_notice(
				sprintf( __( 'Unfortunately your license for %s already expired.', 'dp-intro-tours' ), $this->plugin_name ) . ' ' . $this->extend_info,
				'error',
				true,
				DP_INTRO_TOURS_PRODUCT_KEY_BUY_LINK_PRO,
				'button button-primary button-pro-promo dp-notice__button--sub-smcaps',
				__( 'EXTEND NOW', 'dp-intro-tours' ),
				true,
				__( 'to maintain full functionality', 'dp-intro-tours' )
			);
			return true;
		}
		return false;
	}

	public function try_render_expired_soon_notice( $lessDaysThen = 20 ) {
		$remainingDays = $this->adminator->get_remaining_days();
		if ( isset( $remainingDays ) && $remainingDays < $lessDaysThen ) {
			if ( $remainingDays > 0 ) {
				$remainingDaysStr = sprintf( __( 'in %d days', 'dp-intro-tours' ), $remainingDays );
			} else {
				$remainingDaysStr = __( 'today', 'dp-intro-tours' );
			}
			$remainingDaysStr = '<strong>' . $remainingDaysStr . '</strong>';
			AdminNotice::render_notice(
				sprintf( __( 'Your license for %1$s is expiring %2$s.', 'dp-intro-tours' ), $this->plugin_name, $remainingDaysStr ) . ' ' . $this->extend_info,
				'warning',
				true,
				DP_INTRO_TOURS_PRODUCT_KEY_BUY_LINK_PRO,
				'button button-primary button-pro-promo dp-notice__button--sub-smcaps',
				__( 'EXTEND NOW', 'dp-intro-tours' ),
				true,
				__( 'to maintain full functionality', 'dp-intro-tours' )
			);
			return true;
		}
		return false;
	}

	public function try_render_create_your_first_tour_notice() {
		$query = new WP_Query(
			[
				'post_type'      => 'dp_intro_tours',
				'posts_per_page' => '-1',
			]
		);
		$count = $query->post_count;
		wp_reset_query();
		if ( $count === 0 ) {
			AdminNotice::render_raw_notice(
				[
					new Element( 'p', 'text', null, __( 'Creating of guided tutorial tours for your web can be easy and fun. Excited to start building your first intro tour?', 'dp-intro-tours' ) ),
					new Element(
						'a',
						'button',
						[
							'class'  => 'button button-primary button-pro-promo',
							'href'   => get_site_url(
								null,
								Dp_Intro_Tours_Helper::build_dp_query_string(
									[
										'dp_qpb_builder_mode' => 1,
										'dp_qpb_builder_origin' => 'frontend',
										'dp_qp_run_always_on_load' => 1,
										'dp_qpb_create_new'   => 1,
									],
									Dp_Intro_Tours_Helper::get_dp_intro_query_params()
								)
							), //'dp_to_check ?dp_qpb_builder_mode=1&dp_qpb_builder_origin=frontend&dp_qp_run_always_on_load=1&dp_qpb_create_new=1' ),
							'target' => '',
						],
						[ __( 'Create first tour with VISUAL BUILDER', 'dp-intro-tours' ), new Element( 'span', 'sub-text', null, __( 'Starting with the home page' ), 'scaps' ) ]
					),
					new Element(
						'a',
						'button',
						[
							'class'  => 'button button-secondary',
							'href'   => get_site_url( null, '/wp-admin/post-new.php?post_type=dp_intro_tours' ),
							'target' => '',
						],
						[ __( 'Configure your first tour', 'dp-intro-tours' ), new Element( 'span', 'sub-text', null, __( 'Design, behaviour, triggers, steps' ), 'scaps' ) ],
						'secondary'
					),
				],
				'success',
				'dp-notice',
				null,
				'dp-notice--2-buttons'
			);
			return true;
		}
		return false;
	}


}
