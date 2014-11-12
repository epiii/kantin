<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('pengguna');

define('PAGE', 'Pengguna');
define('PAGE_ICO', 'icon-edit');
define('PAGE_URL', 'pengguna.php');

koneksi_buka();
panggil_header();

$q_pengguna = mysql_query("
	SELECT * FROM pengguna");
?>

<div class="da-panel collapsible">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<i class="icon-notes-2"></i>Daftar Pengguna
		</span>
	</div>
	<div class="da-panel-toolbar">
		<div class="btn-toolbar">
			<div class="btn-group">
				<a id="tambah-pengguna-dialog" class="btn" href="#"><i class="icol-add"></i> Tambah</a>
			</div>
		</div>
		</div>
	<div class="da-panel-content da-table-container">
		<table class="da-table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Level</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 			
					while($dt=mysql_fetch_array($q_pengguna)) { 
				?>
					<tr>
						<td>
							<?php echo $dt['nama']; ?>
						</td>
						<td>
							<?php echo $dt['level']; ?>
						</td>
						<td class="da-icon-column">
							<a href="#" id="update-dialog" data-id=<?php echo $dt['id']; ?>>								
								<i class="icol-magnifier">
								</i> 
							</a>
							<a href="functions/crud/crud_pengguna.php?admin=true&operation=remove&id=<?php echo $dt['id']?>" id="remove">								
								<i class="icol-cross">
								</i>	
							</a>
						</td>
					</tr>
				<?php }	?>
			</tbody>
		</table>
	</div>
</div>

<div id="dialog-detail" style="display:none;">
	<div id="berkas-detail"></div>
</div>

<?php
panggil_footer();
koneksi_tutup();
?>
