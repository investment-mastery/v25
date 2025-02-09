<?php
/**
 * View: Day View - Single Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/day/event/title.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
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
?>
<h3 class="tribe-events-calendar-day__event-title tribe-common-h6 tribe-common-h4--min-medium">
    <?php if ( $event_content ) { ?>
    <a
        href="javascript:;"
        title="<?php echo esc_attr( $event->title ); ?>"
        rel="bookmark"
        class="tribe-events-calendar-day__event-title-link tribe-common-anchor-thin"
    >
        <?php
        // phpcs:ignore
        echo $event->title;
        ?>
    </a>
    <?php }else{ ?>
    <a
        href="/coaching/<?php echo $club_alt; ?>"
        title="<?php echo esc_attr( $event->title ); ?>"
        rel="bookmark"
        class="tribe-events-calendar-day__event-title-link tribe-common-anchor-thin"
    >
        <?php
        // phpcs:ignore
        echo $event->title;
        ?>
    </a>
    <?php } ?>
</h3>
