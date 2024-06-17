<?php 
namespace InvestmentMastery;

class InvestmentMasteryCourses extends InvestmentMastery{
    static $fav_courses = [];
    static $lesson_completed_action_steps = [];
    static $dashboard_page_ids = ["crypto"=>1249, "trading"=>2579, "gold"=>3880];

    static function get_courses( \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            // my courses 
            // favorites
            // search key
            // sort 
            // status
            self::$fav_courses = get_user_meta( $user_id, "fav_courses", true);
            $start = $request->get_param("page_num");
            $length = $request->get_param("page_length");
            $search = $request->get_param("search_key");
            $is_my_courses = $request->get_param("is_my_courses");
            $sort = $request->get_param("sort");
            $status = $request->get_param("status");
            $is_favorite = $request->get_param("is_favorite");

            if(empty($length)) $length = 6;
            if(empty($start)) $start = 1;

            $start = $start - 1;
            $start = $start * $length;

            $where = [];
            if(!empty($search)){
                $where[] = " AND (
                    post_title like '%".esc_sql($search)."%'
                   || post_content like '%".esc_sql($search)."%'
                )";
            }

            if(!empty($is_favorite)){
                $favs[] = 0;
                if(!empty(self::$fav_courses)){
                    $favs[] = self::$fav_courses;
                }
                $where[] = " AND (
                    ID in (".implode(", ", $favs).")
                ) ";
            }

            if(!empty($is_my_courses)){
                $my_courses = learndash_user_get_enrolled_courses($user_id);
                if(empty($my_courses)) $my_courses_id[] = 0;
                else $my_courses_id = $my_courses;

                $where[] = " AND (
                    ID in (".implode(", ", $my_courses_id).")
                ) ";
            }

            $limit = " LIMIT $start, $length ";

            if(!empty($status)){
                $limit = "";
            }

            $order = " ORDER BY ID ASC ";
            if(!empty($order)){
                switch($sort){
                    case "newest": 
                        $order = " ORDER BY ID DESC ";
                        break;
                    case "oldest": 
                        $order = " ORDER BY ID ASC ";
                        break;
                    case "alphabetical":
                        $order = " ORDER BY p.post_title ASC ";
                        break;
                    case "most popular":
                        break;
                }
            }


            $sql = " 
                SELECT DISTINCT ID 
                FROM ".parent::wpdb()->prefix."posts as p
                WHERE 
                    p.post_status = 'publish' 
                    AND p.post_type = 'sfwd-courses'
                    ". implode(" ", $where ). " ".$order." ".$limit;

            $courses = parent::wpdb()->get_results($sql);
            
            $response = [];
            foreach ($courses as $course) {
                $show = true;
                $course_details = self::single_course_details($course->ID);
                if(!empty($status)){
                    $show = false;
                    if($status == $course_details["status"]) $show = true;
                }

                if($show) $response[] = $course_details; 
            }

            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function get_single_course( \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $course_id = $request->get_param("id");
            $response = self::single_course_details($course_id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }
    
    static function single_course_details( $course_id ){
        // image
        // title 
        // lesson count
        // author name, author avatar
        // has access memb
        // progress percent
        // is favorite

        $post = get_post( $course_id );
        $author = get_user_by("ID", $post->post_author);
        $lesson_ids = learndash_get_course_steps( $course_id, ['sfwd-lessons']);

        $steps_count = learndash_course_get_steps_count( $course_id );
        $steps_completed = learndash_course_get_completed_steps( parent::$user_id, $course_id );
        $percent = 0;

        if($steps_completed > 0 ){
            $percent = (  $steps_completed / $steps_count ) * 100;
        }

        $status = "notyetstarted";
        if( $percent > 0 && $percent < 100 ){
            $status = "inprogress";
        }
        if($percent >= 100 ){
            $status = "completed";
        }

        $course = [
            "course_id" => $course_id,
            "image" => get_the_post_thumbnail_url($course_id),
            "title" => $post->post_title,
            "lesson_count" => count($lesson_ids),
            "lessons" => $lesson_ids,
            "steps_count" => $steps_count,
            "steps_completed" => $steps_completed,
            "percent" => $percent,
            "author" => $author->data->display_name,
            "author_avatar" => get_avatar_url($post->author),
            "is_favorite" => ( in_array($course_id, self::$fav_courses ) ) ? true:false,
            "has_access" => memb_hasPostAccess( $course_id ),
            "status" => $status,
            "link" => get_permalink($course_id)
        ];

        return $course;
    }

    static function mark_course_favorite(  \WP_REST_Request $request ){
        
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $id = $request->get_param("id");
            self::$fav_courses = get_user_meta( $user_id, "fav_courses", true);

            if(empty(self::$fav_courses)) $courses = [];
            else $courses = self::$fav_courses;

            $courses[] = $id;
            update_user_meta($user_id, "fav_courses", $courses );
            self::$fav_courses = get_user_meta( $user_id, "fav_courses", true);
            $response = self::single_course_details($id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function unmark_course_favorite(  \WP_REST_Request $request ){
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $id = $request->get_param("id");
            self::$fav_courses = get_user_meta( $user_id, "fav_courses", true);

            if(empty(self::$fav_courses)) $courses = [];
            else $courses = self::$fav_courses;

            $new_courses = [];
            foreach($courses as $pid){
                if($pid != $id) $new_courses[] = $id;
            }

            update_user_meta($user_id, "fav_courses", $new_courses );
            self::$fav_courses = get_user_meta( $user_id, "fav_courses", true);
            $response = self::single_course_details($id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function lesson_details($id){
        self::$lesson_completed_action_steps = get_user_meta(parent::$user_id, "lesson_completed_action_sets", true);
        $post = get_post($id);
      
        $out["id"] = $id;
        $out["title"] = $post->post_title;
        $out["description"] = get_post_meta($id, "description", true);

        $action_sets = [];
        if(have_rows("action_sets", $id)){
            while(have_rows("action_sets", $id)){
                the_row();
                $uuid = get_sub_field("action_item_uuid");
                $action_set = get_sub_field("action_set");
                $action_sets[] = [
                    "uuid" => $uuid,
                    "action_set" => $action_set,
                    "completed" => ( in_array($uuid, self::$lesson_completed_action_steps[$id]) ) ? true:false
                ];
            }
        }

        $out["action_sets"] = $action_sets;
        $notes = "";
        $out["user_notes"] = get_user_meta(parent::$user_id, "lesson_notes_".$id, true);
        $out["audio"] = get_post_meta($id, "audio", true );

        return $out;
    }

    static function save_notes( \WP_REST_Request $request ){
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $id = $request->get_param("id");

            $notes = $request->get_param("notes");
            update_user_meta(parent::$user_id, "lesson_notes_".$id, $notes );

            $response = self::lesson_details($id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function get_lesson_details( \WP_REST_Request $request ){
        $user_id = parent::pb_auth_user($request);
 
        if(!empty($user_id)){
            $id = $request->get_param("id");
            $response = self::lesson_details($id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }
 

    static function mark_action_complete(  \WP_REST_Request $request ){
        
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $id = $request->get_param("id");
            $uuid = $request->get_param("uuid");
            self::$lesson_completed_action_steps = get_user_meta( $user_id, "lesson_completed_action_sets", true);

            if(empty(self::$lesson_completed_action_steps)) $actions = [];
            else $actions = self::$lesson_completed_action_steps;

            $new_actions = [];
            foreach($actions as $lesson_id=>$arr_actions){
                foreach($arr_actions as $act_uuid){
                   $new_actions[$lesson_id][] = $act_uuid;
                }
            }

            $new_actions[$id][] = $uuid;

            update_user_meta($user_id, "lesson_completed_action_sets", $new_actions );
            $response = self::lesson_details($id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function unmark_action_complete(  \WP_REST_Request $request ){
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $id = $request->get_param("id");
            $uuid = $request->get_param("uuid");
            self::$lesson_completed_action_steps = get_user_meta( $user_id, "lesson_completed_action_sets", true);

            if(empty(self::$lesson_completed_action_steps)) $actions = [];
            else $actions = self::$lesson_completed_action_steps;

            $new_actions = [];
            foreach($actions as $lesson_id=>$arr_actions){
                foreach($arr_actions as $act_uuid){
                    if($act_uuid != $uuid) $new_actions[$lesson_id][] = $act_uuid;
                }
            }

            update_user_meta($user_id, "lesson_completed_action_sets", $new_actions );
            $response = self::lesson_details($id);
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }

    static function get_crypto_courses( \WP_REST_Request $request ){
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            $pid = $request->get_param("pid");
            $sections = [];

            $is_previous_section_complete = true;
            $is_previous_courses_complete = true;
            $last_course_id = 0;

            while(have_rows("sections", $pid)){
                the_row();
                $title = get_sub_field("title");
                $icon = get_sub_field("icon");
                $courses = [];

                $section_course_steps_total = 0;
                $section_completed_course_count = 0;
                $section_total_completed_steps = 0;

                while(have_rows("courses")){
                    the_row();

                    $course = [];
                    $course_post_data = get_sub_field("course");
                    $course["url"] = get_permalink($course_post_data->ID);
                    $course["id"] = $course_post_data->ID;
                    $course["name"] = $course_post_data->post_title;
                    $course["course_steps"] = learndash_get_course_steps($course_post_data->ID);
                    $course["course_steps_total"] = sizeof($course["course_steps"]);
                    $course["completed_steps_count"] = learndash_course_get_completed_steps($user_id, $course_post_data->ID);
                    $course["progress_percent"] =  floor( ( $course["completed_steps_count"] / sizeof($course["course_steps"]) ) * 100 ) ;
                    $course["progress_decimal"] =   $course["progress_percent"] / 100 ;


                    $course["completed"] = false;
                    if($course["progress_percent"] >= 100 ){
                        $course["completed"] = true;
                    }

                    $courses[] = [
                        "course" => $course,
                        "title" => get_sub_field("title"),
                        "icon" => get_sub_field("icon"),
                         
                    ];

                    $section_course_steps_total+=$course["course_steps_total"];
                    $section_total_completed_steps+=$course["completed_steps_count"];

                    if( $course["completed_steps_count"] >= $course["course_steps_total"]){
                        $section_completed_course_count++;
                    }

                    $last_course_id = $course_post_data->ID;
                }
 
                $sections[] = [
                    "title" => $title,
                    "icon" => $icon["url"],
                    "courses" => $courses,
                    "completed_course_count" => $section_completed_course_count,
                    "number_of_courses" => sizeof($courses),
                    "courses_total_steps" => $section_course_steps_total,
                    "courses_total_completed_steps" => $section_total_completed_steps,
                    "is_previous_section_complete" => $is_previous_section_complete,
                    "is_section_complete" => ( $section_completed_course_count >= sizeof($courses)  ) ? true:false,
                    "progress_percent" => ( $section_completed_course_count / sizeof($courses) ) * 100
                ];

                if( $section_completed_course_count >= sizeof($courses) ){
                    $is_previous_section_complete = true;
                }else{
                    $is_previous_section_complete = false;
                }
            }

            $response = new \WP_REST_Response(["sections"=>$sections,"certificate_link"=>learndash_get_course_certificate_link($last_course_id)]);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }
}
?>