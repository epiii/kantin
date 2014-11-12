<?php
	require_once '../../sesi_login.php';
	require_once '../../konfigurasi.php';

	koneksi_buka();
	$total = 0;
	date_default_timezone_set('Asia/Jakarta');
	$tgl   = date("d-m-Y");
	$wkt   = date("H:i:s");
	$id    = 0;
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
	$sql = "SELECT 
				*, 
				a.id id_t, 
				e.nama s_nama, 
				d.nama g_nama
			from 
				t_kantin a 
				left join kartu b on a.kartu = b.id 
				left join datasiswa c on b.siswa = c.no
				left join guru d on b.guru = d.id
				left join status e on d.status = e.id
			where 
				a.id = '$id'";
	$q_penjualan = mysql_query($sql);
?>
	<html>
		<head>
			<style>
				* {
				 font-size: 8px;
				 font-family: Arial;
				}
			</style>
		</head>
		
		<body>
			<font face="times, serif" size="2">
				<b>Elyon   <font face="times, serif" size="3">(Kantin)</font></b><br />
				<?php echo "Tanggal : ".$tgl; ?>
				<?php echo "Jam : ".$wkt; ?>
			</font>
		
			<table border=1 style="font-size:10pt; font-face:\'times, serif\';">
				<thead>
					<tr>
						<th>Daftar Penjualan</th>
					</tr>
				</thead>
					
				<tbody>
					<?php 			
						while($dt=mysql_fetch_assoc($q_penjualan)) { 
					?>
					<tr>
						<td>
							<?php 
								if(isset($dt['kelas'])){ // siswa
									echo "Nama : ".$dt['nama_anak']." "; 
							?> 
							<br />
							<?php
									echo "Kelas : ".$dt['kelas']." "; 
								}else{ //guru
									echo "Nama : ".$dt['g_nama']." ";
								}
							?> 
							<br/>
							Detail Penjualan
							<?php 
								$q_detail= mysql_query("
									SELECT * FROM d_t_kantin where t_kantin='".$dt['id_t']."'");	
								if(mysql_num_rows($q_detail)>0){		
							?>
							<table border="1">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jumlah</th>
										<th>Sub Total</th>
									</tr>
								</thead>

								<tbody>
									<?php
										while($dt_detail=mysql_fetch_array($q_detail)){
									?>											
										<tr>
											<td>
												<font face="times, serif" size="3"><?php echo $dt_detail['nama']; ?></font>
											</td>
											<td align="right">
												<?php echo $dt_detail['jumlah']; ?>
											</td>
											<td align="right">
												<?php echo number_format($dt_detail['sub_total'], 0, '', '.');?>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php
								}
							?>
							<font face="times, serif" size="2">
								<div align="right">
									Total : <?php echo  number_format($dt['total'], 0, '', '.');?>
								</div>
								<div align="right">
									Sisa Saldo : <?php echo  number_format($dt['saldo'], 0, '', '.');?>
								</div>
							</font>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</body>
