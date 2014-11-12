<?php
function fungsi($file) {
	if(file_exists(ABSPATH.'functions/func_'.$file.'.php')){
		require_once ABSPATH.'functions/func_'.$file.'.php';
	}
}

function jumlah_data($tabel) {
	return mysql_num_rows(mysql_query("SELECT * FROM t_".$tabel));
}

function kelamin($kd) {
	if($kd=="L") {
		echo "Laki-laki";
	} else {
		echo "Perempuan";
	}
}

function koneksi_buka() {
	mysql_select_db(DB_NAMA,mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}

function koneksi_tutup() {
	mysql_close(mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}

function konversi_tanggal($format, $tanggal) {
	$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
	"Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
	"Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September",
	"Oktober","November","Desember");
	return str_replace($en,$id,date($format,strtotime($tanggal)));
}

function loncat($url) {
	header("Location:".$url);
}

function panggil_header() {
	require_once 'header.php';
}

function panggil_admin_header() {
	require_once 'admin_header.php';
}

function panggil_footer() {
	require_once 'footer.php';
}

function pengaturan($kunci, $kolom = 0) {
	$dt = mysql_fetch_array(mysql_query("SELECT nilai, keterangan FROM t_pengaturan WHERE kunci='".$kunci."'"));
	return $dt[$kolom];
}

function tab_aktif($p, $page, $url, $default = false, $tambah = false) {
	if(($default && $p=="") || $p==$page) { echo 'class="btn disabled"'; } 
	else { echo 'href="'.$url.'" class="btn"'; }
}

function cek_collapse($is_collapse){
	if(!$is_collapse){
		echo 'class="da-panel collapsible collapsed"';
	}else{
		echo 'class="da-panel collapsible"';
	}
}
/*
function get_id_menu(){
	$q_menu = mysql_query("SELECT * FROM menu");
	$num_rows = mysql_num_rows($q_menu);
	if($num_rows==0){
		return 'M1';
	}
	$sama = false;
	where($dt = mysql_fetch_array($q_menu)){
		$id_sementara = $dt['id'];
		$id = str_replace("M","",$id_sementara);
		for($i=0;$i<$num_rows;$i++){
			if($i==$id){
				$sama;
			}
		}
	}
	return $id;
}

function get_id_paket(){
	$dt = mysql_fetch_array(mysql_query("SELECT * FROM paket"));
	
	return $dt[$kolom];
}*/

?>
