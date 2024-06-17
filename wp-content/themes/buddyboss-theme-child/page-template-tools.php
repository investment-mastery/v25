<?php
/*
 * Template name: Club Tools Template
 *
 */

get_header();
$club = get_club_slug();
?>
<main id="main" class="site-main">	
    <?php the_content(); ?>
</main>
<div id="tools-modal" class="modal">
	<div class="modal__content">
    	<span class="modal__close">&times;</span>
        <h3 class="modal__heading"></h3>
        <div class="embed-container"></div>
  	</div>
</div>

<script>
jQuery(document).ready(function ($) {

	$(document).on("click", ".modal__close, .modal__btn", e => {
		$('#tools-modal').removeClass('addflex').fadeOut();	
        $('.modal__heading').html('');    
        $('.modal__video').html('');   
        $('.embed-container').html('');  
	});

    $(".lightbox-popup a").click(function() {
        slug = $(this).attr("href").replace('http://','').replace('https://','');
        title = $(this).attr("title");
        modelVideo = `<iframe src="https://iframe.mediadelivery.net/embed/14775/${slug}?autoplay=false" loading="lazy" width="1280" height="720" style="border: none; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen="true"></iframe>`;

        $('#tools-modal').addClass('addflex');
        $('.modal__heading').html(title); 
        $('.embed-container').html(modelVideo); 
        return false;
    });

});
</script>
<?php
get_footer();