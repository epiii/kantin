<?php
	session_start();
	if(!isset($_SESSION['sesi_login']) || $_SESSION['sesi_login']!=true) {
		header("Location:index.php");
		die;
	} else {
		define('ID', $_SESSION['id_pengguna']);
		define('LEVEL', $_SESSION['jns_pengguna']);
		define('NAMA', $_SESSION['nm_pengguna']);
		
	}
?>
