<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';
fungsi('umum');

define('PAGE', 'Pegawai');
define('PAGE_ICO', 'icon-parents');
define('PAGE_URL', 'pegawai.php');

define('SUBPAGE', 'Detail Pegawai');
define('SUBPAGE_ICO', 'icon-user');
define('SUBPAGE_URL', 'pegawai.detail.php');

koneksi_buka();
panggil_header();
?>

<div id="da-content-area">
<div class="row-fluid">

<div class="span12">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<i class="icon-parent"></i> Data Pegawai &nbsp;
				<button id="da-ex-dialog-form" rel="tooltip" data-placement="top" class="btn" title="Tambah Pegawai"><i class="icon-circle-plus"></i></button>
			</span>
		</div>
		<div class="da-panel-content da-table-container">
			<table id="da-ex-datatable-numberpaging" class="da-table checkable">
				<thead>
					<tr>
						<th class="checkbox-column"><input type="checkbox"></th>
						<th>NIP</th>
						<th>NAMA LENGKAP</th>
						<th>PANGKAT</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$q = mysql_query("SELECT * FROM t_pegawai a, t_pangkat b WHERE a.kd_pangkat=b.kd_pangkat");
						while($dt = mysql_fetch_array($q)) {
					?>
					<tr>
						<td class="checkbox-column"><input type="checkbox"></td>
						<td><?php echo $dt['nip'] ?></td>
						<td><?php echo $dt['nm_lengkap'] ?></td>
						<td><?php echo $dt['nm_pangkat'] ?></td>
						<td class="da-icon-column">
							<a href="#" rel="tooltip" data-placement="top" title="Detail"><i class="icol-magnifier"></i></a>
							<a href="#" rel="tooltip" data-placement="top" title="Ubah"><i class="icol-pencil"></i></a>
							<a href="#" rel="tooltip" data-placement="top" title="Hapus"><i class="icol-cross"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
</div>

<div id="da-ex-dialog-form-div" class="form-container">
	<form id="da-ex-dialog-form-val" class="da-form">
		<div id="da-validate-error" class="da-message error" style="display:none;"></div>
		<div class="da-form-inline">
			<div class="da-form-row">
				<label class="da-form-label">NIP</label>
				<div class="da-form-item large">
					<input type="text" name="nip" placeholder="NIP">
				</div>
			</div>
			<div class="da-form-row">
				<label class="da-form-label">Nama Lengkap</label>
				<div class="da-form-item large">
					<input type="text" name="nama" placeholder="Nama Lengkap">
				</div>
			</div>
			<div class="da-form-row">
				<label class="da-form-label">Pangkat</label>
				<div class="da-form-item large">
					<select name="pangkat">
						<?php 
							$q = mysql_query("SELECT kd_pangkat, nm_pangkat FROM t_pangkat WHERE jns_pangkat='jaksa'");
							while($dt = mysql_fetch_array($q)) {
						?>
						<option value="<?php  echo $dt['kd_pangkat'] ?>"><?php echo $dt['nm_pangkat'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="da-form-row">
				<label class="da-form-label">Alamat</label>
				<div class="da-form-item large">
					<textarea name="alamat"></textarea>
				</div>
			</div>
			<div class="da-form-row">
				<label class="da-form-label">No. Telepon/ HP</label>
				<div class="da-form-item large">
					<input type="text" name="telp" placeholder="Telepon">
					<input type="text" name="hp" placeholder="Handphone">
					<input type="hidden" name="data" value="tambah">
				</div>
			</div>
		</div>
	</form>
</div>

<?php
panggil_footer();
koneksi_tutup();
?>
