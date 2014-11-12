<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('pendaftaran_kartu_guru');

define('PAGE', 'Kartu');
define('PAGE_ICO', 'icon-vcard');
define('PAGE_URL', '#');

define('SUBPAGE', 'Pendaftaran Kartu Guru');
define('SUBPAGE_ICO', 'icon-vcard');
define('SUBPAGE_URL', 'pendaftaran_kartu_guru.php');

koneksi_buka();
panggil_header();

$q_kartu = mysql_query("
	SELECT *, a.id k_id FROM kartu a left join guru b on a.guru = b.id where a.tipe='G'");
?>

<div id="da-content-area">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<i class="icon-notes-2"></i>Daftar Kartu Guru
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
								<?php echo $dt['k_id']; ?>
							</td>
							<td>
								<?php echo $dt['nama']; ?>
							</td>
							<td>
								Rp. <span class="number"><?php echo $dt['saldo']; ?></span>
							</td>
							<td class="da-icon-column">
								<a href="#" id="update-dialog" data-id="<?php echo $dt['k_id']; ?>">								
									<i class="icol-magnifier">
									</i> 
								</a>
								<a href="functions/crud/crud_kartu_guru.php?admin=true&operation=remove&id_kartu=<?php echo $dt['k_id']?>" id="remove">								
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
