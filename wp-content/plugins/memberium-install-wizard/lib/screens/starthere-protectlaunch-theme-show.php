<?php
if (!defined('ABSPATH')) {
	die();
}
?>
<div class="memberium-content">
<h2 class="memberium-title">Theme</h2>
<p>
<strong>Do you want to use the Astra Theme?</strong>
</p>
<form method="post" action="" style="font-size: 18px; line-height: 1.5;">
<input type="radio" name="astratheme" value="true" onclick="setDescription(true)"> Yes<br />
<input type="radio" name="astratheme" value="false" onclick="setDescription(false)"> No<br />
<div id="choice_description">We’ll install & activate the free version of Astra for you.  <div class="bs-callout bs-callout-warning"><strong>Warning:</strong> Selecting ‘Yes’ will activate Astra and replace the current theme that your WordPress site is using. Selecting ‘Yes’ will only deactivate the theme you’re using. Your original theme will still be there if you decide you want to switch back to your original theme. If you have a live site that depends on the theme you’re currently using, we recommend you select ‘No’ for this question.</div></div>
<div style="margin-right:0;" class="memberium-continue-button-container">
<input type="submit" value="Next Step" class="memberium-button primary">
</div>
</form>
</div>
