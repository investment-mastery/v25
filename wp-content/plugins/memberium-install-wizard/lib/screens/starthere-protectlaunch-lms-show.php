<?php
if (!defined('ABSPATH')) {
    die();
}

$enabled_lms = array();

$detected_integrations = $this->scanEnvironment()['detected'];
if (!empty($detected_integrations)) {
    foreach ($detected_integrations as $integration) {
        switch ($integration['name']) {
            case 'LearnDash':
                $enabled_lms['learndash'] = true;
                break 2;
            case 'WP Courseware':
                $enabled_lms['wpcourseware'] = true;
                break 2;
            case 'Lifter LMS':
                $enabled_lms['lifterlms'] = true;
                break 2;
            case 'WooThemes Sensei':
                $enabled_lms['sensei'] = true;
                break 2;
        }
    }
}
?>
    <div class="memberium-content">
        <h2 class="memberium-title">LMS</h2>
        <p>
            <?php
            if (count($enabled_lms) > 0) {
                echo '<strong>We have detected that you are using a Learning Management System (LMS):</strong>';
            } else {
                echo '<strong>Are you currently using a Learning Management System (LMS) on your site?</strong><br>';
        //        echo 'Do you need a Learning Management System? <i>Click <a href=https://memberium.com/need-learning-management-system/ target=_blank>here</a> to read the article.</i>';
?>

     <?php
            }
            ?>
        </p>
        <form method="post" action="" style="font-size: 18px; line-height: 1.5;">
            <input type="radio" name="usinglms" value="true"
                   onclick="showNextSection('usinglms', 'notusinglms'); showNextSection('', 'submit-button')" <?php echo count($enabled_lms) > 0 ? 'checked="false"' : ''; ?>>
            Yes<br/>
            <input type="radio" name="usinglms" value="false"
                   onclick="showNextSection('submit-button', 'usinglms');">
            No<br/>
            <div id="usinglms" style="<?php echo count($enabled_lms) > 0 ? '' : 'display:none;'; ?>">

                <p><strong style="font-size: 1.2em;">Which one?</strong></p>

                <input type="radio" name="lmssystem" value="learndash"
                       onclick="showNextSection('submit-button', 'usinglearndash')" <?php echo isset($enabled_lms['learndash']) ? 'checked="true"' : ''; ?>>
                LearnDash<br/>

                <input type="radio" name="lmssystem" value="lifterlms"
                       onclick="showNextSection('submit-button', 'usinglearndash')" <?php echo isset($enabled_lms['lifterlms']) ? 'checked="true"' : ''; ?>>
                Lifter LMS<br/>
                <input type="radio" name="lmssystem" value="wpep"
                       onclick="showNextSection('submit-button', 'usinglearndash')"> WPEP<br/>
                <input type="radio" name="lmssystem" value="sensei"
                       onclick="showNextSection('submit-button', 'usinglearndash')" <?php echo isset($enabled_lms['sensei']) ? 'checked="true"' : ''; ?>>
                Sensei<br/>
                <input type="radio" name="lmssystem" value="wpcourseware"
                       onclick="showNextSection('submit-button', 'usinglearndash')" <?php echo isset($enabled_lms['wpcourseware']) ? 'checked="true"' : ''; ?>>
                WP Courseware<br/>
            </div>
            <div id="notusinglms" style="display:none;">
               Great, go ahead and click "Next Step".
            </div>

            <div style="margin-right:0;" class="memberium-continue-button-container" id="submit-button">
                <input type="submit" value="Next Step" class="memberium-button primary">
            </div>
        </form>

    </div>

    <?php //storing the values in options

    ?>

    <script>
        function showNextSection(sectionId, hideSectionId) {
            if (sectionId !== '') {
                document.getElementById(sectionId).style.display = "block";
            }
            if (hideSectionId !== '') {
                document.getElementById(hideSectionId).style.display = "none";
            }
        }
    </script>
