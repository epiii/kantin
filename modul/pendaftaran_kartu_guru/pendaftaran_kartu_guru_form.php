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
	$q_kartu = mysql_query("SELECT *, a.id k_id, b.nama g_nama, c.nama s_nama, b.id g_id
							FROM kartu a 
							LEFT JOIN guru b on b.id = a.guru 
							LEFT JOIN status c on b.status= c.id 
							WHERE a.id = '$id'");
	


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
					<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_kartu_guru.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">No Kartu<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="kartu" type="text" value="<?php echo $dt['k_id']?>" disabled="true" name="id_kartu" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Nama<span class="required">*</span></label>
								<div class="da-form-item large">
									<select id="nama" class="select2 span10" name="nama">

										<option value="<?php echo $dt['g_id'] ?>"><?php echo $dt['g_nama']." (".$dt['s_nama'].")" ?></option>
								
										<?php
											$q_guru = mysql_query("select a.id as g_id, a.nama as g_nama, b.nama as s_nama from guru a left join status b on a.status = b.id");
											while($dt_guru = mysql_fetch_array($q_guru)) {
										?>
											<option value="<?php echo $dt_guru['g_id'] ?>"><?php echo $dt_guru['g_nama']." (".$dt_guru['s_nama'].")" ?></option>
										<?php } ?>
									</select>
									
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Status<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="status" type="text" value="<?php echo $dt['s_nama']?>" disabled="true" name="status" class="span6" onkeyup="formatAngka(this, '.')">
								</div>
							</div>		
							<div class="da-form-row">
								<label class="da-form-label">Saldo</label>
								<div class="da-form-item">
									<div class="span6">
										<input id="kartu" type="text" value="<?php echo $dt['saldo']?>" disabled="true" name="id_kartu" class="span6" onkeyup="formatAngka(this, '.')">
									</div>
								</div>
							</div>
						<div class="btn-row">
							<input type="reset" value="Bersih" class="btn gray left">
							<!--
							<input type="submit" value="submit" class="btn gray left">
							-->
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
					<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_kartu_guru.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">No Kartu<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="kartu" type="text"  readonly="readonly" name="id_kartu" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Nama<span class="required">*</span></label>
								<div class="da-form-item large">
									<select id="nama" class="select2 span10" name="nama">
										<?php
											$q_guru = mysql_query("select a.id as g_id, a.nama as g_nama, b.nama as s_nama from guru a left join status b on a.status = b.id");
											while($dt_guru = mysql_fetch_array($q_guru)) {
										?>
											<option value="<?php echo $dt_guru['g_id'] ?>"><?php echo $dt_guru['g_nama']." (".$dt_guru['s_nama'].")" ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Status<span class="required">*</span></label>
								<div class="da-form-item large">
										<input id="status" type="text" value="<?php echo $dt['s_nama']?>" readonly="readonly" name="status" class="span6">
								</div>
							</div>		
							
						<div class="btn-row">
							<input type="reset" value="Bersih" class="btn gray left">
							<!--<input type="submit" value="submit" class="btn gray left">-->
							<a id="pendaftaran-ok" href="#" class="btn btn-success">OK</a>	
							<input type="hidden" name="operation"  value="add">	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php }?>
