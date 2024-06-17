<?php
/**
 * The template for displaying single sfwd course
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BuddyBoss_Theme
 */

get_header();
?>

<style>
	.thumbnail-container, .bb-learndash-banner {
    	background-color: white;
	}
	.buddypanel-open .site { 
		/*margin-left: 320px;*/
	}
	/*.bb-learndash-banner {
		margin-left: 210px;
	}*/
    .bb-grid .bb-learndash-content-wrap {
    	padding-right: 90px;
    	padding-top: 40px;
	}
	.learndash-wrapper .ld-alert-certificate a.ld-button {
	    background-color: #00C47D !important;
	    color: #fff;
	    border-radius: 4px;	   
	    padding: 12px 24px;
	    font-size: 18px;
	    font-family: Source Sans Pro;
	    font-style: normal;
    	font-weight: 600;
		line-height: 24px;
	}

	.learndash-wrapper .ld-status-icon .ld-icon:before {
		font-size: 18px !important;
	}
	.learndash-wrapper .ld-alert-certificate.ld-alert-success {
    	font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 18px;
		line-height: 23px;
		color: #1F3C61;
		background-color: #E5F9F2 !important;
		border: 1px solid #00C47D !important;
		border-radius: 4px;
	}

	.learndash-wrapper .ld-alert-certificate a.ld-button {
		background-color: #00C47D !important;
		color: #fff;
		border-radius: 4px;
		width: 325px !important;
		padding: 12px 24px;
		font-size: 18px;
		font-family: Source Sans Pro;
		font-style: normal;
		font-weight: 600;
	}
	 .learndash-wrapper .ld-button:not(.ld-button-reverse):not(.learndash-link-previous-incomplete):not(.ld-button-transparent){
		background-color: #00C47D !important;
	}
	.learndash-wrapper .ld-item-list .ld-item-list-item.ld-item-lesson-item .ld-item-list-item-preview .ld-item-name .ld-item-title .ld-item-components span {
		padding-right: 16px;
	}	
	.learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-details {
		margin-right: 16px;
	}


	a.btn-advance.ld-primary-background, .bb-ld-sticky-sidebar .ld-status.ld-status-complete.ld-secondary-background {
		padding-top: 16px;
		padding-bottom: 16px;
	}

	.bb-single-course-sidebar h4 {
		font-family: Montserrat;
		font-style: normal;
		font-weight: 600;
		font-size: 14px;
		line-height: 24px;
		color: #1F3C61;
		padding-bottom: 16px;
	}

	ul.bb-course-volume-list li {
		font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 16px;
		line-height: 24px;
		color: #6F7A88;
	}

	.bb-single-course-sidebar .bb-course-volume-list li i {
		font: normal normal normal 16px/1 "bb-icons";
	}

	.bb-single-course-sidebar .bb-button-wrap .learndash_join_button {
		background: #48A9F5;
    	border-radius: 4px;
	}
	.bb-single-course-sidebar .bb-button-wrap .learndash_join_button:hover {
		background: #48A9F5;
    	border-radius: 4px;
	}
	.learndash-wrapper .bb-single-course-sidebar .ld-status.ld-primary-background {
	    background-color: #e2e7ed !important;
	    color: inherit !important;
	    padding-top: 16px;
	    padding-bottom: 16px;
	    border-radius: 4px;
	    font-family: Source Sans Pro;
	    font-style: normal;
	    font-weight: 600;
	    font-size: 18px;
	    line-height: 24px;
	}
	.bb-single-course-sidebar a.btn-advance, .learndash-wrapper .bb-single-course-sidebar .ld-status, .learndash-wrapper .learndash_content_wrap .learndash_mark_complete_button, .learndash-wrapper .ld-button, .learndash-wrapper .wpProQuiz_content .wpProQuiz_button, .learndash-wrapper .wpProQuiz_content .wpProQuiz_button2, .bb-single-course-sidebar .btn-join, .bb-single-course-sidebar #btn-join, .lms-topic-sidebar-course-navigation a.course-entry-link {

		border-radius: 4px;
	}	
	.bb-learndash-content-wrap .ld-status.ld-status-complete.ld-secondary-background {
		display: none !important;
	}
	.learndash-wrapper .ld-progress.ld-progress-inline {
		flex-direction: column !important;
	}
	.learndash-wrapper .ld-course-status.ld-course-status {
		padding: 19px 20px;
	}
	.learndash-wrapper .ld-progress-stats {
		width: 100%;
		padding-right: 0;
		padding-left: 0;
	}
	.ld-progress-bar {
		width: 100%;
	}
	.learndash-wrapper .ld-progress.ld-progress-inline .ld-progress-bar {
		margin-right: 0;
	}
	.learndash-wrapper .ld-progress-steps {
		font-size: 12px;
	    font-family: Source Sans Pro;
	    font-style: normal;
	    font-weight: normal;
	    font-size: 16px;
	    line-height: 24px;
	    text-align: right;
	    color: #6F7A88;
	}
	.learndash-wrapper .ld-progress-percentage {
		font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 16px;
		line-height: 24px;
		color: #00C47D;
	}
	.learndash-wrapper .ld-progress .ld-progress-bar {
		margin-top: 14px;
	}
	.learndash-wrapper .ld-item-list.ld-lesson-list .ld-section-heading {
		margin-top: 60px;
	}
	.learndash-wrapper .ld-item-list.ld-course-list .ld-section-heading .ld-item-list-actions, .learndash-wrapper .ld-item-list.ld-lesson-list .ld-section-heading .ld-item-list-actions {
		display: none;
	}
	.ld-section-heading h2 {
		font-family: Montserrat;
		font-style: normal;
		font-weight: 600;
		font-size: 16px;
		line-height: 24px;
		letter-spacing: 2px;
		text-transform: uppercase;
		color: #1F3C61;
	}
	.ld-item-list-items {
		margin-top: 40px;
	}
	.learndash-wrapper .ld-item-list .ld-item-list-item {
		margin: 16px 0;
	}
	.ld-item-title span {
    	font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 18px;
		line-height: 23px;
		color: #6F7A88;
	}
	.learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-list-item-preview {
    	padding: 16px 20px;
    	display: block;
	}
	.learndash-wrapper .ld-item-list .ld-item-list-item.ld-item-lesson-item .ld-item-list-item-preview .ld-item-details {
		display: none !important;
	}	
	.learndash-wrapper .ld-status-icon {
		width: 28px !important;
		height: 28px !important;
		flex-basis: 28px;
	}	
	.ld-course-check {
		margin-top: -6px;
	}

	.bb-learndash-banner {
		height: 370px;
	}
	.bb-single-course-sidebar {
		margin-top: -320.25px;
	}
	.site-main .learndash-wrapper .ld-alert .ld-alert-icon {
		width: 50px;
		height: 50px;
		background: #00C47D;
		margin-left: 0px;
		margin-right: 16px;
	}
	.learndash-wrapper .ld-icon.ld-icon-certificate:before {
		content: '';
	}
	.learndash-wrapper .ld-alert-success {
		padding: 15px 20px 15px 14px;
		margin-bottom: 60px;
    	margin-top: 0px;
	}
	.bb-ld-tabs {
		display: none;
	}

@media (max-width:500px) {

	.learndash-theme.single-sfwd-courses .learndash-wrapper .ld-item-list .ld-item-list-item.ld-item-lesson-item .ld-item-list-item-preview .ld-item-name {
		width: 100%;
	}
	.learndash-theme.single-sfwd-courses .learndash-wrapper .ld-course-status.ld-course-status-enrolled .ld-progress {
		margin-right: 0;
	}
	.bb-learndash-banner {
		height: 180px;
	}
}	

</style>

<div id="primary" class="content-area bb-grid-cell">
	<main id="main" class="site-main">

	<?php
	if ( have_posts() ) :
		
		do_action( THEME_HOOK_PREFIX . '_template_parts_content_top' );

		while ( have_posts() ) :
			the_post();

			if ( 'draft' == get_post_status() ){
				do_action( THEME_HOOK_PREFIX . '_single_template_part_content', get_post_type() );
			} else {
				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

		endwhile; // End of the loop.
	endif;
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<script>
	jQuery(document).ready( function($) {

		var ld_check = `<img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/course_check.png" class="ld-course-check">`;
		$(ld_check).insertAfter('span.ld-icon-checkmark');
		$('span.ld-icon-checkmark').hide();

		var ld_cert = `<img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/cert.png" class="ld-icon-cert-custom">`;
		$(ld_cert).appendTo('div.ld-icon-certificate');
		


	});
	

</script>




<?php get_footer();
