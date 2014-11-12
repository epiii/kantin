<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('pengguna');

define('PAGE', 'Penjualan Hari Ini');
define('PAGE_ICO', 'icon-stats');
define('PAGE_URL', 'penjualan_hari_ini.php');

koneksi_buka();
panggil_header();

$kartu = "";

if(isset($_POST['kartu'])){
	$kartu = $_POST['kartu'];
}

$total = 0;

date_default_timezone_set('Asia/Jakarta');

$tgl = date("Y-m-d");

$q_penjualan = mysql_query("
	SELECT *, a.id id_t 
	FROM t_kantin a left join kartu b on a.kartu = b.id 
	left join datasiswa c on b.siswa = c.no 
	where tgl_transaksi = '$tgl' and a.kartu like '%$kartu%'");
?>

<!-- Content Area -->
<div id="da-content-area">

<div class="row-fluid">
	<div class="span12">
		<div class="da-panel  collapsible">
			<div class="da-panel-header">
				<span class="da-panel-title">
					<i class="icon-edit"></i> Filter cari
				</span>
			</div>
			<div class="da-panel-content da-form-container">
				<form id="da-ex-validate1" class="da-form" method="post" action="penjualan_hari_ini.php">
					<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
					<div class="da-form-inline">
						<div class="da-form-row">
							<label class="da-form-label">Laporan Transaksi Hari ini</label>
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
						<input type="reset" value="Bersih" class="btn gray left">
						<a class="btn" id="print" href="#"><i class="icol-printer"></i> Print</a>	
						<input type="hidden" name="operation" value="add_suggest">
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
