<?php
/**
 * Copyright (c) 2016-4 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_cclk5 { private static $m4is_n3zlk = 'memberium';
  static 
function m4is_mi9d() { self::m4is_pi42x();
 self::m4is_wcvni3();
 add_filter( 'et_builder_post_types', ['m4is_cclk5', 'm4is_nqerv6'] );
 }  private static 
function m4is_pi42x() { $m4is_fze62 = false;
 $m4is_y1tw = [ 'name' => _x( 'Custom Shortcodes', 'post type general name', self::$m4is_n3zlk ), 'singular_name' => _x( 'Custom Shortcode', 'post type singular name', self::$m4is_n3zlk ), 'menu_name' => _x( 'Custom Shortcodes', 'admin menu', self::$m4is_n3zlk ), 'name_admin_bar' => _x( 'Custom Shortcode', 'add new on admin bar', self::$m4is_n3zlk ), 'add_new' => _x( 'Add New', 'book', self::$m4is_n3zlk ), 'add_new_item' => __( 'Add New Custom Shortcode', self::$m4is_n3zlk ), 'new_item' => __( 'New Custom Shortcode', self::$m4is_n3zlk ), 'edit_item' => __( 'Edit Custom Shortcode', self::$m4is_n3zlk ), 'view_item' => __( 'View Custom Shortcode', self::$m4is_n3zlk ), 'all_items' => __( 'All Custom Shortcodes', self::$m4is_n3zlk ), 'search_items' => __( 'Search Custom Shortcodes', self::$m4is_n3zlk ), 'parent_item_colon' => __( 'Parent Custom Shortcodes:', self::$m4is_n3zlk ), 'not_found' => __( 'No custom shortcodes found.', self::$m4is_n3zlk ), 'not_found_in_trash' => __( 'No custom shortcodes found in Trash.', self::$m4is_n3zlk ), ];
 $m4is_ow9b = [ 'title', 'editor', ];
 $m4is_fa6l = [ 'category', ];
 $m4is_k4yeul = [ 'can_export' => true, 'capability_type' => 'post', 'description' => 'Custom Shortcodes', 'exclude_from_search' => true, 'labels' => $m4is_y1tw, 'menu_position' => 21, 'public' => $m4is_fze62, 'show_in_admin_bar' => false, 'show_in_menu' => false, 'show_in_nav_menus' => false, 'show_ui' => true, 'supports' => $m4is_ow9b, 'taxonomies' => $m4is_fa6l, ];
 register_post_type('memb_shortcodeblocks', $m4is_k4yeul);
 }  private static 
function m4is_wcvni3() { $m4is_fze62 = false;
 $m4is_y1tw = [ 'name' => _x( 'Partials', 'post type general name', self::$m4is_n3zlk ), 'singular_name' => _x( 'Partial', 'post type singular name', self::$m4is_n3zlk ), 'menu_name' => _x( 'Partials', 'admin menu', self::$m4is_n3zlk ), 'name_admin_bar' => _x( 'Partial', 'add new on admin bar', self::$m4is_n3zlk ), 'add_new' => _x( 'Add New', 'book', self::$m4is_n3zlk ), 'add_new_item' => __( 'Add New Partial', self::$m4is_n3zlk ), 'new_item' => __( 'New Partial', self::$m4is_n3zlk ), 'edit_item' => __( 'Edit Partial', self::$m4is_n3zlk ), 'view_item' => __( 'View Partial', self::$m4is_n3zlk ), 'all_items' => __( 'All Partials', self::$m4is_n3zlk ), 'search_items' => __( 'Search Partials', self::$m4is_n3zlk ), 'parent_item_colon' => __( 'Parent Partials:', self::$m4is_n3zlk ), 'not_found' => __( 'No partials found.', self::$m4is_n3zlk ), 'not_found_in_trash' => __( 'No partials found in Trash.', self::$m4is_n3zlk ), ];
 $m4is_ow9b = [ 'title', 'editor', 'revisions', 'excerpt', ];
 $m4is_k4yeul = [ 'can_export' => true, 'capability_type' => 'post', 'description' => 'Content Snippets for Memberium Membership System', 'exclude_from_search' => true, 'labels' => $m4is_y1tw, 'menu_position' => 20, 'public' => $m4is_fze62, 'show_in_admin_bar' => false, 'show_in_menu' => false, 'show_in_nav_menus' => false, 'show_ui' => true, 'supports' => $m4is_ow9b, ];
 register_post_type( 'partials', $m4is_k4yeul );
 }  static 
function m4is_nqerv6( $m4is_qtapuz ) { $m4is_bb1i = [ 'partials', 'memb_shortcodeblocks', ];
 $m4is_qtapuz = array_merge( $m4is_qtapuz, $m4is_bb1i );
 return $m4is_qtapuz;
 } }

