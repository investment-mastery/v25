<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks = get_option('memberium_firstcampaign_unlocks', false);
if ($unlocks === false) {
    $unlocks = array();
    $unlocks['welcome'] = true;
    add_option('memberium_firstcampaign_unlocks', $unlocks);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( ! wp_verify_nonce( $_POST['memberium_options_nonce'], MEMBERIUM_INSTALLER_LIB ) ) {
        wp_die( 'nonce error' );
        return;
    }
    $settings = array(
        'password_field',
        'username_field',
    );
    foreach( $settings as $key ) {
        $this->settings['settings'][$key] = isset( $_POST[$key] ) ? stripslashes( trim( $_POST[$key] ) ) : $this->settings['settings'][$key];
    }

    $settings = array(
        'login_url'
    );
    foreach( $settings as $key ) {
        $this->settings['settings'][$key] = isset( $_POST[$key] ) ? (int) trim( $_POST[$key] ) : $this->settings['settings'][$key];
    }

    if (isset($_POST['save_fields'])) {
        $_GET['tab'] = 'httppost';
    }

    if (isset($_POST['new_password_field'])) {
        $_POST['new_password_field'] = trim($_POST['new_password_field']);
        $this->addCustomField($_POST['new_password_field']);
    }

    update_option( 'memberium', $this->settings );
}

$tabs = array();
$tabs['welcome'] = 'Welcome!';
$tabs['password'] = 'Fields';
$tabs['httppost'] = 'Passwords';
$tabs['assignlevel'] = 'Tag';
$tabs['timer'] = 'Timer';
$tabs['email'] = 'Email';
$tabs['publish'] = 'Publish';
$tabs['testuser'] = 'Test';

$current_tab = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? strtolower($_GET['tab']) : 'welcome';

echo '<div class="memb-wrap">';
echo '<div class="memberium-navigation">';

$tab_number = 0;
foreach ($tabs as $tab => $name) {
    $tab_number++;
    $tab_unlocked = isset($unlocks[$tab]) && $unlocks[$tab] == true;

    if ($tab == $current_tab) {
        $memberium_wizards_progress['firstcampaign'] = 100 * $tab_number / count($tabs);
        $memberium_wizards_lasttab['firstcampaign'] = $tab;
        echo "<span class='memberium-navigation-chevron selected'><span class='memberium-navigation-tab'>$name</span></span>";
    } else if ($tab_unlocked) {
        echo "<span class='memberium-navigation-chevron active'><a class='memberium-navigation-tab' href='?page=", $_GET['page'], "&wizard=firstcampaign&tab=$tab'>$name</a></span>";
    } else {
        echo "<span class='memberium-navigation-chevron inactive'><span class='memberium-navigation-tab'>$name</span></span>";
    }
}
echo '</div>';
echo '<div class="memberium-tabcontent tabcontent" style="margin-top:10px;">';

$filename = MEMBERIUM_INSTALLER_LIB . '/screens/starthere-firstcampaign-' . $current_tab . '-show.php';
if ( file_exists( $filename ) ) {
    require_once $filename;
}
echo '</div>';
echo '</div>';

$json_pagelist = $this->getJSONPageList();
echo '<script>';
echo 'var pagelist = ', $json_pagelist, ';';
echo '</script>';
unset( $json_pagelist );

update_option('memberium_firstcampaign_unlocks', $unlocks, false);
