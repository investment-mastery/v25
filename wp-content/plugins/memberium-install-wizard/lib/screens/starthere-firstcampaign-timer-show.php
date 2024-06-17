<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['email'] = true;
?>
<div class="memberium-content">
    <h2 class="memberium-title aligncenter">Watch the video below to learn how to add a delay timer to your campaign sequence...</h2>
    <div class="memberium-help-video big">
<iframe src="https://player.vimeo.com/video/341900928" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </div>
    <p class="memberium-show-written-instructions">
        <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written
            Instructions</a>
    </p>
    <div id="memberium-optional-directions">
        <p>
            Return to your Infusionsoft campaign sequence and complete the following steps:
        </p>
        <p>
        <ol>
            <li>
                We will now add a minute-long delay to allow the previous items to finish processing. Drag a "Delay
                Timer"
                (found in the "Timers" section) to the right of the "Apply/Remove Tag" item and <strong>double-click to
                    edit</strong>.
            </li>
            <li>
                Under "Wait at least", change the dropdown to "Minutes" and set it to <strong>1</strong> Minute.
            </li>
            <li>
                Under "Run on", select "Any Day" in the dropdown.
            </li>
            <li>
                <strong>To the right, select "Any Time".</strong>
            </li>
            <li>Click "Save".</li>
        </ol>
        </p>
    </div>
</div>
<div class="memberium-continue-button-container">
    <a class="memberium-button primary" href="?page=<?php echo $_GET['page']; ?>&wizard=firstcampaign&tab=email">Next Step</a>
</div>
