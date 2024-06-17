<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_g79rc {    private static 
function m4is_ou106d() { return apply_filters('memberium/lms/course_type', 'page');
 } private static 
function m4is_xyb80j() { return apply_filters('memberium/lms/course_category', 'category');
 } private static 
function m4is_czm2qb() { return apply_filters('memberium/lms/course_tag', 'post_tag');
 }    static 
function m4is_sdy9l($m4is_qnjfv = [], $m4is_z50f = '', $m4is_carw7y = '') { self::$m4is_z3fl = ++self::$m4is_z3fl;
 $m4is_fc9lj = self::m4is_ou106d();
 $m4is_zk6u = [ 'container_template' => 'coursegrid_container', 'grid_template' => 'coursegrid_item' ];
 $m4is_r6nh_b = [ 'container_template' => $m4is_zk6u['container_template'],  'css_class' => '',  'css_id' => '',  'grid_template' => $m4is_zk6u['grid_template'],  'order' => 'asc',  'sort' => 'course_order',  'post_ids' => '',  'post_type' => $m4is_fc9lj,  'posts_per_page' => -1,  'categories' => '',  'tags' => '',  'taxonomy_compare' => 'AND',  'columns' => 3,  'mobile_cols' => 1,  'tablet_cols' => 2,  'widescreen_cols' => 3,  'no_breakpoints' => 0,  'progress_bar' => 1,  'no_css' => 0  ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = wp_parse_args($m4is_qnjfv, $m4is_r6nh_b);
 $m4is_a_hn = $m4is_qnjfv['post_type'] = empty($m4is_qnjfv['post_type']) ? $m4is_fc9lj : $m4is_qnjfv['post_type'];
 add_filter('memberium/lms/course/item/data', [__CLASS__, 'course_grid_item_data'], PHP_INT_MAX - 1, 2);
  foreach ($m4is_zk6u as $m4is_t5gwb => $m4is_koi38) { $m4is_bgbj = empty($m4is_qnjfv[$m4is_t5gwb]) ? false : m4is_crqo::m4is_t8a572($m4is_qnjfv[$m4is_t5gwb]);
  if (! $m4is_bgbj) { if (m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b()) { $m4is_jadl06 = __('Error : template missing for %s', 'memberium');
 return "<p>".sprintf($m4is_jadl06, $m4is_t5gwb )."</p>";
 } return '';
 } else{ if ($m4is_t5gwb === 'grid_template') { $m4is_sbavot = $m4is_bgbj;
 } } }  $m4is_x4nfwb = [ 'post_type' => $m4is_a_hn, 'posts_per_page' => $m4is_qnjfv['posts_per_page'], ];
  $m4is_kxsq = self::m4is_mld_m('post_ids', $m4is_qnjfv);
 if ($m4is_kxsq) { $m4is_x4nfwb['post__in'] = $m4is_kxsq;
 }  $m4is_cjqn = self::m4is_b0xfaz($m4is_qnjfv);
 if ($m4is_cjqn) { $m4is_x4nfwb['tax_query'] = $m4is_cjqn;
 }   elseif ($m4is_a_hn == 'post' || $m4is_a_hn === 'page') { if (m4is_pms8y::m4is_e5l8a9()->m4is_lvmz1b()) { $m4is_jadl06 = __('Error : memb_coursegrid shortcode for %ss requires a category or tag filter to display.', 'memberium');
 return "<p>" . sprintf($m4is_jadl06, $m4is_a_hn) . "</p>";
 } return '';
 }  $m4is_p409 = ! empty($m4is_qnjfv['order']) ? strtolower($m4is_qnjfv['order']) : 'asc';
 $m4is_p409 = ! in_array($m4is_p409, ['asc','desc']) ? 'asc' : $m4is_p409;
 $m4is_xo_nv = !empty($m4is_qnjfv['sort']) ? strtolower($m4is_qnjfv['sort']) : 'course_order';
 $m4is_jp27 = in_array($m4is_xo_nv, ['title', 'date']);
 if ($m4is_jp27) { $m4is_x4nfwb['orderby'] = $m4is_xo_nv;
 $m4is_x4nfwb['order'] = $m4is_p409;
 }  $m4is_jo8fb = self::m4is_vrt1($m4is_x4nfwb, $m4is_qnjfv);
 $m4is_fshcq = $m4is_jo8fb ? $m4is_jo8fb->get_posts() : false;
 $m4is_d6w3io = [];
 if ($m4is_fshcq) { foreach ($m4is_fshcq as $m4is_cd8k) { $m4is_d6w3io[] = apply_filters("memberium/lms/course/item/data", [], $m4is_cd8k);
 }  if (! $m4is_jp27) { if ($m4is_xo_nv === 'course_order') { add_filter('memberium/course/grid/sort', [__CLASS__, 'course_grid_course_order_sort'], PHP_INT_MAX - 1, 2);
 } $m4is_d6w3io = apply_filters("memberium/course/grid/sort", $m4is_d6w3io, $m4is_xo_nv);
 if (!empty($m4is_d6w3io) && $m4is_p409 === 'desc') { $m4is_d6w3io = array_reverse($m4is_d6w3io);
 } } } $m4is_taomv8 = ['css_class' => '', 'css_id' => ''];
  $m4is_dhgx = 'memberium-course-grid';
  foreach ($m4is_taomv8 as $m4is_vk6d_ => $m4is_qqbke1) { if (!empty(esc_attr($m4is_qnjfv[$m4is_vk6d_]) )) { $m4is_taomv8[$m4is_vk6d_] = esc_attr($m4is_qnjfv[$m4is_vk6d_]);
 } } if ((int)$m4is_qnjfv['no_breakpoints'] > 0) { $m4is_kfdzv = '';
 } else{ $m4is_kfdzv = self::m4is_rw4b($m4is_qnjfv, $m4is_dhgx);
 } $m4is_dhgx .= empty($m4is_taomv8['css_class']) ? "" : " {$m4is_taomv8['css_class']}";
 $m4is_fdshi = empty($m4is_taomv8['css_id']) ? "" : " {$m4is_taomv8['css_id']}";
 $m4is_kokwe0 = [ 'grid-number' => self::$m4is_z3fl, 'grid-items' => $m4is_d6w3io, 'grid-item-template' => $m4is_sbavot, 'query_args' => $m4is_x4nfwb, 'wrapper-id' => $m4is_fdshi, 'wrapper-class' => $m4is_dhgx, 'wrapper-col-styles' => $m4is_kfdzv ];
  if ( (int) $m4is_qnjfv['no_css'] < 1) { wp_enqueue_style('memb_coursegrid_css');
 }  return m4is_crqo::m4is_yu7b1r($m4is_zk6u['container_template'], $m4is_qnjfv, $m4is_z50f, $m4is_carw7y, $m4is_kokwe0);
 }  static 
function m4is_vrt1($m4is_k4yeul, $m4is_qnjfv) { $m4is_r6nh_b = [ 'post_type' => self::m4is_ou106d(), 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'ASC', 'fields' => 'ids' ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_a_hn = $m4is_k4yeul['post_type'];
 $m4is_k4yeul = apply_filters('memberium/lms/query/args', $m4is_k4yeul, $m4is_qnjfv);
 if (empty($m4is_k4yeul)) { return false;
 } $m4is_jo8fb = new WP_Query($m4is_k4yeul );
 wp_reset_postdata();
 return ($m4is_jo8fb->have_posts() ) ? $m4is_jo8fb : false;
 }  static 
function m4is_b0xfaz($m4is_gqid) { $m4is_cjqn = [];
 $m4is_a_hn = $m4is_gqid['post_type'];
 $m4is_x5z9r = ($m4is_a_hn === self::m4is_ou106d() );
  $m4is_ygajo = self::m4is_mld_m('categories', $m4is_gqid);
 if ($m4is_ygajo) { $m4is_cjqn[] = [ 'taxonomy' => $m4is_x5z9r ? self::m4is_xyb80j() : 'category', 'field' => 'term_id', 'terms' => $m4is_ygajo, 'operator' => 'IN', 'include_children' => false, ];
 } $m4is_iystd2 = self::m4is_mld_m('tags', $m4is_gqid);
 if ($m4is_iystd2) { $m4is_cjqn[] = [ 'taxonomy' => ($m4is_x5z9r) ? self::m4is_czm2qb() : 'post_tag', 'field' => 'term_id', 'terms' => $m4is_iystd2, 'operator' => 'IN' ];
 } if (! empty($m4is_cjqn) && count($m4is_cjqn) > 1) { $m4is_eukjeg = 'AND';
 if (!empty($m4is_gqid['tax_compare'])) { $m4is_eukjeg = strtoupper(trim($m4is_gqid['tax_compare']) );
 if ($m4is_eukjeg !== 'OR' || $m4is_eukjeg !== 'AND') { $m4is_eukjeg = 'AND';
 } } $m4is_cjqn[] = [ 'relation' => $m4is_eukjeg ];
 } return empty($m4is_cjqn) ? false : $m4is_cjqn;
 }  static 
function course_grid_item_data(array $m4is_etj2, int $m4is_j5sy07) { $m4is_p51e_l = get_post_meta($m4is_j5sy07, '_memberium/coursegrid/config', true);
 $m4is_p51e_l = $m4is_p51e_l ? $m4is_p51e_l : [];
 $m4is_ryw0 = empty($m4is_p51e_l['excerpt']) ? '' : html_entity_decode(stripslashes($m4is_p51e_l['excerpt']) );
  $m4is_ru4y = [ 'ID' => $m4is_j5sy07, 'title' => get_the_title($m4is_j5sy07), 'excerpt' => $m4is_ryw0, 'url' => get_the_permalink($m4is_j5sy07), 'status' => 'unlocked', 'progress' => 0, 'access' => 1, 'order' => empty($m4is_p51e_l['order']) ? 0 : (int)$m4is_p51e_l['order'] ];
 $m4is_etj2 = wp_parse_args($m4is_etj2, $m4is_ru4y);
 $m4is_etj2['thumbnails'] = self::m4is_pxr_($m4is_j5sy07, $m4is_etj2, $m4is_p51e_l);
  if (! (int)$m4is_etj2['access'] > 0) { $m4is_etj2['status_text'] = _x('Not Enrolled', 'course_grid_status', 'memberium');
 $m4is_etj2['progress_text'] = _x('Locked', 'course_grid_progress', 'memberium');
 $m4is_etj2['button_text'] = _x('Locked', 'course_grid_button', 'memberium');
 $m4is_etj2['thumbnail'] = $m4is_etj2['thumbnails']['locked'];
 $m4is_etj2['url'] = !empty($m4is_p51e_l['locked_url']) ? $m4is_p51e_l['locked_url'] : '';
 } else{ $m4is_cbqkda = (int)$m4is_etj2['progress'];
 $m4is_etj2['thumbnail'] = $m4is_etj2['thumbnails']['unlocked'];
 $m4is_etj2['status_text'] = _x('Enrolled', 'course_grid_status', 'memberium');
  if ($m4is_cbqkda > 0 && $m4is_cbqkda < 100) { $m4is_etj2['progress_text'] = sprintf(_x('%d%% Completed', 'course_grid_progress', 'memberium') , $m4is_cbqkda);
 $m4is_etj2['button_text'] = _x("Continue", 'course_grid_button', 'memberium');
 }  else if ($m4is_cbqkda >= 100) { $m4is_etj2['status'] = 'completed';
 $m4is_etj2['status_text'] = _x('Completed', 'course_grid_status', 'memberium');
 $m4is_etj2['progress_text'] = _x('Completed', 'course_grid_progress', 'memberium');
 $m4is_etj2['button_text'] = _x('Completed', 'course_grid_button', 'memberium');
 }  else{ if( $m4is_etj2['status'] === 'not_enrolled' ){ $m4is_etj2['status'] = 'unlocked';
 $m4is_etj2['status_text'] = _x('Not Enrolled', 'course_grid_status', 'memberium');
 } $m4is_etj2['progress_text'] = _x('Not Started', 'course_grid_progress', 'memberium');
 $m4is_etj2['button_text'] = _x('Start', 'course_grid_button', 'memberium');
 } } return $m4is_etj2;
 } static 
function m4is_pxr_($m4is_j5sy07, $m4is_etj2, $m4is_p51e_l) { $m4is_w7b8f0 = get_post_thumbnail_id($m4is_j5sy07);
 $m4is_uo9gh = get_the_post_thumbnail_url($m4is_j5sy07, 'medium');
 $m4is_m7ilfy = [];
 $m4is_zg8z = [ 'unlocked', 'locked' ];
 if (empty($m4is_uo9gh)) { $m4is_uo9gh = plugin_dir_url(MEMBERIUM_HOME) . "css/memberium-default-course.svg";
 } foreach ($m4is_zg8z as $m4is_g0wy) { $m4is_o4bt = !empty($m4is_p51e_l[$m4is_g0wy]) ? $m4is_p51e_l[$m4is_g0wy] : [];
 $m4is_woh1fq = !empty($m4is_o4bt['url']) ? esc_url($m4is_o4bt['url']) : '';
 $m4is_bd_512 = !empty($m4is_o4bt['id']) ? (int)$m4is_o4bt['id'] : 0;
 $m4is_yorj8i = !empty($m4is_bd_512) ? wp_get_attachment_image_srcset($m4is_bd_512) : '';
 if (empty($m4is_woh1fq)) { $m4is_woh1fq = $m4is_uo9gh;
 $m4is_bd_512 = $m4is_w7b8f0;
 $m4is_yorj8i = $m4is_uo9gh;
 }  $m4is_m7ilfy[$m4is_g0wy] = [ 'src' => $m4is_woh1fq, 'id' => $m4is_bd_512, 'srcset' => $m4is_yorj8i ];
 } return $m4is_m7ilfy;
 } static 
function m4is_rw4b($m4is_gqid, $m4is_dhgx) { $m4is_kfdzv = "<style>";
 $m4is_kz32 = [ 'mobile_cols' => [ 'col' => 1 ], 'tablet_cols' => [ 'col' => 2, 'break' => 768 ], 'columns' => [ 'col' => 3, 'break' => 992 ], 'widescreen_cols' => [ 'col' => 3, 'break' => 1312 ] ];
      foreach ($m4is_kz32 as $m4is_kz32 => $m4is_r6nh_b) { $m4is_plyo = (int)esc_attr($m4is_gqid[$m4is_kz32]);
 $m4is_plyo = empty($m4is_plyo) ? $m4is_r6nh_b['col'] : $m4is_plyo;
  if ($m4is_kz32 != 'mobile_cols') { $m4is_kqo_bl = (int)esc_attr(apply_filters("memberium/lms/breakpoint/pixel/{$m4is_kz32}", $m4is_r6nh_b['break']) );
 $m4is_kqo_bl = empty($m4is_kqo_bl) ? $m4is_r6nh_b['break'] : $m4is_kqo_bl;
 $m4is_kfdzv .= "@media (min-width: {$m4is_kqo_bl}px) {";
 }  $m4is_kfdzv .= ".{$m4is_dhgx} {";
 if ($m4is_kz32 === 'mobile_cols') { $m4is_kfdzv .= "margin:0 auto;display:grid;grid-gap:2em;";
 } $m4is_kfdzv .= "grid-template-columns: repeat({$m4is_plyo}, 1fr);";
 $m4is_kfdzv .= "}";
  $m4is_kfdzv .= ($m4is_kz32 != 'mobile_cols' ) ? "}" : "";
  } $m4is_kfdzv .= "</style>";
 return $m4is_kfdzv;
 }  static 
function m4is_mld_m($m4is_s2ge5, $m4is_gqid) { if (is_array($m4is_gqid) && is_string($m4is_s2ge5) && !empty($m4is_gqid[$m4is_s2ge5])) { $m4is_vvimh = $m4is_gqid[$m4is_s2ge5];
 $m4is__9uc = array_unique(explode(',', trim($m4is_vvimh, ',') ));
 $m4is__9uc = array_values(array_filter($m4is__9uc, 'is_numeric' ) );
 return (!empty($m4is__9uc) ) ? $m4is__9uc : false;
 } return false;
 }  static 
function course_grid_course_order_sort($m4is_d6w3io, $m4is_xo_nv) { if ($m4is_xo_nv !== 'course_order' || empty($m4is_d6w3io)) { return $m4is_d6w3io;
 } $m4is_zyflbh = [ 'unlocked' => 1, 'completed' => 2, 'locked' => 3 ];
 usort($m4is_d6w3io, function ($m4is_z9hvgk, $m4is_ovlj) use($m4is_zyflbh) {  if ($m4is_z9hvgk['order'] === $m4is_ovlj['order']) {  if ($m4is_z9hvgk['status'] === $m4is_ovlj['status']) {  if ($m4is_z9hvgk['status'] === 'unlocked') { return $m4is_z9hvgk['progress'] < $m4is_ovlj['progress'] ? 1 : -1;
 } else{ return 1;
 } }  else { return $m4is_zyflbh[$m4is_z9hvgk['status']] > $m4is_zyflbh[$m4is_ovlj['status']] ? 1 : -1;
 } }  return $m4is_z9hvgk['order'] > $m4is_ovlj['order'] ? 1 : -1;
 });
 return $m4is_d6w3io;
 } static $m4is_z3fl = 0;
 private 
function __construct() { } }

