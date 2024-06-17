<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_fabm4 {  private $m4is_p9r_8e = [];
 private $m4is_a5gte = [];
 private $m4is_e2kg = 0;
 private $m4is_yh5y = false;
 private $m4is_q5pwc = 0;
 private $m4is_sow6df = [];
 private $m4is_t6r3xw = [];
 private $m4is_ydo2qh = [];
 private $m4is_q8vgfd = '';
 private $m4is_pjkx2b = 0;
 private $m4is__xn_jt = [];
  private $m4is_toxy6c = 0;
 private $m4is__lqeht = '';
 private $m4is_m5a6_ = 0;
 private $m4is_bagrze = '';
 private $m4is_d45fw = 0;
 private $m4is_gt1oi = '';
 private $m4is_ep5bx = 0;
 private $m4is_yvy8 = [];
 private $m4is_b7ao5t = [];
 private $xyzzy = null;
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = []) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw, array $m4is_c2ah ) { ini_set( 'display_errors', 1 );
 $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 $this->m4is_gbqd0( $m4is_t6r3xw, $m4is_c2ah );
 $this->m4is_ynpw();
 $this->m4is_my9o();
 $this->m4is_pmz7();
 $this->m4is_h2tl();
 } 
function __destruct() { m4is_pms8y::m4is_e5l8a9()->m4is_q285('send_http_post');
 $m4is_olnv = microtime( true ) - $this->m4is_pjkx2b;
 $m4is_wbgl5s = sprintf( "Completed Scan Subscriptions HTTP POST.  Processing time: %0.3f seconds\n", $m4is_olnv );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 $this->m4is_ydo2qh = array_filter( $this->m4is_ydo2qh );
 if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { echo $m4is_wbgl5s;
 } } private 
function m4is_gbqd0( array $m4is_t6r3xw, array $m4is_c2ah ) { $this->m4is_pjkx2b = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 $this->m4is_a5gte = m4is_ho3l::m4is_kjedy2( 'Contact', true );
 $this->m4is_zq0k = m4is_pms8y::m4is_e5l8a9()->m4is_d14zr( 'appname' );
 ksort( $this->m4is_c2ah );
 } private 
function m4is_ynpw() { $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : $this->m4is_e2kg;
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['debug'], false ) : false;
 $this->m4is_toxy6c = isset( $this->m4is_t6r3xw['aactionset'] ) ? (int) $this->m4is_t6r3xw['aactionset'] : 0;
 $this->m4is__lqeht = isset( $this->m4is_t6r3xw['agoal'] ) ? trim( $this->m4is_t6r3xw['agoal'] ) : '';
 $this->m4is_m5a6_ = isset( $this->m4is_t6r3xw['atagid'] ) ? (int) $this->m4is_t6r3xw['atagid'] : 0;
 $this->m4is_d45fw = isset( $this->m4is_t6r3xw['iactionset'] ) ? (int) $this->m4is_t6r3xw['iactionset'] : 0;
 $this->m4is_gt1oi = isset( $this->m4is_t6r3xw['igoal'] ) ? trim( $this->m4is_t6r3xw['igoal'] ) : '';
 $this->m4is_ep5bx = isset( $this->m4is_t6r3xw['itagid'] ) ? (int) $this->m4is_t6r3xw['itagid'] : 0;
 $this->m4is_b7ao5t = isset( $this->m4is_t6r3xw['subscriptionplans']) ? array_filter( explode( ',', $this->m4is_t6r3xw['subscriptionplans'] ) ) : [];
 $this->m4is_p4izs = empty( $this->m4is_t6r3xw['destfield'] ) ? [] : array_filter( explode( ',', $this->m4is_t6r3xw['destfield'] ) );
 $this->m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $this->m4is_e2kg, 'httppost', 'Scan Subscriptions' );
 $this->m4is_ydo2qh[] = sprintf( 'Subscription Types = ', implode( ',', $this->m4is_b7ao5t ) );
 if ( $this->m4is_yh5y ) { $m4is_ks1fj2 = "%s - %s = %s\n";
 echo "Begin Scan Subscriptions\n";
 printf( $m4is_ks1fj2, __LINE__, 'Contact ID', $this->m4is_e2kg );
 printf( $m4is_ks1fj2, __LINE__, 'Subscription Types', implode( ', ', $this->m4is_b7ao5t ) );
 printf( $m4is_ks1fj2, __LINE__, 'Active Actionset', $this->m4is_toxy6c );
 printf( $m4is_ks1fj2, __LINE__, 'Active Goal', $this->m4is__lqeht );
 printf( $m4is_ks1fj2, __LINE__, 'Active Tag', $this->m4is_m5a6_ );
 printf( $m4is_ks1fj2, __LINE__, 'Inactive Actionset', $this->m4is_d45fw );
 printf( $m4is_ks1fj2, __LINE__, 'Inactive Goal', $this->m4is_gt1oi );
 printf( $m4is_ks1fj2, __LINE__, 'Inactive Tag', $this->m4is_ep5bx );
 } } private 
function m4is_my9o() { $m4is_p6_h = [];
 $m4is_e6y2v = [];
 if ( ! $this->m4is_e2kg ) { $m4is_p6_h[] = 'Error:  Invalid Keap contact ID';
 } foreach( $this->m4is_p4izs as $m4is_s2ge5 => $m4is_yxwn ) { if ( ! in_array( $m4is_yxwn, $this->m4is_a5gte ) ) { $m4is_e6y2v[] = sprintf( "Warning: %s is not a valid target field.", $m4is_yxwn );
 unset( $this->m4is_p4izs[$m4is_s2ge5] );
 } } if ( empty( $this->m4is_p4izs ) ) { $m4is_p6_h[] = "Error: No valid target fields provided.";
 } if ( ! empty( $m4is_p6_h ) ) { if ( $this->m4is_yh5y ) { echo implode( "\n", array_merge( $m4is_p6_h, $m4is_e6y2v ) ), "\n";
 printf( "%d - Finished MakePass at %s\n", __LINE__, microtime( true ) );
 } $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 exit;
 } } private 
function m4is_pmz7() { $m4is__u5v = [ 'BillingCycle', 'EndDate', 'Frequency', 'Id', 'LastBillDate', 'NextBillDate', 'PaidThruDate', 'StartDate', 'Status', 'SubscriptionPlanId' ];
 $m4is_jo8fb = [ 'contactId' => $this->m4is_e2kg ];
 $this->m4is_yvy8 = m4is_ho3l::m4is_mg4uyc( 'RecurringOrder', 1000, 0, $m4is_jo8fb, $m4is__u5v );
 if ( ! is_array( $this->m4is_yvy8 ) ) { $this->m4is_ydo2qh[] = sprintf( 'Error:  Unable to retrieve recurring orders for contact %d', $this->m4is_e2kg );
 } if ( empty( $this->m4is_yvy8 ) ) { $this->m4is_ydo2qh[] = sprintf( 'Notice:  No recurring orders found' );
 exit;
 } } private 
function m4is_h2tl() { $m4is_lja67 = [ 'EndDate', 'LastBillDate', 'PaidThruDate', 'StartDate', 'NextBillDate' ];
  foreach ( $this->m4is_yvy8 as $m4is_vky3j ) { if ( $m4is_vky3j['Status'] == 'Inactive' ) { if ( empty( $this->m4is_b7ao5t ) || in_array( $m4is_vky3j['SubscriptionPlanId'], $this->m4is_b7ao5t ) ) { if ( $this->m4is_yh5y ) { printf( "%d - Found Matching Inactive Subscription ID: %d, Type: %d\n", __LINE__, $m4is_vky3j['Id'], $m4is_vky3j['SubscriptionPlanId'] );
 } foreach( $m4is_lja67 as $m4is_yxwn ) { $m4is_vky3j[ $m4is_yxwn ] = empty( $m4is_vky3j[ $m4is_yxwn ] ) ? '' : $m4is_vky3j[ $m4is_yxwn ];
 } $this->m4is_bagrze = max( $m4is_vky3j['EndDate'], $m4is_vky3j['LastBillDate'], $m4is_vky3j['PaidThruDate'], $m4is_vky3j['StartDate'], $m4is_vky3j['NextBillDate'], $this->m4is_bagrze );
 } } else { if ( $this->m4is_yh5y ) { printf( "%d - Found Inactive Non-Matching Subscription ID: %d, Type: %d\n", __LINE__, $m4is_vky3j['Id'], $m4is_vky3j['SubscriptionPlanId'] );
 } } }  foreach ( $this->m4is_yvy8 as $m4is_vky3j ) { if ( $m4is_vky3j['Status'] == 'Active' ) { if ( empty( $this->m4is_b7ao5t ) || in_array( $m4is_vky3j['SubscriptionPlanId'], $this->m4is_b7ao5t ) ) { $this->m4is_bagrze = '';
 if ( $this->m4is_yh5y ) { printf( "%d - Found Matching Active Subscription ID: %d, Type: %d \n", __LINE__, $m4is_vky3j['Id'], $m4is_vky3j['SubscriptionPlanId'] );
 } } else { if ( $this->m4is_yh5y ) { printf( "%d - Found Active Non-Matching Subscription ID: %d\n", __LINE__, $m4is_vky3j['Id'], $m4is_vky3j['SubscriptionPlanId'] );
 } } } } foreach( $this->m4is_p4izs as $m4is_yxwn ) { $m4is__xn_jt[ $m4is_yxwn ] = $this->m4is_bagrze;
 } if ( $this->m4is_yh5y ) { printf( "%d - Expiration Date: %s", __LINE__, $this->m4is_bagrze );
 } m4is_bnrdbo::m4is_cseh( $this->m4is_e2kg, $m4is__xn_jt );
 } private 
function m4is_ka4sw0() {  if ( $this->m4is_bagrze == '' ) { if ( $this->m4is_m5a6_ <> 0 ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( [ $this->m4is_m5a6_ ], $this->m4is_e2kg);
 if ( $this->m4is_yh5y ) { printf( "%d - Add/Remove Tag %d\n", __LINE__, $this->m4is_m5a6_ );
 } } if ( ! empty( $this->m4is_toxy6c ) ) { $m4is_oa_z = m4is_tvc2xn::m4is_znq_1( $this->m4is_e2kg, $this->m4is_toxy6c );
 if ( $this->m4is_yh5y ) { printf( "%d - Running Actionset %d\n", __LINE__, $this->m4is_toxy6c );
 echo __LINE__, ' - ', print_r($m4is_oa_z, true), "\n";
 } } if ( ! empty( $this->m4is__lqeht ) ) { m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $this->m4is__lqeht );
 if ( $this->m4is_yh5y ) { printf( "%d - Achieving Goal %s\n", __LINE__, $this->m4is__lqeht );
 } } }  else { if ( $this->m4is_ep5bx <> 0 ) { m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( [ $this->m4is_ep5bx ], $this->m4is_e2kg);
 if ( $this->m4is_yh5y ) { printf( "%d - Add/Remove Tag %d\n", __LINE__, $this->m4is_ep5bx );
 } } if ( ! empty( $this->m4is_d45fw ) ) { $m4is_oa_z = m4is_tvc2xn::m4is_znq_1( $this->m4is_e2kg, $this->m4is_d45fw );
 if ( $this->m4is_yh5y ) { printf( "%d - Running Actionset %d\n", __LINE__, $this->m4is_d45fw );
 echo __LINE__, ' - ', print_r($m4is_oa_z, true), "\n";
 } } if ( ! empty( $this->m4is_gt1oi ) ) { m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $this->m4is_gt1oi );
 if ( $this->m4is_yh5y ) { printf( "%d - Achieving Goal %s\n", __LINE__, $this->m4is_gt1oi );
 } } } } private 
function m4is_oyar9d( $m4is_w_o7al ) { return $m4is_w_o7al ? 'Yes' : 'No';
 } private 
function m4is_jbxts( $m4is_w_o7al, bool $m4is_koi38 = false ) : bool { $m4is_w_o7al = strtolower( substr( trim( $m4is_w_o7al ), 0, 1 ) );
 return in_array( $m4is_w_o7al, [ 'y', 't', '1' ] ) ? true : ( in_array( $m4is_w_o7al, [ 'n', 'f', '0' ] ) ? false : $m4is_koi38 );
 } }

