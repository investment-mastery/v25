<?php
/**
 * Copyright (c) 2012-2022 David J Bullock
 * Web Power and Light, LLC
 * https://webpowerandlight.com
 * support@webpowerandlight.com
 */

 class_exists( 'm4is_q1zh2' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_xg75v::m4is_gm1n();
 
class m4is_xg75v { private static $m4is_bnd6ti, $m4is_r2l5;
 static 
function m4is_gm1n() { self::m4is_x6wv();
 self::m4is_lf_e();
 } private 
function __construct() { } private static 
function m4is_x6wv() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_r2l5 = $_GET['tab'] ?? 'dashboard';
 } private static 
function m4is_lf_e() { if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) { if ($_GET['tab'] == 'dashboard' ) { if (isset($_POST['save'] ) && $_POST['save'] == 'Renew License' ) { self::$m4is_bnd6ti->m4is_qdi_3o('', 'settings', 'license_key');
 m4is_u68pu::m4is_k6nh( true );
 m4is_wr40w::m4is_cxesuf('License Updated', 'update' );
 } elseif (isset($_POST['save'] ) && $_POST['save'] == 'Re-Activate Plugin' ) { m4is_fbl5x8::m4is_zvihy( false );
 m4is_wr40w::m4is_cxesuf('System Activation Re-Run', 'update' );
 } elseif (isset($_POST['save'] ) && $_POST['save'] == 'Synchronize Keap' ) { $this->m4is_tk7h4();
 } elseif (isset($_GET['purge-contacts'] ) ) { $m4is_tcw1l = MEMBERIUM_DB_CONTACTS;
 $m4is_tovizk = "TRUNCATE `{$m4is_tcw1l}` ";
 $m4is_zetvnf = $wpdb->query($m4is_tovizk );
 m4is_wr40w::m4is_cxesuf( 'Local Contact Database Purged', 'update' );
 } } if (empty($_GET['tab'] ) || $_GET['tab'] == 'checklist' ) { if (is_array($_POST ) ) { foreach ($_POST as $m4is_s2ge5 => $m4is_w_o7al ) { if ($m4is_w_o7al == '1' ) { self::$m4is_bnd6ti->m4is_q285($m4is_s2ge5 );
 } } } } elseif ($_GET['tab'] == 'updates' ) { m4is_wr40w::m4is_cxesuf('Updates Options Updated' );
  $m4is_w2w8 = [ 'autoupdate', ];
 foreach($m4is_w2w8 as $m4is_s2ge5 ) { if (isset($_POST[$m4is_s2ge5]) ) { $m4is_w_o7al = (int) (bool) trim($_POST[$m4is_s2ge5]);
 self::$m4is_bnd6ti->m4is_qdi_3o($m4is_w_o7al, 'settings', $m4is_s2ge5);
 } }  if (! empty($_POST['manual_upgrade_confirm'] ) ) { m4is_q1zh2::get_instance()->m4is_ev_7($_POST['manual_upgrade'], 'memberium2' );
 } } elseif (isset($_GET['tab'] ) && $_GET['tab'] == 'debug' && isset($_POST['delete-debug'] ) && $_POST['delete-debug'] > '' ) { unlink(MEMBERIUM_DEBUGLOG );
 } if (isset($_GET['tab'] ) && $_GET['tab'] == 'checklist' ) { } } global $wpdb;
 $_GET['tab'] = isset( $_GET['tab'] ) ? $_GET['tab'] : 'dashboard';
  $m4is_jwjgx = [];
 $m4is_jwjgx['checklist'] = '<i class="fa fa-check-square-o"></i> Setup Checklist';
 $m4is_jwjgx['dashboard'] = '<i class="fa fa-tachometer"></i> Dashboard';
 $m4is_jwjgx['integrations'] = '<i class="fa fa-cogs"></i> Integrations';
 $m4is_jwjgx['updates'] = '<i class="fa fa-download"></i> Updates';
 $m4is_jwjgx['credits'] = '<i class="fa fa-users"></i> Credits';
 $m4is_jwjgx['debug'] = '<i class="fa fa-bug"></i> Debug';
 $m4is_k9vt = isset( $_GET['tab'] ) && isset( $m4is_jwjgx[$_GET['tab']] ) ? strtolower( $_GET['tab'] ) : 'dashboard';
 $m4is_bu7y = self::$m4is_bnd6ti->m4is_u04m();
 $m4is_uat4 = __( 'Welcome to Memberium' );
 $m4is_ozovnc = '';
 foreach ($m4is_jwjgx as $m4is_r2l5 => $m4is_t5ot4 ) { $class = ($m4is_r2l5 == $m4is_k9vt ) ? ' nav-tab-active' : '';
 if ($m4is_r2l5 == $m4is_k9vt ) { $m4is_ozovnc .= "<span class='nav-tab{$class}'>{$m4is_t5ot4}</span>";
 } else { $m4is_ozovnc .= "<a class='nav-tab{$class}' href='?page={$_GET['page']}&tab={$m4is_r2l5}'>{$m4is_t5ot4}</a>";
 } } echo <<<HTMLBLOCK
			<div class="wrap about-wrap memberium">
				<img src="//memberium.com/wp-content/uploads/2014/09/memberium-home-illustration6.png" width="125" style="float:right; border-radius:10px;">
				<h3 style="margin-top:0px;margin-bottom:-10px;font-weight:normal;font-size:280%;">{$m4is_uat4} {$m4is_bu7y}</h3>
				<div class="about-text">
					We&rsquo;re activated and ready to help you build your own private Membership community.<br />
					<br />
				</div>
			</div>
			<div class="wrap"> // wrap memberium
				<h4 class="nav-tab-wrapper">
					{$m4is_ozovnc}
				</h4>';
				<div class="memberium_tabcontent" style="margin-top:10px;">

		HTMLBLOCK;
  $m4is_yf71nc = m4is_u68pu::m4is_q8ry();
 $m4is_wld3 = count( self::$m4is_bnd6ti->m4is_oiewvu( 'memberships' ) );
 $m4is_za92q = self::$m4is_bnd6ti->m4is_ev6n7e( "/starthere-{$m4is_k9vt}-show.php" );
 if (file_exists($m4is_za92q ) ) { require_once $m4is_za92q;
 } elseif ($m4is_k9vt == 'checklist' ) { $this->m4is_nx13();
 } else { self::$m4is_bnd6ti->m4is_q285('easter_egg' );
 echo wp_oembed_get('https://www.youtube.com/watch?v=zgvXtexdgAM', ['autoplay' => '1']);
 echo '<p>Klaatu Barada N... Necktie... Neckturn... Nickel...</p><p>It\'s an "N" word, it\'s definitely an "N" word!</p><p>Klaatu... Barada... N...</p>';
 } echo '</div>';
 echo '</div>';
 } }

