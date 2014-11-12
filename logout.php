<?php	
require_once "sesi_login.php";
require_once "konfigurasi.php";

fungsi('login');

koneksi_buka();
koneksi_tutup();

session_destroy();
loncat("index.php?m=logout");
?>
