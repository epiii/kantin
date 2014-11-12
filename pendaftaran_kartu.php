<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('pendaftaran_kartu');

define('PAGE', 'Kartu');
define('PAGE_ICO', 'icon-vcard');
define('PAGE_URL', '#');

define('SUBPAGE', 'Pendaftaran Kartu');
define('SUBPAGE_ICO', 'icon-vcard');
define('SUBPAGE_URL', 'pendaftaran_kartu.php');

koneksi_buka();
panggil_header();

$q_kartu = mysql_query("
	SELECT * FROM kartu a LEFT JOIN datasiswa b on b.no = a.siswa WHERE a.tipe='S'");
?>

<div id="da-content-area">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<i class="icon-notes-2"></i>Daftar Kartu
			</span>
		</div>
		<div class="da-panel-toolbar">
			<div class="btn-toolbar">
				<div class="btn-group">
					<a id="tambah-kartu-dialog" class="btn" href="#"><i class="icol-add"></i> Tambah</a>
				</div>
			</div>
			</div>
		<div class="da-panel-content da-table-container">
			<table id="da-ex-datatable-numberpaging"  class="da-table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Limit Transaksi</th>
						<th>Saldo</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 			
						while($dt=mysql_fetch_array($q_kartu)) { 
					?>
						<tr>
							<td>
								<?php echo $dt['id']; ?>
							</td>
							<td>
								<?php echo $dt['nama_anak']; ?>
							</td>
							<td>
								Rp. <span class="number"><?php echo $dt['limit_transaksi']; ?></span>
							</td>
							<td>
								Rp. <span class="number"><?php echo $dt['saldo']; ?></span>
							</td>
							<td class="da-icon-column">
								<a href="#" id="update-dialog" data-id="<?php echo $dt['id']; ?>">								
									<i class="icol-magnifier">
									</i> 
								</a>
								<a href="functions/crud/crud_topup.php?admin=true&operation=remove&id=<?php echo $dt['id']?>" id="remove">								
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
</div>

<div id="dialog-detail" style="display:none;">
	<div id="berkas-detail"></div>
</div>
<applet name="jzebra" code="jzebra.PrintApplet.class" archive="./jzebra.jar" width="50px" height="50px">
       <param name="printer" value="zebra">
</applet>

<?php
panggil_footer();
koneksi_tutup();
?>
