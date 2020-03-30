$(document).ready(function() {
	
	$('form').submit(function( event ) {		// Get all data from each form on page
		event.preventDefault();
		
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,

			success: function(result) {
				$(".response").append(result+'<br>'+'<br>');	// Creating for each POST new line
			},
		});

	});

});