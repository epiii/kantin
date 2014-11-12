<?php	
	error_reporting(E_WARNING | E_PARSE);
	$group = $_GET['group'];
	$id = urldecode($_GET['id']);
	
	$sambung = mysql_connect('mysql.idhostinger.com','u926095240_ade','adeayu');
	mysql_select_db('u926095240_makan',$sambung);

	if($group=="alamat"){
		if($id==""){
			$query	= mysql_query("SELECT * FROM adm_resto GROUP BY resto_alamat");
		}else{
			$query	= mysql_query("SELECT * FROM adm_resto WHERE resto_alamat = '".$id."'");
		}
	}else if($group=="kategori"){
		$query	= mysql_query("SELECT * FROM adm_resto WHERE resto_kategori='".$id."'");
	}else if($group=="1"){
		$query	= mysql_query("SELECT * FROM adm_resto WHERE resto_id='".$id."'");
	}else if($group=="all"){
		$query	= mysql_query("SELECT * FROM adm_resto");
	}
	
	$dResto = array();
	
	while($dt=mysql_fetch_array($query)) { 
		
		$idResto = $dt['resto_id'];
		
		$queryResto	= mysql_query("SELECT * FROM adm_resto_menu where id_resto='".$idResto."'");
		
		$dMenu = array();
		
		while($dtMenu = mysql_fetch_array($queryResto)){
			$dMenu[] = array('id' => $dtMenu['menu_id'], 'nama' => $dtMenu['menu_nama'], 'harga' => $dtMenu['menu_harga']);
		}
		
		$dResto[] = array('id' => $idResto, 'nama' => $dt['resto_nama'], 'alamat' => $dt['resto_alamat'], 'latitude' => $dt['resto_lat'], 'longitude' => $dt['resto_long'], 'restoMenus' => $dMenu);
	}

	$hasil = array('restos'=>$dResto);
	echo json_encode($hasil);
	
	
	mysql_close($sambung);

?>