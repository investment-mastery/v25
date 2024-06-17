<?php
/*
 * Template name: Zoom Webinar Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
$club = get_club_slug();
?>
<style>
h3{margin: 0;}
</style>
<div id="primary" class="content-area bb-grid-cell">
	<main id="main" class="site-main">
		<div class="crytp_webniar club-coaching-crypto">
			<div class="row">
			    <div class="mainheading">
					<?php the_content();?>
                    <!-- Recording -->
					<div class="webinarrecording">

						<sep></sep>

						<div class="webinar_heading">
							<h2>Webinar Recordings</h2>
						</div>
                         <!-- allrecording -->
						<div class="all_recording">
							<div class="row webinar-recordings">
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>


		<!-- recordingpopup -->
		<div id="popup1" class="overlay">
			<div class="popup">
				<a class="close" href="#"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 1 1 13M1 1l12 12" stroke="#A6B0BB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
				<div class="content">
					
				</div>
			</div>
		</div>
		<!-- recordingpopup -->



	</main><!-- #main -->
</div><!-- #primary -->

<?php

add_action("wp_footer", function(){

	$page_id = get_queried_object_id();
	$club = get_club_slug();
	$gold_cat = '';

	if($club == 'gold') {

		$gold_cat_id = get_field('gold-membership-category'); // for Gold Membership Recordings
		if(!empty($gold_cat_id)) {
			$gold_cat = $gold_cat_id;
		}
	}

	?>
	<script type="module" src="/wp-content/plugins/presto-player/dist/components/web-components/web-components.esm.js?ver=1637562328"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

	<script type="text/javascript">
		
	jQuery(document).ready( $ => {	

		let apiBaseurl = "<?=site_url("wp-json/api")?>";
		let resultLoading = false;
		let resultLoadedAll = false;
		let recordingSort, recordingStatus, recordingSearchkey, resultLength=6, resultStart=1, recordingFilter="", categorySelected=[];
		let recordingSearchTimeout="";
		let webinarRecordingId = 0;
		let webinarRecordingProgress = 0;
		let webinarkey="";
		let registrantkey="";
		let organizerkey="";
		

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


		clearPagingVars = () => {
			$(".webinar-recordings").html("");
			resultStart = 1;
		 	resultLoading = true;
			resultLoadedAll = false;
		}

		webinarRecordings = () => {
			category = [];
			category.push($("#normal-select-3 option:selected").val());
			$.ajax({
				url: `${apiBaseurl}/webinar/recordings`,
				data: {
					page_num: resultStart,
					page_length: 6,
					search: $(".search-webinar-recordings").val(),
					category: category,
					sort: $("#normal-select-2 option:selected").val(),
					status: $("#normal-select-1 option:selected").val(),
					club:"<?=$club;?>",
					gold_cat:"<?=$gold_cat;?>",
				},
				dataType : "json",
				beforeSend : xhr => {
					xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>"); 
					resultLoading = true;
					if(resultStart==1){
						$(".webinar-recordings").html("");
					}
					tpl = ``;
					for(i=0; i < 6; i++){
						tpl += skeletonLoadTpl;
					}
					$(".webinar-recordings").append(tpl);
				},
				success: (response) => {
					resultLoading = false;
					tpl = "";

					$(".skeleton-loader-item").remove();
					if(!response.has_next) resultLoadedAll = true;
					
					console.log("webinarRecordings", response)
					d = response.result;
					
					d.map( webinar => {
						var webinar_image = (webinar.image) ? '<img src="'+webinar.image+'" class="recording_img">' : '';
						tpl += `
						<div class="col-sm-4">
							<div class="recording_box">
								<div class="_recording_image ${(!webinar.image) ? "default":""}">

									${webinar_image}

									<div class="play-icon">
										<a href="#popup1" 
												data-date="${webinar.recording_date}"
												data-title="${webinar.post_title}" 
												data-slug="${webinar.post_name}" 
												data-id="${webinar.ID}" 
												data-video="${webinar.modal_video_player}"
												data-progress="${Math.round(webinar.progress)}">
												
												<img src="/wp-content/uploads/2021/06/Group-1200.png"></a>
									</div>
								</div>

								<div class="recording_content">
									<div class="recording_date">${webinar.recording_date}</div>
									<h4>${webinar.post_title}</h4>
								</div>
							</div>
						</div>
						`;
					});

					if(d.length <= 0 && resultStart == 1)
						tpl = `<div style="text-align:center; width:100%; padding:30px;">No records found</div>`
					
					if(resultStart == 1)
						$(".webinar-recordings").html(tpl);

					else
						$(".webinar-recordings").append(tpl);

					resultStart++;
				}
			});
		} 

		updateWebinarRecordingProgress = () => {
			$.ajax({
                url: `${apiBaseurl}/webinar/recordings/${webinarRecordingId}/update_progress`,
				type: "post",
				dataType: "json",
				data: JSON.stringify({"progress":webinarRecordingProgress}),
				headers: {
					"Content-Type": "application/json",
					"X-WP-Nonce":"<?=wp_create_nonce( 'wp_rest' );?>"
				},
                success: (d) => {
					console.log("progress", d)
				}
			});
		}

		$(window).scroll(function() {
		
			if ($(window).scrollTop() >= ($(document).height() - $(window).height() - 200)) {	

				console.log('load data on scroll');

				if(resultStart > 1){
					if(!resultLoading){
						if(!resultLoadedAll) webinarRecordings();
					}
				}
			} else {
				console.log('nope');
			}
		});	

		$(document).on("click", ".overlay .close", e => {
			$("#popup1 .content").html('');
			$(".overlay").removeClass('addflex');
			updateWebinarRecordingProgress();		
			
		});
		$(document).on("click",".play-icon a", e => {

			let $this = $(e.currentTarget);
			e.preventDefault();
			$("#popup1").addClass('addflex').hide().fadeIn();

			date = $(e.currentTarget).attr("data-date");
			id = $(e.currentTarget).attr("data-id");			
			title = $(e.currentTarget).attr("data-title");	
			slug = $(e.currentTarget).attr("data-slug");
			video = $(e.currentTarget).attr("data-video");
			progress = $(e.currentTarget).attr("data-progress");	
		
			webinarRecordingId = id;

			modelVideo = `<iframe src="/webinar_recordings/${slug}" frameborder="0" scrolling="no" loading="lazy" style="background:#eee; border: none; height: 100%; width: 100%;overflow: hidden;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen="true"></iframe>`;

			$("#popup1 .content").html(`
				<div class="embed-container">
				${modelVideo}
				</div>
				<div class="recording_content">
					<div class="recording_date">${date}</div>
					<h4>${title}</h4>
				</div>			
			`);
			
		});
	
		webinarRecordings();

		$(document).on('click', ".select-dropdown__list-item", e => {
			clearPagingVars();
			webinarRecordings();
		});

		$(document).on("click", ".next", e => {
			e.preventDefault();		
			var $this = $(e.currentTarget);
			$('.slick-next').trigger('click');

		});

		$(document).on("click", ".prev", e => {
			e.preventDefault();			
			$('.slick-prev').trigger('click');		
		}); 

		 

	});
	</script>
	
	
	 
<?php
});


get_footer();