<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('menu');

define('PAGE', 'Makanan');
define('PAGE_ICO', 'icon-fast-food');
define('PAGE_URL', '#');

define('SUBPAGE', 'Menu');
define('SUBPAGE_ICO', 'icon-fast-food');
define('SUBPAGE_URL', 'menu.php');

koneksi_buka();
panggil_header();

$q_menu = mysql_query("
	SELECT * FROM menu");
?>

<div class="da-panel collapsible">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<i class="icon-notes-2"></i>Daftar Menu
		</span>
	</div>
	<div class="da-panel-toolbar">
		<div class="btn-toolbar">
			<div class="btn-group">
				<a id="tambah-menu-dialog" class="btn" href="#"><i class="icol-add"></i> Tambah</a>
			</div>
		</div>
		</div>
	<div class="da-panel-content da-table-container">
		<table class="da-table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 			
					while($dt=mysql_fetch_array($q_menu)) { 
				?>
					<tr>
						<td>
							<?php echo $dt['nama']; ?>
						</td>
						<td>
							Rp. <span class="number"><?php echo $dt['harga']; ?></span>
						</td>
						<td>
							<?php echo $dt['jumlah']; ?>
						</td>
						
						<td class="da-icon-column">
							<a href="#" id="update-dialog" data-id=<?php echo $dt['id']; ?>>								
								<i class="icol-magnifier">
								</i> 
							</a>
							<a href="functions/crud/crud_menu.php?admin=true&operation=remove&id=<?php echo $dt['id']?>" id="remove">								
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
