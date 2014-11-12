<?php

	$sambung = mysql_connect('mysql.idhostinger.com','u926095240_ade','adeayu');
	 mysql_select_db('u926095240_makan',$sambung);
	
	$postObj = json_decode(json_encode($_POST)); 
	
	$phpObj	= json_decode($postObj->{'json'});
	$userObj = $phpObj->{'user'};
	$namaLengkap 	= $userObj->{'namaLengkap'};
	$userName 		= $userObj->{'userName'};
	$alamatEmail 	= $userObj->{'alamatEmail'};
	$password 		= $userObj->{'password'};
	
	echo $userName;
	
	$sql = "insert into adm_login (login_nama,login_user,login_pass,login_email) values ('".$namaLengkap."','".$userName."','".$password."','".$alamatEmail."')";
	$Qrs = mysql_query($sql);
?>