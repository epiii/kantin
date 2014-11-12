<?php 
	
	require_once "../../konfigurasi.php";
	
	koneksi_buka();
	$id = "0";
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	//echo $id;
	//echo "SELECT * FROM kartu_siswa a LEFT JOIN datasiswa b on b.no = a.siswa WHERE a.id = '$id'";
	//die;
	$q_kartu = mysql_query("SELECT * FROM kartu a LEFT JOIN datasiswa b on b.no = a.siswa WHERE a.id = '$id'");
	
	if($dt = mysql_fetch_array($q_kartu)) {
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
						<i class="icon-edit"></i> Pendaftaran Kartu
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_topup.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">No Kartu<span class="required"> *</span></label>
								<div class="da-form-item large">
									<input id="kartu_siswa" type="text" value="<?php echo $dt['id']?>" disabled="true" name="id" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Siswa<span class="required"> *</span></label>
								<div class="da-form-item large">
									<select id="nama" class="select2 span10" name="siswa">
										<option value="<?php echo $dt['no'] ?>"><?php echo $dt['nama_anak']; ?></option>

										<?php
											$q_siswa = mysql_query("select * from datasiswa");
											while($dt_siswa = mysql_fetch_array($q_siswa)) {
												if($dt_siswa['no']!=$dt['no']){
										?>
											<option value="<?php echo $dt_siswa['no'] ?>"><?php echo $dt_siswa['nama_anak']; ?></option>
										<?php 
												}
											} ?>
									</select>
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Kelas</label>
								<div class="da-form-item large">
									<input id="kelas" type="text" value="<?php echo $dt['kelas']?>" disabled="true" name="kelas" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Limit Transaksi<span class="required"> *</span></label>
								<div class="da-form-item">
									<div class="span6">
										<input id="limit" type="text" name="limit_transaksi"  value="<?php echo $dt['limit_transaksi']?>" class="da-spinner" onkeyup="formatAngka(this, '.')">
									</div>
								</div>
							</div>		
							<div class="da-form-row">
								<label class="da-form-label">Saldo</label>
								<div class="da-form-item">
									<div class="span6">
										<input id="saldo" type="text" name="saldo"  value="<?php echo $dt['saldo'];?>" disabled="true" class="span6" onkeyup="formatAngka(this, '.')">
									</div>
								</div>
							</div>
						<div class="btn-row">
							<input type="reset" value="Bersih" class="btn gray left">
							<a id="pendaftaran-ok" href="#" class="btn btn-success">OK</a>				
							<input type="hidden" name="operation"  value="edit">
									
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php }else {?>

	<div class="row-fluid">
		<div class="span12">
			<div class="da-panel">
				<div class="da-panel-header">
					<span class="da-panel-title">
						<i class="icon-edit"></i> Pendaftaran Kartu
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_topup.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">No Kartu<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="kartu_siswa" type="text"  readonly="readonly" name="id" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Siswa<span class="required">*</span></label>
								<div class="da-form-item large">
									<select id="nama" class="select2 span10" name="siswa">
										<?php
											$q_siswa = mysql_query("select * from datasiswa");
											while($dt_siswa = mysql_fetch_array($q_siswa)) {
										?>
											<option value="<?php echo $dt_siswa['no'] ?>"><?php echo $dt_siswa['nama_anak']." (".$dt_siswa['kelas'].")" ?></option>
										<?php } ?>
									</select>
								</div>
							</div>	
							<div class="da-form-row">
								<label class="da-form-label">Kelas<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="kelas" type="text" value="<?php echo $dt['kelas']?>" readonly="readonly" name="kelas" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Limit Transaksi</label>
								<div class="da-form-item">
									<div class="span6">
										<input id="limit" type="text" name="limit_transaksi"  value="30000" class="da-spinner" onkeyup="formatAngka(this, '.')">
									</div>
								</div>
							</div>		
							
						<div class="btn-row">
							<input type="reset" value="Bersih" class="btn gray left">
							<a id="pendaftaran-ok" href="#" class="btn btn-success">OK</a>	
							<input type="hidden" name="operation"  value="add">	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php }?>
