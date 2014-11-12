<?php

	require_once "../../konfigurasi.php";
	
	koneksi_buka();
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	if(isset($_POST['siswa'])){
		$siswa = $_POST["siswa"];
	}
	if(isset($_POST['guru'])){
		$guru = $_POST["guru"];
	}
	if(isset($_POST['saldo'])){
		$saldo = $_POST["saldo"];
	}
	
	if(isset($_POST['saldo_sementara'])){
		$saldo_sementara = $_POST["saldo_sementara"];
	}
	
	if(isset($_POST['operation'])){
		$operation = $_POST["operation"];
	}
	
	if(isset($_POST['limit_transaksi'])){
		$limit_transaksi = $_POST["limit_transaksi"];
	}
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	if(isset($_GET['limit_transaksi'])){
		$limit_transaksi = $_GET["limit_transaksi"];
	}
	if(isset($_GET['siswa'])){
		$siswa = $_GET["siswa"];
	}
	if(isset($_GET['saldo'])){
		$saldo = $_GET["saldo"];
	}
	if(isset($_GET['saldo_sementara'])){
		$saldo_sementara = $_GET["saldo_sementara"];
	}
	
	if(isset($_GET['operation'])){
		$operation = $_GET["operation"];
	}
	
	$tgl_topup = date("Y-m-d");
	$wkt = date("H:i:s");
	
	if($operation == "add") {
	
		$q = "INSERT INTO kartu
			(id, siswa, saldo, tgl_topup, waktu_topup, tipe, limit_transaksi) 
			VALUES('$id','$siswa','$saldo','$tgl_topup','$wkt','S', '$limit_transaksi')";
			
		$result = mysql_query($q);
		if($result){
			
					header("Location:../../pendaftaran_kartu.php");	
		}else{
			echo 'failed query :'.$q ;
		}
		
		
	}else if($operation == "edit") {
		$result = mysql_query("UPDATE kartu SET 
			siswa='$siswa',
			saldo='$saldo',
			tgl_topup='$tgl_topup',
			waktu_topup='$wkt',
			limit_transaksi='$limit_transaksi' 
			WHERE id='$id'");
			
		if($result){
			
			
			header("Location:../../pendaftaran_kartu.php");
			
		}else{
			echo 'failed';
		}
		
		
	}else if($operation == "topup") {
		
		$saldo_tambahan = $saldo;
		
		$saldo = $saldo_sementara+$saldo;
		
		$result = mysql_query("UPDATE kartu SET 
			saldo='$saldo',
			tgl_topup='$tgl_topup',
			waktu_topup='$wkt' 
			WHERE id='$id'");
		
		if($result){
			
			if($dt=mysql_fetch_array(mysql_query("select * from datasiswa a left join kartu b on a.no = b.siswa where b.id='$id'"))){
				$nama_anak = $dt['nama_anak'];
				$kelas = $dt['kelas'];
				$result = mysql_query("INSERT INTO laporan_topup
						(nama, kelas, topup, tgl_transaksi, waktu_transaksi, kartu)
						VALUES('$nama_anak', '$kelas', '$saldo_tambahan','$tgl_topup', '$wkt', '$id')");
				if($result){
					header("Location:../../topup.php");
				}
			}else if($dt=mysql_fetch_array(mysql_query("select * from guru a left join kartu b on a.id = b.guru where b.id='$id'"))){
				$nama_anak = $dt['nama'];
				$result = mysql_query("INSERT INTO laporan_topup
						(nama, topup, tgl_transaksi, waktu_transaksi, kartu)
						VALUES('$nama_anak', '$saldo_tambahan','$tgl_topup', '$wkt','$id')");
				if($result){
					header("Location:../../topup.php");
				}
			}else{				
				echo 'failed';
			}
		}else{
			echo 'failed';
		}
		
		
		
	}else if($operation == "remove") {
		
		$result = mysql_query("DELETE FROM kartu WHERE id='$id'");
	
		if($result){
			header("Location:../../pendaftaran_kartu.php");
		}else{
			echo 'failed';
		}
		
	}else if($operation == "get") {
		
		$q_kartu = mysql_query("select * from kartu a left join datasiswa b on a.siswa= b.no where a.id = '$id'");
	
		$d_kartu = array();
		
		if($dt = mysql_fetch_array($q_kartu)) {
			$d_kartu[] = array('id' => $dt['id'], 'tgl_transaksi_terakhir' =>$dt['tgl_transaksi_terakhir'], 'nama' => $dt['nama_anak'], 'kelas' => $dt['kelas'], 'saldo' => $dt['saldo'], 'siswa' => $dt['siswa'], 'limit_sisa' => $dt['limit_sisa'], 'limit_transaksi' => $dt['limit_transaksi']);
			$hasil = array('kartus'=>$d_kartu);
			echo json_encode($hasil);
		}
		
	}else if($operation == "cek_kartu"){
		$q_kartu = mysql_query("SELECT * FROM kartu WHERE id = '$id'");
		$num_rows = mysql_num_rows($q_kartu);
		if($num_rows>0) {
			echo "kartu sudah terdaftar sebelumnya";
		}else{
			echo "ok";
		}
	}else if($operation == "cek_tipe"){
		$q_kartu = mysql_query("SELECT * FROM kartu WHERE id = '$id'");
		if($dt = mysql_fetch_array($q_kartu)) {
			echo $dt['tipe'];
		}else{
			echo "failed";
		}
	}else if($operation == "get_kelas"){
		$q_siswa = mysql_query("SELECT * FROM datasiswa WHERE no = '$siswa'");
		if($dt = mysql_fetch_array($q_siswa)) {
			echo $dt['kelas'];
		}else{
			echo "failed";
		}
	}else if($operation == "get_status"){
		$q_siswa = mysql_query("SELECT * FROM guru WHERE id = '$guru'");
		if($dt = mysql_fetch_array($q_siswa)) {
			echo $dt['status'];
		}else{
			echo "failed";
		}
	}
	
?>
