<?php
/**
 * Copyright (c) 2018-4 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 *
 */

 class_exists('m4is_pms8y') || die();
 final 
class m4is_ior6_7 { static 
function m4is_vfu9a_(string $m4is_m_mie7 = '', string $m4is_j8ih = '', int $m4is_pv4alu = 0, string $m4is_ljzrq0 = '', $m4is_etj2 = '') { if (isset($_GET['doing_wp_cron']) ) { return;
 } if (is_admin() ) { return;
 } global $user;
 $m4is_a6m52i = $_SERVER['REMOTE_ADDR'] . '::' . isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : $_SERVER['REQUEST_TIME'];
 $m4is_uzfw8j = $m4is_a6m52i . ' :: ' . microtime(true);
 $m4is_uzfw8j .= ' :: ' . (function_exists('get_current_user_id') ? get_current_user_id() : 0);
 if (function_exists('current_filter') ) { $m4is_uzfw8j .= ' :: ' . current_filter();
 } $m4is_uzfw8j .= ' :: ';
 $m4is_uzfw8j .= basename($m4is_m_mie7) . ' -> ' . $m4is_j8ih . ' -> ' . $m4is_pv4alu . " :: ";
 if (! empty($m4is_etj2) ) { $m4is_uzfw8j .= $m4is_ljzrq0 . ' = ';
 if (is_array($m4is_etj2) || is_object($m4is_etj2) ) { $m4is_uzfw8j .= print_r($m4is_etj2, true);
 } elseif (is_bool($m4is_etj2) ) { $m4is_uzfw8j .= $m4is_etj2 ? 'True' : 'False';
 } else { $m4is_uzfw8j .= $m4is_etj2;
 } } else { $m4is_uzfw8j .= $m4is_ljzrq0;
 } $m4is_uzfw8j .= "\n";
 if (MEMBERIUM_DEBUGLOG == 'error_log:') { error_log($m4is_uzfw8j);
 } elseif (MEMBERIUM_DEBUGLOG > '') { file_put_contents(MEMBERIUM_DEBUGLOG, $m4is_uzfw8j, FILE_APPEND);
 } else { echo nl2br($m4is_uzfw8j);
 } } }

