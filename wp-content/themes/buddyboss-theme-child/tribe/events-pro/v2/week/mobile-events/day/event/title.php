<?php
/**
 * View: Week View - Mobile Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/mobile-events/day/event/title.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 */
global $club_name_alt;
$club_id =get_field('club'); 
$club_alt = $club_name_alt[$club_id];
$event_id = $event->ID;
?>
<h3 class="tribe-events-pro-week-mobile-events__event-title tribe-common-h6 tribe-common-h5--min-medium">
	<a
		href="/coaching/<?php echo $club_alt; ?>"
		title="<?php the_title_attribute( $event_id ); ?>"
		rel="bookmark"
		class="tribe-events-pro-week-mobile-events__event-title-link tribe-common-anchor-thin"
	>
		<?php echo wp_kses_post( get_the_title( $event->ID ) ); ?>
	</a>
</h3>
