<?php 
	require_once 'sesi_login.php';
	require_once 'konfigurasi.php';

	fungsi('transaksi');

	define('PAGE', 'Transaksi');
	define('PAGE_ICO', 'icon-notes-2');
	define('PAGE_URL', 'transaksi.php');

	koneksi_buka();
	panggil_header();

	$q_paket = mysql_query("SELECT * FROM paket");
?>
	<!-- Content Area -->
	<div id="da-content-area">
		<?php
			if(file_exists('modul/transaksi/transaksi_form.php')) {
				require 'modul/transaksi/transaksi_form.php';
			}
			if(file_exists('modul/transaksi/transaksi_table.php')) {
				require 'modul/transaksi/transaksi_table.php';
			}
		?>
	</div>

	<div id="dialog-konfirmasi" style="display:none;">
		<div id="berkas-konfirmasi"></div>
	</div>

	<div id="dialog-jumlah" style="display:none;">
		<div id="berkas-jumlah"></div>
	</div>
	<input type="hidden" id="pengguna" value=<?php echo "'".ID."'";?> />
	<applet name="jzebra" code="jzebra.PrintApplet.class" archive="./jzebra.jar" width="50px" height="50px">
	       <param name="printer" value="zebra">
	</applet>


<?php
	panggil_footer();
	koneksi_tutup();
?>
