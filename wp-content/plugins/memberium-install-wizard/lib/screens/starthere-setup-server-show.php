<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['server'] = true;

$environment = $this->getEnvironment();
$problems = 0;

?>
<style>
    .dashicons-big {
        font-size: 40px !important;
    }
</style>
<div class="memberium-content">
    <h2 class="memberium-title">Server Configuration</h2>
    <p>
        Here are the details about your site. If everything is listed as green, please click the "Next Step" button below to continue. If your server is running an out of date PHP version, please ask your web host support team to update the version of PHP that your site is running on. If you need any further help contact <a target="_blank" href="https://memberium.com/support/">Memberium support</a> for assistance.    </p>
</div>
<?php

echo '<table>';

if (is_array($environment['failures'])) {
    foreach ($environment['failures'] as $key => $values) {
        echo '<tr>';
        echo '<td style="width:250px;">', $key, '</td>';
        echo '<td style="color:red;font-weight:bold;"><span style="color:red;font-weight:bold;" class="dashicons dashicons-no"></span>', $values['message'], '</td>';
        echo '</tr>';
        $problems++;
    }
}

if (is_array($environment['required'])) {
    foreach ($environment['required'] as $key => $values) {
        echo '<tr>';
        echo '<td style="width:250px;">', $key, '</td>';
        echo '<td style="font-weight:bold;color:green;"><span style="color:green;font-weight:bold;" class="dashicons dashicons-yes"></span>', $values['message'], '</td>';
        echo '</tr>';
    }
}

if (is_array($environment['detected'])) {
    echo '<tr><td>&nbsp;</td></tr>';
    echo '<tr><td><strong>Other Plugins</strong></td></tr>';
    foreach ($environment['detected'] as $key => $values) {
        echo '<tr>';
        echo '<td style="width:250px;">', $key, '</td>';
        echo '<td>', $values['message'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';
echo '</div>';

if ($problems == 0) {
    if ($_GET['fromprevious'] == 'true') {
        echo '<script>setTimeout(function() {window.location.href = "?page=memberium-installer-wizard&wizard=setup&tab=i2sdk";}, 5000);</script>';
        echo '<div class="memberium-content">';
        echo '<p style="color:green; font-weight:bold; font-size:18px;">';
        echo '<span class="dashicons dashicons-big dashicons-yes"></span>';
        echo '<span style="margin-left:26px;"><strong>Everything looks great!  You should be moved to the next page in a couple seconds. If not, click &ldquo;Next Step&rdquo; to continue.</strong></span>';
        echo '</p>';
        echo '</div>';
    } else {
        echo '<div class="memberium-content">';
        echo '<p style="color:green; font-weight:bold; font-size:18px;">';
        echo '<span class="dashicons dashicons-big dashicons-yes"></span>';
        echo '<span style="margin-left:26px;"><strong>Everything looks great! Click &ldquo;Next Step&rdquo; to continue.</strong></span>';
        echo '</p>';
        echo '</div>';
    }
    echo '<div class="memberium-continue-button-container">';
    echo '<a href="?page=' . $_GET['page'] . '&wizard=setup&tab=i2sdk" class="memberium-button primary">Next Step</a>';
    echo '</div>';
} else {
    $unlocks['i2sdk'] = false;
    echo '<div class="memberium-content"><p style="color:red;"><span style="color:red;font-weight:bold;" class="dashicons dashicons-no"></span><strong>', $problems, ' problems detected.<br><br>This needs to be corrected before we can continue.</strong></p>';
    echo '<div class="memberium-continue-button-container"><form method="post"><input type="submit" value="Re-Scan System" class="memberium-button"></form></div>';
}
