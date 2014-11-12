<form id="da-form-spdp" class="da-form" method="post" action="functions/crud/perkara.php">
<div class="da-form-inline">
	<div class="da-form-row">
		<label class="da-form-label">Penanda tangan</label>
		<div class="da-form-item">
			<select name="ttd" class="span8">
				<option value="0">KEPALA KEJAKSAAN NEGERI</option>
				<option value="1">KEPALA SEKSI INTEL</option>
				<option value="2">KEPALA SEKSI PERDATA DAN TATA USAHA NEGARA</option>
				<option value="3">KEPALA SEKSI PIDANA KHUSUS</option>
				<option value="4">KEPALA SEKSI PIDANA UMUM</option>
				<option value="5">KEPALA SUB BAGIAN PEMBINAAN</option>
			</select>
		</div>
	</div>
</div>

<div class="btn-row">
	<!--a href="#" class="btn"><i class="icol-calendar-2"></i> Riwayat Dokumen</a-->
	<button id="ubah-spdp" class="btn"><i class="icol-disk"></i> Simpan SPDP</button>
	<input id="mode-input" type="hidden" name="" value="" />
	<input type="hidden" name="kd" value="<?php echo KD_PERKARA ?>" />
	<input type="hidden" name="kd_tersangka" value="<?php echo $kd_tersangka ?>">
</div>

</form>

