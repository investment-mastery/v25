<?php

class Dp_Intro_Tours_Wplink {

	private $link_dialog_printed = false;
	private $builder_mode        = false;

	public function __construct( $builderMode ) {
		$this->builder_mode = $builderMode;
	}

	public function wp_link_dialog() {
		if ( ! $this->builder_mode && is_admin() && ! Dp_Intro_Tours_Helper::is_admin_tour_edit_page() ) {
			return;
		}
		// Run once.
		if ( $this->link_dialog_printed ) {
			return;
		}

		$this->link_dialog_printed = true;

		// `display: none` is required here, see #WP27605.
		?>
		<div id="dp_wp-link-backdrop" style="display: none"></div>
		<div id="dp_wp-link-wrap" class="wp-core-ui dp_wp-link-wrap" style="display: none" role="dialog" aria-labelledby="dp_link-modal-title">
			<form id="dp_wp-link" tabindex="-1">
		<?php
		// wp_nonce_field( 'internal-linking', '_dp_ajax_linking_nonce', false );
		?>
				<div id="dp_link-modal-title"><?php _e( 'Insert/edit link' ); ?></div>
				<button type="button" id="dp_wp-link-close"><span class="screen-reader-text"><?php _e( 'Close' ); ?></span></button>
				<div id="dp_link-selector">
					<div id="link-options">
						<p class="howto" id="wplink-enter-url"><?php _e( 'Enter the destination URL' ); ?></p>
						<div>
							<label><span><?php _e( 'URL' ); ?></span>
								<input id="dp_wp-link-url" type="text" aria-describedby="wplink-enter-url" /></label>
						</div>
						<div class="wp-link-text-field">
							<label><span><?php _e( 'Link Text' ); ?></span>
								<input id="wp-link-text" type="text" /></label>
						</div>
						<div class="link-target">
							<label><span></span>
								<input type="checkbox" id="wp-link-target" /> <?php _e( 'Open link in a new tab' ); ?></label>
						</div>
					</div>
					<p class="howto" id="wplink-link-existing-content"><?php _e( 'Or search:', 'dp-intro-tours' ); ?></p>
					<div id="dpwplink-url-vars-wrap" class="dpwplink-inactive-el">
						<label for="dpwplink-sys-url-vars" class="dpwplink-url-vars-label">
							<span><?php echo __( 'Available system url variables', 'dp-intro-tours' ); ?></span>
							<div class="dp-info-icon dp-info-icon--inline dp-info-icon--ia" data-info-text="
			<?php
			echo ( '<strong class=\'info-tip-title\'>'
			. __( 'Insert system url variable by click.', 'dp-intro-tours' )
			. '</strong>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'system_url_vars_desc' )
			. '<br>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'system_url_vars_example' )
			. '<br>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'system_url_vars_desc_detail' ) );
			?>
							">
							</div>
						</label>
						<ul id="dpwplink-sys-url-vars" class="dpwplink-url-vars dpwplink-url-vars--system"></ul>

						<label for="dpwplink-url-vars" id="dpwplink-url-vars-1st-step" class="dpwplink-url-vars-label">
							<span><?php echo __( 'Custom url variable example values', 'dp-intro-tours' ); ?></span>
							<div class="dp-info-icon dp-info-icon--inline" data-info-text="
			<?php
			echo ( '<strong class=\'info-tip-title\'>'
			. __( 'Custom url variables', 'dp-intro-tours' )
			. '</strong>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'custom_url_vars_desc_detail' )
			. '<br>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'custom_url_vars_example' ) );
			?>
							">
							</div>
						</label>
						<div id="dpwplink-url-vars-hint-1st-step" class="dpwplink-custom-url-vars-hint"><?php echo sprintf( __( 'You can insert custom URL variables by entering an identifier enclosed in curly braces eg. %s', 'dp-intro-tours' ), '<strong>{product-id}</strong>' ); ?></div>
						<div id="dpwplink-url-vars-hint-1st-step-fill" class="dpwplink-custom-url-vars-hint"><?php echo __( 'Please fill example values, so we know, where to run a visual builder', 'dp-intro-tours' ); ?></div>

						<label for="dpwplink-url-vars" id="dpwplink-url-vars-other-step" class="dpwplink-url-vars-label">
							<span><?php echo __( 'Available custom url variables', 'dp-intro-tours' ); ?></span>
							<div class="dp-info-icon dp-info-icon--inline" data-info-text="
			<?php
			echo ( '<strong class=\'info-tip-title\'>'
			. __( 'Insert custom url variable by click', 'dp-intro-tours' )
			. '</strong>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'custom_url_vars_desc_detail' )
			. '<br>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'custom_url_vars_example' ) );
			?>
						"></div>
						</label>
						<div id="dpwplink-url-vars-hint-next-steps" class="dpwplink-custom-url-vars-hint"><?php echo __( 'You have no URL variables defined in the 1st step.', 'dp-intro-tours' ); ?></div>
						<ul id="dpwplink-url-vars" class="dpwplink-url-vars dpwplink-url-vars--custom"></ul>
					</div>
					<div id="search-panel">
						<div class="link-search-wrapper">
							<label>
								<span class="search-label"><?php _e( 'Search' ); ?></span>
								<input type="search" id="dp_wp-link-search" class="link-search-field" autocomplete="off" aria-describedby="wplink-link-existing-content" />
								<span class="spinner"></span>
							</label>
						</div>
						<div id="dp_search-results" class="query-results" tabindex="0">
							<ul></ul>
							<div class="river-waiting">
								<span class="spinner"></span>
							</div>
						</div>
						<div id="dp_most-recent-results" class="query-results" tabindex="0">
							<div class="query-notice" id="query-notice-message">
								<em class="query-notice-default"><?php _e( 'No search term specified. Showing recent items.' ); ?></em>
								<em class="query-notice-hint screen-reader-text"><?php _e( 'Search or use up and down arrow keys to select an item.' ); ?></em>
							</div>
							<ul></ul>
							<div class="river-waiting">
								<span class="spinner"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="submitbox">
					<div id="dp_wp-link-cancel">
						<button type="button" class="button"><?php _e( 'Cancel' ); ?></button>
					</div>
					<div id="dp_wp-link-update">
						<input type="submit" value="<?php esc_attr_e( 'Add Link' ); ?>" class="button button-primary" id="dp_wp-link-submit" name="dp_wp-link-submit">
						<span class="spinner"></span>
					</div>
				</div>
			</form>
		</div>
		<?php
	}

	public static function get_dwplink_config( $load_tippy = false ) {
		return [
			'siteUrl'                       => get_site_url(),
			'ajaxUrl'                       => admin_url( 'admin-ajax.php' ),
			'dpDebugEn'                     => Dp_Intro_Tours_Helper::is_debug_console_en(),
			'_dp_wplink_nonce'              => wp_create_nonce( 'dp_wplink_nonce' ),
			'assetsUrl'                     => plugin_dir_url( __FILE__ ) . '../includes/assets',
			'loadTippy'                     => $load_tippy,
			'allowedPostTypesInPagePostURL' => [
				__( 'page', 'dp-intro-tours' ),
				__( 'product', 'dp-intro-tours' ),
				__( 'post', 'dp-intro-tours' ),
				__( 'portfolio', 'dp-intro-tours' ),
				'all_post_types',
			],
			'disabledPostTypes'             => [
				__( 'intro tour' ),
			],
			'title'                         => __( 'Edit link of %s step', 'dp-intro-tours' ),
			'update'                        => __( 'Update', 'dp-intro-tours' ),
			'save'                          => __( 'Confirm', 'dp-intro-tours' ),
			'noTitle'                       => __( '(no title)' ),
			'noMatchesFound'                => __( 'No results found.', 'dp-intro-tours' ),
			'keepCurrentUrl'                => __( '$KEEP CURRENT URL', 'dp-intro-tours' ),
			'variableLink'                  => __( 'variable link', 'dp-intro-tours' ),
			'keepCurrentUrlLngInfo'         => __( 'similar to PREV. STEP but eg. it is keeping following step when you walk tour back', 'dp-intro-tours' ),
			'keepPreviousStepUrl'           => __( '$KEEP PREV. STEP URL', 'dp-intro-tours' ),
			'keepPreviousStepUrlLngInfo'    => __( 'keeps always previous (lower idx) step', 'dp-intro-tours' ),
			'linkSelected'                  => __( 'Link selected.', 'dp-intro-tours' ),
			'linkInserted'                  => __( 'Link inserted.', 'dp-intro-tours' ),
			// 'searchLabel'                   => __( 'Or search:', 'dp-intro-tours' ),
			'queryNoticeDefault'            => __( 'No search term specified. Showing recent pages, products and posts.', 'dp-intro-tours' ),
			// translators: Minimum input length in characters to start searching posts in the "Insert/edit link" modal.
			'minInputLength'                => (int) _x( '1', 'minimum input length for searching post links', 'dp-intro-tours' ),
		];
	}

	public static function enqueue_style() {
		wp_enqueue_style( 'editor-buttons' );
	}

	public function dp_wp_link_ajax() {
		check_ajax_referer( 'dp_wplink_nonce', '_dp_wplink_nonce' );

		$args = [];

		if ( isset( $_POST['search'] ) ) {
			$args['s'] = wp_unslash( $_POST['search'] );
		}

		if ( isset( $_POST['term'] ) ) {
			$args['s'] = wp_unslash( $_POST['term'] );
		}

		$args['pagenum'] = ! empty( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;

		$results = self::wp_link_query( $args );

		if ( ! isset( $results ) ) {
			wp_die( 0 );
		}

		echo wp_json_encode( $results );
		echo "\n";

		wp_die();
	}

	/**
	 * Performs post queries for internal linking.
	 *
	 * @since 3.1.0
	 *
	 * @param  array $args Optional. Accepts 'pagenum' and 's' (search) arguments.
	 * @return array|false Results.
	 */
	public static function wp_link_query( $args = [] ) {
		$pts      = get_post_types( [ 'public' => true ], 'objects' );
		$pt_names = array_keys( $pts );

		$query = [
			'post_type'              => $pt_names,
			'suppress_filters'       => true,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
			'post_status'            => 'publish',
			'posts_per_page'         => 20,
			'orderby'                => 'menu_order',
			'order'                  => 'ASC',
		];

		$args['pagenum'] = isset( $args['pagenum'] ) ? absint( $args['pagenum'] ) : 1;

		if ( isset( $args['s'] ) ) {
			$query['s'] = $args['s'];
		}

		$query['offset'] = $args['pagenum'] > 1 ? $query['posts_per_page'] * ( $args['pagenum'] - 1 ) : 0;

		// Do main query.
		$get_posts = new WP_Query();
		$posts     = $get_posts->query( $query );

		// Build results.
		$results = [];
		foreach ( $posts as $post ) {
			if ( 'post' === $post->post_type ) {
				$info = mysql2date( __( 'Y/m/d' ), $post->post_date );
			} else {
				$info = $pts[ $post->post_type ]->labels->singular_name;
			}

			$results[] = [
				'ID'        => $post->ID,
				'title'     => trim( esc_html( strip_tags( get_the_title( $post ) ) ) ),
				'permalink' => get_permalink( $post->ID ),
				'info'      => $info,
			];
		}

		return ! empty( $results ) ? $results : false;
	}
}
