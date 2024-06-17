<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['memberships'] = true;
$memberships = $this->getMemberships();
$tags = $this->getTags();
$skip_button = count($memberships) ? 'Finish and Go to Next Section' : 'Skip to Next Section';

?>
<style>
    .proTip {
        min-width: 300px;
        max-width: 450px;
    }

    #container {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        flex-wrap: wrap;
    }

    td {
        font-size: 16px !important;
    }

    label {
        font-size: 16px !important;
    }

    table.widefat {
        min-width: 300px;
        border: 1px solid #89d2f2;
    }


</style>

<div class="memberium-content">
    <h2 class="memberium-title">Create New Membership Levels</h2>
    <p>
        When you create a new membership level, we'll create a tag in Infusionsoft for you.
       You can assign this tag to contacts who get that membership level. It will also create a membership
        level for your site here that you can use to protect your content.
    </p>
    <p>
        When users have those tags, they'll have access to the content that's protected by those membership levels.
    </p>
    <div id="container">
        <div id="left" class="bs-callout bs-callout-info">
            <form method="post" action="">
                <input type="hidden" name="is_subscription" value="0">
                <p>
                    Membership Level Name: <input type="text" name="membership_name" size="40" value=""
                                                  placeholder="Enter the name of your membership level" required>
                </p>
                <p>
                    This Membership is a Subscription: <input type="checkbox" name="is_subscription" value="1">
                </p>
                <input type="submit" name="save" value="Create New Membership" class="memberium-button"/>
            </form>
        </div>
        <div id="right">
            <?php

            if (is_array($memberships) && count($memberships)) {
                echo '<table class="widefat">';
                echo '<tr>';
                echo '<td><strong>Your Membership Levels</strong></td>';
                echo '</tr>';
                foreach ($memberships as $membership) {
                    echo '<tr>';
                    echo '<td style="color: green;">', $membership['name'], ' (ID: ', $membership['main_id'], ')</td>';
                    echo '</tr>';
                }
                if (count($memberships) > 0) {
                    $unlocks['templates'] = 1;
                }
                echo '</table>';
            } else {
                echo '<p class="proTip">';
                echo 'For your membership level names, you could just use the names of your products, ';
                echo 'for example, if you have a product, course or membership called "Dog Training Mastery" already, simply call your membership level "Dog Training Mastery".<br /><br />';
                echo '</p>';
            }

            ?>
        </div>
    </div>
</div>
<?php
if ( count( $memberships ) > 0 ) {
    echo '<div class="memberium-continue-button-container">';
 //   echo '<form action="?page=memberium-installer-wizard&wizard=setup&tab=templates" method="post" style="margin-top:20px;">';
    echo '<form action="?page=memberium-installer-wizard&wizard=setup&tab=done" method="post" style="margin-top:20px;">';
    echo '<input type="submit" value="Finish and go to Next Section" class="memberium-button primary">';
    echo '</form>';
    echo '</div>';
}

echo '<a href="?page=memberium-installer-wizard&wizard=setup&tab=done" class="button btn">Skip This Step...</a>';
