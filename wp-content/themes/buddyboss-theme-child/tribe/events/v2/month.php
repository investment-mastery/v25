<?php
/**
 * View: Month View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version  5.7.0
 *
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_method          The HTTP method, either `POST` or `GET`, the View will use to make requests.
 * @var string   $rest_nonce           The REST nonce.
 * @var int      $should_manage_url    int containing if it should manage the URL.
 * @var bool     $disable_event_search Boolean on whether to disable the event search.
 * @var string[] $container_classes    Classes used for the container of the view.
 * @var array    $container_data       An additional set of container `data` attributes.
 * @var string   $breakpoint_pointer   String we use as pointer to the current view we are setting up with breakpoints.
 */
/*RAM ADDED CONDITION FOR REDIRECT ISSUE FOR 18DEC23*/
   $url_shortcode = $_REQUEST['shortcode'];
   $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
		if($pageRefreshed == 1)
		{
		    /*if($url_shortcode!='')
		    {
			   	  if($url_shortcode=='80c0f19a')
			   	  {
			   	  	echo '<script type="text/javascript">window.location = "'.home_url().'/calendar/trading-calendar/"</script>';
							exit;
   	   			}else if($url_shortcode=='250242de')
			   	  {
			   	  	echo '<script type="text/javascript">window.location = "'.home_url().'/calendar/crypto-calendar/"</script>';
							exit;
   	   			}else
   	   			{
   	   				echo '<script type="text/javascript">window.location = "'.home_url().'/calendar/gold-calendar/"</script>';
							exit;
   	   			}
   				}*/
		}/*else{
		    
		}*/
		/*RAM ADDED CONDITION FOR REDIRECT ISSUE FOR 18DEC23*/
$header_classes = [ 'tribe-events-header' ];
if ( empty( $disable_event_search ) ) {
	$header_classes[] = 'tribe-events-header--has-event-search';
}


   
    $segment 				= explode('?', $_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $currntShortCode=  $segment[1];
   	$shortCode 			= explode('=',$currntShortCode);
   	$onlyShortCode 	= $shortCode[1];
      
 /* Change Color of calendor button on chnage of clubs Start   */
if($currntShortCode == 'shortcode=80c0f19a')
{
	/*Your Trading Club Calendar*/
?>
<style>
.tribe-events-c-subscribe-dropdown__button:hover {
	color: #19a0f2 !important;
    border-color: #19a0f2 !important;
    background: #FFFFFF !important;
    
}
.tribe-events-c-subscribe-dropdown__button {
  color: #FFFFFF !important;
  background: #19a0f2 !important;
   border-color: #19a0f2 !important;
}
</style>
<?php }
/*Your Crypto Club Calendar*/
elseif($currntShortCode == 'shortcode=250242de'){ ?>
<style>
.tribe-events-c-subscribe-dropdown__button:hover {
	color: #1f3c61 !important;
    border-color: #1f3c61 !important;
    background: #FFFFFF !important;
    
}
.tribe-events-c-subscribe-dropdown__button {
  color: #FFFFFF !important;
  background: #1f3c61 !important;
   border-color: #1f3c61 !important;
}
</style>

<?php }else{ 
/*Gold Membership Calendar*/
	?>
<style>
.tribe-events-c-subscribe-dropdown__button:hover {
	color: #D79745 !important;
    border-color: #D79745 !important;
    background: #FFFFFF !important;
    
}
.tribe-events-c-subscribe-dropdown__button {
  color: #FFFFFF !important;
  background: #D79745 !important;
   border-color: #D79745 !important;
}
</style>
<?php } 
/* Change Color of calendor button on chnage of clubs End   */
?>
 
<div
	<?php tribe_classes( $container_classes ); ?>
	data-js="tribe-events-view"
	data-view-rest-nonce="<?php echo esc_attr( $rest_nonce ); ?>"
	data-view-rest-url="<?php echo esc_url( $rest_url ); ?>"
	data-view-rest-method="<?php echo esc_attr( $rest_method ); ?>"
	data-view-manage-url="<?php echo esc_attr( $should_manage_url ); ?>"
	<?php foreach ( $container_data as $key => $value ) : ?>
		data-view-<?php echo esc_attr( $key ) ?>="<?php echo esc_attr( $value ) ?>"
	<?php endforeach; ?>
	<?php if ( ! empty( $breakpoint_pointer ) ) : ?>
		data-view-breakpoint-pointer="<?php echo esc_attr( $breakpoint_pointer ); ?>"
	<?php endif; ?>
>  <input type="hidden" name="shortcode_id" id="shortcode_id" value="<?php echo $onlyShortCode; ?>">
	<div class="tribe-common-l-container tribe-events-l-container">
		<?php $this->template( 'components/loader', [ 'text' => __( 'Loading...', 'the-events-calendar' ) ] ); ?>

		<?php $this->template( 'components/json-ld-data' ); ?>

		<?php $this->template( 'components/data' ); ?>

		<?php $this->template( 'components/before' ); ?>

		<header <?php tribe_classes( $header_classes ); ?>>
			<?php $this->template( 'components/messages' ); ?>

			<?php $this->template( 'components/breadcrumbs' ); ?>

			<?php $this->template( 'components/events-bar' ); ?>
			<?php $this->template( 'components/ical-link' ); ?>
			<?php $this->template( 'month/top-bar' ); ?>
			
		</header>

		<?php $this->template( 'components/filter-bar' ); ?>
		
		<div
			class="tribe-events-calendar-month"
			role="grid"
			aria-labelledby="tribe-events-calendar-header"
			aria-readonly="true"
			data-js="tribe-events-month-grid"
		>

			<?php $this->template( 'month/calendar-header' ); ?>

			<?php $this->template( 'month/calendar-body' ); ?>

		</div>

		<?php $this->template( 'components/messages', [ 'classes' => [ 'tribe-events-header__messages--mobile' ] ] ); ?>

		<?php $this->template( 'month/mobile-events' ); ?>

		<br><br>

		<?php $this->template( 'components/after' ); ?>

	</div>

</div>

<?php $this->template( 'components/breakpoints' ); ?>
<!--RAM ADDED CONDITION FOR REDIRECT ISSUE FOR 18DEC23-->
<script type="text/javascript">
	
/*	function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
} */
	jQuery(document).ready(function($) {

  if (window.history && window.history.pushState) {

   // window.history.pushState('forward', null, './#forward');

    $(window).on('popstate', function() {
  
     /* var url_shortCode_arr = getUrlVars();	
      var url_shortCode = url_shortCode_arr['shortcode'];*/
      
      var url_shortCode = jQuery('#shortcode_id').val();
       
      //var url_shortCode = '<?php echo $url_shortcode ?>';
      var siteUrl = '<?php echo home_url(); ?>';
     // alert('Back button was pressed.'+url_shortCode);
      if(url_shortCode=='80c0f19a'){
      	window.location = siteUrl+"/calendar/trading-calendar/";
      }	else if(url_shortCode=='250242de'){
      	window.location = siteUrl+"/calendar/crypto-calendar/";
      }	else if(url_shortCode=='316ad580') {
      	window.location = siteUrl+"/calendar/gold-calendar/";
      }	
       //here you know that the back button is pressed
    });

  }
});
	
</script>
<!--RAM ADDED CONDITION FOR REDIRECT ISSUE FOR 18DEC23-->