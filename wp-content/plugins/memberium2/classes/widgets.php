<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
   final 
class m4is_gti2r extends WP_Widget { 
function __construct() { parent::__construct( 'foo_widget',  __('Memberium Login', 'memberium'),  ['description' => __('Memberium Login Widget', 'memberium')]  );
 }   
function widget($m4is_k4yeul, $m4is_ye0_i) { echo $m4is_k4yeul['before_widget'];
 if (! empty($m4is_ye0_i['title']) ) {  } echo '<h3 class="widget-title">', __('Login', 'memberium'), '</h3>';
 echo do_shortcode('[memb_loginform]');
 echo $m4is_k4yeul['after_widget'];
 }  
function form($m4is_ye0_i) { $title = ! empty($m4is_ye0_i['title']) ? $m4is_ye0_i['title'] : __('New title', 'text_domain');
 ?>
		<p>
			<label for="<?php echo $this->get_field_id('title');
 ?>"><?php _e('Hide When Logged In:');
 ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');
 ?>" name="<?php echo $this->get_field_name('title');
 ?>" type="text" value="<?php echo esc_attr($title);
 ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title');
 ?>"><?php _e('Title:');
 ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title');
 ?>" name="<?php echo $this->get_field_name('title');
 ?>" type="text" value="<?php echo esc_attr($title);
 ?>">
		</p>
		<?php
 }  
function update($m4is_jc891, $m4is_w1f0) { $m4is_ye0_i = [];
 $m4is_ye0_i['title'] = (! empty($m4is_jc891['title']) ) ? strip_tags($m4is_jc891['title']) : '';
 return $m4is_ye0_i;
 } }

