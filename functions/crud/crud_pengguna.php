<?php

	require_once "../../konfigurasi.php";
	
	koneksi_buka();
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	if(isset($_POST['nama'])){
		$nama = $_POST["nama"];
	}
	if(isset($_POST['password'])){
		$password = $_POST["password"];
	}
	if(isset($_POST['level'])){
		$level = $_POST["level"];
	}
	if(isset($_POST['operation'])){
		$operation = $_POST["operation"];
	}
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	if(isset($_GET['nama'])){
		$nama = $_GET["nama"];
	}
	if(isset($_GET['password'])){
		$password = $_GET["password"];
	}
	if(isset($_GET['level'])){
		$level = $_GET["level"];
	}
	if(isset($_GET['operation'])){
		$operation = $_GET["operation"];
	}
	
	$tgl_daftar = date("Y-m-d");
	$wkt = date("H:i:s");
	
	
	
	if($operation == "add") {
	
		$q = "INSERT INTO pengguna
			(nama, password, level, 
			tgl_daftar, waktu_daftar) 
			VALUES('$nama','$password','$level','$tgl_daftar','$wkt')";
		$result = mysql_query("INSERT INTO pengguna
			(nama, password, level, 
			tgl_daftar, waktu_daftar) 
			VALUES('$nama','$password','$level','$tgl_daftar','$wkt')");
		if($result){
			header("Location:../../pengguna.php");
		}else{
			echo 'failed query :'.$q ;
		}
		
		
	}else if($operation == "edit") {
		$result = mysql_query("UPDATE pengguna SET 
			nama='$nama',
			password='$password',
			level='$level',
			tgl_daftar='$tgl_daftar',
			waktu_daftar='$wkt' 
			WHERE id=".$id);
			
		if($result){
			header("Location:../../pengguna.php");
		}else{
			echo 'failed';
		}
		
		
	}else if($operation == "remove") {
		
		$result = mysql_query("DELETE FROM pengguna WHERE id=".$id);
	
		if($result){
			header("Location:../../pengguna.php");
		}else{
			echo 'failed';
		}
		
	}
?>
