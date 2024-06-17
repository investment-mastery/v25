<?php 
namespace InvestmentMastery;

class InvestmentMasteryTracker extends InvestmentMastery{

     static $table_name = 'daily_tracker';


     static function delete_tracker( \WP_REST_Request $request ){ 

          $user_id = parent::pb_auth_user($request);

          if(!empty($user_id)){
               $tracker_id = trim($request->get_param("id"));
            
               if(!empty($tracker_id) && $tracker_id > 0) {

                    global $wpdb; 
                    $result = $wpdb->delete( 'daily_tracker', array( 'id' => $tracker_id ) );
                    $response['success'] = $result;
                    $response = new \WP_REST_Response($response);
                    return $response;   
               }             
              
          }else{
               return new \WP_REST_Response('Unauthorized', 401);
          }
     } 

     static function update_tracker( \WP_REST_Request $request ){ 

          $user_id = parent::pb_auth_user($request);

          if(!empty($user_id)){
               $date = $request->get_param("date");
               $duration = ($request->get_param("duration")) ? $request->get_param("duration") : 0;
               $status =  sanitize_text_field($request->get_param("status"));    

               if($status === 'stop' || empty($status)) {
                    $status = 'stop';
               }     
               if($duration == 0 && $status === 'completed') {
                    $duration = 1200;
               }
                         
               global $wpdb;  
               $table_name = 'daily_tracker';
               if(!empty($date) && !empty($duration)) { 
                    $result = $wpdb->get_results("SELECT id FROM $table_name WHERE DATE(date) = '".date('Y-m-d', strtotime($date))."' AND user_id=$user_id LIMIT 1");

                    if(empty($result)) {                        

                         /** insert new tracker if date not exist **/      
                         $wpdb->insert($table_name, [
                         'user_id' => $user_id,   
                         'date' => date('Y-m-d H:i:s', strtotime($date)),
                         'duration' => $duration,
                         // 'notes' => '',
                         'status' => $status,
                         
                        ],
                        ['%d','%s','%d', '%s']);

                        $tracker_id = $wpdb->insert_id;


                    } else {                          

                         $tracker_id = $result[0]->id;                     
                         /** update tracker if date already exist **/      
                         $wpdb->update($table_name, ['date' => date('Y-m-d H:i:s', strtotime($date)), 'duration' => $duration, 'notes' => '', 'status' => $status],['id'=>$tracker_id]);     
                    }  

                    $response = [
                         'id' => $tracker_id,
                         'user_id' => $user_id,
                         'date' => date('Y-m-d H:i:s', strtotime($date)),
                         'duration' => $duration,                    
                         // 'notes' => '',
                         'status' => $status,
                    ];

                    $response = new \WP_REST_Response($response);
                    return $response;   
               }    
          }else{
               return new \WP_REST_Response('Unauthorized', 401);
          }
     } 




	static function get_tracker( \WP_REST_Request $request ){ 

          $user_id = parent::pb_auth_user($request);

          if(!empty($user_id)){
               $start_datetime = trim($request->get_param("start_datetime"));
               $end_datetime = trim($request->get_param("end_datetime"));
               $status = $request->get_param("status");

               if(!empty($start_datetime) && !empty($end_datetime)) 
                    $date_range = "DATE(date) BETWEEN '".$start_datetime."' AND '".$end_datetime."' AND ";
               else
                    $date_range = '';             
                         

               if(!empty($status)) 
                    $status = " AND status='".$status."'";
             

               global $wpdb;  
          	$result = $wpdb->get_results("SELECT * FROM daily_tracker WHERE ".$date_range." user_id='".$user_id."' $status");
          	$track_details = [];
          	foreach($result as $track) {
          		$track_details[] = [
          			"id" => $track->id,
          			"user_id" => $user_id,
          			"date" => $track->date,
          			"duration" => $track->duration,				
          			"notes" => $track->notes,
                         //"status" => "stop"  
                         "status" => $track->status          		
          		]; 
          	}	
               $response = new \WP_REST_Response($track_details);
               return $response;
          }else{
               return new \WP_REST_Response('Unauthorized', 401);
          }
	} 

     static function get_leaderboard( \WP_REST_Request $request ) {
          $user_id = parent::pb_auth_user($request);

          if(!empty($user_id)){
               $leaderboard = [];
               $sql = "
                    SELECT sum(duration) as points, user_id, `date` FROM `daily_tracker` 
                    
                    GROUP BY user_id
                    ORDER BY points DESC
                    LIMIT 5
               ";
               $rankings = parent::wpdb()->get_results($sql);

               $x = 1;
               foreach($rankings as $ranking){
                    if($ranking->user_id == $user_id) $belong_to_top = true;

                    $name = get_user_meta($ranking->user_id, "first_name", true);
                    $leaderboard[] = ["name"=>$name, "pos"=>$x, "points"=>$ranking->points, "user_id"=>$ranking->user_id, "avatar" => get_avatar_url($ranking->user_id) ];
                    $x = $x + 1;
               }
               
               
               if(!$belong_to_top){
                    $sql = "

                         SELECT sum(duration) as `points`, user_id, `date` FROM `daily_tracker` 
                              WHERE `user_id`='".$user_id."'
                         GROUP BY user_id
                         ORDER BY `points` DESC
   
                    ";
                    $your_coins_rs = parent::wpdb()->get_results($sql);
                    if(!empty($your_coins_rs)) $your_coins = $your_coins_rs[0]->points;
                    else $your_coins = 0;

                    $sql = "
                         SELECT sum(duration) as `points`, user_id, `date` FROM `daily_tracker` 

                              GROUP BY user_id
                              HAVING `points` >= '".$your_coins."'
                              ORDER BY `points` DESC
                              
                    ";
                     $rankings = parent::wpdb()->get_results($sql);
                    #}

                    $x = 0;
                    foreach($rankings as $ranking){
                         $x++;
                    }
                    $leaderboard[] = ["name"=>"You", "pos"=>$x, "points"=>$your_coins, "user_id"=>$user_id, "avatar" => get_avatar_url($user_id)];
               }

               $response = new \WP_REST_Response($leaderboard);
               return $response;
          }else{
               return new \WP_REST_Response('Unauthorized', 401);
          }
      }

	static function add_tracker( \WP_REST_Request $request ){ 

		$user_id = parent::pb_auth_user($request);

		if(!empty($user_id)){
            $date = $request->get_param("date");
            $duration = ($request->get_param("duration")) ? $request->get_param("duration") : 0;          
            $notes = sanitize_text_field($request->get_param("notes"));
            $status = sanitize_text_field($request->get_param("status"));

            global $wpdb;
            $table_name = "daily_tracker"; 

          	if(!empty($date) && !empty($status)) {
          	
          		$result = $wpdb->get_results("SELECT id FROM $table_name WHERE DATE(date) = '".date('Y-m-d', strtotime($date))."' AND user_id=$user_id LIMIT 1");
          		if(empty($result)) {
          			/** insert new tracker if date not exist **/		
          			$wpdb->insert($table_name, [
          			'user_id' => $user_id,	
				    	'date' => date('Y-m-d H:i:s', strtotime($date)),
				    	'duration' => $duration,
                         'notes' => $notes,
				    	'status' => $status,
				    	
				    ],
				    ['%d','%s','%d','%s','%s']);

				    $tracker_id = $wpdb->insert_id;


          		} else {  

          			$tracker_id = $result[0]->id;         			
          			/** update tracker if date already exist **/		
          			$wpdb->update($table_name, ['date' => date('Y-m-d H:i:s', strtotime($date)), 'duration' => $duration, 'notes' => $notes, 'status' => $status],['id'=>$tracker_id]);          		
          		}

          		//$total_in_seconds = (60 * $minutes) + $seconds;
          		$response = [
          			'id' => $tracker_id,
          			'user_id' => $user_id,
          			'date' => date('Y-m-d H:i:s', strtotime($date)),
          			'duration' => $duration,				    
                         'notes' => $notes,
				     'status' => $status,
          		];

          		$response = new \WP_REST_Response($response);
                    return $response;
          	} 	
           
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
	}	
}



?>	