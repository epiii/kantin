<?php
	$postObj = json_decode(json_encode($_POST)); 
	
	$phpObj	= json_decode($postObj->{'json'});
	$userObj = $phpObj->{'user'};
	$userName 		= $userObj->{'userName'};
	$password 		= $userObj->{'password'};
	
	$sambung = mysql_connect('mysql.idhostinger.com','u926095240_ade','adeayu');
	mysql_select_db('u926095240_makan',$sambung);
	
	
	$query	= mysql_query("SELECT * FROM adm_login WHERE login_user='".$userName."' AND login_pass='".$password."'");
		
	if(mysql_fetch_array($query)) {
		echo "sukses";
	}else{
		echo "gagal";
	}
	
	
	
	mysql_close($sambung);
?>