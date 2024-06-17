<?php

use IntroToursDP\Wp\Acf;
use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;


// Aktuální verze
define( 'DPIT_DB_VERSION', 6 );

class Dp_Intro_Tours_Upgrade {



	public function __construct() {
		//update_option( 'dpit_db_version', 4 );
	}

	public function init() {
		$currently_saved_db_version = get_option( 'dpit_db_version', false );
		if ( $currently_saved_db_version < DPIT_DB_VERSION ) {
			switch ( $currently_saved_db_version ) {
				case false:
					update_option( 'dpit_db_version', DPIT_DB_VERSION );
					break;
				case 0:
				case 1:
					/* UPGRADE CODE GOES HERE */
					// Back compatibility of accent color ( was changed to purple for new installations)
					// Keep turquoise for old installations
					if ( ! Settings::get_setting_array_field( 'dp_it_general_options', 'dp_it_accent_color', '' ) ) {
						Settings::update_setting_array( 'dp_it_general_options', 'dp_it_accent_color', '#2f6e6d' );
					}
					$this->go_trough_all_tours( [ $this, 'set_steps_url_meta' ] ); // Upgrade to major 2.*.*
					update_option( 'dpit_db_version', 2 );
					break;
				case 2:
					$this->go_trough_all_tours( [ $this, 'upgrade_mobile_menu_alt' ] );
					update_option( 'dpit_db_version', 3 );
					break;
				case 3:
					$this->go_trough_all_tours( [ $this, 'force_q_mark_without_slash_in_admin_url' ] );
					update_option( 'dpit_db_version', 4 );
					break;
				case 4:
					$this->go_trough_all_tours( [ $this, 'rebuild_steps' ] );
					update_option( 'dpit_db_version', 5 );
					break;
				case 5:
					$this->go_trough_all_tours( [ $this, 'rebuild_steps' ] );
					update_option( 'dpit_db_version', 6 );
					break;
				default:
					break;
			}
		}
		// PRO vs FREE data compatibility
		$this->check_build_type_compatibility_for_all_tours();

	}

	private function check_build_type_compatibility_for_all_tours() {
		$build_type = get_option( 'dpit_plugin_build_type', null );
		if ( ! $build_type || $build_type !== DP_INTRO_TOURS_DP_BUILD_TYPE ) {
			// Build type was changed
			$this->go_trough_all_tours( [ $this, 'fix_build_type_change' ] );
			update_option( 'dpit_plugin_build_type', DP_INTRO_TOURS_DP_BUILD_TYPE );
		}
	}

	private function fix_build_type_change() {
		$tour_ID = get_the_ID();
		switch ( DP_INTRO_TOURS_DP_BUILD_TYPE ) {
			case 'PRO':
				// From FREE to PRO
				$recreate_res = Dp_Intro_Tours_Helper::recreate_step_table( $tour_ID, null, true );
				if ( $recreate_res['was_changed'] ) {
					Dp_Intro_Tours_Helper::store_plugin_version( $tour_ID );

					update_field( 'intro_steps', $recreate_res['raw_data'], $tour_ID );
				}
				break;
			case 'FREE':
				// From PRO to FREE
				Dp_Intro_Tours_Helper::readjust_first_tour_page( $tour_ID );
				break;
		}
	}

	private function set_steps_url_meta() {
		$tour_ID              = get_the_ID();
		$stored_by_build_type = Dp_Intro_Tours_Helper::get_plugin_version_from_intro_data( $tour_ID, true );
		if ( $stored_by_build_type && $stored_by_build_type !== DP_INTRO_TOURS_DP_BUILD_TYPE ) {
			$this->_set_steps_url_meta( $tour_ID, $stored_by_build_type );
		}
		$this->_set_steps_url_meta( $tour_ID, DP_INTRO_TOURS_DP_BUILD_TYPE );
	}

	public function upgrade_mobile_menu_alt_step_props( $old_step, $new_step ) {
		$mob_menu_selector = Arr::sget( $old_step, 'selector_in_mobile_menu' );
		if ( $mob_menu_selector ) {
			$new_step['alt_mobile_selector'] = $mob_menu_selector;
			$new_step['is_in_mobile_menu']   = '1';
		}
		return $new_step;
	}

	private function upgrade_mobile_menu_alt() {
		if ( DP_INTRO_TOURS_IS_PRO ) {
			$tour_ID      = get_the_ID();
			$recreate_res = Dp_Intro_Tours_Helper::recreate_step_table( $tour_ID, null, false, true, [ $this, 'upgrade_mobile_menu_alt_step_props' ] );
			if ( $recreate_res['was_changed'] ) {
				Dp_Intro_Tours_Helper::store_plugin_version( $tour_ID );
				update_field( 'intro_steps', $recreate_res['raw_data'], $tour_ID );
			}
		}
	}

	public function force_q_mark_without_slash_in_admin_url_step_props( $step_data ) {
		$url = Arr::sget( $step_data, 'url' );
		if ( $url ) {
			$force_q_mark_without_slash = Str::starts_with( $url, '/wp-admin' );
			$step_data['url']           = Dp_Intro_Tours_Helper::unify_url( $url, false, false, true, false, $force_q_mark_without_slash );
		}
		return $step_data;
	}

	private function force_q_mark_without_slash_in_admin_url() {
		$tour_ID = get_the_ID();
		if ( DP_INTRO_TOURS_IS_PRO ) {
			$recreate_res = Dp_Intro_Tours_Helper::recreate_step_table( $tour_ID, null, false, true, null, [ $this, 'force_q_mark_without_slash_in_admin_url_step_props' ] );
			if ( $recreate_res['was_changed'] ) {
				Dp_Intro_Tours_Helper::store_plugin_version( $tour_ID );
				update_field( 'intro_steps', $recreate_res['raw_data'], $tour_ID );
			}
			Dp_Intro_Tours_Helper::update_steps_url( $tour_ID );
		}
	}

	private function rebuild_steps() {
		$tour_ID      = get_the_ID();
		$recreate_res = Dp_Intro_Tours_Helper::recreate_step_table( $tour_ID, null );
		if ( $recreate_res['was_changed'] ) {
			Dp_Intro_Tours_Helper::store_plugin_version( $tour_ID );
			update_field( 'intro_steps', $recreate_res['raw_data'], $tour_ID );
		}
		Dp_Intro_Tours_Helper::update_steps_url( $tour_ID );
	}

	private function _set_steps_url_meta( $tour_ID, $build_type ) {
		switch ( $build_type ) {
			case 'PRO':
				// From FREE to PRO
				$recreate_res = Dp_Intro_Tours_Helper::recreate_step_table( $tour_ID, null, false, true );
				if ( $recreate_res['was_changed'] ) {
					Dp_Intro_Tours_Helper::store_plugin_version( $tour_ID );
					update_field( 'intro_steps', $recreate_res['raw_data'], $tour_ID );
				}
				break;
			case 'FREE':
				// From PRO to FREE
				Dp_Intro_Tours_Helper::update_steps_url( $tour_ID, $build_type );
				break;
		}
	}


	private function go_trough_all_tours( $action_callback = null, $additional_query_args = null ) {
		if ( $action_callback ) {
			$args = [
				'post_type'      => 'dp_intro_tours',
				'posts_per_page' => '-1',
				//'post__in'       => [ 46 ],
			];
			//'post__in' => [4123], 'post__in' => [2313, 2431]
			if ( $additional_query_args ) {
				$args = array_merge( $args, $additional_query_args );
			}
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$tour_ID = get_the_ID();
					call_user_func( $action_callback );
				}
			}
			wp_reset_query();
		}
	}
}
