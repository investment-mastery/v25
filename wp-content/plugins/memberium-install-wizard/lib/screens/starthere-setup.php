<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks = get_option('memberium_setup_unlocks', false);
if ($unlocks === false) {
    $unlocks = array();
    $unlocks['welcome'] = true;
    add_option('memberium_setup_unlocks', $unlocks);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save']) && $_POST['save'] == 'Save Infusionsoft API Configuration') {
        $original_api_key = $i2sdk->getConfigurationOption('api_key');
        $original_app_name = $i2sdk->getConfigurationOption('app_name');

        $_POST['i2sdk_api_key'] = trim($_POST['i2sdk_api_key']);
        $_POST['i2sdk_app_name'] = strtolower(trim($_POST['i2sdk_app_name']));
        $i2sdk->setConfigurationOption('server_verified', 0);

        if (!empty($_POST['i2sdk_app_name']) && !empty($_POST['i2sdk_api_key'])) {
            $i2sdk->isdk->configureConnection($_POST['i2sdk_app_name'], $_POST['i2sdk_api_key']);

            $valid_connection = $i2sdk->isdk->verify_Connection();
            $i2sdk->setConfigurationOption('server_verified', ($valid_connection ? 1 : 0));

            if (!$valid_connection) {
                $connection_failure = $i2sdk->isdk->get_ErrorMessage();
            } else {
                $connection_failure = '';
                $i2sdk->setConfigurationOption('app_name', strtolower(trim($_POST['i2sdk_app_name'])));
                $i2sdk->setConfigurationOption('api_key', trim($_POST['i2sdk_api_key']));
                $i2sdk->syncCustomFields();

                if ($original_api_key <> $_POST['i2sdk_api_key'] || $original_app_name <> $_POST['i2sdk_app_name']) {
                    $this->deleteMemberiumOptions();
                }
            }
        }

        $tracking_code = $i2sdk->isdk->getWebTrackingScript();
        $i2sdk->setConfigurationOption('tracking_code', $i2sdk->isdk->getWebTrackingScript());
    }
    if ( isset($_POST['save']) && $_POST['save'] == 'Set Category' ) {
        update_option( $i2sdk->isdk->getAppName() . '_category', (int) $_POST['category_id'], false );
        $unlocks['memberships'] = 1;
    }
    if ( isset($_POST['save']) && $_POST['save'] == 'Create New Membership' ) {
        $this->createMembership( $_POST['membership_name'], $_POST['is_subscription'] );
    }
    if ( isset($_POST['save']) && $_POST['save'] == 'Load Membership Page Templates' ) {
        $result = $this->installAllPageTemplates();
    }
}

$tabs = array();
$tabs['welcome'] = 'Welcome';
$tabs['server'] = 'Web Host';
$tabs['i2sdk'] = 'Infusionsoft';
$tabs['import'] = 'Importer';
$tabs['categories'] = 'Categories';
$tabs['memberships'] = 'Memberships';
$tabs['done'] = 'Done!';

$current_tab = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? strtolower($_GET['tab']) : 'welcome';

echo '<div class="memb-wrap">';
echo '<div class="memberium-navigation">';

$tab_number = 0;
foreach ($tabs as $tab => $name) {
    $tab_number++;
    $tab_unlocked = isset($unlocks[$tab]) && $unlocks[$tab] == true;

    if ($tab == $current_tab) {
        $memberium_wizards_progress['setup'] = 100 * $tab_number / count($tabs);
        $memberium_wizards_lasttab['setup'] = $tab;
        echo "<span class='memberium-navigation-chevron selected'><span class='memberium-navigation-tab'>$name</span></span>";
    } else if ($tab_unlocked) {
        echo "<span class='memberium-navigation-chevron active'><a class='memberium-navigation-tab' href='?page=", $_GET['page'], "&wizard=setup&tab=$tab'>$name</a></span>";
    } else {
        echo "<span class='memberium-navigation-chevron inactive'><span class='memberium-navigation-tab'>$name</span></span>";
    }
}
echo '</div>';
echo '<div class="memberium-tabcontent tabcontent" style="margin-top:10px;">';

$filename = MEMBERIUM_INSTALLER_LIB . '/screens/starthere-setup-' . $current_tab . '-show.php';
if (file_exists($filename)) {
    require_once $filename;
}

echo '</div>';
echo '</div>';

update_option('memberium_setup_unlocks', $unlocks, false);
