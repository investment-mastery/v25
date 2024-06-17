<?php
/**
 * The template for displaying single sfwd quizz
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BuddyBoss_Theme
 */

get_header();
$quiz_id = get_the_ID();
$quiz_id = learndash_get_course_id( $quiz_id );
$course = get_post( $course_id );

?>

<style>
/*.learndash-wrapper .ld-status-icon .ld-icon:before {

}*/

	.ld-breadcrumbs-segments span {
		font-family: Montserrat;
		font-style: normal;
		font-weight: 500;
		font-size: 20px;
		line-height: 24px;
		color: #48A9F5;
	}
	div.bb-lms-header h1 {
		font-family: Montserrat;
		font-style: normal;
		font-weight: bold;
		font-size: 32px;
		line-height: 40px;
		color: #1F3C61;
	}
	#custome_header {
		background: #fafbfd;
   		position: fixed;
    	padding-right: 50px;
    	width: 100%;
    	z-index: 11;
	}

	.bb-grid {
		margin-right: -5px;
		margin-left: -5px;
	}
	.bb-grid-cell:not(.no-gutter), .bb-grid>:not(.no-gutter) {
    	padding-left: 0px;
    	padding-right: 0px;
	}

	.lms-topic-sidebar-wrapper {
		display: block !important;
		background-color: #fff;
		margin-top: 100px;
		margin-right: -440px;
	}
	#learndash-page-content {
		max-width: 100%;
		margin-top: 75px;
	}
	.lms-topic-sidebar-wrapper.lms-topic-sidebar-close {
		margin-left: 0px;
		margin-right: -440px;
	}
	.lms-topic-sidebar-wrapper .lms-topic-sidebar-data {
		background-color: #1F3C61;
		padding: 20px;
		/*max-height: calc(100vh + 108px) !important;*/
		height: 100%;
		<?php if(current_user_can('administrator')) { ?>
			top: 108px !important;	
		<?php } else { ?>	
			top: 75px !important;	
		<?php } ?>	
		position: fixed;
		overflow: hidden;
	}
	.lms-lesson-content, .lms-toggle-lesson {
    	display: none;
	}
	.lms-topic-sidebar-wrapper .lms-lessions-list>ol.bb-lessons-list>li.lms-lesson-item {
		padding: 0;
	}	
	.lms-topic-sidebar-course-navigation .ld-course-navigation .course-entry-title {
		color: #fff;
	}
	.lms-topic-sidebar-course-navigation .ld-course-navigation {
		display: none !important;
	}
	.lms-topic-sidebar-progress .course-progress-wrap {
		border-bottom: none;
		margin: 0px 0px 15px !important;
	}
	.ld-progress-bar {   
    	background: #576D89;
	}
	.lms-topic-sidebar-progress .course-completion-rate {
		color: #00C47D;
		padding-bottom: 8px;
	}
	.bb-lesson-title {	
		color: #fff;
	}	
	.bb-completed-item .bb-lesson-title {		
		padding-left: 12px;
	} 
	.bb-not-completed-item .bb-lesson-title {		
		padding-left: 12px;
	} 

	h4.course-content-text {
		margin: 10px 0px 0px !important;
		color: #fff !important;
		font-family: Montserrat;
		font-style: normal;
		font-weight: 600;
		font-size: 16px;
		line-height: 24px;
		text-transform: uppercase;
	}
	ol.bb-lessons-list li {
		background-color: #1C3657;
		margin-bottom: 8px;
	}
	ol.bb-lessons-list li.current a {
		background-color: #1C3657;
		color: #48A9F5;		
	}
	ol.bb-lessons-list li.current .bb-lesson-title {		
		color: #48A9F5;		
	}	
	ol.bb-lessons-list li a {
		padding: 20px 16px 20px !important;		
	}
	.i-progress {
		width: 24px;
    	height: 24px;
	}
	.i-progress.bb-not-completed {
		background-color: #C2CAD2;
		line-height: 20px;
		height: 24px;
		width: 24px;
	}
	.i-progress.lesson-in-progress {
		background-color: #48A9F5;
		line-height: 20px;
		height: 24px;
		width: 24px;

	}
	.bb-icon-triangle-fill {	
		margin-right: -3px;
		line-height: 20px;
		transform: rotate(-90deg);
		font: normal normal normal 16px/2.4 "bb-icons";
	}

	.bb-icon-lock-fill {			
		line-height: 20px;		
		font: normal normal normal 11px/1 "bb-icons";
	}
	.ld-content-actions .topic-title{
    	visibility: hidden;
    	display: none !important;
    	opacity: 0;
    	height: 0px;
	}	

	.lms-topic-sidebar-data span.sidebar-mini-button {
		cursor: pointer;		
	}
	.lms-topic-sidebar-data span.close_sidebar {
		cursor: pointer;
		background: #1f3c61 url('<?php echo get_stylesheet_directory_uri();?>/assets/img/close.png') no-repeat center center;
		position: absolute;
	    width: 12px;
	    height: 12px;
	    right: 26px;
    	top: 26px;	   
	}	
	.lms-topic-sidebar-progress .course-progress-wrap {
		padding-bottom: 24px;
		margin-bottom: 0px !important;
	}	
	.lms-topic-sidebar-wrapper .bb-lesson-head {
		height: 80px;
	}
	.lms-topic-sidebar-data span.show_sidebar_content{
		background: #A6B0BB url('<?php echo get_stylesheet_directory_uri();?>/assets/img/open_book.png') no-repeat center center;
	    margin-left: -60px;
	    margin-top: 0px;	 
	    z-index: 1;
	    position: fixed;
	    width: 40px;
	    height: 40px;
	    border-radius: 2px 0px 0px 2px;

	}
	.lms-topic-sidebar-data span.show_sidebar_note{
		background: #A6B0BB url('<?php echo get_stylesheet_directory_uri();?>/assets/img/note.png') no-repeat center center;
	    margin-left: -60px;
	    margin-top: 48px;
	    z-index: 1;
	    position: fixed;
	    width: 40px;
	    height: 40px;
	    border-radius: 2px 0px 0px 2px;

	}
	.active_sidebar_button {
		background-color: #1f3c61 !important;
	}
	.sidebar-content-2 {
		display: none;
	}
	textarea.sidebar_note {	
		height: calc(100vh / 1.5);
	    width: 100%;
	    border: 1px solid #C2CAD2;
	    background: none !important;
	    margin-top: 25px;
	    margin-bottom: 32px;
	    color: #fff;
	}
	button.btn_save_note {
		background-color: #48A9F5;
		color: #fff;
		width: 100%;
		border-radius: 4px;
		height: 56px;
	}
	button.btn_save_note.mini {
		background-color: #48A9F5;
		color: #fff;
		width: 200px;
		border-radius: 4px;
		font-family: Source Sans Pro;
		font-style: normal;
		font-weight: 600;
		font-size: 18px;
		line-height: 24px;
	}
	.success-note {
		color: #00C47D;
	}


	ul.lesson-tab {
		width: 100%;
    	overflow: hidden;    
    	height: auto !important;
    	border-bottom: 1px solid #E1E1E1 !important;
    	margin-left: 0;
    	margin-top: 0px;
    	margin-bottom: 0px; 
    	display: inline-flex;
	}
	ul.lesson-tab li.lesson-tab-button {
		padding: 22px 0px;
		padding-left: 34px;		
		margin-right: 40px;
	    float: left;
	    width: auto;
	    border: none;
	    display: block;
	    outline: 0;
	    border-radius: 0;
	    color: #1F3C61;
	    background-color: #fff;
	    cursor: pointer;
	    font-family: Montserrat;
		font-style: normal;
		font-weight: 600;
		font-size: 16px;
		line-height: 24px;
		/* identical to box height, or 150% */
		letter-spacing: 2px;
		text-transform: uppercase;
		border-bottom: 2px solid #FFF;
	}
	ul.lesson-tab li.lesson-tab-button:hover{
		background-color: #fff !important;
	}	
	ul.lesson-tab li.current {
		color: #48A9F5;
		border-bottom: 2px solid #48A9F5;
	}	
	ul.lesson-tab li.first {
		margin-left: 0px !important;		
	}

	li#show-tab-action-steps {
		background: url('<?php echo get_stylesheet_directory_uri();?>/assets/img/lesson_tab_action_steps.png') no-repeat left center;
	}
	li#show-tab-notes {
		background: url('<?php echo get_stylesheet_directory_uri();?>/assets/img/lesson_tab_notes.png') no-repeat left center;
		display: flex;
		align-items: center;
		background-size: 16px 20px;		
	}
	li#show-tab-audio {
		background: url('<?php echo get_stylesheet_directory_uri();?>/assets/img/lesson_tab_audio.png') no-repeat left center;
		background-size: auto 22px;		
		display: flex;
		align-items: center;
	}

	#learndash-page-content .sfwd-course-nav .bb-ld-status .ld-status{
		width: auto !important;
    	height: 40px !important;
    	font-size: 16px;
   		padding: 8px 24px;
	}

	.single #learndash-course-header {
		max-width: 100% !important;
	}


	/*** Tabs ***/
	#tab-action-steps {
		display: block;		
	}
	#tab-action-steps p {
		font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 18px;
		line-height: 28px;
		color: #6F7A88;
	}
	#tab-action-steps .action-steps-content {
		margin-top: 32px;
	}
	#tab-action-steps .action-steps-content label {
		color: #1F3C61 !important;
		font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 18px !important;
		line-height: 24px;		
	}
	#tab-action-steps .action-steps-content ul {
		list-style-type: none;
		margin-left: 0 !important;
	}
	#tab-action-steps .action-steps-content ul li {
		margin-bottom: 16px;
	}
	#tab-action-steps .action-steps-content ul li label{
	padding-left: 10px;	
	}
	#tab-action-steps .action-steps-content ul li input[type=checkbox] {
		display:none;
	}	
	#tab-action-steps .action-steps-content ul li input[type=checkbox] + label {
	    display:inline-block;
	    padding: 0 0 0 0px;
	    padding-left: 36px;
	    background:url("<?php echo get_stylesheet_directory_uri();?>/assets/img/checkbox_off.png") no-repeat left center;
	    height: 100%;
	    width: 100%;
	}
	#tab-action-steps .action-steps-content ul li input[type=checkbox]:checked + label {
	    background:url("<?php echo get_stylesheet_directory_uri();?>/assets/img/checkbox_on.png") no-repeat left center;
	    padding-left: 36px;
	    height: 100%;
	    width: 100%;
	    display:inline-block;	  
	}
	.lesson-tab-content {
		display: none;
		min-width: 350px;
		margin-bottom: 60px !important;
	}

	#tab-action-steps{
		padding-top: 40px !important;
		margin-bottom: 64px !important;
	}
	#tab-notes{
		padding-top: 29px !important;		
	}
	#tab-audio{
		padding-top: 60px !important;		
	}

	
	.lesson-tab-content textarea.tab_note {
		width: 100%;
		height: 320px;
		border: 1px solid #E1E1E1;
		border-radius: 4px;
		margin-bottom: 32px;
	}

	.lms-lessons-list {
		max-height:  500px;
    	overflow-y: scroll;
   	 	scrollbar-width: none; /* Firefox */
   	 	-ms-overflow-style: none;  /* Internet Explorer 10+ */
	}
	.lms-lessons-list::-webkit-scrollbar { /* WebKit */
	    width: 0;
	    height: 0;
	}

	.ld-content-action {
		margin-top: 40px;
		margin-bottom: 60px;
	}
	.marked_as_complete {
	    background: #00C47D !important;
	    border: 1px solid #00c37d !important;
	    border-radius: 4px !important;
	    color: #FFF;
	    font-size: 18px !important;
	    letter-spacing: 0.04em;
	    width: 220px;
	    font-weight: 600 !important;
	    padding: 13px 40px !important;
	    margin: 0 auto;
	    font-family: Source Sans Pro;
		font-style: normal;	
		line-height: 24px;
		margin-left: calc(50% - 140px) !important;
		width: 300px;
	    height: 56px;	   
	}
	.marked_as_complete .bb-icon-check-circle {
		font-weight: 600 !important;
		font-size: 18px !important;
    	width: 25px;
    	line-height: 24px;
	}

	.custom-lesson-next-prev {
		width: 100%;
    	display: flex;
    	justify-content: space-between;
	}
	.custom-lesson-next-prev i {
	
	}
	.single-sfwd-lessons .lms-topic-sidebar-wrapper {
		z-index: 1; 
	}
	.prev-lesson-text, .next-lesson-text {
		font-size: 16px;
		color: #A6B0BB;
	}
	.next-prev-lesson-title {
		color: #1F3C61;
		font-family: Source Sans Pro;
		font-size: 16px;
	}
	#show-next-lesson {
		display: flex;
		flex-flow: column;
		text-align: right;
		padding-right: 50px;
		background: url('<?php echo get_stylesheet_directory_uri();?>/assets/img/big_arrow_right.png') no-repeat center right;
	}
	#show-prev-lesson {
		display: flex;
		flex-flow: column;		
		padding-left: 50px;
		background: url('<?php echo get_stylesheet_directory_uri();?>/assets/img/big_arrow_left.png') no-repeat center left;
	}

	.container-audio {
	    width: 100%;
	    height: auto;
	    padding: 20px;
	    border-radius: 5px;
	    background-color: #eee;
	    color: #444;
	    margin: 0px auto;
	    overflow: hidden;
	    display: flex;
	    align-items: center;
	}
	audio {
		width:100%;
	}

	
	#learndash-page-content { 
    	padding: 30px 130px 0;
    } 
    .lms-topic-sidebar-wrapper .lms-topic-sidebar-data {
    	width: 440px;
    }

    .i-progress-custom-ls {
    	width: 40px !important;
    	height: 40px !important;
    	padding-top: 6px;
    }
    .bb-icon-check-custom-ls {
    	font: normal normal normal 24px/1.6 "bb-icons";
    }
    .bb-icon-lock-fill-custom-ls {
    	font: normal normal normal 19px/2 "bb-icons";
    }	

    .lms-topic-sidebar-wrapper .bb-lesson-title, .lms-topic-sidebar-wrapper .bb-lms-title {
    	font-family: Source Sans Pro;
		font-style: normal;
		font-weight: normal;
		font-size: 18px;
		line-height: 23px;
		white-space: normal !important;
    }	

    .ls_play_icon {    	
    	margin-right: -4px;
    	margin-top: 5px;
    }

    .ld-content-actions .sfwd-mark-complete input.learndash_mark_complete_button {
		width: 300px;
		height: 56px;
	}




@media screen and (min-width: 544px) {
	.lms-topic-sidebar, .lms-topic-sidebar-wrapper {
    	max-width: 440px;
	} 
}   	
	
@media (max-width:767px){
	#learndash-content .bb-grid{
	display:block !important;
	}
	#learndash-content .lms-topic-sidebar-wrapper{
		width:100% !important;
		max-width:100% !important;
		position:relative !important;
		margin-left: 0 !important;
	}
}

@media (max-width:500px){

	.lms-header-title {
    	margin-top: -80px;
    }	
	.lms-topic-sidebar-wrapper .lms-topic-sidebar-data {
		width: 100% !important; 
		position: relative !important;
		top: 0 !important;
	}
	.bb-grid {
		margin: 0;
	}
	.bb-footer, .site-content, .site-header {
    	padding: 0;
	}
	.marked_as_complete {
		width: 100% !important;
		margin: 0!important;
		text-align: center;
	}
	ul.lesson-tab li.lesson-tab-button {
    	padding: 8px 0px;
    	margin: auto 12px;
    	padding-left: 30px;
    	font-size: 12px;
    	font-weight: 600;
    	display: flex;
	}
	#learndash-course-header {
		margin-bottom: 30px !important;		
	}
	.close_sidebar {
		display: none;
	}	
	.lms-topic-sidebar-wrapper {
		z-index: 1 !important;
		min-height: 0 !important;
		margin-top: 80px !important;
	}
	#learndash-page-content {
		margin-top: 0 !important;
		padding: 30px 20px 0;
	}	
	.lesson-tab-content {
		min-width: auto !important;
	}
	button.btn_save_note.mini {
		width: 100% !important; 
	}	
	.learndash-wrapper .ld-content-actions .ld-content-action {
    	padding: 0;
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

  	$(document).on("click", ".show_sidebar_content", e => {		
		e.preventDefault();			
		console.log('here');
  		var $this = $(e.currentTarget);
  		$('.sidebar-mini-button').removeClass('active_sidebar_button');
  		$('.sidebar-content-2').hide();
		$('.sidebar-content-1').show();
  		$this.addClass('active_sidebar_button');
  		if($('.lms-topic-sidebar-wrapper').hasClass('hide')) {
  			$('.lms-topic-sidebar-wrapper').animate({ "margin-right": 0 }, 200).removeClass('hide');	
  		}				
  		$('.lms-topic-sidebar-data').css('right','0');
	});

	$(document).on("click", ".show_sidebar_note", e => {		
		e.preventDefault();		
		var $this = $(e.currentTarget);
		$('.sidebar-mini-button').removeClass('active_sidebar_button');
		$('.sidebar-content-2').show();
		$('.sidebar-content-1').hide();
		$this.addClass('active_sidebar_button');  		
  		if($('.lms-topic-sidebar-wrapper').hasClass('hide')) {
  			$('.lms-topic-sidebar-wrapper').animate({ "margin-right": 0 }, 200).removeClass('hide');	
  		}
  		$('.lms-topic-sidebar-data').css('right','0');
	});

	$(document).on("click", ".close_sidebar", e => {		
		e.preventDefault();		
		var $this = $(e.currentTarget); 	
		$('.lms-topic-sidebar-data').css('right','auto');
		$('.sidebar-mini-button').removeClass('active_sidebar_button');	
  		$('.lms-topic-sidebar-wrapper ').animate({ "margin-right": -440 }, 200).addClass('hide');	
	});

	$(document).on("click", "li.lesson-tab-button", e => {		
		e.preventDefault();		
		var $this = $(e.currentTarget); 	
		var id = $this.attr('id').replace("show-", "");
		$('.lesson-tab-button').removeClass('current');
		$this.addClass('current');	
		$('.lesson-tab-content').fadeOut('fast');
		$('#'+id).fadeIn('fast');
	});
	

	$(document).on("click", ".btn_save_note", e => {		
		e.preventDefault();		
		var form = document.getElementById("frm_save_note");
    	var data = new FormData(form);
    	data.append('notes', $(".sidebar_note").val());

    	$.ajax({			
			url: `<?=site_url("wp-json/api")?>/courses/lessons/<?=$lesson_id;?>/save_notes`,
			type : "POST",
			data : data,
			processData: false,
    		contentType: false,
    		cache: false,
			dataType: "json",
			beforeSend: xhr => {            	
			    xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");   
			},				
			success: (response) => { 
				if(response) $('.success-note').html('Successfully saved notes.');

				setTimeout(function() {
  					$('.success-note').html(''); 
				}, 2000);
			}
		});		
	});  

	$(document).on("click", ".action_sets_checkbox", e => {				
		var $this = $(e.currentTarget); 	
		var uuid = $this.val();	

		if ($this.is(':checked')) {
			var mark_unmark = 'mark_action_complete';
			var method = 'PUT';
		} else {
			var mark_unmark = 'unmark_action_complete';
			var method = 'DELETE';
		}

		$.ajax({			
			url: `<?=site_url("wp-json/api")?>/courses/lessons/<?=$lesson_id;?>/${mark_unmark}/${uuid}`,
			type : `${method}`,
			dataType: "json",
			beforeSend: xhr => {            	
			    xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");   
			},				
			success: (response) => { 
				console.log(response);
			}
		});		
	}); 	


	$('#sidebar_note_text').on('keyup keypress blur', e =>  {  
		var $this = $(e.currentTarget); 	
		$('#tab_note_text').val($this.val());  
	});
	$('#tab_note_text').on('keyup keypress blur', e =>  {  
		var $this = $(e.currentTarget); 	
		$('#sidebar_note_text').val($this.val());  
	});

	// move LD tabs after action steps tab
	var ld_action = $('.ld-content-action').html();
	var ld_status = $('.ld-status').hasClass('ld-status-complete');
	if($.trim(ld_action) === '') {
		//$('.ld-content-actions').remove();
		if(ld_status) $('.ld-content-action').html(`<span class="marked_as_complete"><i class="bb-icon-check-circle"></i> Marked as Complete</span>`);
	} 
	$('.ld-content-actions').insertAfter('#tab-audio');



	$('.close_sidebar').trigger('click');



	// set next and prev link+title

	var prev_title = $('.bb-lessons-list').find('li.current').prev().find('a').attr('title');
	var prev_link = $('.bb-lessons-list').find('li.current').prev().find('a').attr('href');
	var next_title = $('.bb-lessons-list').find('li.current').next().find('a').attr('title');
	var next_link = $('.bb-lessons-list').find('li.current').next().find('a').attr('href');

	if($('.bb-lessons-list').find('li.current').is(':first-child')) {
		prev_title = 'Back to the course info';
		prev_link = '<?php echo get_permalink( $course_id );?>';
	}

	if($('.bb-lessons-list').find('li.current').is(':last-child')) {
		$('#next-lesson-link').hide();
	}
	

	$('#show-prev-lesson').find('.next-prev-lesson-title').text(prev_title);
	$('#prev-lesson-link').attr("href", prev_link);
	$('#show-next-lesson').find('.next-prev-lesson-title').text(next_title);
	$('#next-lesson-link').attr("href", next_link);

	// if($('#wpadminbar').length) {
	// 	console.log($('#wpadminbar').length);
	// 	$('div.lms-topic-sidebar-data').css('top','108px !important');
	// } else {
	// 	$('div.lms-topic-sidebar-data').css('top','75px !important'); 
	// }



	if (window.matchMedia("(max-width: 500px)").matches) {
  		$('.lms-topic-sidebar-wrapper').insertBefore('#learndash-page-content');
	} else {
  		/* the viewport is more than 500 pixels wide RAM*/
  		$('.lms-topic-sidebar-wrapper').insertAfter('#learndash-page-content');
	}

	$(window).resize(function() {
		
		if (window.matchMedia("(max-width: 500px)").matches) {
	  		$('.lms-topic-sidebar-wrapper').insertBefore('#learndash-page-content');
		} else {
	  		/* the viewport is more than 500 pixels wide RAM*/
	  		$('.lms-topic-sidebar-wrapper').insertAfter('#learndash-page-content');
		}

	});	
	

});

	
</script>	

<?php get_footer();