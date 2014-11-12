<?php
function statistik_tahanan() {
	$tahun = date("Y");
	return mysql_num_rows(mysql_query("SELECT kd_tahanan FROM t_tahanan WHERE YEAR(tgl_ditambahkan)=$tahun"));
}

function perkembangan_tahanan() {
	$tahun_ini = date("Y");
	$tahun_kmrn = $tahun_ini - 1;
	$sekarang = mysql_num_rows(mysql_query("SELECT kd_tahanan FROM t_tahanan WHERE YEAR(tgl_ditambahkan)=$tahun_ini"));
	$kemarin = mysql_num_rows(mysql_query("SELECT kd_tahanan FROM t_tahanan WHERE YEAR(tgl_ditambahkan)=$tahun_kmrn"));
	
	if($sekarang > $kemarin) {
		return ' up';
	} elseif($sekarang < $kemarin) {
		return ' down';
	}
}

function statistik_tersangka() {
	$tahun = date("Y");
	return mysql_num_rows(mysql_query("SELECT kd_tersangka FROM t_tahanan WHERE YEAR(tgl_ditambahkan)=$tahun"));
}

?>
