<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['password'] = true;

global $wpdb;

$sql = 'SELECT concat(\'_\', name) as name FROM ' . MEMBERIUM_DB_DATAFORMFIELDS . ' WHERE `appname` = "' . memb_getAppName() . '" AND datatype = 15 AND formid = -1 ORDER BY name ASC';
$fields = $wpdb->get_results($sql, ARRAY_A);

//echo '<h1>'.print_r($fields).'</h1>';

// Add Standard Fields
$username_field_dropdown = '<option value="Email" ' . (('Email' == $this->settings['settings']['username_field']) ? ' selected="selected" ' : '') . '>Email</option>';
$username_field_dropdown .= '<option value="EmailAddress2" ' . (('EmailAddress2' == $this->settings['settings']['username_field']) ? ' selected="selected" ' : '') . '>EmailAddress2</option>';
$username_field_dropdown .= '<option value="EmailAddress3" ' . (('EmailAddress3' == $this->settings['settings']['username_field']) ? ' selected="selected" ' : '') . '>EmailAddress3</option>';
$username_field_dropdown .= '<option value="Username" ' . (('Username' == $this->settings['settings']['username_field']) ? ' selected="selected" ' : '') . '>Username</option>';
$password_field_dropdown = '<option value="Password" ' . (('Password' == $this->settings['settings']['password_field']) ? ' selected="selected" ' : '') . '>Password</option>';

// Add Custom Fields
foreach ($fields as $id => $row) {
    $username_field_dropdown .= '<option value="' . $row['name'] . '" ' . (($row['name'] == $this->settings['settings']['username_field']) ? ' selected="selected" ' : '') . '>' . $row['name'] . '</option>';
    $password_field_dropdown .= '<option value="' . $row['name'] . '" ' . (($row['name'] == $this->settings['settings']['password_field']) ? ' selected="selected" ' : '') . '>' . $row['name'] . '</option>';
}
$password_field_count = count($fields);
unset($fields);

if ((isset($_POST['username_field']) || isset($_POST['password_field'])) && empty($_POST['new_password_field'])) {
    $unlocks['httppost'] = true;
}
?>
    <script>
        function toggleNewPasswordField() {
            let optional = document.getElementById("new_password_field");
            if (optional.style.display === "block") {
                optional.style.display = "none";
            } else {
                optional.style.display = "block";
            }
        }
    </script>
    <div class="memberium-content">
        <h2 class="memberium-title aligncenter">Watch the video below to learn how to select your Username and Password
            fields...</h2>
        <div class="memberium-help-video big">
<iframe src="https://player.vimeo.com/video/341901112" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <?php
        if (isset($unlocks['httppost']) && $unlocks['httppost'] == true) {
            echo '<p>You have successfully set your username and password fields. Click the "Next Step" button below to continue.</p>';
        } else {
            echo '<p>You can skip this step if you want to use the default fields (skipping is recommended, you can always change this later if you want).</p>';
            echo '<p>If you do want to choose your own fields, <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional(\'click here\', \'click here\')">click here</a> and you\'ll be able to select any fields from Infusionsoft to use as your membership site\'s username and password fields.</p>';
        }
        ?>
        <div id="memberium-optional-directions">
            <form method="post" action="">

                <p>
                    You can choose a username and password below. It's recommended that you use Infusionsoft’s default email field as the
                    username and Infusionsoft’s default password field for storing your member's passwords.
                </p>
                <?php
                wp_nonce_field(MEMBERIUM_INSTALLER_LIB, 'memberium_options_nonce');
                echo '<h3>Login Fields</h3>';
                echo '<ul>';

                echo '<li><label>Infusionsoft Username Field</label>';
                echo '<select id="username_field" name="username_field" class="basic-single" style="width:250px;">';
                echo $username_field_dropdown;
                echo '</select>', $this->getHelpLink(1169), '</li>';

                echo '<li><label>Infusionsoft Password Field</label>';
                echo '<select id="password_field" name="password_field" class="basic-single" style="width:250px;">';
                echo $password_field_dropdown;
                echo '</select>', $this->getHelpLink(1171), '</li>';

                echo '<li>If you want to create a new field to use instead of Infusionsoft\'s default password field, <a href="#" onclick="toggleNewPasswordField()">click here</a>.</li>';

                echo '<li id="new_password_field" style="display:none;"><label>Create New Password Field</label>';
                echo '<input type="text" name="new_password_field" size="33" value="" />';
                echo $this->getHelpLink(5733);
                echo '<input type="submit" style="margin-left: 10px;" class="button-primary" value="Create New Field">';
                echo '</li>';

                echo '</ul>';
                ?>
                <input class="memberium-button primary" name="save_fields" type="submit" value="Save Login Fields">
            </form>
        </div>
    </div>
    <div class="memberium-continue-button-container">
        <?php
        if (isset($unlocks['httppost']) && $unlocks['httppost'] == true) {
            echo '<a href="?page=' . $_GET['page'] . '&wizard=firstcampaign&tab=httppost" class="memberium-button primary">Next Step</a>';
        } else {
            echo '<a href="?page=' . $_GET['page'] . '&wizard=firstcampaign&tab=httppost" class="memberium-button primary">Skip This Step</a>';
        }
        ?>
    </div>
