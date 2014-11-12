(function($) {
	$(document).ready(function(e) {
		$(".number").each(function() {
			$(this).html(parseInt($(this).html()).formatMoney(2,'.'));
		});	
		
		if($.fn.select2) {
					$(".select2").select2();
				}
		
		$("#dialog-print").dialog({
			autoOpen: false, 
			title: "Laporan", 
			modal: true, 
			width: "840", 
			height: "480", 
			buttons: [{
					text: "Cetak", 
					click: function() {
						$('#berkas').printArea();
						//return false;
						$( this ).dialog( "close" );
			}}]
		});
		
		
			
		$('#print').on('click', function(event){
			var url = "modul/penjualan_hari_ini/penjualan_hari_ini_print.php";
			
			var kartuVal = $('#kartu').val(); 
			$.post(url, {kartu:kartuVal} ,function(data) {
				$("#berkas").html(data).show();
							
			});
			
			$("#dialog-print").dialog("option", {modal: true}).dialog("open");
			event.preventDefault();
		});
	});
}) (jQuery);

