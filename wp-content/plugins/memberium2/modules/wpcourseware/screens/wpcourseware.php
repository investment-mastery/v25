<?php
 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die(__('You do not have sufficient permissions to access this page.') );
 final 
class m4is_h9va8c { public static 
function m4is_xexw() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self;
 }  private 
function __construct() { $this->m4is_ju94();
 $this->m4is_k_i3nb();
 $this->m4is_gm1n();
 $this->m4is__z2u();
 }  private 
function m4is_ju94() : void { }  private 
function m4is_k_i3nb() : void { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } $m4is_rngec = get_option( 'memberium_wpcw', [] );
 $m4is_a_hn = isset( $_POST['type'] ) ? $_POST['type'] : '';
 if ( $m4is_a_hn == 'courses' ) { $m4is_rngec['courses']['access_tags'] = $_POST['access_tags'];
 $m4is_rngec['courses']['completion_tag'] = $_POST['completion_tag'];
 } elseif ( $m4is_a_hn == 'modules') { $m4is_rngec['modules']['completion_tag'] = $_POST['completion_tag'];
 } update_option( 'memberium_wpcw', $m4is_rngec );
 } private 
function m4is_gm1n() : void { $m4is_rngec = get_option( 'memberium_wpcw', [] );
 $m4is_d6w3io = $this->m4is_ytig();
 $m4is_r1g2u = $this->m4is_jvat();
 if ( ! empty( $m4is_d6w3io ) ) { echo <<<HTMLBLOCK
				<h2>WP Courseware Courses</h2>
			HTMLBLOCK;
 $this->m4is_zqpgy( $m4is_d6w3io, $m4is_rngec );
 if ( ! empty( $m4is_r1g2u ) ) { echo <<<HTMLBLOCK
					<h2>WP Courseware Modules</h2>
				HTMLBLOCK;
 $this->m4is_byi64( $m4is_r1g2u, $m4is_rngec );
 } else { echo '<p>No modules found.</p>';
 } } else { echo '<p>No courses found.</p>';
 } } private 
function m4is__z2u() : void { $m4is_pvg91b = [];
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true );
 $m4is_iystd2 = $m4is_iystd2['mc'];
 $m4is_okba78 = [];
 $m4is_okba78[] = [ 'id' => 0, 'text' => '(None)' ];
 if ( is_array( $m4is_iystd2 ) ) { foreach ( (array) $m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia) { if (! in_array($m4is_j5sy07, $m4is_pvg91b) ) { $m4is_okba78[] = [ 'id' => $m4is_j5sy07, 'text' => $m4is_mpia . ' (' . $m4is_j5sy07 . ')' ];
 } } } $m4is_okba78 = json_encode($m4is_okba78);
 echo '<script>';
 echo 'var taglist = ', $m4is_okba78, ';';
 echo '</script>';
 } private 
function m4is_ytig() : array { global $wpdb;
 global $wpcwdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT `course_id`, `course_title`, `course_desc`, `course_opt_user_access` FROM %i WHERE 1 ORDER BY `course_opt_user_access` ASC, `course_id` DESC", $wpcwdb->courses );
 $m4is_d6w3io = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_d6w3io;
 } private 
function m4is_jvat() : array { global $wpdb;
 global $wpcwdb;
 $m4is_tovizk = $wpdb->prepare( "SELECT * FROM %i WHERE 1 ORDER BY parent_course_id ASC, module_order ASC", $wpcwdb->modules );
 $m4is_r1g2u = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return $m4is_r1g2u;
 } private 
function m4is_zqpgy( array $m4is_d6w3io, array $m4is_rngec ) : void { echo <<<HTMLBLOCK
			<form method="post" action="">
				<input type="hidden" name="type" value="courses">
				<table class="widefat" style="white-space:nowrap;">
					<tr>
						<td>Title</td>
						<td>Mode</td>
						<td>Access Tag</td>
						<td>Completion Tag</td>
					</tr>
		HTMLBLOCK;
 foreach( $m4is_d6w3io as $m4is_ouqlyk ) { $m4is_j5sy07 = $m4is_ouqlyk['course_id'];
 $m4is_azd3gq = $m4is_ouqlyk['course_title'];
 $m4is_ljzrq0 = $m4is_ouqlyk['course_desc'];
 $m4is_owf7cm = $m4is_ouqlyk['course_opt_user_access'] == 'default_hide';
 $m4is_qjy8 = empty( $m4is_rngec['courses']['access_tags'][$m4is_j5sy07] ) ? '' : $m4is_rngec['courses']['access_tags'][$m4is_j5sy07];
 $m4is_ssklv = empty( $m4is_rngec['courses']['completion_tag'][$m4is_j5sy07] ) ? '' : $m4is_rngec['courses']['completion_tag'][$m4is_j5sy07];
 $m4is_zvtho = $m4is_owf7cm ? '<strong style="color:red;">Protected</strong>' : '<strong style="color:green;">Public</strong>';
 if ( $m4is_owf7cm ) { $m4is_wafk = <<<HTMLBLOCK
					<input style="width:300px;" type="text" class="multitaglist" value="{$m4is_qjy8}" name="access_tags[{$m4is_j5sy07}]" />
				HTMLBLOCK;
 } else { $m4is_wafk = <<<HTMLBLOCK
					<em>Automatic</em>
					<input type="hidden" value="0" name="access_tags[{$m4is_j5sy07}">
				HTMLBLOCK;
 } echo <<<HTMLBLOCK
						<tr>
							<td>
								<strong>{$m4is_azd3gq}</strong><br>
								{$m4is_ljzrq0}
							</td>
							<td>
								{$m4is_zvtho}
							</td>
							<td>
								{$m4is_wafk}
							</td>
							<td>
								<input type="text" style="width:300px;" class="multitaglist" value="{$m4is_ssklv}" name="completion_tag[{$m4is_j5sy07}]">
							</td>
						</tr>
			HTMLBLOCK;
 } echo <<<HTMLBLOCK
				</table>
				<p>
					<input type="submit" class="button-primary"value="Update" />
				</p>
			</form>
		HTMLBLOCK;
 } private 
function m4is_byi64( array $m4is_r1g2u, array $m4is_rngec ) : void { echo <<<HTMLBLOCK
			<form method="post" action="">
				<input type="hidden" name="type" value="modules" />
				<table class="widefat" style="white-space:nowrap;">
					<tr>
						<td>Title</td>
						<td>Completion Tag</td>
					</tr>
		HTMLBLOCK;
 foreach( $m4is_r1g2u as $m4is_xx25wq ) { $m4is_j5sy07 = $m4is_xx25wq['module_id'];
 $m4is_azd3gq = $m4is_xx25wq['module_title'];
 $m4is_ljzrq0 = $m4is_xx25wq['module_desc'];
 $m4is_ssklv = isset( $m4is_rngec['modules']['completion_tag'][$m4is_j5sy07] ) ? $m4is_rngec['modules']['completion_tag'][$m4is_j5sy07] : '';
 echo <<<HTMLBLOCK
					<tr>
						<td>
							<strong>{$m4is_azd3gq}</strong><br>
							{$m4is_ljzrq0}
						</td>
						<td>
							<input type="text" style="width:300px;" class="multitaglist" value="{$m4is_ssklv}" name="completion_tag[{$m4is_j5sy07}]">
						</td>
					</tr>
			HTMLBLOCK;
 } echo <<<HTMLBLOCK
				</table>
				<p>
					<input type="submit" class="button-primary" value="Update" />
				</p>
			</form>
		HTMLBLOCK;
 } }

