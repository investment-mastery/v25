<?php
if (!defined('ABSPATH')) {
    die();
}
$unlocks['password'] = true;
?>
    <div class="memberium-content">
        <h2 class="memberium-title aligncenter">Watch the video below to get a 30 second overview of what's covered in this section of the wizard... </h2>
        <div class="memberium-help-video big">
            <iframe src="https://player.vimeo.com/video/341901206" width="640" height="480" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <p class="memberium-show-written-instructions">
            <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written Instructions</a>
        </p>
        <div id="memberium-optional-directions">
            <p>

You have successfully installed Memberium! Now it's time to create your first Infusionsoft campaign for your site. This video will give you a quick overview of what's covered throughout this section of the wizard.</p>

<p>Let's go! Click "Next Step" to get started!
            </p>
        </div>
    </div>
    <div class="memberium-continue-button-container">
        <a href="?page=<?php echo $_GET['page'] ?>&wizard=firstcampaign&tab=password" class="memberium-button primary">Next Step</a>
    </div>

