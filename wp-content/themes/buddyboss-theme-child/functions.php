<?php
/**
 * @package BuddyBoss Child
 * The parent theme functions are located at /buddyboss-theme/inc/theme/functions.php
 * Add your own functions at the bottom of this file.
 */


/****************************** THEME SETUP ******************************/

/**
 * Sets up theme for translation
 *
 * @since BuddyBoss Child 1.0.0
 */

function buddyboss_theme_child_languages()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'buddyboss-theme', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'buddyboss-theme' instances in all child theme files to 'buddyboss-theme-child'.
  // load_theme_textdomain( 'buddyboss-theme-child', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'buddyboss_theme_child_languages' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Boss Child Theme  1.0.0
 */
function buddyboss_theme_child_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // Styles
  wp_enqueue_style( 'fullcalendar', get_stylesheet_directory_uri().'/assets/css/main.css', '', time() );
  wp_enqueue_style( 'buddyboss-child-css', get_stylesheet_directory_uri().'/assets/css/custom.css', '', '1.0.0' );
  wp_enqueue_style( 'buddyboss-child-style-css', get_stylesheet_directory_uri().'/assets/css/style.css', '', time() );

  // Javascript
  wp_enqueue_script( 'fullcalendar', get_stylesheet_directory_uri().'/assets/js/main.js', '', '1.0.0',true );
  wp_enqueue_script( 'moment', get_stylesheet_directory_uri().'/assets/js/moment.js', '', '1.0.0' );
  wp_enqueue_script( 'buddyboss-child-js', get_stylesheet_directory_uri().'/assets/js/custom.js', '', '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'buddyboss_theme_child_scripts_styles', 9999 );


/****************************** CUSTOM FUNCTIONS ******************************/
// Add your own custom functions here

$memberium = get_option("memberium");
global $club_settings, $club_name_alt, $clubs_ids, $clubs;

$clubs_ids = [
  "13662" => 'trading',
  "13660" => 'crypto',
  "14094" => 'gold'
];

foreach($memberium['memberships'] as $clubs) {
  if($clubs['level'] > 0 ){

    //remove the strings from the string and get the club slug
    $slug = str_replace('memberium_', '', $clubs['roles'][1]);
    $slug = str_replace('your', '', $slug);
    $slug = str_replace('club', '', $slug);
    $club = str_replace('membership', '', $slug);

    $club = $clubs_ids[$clubs['addltag_ids']];

    //Assign the values in the club settings to the global variable
    $club_settings[$club.'_menu']['name'] = $clubs['name'];
    $club_settings[$club.'_menu']['club'] = $club;
    $club_settings[$club.'_menu']['club_locked_url'] = $club.'/locked';
    $club_settings[$club.'_menu']['order'] = $clubs['login_page'];
    $club_settings[$club.'_menu']['club_hidden'] = 0;
    $club_settings[$club.'_menu']['club_id'] = $clubs['login_page'];
    $club_name_alt[$clubs['login_page']] = $club;
  }
}

//get club slug from the Club Menu
//$club_settings = get_fields('option');
foreach($club_settings as $key=>$val ) {
  $clubs[$val['club_id']] = str_replace('_menu', '', $key);
}

//print_r($club_settings);

//Get the Clubs Ids and slug from memberium
function get_club_slug() {

    global $clubs, $clubs_ids;

    $club_id =get_field('club'); 
    $club = $clubs[$club_id];
    $key = array_search($club, $clubs_ids);
    if( !memb_hasAnyTags(14094) ){
      if( !memb_hasAnyTags($key) ){
        wp_redirect( '/' );
        exit;
      }
    }
    return $club; 
}

// if( function_exists('acf_add_options_page') ) {
  
//  acf_add_options_page(array(
//    'page_title'  => 'Club Menu Settings',
//    'menu_title'  => 'Club Menu',
//    'menu_slug'   => 'club-menu-settings',
//    'capability'  => 'edit_posts',
//    'redirect'    => false
//  ));

// }


if(!is_front_page()){

}

add_action("wp_ajax_set_default_user_dashboard", function(){
    $user_id = get_current_user_id();
    $tagid = $_GET["tagid"];
    update_user_meta($user_id, "default_user_dashboard", $tagid);
    $memberium = get_option("memberium");

    $login_page = 0;
    foreach($memberium["memberships"] as $tid=>$memb){
        if( $tagid == $memb["addltag_ids"] || $tagid == $memb["main_id"]){
          $login_page = $memb["login_page"];
        }
    }

    echo wp_json_encode(["url"=>get_permalink($login_page)]);
    wp_die();
});
add_action("wp_ajax_get_mem_tag_id_status", function(){

    global $clubs, $club_settings;

    $tag_ids = $_GET["memTagIds"];

    $memberium = get_option("memberium");
    $response['membership_clubs'] = [];
    $response['clubs_sorted'] = [];

    //$club_settings = get_fields('option');
    //$club_settings_acf = acf_get_fields('group_61b01e99d0431');

    $temp_clubs = [];
    $sorted_clubs = [];
    $sorted_clubs_fp = [];

    foreach($club_settings as $val ) {            
        $sorted_clubs[$val['name']] = $val['name'];
        $sorted_clubs_fp[] = $val['club'];
    }
    
    foreach($memberium['memberships'] as $club) {
        $club_menu_item = array_search($club['login_page'], $clubs);
        $key = array_search($club_menu_item, array_map("strval", array_keys($sorted_clubs)));            
        $temp_clubs[$key] = $club;
        $temp_clubs[$key]['name'] = $club_menu_item;
        $temp_clubs[$key]['club_locked_url'] = $club_settings[$club_menu_item]['club_locked_url'];
        $temp_clubs[$key]['club_hidden'] = $club_settings[$club_menu_item]['club_hidden'];
    }  
    ksort($temp_clubs);  

    $response['clubs_sorted'] = $sorted_clubs_fp;

    if(count($memberium['memberships']) == count($temp_clubs)) 
        $club_memberships = $temp_clubs;
    else 
        $club_memberships = $memberium['memberships'];   

    foreach($tag_ids as $tag_id) {

      $login_page = 0;
      //foreach($memberium["memberships"] as $tid=>$memb){
        foreach($club_memberships as $tid=>$memb) {  

          if( $tag_id == $memb["addltag_ids"] || $tag_id == $memb["main_id"]){
            $login_page = $memb["login_page"];
            break;
          }
        }

      if(memb_hasAnyTags($tag_id)){
        $dashboard_url = get_permalink($login_page);
      }else{
        $dashboard_url = "#";
      }

      $response["membership_clubs"][] = [
          "tag_id" => $tag_id,
          //"dashboard_url" => get_permalink($memberium["memberships"][$tag_id]["login_page"]),
          //"has_access" => memb_hasPostAccess($tag_id),
          "dashboard_url" => $dashboard_url, // updated by Richard
          "has_access" => memb_hasAnyTags($tag_id), // updated by Richard
          "coming_soon" => false,
          "club_hidden" => $memb["club_hidden"],
          //"club_locked_url" => $memb["club_locked_url"],
          "club_locked_url" => '#',
          "club_name" => str_replace('_menu', '',$memb["name"])
      ];
    }


    //echo "<pre>";print_r($response);exit;

    echo wp_json_encode($response);
    wp_die();
});

add_action("wp_head", function(){
    if(is_front_page()){

          $default_user_dashboard = get_user_meta( get_current_user_id(), "default_user_dashboard", true );
          if(!empty($default_user_dashboard)){
              $memberium = get_option("memberium");
            
              if(empty($_GET["back"])){
                if(empty($_GET["from_main"])){

                    
                    if($_GET["action"] != "elementor"){
                      //wp_redirect( get_permalink( $memberium["memberships"][$default_user_dashboard]["login_page"] )."?redirect=1" );
                      if(!isset($_GET["elementor-preview"])){
                      ?>
                      <!-- <meta http-equiv="refresh" content="0; url=<?=get_permalink( $memberium["memberships"][$default_user_dashboard]["login_page"] )."?from_main=1"?>"> -->
                      <?php
                      }
                    }
                 }
              }
          }

          ?>
          <style type="text/css">
          .choose-club .elementor-button.disabled {
              background-color: #262F3A !important;
          }
          .choose-club .elementor-button.active {
              background-color: #48A9F5 !important;
          }
          .choose-club .eael-tooltip {
            top: -30px;
            right: -25px;
          }
          .choose-club .eael-tooltip span.eael-tooltip-content {
            text-align: right;
          }
          .home .buddypanel{
            display:none;
          }
          .home.bb-buddypanel .site{
            margin-left:0
          }
          </style>
          <?php
    }

} );

add_action("wp_footer", function(){
    if(is_front_page()){
        ?>
        <script type="text/javascript">
        jQuery(document).ready( () => {
            $ = jQuery;
            memTagIds = [];

            let cardToolTip = `
                <div class="elementor-element elementor-element-43e826b eael-tooltip-align-right eael-tooltip-text-align-center elementor-absolute elementor-widget elementor-widget-eael-tooltip" data-id="43e826b" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="eael-tooltip.default">
                    <div class="elementor-widget-container">
                    <div class="eael-tooltip">
                      <span class="eael-tooltip-content"><img src="/wp-content/uploads/2021/06/Vector-2.png" alt=""></span>
                    <span class="eael-tooltip-text eael-tooltip-right"><p>You don’t have an access<br>to this club.</p></span>
                    </div>
                  </div>
                </div>
            `;

            console.log( typeof $(".choose-club") )
            $(".choose-club").each( function(){
                memTagId = $(this).attr("data-memtagid");
                $(this).find(".elementor-button").addClass(`club-memtag-${memTagId} mem-club-button`)
                //$(this).find(".elementor-button").hide();
                $(this).find(".elementor-button").html('<span class="uael-form-loader"></span>');
                $(this).find(".elementor-widget-eael-tooltip").hide();
                memTagIds.push(memTagId)
            });

            $(document).on("click", ".mem-club-button", e => {
                e.preventDefault();
            });
            $(document).on("click", ".mem-club-button.active", e => {
                tagid = $(e.currentTarget).attr("data-tagid");
                href = $(e.currentTarget).attr("data-href");
                _btn = $(e.currentTarget);

                console.log(tagid, href)

                $.ajax({
                    url: "<?=admin_url("admin-ajax.php")?>?action=set_default_user_dashboard",
                    data: {
                      tagid
                    },
                    dataType:"json",
                    beforeSend: () => {
                        _btn.fadeTo("fast", .3);
                    },
                    success: (d) => {
                        _btn.fadeTo("fast", 1);
                        window.location.href = d.url;
                    }
                });
            });

            setTimeout( () => {
              $.ajax({
                  url: "<?=admin_url("admin-ajax.php")?>?action=get_mem_tag_id_status",
                  dataType: "json",
                  data: {
                    memTagIds
                  },
                  beforeSend: () => {
                    $('#fp-subheading').append('<span class="uael-form-loader" id="fp-loader"></span>');
                  },
                  success: (d) => {
                    console.log("get mem tag", d.data)


                    d.membership_clubs.map( e => { 
                      
                      tagId = e.tag_id;

                      if(e.has_access){
                        $(`.club-memtag-${tagId}`).html("Access Now").addClass("active").attr({"data-href":`${e.dashboard_url}`,"data-tagid":tagId});
                      }else{
                        $(`.club-memtag-${tagId}`).html("No Access").attr({"href":`${e.club_locked_url}`}).removeClass('mem-club-button');
                        $(`.club-memtag-${tagId}`).closest(".choose-club").find(".elementor-widget-wrap").prepend(cardToolTip);                           
                      }

                      if(e.coming_soon){
                        $(`.club-memtag-${tagId}`).html("Coming Soon");
                      }
                      if(e.club_hidden === '0' ) {
                        $(`.club-memtag-${tagId}`).show();
                      } else {
                        $('div[data-club="'+e.club_name+'"]').hide();                
                      }                         
                    })

                    //$('#clubs-container').css('visibility','visible');

                    let sorted_clubs_html = '';
                    d.clubs_sorted.map( e => { 
                      sorted_clubs_html += $('div[data-club="'+e+'"]').get(0).outerHTML;
                    })     
                    $('#fp-loader').hide();
                    $( "#clubs-container div:first-child" ).html('').html(sorted_clubs_html);
                    $('#clubs-container').css('visibility','visible');

                  }
              });
            }, 1000 );

        });
        </script>
        <?php
    }
}, 99);

function my_acf_load_field(  $value, $post_id, $field  ) {
    
  $uuid = uniqid();    
  if (empty($value))
  {
      $value = $uuid;
  }
  return $value;
       
}

add_filter('acf/update_value/name=action_item_uuid', 'my_acf_load_field', 10, 3);

/*** custom functions for calendar ***/
function pbd_convert_to_tz($date, $to_tz){
  $datetime = new DateTime($date);
  $tz_time = new DateTimeZone($to_tz);
  $datetime->setTimezone($tz_time);
  return $datetime->format('Y-m-d H:i:s');
}
add_action("wp_ajax_display_week_calendar", function(){
  //display_week_calendar
  $user_tz = $_GET["tz"];
  
  $server_date = date("Y-m-d H:i:s");

  $converted_date = pbd_convert_to_tz($converted_date, $user_tz);

  $date_obj = new DateTime();

  $date_obj->setDate(date("Y", strtotime($server_date)), date("m", strtotime($server_date)), date("d", strtotime($server_date)));
  $response["server"]["date"] = $server_date;
  $response["server"]["week_number"] = $date_obj->format("W");

  $date_obj->setDate(date("Y", strtotime($converted_date)), date("m", strtotime($converted_date)), date("d", strtotime($converted_date)));
  $response["converted"]["date"] = $converted_date;
  $response["converted"]["week_number"] = $date_obj->format("W");

  $week_start = new DateTime();
  $week_start->setISODate(  $date_obj->format("Y"),  $date_obj->format("W"));
  
  for($i=-1; $i < 6; $i++){
      $mktime = mktime(0, 0, 0, $week_start->format('n'), $week_start->format('j') + $i, $week_start->format('Y'));
      $j = $i + 1;
      $response["weekdays"][$j] = [
          "day_full" => date("l",$mktime),
          "day_abbr" => substr(date("l",$mktime),0,1),
          "date" => date("Y-m-d",$mktime),
          "day_num" => substr(date("mday",$mktime),2,-4)
      ];
  }
 
  echo json_encode($response);
  die();
}); 


add_action( 'wp_login_failed', 'elementor_form_login_fail', 9999999 );
function elementor_form_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if ((!empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') )) {
        //redirect back to the referrer page, appending the login=failed parameter and removing any previous query strings
        //maybe could be smarter here and parse/rebuild the query strings from the referrer if they are important
        wp_redirect(preg_replace('/\?.*/', '', $referrer) . '/?login=failed' );
        exit;
    }
}

function generate_login_fail_messaging(){
    ob_start();
    if($_GET['login'] == 'failed'){
    echo '<div class="message_login_fail" style="background-color: #ca5151;color: #ffffff;display: block;margin-bottom: 20px;text-align: center;padding: 9px 15px; width: fit-content;margin: 0 auto;"><span style="color: #ca5151;background-color: #fff;width: 20px;height: 20px;display: inline-flex;align-items: center;justify-content: center;font-weight: 900;border-radius: 50%;margin-right: 10px;">!</span>Oops! Looks like you have entered the wrong username or password. Please check your login details and try again.</div>';
    }
    $return_string = ob_get_contents();
    ob_end_clean();
    return $return_string;
}
add_shortcode('login_fail_messaging', 'generate_login_fail_messaging');



add_shortcode( 'club_tools', 'club_tools_func' );
function club_tools_func( $atts ) {
    $atts = shortcode_atts( array(
        'club' => 'crypto'
    ), $atts, 'club_tools' );

    $args = array(  
      'post_type' => 'club-tools',
      'post_status' => 'public',
      'numberposts' => -1, 
      'orderby' => 'title', 
      'order' => 'ASC',
      'tax_query' => array(
                          array(
                            'taxonomy' => 'club',
                            'field'    => 'slug',
                            'terms'    => $atts['club'],
                          ),
                        ),
    );

    $content = "<ul class='club_tools'>";
    $loop = get_posts( $args ); 
        
   foreach($loop as $post): 
      $the_title = get_the_title($post->ID);
      $id = get_the_ID();
      $tools_heading = get_field("tools_heading", $post->ID );
      $tools_description = get_field("tools_description", $post->ID );
      $google_sheet = get_field("google_sheet", $post->ID ) . "export?format=xlsx";
      $podbean_iframe = get_field("podbean_iframe", $post->ID );
      $vimeo_id = get_field("vimeo_id", $post->ID );
      $gs_class_style = trim(get_field("google_sheet", $post->ID )) == "" ? "display:none;" : "";
      $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeo_id.php"));

      $is_image_style = !isset($hash[0]['thumbnail_large'])  ? "display:none"  : "";
      // print_r($hash[0]['thumbnail_large']);echo "<<<<".$hash[0]['thumbnail_large'];exit;
      $content .= "<style>.is_image_{$vimeo_id}{ ".$is_image_style." }</style>";
      $content .= "<li>
              <div class='ct_wrapper'>
                <h2>{$the_title}</h2>
                <div class='ctw_wrapper'>
                  <div class='ctww_thumbnail'>
                    <a href='#popup1' class='play_link' data-vimeo_id='{$vimeo_id}' data-title='{$tools_heading}' data-description='{$tools_description}'>
                      ".' <svg class="play_icon is_image_'.$vimeo_id.'" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="35" cy="35" r="35" fill="#48A9F5"/>
                            <path d="M28.5833 24.5L44.9167 35L28.5833 45.5V24.5Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                      '."
                      <img src='{$hash[0]['thumbnail_large']}' class='is_image_{$vimeo_id}' />
                    </a>
                  </div>
                  <h3>{$tools_heading}</h3>
                  <p>{$tools_description}</p>
                  <a target='_blank' href='{$google_sheet}' style='{$gs_class_style}'>
                    <button>
                      Download on Google Sheets
                    </button>
                  </a>
                  <div class='ctww_pb_wrapper'>{$podbean_iframe}</div>
                </div>
              </div>
            </li>";
    endforeach;
    $content .= "</ul>
                <div id='popup1' class='overlay'>
                  <div class='popup'>
                    <a class='close' href='#'>&times;</a>
                    <div class='content'>
                      
                    </div>
                  </div>
                </div>
                  ";
    
    $content .= '<script>
    jQuery(document).ready(function($){
      $(document).on("click",".play_link", e => {
        e.preventDefault();
        $("#popup1").css("display", "flex").hide().fadeIn();
        let id = $(e.currentTarget).attr("data-vimeo_id");
        let heading = $(e.currentTarget).attr("data-title");
        let podbean = $(e.currentTarget).parents(".ctw_wrapper").find(".ctww_pb_wrapper").html();
        let description = $(e.currentTarget).attr("data-description");
        let iframe_height = jQuery("#popup1 .content").width() / (16/9);
        let pb_class_style = !podbean ? "display:none;" : "" ;
        $("#popup1 .content").html(`
          <div class="ctw_wrapper">
            <h3>${heading}</h3>
            <p>${description}</p>
            <iframe class="fitvidsignore" src="https://player.vimeo.com/video/${id}" 
            width="100%" height="${iframe_height}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            <div class="podbean_wrapper" style="${pb_class_style}">
              <p>Listen to the audio of the interview or download it by clicking below:</p>
              ${podbean}
            </div>
          </div>`);
      });
      $(document).on("click", ".overlay .close", e => {
        $(".overlay").fadeOut();
      });
    });
  </script>';
 
    return $content;
}



// dynamic css, js and other assets based on selected club
add_action("wp_head", function(){

  //require_once get_theme_file_path( 'learndash/ld30/includes/helpers.php' );
    $club = get_post( get_field("club") );//set default based on current posts 'club' ACF value

    if(!get_field("club") || get_field("club") == '-- Select club --'){
      $club = get_post( get_field("club", learndash_get_course_id() )  ); //get the parent course id 'club' ACF value
    }
    
    $slug = $club->post_name;
    // echo "<div id='testdiv' style='display:none'>".get_field("club")."---".learndash_get_course_id()."</div>";
    switch($slug){
        case "gold-club-dashboard":
          wp_enqueue_style( 'dynamic-css-'.$slug, get_stylesheet_directory_uri().'/assets/css/gold_membership.css', '', time() );
          break;
        case "success-club-dashboard":
          wp_enqueue_style( 'dynamic-css-'.$slug, get_stylesheet_directory_uri().'/assets/css/success_club.css', '', time() );
          break;
    }


}, 999);




add_action('update_webinar_registrants', 'update_webinar_registrants');

function update_webinar_registrants() {
  //$webinars = file_get_contents('https://clubs.investment-mastery.com/wp-json/api/cron_fetch_webinars');   
  // From URL to get webpage contents
  $url = get_site_url()."/wp-json/api/cron_fetch_webinars";
  
  // Initialize a CURL session.
  $ch = curl_init();
  
  // Return Page contents.
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
  // Grab URL and pass it to the variable
  curl_setopt($ch, CURLOPT_URL, $url);
  
  $result = curl_exec($ch);
  
}

if (! wp_next_scheduled ( 'update_webinar_registrants' )) {
    wp_schedule_event(time(), 'twicedaily', 'update_webinar_registrants');
}


/**
 * Hide Members Directory from everyone.
 */
function buddydev_hide_members_directory_for_all() {
    if ( bp_is_members_directory() ) {
        bp_do_404();
        load_template( get_404_template() );
        exit( 0 );
    }
} 
add_action( 'bp_template_redirect', 'buddydev_hide_members_directory_for_all' );

function add_login_check()
{
    if ( is_user_logged_in() && is_page(58) ) {
        wp_redirect('/');
        exit;
    }
}
add_action('wp', 'add_login_check');

function show_loggedin_function( $atts ) {

  global $current_user, $user_login;
        get_currentuserinfo();
  add_filter('widget_text', 'do_shortcode');
  if ($user_login) 
    return '<span style="color:#fff" >Welcome ' . $current_user->display_name . ', <a href="' . wp_logout_url() . ' ">Logout</a></span>';
  else
    return '<a href="' . wp_login_url() . ' ">Login</a>';
  
}
add_shortcode( 'show_loggedin_as', 'show_loggedin_function' );

remove_filter( 'bp_get_the_profile_field_value', 'xprofile_filter_link_profile_data', 100 );

//redirect user to redirect_to parameter if user is logged in
add_action( 'template_redirect', function() {
  $restricted = array( 6577 ); // all your restricted pages
  if ( is_user_logged_in() && is_page() && !empty($_GET['redirect_to']) && in_array( get_queried_object_id(), $restricted ) ) {
    wp_redirect( $_GET['redirect_to'] ); 
    exit();
  }
});


function keep_me_logged_in_for_time( $expirein ) {
return 2*60*60; // 2 hours in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_time' );

function year_shortcode() {
	//$date = $_SERVER['REMOTE_ADDR'];
	//$geopluginURL = file_get_contents("https://ipinfo.io/json");
	//$addrDetailsArr = json_decode($geopluginURL);
	//$timestamp = time();
	//$dt = new DateTime("now", new DateTimeZone($addrDetailsArr->timezone)); //first argument "must" be a string
	//$h = $dt->format('G');
	//$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
	//$day = $dt->format('l');
	//$day = date('l');
	return date('l');
}
add_shortcode('day', 'year_shortcode');

function greet_message() {
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$geopluginURL = file_get_contents("https://ipinfo.io/".$ipaddress."/json");
	$addrDetailsArr = json_decode($geopluginURL);
	$timestamp = time();
	if($addrDetailsArr->timezone){
		$dt = new DateTime("now", new DateTimeZone($addrDetailsArr->timezone)); //first argument "must" be a string
		$h = $dt->format('G');
		if($h>=00 && $h<=12){
			$greet = "Good Morning";
		}else if($h>=12 && $h<18){
			$greet = "Good Afternoon";
		}else if($h>=18 && $h<=24){
			$greet = "Good Evening";
		}
	}else{
		$greet = "Hello";
	}
	return $greet;
}
add_shortcode('greet', 'greet_message');
/*   
function get_course_grid_list(){
  add_filter( 'widget_text', 'do_shortcode' );
 return do_shortcode("[ld_course_list course_tag='trading' progress_bar='true' num='3'  orderby='menu_order' order='DESC' mycourses='true' status='in_progress,not_started' course_categoryselector='false']");
  //print_r($array);exit;

}
add_shortcode('get_course_grid', 'get_course_grid_list');
*/


/*
 * 
 * Announcement board code
 * 
 * */
function custom_acf_row_class($classes, $field, $post_id) {
    // Check if the field is a repeater field and has a specific key or name
    if ($field['type'] === 'repeater' && ($field['key'] === 'field_66065edd7ae8b' || $field['name'] === 'trading_club_announcement')) {
        // Add your custom class to the row
        $classes[] = 'outer-row-custom-class';
    }

    return $classes;
}
add_filter('acf/row_class', 'custom_acf_row_class', 10, 3);


function update_flag_field( $post_id ) {
	if ( 'page' == get_post_type( $post_id ) ) {

		if ( have_rows( 'trading_club_announcement', $post_id ) ) {
			while ( have_rows( 'trading_club_announcement', $post_id ) ) {
				the_row();

				$club = get_field('club');
				if ($club == 3880) {
					update_users_announcement_flag('gold_announcement_flag', 1);
				} elseif ($club == 1249) {
					update_users_announcement_flag('crypto_announcement_flag', 1);
				} elseif ($club == 2579) {
					update_users_announcement_flag('trading_announcement_flag', 1);
				}
			}
		}
	}
}

function update_users_announcement_flag($field_name, $value) {
    $users = get_users();
   foreach ($users as $user) {
        update_field($field_name, $value, 'user_' . $user->ID);
    }
}
add_action( 'acf/save_post', 'update_flag_field', 20 );

function get_announsment_shortcode_function(){
 ob_start();
 global $post;
 $club = get_field('club', $post->ID);
 $user_id = get_current_user_id();

 if($club == 3880){
   $gold_announcement_flag = get_field('gold_announcement_flag', 'user_' .$user_id);
   if ($gold_announcement_flag == 1) {
     echo "<a href='/announcement/gold-announcement-board/#announcement-board' id='gold-announcement-click' data-userid='".$user_id."' data-flag='gold_announcement_flag'> Announcements <div class='circle'></div></a>";
   }else {
     echo "<a href='/announcement/gold-announcement-board' class='zero-announcement-flag'> Announcements</a>";
   }
 }elseif($club == 1249){
   $crypto_announcement_flag = get_field('crypto_announcement_flag', 'user_' .$user_id);
   if ($crypto_announcement_flag == 1) {
     echo "<a href='/announcement/your-crypto-club-announcement-board/#announcement-board' id='crypto-announcement-click'  data-userid='".$user_id."' data-flag='crypto_announcement_flag'> Announcements <div class='circle'></div></a>";
   }else {
     echo "<a href='/announcement/your-crypto-club-announcement-board' class='zero-announcement-flag'> Announcements</a>";
   }
 }elseif($club == 2579){
   	$trading_announcement_flag = get_field('trading_announcement_flag', 'user_' .$user_id);
	$trading_active_tab_id = get_field('active_tab', 20756);
   	if ($trading_announcement_flag == 1) {
     	echo "<a href='/announcement/your-trading-club-announcement-board/#announcement-board' id='trading-announcement-click'  data-userid='".$user_id."' data-flag='trading_announcement_flag' data-tabID='".$trading_active_tab_id."'> Announcements <div class='circle'></div></a>";
   }else {
     echo "<a href='/announcement/your-trading-club-announcement-board' class='zero-announcement-flag'> Announcements</a>";
   }
 }
 return ob_get_clean();
}
add_shortcode('get_announcement_shortcode', 'get_announsment_shortcode_function');

function enqueue_announsment_scripts($hook) {
    wp_enqueue_script('frontend-notification', get_stylesheet_directory_uri() . '/assets/js/frontend-notification.js', array('jquery'), '1.0', true);
    wp_localize_script('frontend-notification', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_announsment_scripts');

function update_flag_field_action_callback() {
   
    $user_id = isset($_POST['user_id']) ? absint($_POST['user_id']) : 0;
    $flag = isset($_POST['flag']) ? sanitize_text_field($_POST['flag']) : '';

    if ($user_id && $flag) {
        update_field($flag, 0, 'user_' . $user_id);
        wp_send_json_success('Flag field updated successfully');
    } else {
        wp_send_json_error('Invalid data received');
    }
}
add_action('wp_ajax_update_flag_field_action', 'update_flag_field_action_callback');

function admin_enqueue_announsment_scripts($hook) {
    wp_enqueue_script('admin-announcement', get_stylesheet_directory_uri() . '/assets/js/admin-announcement.js', array('jquery'), '1.0', true);
    wp_localize_script('admin-announcement', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'admin_enqueue_announsment_scripts');

add_action("wp_ajax_add_active_tab_field_row_id", "add_active_tab_field_row_id");
function add_active_tab_field_row_id(){
	$updated = update_field('active_tab', $_POST['rowNumber'], $_POST['postId']);
	if ($updated) {
		// Field was successfully updated
		echo json_encode(array('success' => true, 'message' => 'Field updated successfully.'));
	} else {
		// Error occurred while updating field
		$error_message = "Error: " . json_last_error_msg();
		//error_log($error_message);
		echo json_encode(array('success' => false, 'message' => $error_message));
	}

    wp_die();
}

