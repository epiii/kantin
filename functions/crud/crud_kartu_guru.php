
<?php
	require_once "../../konfigurasi.php";
	koneksi_buka();
// post-------
	if(isset($_POST['id_kartu'])){
		$id_kartu = $_POST['id_kartu'];
	}
	if(isset($_POST['id_guru'])){
		$id_guru = $_POST['id_guru'];
	}
	if(isset($_POST['nama'])){
		$nama = $_POST["nama"];
	}
	if(isset($_POST['saldo'])){
		$saldo = $_POST["saldo"];
	}
	if(isset($_POST['status'])){
		$status = $_POST["status"];
	}
	if(isset($_POST['saldo_sementara'])){
		$saldo_sementara = $_POST["saldo_sementara"];
	}
	if(isset($_POST['tgl_transaksi_terakhir'])){
		$tgl_transaksi_terakhir = $_POST["tgl_transaksi_terakhir"];
	}
	if(isset($_POST['operation'])){
		$operation = $_POST["operation"];
	}
// get ----	
	if(isset($_GET['id_kartu'])){
		$id_kartu = $_GET['id_kartu'];
	}
	if(isset($_GET['id_guru'])){
		$id_guru = $_GET['id_guru'];
	}
	if(isset($_GET['nama'])){
		$nama = $_GET["nama"];
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
	if(isset($_GET['tgl_transaksi_terakhir'])){
		$tgl_transaksi_terakhir = $_GET["tgl_transaksi_terakhir"];
	}
	if(isset($_GET['status'])){
		$status = $_GET["status"];
	}
	
	$tgl_topup = date("Y-m-d");
	$wkt = date("H:i:s");
	
	if($operation == "add") {
			$id_guru = $nama;
			$q_kartu = "INSERT INTO kartu
				(id, guru, saldo, tgl_topup, waktu_topup, tipe) 
				VALUES('$id_kartu','$id_guru','$saldo','$tgl_topup','$wkt','G')";
			$result = mysql_query($q_kartu);
			if($result){
				header("Location:../../pendaftaran_kartu_guru.php");
			}else{
				echo 'failed query :'.$q ;
			}
	}else if($operation == "edit") {
		$q_kartu = mysql_query("select * from kartu where id = '$id_kartu'");
		if($dt = mysql_fetch_array($q_kartu)) {
			$id_guru = $dt['guru'];
			$result = mysql_query("UPDATE kartu SET 
				guru        ='$id_guru',
				saldo       ='$saldo',
				tgl_topup   ='$tgl_topup',
				waktu_topup ='$wkt' 
				WHERE id='$id_kartu'");
			if($result){
				header("Location:../../pendaftaran_kartu_guru.php");
			}else{
				echo 'failed query :'.$q ;
			}
		}		
	}else if($operation == "remove") {
		$q_kartu = mysql_query("select * from kartu where id = '$id_kartu'");
		if($dt = mysql_fetch_array($q_kartu)) {
			$id_guru = $dt['guru'];
			$result = mysql_query("DELETE FROM kartu WHERE id='$id_kartu'");
			if($result){
					header("Location:../../pendaftaran_kartu_guru.php");
			}else{
				echo 'failed';
			}
		}		
	}else if($operation == "get") {
		$sql =" select *, a.tgl_transaksi_terakhir k_tgl, a.id k_id, b.nama g_nama, c.nama s_nama, c.id s_id 
				from kartu a 
					left join guru b on a.guru= b.id 
					left join status c on b.status = c.id 
				where a.id = '$id_kartu'";
		$q_kartu = mysql_query($sql);
		$d_kartu = array();
		if($dt = mysql_fetch_array($q_kartu)) {
			$d_kartu[] = array(
							'id'                     => $dt['k_id'], 
							'tgl_transaksi_terakhir' =>$dt['k_tgl'], 
							'nama'                   => $dt['g_nama'], 
							'id_status'              => $dt['s_id'], 
							'status'                 => $dt['s_nama'], 
							'saldo'                  => $dt['saldo']
						);
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
	}else if($operation == "get_status"){
		$q_guru = mysql_query("SELECT b.nama s_nama FROM guru a left join status b on a.status=b.id WHERE a.id = '$id_guru'");
		if($dt = mysql_fetch_array($q_guru)) {
			echo $dt['s_nama'];
		}else{
			echo "failed";
		}
	}elseif($operation=="cekID"){
		#cek 
		$scek = 'SELECT * from kartu where id = "'.$id_kartu.'"';
		$ecek = mysql_query($scek);
		$rcek = mysql_fetch_assoc($ecek);
		#end of cek
		if($rcek['guru']!=''){ // guru
			$tb  = 'guru';
			$id  = 'id';
			$id2 = 'guru';
			$nm  = 'nama';
		}else{ //siswa
			$tb  = 'datasiswa';
			$id  = 'no';
			$id2 = 'siswa';	
			$nm  = 'nama_anak';
		}
		
		$sql = 'SELECT * 
				from kartu
					join '.$tb.' 
				where 
					kartu.id = "'.$rcek['id'].'" and 
					kartu.'.$id2.'='.$tb.'.'.$id;
		$exe = mysql_query($sql);
		$res = mysql_fetch_assoc($exe);
		$jum = mysql_num_rows($exe);

		// $nm  = $res[$nm]!=''?$res[$nm]:$res['nama_anak'];
		$kl  = isset($res['kelas'])?$res['kelas']:'';
		if($jum>0){
			$out = '{
				"cek":"'.$jum.'",
				"nama":"'.$res[$nm].'",
				"kelas":"'.$kl.'",
				"saldo":"'.$res['saldo'].'",
				"limit_sisa":"'.$res['limit_sisa'].'"
			}';
		}else{
			$out='{
				"cek":"'.$jum.'"
			}';
		}
		echo $out;
	}
?>
