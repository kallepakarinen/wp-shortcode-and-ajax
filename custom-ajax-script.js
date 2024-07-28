jQuery(document).ready(function($) {
    $('#custom-ajax-button-id').click(function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'custom_ajax_function',
                // Add any additional data you want to pass to the server
            },
            success: function(response) {
                // Handle the response from the server
                alert('AJAX request successful!');             
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.log(xhr.responseText);
            }
        });
    });
});
