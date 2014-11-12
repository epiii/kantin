<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('transaksi');

define('PAGE', 'Transaksi');
define('PAGE_ICO', 'icon-edit');
define('PAGE_URL', 'transaksi.php');

koneksi_buka();
panggil_header();


$json = $_POST['json'];
$person = json_decode($json);


$q_paket = mysql_query("
	SELECT * FROM paket");
?>

<div class="da-panel collapsible">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<i class="icon-notes-2"></i>Daftar Paket dan Menu yang Dipilih
		</span>
	</div>
	<div class="da-panel-content da-table-container">
		<table class="da-table">
			<thead class="de-hide">
				<tr>
					<th>Nama</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 			
					while($dt=mysql_fetch_array($q_paket)) { 
				?>
					<tr>
						<td>
							<?php echo $dt['nama'];?>
						</td>
						<td>
							<?php echo $dt['harga'];?>
						</td>
					</tr>
					
				<?php }	?>
			
			</tbody>
		</table>
	</div>
</div>

<div class="row-fluid">
	<div class="span5"></div>
	<div class="span7">
		<div class="da-panel">
			<div class="da-panel-header">
				<span class="da-panel-title">
					<i class="icon-edit"></i> Data Siswa Pembeli
				</span>
			</div>
			<div class="da-panel-content da-form-container">
				<form id="da-ex-validate1" class="da-form" method="post" action="">
					<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
					<div class="da-form-inline">
						<div class="da-form-row">
							<label class="da-form-label">Nama<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" name="nama" class="span6">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Kelas<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" name="kelas" class="span12">
							</div>
						</div>
					<div class="btn-row">
						<input type="reset" value="Bersih" class="btn gray left">
						<input type="submit" value="OK" class="btn btn-success">							
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
panggil_footer();
koneksi_tutup();
?>
