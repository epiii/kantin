<?php
	require_once "../../sesi_login.php";
	require_once "../../konfigurasi.php";
	
	$tgl = date("Y-m-d");
	$tgl = new DateTime($tgl);
	$tgl = $tgl->format('d-m-Y');
	
	$kartu = "";

	if(isset($_POST['kartu'])){
		$kartu = $_POST['kartu'];
	}
	
	$tgl_dari = $_POST['tanggal_dari'];
	$tgl_sampai = $_POST['tanggal_sampai'];
	
	koneksi_buka();

	$date = str_replace('/', '-', $tgl_dari);
	$tgl_dari = date('Y-m-d', strtotime($date));
	
	$date = str_replace('/', '-', $tgl_sampai);
	$tgl_sampai = date('Y-m-d', strtotime($date));
	
	
	$q_topup = mysql_query("
		SELECT *
		FROM laporan_topup
		WHERE tgl_transaksi >= '$tgl_dari' and tgl_transaksi <= '$tgl_sampai'  and kartu like '%$kartu%'");


	$total = 0;

?>

<b>Elyon</b><br />
<b>Laporan Topup</b><br />
<?php echo "Tanggal : ".$tgl."<br />"; 
	if($kartu!=""){
			
		$q_customer = mysql_query("
						SELECT *, b.id k_id, e.nama s_nama, d.nama g_nama
						FROM kartu b 
						left join datasiswa c on b.siswa = c.no 
						left join guru d on d.id = b.guru
						left join status e on e.id = d.status
						where b.id like '%$kartu%'");
		
		if($dt_customer=mysql_fetch_array($q_customer)){
			if($dt_customer['tipe']=='G'){
				echo "Nama : ".$dt_customer['g_nama']."<br />";
				echo "Status : ".$dt_customer['s_nama'];
			}else{
				echo "Nama : ".$dt_customer['nama_anak']."<br />";
				echo "Status : ".$dt_customer['kelas'];
			}
		}
		
	}
?>
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
		<?php if($kartu==""){?>
			<th>Nama</th>
			<th>Kelas</th>
		<?php }?>
		<th>Topup</th>
	</thead>
	<tbody>
		<?php 
			$i=0;
			while($dt=mysql_fetch_array($q_topup)){
				$i++?>
			
			<tr>
				<td><?php echo $i;?></td>
				<td><?php 
					$date = date_create($dt['tgl_transaksi']);
					echo date_format($date, 'd-m-Y');?></td>
				<?php
					 if($kartu==""){
						if(isset($dt['kelas'])){ ?>
						<td><?php echo $dt['nama'];?></td>
						<td><?php echo $dt['kelas'];?></td>				
					 <?php } else{?>
						<td><?php echo $dt['nama'];?></td>
						<td><?php echo "guru";?></td>								 
					 <?php }
					}?>
				 
				<td align="right">Rp. 
					<?php 
						$total = $total+$dt['topup'];
						echo number_format($dt['topup'], 0, '', '.');?>
				</td>
			</tr>	
			
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<?php if($kartu!=""){?>
				<td colspan="2" align="right">Total Seluruh</td>
				<td align="right">Rp.<?php echo number_format($total, 0, '', '.');?></td>
			<?php }else{?>
				<td colspan="4" align="right">Total Seluruh</td>
				<td align="right">Rp.<?php echo number_format($total, 0, '', '.');?></td>
			<?php }?>
		</tr>
	</tfoot>
</table>

<?php
if($kartu!=""){
	if($dt_kartu = mysql_fetch_array(mysql_query("select * from kartu where id = '$kartu'")))
	echo "Saldo Sekarang : ".number_format($dt_kartu['saldo'], 0, '', '.');
}?>
<?php koneksi_tutup(); ?>
