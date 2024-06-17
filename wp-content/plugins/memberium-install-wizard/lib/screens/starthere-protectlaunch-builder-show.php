<?php
if (!defined('ABSPATH')) {
    die();
}
?>
    <div class="memberium-content">
        <h2 class="memberium-title">Builder</h2>
        <p>
            <strong>Do you want to use the Elementor Builder?</strong>
        </p>
        <form method="post" action="">
        <div style="font-size: 18px; line-height: 1.5;">
            <input type="radio" name="elementor" value="true" onclick="setDescription(true)"> Yes<br />
            <input type="radio" name="elementor" value="false" onclick="setDescription(false)"> No<br />
        </div>
            <div id="choice_description"> <div class="bs-callout bs-callout-info"><p>Selecting ‘Yes’ will install the Elementor page builder for free to your WordPress site that we recommend.</p></div></div>
            <div style="margin-right:0;" class="memberium-continue-button-container">
                <input type="submit" value="Next Step" class="memberium-button primary">
            </div>
        </form>
    </div>
