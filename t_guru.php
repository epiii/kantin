<!DOCTYPE html>
<html>
    <head>
        <title>TRANSAKSI GURU</title>   
		<script>
function goBack()
  {
  window.history.back()
  }
</script>     
        <link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="shortcut icon" href="media/images/favicon.ico"> 
        <style type="text/css">
            @import "media/css/demo_table_jui.css";
            @import "media/themes/overcast/jquery-ui.css";
        body {
	background-color: #999999;
}
        .style1 {
	color: #EBEBEB;
	font-weight: bold;
}
        .style2 {
	font-family: "Courier New", Courier, mono;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}
        .style3 {font-size: 75%; }
        .style4 {
	color: #FFFFFF;
	font-weight: bold;
}
        .style5 {
	color: #660000;
	font-weight: bold;
}
        </style>      

        <script src="media/js/jquery.js"></script>
        <script src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $('#datatables').dataTable({
					     "oLanguage": {
						      "sLengthMenu": "Tampilkan _MENU_ data per halaman",
						      "sSearch": "Pencarian: ", 
						      "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
						      "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ Transaksi Guru",
						      "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 Data ",
						      "sInfoFiltered": "(di filter dari _MAX_ total Data Transaksi Guru)",
						      "oPaginate": {
						          "sFirst": "<<",
						          "sLast": ">>", 
						          "sPrevious": "<", 
						          "sNext": ">"
					       }
				      },
              "sPaginationType":"full_numbers",
              "bJQueryUI":true
            });
          })    
        </script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
    <body>
    <div align="center">
      <p class="style1"></p>
      <p class="style4">.:: DATA TRANSAKSI GURU ::. </p>
      <table width="50%" class="display" id="datatables">
        <thead>
          <tr>
            <th width="2%" class="style3"><div align="left">No</div></th>
			<th width="19%" class="style3"><div align="center">ID Kartu</div></th>
            <th width="31%" class="style3"><div align="center">Nama</div></th>
            <th width="20%" class="style3"><div align="center">Tanggal Transaksi</div></th>
            <th width="13%" class="style3"><div align="center">Status</div></th>
			<th width="15%" class="style3"><div align="center">Saldo Saat Ini</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
                    require("koneksi.php");
										          $sql = mysql_query("select kartu.id,guru.nama,t_kantin.tgl_transaksi,guru.status,kartu.saldo,kartu.tipe
from t_kantin,kartu left join guru on kartu.guru = guru.id 
where kartu.id = t_kantin.kartu AND tipe ='G' 
order by t_kantin.tgl_transaksi desc");
					          $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                      echo "<tr>
                            <td width=40>$no</td>
							 <td><div align='center'>$r[0]</div></td>
                            <td>$r[1]</td>
                            <td><div align='center'>$r[2]</div></td>
							<td><div align='center'>$r[3]</div></td>
							<td>$r[4]</td>																
							</tr>";
                      $no++;
                    }                    
                    ?>
        </tbody>
      </table>
      <p align="left" class="style5">Keterangan Status : 1. Kontrak 2. Tetap       </p>
      <p class="style2">
        <input name="button-ok" type="submit" class="button" id="simpan" value="KEMBALI" style="height: 40px; width: 170px" onclick="goBack()" />
      </p>
    </div>
    </body>
</html>
