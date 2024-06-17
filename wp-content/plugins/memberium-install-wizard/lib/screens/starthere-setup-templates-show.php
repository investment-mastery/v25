<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['templates'] = true;

?>
<div class="memberium-help-video">
    <iframe src="//player.vimeo.com/video/164371815" allowfullscreen mozallowfullscreen webkitallowfullscreen></iframe>
</div>
<div class="memberium-content">
    <h2 class="memberium-title">Import Membership Page Templates</h2>
    <?php
    echo empty($result) ? '' : '<p class="memberium-proTip"><strong>Success</strong>:  ' . $result . ' Templates Loaded</p>';

    if (!$templates_loaded && empty($result)) {
       echo '<p>We\'ve pre-created a set of sample pages for your membership site.</p>';
		echo '<p>Click &ldquo;Load Membership Page Templates&rdquo; to add all the pages at once.</p>';
		echo '<p>If for any reason you <strong>don\'t</strong> wish to install the templates now, you can also skip this step for now, and load them later from within Memberium.</p>';
		echo '<p>The new templates will be loaded in <strong>draft mode</strong> so you can publish or delete them as desired. Once you\'ve added the pages, you can set them as &ldquo;System Pages&rdquo; which will make them the default pages for certain actions to take place.</p>';
		echo '<div id="loading_div" style="display:none;"><div class="loader"></div><p>Fetching and importing membership page templates... (This may take a moment)</p></div>';

		echo '<form method="post" action="">';
		echo '<p><input id="load_button" type="submit" name="save" class="memberium-button" value="Load Membership Page Templates"></p>';
		echo '</form>';
		echo '</div>';

		echo '<div class="memberium-continue-button-container">';
		echo '<form method="post" action="?page=memberium-installer-wizard&wizard=setup&tab=done">';
		echo '<p><input type="submit" name="next" class="memberium-button primary" value="Skip this step"></p>';
		echo '</form>';
		echo '</div>';
	} else {
		echo '<p>All of the membership page templates have been loaded as drafts so you can publish or delete them as desired. You can also set them as &ldquo;System Pages&rdquo; which will make them the default pages for certain actions to take place.</p>';
		echo '<p style="color:green;font-weight:bold;font-size:24px;"><span class="dashicons dashicons-big dashicons-yes"></span><span style="margin-left:26px;"><strong>All templates have been imported. Click &ldquo;Next Step&rdquo; to continue.';
		echo '</div>';
		echo '<div class="memberium-continue-button-container">';
		echo '<form method="post" action="?page=memberium-installer-wizard&wizard=setup&tab=done">';
		echo '<p><input type="submit" name="next" class="memberium-button primary" value="Next Step"></p>';
		echo '</form>';
		echo '</div>';
		$templates_loaded = true;
	}
    ?>
    <script>
        document.getElementById('load_button').onclick = function () {
            document.getElementById('loading_div').style.display = 'block';
            document.getElementById('load_button').style.display = 'none';
        };
    </script>
    <style>
        .memberium-proTip {
            display: inline-block;
        }

        #loading_div {
            font-size: 16px;
            font-weight: 700;
        }

        .dashicons-big {
            font-size: 40px !important;
        }

        .loader {
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #3a76a9;
            border-bottom: 10px solid #3a76a9;
            width: 50px;
            height: 50px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            vertical-align: middle;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
</div>
