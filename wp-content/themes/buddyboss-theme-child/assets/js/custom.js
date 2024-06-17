jQuery(document).ready(function($){
     
    $('video').attr('controlsList', 'nodownload');

    $(".panel-head .ph_dropdown").click(function(){
        $(".tooltip_menu").slideToggle();
    });
    $(".custom_bb-toggle-panel").click(function(){
        $("body").toggleClass("buddypanel-open");
        $('.buddypanel').attr('style','display: block !important');
    });

    //swap day and week tab
    $('.tribe-events-c-view-selector__list-item--week').insertAfter($('.tribe-events-c-view-selector__list-item--day'));
    $('.tribe-events-c-view-selector__list-item--day').insertAfter($('.tribe-events-c-view-selector__list-item--week'));


    // hide select club dropdown menu when click outside    
    $(document).click(function(e) {
        if(!$(e.target).hasClass('ph_dropdown')) {
            $('.tooltip_menu').hide();
        } 
    });
    if( $('#profile-personal-li').length ){
        $("#profile-personal-li").html('<a href="/members/update-your-credit-card" id="update-cc">Update Your Credit Card</a>').show();
    }
    if( $('#account-admin-visibility-mode-personal-li').length ){
        $("#account-admin-visibility-mode-personal-li").html('<a href="/members/add-a-credit-card" id="add-cc">Add A Credit Card</a>').show();
    }
    //if( $('#export-personal-li').length ){
    //    $("#export-personal-li").html('<a href="/members/update-membership-status" id="update-membership">Update Membership Status</a>').show();
    //}

    //for mobile and desktop adjust the left side navigation
    if (window.matchMedia("(max-width: 767px)").matches){
        //console.log('in mobile');
        jQuery("body").removeClass("buddypanel-open");
    }else{
        //console.log('in desktop');
        //jQuery("body").addClass("buddypanel-open");
    }
	
	$('body').on('click', '.bb-close-media-theatre', function () {
		console.log('trigger close');
		$('video').trigger('pause');
	});

});
