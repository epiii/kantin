var varInterval;
var serialNumberKartu = "error";

var ports = new Array();
	ports[0] = "7676";
	ports[1] = "7878";
	ports[2] = "4747";
	
var portCounter = 0;

(function($) {
	$(document).ready(function(e) {
		
		if( $.fn.spinner ) {
			$('.da-spinner').spinner();
		}	
		
		$("#tambah_saldo").bind('change', function () {
				$("#tambah_saldo").val($("#tambah_saldo").val().replace(/\./g,''));
				//alert('ade');
		});
		
		if($.fn.validate) {
			$("#da-ex-validate1").validate({
				rules: {
					id: {
						required: true
					}, 
					nama: {
						required: true
					}, 
					kelas: {
						required: true
					}, 
					saldo: {
						required: true
					}
				}
			});
		}
		
		$('#topup-ok').on('click', function(event){
			$("#topup-ok").attr('disabled',true);
					
			var currentdate = new Date(); 
			var dateTime = "Tanggal : " + currentdate.getDate() + "/"
							+ (currentdate.getMonth()+1)  + "/" 
							+ currentdate.getFullYear() + "<br /> Waktu : "  
							+ currentdate.getHours() + ":"  
							+ currentdate.getMinutes() + ":" 
							+ currentdate.getSeconds();
			var id = $('#id').val();
			var saldo = $("#saldo").val();
			var tambahSaldo = $("#tambah_saldo").val();
			saldo = parseInt(saldo)+parseInt(tambahSaldo);
			saldo = parseInt(saldo).formatMoney(2,'.');
			var htmlText =" ";
			var nama = $("#nama").val();
			var kelas = $("#kelas").val();
			if(kelas==null || kelas==""){
				var status = $("#status").val();
				htmlText="<html><body><font face='times, serif' size='2'><b>Elyon</b><br />"+
							dateTime+"<br />Nama = "+
							nama+"<br />Status = "+
							status+"<br />Saldo = "+
							saldo+"</font></body></html>";
				
			}else{
				htmlText="<html><body><font face='times, serif' size='2'><b>Elyon</b><br />"+
							dateTime+"<br />Nama = "+
							nama+"<br />Kelas = "+
							kelas+"<br />Saldo = "+
							saldo+"</font></body></html>";
			
			}
			
			//alert(htmlText);
			
			printHTML(htmlText, function callBack(){
				printHTML(htmlText,function callBack(){
					$('form').submit();
				});
			});
			
			return false;
		} );
		
		varInterval = setInterval(function(){getKartu()},1000);	
		
	});
}) (jQuery);

function getKartu(){
	setSerialNumber();
	
	//alert(serialNumberKartu );
	if(serialNumberKartu!="error"){
		
		
		clearInterval(varInterval);
		
		$("#id").val(serialNumberKartu);
		
		var url = "functions/crud/crud_topup.php";
		$.post(url, {id: serialNumberKartu, operation: "cek_tipe"} ,function(data) {
			if(data=='S'){
				
				var url = "functions/crud/crud_topup.php";
				$.post(url, {id: serialNumberKartu, operation: "get"} ,function(data) {
					
					serialNumberKartu = "error";
					var obj = eval ("(" + data + ")");
					//alert(data);
					//alert(obj.kartus[0].nama);
					$("#nama").val(obj.kartus[0].nama);
					$("#kelas").val(obj.kartus[0].kelas);
					$("#saldo").val(obj.kartus[0].saldo);
					$("#saldo_number").val(parseInt(obj.kartus[0].saldo).formatMoney(2,'.'));
					$("#siswa").val(obj.kartus[0].siswa);
					
				});
				
			}else if(data=='G'){
					
				$("#div-status").removeClass('de-hide');
				$("#div-kelas").addClass('de-hide');
				
				var url = "functions/crud/crud_kartu_guru.php";
				
				$.post(url, {id_kartu: serialNumberKartu, operation: "get"} ,function(data) {
		
					
					serialNumberKartu = "error";
					var obj = eval ("(" + data + ")");
					//alert(data);
					//alert(obj.kartus[0].nama);
					$("#nama").val(obj.kartus[0].nama);
					$("#status").val(obj.kartus[0].status);
					$("#saldo").val(obj.kartus[0].saldo);
					$("#saldo_number").val(parseInt(obj.kartus[0].saldo).formatMoney(2,'.'));
					$("#siswa").val(obj.kartus[0].siswa);
						
				});
			}
		});

		
		
		
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





