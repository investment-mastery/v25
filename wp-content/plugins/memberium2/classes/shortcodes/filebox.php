<?php
/**
 * Copyright (c) 2017-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 m4is_clpok::m4is_x6wv();
 final 
class m4is_clpok { static private $m4is_bnd6ti, $m4is_e2kg, $m4is_j_xo4w, $m4is_o3m_c5;
 static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_e2kg = self::$m4is_bnd6ti->m4is_dpuy9();
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_o3m_c5 = ! m4is_u68pu::m4is_u6mkaw();
 }    static 
function m4is_opub6( $m4is_qnjfv = [], $m4is_z50f = '', $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'capture' => '', 'file_id' => 0, 'missing_text' => 'No such file.', 'text' => 'Click here to Download', ];
 if ( isset( $m4is_qnjfv[0] ) && $m4is_qnjfv[0] == 'showatts' ) { return implode( ',', array_keys( $m4is_r6nh_b ) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_uzfw8j = '';
 $m4is_qnjfv['file_id'] = (int) $m4is_qnjfv['file_id'];
 if ( $m4is_qnjfv['file_id'] > 0 ) { $m4is_h5zf4 = self::$m4is_j_xo4w->getDownloadUrl( (int) $m4is_qnjfv['file_id'] );
 } if ( $m4is_h5zf4 > '' && strpos( $m4is_h5zf4, 'http' ) !== false ) { $m4is_uzfw8j = '<a href="' . $m4is_h5zf4 . '">' . htmlspecialchars( $m4is_qnjfv['text'] ) . '</a>';
 } else { $m4is_uzfw8j = $m4is_qnjfv['missing_text'];
 } if ( ! empty( $m4is_qnjfv['capture'] ) ) { $m4is_uzfw8j = m4is_crqo::m4is_uyv45q( $m4is_uzfw8j, $m4is_qnjfv['capture'] );
 } return $m4is_uzfw8j;
 } static 
function m4is_iczj7( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return '';
 } $m4is_r6nh_b = [ 'capture' => '', 'htmlattr' => '', 'file_id' => 0, ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts( $m4is_r6nh_b, $m4is_qnjfv, 'memberium' );
 $m4is_qnjfv['file_id'] = (int) $m4is_qnjfv['file_id'];
 if ( $m4is_qnjfv['file_id'] > 0 ) { $m4is_h5zf4 = self::$m4is_j_xo4w->getDownloadUrl( $m4is_qnjfv['file_id'] );
 } if ($m4is_h5zf4 > '' && strpos($m4is_h5zf4, 'http') !== FALSE) { $m4is_uzfw8j = $m4is_h5zf4;
 } else { $m4is_uzfw8j = '';
 } return m4is_crqo::m4is__go6j(false, $m4is_uzfw8j, '', $m4is_qnjfv['capture'], $m4is_qnjfv['htmlattr'], '', '');
 } static 
function m4is_l6d8vf( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return '';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'contact_id' => self::$m4is_e2kg, 'filter' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['contact_id'] = (int) $m4is_qnjfv['contact_id'];
 if ( empty( $m4is_qnjfv['contact_id'] ) ) { return;
 } $m4is_uzfw8j = '';
 $m4is_p1ihx = m4is_ru7njr::m4is_x29z( (int) $m4is_qnjfv['contact_id'], false );
 foreach( $m4is_p1ihx as $m4is_s2ge5 => $m4is__9uc ) { $m4is_p1ihx[$m4is_s2ge5] = array_change_key_case( $m4is__9uc, CASE_LOWER );
 } if (! empty($m4is_qnjfv['filter']) ) { if (is_array($m4is_p1ihx) && ! empty($m4is_p1ihx) ) { foreach ($m4is_p1ihx as $m4is_s2ge5 => $m4is_m_mie7) { if (stripos($m4is_m_mie7['filename'], $m4is_qnjfv['filter']) === false) { unset($m4is_p1ihx[$m4is_s2ge5]);
 } } } } unset($m4is_m_mie7);
 $m4is__nmc = count($m4is_p1ihx) > 0;
 if ($m4is__nmc && empty($m4is_z50f) ) { $m4is_z50f = '<p>
			%%line%% - %%cycler%%<br />
			filesize: %%filebox.filesize%%<br />
			filebytes: %%filebox.filebytes%%<br />
			extension: %%filebox.extension%%<br />
			filename: %%filebox.filename%%<br />
			id: %%filebox.id%%<br/>
			public: %%filebox.public%%<br/>
			<a href="%%filebox.openlink%%">open</a><br/>
			<a href="%%filebox.downloadlink%%">Download</a><br/>
			</p>';
 } $m4is_z50f = m4is_crqo::m4is_mm2xd($m4is_z50f, $m4is_carw7y, true, $m4is__nmc);
 $m4is__32_p = 0;
 if ($m4is__nmc) { foreach ($m4is_p1ihx as $m4is_s2ge5 => $m4is_m_mie7) { $m4is__32_p++;
 $m4is__hquf = $m4is_z50f;
 if ($m4is__32_p % 2) { $m4is_p5ehv = 'odd';
 } else { $m4is_p5ehv = 'even';
 } $m4is_gqda4e = wp_nonce_url('?filebox_id=' . urlencode($m4is_m_mie7['id']) . '&filename=' . urlencode($m4is_m_mie7['filename']), 'filebox_download::' . $m4is_m_mie7['id'], 'signature');
 $m4is_pvn3y9 = wp_nonce_url('?filebox_id=' . urlencode($m4is_m_mie7['id']) . '&filename=' . urlencode($m4is_m_mie7['filename']) . '&viewable=1', 'filebox_download::' . $m4is_m_mie7['id'], 'signature');
 $m4is__hquf = str_ireplace('%%line%%', $m4is__32_p, $m4is__hquf);
 $m4is__hquf = str_ireplace('%%cycler%%', $m4is_p5ehv, $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.filesize%%', self::$m4is_bnd6ti->m4is_aerbyl($m4is_m_mie7['filesize'], 0), $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.filebytes%%', $m4is_m_mie7['filesize'], $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.extension%%', $m4is_m_mie7['extension'], $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.filename%%', $m4is_m_mie7['filename'], $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.id%%', $m4is_m_mie7['id'], $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.public%%', $m4is_m_mie7['public'], $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.link%%', '?filebox_id=' . urlencode($m4is_m_mie7['id']) . '&filename=' . urlencode($m4is_m_mie7['filename']), $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.openlink%%', $m4is_pvn3y9, $m4is__hquf);
 $m4is__hquf = str_ireplace('%%filebox.downloadlink%%', $m4is_gqda4e, $m4is__hquf);
 $m4is_uzfw8j .= do_shortcode($m4is__hquf);
 } } else { $m4is_uzfw8j .= do_shortcode($m4is_z50f);
 } return $m4is_uzfw8j;
 } static 
function m4is_lacp( $m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return '';
 } if (is_feed() ) { return;
 } if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return 'n/a';
 } m4is_aoxw::m4is_djr4nd();
 $m4is_wbgl5s = '';
 if (is_user_logged_in() ) { $m4is_s2ge5 = 'memberium::file_upload_msg::' . get_current_user_id();
 $m4is_wbgl5s = trim(get_transient($m4is_s2ge5) );
 delete_transient($m4is_s2ge5);
 } if (empty($m4is_wbgl5s) ) { $m4is_wbgl5s = m4is_w0enbm::m4is_e5l8a9()->m4is_ljy_l();
 } return $m4is_wbgl5s;
 }  static 
function m4is_dkvyw($m4is_qnjfv = [], $m4is_z50f = null, $m4is_carw7y = '' ) { if ( self::$m4is_o3m_c5 ) { return '';
 } static $m4is_glto1 = 1;
 if (is_feed() ) { return;
 } m4is_aoxw::m4is_djr4nd();
 $m4is_r6nh_b = [ 'button_text' => 'Upload', 'contact_id' => self::$m4is_e2kg, 'error_msg' => 'Your file upload failed.', 'failure_actionsets' => '', 'failure_goals' => '', 'failure_tags' => '', 'failure_url' => '', 'maxsize' => 10000000, 'multiple' => false, 'no_errors' => false, 'rename' => '', 'success_actionsets' => '', 'success_goals' => '', 'success_msg' => 'Your file upload completed.', 'success_tags' => '', 'success_url' => '', ];
 if (isset($m4is_qnjfv[0]) && $m4is_qnjfv[0] == 'showatts') { return implode(',', array_keys($m4is_r6nh_b) );
 } $m4is_qnjfv = shortcode_atts($m4is_r6nh_b, $m4is_qnjfv, 'memberium');
 $m4is_qnjfv['multiple'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['multiple'], false);
 $m4is_qnjfv['no_errors'] = m4is_crqo::m4is_c0cy5i($m4is_qnjfv['no_errors'], false);
 $m4is_qnjfv['maxsize'] = (int) wp_convert_hr_to_bytes($m4is_qnjfv['maxsize']);
 $m4is_zc5xw = '';
 if (! $m4is_qnjfv['contact_id']) { return;
 } if ($m4is_qnjfv['maxsize'] > 10000000 || $m4is_qnjfv['maxsize'] < 1) { $m4is_qnjfv['maxsize'] = 10000000;
 } if ($m4is_qnjfv['multiple']) { $m4is_zc5xw = ' multiple="multiple" ';
 } $m4is_sritm6 = base64_encode(serialize([ 'contact_id' => $m4is_qnjfv['contact_id'], 'error_msg' => $m4is_qnjfv['error_msg'], 'failure_actionsets' => $m4is_qnjfv['failure_actionsets'], 'failure_goals' => $m4is_qnjfv['failure_goals'], 'failure_tags' => $m4is_qnjfv['failure_tags'], 'failure_url' => $m4is_qnjfv['failure_url'], 'maxsize' => $m4is_qnjfv['maxsize'], 'no_errors' => $m4is_qnjfv['no_errors'], 'rename' => $m4is_qnjfv['rename'], 'success_actionsets' => $m4is_qnjfv['success_actionsets'], 'success_goals' => $m4is_qnjfv['success_goals'], 'success_msg' => $m4is_qnjfv['success_msg'], 'success_tags' => $m4is_qnjfv['success_tags'], 'success_url' => $m4is_qnjfv['success_url'], ] ) );
 $m4is_k1k7oj = self::$m4is_bnd6ti->m4is_nbmk6($m4is_sritm6);
 $m4is_uzfw8j = '<form id="upload_' . $m4is_glto1 . '" action="" method="POST" enctype="multipart/form-data">' . '<input type="hidden" name="memb_form_type" value="memb_filebox_upload">' . '<input type="hidden" name="params" value="' . $m4is_sritm6 . '">' . '<input type="hidden" name="signature" value="' . $m4is_k1k7oj . '">' . '<fieldset>' . '<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="' . $m4is_qnjfv['maxsize'] . '" />' . '<div>' . '<label for="fileselect">Files to upload:</label>' . '<input type="file" id="fileselect_' . $m4is_glto1 . '" name="uploadedfiles[]" ' . $m4is_zc5xw . ' required="required"/>' . '</div>' . '<div id="submitbutton_' . $m4is_glto1 . '">' . '<button type="submit">' . $m4is_qnjfv['button_text'] . '</button>' . '</div>' . '</fieldset>'. '</form>';
 $m4is_glto1++;
 return $m4is_uzfw8j;
 } }

