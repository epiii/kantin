<style type="text/css">

<!--
body {
	background-color: #f0f0f0;
}
.style2 {	font-family: "Courier New", Courier, mono;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>
<meta http-equiv="refresh" content="10" >
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<marquee>halo ms..</marquee>
 <script language="javascript" type='text/javascript'>
 
function validasi(){
 

	var name = document.getElementById('name');
	var no = document.getElementById('no');


 
	if(madeSelection(name, "Nama harus di pilih")){ 
	if(madeSelection(no, "Silahkan Pilih Jumlah data yang ingin di tampilkan")){ 




			                            return true;
                        }
                    }


    return false;
 }

function madeSelection(elem, helperMsg){
    if(elem.value == "- Select -"){
        alert(helperMsg);
        elem.focus();
        return false;
    }else{
        return true;
    }
}


function madeSelection(elem, helperMsg){
    if(elem.value == "- Select -"){
        alert(helperMsg);
        elem.focus();
        return false;
    }else{
        return true;
    }
}




</script>
<p>
</p>
<table width="350" align="center">
  <tr bgcolor="#81ACED">
    <td colspan="2"><div align="center">
        <p><strong>SIMPAN LAPORAN TRANSAKSI </strong><strong>KE EXCEL</strong></p>
    </div></td>
  </tr>
  <tr bgcolor="#FCC7CB">
    <td width="170" height="61" bgcolor="#B6CBF3"><div align="center">
      <form name="form1" method="post" action="excelguru.php">
        <input name="button-ok" type="submit" class="button" id="simpan" value="TRANSAKSI GURU" style="height: 40px; width: 170px" onclick="cekForm()" />
            </form>
    </div>
      <div align="center">
    </div></td>
    <td width="188" bgcolor="#B6CBF3"><div align="center">
      <form name="form2" method="post" action="excelsiswa.php">
        <input name="button-ok" type="submit" class="button" id="simpan" value="TRANSAKSI SISWA" style="height: 40px; width: 170px" onClick="cekForm()" />
                  </form>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="excel.php" method="post" name="biodataform" id="biodataform" onsubmit='return validasi()'>
  <table width="350" border="0" align="center">
    <tr bgcolor="#A9DEB7">
      <td colspan="4"><div align="center"><strong>TRANSAKSI HARI INI </strong></div></td>
    </tr>
    <tr bgcolor="#DCF1E2">
      <td width="96"><div align="center"><strong>GURU</strong></div></td>
      <td width="14"><div align="center"><strong>:</strong></div></td>
      <td width="76"><?php

include 'koneksi.php';

$perintah="select kartu.tipe,kartu.id,t_kantin.tgl_transaksi
from t_kantin, kartu
where kartu.id = t_kantin.kartu AND tipe ='G'  AND DATE(t_kantin.tgl_transaksi) = DATE(NOW())";
$hasil=mysql_query($perintah) or die(mysql_error());
$jml_bris = mysql_num_rows($hasil);
echo $jml_bris ;

?>          
        <div align="center"></div>
      <div align="center"></div></td>
      <td width="180"><div align="left">
        <?php $query="SELECT  SUM(t_kantin.total)
FROM t_kantin left join kartu on t_kantin.kartu = kartu.id
where kartu.tipe='G' AND t_kantin.tgl_transaksi=date(now())";
$perintah=mysql_query($query);
$total=0;
while($hasil=mysql_fetch_array($perintah)){
$total=$total+$hasil['0'];
}
echo "Rp. $total "; ?>
</div></td>
    </tr>
    <tr bgcolor="#DCF1E2">
      <td><div align="center"><strong>SISWA</strong></div></td>
      <td><div align="center"><strong>:</strong></div></td>
      <td><?php
$perintah="select kartu.tipe,kartu.id,t_kantin.tgl_transaksi
from t_kantin, kartu
where kartu.id = t_kantin.kartu AND tipe ='S'  AND DATE(t_kantin.tgl_transaksi) = DATE(NOW())";
$hasil=mysql_query($perintah) or die(mysql_error());
$jml_bris = mysql_num_rows($hasil);
echo $jml_bris ;
?>          
      <div align="center"></div></td>
      <td><div align="left">
        <?php $query="SELECT  SUM(t_kantin.total)
FROM t_kantin left join kartu on t_kantin.kartu = kartu.id
where kartu.tipe='S' AND t_kantin.tgl_transaksi=date(now())";
$perintah=mysql_query($query);
$total=0;
while($hasil=mysql_fetch_array($perintah)){
$total=$total+$hasil['0'];
}
echo "Rp. $total "; ?>
</div></td>
    </tr>
    <tr bgcolor="#DCF1E2">
      <td><div align="center"><strong>TOTAL</strong></div></td>
      <td><div align="center"><strong>:</strong></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<table width="350" border="0" align="center">
  <tr bgcolor="#F3BC85">
    <td colspan="2"><div align="center"><strong>LIHAT SEMUA DATA TRANSAKSI </strong></div></td>
  </tr>
  <tr>
    <td width="190" bgcolor="#F3BC85"><div align="center">
      <input name="button-ok" type="submit" class="button" id="simpan" value="TRANSAKSI GURU" style="height: 40px; width: 170px" onclick="location.href='t_guru.php'" />
    </div></td>
    <td width="197" bgcolor="#F3BC85"><div align="center">
      <input name="button-ok" type="submit" class="button" id="simpan" value="TRANSAKSI SISWA" style="height: 40px; width: 170px" onclick="location.href='t_siswa.php'" />
    </div></td>
  </tr>
</table>
<p align="center"><span class="style2">
  <input name="button-ok" type="submit" class="button" id="simpan" value="KELUAR" style="height: 40px; width: 170px" onclick="goBack()" />
</span></p>
<p align="center">&nbsp;</p>
