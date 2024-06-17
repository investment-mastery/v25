<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_q1zh2' ) || die();
 ?>
<style>
	.columns {
		float:left;
		width:30%;
		display:inline-block;
		text-align:left;
		margin-right:25px;
		min-width:300px;
	}
</style>
<?php
 m4is_gpc0::m4is_gm1n();
 final 
class m4is_gpc0 { private $m4is_u_nwe;
 static 
function m4is_gm1n() : self { static $m4is_ye0_i;
 return isset( $m4is_ye0_i ) ? $m4is_ye0_i : $m4is_ye0_i = new self;
 } private 
function __construct() { $this->m4is_u_nwe = m4is_q1zh2::get_instance()->m4is_emq3_5();
 m4is_pms8y::m4is_e5l8a9()->m4is_q285('view_integrations' );
 $this->m4is_pv1u3();
 } private 
function m4is_pv1u3() { echo '<div style="width:100%;border-color:#000;">';
 echo '<div class="columns">';
 echo '<h3>Active Modules</h3>';
 echo '<p class="indented">';
 $this->m4is_uqlws();
 echo '</p>';
 echo '<h3>Activated Integrations</h3>';
 echo '<p class="indented">';
 $this->m4is_jc3mu();
 echo '</p>';
 echo '</div>';
 echo '<div class="columns">';
 echo '<h3>Potential conflicts</h3>';
 echo '<p class="indented">';
 $this->m4is_imzbhd();
 echo '</p>';
  echo '</div>';
 echo '</div>';
 echo '<p></p>';
 } private 
function m4is_uqlws() { $m4is_r1g2u = apply_filters( 'memberium/modules/active/names', [] );
 if ( ! empty( $m4is_r1g2u ) ) { sort( $m4is_r1g2u );
 foreach( $m4is_r1g2u as $m4is_t5ot4 ) { printf( '<strong class="goodplugin">%s</strong><br>', $m4is_t5ot4 );
 } } } private 
function m4is_jc3mu() { $m4is_uwdfj = ! empty( $this->m4is_u_nwe['detected'] ) && is_array( $this->m4is_u_nwe['detected'] );
 if ( $m4is_uwdfj ) { foreach ( $this->m4is_u_nwe['detected'] as $m4is_h5fp ) { $m4is_p_gm1 = isset( $m4is_h5fp['help'] ) ? m4is_wr40w::m4is_vgnp( $m4is_h5fp['help'] ) : '';
 printf( '<span class="%splugin">%s</span> %s<br />', $m4is_h5fp['class'], $m4is_h5fp['name'], $m4is_p_gm1 );
 } } else { echo '<span>None</span><br />';
 } } private 
function m4is_imzbhd() { $m4is_uwdfj = ! empty( $this->m4is_u_nwe['problem'] ) && is_array( $this->m4is_u_nwe['problem'] );
 if ( $m4is_uwdfj ) { foreach ( $this->m4is_u_nwe['problem'] as $m4is_h5fp ) { $m4is_p_gm1 = empty( $m4is_h5fp['help'] ) ? '' : m4is_wr40w::m4is_vgnp( $m4is_h5fp['help'] );
 printf( '<span class="badplugin %splugin">%s</span> %s<br />', $m4is_h5fp['class'], $m4is_h5fp['name'], $m4is_p_gm1 );
 } } else { echo 'No known conflicts detected.<br />';
 } } private 
function m4is_l2omp() { $m4is_uwdfj = ! empty( $this->m4is_u_nwe['available'] ) && is_array( $this->m4is_u_nwe['available'] );
 if ( $m4is_uwdfj ) { foreach ( $this->m4is_u_nwe['available'] as $m4is_h5fp ) { $m4is_p_gm1 = empty( $m4is_h5fp['help'] ) ? '' : m4is_wr40w::m4is_vgnp( $m4is_h5fp['help'] );
 printf( '%s %s<br />', $m4is_h5fp['name'], $m4is_p_gm1 );
 } } else { echo 'No additional available integrations.<br>';
 } } }

