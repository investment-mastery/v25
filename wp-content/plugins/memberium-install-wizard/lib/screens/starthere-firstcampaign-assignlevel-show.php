<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['assignlevel'] = true;
$unlocks['timer'] = true;
?>
<div class="memberium-content">
    <h2 class="memberium-title aligncenter">Watch the video below to learn how to add your new membership level tag to your campaign...</h2>
    <div class="memberium-help-video big">
<iframe src="https://player.vimeo.com/video/341900889" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </div>
    <p>
        <?php
        echo 'Your membership level tag names are: <strong>';
        $memberships = $this->getMemberships();

        $membershipIds = array_keys($memberships);
        $lastId = array_pop($membershipIds);

        $membership_count = count($memberships);
        if ($membership_count == 0) {
            echo 'You have no membership level tags created. Create some to complete this step.';
        }
        foreach ($memberships as $id => $membership) {
            echo $membership['name'];
            if ($id != $lastId) {
                echo ', ';
            }
        }
        echo '</strong>';
        ?>
    </p>
    <p class="memberium-show-written-instructions">
        <a id="toggle" href="#memberium-optional-directions" onclick="toggleOptional()">Show Written Instructions</a>
    </p>
    <div id="memberium-optional-directions">
        <p>
            Return to your Infusionsoft campaign sequence and complete the following steps:
        </p>
        <ol>
            <li>
                Drag the "Apply/Remove Tag" item (found in the "Process" section) to the right of the "Send HTTP Post"
                item and double click it to edit it.
            </li>
            <li>
                Check "Apply" and then in the box below select one of the membership level tags listed above. Choose
                whichever tag you want your new members to be assigned when they first register (Probably the level with
                the least access).
            </li>
            <li>
                Click Save
            </li>
        </ol>
    </div>
</div>
<div class="memberium-continue-button-container">
    <a class="memberium-button primary" href="?page=<?php echo $_GET['page']; ?>&wizard=firstcampaign&tab=timer">Next Step</a>
</div>
