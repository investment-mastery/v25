<?php
if (!defined('ABSPATH')) {
    die();
}
?>
<div class="memberium-content">
    <h2 class="memberium-title aligncenter">Watch the video below to learn how to test your campaign to make sure it works...</h2>
    <div class="memberium-help-video big">
<iframe src="https://player.vimeo.com/video/341901164" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </div>
    <p class="memberium-show-written-instructions">
        <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written Instructions</a>
    </p>
    <ol id="memberium-optional-directions">
        <li>
            Create a test user
            using <?php echo '<a href="https://' . memb_getAppName() . '.infusionsoft.com/app/contact/create" target="_blank">this form</a>. '; ?>
            (You only need to fill out the name and email fields)
        </li>
        <li>
            Scroll down and select "Campaigns" in the second set of tabs. Then click "Add to Sequence".
        </li>
        <li>Select your campaign and then your sequence from the dropdown menus. Then click "Add".</li>
        <li>Wait 1-2 minutes for the sequence to run.</li>
        <li>If you set the users email to an email you own, open the email. If not, refresh the page and go back to the
            "Campaigns" section and then click on the link underneath the email item to view the email that was sent.
        </li>
        <li>Take note of or copy the password.</li>
        <li>Open a new incognito/private tab or a new browser where you are not signed into WordPress. Open your login
            page in this new tab.
        </li>
        <li>You should see a login form. Log in with the email and password of the test user you just created.</li>
        <li>You should now be signed in. You can check this by opening your login page again. It should tell you that
            you are already logged in.
        </li>
        <li>You're finished! Click "Finish Tutorial" below.</li>
    </ol>
</div>
<div class="memberium-continue-button-container">
    <form action="" method="post"><input type="submit" name="save_firstcampaign" class="memberium-button primary" value="Finish Tutorial"></form>
</div>
