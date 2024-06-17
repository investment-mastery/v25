<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['httppost'] = true;
$unlocks['publishlogin'] = true;
?>
    <div class="memberium-content">
        <h2 class="memberium-title aligncenter">Watch the video below to learn how to generate a password for your new members...</h2>
        <div class="memberium-help-video big">
<iframe src="https://player.vimeo.com/video/341901016" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <p>
            <?php
            $i2sdk_options = stripslashes_deep(get_option('i2sdk'));
            if ($i2sdk_options['http_post_key'] > '') {
                $authkeys = explode(',', $i2sdk_options['http_post_key']);
                foreach ($authkeys as $authkey) {
                    $url = get_bloginfo('url') . '/?operation=makepass&auth_key=' . urlencode($authkey);
                    echo '<strong style="text-align:center;">This is the HTTP Post url that you\'ll copy from here and paste into your Infusionsoft campaign sequence:</strong>';
                    echo '<div style="text-align: center;">';
                    echo '<input id="httppost-field" title="" style="width: 650px;" readonly type="url" value="' . $url . '">';
                    echo '<button id="copy-field" class="button">Copy to clipboard</button>';
                    echo '</div>';
                }
            } else {
                echo '<p><b>Please create your auth key in the i2SDK to complete this step.</b></p>';
            }
            ?>
        </p>
        <p class="memberium-show-written-instructions">
            <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written Instructions</a>
        </p>
        <ol id="memberium-optional-directions">
            <li>
                To get started, open Infusionsoft's Campaign Builder and click the "Create my own Campaign" button in
                the top right of the page. Give your campaign a name (maybe "Membership Site") and click "Save".<br/>
                <?php echo '<a class="memberium-button" href="https://' . memb_getAppName() . '.infusionsoft.com/Reports/searchTemplate.jsp?reportClass=SetupFunnel" target="_blank">Open Campaign Builder</a>'; ?>
            </li>
            <li>
                <strong>Find "Sequence" in the icons on the left and drag it onto the workspace. Name it something like
                    "Create New Member" and then double-click it to open it.</strong>
            </li>
            <li>
                <strong>Find "Send HTTP Post" in the "Process" section and drag it somewhere to the right of the "Start" arrow.</strong>
            </li>
            <li>
                Double click on the "Send HTTP Post" item you just dragged on to edit it.
            </li>
            <li>
                <strong>In the "POST URL" box, paste the URL listed above.</strong>
            </li>
            <li>
                In the upper right-hand corner of that page, <strong>click "Draft" to change the switch to
                    "Ready".</strong> If there aren't any errors, click the back button to return to your sequence.
            </li>
        </ol>
    </div>
    <div class="memberium-continue-button-container">
        <a class="memberium-button primary" href="?page=<?php echo $_GET['page']; ?>&wizard=firstcampaign&tab=assignlevel">Next Step</a>
    </div>
    <script>
        let copyButton = document.getElementById("copy-field");
        copyButton.onclick = function() {
            let copyText = document.getElementById("httppost-field");
            copyText.select();
            document.execCommand("copy");
            copyButton.innerText = "Copied!";
        };
        copyButton.onmouseenter = function() {
            copyButton.innerText = "Copy to clipboard";
        };
    </script>
