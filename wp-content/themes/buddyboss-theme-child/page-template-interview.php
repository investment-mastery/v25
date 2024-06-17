<?php
/*
 * Template name: Club Interview Page Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
$club = get_club_slug();
?>
<style type="text/css">
.slick-slide {
    width: 505px;
}
.slick-dots, .slick-arrow{
	display:none !important;
}
@keyframes flickerAnimation {
	0%   { opacity:1; }
	50%  { opacity:.5; }
	100% { opacity:1; }
}
@-o-keyframes flickerAnimation{
	0%   { opacity:1; }
	50%  { opacity:.5; }
	100% { opacity:1; }
}
@-moz-keyframes flickerAnimation{
	0%   { opacity:1; }
	50%  { opacity:.5; }
	100% { opacity:1; }
}
@-webkit-keyframes flickerAnimation{
	0%   { opacity:1; }
	50%  { opacity:.5; }
	100% { opacity:1; }
}
	

.skeleton-loader{
	animation: fadeIn ease 1s;
	-webkit-animation: flickerAnimation 1s infinite;
	-moz-animation: flickerAnimation 1s infinite;
	-o-animation: flickerAnimation 1s infinite;
	animation: flickerAnimation 1s infinite;;
	border-radius:5px;
	background:#eee;
}
.fluid-width-video-wrapper{
	padding-top:0px !important;
	min-height:360px !important
}
.membersdiv div{
	display:flex;
}
.membersdiv div img{
	border-radius:20px;
	width:30px;
	height:30px; 
}
.eael-feature-list-items{
    list-style: none;
    margin:0;
}
.eael-feature-list-item{
    display: flex;
    align-items: center;
}
.eael-feature-list-icon-box{
    margin: 0 12px 0 0;
}
.eael-feature-list-content-box, .eael-feature-list-content-box p{
    margin:0 !important;
}
sep{
    height: 0;
}
.webinar_heading{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}
.webinar_heading > h2{
    margin:0;
}
.crytp_webniar > row{
    width: 100%;
}
.recording_content > h4{
    color:#1F3C61;
    line-height: 28px;
    margin: 16px 0;
}
.overlay .recording_content > h4{
    margin: 12px 0 16px;
}
.interview_content > p {
    font-size: 16px;
    line-height: 24px;
    color:#6F7A88;
}
.overlay .interview_content > p {
    margin: 0 0 24px;
}
.recording_content{
    display: flex;
    flex-direction: column;
}
.interview_podbean{
    display:none;
}

.overlay .interview_podbean{
    display:block;
}

@media (max-width: 543px) {
	.upcomgwebnianes_box {
		width: 100%;
	}
	.webinar_details h3 {
		margin-bottom: 54px;
	}
	.webinar_date img {
		margin-right: 14px;
		margin-left: 2px;
	}
}



</style>
<div id="primary" class="content-area bb-grid-cell">
	<main id="main" class="site-main">

        <?php if ( have_posts() ) :

        do_action( THEME_HOOK_PREFIX . '_template_parts_content_top' );

        while ( have_posts() ) :
            $postid=get_the_ID();
            the_post();

            do_action( THEME_HOOK_PREFIX . '_single_template_part_content', 'page' );

        endwhile; // End of the loop.
        else :
        get_template_part( 'template-parts/content', 'none' );
        ?>

        <?php endif; ?>

		<div class="crytp_webniar">

			<div class="row">

				<div class="mainheading">
                    <!-- Recording -->
					<div class="webinarrecording">

						<div class="webinar_heading">
							<h2>Interviews</h2>
						</div>
                         <!-- allrecording -->
						<div class="all_recording">
							<div class="row webinar-recordings">
                                <div class="col-sm-4 skeleton-loader-item">
                                    <div class="recording_box">
                                        <div style="height:320px; padding:10px;">
                                            <div class="skeleton-loader" style="height:150px;"></div>

                                            <div style="margin-top:30px">
                                                <div class="skeleton-loader" style="height:30px; width:100px"></div>
                                            </div>

                                            <div style="margin-top:18px">
                                                <div class="skeleton-loader" style="height:30px; width:150px"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 skeleton-loader-item">
                                    <div class="recording_box">
                                        <div style="height:320px; padding:10px;">
                                            <div class="skeleton-loader" style="height:150px;"></div>

                                            <div style="margin-top:30px">
                                                <div class="skeleton-loader" style="height:30px; width:100px"></div>
                                            </div>

                                            <div style="margin-top:18px">
                                                <div class="skeleton-loader" style="height:30px; width:150px"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 skeleton-loader-item">
                                    <div class="recording_box">
                                        <div style="height:320px; padding:10px;">
                                            <div class="skeleton-loader" style="height:150px;"></div>

                                            <div style="margin-top:30px">
                                                <div class="skeleton-loader" style="height:30px; width:100px"></div>
                                            </div>

                                            <div style="margin-top:18px">
                                                <div class="skeleton-loader" style="height:30px; width:150px"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>


        <!-- recordingpopup -->
        <div id="popup1" class="overlay">
            <div class="popup">
                <a class="close" href="#">&times;</a>
                <div class="content" style="min-height:500px;">
                    
                </div>
            </div>
        </div>
        <!-- recordingpopup -->


	</main><!-- #main -->
</div><!-- #primary -->

<?php
$club = get_club_slug();
add_action("wp_footer", function($club){
    global $club;
	?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
	<script type="text/javascript">
	jQuery(document).ready( $ => {
		let apiBaseurl = "<?=site_url("wp-json/api")?>";
		let resultLoading = false;
		let resultLoadedAll = false;
		let recordingSort, recordingSearchkey, resultLength=6, resultStart=1;
		let recordingSearchTimeout="";
		let webinarRecordingId = 0;
        let club = '<?=$club?>';

		let skeletonLoadTpl = `
		<div class="col-sm-4 skeleton-loader-item">
			<div class="recording_box">
				<div style="height:320px; padding:10px;">
					<div class="skeleton-loader" style="height:150px;"></div>

					<div style="margin-top:30px">
						<div class="skeleton-loader" style="height:30px; width:100px"></div>
					</div>

					<div style="margin-top:18px">
						<div class="skeleton-loader" style="height:30px; width:150px"></div>
					</div>
				</div>
			</div>
		</div>	 
		`;

		interviews = () => {
			$.ajax({
				url: `${apiBaseurl}/interview/recordings`,
				data: {
					page_num: resultStart,
					page_length: 6,
					search: $(".search-webinar-recordings").val(),
					sort: $("#normal-select-2 option:selected").val(),
					club: club
				},
				dataType : "json",
				beforeSend : xhr => {
					xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>"); 
					resultLoading = true;
					if(resultStart==1){
						$(".webinar-recordings").html("");
					}
					tpl = ``;
					for(i=0; i < 3; i++){
						tpl += skeletonLoadTpl;
					}
					$(".webinar-recordings").append(tpl);
				},
				success: (response) => {
                    console.log(response);
					resultLoading = false;
					tpl = "";

					$(".skeleton-loader-item").remove();
					if(!response.has_next) resultLoadedAll = true;
					let d = response.result.data;
					d.map( interview => {
						tpl += `
						<div class="col-sm-4">
							<div class="recording_box">
								<div class="_recording_image">

									<img src="${interview.interview_vimeo_image}">

									<div class="play-icon">
										<a href="#popup1" 
												data-date="${interview.interview_date}"
												data-title="${interview.post_title}" 
												data-slug="${interview.post_name}" 
												data-id="${interview.post_ID}" 
												data-video="${interview.modal_video_player}"><img src="/wp-content/uploads/2021/06/Group-1200.png"></a>
									</div>
								</div>

								<div class="recording_content">
									<div>
                                        <div class="recording_date">${interview.interview_date}</div>
                                    </div>
									<h4>${interview.post_title}</h4>

								</div>
							</div>
						</div>
						`;
					});

					if(d.length <= 0 && resultStart == 1){
						tpl = `<div style="text-align:center; width:100%; padding:30px;">No records found</div>`
					}

					$(".webinar-recordings").append(tpl);

					resultStart++;
				}
			});
		} 

		clearPagingVars = () => {
			$(".webinar-recordings").html("");
			resultStart = 1;
		 	resultLoading = true;
			resultLoadedAll = false;
		}

		$(window).scroll(function() {
			if ($(window).scrollTop() >= ($(document).height() - $(window).height() - 200)) {	
				if(resultStart > 1){
					if(!resultLoading){
						if(!resultLoadedAll) interviews();
					}
				}
			}
		});

		 
		$(document).on( "keyup", ".search-webinar-recordings", e => {
			if(recordingSearchTimeout != ""){
				clearTimeout(recordingSearchTimeout);
			}
			input = e.currentTarget;
			recordingSearchTimeout = setTimeout(() => {
				clearPagingVars();
				interviews();
			}, 900);
		});		

		$(document).on("click", ".overlay .close", e => {
			$("#popup1 .content").html('');
			$(".overlay").fadeOut();
		});
		$(document).on("click",".play-icon a", e => {
			e.preventDefault();
			$("#popup1").fadeIn();

			date = $(e.currentTarget).attr("data-date");
			id = $(e.currentTarget).attr("data-id");
			//vimeo = $(e.currentTarget).attr("data-vimeo");
			video = $(e.currentTarget).attr("data-video");			
			title = $(e.currentTarget).attr("data-title");		
			slug = $(e.currentTarget).attr("data-slug");
            
            let pb_code = $(e.currentTarget).parents(".recording_box").find(".interview_podbean").html();
            let pb_class_style = !pb_code ? "display:none;" : "" ;
            let interview_content = $(e.currentTarget).parents(".recording_box").find(".interview_content").html();

			modelVideo = `<iframe src="/club-interviews/${slug}" frameborder="0" scrolling="no" loading="lazy" style="background:#eee; border: none; height: 100%; width: 100%;overflow: hidden;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen="true"></iframe>`;

			webinarRecordingId = id;
			// get iframe height with 16:9 ratio
			let iframe_height = jQuery("#popup1 .content").width() / (16/9);
			$("#popup1 .content").html(`
				<div class="embed-container">
				${modelVideo}
				</div>
                <div class="recording_content">
                    <div>
                        <div class="recording_date">${date}</div>
                    </div>
                    <h4>${title}</h4>
                </div>		
				
			`);
			
			
			
		})
 

		setTimeout( () => {
			interviews();
		}, 500)

		$(document).on('click', ".select-dropdown__list-item", e => {
			clearPagingVars();
			interviews();
		});

		
		 $(document).on("click",".close", e => {
			$("#popup1 .content").html('');
			e.preventDefault();
		 });

		 

	});
	</script>
	
	
	 
	<?php
});


get_footer();