<?php	
	error_reporting(E_WARNING | E_PARSE);
	$idResto = $_GET['id'];
	
	$sambung = mysql_connect('mysql.idhostinger.com','u926095240_ade','adeayu');
	mysql_select_db('u926095240_makan',$sambung);


	$queryResto	= mysql_query("SELECT * FROM adm_resto_menu where id_resto='".$idResto."'");
	
	$dMenu = array();
	
	while($dtMenu = mysql_fetch_array($queryResto)){
		$dMenu[] = array('id' => $dtMenu['menu_id'], 'nama' => $dtMenu['menu_nama'], 'harga' => $dtMenu['menu_harga']);
	}
		
	
	$hasil = array('restoMenus'=>$dMenu);
	echo json_encode($hasil);
	
	
	mysql_close($sambung);

?>