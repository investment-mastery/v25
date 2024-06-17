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
 
 $club_id =get_field('club'); 

$club_name_alt = [
	1249 => "crypto", 
	2579 => "trading",
	3880 => "gold" 
];
$club_alt = $club_name_alt[$club_id]; 
/*RAM ADDED CONDITION FOR REDIRECT ISSUE FOR 18DEC23*/

   $url_shortcode = $_REQUEST['shortcode'];
   $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
		if($pageRefreshed == 1)
		{
		    if($url_shortcode!='')
		    {
			   	  if($url_shortcode=='80c0f19a')
			   	  {
			   	  	echo '<script type="text/javascript">window.location = "'.home_url().'/calendar/trading-calendar/"</script>';
							exit;
   	   			}else if($url_shortcode=='250242de')
			   	  {
			   	  	echo '<script type="text/javascript">window.location = "'.home_url().'/calendar/crypto-calendar/"</script>';
							exit;
   	   			}else if($url_shortcode=='316ad580')
   	   			{
   	   				echo '<script type="text/javascript">window.location = "'.home_url().'/calendar/gold-calendar/"</script>';
							exit;
   	   			}
   			}
		}/*else{
		    
		}*/
		/*RAM ADDED CONDITION FOR REDIRECT ISSUE FOR 18DEC23*/
?>
 
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

        <?php wp_body_open(); ?>

		<?php if (!is_singular('llms_my_certificate')):
		 
			do_action( THEME_HOOK_PREFIX . 'before_page' ); 
	
		endif; ?>

		<div id="page" class="site <?php echo (($club_alt) ? $club_alt.'-club-main' : ''); ?>">

			<?php do_action( THEME_HOOK_PREFIX . 'before_header' ); ?>

			<header id="masthead" class="<?php echo apply_filters( 'buddyboss_site_header_class', 'site-header site-header--bb' ); ?>">
				<?php do_action( THEME_HOOK_PREFIX . 'header' ); ?>
			</header>

			<?php do_action( THEME_HOOK_PREFIX . 'after_header' ); ?>

			<?php do_action( THEME_HOOK_PREFIX . 'before_content' ); ?>

			<div id="content" class="site-content">

				<?php do_action( THEME_HOOK_PREFIX . 'begin_content' ); ?>

				<div class="container">
					<div class="<?php echo apply_filters( 'buddyboss_site_content_grid_class', 'bb-grid site-content-grid' ); ?>">