<?php 
require_once 'sesi_login.php';
require_once 'konfigurasi.php';

fungsi('topup');

define('PAGE', 'Kartu');
define('PAGE_ICO', 'icon-vcard');
define('PAGE_URL', '#');

define('SUBPAGE', 'Topup');
define('SUBPAGE_ICO', 'icon-vcard');
define('SUBPAGE_URL', 'topup.php');

koneksi_buka();
panggil_header();

?>
<script language="JavaScript">
function formatAngka(objek, separator) {
  a = objek.value;
  b = a.replace(/[^\d]/g,"");
  c = "";
  panjang = b.length;
  j = 0;
  for (i = panjang; i > 0; i--) {
    j = j + 1;
    if (((j % 3) == 1) && (j != 1)) {
      c = b.substr(i-1,1) + separator + c;
    } else {
      c = b.substr(i-1,1) + c;
    }
  }
  objek.value = c;
}
</script>

<div class="row-fluid">
	<div class="span12">
		<div class="da-panel">
			<div class="da-panel-header">
				<span class="da-panel-title">
					<i class="icon-edit"></i> Top Up Kartu
				</span>
			</div>
			<div class="da-panel-content da-form-container">
				<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_topup.php">
					<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
					<div class="da-form-inline">
						<div class="da-form-row">
							<label class="da-form-label">No Kartu<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="id" name="id" class="span6">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Nama<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="nama" name="nama"  class="span6">
							</div>
						</div>
						<div id="div-kelas" class="da-form-row">
							<label class="da-form-label">Kelas<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="kelas" name="kelas"  class="span12">
							</div>
						</div>
						<div class="da-form-row de-hide" id="div-status">
							<label class="da-form-label">Status<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="status" name="status"  class="span12">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Saldo Sebelumnya<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="saldo_number" name="saldo_sebelumnya"  class="span12" onkeyup="formatAngka(this, '.')">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Tambah Saldo</label>
							<div class="da-form-item">
								<div class="span6">
									<input id="tambah_saldo" type="text" name="saldo" class="da-spinner" onkeyup="formatAngka(this, '.')">
								</div>
							</div>
						</div>
					<div class="btn-row">
						<a href="topup.php" class="btn gray left">Bersih</a>
						<a id="topup-ok" href="#" onclick="javascript:this.style.visibility='hidden';window.print()" class="btn btn-success">OK</a>	
						<input type="hidden" name="siswa" value="">						
						<input type="hidden" name="operation"  value="topup">	
						<input type="hidden" id="saldo" name="saldo_sementara">

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--
<applet name="jzebra" code="jzebra.PrintApplet.class" archive="./jzebra.jar" width="50px" height="50px">
       <param name="printer" value="zebra">
</applet>
-->


<?php
panggil_footer();
koneksi_tutup();
?>
