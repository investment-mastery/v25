<?php
/*
Plugin Name: Memberium Installation Wizard
Plugin URI: http://www.memberium.com
Description: Installs the Memberium plugin and other resources.
Version: 2.0.23
Author: Memberium
Author URI: https://www.memberium.com
License: GPL2
*/

if (!defined('ABSPATH')) {
	die();
}

if (is_admin()) {
	define('MEMBERIUM_INSTALLER_HOME', __FILE__);
	define('MEMBERIUM_INSTALLER_LIB', dirname(__FILE__) . '/lib/');

	require_once dirname(__FILE__) . '/lib/core.php';
}

add_action('admin_notices','top_message');

function top_message()
{
	global $pagenow;
	if( ( $_GET['page']=='memberium-welcome-screen' ) && 'index.php' == $pagenow ){
		$memberium_activated = get_option('memberium_activated');
		$thepath             = 'admin.php?page=memberium-installer-wizard&wizard=firstcampaign&tab=welcome';
		$theurl              = admin_url($thepath);
		$thelink             = "<a href='{$theurl}'>Click Here to Resume the Wizard Install Process</a>";

		if ($memberium_activated) {
			echo '<div class="notice notice-warning is-dismissible" style="padding: 5% 30px 10% 30px;">
			<h1>Woohoo!!! Memberium is now activated!</h1>
			<h2>Click the link below to finish setting up Memberium with the wizard...</h2>
			<p> '.$thelink.'</p>
			</div>';
		}
	}
}
