<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['import'] = true;

?>
<style>
    .dashicons-big {
        font-size: 40px !important;
    }
</style>
<div class="memberium-help-video">
    <iframe src="//player.vimeo.com/video/164371815" allowfullscreen mozallowfullscreen webkitallowfullscreen></iframe>
</div>
<div class="memberium-content">
    <h2 class="title">Settings Importer</h2>
    <p>
        If you've used another membership system previously we may be able to pull some settings in for you.
    </p>
    <?php
    if ($this->hasiMember360Settings()) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['save'] == 'Import iMember360 Settings') {
                echo '<textarea rows=15 style="width:90%;margin-top:10px;margin-bottom:10px;">', $this->importiMember360Settings(), '</textarea>';
            }
        }

        echo '<form method="post">';
        echo '<input type="submit" name="save" value="Import iMember360 Settings" class="memberium-button" />';
        echo '</form>';
    } else {
        echo '<p style="color:green;font-weight:bold;font-size:24px;">';
        echo '<span class="dashicons dashicons-big dashicons-yes"></span><span style="margin-left:26px;">';
        echo '<strong>There were no settings found to import.  Click &ldquo;Next Step&rdquo; to continue.</strong>';
        echo '</span>';
        echo '</p>';
    }
    ?>
</div>
<div class="memberium-continue-button-container">
    <form style="margin-top:10px;" method="post" action="?page=memberium-installer-wizard&wizard=setup&tab=categories">
        <input type="submit" value="Next Step" class="memberium-button primary"></form>
</div>
