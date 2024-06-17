
<?php
/**
 * Displays a lesson.
 *
 * Available Variables:
 *
 * $course_id       : (int) ID of the course
 * $course      : (object) Post object of the course
 * $course_settings : (array) Settings specific to current course
 * $course_status   : Course Status
 * $has_access  : User has access to course or is enrolled.
 *
 * $courses_options : Options/Settings as configured on Course Options page
 * $lessons_options : Options/Settings as configured on Lessons Options page
 * $quizzes_options : Options/Settings as configured on Quiz Options page
 *
 * $user_id         : (object) Current User ID
 * $logged_in       : (true/false) User is logged in
 * $current_user    : (object) Currently logged in user object
 *
 * $quizzes         : (array) Quizzes Array
 * $post            : (object) The lesson post object
 * $topics      : (array) Array of Topics in the current lesson
 * $all_quizzes_completed : (true/false) User has completed all quizzes on the lesson Or, there are no quizzes.
 * $lesson_progression_enabled  : (true/false)
 * $show_content    : (true/false) true if lesson progression is disabled or if previous lesson is completed.
 * $previous_lesson_completed   : (true/false) true if previous lesson is completed
 * $lesson_settings : Settings specific to the current lesson.
 *
 * @since 3.0
 *
 * @package LearnDash\Lesson
 */
$in_focus_mode = LearnDash_Settings_Section::get_section_setting( 'LearnDash_Settings_Theme_LD30', 'focus_mode_enabled' );
add_filter( 'comments_array', 'learndash_remove_comments', 1, 2 );
$lesson_data             = $post;
if ( empty( $course_id ) ) {
    $course_id = learndash_get_course_id( $lesson_data->ID );
    if ( empty( $course_id ) ) {
        $course_id = (int) buddyboss_theme()->learndash_helper()->ld_30_get_course_id( $lesson_data->ID );
    }
}
$lession_list            = learndash_get_lesson_list( $course_id, array('num' => -1 ) );
//$content               = $lesson_data->post_content;
$lesson_topics_completed = learndash_lesson_topics_completed( $post->ID );
$content_urls            = buddyboss_theme()->learndash_helper()->buddyboss_theme_ld_custom_pagination( $course_id, $lession_list );
$pagination_urls         = buddyboss_theme()->learndash_helper()->buddyboss_theme_custom_next_prev_url( $content_urls );

$cnt = count($lession_list);
$actual_cnt = $cnt-1;
$retrive_nm = $lession_list[$actual_cnt];
$post_nm = $retrive_nm->post_name;
$get_url = get_permalink();
$path = parse_url($get_url, PHP_URL_PATH);
$path = rtrim($path, '/');
$segments = explode('/', $path);
$last_parameter = end($segments);
if($post_nm == $last_parameter){
    //echo "IF";
}else{
   // echo "ELSE";
}

// echo $last_parameter;
// echo "**".$get_url;


if ( empty( $course ) ) {
    if ( empty( $course_id ) ) {
        $course = learndash_get_course_id( $lesson_data->ID );
    } else {
        $course = get_post( $course_id );
    }
}
    global $club_settings;
    $club_id =get_field('club');
    /*1249 = YCC CLUB*/
    /*2579 = YTC CLUB*/
    /*3880 = GTF CLUB*/
    if($club_id==1249){
        /*1249 = YCC CLUB*/
        $imgLogo = 'ycc.png';
    }elseif($club_id==2579){
        /*1249 = YTC CLUB*/
         $imgLogo = 'ytc.png';
    }elseif($club_id==3880){
        /*1249 = GTF CLUB*/
         $imgLogo = 'gold.png';
    }
?>
 
<div id="learndash-content" class="container-full">

    <div class="bb-grid grid">       

        <div id="learndash-page-content">
            <div class="learndash-content-body">
                <?php
                $buddyboss_content = apply_filters( 'buddyboss_learndash_content', '', $post );
                if ( ! empty( $buddyboss_content ) ) {
                    echo $buddyboss_content;
                } else {

                    $lesson_no    = 1;
                    foreach ( $lession_list as $les ) {
                        if ( $les->ID == $post->ID ) {
                            break;
                        }
                        $lesson_no ++;
                    }
                    ?>

                    <div class="<?php echo esc_attr( learndash_the_wrapper_class() ); ?>">

                        <?php
                         /**
                          * Action to add custom content before the lesson
                          *
                          * @since 3.0
                          */
                         do_action( 'learndash-lesson-before', get_the_ID(), $course_id, $user_id );
                        ?>
                        <div id="learndash-course-header" class="bb-lms-header">
                            <div class="bb-ld-info-bar">
                                <?php
                                learndash_get_template_part( 'modules/infobar.php', array(
                                    'context'   =>  'lesson',
                                    'course_id' =>  $course_id,
                                    'user_id'   =>  $user_id,
                                ), true );
                                ?>
                            </div>
                            <div class="flex bb-position">
                                <div class="sfwd-course-position">
                                    <span class="bb-pages"><?php echo LearnDash_Custom_Label::get_label( 'lesson' ); ?> <?php echo $lesson_no; ?> <span class="bb-total"><?php _e( 'of', 'buddyboss-theme' ); ?> <?php echo sizeof( $lession_list ); ?></span></span>
                                </div>
                                <div class="sfwd-course-nav">
                                    <div class="bb-ld-status">
                                    <?php
                                        $status = ( learndash_is_item_complete() ? 'complete' : 'incomplete' );
                                        learndash_status_bubble( $status );
                                    ?>
                                    </div>
                                    <?php
                                    $expire_date_calc    = ld_course_access_expires_on( $course_id, $user_id );
                                    $courses_access_from = ld_course_access_from( $course_id, $user_id );
                                    $expire_access_days  = learndash_get_setting( $course_id, 'expire_access_days' );
                                    $date_format         = get_option( 'date_format' );
                                    $expire_date         = date_i18n( $date_format, $expire_date_calc );
                                    $current             = time();
                                    $expire_string       = ( $expire_date_calc > $current ) ? __( 'Expires at', 'buddyboss-theme' ) : __( 'Expired at', 'buddyboss-theme' );
                                    if ( $expire_date_calc > 0 && abs( intval( $expire_access_days ) )  > 0 && ( !empty( $user_id ) ) ) { ?>
                                        <div class="sfwd-course-expire">
                                            <span data-balloon-pos="up" data-balloon="<?php echo $expire_string; ?>"><i class="bb-icons bb-icon-watch-alarm"></i><?php echo $expire_date; ?></span>
                                        </div>
                                    <?php } ?>
                                    <div class="learndash_next_prev_link">
                                        <?php
                                        if ( isset( $pagination_urls['prev'] ) && $pagination_urls['prev'] != '' ) {
                                            echo $pagination_urls['prev'];
                                        } else {
                                            echo '<span class="prev-link empty-post"></span>';
                                        }
                                        ?>
                                        <?php if ( (isset( $pagination_urls['next'] ) && apply_filters( 'learndash_show_next_link', learndash_is_lesson_complete( $user_id, $post->ID ),  $user_id, $post->ID ) && $pagination_urls['next'] != '') || (isset( $pagination_urls['next'] ) && $course_settings['course_disable_lesson_progression'] === 'on' && $pagination_urls['next'] != '') ) {
                                            echo $pagination_urls['next'];
                                        } else {
                                            echo '<span class="next-link empty-post"></span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="lms-header-title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <?php
                            global $post;
                            $course_post = learndash_get_setting( $post, 'course' );
                            $course_data = get_post( $course_post );
                            $author_id = $course_data->post_author;
                            learndash_get_template_part( 'template-course-author.php', array(
                                'user_id'   => $author_id
                            ), true );
                            ?>
                        </div>

                     <div class="learndash_content_wrap">

                        <?php
                            /**
                             * If the user needs to complete the previous lesson display an alert
                             *
                             */
                            if( @$lesson_progression_enabled && ! @$previous_lesson_completed ):
                                $previous_item = learndash_get_previous( $post );
                                learndash_get_template_part('modules/messages/lesson-progression.php', array(
                                    'previous_item' => $previous_item,
                                    'course_id'     => $course_id,
                                    'context'       => 'topic',
                                    'user_id'       => $user_id
                                ), true );
                            endif;
                            if ( $show_content ) :
                         
                                /**
                                 * Content and/or tabs
                                 */
                                 // echo '<pre>'; print_r( $content); 
                              learndash_get_template_part( 'modules/tabs.php', array(
                                    'course_id' => $course_id,
                                    'post_id'   => get_the_ID(),
                                    'user_id'   => $user_id,
                                    'content'   => $content,
                                    
                                    'context'   => 'lesson'
                                ), true );

                                 /*learndash_get_template_part( 'modules/tabs.php', array(
                                    'course_id' => $course_id,
                                    'post_id'   => get_the_ID(),
                                    'user_id'   => $user_id,
                                    'content'   => $content,
                                    
                                    'materials' => $materials,
                                ), true );*/

                                 
                                /**
                                 * Display Lesson Assignments
                                 */
                                if( lesson_hasassignments($post) && !empty($user_id) ):
                                    /**
                                     * Action to add custom content before the lesson assignment
                                     *
                                     * @since 3.0
                                     */
                                    do_action( 'learndash-lesson-assignment-before', get_the_ID(), $course_id, $user_id );
                                    learndash_get_template_part(
                                        'assignment/listing.php',
                                        array(
                                            'course_step_post'  => $post,
                                            'user_id'           => $user_id,
                                            'course_id'         => $course_id
                                        ), true );
                                    /**
                                     * Action to add custom content after the lesson assignment
                                     *
                                     * @since 3.0
                                     */
                                    do_action( 'learndash-lesson-assignment-after', get_the_ID(), $course_id, $user_id );
                                endif;
                                /**
                                 * Lesson Topics or Quizzes
                                 */
                                if( !empty($topics) || !empty($quizzes) ):
                                    /**
                                     * Action to add custom content before the course certificate link
                                     *
                                     * @since 3.0
                                     */
                                    do_action( 'learndash-lesson-content-list-before', get_the_ID(), $course_id, $user_id );
                                    global $post;
                                    $lesson = array(
                                        'post'  => $post
                                    );
                                    learndash_get_template_part( 'lesson/listing.php', array(
                                        'course_id' => $course_id,
                                        'lesson'    => $lesson,
                                        'topics'    => $topics,
                                        'quizzes'   => $quizzes,
                                        'user_id'   => $user_id,
                                    ), true );
                                    /**
                                     * Action to add custom content before the course certificate link
                                     *
                                     * @since 3.0
                                     */
                                    do_action( 'learndash-lesson-content-list-after', get_the_ID(), $course_id, $user_id );
                                endif;
                            endif; // end $show_content
                            /**
                             * Set a variable to switch the next button to complete button
                             * @var $can_complete [bool] - can the user complete this or not?
                             */
                            $can_complete = false;
                            if( $all_quizzes_completed && $logged_in && !empty($course_id) ):
                                $can_complete = apply_filters( 'learndash-lesson-can-complete', true, get_the_ID(), $course_id, $user_id );
                            endif;
                            learndash_get_template_part(
                                    'modules/course-steps.php',
                                    array(
                                        'course_id'          => $course_id,
                                        'course_step_post'   => $post,
                                        'user_id'            => $user_id,
                                        'course_settings'    => isset( $course_settings ) ? $course_settings : array(),
                                        'can_complete'       => $can_complete,
                                        'context'            => 'lesson'
                                    ),
                                    true
                                );
                            /**
                             * Action to add custom content after the lesson
                             *
                             * @since 3.0
                             */
                            do_action( 'learndash-lesson-after', get_the_ID(), $course_id, $user_id ); ?>

                        <?php
                        $focus_mode         = LearnDash_Settings_Section::get_section_setting( 'LearnDash_Settings_Theme_LD30', 'focus_mode_enabled' );
                        $post_type          = get_post_type( $post->ID );
                        $post_type_comments = learndash_post_type_supports_comments( $post_type );
                        if ( is_user_logged_in() && 'yes' === $focus_mode && comments_open() ) {
                            learndash_get_template_part( 'focus/comments.php',
                                array(
                                    'course_id' => $course_id,
                                    'user_id'   => $user_id,
                                    'context'   => 'focus'
                                ),
                                true );
                        } elseif ( $post_type_comments == true ) {
                            if ( comments_open() ) :
                                comments_template();
                            endif;
                        }
                        ?>

                     
                        <?php
                        /**
                         *  custom action steps tab
                         */
                        ?>

                        <ul class="lesson-tab">
                             <?php if(get_post_meta(get_the_ID(), "audio", true) !== '') { ?>
                                <li class="lesson-tab-button current first" id="show-tab-audio"><i class="bb-icon-headphones bb-icon-l"></i> AUDIO</li>
                            <?php } ?> 
                            <?php if($materials!='') { ?> 
                            <li class="lesson-tab-button " id="show-tab-materials"><i class="bb-icon-file-pdf bb-icon-l"></i> MATERIALS</li> 
                        <?php } ?>
                            
                              
                            
                            <?php if(have_rows("action_sets", get_the_ID())) { ?>    
                                <li class="lesson-tab-button current first" id="show-tab-action-steps">ACTION STEPS</li>
                                <li class="lesson-tab-button" id="show-tab-notes"><i class="bb-icon-file-doc bb-icon-l"></i> NOTES</li>
                            <?php } else { ?>
                                <li class="lesson-tab-button  " id="show-tab-notes"><i class="bb-icon-file-doc bb-icon-l"></i> NOTES</li>
                            <?php } ?>                           
                           

                        </ul>
                        <?php if(!have_rows("action_sets", get_the_ID())) { ?> 
                            <div class="lesson-tab-content" id="tab-action-steps" style="display: none;">
                        <?php } else {  ?>   
                            <div class="lesson-tab-content" id="tab-action-steps">
                        <?php } ?>    
                            <p><?php echo get_post_meta(get_the_ID(), "description", true); ?></p>

                            <div class="action-steps-content">
                            <?php
                          
                            if(have_rows("action_sets", get_the_ID())) {
                                echo '<ul>';
                                while(have_rows("action_sets", get_the_ID())) {
                                    the_row();
                                    $uuid = get_sub_field("action_item_uuid");
                                    $action_set = get_sub_field("action_set");
                                    $lesson_completed_action_steps = get_user_meta($user_id, "lesson_completed_action_sets", true);
                                    if( $lesson_completed_action_steps[get_the_ID()] ){
                                        $check =  (in_array($uuid, $lesson_completed_action_steps[get_the_ID()]) ) ? 'checked="checked"' : '';
                                    }
                                    ?> 
                                    <li>
                                        <input type="checkbox" name="action_set" class="action_sets_checkbox" value="<?php echo $uuid;?>" <?php echo $check;?> id="action-<?php echo $uuid;?>"> 
                                        <label for="action-<?php echo $uuid;?>"><?php echo $action_set;?></label>
                                    </li>
                            <?php
                                }
                                echo '</ul>';
                            }

                            ?>
                            </div>
                        </div>
                       

                        <?php if(!have_rows("action_sets", get_the_ID())) { ?> 
                            <div class="lesson-tab-content" id="tab-notes" style="display: none;">
                        <?php } else { ?>
                            <div class="lesson-tab-content" id="tab-notes">
                        <?php } ?>    
                            <span class="success-note"></span>
                            <textarea name="tab_note" class="tab_note" id="tab_note_text" placeholder="Enter your notes here"><?php echo get_user_meta($user_id, "lesson_notes_".get_the_ID(), true);  ?></textarea>  
                            <br>
                            <button class="btn_save_note mini">Save Notes</button>
                        </div>

                            <?php if(!have_rows("action_sets", get_the_ID())) { ?> 
                            <div class="lesson-tab-content" id="tab-materials" style="display: none;">
                        <?php } else { ?>
                            <div class="lesson-tab-content" id="tab-materials">
                        <?php } ?>    
                            <span class="success-note"><br></span>
                              <?php print_r($materials); ?>

                        </div>

                          <?php if(get_post_meta(get_the_ID(), "audio", true) !== '') { ?> 
                             <div class="lesson-tab-content" id="tab-audio"  style="display: block;">  
                        <?php } else { ?>
                           
                                <div class="lesson-tab-content" id="tab-audio" style="display: none;">
                        <?php } ?>    
                                                

                        <?php if(get_post_meta(get_the_ID(), "audio", true) !== '') {   ?>
             <!--RAM ADDED CUSTOM PRESTO PLAYER STARTS -->               
     <div role="tabpanel" tabindex="0" aria-labelledby="content" class="ld-tab-content ld-visible" id="ld-tab-content-27750">
             <div style="height:0px" aria-hidden="true" class=""></div>
                <figure class="wp-block-video presto-block-video  presto-provider-audio" style="--plyr-color-main: #00b3ff; --presto-player-border-radius: 7px; --presto-player-logo-width: 108px; --plyr-audio-controls-background: #eeeeee;--plyr-audio-control-color: #000000;--plyr-range-thumb-background: #000000;--plyr-range-fill-background: #000000;--plyr-audio-progress-buffered-background: rgba(0,0,0,0.35);--plyr-range-thumb-shadow: 0 1px 1px rgba(0,0,0,0.15), 0 0 0 1px rgba(0,0,0,0.2); --presto-curtain-size: 25%">
                    <presto-player id="presto-player-345" src="<?php echo get_post_meta(get_the_ID(), "audio", true);?>" media-title="<?php the_title(); ?>" css="" class="presto-video-id-99999 presto-preset-id-5 skin-default hydrated ready" skin="default" icon-url="/wp-content/plugins/presto-player/img/sprite.svg" preload="" poster="<?php echo get_stylesheet_directory_uri();?>/assets/img/<?php echo $imgLogo; ?>" data-video-cookie-key="learndash-video-progress-b18b37bc636a73a2bce5cc15ba373336" data-video-progression="true" data-video-provider="presto" provider="audio" style="height: auto;line-height: 2 !important;">
                    </presto-player>
                </figure>
                    
            <script>
                 <?php $playerID = rand(000,999999); ?>
            var player = document.querySelector('presto-player#presto-player-345');
            player.video_id = '<?php echo $playerID; ?>';
            player.preset = {"id":5,"name":"YCC Audio","slug":"ycc-audio","icon":"","skin":"default","rewind":true,"play":true,"play-large":false,"fast-forward":true,"progress":true,"current-time":true,"mute":true,"volume":true,"speed":true,"pip":false,"reset_on_end":false,"save_player_position":true,"sticky_scroll":true,"sticky_scroll_position":"","on_video_end":"go-to-start","play_video_viewport":false,"hide_logo":"0","border_radius":7,"background_color":"#cac5c5","control_color":"#000000","is_locked":false,"cta":{"enabled":false,"percentage":100,"show_rewatch":true,"show_skip":true,"headline":"Want to learn more?","bottom_text":"","show_button":true,"button_text":"Click Here","button_color":"","button_text_color":"","background_opacity":0,"button_link":{"id":"","url":"","type":"","opensInNewTab":true},"button_radius":0},"email_collection":{"enabled":false,"behavior":"pause","percentage":0,"allow_skip":false,"provider":"","provider_list":"","provider_tag":"","border_radius":0,"headline":"","bottom_text":"","button_text":"","button_color":"","button_text_color":""},"action_bar":{"enabled":false,"percentage_start":0,"text":"Like this?","line-height":"normal","background_color":"","button_type":"custom","button_count":false,"button_text":"Click Here","button_radius":0,"button_color":"","button_text_color":"","button_link":{"id":"","url":"","type":"","opensInNewTab":false}},"created_by":2488,"created_at":"2024-02-09 09:20:44","updated_at":"2024-02-12 11:25:03","deleted_at":"","type":"audio"};
            player.chapters = [];
            player.overlays = [];
            player.tracks = [];
            player.branding = {"logo":"","color":"#00b3ff","logo_width":108};
            player.blockAttributes = {"src":"<?php echo get_post_meta(get_the_ID(), "audio", true);?>","title":"<?php the_title(); ?>","preset":5,"id":'<?php echo $playerID; ?>',"autoplay":false,"chapters":[],"tracks":[],"visibility":"public"};
                                        player.skin = "default";
            player.analytics = false;
            player.automations = true;
            player.provider = "audio";
            player.youtube = {"noCookie":false,"channelId":"","show_count":false};
                /*jQuery(document).ready(function(){
                setTimeout(function(){
                    alert('Class changed');
                    jQuery(".presto-audio__title, .presto-audio__mobile-title").css("line-height", "normal !important");
                    jQuery(".presto-audio__title, .presto-audio__mobile-title").css("color", "red");
                    }, 10000);

                });*/
            </script>
        </div>
        <!--RAM ADDED CUSTOM PRESTO PLAYER STARTS -->               
            
                       <?php /* ?>
                            <div class="container-audio">
                               
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gold.png'" alt="">
                                </div>
                               
                                <div style="display: flex;flex-direction: column;width: 100%; padding-left: 24px;">
                                    <span style="font-size: 16px;color: #122b46;">Gold FastTrack</span>
                                    <span style="font-family: Montserrat;font-style: normal;font-weight: bold;font-size: 20px;line-height: 24px;color: #1F3C61;"><?php the_title(); ?></span>
                                    <audio controls  loop>
                                    <source src="<?php echo get_post_meta(get_the_ID(), "audio", true);?>">
                                    <!-- <source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9473/new_year_dubstep_minimix.ogg" type="audio/ogg"> -->
                                        Your browser dose not Support the audio Tag
                                </audio>
                                </div>                                
                            </div><?php */ ?>

                        <?php } else { ?>    

                            <span>No audio available.</span>

                        <?php } ?>    
                        </div>


                        <?php
                        /**
                         * custom next | prev lesson links
                         */
                        ?>                       
                           
                        <?php
                        // if ( isset( $pagination_urls['prev'] ) && $pagination_urls['prev'] != '' ) {                          
                        //     $s = explode('href="',$pagination_urls['prev']);
                        //     $t = explode('">',$s[1]);
                        //     $prev_url =  $t[0];
                        //     $prev_lesson_title  =  get_permalink( $post->ID ); 
                        
                        // } else {
                        //     $prev_url =  '';
                        //     $prev_lesson_title = 'Back to the course info';
                        // }    


                        // if ( (isset( $pagination_urls['next'] ) && apply_filters( 'learndash_show_next_link', learndash_is_lesson_complete( $user_id, $post->ID ),  $user_id, $post->ID ) && $pagination_urls['next'] != '') || (isset( $pagination_urls['next'] ) && $course_settings['course_disable_lesson_progression'] === 'on' && $pagination_urls['next'] != '') ) {           
                        //     $s = explode('href="',$pagination_urls['next']);
                        //     $t = explode('">',$s[1]);
                        //     $next_url =  $t[0];
                        //     $next_lesson_title = '';
                           
                        // } else {
                        //     $prev_url =  '';
                        //     $next_lesson_title = '';
                        // }
                        ?>
                        <div class="custom-lesson-next-prev">
                            <a href="" id="prev-lesson-link">
                                <div id="show-prev-lesson">
                                    <span class="prev-lesson-text">BACK</span><span class="next-prev-lesson-title"></span>
                                </div>    
                            </a>                                   
                            <a href="" id="next-lesson-link">
                                <div id="show-next-lesson">
                                    <span class="next-lesson-text">NEXT LESSON</span>    
                                    <span class="next-prev-lesson-title"></span>
                                </div>
                            </a>    
                        </div>

                        
                           
                            
                       



                            </div><?php /* .learndash_content_wrap */ ?> 

                    </div> <!--/.learndash-wrapper-->
                <?php } ?>
            </div><?php /* .learndash-content-body */ ?>
        </div><?php /* #learndash-page-content */ ?>

        <?php if ( ! empty( $course ) ) :
            include locate_template('/learndash/ld30/learndash-sidebar.php');
        endif;
        ?>
    </div>

</div>
 