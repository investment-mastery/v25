<?php
/*
 * Template name: Course Path - Crypto
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
$club = get_club_slug();
?>
<script src="<?=get_stylesheet_directory_uri();?>/assets/js/gsap.min.js"></script>
<script src="<?=get_stylesheet_directory_uri();?>/assets/js/DrawSVGPlugin.min.js"></script>
<style>
#main {
	margin: 60px 0 150px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
#path{
	position: relative;
}
.path_container {
	display: none;
}
.description {
	margin-bottom: 150px;
	max-width:960px;
}
.description h2 {
	font-family: Montserrat;
	font-style: normal;
	font-weight: bold;
	font-size: 32px;
	line-height: 40px;	
	color: #1F3C61;
}
.description div {
	font-family: Source Sans Pro;
	font-style: normal;
	font-weight: normal;
	font-size: 18px;
	line-height: 32px;
	color: #81858B;
}
.step {
	position: absolute;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	cursor: pointer;
}
.step .title {
	font-family: Montserrat;
	font-style: normal;
	font-weight: bold;
	font-size: 20px;
	line-height: 28px;	
	text-align: center;
	text-transform: capitalize;
	color: #1F3C61;
	max-width: 280px;
	margin-top: 16px;
}
.you_are_here {
	position: relative;
	margin-top: -30px;
}
.you_are_here span{
	font-family: Source Sans Pro;
	font-style: normal;
	font-weight: 600;
	font-size: 16px;
	line-height: 16px;	
	text-align: center;
	text-transform: capitalize;
	color: #FFFFFF;
	position: absolute;
	left: 0;
	right: 0;
	margin-left: 0;
	margin-right: 0;
	text-align: center;
	top: 10px;
}
.hidden{
	visibility: hidden;
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
</style>

<div id="primary" class="content-area bb-grid-cell">
	<main id="main" class="site-main">
		<div class="description">
			<h2>Cyptocurrencies Courses</h2>
			<div>This is an A-Z online video guide from opening up your exchange, through buying your Cryptos, to where to store them. All you need to do is to literally do it as I do it, pause when you need to, then continue playing. It’s how I learned it and it works. Everything you need to get started.</div>
		</div>
		<div class="loader">Loading...</div>
		<div class="path path_container" id="path">
			<!-- Not Completed Path Goes Here -->
			<svg width="880" height="1100" viewBox="0 0 880 1100" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M241 10H690C789.411 10 870 90.5887 870 190C870 289.411 789.411 370 690 370H190C90.5887 370 10 450.589 10 550C10 649.411 90.5887 730 190 730H690C789.411 730 870 810.589 870 910C870 1009.41 789.411 1090 690 1090H440" stroke="#C2CAD2" stroke-width="20"/>
				<path d="M241 10H690C789.411 10 870 90.5887 870 190C870 289.411 789.411 370 690 370H190C90.5887 370 10 450.589 10 550C10 649.411 90.5887 730 190 730H690C789.411 730 870 810.589 870 910C870 1009.41 789.411 1090 690 1090H440" stroke="#1F3C61" stroke-width="20" class="completed" />
				<path d="M241 10H690C789.411 10 870 90.5887 870 190C870 289.411 789.411 370 690 370H190C90.5887 370 10 450.589 10 550C10 649.411 90.5887 730 190 730H690C789.411 730 870 810.589 870 910C870 1009.41 789.411 1090 690 1090H440" stroke="white" stroke-width="2" stroke-linecap="round" stroke-dasharray="3 6" class="completed" />
				<path d="M241 10H690C789.411 10 870 90.5887 870 190C870 289.411 789.411 370 690 370H190C90.5887 370 10 450.589 10 550C10 649.411 90.5887 730 190 730H690C789.411 730 870 810.589 870 910C870 1009.41 789.411 1090 690 1090H440" stroke="white" stroke-width="2" stroke-linecap="round" class="completed" />
			</svg>
			
				
		</div>
		
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>
<script>
	jQuery(document).ready(function(){
		jQuery(document).ready(function($){
			//Example Ajax
			$.ajax({ 
				method: 'GET', //eg. GET, POST, PUT, DELETE
				url:  '<?php echo get_site_url();?>/wp-json/api/courses/<?php echo $post->ID;?>/path', //ENDPOINT GOES HERE
				dataType: 'json',
				beforeSend: function(xhr) { 			
					xhr.setRequestHeader("X-WP-Nonce", "<?=wp_create_nonce( 'wp_rest' );?>"); 
				},
				error: function(data){ 
					//Handle Error
					console.log(data);
				},
				success: function(data){ 
					//Handle Success
					console.log(data);
					let pathPercent = data.pathPercent+"%";
					let youAreHere = null;
					let displayYouAreHere = 'hidden';
					let duration = data.pathPercent * 0.04;
					$.each(data.steps, function( key,value ){
						console.log( value.title);
						
						if (value.completed){
							var completed = "completed";
						}else {
							var completed = "incomplete";
						}
						if (value.youAreHere == false && youAreHere === null) {
							displayYouAreHere = '';
							youAreHere = true;
						} else {
							displayYouAreHere = 'hidden';
						}
						$('.path_container').append(`
							<div class="step step_${key} ${completed}" style="left: ${value.positionX}; top: ${value.positionY};" onClick="window.location='${value.url}'">
								<div class="you_are_here ${displayYouAreHere}">
									<svg width="129" height="52" viewBox="0 0 129 52" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0 3.25736C0 1.45837 1.44388 0 3.225 0H125.775C127.556 0 129 1.45837 129 3.25736V37.4597C129 39.2587 127.556 40.717 125.775 40.717H3.225C1.44388 40.717 0 39.2587 0 37.4597V3.25736Z" fill="#1F3C61"/>
									<path d="M64.5 22.8015L76.5938 33.3291L64.5 52L52.4062 33.3291L64.5 22.8015Z" fill="#1F3C61"/>
									</svg>
									<span>You Are Here</span>
								</div>
								<img src="${value.image}">
								<div class="title">${value.title}</div>
							</div>
						`);
					});
					$('.path_container').fadeIn();
					$('.loader').hide();
					gsap.fromTo(".completed", { drawSVG: 0}, {duration: duration, drawSVG: pathPercent} );
				
						
						var tl = gsap.timeline({repeat: 10, repeatDelay: 3,defaults:{transformOrigin: "center bottom", ease: "Power1.easeOut"}  });
						tl.to(".you_are_here", {rotation: -5, duration: 1});
						tl.to(".you_are_here", {rotation: 5, duration: 1});
						tl.to(".you_are_here", {rotation: -5, duration: .8});
						tl.to(".you_are_here", {rotation: 5, duration: .8});
						tl.to(".you_are_here", {rotation: -5, duration: .6});
						tl.to(".you_are_here", {rotation: 5, duration: .6});
						tl.to(".you_are_here", {rotation: -5, duration: .4});
						tl.to(".you_are_here", {rotation: 5, duration: .4});
						tl.to(".you_are_here", {rotation: 0, duration: .6});
				}
			});	
		});
		
	});
</script>