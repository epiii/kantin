<form id="da-form-spdp" class="da-form" method="post" action="functions/crud/perkara.php">
<div class="da-form-inline">
	<div class="da-form-row">
		<label class="da-form-label">Nomor Polisi SPDP</label>
		<div class="da-form-item">
			<input type="text" name="no_polisi" value="<?php echo $dt_spdp['no_polisi']?>">
		</div>
	</div>

	<div class="da-form-row">
		<label class="da-form-label">Tanggal Penyidikan</label>
		<div class="da-form-item">
			<input id="da-tgl-penyidikan" type="text" id="tgl_penyidikan" name="tgl_penyidikan" value="<?php echo konversi_tanggal('d-m-Y',$dt_spdp['tgl_penyidikan'])?>">
		</div>
	</div>

	<div class="da-form-row">
		<label class="da-form-label">Penyidik</label>
		<div class="da-form-item">
			<select class="select2 span6" name="kd_kesatuan">
				<option value="<?php echo $dt_spdp['kd_kesatuan'] ?>"><?php echo $dt_spdp['nm_kesatuan'] ?></option>
				<?php
					$q = mysql_query("SELECT * FROM r_kesatuan");
					while($dt = mysql_fetch_array($q)) {
				?>
				<option value="<?php echo $dt['kd_kesatuan'] ?>"><?php echo $dt['nm_kesatuan'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>

	<fieldset class="da-form-inline" id="tersangka">
		<legend>Tersangka</legend>
	</fieldset>

	<?php if($tersangka_ada) { ?>
	<div class="da-panel-toolbar">
		<div class="btn-toolbar">
			<div class="btn-group">
			<?php 						
				$i = 1;
				while($dt=mysql_fetch_array($q_tersangka)) { 
					if($i==1) {$d=  true;} else {$d = "";}
			?>
				<a <?php tab_aktif($t,$dt['kd_tersangka'],PAGE_ID.'&t='.$dt['kd_tersangka'].'#tersangka',$d)?>><?php echo $tx_tersangka.$i ?></a>
			<?php 
				$i++; } 

				if($t!="tambah") { 
			?>
				<a href="?kd=<?php echo KD_PERKARA?>&t=tambah#tersangka" class="btn"><i class="icol-add"></i> Tambah</a>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>

	<table class="da-table da-detail-view no-border">
		<tbody>
		<tr>
			<th>Nama Lengkap</th>
			<td>
				<input class="span8" type="text" placeholder="Nama Tersangka" name="nama" value="<?php echo $nama ?>">
			</td>
		</tr>
		<tr>
			<th>Tempat Lahir</th>
			<td>
				<input type="text" name="tmp_lahir"  placeholder="Tempat Lahir" value="<?php echo $tmp_lahir ?>">
			</td>
		</tr>
		<tr>
			<th>Tanggal Lahir / Umur</th>
			<td>
				<input type="text" placeholder="Contoh: 15-7-1990" name="tgl_lahir" value="<?php echo $tgl_lahir ?>"> / 
				<input type="text" placeholder="Umur"  name="umur" value="<?php echo $umur ?>">
			</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>
				<select name="jns_kelamin">
				<?php if(isset($_GET['t']) && $_GET['t']!="" && $_GET['t']!="tambah") {?>
					<option value="<?php echo $dt_tersangka['jns_kelamin']?>"><?php kelamin($dt_tersangka['jns_kelamin']) ?></option>
				<?php } ?>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Warga Negara</th>
			<td>
				<input type="text" placeholder="Warga Negara" name="kewarganegaraan"  value="<?php echo $warganegara ?>">
			</td>
		</tr>
		<tr>
			<th>Tempat Tinggal</th>
			<td>
				<input class="span12" type="text"placeholder="Tempat Tinggal" name="alamat"  value="<?php echo $tmp_tinggal ?>">
			</td>
		</tr>
		<tr>
			<th>Agama</th>
			<td>
				<select name="agama">
				<?php if(isset($_GET['t']) && $_GET['t']!="" && $_GET['t']!="tambah") {?>
					<option value="<?php echo $dt_tersangka['kd_agama']?>"><?php echo $dt_tersangka['agama']?></option>
				<?php } ?>
					<option value="1">Islam</option>
					<option value="2">Protestan</option>
					<option value="3">Katolik</option>
					<option value="4">Hindu</option>
					<option value="5">Budha</option>
					<option value="6">Konghuchu</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Pekerjaan</th>
			<td>
				<input type="text"placeholder="Pekerjaan" name="pekerjaan"  value="<?php echo $pekerjaan ?>">
			</td>
		</tr>
		<tr>
			<th>Pendidikan</th>
			<td><input type="text"placeholder="Pendidikan" name="pendidikan"  value="<?php echo $pendidikan ?>"></td>
		</tr>
		<tr>
			<th>Lain-lain</th>
			<td><input type="text"placeholder="Lain-lain" name="lain2"  value="<?php echo $lain2 ?>"></td>
		</tr>
		</tbody>
	</table>	
	<div class="da-panel-toolbar">
		<div class="btn-toolbar">
			<div class="btn-group">
			<?php if(($tersangka_ada && $t=="") || ($t!="" && $t!="tambah")) { ?>
				<button  id="ubah-tersangka" class="btn"><i class="icol-disk"></i> Ubah</button>
				<a href="functions/crud/perkara.php?kd=<?php echo KD_PERKARA?>&tersangka=<?php echo $kd_tersangka ?>" class="btn">
				<i class="icol-cross"></i> Hapus
				</a>
			<?php } else { ?>
				<button  id="tambah-tersangka" class="btn"><i class="icol-disk"></i> Simpan</button>
			<?php } ?>
			</div>
		</div>
	</div>

	<div class="da-form-row">
		<label class="da-form-label">Melanggar pasal</label>
		<div class="da-form-item">
			<input type="text" class="span12"  name="melanggar_pasal" value="<?php echo $dt_spdp['melanggar_pasal']?>">
		</div>
	</div>

	<div class="da-form-row">
		<label class="da-form-label">Jenis Tindak Pidana</label>
		<div class="da-form-item">
			<select name="kd_pidana">
				<option value="<?php echo $dt_spdp['kd_pidana'] ?>"><?php echo $dt_spdp['jns_pidana'] ?></option>
				<?php
					$q = mysql_query("SELECT * FROM r_jenis_pidana");
					while($dt = mysql_fetch_array($q)) {
				?>
				<option value="<?php echo $dt['kd_pidana'] ?>"><?php echo $dt['jns_pidana'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="da-form-row">
		<label class="da-form-label">Tanggal Diterima SPDP</label>
		<div class="da-form-item">
			<!--input id="da-tgl-diterima" type="text" id="tgl_diterima" name="tgl_diterima"  value="<?php echo konversi_tanggal('d-m-Y',$dt_spdp['tgl_diterima'])?>"-->
			<?php echo konversi_tanggal('d-m-Y',$dt_spdp['tgl_diterima'])?>
			<!--input type="hidden" name="tgl_diterima" value="<?php echo konversi_tanggal('d-m-Y',$dt_spdp['tgl_diterima'])?>"-->
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
