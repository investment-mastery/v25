<?php
if (!defined('ABSPATH')) {
	die();
}
$unlocks['testuser'] = true;
?>
<div class="memberium-content">
<h2 class="memberium-title aligncenter">Watch the video below to learn how to publish your new member campaign...</h2>
<div class="memberium-help-video big">
	<iframe src="https://player.vimeo.com/video/341901078" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>
<p class="memberium-show-written-instructions">
<a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written
Instructions</a>
</p>
<ol id="memberium-optional-directions">
<li>
Now that all the pieces of your campaign sequence are finished, publish the sequence by clicking the "Draft" switch on the upper right of this page to mark the entire sequence as "Ready". Click the back button one more time to return to your campaign.</li>

<li>You’ll now need to drag a “Purchase Goal” from the right-hand sidebar and attach that to the beginning of your sequence. Then configure the purchase goal so users who place an order through your orderform will be brought into this campaign.</li>
<li>
Click the "Publish" button in the upper right. Infusionsoft will check your campaign for errors. Make sure that there are no other warnings or errors, and then click "Publish".
</li>
</ol>
</div>
<div class="memberium-continue-button-container">
<a href="?page=<?php echo $_GET['page']; ?>&wizard=firstcampaign&tab=testuser" class="memberium-button primary">Next Step</a>
</div>
