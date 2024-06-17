jQuery(document).ready(function ($) {
    function handleAddRowClick() {
        var $repeater = $(this).closest('.acf-repeater');
        var hiddenInputName = $repeater.find('.acf-repeater-hidden-input').attr('name');
        if (hiddenInputName.includes('row')) {

            var rowName = hiddenInputName.split('[')[2];
            var match = rowName.split(']');
            var rowId = match[0];
            var rowNumber = parseInt(rowId.substring(rowId.indexOf('-') + 1)) + 1;
            var postId = $('#post_ID').val();
            $('#acf-field_662264fc443f8').val(rowNumber);

        } else {
// 			var $tr = $(this).closest('tr');

// 			var $hiddenInput = $tr.find('input[type="hidden"].new-row-hidden-id');

// 			var hiddenValue = $hiddenInput.val();
//  			$('#acf-field_662264fc443f8').val(hiddenValue);
// 			console.log(hiddenValue);
							
        }
    }

    // Attach click event handler for both tab_content and accordion row buttons
    $(document).on('click', '.add-tab-content .acf-repeater-add-row', handleAddRowClick);
//     $(document).on('click', '.add-accordion-row-btn .acf-repeater-add-row', handleAddRowClick);


    $('.acf-repeater-add-row:last').on('click', function () {
        var rowNumber = $(this).parent('.acf-actions').siblings('.acf-table').children('.ui-sortable').children('.acf-row').length; // find new row index

        var table = $(this).parent('.acf-actions').siblings('.acf-table').children('.ui-sortable').children('.acf-row'); // find row to add input field with new row index
        $(table).each(function (i, row) {
            var rowNum = i + 1;
            var existingInput = $(row).find('.new-row-hidden-id');
            if (existingInput.length > 0) {
                existingInput.replaceWith($('<input>').attr({
                    type: 'hidden',
                    class: 'new-row-hidden-id',
                    name: 'new_input_' + rowNum, 
                    value: rowNum
                }));
            }else{
                var newInput = $('<input>').attr({
                    type: 'hidden',
                    class: 'new-row-hidden-id',
                    name: 'new_input_' + rowNum, 
                    value: rowNum
                });
    
                // Append the input element to the all row
                $(row).append(newInput);
            }
        });

        var postId = $('#post_ID').val();
        $('#acf-field_662264fc443f8').val(rowNumber);

    });
	
	
});