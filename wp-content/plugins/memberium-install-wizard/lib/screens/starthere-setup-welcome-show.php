<?php
if (!defined('ABSPATH')) {
    die();
}
?>
<style>
    .specialThanks p {
        margin-left: 20px;
    }

    .pictureBios p {
        margin-top: 0;
        margin-bottom: 0;
        display: inline-block;
        vertical-align: top;
        width: 340px;
        clear: both;
    }

    .pictureBios img {
        height: 80px;
        width: 80px;
        float: left;
        margin-right: 20px;
        margin-top: 0;
        border-radius: 40px;
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }

    .feature-section {
        width: 100%;
    }


    #support_container {
        display: flex;
        justify-content: space-evenly;
    }

    .column {
        flex-grow: 1;
    }

    .column {
        text-align: left;
        margin: 10px;
    }

</style>
<div class="memberium-content">
    <h2 class="memberium-title">Congratulations!</h2>
    <p>
        We're excited to start helping you build your membership site or online course with Memberium!
    </p>
    <p>
        We want to welcome you to the family and say thanks again for joining Memberium. You're going to love it!
        This wizard will install Memberium and help you set up your site. <strong>Click the "Get Started" button below to continue...</strong>     </p>

<div class="memberium-continue-button-container">
    <a href="?page=<?php echo $_GET['page'] ?>&wizard=setup&tab=server" class="memberium-button primary">Get Started</a>
</div>


<hr>

 <h2 class="memberium-title">Support</h2>
    <div id="support_container">
        <div class="column">
            <p>
                If at any point while using Memberium you have questions, concerns, or would like
                assistance, please contact our fantastic support team who are happily standing by to help you.
            </p>
            <a target="_blank" href="https://memberium.com/support/" class="memberium-button">Contact Support</a>
        </div>
        <div class="column">
            <p>
                If you'd ever like to get in-person help with Memberium, you can join one of our live Office Hours
                calls.
            </p>
            <a target="_blank" href="https://memberium.com/office-hours" class="memberium-button">Join Next Call</a>
        </div>
    </div>

    <div style="clear:both;"></div>

</div>
