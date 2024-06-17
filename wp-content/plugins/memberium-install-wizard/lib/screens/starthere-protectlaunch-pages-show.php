<?php
if (!defined('ABSPATH')) {
	die();
}

?>
<div class="memberium-content">
<h2 class="memberium-title">Pages</h2>
<p>
<?php //      <strong>Do you want help with a membership home page?</strong> ?>
<strong>We can install pre-built Memberium page templates for you that will save you a lot of time when setting up your site.             Do you want to install these pages?</strong><br>
</p>
<div class="my-notify-info" width="60%">


</div>


<p>
<form method="post" action='' style="font-size: 18px; line-height: 1.5;">
<input type="radio" name="pages" value="true" onclick="setDescription(true)"> Yes<br />
<input type="radio" name="pages" value="false" onclick="setDescription(false)"> No<br />

<div id="choice_description"></div>
<div style="margin-right:0;" class="memberium-continue-button-container" id="submit-button">
<input type="submit" value="Next Step" class="memberium-button primary">
</div>
</form>
<div class="my-notify-info" width="60%">

<div class="bs-callout bs-callout-info"><p>Click <a href="https://memberium.com/24-membership-site-page-examples/" target="_blank">here</a> to read more about the pre-built Memberium page templates. The new pages will be added as drafts and won’t overwrite any of your existing pages that are currently on your site.    </p> </div>

The following free plugins will also be installed to support the page templates:
<br>
Press Elements - Widgets for Elementor<br>
Fullwidth Page Templates<br>
<?php
$astra_enabled=get_option('memberium_wizards_astra_theme');
if ($astra_enabled=='false') {
	echo 'Memberium Page Templates Add-on<br>';
}
?>
Menu Items Visibility Control<br>
</div>
</div>
