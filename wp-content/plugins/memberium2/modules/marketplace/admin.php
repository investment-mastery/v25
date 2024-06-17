<?php
 class_exists('m4is_pms8y') || die();
 final 
class m4is_y2vf { private $marketplace_version = '1.0.0';
 protected $marketplace_feed_url = 'https://licenseserver.webpowerandlight.com/memberium-is/marketplace.php';
 private $marketplace_admin_slug = 'memberium-marketplace';
 private $marketplace_opt_key = 'memberium/marketplace';
 private $marketplace_cached_time = 60 * 5;
 
function __construct() {  add_action('admin_menu', [$this, 'm4is_v36w'], PHP_INT_MAX);
 add_action('admin_enqueue_scripts', [$this, 'm4is_d0s4ed']);
 } 
function m4is_v36w(){ $m4is_don1 = 'manage_options';
 if (! current_user_can($m4is_don1) ) { return;
 } $m4is_i6f5 = 'memberium';
 $m4is_qht8e = $m4is_don1;
 add_submenu_page($m4is_i6f5, 'Marketplace', 'Marketplace', $m4is_qht8e, $this->marketplace_admin_slug, [$this, 'm4is_rah150']);
 } 
function m4is_d0s4ed($m4is_vfzl0) { if ( 'memberium_page_memberium-marketplace' != $m4is_vfzl0 ) { return;
 } wp_register_style('m4is-marketplace-css', plugin_dir_url(__FILE__).'assets/css/styles.css', [], $this->marketplace_version, 'all' );
 wp_enqueue_style('m4is-marketplace-css');
 } 
function m4is_rah150() { $m4is_xys1r = $this->m4is_idrk7();
 if( ! $m4is_xys1r ){ echo __('No Listings Found');
 } else{ $m4is_ucwz5e = ($m4is_xys1r) ? count($m4is_xys1r) : 0;
 $m4is_ac3jkv = admin_url( "admin.php?page=" . $this->marketplace_admin_slug );
 $m4is_sm_wc = ( isset($_GET['tab']) ) ? $_GET['tab'] : false;
 if( ! $m4is_sm_wc ){ $m4is_ldjf8y = array_column($m4is_xys1r['content'],'slug');
 $m4is_sm_wc = $m4is_ldjf8y[0];
 } $m4is_q2icln = ( isset($m4is_xys1r['style']) ) ? $m4is_xys1r['style'] : false;
 $m4is_q2icln = ( $m4is_q2icln > '' ) ? $m4is_q2icln : false;
 $m4is_rrm56 = ( isset($m4is_xys1r['header']) ) ? $m4is_xys1r['header'] : false;
 $m4is_ejikr4 = ( isset($m4is_xys1r['content']) ) ? $m4is_xys1r['content'] : false;
 $m4is_m_ig = ( isset($m4is_xys1r['footer']) ) ? $m4is_xys1r['footer'] : false;
 require_once __DIR__ . '/marketplace.php';
 } } 
function m4is_idrk7(){ $m4is_etj2 = get_option($this->marketplace_opt_key, false);
 $m4is_khksov = ( $m4is_etj2 ) ? false : true;
 if( $m4is_etj2 ){ if ( ( time() - $m4is_etj2['timestamp'] ) > $this->marketplace_cached_time ) { $m4is_khksov = true;
 } } if( $m4is_khksov ){ $m4is_etj2 = $this->m4is_smjz3();
 } return $m4is_etj2 ? $m4is_etj2['data'] : false;
 } 
function m4is_smjz3() { $m4is_k4yeul = [ 'user-agent' => 'm4is', ];
 $m4is_d71ub = wp_remote_get( $this->marketplace_feed_url, $m4is_k4yeul );
 if( ! is_wp_error($m4is_d71ub) ){ $m4is_etj2 = json_decode( wp_remote_retrieve_body( $m4is_d71ub ), true );
 $m4is_etj2 = is_array($m4is_etj2) ? $m4is_etj2 : false;
 if( $m4is_etj2 ){ $m4is_qfdm5 = [ 'timestamp' => time(), 'data' => $m4is_etj2 ];
 update_option($this->marketplace_opt_key, $m4is_qfdm5);
 return $m4is_qfdm5;
 } else { return false;
 } } else { return false;
 } } }

