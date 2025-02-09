<?php
/**
 * View: Month View - Calendar Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month/calendar-body/day/calendar-events/calendar-event/title.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTICLE_LINK_HERE}
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */
global $club_name_alt;
$club_id =get_field('club'); 
$club_alt = $club_name_alt[$club_id];

$event_content = get_field("tooltip_description", $event->ID );

$slug = "/webinars/";
if (str_contains(get_the_title( $event->ID ), 'A Webinar') || get_club_slug() == 'gold') { 
    $slug = "/coaching/";
}
?>
<h3 class="tribe-events-calendar-month__calendar-event-title tribe-common-h8 tribe-common-h--alt">
	<?php if ( $event_content ) { ?>
	<a
		href="javascript:;"
		title="<?php echo esc_attr( $event->title ); ?>"
		rel="bookmark"
		class="tribe-events-calendar-month__calendar-event-title-link tribe-common-anchor-thin"
		data-js="tribe-events-tooltip"
		data-tooltip-content="#tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
		aria-describedby="tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
	><?php
		// phpcs:ignore
		echo $event->title;
		?></a>
	<?php }else{ ?>
	<a
		href="<?php echo $slug.$club_alt; ?>"
		title="<?php echo esc_attr( $event->title ); ?>"
		rel="bookmark"
		class="tribe-events-calendar-month__calendar-event-title-link tribe-common-anchor-thin"
		data-js="tribe-events-tooltip"
		data-tooltip-content="#tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
		aria-describedby="tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
	><?php
		// phpcs:ignore
		echo $event->title;
		?>
	</a>
	<?php } ?>
</h3>
