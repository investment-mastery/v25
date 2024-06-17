<?php
if (!defined('ABSPATH')) {
    die();
}
$unlocks['otheroptions'] = true;
?>
<div class="memberium-content">
    <h2 class="memberium-title">Watch the video on this page to learn how to add more settings to your membership levels...</h2>
    <div class="memberium-help-video big">
        <iframe src="//player.vimeo.com/video/164376145" allowfullscreen webkitallowfullscreen
                mozallowfullscreen></iframe>
    </div>
    <p>
<!--        <a id="toggle" href="#" onclick="toggleOptional()">Show Written Instructions</a>-->
    </p>
    <ol id="memberium-optional-directions">

    </ol>
</div>
<div class="memberium-continue-button-container">
    <a href="?page=<?php echo $_GET['page']; ?>&wizard=protectlaunch&tab=otheroptions" class="memberium-button primary">Next Step</a>
</div>
