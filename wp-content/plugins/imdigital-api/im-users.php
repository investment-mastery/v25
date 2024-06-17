<?php 
namespace InvestmentMastery;

class InvestmentMasteryUsers extends InvestmentMastery{

    static $dashboard_page_id = 87;

    static function get_learning_path( \WP_REST_Request $request ){
        $user_id = parent::pb_auth_user($request);
        
        if(!empty($user_id)){
            $i = 0;
            $response = [];
            if(have_rows("learning_paths", self::$dashboard_page_id)){
                while(have_rows("learning_paths", self::$dashboard_page_id)){
                    the_row();

                    
                    while(have_rows("path_details")){
                        the_row();
                        $name = get_sub_field("name");
                        $sub_title = get_sub_field("sub_title");
                        $description = get_sub_field("description");
                        $enrollment_close_date = get_sub_field("enrollment_close_date");

                        $response[$i]["name"] = $name;
                        $response[$i]["sub_title"] = $sub_title;
                        $response[$i]["description"] = $description;
                        $response[$i]["enrollment_close_date"] = date("Y-m-d H:i:s", strtotime($enrollment_close_date));
                        $course = get_sub_field("course");
                        $response[$i]["course_id"] = $course->ID;
                        $response[$i]["course_title"] = $course->post_title;
                        $response[$i]["locked"] = true; // need to confirm how lock work
                    }

                    $response[$i]["course_progress"] = learndash_course_get_completed_steps($user_id, $response[$i]["course_id"]);
                    $path_items = [];
                    while(have_rows("path_items")){
                        the_row();
                        
                        $lessontopicquiz = get_sub_field("lessontopicquiz");
                        $icon            = get_sub_field("icon");
                        $name            = get_sub_field("name");
                        $is_finish_path  = get_sub_field("is_finish_path");

                        $path_items[] = [
                            "path_id" => ( empty( $lessontopicquiz->ID )) ? 0:$lessontopicquiz->ID,
                            "icon" => $icon,
                            "name" => $name, 
                            "is_finish_path" => $is_finish_path
                        ];
                        
                    }

                    $response[$i]["path_items"] = $path_items;

                    $i++;
                }

            }

            $response = new \WP_REST_Response($response);
	        return $response;
        
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function pbd_get_gamification_stats($user_id){

        $next_level_id   = gamipress_get_next_user_rank_id($user_id, 'levels');
        $requirements    = gamipress_get_rank_requirements($next_level_id);
        $points_needed   = get_post_meta($next_level_id, '_gamipress_points_to_unlock', true);
        $current_rank_id = gamipress_get_user_rank_id ($user_id, 'levels');
        $current_rank    = get_the_title($current_rank_id);
        $current_rank_image = get_the_post_thumbnail_url($current_rank_id);
        $current_points  = gamipress_get_user_points($user_id,'points');
        
        $completion      = round($current_points/ $points_needed * 100,0);	
        $response['coins'] = gamipress_get_user_points ($user_id, 'coins');
        $response['points'] = gamipress_get_user_points ($user_id, 'points');
        
        $practice_goal = get_user_meta($user_id, 'daily_goal', true );
        if(!empty($practice_goal)){
            $response["daily_goal"] = $practice_goal;
        }else{
            $response["daily_goal"] = 0;
        }

        $response["next_level_id"] = $next_level_id;
        $response["user_id"] = $user_id;

        $response['level'] =  array(
                'current_points' => $response['points'],
                'current_rank' => $current_rank,
                'points_needed' => $points_needed,
                'current_rank_image' => $current_rank_image,
                "current_rank_image_alt" => wp_get_attachment_url( get_post_meta($current_rank_id,"alt_image",true) ),
                'progress' => $completion, 
                'next_level_requirement' => apply_filters("the_content",get_post_meta($next_level_id,"_gamipress_notifications_by_type_rank_requirement_content_pattern",true)),
        );
        
        //Get Streaks
        $streaks = 0;
        $month_dates = [];
    
        // this query will cause bottleneck in the future since we are getting all results for the user
        // to solve this I think is to query at 1 day of the month and last day of the month
        // group by date("Y-m-d")
        /*$date_start = date("Y-m-1 00:00:00");
        $date_end   = date("Y-m-t 23:59:59"); # get the last day of the month
        $sql = " 
            SELECT DATE_FORMAT(`date_earned`, '%Y-%m-%d') as `date`, sum(points_earned) as points, goal
            FROM `daily_tracker` WHERE user_id = $user_id   
              
            GROUP BY DATE_FORMAT(`date_earned`, '%Y-%m-%d') 
            ORDER BY `date_earned` DESC LIMIT 31
        ";
        $tracker_dates = parent::wpdb()->get_results($sql);
        
        $compare_date = date('Y-m-d', strtotime($tracker_dates[0]->date));
        $dates = [];
        foreach ($tracker_dates as $date){
            $current_date = date('Y-m-d', strtotime($date->date));
            //$month_dates[] = $date->date;
            $dates[] = $date->date;
            if ( $current_date == $compare_date ){
                if($date->points >= $date->goal){
                    $streaks++;
                    $compare_date = date('Y-m-d', strtotime($current_date.' - 1 day'));
                }
            } else
            {
                break;
            }
            
        }

        $previous_has_log = false;
        while (strtotime($date_start) <= strtotime($date_end)) {
            $date_start = date("Y-m-d",strtotime($date_start));
            $has_log = (in_array($date_start, $dates)) ? true:false;
            $month_dates[] = ["date"=>$date_start, "has_log"=>$has_log, "previous_has_log"=>$previous_has_log];
            $previous_has_log = $has_log;
            $date_start = date ("Y-m-d", strtotime("+1 day", strtotime($date_start)));
            
        }

        

        $week_dates = [];

        
        $date_start = date("Y-m-d 00:00:00",strtotime("monday this week"));
        $date_end   = date("Y-m-d 23:59:59",strtotime("sunday this week"));  
        $sql = " 
            SELECT DATE_FORMAT(`date`, '%Y-%m-%d') as `date` 
            FROM `goals_and_points` WHERE user_id = $user_id   
            AND point_type='points' 
            AND ( `date` >= '$date_start' && `date` <= '$date_end' )
            GROUP BY DATE_FORMAT(`date`, '%Y-%m-%d') ORDER BY `date` DESC LIMIT 31
        ";
        
        $tracker_dates = parent::wpdb()->get_results($sql);
        
        $compare_date = date('Y-m-d', strtotime($tracker_dates[0]->date));
        $dates = [];
        foreach ($tracker_dates as $date){
            $dates[] = date('Y-m-d', strtotime($date->date));
        }

        while (strtotime($date_start) <= strtotime($date_end)) {
            $date_start = date("Y-m-d",strtotime($date_start));
            $has_log = (in_array($date_start, $dates)) ? true:false;
            $week_dates[] = ["date"=>$date_start, "has_log"=>$has_log, "day_name_abbr" => date("D",strtotime($date_start))];
            $date_start = date ("Y-m-d", strtotime("+1 day", strtotime($date_start)));
            
        }

        $response['streak'] = $streaks;
        $response['month_progress'] = $month_dates;
        $response['week_progress'] = $week_dates;
        $response["user_id"] = $user_id;


        if($response['streak'] >= 3){
            //reach_3_day_streak
            gamipress_trigger_event( ['event' => "reach_3_day_streak" , 'user_id' => $user_id ] );
        }
        */
        $response["avatar_url"] = get_avatar_url($user_id);
        
        return $response;
    }


    static function get_user_stats ( \WP_REST_Request $request ) {
        $user_id = parent::pb_auth_user($request);
    
        if ($user_id == false) {
            return new \WP_REST_Response('Unauthorized', 401);
        }
        $response = self::pbd_get_gamification_stats($user_id);
        $response["user_id"] = $user_id;
        $response = new \WP_REST_Response($response);
        return $response;
    }
    
    
    static function get_all_achievements( \WP_REST_Request $request ){
        global $wpdb;
        $user_id = parent::pb_auth_user($request);
    
        if ($user_id == false) {
            return new \WP_REST_Response('Unauthorized', 401);
        }
        //post_type=badge
        $rs = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."posts WHERE post_type='badge' and post_status='publish' ORDER BY menu_order ASC ");
        $user_achievements = gamipress_get_user_earned_achievement_ids( $user_id );
    
        $response = [];
        foreach($rs as $r){	 
            $step_requirement = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."posts WHERE post_parent=".$r->ID." AND post_type='step' ");
            if(!empty($step_requirement)) $req_text = $step_requirement[0]->post_title;
            else $req_text = "";
            $response[] = [
                "title" => $r->post_title,
                "id" => $r->ID,
                "image" => get_the_post_thumbnail_url($r->ID),
                "image_alt" => wp_get_attachment_url( get_post_meta($r->ID, "inactive", true) ),
                "awarded" => ( in_array($r->ID, $user_achievements) ) ? true:false,
                "description" => get_post_meta($r->ID,"short_description", true),
                "requirement" => $req_text
            ];
        }
        $response = new \WP_REST_Response($response);
        return $response;
    }
}