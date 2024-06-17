jQuery(document).ready(function($) {
    /*$(document).on('click', '#gold-announcement-click, #crypto-announcement-click, #trading-announcement-click', function(e) {
        e.preventDefault();
        
        var userID = $(this).data('userid'); 
        var flag = $(this).data('flag'); 
		var link = $(this);
		var tabID = $(this).data('tabid'); 
		
        console.log(link.attr('href'));
        if (userID && flag) {
            var data = {
                'action': 'update_flag_field_action',
                'user_id': userID,
                'flag': flag
            };

            $.post(ajax_object.ajax_url, data, function(response) {
				window.location.href = link.attr('href');
                
            });
        }
    });*/
	
	$(document).on('mouseenter', '#announcement-board', function(e) {
		var anchor = ('#gold-announcement-click, #crypto-announcement-click, #trading-announcement-click')
		var userID = $(anchor).data('userid'); 
		var flag = $(anchor).data('flag'); 
		var link = $(anchor);
		var tabID = $(anchor).data('tabid'); 
		
		var data = {
			'action': 'update_flag_field_action',
			'user_id': userID,
			'flag': flag
		};

		$.post(ajax_object.ajax_url, data, function(response) {
			
		});
	});
});
