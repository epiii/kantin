<?php

require_once '../../sesi_login.php';
require_once '../../konfigurasi.php';

koneksi_buka();


$kartu = "";

if(isset($_POST['kartu'])){
	$kartu = $_POST['kartu'];
}

$total = 0;

$tgl = date("Y-m-d");

$tipe = '';



$q_penjualan = mysql_query("
			SELECT *, a.id id_t, b.id k_id, e.nama s_nama, d.nama g_nama
			FROM t_kantin a left join kartu b on a.kartu = b.id 
			left join datasiswa c on b.siswa = c.no 
			left join guru d on d.id = b.guru
			left join status e on e.id = d.status
			where tgl_transaksi = '$tgl' and a.kartu like '%$kartu%'");
			
/*echo "
			SELECT *, a.id id_t, b.id k_id, e.nama s_nama, d.nama g_nama
			FROM t_kantin a left join kartu b on a.kartu = b.id 
			left join datasiswa c on b.siswa = c.no 
			left join guru d on d.id = b.guru
			left join status e on e.id = d.status
			where tgl_transaksi = '$tgl' and a.kartu like '%$kartu%'";
			die;*/
/*
echo "kartu : ".$kartu."<br />";

echo "
	SELECT *, a.id id_t 
	FROM t_kantin a left join kartu_siswa b on a.kartu_siswa = b.id 
	left join datasiswa c on b.siswa = c.no 
	where tgl_transaksi = '$tgl' and a.kartu_siswa like '%$kartu%'";
	die;*/


$total=0;
$saldo = 0;


$tgl = new DateTime($tgl);
$tgl = $tgl->format('d-m-Y');


?>
<b>Elyon</b><br />
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
<table  width="800" border=1>
	<thead>
		<th>No</th>
		<?php if($kartu==""){?>
			<th>Nama</th>
			<th>Status</th>
			<th>Kelas</th>
		<?php }?>
		<th>Waktu</th>
		<th>Sub Total</th>
	</thead>
	<tbody>
		
		<?php 			
			$i=0;
			while($dt=mysql_fetch_array($q_penjualan)) {
				
				$i++;
				$saldo = number_format($dt['saldo'], 0, '', '.');
				$id_kartu = $dt['k_id'];
				$q_kartu = mysql_query("SELECT * FROM kartu WHERE id = '$id_kartu'");
				if($dt_tipe = mysql_fetch_array($q_kartu)) {
					if($dt_tipe['tipe']=='G'){
						$tipe = 'G';
					
					}else{
						$tipe = 'S';
						

					}
				}
		?>
		<tr>
			<td><?php echo $i;?></td>
			<?php if($kartu==""){
						if($tipe=='G'){?>
							<td><?php echo $dt['g_nama']; ?></td>
							<td><?php echo $dt['s_nama']; ?></td>
							<td><?php echo'-'?></td>
						<?php } else {?>
							<td><?php echo $dt['nama_anak']; ?></td>
							<td><?php echo '-';?></td>
							<td><?php echo $dt['kelas']; ?></td>
			<?php
							  }
				} ?>
			
			<td><i><?php echo $dt['waktu_transaksi'];?></i></td>
			<td align="right">
				<?php $total= $dt['total']+$total;
					echo  "Rp. ".number_format($dt['total'], 0, '', '.');?>
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
				<td colspan="5" align="right">Total Seluruh</td>
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

