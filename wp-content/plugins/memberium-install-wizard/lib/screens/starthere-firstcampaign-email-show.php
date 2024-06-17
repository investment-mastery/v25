<?php
if (!defined('ABSPATH')) {
    die();
}
$unlocks['publish'] = true;

?>


<script type="text/javascript">
  function CopyEmailToClipboard(copyemail) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(copyemail));
    range.select().createTextRange();
    document.execCommand("copy");

  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(copyemail));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("text copied, copy in the text-area")
  }
}
</script>


<script type="text/javascript">
    function copyEmailSubject() {
  /* Get the text field */
  var copyText = document.getElementById("copyemailsubject");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}

</script>

    <div class="memberium-content">
        <h2 class="memberium-title aligncenter">Watch the video below to learn how to add a welcome email to your campaign. This will be sent to new members after they join with their login info...</h2>
        <div class="memberium-help-video big">
<iframe src="https://player.vimeo.com/video/341900953" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <div class="two-column">
            <div>
                <h4>Subject:</h4>

                    <button class="btn button" onclick="copyEmailSubject()">Click Here to Copy Email Subject</button> <br>

                <input contenteditable="true" type="text" style="width: 100%;" value="Welcome ~Contact.FirstName~! Here's your login details to   [Insert the Name of Your Membership Program or Course]..." id="copyemailsubject">
                <h4>Body:</h4>

                    <button class="btn button" onclick="CopyEmailToClipboard('copyemail')">Click Here to Copy Email Body</button> <br>
                              <div id="copyemail" class="mock-textarea" style="width: 100%;">
                                        <?php
                                        $permalink = get_permalink($this->settings['settings']['login_url']);
                                        if (ctype_space($permalink) || $permalink == '') {
                                            $permalink = wp_login_url();
                                        }

                                        echo '<p>Hey ~Contact.FirstName~,</p>';
                    echo "<p>We're super excited that you've joined us! We want to welcome you aboard and help you dive in right away so you can immediately start going through [Insert the Name of Your Membership Program or Course].</p>";
                    echo '<p>We realize that your time is valuable, so we want to be able to get you up and running as quickly as possible.</p>';
                    echo '<p><strong>You can immediately access the program by using the following login info (please be sure to keep this for your records):</strong></p>';
                    echo '<p>Login Link: ', $permalink, '</p>';
                    echo '<p>Username: ~Contact.' . $this->settings['settings']['username_field'] . '~</p>';
                    echo '<p>Password: ~Contact.' . $this->settings['settings']['password_field'] . '~</p>';
                    echo "<p>Once you're logged in, you'll have full and unrestricted access to everything that [Insert the Name of Your Membership Program or Online Course] has to offer.</p>";
                    echo "<p>You've made a fantastic choice in joining us, we can't wait to hear about your future success! It's because of people like you that we live doing what we do here at [Insert Your Company Name or the Name of Your Program].</p>";
                    echo "<p>If you have any questions or run into any issues at all logging in to the site, let us know directly by replying to this email and we'll be happy to help.</p>";
                       echo '<p>~Contact.FirstName~, thanks again for signing up and welcome aboard! I hope you’re excited to start learning something new.</p>';
                    echo '<p>~Owner.Signature~</p>';

                      ?>


                                </div>
        </div>
            <div style="float: right; clear: both;">
                <p class="memberium-show-written-instructions">
                    <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written
                        Instructions</a>
                </p>
                <div id="memberium-optional-directions">
                    <p>
                        Complete the following steps in your Infusionsoft campaign sequence:
                    </p>
                    <p>
                    <ol>
                        <li>
                            Next, you'll want to send an email to the new member with their login details. Drag "Email"
                            to the right of the "Delay Timer" and name it something like "New Member Email". Double
                            click it to edit.
                        </li>
                        <li>
                            Choose the "Simple Text" template or choose an email template of your own.
                        </li>
                        <li>
                            Copy and paste what we’ve provided to the left into the <strong>subject line and
                                body</strong> of the email. (Feel free to change the text or add your own text but these
                            are the correct links and merge fields for your site.)
                        </li>
                        <li>
                            When you are finished editing the email, <strong>click on "Draft" in the upper right to
                                change the switch to "Ready"</strong> and click the back button to go back to your
                            sequence.
                        </li>
                    </ol>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="memberium-continue-button-container">
        <a href="?page=<?php echo $_GET['page']; ?>&wizard=firstcampaign&tab=publish" class="memberium-button primary">Next Step</a>
    </div>
