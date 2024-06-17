<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is__dhu0 { private $core = null;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_ww61so();
 }  private 
function m4is_ww61so() { add_action( 'admin_init', [$this, 'm4is_hmjdrt'] );
 add_action( 'edit_form_after_title', [$this, 'm4is_w5ql'], 10, 1 );
 add_action( 'manage_posts_custom_column', [$this, 'm4is_t1am'], 10, 2 );
 add_filter( 'manage_posts_columns', [$this, 'm4is_vg_i95'] );
 add_filter( 'memberium/modules/active/names', [$this, 'm4is__q42k'], 10, 1 );
 add_filter( 'memberium/wpadmin/allow', [$this, 'm4is_v3n8kw'] );
 } 
function m4is_vg_i95( $m4is_yonf3 ) { $m4is_a_hn = isset( $_GET['post_type'] ) ? $_GET['post_type'] : 'post';
 $m4is_jw_97 = [];
 $m4is_jklcdy = [];
 if ( $m4is_a_hn == 'groups' ) { $m4is_jw_97['autojoin'] = 'AutoJoin Tag';
 } elseif ( $m4is_a_hn == 'sfwd-courses' ) { $m4is_jw_97['autoenroll'] = 'AutoEnroll Tag';
 } elseif ( $m4is_a_hn == 'sfwd-lessons' ) { } elseif ( $m4is_a_hn == 'sfwd-quiz' ) { } elseif ( $m4is_a_hn == 'sfwd-topic' ) { } $m4is_yonf3 = array_merge( $m4is_yonf3, $m4is_jw_97 );
 foreach ( $m4is_jklcdy as $m4is_s2ge5 ) { unset( $m4is_yonf3[$m4is_s2ge5] );
 } return $m4is_yonf3;
 } 
function m4is_t1am( $m4is_ef9wx, $m4is_cd8k ) { if ( $m4is_ef9wx == 'autojoin' ) { $m4is_etj2 = array_filter( explode( ',', trim( get_post_meta( $m4is_cd8k, '_is4wp_learndash_autojoin', true ), ', ' ) ) );
 echo implode( ', ', $m4is_etj2 );
 } elseif ( $m4is_ef9wx == 'autoenroll' ) { $m4is_etj2 = array_filter( explode( ',', trim( get_post_meta( $m4is_cd8k, '_is4wp_learndash_autoenroll', true ), ', ' ) ) );
 echo implode( ', ', $m4is_etj2 );
 } }  
function m4is__q42k($m4is_r1g2u = []) { return array_merge($m4is_r1g2u, ['LearnDash for Memberium']);
 }  
function m4is_hmjdrt() { $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
 $m4is_pex9 = $this->m4is_kxub8();
 if ( in_array( $m4is_a_hn, $m4is_pex9 ) || substr( $m4is_a_hn, 0, 5 ) == 'sfwd-' ) { add_meta_box( 'is4wp-learndash-actions', 'LearnDash Memberium Integration', [$this, 'm4is_j62e'], $m4is_a_hn, 'side' );
 } add_action( 'save_post', [$this, 'm4is_oyzekc'] );
 }  
function m4is_kxub8() { return [ 'groups', 'sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'sfwd-quiz', 'sfwd-certificates', ];
 }  
function m4is_j62e() { global $post;
 $m4is_p51e_l = [];
 $m4is_m9ltod = get_post_meta( $post->ID );
 $m4is_lja67 = [  '_is4wp_learndash_actions', '_is4wp_learndash_assignment_approved_actions', '_is4wp_learndash_assignment_approved_tags', '_is4wp_learndash_assignment_upload_actions', '_is4wp_learndash_assignment_upload_tags', '_is4wp_learndash_autoenroll', '_is4wp_learndash_autojoin', '_is4wp_learndash_badges', '_is4wp_learndash_fail_actions', '_is4wp_learndash_fail_goals', '_is4wp_learndash_fail_tags', '_is4wp_learndash_goals', '_is4wp_learndash_orientation', '_is4wp_learndash_pdfformat', '_is4wp_learndash_redirect', '_is4wp_learndash_shortcodes', '_is4wp_learndash_tags', '_is4wp_learndash_drip_feed_override', ];
 foreach( $m4is_lja67 as $m4is_s2ge5 ) { if ( isset( $m4is_m9ltod[$m4is_s2ge5][0] ) ) { $m4is_p51e_l[$m4is_s2ge5] = $m4is_m9ltod[$m4is_s2ge5][0];
 } else { $m4is_p51e_l[$m4is_s2ge5] = '';
 } } unset( $metas, $m4is_lja67, $m4is_s2ge5 );
 wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), "memberium_membershipaccess_nonce_{$post->ID}");
 if ( $post->post_type == 'sfwd-certificates' ) { echo '<p>Certificate PDF Format</p>';
 echo '<label for="_is4wp_learndash_pdfformat">' . _e( "Page Size", 'memberium' ) . ':</label> ';
 echo '<select name="_is4wp_learndash_pdfformat" id="_is4wp_learndash_pdfformat">';
 $m4is_a5lq = [ '' => 'Default', 'A4_EXTRA' => 'A4 Extra', 'A4_LONG' => 'A4 Long', 'A4_SUPER' => 'A4 Super', 'A4' => 'A4', 'GOVERNMENTLETTER' => 'Government Letter', 'LETTER' => 'US Letter', 'PA4' => 'PA4', 'RA4' => 'RA4', 'SRA4' => 'SRA4', 'SUPER_A4' => 'Super A4', ];
 foreach( $m4is_a5lq as $m4is_n0aw => $m4is_t5ot4 ) { echo '<option value="', $m4is_n0aw, '" ', ( $m4is_p51e_l['learndash_pdfformat'] == $m4is_n0aw ? ' selected="selected" ' : '' ) , '>', $m4is_t5ot4, '</option>';
 } unset( $m4is_n0aw, $m4is_t5ot4 );
 echo '</select><br /><br />';
 echo '<label for="_is4wp_learndash_orientation">' . _e( "Page Orientation", 'memberium' ) . ':</label> ';
 echo '<select name="_is4wp_learndash_orientation" id="_is4wp_learndash_orientation">';
 $m4is_a5lq = [ '' => 'Automatic', 'L' => 'Landscape', 'P' => 'Portrait', ];
 foreach( $m4is_a5lq as $m4is_n0aw => $m4is_t5ot4 ) { echo '<option value="', $m4is_n0aw, '" ', ( $m4is_p51e_l['learndash_orientation'] == $m4is_n0aw ? ' selected="selected" ' : '' ) , '>', $m4is_t5ot4, '</option>';
 } echo '</select><br /><br />';
 } $m4is_mjw9i6 = [ 'sfwd-courses', 'sfwd-lessons', 'sfwd-quiz', 'sfwd-topic', ];
 if ( in_array( $post->post_type, $m4is_mjw9i6 ) ) {  if ( in_array( $post->post_type, ['sfwd-courses']) ) { echo '<label for="_is4wp_learndash_autoenroll">', _e( "AutoEnroll Tags", 'memberium' ), ':</label> ';
 echo '<input name="_is4wp_learndash_autoenroll" class="multitaglist " style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_autoenroll'] > '' ? $m4is_p51e_l['_is4wp_learndash_autoenroll'] : '' ), '"><br /><br />';
 }  echo '<p>On completion of this section, execute the following actions:</p>';
 echo '<label for="_is4wp_learndash_goals">' . _e( "Achieve these Goals", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_learndash_goals" style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_goals'] > '' ? $m4is_p51e_l['_is4wp_learndash_goals'] : '' ), '"><br /><br />';
 echo '<label for="_is4wp_learndash_tags">' . _e( "Apply these Tags", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_learndash_tags" class="multitaglist " style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_tags'] > '' ? $m4is_p51e_l['_is4wp_learndash_tags'] : '' ), '"><br /><br />';
 echo '<label for="_is4wp_learndash_actions">' . _e( "Run this Actionset", 'memberium' ) . ':</label> ';
 echo '<select class="actionset-selector" name="_is4wp_learndash_actions" style="width:100%; max-width:100%">';
 echo '<option value="0">(No Actions)</option>';
 $m4is_kzkrv1 = m4is_tvc2xn::m4is__r78so();
 foreach ( $m4is_kzkrv1 as $m4is_rrny=>$m4is_inxo ) { echo '<option value="', $m4is_rrny, '" ', ( $m4is_p51e_l['_is4wp_learndash_actions'] == $m4is_rrny ? ' selected="selected" ' : '' ) , '>', $m4is_inxo, '</option>';
 } unset( $m4is_rrny, $m4is_inxo );
 echo '</select>';
 echo '<br /><br />';
 if ( $post->post_type == 'sfwd-quiz' ) { echo '<p>If the student <strong style="color:red;">fails</strong> this test, execute the following actions:</p>';
 echo '<label for="_is4wp_learndash_fail_goals">' . _e( "Achieve these Goals", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_learndash_fail_goals" style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_fail_goals'] > '' ? $m4is_p51e_l['_is4wp_learndash_fail_goals'] : '' ), '"><br /><br />';
 echo '<label for="_is4wp_learndash_fail_tags">' . _e( "Apply these Tags", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_learndash_fail_tags" class="multitaglist" style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_fail_tags'] > '' ? $m4is_p51e_l['_is4wp_learndash_fail_tags'] : '' ), '"><br /><br />';
 echo '<label for="_is4wp_learndash_fail_actions">' . _e( "Run this Actionset", 'memberium' ) . ':</label> ';
 echo '<select class="actionset-selector" name="_is4wp_learndash_fail_actions" style="width:100%; max-width:100%">';
 echo '<option value="0">(No Actions)</option>';
 foreach ( $m4is_kzkrv1 as $m4is_rrny=>$m4is_inxo ) { echo '<option value="', $m4is_rrny, '" ', ( $m4is_p51e_l['_is4wp_learndash_fail_actions'] == $m4is_rrny ? ' selected="selected" ' : '' ) , '>', $m4is_inxo, '</option>';
 } echo '</select>';
 } unset( $m4is_kzkrv1, $m4is_rrny, $m4is_inxo );
  if ( in_array( $post->post_type, ['sfwd-courses']) ) { echo '<label for="_is4wp_learndash_drip_feed_override">', _e( "Drip Feed override", 'memberium' ), ':</label> ';
 echo '<input name="_is4wp_learndash_drip_feed_override" class="have-not-have-tag-selector" style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_drip_feed_override'] > '' ? $m4is_p51e_l['_is4wp_learndash_drip_feed_override'] : '' ), '"><br /><br />';
 echo '<p>Tag access check will override the Lesson Release Schedule settings for Enrollment Days or Specific Date on all Lessons in this course.</p>';
 }  if ( in_array( $post->post_type, ['sfwd-courses']) ) { echo '<label for="_is4wp_learndash_redirect">' . _e( "Redirect to", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_learndash_redirect" style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_learndash_redirect'] > '' ? $m4is_p51e_l['_is4wp_learndash_redirect'] : '' ), '"><br /><br />';
 } } if ( $post->post_type == 'groups' ) { $m4is_jfp6 = empty( $m4is_p51e_l['_is4wp_learndash_autojoin'] )? '' : trim( $m4is_p51e_l['_is4wp_learndash_autojoin'], ', ');
 echo '<label for="_is4wp_learndash_autojoin">' . _e( "Group Auto-Join Tags", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_learndash_autojoin" class="multitaglist" style="width:100%; max-width:100%" value="', $m4is_jfp6, '"><br /><br />';
 } add_action( 'admin_footer', [ m4is_q1zh2::get_instance(), 'm4is_lf31a4'] );
 }  
function m4is_o7as8o() { }  
function m4is_oyzekc($m4is_cd8k) {  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return;
 }  if ( empty( $_POST["memberium_membershipaccess_nonce_{$m4is_cd8k}"] ) || ! wp_verify_nonce( $_POST["memberium_membershipaccess_nonce_{$m4is_cd8k}"], m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb() ) ) { return;
 } if ( ! current_user_can('edit_posts', $m4is_cd8k) ) { return;
 } $m4is_lja67 = [ '_is4wp_learndash_achievement', '_is4wp_learndash_actions', '_is4wp_learndash_assignment_approved_actions', '_is4wp_learndash_assignment_approved_tags', '_is4wp_learndash_assignment_upload_actions', '_is4wp_learndash_assignment_upload_tags', '_is4wp_learndash_autoenroll', '_is4wp_learndash_autojoin', '_is4wp_learndash_badges', '_is4wp_learndash_fail_actions', '_is4wp_learndash_fail_goals', '_is4wp_learndash_fail_tags', '_is4wp_learndash_goals', '_is4wp_learndash_orientation', '_is4wp_learndash_pdfformat', '_is4wp_learndash_redirect', '_is4wp_learndash_shortcodes', '_is4wp_learndash_tags', '_is4wp_learndash_drip_feed_override', '_is4wp_lms_complete_percent', '_is4wp_lms_completed', '_is4wp_lms_grade', '_is4wp_lms_start_date', ];
 foreach( $m4is_lja67 as $m4is_s2ge5 ) { $_POST[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? $_POST[$m4is_s2ge5] : '';
 if (empty($_POST[$m4is_s2ge5])) { delete_post_meta($m4is_cd8k, $m4is_s2ge5);
 } else { add_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5], true ) or update_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5] );
 } } }  
function m4is_v3n8kw($m4is_sbxo) { if (! $m4is_sbxo) { $m4is_ehx5 = [ 'learndash_propanel_template', 'ld-report-download', ];
 foreach($m4is_ehx5 as $m4is_cvpon3) { $m4is_sbxo = array_key_exists($m4is_cvpon3, $_GET);
 if ($m4is_sbxo) { break;
 } } } return $m4is_sbxo;
 }  
function m4is_w5ql( $m4is_c2ah ) { if (! empty($m4is_c2ah->post_type) && $m4is_c2ah->post_type == 'sfwd-courses') { $m4is_h7ayn = ('open' == learndash_get_course_meta_setting($m4is_c2ah->ID, 'course_price_type') );
 if ($m4is_h7ayn) { $m4is_rlp0 = '<a target="_blank" href="https://memberium.com/?p=7948">Click here</a> for more information.';
 echo '<div style="background-color:white;border-radius:10px;border-style:solid;border-color:darkred;padding:10px;">';
 echo '<p><strong>Warning:</strong></p>';
 echo '<p>Because your course is marked as "open", all site members will be enrolled in it regardless of tags or memberships.</p>';
 echo '<p>We recommend setting your course as "closed".</p>';
 echo "<p>{$m4is_rlp0}</p>";
 echo '</div>';
 } } } }

