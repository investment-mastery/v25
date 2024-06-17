<?php
 class_exists('m4is_pms8y') || die();
  
function m4is_i4mz(){ return m4is_bwztuy::m4is_e5l8a9();
 }  
class m4is_bwztuy {  protected $to_json = [];
  protected $print_scripts = false;
  private 
function __construct() { }  static 
function m4is_e5l8a9() : self { static $m4is_ye0_i = false;
 return $m4is_ye0_i ? $m4is_ye0_i : $m4is_ye0_i = new self;
 }  
function m4is_ahjrux($m4is_qnjfv, $m4is_z50f = null, $m4is_carw7y) { m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'src' => '', 'time_tags' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_mfo9 = [];
 $m4is_iqb2n = ( $m4is_qnjfv['time_tags'] > '' ) ? array_filter( explode( ',', $m4is_qnjfv['time_tags'] ) ) : [];
 if (! empty($m4is_iqb2n) && !empty($m4is_qnjfv['src']) ) { foreach ($m4is_iqb2n as $m4is__935ng => $m4is_dvup7) { $time_tag_array = array_filter( explode( '|', $m4is_dvup7 ) );
 $m4is_n260nx = ( isset( $time_tag_array[0] ) ) ? $time_tag_array[0] : false;
 $m4is_mpia = ( isset( $time_tag_array[1] ) ) ? $time_tag_array[1] : false;
 if ( $m4is_n260nx && $m4is_mpia ){ $m4is_mfo9[] = [ 'time' => $this->m4is_x2dtx($m4is_n260nx), 'tag_id' => $m4is_mpia ];
 } } $m4is_zrqe1 = $this->m4is_pmx9g($m4is_qnjfv['src']);
 $this->to_json[] = [ 'src' => $m4is_qnjfv['src'], 'time_tags' => $m4is_mfo9, 'type' => $this->m4is_pmx9g($m4is_qnjfv['src']), ];
 if (! $this->print_scripts) { wp_register_script( 'memberium-video-progress', plugin_dir_url( __FILE__ ) . 'js/video-progress.js', ['jquery'], m4is_pms8y::m4is_e5l8a9()->m4is_u04m(), true );
 wp_enqueue_script( 'memberium-video-progress' );
 add_action('wp_print_footer_scripts', [$this, 'm4is_r0lu'], 9999 );
 $this->print_scripts = true;
 } } }  
function m4is_pmx9g($m4is_t7_or) { $m4is_kwb8v = $m4is_tyj9 = $is_wistia = $is_video = false;
 $m4is_rol5f = '#^https?://(?:www\.)?(?:youtube\.com/watch|youtu\.be/)#';
 $m4is_txbgw = '#^https?://(.+\.)?vimeo\.com/.*#';
 $m4is_kwb8v = ( preg_match( $m4is_txbgw, $m4is_t7_or ) );
 $m4is_tyj9 = ( preg_match( $m4is_rol5f, $m4is_t7_or ) );
 $m4is_u23rl = ($m4is_tyj9) ? 'youtube' : false;
 $m4is_u23rl = ($m4is_kwb8v) ? 'vimeo' : $m4is_u23rl;
 return $m4is_u23rl;
 }  
function m4is_r0lu() { m4is_w0enbm::m4is_e5l8a9()->m4is_ciqgu3('mvp_params', $this->to_json);
 }  
function m4is_x2dtx($m4is_n260nx){ $m4is_lm_ay = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $m4is_n260nx);
 sscanf($m4is_lm_ay, "%d:%d:%d", $m4is_ncqop, $m4is_moka, $m4is_ydcuoj);
 return ( $m4is_ncqop * 3600 + $m4is_moka * 60 + $m4is_ydcuoj );
 } }

