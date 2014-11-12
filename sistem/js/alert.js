function autoClosingAlert(message) {

 	$('#de-alert')
		.html('<div class="alert alert-success de-hidden" ><span>'+
			message+'</span></div>');

	$('.alert').show("slow");
   
	window.setTimeout(function() {
	$('.alert').fadeTo(500, 0).slideUp(500, function(){
		$(this).remove(); 
		});
	}, 3000);
	
}

