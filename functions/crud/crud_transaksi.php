<?php

	require_once "../../konfigurasi.php";
	
	koneksi_buka();

	
	// if(isset($_POST['json'])){
	// 	$json = $_POST['json'];
	// 	$items = json_decode($json);	
	// }

	if(isset($_POST['json'])){
		$json = $_POST['json'];
		$items = json_decode($json);	
	}
	
	if(isset($_POST['pesanans'])){
		$json = $_POST['pesanans'];
		$pesanans = json_decode($json);	
	}
	
	if(isset($_POST['total'])){
		$total = $_POST['total'];
	}
	
	if(isset($_POST['pengguna'])){
		$pengguna = $_POST['pengguna'];
	}
	
	if(isset($_POST['kartu'])){
		$kartu = $_POST['kartu'];
	}
	
	if(isset($_POST['saldo'])){
		$saldo = $_POST['saldo'];
	}
	
	$limit_sisa = 0;
	if(isset($_POST['limit_sisa'])){
		$limit_sisa = $_POST['limit_sisa'];
	}
	date_default_timezone_set('Asia/Jakarta');
    
    $tgl = date("Y-m-d");
	$wkt = date("H:i:s");
	
	//echo $wkt;
	//die;
		
    $result = mysql_query("INSERT INTO t_kantin
			(total, kartu, pengguna, tgl_transaksi, waktu_transaksi) 
			VALUES('$total','$kartu','$pengguna', '$tgl', '$wkt')");
	if($result){
		$id = mysql_insert_id();
		for($i=0;$i<count($items);$i++){
			$nama = $items[$i]->{'nama'};
			$jumlah = $items[$i]->{'jumlah'};
			$sub_total = $items[$i]->{'sub_total'};
			$result = mysql_query("INSERT INTO d_t_kantin
				(t_kantin, nama, sub_total, jumlah) 
				VALUES('$id','$nama','$sub_total','$jumlah')");
		}
		for($i=0;$i<count($pesanans);$i++){
			$id_pesanan = $pesanans[$i]->{'id'};
			$jumlah = $pesanans[$i]->{'jumlah'};
			$tipe = $pesanans[$i]->{'tipe'};
			
			$result = mysql_query("UPDATE ".$tipe." SET 
					jumlah = jumlah-".$jumlah." 
					WHERE id='$id_pesanan'");
					
			
		}
		if($result){
			$result = mysql_query("UPDATE kartu SET 
					saldo='$saldo',
					tgl_topup='$tgl',
					waktu_topup='$wkt',
					tgl_transaksi_terakhir='$tgl',
					limit_sisa='$limit_sisa' 
					WHERE id='$kartu'");
			if($result){
				echo $id."";
			}
		}
	}else{
		echo 'failed query :'.$q ;
	}

	
?>
