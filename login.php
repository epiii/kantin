<?php
if(isset($_POST['submit']) && $_POST['submit']=='Masuk') {
	require_once "konfigurasi.php";

	fungsi('login');

	$user	= $_POST['username'];
//	$pass	= md5(strtolower($_POST['password']));
	$pass	= $_POST['password'];

	koneksi_buka();
	$login	= mysql_query("SELECT * FROM pengguna WHERE nama='$user' AND password='$pass'");
	$found	= mysql_num_rows($login);
	$r		= mysql_fetch_array($login);
	
	
	//echo "SELECT * FROM pengguna WHERE nama='$user' AND password='$pass'";
	if ($found > 0) {

		session_start();
		$_SESSION['id_pengguna']	= $r['id'];
		$_SESSION['jns_pengguna']	= $r['level'];
		$_SESSION['nm_pengguna']	= $r['nama'];
		$_SESSION['sesi_login']		= true;
		//echo $_SESSION['nm_pengguna']; 
		koneksi_tutup();
		loncat("penjualan_hari_ini.php");
		
	}else {
		loncat("index.php?m=salah");
	}
} else {
	header('location:index.php');
}
?>
