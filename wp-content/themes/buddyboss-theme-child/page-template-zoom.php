<?php
/*
 * Template name: Zoom Page Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
$club = get_club_slug();
?>
<style>
h3{margin: 0;}
</style>
<div id="primary" class="content-area bb-grid-cell">
	<main id="main" class="site-main">
		<div class="crytp_webniar club-coaching-crypto">
			<div class="row">
			    <div class="mainheading">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();