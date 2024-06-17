<?php
if (!defined('ABSPATH')) {
    die();
}
$unlocks['golive'] = true;
$memberium_activated = get_option('memberium_activated');

if ($memberium_activated){

    update_option('memberium_activated', false, false);
}
?>
    <div class="memberium-content">
        <h2 class="memberium-title">Other Options</h2>
        <p>
            <strong>Do you want us to automatically create your menu for you? (your Home page, Login and Log Out links will automatically be added for you)</strong>
        </p>
        <form method="post" action="" style="font-size: 18px; line-height: 1.5;">
            <input type="radio" name="prebuilt_menus" value="true"> Yes<br />
            <input type="radio" name="prebuilt_menus" value="false"> No<br />

            <div style="margin-right:0;" class="memberium-continue-button-container">
                <input type="submit" value="Next Step" class="memberium-button primary">
            </div>
        </form>


        <div class="bs-callout bs-callout-warning"><p><strong>Warning:</strong> Selecting ‘Yes’ will immediately replace your current WordPress menu with the new menu that the Memberium wizard will create. If you have a live site using an existing menu that you’ve already created, selecting ‘Yes’ will cause it to be replaced by this new menu (your older menu won’t be deleted - it will only be deactivated).</p>

            <p>If you have a live site with an existing menu that you don’t want to change, we recommend you select ‘No’ for this question and manually add the links to your login and log out pages.</p> </div>
    </div>
