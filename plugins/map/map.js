var peta;
var pertama = 0;
var jenis = "restoran";
var judulx = new Array();
var desx = new Array();
var i;
var url;
var gambar_tanda;

function peta_awal(a,b){
	var lati = a;
	var longi = b;
	if(lati == null) lati = -7.271790953458296;
	if(longi == null) longi = 112.74316906929016;
    var jakarta = new google.maps.LatLng(lati, longi);
	var petaoption = {
        center: jakarta,
		zoom:12,
		zoomControl:true,
		zoomControlOptions: {
		  style:google.maps.ZoomControlStyle.SMALL
		},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
    
    var petaAwal = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(petaAwal,'click',function(event){
        kasihtanda(event.latLng);
    });
}

function peta_cari(a,b){
    var pacitan = new google.maps.LatLng(a,b);
    var petaoption = {
		center: pacitan,
		zoom:14,
		zoomControl:true,
		zoomControlOptions: {
		  style:google.maps.ZoomControlStyle.SMALL
		},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
   /* var petaoption = {
        zoom: 14,
        center: pacitan,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };*/
    var petaCari = new google.maps.Map(document.getElementById("petaku"),petaoption);

    /*google.maps.event.addListener(peta,'click',function(event){
        kasihtandacari(event.latLng,a,b);
    });*/

	set_icon();
    tanda = new google.maps.Marker({
            position: pacitan,
            map: petaCari,
            icon: gambar_tanda
    });
}

function peta_klik(a,b){
    var pacitan = new google.maps.LatLng(a,b);
    var petaoption = {
        zoom: 14,
        center: pacitan,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtandacari(event.latLng);
    });
}

$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&judul="+judul+"&des="+des+"&jenis="+jenis,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#judul").val("");
                $("#deskripsi").val("");
                ambildatabase('akhir');
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
function kasihtanda(lokasi){
    /*set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: petaAwal,
            icon: gambar_tanda
    });*/
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());
	var aa = lokasi.lat();
	var bb = lokasi.lng();
	peta_awal(aa,bb);
}

function kasihtandacari(lokasi2,a,b){
	if(a && b) {
		peta_klik(a,b);
	}
    set_icon();
    tanda = new google.maps.Marker({
            position: lokasi2,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi2.lat());
    $("#y").val(lokasi2.lng());
	a = lokasi2.lat();
	b = lokasi2.lng();
	peta_cari(a,b);

}

function set_icon(jenisnya){
            gambar_tanda = 'assets/images/icons/led/src/house.png';
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1";
    }else{
        url = "ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                judulx[i] = msg.wilayah.petak[i].judul;
                desx[i] = msg.wilayah.petak[i].deskripsi;

                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksjudul").html(judulx[nomor]);
        $("#teksdes").html(desx[nomor]);
    });
}

function ambilTanda() {
	var lat = $('#x').val();
	var long = $('#y').val();
	$("[name='lat']").val(lat);
	$("[name='long']").val(long);
	$("#dialog-peta-tanda").dialog("close");
}
