<?php
/**
 * View: Month View - Calendar Event Date
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month/calendar-body/day/calendar-events/calendar-event/date.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @since 4.9.13
 * @since 5.1.1 Move icons into separate templates.
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 * @var obj     $date_formats Object containing the date formats.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 5.1.1
 */

$event_id = $event->ID;

/*function get_timezone_abbreviation($timezone_id)
{
    if($timezone_id){
        $abb_list = timezone_abbreviations_list();

        $abb_array = array();
        foreach ($abb_list as $abb_key => $abb_val) {
            foreach ($abb_val as $key => $value) {
                $value['abb'] = $abb_key;
                array_push($abb_array, $value);
            }
        }

        foreach ($abb_array as $key => $value) {
            if($value['timezone_id'] == $timezone_id){
                return strtoupper($value['abb']);
            }
        }
    }
    return FALSE;
}
*/
/**
 * Setting up the cookie if it doesn't exist yet and grabbing the browser time zone string.
 */
if ( ! isset( $_COOKIE['im_browser_time_zone'] ) ) { ?>
  <script type="text/javascript">
    if ( navigator.cookieEnabled ) {
      document.cookie = "im_browser_time_zone=" + Intl.DateTimeFormat().resolvedOptions().timeZone + "; path=/";
    }
  </script>
<?php }
 
/**
 * Calculating the event start time and time zone based on the browser time zone of the visitor.
 */
 
// Setting default values in case the cookie doesn't exist.
$user_time_output = "<small>Your time zone couldn't be detected. Try <a href=''>reloading</a> the page.</small>";
$browser_time_zone_string = "not detected";
 
if ( isset( $_COOKIE['im_browser_time_zone'] ) ) {
  // Grab the time zone string from the cookie.
  $browser_time_zone_string = $_COOKIE['im_browser_time_zone'];
 
  // Grab the event time zone string.
  $event_time_zone_string = Tribe__Events__Timezones::get_event_timezone_string( $event_id );
 
  // Grab the event start date in UTC time from the database.
  $event_start_utc = tribe_get_event_meta( $event_id, '_EventStartDateUTC', true );
  $event_end_utc = tribe_get_event_meta( $event_id, '_EventEndDateUTC', true );
 
  // Set up the DateTime object for GMT
  $event_start_date_in_utc_timezone = new DateTime( $event_start_utc, new DateTimeZone( 'UTC' ) );
  $event_end_date_in_utc_timezone = new DateTime( $event_end_utc, new DateTimeZone( 'UTC' ) );
 
  // Set up the DateTime object for BST
  $event_start_date_in_bst_timezone = new DateTime( $event_start_utc, new DateTimeZone( 'GMT' ) );
  $event_end_date_in_bst_timezone = new DateTime( $event_end_utc, new DateTimeZone( 'GMT' ) );
 
  // Convert the UTC DateTime object into the browser time zone.
  $event_start_date_in_browser_timezone = $event_start_date_in_utc_timezone->setTimezone( new DateTimeZone( $browser_time_zone_string ) )->format( get_option( 'time_format' ) );
  $event_end_date_in_browser_timezone = $event_end_date_in_utc_timezone->setTimezone( new DateTimeZone( $browser_time_zone_string ) )->format( get_option( 'time_format' ) );
 
  // Grab the time zone abbreviation based on the browser time zone string.
  $browser_time_zone_abbreviation = Tribe__Timezones::abbr( 'now', $browser_time_zone_string );

  $server_time_zone_abbreviation = Tribe__Timezones::abbr( 'now', 'UK' );
 //	$server_time_zone_abbreviation =	get_timezone_abbreviation('Europe/London');
  // Compile the output string with time zone abbreviation.
  $user_start_time_output = $event_start_date_in_browser_timezone;
  $user_end_time_output = $event_end_date_in_browser_timezone;
 
  // Compile the string of the time zone for the tooltip.
  $browser_time_zone_string .= ' detected';
}

$time_format      = tribe_get_time_format();
$display_end_date = $event->dates->start_display->format( 'H:i' ) !== $event->dates->end_display->format( 'H:i' );
?>
<div class="tribe-events-calendar-month__calendar-event-datetime">
	<?php $this->template( 'month/calendar-body/day/calendar-events/calendar-event/date/featured' ); ?>
	<time datetime="<?php echo esc_attr( $event->dates->start_display->format( 'H:i' ) ); ?>">
		<?php echo esc_html( $event->dates->start_display->format( $time_format ) ); ?>
	</time>
	<?php if ( $display_end_date ) : ?>
		<span class="tribe-events-calendar-month__calendar-event-datetime-separator"><?php echo esc_html( $date_formats->time_range_separator ); ?></span>
		<time datetime="<?php echo esc_attr($event->dates->end_display->format( 'H:i' ) ); ?>">
			<?php echo esc_html( $event->dates->end_display->format( $time_format ) ); ?>
		</time>
	<?php endif; ?>
	<?php echo '<br>UK Time';//$server_time_zone_abbreviation; ?>
	<?php
	/**
	 * Adding the event start time in the visitor's time zone.
	 */
	/*if ( ! tribe_event_is_all_day( $event_id ) ) {
	if ( $server_time_zone_abbreviation != $browser_time_zone_abbreviation && $user_start_time_output && $user_end_time_output ) { ?>
	  <div class='tribe-events-schedule--browser-time-zone'>
		<time datetime="<?php echo $user_time_output; ?>">
			<?php echo $user_start_time_output; ?>
		</time>
		<?php if ( $display_end_date ) : ?>
		<span class="tribe-events-calendar-month__calendar-event-datetime-separator"><?php echo esc_html( $date_formats->time_range_separator ); ?></span>
		<time datetime="<?php echo $user_time_output; ?>">
			<?php echo $user_end_time_output; ?>
		</time>
		<?php endif; ?>
		<?php echo $browser_time_zone_abbreviation; ?>
	  </div>
	<?php
	}
	}*/
	?>
	<?php $this->template( 'month/calendar-body/day/calendar-events/calendar-event/date/meta', [ 'event' => $event ] ); ?>
</div>
