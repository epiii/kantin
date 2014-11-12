<?php
require_once "Excel.class.php"; 
#koneksi ke mysql

 
$mysqli = new mysqli("localhost","root","adminstaff","elyon");
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_error . ') ');
}
#akhir koneksi
 
#ambil data
session_start();
$tanggal = date("d.m.y");

$query = "select kartu.id,guru.nama,kartu.tgl_transaksi_terakhir,guru.status 
from t_kantin,kartu left join guru on kartu.guru = guru.id 
where kartu.id = t_kantin.kartu AND tipe ='G'  AND DATE(t_kantin.tgl_transaksi) = DATE(NOW())
order by tgl_transaksi_terakhir asc";

$sql = $mysqli->query($query);
$arrmhs = array();
while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
}
#akhir data
 
$excel = new Excel();
#Send Header
$excel->setHeader('TransaksiGURU'.'-'.$tanggal.'.xls');
$excel->BOF();
 
#header tabel
$excel->writeLabel(0, 0, "ID");
$excel->writeLabel(0, 1, "NAMA");
$excel->writeLabel(0, 2, "TANGGAL TRANSAKSI");
$excel->writeLabel(0, 3, "STATUS");

 
#isi data
$i = 1;
foreach ($arrmhs as $baris) {
	$j = 0;
	foreach ($baris as $value) {
		$excel->writeLabel($i, $j, $value);
		$j++;
	}
	$i++;
}
 
$excel->EOF();
 
exit();
?>