<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_y639 { static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 } private 
function m4is_ww61so() { add_action( 'admin_init', [$this, 'm4is_s_xr5'] );
 } 
function m4is_s_xr5() { $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
 if ( in_array( $m4is_a_hn, $this->m4is_of01c_() ) ) { add_meta_box( 'is4wp-learnpress-actions', 'LearnPress Memberium Integration', [$this, 'm4is_qv87u0'], $m4is_a_hn, 'side' );
 } add_action( 'save_post', [$this, 'm4is_v0asnx'], 10, 3 );
 } 
function m4is_v0asnx( int $m4is_cd8k, $m4is_c2ah, $m4is_wlqsgr ) {  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return;
 }  $m4is_flx71n = $this->m4is_ht5q();
 $m4is_s2ge5 = "memberium_learnpress_actions_nonce_{$m4is_cd8k}";
  if ( empty( $_POST[ $m4is_s2ge5 ] ) || ! wp_verify_nonce( $_POST[ $m4is_s2ge5], MEMBERIUM_SKU ) ) { return;
 } if ( ! current_user_can( 'edit_posts', $m4is_cd8k ) ) { return;
 } foreach( $m4is_flx71n as $m4is_s2ge5 ) { if ( isset( $_POST[$m4is_s2ge5] ) ) { if ( empty( $_POST[$m4is_s2ge5] ) ) { delete_post_meta( $m4is_cd8k, $m4is_s2ge5 );
 } else { update_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5] );
 } } } } 
function m4is_qv87u0( $m4is_c2ah, $m4is_zkvdt7 ) { if ( ! is_a( $m4is_c2ah, 'WP_Post' ) ) { return;
 }  $m4is_p51e_l = [];
 $m4is_lja67 = [];
 $m4is_cd8k = $m4is_c2ah->ID;
 $m4is_a_hn = $m4is_c2ah->post_type;
 $m4is_m9ltod = get_post_meta( $m4is_cd8k );
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2( 'contact', true );
 $m4is_mjw9i6 = $this->m4is_of01c_();
 $m4is_s6vnbm = $this->m4is_ht5q();
 foreach( $m4is_s6vnbm as $m4is_d2l7au ) { $m4is_p51e_l[ $m4is_d2l7au ] = isset( $m4is_m9ltod[ $m4is_d2l7au ][0] ) ? $m4is_m9ltod[ $m4is_d2l7au ][0] : '';
 }  $m4is_lja67 = [ '' => '(None)' ];
 foreach( $m4is_w_8g as $m4is_g1ru50 ) { $m4is_lja67[ $m4is_g1ru50 ] = $m4is_g1ru50;
 } if ( in_array( $m4is_a_hn, $m4is_mjw9i6 ) ) { wp_nonce_field( MEMBERIUM_SKU, "memberium_learnpress_actions_nonce_{$m4is_cd8k}" );
 if ( in_array( $m4is_c2ah->post_type, ['lp_course'] ) ) { $m4is_nmlj3 = empty( $m4is_p51e_l['_is4wp_learndash_autoenroll'] ) ? '' : $m4is_p51e_l['_is4wp_learndash_autoenroll'];
 echo '<label for="_is4wp_learndash_autoenroll">' . _e( "AutoEnroll Tags", 'memberium' ) . ':</label> ';
 echo '<input value="', $m4is_nmlj3, '" name="_is4wp_learndash_autoenroll" class="multitaglist" style="width:100%; max-width:100%"><br /><br />';
 } $m4is_w0t5d = empty( $m4is_p51e_l['_is4wp_learndash_goals'] ) ? '' : $m4is_p51e_l['_is4wp_learndash_goals'];
 $m4is_daxv7 = empty( $m4is_p51e_l['_is4wp_learndash_tags'] ) ? '' : $m4is_p51e_l['_is4wp_learndash_tags'];
 $m4is_jn031 = $this->m4is__7q1( (int) $m4is_p51e_l['_is4wp_learndash_actions'] );
 echo '<p>On completion of this section, execute the following actions:</p>';
 echo '<label for="_is4wp_learndash_goals">' . _e( "Achieve these Goals", 'memberium' ) . ':</label> ';
 echo '<input value="', $m4is_w0t5d, '" name="_is4wp_learndash_goals" style="width:100%; max-width:100%"><br /><br />';
 echo '<label for="_is4wp_learndash_tags">' . _e( "Apply these Tags", 'memberium' ) . ':</label> ';
 echo '<input value="', $m4is_daxv7, '" name="_is4wp_learndash_tags" class="multitaglist" style="width:100%; max-width:100%"><br /><br />';
 if ( ! empty( $m4is_jn031 ) ) { echo '<label for="_is4wp_learndash_actions">' . _e( "Run this Actionset", 'memberium' ) . ':</label> ';
 echo '<select class="actionset-selector" name="_is4wp_learndash_actions" style="width:100%; max-width:100%">';
 echo $m4is_jn031;
 echo '</select>';
 } echo '<br /><br />';
 if ( in_array( $m4is_a_hn, ['lp_quiz'] ) ) { $m4is_k4yeul = [ 'class' => 'actionset-selected', 'style' => 'width:250px;', ];
 $m4is_r6gwp = empty( $m4is_p51e_l['_is4wp_learndash_fail_goals'] ) ? '' : $m4is_p51e_l['_is4wp_learndash_fail_goals'];
 $m4is_v4psr = empty( $m4is_p51e_l['_is4wp_learndash_fail_tags'] ) ? '' : $m4is_p51e_l['_is4wp_learndash_fail_tags'];
 $m4is_t0xlf = $this->m4is__7q1( (int) $m4is_p51e_l['_is4wp_learndash_fail_actions'] );
 $m4is_jdoz = empty( $m4is_p51e_l['_is4wp_lms_start_date'] ) ? '' : $m4is_p51e_l['_is4wp_lms_start_date'];
 $m4is_yp4wn = empty( $m4is_p51e_l['_is4wp_lms_complete_percent'] ) ? '' : $m4is_p51e_l['_is4wp_lms_complete_percent'];
 echo '<p>If the student <strong style="color:red;">fails</strong> this test, execute the following actions:</p>';
 echo '<label for="_is4wp_learndash_fail_goals">' . _e("Achieve these Goals", 'memberium') . ':</label> ';
 echo '<input value="', $m4is_r6gwp, '" name="_is4wp_learndash_fail_goals" style="width:100%; max-width:100%"><br /><br />';
 echo '<label for="_is4wp_learndash_fail_tags">' . _e("Apply these Tags", 'memberium') . ':</label> ';
 echo '<input value="', $m4is_v4psr, '" name="_is4wp_learndash_fail_tags" class="multitaglist" style="width:100%; max-width:100%"><br /><br />';
 echo '<label for="_is4wp_learndash_fail_actions">' . _e("Run this Actionset", 'memberium') . ':</label> ';
 echo '<select class="actionset-selector" name="is4wp_learndash_fail_actions" style="width:100%; max-width:100%">';
 echo $m4is_t0xlf;
 echo '</select>';
 echo '<label for="_is4wp_lms_start_date">' . _e("Start Date Field", 'memberium') . ':</label><br />';
 m4is_wr40w::m4is_jtbkc('_is4wp_lms_start_date', $m4is_lja67, $m4is_jdoz, $m4is_k4yeul);
 echo '<br>';
 echo '<label for="_is4wp_lms_complete_percent">' . _e("Percent Complete", 'memberium') . ':</label><br />';
 m4is_wr40w::m4is_jtbkc('_is4wp_lms_complete_percent', $m4is_lja67, $m4is_yp4wn, $m4is_k4yeul);
 echo '<br>';
 } } } private 
function m4is__7q1( $m4is_hadwb ) { $m4is_kzkrv1 = m4is_tvc2xn::m4is__r78so();
 $m4is_wov2 = '';
 if (! empty( $m4is_kzkrv1 ) ) { $m4is_wov2 = '<option value="0">(No Actions)</option>';
 foreach ( $m4is_kzkrv1 as $m4is_rrny => $m4is_inxo ) { $m4is_xnwj4 = $m4is_hadwb == $m4is_rrny ? ' selected="selected" ' : '';
 $m4is_wov2 .= "<option value='{$m4is_rrny}' {$m4is_xnwj4}>{$m4is_inxo}</option>";
 } } return $m4is_wov2;
 } private 
function m4is_ht5q() { return [ '_is4wp_learndash_actions', '_is4wp_learndash_autoenroll', '_is4wp_learndash_fail_actions', '_is4wp_learndash_fail_goals', '_is4wp_learndash_fail_tags', '_is4wp_learndash_goals', '_is4wp_learndash_tags', '_is4wp_lms_complete_percent', '_is4wp_lms_start_date', ];
 } private 
function m4is_of01c_() { return [ 'lp_course', 'lp_lesson', 'lp_quiz' ];
 } }

