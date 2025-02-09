<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuddyBoss_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body>
<style>
._hj_feedback_container {
    display: none;
}
</style>    
<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		the_content();

	endwhile; // End of the loop.
endif;
?>
</body>
</html>
<?php wp_footer(); ?>
