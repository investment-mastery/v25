<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_wr40w::m4is_x6wv();
 final 
class m4is_wr40w { static $m4is_ogdt, $m4is_rf_j;
 static 
function m4is_x6wv() { self::$m4is_rf_j = 'https://keap.memberium.com/';
 self::$m4is_ogdt = [];
 }  static 
function m4is_vgnp( int $m4is_j5sy07, string $m4is_knyw0 = 'Read More...' ) : string { $m4is_rlp0 = '';
 if ( empty( $m4is_j5sy07 ) ) { return '';
 } return sprintf( ' (<strong><a href="%s?page_id=%d" target="_blank">%s</a></strong>) ', self::$m4is_rf_j, $m4is_j5sy07, $m4is_knyw0 );
 }     static 
function m4is_cxesuf( string $m4is_wbgl5s, string $m4is_u23rl = 'update' ) { self::$m4is_ogdt[] = [ 'type' => $m4is_u23rl, 'message' => $m4is_wbgl5s ];
 }  static 
function m4is_kj4sp() { if ( ! empty( self::$m4is_ogdt ) ) { foreach ( self::$m4is_ogdt as $m4is_c5zg => $m4is_yh6ub ) { if ( $m4is_yh6ub['type'] == 'update' ) { $m4is_sgd1 = 'updated';
 } elseif ( $m4is_yh6ub['type'] == 'error' ) { $m4is_sgd1 = 'error';
 } printf( '<div class="%s"><p>%s</p></div>', $m4is_sgd1, $m4is_yh6ub['message'] );
 unset( self::$m4is_ogdt[$m4is_c5zg] );
 } } }    static 
function m4is_c21wl() : array { $m4is_g5opra = [];
 $m4is_qtapuz = get_post_types(['public' => true]);
 if (is_array($m4is_qtapuz) ) { foreach($m4is_qtapuz as $m4is_a_hn) { $m4is_g5opra[] = $m4is_a_hn;
 } } return $m4is_g5opra;
 }     static 
function m4is_ze6b( string $m4is_unc_q = '', string $m4is_t5ot4 = '', int $m4is_w_o7al = 0, array $m4is_k4yeul = [] ) { $m4is_r6nh_b = [ 'class' => '', 'disabled' => '', 'help_id' => 0, 'id' => $m4is_t5ot4, 'max' => 999999, 'min' => 0, 'size' => 8, 'step' => 1, 'style' => '', 'units' => '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_k4yeul['size'] -= (int) $m4is_k4yeul['size'];
 $m4is_k4yeul['step'] -= (int) $m4is_k4yeul['step'];
 $m4is_tjg_9 = '';
 $m4is_tjg_9 .= empty($m4is_k4yeul['disabled']) ? '' : ' disabled="disabled" ';
 $m4is_k4yeul = [ $m4is_unc_q, $m4is_tjg_9, $m4is_k4yeul['id'], $m4is_t5ot4, $m4is_k4yeul['min'], $m4is_k4yeul['max'], $m4is_k4yeul['size'], $m4is_k4yeul['step'], $m4is_w_o7al, $m4is_k4yeul['class'], $m4is_k4yeul['style'], $m4is_k4yeul['units'], self::m4is_vgnp( $m4is_k4yeul['help_id'] ), ];
 vprintf( "<li><label>%s</label><input type=number %s id='%s' name='%s' min=%s max=%s size=%s step=%s value='%s' class='%s' style='%s' > %s %s</li>\n\n", $m4is_k4yeul );
 }  static 
function m4is_hd8p( string $m4is_unc_q, string $m4is_t5ot4, int $m4is_t1hw = 0, bool $m4is_lh4p70 = false, $m4is_uzfw8j = true ) { $m4is_szi8 = $m4is_lh4p70 ? 'checked=checked' : '';
 $m4is_k4yeul = [ $m4is_unc_q, $m4is_t5ot4, $m4is_t5ot4, $m4is_szi8, self::m4is_vgnp( $m4is_t1hw ), ];
 $m4is_tjg_9 = vsprintf( "<li><label>%s</label><input type=hidden value=0 name='%s'><label style='width:75px;'><input type=checkbox value=1 class=ios-switch name='%s' %s /><div class=switch></div></label>%s</li>\n\n", $m4is_k4yeul );
 if ( $m4is_uzfw8j ) { echo $m4is_tjg_9;
 } return $m4is_tjg_9;
 }  static 
function m4is_le8h(string $m4is_t5ot4 = '', bool $m4is_w_o7al = false, array $m4is_k4yeul = [] ) { if (empty($m4is_t5ot4) ) { return;
 } $m4is_r6nh_b = [ 'label' => '', 'echo' => true, 'id' => $m4is_t5ot4, 'helpid' => 0, 'autofocus' => false, 'class' => '', 'disabled' => false, 'form' => '', 'required' => false, 'style' => '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $output = '';
 $output .= '<input type="hidden" value="0" name="' . $m4is_t5ot4 . '">';
 $output .= '<label style="width:75px;"><input type="checkbox" value="1" class="ios-switch" name="' . $m4is_t5ot4 . '" ' . ($m4is_w_o7al == 1 ? ' checked="checked" ' : '') . ' ';
 $output .= '/><div class="switch"></div></label>';
 $output .= m4is_wr40w::m4is_vgnp($m4is_k4yeul['helpid']) . "</li>\n\n";
 if ($m4is_k4yeul['echo']) { echo $output;
 } return $output;
 }  static 
function m4is_jtbkc(string $m4is_t5ot4 = '', array $m4is_wov2 = [], $m4is_uz9ek = '', array $m4is_k4yeul = [] ) { if (empty($m4is_wov2) || empty($m4is_t5ot4) ) { return;
 } if (! is_array($m4is_uz9ek) ) { $m4is_uz9ek = explode(',', $m4is_uz9ek);
 } $m4is_r6nh_b = [ 'autofocus' => false, 'class' => '', 'disabled' => false, 'case_sensitive' => false, 'echo' => true, 'form' => '', 'id' => $m4is_t5ot4, 'multiple' => false, 'required' => false, 'size' => 1, 'style' => '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_uzfw8j = '<select name="' . $m4is_t5ot4 . '" ';
 if ($m4is_k4yeul['autofocus']) { $m4is_uzfw8j .= ' autofocus="autofocus"';
 } if ($m4is_k4yeul['disabled']) { $m4is_uzfw8j .= ' disabled="disabled"';
 } if ($m4is_k4yeul['multiple']) { $m4is_uzfw8j .= ' multiple="multiple"';
 } if ($m4is_k4yeul['required']) { $m4is_uzfw8j .= ' required="required"';
 } if ($m4is_k4yeul['size']) { $m4is_uzfw8j .= ' size="' . (int) $m4is_k4yeul['size'] . '"';
 } if (! empty($m4is_k4yeul['class']) ) { $m4is_uzfw8j .= ' class="' . $m4is_k4yeul['class'] . '"';
 } if (! empty($m4is_k4yeul['style']) ) { $m4is_uzfw8j .= ' style="' . $m4is_k4yeul['style'] . '"';
 } if (! empty($m4is_k4yeul['form']) ) { $m4is_uzfw8j .= ' form="' . $m4is_k4yeul['form'] . '"';
 } if (! empty($m4is_k4yeul['id']) ) { $m4is_uzfw8j .= ' id="' . $m4is_k4yeul['id'] . '"';
 } $m4is_uzfw8j .= ' size="' . $m4is_k4yeul['size'] . '">';
 foreach($m4is_wov2 as $m4is_w_o7al => $m4is_unc_q) { $m4is_xnwj4 = false;
 foreach($m4is_uz9ek as $m4is_koi38) { if ($m4is_k4yeul['case_sensitive']) { $m4is_xnwj4 = $m4is_xnwj4 || (bool) ($m4is_w_o7al == $m4is_koi38);
 } else { $m4is_xnwj4 = $m4is_xnwj4 || (bool) (0 === strcasecmp($m4is_w_o7al, $m4is_koi38) );
 } } $m4is_uzfw8j .= '<option value="' . $m4is_w_o7al . '" ' . ($m4is_xnwj4 ? ' selected="selected" ' : '') . '>' . $m4is_unc_q . '</option>';
 } $m4is_uzfw8j .= '</select>';
 if ($m4is_k4yeul['disabled']) { foreach($m4is_uz9ek as $m4is_w_o7al) { $m4is_uzfw8j = "<input type='hidden' name='{$m4is_t5ot4}[]' value='{$m4is_w_o7al}' />";
 } } if ($m4is_k4yeul['echo']) { echo "\n\n", $m4is_uzfw8j, "\n\n";
 } else { return "\n\n" . $m4is_uzfw8j . "\n\n";
 } }  static 
function m4is_ymnfe7(string $m4is_t5ot4, array $m4is_cwkrz = [] ) { $m4is_cwkrz['help_text'] = isset($m4is_cwkrz['help_text']) ? $m4is_cwkrz['help_text'] : false;
 $m4is_cwkrz['help_id'] = isset($m4is_cwkrz['help_id']) ? $m4is_cwkrz['help_id'] : 0;
 $m4is_cwkrz['type'] = ! empty($m4is_cwkrz['type']) ? $m4is_cwkrz['type'] : 'text';
 $m4is_cwkrz['id'] = ! empty($m4is_cwkrz['id']) ? $m4is_cwkrz['id'] : $m4is_t5ot4;
 $m4is_cwkrz['name'] = ! empty($m4is_cwkrz['name']) ? $m4is_cwkrz['name'] : $m4is_t5ot4;
 $m4is_cwkrz['required'] = ! empty($m4is_cwkrz['required']) ? true : false;
 $m4is_flx71n = [ 'placeholder', 'size', 'style', 'class', 'value', 'label', 'type', 'name', 'wrapper_class', 'help_id', 'min', 'max', 'step' ];
 foreach($m4is_flx71n as $m4is_s2ge5) { $m4is_cwkrz[$m4is_s2ge5] = isset($m4is_cwkrz[$m4is_s2ge5]) ? $m4is_cwkrz[$m4is_s2ge5] : '';
 } $m4is_flx71n = ['custom'];
 foreach($m4is_flx71n as $m4is_s2ge5) { $m4is_cwkrz[$m4is_s2ge5] = isset($m4is_cwkrz[$m4is_s2ge5]) ? $m4is_cwkrz[$m4is_s2ge5] : [];
 } if (! empty($m4is_cwkrz['custom']) ) { foreach ($m4is_cwkrz['custom'] as $m4is_c5zg => $m4is_g0wy){ $m4is_cwkrz['custom'][$m4is_c5zg] = esc_attr($m4is_c5zg) . '="' . esc_attr($m4is_g0wy) . '" ';
 } } if ($m4is_cwkrz['label']) { echo '<p class="', $m4is_cwkrz['wrapper_class'], '">';
 echo '<label for="', esc_attr($m4is_cwkrz['id']), '">', wp_kses_post($m4is_cwkrz['label']), '</label>', "\n";
 } echo '<input ';
 $m4is_flx71n = ['placeholder', 'size', 'style', 'class', 'value', 'label', 'type', 'name', 'min', 'max', 'step'];
 echo $m4is_cwkrz['required'] ? ' required=required ' : '';
 foreach($m4is_flx71n as $m4is_s2ge5) { echo ( ($m4is_cwkrz[$m4is_s2ge5] <> '') ? $m4is_s2ge5 . '="'. esc_attr($m4is_cwkrz[$m4is_s2ge5]) . '" ' : '');
 } foreach($m4is_cwkrz['custom'] as $m4is_s2ge5) { echo $m4is_s2ge5;
 } echo '/>', "\n";
 echo m4is_wr40w::m4is_vgnp($m4is_cwkrz['help_id'], $m4is_cwkrz['help_text']);
 if ($m4is_cwkrz['label']) { echo '</p>';
 } }  static 
function m4is_mz70(string $m4is_unc_q = '', string $m4is_t5ot4 = '', string $m4is_w_o7al = '', string $m4is_wp6f9 = '', array $m4is_k4yeul = [] ) { $m4is_r6nh_b = [ 'help_id' => 0, 'style' => '', 'class' => '', 'naked' => false, 'id' => $m4is_t5ot4, 'multiple' => '', 'units' => '', 'disabled' => '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_k4yeul['multiple'] = empty($m4is_k4yeul['multiple']) ? '' : 'multiple';
 $m4is_tjg_9 = '';
 $m4is_tjg_9 .= empty($m4is_k4yeul['disabled']) ? '' : ' disabled="disabled" ';
 if (! $m4is_k4yeul['naked']) { echo '<li>';
 } echo "<label for='{$m4is_t5ot4}'>{$m4is_unc_q}</label>", "<input {$m4is_tjg_9} value='{$m4is_w_o7al}' type=hidden id='{$m4is_k4yeul['id']}' name='{$m4is_t5ot4}' {$m4is_k4yeul['multiple']} class='dropdown {$m4is_wp6f9} {$m4is_k4yeul['class']}' style='{$m4is_k4yeul['style']}' /> {$m4is_k4yeul['units']} ", m4is_wr40w::m4is_vgnp($m4is_k4yeul['help_id']);
 if (! $m4is_k4yeul['naked']) { echo '</li>';
 } }  static 
function m4is_uftpvx(string $m4is_unc_q = '', string $m4is_t5ot4 = '', string $m4is_w_o7al = '', array $m4is_wov2 = [], array $m4is_k4yeul = [] ) { $m4is_r6nh_b = [ 'class' => 'basic-single', 'help_id' => 0, 'id' => $m4is_t5ot4, 'style' => '', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 echo "<li><label>{$m4is_unc_q}</label>", "<select id='{$m4is_k4yeul['id']}' class='basic-single {$m4is_k4yeul['class']}' name='{$m4is_t5ot4}' style='width:250px;'>";
 foreach ($m4is_wov2 as $m4is_j5sy07 => $m4is_cgxdnf) { $selected = ($m4is_j5sy07 == $m4is_w_o7al) ? 'selected=selected' : '';
 echo "<option value='{$m4is_j5sy07}' {$selected}>{$m4is_cgxdnf}</option>";
 } echo '</select>', m4is_wr40w::m4is_vgnp($m4is_k4yeul['help_id']), "</li>\n\n";
 }  static 
function m4is_q_7l(string $m4is_unc_q = '', string $m4is_t5ot4 = '', string $m4is_w_o7al = '', array $m4is_k4yeul = [] ) { $m4is_r6nh_b = [ 'class' => '', 'disabled' => false, 'help_id' => 0, 'id' => $m4is_t5ot4, 'pattern' => '', 'placeholder' => '', 'size' => 40, 'style' => '', 'type' => 'text', ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_k4yeul['size'] = (int) $m4is_k4yeul['size'];
 $m4is_k4yeul['disabled'] = $m4is_k4yeul['disabled'] ? ' disabled=disabled ' : '';
 $m4is_k4yeul['pattern'] = $m4is_k4yeul['pattern'] ? " pattern='{$m4is_k4yeul['pattern']}' " : '';
 echo "<li><label>{$m4is_unc_q}</label>", "<input type='{$m4is_k4yeul['type']}' id='{$m4is_k4yeul['id']}' {$m4is_k4yeul['pattern']} name='{$m4is_t5ot4}' placeholder='{$m4is_k4yeul['placeholder']}' size='{$m4is_k4yeul['size']}' value='{$m4is_w_o7al}' {$m4is_k4yeul['disabled']}>", self::m4is_vgnp($m4is_k4yeul['help_id']), "</li>\n\n";
 }  static 
function m4is_d_aof(int $m4is_w_o7al = 0, int $m4is_rk9_li = 0, int $m4is_ie9q70 = 0, array $m4is_k4yeul = [] ) : string { $m4is_r6nh_b = [ 'good' => 'font-weight:bold;color:green;', 'ok' => 'font-weight:bold;color:gold;', 'bad' => 'font-weight:bold;color:red;' ];
 $m4is_k4yeul = wp_parse_args($m4is_k4yeul, $m4is_r6nh_b);
 $m4is_qjai = 'good';
 if ($m4is_w_o7al < $m4is_ie9q70) { $m4is_qjai = 'ok';
 } elseif ($m4is_w_o7al > $m4is_rk9_li) { $m4is_qjai = 'bad';
 } return "<span style='{$m4is_k4yeul[$m4is_qjai]}'>{$m4is_w_o7al}</span>";
 }  static 
function m4is_fhpvr7(string $m4is_j5sy07) : string { if (strpos($_SERVER['REQUEST_URI'], '?') === false) { $m4is_tni3w9 = '?';
 } else { $m4is_tni3w9 = '&';
 } return $_SERVER['REQUEST_URI'] . $m4is_tni3w9 . 'memberium_ignore_notice=' . urlencode($m4is_j5sy07);
 }   static 
function m4is_atay(string $m4is_s2ge5, string $m4is_imdo6 = '') : string { $m4is_s2ge5 = strtolower(trim($m4is_s2ge5) );
 $m4is_wvr4fa = 'memberium::welcomecontent::' . $m4is_s2ge5;
 if (MEMBERIUM_BETA) { delete_transient($m4is_wvr4fa);
 } $m4is_z50f = get_transient($m4is_s2ge5);
 if (! $m4is_z50f) { $m4is_wiqy = urlencode($m4is_s2ge5);
 $m4is_bu7y = m4is_pms8y::m4is_e5l8a9()->m4is_u04m();
 if (empty($m4is_imdo6) ) { $m4is_imdo6 = "https://licenseserver.webpowerandlight.com/welcome/index.php?tab={$m4is_wiqy}&version={$m4is_bu7y}";
 } $m4is_d71ub = wp_remote_get($m4is_imdo6);
 if (is_a($m4is_d71ub, 'WP_Error') ) { if (isset($m4is_d71ub->errors['http_request_failed'][0]) ) { $m4is_z50f = "<p>Loading Remote Page Content Failed:  {$m4is_d71ub->errors['http_request_failed'][0]}</p>";
 } else { $m4is_z50f = '<p>Loading Remote Page Content Failed</p>';
 } } else { $m4is_z50f = isset($m4is_d71ub['body']) ? $m4is_d71ub['body'] : '<p>No Content Available</p>';
 if ($m4is_z50f > '') { set_transient($m4is_wvr4fa, $m4is_z50f, 3600);
 } else { $m4is_z50f = '<p>Page content temporarily unavailable.</p>';
 } } } return $m4is_z50f;
 }  static 
function m4is_iwfpy() {  $m4is_uik8w = wp_get_themes();
 $m4is_d3al = [];
 $m4is_d3al[] = [ 'id' => '', 'text' => '(Default)' ];
 foreach ( $m4is_uik8w as $m4is_t5ot4 => $m4is_t65mr ) { $m4is_d3al[] = [ 'id' => $m4is_t5ot4, 'text' => $m4is_t65mr->Name ];
 } return json_encode( $m4is_d3al );
 }  static 
function m4is_t4m9w() { global $wp_roles;
 $m4is_cz1iey = $wp_roles->roles;
 $m4is_fe7xib = [];
 $m4is_xz2btv = [ 'activate_plugins', 'create_user', 'delete_plugins', 'delete_themes', 'delete_users', 'edit_plugins', 'edit_themes', 'edit_users', 'install_plugins', 'install_themes', 'manage_options', 'switch_themes', 'update_core', 'update_plugins', 'update_themes', ];
 foreach ( $m4is_cz1iey as $m4is__t_zel => $m4is_fr4dan ) { $m4is_t5ot4 = $m4is_fr4dan['name'];
 $m4is_a3nxjy = $m4is_fr4dan['capabilities'];
 foreach( $m4is_xz2btv as $m4is_s2ge5 ) { if ( array_key_exists( $m4is_s2ge5, $m4is_a3nxjy ) ) { continue 2;
 } } $m4is_fe7xib[] = [ 'id' => $m4is__t_zel, 'name' => $m4is_fr4dan['name'] ];
 } return $m4is_fe7xib;
 }  static 
function m4is_x26o() { global $wpdb;
 $m4is_p1hqu = implode( "','", m4is_wr40w::m4is_c21wl() );
 $m4is_tovizk = "SELECT `ID`, `post_title` FROM `{$wpdb->posts}` WHERE `post_status` = 'publish' AND `post_type` IN ( '" . $m4is_p1hqu . "' ) ORDER BY `id` ASC;";
 $m4is_afnh = $wpdb->get_results($m4is_tovizk, ARRAY_A );
 $m4is_mz13[] = [ 'id' => 0, 'text' => '(Default)' ];
 $m4is_mz13[] = [ 'id' => -1, 'text' => '(User Profile Page)' ];
 foreach ($m4is_afnh as $m4is_j5sy07=>$page ) { $m4is_mz13[] = [ 'id' => $page['ID'], 'text' => "{$page['post_title']} ({$page['ID']})" ];
 } return json_encode($m4is_mz13 );
 } }

