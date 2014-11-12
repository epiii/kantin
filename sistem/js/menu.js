(function($) {
	
		$(".number").each(function() {
			$(this).html(parseInt($(this).html()).formatMoney(2,'.'));
		});
		
		//detail...................................
		$("#dialog-detail").dialog({
			autoOpen: false, 
			title: "Menu", 
			modal: true, 
			width: "450", 
			height: "490"
			
		});
		
		$("#update-dialog i").on('click', function(event){
			var url = "modul/menu/menu_form.php";
			var id = $(this).parent("#update-dialog").attr('data-id');
			$.post(url, {id: id} ,function(data) {
				$("#berkas-detail").html(data).show();
				$("#harga").bind('change', function () {
					$("#harga").val($("#harga").val().replace(/\./g,''));
				});
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							nama: {
								required: true
							}, 
							harga: {
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
		
		$(".btn-group #tambah-menu-dialog").on('click', function(event){
			var url = "modul/menu/menu_form.php";
			$.post(url, {} ,function(data) {
				$("#berkas-detail").html(data).show();
				$("#harga").bind('change', function () {
					$("#harga").val($("#harga").val().replace(/\./g,''));
				});
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							nama: {
								required: true
							}, 
							harga: {
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
