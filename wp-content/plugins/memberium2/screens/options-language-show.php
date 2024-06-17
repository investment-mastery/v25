<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 new m4is_xyh5;
 final 
class m4is_xyh5 { private $m4is_bnd6ti;
 private $m4is_bsy5;
 
function __construct() { $this->m4is_ju94();
 $this->m4is_k_i3nb();
 $this->m4is_gm1n();
 }  private 
function m4is_ju94() : void { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_bsy5 = m4is_ss2_7::m4is_bskpcz();
 }  private 
function m4is_k_i3nb() : void { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } global $wpdb;
 if ( ! empty( $_POST['add_translation'] ) ) { $m4is_hl8q = strtolower( trim( $_POST['context'] ?? '' ) );
 $m4is_t5ot4 = strtolower( trim( $_POST['name'] ?? '' ) );
 $m4is_jm1_ = strtolower( trim( $_POST['language'] ?? '' ) );
 $m4is_oj4vit = trim( stripslashes( $_POST['origtext'] ?? '' ) );
 $m4is_w_o7al = trim( stripslashes( $_POST['value'] ?? '' ) );
 $m4is_tovizk = 'DELETE FROM %i WHERE `context` = %s AND `name` = %s AND origtext = %s';
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $this->m4is_bsy5, $m4is_hl8q, $m4is_t5ot4, $m4is_oj4vit );
 $wpdb->query( $m4is_tovizk );
 if ( ! empty( $_POST['value'] ) ) { $m4is_tovizk = 'INSERT INTO %i (`context`, `language`, `name`, `origtext`, `value` ) VALUES (%s, %s, %s, %s, %s )';
 $m4is_tovizk = $wpdb->prepare($m4is_tovizk, $this->m4is_bsy5, $m4is_hl8q, $m4is_jm1_, $m4is_t5ot4, $m4is_oj4vit, $m4is_w_o7al );
 $wpdb->query( $m4is_tovizk );
 } } if ( ! empty( $_POST['update_translations'] ) ) { $m4is_uz9ek = $_POST['value'] ?? [];
 foreach( $m4is_uz9ek as $m4is_j5sy07 => $m4is_w_o7al ) { $m4is_j5sy07 = intval( $m4is_j5sy07 );
 $m4is_w_o7al = trim( stripslashes( $m4is_w_o7al ) );
 $m4is_tovizk = $wpdb->prepare( 'UPDATE %i SET `value` = %s WHERE `id` = %d', $this->m4is_bsy5, $m4is_w_o7al, $m4is_j5sy07 );
 $wpdb->query( $m4is_tovizk );
 } if ( ! empty( $_POST['id'] ) && is_array( $_POST['id'] ) ) { $m4is_x_rxou = array_filter( array_map( 'intval', $_POST['id'] ) );
 $m4is_x_rxou = implode( ',', $m4is_x_rxou );
 $m4is_tovizk = $wpdb->prepare( "DELETE FROM %i WHERE `id` IN ( {$m4is_x_rxou} )", $this->m4is_bsy5 );
 $wpdb->query( $m4is_tovizk );
 } } } private 
function m4is_gm1n() { global $wpdb;
 $m4is_yr0_ = m4is_wr40w::m4is_vgnp( 14684, 'Click to Learn More' );
 $m4is_g5whlt = wp_nonce_field( __FILE__, 'memberium_language_translations_nonce', true, false );
 $m4is_zlzv6 = trim( $_GET['search'] ?? '' );
 $m4is_fyu8t = esc_html( $m4is_zlzv6 );
 $m4is_c56j_ = $this->m4is_aj2b();
 $m4is_wqx1o = $this->m4is_klvam( $m4is_zlzv6 );
  echo <<<HTMLBLOCK
			<h3>Multi-Language Support</h3>
			<p>
				Enter the name of the shortcode (without the brackets) in “Context”.<br />
				Leave Name and Language fields to the default.<br />
				Enter “Original text” (from which you want to translate) and then the “New text" you want displayed instead.<br />
			<p>
				{$m4is_yr0_}
			</p>
			<hr />
		HTMLBLOCK;
  echo <<<HTMLBLOCK
			<form method=post style="margin-bottom:24px;">
				{$m4is_g5whlt}
				<ul>
					<label>Context:</label>
					<input required="required" type="text" name="context" value="" size="30">
				</ul>
				<ul>
					<label>Name:</label>
					<select name="name">
						<option value="memberium">Memberium</option>
						<option value="">Generic</option>
					</select>
				</ul>
				<ul>
					<label>Language:</label>
					{$m4is_c56j_}
				</ul>
				<ul>
					<label>Original Text:</label>
					<input required="required" type="text" name="origtext" value="" size="80">
				</ul>
				<ul>
					<label>New Text:</label>
					<input type="text" name="value" value="" size="80">
				</ul>

				<input required="required" type="submit" name="add_translation" value="Add/Update" class="button-primary">
			</form>
			<hr />
		HTMLBLOCK;
  echo <<<HTMLBLOCK
			<form method="get">
				{$m4is_g5whlt}
				<input type="hidden" name="page" value="memberium-options">
				<input type="hidden" name="tab" value="language">
				<p>
					<input type="text" name="search" value="{$m4is_fyu8t}" placeholder="Search for translations" style="width:250px;"> &nbsp;
					<input type="submit" name="submit" value="Search" class="button-primary">
				</p>
			</form>
		HTMLBLOCK;
 $m4is_nzgivw = $this->m4is_hfol_5( $m4is_wqx1o );
 if ( empty( $m4is_nzgivw ) ) { echo '<p>No translations found.</p>';
 return;
 }  echo <<<HTMLBLOCK
			<style>
				.memberium_search_results {

				}
				.memberium_search_results td {
					padding: 5px;
				}
				.memberium_search_results tr:nth-child(odd) {
					background-color: #f9f9f9;
				}
				.memberium_search_results td.memberium_delete {
					width: 50px;
				}
				.memberium_search_results td.memberium_id {
					width: 50px;
				}
				.memberium_search_results td.memberium_language {
					width: 125px;
				}
				.memberium_search_results td.memberium_context {
					width: 125px;
				}
				.memberium_search_results td.memberium_original {
					word-wrap: break-word;
					word-break: break-all;
					width: 350px;
				}
				.memberium_search_results td.memberium_new {
					word-wrap: break-word;
					word-break: break-all;
				}
				.memberium_search_results td textarea {
					height: 90%;
					overflow-y: hidden;
					width: 90%;
				}
			</style>
			<form method="post">
				<table class="widefat memberium_search_results">
					<tr>
						<td class="memberium_delete">Delete</td>
						<td class="memberium_id">ID</td>
						<td class="memberium_language">Language</td>
						<td class="memberium_context">Context</td>
						<td class="memberium_original">Original Text</td>
						<td class="memberium_new">Translated Text</td>
					</tr>
					{$m4is_nzgivw}
				</table>
				<p>
				<input type="submit" name="update_translations" value="Update">
				</p>
			</form>
			<script>
				function wpal_resize_all_textareas() {
					jQuery('textarea').each(function () {
						this.style.height = 'auto';
						this.style.height = (this.scrollHeight) + 'px';
					});
				}

				jQuery(window).resize( function() { wpal_resize_all_textareas(); } );
				jQuery(document).ready( function() { wpal_resize_all_textareas(); } );
				jQuery('textarea').on( 'input', function () { wpal_resize_all_textareas(); } );
			</script>
		HTMLBLOCK;
 }  private 
function m4is_aj2b() : string { $m4is_b0gmh = $this->m4is_tgpvul();
 $m4is_tjg_9 = '<select name="language">';
 foreach( $m4is_b0gmh as $m4is_carw7y => $m4is_t5ot4 ) { $m4is_tjg_9 .= sprintf( '<option value="%s">%s</option>', $m4is_carw7y, $m4is_t5ot4 );
 } $m4is_tjg_9 .= '</select>';
 return $m4is_tjg_9;
 }  private 
function m4is_tgpvul() : array { return [ '' => 'Default', 'en' => 'English', 'ar' => 'Arabic', 'cy' => 'Welsh', 'de' => 'German', 'es' => 'Spanish', 'fr' => 'French', 'he' => 'Hebrew', 'hi' => 'Hindu', 'it' => 'Italian', 'ja' => 'Japanese', 'ji' => 'Yiddish', 'ko' => 'Korean', 'po' => 'Polish', 'pt' => 'Portuguese', 'ru' => 'Russian', 'sv' => 'Swedish', 'vi' => 'Vietnamese', 'zh' => 'Chinese', ];
 }  private 
function m4is_klvam( $m4is_zlzv6 ) : array { global $wpdb;
 $m4is_dljqh = 5;
 $m4is_y_38pw = empty( $m4is_zlzv6 ) ? "LIMIT {$m4is_dljqh}" : '';
 $m4is_ypkr = '%' . $wpdb->esc_like( $m4is_zlzv6 ) . '%';
 $m4is_tovizk = "SELECT * FROM %i WHERE `context` LIKE %s OR `origtext` LIKE %s OR `value` LIKE %s ORDER BY id DESC {$m4is_y_38pw}";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, $this->m4is_bsy5, $m4is_ypkr, $m4is_ypkr, $m4is_ypkr );
 $m4is_xm2h = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 return is_array( $m4is_xm2h ) ? $m4is_xm2h : [];
 }  private 
function m4is_hfol_5( array $m4is_wqx1o ) : string { $m4is_tjg_9 = '';
 foreach( $m4is_wqx1o as $m4is_ke_fr ) { $m4is_j5sy07 = esc_html( $m4is_ke_fr['id'] );
 $m4is_hl8q = esc_html( $m4is_ke_fr['context'] );
 $m4is_oj4vit = esc_html( $m4is_ke_fr['origtext'] );
 $m4is_w_o7al = esc_html( $m4is_ke_fr['value'] );
 $m4is_jm1_ = empty( $m4is_ke_fr['language'] ) ? '(Unknown)' : $m4is_ke_fr['language'];
 $m4is_tjg_9 .= <<<HTMLBLOCK
				<tr>
					<td class="memberium_delete">
						<input type="checkbox" name="id[]" value="{$m4is_j5sy07}">
					</td>
					<td class="memberium_id">
						{$m4is_j5sy07}
					</td>
					<td class="memberium_language">
						{$m4is_jm1_}
					</td>
					<td class="memberium_context">
						{$m4is_hl8q}
					</td>
					<td class="memberium_original">
						{$m4is_oj4vit}
					</td>
					<td class="memberium_new">
						<textarea name="value[{$m4is_j5sy07}]">{$m4is_w_o7al}</textarea>
					</td>
				</tr>
			HTMLBLOCK;
 } return $m4is_tjg_9;
 } }

