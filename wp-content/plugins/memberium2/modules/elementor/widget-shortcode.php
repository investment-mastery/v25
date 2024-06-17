<?php
/**
* Copyright (c) 2018-2022 David J Bullock
* Web Power and Light
*/

 class_exists( 'm4is_pms8y' ) || die();
  
class m4is_ek09 extends \Elementor\Widget_Shortcode {  protected 
function render() { $m4is_z50f = $this->get_settings_for_display( 'shortcode' );
 $m4is_z50f = apply_filters( 'memberium/elementor/widget/shortcode/render', $m4is_z50f, $this->get_settings_for_display() );
 if ( ! empty( $m4is_z50f ) ){ global $wp_embed;
 $m4is_z50f = do_shortcode( shortcode_unautop( $wp_embed->run_shortcode( $m4is_z50f ) ) );
  echo '<div class="elementor-shortcode">', $m4is_z50f, '</div>';
 } } }

