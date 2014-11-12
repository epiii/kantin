<?php
	require_once "../../sesi_login.php";
	require_once "../../konfigurasi.php";
	
	$tgl = date("Y-m-d");
	$tgl = new DateTime($tgl);
	$tgl = $tgl->format('d-m-Y');
	
	$tgl_dari = $_POST['tanggal_dari'];
	$tgl_sampai = $_POST['tanggal_sampai'];
	
	koneksi_buka();

	$date = str_replace('/', '-', $tgl_dari);
	$tgl_dari = date('Y-m-d', strtotime($date));
	
	$date = str_replace('/', '-', $tgl_sampai);
	$tgl_sampai = date('Y-m-d', strtotime($date));
	
	
	$q_penjualan = mysql_query("
		SELECT *, SUM(total) totals, COUNT(*) jumlah_transaksi
		FROM t_kantin a left join kartu b on a.kartu = b.id 
		WHERE tgl_transaksi >= '$tgl_dari' and tgl_transaksi <= '$tgl_sampai'
		GROUP BY tgl_transaksi");
		
	$total = 0;

?>

<b>Elyon</b><br />
<b>Laporan Transaksi</b><br />
<?php echo "Tanggal : ".$tgl."<br />"; ?>
<style type="text/css">
	table {
		border-collapse:collapse;
	}
	table td{
		border:1px solid #000000;
	}
</style>
<table width="800" border="1">
	<thead>
		<th>No. </th>
		<th>Tanggal. </th>
		<th>Jumlah Transaksi (Murid)</th>
		<th>Jumlah Transaksi (Guru)</th>
		<th>Jumlah Uang yang Diterima</th>
	</thead>
	<tbody>
		<?php 
			$i=0;
			while($dt=mysql_fetch_array($q_penjualan)){
				$i++?>
			
			<tr>
				<td><?php echo $i;?></td>
				<td><?php 
					$date = date_create($dt['tgl_transaksi']);
					echo date_format($date, 'd-m-Y');?></td>
				
				<td align="right">
					<?php 
							$tgl_transaksi = $dt['tgl_transaksi'];
							$q_siswa = mysql_query("
								SELECT *, COUNT(*) jumlah_transaksi
								FROM t_kantin a left join kartu b on a.kartu = b.id 
								WHERE tgl_transaksi = '$tgl_transaksi' and b.tipe='S'
								GROUP BY tgl_transaksi");
							if($dt_siswa=mysql_fetch_array($q_siswa)){
								echo $dt_siswa['jumlah_transaksi'];
							}
					 ?>
				</td>
				
				<td align="right">
					<?php 
							$tgl_transaksi = $dt['tgl_transaksi'];
							$q_guru = mysql_query("
								SELECT *, COUNT(*) jumlah_transaksi
								FROM t_kantin a left join kartu b on a.kartu = b.id 
								WHERE tgl_transaksi = '$tgl_transaksi' and b.tipe='G'
								GROUP BY tgl_transaksi");
							if($dt_guru=mysql_fetch_array($q_guru)){
								echo $dt_guru['jumlah_transaksi'];
							}
					 ?>
				 </td>
				<td align="right">Rp. 
					<?php 
						$total = $total+$dt['totals'];
						echo number_format($dt['totals'], 0, '', '.');?>
				</td>
			</tr>	
			
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" align="right"> Total Seluruh</td>
			<td align="right"><?php echo "Rp. ".number_format($total, 0, '', '.');?></td>
		</tr>
	</tfoot>
</table>
<?php koneksi_tutup(); ?>
