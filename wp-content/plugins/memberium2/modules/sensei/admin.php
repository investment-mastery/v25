<?php
 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_ge37ga { private $m4is_n3zlk;
  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $m4is_n3zlk = 'memberium';
  $this->m4is_ww61so();
 }  private 
function m4is_ww61so() { add_action( 'admin_init', [$this, 'm4is_s_xr5'] );
 }  private 
function m4is_ht5q() { return [ '_is4wp_learndash_actions', '_is4wp_learndash_autoenroll', '_is4wp_learndash_autojoin', '_is4wp_learndash_goals', '_is4wp_learndash_redirect', '_is4wp_learndash_shortcodes', '_is4wp_learndash_tags', '_is4wp_lms_complete_percent', '_is4wp_lms_completed', '_is4wp_lms_grade', '_is4wp_lms_start_date', ];
 }  private 
function m4is_of01c_() { return [ 'course', 'lesson', ];
 }  
function m4is_s_xr5() {  $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
  if ( in_array( $m4is_a_hn, $this->m4is_of01c_() ) ) { add_meta_box( 'is4wp-sensei-actions', 'Sensei Memberium Integration', [$this, 'm4is_e93g7e'], $m4is_a_hn, 'side' );
 }  add_action( 'save_post', [$this, 'm4is_arwt'], 10, 3 );
 }  
function m4is_e93g7e() { global $post;
 $m4is_mjw9i6 = $this->m4is_of01c_();
 if ( in_array( $post->post_type, $m4is_mjw9i6 ) ) { $m4is_ws29 = "memberium_sensei_actions_nonce_{$post->ID}";
 wp_nonce_field( MEMBERIUM_SKU, $m4is_ws29 );
 $m4is_m9ltod = get_post_meta( $post->ID );
 $m4is_p51e_l = [];
 $m4is_lja67 = $this->m4is_ht5q();
 $m4is_kzkrv1 = m4is_tvc2xn::m4is__r78so();
 foreach( $m4is_lja67 as $m4is_s2ge5 ) { $m4is_p51e_l[$m4is_s2ge5] = isset( $m4is_m9ltod[$m4is_s2ge5][0]) ? $m4is_m9ltod[$m4is_s2ge5][0] : '';
 } if ( $post->post_type == 'course' ) { $m4is_unc_q = __( "AutoEnroll Tags", 'memberium' );
 $m4is_w_o7al = $m4is_p51e_l['_is4wp_learndash_autoenroll'] > '' ? $m4is_p51e_l['_is4wp_learndash_autoenroll'] : '';
 echo <<<HTMLBLOCK
					<label for="_is4wp_learndash_autoenroll">{$m4is_unc_q}:</label>
					<input name="_is4wp_learndash_autoenroll" class="multitaglist" style="width:100%; max-width:100%" value="{$m4is_w_o7al}"><br /><br />
				HTMLBLOCK;
 } $m4is_f6gq = $m4is_p51e_l['_is4wp_learndash_tags'] > '' ? $m4is_p51e_l['_is4wp_learndash_tags'] : '';
 $m4is__tlsnp = $m4is_p51e_l['_is4wp_learndash_goals'] > '' ? $m4is_p51e_l['_is4wp_learndash_goals'] : '';
 $m4is_a5lm63 = __( "Apply these Tags", $this->m4is_n3zlk );
 $m4is_nql2gi = __( "Run this Actionsets", $this->m4is_n3zlk );
 $m4is__bx1z9 = __( "Achieve these Goals", $this->m4is_n3zlk );
 $m4is_j_9byj = '';
 foreach ($m4is_kzkrv1 as $m4is_rrny=>$m4is_inxo) { $selected = $m4is_p51e_l['_is4wp_learndash_actions'] == $m4is_rrny ? ' selected="selected" ' : '';
 $m4is_j_9byj .= "<option value='{$m4is_rrny}'{$selected}>{$m4is_inxo}</option>";
 } echo <<<HTMLBLOCK
				<p>On completion of this section, execute the following actions:</p>

				<label for="_is4wp_learndash_tags">{$m4is_a5lm63}:</label>
				<input name="_is4wp_learndash_tags" class="multitaglist" style="width:100%; max-width:100%" value="{$m4is_f6gq}"><br /><br />

				<label for="_is4wp_learndash_actions">{$m4is_nql2gi}:</label>
				<select class="actionset-selector" name="_is4wp_learndash_actions" style="width:100%; max-width:100%">
				<option value="0">(No Actions)</option>
				{$m4is_j_9byj}
				</select>

				<label for="_is4wp_learndash_goals">{$m4is__bx1z9}:</label>
				<input name="_is4wp_learndash_goals" style="width:100%; max-width:100%" value="{$m4is__tlsnp}"><br /><br />

				<hr />
			HTMLBLOCK;
 $m4is_lja67 = ['' => '(None)'];
 $m4is_w_8g = m4is_ho3l::m4is_kjedy2( 'contact', true );
 foreach( $m4is_w_8g as $m4is_g1ru50 ) { $m4is_lja67[$m4is_g1ru50] = $m4is_g1ru50;
 } $m4is_k4yeul = [ 'class' => 'actionset-selected', 'style' => 'width:250px;', 'echo' => false, ];
 if ($post->post_type == 'course') { $m4is_zz2n30 = isset( $m4is_p51e_l['_is4wp_lms_start_date'] ) ? $m4is_p51e_l['_is4wp_lms_start_date'] : '';
 $m4is_s8caxv = isset( $m4is_p51e_l['_is4wp_lms_complete_percent'] ) ? $m4is_p51e_l['_is4wp_lms_complete_percent'] : '';
 $start_date_label = __( 'Start Date Field', $this->m4is_n3zlk );
 $percent_complete_label = __( "Percent Complete", $this->m4is_n3zlk );
 $m4is_si7m = m4is_wr40w::m4is_jtbkc( '_is4wp_lms_start_date', $m4is_lja67, $m4is_zz2n30, $m4is_k4yeul );
 $m4is_rjsz = m4is_wr40w::m4is_jtbkc( '_is4wp_lms_complete_percent', $m4is_lja67, $m4is_s8caxv, $m4is_k4yeul );
 echo <<<HTMLBLOCK
					<label for="_is4wp_lms_start_date">{$start_date_label}:</label><br />
					{$m4is_si7m}<br />
					<label for="_is4wp_lms_complete_percent">{$percent_complete_label}:</label><br />
					{$m4is_rjsz}<br />
				HTMLBLOCK;
 } if ($post->post_type == 'lesson') { $m4is_n9xs = isset( $m4is_p51e_l['_is4wp_lms_grade'] ) ? $m4is_p51e_l['_is4wp_lms_grade'] : '';
 $m4is_dwf_z = isset($m4is_p51e_l['_is4wp_lms_completed']) ? $m4is_p51e_l['_is4wp_lms_completed'] : '';
 $m4is_k5ludo = __( " Grade", $this->m4is_n3zlk );
 $m4is_jy9uc = __( "Quiz Passed", $this->m4is_n3zlk );
 $m4is_gd69z = m4is_wr40w::m4is_jtbkc( '_is4wp_lms_grade', $m4is_lja67, $m4is_n9xs, $m4is_k4yeul );
 $m4is_gym39q = m4is_wr40w::m4is_jtbkc( '_is4wp_lms_completed', $m4is_lja67, $m4is_dwf_z, $m4is_k4yeul );
 $m4is_tjg_9 = <<<HTMLBLOCK
				<label for="_is4wp_lms_grade">{$m4is_k5ludo}:</label><br />
				{$m4is_gd69z}
				<br>
				<label for="_is4wp_lms_completed">{$m4is_jy9uc}:</label><br />
				{$m4is_gym39q}
				<br>
				HTMLBLOCK;
 echo $m4is_tjg_9;
 } echo '<hr />';
 } }  
function m4is_arwt( $m4is_cd8k, $m4is_c2ah, $m4is_wlqsgr ) {  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return;
 } $m4is_ws29 = "memberium_sensei_actions_nonce_{$m4is_cd8k}";
  if ( empty( $_POST[$m4is_ws29]) || ! wp_verify_nonce( $_POST[$m4is_ws29], MEMBERIUM_SKU ) ) { return;
 }  if ( ! current_user_can( 'edit_posts', $m4is_cd8k ) ) { return;
 }  $m4is_flx71n = $this->m4is_ht5q();
  foreach( $m4is_flx71n as $m4is_s2ge5 ) {  if ( isset( $_POST[$m4is_s2ge5] ) ) {  if ( empty( $_POST[$m4is_s2ge5] ) ) { delete_post_meta($m4is_cd8k, $m4is_s2ge5);
 }  else { update_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5] );
 } } } }  }

