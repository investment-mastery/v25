<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_bzvmwb { private $app_id = '';
 private 
function __construct() { } static private 
function m4is_yqb28z( $m4is_w_o7al, $m4is_wov2, $m4is_koi38 ) { $m4is_w_o7al = strtolower( trim( $m4is_w_o7al ) );
 $m4is_w_o7al = in_array( $m4is_w_o7al, $m4is_wov2 ) ? $m4is_w_o7al : $m4is_koi38;
 return $m4is_w_o7al;
 }  static 
function m4is_pntk($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { $m4is_r6nh_b = [ 'color' => 'light',  'mobile' => '', 'order' => 'social', 'posts' => 10, 'url' => get_permalink(),  'width' => 550, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = '<div class="fb-comments" data-href="' . $m4is_qnjfv['url'] . '" data-numposts="' . $m4is_qnjfv['posts'] . '" data-colorscheme="' . $m4is_qnjfv['color'] . '" data-order-by="' . $m4is_qnjfv['order'] . '" data-width="' . $m4is_qnjfv['width'] . '"></div>';
 return $m4is_uzfw8j;
 }  static 
function m4is_s153_l($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { $m4is_r6nh_b = [ 'parent' => 'false', 'url' => '',  'width' => 560, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_uzfw8j = '<div class="fb-comment-embed" data-href="' . $m4is_qnjfv['url'] . '" data-width="' . $m4is_qnjfv['width'] . '" data-include-parent="' . $m4is_qnjfv['parent'] . '"></div>';
 return $m4is_uzfw8j;
 }  static 
function m4is_xsdjr( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '') { $m4is_r6nh_b = [ 'color' => 'light', 'coppa' => 'false', 'faces' => 'false', 'layout' => 'standard', 'size' => 'small', 'url' => 'https://www.facebook.com/memberium/', 'width' => -1, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['color'] = self::m4is_yqb28z( $m4is_qnjfv['color'], ['light', 'dark',], 'light' );
 $m4is_qnjfv['coppa'] = self::m4is_yqb28z( $m4is_qnjfv['coppa'], ['true', 'false',], 'true' );
 $m4is_qnjfv['layout'] = self::m4is_yqb28z( $m4is_qnjfv['layout'], ['standard', 'button_count', 'box_count'], 'standard' );
 $m4is_qnjfv['faces'] = self::m4is_yqb28z( $m4is_qnjfv['faces'], ['true', 'false'], 'false' );
 $m4is_qnjfv['size'] = self::m4is_yqb28z( $m4is_qnjfv['size'], ['large', 'small'], 'small' );
 if ( $m4is_qnjfv['layout'] == 'standard' ) { if ( $m4is_qnjfv['width'] == -1 ) { $m4is_qnjfv['width'] = 450;
 } $m4is_nfyl = 225;
 $m4is_o9fyz = 35;
 if ( $m4is_qnjfv['faces'] == 'true' ) { $m4is_o9fyz = 80;
 } $m4is_qnjfv['width'] = max( $m4is_qnjfv['width'], $m4is_nfyl );
 } elseif ( $m4is_qnjfv['layout'] == 'box_count' ) { $m4is_o9fyz = 65;
 $m4is_qnjfv['width'] = 55;
 } elseif ( $m4is_qnjfv['layout'] == 'button_count' ) { $m4is_qnjfv['width'] = 90;
 $m4is_o9fyz = 20;
 } $m4is_gqid = [ 'data-colorscheme' => $m4is_qnjfv['color'], 'data-href' => $m4is_qnjfv['url'], 'data-kid-directed-site' => $m4is_qnjfv['coppa'], 'data-layout' => $m4is_qnjfv['layout'], 'data-show-faces' => $m4is_qnjfv['faces'], 'data-size' => $m4is_qnjfv['size'], 'data-width' => $m4is_qnjfv['width'], 'data-height' => $m4is_o9fyz, ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } $m4is_uzfw8j = '<div class="fb-follow" ' . $m4is_x05f . ' ></div>';
 return $m4is_uzfw8j;
 }  static 
function m4is_s0smo( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '' ) { $m4is_r6nh_b = [ 'action' => 'like', 'color' => 'light', 'coppa' => 'false', 'faces' => 'false', 'layout' => 'standard', 'referral' => '', 'share' => 'false', 'size' => 'small', 'url' => get_permalink(), 'width' => 0, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['action'] = self::m4is_yqb28z( $m4is_qnjfv['action'], ['like', 'recommend'], 'like' );
 $m4is_qnjfv['color'] = self::m4is_yqb28z( $m4is_qnjfv['color'], ['light', 'dark'], 'light' );
 $m4is_qnjfv['coppa'] = self::m4is_yqb28z( $m4is_qnjfv['coppa'], ['true', 'false'], 'false' );
 $m4is_qnjfv['layout'] = self::m4is_yqb28z( $m4is_qnjfv['layout'], ['standard', 'button_count', 'button', 'box_count'], 'standard' );
 $m4is_qnjfv['share'] = self::m4is_yqb28z( $m4is_qnjfv['layout'], ['true', 'false'], 'false');
 $m4is_qnjfv['faces'] = self::m4is_yqb28z( $m4is_qnjfv['faces'], ['true', 'false'], 'false' );
 $m4is_qnjfv['size'] = self::m4is_yqb28z( $m4is_qnjfv['size'], ['small', 'large'], 'small' );
 if ( $m4is_qnjfv['layout'] == 'standard' ) { $m4is_qnjfv['width'] = min( $m4is_qnjfv['width'], 225 );
 } elseif ( $m4is_qnjfv['layout'] == 'box_count' ) { $m4is_qnjfv['width'] = min( $m4is_qnjfv['width'], 55 );
 } elseif ( $m4is_qnjfv['layout'] == 'button_count' ) { $m4is_qnjfv['width'] = min( $m4is_qnjfv['width'], 90 );
 } elseif ( $m4is_qnjfv['layout'] == 'button' ) { $m4is_qnjfv['width'] = min( $m4is_qnjfv['width'], 47 );
 } $m4is_gqid = [ 'data-action' => $m4is_qnjfv['action'], 'data-colorscheme' => $m4is_qnjfv['color'], 'data-href' => $m4is_qnjfv['url'], 'data-kid-directed-site' => $m4is_qnjfv['coppa'], 'data-layout' => $m4is_qnjfv['layout'], 'data-ref' => $m4is_qnjfv['referral'], 'data-share' => $m4is_qnjfv['share'], 'data-show-faces' => $m4is_qnjfv['faces'], 'data-size' => $m4is_qnjfv['size'], 'data-width' => $m4is_qnjfv['width'], ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } return '<div class="fb-like" ' . $m4is_x05f . ' ></div>';
 }  static 
function m4is_hre5k( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '' ) { $m4is_r6nh_b = [ 'adapt' => 'true', 'faces' => 'true', 'height' => 500, 'hide_cover' => 'false', 'hide_cta' => 'false', 'small_header' => 'false', 'tabs' => 'timeline', 'url' => 'https://www.facebook.com/memberium/', 'width' => 340, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['width'] = max( $m4is_qnjfv['width'], 180 );
 $m4is_qnjfv['width'] = min( $m4is_qnjfv['width'], 500 );
 $m4is_qnjfv['height'] = max( $m4is_qnjfv['height'], 70 );
 $m4is_qnjfv['hide_cover'] = self::m4is_yqb28z( $m4is_qnjfv['hide_cover'], ['true', 'false'], 'false' );
 $m4is_qnjfv['faces'] = self::m4is_yqb28z( $m4is_qnjfv['faces'], ['true', 'false'], 'true' );
 $m4is_qnjfv['hide_cta'] = self::m4is_yqb28z( $m4is_qnjfv['hide_cta'], ['true', 'false'], 'false' );
 $m4is_qnjfv['small_header'] = self::m4is_yqb28z( $m4is_qnjfv['small_header'], ['true', 'false'], 'false' );
 $m4is_qnjfv['adapt'] = self::m4is_yqb28z( $m4is_qnjfv['adapt'], ['true', 'false'], 'true' );
 $m4is_gqid = [ 'data-href' => $m4is_qnjfv['url'], 'data-width' => $m4is_qnjfv['width'], 'data-height' => $m4is_qnjfv['height'], 'data-tabs' => $m4is_qnjfv['tabs'], 'data-hide-cover' => $m4is_qnjfv['hide_cover'], 'datadata-show-facepile' => $m4is_qnjfv['faces'], 'data-hide-cta' => $m4is_qnjfv['hide_cta'], 'data-small-header' => $m4is_qnjfv['small_header'], 'data-adapt-container-width' => $m4is_qnjfv['adapt'], ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } return '<div class="fb-like" ' . $m4is_x05f . ' ></div>';
 }  static 
function m4is_k8x6j( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '' ) { $m4is_r6nh_b = [ 'size' => 'large', 'url' => get_permalink(), ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_qnjfv['size'] = self::m4is_yqb28z( $m4is_qnjfv['size'], ['small', 'large'], 'large' );
 $m4is_gqid = [ 'data-size' => $m4is_qnjfv['size'], 'data-uri' => $m4is_qnjfv['url'], ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } $m4is_uzfw8j = '<div class="fb-save" ' . $m4is_x05f . '></div>';
 return $m4is_uzfw8j;
 }  static 
function m4is_o2wlr0( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '' ) { $m4is_r6nh_b = [ 'color' => 'light', 'coppa' => 'false', 'referral' => '', 'url' => get_permalink(), ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_qnjfv['color'] = self::m4is_yqb28z( $m4is_qnjfv['color'], ['light', 'dark'], 'light' );
 $m4is_qnjfv['coppa'] = self::m4is_yqb28z( $m4is_qnjfv['coppa'], ['true', 'false'], 'false' );
 $m4is_qnjfv['size'] = 'small';
 $m4is_gqid = [ 'data-colorscheme' => $m4is_qnjfv['color'], 'data-href' => $m4is_qnjfv['url'], 'data-kid-directed-site' => $m4is_qnjfv['coppa'], 'data-ref' => $m4is_qnjfv['referral'], 'data-size' => $m4is_qnjfv['size'], ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } $m4is_uzfw8j = '<div class="fb-send" ' . $m4is_x05f . ' ></div>';
 return $m4is_uzfw8j;
 }  static 
function m4is_wztlbm( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '' ) { $m4is_r6nh_b = [ 'layout' => 'icon_link', 'mobile' => 'false', 'size' => 'small', 'url' => get_permalink(), ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_qnjfv['layout'] = self::m4is_yqb28z( $m4is_qnjfv['layout'], ['box_count', 'button_count', 'button', 'icon_link'], 'icon_link' );
 $m4is_qnjfv['mobile'] = self::m4is_yqb28z( $m4is_qnjfv['mobile'], ['true', 'false'], 'false' );
 $m4is_qnjfv['size'] = self::m4is_yqb28z( $m4is_qnjfv['size'], ['small', 'large'], 'small' );
 $m4is_gqid = [ 'data-href' => $m4is_qnjfv['url'], 'data-layout' => $m4is_qnjfv['layout'], 'data-mobile_iframe' => $m4is_qnjfv['mobile'], 'data-size' => $m4is_qnjfv['size'], ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } $m4is_uzfw8j = '<div class="fb-share-button" ' . $m4is_x05f . ' >';
 $m4is_uzfw8j .= '<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $m4is_qnjfv['url'] ) . '">Share</a></div>';
 return $m4is_uzfw8j;
 }  static 
function m4is__5_aw( $m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y = '' ) { $m4is_r6nh_b = [ 'post' => 'false', 'url' => '',  'width' => 500, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['width'] = max( $m4is_qnjfv['width'], 220 );
 $m4is_qnjfv['post'] = self::m4is_yqb28z($m4is_qnjfv['post'], ['true', 'false'], 'false');
 $m4is_gqid = [ 'data-href' => $m4is_qnjfv['url'], 'data-width' => $m4is_qnjfv['width'], 'data-show-text' => $m4is_qnjfv['post'], ];
 $m4is_x05f = '';
 foreach( $m4is_gqid as $m4is_c5zg => $m4is_g0wy ) { if ( ! empty( $m4is_g0wy ) ) { $m4is_x05f .= $m4is_c5zg . '="' . $m4is_g0wy .'"';
 } } $m4is_uzfw8j = '<div class="fb-video" ' . $m4is_x05f . ' ><div class="fb-xfbml-parse-ignore"></div></div>';
 return $m4is_uzfw8j;
 } }

