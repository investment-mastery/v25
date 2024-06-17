<?php
#error_reporting(E_ALL);
#ini_set('display_errors',1);
/*
 * Template name: Crypto Club Courses
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
$club = get_club_slug();
?>

<style type="text/css">
.site-main > .description div{
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 32px;
    color: #81858B;
}
.site-main > .description h2{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 32px;
    line-height: 40px;
    color: #1F3C61;
    margin-top:37px;
}

.course-sections {
    margin-top: 130px;
}

.course-sections .section {
    background: #FFFFFF;
    box-shadow: 0px 10px 30px rgba(183, 189, 213, 0.25);
    border-radius: 13px;
    max-width: 720px;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    padding-top: 86px;
    padding-bottom: 70px;
}

.course-sections .section .section-image {
    background: #6F7A88;
    height: 115px;
    width: 115px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 60px;
    position: absolute;
    top: -67px;
}

.course-sections .section .section-image-finish {
    position: absolute;
    top: -67px;
}

.course-sections .section.finish .description {
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 20px;
    text-align: center;

    color: #6C7181;
}

.course-sections .section.finish .download-certificate {
    width: 257px;
    height: 56px;
    background: #C2CAD2;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0.04em;
    color: #FFFFFF;
    margin-top: 25px;
}

.course-sections .section.finish.active .download-certificate {
    background: #48A9F5
}

.course-sections .section.active .section-image {
    background: #1F3C61;
}


.course-sections .section .section-image img {
    margin: auto;
    width: 56px;
}

.course-sections .section .courseprogress .checkmark {
    display: none;
    position: absolute;
    width: 32px;
    left: 3px
}

.course-sections .section .courseprogress .lock {
    position: absolute;
}


.course-sections .section .title {
    font-weight: bold;
    font-size: 24px;
    line-height: 36px;
    text-align: center;
    color: #1F3C61;
    margin-bottom: 25px;
}

.course-sections .section.finish .title {
    margin-bottom: 15px;
}

.course-sections .section .courses {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    margin-top: 60px;
    width: 100%;
    padding: 0px 13px
}

.course-sections .section .courses .course {
    flex: 50% 1;
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;
    text-align: center;
    margin-bottom: 48px;
}

.course-sections .section .courses .course .course-title {
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 23px;
    text-align: center;
    color: #1F3C61;
    margin-top: 13px;
}

.course-sections .section .courses .course .course-icon {
    position: relative
}

.course-sections .section .courses .course .course-icon .courseprogress {
    position: absolute;
    right: 3px;
    bottom: 9px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-radius: 100%;
    background: #fff;
    opacity: 1;
    width: 40px;
    height: 40px
}

.course-sections .section .courses .course.locked .courseprogress .percent {
    display: none;
}

.course-sections .section .courses .course .courseprogress canvas {
    position: absolute;
}

.course-sections .section .courses .course.locked .courseprogress canvas {
    display: none;
}

.course-sections .section .courses .course .courseprogress .percent {
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: 600;
    font-size: 13px;
    line-height: 16px;
    text-align: center;
    text-transform: capitalize;
    color: #48A9F5;
}

.course-sections .section .courses .course.locked .courseprogress {
    border: 4px solid #C2CAD2;
}

.course-sections .section .courses .course.locked .course-icon svg circle {
    stroke: #C2CAD2;
}

.course-sections .section .courses .course.locked .course-icon svg path {
    fill: #C2CAD2
}

.course-sections .section .courses .course.active .course-icon>svg circle {
    stroke: #48A9F5;
}

.course-sections .section .courses .course.active .course-icon>svg path {
    fill: #48A9F5
}

.course-sections .section .courses .percent {
    display: block;
}

.course-sections .section .course.active .lock,
.course-sections .section .course.completed .percent {
    display: none;
}

.course-sections .section .course.completed .checkmark {
    display: block
}

.course-sections .section .progress-bar {
    background: #F3F3F3;
    border-radius: 100px;
    width: 400px;
    height: 6px;
    position: relative;
}

.course-sections .section .progress-bar .progress {
    position: absolute;
    left: 0px;
    background: #00C47D;
    border-radius: 100px;
    height: 6px;
}


.course-sections .section .modules-completed {
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 20px;
    text-align: center;
    color: #6C7181;
    margin-top: 12px;
}

.loader {
    color: #1F3C61;
    font-size: 50px;
    text-indent: -9999em;
    overflow: hidden;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    margin: 72px auto;
    position: relative;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
    animation: load6 1.7s infinite ease, round 1.7s infinite ease;
}

@-webkit-keyframes load6 {
    0% {
        box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
    }

    5%,
    95% {
        box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
    }

    10%,
    59% {
        box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
    }

    20% {
        box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
    }

    38% {
        box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
    }

    100% {
        box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
    }
}

@keyframes load6 {
    0% {
        box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
    }

    5%,
    95% {
        box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
    }

    10%,
    59% {
        box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
    }

    20% {
        box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
    }

    38% {
        box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
    }

    100% {
        box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
    }
}

@-webkit-keyframes round {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

@keyframes round {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

#congratsModal{
    display:none;
}

.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background: rgba(0, 0, 0, 0.8);
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    padding: 50px 0;
}
#congratsModal .modal-content {
    background: #1C355E;
    background-image: url("/wp-content/uploads/2021/11/Vector-29.png");
    background-repeat: no-repeat;
    background-position: top center;
    background-size: cover;
    border-radius: 16px;
    padding: 37px 57px 47px 57px;
    max-width: 480px;
    text-align: center;
}
.modal .close {
    cursor: pointer;
    position: absolute;
    top: 26px;
    right: 26px;
}
.close {
    display: inline-block;
    min-height: 16px;
    min-width: 16px;
    line-height: 16px;
    vertical-align: middle;
    text-align: center;
    font-size: .75rem;
    opacity: .6;
}
.modal .modal-content {
    width: calc(100% - 40px);
    margin: auto;
    position: relative;
}
.modal .modal-content h2{
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 32px;
    line-height: 24px;
    text-align: center;
    text-transform: capitalize;
    color: #FFFFFF;
    margin:26px 0px;
}
.modal .modal-content p{
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 28px;
    text-align: center;
    color: #FFFFFF;
}
.modal .modal-content .download-certificate{
    width: 280px;
    height: 56px;
    border-radius: 4px;
    background: #48A9F5;
    border-radius: 4px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: Source Sans Pro;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0.04em;
    color: #FFFFFF;
    margin-top:35px;
    margin-left:auto;
    margin-right:auto;
}

@media (max-width: 543px){
    .course-sections .section .courses{
        flex-direction:column
    }
    .course-sections .section .progress-bar{
        width:100%
    }
    .course-sections .section {
        padding-left: 30px;
        padding-right: 30px;
    }
}
@media (max-width: 320px){
    .course-sections .section.finish .download-certificate {
        width: 220px;
    }
}

</style>

<div id="primary" class="content-area bb-grid-cell">
    <main id="main" class="site-main">
        <div class="description">
            <h2><?=get_field('heading');?></h2>
            <div><?=get_field('description', $post->ID);?></div>
        </div>

        <div class="course-sections">
            <div class="loader">Loading...</div>
        </div>

        <div id="congratsModal" class="modal"  >

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L1 13M1 1l12 12" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </span>
                
                <svg class="icon" width="133" height="133" viewBox="0 0 133 133" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M131.651 63.3967C129.435 61.3278 128.548 58.9633 130.321 56.3033C131.503 54.3822 131.06 51.87 129.139 50.54C126.48 48.7667 126.332 46.55 127.514 44.0378C128.548 41.8211 127.366 39.1611 125.15 38.2744C122.638 37.3878 121.16 35.7622 121.604 32.8067C122.047 30.59 120.569 28.3733 118.205 27.93C115.398 27.3389 114.364 25.4178 114.511 22.7578C114.511 20.2456 112.591 18.3244 110.079 18.3244C107.419 18.3244 105.498 17.4378 104.907 14.63C104.464 12.4133 102.248 10.9356 100.031 11.2311C97.0761 11.8222 95.5985 10.3444 94.5642 7.68444C93.6777 5.32 91.1658 4.28556 88.8017 5.32C86.1421 6.50222 83.9258 6.20667 82.3004 3.69444C81.1184 1.77333 78.4587 1.18222 76.5379 2.51222C73.8783 4.43333 71.6619 3.54667 69.5934 1.33C67.968 -0.443333 65.1607 -0.443333 63.5353 1.33C61.319 3.54667 59.1026 4.43333 56.2953 2.66C54.3744 1.47778 51.8626 1.92111 50.5328 3.84222C48.7597 6.50222 46.5433 6.65 44.0315 5.46778C41.8151 4.43333 39.1555 5.61556 38.4167 7.83222C37.5302 10.3444 35.9049 11.8222 32.9497 11.3789C30.7334 10.9356 28.517 12.4133 28.0738 14.7778C27.4827 17.5856 25.5619 18.4722 22.9023 18.4722C20.3904 18.4722 18.4696 20.3933 18.4696 22.9056C18.4696 25.5656 17.583 27.4867 14.7757 28.0778C12.5593 28.5211 11.0817 30.7378 11.3773 32.9544C11.9683 35.91 10.4907 37.3878 7.8311 38.4222C5.46699 39.3089 4.4327 41.8211 5.46699 44.1856C6.64905 46.8456 6.35353 49.0622 3.84167 50.6878C1.92084 51.87 1.32981 54.53 2.65962 56.4511C4.4327 59.1111 3.54616 61.3278 1.32981 63.3967C-0.44327 65.0222 -0.44327 67.83 1.32981 69.4556C3.54616 71.5245 4.4327 73.8889 2.65962 76.5489C1.47757 78.47 1.92084 80.9822 3.84167 82.3122C6.50129 84.0856 6.64905 86.3022 5.46699 88.8144C4.4327 91.1789 5.61475 93.8389 7.8311 94.5778C10.343 95.6122 11.8205 97.09 11.3773 100.046C10.934 102.262 12.4116 104.479 14.7757 104.922C17.583 105.513 18.4696 107.434 18.4696 110.094C18.4696 112.607 20.3904 114.528 22.9023 114.528C25.5619 114.528 27.4827 115.414 28.0738 118.222C28.517 120.439 30.7334 121.917 32.9497 121.621C35.9049 121.03 37.3824 122.508 38.4167 125.168C39.3033 127.532 41.8151 128.567 44.1792 127.532C46.8388 126.35 49.0552 126.646 50.6805 129.158C51.8626 131.079 54.5222 131.67 56.443 130.34C59.2504 128.567 61.4667 129.453 63.5353 131.67C65.1607 133.443 67.968 133.443 69.5934 131.67C71.6619 129.453 74.0261 128.567 76.6857 130.34C78.6065 131.522 81.1184 131.079 82.4482 129.158C84.2213 126.498 86.4376 126.35 88.9495 127.532C91.1658 128.567 93.8254 127.384 94.712 125.168C95.7463 122.656 97.2238 121.178 100.179 121.621C102.395 122.064 104.612 120.587 105.055 118.222C105.646 115.414 107.567 114.38 110.226 114.528C112.738 114.528 114.659 112.607 114.659 110.094C114.659 107.434 115.546 105.513 118.353 104.922C120.569 104.479 122.047 102.262 121.751 100.046C121.16 97.09 122.638 95.6122 125.298 94.5778C127.662 93.6911 128.696 91.1789 127.662 88.8144C126.48 86.3022 126.775 83.9378 129.287 82.3122C131.208 81.13 131.799 78.47 130.469 76.5489C128.696 73.7411 129.583 71.5245 131.799 69.4556C133.424 67.9778 133.424 65.0222 131.651 63.3967ZM66.4905 121.917C35.9049 121.917 11.0817 97.09 11.0817 66.5C11.0817 35.91 35.9049 11.0833 66.4905 11.0833C97.0761 11.0833 121.899 35.91 121.899 66.5C121.899 97.09 97.0761 121.917 66.4905 121.917Z" fill="url(#paint0_linear_0_1)"/>
                <path d="M66.4905 126.35C99.54 126.35 126.332 99.5542 126.332 66.5C126.332 33.4458 99.54 6.65 66.4905 6.65C33.441 6.65 6.64905 33.4458 6.64905 66.5C6.64905 99.5542 33.441 126.35 66.4905 126.35Z" fill="url(#paint1_linear_0_1)"/>
                <path d="M65.8457 21.8113C41.5588 21.8113 21.797 41.5728 21.797 65.8664C21.797 90.1568 41.5556 109.921 65.8457 109.921C90.1357 109.921 109.894 90.1599 109.894 65.8664C109.894 41.5728 90.1357 21.8113 65.8457 21.8113ZM65.8457 108.652C42.2549 108.652 23.0627 89.4573 23.0627 65.8632C23.0627 42.2691 42.2549 23.0741 65.8457 23.0741C89.4364 23.0741 108.629 42.2691 108.629 65.8632C108.629 89.4573 89.4364 108.652 65.8457 108.652Z" fill="white"/>
                <path d="M65.852 10C35.0559 10 10 35.0595 10 65.86C10 96.6606 35.0559 121.72 65.852 121.72C96.6481 121.72 121.704 96.6606 121.704 65.86C121.704 35.0595 96.6481 10 65.852 10ZM119.742 74.5634L116.457 73.9842C116.84 71.5916 117.055 69.142 117.093 66.6512H120.429C120.391 69.3382 120.157 71.9809 119.742 74.5634ZM117.41 83.7954L114.277 82.656C115.113 80.257 115.774 77.7758 116.245 75.2312L119.53 75.8104C119.021 78.548 118.309 81.216 117.41 83.7954ZM113.492 92.4798L110.603 90.8119C111.85 88.587 112.932 86.2576 113.84 83.8428L116.973 84.9853C116.005 87.5837 114.837 90.0871 113.492 92.4798ZM108.129 100.354L105.575 98.2113C107.192 96.227 108.663 94.1223 109.973 91.9101L112.863 93.578C111.454 95.958 109.869 98.224 108.129 100.354ZM93.566 112.877L91.8983 109.988C94.1103 108.678 96.2146 107.206 98.1987 105.589L100.341 108.143C98.2113 109.883 95.9456 111.469 93.566 112.877ZM84.9746 116.995L83.8354 113.862C86.2498 112.953 88.5757 111.868 90.8034 110.624L92.4711 113.514C90.0756 114.852 87.5726 116.02 84.9746 116.995ZM75.8009 119.543L75.2218 116.257C77.766 115.786 80.2469 115.124 82.6456 114.289L83.7848 117.422C81.2058 118.324 78.5382 119.036 75.8009 119.543ZM47.9192 117.425L49.0584 114.292C51.4571 115.128 53.938 115.789 56.4822 116.261L55.9031 119.546C53.1658 119.036 50.4982 118.324 47.9192 117.425ZM39.2361 113.507L40.9037 110.618C43.1283 111.865 45.4573 112.947 47.8718 113.855L46.7294 116.989C44.1314 116.02 41.6284 114.852 39.2361 113.507ZM31.363 108.143L33.5053 105.589C35.4894 107.206 37.5937 108.678 39.8057 109.988L38.138 112.877C35.7584 111.469 33.4926 109.883 31.363 108.143ZM57.7289 116.473C60.1212 116.856 62.5705 117.071 65.0609 117.109V120.445C62.3743 120.407 59.732 120.172 57.1498 119.758L57.7289 116.473ZM66.3267 117.112C68.9247 117.087 71.4783 116.871 73.9751 116.473L74.5542 119.758C71.8707 120.188 69.124 120.426 66.3267 120.448V117.112ZM65.852 115.852C38.2899 115.852 15.8668 93.4261 15.8668 65.86C15.8668 38.294 38.2899 15.8677 65.852 15.8677C93.4141 15.8677 115.837 38.294 115.837 65.86C115.837 93.4261 93.4141 115.852 65.852 115.852ZM18.9806 93.8122L21.8666 92.1443C23.183 94.3407 24.6576 96.4295 26.2778 98.3981L23.7241 100.541C21.9837 98.4266 20.3983 96.1763 18.9806 93.8122ZM14.8321 85.2639L17.9648 84.1245C18.8825 86.5266 19.9774 88.8402 21.2305 91.0524L18.3414 92.7203C16.9934 90.3403 15.8194 87.8496 14.8321 85.2639ZM12.2372 76.1174L15.5219 75.5382C16.0092 78.0764 16.6833 80.545 17.5282 82.9377L14.3954 84.077C13.4809 81.504 12.7562 78.8455 12.2372 76.1174ZM11.2753 66.6512H14.6106C14.6485 69.2496 14.8827 71.8005 15.2972 74.2912L12.0126 74.8704C11.5664 72.1898 11.3164 69.4458 11.2753 66.6512ZM12.0126 56.8496L15.2972 57.4288C14.8669 60.0208 14.6295 62.6793 14.6074 65.3853H11.2721C11.2974 62.4799 11.5506 59.6315 12.0126 56.8496ZM14.3954 47.643L17.5282 48.7824C16.6801 51.1718 16.0061 53.6436 15.5219 56.1818L12.2372 55.6027C12.7562 52.8745 13.4809 50.216 14.3954 47.643ZM18.3446 38.9997L21.2337 40.6676C19.9806 42.8799 18.8857 45.1966 17.968 47.5955L14.8352 46.4562C15.8194 43.8705 16.9934 41.3797 18.3446 38.9997ZM23.7273 31.1762L26.2809 33.3188C24.6608 35.2873 23.1861 37.3762 21.8697 39.5726L18.9838 37.9047C20.3983 35.5437 21.9837 33.2935 23.7273 31.1762ZM37.9038 18.9819L39.5715 21.8683C37.3754 23.1849 35.2837 24.6597 33.3186 26.2801L31.1763 23.7261C33.287 21.9854 35.54 20.3998 37.9038 18.9819ZM46.4509 14.8328L47.5933 17.966C45.1915 18.8838 42.8783 19.9788 40.6664 21.2321L38.9987 18.3426C41.3752 16.9944 43.8656 15.8202 46.4509 14.8328ZM55.5961 12.2376L56.1752 15.5227C53.6373 16.0101 51.1691 16.6842 48.7768 17.5292L47.6376 14.396C50.2071 13.4814 52.8684 12.7566 55.5961 12.2376ZM84.0664 14.396L82.9272 17.5292C80.5381 16.681 78.0667 16.0069 75.5288 15.5227L76.1079 12.2376C78.8356 12.7566 81.4937 13.4814 84.0664 14.396ZM92.7084 18.3458L91.0408 21.2353C88.8288 19.982 86.5125 18.887 84.1139 17.9692L85.2531 14.8359C87.8384 15.8202 90.3288 16.9944 92.7084 18.3458ZM100.531 23.7292L98.3886 26.2833C96.4203 24.6629 94.3318 23.188 92.1357 21.8714L93.8033 18.9851C96.164 20.3998 98.417 21.9854 100.531 23.7292ZM74.282 15.298C71.6904 14.8676 69.0322 14.6302 66.3267 14.6081V11.2723C69.2316 11.2976 72.0796 11.5508 74.8611 12.0129L74.282 15.298ZM65.0609 14.6112C62.4629 14.6492 59.9124 14.8834 57.422 15.298L56.8429 12.0129C59.5232 11.5666 62.2667 11.3166 65.0609 11.2754V14.6112ZM112.863 38.1421L109.973 39.8099C108.663 37.5977 107.192 35.4931 105.575 33.5087L108.129 31.3661C109.869 33.496 111.454 35.7621 112.863 38.1421ZM116.98 46.7347L113.847 47.874C112.939 45.4592 111.853 43.1331 110.61 40.905L113.499 39.2371C114.837 41.6329 116.005 44.1363 116.98 46.7347ZM119.527 55.9097L116.242 56.4888C115.771 53.9443 115.109 51.463 114.274 49.064L117.407 47.9247C118.309 50.5041 119.021 53.172 119.527 55.9097ZM117.097 65.3853C117.071 62.7869 116.856 60.2329 116.457 57.7358L119.742 57.1566C120.172 59.8404 120.41 62.5875 120.432 65.3853H117.097ZM107.315 30.3944L104.762 32.5371C103.097 30.5938 101.29 28.774 99.3537 27.0998L101.496 24.5458C103.581 26.3466 105.524 28.3025 107.315 30.3944ZM30.2048 24.5458L32.3471 27.0998C30.4738 28.7234 28.7175 30.4767 27.0974 32.3503L24.5437 30.2077C26.2904 28.1885 28.1859 26.2928 30.2048 24.5458ZM24.5437 101.509L27.0974 99.3665C28.7713 101.3 30.5909 103.107 32.5338 104.775L30.3915 107.329C28.2998 105.538 26.3442 103.595 24.5437 101.509ZM101.312 107.329L99.1702 104.775C101.173 103.057 103.043 101.186 104.762 99.183L107.315 101.326C105.474 103.478 103.464 105.487 101.312 107.329Z" fill="white"/>
                <path d="M53.6138 41.0015C53.2677 41.0341 52.9463 41.1946 52.7129 41.4517C52.4794 41.7087 52.3508 42.0435 52.3523 42.3904V43.7792H45.3921C45.3486 43.7772 45.305 43.7772 45.2616 43.7792C44.9154 43.8118 44.594 43.9723 44.3606 44.2293C44.1271 44.4864 43.9985 44.8212 44 45.1681V48.9874C44 53.9476 47.607 58.1024 52.3523 58.9263V59.0565C52.3523 66.2548 57.8509 72.1787 64.8807 72.8799V82.6669H55.1364C52.8469 82.6669 50.9602 84.5492 50.9602 86.8335V89.6112C50.9603 89.9795 51.1069 90.3327 51.368 90.5932C51.6291 90.8536 51.9831 91 52.3523 91H80.1932C80.5624 91 80.9164 90.8536 81.1775 90.5932C81.4385 90.3327 81.5852 89.9795 81.5852 89.6112V86.8335C81.5852 84.5492 79.6986 82.6669 77.4091 82.6669H67.6648V72.8799C74.6945 72.1787 80.1932 66.2548 80.1932 59.0565V58.9263C84.9368 58.1005 88.5455 53.946 88.5455 48.9874V45.1681C88.5454 44.7997 88.3987 44.4465 88.1377 44.186C87.8766 43.9256 87.5226 43.7793 87.1534 43.7792H80.1932V42.3904C80.1931 42.022 80.0465 41.6688 79.7854 41.4084C79.5244 41.1479 79.1703 41.0016 78.8011 41.0015H53.7443C53.7009 40.9995 53.6573 40.9995 53.6138 41.0015ZM55.1364 43.7792H77.4091V59.0565C77.4091 65.2359 72.4664 70.1673 66.2727 70.1673C60.0791 70.1673 55.1364 65.2359 55.1364 59.0565V43.7792ZM46.7841 46.5569H52.3523V56.0618C49.1435 55.293 46.7841 52.4528 46.7841 48.9874V46.5569ZM80.1932 46.5569H85.7614V48.9874C85.7614 52.4522 83.4016 55.3139 80.1932 56.0835V46.5569ZM55.1364 85.4446H77.4091C78.2044 85.4446 78.8011 86.04 78.8011 86.8335V88.2223H53.7443V86.8335C53.7443 86.04 54.3411 85.4446 55.1364 85.4446Z" fill="white"/>
                <defs>
                <linearGradient id="paint0_linear_0_1" x1="-5.81589e-07" y1="133" x2="133" y2="0.0190714" gradientUnits="userSpaceOnUse">
                <stop offset="0.00540541" stop-color="#E1AD3D"/>
                <stop offset="0.527" stop-color="#F9D477"/>
                <stop offset="0.9486" stop-color="#BF9217"/>
                </linearGradient>
                <linearGradient id="paint1_linear_0_1" x1="-5.81589e-07" y1="133" x2="133" y2="0.0190714" gradientUnits="userSpaceOnUse">
                <stop offset="0.00540541" stop-color="#E1AD3D"/>
                <stop offset="0.527" stop-color="#F9D477"/>
                <stop offset="0.9486" stop-color="#BF9217"/>
                </linearGradient>
                </defs>
                </svg>


                <h2>Congratulations!</h2>
                <p>You have completed the course. Download your Certificate of Completion below.</p>
                
                <a href="" class="download-certificate" download >Download Cetificate</a>
            </div>

        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<?php

add_action("wp_footer", function(){
    ?>

<script src="<?=get_stylesheet_directory_uri();?>/assets/js/gsap.min.js"></script>
<script src="<?=get_stylesheet_directory_uri();?>/assets/js/MotionPathPlugin.min.js"></script>
<script src="<?=get_stylesheet_directory_uri();?>/assets/js/DrawSVGPlugin.min.js"></script>
<script src="<?=get_stylesheet_directory_uri();?>/assets/js/ScrollToPlugin.min.js"></script>
<script src="<?=get_stylesheet_directory_uri();?>/assets/js/circle-progress.min.js"></script>
<script type="text/javascript">
jQuery(document).ready($ => {
    var confetti = {
        maxCount: 150,
        speed: 2,
        frameInterval: 15,
        alpha: 1,
        gradient: !1,
        start: null,
        stop: null,
        toggle: null,
        pause: null,
        resume: null,
        togglePause: null,
        remove: null,
        isPaused: null,
        isRunning: null
    };
    !(function() {
        (confetti.start = s),
        (confetti.stop = w),
        (confetti.toggle = function() {
            e ? w() : s();
        }),
        (confetti.pause = u),
        (confetti.resume = m),
        (confetti.togglePause = function() {
            i ? m() : u();
        }),
        (confetti.isPaused = function() {
            return i;
        }),
        (confetti.remove = function() {
            stop(), (i = !1), (a = []);
        }),
        (confetti.isRunning = function() {
            return e;
        });
        var t =
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame,
            n = [
                "rgb(254, 192, 15,",
                "rgb(0, 196, 125,",
                "rgb(72, 169, 245,",
                // "rgba(106,90,205,",
                // "rgba(173,216,230,",
                // "rgba(238,130,238,",
                // "rgba(152,251,152,",
                // "rgba(70,130,180,",
                // "rgba(244,164,96,",
                // "rgba(210,105,30,",
                // "rgba(220,20,60,"
            ],
            e = !1,
            i = !1,
            o = Date.now(),
            a = [],
            r = 0,
            l = null;

        function d(t, e, i) {
            return (
                (t.color = n[(Math.random() * n.length) | 0] + (confetti.alpha + ")")),
                (t.color2 = n[(Math.random() * n.length) | 0] + (confetti.alpha + ")")),
                (t.x = Math.random() * e),
                (t.y = Math.random() * i - i),
                (t.diameter = 10 * Math.random() + 5),
                (t.tilt = 10 * Math.random() - 10),
                (t.tiltAngleIncrement = 0.07 * Math.random() + 0.05),
                (t.tiltAngle = Math.random() * Math.PI),
                t
            );
        }

        function u() {
            i = !0;
        }

        function m() {
            (i = !1), c();
        }

        function c() {
            if (!i)
                if (0 === a.length)
                    l.clearRect(0, 0, window.innerWidth, window.innerHeight), null;
                else {
                    var n = Date.now(),
                        u = n - o;
                    (!t || u > confetti.frameInterval) &&
                    (l.clearRect(0, 0, window.innerWidth, window.innerHeight),
                        (function() {
                            var t,
                                n = window.innerWidth,
                                i = window.innerHeight;
                            r += 0.01;
                            for (var o = 0; o < a.length; o++)
                                (t = a[o]),
                                !e && t.y < -15 ?
                                (t.y = i + 100) :
                                ((t.tiltAngle += t.tiltAngleIncrement),
                                    (t.x += Math.sin(r) - 0.5),
                                    (t.y += 0.5 * (Math.cos(r) + t.diameter + confetti.speed)),
                                    (t.tilt = 15 * Math.sin(t.tiltAngle))),
                                (t.x > n + 20 || t.x < -20 || t.y > i) &&
                                (e && a.length <= confetti.maxCount ?
                                    d(t, n, i) :
                                    (a.splice(o, 1), o--));
                        })(),
                        (function(t) {
                            for (var n, e, i, o, r = 0; r < a.length; r++) {
                                if (
                                    ((n = a[r]),
                                        t.beginPath(),
                                        (t.lineWidth = n.diameter),
                                        (i = n.x + n.tilt),
                                        (e = i + n.diameter / 2),
                                        (o = n.y + n.tilt + n.diameter / 2),
                                        confetti.gradient)
                                ) {
                                    var l = t.createLinearGradient(e, n.y, i, o);
                                    l.addColorStop("0", n.color),
                                        l.addColorStop("1.0", n.color2),
                                        (t.strokeStyle = l);
                                } else t.strokeStyle = n.color;
                                t.moveTo(e, n.y), t.lineTo(i, o), t.stroke();
                            }
                        })(l),
                        (o = n - (u % confetti.frameInterval))),
                    requestAnimationFrame(c);
                }
        }

        function s(t, n, o) {
            var r = window.innerWidth,
                u = window.innerHeight;
            window.requestAnimationFrame =
                window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function(t) {
                    return window.setTimeout(t, confetti.frameInterval);
                };
            var m = document.getElementById("confetti-canvas");
            null === m ?
                ((m = document.createElement("canvas")).setAttribute(
                        "id",
                        "confetti-canvas"
                    ),
                    m.setAttribute(
                        "style",
                        "display:block;z-index:999999;pointer-events:none;position:fixed;top:0"
                    ),
                    document.body.prepend(m),
                    (m.width = r),
                    (m.height = u),
                    window.addEventListener(
                        "resize",
                        function() {
                            (m.width = window.innerWidth), (m.height = window.innerHeight);
                        },
                        !0
                    ),
                    (l = m.getContext("2d"))) :
                null === l && (l = m.getContext("2d"));
            var s = confetti.maxCount;
            if (n)
                if (o)
                    if (n == o) s = a.length + o;
                    else {
                        if (n > o) {
                            var f = n;
                            (n = o), (o = f);
                        }
                        s = a.length + ((Math.random() * (o - n) + n) | 0);
                    }
            else s = a.length + n;
            else o && (s = a.length + o);
            for (; a.length < s;) a.push(d({}, r, u));
            (e = !0), (i = !1), c(), t && window.setTimeout(w, t);
        }

        function w() {
            e = !1;
        }
    })();

    getCryptoCourses = () => {
        $.ajax({
            method: 'GET',
            url: '<?php echo get_site_url();?>/wp-json/api/courses/crypto',
            data: {
                pid: <?=get_the_id()?>
            },
            dataType: 'json',
            headers: {
                "X-WP-Nonce": "<?=wp_create_nonce( 'wp_rest' );?>"
            },
            error: function(data) {

            },
            success: function(data) {
                courseSectionsTpl = ``
                completedAllSections = true;

                data.sections.map(section => {
                    if (!section.is_section_complete) completedAllSections = false;

                    courseSections = ``;
                    section.courses.map(course => {
                        courseSections += `
                                <a ${(section.is_previous_section_complete || section.is_section_complete) ? `href="${course.course.url}"`:`href="${course.course.url}"`} 
                                    class="course ${(section.is_previous_section_complete || section.is_section_complete) ? `active`:`active`} ${(course.course.completed) ? `completed`:``} ">
                                    <div class="course-icon">
                                        ${course.icon}

                                        <div class="courseprogress" data-value="${course.course.progress_decimal}">
                                            <span class="percent">${course.course.progress_percent}%</span>
                                            <svg class="checkmark" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.7276 2.22729L6.72758 12.2273L2.18213 7.68184" stroke="#00C47D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <svg class="lock"width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2727 9.99997C15.2727 8.99724 14.4573 8.18178 13.4546 8.18178H12.5455V5.45451C12.5455 2.94815 10.5064 0.909058 8.00002 0.909058C5.49366 0.909058 3.45457 2.94815 3.45457 5.45451V8.18178H2.54548C1.54275 8.18178 0.727295 8.99724 0.727295 9.99997V17.2727C0.727295 18.2754 1.54275 19.0909 2.54548 19.0909H13.4546C14.4573 19.0909 15.2727 18.2754 15.2727 17.2727V9.99997ZM5.27275 5.45451C5.27275 3.95088 6.49639 2.72724 8.00002 2.72724C9.50366 2.72724 10.7273 3.95088 10.7273 5.45451V8.18178H5.27275V5.45451Z" fill="#C2CAD2"/>
                                            </svg>

                                        </div>
                                        
                                    </div>
                                    <div class="course-title">${course.title}</div>
                                </a>
                                `
                    })

                    courseSectionsTpl += `
                                <div class="section ${(section.is_previous_section_complete || section.is_section_complete) ? `active`:`active`} ${(section.is_section_complete) ? `completed`:``}">
                                    <div class="section-image"><img src="${section.icon}" /></div>
                                    <div class="title">${section.title}</div>
                                    <div class="progress-bar">
                                        <div class="progress" style="width:${section.progress_percent}%"></div>
                                    </div>
                                    <div class="modules-completed">
                                        ${section.completed_course_count} of ${section.courses.length} modules completed
                                    </div>
                                    <div class="courses">
                                        ${courseSections}
                                    </div>
                                </div>
                            `
                });

                courseSectionsTpl += `
                            <div class="section finish ${(completedAllSections) ? `active`:``} ">
                                <div class="section-image-finish">

                                    ${
                                        (completedAllSections) ? 
                                        `
                                        <svg width="111" height="111" viewBox="0 0 111 111" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M109.017 52.9508C107.196 51.2514 106.468 49.3092 107.925 47.1242C108.896 45.5461 108.532 43.4825 106.954 42.39C104.769 40.9333 104.648 39.1125 105.619 37.0489C106.468 35.2281 105.497 33.0431 103.677 32.3147C101.613 31.5864 100.4 30.2511 100.764 27.8233C101.128 26.0025 99.9141 24.1817 97.9722 23.8175C95.6661 23.3319 94.8165 21.7539 94.9379 19.5689C94.9379 17.5053 93.3601 15.9272 91.2968 15.9272C89.1121 15.9272 87.5342 15.1989 87.0488 12.8925C86.6846 11.0717 84.8641 9.85778 83.0435 10.1006C80.6161 10.5861 79.4024 9.37222 78.5527 7.18722C77.8245 5.245 75.7612 4.39528 73.8193 5.245C71.6346 6.21611 69.814 5.97333 68.4789 3.90972C67.5079 2.33167 65.3233 1.84611 63.7454 2.93861C61.5607 4.51667 59.7402 3.78833 58.041 1.9675C56.7059 0.510833 54.3998 0.510833 53.0647 1.9675C51.2442 3.78833 49.4236 4.51667 47.1175 3.06C45.5397 2.08889 43.4764 2.45306 42.3841 4.03111C40.9276 6.21611 39.107 6.3375 37.0437 5.36639C35.2231 4.51667 33.0384 5.48778 32.4316 7.30861C31.7034 9.37222 30.3683 10.5861 27.9408 10.2219C26.1203 9.85778 24.2997 11.0717 23.9356 13.0139C23.4501 15.3203 21.8723 16.0486 19.6876 16.0486C17.6243 16.0486 16.0464 17.6267 16.0464 19.6903C16.0464 21.8753 15.3182 23.4533 13.0121 23.9389C11.1916 24.3031 9.97786 26.1239 10.2206 27.9447C10.7061 30.3725 9.49238 31.5864 7.30769 32.4361C5.36575 33.1644 4.51614 35.2281 5.36575 37.1703C6.33672 39.3553 6.09397 41.1761 4.03066 42.5114C2.45283 43.4825 1.96734 45.6675 3.05969 47.2456C4.51614 49.4306 3.78792 51.2514 1.96734 52.9508C0.510886 54.2861 0.510886 56.5925 1.96734 57.9278C3.78792 59.6272 4.51614 61.5694 3.05969 63.7544C2.08871 65.3325 2.45283 67.3961 4.03066 68.4886C6.21534 69.9453 6.33672 71.7661 5.36575 73.8297C4.51614 75.7719 5.48712 77.9569 7.30769 78.5639C9.371 79.4136 10.5847 80.6275 10.2206 83.0553C9.85649 84.8761 11.0702 86.6969 13.0121 87.0611C15.3182 87.5467 16.0464 89.1247 16.0464 91.3097C16.0464 93.3733 17.6243 94.9514 19.6876 94.9514C21.8723 94.9514 23.4501 95.6797 23.9356 97.9861C24.2997 99.8069 26.1203 101.021 27.9408 100.778C30.3683 100.293 31.582 101.506 32.4316 103.691C33.1598 105.634 35.2231 106.483 37.1651 105.634C39.3498 104.662 41.1703 104.905 42.5054 106.969C43.4764 108.547 45.6611 109.032 47.2389 107.94C49.545 106.483 51.3655 107.212 53.0647 109.032C54.3998 110.489 56.7059 110.489 58.041 109.032C59.7402 107.212 61.6821 106.483 63.8668 107.94C65.4446 108.911 67.5079 108.547 68.6003 106.969C70.0567 104.784 71.8773 104.662 73.9406 105.634C75.7612 106.483 77.9459 105.512 78.6741 103.691C79.5237 101.628 80.7374 100.414 83.1649 100.778C84.9855 101.142 86.806 99.9283 87.1701 97.9861C87.6556 95.6797 89.2334 94.83 91.4181 94.9514C93.4814 94.9514 95.0593 93.3733 95.0593 91.3097C95.0593 89.1247 95.7875 87.5467 98.0936 87.0611C99.9141 86.6969 101.128 84.8761 100.885 83.0553C100.4 80.6275 101.613 79.4136 103.798 78.5639C105.74 77.8356 106.59 75.7719 105.74 73.8297C104.769 71.7661 105.012 69.8239 107.075 68.4886C108.653 67.5175 109.138 65.3325 108.046 63.7544C106.59 61.4481 107.318 59.6272 109.138 57.9278C110.473 56.7139 110.473 54.2861 109.017 52.9508ZM55.4922 101.021C30.3683 101.021 9.97786 80.6275 9.97786 55.5C9.97786 30.3725 30.3683 9.97917 55.4922 9.97917C80.6161 9.97917 101.006 30.3725 101.006 55.5C101.006 80.6275 80.6161 101.021 55.4922 101.021Z" fill="url(#paint0_linear_0_1)"/>
                                        <path d="M55.4922 104.662C82.64 104.662 104.648 82.6517 104.648 55.5C104.648 28.3483 82.64 6.3375 55.4922 6.3375C28.3444 6.3375 6.33672 28.3483 6.33672 55.5C6.33672 82.6517 28.3444 104.662 55.4922 104.662Z" fill="url(#paint1_linear_0_1)"/>
                                        <path d="M55.487 19.3159C35.537 19.3159 19.3041 35.5486 19.3041 55.504C19.3041 75.4568 35.5344 91.692 55.487 91.692C75.4396 91.692 91.6699 75.4594 91.6699 55.504C91.6699 35.5486 75.4396 19.3159 55.487 19.3159ZM55.487 90.6496C36.1089 90.6496 20.3439 74.8823 20.3439 55.5014C20.3439 36.1205 36.1089 20.3532 55.487 20.3532C74.8651 20.3532 90.6301 36.1205 90.6301 55.5014C90.6301 74.8823 74.8651 90.6496 55.487 90.6496Z" fill="white"/>
                                        <path d="M55.4922 9.61377C30.1954 9.61377 9.61377 30.1983 9.61377 55.4988C9.61377 80.7992 30.1954 101.384 55.4922 101.384C80.789 101.384 101.371 80.7992 101.371 55.4988C101.371 30.1983 80.789 9.61377 55.4922 9.61377ZM99.759 62.648L97.0609 62.1723C97.3754 60.2069 97.5522 58.1947 97.5834 56.1487H100.323C100.292 58.3559 100.1 60.5266 99.759 62.648ZM97.8433 70.2314L95.27 69.2955C95.9562 67.3249 96.4995 65.2867 96.8867 63.1965L99.5849 63.6723C99.1664 65.921 98.5815 68.1126 97.8433 70.2314ZM94.6253 77.365L92.2521 75.9949C93.2763 74.1674 94.1652 72.254 94.9112 70.2704L97.4846 71.2089C96.6892 73.3432 95.73 75.3996 94.6253 77.365ZM90.2194 83.8331L88.1218 82.0731C89.45 80.4431 90.6587 78.7143 91.7348 76.8971L94.1081 78.2671C92.9513 80.2221 91.6491 82.0835 90.2194 83.8331ZM78.2572 94.1202L76.8874 91.7466C78.7043 90.6704 80.4329 89.4615 82.0627 88.133L83.8224 90.231C82.0731 91.6609 80.212 92.9633 78.2572 94.1202ZM71.2 97.5024L70.2643 94.9287C72.2476 94.1826 74.1581 93.2909 75.988 92.2692L77.3579 94.6427C75.3902 95.7424 73.3341 96.7017 71.2 97.5024ZM63.6645 99.5952L63.1889 96.8967C65.2787 96.5093 67.3166 95.966 69.2869 95.2797L70.2227 97.8534C68.1042 98.5943 65.913 99.1792 63.6645 99.5952ZM40.7617 97.856L41.6975 95.2823C43.6678 95.9686 45.7057 96.5119 47.7955 96.8993L47.3199 99.5978C45.0714 99.1792 42.8802 98.5943 40.7617 97.856ZM33.6291 94.6375L34.999 92.264C36.8263 93.2883 38.7394 94.1774 40.7227 94.9235L39.7844 97.4972C37.6503 96.7017 35.5942 95.7424 33.6291 94.6375ZM27.1619 90.231L28.9217 88.133C30.5515 89.4615 32.2801 90.6704 34.097 91.7466L32.7271 94.1202C30.7724 92.9633 28.9113 91.6609 27.1619 90.231ZM48.8197 97.0735C50.7848 97.388 52.7967 97.5648 54.8424 97.596V100.336C52.6355 100.305 50.4651 100.113 48.344 99.772L48.8197 97.0735ZM55.8821 97.5986C58.0162 97.5778 60.1138 97.401 62.1647 97.0735L62.6404 99.772C60.4361 100.126 58.1799 100.321 55.8821 100.339V97.5986ZM55.4922 96.5639C32.8519 96.5639 14.433 78.1423 14.433 55.4988C14.433 32.8552 32.8519 14.4336 55.4922 14.4336C78.1325 14.4336 96.5514 32.8552 96.5514 55.4988C96.5514 78.1423 78.1325 96.5639 55.4922 96.5639ZM16.9907 78.4595L19.3613 77.0894C20.4426 78.8936 21.6539 80.6095 22.9848 82.2265L20.8871 83.9865C19.4575 82.2499 18.1552 80.4015 16.9907 78.4595ZM13.583 71.4376L16.1563 70.5018C16.9101 72.4749 17.8095 74.3753 18.8388 76.1925L16.4656 77.5626C15.3583 75.6076 14.394 73.5616 13.583 71.4376ZM11.4515 63.9245L14.1496 63.4487C14.5499 65.5337 15.1036 67.5615 15.7976 69.5269L13.2243 70.4628C12.473 68.3492 11.8778 66.1654 11.4515 63.9245ZM10.6613 56.1487H13.401C13.4322 58.2831 13.6246 60.3785 13.9651 62.4244L11.267 62.9002C10.9004 60.6982 10.6951 58.4443 10.6613 56.1487ZM11.267 48.0974L13.9651 48.5731C13.6116 50.7023 13.4166 52.8861 13.3984 55.1088H10.6587C10.6795 52.7223 10.8874 50.3825 11.267 48.0974ZM13.2243 40.5348L15.7976 41.4707C15.101 43.4335 14.5473 45.4639 14.1496 47.5488L11.4515 47.0731C11.8778 44.8321 12.473 42.6484 13.2243 40.5348ZM16.4682 33.435L18.8414 34.805C17.8121 36.6222 16.9127 38.5252 16.1589 40.4958L13.5856 39.5599C14.394 37.4359 15.3583 35.39 16.4682 33.435ZM20.8897 27.0085L22.9874 28.7685C21.6565 30.3855 20.4452 32.1013 19.3639 33.9055L16.9933 32.5355C18.1552 30.5961 19.4575 28.7477 20.8897 27.0085ZM32.5348 16.9918L33.9046 19.3627C32.1007 20.4442 30.3825 21.6557 28.7683 22.9867L27.0086 20.8887C28.7423 19.4589 30.5931 18.1564 32.5348 16.9918ZM39.5556 13.5835L40.494 16.1573C38.5211 16.9112 36.621 17.8107 34.804 18.8402L33.4342 16.4666C35.3863 15.3591 37.432 14.3946 39.5556 13.5835ZM47.0677 11.4518L47.5434 14.1503C45.4587 14.5506 43.4312 15.1044 41.4661 15.7985L40.5304 13.2248C42.641 12.4735 44.8271 11.8781 47.0677 11.4518ZM70.454 13.2248L69.5183 15.7985C67.5558 15.1018 65.5257 14.548 63.441 14.1503L63.9167 11.4518C66.1573 11.8781 68.3408 12.4735 70.454 13.2248ZM77.5528 16.4692L76.183 18.8428C74.366 17.8133 72.4633 16.9138 70.493 16.1599L71.4288 13.5861C73.5524 14.3946 75.5981 15.3591 77.5528 16.4692ZM83.9784 20.8913L82.2187 22.9893C80.6019 21.6583 78.8863 20.4468 77.0824 19.3653L78.4522 16.9944C80.3913 18.1564 82.2421 19.4589 83.9784 20.8913ZM62.4168 13.9657C60.288 13.6121 58.1045 13.4172 55.8821 13.399V10.6589C58.2683 10.6797 60.6077 10.8876 62.8925 11.2672L62.4168 13.9657ZM54.8424 13.4016C52.7083 13.4328 50.6132 13.6251 48.5675 13.9657L48.0919 11.2672C50.2935 10.9006 52.5471 10.6953 54.8424 10.6615V13.4016ZM94.1081 32.7305L91.7348 34.1005C90.6587 32.2833 89.45 30.5545 88.1218 28.9245L90.2194 27.1645C91.6491 28.9141 92.9513 30.7755 94.1081 32.7305ZM97.4898 39.7887L94.9165 40.7246C94.1704 38.741 93.2789 36.8302 92.2573 35L94.6305 33.63C95.73 35.5979 96.6892 37.6543 97.4898 39.7887ZM99.5823 47.3253L96.8841 47.801C96.4968 45.7108 95.9536 43.6727 95.2674 41.7021L97.8407 40.7662C98.5815 42.885 99.1664 45.0765 99.5823 47.3253ZM97.586 55.1088C97.5652 52.9745 97.3884 50.8765 97.0609 48.8253L99.759 48.3496C100.113 50.5541 100.307 52.8107 100.326 55.1088H97.586ZM89.5514 26.3663L87.4537 28.1264C86.0865 26.5301 84.6022 25.0353 83.0115 23.66L84.7712 21.5621C86.4842 23.0413 88.0802 24.6479 89.5514 26.3663ZM26.2106 21.5621L27.9703 23.66C26.4315 24.9937 24.9889 26.4339 23.658 27.973L21.5604 26.213C22.9952 24.5543 24.5522 22.9971 26.2106 21.5621ZM21.5604 84.782L23.658 83.022C25.0331 84.6104 26.5277 86.0949 28.1237 87.4649L26.3639 89.5629C24.6458 88.0914 23.0394 86.4952 21.5604 84.782ZM84.6204 89.5629L82.8607 87.4649C84.5061 86.0533 86.0423 84.5168 87.4537 82.8712L89.5514 84.6312C88.0386 86.399 86.388 88.0498 84.6204 89.5629Z" fill="white"/>
                                        <path d="M45.6734 36.0012C45.3971 36.0273 45.1406 36.1557 44.9543 36.3613C44.7679 36.5669 44.6653 36.8348 44.6665 37.1123V38.2234H39.1111C39.0764 38.2217 39.0416 38.2217 39.0069 38.2234C38.7307 38.2494 38.4741 38.3779 38.2878 38.5835C38.1015 38.7891 37.9988 39.057 38 39.3345V42.3899C38 46.3581 40.879 49.6819 44.6665 50.3411V50.4452C44.6665 56.2038 49.0553 60.9429 54.6662 61.5039V69.3335H46.8886C45.0612 69.3335 43.5554 70.8394 43.5554 72.6668V74.8889C43.5554 75.1836 43.6725 75.4662 43.8809 75.6745C44.0892 75.8829 44.3718 76 44.6665 76H66.888C67.1827 76 67.4653 75.8829 67.6736 75.6745C67.882 75.4662 67.9991 75.1836 67.9991 74.8889V72.6668C67.9991 70.8394 66.4933 69.3335 64.6659 69.3335H56.8883V61.5039C62.4992 60.9429 66.888 56.2038 66.888 50.4452V50.3411C70.6742 49.6804 73.5545 46.3568 73.5545 42.3899V39.3345C73.5545 39.0398 73.4374 38.7572 73.229 38.5488C73.0207 38.3405 72.7381 38.2234 72.4434 38.2234H66.888V37.1123C66.888 36.8176 66.7709 36.535 66.5626 36.3267C66.3542 36.1183 66.0716 36.0013 65.7769 36.0012H45.7776C45.7428 35.9996 45.7081 35.9996 45.6734 36.0012ZM46.8886 38.2234H64.6659V50.4452C64.6659 55.3887 60.7208 59.3338 55.7772 59.3338C50.8337 59.3338 46.8886 55.3887 46.8886 50.4452V38.2234ZM40.2222 40.4455H44.6665V48.0495C42.1053 47.4344 40.2222 45.1623 40.2222 42.3899V40.4455ZM66.888 40.4455H71.3323V42.3899C71.3323 45.1617 69.4488 47.4511 66.888 48.0668V40.4455ZM46.8886 71.5557H64.6659C65.3006 71.5557 65.7769 72.032 65.7769 72.6668V73.7778H45.7776V72.6668C45.7776 72.032 46.2539 71.5557 46.8886 71.5557Z" fill="white"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_0_1" x1="0.875" y1="110.125" x2="110.125" y2="0.890666" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.00540541" stop-color="#E1AD3D"/>
                                        <stop offset="0.527" stop-color="#F9D477"/>
                                        <stop offset="0.9486" stop-color="#BF9217"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_0_1" x1="0.875" y1="110.125" x2="110.125" y2="0.890666" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.00540541" stop-color="#E1AD3D"/>
                                        <stop offset="0.527" stop-color="#F9D477"/>
                                        <stop offset="0.9486" stop-color="#BF9217"/>
                                        </linearGradient>
                                        </defs>
                                        </svg>

                                        `
                                        :
                                        `
                                        <svg width="111" height="110" viewBox="0 0 111 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="last-icon-bg"
                                                d="M109.017 52.8258C107.196 51.1264 106.468 49.1842 107.925 46.9992C108.896 45.4211 108.532 43.3575 106.954 42.265C104.769 40.8083 104.648 38.9875 105.619 36.9239C106.468 35.1031 105.497 32.9181 103.677 32.1897C101.613 31.4614 100.4 30.1261 100.764 27.6983C101.128 25.8775 99.9141 24.0567 97.9722 23.6925C95.6661 23.2069 94.8165 21.6289 94.9379 19.4439C94.9379 17.3803 93.3601 15.8022 91.2968 15.8022C89.1121 15.8022 87.5342 15.0739 87.0488 12.7675C86.6846 10.9467 84.8641 9.73278 83.0435 9.97556C80.6161 10.4611 79.4024 9.24722 78.5528 7.06222C77.8245 5.12 75.7612 4.27028 73.8193 5.12C71.6346 6.09111 69.814 5.84833 68.4789 3.78472C67.5079 2.20667 65.3233 1.72111 63.7454 2.81361C61.5607 4.39167 59.7402 3.66333 58.041 1.8425C56.7059 0.385833 54.3998 0.385833 53.0647 1.8425C51.2442 3.66333 49.4236 4.39167 47.1175 2.935C45.5397 1.96389 43.4764 2.32806 42.3841 3.90611C40.9276 6.09111 39.107 6.2125 37.0437 5.24139C35.2231 4.39167 33.0384 5.36278 32.4316 7.18361C31.7034 9.24722 30.3683 10.4611 27.9408 10.0969C26.1203 9.73278 24.2997 10.9467 23.9356 12.8889C23.4501 15.1953 21.8723 15.9236 19.6876 15.9236C17.6243 15.9236 16.0464 17.5017 16.0464 19.5653C16.0464 21.7503 15.3182 23.3283 13.0121 23.8139C11.1916 24.1781 9.97786 25.9989 10.2206 27.8197C10.7061 30.2475 9.49238 31.4614 7.30769 32.3111C5.36575 33.0394 4.51614 35.1031 5.36574 37.0453C6.33672 39.2303 6.09397 41.0511 4.03066 42.3864C2.45283 43.3575 1.96734 45.5425 3.05969 47.1206C4.51614 49.3056 3.78792 51.1264 1.96734 52.8258C0.510886 54.1611 0.510886 56.4675 1.96734 57.8028C3.78792 59.5022 4.51614 61.4444 3.05969 63.6294C2.08871 65.2075 2.45283 67.2711 4.03066 68.3636C6.21535 69.8203 6.33672 71.6411 5.36574 73.7047C4.51614 75.6469 5.48712 77.8319 7.30769 78.4389C9.371 79.2886 10.5847 80.5025 10.2206 82.9303C9.85649 84.7511 11.0702 86.5719 13.0121 86.9361C15.3182 87.4217 16.0464 88.9997 16.0464 91.1847C16.0464 93.2483 17.6243 94.8264 19.6876 94.8264C21.8723 94.8264 23.4501 95.5547 23.9356 97.8611C24.2997 99.6819 26.1203 100.896 27.9408 100.653C30.3683 100.168 31.582 101.381 32.4316 103.566C33.1598 105.509 35.2231 106.358 37.1651 105.509C39.3498 104.538 41.1703 104.78 42.5054 106.844C43.4764 108.422 45.6611 108.907 47.2389 107.815C49.545 106.358 51.3655 107.087 53.0647 108.907C54.3998 110.364 56.7059 110.364 58.041 108.907C59.7402 107.087 61.6821 106.358 63.8668 107.815C65.4446 108.786 67.5079 108.422 68.6003 106.844C70.0567 104.659 71.8773 104.538 73.9406 105.509C75.7612 106.358 77.9459 105.387 78.6741 103.566C79.5237 101.503 80.7374 100.289 83.1649 100.653C84.9854 101.017 86.806 99.8033 87.1701 97.8611C87.6556 95.5547 89.2334 94.705 91.4181 94.8264C93.4814 94.8264 95.0593 93.2483 95.0593 91.1847C95.0593 88.9997 95.7875 87.4217 98.0936 86.9361C99.9141 86.5719 101.128 84.7511 100.885 82.9303C100.4 80.5025 101.613 79.2886 103.798 78.4389C105.74 77.7106 106.59 75.6469 105.74 73.7047C104.769 71.6411 105.012 69.6989 107.075 68.3636C108.653 67.3925 109.138 65.2075 108.046 63.6294C106.59 61.3231 107.318 59.5022 109.138 57.8028C110.473 56.5889 110.473 54.1611 109.017 52.8258ZM55.4922 100.896C30.3683 100.896 9.97786 80.5025 9.97786 55.375C9.97786 30.2475 30.3683 9.85417 55.4922 9.85417C80.6161 9.85417 101.006 30.2475 101.006 55.375C101.006 80.5025 80.6161 100.896 55.4922 100.896Z"
                                                fill="#C2CAD2" />
                                            <path class="last-icon-bg"
                                                d="M55.4922 104.537C82.64 104.537 104.648 82.5267 104.648 55.375C104.648 28.2233 82.64 6.2125 55.4922 6.2125C28.3444 6.2125 6.33672 28.2233 6.33672 55.375C6.33672 82.5267 28.3444 104.537 55.4922 104.537Z"
                                                fill="#C2CAD2" />
                                            <path
                                                d="M55.4869 19.1909C35.5369 19.1909 19.304 35.4236 19.304 55.379C19.304 75.3318 35.5343 91.567 55.4869 91.567C75.4394 91.567 91.6698 75.3344 91.6698 55.379C91.6698 35.4236 75.4394 19.1909 55.4869 19.1909ZM55.4869 90.5245C36.1088 90.5245 20.3437 74.7573 20.3437 55.3764C20.3437 35.9955 36.1088 20.2282 55.4869 20.2282C74.865 20.2282 90.63 35.9955 90.63 55.3764C90.63 74.7573 74.865 90.5245 55.4869 90.5245Z"
                                                fill="white" />
                                            <path
                                                d="M55.4921 9.48877C30.1953 9.48877 9.61365 30.0733 9.61365 55.3738C9.61365 80.6742 30.1953 101.259 55.4921 101.259C80.7889 101.259 101.371 80.6742 101.371 55.3738C101.371 30.0733 80.7889 9.48877 55.4921 9.48877ZM99.7589 62.523L97.0608 62.0472C97.3753 60.0819 97.5521 58.0697 97.5833 56.0237H100.323C100.292 58.2309 100.099 60.4016 99.7589 62.523ZM97.8432 70.1064L95.2698 69.1705C95.9561 67.1999 96.4993 65.1617 96.8866 63.0715L99.5848 63.5473C99.1663 65.796 98.5814 67.9876 97.8432 70.1064ZM94.6252 77.24L92.252 75.8699C93.2762 74.0423 94.1651 72.129 94.9111 70.1454L97.4845 71.0839C96.6891 73.2182 95.7299 75.2746 94.6252 77.24ZM90.2193 83.7081L88.1217 81.9481C89.4499 80.3181 90.6586 78.5892 91.7347 76.772L94.1079 78.1421C92.9512 80.0971 91.649 81.9585 90.2193 83.7081ZM78.2571 93.9952L76.8873 91.6216C78.7042 90.5453 80.4328 89.3365 82.0626 88.008L83.8223 90.106C82.073 91.5358 80.2118 92.8383 78.2571 93.9952ZM71.1999 97.3774L70.2642 94.8037C72.2475 94.0576 74.158 93.1659 75.9879 92.1442L77.3578 94.5177C75.3901 95.6174 73.334 96.5767 71.1999 97.3774ZM63.6644 99.4702L63.1887 96.7717C65.2786 96.3843 67.3165 95.841 69.2868 95.1546L70.2226 97.7284C68.1041 98.4693 65.9129 99.0542 63.6644 99.4702ZM40.7616 97.731L41.6974 95.1572C43.6677 95.8436 45.7055 96.3869 47.7954 96.7743L47.3197 99.4728C45.0713 99.0542 42.8801 98.4693 40.7616 97.731ZM33.629 94.5125L34.9988 92.139C36.8262 93.1633 38.7393 94.0524 40.7226 94.7985L39.7842 97.3722C37.6502 96.5767 35.5941 95.6174 33.629 94.5125ZM27.1618 90.106L28.9216 88.008C30.5514 89.3365 32.2799 90.5453 34.0969 91.6216L32.727 93.9952C30.7723 92.8383 28.9112 91.5358 27.1618 90.106ZM48.8196 96.9485C50.7847 97.263 52.7966 97.4398 54.8422 97.471V100.211C52.6354 100.18 50.4649 99.9875 48.3439 99.647L48.8196 96.9485ZM55.882 97.4736C58.016 97.4528 60.1137 97.276 62.1646 96.9485L62.6403 99.647C60.436 100.001 58.1798 100.196 55.882 100.214V97.4736ZM55.4921 96.4389C32.8518 96.4389 14.4328 78.0173 14.4328 55.3738C14.4328 32.7302 32.8518 14.3086 55.4921 14.3086C78.1324 14.3086 96.5513 32.7302 96.5513 55.3738C96.5513 78.0173 78.1324 96.4389 55.4921 96.4389ZM16.9906 78.3345L19.3612 76.9644C20.4425 78.7686 21.6538 80.4844 22.9847 82.1015L20.887 83.8615C19.4574 82.1249 18.1551 80.2765 16.9906 78.3345ZM13.5828 71.3126L16.1562 70.3767C16.91 72.3499 17.8094 74.2503 18.8387 76.0675L16.4655 77.4376C15.3582 75.4826 14.3938 73.4366 13.5828 71.3126ZM11.4514 63.7995L14.1495 63.3237C14.5498 65.4087 15.1035 67.4365 15.7975 69.4019L13.2241 70.3377C12.4729 68.2242 11.8777 66.0404 11.4514 63.7995ZM10.6612 56.0237H13.4009C13.4321 58.1581 13.6244 60.2534 13.965 62.2994L11.2668 62.7752C10.9003 60.5732 10.695 58.3193 10.6612 56.0237ZM11.2668 47.9724L13.965 48.4481C13.6114 50.5773 13.4165 52.7611 13.3983 54.9838H10.6586C10.6794 52.5973 10.8873 50.2575 11.2668 47.9724ZM13.2241 40.4098L15.7975 41.3457C15.1009 43.3085 14.5472 45.3389 14.1495 47.4238L11.4514 46.9481C11.8777 44.7071 12.4729 42.5234 13.2241 40.4098ZM16.4681 33.31L18.8413 34.68C17.812 36.4972 16.9126 38.4002 16.1588 40.3708L13.5854 39.4349C14.3938 37.3109 15.3582 35.265 16.4681 33.31ZM20.8896 26.8835L22.9873 28.6435C21.6564 30.2605 20.4451 31.9763 19.3638 33.7805L16.9932 32.4105C18.1551 30.4711 19.4574 28.6227 20.8896 26.8835ZM32.5347 16.8668L33.9045 19.2377C32.1006 20.3192 30.3824 21.5307 28.7682 22.8617L27.0085 20.7637C28.7422 19.3339 30.593 18.0314 32.5347 16.8668ZM39.5555 13.4585L40.4939 16.0323C38.521 16.7862 36.6208 17.6857 34.8039 18.7152L33.434 16.3416C35.3861 15.2341 37.4318 14.2696 39.5555 13.4585ZM47.0676 11.3268L47.5433 14.0253C45.4586 14.4256 43.4311 14.9794 41.466 15.6735L40.5303 13.0998C42.6409 12.3485 44.827 11.7531 47.0676 11.3268ZM70.4539 13.0998L69.5181 15.6735C67.5556 14.9768 65.5255 14.423 63.4409 14.0253L63.9166 11.3268C66.1572 11.7531 68.3406 12.3485 70.4539 13.0998ZM77.5527 16.3442L76.1829 18.7178C74.3659 17.6883 72.4632 16.7888 70.4929 16.0349L71.4287 13.4611C73.5523 14.2696 75.598 15.2341 77.5527 16.3442ZM83.9783 20.7663L82.2185 22.8643C80.6017 21.5333 78.8862 20.3218 77.0822 19.2403L78.4521 16.8694C80.3912 18.0314 82.2419 19.3339 83.9783 20.7663ZM62.4167 13.8407C60.2879 13.4871 58.1044 13.2922 55.882 13.274V10.5339C58.2682 10.5547 60.6076 10.7626 62.8924 11.1422L62.4167 13.8407ZM54.8422 13.2766C52.7082 13.3078 50.6131 13.5001 48.5674 13.8407L48.0917 11.1422C50.2934 10.7756 52.547 10.5703 54.8422 10.5365V13.2766ZM94.1079 32.6055L91.7347 33.9755C90.6586 32.1583 89.4499 30.4295 88.1217 28.7995L90.2193 27.0395C91.649 28.7891 92.9512 30.6505 94.1079 32.6055ZM97.4897 39.6637L94.9163 40.5996C94.1703 38.616 93.2788 36.7052 92.2572 34.875L94.6304 33.505C95.7299 35.4729 96.6891 37.5293 97.4897 39.6637ZM99.5822 47.2003L96.884 47.676C96.4967 45.5858 95.9535 43.5477 95.2672 41.5771L97.8406 40.6412C98.5814 42.7599 99.1663 44.9515 99.5822 47.2003ZM97.5859 54.9838C97.5651 52.8495 97.3883 50.7515 97.0608 48.7003L99.7589 48.2246C100.112 50.4291 100.307 52.6857 100.326 54.9838H97.5859ZM89.5513 26.2413L87.4536 28.0014C86.0864 26.4051 84.6021 24.9103 83.0113 23.535L84.7711 21.4371C86.4841 22.9163 88.0801 24.5229 89.5513 26.2413ZM26.2105 21.4371L27.9702 23.535C26.4314 24.8687 24.9888 26.3089 23.6579 27.848L21.5602 26.088C22.9951 24.4293 24.5521 22.8721 26.2105 21.4371ZM21.5602 84.657L23.6579 82.897C25.033 84.4854 26.5276 85.9698 28.1236 87.3399L26.3638 89.4379C24.6457 87.9664 23.0393 86.3702 21.5602 84.657ZM84.6203 89.4379L82.8606 87.3399C84.506 85.9282 86.0422 84.3918 87.4536 82.7462L89.5513 84.5062C88.0385 86.274 86.3879 87.9248 84.6203 89.4379Z"
                                                fill="white" />
                                            <path
                                                d="M45.6734 35.0012C45.3971 35.0273 45.1406 35.1557 44.9543 35.3613C44.7679 35.5669 44.6653 35.8348 44.6665 36.1123V37.2234H39.1111C39.0764 37.2217 39.0416 37.2217 39.0069 37.2234C38.7307 37.2494 38.4741 37.3779 38.2878 37.5835C38.1015 37.7891 37.9988 38.057 38 38.3345V41.3899C38 45.3581 40.879 48.6819 44.6665 49.3411V49.4452C44.6665 55.2038 49.0553 59.9429 54.6662 60.5039V68.3335H46.8886C45.0612 68.3335 43.5554 69.8394 43.5554 71.6668V73.8889C43.5554 74.1836 43.6725 74.4662 43.8809 74.6745C44.0892 74.8829 44.3718 75 44.6665 75H66.888C67.1827 75 67.4653 74.8829 67.6736 74.6745C67.882 74.4662 67.9991 74.1836 67.9991 73.8889V71.6668C67.9991 69.8394 66.4933 68.3335 64.6659 68.3335H56.8883V60.5039C62.4992 59.9429 66.888 55.2038 66.888 49.4452V49.3411C70.6742 48.6804 73.5545 45.3568 73.5545 41.3899V38.3345C73.5544 38.0398 73.4374 37.7572 73.229 37.5488C73.0207 37.3405 72.7381 37.2234 72.4434 37.2234H66.888V36.1123C66.888 35.8176 66.7709 35.535 66.5626 35.3267C66.3542 35.1183 66.0716 35.0013 65.7769 35.0012H45.7776C45.7428 34.9996 45.7081 34.9996 45.6734 35.0012ZM46.8886 37.2234H64.6659V49.4452C64.6659 54.3887 60.7208 58.3338 55.7772 58.3338C50.8337 58.3338 46.8886 54.3887 46.8886 49.4452V37.2234ZM40.2222 39.4455H44.6665V47.0495C42.1053 46.4344 40.2222 44.1623 40.2222 41.3899V39.4455ZM66.888 39.4455H71.3323V41.3899C71.3323 44.1617 69.4488 46.4511 66.888 47.0668V39.4455ZM46.8886 70.5557H64.6659C65.3006 70.5557 65.7769 71.032 65.7769 71.6668V72.7778H45.7776V71.6668C45.7776 71.032 46.2539 70.5557 46.8886 70.5557Z"
                                                fill="white" />
                                        </svg>
                                        `
                                    }
                                    
                                </div>
                                <div class="title">Finish</div>
                                <div class="description">
                                    Download your Certificate of Completion below
                                </div>
                                <a  ${(completedAllSections) ? `download href="${data.certificate_link}" `:``} type="button" class="download-certificate">
                                    Download Certificate
                                </a>
                            </div>
                        `;
                $(".course-sections").html(courseSectionsTpl);

                $('.courseprogress').each(function() {
                    const circleProgress = $(this);
                    let circleValue = 0;
                    if (circleProgress) {
                        circleValue = circleProgress.attr('data-value')
                    }
                    gsap.fromTo(circleProgress, {
                        opacity: 0
                    }, {
                        opacity: 1,
                        duration: 0.4
                    });
                    $(circleProgress).circleProgress({
                        value: circleValue,
                        startAngle: -1.55,
                        size: 40,
                        emptyFill: "#EAF0F7",
                        fill: "#00C47D",
                        thickness: 4,
                        lineCap: 'round'
                    }).on('circle-animation-progress', function(event, progress,
                        stepValue) {
                        $(this).find('.percent').html(Math.round(100 *
                            stepValue) + '<i>%</i>');
                        if (stepValue === 1) {

                        }
                        console.log('test')
                    });
                });

                if (completedAllSections) {
                    if( localStorage.getItem("congrats_modal_<?=get_current_user_id()?>") != 1){
                        $('#congratsModal').css('display', 'flex').hide().fadeIn();
                        confetti.start();
                        setTimeout(() => {
                            confetti.stop();
                        }, 5000);
                    }

                    $(".download-certificate").attr("href", data.certificate_link)
                }

            }
        });
    }

    $(document).on("click",".modal#congratsModal .close", e => {
        $(".modal").fadeOut(); 
        localStorage.setItem("congrats_modal_<?=get_current_user_id()?>",1);
    });
    getCryptoCourses();
});
</script>
<?php
});

get_footer();
?>