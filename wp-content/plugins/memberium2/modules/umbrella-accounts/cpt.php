<?php
/**
 * Copyright (c) 2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_sljnt' ) || die();
 m4is_isf6oe::m4is_mi9d();
 final 
class m4is_isf6oe { private static $m4is_n3zlk;
 static 
function m4is_ju94() { self::$m4is_n3zlk = 'memberium';
 }  static 
function m4is_mi9d() { self::m4is_ju94();
 self::m4is_ylxgj3();
 }  private static 
function m4is_ylxgj3() {  $m4is_fze62 = false;
 $m4is_f852 = 'Department';
 $m4is__ql9vk = 'Departments';
 $m4is_y1tw = [ 'name' => _x( "Umbrella {$m4is__ql9vk}", 'departments', self::$m4is_n3zlk ), 'singular_name' => _x( "Umbrella {$m4is_f852}", 'department', self::$m4is_n3zlk ), 'menu_name' => _x( "{$m4is__ql9vk}", 'admin menu', self::$m4is_n3zlk ), 'name_admin_bar' => _x( "Umbrella {$m4is_f852}", 'add new on admin bar', self::$m4is_n3zlk ), 'add_new' => _x( "Add {$m4is_f852}", 'department', self::$m4is_n3zlk ), 'add_new_item' => __( "Add New {$m4is_f852}", self::$m4is_n3zlk ), 'new_item' => __( "New {$m4is_f852}", self::$m4is_n3zlk ), 'edit_item' => __( "Edit {$m4is_f852}", self::$m4is_n3zlk ), 'view_item' => __( "View {$m4is_f852}", self::$m4is_n3zlk ), 'all_items' => __( "All {$m4is__ql9vk}", self::$m4is_n3zlk ), 'search_items' => __( "Search {$m4is__ql9vk}", self::$m4is_n3zlk ), 'parent_item_colon' => __( "Parent {$m4is__ql9vk}:", self::$m4is_n3zlk ), 'not_found' => __( "No {$m4is__ql9vk} found.", self::$m4is_n3zlk ), 'not_found_in_trash' => __( "No {$m4is__ql9vk} found in Trash.", self::$m4is_n3zlk ), ];
 $m4is_ow9b = [ 'title', 'author',  ];
 $m4is_fa6l = [  ];
 $m4is_k4yeul = [ 'can_export' => true, 'capability_type' => 'post', 'delete_with_user' => true, 'description' => "Memberium {$m4is__ql9vk} for Umbrella Accounts", 'exclude_from_search' => true, 'labels' => $m4is_y1tw, 'menu_position' => 99, 'public' => $m4is_fze62, 'rewrite' => false, 'show_in_admin_bar' => true, 'show_in_menu' => false, 'show_in_nav_menus' => false, 'show_in_rest' => true, 'show_ui' => true, 'supports' => $m4is_ow9b, 'taxonomies' => $m4is_fa6l, ];
 register_post_type( 'memb_departments', $m4is_k4yeul );
 } }

