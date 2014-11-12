(function($) {
		//detail...................................
		$("#dialog-detail").dialog({
			autoOpen: false, 
			title: "Pengguna", 
			modal: true, 
			width: "450", 
			height: "500"
			
		});
		
		$("#update-dialog i").on('click', function(event){
			var url = "modul/pengguna/pengguna_form.php";
			var id = $(this).parent("#update-dialog").attr('data-id');
			$.post(url, {id: id} ,function(data) {
				$("#berkas-detail").html(data).show();
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							nama: {
								required: true
							}, 
							password: {
								required: true
							}, 
							password_lagi: {
								equalTo: "#password"
							}, 
							level: {
								required: true
							}
						}
					});
				}
			});
			
			$("#dialog-detail").dialog("open");
			event.preventDefault();
		});
		//.........................................
		
		$(".btn-group #tambah-pengguna-dialog").on('click', function(event){
			var url = "modul/pengguna/pengguna_form.php";
			$.post(url, {} ,function(data) {
				$("#berkas-detail").html(data).show();
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							nama: {
								required: true
							}, 
							password: {
								required: true
							}, 
							password_lagi: {
								equalTo: "#password"
							}, 
							level: {
								required: true
							}
						}
					});
				}
			});
			
			$("#dialog-detail").dialog("open");
				event.preventDefault();
		});
		//..................................................
		
		$('td #remove').on('click', function(event){
			var r=confirm("Anda yakin ingin menghapus data ini?");
			return r;
		});
}) (jQuery);
