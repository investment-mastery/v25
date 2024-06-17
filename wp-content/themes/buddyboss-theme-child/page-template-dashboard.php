<?php
/*
 * Template name: Club Dashboard Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */
 
get_header();

$club = get_club_slug();

?>
<style>	

.zoom-meeting-block .bb-meeting-date, .zoom-meeting-block .bb-meeting-occurrence{
	font-size: 16px;
}
@media screen and (min-width: 800px) {
	.container {
	    max-width: 1400px;
	}
	.mainheading{
		padding: 10px;
	}
	.mainheading h2{
		margin-bottom: 20px;
	}
}
</style>
<div id="primary" class="content-area bb-grid-cell">
	<?php the_content(); ?>
	<main id="main" class="site-main">

		<!-- completed session modal -->
		<div id="complted-session-modal" class="overlay">
			<div class="popup" id="register_popup_div_cancel">
				<a class="close" href="#" id="close_btn">&times;</a>
				<div id="register_content">
					<img src="/wp-content/uploads/2021/06/Group-1-1.png">
					<h2>Congratulations!</h2>
					<p>You have completed your 20 minutes session for today.</p>
					<a href="#" class="continue">Continue</a>
				</div>
			</div>
		</div>
		<!-- completed session modal -->

	</main><!-- #main -->
</div><!-- #primary -->


<script>
	
jQuery(document).ready(function ($) {


$('body').addClass('page-template-crypto_club_dashboard');

$("#content").delay(1000).css('visibility','visible');

/*
* DAILY TRACKER CALENDAR 
*/
    let apiBaseurl = "<?=site_url("wp-json/api")?>";
    let entriesTimeout = "";

	let club_name = '<?php echo isset($club) ? $club : "no_club"; ?>';

	$.fn.extend({
    toggleText: function(a, b){
        return this.text(this.text() == b ? a : b);
    }
	});

	init = () => {	
		load_tracker();	
		
		$('.selected-event').closest('td').addClass('active-streak');
    	$('.active-streak + td:not(.active-streak)').prev().addClass('last-streak');
    	$('.active-streak').last().addClass('very-last');         	 
	}
	init();	



/*
* TIMER/TRACKER CLICK EVENTS 
*/		

	$(document).on("click", "#start_session, #resume, #resume_session", () => {
	 	set_timer();
	 	start_tracker();
	 	$("#start_session").hide();
	 	$("#resume_session").hide();
	 	$(".resumebtns").hide();
	 	$("#stop_session").addClass('addflex');		 
	});

	$(document).on("click", "#stop_session", () => {
		stop_timer();
		stop_tracker();
		$("#stop_session").removeClass('addflex');
		$(".resumebtns").show();
		 
	});

	$(document).on("click", "#reset", () => {
		reset_tracker();		 
	});

	$(document).on("click", "#finish", () => {	
		$("#stop_session").removeClass('addflex');
		$(".resumebtns").hide();
		end_tracker('finish');
	});

	$(document).on("click", "a.continue, a#close_btn", () => {
		console.log('clicked!');	
		$("#congo").show();
		$("#desc_heading").hide();		
		$("#complted-session-modal.overlay").css({'visibility':'hidden', 'opacity':0}).removeClass('addflex'); 
	});

	$(document).on("click", "#save_activity", () => {	
		$(".resumebtns").hide();		
		end_tracker('save_activity');		
		$("#save_activity").hide();
		
	});

	$(document).on("click", "#manualone", () => {	
		$("#save_activity").show();
		//$("#input_minute").val("00");
		//$("#input_second").val("00");
		$("#one").removeClass("timetrackeractive");
		$("#two").addClass("timetrackeractive");
		$("#timer_tracker").hide();
		$("#manaual_tracker").show();
		$('#input_minute').focus();
	});	

	$(document).on("click", "#timerone", () => {		
		$("#two").removeClass("timetrackeractive");
		$("#one").addClass("timetrackeractive");
		$("#manaual_tracker").hide();
		$("#timer_tracker").show(); 
	});




/*
* TIMER/TRACKER FUNCTIONS 
*/
    
    function pad(val) {
  		valString = val + "";
  		if(valString.length < 2) {
     		return "0" + valString;
     	} else {
     	return valString;
    	}
	}

	//totalSeconds = 0;
	totalSeconds = 0;
	function setTime(minuteSpan, secondSpan) {
    	//totalSeconds++;
		
		//console.log(totalSeconds);

    	if(totalSeconds <= 0) {
			console.log("End=>", totalSeconds);
    		stop_timer();
    		$('#stop_session').trigger('click');
    		$('#finish').trigger('click');
    		setTimeout( ()=>{
				getWeekCalendarItems();
			}, 500);
			clearInterval(my_int);
			secondSpan.innerHTML = pad(totalSeconds%60);
			minuteSpan.innerHTML = pad(parseInt(totalSeconds/60));
    	}else{
			// totalSeconds--;
			/* poonam added 11 apr*/
			totalSeconds-1;
			/*end poonam*/
			secondSpan.innerHTML = pad(totalSeconds%60);
			minuteSpan.innerHTML = pad(parseInt(totalSeconds/60));
		}
    }

	var my_int = false;
	function set_timer() {
	   	minuteSpan = document.getElementById("minute");
	    secondSpan = document.getElementById("second");	  	
	    my_int = setInterval(function() { setTime(minuteSpan, secondSpan)}, 1000);
	}

	function stop_timer() {
		if(my_int){
			clearInterval(my_int);
			my_int = false;
		}
  		
	}

	function autoplay(){		
	 	set_timer();	
	 	$(".resumebtns").hide();
	 	$("#start_session").hide();
	 	$("#stop_session").addClass('addflex');		
	}

	function load_tracker() {

		let current_date = moment().format("YYYY-MM-DD");
		let queryp = 'start_datetime='+current_date+'&end_datetime='+current_date;		
		$.ajax({
            url: `<?=site_url("wp-json/api")?>/user/tracker?${queryp}`,           
            type : "GET",
            dataType: "json",
            beforeSend: xhr => {            	
                xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");            	
            },
            success: (response) => {

            	$('#tracker-skeleton-loader, #countdown-skeleton-loader').hide();
            	$('#starttracker').addClass('addflex');
            	$('.tracker-buttons').show();

       
            	if ( response.length > 0 ) {
            	
            		if(response[0].duration > 1200) response[0].duration = 1200;	
            		

            		console.log("rbt minute: " + parseInt(response[0].duration/60) + "  seconds: " + parseInt(response[0].duration%60));         		
 
					console.log('tracker==>', response);
            		if(response[0].status == 'play') {  
            			let full_current_date = moment().format("YYYY-MM-DD hh:mm:ss");
            			var dt1 = new Date(response[0].date);
						var dt2 = new Date(full_current_date);						
						var diff = Math.abs((dt2 - dt1) / 1000);	
						totalSeconds = parseInt(diff) + parseInt(response[0].duration);				
						totalSeconds = parseInt(1200 - totalSeconds);
						if(totalSeconds < 0) totalSeconds = 0;
						autoplay();	
            			
            		}else if(response[0].status == 'stop') {         
            			totalSeconds = parseInt(1200 - response[0].duration);
						if(totalSeconds < 0) totalSeconds = 0;

            			$('#start_session').hide();
            			$(".resumebtns").show();
            		}else if(response[0].status == 'completed') { 
            			$("#manualone").addClass('disable-li');
            			$("#completed").show();
            			$('#start_session').hide();
            			$("#congo").show();
						$("#desc_heading").hide();	
            		}

            		$('#second').html(pad(parseInt(totalSeconds%60)));
            		$('#minute').html(pad(parseInt(totalSeconds/60)));   
            	}	
            }
        }); 
		

		//update tracker counts			
		update_completed_tracker();
	}

	function start_tracker() {

		let current_date = moment().format("YYYY-MM-DD hh:mm:ss");
		let duration = (parseInt($('#minute').html()) * 60) + parseInt($('#second').html());

		totalSeconds = parseInt(duration);	
		
		if(duration == 0) {
			totalSeconds = 1200;
		}
		else if(duration > 0 && duration < 1200) {
			duration = parseInt(1200 - duration);
			
		}
		else if(duration > 1200) {
			duration = 1200;  
			totalSeconds = 0;
		}	
		else if (duration == 1200) {
			duration = 0;  
			totalSeconds = 1200;
		}

		let tracker = {
            date: current_date,
            duration:duration,
            status: 'play'
        }
		$.ajax({
            url: `<?=site_url("wp-json/api")?>/user/tracker`,           
            type : "POST",
            dataType: "json",
			cache: false,
            contentType: 'application/json',
 			data: JSON.stringify(tracker),
            beforeSend: xhr => {            	
                xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");            	
            },
            success: (response) => {            	  	         	
            	console.log('tracker: ', response);
            }
        }); 

	}

	function stop_tracker() {

		let current_date = moment().format("YYYY-MM-DD hh:mm:ss");
		//let duration = (parseInt($('#minute').html()) * 60) + parseInt($('#second').html());
		let duration = (parseInt($('#minute').html()) * 60) + parseInt($('#second').html());
			duration = parseInt(1200 - duration);

		let tracker = {
            date: current_date,
            duration:duration,
            status: 'stop'
        }
		$.ajax({
            url: `<?=site_url("wp-json/api")?>/user/tracker`,           
            type : "POST",
            dataType: "json",  
			cache: false,
            contentType: 'application/json',
 			data: JSON.stringify(tracker),
            beforeSend: xhr => {            	
                xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");            	
            },
            success: (response) => {            	  	         	
            	console.log('tracker: ', response);
            }
        }); 

	}

	function end_tracker(id) {
		
		if(id == 'save_activity') {

			var min = (!$('#input_minute').val()) ? 0 : $('#input_minute').val();
			var sec = (!$('#input_second').val()) ? 0 : $('#input_second').val();

			var duration = parseInt(min * 60) + parseInt(sec);			
			duration2 = duration > 1200 ? 0 : parseInt(1200 - duration);
			$('#second').html(pad(parseInt(duration2%60)));
            $('#minute').html(pad(parseInt(duration2/60)));    

   			var final_duration = duration;

		} else {
			var duration = (parseInt($('#minute').html()) * 60) + parseInt($('#second').html());
			duration2 = parseInt(1200 - duration);
			var final_duration = duration2;
		}

		let current_date = moment().format("YYYY-MM-DD hh:mm:ss");		
		//let status = (id == 'finish') ? 'completed' : 'stop';
		let status = (parseInt(final_duration) >= 1200) ? 'completed' : 'stop';

		let tracker = {
            date: current_date,
            duration: final_duration,
            status: status
        }
		
		$.ajax({  
            url: `<?=site_url("wp-json/api")?>/user/tracker`,           
            type : "POST",
			cache: false,         
            contentType: 'application/json',
 			data: JSON.stringify(tracker),
            beforeSend: xhr => {            	
                xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");            	
            },
            success: (response) => {            	  	         	
            	console.log('tracker111: ', response);
            }
        }).always(function(data){
			console.log('tracker=>always: ', tracker);
		});


        totalSeconds = parseInt(duration2);	

        if(totalSeconds < 0) totalSeconds = 0;


		if(status === 'completed') {
			$("div#complted-session-modal.overlay").css({'visibility':'visible', 'opacity':1}).addClass('addflex'); 
			$("#resume_session").hide();
			$("#completed").show();
			$("#congo").show();
			$("#desc_heading").hide();	
			$("#manualone").addClass('disable-li');
			$("#timerone").trigger('click');
			stop_timer();	
			update_completed_tracker();
		} else {		
			$("#resume_session").hide();
			$("#resume_session").show();	
			$("#timerone").trigger('click');
			stop_timer();			
		}	
	} 

	function update_completed_tracker(){

		$.ajax({
            url: `<?=site_url("wp-json/api")?>/user/tracker?status=completed`,           
            type : "GET",
            dataType: "json",
            beforeSend: xhr => {            	
                xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");            	
            },
            success: (response) => {      
            	// $(".tracker_counts").text(response.length);   

				var streak = 0;
				var prev_date = '';
				$.each(response, function( index, value ) {
					if(index==0){
						streak = 1;
						prev_date = new Date(value.date.split(" ")[0]);
						return;
					}

					var current_date = new Date(value.date.split(" ")[0]);
					var diff = new Date(current_date - prev_date);
					var days = Math.floor( diff/1000/60/60/24 );
					

					streak = (days==1) ? streak + 1 : 1;
					console.log(prev_date,current_date,diff, days, streak)
					prev_date = current_date;
				
				});

				$(".tracker_counts").text(streak);  
            }	
        });	
	}


	function reset_tracker() {

		let current_date = moment().format("YYYY-MM-DD hh:mm:ss");

		$('#minute').html('20');
		$('#second').html('00');
		
		duration = 0;  

		let tracker = {
			date: current_date,
			duration:duration,
			status: 'stop'
		}
		$.ajax({
			url: `<?=site_url("wp-json/api")?>/user/tracker/update`,           
			type : "PUT",
			dataType: "json",
			contentType: 'application/json',
			data: JSON.stringify(tracker),
			beforeSend: xhr => {            	
				xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");            	
			},
			success: (response) => {            	  	         	
				console.log('tracker: ', response);
			}
		}); 		

	}

	// dp intro tour
	if (window.DpitHooks) {	

        DpitHooks.add_action('started', (args) => {
			$('.tooltip_menu').show();

			setTimeout(function(){ 
				$('.dpintro-progress').insertBefore('.dpintro-tooltip-text');
				$('.dpintro-button-skip').insertAfter('.dpintro-button-next');
				$('.dpintro-button-next').html('Next');
				$('.dpintro-button-done').removeClass('dpintro-button-skip').html('Next');		

			}, 500);
			
        }); 
		
		DpitHooks.add_action( 'beforeStepChange', (args) => {  
			$('.dpintro-progress').insertBefore('.dpintro-tooltip-text'); 
			$('.dpintro-button-skip').insertAfter('.dpintro-button-next');
			$('.dpintro-button-next').html('Next');
							
		});
	
		DpitHooks.add_action( 'afterStepChange', (args) => {  

			$('#menu-item-2688').removeClass('current-menu-item');
			$('#menu-item-2370').addClass('current-menu-item');

			if (args.currentStepObj.index === 3) {					
				$('#menu-item-2370').removeClass('current-menu-item');
				$('#menu-item-2688').addClass('current-menu-item');
			}	
			if ($('.dpintro-button-done').length > 0) {
				$('.dpintro-button-done').removeClass('dpintro-button-skip').html('Next');
				$('<a class="dpintro-button dpintro-button-skip" role="button" id="custom-exit-dpintro">Skip Tutorial</a>').insertAfter('.dpintro-button-done');				
			}
		});

		$(document).on("click", "#custom-exit-dpintro", () => {	
			DpitApi.exit();
		});

    }
    $('.recording_box--featured').first().addClass('first');
    $('.upcomgwebnianes_box').first().addClass('first');	


});

</script>

<?php
get_footer();
