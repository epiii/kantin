<div class="row-fluid">
	<div class="span5">
		<div class="da-panel">
			<div class="da-panel-header">
				<span class="da-panel-title">
					<i class="icon-edit"></i> Konfirmasi Siswa
				</span>
			</div>
			<div class="da-panel-content da-form-container">
				<div id="da-ex-validate1" class="da-form">
					<div id="da-ex-val1-error" class="da-message error" style="display:none;"></div>
					<div class="da-form-inline">
						<div class="da-form-row">
							<label class="da-form-label">No Kartu<span class="required">*</span></label>
							<div class="da-form-item large">
								<!-- <input type="text" id="kartu" onchange="cekID(this);" name="id" class="span6"> -->
								<input readonly="readonly" type="text" id="kartu" name="id" class="span6">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Nama<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="nama" name="nama" readonly="readonly" class="span12">
							</div>
						</div>
						<div class="da-form-row" id="div-kelas">
							<label class="da-form-label">Kelas<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="kelas" name="kelas" readonly="readonly" class="span6">
							</div>
						</div>
						<div class="da-form-row de-hide" id="div-status">
							<label class="da-form-label">Status<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="status" name="status" readonly="readonly" class="span6">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Saldo Sebelumnya<span class="required">*</span></label>
							<div class="da-form-item large">
								<input type="text" id="saldo-sebelumnya" name="saldo_sementara" readonly="readonly" class="span6">
							</div>
						</div>
						<div class="da-form-row">
							<label class="da-form-label">Saldo Sekarang</label>
							<div class="da-form-item large">
								<input type="text" id="saldo" name="saldo" readonly="readonly" class="span6">
							</div>
						</div>
						<div class="btn-row">
							<!-- <a class="btn" href="javascript:kirim();" id="printX">printX</a> -->
							<a class="btn gray left" href="transaksi.php">Batal</a>
							<div id="konfirmasi" class="btn btn-success">Konfirmasi</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="span7">
		<div class="da-panel" id="container-table-pesanan">
			
		</div>
	</div>
	
</div>
