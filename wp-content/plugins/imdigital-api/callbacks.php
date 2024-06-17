<?php
function get_user() {
	$user_id = pb_auth_user($request->get_header('Authorization'));;
	return 'test';
}

function app_login_user(WP_REST_Request $request) {
	$username = $request->get_param('username');
	$password = $request->get_param('password');
	$user = wp_authenticate( $username, $password );
	if(is_wp_error($user)) {
        return new WP_REST_Response('Username or Password Incorrect', 403);
    } else {
	    $response['token'] = bin2hex(random_bytes(64));
		$response['user_id'] = $user->data->ID ;
	    $response['user_email'] = $user->data->user_email ;
	    $response['user_nicename'] = $user->data->user_nicename ;
	    $response['user_display_name'] = $user->data->display_name ;
	    $response['avatar'] = get_avatar_url($user->data->ID );
	    update_user_meta( $user->data->ID , 'mobile_app_token', $response['token'] );
		update_user_meta($user->data->ID , 'swing_analysis_credits', 2);
    }
	$response = new WP_REST_Response($response);
	return $response;
}

function reset_user() {

}


function test(WP_REST_Request $request) {
	return $request->get_param('course_id');
}


function pb_auth_user ($token) {
	global $wpdb;
	$token = preg_replace('/Bearer /', '', $token);
	if (empty($token)){
		$user_cookie = (wp_parse_auth_cookie( '', 'logged_in' ));
		$user = get_user_by( 'email', $user_cookie['username'] );
		if (isset( $user->data->ID)){
			
			return $user->data->ID;
		} else {
			return false;
		}
	}
	$user = $wpdb->get_row( "SELECT * FROM $wpdb->usermeta WHERE meta_value = '$token'" );
	if (isset($user)){
		wp_set_current_user( $user->user_id );
		return $user->user_id;
	} else {
		return false;
	}
}




function get_courses(WP_REST_Request $request) {
	global $wpdb;
	$user_id = pb_auth_user($request->get_header('Authorization'));;
	if ($user_id == false) {
		return new WP_REST_Response('Unauthorized', 401);
	}
	//Get all courses
	$all_courses = $wpdb->get_results("SELECT ID, post_title FROM {$wpdb->prefix}posts WHERE post_type = 'sfwd-courses' AND post_status = 'publish' Order BY menu_order asc", OBJECT);

	$all_courses_count = count($all_courses);

	//Get Course Progress
	$user_meta = get_user_meta($user_id);
	$course_progress = unserialize($user_meta["_sfwd-course_progress"][0]);

	$response = array();
	foreach ($all_courses as $course) {
		$course_id = $course->ID;
		$completed = 0;
		$total = 0;
		$percentage = 0;
		if (isset($course_progress[$course_id])) {
			$completed = $course_progress[$course_id]['completed'];
			$total = $course_progress[$course_id]['total'];
			$percentage = round(($completed / $total) * 100, 0);
		}
		#$show_in_app = get_field('show_in_app',$course->ID);
		//Does the user have access to it?
		#if (!memb_hasPostAccess( $course_id )){
		#	$show_in_app = false;
		#}
	
		$url = get_the_post_thumbnail_url($course->ID);
		#if (!empty($url) && $show_in_app) {
		$response[] = array(
			'title' => $course->post_title,
			'post_title' => $course->post_title,
			'id' => $course->ID,
			'percent_complete' => $percentage,
			'thumbnail' => get_the_post_thumbnail_url($course->ID,'full')
		);
		#} else {

		#}
	}
	$response = new WP_REST_Response($response);
	return $response;

}


function get_path( WP_REST_Request $request) {
	$return = array("success" => true);  
	$pathPercent = 0;
	$steps = 0;
	$currentStep = 0;
	$streak = 0;
	$postId = $request->get_param( 'id' );
	
	// Check rows exists.
	if( have_rows('steps',$postId) ):
	// Loop through rows.
		$steps = count(get_field('steps', $postId));
		
		while( have_rows('steps',$postId) ) : the_row();
		
		
		// Set Initial Values
		$currentStep++;
		$youAreHere = false;
		$completed = false;
		$url = get_sub_field('url');
		$course_id = get_sub_field('link');
		$user_id = get_current_user_id();
	
		
		//Code for figuring out if step has been completed or not
		/*
		*******
		CODE FOR FIGURING OUT IF STEP COMPLETE GOES HERE
		a Helpful function is 
		learndash_user_progress_is_step_complete( integer $user_id,  integer $course_id,  integer $step_id )
		https://developers.learndash.com/function/learndash_user_progress_is_step_complete/
		*******
		*/
		if (learndash_course_completed($user_id, $course_id ) ){
			$completed = true;
		}
		
		//Override for testing
		if (get_sub_field('is_completed')){
			$completed = get_sub_field('is_completed');
		}
		
		//Get URL
		if (empty($url)){
			$url = get_permalink( $course_id );
		}
		
		
		//Handle Final/Finish Step
		
		if ($currentStep == $steps)
		{
			if ($streak + 1 == $steps)
			{
				$image = get_sub_field('complete_image');
				$image = $image['url'];
				$pathPercent = get_sub_field('path_percent');
				$streak++;
			} else {
				$image = get_sub_field('incomplete_image');
				$image = $image['url'];
			}
		}
		else {
		if ($completed){
			
			$image = get_sub_field('complete_image');
			$image = $image['url'];
			$streak++;
			if ($streak  == $currentStep) {
				$pathPercent = get_sub_field('path_percent');
				$youAreHere = true;
			}
			}else {
				
				$image = get_sub_field('incomplete_image');
				$image = $image['url'];
				$streak = 0;
			}
		}
		if( $course_id ){
	        $course_steps = learndash_get_course_steps($course_id);
		    $course_steps_total = sizeof($course_steps);
		    //echo "<=>";
		    $completed_steps_count = learndash_course_get_completed_steps($user_id, $course_id);
		    //echo "#";
			if( $course_steps_total ){
		    	$progress_percent =  floor( ( $completed_steps_count / $course_steps_total ) * 100 );
			}else{
				$progress_percent = 0;
			}
		    $progress_decimal =   $progress_percent / 100 ;
		}else{
			$progress_percent = null;
			$progress_decimal = null;
		}
		
		$return['steps'][] = array(
		'title' => get_sub_field('title'),
		'completed' => $completed,
		'positionX' => get_sub_field('postion_x'),
		'positionY' => get_sub_field('position_y'),
		'url' => $url,
		'pathPercent' => $pathPercent,
		'youAreHere' => $youAreHere,
		//'image' => $image,
		'image' => get_sub_field('complete_image')['url'],
		'progress_percent' => $progress_percent,
		'progress_decimal' => $progress_decimal,
		'step' => $currentStep,
		'streak' => $streak
		);
		// End loop.
		endwhile;
		
	// No value.
	else :
	// Do something...
	endif;
	
	//set the spot for the path
	$return['pathPercent'] = $pathPercent;
	
	$response = new WP_REST_Response($return);
	
	return $response;
}


function get_single_course(WP_REST_Request $request) {
	global $wpdb;
	$user_id = pb_auth_user($request->get_header('Authorization'));;
	if ($user_id == false) {
		return new WP_REST_Response('Unauthorized', 401);
	}
	$course_id = $request->get_param('id');

	$user_meta = get_user_meta($user_id);
	$course_progress = unserialize($user_meta["_sfwd-course_progress"][0]);

	$lessons = learndash_get_lesson_list($course_id);
	
	$i = 0;
	foreach ($lessons as $lesson)
	{
		
		if (memb_hasPostAccess( $lesson->ID,705996 )){	
			
		
			$percent_completed=0;
			$lesson_topics[$i]['id'] = $lesson->ID;
			$lesson_topics[$i]['title'] = $lesson->post_title;
			$lesson_topics[$i]['subtitle'] = ' ';
			$lesson_topics[$i]['video_url'] = get_field('video_url', $lesson->ID);
			$lesson_topics[$i]['thumbnail'] = get_the_post_thumbnail_url($lesson->ID,'full');
			$lesson_topics[$i]['progress'] = $percent_completed;
			$lesson_topics[$i]['duration'] = get_field('video_duration', $lesson->ID);
	
			
			$post = get_post($lesson->ID);
			$lesson_topics[$i]['text_html'] = $post->post_content;
			$lesson_topics[$i]['text_plain'] = nl2br(strip_tags($post->post_content));
	
			$multi_tiered = false;
			if ($course_progress[$course_id]['lessons'][$lesson->ID]) {
				$lesson_topics[$i]['completed'] = true;
			} else {
				$lesson_topics[$i]['completed'] = false;
			}
	
			$topics = learndash_topic_dots($lesson->ID, false, 'array');
			if (!empty($topics)) {
				$topic_count = 0;
				$topic_completed_count = 0;
				
				foreach ($topics as $topic) {
					$multi_tiered = true;
					$completed = false;
					if ($course_progress[$course_id]['topics'][$lesson->ID][$topic->ID]) {
						$completed = true;
						$topic_completed_count++;
					}
	
					$post = get_post($topic->ID);
					$lesson_topics[$i]['topics'][] = array(
						'id' => $topic->ID, 
						'title' => $topic->post_title, 
						'completed' => $completed,
						'text_html' => $post->post_content,
						'text_plain' => nl2br(strip_tags($post->post_content)),
						'subtitle' => null,
						'thumbnail' => get_the_post_thumbnail_url($topic->ID,'full'),
						'video_url' => get_field('video_url', $topic->ID),
						'progress' => null,
						'duration' => get_field('video_duration', $topic->ID)
					);
					$topic_count++;
	
				}
				//remove this after making progress actually dynamic
				$lesson_topics[$i]['duration'] = null;
				$percent_completed = round($topic_completed_count / $topic_count * 100);
				$lesson_topics[$i]['progress'] = $percent_completed;
				
			}
		
			$i++;
		}
	}
	
	
	$course  = get_post($course_id);
	$percentage   = 0;
	
	if (isset($course_progress[$course_id])) {
		$completed = $course_progress[$course_id]['completed'];
		$total = $course_progress[$course_id]['total'];
		
		$percentage = round(($completed / $total) * 100, 0);
	}
	
	$return = array();
	$return[] = array(
		'image' => get_the_post_thumbnail_url($course_id,'full'),
		'title' => $course->post_title,
		'subtitle' => ' ', 
		'progress' => $percentage , //make dynamic
		'description' => 'Course description for '.$course->post_title,
		'multi_tiered' => $multi_tiered,
		'lessons' => $lesson_topics,
		
	);

	$response = new WP_REST_Response($return);
	return $response;

}


function get_course_lesson( WP_REST_Request $request) {
	$user_id = pb_auth_user($request->get_header('Authorization'));;
	if ($user_id == false) {
		return new WP_REST_Response('Unauthorized', 401);
	}
	$lesson_id = $request->get_param('lesson_id');
	$post = get_post($lesson_id);
	
	$video_url = "https://raw.githubusercontent.com/mediaelement/mediaelement-files/master/big_buck_bunny.mp4";
	$return = array();
	$return['title'] = $post->post_title;
	$return['completed'] = learndash_is_lesson_complete($user_id,$lesson_id);
	$return['video_url'] = $video_url;
	$return['text_html'] = $post->post_content;
	$return['text_plain'] = nl2br(strip_tags($post->post_content));


	$course = learndash_get_course_progress($user_id,$lesson_id);
	$return['prev_lesson_id'] = $course['prev']->ID;
	$return['next_lesson_id'] = $course['next']->ID;
	
	$response = new WP_REST_Response($return);
	return $response;
}

function lesson_markcomplete( WP_REST_Request $request ) {
	$user_id = pb_auth_user($request->get_header('Authorization'));;
	if ($user_id == false) {
		return new WP_REST_Response('Unauthorized', 401);
	}
	$lesson_id = $request->get_param('id');
	$result = learndash_process_mark_complete($user_id, $lesson_id);

	$response = new WP_REST_Response($result);
	
	return $response;
}


function get_current_user_data(){
	global $wpdb;
	$user_id      		   = pb_auth_user($request->get_header('Authorization'));;
	$current_user		   = wp_get_current_user(); 
	$response["user_meta"] = get_user_meta($user_id);
	$response["avatar"]    = get_avatar_url( $current_user->user_email, ["size"=>150]);

	if(strpos($response["avatar"], "gravatar.com") > 0 ) $response["avatar"] = "http:".$response["avatar"];

	return $response;
}

function app_reset_user(WP_REST_Request $request) {
	
	global $wpdb, $wp_hasher;
	$user_login = $request->get_param('email');
	retrieve_password( $user_login );
  
	$response = array('success' => true, 'message' => 'Please check your email to reset your password');

	$response = new WP_REST_Response($response);
	return $response;

}

function im_user_tracker($atts) {

 	global $club_settings;

 	//get club slug from the Club Menu
   //$club_settings = get_fields('option');
	$club_id =get_field('club');
    foreach($club_settings as $key=>$val ) {
    	if($val['club_id'] == $club_id){
        	$club = str_replace('_menu', '', $key);
			}
    }
    
	$content = '<div class="daily_tracker" id="the_daily_tracker">

			    		<div class="timer">
							<!--Hiding for initial launch-->
							<!--<ul>
			    				<li id="timerone"><a href="javascript:;" id="one" class="timetrackeractive"><i class="trackericons" id="timer"></i>Timer</a></li>
			    				<li id="manualone"><a href="javascript:;" id="two" class=""><i class="trackericons" id="manual"></i>Manual</a></li>
			    			</ul> -->

                            <!-- Timer Tracker -->
			    			<div id="timer_tracker">
			    				<p id="desc_heading">Click the button below to start the timer to log your 20-minute session.</p>
			    				<p id="congo" style="display: none">Congratulations! You hit your 20 minutes goal for today. Keep it up!</p>

			    				<div class="countdown" id="countdown-skeleton-loader">
									<div class="countdown-item skeleton-loader">
								    	<span></span>
								    	<span></span>
								  	</div>
								  	<div class="countdown-item skeleton-loader">
								    	<span></span>
								    	<span></span>
								  	</div>
								</div>
								<div style="margin-top:15px" id="tracker-skeleton-loader">
									<div class="skeleton-loader" style="height:54px; width:100%"></div>
								</div>


			    				<div class="countdown" id="starttracker">
									<div class="countdown-item">
								    	<span id="minute">20</span>
								    	<span>Minutes</span>
								  	</div>

								  	<span class="dots">:</span>

								  	<div class="countdown-item">
								    	<span id="second">00</span>
								    	<span>Seconds</span>
								  	</div>
								</div>

								<div class="tracker-buttons">
									<a href="javascript:;" class="tracker-buttons__accessbtn--'.$club.' accessbtn" id="start_session">Start Session</a>
									<a href="javascript:;" class="tracker-buttons__accessbtn--'.$club.' accessbtn" id="resume_session" style="display: none">Resume Session</a>
									<a href="javascript:;" class="accessbtn" id="completed" style="display: none">Completed</a>
									<a href="javascript:;" id="stop_session"><img src="/wp-content/uploads/2022/02/'.$club.'-pause.png"></a>
									<div class="resumebtns" style="display: none">
										<a href="javascript:;" id="resume">RESUME</a>
										<a href="javascript:;" id="reset">RESET</a>
										<a href="javascript:;" class="tracker-buttons__accessbtn--'.$club.'" id="finish">FINISH</a>
									</div>
								</div>	

			    			</div>

			    		</div>';
	 
    return $content;
}


add_shortcode('im-user-tracker', 'im_user_tracker');
add_shortcode('im-user-header-tracker', 'im_user_header_tracker');
function im_user_header_tracker(){

	if ( is_user_logged_in() ) 
	{ 
	global $club_settings;
   $segment = explode('/', $_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $currntShortCode =  $segment[1];
    if($currntShortCode!='trading-club-dashboard' && $currntShortCode!= 'crypto-club' && $currntShortCode!='gold-club-dashboard')
    {
		 	//get club slug from the Club Menu
		 // '<pre>';print_r($club_settings);
		  // $club_settings = get_fields;
		
			 $club_id =get_field('club');
		    foreach($club_settings as $key=>$val ) {
		    	if($val['club_id'] == $club_id){
		        	$club = str_replace('_menu', '', $key);
					}
		    }
		     $protocol = (isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] === "on")) ? "https" : "http";
		     $urlPre   = $protocol . "://" . $_SERVER['HTTP_HOST'] ."/";
       	$club_name =  $club;
			$content = '<div class="daily_tracker" id="the_daily_tracker">

					    		<div class="timer">
									<!--Hiding for initial launch-->
									<!-- Timer Tracker -->
					    			<div id="timer_tracker">
									
					    				<!--<p id="desc_heading">Click the button below to start the timer to log your 20-minute session.</p>
					    				<p id="congo" style="display: none">Congratulations! You hit your 20 minutes goal for today. Keep it up!</p>-->
										<div class="countdown" id="starttracker">
									 
										<div class="countdown-item12">
										    <span>Daily Timer: </span>
										  	</div>
											<div class="countdown-item">
										    	<span id="minute">20</span>
										    	<span>Minutes</span>
										  	</div>

										  	<span class="dots">:</span>

										  	<div class="countdown-item">
										    	<span id="second">00</span>
										    	<span>Seconds</span>
										  	</div>
										</div>

										<div class="tracker-buttons" style="right: 100px;" >
											
											
											<div class="resumebtns" style="display: none">
												<a title="Resume" href="javascript:;" id="resume"><img src="'.$urlPre.'wp-content/uploads/2023/12/paly-button-icon-1-1.svg"></a>
												<a title="Reset" href="javascript:;" id="reset"><img src="'.$urlPre.'wp-content/uploads/2023/11/03-icon.svg" style="max-width: 14px;"></a>
											</div>
											<a title="Start Session" href="javascript:;" id="start_session"><img src="'.$urlPre.'wp-content/uploads/2023/12/paly-button-icon-1-1.svg"></a>
											<!--<a title="Stop" href="javascript:;" id="stop_sessions"><img src="'.$urlPre.'wp-content/uploads/2023/11/01-icon.svg" style="max-width: 14px;"></a>-->
											<a style="display: none" title="Stop" href="javascript:;" id="stop_timers"><img src="'.$urlPre.'wp-content/uploads/2023/11/01-icon.svg" style="max-width: 14px;"display: none"></a>
											<a style="display: none" title="Reset" href="javascript:;" id="reset_timer"><img src="'.$urlPre.'wp-content/uploads/2023/11/03-icon.svg" style="max-width: 14px;"></a>
										</div>	

					    			</div>

					    		</div>';
			 
		    echo $content;
 
 }
}  
if ( is_user_logged_in() ) 
	{ 
?> 
<script>
	
jQuery(document).ready(function ($) {


$('body').addClass('page-template-crypto_club_dashboard');

$("#content").delay(1000).css('visibility','visible');
//$("#the_daily_tracker").delay(9000).css('display','');
	

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
	 	
	 	$("#stop_timers").show();
	 	$("#start_session").hide();
	 	$("#resume_session").hide();
	 	$(".resumebtns").hide();
	 	$("#reset_timer").hide();	 	
	 	$(".tracker-buttons").css({"right":"85px"});
	 	$("#stop_session").addClass('addflex');
	 	/*$("#stop_session").css({"display":"block !important"});	*/
	 	$('.new_daily_timer #stop_session').attr('style','display: block !important');	 
	});

	$(document).on("click", "#stop_session", () => {
		stop_timer();
		stop_tracker();
		$("#stop_sessions").removeClass('addflex');
		$(".resumebtns").show();
		$("#stop_timers").show();
		$("#stop_sessions").hide();

		$(".tracker-buttons").css({"right":"50px"});
		 
	});

	$(document).on("click", "#stop_timers", () => {		
	 	stop_timer();
		stop_tracker();
	 	$("#start_session").show();
	 	$("#start_session").prop('title',"Resume")
	 	$("#stop_timers").hide();
	 	$(".resumebtns").hide();
	 	$("#reset_timer").show();	 		 	
	 	$(".tracker-buttons").css({"right":"30px"});
	 	//$("#stop_session").addClass('addflex');
	 	/*$("#stop_session").css({"display":"block !important"});	*/
	 	//$('.new_daily_timer #stop_session').attr('style','display: block !important');	 
	});

	$(document).on("click", "#reset", () => {
		reset_tracker();		 
	});

	$(document).on("click", "#reset_timer", () => {
		reset_tracker();		 
	});

	$(document).on("click", "#finish", () => {	
		$("#stop_session").removeClass('addflex');
		$(".resumebtns").hide();
		$(".tracker-buttons").css({"right":"90px"});
		
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
		$(".tracker-buttons").css({"right":"90px"});		
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
		
		console.log(totalSeconds);

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
			totalSeconds--;
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
	 	$(".tracker-buttons").css({"right":"90px"});
	 	$("#start_session").hide();
	 	$("#stop_session").addClass('addflex');
	 	$('.new_daily_timer #stop_session').attr('style','display: block !important');		
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
						//alert("yes");
						$("#stop_timers").show();
						//$(".tracker-buttons").css({"right":"100px"});
            			
            		}else if(response[0].status == 'stop') {         
            			totalSeconds = parseInt(1200 - response[0].duration);
						if(totalSeconds < 0) totalSeconds = 0;

            			$('#start_session').hide();
            			$(".resumebtns").show();
            			$("#stop_session").hide();

            			$(".tracker-buttons").css({"right":"50px"});
            		}else if(response[0].status == 'completed') { 
            			$("#manualone").addClass('disable-li');
            			$("#completed").show();
            			$('#start_session').hide();
            			/*$("#stop_session").css({"display":"block !important"});	*/
            			$('.new_daily_timer #stop_session').attr('style','display: block !important');
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
<?php if($club_name=='trading' ){ ?>
<style>/* 	Trading hover */
.tracker-buttons a:hover {
    background-color: #0096f0 !important;
}
</style>
<?php } if( $club_name== 'crypto' ){ ?>
<style>
/* 	crypto hover */
.tracker-buttons a:hover {
    background-color: #262f3a !important;
}
</style>
<?php } if($club_name=='gold'){  ?>
<style>
/* 	Gold hover */
.tracker-buttons a:hover {
    background-color: #d79745 !important;
}
</style>
<?php } ?>
<style>
#resume img {
    margin-left: 3px;
    max-width: 14px;
}
.new_daily_timer .daily_tracker {
    border: 0;
    background-color: transparent !important;
    padding: 0px;
    margin: 0px;
    text-align: center;
	max-width: 400px;
    position: relative;
    margin-top: -82px;
    z-index:99;
}
.new_daily_timer .daily_tracker .timer {
    margin: 0px;
}
.new_daily_timer #timer_tracker .tracker-buttons {
    position: absolute;
    display: flex;
		align-items: center;
    right: 0px;
    top: 4px;
    margin-right:5px;
}
#start_session img {
    margin-left: 3px;
    max-width: 14px;
     right: 50px;
}
.new_daily_timer a#reset_timer{
	 width: 40px;
	 height: 40px;
	
}
.new_daily_timer a#reset_timer {
    width: 35px;
    background: #a6b0bb;
    height: 35px;
    border-radius: 50px;
    line-height: 32px;
    margin-top: 20px;
	 /* display: block !important;*/
		margin-left:10px;
		margin-right:25px;
	
}
.new_daily_timer a#stop_sessions{
	 width: 40px;
	 height: 40px;
}
.new_daily_timer #timer_tracker .tracker-buttons a#stop_sessions {
    width: 35px;
    background: #a6b0bb;
    height: 35px;
    border-radius: 50px;
    line-height: 32px;
    margin-top: 20px;
	 /* display: block !important;*/
		margin-left:5px;
}
.new_daily_timer a#start_session{
	 width: 40px;
	 height: 40px;
}
.new_daily_timer a#start_session {
    width: 35px;
    background: #a6b0bb;
    height: 35px;
    border-radius: 50px;
    line-height: 32px;
    margin-top: 20px;
	 /* display: block !important;*/
		margin-left:5px;
	margin-right: 5px;
}
.new_daily_timer a#stop_timers{
	 width: 40px;
	 height: 40px;
}
.new_daily_timer a#stop_timers {
    width: 35px;
    background: #a6b0bb;
    height: 35px;
    border-radius: 50px;
    line-height: 32px;
    margin-top: 20px;
	 /* display: block !important;*/
		margin-left:5px;
	margin-right: 20px;
}
 
.new_daily_timer #timer_tracker .tracker-buttons .addflex {
    max-width: 40px;
}
.countdown-item12 span {
    font-weight: 600;
    padding-right: 5px;
    color: #1f3c61;
}
.new_daily_timer .countdown {
    justify-content: start;
}
.new_daily_timer .countdown-item{
	font-size: 20px;
	min-height: 48px;
	font-family: "Montserrat", sans-serif;
	font-weight: 700;
}
.new_daily_timer .countdown span.dots{
    margin-top: -24px;
    font-size: 25px;
    font-family: "Montserrat", sans-serif;
	font-weight: 700;
}
.new_daily_timer #timer_tracker .tracker-buttons .resumebtns a {
    height: 35px;
    width: 35px;
	line-height:32px;
}

.countdown-item12 {
    font-size: 14px;
	font-family: "Montserrat", sans-serif;
}
.countdown-item span:nth-child(2) {
    font-size: 12px;
}
.countdown-item span:nth-child(1) {
    height: 20px;
}
.countdown-item {
    min-width: 56px;
	}
	
</style>

 <?php
 } }

 ?>  