<?php 
	require_once "../../konfigurasi.php";
	
	koneksi_buka();
	$id = "0";
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	
	$q_pengguna = mysql_query("
			SELECT * FROM pengguna
			WHERE id=".$id."");
			
	if($dt = mysql_fetch_array($q_pengguna)) {
	
?>
	<div class="row-fluid">
		<div class="span12">
			<div class="da-panel">
				<div class="da-panel-header">
					<span class="da-panel-title">
						<i class="icon-edit"></i> Pengguna
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_pengguna.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">Nama<span class="required">*</span></label>
								<div class="da-form-item large">
									<input type="text" name="nama" class="span6"  value="<?php echo $dt['nama'];?>">
								</div>
							</div>							
							<div class="da-form-row">
								<label class="da-form-label">Password<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="password" type="password" name="password" class="span9">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Password Lagi<span class="required">*</span></label>
								<div class="da-form-item large">
									<input type="password" name="password_lagi" class="span9">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Level<span class="required">*</span></label>
								<div class="da-form-item large">
									<select class="select2 span5" name="level">
										<option value="<?php echo $dt["level"]?>"><?php echo $dt["level"]?></option>
										<option value="pengguna">Pengguna</option>
										<option value="pemilik">Pemilik</option>
										<option value="admin">Admin</option>
										
									</select>
								</div>
							</div>
							
						</div>
						<div class="btn-row">
							<input type="reset" value="Bersih" class="btn gray left">
							<input type="submit" value="OK" class="btn btn-success">
							<input type="hidden" name="operation" value="edit">
							<input type="hidden" name="admin" value="true">
							<input type="hidden" name="id" value="<?php echo $id.''; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
}
///////////////////////////////form kosong////////////////////////////////
else{
?>

	<div class="row-fluid">
		<div class="span12">
			<div class="da-panel">
				<div class="da-panel-header">
					<span class="da-panel-title">
						<i class="icon-edit"></i> Pengguna
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" method="post" action="functions/crud/crud_pengguna.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">Nama<span class="required">*</span></label>
								<div class="da-form-item large">
									<input type="text" name="nama" class="span6">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Password<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="password" type="password" name="password" class="span9">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Password Lagi<span class="required">*</span></label>
								<div class="da-form-item large">
									<input type="password" name="password_lagi" class="span9">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Paket<span class="required">*</span></label>
								<div class="da-form-item large">
									<select class="select2 span5" name="level">
										<option value="pengguna">Pengguna</option>
										<option value="pemilik">Pemilik</option>
										<option value="admin">Admin</option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="btn-row">
							<input type="reset" value="Bersih" class="btn gray left">
							<input type="submit" value="OK" class="btn btn-success">
							<input type="hidden" name="operation" value="add">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


<?php }?>
