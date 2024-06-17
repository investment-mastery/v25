<?php
/*
Plugin Name: IM Digital - Mobile App API
Plugin URI: https://www.investment-mastery.com/
Description: Handles API Stuff In Wordpress For Mobile App
Version: 1.00
Author: Investment Mastery
Author URI: https://www.investment-mastery.com/
*/

#error_reporting(E_ALL);
#ini_set('display_errors',1);
require_once('InvestmentMastery.php');
require_once('callbacks.php');
require_once('im-courses.php');
require_once('im-webinars.php');
require_once('im-tracker.php');
require_once('im-users.php');
require_once('im-interviews.php');
require_once('im-calculators.php');
require_once('im-dashboard.php');

/*******
PB DIGITAL APP TEMPLATE WP REST API ENDPOINTS
*******/


/*******
Users
*******/

#POST		/users/login
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/users/login', array(
    'methods' => 'POST',
    'callback' => 'app_login_user',
  ) );
} );



#GET 		/users/:id
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/users/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'get_user',
  ) );
} );


#POST		/users/reset
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/users/reset_password', array(
    'methods' => 'POST',
    'callback' => 'app_reset_user',
  ) );
} );


/*******
Courses
*******/
 

#GET		/courses/:course_id/path
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', 'courses/(?P<id>\d+)/path', array(
    'methods' => 'GET',
    'callback' => 'get_path',
  ) );
} );

#GET		/courses/:course_id/lessons/:lesson_id/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/courses/(?P<id>\d+)/lessons/(?P<lesson_id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'get_course_lesson',
  ) );
} );


/*******
Lessons
*******/


#POST		/lessons/:lesson_id/markComplete
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/lessons/(?P<id>\d+)/markComplete', array(
    'methods' => 'POST',
    'callback' => 'lesson_markcomplete',
  ) );
} );

#GET		/get_current_user_data
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/get_current_user_data', array(
    'methods' => 'GET',
    'callback' => 'get_current_user_data',
  ) );
} );




/*******
CUSTOM ENDPOINTS SPECIFIC FOR CLIENT
*******/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/leaderboard', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryTracker','get_leaderboard'],
  ) );
} );

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/user/achievements', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryUsers','get_all_achievements'],
  ) );
} );

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/user/stats', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryUsers','get_user_stats'],
  ) );
} );

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/courses/crypto', array(
    'methods' => 'get',
    'callback' => ['InvestmentMastery\InvestmentMasteryCourses','get_crypto_courses'],
  ) );
} );



/* course categories*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/categories', array(
    'methods' => 'get',
    'callback' => 'pbd_get_categories',
  ) );
} );

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/categories/(?P<id>\d+)', array(
    'methods' => 'get',
    'callback' => 'pbd_get_categories',
  ) );
} );


add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/categories/(?P<id>\d+)/courses', array(
    'methods' => 'get',
    'callback' => 'pbd_get_courses_by_category',
  ) );
} );

 

/* Custom Endpoints Specific for the client*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/courses/lessons/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryCourses','get_lesson_details'],
  ) );
} );

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/courses/lessons/(?P<id>\d+)/mark_action_complete/(?P<uuid>[a-zA-Z0-9-]+)', array(
    'methods' => 'PUT',
    'callback' => ['InvestmentMastery\InvestmentMasteryCourses','mark_action_complete'],
  ) );
} );
 
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/courses/lessons/(?P<id>\d+)/unmark_action_complete/(?P<uuid>[a-zA-Z0-9-]+)', array(
    'methods' => 'DELETE',
    'callback' => ['InvestmentMastery\InvestmentMasteryCourses','unmark_action_complete'],
  ) );
} );

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/courses/lessons/(?P<id>\d+)/save_notes', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCourses','save_notes'],
  ) );
} );

/* Endpoints for Interviews*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/interview/recordings', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryInterviews','get_interviews'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/webinar/recordings', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryWebinars','get_webinar_recordings'],
  ) );
} );

/* Custom Endpoints for user daily tracker*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/user/tracker', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryTracker','get_tracker'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/user/tracker', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryTracker','add_tracker'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/user/tracker/update', array(
    'methods' => 'PUT',
    'callback' => ['InvestmentMastery\InvestmentMasteryTracker','update_tracker'],
  ) ); 
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/user/tracker/(?P<id>\d+)/delete', array(
    'methods' => 'DELETE',
    'callback' => ['InvestmentMastery\InvestmentMasteryTracker','delete_tracker'],
  ) ); 
} );


/* Endpoints for Interviews*/

/** Dashboard Endpoints **/
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/dashboard/banner/(?P<club>[a-zA-Z0-9-]+)', array(
    'methods' => 'get',
    'callback' => ['InvestmentMastery\InvestmentMasteryDashboard','get_banner'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/vca', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryDashboard','get_stock_details'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/cca', array(
    'methods' => 'GET',
    'callback' => ['InvestmentMastery\InvestmentMasteryDashboard','get_crypto_details'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/save-vca', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','save_strategy'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/get-vca', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','get_strategy'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/delete-vca', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','delete_strategy'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/get-strategies', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','get_strategies'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/get-alerts', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','get_alerts'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/delete-alert', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','delete_alert'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/get-alert-count', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','get_unseen_alert_count'],
  ) );
} );
add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/update-strategy-name', array(
    'methods' => 'POST',
    'callback' => ['InvestmentMastery\InvestmentMasteryCalculators','update_strategy_name'],
  ) );
} );