<?php
namespace InvestmentMastery;

class InvestmentMasteryWebinars extends InvestmentMastery 
{

    static $club = "";
    static $fav_webinar_recordings = [];
    static $webinar_recording_progress = [];


    static function update_recording_progress(  \WP_REST_Request $request ){
        
        $user_id = parent::pb_auth_user($request);
        if(!empty($user_id)){
            self::$webinar_recording_progress = get_user_meta( $user_id, "progress_webinar_recordings", true);
            $id = $request->get_param("id");
            $progress = $request->get_param("progress");
            if(empty(self::$webinar_recording_progress)) self::$webinar_recording_progress = [];

            self::$webinar_recording_progress[$id] = $progress;
            update_user_meta($user_id, "progress_webinar_recordings", self::$webinar_recording_progress );
            #delete_user_meta($user_id, "progress_webinar_recordings");

            $response = new \WP_REST_Response(["progress"=>self::$webinar_recording_progress[$id]]);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }
    
    public static function get_webinar_recordings(\WP_REST_Request $request){
        $user_id = parent::pb_auth_user($request);
        if (!empty($user_id)) {
            self::$fav_webinar_recordings = get_user_meta( $user_id, "fav_webinar_recordings", true);
            self::$webinar_recording_progress = get_user_meta( $user_id, "progress_webinar_recordings", true);

            $start = $request->get_param("page_num");
            $length = $request->get_param("page_length");
            $search = $request->get_param("search");
            $club = $request->get_param("club");
            $category = $request->get_param("category");
            $gold_cat = $request->get_param("gold_cat");

            if(empty($length)) $length = 6;
            if(empty($start)) $start = 1;

            $start = $start - 1;
            $start = $start * $length;

            $join = "";
            $where = "";

            if(!empty($search)){
                $where .= " AND (
                    post_title like '%".esc_sql($search)."%'
                   || post_content like '%".esc_sql($search)."%'
                )";
            }


            if(!empty($category)){
                 
                $cat_arr = [];
                foreach($category as $ecat){
                    if(!empty($ecat)) $cat_arr[] = " '".esc_sql($ecat)."' ";
                }
                if(!empty($cat_arr)){
                    $where .= "  
                        AND (  wt.term_id  in (".implode(",", $cat_arr).") )
                    ";
                }

            }

            if(!empty($club)){
                switch($club){
                    case "crypto": 
                        $where .= " AND wt_cat.term_id=36 "; // crypto
                        break; 
                    case "trading": 
                        $where .= " AND wt_cat.term_id=38 "; // stocks    
                        break;
                    case "stocks": 
                        $where .= " AND wt_cat.term_id=38 "; // stocks    
                        break;
                    case "success": 
                        $where .= " AND wt_cat.term_id=39 "; // success    
                        break;  
                    case "gold":           
                        if(!empty($gold_cat))
                            $where .= " AND wt_cat.term_id=$gold_cat "; // gold    
                        else
                            $where .= " AND wt_cat.term_id=51 "; // gold    
                        break;  
                }
            }
             


            if( $request->get_param("is_favorite") == 1){
                if(empty(self::$fav_webinar_recordings)) $fav_ids[] = 0;
                else $fav_ids = self::$fav_webinar_recordings;
                $where .= " AND 
                    ID in (" . implode(", ", $fav_ids). ")
                ";
            }

            $order = " ORDER BY `recording_date` DESC ";
            if($request->get_param("sort")){
                switch(strtolower($request->get_param("sort"))){
                    case "newest": 
                        $order = " ORDER BY `recording_date` DESC ";
                        break;
                    case "oldest": 
                        $order = " ORDER BY `recording_date` ASC ";
                        break;
                }
            }

            if(!empty($request->get_param("status"))){
                $get_all_recordings_count = parent::wpdb()->get_results("
                    SELECT COUNT(DISTINCT ID) as cnt
                    FROM ".self::wpdb()->prefix."posts as p 
                        LEFT OUTER JOIN ".self::wpdb()->prefix."term_relationships as wtr ON wtr.object_id = p.ID
                        LEFT OUTER JOIN ".self::wpdb()->prefix."term_taxonomy as wt ON wt.term_taxonomy_id = wtr.term_taxonomy_id 

                        LEFT OUTER JOIN wp_term_relationships as wtr_cat ON wtr_cat.object_id = p.ID
                        LEFT OUTER JOIN wp_term_taxonomy as wt_cat ON wt_cat.term_taxonomy_id = wtr_cat.term_taxonomy_id

                    WHERE
                        post_status='publish' 
                        AND post_type='webinar_recordings'
                    ".$where."
                ");
               
                $length = $get_all_recordings_count[0]->cnt;
            }

            $sql = "
                SELECT DISTINCT ID, 
                    (
                        SELECT rd.meta_value  FROM ".self::wpdb()->prefix."postmeta as rd WHERE rd.post_id=p.ID AND rd.meta_key='recording_date' LIMIT 1
                    ) as `recording_date`

                    FROM ".self::wpdb()->prefix."posts as p 
                        LEFT OUTER JOIN ".self::wpdb()->prefix."term_relationships as wtr ON wtr.object_id = p.ID
                        LEFT OUTER JOIN ".self::wpdb()->prefix."term_taxonomy as wt ON wt.term_taxonomy_id = wtr.term_taxonomy_id

                        LEFT OUTER JOIN wp_term_relationships as wtr_cat ON wtr_cat.object_id = p.ID
                        LEFT OUTER JOIN wp_term_taxonomy as wt_cat ON wt_cat.term_taxonomy_id = wtr_cat.term_taxonomy_id

                    WHERE
                        post_status='publish' 
                        AND post_type='webinar_recordings'
                    ".$where."
                    ".$order."
                LIMIT $start,  $length ";
             
            $rs_ids = parent::wpdb()->get_results($sql);
            
            $items = [];
            if(!empty($rs_ids)){
                foreach($rs_ids as $eid) {

                    $img = get_the_post_thumbnail_url($eid->ID, "full");
                    $recording = get_post($eid->ID);
                    $recording->recording_date = date("M d, Y", strtotime(get_post_meta($eid->ID, "recording_date", true) ) );                 
                    $recording->image = (!empty($img)) ? $img : get_stylesheet_directory_uri().'/assets/img/'.(($club == 'stocks') ? 'trading' : $club).'_webinar.png'; 
                    $recording->modal_video_player = self::get_video($eid->ID);   
                 
                    $progress = self::$webinar_recording_progress[$eid->ID];

                    if(empty($progress)) $progress = 0;
                    $progress = $progress * 100;
                    $recording->progress = $progress;
                    
                    $status = "";
                    #$progress = $progress * 100;
                    if(empty($progress)) $status = "notstarted";
                    if($progress > 0 && $progress < 100 ) $status = "inprogress";
                    if($progress >= 100 ) $status = "completed";
 
                    $recording->status = $status;

                    if( !empty( self::$fav_webinar_recordings )){
                        $recording->is_favorite = ( in_array($eid->ID, self::$fav_webinar_recordings ) ) ? true:false;
                    }
                    if(!empty($request->get_param("status"))){
                        if( $request->get_param("status") == $status ){
                            $items[] = $recording;
                        }
                    }else{
                        $items[] = $recording;
                    }   
                }
            }
            $response = $items;


            $sql = "
                SELECT DISTINCT ID,
                (
                    SELECT rd.meta_value  FROM ".self::wpdb()->prefix."postmeta as rd WHERE rd.post_id=p.ID AND rd.meta_key='recording_date' LIMIT 1
                ) as `recording_date`
                    FROM ".self::wpdb()->prefix."posts as p 
                        LEFT OUTER JOIN ".self::wpdb()->prefix."term_relationships as wtr ON wtr.object_id = p.ID
                        LEFT OUTER JOIN ".self::wpdb()->prefix."term_taxonomy as wt ON wt.term_taxonomy_id = wtr.term_taxonomy_id

                        LEFT OUTER JOIN wp_term_relationships as wtr_cat ON wtr_cat.object_id = p.ID
                        LEFT OUTER JOIN wp_term_taxonomy as wt_cat ON wt_cat.term_taxonomy_id = wtr_cat.term_taxonomy_id

                    WHERE
                        post_status='publish' 
                        AND post_type='webinar_recordings'
                    ".$where."
                    ".$order."
                LIMIT ".($start+$length).",  $length ";
            
            $next_count = parent::wpdb()->get_results($sql);
             
            if(empty($next_count)) $has_next = false;
            else $has_next = true;
             
            $response = new \WP_REST_Response(["result"=>$response,"has_next"=>$has_next, "next_count"=>count($next_count) ]);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
    }


    static function get_video($id) {

        $video = '';

        $post = get_post($id); 
        if ( has_blocks( $post->post_content ) ) {
            $blocks = parse_blocks( $post->post_content );
            $content_markup = '';

            foreach ( $blocks as $block ) {
                if ( strstr( $block['blockName'], 'presto-player' ) || strstr( $block['blockName'], 'core/embed' )) {
                    $content_markup = render_block( $block );
                    $video = apply_filters( 'the_content', $content_markup );
                    break;
                }                  
            }

            return base64_encode($video);
        
        }           
    }     
}
