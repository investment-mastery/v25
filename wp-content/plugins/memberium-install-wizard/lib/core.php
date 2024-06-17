<?php
if (!defined('ABSPATH')) {
    header('Location: /');
    die();
}

add_action('plugins_loaded', 'initMemberiumInstaller');

function initMemberiumInstaller()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $memberium_installer = new MemberiumInstaller;

}

class MemberiumInstaller
{

    private $settings;
    private $notices;
    private $public_post_types       = array();

    function __construct()
    {

        add_action('admin_menu', array($this, 'showPluginMenu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueStyles'));

        $this->notices = array();
//        if (is_object($membershipcore)) {
//            $this->settings = $membershipcore->loadMemberiumOptions();
//        }
        $this->settings = $this->getMemberiumOptions();
    }

    function __destruct()
    {
    }

    function showPluginMenu()
    {
        $menu_slug = 'memberium-installer-wizard';

        add_dashboard_page('Memberium Installer', '', 'read', 'memberium-installer', array($this, 'showSummaryDashboard'));
        add_menu_page('Memberium Installer', 'Memberium Wizard', 'manage_options', $menu_slug, array($this, 'showSummaryDashboard'), 'dashicons-heart', '3');
    }

    function enqueueStyles($hook)
    {
        if ('toplevel_page_memberium-installer-wizard' != $hook) {
            return;
        }

        wp_register_style('memberium.css', plugins_url('/../css/memberium.css', __FILE__));
        wp_enqueue_style('memberium.css');

//        wp_register_script('memberium_wizard_js', plugins_url('/../js/wizard.js', __FILE__), false, MEMBERIUM_VERSION);
        wp_register_script('memberium_wizard_js', plugins_url('/../js/wizard.js', __FILE__), false, '2.100');
        wp_enqueue_script('memberium_wizard_js');
    }

    function showSummaryDashboard()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $this->installDependencies();

        require_once MEMBERIUM_INSTALLER_LIB . 'screens/starthere.php';
    }

    //---Core Functions-------------------------------------------------------------------------------------------------

    function loadModule( $type, $url ) {
        require_once ABSPATH .'/wp-admin/includes/file.php'; //the cheat
        ignore_user_abort();
        file_put_contents( ABSPATH . '.maintenance', '<?php $upgrading = time();' );
        $update_file = $response = download_url( $url, 300 );

        if ( $type == 'plugin' || $type == 'dropin' ) {
            $plugin_folder = WP_PLUGIN_DIR;
            if ( file_exists( $update_file ) ) {
                WP_Filesystem();
                unzip_file( $update_file, $plugin_folder );
            }
        } else if ( $type == 'theme' ) {
            $theme_folder = WP_CONTENT_DIR . '/themes';
            if ( file_exists( $update_file ) ) {
                WP_Filesystem();
                unzip_file( $update_file, $theme_folder );
            }
        }

        unlink( $update_file );

        unlink( ABSPATH . '.maintenance' );
    }

    function installDependencies()
    {
        if (!is_plugin_active('i2sdk2/i2sdk2.php')) {
            if (!file_exists(WP_PLUGIN_DIR . '/i2sdk2/')) {
                $this->loadModule('plugin', 'https://memberium.com/download-i2sdk');
            }
            if (file_exists(WP_PLUGIN_DIR . '/i2sdk2/i2sdk2.php')) {
                activate_plugin('i2sdk2/i2sdk2.php');
            }
        }
        if (!file_exists(WP_PLUGIN_DIR . '/memberium2/')) {
			$this->loadModule('plugin', 'https://memberium.com/download/');
			// $this->loadModule('plugin', 'https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/memberium2-2.150.11.zip');
        }
    }

    //---1st Wizard Functions (From old installer wizard)---------------------------------------------------------------

    function createCategory($category_name, $categories)
    {
        global $i2sdk;

        $found = in_array(strtolower($category_name), array_map('strtolower', $categories));
        if (!$found) {
            $row = array('CategoryName' => $category_name);
            $i2sdk->isdk->dsAdd('ContactGroupCategory', $row);
            $categories = $this->getCategories();
        }

        return $categories;
    }

    function getCategories($categoryx = '%')
    {
        global $i2sdk;

        $appname = $i2sdk->isdk->getAppName();

        $table = 'ContactGroupCategory';
        $limit = 1000;
        $page = 0;
        $query = array(
            'CategoryName' => $categoryx
        );
        $return_fields = array(
            'Id',
            'CategoryName',
            'CategoryDescription'
        );
        $result = array();
        do {
            set_time_limit(30);
            $categories = $i2sdk->isdk->dsQueryOrderBy($table, $limit, $page, $query, $return_fields, 'Id', true);
            if (is_array($categories)) {
                foreach ($categories as $category) {
                    $result[$category['Id']] = $category['CategoryName'];
                }
            }
            usleep(500000);
            $page++;
        } while (count($categories) == $limit);
        unset($categories, $category);

        asort($result);
        return $result;
    }

    function importiSDKSettings()
    {

        global $i2sdk;

        if (is_object($i2sdk)) {
            $app_name = $i2sdk->getConfigurationOption('app_name');
            $api_key = $i2sdk->getConfigurationOption('api_key');
            if (!empty ($app_name) && !empty($api_key)) {
                $api = array('app_name' => $app_name, 'api_key' => $api_key);
                return $api;
            }
        }

        // Check Automation Clinic
        $app_name = get_option('is_user_name', '');
        $api_key = get_option('is_key', '');
        if (!empty ($app_name) && !empty($api_key)) {
            $api = array('app_name' => $app_name, 'api_key' => $api_key);
            return $api;
        }

        // Check FuseDesk

        // Check iMember360
        $options = get_option('infusion4wp_options', array());
        if (!empty($options)) {
            $app_name = isset($options['infu_service_url']) ? $options['infu_service_url'] : '';
            $api_key = isset($options['infu_service_key']) ? $options['infu_service_key'] : '';
            if (!empty ($app_name) && !empty($api_key)) {
                $api = array('app_name' => $app_name, 'api_key' => $api_key);
                return $api;
            }
        }
    }

    function hasiMember360Settings()
    {
        $im360_options = get_option('infusion4wp_options', array());
        return !empty($im360_options);
    }

    function importiMember360Settings()
    {

        // Convert Setup Options
        $im360_options = get_option('infusion4wp_options', array());
        if (!empty($im360_options)) {

            global $wpdb, $i2sdk;

            $memberium_options = get_option('memberium', array());
            $appname = $i2sdk->isdk->getAppName();
            $tags = get_option($appname . '_taglist', false);
            $setting_count = 0;
            $setting_map = array();

            $setting_map['404_page'] = '';
            $setting_map['admin_bar'] = '';
            $setting_map['allow_dupes'] = '';
            $setting_map['auto_logout'] = '';
            $setting_map['comments_options_activate'] = '';
            $setting_map['comments_options_display'] = '';
            $setting_map['comments_options_reply'] = '';
            $setting_map['custfld_lastlogin'] = 'last_login_field';
            $setting_map['custfld_password'] = 'password_field';
            $setting_map['enable_grc_unit'] = '';
            $setting_map['enable_loginlog'] = 'login_log';
            $setting_map['enable_wpadmin'] = 'allow_wpadmin';
            $setting_map['encrypt_passwd'] = '';
            $setting_map['first_login_page'] = '';
            $setting_map['force_login'] = 'site_lock_enabled';
            $setting_map['googleanalytics'] = '';
            $setting_map['googleanalytics_method'] = '';
            $setting_map['googleanalytics_ua'] = '';
            $setting_map['login_page'] = 'login_url';
            $setting_map['min_passlen'] = 'min_password_length';
            $setting_map['registration_page'] = '';
            $setting_map['registration_static'] = '';
            $setting_map['rss_protect'] = 'protect_feeds';
            $setting_map['SESSIONINTERVAL'] = '';
            $setting_map['siteban_tag'] = 'site_ban_tag';
            $setting_map['upsell_page'] = '';
            $setting_map['enable_wpadmin_cap'] = '';
            $setting_map['avatar_size'] = '';
            $setting_map['enable_opti'] = '';
            $setting_map['suppress_empty_menu'] = '';
            $setting_map['admin_hide_menu'] = '';
            $setting_map['disable_wpautop'] = '';
            $setting_map['disable_wptexturize'] = '';
            $setting_map['enable_excerpt'] = '';
            $setting_map['disable_excerpt_links'] = '';
            $setting_map['excerpt_length'] = '';
            $setting_map['excerpt_wrapper'] = '';
            $setting_map['excerpt_wrapper_open'] = '';
            $setting_map['excerpt_wrapper_close'] = '';
            $setting_map['mail_fromname'] = '';
            $setting_map['mail_fromaddr'] = '';
            $setting_map['allow_bots'] = '';
            $setting_map['allow_gfc'] = '';
            $setting_map['enable_cclogin'] = '';
            $setting_map['enable_grc'] = '';
            $setting_map['login_actionsets'] = '';
            $setting_map['logout_actionsets'] = '';
            $setting_map['enable_slug'] = '';
            $setting_map['i4w_gatracker'] = '';
            $setting_map['i4w_gatracker_source'] = '';
            $setting_map['i4w_gatracker_campaign'] = '';
            $setting_map['i4w_gatracker_medium'] = '';
            $setting_map['i4w_gatracker_content'] = '';
            $setting_map['i4w_gatracker_term'] = '';
            $setting_map['i4w_gatracker_referurl'] = '';
            $setting_map['i4w_gatracker_ipnr'] = '';
            $setting_map['i4w_gatracker_firstvisit'] = '';
            $setting_map['i4w_gatracker_sessions'] = '';
            $setting_map['i4w_gatracker_city'] = '';
            $setting_map['i4w_gatracker_region'] = '';
            $setting_map['i4w_gatracker_country'] = '';
            $setting_map['i4w_gatracker_latitude'] = '';
            $setting_map['i4w_gatracker_longitude'] = '';
            $setting_map['infuanalytics'] = '';
            $setting_map['infuanalytics_code'] = '';
            $setting_map['enable_cclogin_mail'] = '';
            $setting_map['i4w_s3_key'] = '';
            $setting_map['i4w_s3_secret'] = '';
            $setting_map['i4w_s3_expire'] = '';
            $setting_map['i4w_s3_host'] = '';
            $setting_map['i4w_s3_bucket'] = '';
            $setting_map['cache_refresh_frequency'] = '';
            foreach ($setting_map as $oldkey => $newkey) {
                if (!empty($im360_options[$oldkey]) && !empty($newkey)) {
                    $memberium_options[$newkey] = $im360_options[$oldkey];
                    echo 'Importing iMember360 setting: ', $oldkey, " = ", $im360_options[$oldkey], "\n";
                    $setting_count++;
                }
            }

            if (defined('I4W_EXCLUDE_TAG_CATEGORIES')) {
                $memberium_options['ignore_tag_categories'] = constant('I4W_EXCLUDE_TAG_CATEGORIES');
                $setting_count++;
            }
            if (defined('I4W_EXCLUDE_FIELDS')) {
                $memberium_options['ignore_contact_fields'] = constant('I4W_EXCLUDE_FIELDS');
                $setting_count++;
            }
            if (defined('I4W_EXCLUDE_TAGS')) {
            }

            echo 'Imported ', $setting_count, " settings\n\n";
            // echo '<pre>', print_r( $im360_options, true ), '</pre>';

            // Convert Membership Levels
            if (!empty($im360_options['membership_levels'])) {
                foreach ($im360_options['membership_levels'] as $key => $im360_membership) {
                    if (!isset($memberium_options[$key])) {
                        $base_tag_name = isset($tags[$key]) ? $tags[$key] : '';

                        $payf_id = array_search($base_tag_name . 'PAYF', $tags);
                        $payf_id = $payf_id ? $payf_id : 0;

                        $susp_id = array_search($base_tag_name . 'SUSP', $tags);
                        $susp_id = $susp_id ? $susp_id : 0;

                        $canc_id = array_search($base_tag_name . 'CANC', $tags);
                        $canc_id = $canc_id ? $canc_id : 0;

                        $memberium_options['memberships'][$key] = array(
                            'cancel_id' => $canc_id,
                            'level' => $im360_membership['level'],
                            'login_page' => $im360_membership['redr'],
                            'logout_page' => $im360_membership['lout'],
                            'login_redirect_priority' => $im360_membership['level'],
                            'main_id' => $key,
                            'name' => $im360_membership['name'],
                            'payf_id' => $payf_id,
                            'roles' => '',
                            'suspend_id' => $susp_id,
                            'theme' => ($im360_membership['theme'] <> 'Site Default') ? $im360_membership['theme'] : '',
                        );

                        echo 'Converting Membership Level ', $im360_membership['name'], "\n";
                    }
                }
                update_option('memberium', $memberium_options);
                echo 'Imported ', count($memberium_options['memberships']), " Membership Levels\n\n";
            }

            // Convert Page and Post Protections
            $sql = "SELECT * FROM `{$wpdb->posts}` WHERE `post_status` <> 'auto-draft' && `post_type` <> 'revision' ORDER BY `ID`; ";
            $rows = $wpdb->get_results($sql, ARRAY_A);
            if (is_array($rows)) {
                foreach ($rows as $key => $row) {

                    $post_id = $row['ID'];

                    unset($row['post_excerpt'], $row['post_content']);
                    echo 'Converting Post ', $row['ID'], ' - ', $row['post_title'], "\n";
                    // echo '<p>', print_r( $row, true ), '</p>';

                    // Check for Any Access
                    $post_tags = explode(',', $row['group_access']);
                    $all_access = (int)in_array('-1', $post_tags);
                    update_post_meta($post_id, '_is4wp_any_membership', $all_access);

                    // group_access
                    if (!$all_access) {
                        if (!empty($row['group_access'])) {
                            $csv = explode(',', $row['group_access']);
                            foreach ($csv as $k => $v) {
                                if ($v == -1) {
                                    unset($csv[$k]);
                                }
                            }
                            $csv = implode(',', $csv);
                            update_post_meta($post_id, '_is4wp_membership_levels', $csv);
                        }
                    }

                    // public_only
                    if (!empty($row['public_only'])) {
                        update_post_meta($post_id, '_is4wp_anonymous_only', $row['public_only']);
                    }

                    // tag_list
                    if (!empty($row['tag_list'])) {
                        update_post_meta($post_id, '_is4wp_access_tags', $row['tag_list']);
                    }

                    // contact_list
                    if (!empty($row['contact_list'])) {
                        add_post_meta($post_id, '_is4wp_contact_ids', $row['contact_list'], true);
                    }

                    // hide_menu
                    if (!empty($row['hide_menu'])) {
                        add_post_meta($post_id, '_is4wp_hide_from_menu', $row['hide_menu'], true);
                    }

                    // release_cycle
                    // more
                    // start_prot
                    // stop_prot
                    // actionset_list
                    // ignore_excerpt
                }
                echo 'Scanned ', count($rows), " pages and posts for security settings\n\n";
            }

            // Convert Post Meta
            // _i4w_wpautop
            // _i4w_texturize

            // Save Widgets
        }
    }

    function getMemberships()
    {
        $memberium_options = get_option('memberium', false);

        if ($memberium_options === false) {

            $memberium_options = array();
            $memberium_options['memberships'] = array();

            add_option('memberium', $memberium_options);
        }

        if (isset($memberium_options['memberships']) && !empty($memberium_options['memberships'])) {
            return $memberium_options['memberships'];
        }
    }

    function getEnvironment()
    {
        $integrations = array();

        // Scan Extensions
        $signatures = array();

        // Requirements
        $signatures[] = array('name' => 'PHP Version', 'type' => 'php_version', 'fingerprint' => '5.4', 'help' => 0000, 'class' => 'requirement', 'message' => 'Your copy of PHP is below the minimum requirement.');
        $signatures[] = array('name' => 'CURL', 'type' => 'function', 'fingerprint' => 'curl_version', 'help' => 0000, 'class' => 'requirement', 'message' => 'The CURL Library is required by the Infusionsoft API library, but is missing from your PHP.');
        $signatures[] = array('name' => 'XML Parser', 'type' => 'function', 'fingerprint' => 'xml_parser_create', 'help' => 0000, 'class' => 'requirement', 'message' => 'The XML Parser Library is required by the Infusionsoft API library, but is missing from your PHP.');
        $signatures[] = array('name' => 'WordPress Memory Limit', 'type' => 'constant', 'fingerprint' => 'WP_MEMORY_LIMIT', 'help' => 0000, 'class' => 'requirement', 'min' => '40M', 'max' => '1024M', 'message' => '');
        $signatures[] = array('name' => 'Memberium', 'type' => 'pluginfiles', 'fingerprint' => 'memberium2/memberium2.php', 'help' => 0000, 'class' => 'requirement', 'message' => 'The Memberium plugin could not be installed.');
        $signatures[] = array('name' => 'i2SDK', 'type' => 'pluginfiles', 'fingerprint' => 'i2sdk2/i2sdk2.php', 'help' => 0000, 'class' => 'requirement', 'message' => 'The i2SDK plugin could not be installed.');
        $signatures[] = array('name' => 'iMember360', 'type' => 'option', 'fingerprint' => 'infusion4wp_options', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'CloudFlare CDN', 'type' => 'environment', 'fingerprint' => 'HTTP_CF_RAY', 'help' => 0000, 'class' => 'bad');
        $signatures[] = array('name' => 'Load Balancer / Proxy', 'type' => 'environment', 'fingerprint' => 'X_FORWARDED_FOR', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'BadgeOS Achievement System', 'type' => 'plugin', 'fingerprint' => 'badgeos/badgeos.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'bbPress Forums', 'type' => 'plugin', 'fingerprint' => 'bbpress/bbpress.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'BuddyPress Community', 'type' => 'plugin', 'fingerprint' => 'buddypress/bp-loader.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'Fusedesk', 'type' => 'plugin', 'fingerprint' => 'fusedesk/fusedesk.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'Conditional Widgets', 'type' => 'plugin', 'fingerprint' => 'conditional-widgets/cets_conditional_widgets.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'Divi', 'type' => 'theme', 'fingerprint' => 'Divi', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'GeoIP Detection', 'type' => 'plugin', 'fingerprint' => 'geoip-detect/geoip-detect.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'Gravity Forms', 'type' => 'plugin', 'fingerprint' => 'gravityforms/gravityforms.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'iMember360', 'type' => 'plugin', 'fingerprint' => 'infusion4wp/infusion4wpload.php', 'help' => 0000, 'class' => 'bad');
        $signatures[] = array('name' => 'Infusionsoft WP', 'type' => 'plugin', 'fingerprint' => 'infusionsoft-for-developers/infusionsoft-wp.php', 'help' => 0000, 'class' => 'bad');
        $signatures[] = array('name' => 'Intercom.IO for WordPress', 'type' => 'plugin', 'fingerprint' => 'intercom-for-wordpress/intercom-for-wordpress.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'LearnDash', 'type' => 'plugin', 'fingerprint' => 'sfwd-lms/sfwd_lms.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'Memberium', 'type' => 'plugin', 'fingerprint' => 'memberium2/memberium2.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'Nextend Facebook Connect', 'type' => 'plugin', 'fingerprint' => 'nextend-facebook-connect/nextend-facebook-connect.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'OptimizeMember', 'type' => 'plugin', 'fingerprint' => 'optimizeMember/optimizeMember.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'OptimizePress Plugin', 'type' => 'plugin', 'fingerprint' => 'optimizePressPlugin/optimizepress.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'OptimizePress Theme', 'type' => 'theme', 'fingerprint' => 'optimizePressTheme', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'UlimateMember', 'type' => 'plugin', 'fingerprint' => 'ultimate-member/index.php', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'WP Bakery Visual Composer', 'type' => 'constant', 'fingerprint' => 'WPB_VC_VERSION', 'help' => 0000, 'class' => 'good');
        $signatures[] = array('name' => 'WP Super Cache', 'type' => 'plugin', 'fingerprint' => 'wp-super-cache/wp-cache.php', 'help' => 0000, 'class' => 'bad');
        $signatures[] = array('name' => 'Yoast Google Analytics', 'type' => 'plugin', 'fingerprint' => 'google-analytics-for-wordpress/googleanalytics.php', 'help' => 0000, 'class' => 'good');

        $themes = wp_get_themes();
        $plugins = get_option('active_plugins');

        foreach ($signatures as $signature) {
            $found = false;
            unset($value);

            if ($signature['type'] == 'php_version') {
                $value = phpversion();
                $found = $value > $signature['fingerprint'];
                if ($found) {
                    $signature['message'] = 'Good (v' . $value . ' found)';
                } else {
                    $signature['message'] = 'v' . $value . ' found, v' . $signature['fingerprint'] . ' required';
                }

            } elseif ($signature['type'] == 'option') {
                $found = (bool)get_option($signature['fingerprint'], false);
                if ($found) {
                    $signature['message'] = $signature['name'] . ' Detected';
                }
            } elseif ($signature['type'] == 'extension') {
                $found = extension_loaded($signature['fingerprint']);
                if ($found) {
                    $signature['message'] = 'Good';
                }
            } elseif ($signature['type'] == 'function') {
                $found = function_exists($signature['fingerprint']);
                if ($found) {
                    $value = eval('return ' . $signature['fingerprint'] . '();');
                    $signature['message'] = 'Found';
                }

            } elseif ($signature['type'] == 'environment') {
                $found = isset($_SERVER[$signature['fingerprint']]);
            } elseif ($signature['type'] == 'theme') {
                $found = isset($themes[$signature['fingerprint']]);
            } elseif ($signature['type'] == 'plugin') {
                $found = in_array($signature['fingerprint'], $plugins);
            } elseif ($signature['type'] == 'pluginfiles') {
                $found = file_exists(WP_PLUGIN_DIR . '/' . $signature['fingerprint']);
                if ($found) {
                    $signature['message'] = 'Plugin Installed';
                }
            } elseif ($signature['type'] == 'constant') {
                $found = defined($signature['fingerprint']);
                if ($found) {
                    $value = constant($signature['fingerprint']);
                    $signature['message'] = $value;
                }
            }

            if ($found) {
                if ($signature['class'] == 'requirement') {
                    $integrations['required'][$signature['name']] = $signature;
                } else {
                    $integrations['detected'][$signature['name']] = $signature;
                }
            } else {
                if ($signature['class'] == 'requirement') {
                    $integrations['failures'][$signature['name']] = $signature;
                } elseif ($signature['class'] == 'good') {
                    $integrations['missing'][$signature['name']] = $signature;
                }

            }
        }

        return $integrations;
    }

    function createMembership($membership_name, $is_subscription)
    {
        global $i2sdk;

        $membership_name = trim($membership_name);
        $is_subscription = (boolean)$is_subscription;
        $tags = array_map('strtolower', $this->getTags('%' . $membership_name . '%'));
        $appname = $i2sdk->isdk->getAppName();
        $category_id = (int)get_option($appname . '_category', 0);
        $memberium_options = $this->getMemberiumOptions();

        $main_tag_id = array_search(strtolower($membership_name), $tags);
        $payf_tag_id = array_search(strtolower($membership_name . 'PAYF'), $tags);
        $canc_tag_id = array_search(strtolower($membership_name . 'CANC'), $tags);
        $susp_tag_id = array_search(strtolower($membership_name . 'SUSP'), $tags);

        // Generate Missing Tags
        $tag = array(
            'GroupName' => $membership_name,
            'GroupCategoryId' => (int)$category_id,
            'GroupDescription' => 'Created by Memberium Installer'
        );
        if (!$main_tag_id) {
            $main_tag_id = (int)$i2sdk->isdk->dsAdd('ContactGroup', $tag);
        }
        if ($main_tag_id > 0) {
            if (!$payf_tag_id) {
                if ($is_subscription) {
                    $tag['GroupName'] = $membership_name . 'PAYF';
                    $payf_tag_id = (int)$i2sdk->isdk->dsAdd('ContactGroup', $tag);
                } else {
                    $payf_tag_id = 0;
                }
            }
            if (!$canc_tag_id) {
                if ($is_subscription) {
                    $tag['GroupName'] = $membership_name . 'CANC';
                    $canc_tag_id = (int)$i2sdk->isdk->dsAdd('ContactGroup', $tag);
                } else {
                    $canc_tag_id = 0;
                }
            }
            if (!$susp_tag_id) {
                if ($is_subscription) {
                    $tag['GroupName'] = $membership_name . 'SUSP';
                    $susp_tag_id = (int)$i2sdk->isdk->dsAdd('ContactGroup', $tag);
                } else {
                    $susp_tag_id = 0;
                }
            }
        }

        if ($main_tag_id > 0) {
            $memberium_options['memberships'][$main_tag_id] = array(
                'cancel_id' => $canc_tag_id,
                'level' => 0,
                'login_page' => 0,
                'logout_page' => 0,
                'login_redirect_priority' => 0,
                'main_id' => $main_tag_id,
                'name' => $membership_name,
                'payf_id' => $payf_tag_id,
                'roles' => '',
                'suspend_id' => $susp_tag_id,
                'theme' => '',
            );
        }

        update_option('memberium', $memberium_options, false);
    }

    function getTags($tagx = '%')
    {
        global $i2sdk, $wpdb;

        $appname = $i2sdk->isdk->getAppName();

        $table = 'ContactGroup';
        $limit = 1000;
        $page = 0;
        $query = array(
            'GroupName' => $tagx
        );
        $return_fields = array(
            'Id',
            'GroupName',
        );

        $result = array();
        do {
            $tags = $i2sdk->isdk->dsQueryOrderBy($table, $limit, $page, $query, $return_fields, 'Id', TRUE);
            set_time_limit(30);
            if (is_array($tags)) {
                foreach ($tags as $tag) {
                    $result[$tag['Id']] = $tag['GroupName'];
                }
            }
            usleep(500000);
            $page++;
        } while (count($tags) == $limit);

        asort($result);
        return $result;
    }

    function getMemberiumOptions()
    {
        $memberium_options = get_option('memberium', false);

        if ($memberium_options === false) {

            $memberium_options = array();
            $memberium_options['memberships'] = array();

            add_option('memberium', $memberium_options);
        }

        return $memberium_options;
    }

    function deleteMemberiumOptions()
    {
        delete_option('memberium');
    }

    function installAllPageTemplates()
    {
        $templates = $this->getPageTemplateList();
        foreach ($templates as $template_id => $template) {
            $this->installPageTemplate(0, $template_id);
        }

        return is_array($templates) ? count($templates) : 0;
    }

    function getPageTemplateList()
    {
        $data = wp_remote_get('http://licenseserver.memberium.com/updates/page-templates.php');
        $data = json_decode($data['body'], true);

        if (is_array($data)) {
            return $data;
        }

        return array();
    }

    function installPageTemplate($post_id, $template_id)
    {
        if ($post_id === '') {
            return;
        }

        $templates = $this->getPageTemplateList();

        if (!isset($templates[$template_id])) {
            return;
        }
        $template = $templates[$template_id];
        unset($templates);

        if ($post_id > 0) {
            $old_post = get_post($post_id, 'ARRAY_A');
        } else {
            $old_post = array();
        }

        if (!empty($template['content_url'])) {
            $response = wp_remote_get($template['content_url']);
            $remote_template = json_decode($response['body'], true);
            $template['post']['post_content'] = $remote_template['post']['post_content'];
            $template['post']['post_excerpt'] = $remote_template['post']['post_excerpt'];
        }

        $post = array();

        $post['ID'] = $post_id;
        $post['post_title'] = empty($old_post['post_title']) ? $template['post']['post_title'] : $old_post['post_title'];
        $post['post_content'] = $template['post']['post_content'];
        $post['post_type'] = empty($old_post['post_type']) ? $template['post']['post_type'] : $old_post['post_type'];
        $post['post_status'] = empty($old_post['post_status']) ? 'draft' : $old_post['post_status'];

        $post['meta_input'] = $template['meta'];

        $_POST['post_content'] = $post['post_content'];
        $_POST['post_excerpt'] = $post['post_excerpt'];

        wp_insert_post($post, false);
        foreach ($template['meta'] as $key => $value) {
            update_post_meta($post_id, $key, $value);
        }
    }


    //---2nd/3rd Wizard Functions (From Main Plugin)--------------------------------------------------------------------

    function getHelpLink($id, $text = "What's this?")
    {
        $link = '';
        if ($id == (int)$id && (int)$id > 0) {
            // $link =' (<a href="https://www.memberium.com/?page_id=' . $id . '" target="_blank"><strong>?</strong></a>) ';
            $link = ' (<strong><a href="https://www.memberium.com/?page_id=' . $id . '" target="_blank">' . $text . '</a></strong>) ';
        }

        return $link;
    }

    function addCustomField($field_name, $field_type = 'Text', $header_id = 0)
    {
        global $i2sdk;

        if (empty($field_name)) {
            return;
        }
        $field_name = trim($field_name);
        $header_id = (int)$header_id;
        $field_type = trim($field_type);

        if ($header_id == 0) {
            $returnFields = array('Id', 'Name');
            $query = array('Id' => '%');
            $headers = $i2sdk->isdk->dsQuery('DataFormGroup', 1000, 0, $query, $returnFields);
            $header_id = (int)$headers[0]['Id'];
        }

        if ($header_id > 0) {
            $result = $i2sdk->isdk->addCustomField('Contact', trim($_POST['new_password_field']), $field_type, $header_id);
            $i2sdk->syncCustomFields();
        } else {
            $this->addAdminNotice('Unable to add new custom field.  Please create a custom tab and custom group in Infusionsoft first.');
        }
    }

    /**
     * [addAdminNotice description]
     *
     * @param [type]  $message [description]
     * @param string $type [description]
     */
    function addAdminNotice($message, $type = 'update')
    {
        $this->notices[] = array('type' => $type, 'message' => $message);
    }

    function showAdminNotice()
    {
        if (is_array($this->notices)) {
            foreach ($this->notices as $notice) {
                switch ($notice['type']) {
                    case 'update':
                        $classname = 'updated';
                        break;

                    case 'error':
                        $classname = 'error';
                        break;
                }
                echo '<div class="', $classname, '"><p>', $notice['message'], '</p></div>';//
            }
        }
    }

    public function getJSONPageList( $params = array() ) {
        $defaults = array(
            'exclude' => 'topic,reply' . ( defined( 'MEMBERIUM_IGNORE_POSTTYPE' ) ? ( ',' . MEMBERIUM_IGNORE_POSTTYPE ) : '' ),
            'entries' => array(),
        );
        $params = wp_parse_args( $params, $defaults );
        $params['exclude'] = "'" . implode( "','", explode( ',', $params['exclude'] ) ) . "'";
        unset( $defaults );

        global $wpdb;

        $sql             = "SELECT `ID`, `post_title` FROM `{$wpdb->posts}` WHERE `post_status` = 'publish' AND `post_type` IN ( '" . implode( "','", $this->public_post_types ) . "' ) AND `post_type` NOT IN ( " . $params['exclude'] . " ) ORDER BY `id` ASC;";
        $pages           = $wpdb->get_results( $sql, ARRAY_A );

        if ( ! empty( $params['entries'] ) ) {

        }

        $json_pagelist[] = array( 'id' => 0, 'text' => '( Default / Homepage )' );
        foreach ( $pages as $id=>$page ) {
            $json_pagelist[] = array( 'id' => $page['ID'], 'text' => $page['post_title'] . ' (' . $page['ID'] . ')' );
            unset( $pages[$id] );
        }

        unset( $page, $sql );
        $json_pagelist = json_encode( $json_pagelist );

        return $json_pagelist;
    }

    function getEnvironmentSignatures( $platform ) {
        $signatures     = array();
        $transient_name = 'memberium::environment_signatures';

        // Get Signatures
        $signatures = get_transient( $transient_name );
        $signatures = false;
        if ( ! is_array( $signatures ) ) {
            $url = 'http://licenseserver.webpowerandlight.com/memberium/environment-fingerprints.php';
            $remote = wp_remote_get( $url );
            if (  ! empty( $remote['body'] ) ) {
                $signatures = json_decode( $remote['body'], true );

                // Remove Other Platforms
                foreach( $signatures as $key => $signature ) {
                    if ( ! empty( $signature['platforms'] ) ) {
                        if ( false === stripos( $signature['platforms'], $platform ) ) {
                            unset( $signatures[$key] );
                        }
                    }
                }
                set_transient( $transient_name, $signatures, 12 * HOUR_IN_SECONDS );
            }
        }
        return $signatures;
    }

    function scanEnvironment() {
        $integrations   = array();
        $platform       = 'm4is';

        if ( defined( 'GD_VIP' ) && defined( 'REDIS_SOCKET' ) ) {
            define( 'GD_MANAGED_HOSTING', 1 );
        }

        // Get Signatures
        $signatures = $this->getEnvironmentSignatures( $platform );

        // $themes  = wp_get_themes();
        $plugins = get_option( 'active_plugins' );

        $current_theme = wp_get_theme();
        $current_theme = $current_theme->parent() ? $current_theme->parent() : $current_theme;

        foreach ( $signatures as $signature ) {
            $found = false;
            if ( $signature['type'] == 'extension' ) {
                $found = extension_loaded( $signature['fingerprint'] );
            }
            elseif ( $signature['type'] == 'function' ) {
                $found = function_exists( $signature['fingerprint'] );
            }
            elseif ( $signature['type'] == 'class' ) {
                $found = class_exists( $signature['fingerprint'] );
            }
            elseif ( $signature['type'] == 'environment' ) {
                $found = isset( $_SERVER[$signature['fingerprint']] );
            }
            elseif ( $signature['type'] == 'theme' ) {
                $found = $current_theme->get_stylesheet() == $signature['fingerprint'];
            }
            elseif ( $signature['type'] == 'plugin' ) {
                $found = in_array( $signature['fingerprint'], $plugins );
            }
            elseif ( $signature['type'] == 'constant' ) {
                $found = defined( $signature['fingerprint'] );
            }

            if ( $found ) {
                if ( $signature['class'] == 'good' ) {
                    $integrations['detected'][] = $signature;
                }
                else {
                    $integrations['problem'][] = $signature;
                }
            }
            else {
                if ( $signature['class'] == 'good' ) {
                    $integrations['available'][] = $signature;
                }
            }
        }

        return $integrations;
    }

}