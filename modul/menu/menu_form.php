<?php 
	
	require_once "../../konfigurasi.php";
	
	koneksi_buka();
	$id = "0";
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	
	$q_menu = mysql_query("
			SELECT * FROM menu
			WHERE id=".$id."");
			
	if($dt = mysql_fetch_array($q_menu)) {
	
?>
	<div class="row-fluid">
		<div class="span12">
			<div class="da-panel">
				<div class="da-panel-header">
					<span class="da-panel-title">
						<i class="icon-edit"></i> Menu
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" enctype="multipart/form-data" class="da-form" method="post" action="functions/crud/crud_menu.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">Nama Menu<span class="required">*</span></label>
								<div class="da-form-item large">
									<input type="text" name="nama" class="span6"  value="<?php echo $dt['nama'];?>">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Harga<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="harga" type="text" name="harga" class="span6" value="<?php echo $dt['harga'];?>">
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label">Jumlah Item</label>
								<div class="da-form-item">
									<div class="span6">
										<input id="jumlah" type="text" name="jumlah"  value="<?php echo $dt['jumlah'];?>" class="da-spinner">
									</div>
								</div>
							</div>
							<div class="da-form-row">
								<label class="da-form-label" for="file">File Gambar</label>
								<div class="da-form-item">
									<input type="file" name="file" id="file">
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
						<i class="icon-edit"></i> Menu
					</span>
				</div>
				<div class="da-panel-content da-form-container">
					<form id="da-ex-validate1" class="da-form" enctype="multipart/form-data" method="post" action="functions/crud/crud_menu.php">
						<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
							<div class="da-form-row">
								<label class="da-form-label">Nama Menu<span class="required">*</span></label>
								<div class="da-form-item large">
									<input type="text" name="nama" class="span6">
								</div>
							</div>
							
							<div class="da-form-row">
								<label class="da-form-label">Harga<span class="required">*</span></label>
								<div class="da-form-item large">
									<input id="harga" type="text" name="harga" class="span6">
								</div>
							</div>
							
							<div class="da-form-row">
								<label class="da-form-label">Jumlah Item</label>
								<div class="da-form-item">
									<div class="span6">
										<input id="jumlah" type="text" name="jumlah"  value="<?php echo $dt['jumlah'];?>" class="da-spinner">
									</div>
								</div>
							</div>
							
							<div class="da-form-row">
								<label class="da-form-label" for="file">File Gambar</label>
								<div class="da-form-item">
									<input type="file" name="file" id="file">
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
