(function($) {
	$(document).ready(function(e) {
		//registrasi ...................................
		$("#dialog-registrasi").dialog({
			autoOpen: false, 
			title: "Registrasi", 
			modal: true, 
			width: "600", 
			height: "620"
		});
		
		$("#registrasi a").on('click', function(event){
			var url = "modul/registrasi/dialog_form_registrasi.php";
			var id = "";
			$.post(url, {id: id} ,function(data) {
				$("#berkas-registrasi").html(data).show();
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							user_name: {
								required: true
							}, 
							alamat_kota: {
								required: true
							},
							email: {
								required: true, 
								email: true
							}, 
							nama_depan: {
								required: true
							}, 
							nama_belakang: {
								required: true
							},
							password_member: {
								required: true
							},						
							password_lagi: {
							  equalTo: "#password_member"
							}
						}, 
						invalidHandler: function(form, validator) {
							var errors = validator.numberOfInvalids();
							if (errors) {
								var message = errors == 1
								? 'You missed 1 field. It has been highlighted'
								: 'You missed ' + errors + ' fields. They have been highlighted';
								$("#da-ex-val1-error").html(message).show();
							} else {
								$("#da-ex-val1-error").hide();
							}
						}
					});
				}
			});
			
			$("#dialog-registrasi").dialog("open");
			event.preventDefault();
		});
		//.........................................
		
				
	});
}) (jQuery);

