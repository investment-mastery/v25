<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists('m4is_pms8y') || die();
 
class m4is_fm2yr { private 
function __construct() {} static 
function init() { if ( defined( 'MEMBERIUM_BETA') && MEMBERIUM_BETA ) { add_action( 'admin_footer-users.php', [ __CLASS__, 'm4is_eod0f'] );
 add_action( 'admin_notices', [ __CLASS__, 'm4is_uk0_f'] );
 add_action( 'admin_print_styles-users.php', [ __CLASS__, 'm4is_t8dgj9'] );
 add_filter( 'bulk_actions-users', [ __CLASS__, 'm4is_fykc'] );
 add_filter( 'handle_bulk_actions-users', [ __CLASS__, 'm4is_w5d4o'], 10, 3 );
 add_action( 'restrict_manage_users', [ __CLASS__, 'm4is_i0yplb'] );
 } } static 
function m4is_fykc( $m4is_ftq9zf ) { $m4is_ftq9zf['memb_bulk_tag'] = __( 'Bulk Add/Remove CRM Tag', 'memberium' );
 return $m4is_ftq9zf;
 } static 
function m4is_w5d4o( $m4is__7cx, $m4is_v6fdv4, $m4is_zaic ) { $m4is_k4yeul = [ 'memb_bulk_tag_error', 'memb_bulk_tag_no_contact', 'memb_bulk_tag_success', ];
 $m4is__7cx = remove_query_arg( $m4is_k4yeul, $m4is__7cx );
  $m4is_zaic = array_filter( $m4is_zaic );
 $m4is_ndufnm = isset( $_GET['memb_bulk_update_tag'] ) ? (int) $_GET['memb_bulk_update_tag'] : 0;
 if ( $m4is_v6fdv4 == 'memb_bulk_tag' ) { $m4is_ndufnm = empty( $_REQUEST['memb_bulk_update_tag'] ) ? 0 : (int) $_REQUEST['memb_bulk_update_tag'];
  if( empty( $m4is_ndufnm ) ){ $m4is__7cx = add_query_arg( 'memb_bulk_tag_error', 'tag', $m4is__7cx );
 return $m4is__7cx;
 }  $m4is_hgmj9s = $m4is_ndufnm < 0 ? 'remove' : 'add';
 $m4is_z59dj = [];
 $m4is_q_px = 0;
 foreach ($m4is_zaic as $m4is_ig9p6) { $m4is_e2kg = m4is_bnrdbo::m4is_ltwpgs($m4is_ig9p6);
 if( !empty($m4is_e2kg) ){ $m4is_z59dj[] = $m4is_e2kg;
 } else{ ++$m4is_q_px;
 } }  if( empty($m4is_z59dj) ){ $m4is__7cx = add_query_arg('memb_bulk_tag_no_contact','all',$m4is__7cx );
 return $m4is__7cx;
 } $m4is_d71ub = m4is_pms8y::m4is_e5l8a9()->m4is_b3iq($m4is_z59dj, $m4is_ndufnm);
 $m4is_k4yeul = [];
 if( is_array($m4is_d71ub) ){ $m4is__8htld = !empty($m4is_d71ub['SUCCESS']) ? count($m4is_d71ub['SUCCESS']) : false;
 $m4is_e7i6 = !empty($m4is_d71ub['FAILURE']) ? count($m4is_d71ub['FAILURE']) : false;
 if( $m4is__8htld ){ $m4is_k4yeul['memb_bulk_tag_success'] = $m4is__8htld;
 } if($m4is_e7i6){ $m4is_k4yeul['memb_bulk_tag_error'] = $m4is_e7i6;
 } } else{ $m4is_k4yeul['memb_bulk_tag_error'] = count($m4is_z59dj);
 } if( !empty($m4is_q_px) ){ $m4is_k4yeul['memb_bulk_tag_no_contact'] = (int) $m4is_q_px;
 } if( !empty($m4is_k4yeul) ){ $m4is__7cx = add_query_arg($m4is_k4yeul, $m4is__7cx);
 } } return $m4is__7cx;
 } static 
function m4is_i0yplb() { $m4is_vnpt = __( 'Select CRM Tag', 'memberium' );
  echo "<div class='memb_bulk_update_tag_wrap'>", "\n";
  echo '<select id="memb_bulk_update_tag" name="memb_bulk_update_tag" class="memb_bulk_update_tag" placeholder="' . $m4is_vnpt . '">', "\n";
 echo '<option value="0">none</option>', "\n";
 echo '<option value="1">foo</option>', "\n";
 echo '<option value="2">bar</option>', "\n";
 echo '<option value="3">baz</option>', "\n";
 echo '</select>', "\n";
 echo "</div>", "\n";
 } static 
function m4is_uk0_f() { $m4is_adhlf = 'memb_bulk_tag_';
 $m4is_c4xku = $m4is_adhlf . 'success';
 $m4is_h1war9 = $m4is_adhlf . 'error';
 $m4is_ky2ks = $m4is_adhlf . 'no_contact';
 $m4is_wbgl5s = '';
 $m4is_u23rl = '';
 if( empty( $_REQUEST[$m4is_c4xku] ) && empty( $_REQUEST[$m4is_h1war9] ) && empty( $_REQUEST[$m4is_ky2ks] ) ){ return;
 } $m4is__8htld = empty( $_REQUEST[$m4is_c4xku] ) ? false : $_REQUEST[$m4is_c4xku];
  $m4is_jadl06 = empty( $_REQUEST[$m4is_h1war9] ) ? false : $_REQUEST[$m4is_h1war9];
 $m4is_q_px = empty( $_REQUEST[$m4is_ky2ks] ) ? false : $_REQUEST[$m4is_ky2ks];
 if( $m4is__8htld ) { $m4is_u23rl = 'success';
 if( (int) $m4is__8htld > 1 ){ $m4is_wbgl5s .= sprintf( __( '%s contacts have been updated.', 'memberium' ), $m4is__8htld );
 } else{ $m4is_wbgl5s .= __( '1 contact has been updated.', 'memberium' );
 } } if($m4is_jadl06){ $m4is_u23rl = empty($m4is_u23rl) ? 'error' : $m4is_u23rl;
 $m4is_wbgl5s .= !empty($m4is_wbgl5s) ? "<br>" : "";
 if( $m4is_jadl06 === 'tag' ){ $m4is_wbgl5s .= __( 'No Tag selected.', 'memberium' );
 } else{ if( (int)$m4is_jadl06 > 1 ){ $m4is_wbgl5s .= sprintf(__( '%s contacts not updated.', 'memberium' ), $m4is_jadl06);
 } else{ $m4is_wbgl5s .= __( '1 contact not updated.', 'memberium' );
 } } }  if( $m4is_q_px ){ $m4is_u23rl = empty( $m4is_u23rl ) ? 'error' : $m4is_u23rl;
 $m4is_wbgl5s .= empty( $m4is_wbgl5s ) ? '' : '<br>';
 if( $m4is_q_px === 'all' ){ $m4is_wbgl5s .= __( 'None of the selected users have an Infusionst Contact ID.', 'memberium' );
 } else if( (int) $m4is_q_px > 1 ){ $m4is_wbgl5s .= sprintf( __( '%s selected users do not have a contact ID.', 'memberium' ), $m4is_q_px );
 } else{ $m4is_wbgl5s .= __( '1 selected User does not have a contact ID.', 'memberium' );
 } } if( ! empty( $m4is_wbgl5s ) ) { echo "<div class=\"notice notice-{$m4is_u23rl} is-dismissible\">";
 echo "<h2>Memberium " . __( 'Bulk Tag Contacts', 'memberium' ) . "</h2>";
 echo "<p>{$m4is_wbgl5s}</p>";
 echo "</div>";
 } return;
 } static 
function m4is_t8dgj9() { ?>
		<style id="memb_bulk_contact_tags_style">
			/*
			.memb_hidden { display:none; }
			*/
			.memb_bulk_update_tag { width:200px; }
			.memb_bulk_update_tag_wrap { float:left; margin-right:6px; max-width:12.5rem; };
		</style>
		<?php
 } static 
function m4is_eod0f() { $m4is_apvd = [];
 $m4is_iystd2 = m4is_pwtg7::m4is_i0au6j( true )['mc'];
 foreach ($m4is_iystd2 as $m4is_j5sy07 => $m4is_mpia ) { $m4is_apvd[] = [ 'id' => $m4is_j5sy07, 'text' => 'Add ' . $m4is_mpia . ' (' . $m4is_j5sy07 . ')' ];
 $m4is_apvd[] = [ 'id' => '-' . $m4is_j5sy07, 'text' => 'Remove ' . $m4is_mpia . ' (-' . $m4is_j5sy07 . ')' ];
 } ?>
		<script id="memb_bulk_contact_tags_script">
		(function( $ ) {
			$( document ).ready( function() {
				var bulktaglist = <?php echo json_encode($m4is_apvd) ?>,
					$changedMembSel = null;
				// Move Inputs Position
				$('.memb_bulk_update_tag_wrap').each(function(i, $wrap) {
					var $parent  = $($wrap).closest(".tablenav"),
						$input   = $('input', $wrap),
						selector = $parent.hasClass('top') ? '#bulk-action-selector-top' : '#bulk-action-selector-bottom';
						$($wrap).insertAfter( $(selector) );
						$($input).wpalSelect2({
						data        : bulktaglist,
						placeholder : $($input).attr("placeholder")
					}).on('change', function(e) {
						if( $changedMembSel !== e.target ){
							membBulkUpdateTagChange(e.target, e.val);
						}
					});
				});

				// Action Select Changes
				$('select[name="action"], select[name="action2"]').on('change', function(e) {
					if( this.value === 'memb_bulk_tag' ){
						$('.memb_bulk_update_tag_wrap').removeClass('memb_hidden');
					}
					else{
						$('.memb_bulk_update_tag_wrap').addClass('memb_hidden');
					}
				});

				var membBulkUpdateTagChange = function ( $el, val ){
					$('.memb_bulk_update_tag').each(function(i, $input) {
						if( $input !== $el ){
							if( $input.value !== undefined && val !== $input.value ){
								$input.value = val;
								$($input).trigger('change');
							}
						}
						else {
							$changedMembSel = $el;
						}
					});
				};
			});
		})( jQuery );
		</script>
		<?php
 } }

