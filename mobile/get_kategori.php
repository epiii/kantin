<?php

	$sambung = mysql_connect('mysql.idhostinger.com','u926095240_ade','adeayu');
	 mysql_select_db('u926095240_makan',$sambung);
	
	$query	= mysql_query("SELECT * FROM kategori");
	$i=0;
	$d = array();
	while($dt=mysql_fetch_array($query)) { 
		$d[] = array('id' => $dt['kategori_id'], 'nama' => $dt['kategori_nama']);
	}

	$hasil = array('kategoris'=>$d);
	echo json_encode($hasil);
	
	
	mysql_close($sambung);
?>