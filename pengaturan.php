<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';
fungsi('umum');

define('PAGE', 'Pengaturan');
define('PAGE_ICO', 'icon-settings');
define('PAGE_URL', 'pengaturan.php');
	
koneksi_buka();
panggil_header();
?>

<div id="da-content-area">
<div class="row-fluid">

<div class="span12">
	<div class="da-panel">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<i class="icon-settings"></i>
				Pengaturan Sistem
			</span>
		</div>
		<div class="da-panel-toolbar">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php 
						if(isset($_GET['p']) 
						&& $_GET['p']!="") { $p = $_GET['p'];} 
						else { $p = ""; }	
					?>
					
					<a <?php tab_aktif($p,'umum',PAGE_URL, true)?>>Umum</a>
				</div>
			</div>
		</div>
		<div class="da-panel-content da-form-container">
		<?php 
			if($p!="") {
				if(file_exists('modul/pengaturan/pengaturan.'.$p.'.php')) {
					require 'modul/pengaturan/pengaturan.'.$p.'.php';
				}
			} else {
				require 'modul/pengaturan/pengaturan.umum.php';
			}
		?>
		</div>
	</div>
</div>

</div>
</div>

<?php
panggil_footer();
koneksi_tutup();
?>
