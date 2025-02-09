<?php
/**
 * LearnDash Settings Section for Lessons Custom Post Type Metabox.
 *
 * @since 2.4.0
 * @package LearnDash\Settings\Sections
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ( class_exists( 'LearnDash_Settings_Section' ) ) && ( ! class_exists( 'LearnDash_Settings_Lessons_CPT' ) ) ) {
	/**
	 * Class LearnDash Settings Section for Lessons Custom Post Type Metabox.
	 *
	 * @since 2.4.0
	 */
	class LearnDash_Settings_Lessons_CPT extends LearnDash_Settings_Section {

		/**
		 * Protected constructor for class
		 *
		 * @since 2.4.0
		 */
		protected function __construct() {

			// What screen ID are we showing on.
			$this->settings_screen_id = 'sfwd-lessons_page_lessons-options';

			// The page ID (different than the screen ID).
			$this->settings_page_id = 'lessons-options';

			// This is the 'option_name' key used in the wp_options table.
			$this->setting_option_key = 'learndash_settings_lessons_cpt';

			// This is the HTML form field prefix used.
			$this->setting_field_prefix = 'learndash_settings_lessons_cpt';

			// Used within the Settings API to uniquely identify this section.
			$this->settings_section_key = 'cpt_options';

			// Section label/header.
			$this->settings_section_label = sprintf(
				// translators: placeholder: Lesson.
				esc_html_x( '%s Custom Post Type Options', 'placeholder: Lesson', 'learndash' ),
				learndash_get_custom_label( 'lesson' )
			);

			// Used to show the section description above the fields. Can be empty.
			$this->settings_section_description = sprintf(
				// translators: placeholder: Lessons.
				esc_html_x( 'Control options specific to the %s post type', 'placeholder: Lessons', 'learndash' ),
				learndash_get_custom_label( 'lessons' )
			);

			parent::__construct();
		}

		/**
		 * Initialize the metabox settings values.
		 *
		 * @since 2.4.0
		 */
		public function load_settings_values() {
			parent::load_settings_values();

			if ( empty( $this->setting_option_values ) ) {
				$this->setting_option_values = array(
					'include_in_search'    => 'yes',
					'search_login_only'    => '',
					'search_enrolled_only' => '',
					'has_archive'          => '',
					'has_feed'             => '',
					'supports'             => array( 'thumbnail', 'revisions' ),
				);
			}

			if ( ! isset( $this->setting_option_values['include_in_search'] ) ) {
				if ( ( isset( $this->setting_option_values['exclude_from_search'] ) ) && ( 'yes' === $this->setting_option_values['exclude_from_search'] ) ) {
					$this->setting_option_values['include_in_search'] = '';
				} else {
					$this->setting_option_values['include_in_search'] = 'yes';
				}
			}

			if ( ! isset( $this->setting_option_values['search_login_only'] ) ) {
				$this->setting_option_values['search_login_only'] = '';
			}

			if ( ! isset( $this->setting_option_values['search_enrolled_only'] ) ) {
				$this->setting_option_values['search_enrolled_only'] = '';
			}

			if ( ! isset( $this->setting_option_values['has_archive'] ) ) {
				$this->setting_option_values['has_archive'] = '';
			}

			if ( ! isset( $this->setting_option_values['has_feed'] ) ) {
				$this->setting_option_values['has_feed'] = '';
			}

			if ( ! isset( $this->setting_option_values['supports'] ) ) {
				$this->setting_option_values['supports'] = array( 'thumbnail', 'revisions' );
			}

			if ( 'yes' !== $this->setting_option_values['include_in_search'] ) {
				$this->setting_option_values['search_login_only']    = '';
				$this->setting_option_values['search_enrolled_only'] = '';
			}
		}

		/**
		 * Initialize the metabox settings fields.
		 *
		 * @since 2.4.0
		 */
		public function load_settings_fields() {
			$cpt_archive_url = home_url( LearnDash_Settings_Section::get_section_setting( 'LearnDash_Settings_Section_Permalinks', 'lessons' ) );
			$cpt_rss_url     = add_query_arg( 'post_type', 'sfwd-lessons', get_post_type_archive_feed_link( 'post' ) );

			$this->setting_option_fields = array(
				'include_in_search'    => array(
					'name'                => 'include_in_search',
					'type'                => 'checkbox-switch',
					'label'               => sprintf(
						// translators: placeholder: Lesson.
						esc_html_x( '%s Search', 'placeholder: Lesson', 'learndash' ),
						learndash_get_custom_label( 'lesson' )
					),
					'help_text'           => sprintf(
						// translators: placeholder: lesson.
						esc_html_x( 'Includes the %s post type in front end search results', 'placeholder: lesson', 'learndash' ),
						learndash_get_custom_label_lower( 'lesson' )
					),
					'value'               => $this->setting_option_values['include_in_search'],
					'options'             => array(
						'yes' => '',
					),
					'child_section_state' => ( 'yes' === $this->setting_option_values['include_in_search'] ) ? 'open' : 'closed',
				),
				'search_login_only'    => array(
					'name'           => 'search_login_only',
					'type'           => 'checkbox-switch',
					'label'          => esc_html__( 'Logged-in User only', 'learndash' ),
					'help_text'      => sprintf(
						// translators: placeholder: Lessons.
						esc_html_x( 'Include %s only if user is logged in.', 'placeholder: Lessons', 'learndash' ),
						learndash_get_custom_label( 'lessons' )
					),
					'value'          => $this->setting_option_values['search_login_only'],
					'options'        => array(
						''    => '',
						'yes' => '',
					),
					'parent_setting' => 'include_in_search',
				),
				'search_enrolled_only' => array(
					'name'           => 'search_enrolled_only',
					'type'           => 'checkbox-switch',
					'label'          => esc_html__( 'Enrolled only', 'learndash' ),
					'help_text'      => sprintf(
						// translators: placeholder: Lessons.
						esc_html_x( 'Include %s only if user is enrolled.', 'placeholder: Lessons', 'learndash' ),
						learndash_get_custom_label( 'lessons' )
					),
					'value'          => $this->setting_option_values['search_enrolled_only'],
					'options'        => array(
						''    => '',
						'yes' => '',
					),
					'parent_setting' => 'include_in_search',
				),
				'has_archive'          => array(
					'name'                => 'has_archive',
					'type'                => 'checkbox-switch',
					'label'               => esc_html__( 'Archive Page', 'learndash' ),
					'help_text'           => sprintf(
						// translators: placeholder: lessons, link to WP Permalinks page.
						esc_html_x( 'Enables the front end archive page where all %1$s are listed. You must %2$s for the change to take effect.', 'placeholder: , link to WP Permalinks page', 'learndash' ),
						learndash_get_custom_label_lower( 'lessons' ),
						'<a href="' . admin_url( 'options-permalink.php' ) . '">' . esc_html__( 're-save your permalinks', 'learndash' ) . '</a>'
					),
					'value'               => $this->setting_option_values['has_archive'],
					'options'             => array(
						''    => '',
						'yes' => sprintf(
							// translators: placeholder: URL for CPT Archive.
							esc_html_x( 'Archive URL: %s', 'placeholder: URL for CPT Archive', 'learndash' ),
							'<code><a target="blank" href="' . $cpt_archive_url . '">' . $cpt_archive_url . '</a></code>'
						),
					),
					'child_section_state' => ( 'yes' === $this->setting_option_values['has_archive'] ) ? 'open' : 'closed',
				),
				'has_feed'             => array(
					'name'           => 'has_feed',
					'type'           => 'checkbox-switch',
					'label'          => esc_html__( 'RSS/Atom Feed', 'learndash' ),
					'help_text'      => sprintf(
						// translators: placeholder: lesson.
						esc_html_x( 'Enables an RSS feed for all %1$s posts.', 'placeholder: lesson', 'learndash' ),
						learndash_get_custom_label_lower( 'lesson' )
					),
					'value'          => $this->setting_option_values['has_feed'],
					'options'        => array(
						''    => '',
						'yes' => sprintf(
							// translators: placeholder: URL for CPT Archive.
							esc_html_x( 'RSS Feed URL: %s', 'placeholder: URL for RSS Feed', 'learndash' ),
							'<code><a target="blank" href="' . $cpt_rss_url . '">' . $cpt_rss_url . '</a></code>'
						),
					),
					'parent_setting' => 'has_archive',
				),
				'supports'             => array(
					'name'      => 'supports',
					'type'      => 'checkbox',
					'label'     => esc_html__( 'Editor Supported Settings', 'learndash' ),
					'help_text' => esc_html__( 'Enables WordPress supported settings within the editor and theme.', 'learndash' ),
					'value'     => $this->setting_option_values['supports'],
					'options'   => array(
						'thumbnail'     => esc_html__( 'Featured image', 'learndash' ),
						'comments'      => esc_html__( 'Comments', 'learndash' ),
						'custom-fields' => esc_html__( 'Custom Fields', 'learndash' ),
						'revisions'     => esc_html__( 'Revisions', 'learndash' ),
					),
				),
			);

			if ( ( ! defined( 'LEARNDASH_FILTER_SEARCH' ) ) || ( LEARNDASH_FILTER_SEARCH !== true ) ) {
				unset( $this->setting_option_fields['search_login_only'] );
				unset( $this->setting_option_fields['search_enrolled_only'] );
			}

			/** This filter is documented in includes/settings/settings-metaboxes/class-ld-settings-metabox-course-access-settings.php */
			$this->setting_option_fields = apply_filters( 'learndash_settings_fields', $this->setting_option_fields, $this->settings_section_key );

			parent::load_settings_fields();
		}

		/**
		 * Intercept the WP options save logic and check that we have a valid nonce.
		 *
		 * @since 2.4.0
		 *
		 * @param array  $new_values         Array of section fields values.
		 * @param array  $old_values         Array of old values.
		 * @param string $setting_option_key Section option key should match $this->setting_option_key.
		 */
		public function section_pre_update_option( $new_values = '', $old_values = '', $setting_option_key = '' ) {
			if ( $setting_option_key === $this->setting_option_key ) {
				$new_values = parent::section_pre_update_option( $new_values, $old_values, $setting_option_key );
				if ( ! isset( $new_values['include_in_search'] ) ) {
					$new_values['include_in_search'] = '';
				}

				if ( ! isset( $new_values['has_archive'] ) ) {
					$new_values['has_archive'] = '';
					$new_values['has_feed']    = '';
				}

				if ( ! isset( $new_values['has_feed'] ) ) {
					$new_values['has_feed'] = '';
				}

				if ( ! isset( $new_values['supports'] ) ) {
					$new_values['supports'] = array();
				}

				if ( $new_values !== $old_values ) {
					if ( ( ! isset( $old_values['has_archive'] ) ) || ( $new_values['has_archive'] !== $old_values['has_archive'] ) ) {
						learndash_setup_rewrite_flush();
					}
				}
			}

			return $new_values;
		}

		// End of functions.
	}
}

add_action(
	'learndash_settings_sections_init',
	function() {
		LearnDash_Settings_Lessons_CPT::add_section_instance();
	}
);
