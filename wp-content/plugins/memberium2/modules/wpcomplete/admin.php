<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_wn8xoj { 
function m4is_wpy63() { global $post;
 $m4is_p51e_l = [];
 $m4is_m9ltod = get_post_meta($post->ID);
 $m4is_lja67 = [ '_is4wp_wpcomplete_tags', '_is4wp_wpcomplete_badges', ];
 foreach( $m4is_lja67 as $m4is_s2ge5 ) { if ( isset( $m4is_m9ltod[$m4is_s2ge5][0] ) ) { $m4is_p51e_l[$m4is_s2ge5] = $m4is_m9ltod[$m4is_s2ge5][0];
 } else { $m4is_p51e_l[$m4is_s2ge5] = '';
 } } unset($metas, $m4is_lja67, $m4is_s2ge5);
 wp_nonce_field( m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb(), "memberium_wpcomplete_nonce_{$post->ID}");
 echo '<label for="_is4wp_wpcomplete_tags">' . _e( "Apply these Tags", 'memberium' ) . ':</label> ';
 echo '<input name="_is4wp_wpcomplete_tags" class="multitaglist" style="width:100%; max-width:100%" value="', ( $m4is_p51e_l['_is4wp_wpcomplete_tags'] > '' ? $m4is_p51e_l['_is4wp_wpcomplete_tags'] : '' ), '"><br /><br />';
 } 
function m4is_nunao($m4is_cd8k) {  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return;
 }  if ( empty( $_POST["memberium_wpcomplete_nonce_{$m4is_cd8k}"] ) || ! wp_verify_nonce( $_POST["memberium_wpcomplete_nonce_{$m4is_cd8k}"], m4is_pms8y::m4is_e5l8a9()->m4is_wdqrsb() ) ) { return;
 } if ( ! current_user_can('edit_posts', $m4is_cd8k) ) { return;
 } $m4is_lja67 = [ '_is4wp_wpcomplete_tags', ];
 foreach( $m4is_lja67 as $m4is_s2ge5 ) { $_POST[$m4is_s2ge5] = isset( $_POST[$m4is_s2ge5] ) ? $_POST[$m4is_s2ge5] : '';
 if (empty($_POST[$m4is_s2ge5])) { delete_post_meta($m4is_cd8k, $m4is_s2ge5);
 } else { add_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5], true ) or update_post_meta( $m4is_cd8k, $m4is_s2ge5, $_POST[$m4is_s2ge5] );
 } } } 
function m4is_zx7wp($m4is_cd8k) { return ! empty(get_post_meta($m4is_cd8k, 'wpcomplete', true) );
 } 
function m4is_hmjdrt() { $m4is_a_hn = m4is_q1zh2::get_instance()->m4is_xdun();
 add_meta_box('is4wp-wpcomplete-actions', 'WPComplete Memberium Integration', [$this, 'm4is_wpy63'], $m4is_a_hn, 'side');
 add_action('save_post', [$this, 'm4is_nunao']);
 } private 
function m4is_b_5yli() { if (defined('WPCOMPLETE_IS_ACTIVATED') && WPCOMPLETE_IS_ACTIVATED == false) { $m4is_tyisr = array_filter(explode(',', get_option('wpcomplete_post_type', '') ) );
 $m4is_jr9e = get_post_types();
 $m4is_r_03q = ['attachment'];
 foreach($m4is_jr9e as $m4is_qius79) { if (! in_array($m4is_qius79, $m4is_r_03q) ) { if (! in_array($m4is_qius79, $m4is_tyisr) ) { $m4is_bmhi = get_post_type_object($m4is_qius79);
 if ($m4is_bmhi->public) { $m4is_tyisr[] = $m4is_qius79;
 } } } } if (! empty($m4is_tyisr) ) { $m4is_tyisr = implode(',', $m4is_tyisr);
 update_option('wpcomplete_post_type', $m4is_tyisr, false);
 } } } private 
function m4is_ww61so() { add_action('admin_init', [$this, 'm4is_hmjdrt']);
 } private 
function __construct() { $this->m4is_b_5yli();
 $this->m4is_ww61so();
 } static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } }

