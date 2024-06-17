<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['i2sdk'] = true;

$api = $this->importiSDKSettings();
$verified = $i2sdk->getConfigurationOption('server_verified');

?>

<style>
    td {
        font-size: 16px !important;
    }

    table.widefat {
        border: 1px solid #89d2f2;
        white-space: nowrap;
    }

    #continue-button {
        display: inline-block;
        margin-left: 10px;
    }
</style>
<div class="memberium-content">
    <h2 class="memberium-title">Infusionsoft API Configuration</h2>
    <p>
       Please enter your Infusionsoft apps API settings. If you need help finding your app name or API Key, <a target="_blank" href="https://memberium.com/finding-infusionsoft-api-key/">here's where you can find</a> this information in your Infusionsoft app.
    </p>

    <form method="POST" action="" autocomplete="off">
        <?php wp_nonce_field(plugin_basename(__FILE__), 'i2sdk_admin_api_nonce'); ?>
        <h2>Infusionsoft <?php _e('API Settings'); ?></h2>
        <table class="widefat">
            <tr>
                <td style="width: 250px;"><?php _e('Enter Your Infusionsoft App Name'); ?>:</td>
                <td>
                    https://<input id=lastpass-search-1 autocomplete=off type=text maxlength=32 size=20
                                   name=i2sdk_app_name required value="<?php echo $api['app_name']; ?>"
                                   style="text-align:right;"/>.infusionsoft.com/
                </td>
            </tr>
            <tr>
                <td><label for="lastpass-search-2"><?php _e('Enter Your Infusionsoft API key'); ?>:</label></td>
                <td>
                    <input id="lastpass-search-2" maxlength="255" autocomplete="off" name="i2sdk_api_key" size="47"
                           type="password" required value="<?php echo $api['api_key']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for=""><?php _e('Current API status'); ?>:</label></td>
                <td><?php echo ($verified == 1) ? '<b style="color:green;">' . __('Verified') . '</b>' : '<b style="color:red;"> Not Verified: ' . $connection_failure . '</b>'; ?></td>
            </tr>
        </table>
        <div style="margin:0;" class="memberium-continue-button-container">
            <div style="display: inline-block;">
                <input type="submit" name="save" value="Save Infusionsoft API Configuration" class="memberium-button"/>
            </div>
            <?php
            if ($verified) {
                $unlocks['import'] = true;

                if (!$this->hasiMember360Settings()) {
                    $unlocks['categories'] = true;
                    echo '<a id="continue-button" href="?page=memberium-installer-wizard&wizard=setup&tab=categories" class="memberium-button primary">Next Step</a>';
                } else {
                    echo '<a id="continue-button" href="?page=memberium-installer-wizard&wizard=setup&tab=import" class="memberium-button primary">Next Step</a>';
                }
            }
            ?>
        </div>
    </form>
</div>
