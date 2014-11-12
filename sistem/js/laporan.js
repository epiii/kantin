/*
 * Dandelion Admin v2.0 - UI Demo JS
 *
 * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * March 25, 2012
 * Last Update:
 * December 07, 2012
 *
 */

(function($) {
	$(document).ready(function(e) {
		
		$("#tanggal-topup-dari").datepicker({showOtherMonths:true});

		$("#tanggal-topup-dari").datepicker( "option", "dateFormat", "dd/mm/yy") ;

		$("input#tanggal-topup-dari").on('focus', function() {
			$("#ui-datepicker-div").addClass("de-front");
			$("#ui-datepicker-div").css("z-index", "");
		});
		
		
		$("#tanggal-topup-sampai").datepicker({showOtherMonths:true});

		$("#tanggal-topup-sampai").datepicker( "option", "dateFormat", "dd/mm/yy") ;
		
		$("input#tanggal-topup-sampai").on('focus', function() {
			$("#ui-datepicker-div").addClass("de-front");
			$("#ui-datepicker-div").css("z-index", "");
		});
		
		$("#tanggal-transaksi-dari").datepicker({showOtherMonths:true});

		$("#tanggal-transaksi-dari").datepicker( "option", "dateFormat", "dd/mm/yy") ;

		$("input#tanggal-transaksi-dari").on('focus', function() {
			$("#ui-datepicker-div").addClass("de-front");
			$("#ui-datepicker-div").css("z-index", "");
		});
		
		
		$("#tanggal-transaksi-sampai").datepicker({showOtherMonths:true});

		$("#tanggal-transaksi-sampai").datepicker( "option", "dateFormat", "dd/mm/yy") ;
		
		$("input#tanggal-transaksi-sampai").on('focus', function() {
			$("#ui-datepicker-div").addClass("de-front");
			$("#ui-datepicker-div").css("z-index", "");
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
		
		$('#laporan-transaksi-tanggal').on('click', function(event){
			//alert('ade');
			var url = "modul/laporan/laporan_transaksi_tanggal_print.php";
			var tanggalDari = $('#tanggal-transaksi-dari').val();
			var tanggalSampai = $('#tanggal-transaksi-sampai').val();
			//alert('ade');
			$.post(url, {tanggal_dari: tanggalDari, tanggal_sampai:tanggalSampai} ,function(data) {
				//alert("ayu"+data);
				$("#berkas").html(data).show();
			});

			$("#dialog-print").dialog("option", {modal: true}).dialog("open");
			//alert($("#dialog-print").html);
			event.preventDefault();
		});
		
		$('#laporan-topup-tanggal').on('click', function(event){
			//alert('ade');
			var url = "modul/laporan/laporan_topup_tanggal_print.php";
			var tanggalDari = $('#tanggal-topup-dari').val();
			var tanggalSampai = $('#tanggal-topup-sampai').val();
			var kartuVal = $('#kartu').val(); 
			//alert('ade');
			$.post(url, {tanggal_dari: tanggalDari, tanggal_sampai:tanggalSampai, kartu: kartuVal} ,function(data) {
				//alert("ayu"+data);
				$("#berkas").html(data).show();
			});

			$("#dialog-print").dialog("option", {modal: true}).dialog("open");
			//alert($("#dialog-print").html);
			event.preventDefault();
		});
		
	});
}) (jQuery);
