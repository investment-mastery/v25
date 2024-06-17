<?php
 class_exists( 'm4is_pms8y' ) || die();
 final 
class m4is_dule { private $m4is_bnd6ti;
 static 
function m4is_e5l8a9() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->m4is_ww61so();
 $this->m4is_jq0ld();
 }  private 
function m4is_ju94() : void { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 }  private 
function m4is_ww61so() : void {  add_action('wpcw_user_completed_unit', [$this, 'm4is_o_3lr'], 10, 3);
 add_action('wpcw_user_completed_module', [$this, 'm4is_ih6e2'], 10, 3);
 add_action('wpcw_user_completed_course', [$this, 'm4is_zz4na'], 10, 3);
  add_action('memberium/session/updated', [$this, 'm4is_aezl8'], 10, 2);
  add_filter('memberium/lms/module_post_types', [$this, 'm4is_uh_ws6']);
  add_filter('memberium/lms/name', [$this, 'm4is_ivhe24']);
 }  private 
function m4is_jq0ld() : void { if ( is_admin() ) { include __DIR__ . '/admin.php';
 m4is_y29s08::m4is_e5l8a9();
 } }     
function m4is_ivhe24( $m4is_t5ot4 ) : string { return 'WP-Courseware';
 }  
function m4is_uh_ws6( $m4is_qtapuz = [] ) : array { return array_merge( $m4is_qtapuz, [ 'course_unit', ]);
 }     
function m4is_ih6e2( $m4is_ig9p6, $m4is_il9b0, $m4is_ht26 ) : void { $m4is_wws9t = $m4is_ht26->module_id;
 $m4is_ak30 = get_option( 'memberium_wpcw', [] );
 if ( isset( $m4is_ak30['modules']['completion_tag'][$m4is_wws9t] ) ) { $m4is_iystd2 = $m4is_ak30['modules']['completion_tag'][$m4is_wws9t];
 if ( ! empty( $m4is_iystd2 ) ) { $this->m4is_bnd6ti->m4is_tcle75($m4is_iystd2);
 } } do_action('memberium/lms/completion', $m4is_ig9p6, $m4is_il9b0);
 }  
function m4is_o_3lr( $m4is_ig9p6, $m4is_il9b0, $m4is_ht26 ) { $m4is_iystd2 = get_post_meta( $m4is_il9b0, '_is4wp_wpcw_completion_tag', true );
 if ( $m4is_iystd2 ) { $this->m4is_bnd6ti->m4is_tcle75( $m4is_iystd2 );
 } do_action( 'memberium/lms/completion', $m4is_ig9p6, $m4is_il9b0 );
 }  
function m4is_zz4na( $m4is_ig9p6, $m4is_il9b0, $m4is_ht26 ) { $m4is_nsnp = $m4is_ht26->course_id;
 $m4is_ak30 = get_option( 'memberium_wpcw', [] );
 if ( isset( $m4is_ak30['courses']['completion_tag'][$m4is_nsnp] ) ) { $m4is_iystd2 = $m4is_ak30['courses']['completion_tag'][$m4is_nsnp];
 if ( ! empty( $m4is_iystd2 ) ) { $this->m4is_bnd6ti->m4is_tcle75( $m4is_iystd2 );
 } } do_action( 'memberium/lms/completion', $m4is_ig9p6, $m4is_il9b0 );
 }  
function m4is_aezl8( $m4is_ig9p6, $m4is_mdqgk ) { if ( ! function_exists( 'WPCW_courses_syncUserAccess' ) ) { return;
 } $m4is_sbnl_v = get_option( 'memberium_wpcw', [] );
 $m4is_sbnl_v = isset( $m4is_sbnl_v['courses']['access_tags'] ) ? $m4is_sbnl_v['courses']['access_tags'] : [];
 $m4is_tvlzq = WPCW_users_getUserCourseList( $m4is_ig9p6 );
 $m4is_g3cyo = [];
  foreach( $m4is_tvlzq as $m4is_ouqlyk ) { $m4is_nsnp = $m4is_ouqlyk->course_id;
 $m4is_svmlz = isset( $m4is_sbnl_v[$m4is_nsnp] ) ? $m4is_sbnl_v[$m4is_nsnp] : '';
 if ( $m4is_ouqlyk->course_opt_user_access == 'default_show' ) { $m4is_g3cyo[] = $m4is_nsnp;
 } elseif ( ! empty( $m4is_svmlz ) ) { if ( $this->m4is_bnd6ti->m4is_sjmzx( $m4is_svmlz, $m4is_mdqgk ) ) { $m4is_g3cyo[] = $m4is_nsnp;
 } } } foreach( $m4is_sbnl_v as $m4is_nsnp => $m4is_svmlz ) { if ( $this->m4is_bnd6ti->m4is_sjmzx( $m4is_svmlz, $m4is_mdqgk ) ) { $m4is_g3cyo[] = $m4is_nsnp;
 } }  $m4is_g3cyo = array_unique( $m4is_g3cyo );
 WPCW_courses_syncUserAccess( $m4is_ig9p6, $m4is_g3cyo, 'sync' );
 } }

