<?php
namespace InvestmentMastery;

class InvestmentMasteryInterviews extends InvestmentMastery
{

    // to generate new Refresh Token load this URL
    // Step 1: https://authentication.logmeininc.com/oauth/authorize?response_type=code&client_id=089fc197-4195-42dd-9d8e-4479defd4191&redirect_uri=http://investmentmastery.j4vyxanrix-ewx3l1m056zq.p.runcloud.link
    // Step 2 of : https://developer.goto.com/Authentication/#section/Authorization-Flows/Implicit-Grant
    //             AND : 2. Exchange the authorization code for an access token

    static $club = "";

    public static function get_interviews(\WP_REST_Request $request){

        $user_id = parent::pb_auth_user($request);
        if (!empty($user_id)) {
            $interviews = array();
            $club = $request->get_param("club");
            $keyword  = $request->get_param("search");
            $sort  = $request->get_param("sort");
            $start = $request->get_param("page_num");
            $length = $request->get_param("page_length");
            if(empty($length)) $length = 6;
            if(empty($start)) $start = 1;

            $start = ($start - 1) * $length;

            $args = array(  
                'post_type' => 'club-interviews',
                'post_status' => 'public',
                'numberposts' => -1, 
                's' => $keyword,
                'tax_query' => array(
                                    array(
                                      'taxonomy' => 'club',
                                      'field'    => 'slug',
                                      'terms'    => $club,
                                    ),
                                  ),
              );
            $interviews = get_posts( $args ); 

            $response = [];
            $cid=0;
            foreach($interviews as $interview){    
              
                $interview_date = get_field("interview_date",$interview->ID);
                $interview_date_int = strtotime($interview_date);
                $interview_modal_audio = get_field("interview_modal_audio",$interview->ID);
                // $response[$cid] = $interview;       
                $img =  get_the_post_thumbnail_url($interview->ID, "full");

                $response[$cid] = new \stdClass();             
                
                $response[$cid]->interview_vimeo_image = ( !empty($img) ) ? $img : get_stylesheet_directory_uri().'/assets/img/'.$club.'_interview.png';        
                $response[$cid]->modal_video_player = self::get_video($interview->ID);        
                $response[$cid]->interview_date = $interview_date;
                $response[$cid]->interview_date_int = $interview_date_int;
                $response[$cid]->interview_modal_audio = $interview_modal_audio;
                $response[$cid]->post_ID = $interview->ID;
                $response[$cid]->post_title = $interview->post_title;
                $response[$cid]->post_name = $interview->post_name;
                $response[$cid]->post_content = $interview->post_content;
                $cid++;
            }
  
            if($sort == "Newest"){
                usort($response, function($item1,$item2)
                {
                    if ($item1->interview_date_int== $item2->interview_date_int) return 0;
                    return ($item1->interview_date_int< $item2->interview_date_int) ? 1 : -1;
                });
            }
            if($sort == "Oldest"){
                usort($response, function($item1,$item2)
                {
                    if ($item1->interview_date_int == $item2->interview_date_int) return 0;
                    return ($item1->interview_date_int> $item2->interview_date_int) ? 1 : -1;
                });
            }

            if(empty(array_slice($response, $start + $length, $length))) $has_next = false;
            else $has_next = true;

            $response = array_slice($response, $start, $length);
            $response = new \WP_REST_Response($response);

            
             
            $response = new \WP_REST_Response(["result"=>$response,"has_next"=>$has_next ]);
            return $response;

        } else {
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
