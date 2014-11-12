var varInterval;
var serialNumberKartu = "error";

var ports = new Array();
	ports[0] = "7676";
	ports[1] = "7878";
	ports[2] = "4747";
	
var portCounter = 0;

(function($) {
	$(document).ready(function(e) {
		
		
		//detail...................................
		$("#dialog-detail").dialog({
			autoOpen: false, 
			title: "Pendaftaran Kartu", 
			modal: true, 
			width: "550", 
			height: "500",
			close: closeFunction
			
		});
		
		$(".number").each(function() {
			$(this).html(parseInt($(this).html()).formatMoney(2,'.'));
		});		
		
		var closeFunction = function(){
						//alert("ade");
						clearInterval(varInterval);
						window.location.href = 'pendaftaran_kartu_guru.php';
					};
		
		$("#update-dialog i").on('click', function(event){
			var url = "modul/pendaftaran_kartu_guru/pendaftaran_kartu_guru_form.php";
			var id = $(this).parent("#update-dialog").attr('data-id');
			//alert(id);
			$.post(url, {"id": id} ,function(data) {
				$("#berkas-detail").html(data).show();
				
				if( $.fn.spinner ) {
					$('.da-spinner').spinner();
				}	
				if($.fn.select2) {
					$(".select2").select2();
				}
				
				$("#saldo").bind('change', function () {
					$("#saldo").val($("#saldo").val().replace(/\./g,''));
				});
				
				$("#nama").bind('change', function () {
					var url = "functions/crud/crud_kartu_guru.php";
					var guru = $("#nama").val();
					$.post(url, {"id_guru": guru, operation: "get_status"} ,function(data) {
						$("#status").val(data);
					});
				});
				
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							saldo: {
								required: true
							}, 
							id: {
								required: true
							}, 
							nama: {
								required: true
							}, 
							status: {
								required: true
							}
						}
					});
				}
				
				$('#pendaftaran-ok').on('click', function(event){
					$("#pendaftaran-ok").attr('disabled',true);
					
					var currentdate = new Date(); 
					var dateTime = "Tanggal : " + currentdate.getDate() + "/"
									+ (currentdate.getMonth()+1)  + "/" 
									+ currentdate.getFullYear() + "<br /> Waktu : "  
									+ currentdate.getHours() + ":"  
									+ currentdate.getMinutes() + ":" 
									+ currentdate.getSeconds();
					var id = $('#kartu').val();
					var saldo = parseInt($('#saldo').val()).formatMoney(2,'.');
					var nama = $('#nama option:selected').text();
					var htmlText="<html><body><font face='times, serif' size='2'><b>Elyon</b><br />"+
									dateTime+"<br />Nama = "+
									nama+"<br />Saldo = "+
									saldo+"</font></body></html>";
					
					printHTML(htmlText,function callBack(){
						printHTML(htmlText,function callBack(){
							$('form').submit();
						});
					});
					
					return false;
				} );
				
			});
			
			$("#dialog-detail").dialog("open");
			
			
			event.preventDefault();
		});
		//.........................................
		
		$(".btn-group #tambah-kartu-dialog").on('click', function(event){
			
		
						
			var url = "modul/pendaftaran_kartu_guru/pendaftaran_kartu_guru_form.php";
			
			
					
			$.post(url, {} ,function(data) {	
				
				$("#berkas-detail").html(data).show();
				
				varInterval =setInterval(function(){getKartu()},1000);
				
				if($.fn.select2) {
					$(".select2").select2();
				}
				
				if( $.fn.spinner ) {
					$('.da-spinner').spinner();
				}	
				
				$("#saldo").bind('change', function () {
					$("#saldo").val($("#saldo").val().replace(/\./g,''));
				});
				
				$("#nama").bind('change', function () {
					var url = "functions/crud/crud_kartu_guru.php";
					
					var guru = $("#nama").val();
					
					$.post(url, {"id_guru": guru, operation: "get_status"} ,function(data) {
						$("#status").val(data);
					});
				});
				
				if($.fn.validate) {
					$("#da-ex-validate1").validate({
						rules: {
							saldo: {
								required: true
							}, 
							id_kartu: {
								required: true
							}, 
							nama: {
								required: true
							}, 
							status: {
								required: true
							}
						}
					});
				}
				
				$('#pendaftaran-ok').on('click', function(event){
					$("#pendaftaran-ok").attr('disabled',true);
					
					var currentdate = new Date(); 
					var dateTime = "Tanggal : " + currentdate.getDate() + "/"
									+ (currentdate.getMonth()+1)  + "/" 
									+ currentdate.getFullYear() + "<br /> Waktu :"  
									+ currentdate.getHours() + ":"  
									+ currentdate.getMinutes() + ":" 
									+ currentdate.getSeconds();
					var id = $('#kartu').val();
					
					var url = "functions/crud/crud_topup.php";
					
					$.post(url, {"id":id, operation:"cek_kartu"} ,function(data) {
						
						if(data=="ok"){
							var saldo = parseInt($('#saldo').val()).formatMoney(2,'.');
							var nama = $('#nama option:selected').text();
							var htmlText="<html><body><font face='times, serif' size='2'>Elyon<br />"+
											dateTime+"<br />Nama = "+
											nama+"<br />Saldo = "+
											saldo+"</font></body></html>";
											
							printHTML(htmlText,function callBack(){
								printHTML(htmlText,function callBack(){
									$('form').submit();
								});
							});
						}else{
							alert(data);
							$("#dialog-detail").dialog("option", {close: closeFunction}).dialog("close");
						}
					});	
					
				
					return false;
				} );
			});
			$("#dialog-detail").dialog("option", {close: closeFunction}).dialog("open");
			event.preventDefault();
		});
		//..................................................
		$('td #remove').on('click', function(event){
			var r=confirm("Anda yakin ingin menghapus data ini?");
			return r;
		});
			
	});
}) (jQuery);

function getKartu(){
	setSerialNumber();
	//alert(serialNumberKartu );
	if(serialNumberKartu!="error"){
		$("#kartu").val(serialNumberKartu);
		serialNumberKartu = "error";
		clearInterval(varInterval);
	}
}

function setSerialNumber() {
	
	//alert('ayo');
	if('WebSocket' in window){
	  console.log('Testing console : '+ports[parseInt(portCounter)]);
	  
	  var ws = new WebSocket('ws://localhost:'+ports[parseInt(portCounter)]+'/service');
	
	  if(portCounter>1){
		portCounter = 0;
	  }else{
		portCounter++;
	  }
	  
	  
	  ws.onopen = function () {
		//alert('connected');
	  };

	  ws.onmessage = function (evt) {  
		serialNumberKartu = evt.data;
		//alert('reveived data:'+evt.data);
	  };

	  ws.onclose = function () {
		//alert('socket closed');
	  };
	}
	
	
}





