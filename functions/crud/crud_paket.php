<?php

	require_once "../../konfigurasi.php";
	require_once "../func_upload_file.php";
	
	koneksi_buka();
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	if(isset($_POST['nama'])){
		$nama = $_POST["nama"];
	}
	if(isset($_POST['harga'])){
		$harga = $_POST["harga"];
	}
	if(isset($_POST['jumlah'])){
		$jumlah = $_POST["jumlah"];
	}
	if(isset($_POST['keterangan'])){
		$keterangan = $_POST["keterangan"];
	}
	if(isset($_POST['operation'])){
		$operation = $_POST["operation"];
	}
	if(isset($_POST['photo'])){
		$photo = $_POST["photo"];
	}
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	if(isset($_GET['nama'])){
		$nama = $_GET["nama"];
	}
	if(isset($_GET['harga'])){
		$harga = $_GET["harga"];
	}
	if(isset($_GET['jumlah'])){
		$jumlah = $_GET["jumlah"];
	}
	if(isset($_GET['keterangan'])){
		$keterangan = $_GET["keterangan"];
	}
	if(isset($_GET['operation'])){
		$operation = $_GET["operation"];
	}
	
	
	
	
	if($operation == "add") {
		$photo="0";
		if(isset($_FILES["file"]["name"])){
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$photo = "gallery/".$nama."_".$harga.".".$extension;
		}

		$q = "INSERT INTO paket
			(nama, harga, keterangan, photo, jumlah) 
			VALUES('$nama','$harga','$keterangan','$photo','$jumlah')";
			
		$result = mysql_query("INSERT INTO paket
			(nama, harga, keterangan, photo, jumlah) 
			VALUES('$nama','$harga','$keterangan','$photo','$jumlah')");
			
		if(isset($_FILES["file"]["name"])){
			upload_file("../../".$photo);
		}
		
		if($result){
			header("Location:../../paket.php");
		}else{
			echo 'failed query :'.$q ;
		}
		
		
	}else if($operation == "edit") {
		
		
		
				
		$photo="0";
		
		if(isset($_FILES["file"]["name"])){
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$photo = "gallery/".$nama."_".$harga.".".$extension;
		}

		
		if(!isset($_FILES["file"]["name"]) || $_FILES["file"]["name"]==""){
		
			$result = mysql_query("UPDATE paket SET 
				nama='$nama',
				harga='$harga',
				keterangan='$keterangan',
				jumlah='$jumlah'
				WHERE id=".$id);
				
		}else{
			$q_paket = mysql_query("select * FROM paket WHERE id=".$id);
			
			while($dt = mysql_fetch_array($q_paket)) {
				unlink("../../".$dt['photo']);// delete gambar....
			}
			$result = mysql_query("UPDATE paket SET 
				nama='$nama',
				harga='$harga',
				keterangan='$keterangan',
				photo='$photo',
				jumlah='$jumlah'
				WHERE id=".$id);
			
			
			if(isset($_FILES["file"]["name"])){
				upload_file("../../".$photo);
			}
			
		}
		
		if($result){
			header("Location:../../paket.php");
		}else{
			echo 'failed';
		}
		
		
	}else if($operation == "remove") {
		
		$q_paket = mysql_query("select * FROM paket WHERE id=".$id);
		
		while($dt = mysql_fetch_array($q_paket)) {
			unlink("../../".$dt['photo']);// delete gambar....
		}	
		
		$result = mysql_query("DELETE FROM paket WHERE id=".$id);
	
		if($result){
			header("Location:../../paket.php");
		}else{
			echo 'failed';
		}
		
	}
?>
