/*function cekID(e){
	var dt ='id_kartu='+$(e).val()+'&operation=cekID';
	// alert(dt);return false;
	$.ajax({
		url:'functions/crud/crud_kartu_guru.php',
		// type:'post',
		data:dt,
		dataType:'json',
		success:function(data){
			if(data.cek!=1) {//kosng
				alert('kosong');
				$('#nama').val('');
				$('#kelas').val('');
				$('#saldo').val('');
				$('#konfirmasi').attr('disabled','disabled');
			}else {//ada
				$('#nama').val(data.nama);
				$('#kelas').val(data.kelas);
				// $('#saldo-sebelumnya').val(data.saldo-sebelumnya);
				$('#saldo').val(data.saldo);
				$('#konfirmasi').removeAttr('disabled');
				console.log(data.saldo);
			}
		}
	});
}*/

var total= 0;
var varInterval;
var serialNumberKartu = "error";
var ports = new Array();
	ports[0] = "7676";
	ports[1] = "7878";
	ports[2] = "4747";
var pesananCounter = 0;
var pesananArray = new Array();
var limitSisa = 0;
function Pesanan(id, jumlah, tipe) {
	this.jumlah = jumlah;
	this.id     = id;
	this.tipe   = tipe;
};
var portCounter = 0;
var isConfirmed = false;

(function($) {
	$(document).ready(function(e) {
		// $('#konfirmasi').click(function(){
		// 	kirim();
		// 	alert('oke lah');
		// });
		if( $.fn.spinner ) {
			$('.da-spinner').spinner();
		}	
		if($.fn.select2) {
			$(".select2").select2();
		}
		$(".number").each(function() {
			$(this).html(parseInt($(this).html()).formatMoney(2,'.'));
		});
		if($.fn.validate) {
			$("#da-ex-validate1").validate({
				rules: {
					paket: {
						required: true
					}, 
					menu: {
						required: true
					}, 
					jumlah: {
						required: true
					}
				}
			});
		}
		
		$("#da-ex-tabs, #da-ex-tabs-plain").tabs();
		$('#t-table').dataTable( {
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
				var iTotal = 0;
				for ( var i=0 ; i<aaData.length ; i++ ){
					var sub = aaData[i][3].replace(".","");
					iTotal += sub*1;
				}
				var nCells = nRow.getElementsByTagName('th');
				nCells[1].innerHTML = iTotal.formatMoney(2,'.');
				total = iTotal;
			},
			"fnDrawCallback": function ( oSettings ) {
				/* Need to redo the counters if filtered or sorted */
				var lengthRow = $("#t-table").dataTable().fnGetNodes().length;
				for ( var i=0; i<lengthRow ; i++ ){
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
				}
			},
			"aoColumnDefs": [
				{ "bSortable": false, "aTargets": [ 0 ] }
			],
			"aaSorting": [[ 1, 'asc' ]],
			"aoColumns" : [   
				{sWidth: '10%'},
				{sWidth: '40%'},
				{ sWidth: '20%',sClass: "de-right"  },   
				{ sWidth: '30%', sClass: "de-right" }  
			],
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
				 $('td:eq(2),td:eq(3)', nRow).addClass( "de-right" );
			}
		});

		//dialog jumlah...................................
		$("#dialog-jumlah").dialog({
			autoOpen: false, 
			title: "Jumlah", 
			modal: true, 
			width: "300", 
			height: "300"
		});
		
		$("li .item").on('click', function(event){
			var url    = "modul/transaksi/transaksi_jumlah.php";
			var harga  = parseInt($(this).parent("li").find("[data-tipe='harga']").html());
			var nama   = $(this).parent("li").find("[data-tipe='nama']").html();
			var tipe   = $(this).parent("li").find("[data-tipe='tipe']").html();
			var idItem = $(this).parent("li").find("[data-tipe='id']").html();
			$.post(url, {} ,function(data) {
				$("#berkas-jumlah").html(data).show();
				if( $.fn.spinner ) {
					$('.da-spinner').spinner();
				}
				$("#ok-jumlah").on('click', function(event){
					var jumlah  = $("#jumlah").val();
					var pesanan = new Pesanan(idItem, jumlah,tipe)
					pesananArray[pesananCounter] = pesanan;
					pesananCounter++;
					var subTotal = jumlah*harga;
					tambahPesanan(nama, subTotal, jumlah);
					$("#dialog-jumlah").dialog("close");
				});		
				
				$("#batal-jumlah").on('click', function(event){
					$("#dialog-jumlah").dialog("close");
				});		
			});
			
			$("#dialog-jumlah").dialog("open");
			event.preventDefault();
			return false;
		});
		//....................................................
		
		//dialog konfirmasi...................................
		$("#dialog-konfirmasi").dialog({
			autoOpen: false, 
			title: "Konfirmasi", 
			modal: true, 
			width: "1000", 
			height: "550"
		});
		
		$("#selesai").on('click', function(event){
			if(total>0){
				var url = "modul/transaksi/transaksi_konfirmasi_form.php";
				$.post(url, {} ,function(data) {
					$("#berkas-konfirmasi").html(data).show();
					$("#container-table-pesanan").html($('#table-pesanan'));
					$(".btn-toolbar").addClass("de-hide");
					$("#konfirmasi").attr("disabled", "disabled");
					if($.fn.validate) {
						$("#da-ex-validate1").validate({
							rules: {
								id: {
									required: true
								},nama: {
									required: true
								},saldo: {
									required: true
								}
							}
						});
					}
					varInterval = setInterval(function(){
						getKartu()
					},1000);
				});
				
				$("#dialog-konfirmasi").dialog("option", {close: closeFunction}).dialog("open");
				event.preventDefault();
			}else{
				alert("harap memesan terlebih dahulu")
			}
		});
		//.............................................................
	});
}) (jQuery);

var closeFunction = function(){
							clearInterval(varInterval);
							varInterval = null;
							window.location.href = 'transaksi.php';
						}

function getKartu(){
	setSerialNumber();
	//alert(serialNumberKartu );
	if(serialNumberKartu!="error"){
		clearInterval(varInterval);
		$("#kartu").val(serialNumberKartu);
		var url = "functions/crud/crud_topup.php";
		$.post(url, {id: serialNumberKartu, operation: "cek_tipe"} ,function(data) {
			if(data=='S'){
				var url = "functions/crud/crud_topup.php";
				$.post(url, {id: serialNumberKartu, operation: "get"} ,function(data) {
					serialNumberKartu = "error";
					var obj = eval ("(" + data + ")");
					//alert(data);
					//alert(obj.kartus[0].nama);
					var currentdate = new Date(); 
					var dateTime = currentdate.getFullYear() + "-"
								+ (currentdate.getMonth()+1)  + "-" 
								+ currentdate.getDate();
					var dateTerakhirTemp = "";
					dateTerakhirTemp     = dateTerakhirTemp + obj.kartus[0].tgl_transaksi_terakhir;
					var dateTerakhir     = dateTerakhirTemp.replace(/-0/g,'-');
					var lanjut           = false;
					if(dateTerakhir!=dateTime){
						limitSisa = parseInt(0)+total;
						lanjut    = true;
					}else{
						var limitTransaksi = obj.kartus[0].limit_transaksi;
						limitSisa = obj.kartus[0].limit_sisa;
						limitSisa = parseInt(limitSisa) + total;
						if(limitSisa>limitTransaksi){
							lanjut = false;
							alert("Maaf sisa limit tidak mencukupi\nsisa limit dengan transaksi ini : "+(parseInt(limitTransaksi)-limitSisa));
						}else{
							lanjut = true
						}
					}
					
					if(lanjut){ //true
						var saldoSebelumnya = obj.kartus[0].saldo;
						var saldoSekarang = saldoSebelumnya-total;
						$("#nama").val(obj.kartus[0].nama);
						$("#kelas").val(obj.kartus[0].kelas);
						$("#saldo-sebelumnya").val(saldoSebelumnya);
						$("#saldo").val(saldoSekarang);
						$("#siswa").val(obj.kartus[0].siswa);
						if(saldoSekarang<0){
							alert("Maaf tidak bisa melakukan transaksi\nsaldo kurang\nsaldo saat ini : "+saldoSebelumnya);
							$("#dialog-konfirmasi").dialog("option", {close: closeFunction}).dialog("close");
						}else{
							$("#konfirmasi").on('click', function(event){
								//$("#dialog-konfirmasi").dialog("open");
								kirim();
								// alert('ok');
							});
							$("#konfirmasi").removeAttr("disabled");
						}
					}else{
						$("#dialog-konfirmasi").dialog("option", {close: closeFunction}).dialog("close");
					}
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
					
					var currentdate = new Date(); 
					var dateTime = currentdate.getFullYear() + "-"
								+ (currentdate.getMonth()+1)  + "-" 
								+ currentdate.getDate();
					var dateTerakhirTemp = "";
					dateTerakhirTemp = dateTerakhirTemp + obj.kartus[0].tgl_transaksi_terakhir;
					var dateTerakhir = dateTerakhirTemp.replace(/-0/g,'-');
					var status = ""+obj.kartus[0].status; 
					//alert(dateTerakhir);
					//alert(dateTime);
					if(status!="full time" || dateTerakhir==dateTime){
						var saldoSebelumnya = obj.kartus[0].saldo;
						var saldoSekarang = saldoSebelumnya-total;
						$("#nama").val(obj.kartus[0].nama);
						$("#status").val(status);
						$("#saldo-sebelumnya").val(saldoSebelumnya);
						$("#saldo").val(saldoSekarang);
						
						if(saldoSekarang<0){ // saldo habis  (minus)
							alert("Maaf tidak bisa melakukan transaksi\nsaldo kurang\nsaldo saat ini : "+saldoSebelumnya);
							$("#dialog-konfirmasi").dialog("option", {close: closeFunction}).dialog("close");
						}else{ // saldo ada
							// alert('ok'); return false;
							$("#konfirmasi").on('click', function(event){
								//$("#dialog-konfirmasi").dialog("open");
								kirim();
							});
							$("#konfirmasi").removeAttr("disabled");
						}
					}else{
						var saldoSebelumnya = obj.kartus[0].saldo;
						$("#nama").val(obj.kartus[0].nama);
						$("#status").val(obj.kartus[0].status);
						$("#saldo-sebelumnya").val(saldoSebelumnya);
						$("#saldo").val(saldoSebelumnya);
						
						
						$("#konfirmasi").on('click', function(event){
							//$("#dialog-konfirmasi").dialog("open");
							kirim();
						});
						$("#konfirmasi").removeAttr("disabled");
					}
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

function tambahPesanan(nama, subTotal, jumlah){
	var hapus = false;
	var rows = $("#t-table").dataTable().fnGetNodes();
	for(var i=0;i<rows.length;i++){
		if($(rows[i]).find("td:eq(1)").html()==nama){
			subTotal = parseInt($(rows[i]).find("td:eq(3)").html().replace(".",""))+subTotal;
			hapus = true;
		}
	}
	$('#t-table').dataTable().fnAddData( [
		0,
		nama,
		jumlah,
		subTotal.formatMoney(2,'.')]);			
	if(hapus){
		$('#t-table').dataTable().fnDeleteRow($(rows[i]));
	}	
}

function kirim(){
	if(isConfirmed){
		return;
	}isConfirmed = true;
	
	$("#konfirmasi").attr('disabled',true);
	var newArray = new Array();
	var rows     = $("#t-table").dataTable().fnGetNodes();
	for(var i=0;i<rows.length;i++){
		var o = {
			'nama' : $(rows[i]).find("td:eq(1)").html(), 
			'jumlah' : $(rows[i]).find("td:eq(2)").html(), 
			'sub_total' : $(rows[i]).find("td:eq(3)").html().replace(".","")
		};newArray.push(o);		
	}
	
	var pesananArrayJson = new Array();
	for(var i=0;i<pesananArray.length;i++){
		//alert(pesananArray[i].tipe);
		var o = {
				'id' : pesananArray[i].id, 
				'jumlah' : pesananArray[i].jumlah, 
				'tipe' : pesananArray[i].tipe
		};
		pesananArrayJson.push(o);		
	}
	
	var url      = "functions/crud/crud_transaksi.php";
	var idKartu  = $("#kartu").val();
	var pengguna = $("#pengguna").val();
	var saldo    = $("#saldo").val();

	$.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded",
		url: "functions/crud/crud_transaksi.php",
		data: { 
        		'saldo': saldo, 
        		'limit_sisa': limitSisa, 
        		'kartu': idKartu, 
        		'pengguna': pengguna , 
        		'total': total, 	
        		'json': JSON.stringify(newArray), 
        		'pesanans': JSON.stringify(pesananArrayJson)
        },success : function(data){
			if(parseInt(data)>0){
				$("#t-table").dataTable().fnClearTable();
				var url = "modul/transaksi/transaksi_print.php";
				$.post(url, {
							id:data
						} ,function(data) {
						printHTML(data, function callBack(){
							data = data.replace("Kantin", "Customer");
							printHTML(data,function callBack(){
								$("#dialog-konfirmasi").dialog("option", {
									close: closeFunction
								}).dialog("close");
							});
						});
				});
			}else{
				alert(data);
				$("#dialog-konfirmasi").dialog("option", {
					close: closeFunction
				}).dialog("close");
			}
		}
    });
}