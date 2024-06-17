<?php
if (!defined('ABSPATH')) {
	die();
}
?>
<div class="memberium-content">
<div id="memberium-dashboard-container">
<section class="memb-wizard-dashboard">

<!-- left progress steps -->

<div class="memb-wrap-dash">
<ul class="memb-progress-steps">


<?php
foreach ($wizards as $wizard => $name) {
	$completed = isset ($memberium_wizards_complete[$wizard]) && $memberium_wizards_complete[$wizard];
	$unlocked = isset ($memberium_wizards_unlocked[$wizard]) && $memberium_wizards_unlocked[$wizard];

	if ($completed) {
		echo '<li class="completed">';
		echo '<h3><a href="?page=', $_GET['page'], '&wizard=', $wizard, '&tab=', $memberium_wizards_lasttab[$wizard], '">', $name, '</a></h3> <span class="completed-subtitle">Completed</span>';
		echo '</li>';
	} else if ($unlocked) {
		echo '<li>';
		if (isset($memberium_wizards_lasttab[$wizard])) {
			echo '<h3><a href="?page=', $_GET['page'], '&wizard=', $wizard, '&tab=', $memberium_wizards_lasttab[$wizard], '">', $name, '</a></h3>';
		} else {
			echo '<h3><a href="?page=', $_GET['page'], '&wizard=', $wizard, '">', $name, '</a></h3>';
		}

		echo '<p style="display: block; padding-top: 10px;">', $wizard_descriptions[$wizard], '</p>';
		if (isset($memberium_wizards_progress[$wizard])) {
			if (isset($memberium_wizards_lasttab[$wizard])) {
				echo '<a class="memberium-button primary wizard-button" href="?page=', $_GET['page'], '&wizard=', $wizard, '&tab=', $memberium_wizards_lasttab[$wizard], '">Resume Wizard</a>';
			} else {
				echo '<a class="memberium-button primary wizard-button" href="?page=', $_GET['page'], '&wizard=', $wizard, '">Resume Wizard</a>';
			}
		} else {
			echo '<a class="memberium-button primary wizard-button" href="?page=', $_GET['page'], '&wizard=', $wizard, '">Start This Wizard Step</a>';
		}
		echo '</li>';
	} else {
		echo '<li>';
		echo '<h3><a href="?page=', $_GET['page'], '&wizard=', $wizard, '&tab=', $memberium_wizards_lasttab[$wizard], '">', $name, '</a></h3>';
		echo '<span class="not-startted-subtitle">Please complete the previous step to unlock this one. [Internal only message for Memberium Support] Or click ahead to the step you want to skip to.</span>';
		echo '</li>';
	}
}
?>


</ul>



</div>
<!-- END left progress steps -->


<div class="memb-wrap-dash right">

<?php

$i2sdk_options = get_option('i2sdk');

//App Name
echo '<div><h4>App Name</h4><p>', empty($i2sdk_options['app_name']) ? 'Missing' : '<a class="silent-link" href="//' . $i2sdk_options['app_name'] . '.infusionsoft.com" target="_blank">', $i2sdk_options['app_name'], '</a></p></div>';

//API Status
echo '<hr><h4>API Status</h4><p>', (boolean)$i2sdk_options['server_verified'] ? 'Connected' : 'Not Connected', '</p></div>';
?>
</div>
</section>
</div>
<!--- wizard steps testing ---->

</div>