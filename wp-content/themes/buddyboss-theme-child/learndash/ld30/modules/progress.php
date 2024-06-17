<?php
/**
 * Action to add custom content before the progress bar
 *
 * @since 3.0
 */

$context = ( isset($context) ? $context : 'learndash' );

do_action( 'learndash-progress-bar-before', $course_id, $user_id );
do_action( 'learndash-' . $context . '-progress-bar-before', $course_id, $user_id );

/**
 * In the topic context we're measuring progress through a lesson, not the course itself
 * @var [type]
 */
if( $context !== 'topic' ) {

    $progress_args = apply_filters( 'learndash_progress_args', array(
        'array'     =>  true,
        'course_id' => $course_id,
        'user_id'   =>  $user_id
    ), $course_id, $user_id, $context );

    $progress = apply_filters( 'learndash-' . $context . '-progress-stats', learndash_course_progress( $progress_args ) );

} else {
    global $post;
    $progress = apply_filters( 'learndash-' . $context . '-progress-stats', learndash_lesson_progress( $post, $course_id ) );
}

if($progress):
/**
 * This is just here for reference
 */ ?>
    <div class="ld-progress<?php if( $context === 'course' ):?> ld-progress-inline<?php endif; ?>">
        <?php if( $context == 'focus' ): ?>
            <div class="ld-progress-wrap">
        <?php endif; ?>
            <div class="ld-progress-heading">
                <?php if( $context === 'topic' ): ?>
                    <div class="ld-progress-label"><?php echo sprintf( esc_html_x( '%s Progress', 'Placeholder: Lesson Progress', 'buddyboss-theme' ), LearnDash_Custom_Label::get_label('lesson') ); ?></div>
                <?php endif; ?>
            </div>
             <!--RAM MODIFIED ON 04-12-23-->
            <?php if($progress['percentage'] < 100 && $progress['percentage'] > 0){ 
                 $class_u = 'ld-secondary-color-black-new';   
            }else{
                $class_u = 'ld-secondary-color ld-progress-percentage';   
            } ?>
            <div class="ld-progress-stats">
                <div style="display: flex;justify-content: space-between;">
                    <div class=" <?php echo $class_u; ?> course-completion-rate"><?php echo sprintf( esc_html_x('%s%% Completed', 'placeholder: Progress percentage', 'buddyboss-theme'), $progress['percentage'] ); ?></div>
                    <div class="ld-progress-steps" style="display: block;">
                        <?php
                        // if ( $context === 'course' || $context === 'focus' ):
                        //     $course_args     = array(
                        //         'course_id'     => $course_id,
                        //         'user_id'       => $user_id,
                        //         'post_id'       => $course_id,
                        //         'activity_type' => 'course',
                        //     );
                        //     $course_activity = learndash_get_user_activity( $course_args );
                        //     if( $course_activity && $context === 'course' ) {
    	                //         $date_time_display = get_date_from_gmt( date('Y-m-d H:i:s', $course_activity->activity_updated ), 'Y-m-d H:i:s' );
    	                //         echo sprintf( esc_html_x( 'Last activity on %s', 'Last activity date in infobar', 'buddyboss-theme' ), date_i18n( get_option( 'date_format' ), strtotime( $date_time_display ) ) );
                        //     } else {
    	                //         echo sprintf( __( '%s/%s Steps', 'buddyboss-theme' ), $progress['completed'], $progress['total'] );
                        //     }
                        // endif;

                        if ($progress['percentage'] === 0):
                            echo '<span>Not Yet Started</span>';
                        endif;

                        if ($progress['percentage'] > 0 && $progress['percentage'] < 100):
                            echo '<span>In Progress</span>';
                        endif;
                        
                        if ($progress['percentage'] === 100):
                            echo '<span>Complete</span>';
                        endif;


                        ?>
                    </div>
                </div>    
                
            </div> <!--/.ld-progress-stats-->
            <!--RAM MODIFIED ON 01-12-23-->
            <?php if($progress['percentage'] < 100 && $progress['percentage'] > 0){ 
                 $class_u = 'in-progress-new';   
            }else{
                $class_u = 'ld-secondary-background';   
            } ?>
            <div class="ld-progress-bar">
                <div class="ld-progress-bar-percentage <?php echo $class_u; ?>" style="<?php echo esc_attr( 'width:' . $progress['percentage'] . '%' ); ?>"></div>
            </div>
           <!--RAM MODIFIED ON 01-12-23-->
            <?php if( $context == 'focus' ): ?>
                </div> <!--/.ld-progress-wrap-->
            <?php endif; ?>
    </div> <!--/.ld-progress-->
<?php
endif;
/**
 * Action to add custom content before the course content progress bar
 *
 * @since 3.0
 */
do_action( 'learndash-progress-bar-after', $course_id, $user_id );
do_action( 'learndash-' . $context . '-progress-bar-after', $course_id, $user_id );
