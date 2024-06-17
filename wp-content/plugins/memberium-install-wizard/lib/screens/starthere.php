<?php

if (!defined('ABSPATH')) {
    die();
}

if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}

//if ( is_object( $this->memberium_core ) ) {
//    $this->memberium_core->processQueue();
//}

if ( ! is_object( $GLOBALS['i2sdk'] ) ) {
    do_action( 'i2sdk_init' );
}

//Initialize global $i2sdk object
global $i2sdk;
if ( ! is_object( $i2sdk ) && class_exists( 'i2sdk_class' ) ) {
    $i2sdk = new i2sdk_class;
}

$appname = '';

if ( is_object( $i2sdk ) ) {
    $api_verified = $i2sdk->getConfigurationOption( 'server_verified' );

    if ( $api_verified ) {
        $result  = $i2sdk->syncCustomFields();
        $appname = $i2sdk->isdk->getAppName();
        $tags = get_option( $appname . '_taglist', false );
        if ( ! $tags ) {
            $tags = $this->getTags( '%' );
            if ( is_array( $tags ) ) {
                update_option( $appname . '_taglist', $tags, false );
            }
        }
    }
}

$_GET['tab'] = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
$memberium_wizards_complete = get_option('memberium_wizards_complete', array());
$memberium_wizards_unlocked = get_option('memberium_wizards_unlocked', array());
$memberium_wizards_progress = get_option('memberium_wizards_progress', array());
$memberium_wizards_lasttab = get_option('memberium_wizards_lasttab', array());

$memberium_wizards_unlocked['setup'] = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['save_setup'])) {
        if ($_POST['save_setup'] == 'Activate Memberium') {
            $memberium_wizards_complete['setup'] = true;
            $memberium_wizards_unlocked['firstcampaign'] = true;
            unset($_GET['wizard']);

            //TODO check that it actually exists.
            

          //  $redirect_url='/installer-wizard/wp-admin/admin.php?page=memberium-installer-wizard';
          //  activate_plugin('memberium2/memberium2.php', $redirect_ur,false,true);


          

        //  add_action( 'activated_plugin', 'cyb_activation_redirect' );

          activate_plugin('memberium2/memberium2.php');
          update_option('memberium_activated', true, false);


  ///        $memberiumoptions = get_option('memberium');

 //         foreach($memberiumoptions as $key => $value)
 //         {
 //          $memberiumoptions[$key]['autoupdate'] = 0;
 //         }
 //         update_option('memberium',$memberiumoptions,false);
//          deactivate_plugins('memberium2/memberium2.php');
//          activate_plugin('memberium2/memberium2.php');
        }
    }

    if (isset($_POST['save_firstcampaign'])) {
        if ($_POST['save_firstcampaign'] == 'Finish Tutorial') {
            $memberium_wizards_complete['firstcampaign'] = true;
            $memberium_wizards_unlocked['protectlaunch'] = true;
            unset($_GET['wizard']);
        }
    }

    if (isset($_POST['save_protectlaunch'])) {
        if ($_POST['save_protectlaunch'] == 'Finish Wizard') {
            $memberium_wizards_complete['protectlaunch'] = true;
            unset ($_GET['wizard']);
            if (file_exists(WP_PLUGIN_DIR . '/elementor/elementor.php')) {
                    activate_plugin('elementor/elementor.php');    
                }    
            deactivate_plugins('memberium-install-wizard/memberium-install-wizard2.php.php');
        }
    }

}

global $i2sdk, $wpdb;

$wizards = array();
$wizards['setup'] = 'Install and Activate Memberium';
$wizards['firstcampaign'] = 'Create Basic Membership Campaign';
$wizards['protectlaunch'] = 'Install Your Page Templates and Launch!';


$wizard_descriptions = array();
$wizard_descriptions['setup'] = 'This step in the wizard will guide you through installing and activating Memberium.';
$wizard_descriptions['firstcampaign'] = 'This step in the wizard will show you how to create an Infusionsoft campaign that generates passwords for new members and sends them a welcome email with their login information.';
$wizard_descriptions['protectlaunch'] = 'This step in the wizard will install your membership site page templates and other final settings. When you finish this, your membership site will almost be ready to launch!';



echo '<div class="wrap memberium-wrap">';
echo '<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700|Open+Sans+Condensed:300|Open+Sans:400,700" rel="stylesheet" type="text/css">';
echo '<div class="memberium">';
echo '<img class="memberium-logo" src="' . plugin_dir_url(MEMBERIUM_INSTALLER_HOME) . 'images/memberium-logo-blue.png" alt="Memberium" />';
echo '</div>';
echo '<h2></h2>'; //This is necessary to show admin notices properly above the main content.
echo '<div style="clear:both;"></div>';
echo '</div>';

if (!isset($_GET['wizard'])) {
    $tabs['dashboard'] = 'Dashboard';

    $current_tab = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? strtolower($_GET['tab']) : 'dashboard';
    echo '<div class="memberium-tabcontent tabcontent" style="margin-top: 10px;">';

    $filename = MEMBERIUM_INSTALLER_LIB . '/screens/starthere-' . $current_tab . '-show.php';
    if (file_exists($filename)) {
        require_once $filename;
    }

} else {

    $current_wizard = isset($_GET['wizard']) && isset($wizards[$_GET['wizard']]) ? strtolower($_GET['wizard']) : 'setup';

    $filename = MEMBERIUM_INSTALLER_LIB . '/screens/starthere-' . $current_wizard . '.php';
    if (file_exists($filename)) {
        require_once $filename;
    }

}

//TODO re-add when ready
//Retrieve Common Data
//$user_count = $this->core->countUsers();
$membership_count = ( isset( $this->settings['memberships'] ) && is_array( $this->settings['memberships'] ) ) ? count( $this->settings['memberships'] ) : 0;

update_option('memberium_wizards_complete', $memberium_wizards_complete, false);
update_option('memberium_wizards_unlocked', $memberium_wizards_unlocked, false);
update_option('memberium_wizards_progress', $memberium_wizards_progress, false);
update_option('memberium_wizards_lasttab', $memberium_wizards_lasttab, false);

