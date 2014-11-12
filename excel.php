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
$Name = $_POST['Name'];

$query = "SELECT  kartu.id, kartu.tipe,kartu.tgl_transaksi_terakhir,guru.nama,guru.status 
FROM kartu left join guru on kartu.guru = guru.id 
where kartu.tipe='$Name' AND kartu.tgl_transaksi_terakhir=date(now())
order by tgl_transaksi_terakhir desc";

$sql = $mysqli->query($query);
$arrmhs = array();
while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
}
#akhir data
 
$excel = new Excel();
#Send Header
$excel->setHeader('Kantin'.'-'.$Name.'.xls');
$excel->BOF();
 
#header tabel
$excel->writeLabel(0, 0, "id");
$excel->writeLabel(0, 1, "guru");
$excel->writeLabel(0, 2, "tipe");
$excel->writeLabel(0, 3, "tgl_transaksi_terakhir");
$excel->writeLabel(0, 4, "nama");
$excel->writeLabel(0, 5, "status");
 
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