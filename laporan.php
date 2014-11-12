<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('pengguna');

define('PAGE', 'Laporan');
define('PAGE_ICO', 'icon-stats');
define('PAGE_URL', 'laporan.php');

koneksi_buka();
panggil_header();


date_default_timezone_set('Asia/Jakarta');

$tgl = date("Y-m-d");


?>

<!-- Content Area -->
<div id="da-content-area">

	<div class="row-fluid">
		<div class="span12">
			<div class="da-panel  collapsible">
				<div class="da-panel-header">
					<span class="da-panel-title">
						<i class="icon-edit"></i> Laporan Transaksi Berdasarkan Tanggal
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" method="post" action="penjualan_hari_ini.php">
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">Dari Tanggal</label>
								<div class="da-form-item">
									<input id="tanggal-transaksi-dari" type="text">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Sampai Dengan Tanggal</label>
								<div class="da-form-item">
									<input id="tanggal-transaksi-sampai" type="text">
								</div>
							</div>
						</div>
						<div class="btn-row">
							<a class="btn gray left" href="laporan.php">Bersih</a>
							<div id="laporan-transaksi-tanggal" class="btn btn-success">Lihat Laporan</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="row-fluid">
		<div class="span12">
			<div class="da-panel  collapsible">
				<div class="da-panel-header">
					<span class="da-panel-title">
						<i class="icon-edit"></i> Laporan Topup Berdasarkan Tanggal
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" method="post" action="penjualan_hari_ini.php">
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">Dari Tanggal</label>
								<div class="da-form-item">
									<input id="tanggal-topup-dari" type="text">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Sampai Dengan Tanggal</label>
								<div class="da-form-item">
									<input id="tanggal-topup-sampai" type="text">
								</div>
							</div>
							
							<div class="da-form-row">
								<label class="da-form-label">Pilih Customer</label>
								<div class="da-form-item large">
									<select id="kartu" class="select2 span5" name="kartu">
										<option value="">---- Semua ----</option>
										<?php
											$q_kartu = mysql_query("SELECT * FROM kartu a LEFT JOIN datasiswa b on b.no = a.siswa");
											while($dt_kartu = mysql_fetch_array($q_kartu)) {
												if(isset($dt_kartu['nama_anak'])){
										?>
										<option value="<?php echo $dt_kartu['id'] ?>"><?php echo $dt_kartu['nama_anak']." (".$dt_kartu['kelas'].")"; ?></option>
										<?php	
												} 
											} ?>
										
										<?php
											$q_kartu = mysql_query("SELECT *, a.id k_id FROM kartu a LEFT JOIN guru b on b.id = a.guru");
											while($dt_kartu = mysql_fetch_array($q_kartu)) {
												if(isset($dt_kartu['nama'])){
										?>
										<option value="<?php echo $dt_kartu['k_id'] ?>"><?php echo $dt_kartu['nama']; ?></option>
										<?php 
												}
											} ?>
									</select>
								</div>
							</div>							
						</div>
						<div class="btn-row">
							<a class="btn gray left" href="laporan.php">Bersih</a>
							<div id="laporan-topup-tanggal" class="btn btn-success">Lihat Laporan</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="dialog-print" style="display:none;">
	<div id="berkas"></div>
</div>

<?php
panggil_footer();
koneksi_tutup();
?>
