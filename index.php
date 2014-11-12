<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen">
<!--  Fluid Grid System -->
<link rel="stylesheet" href="assets/css/fluid.css" media="screen">
<!-- Login Stylesheet -->
<link rel="stylesheet" href="assets/css/form.css" media="screen">
<link rel="stylesheet" href="assets/css/login.css" media="screen">
<link rel="stylesheet" href="plugins/zocial/zocial.css" media="screen">

<link rel="shortcut icon" href="favicon.png" />

<title>Smart Canteen &laquo; Login</title>

</head>

<body>

	<div id="da-home-wrap">
		<div id="da-home-wrap-inner">
			<div id="da-home-inner">
				<div id="da-home-box">
					<div id="da-home-box-header">
						<span class="da-home-box-title"></span>
					</div>

					<?php 
						if(isset($_GET['m']) && $_GET['m']=="salah") { 
					?>
					<div class="da-message error">
						Nama pengguna / kata sandi salah
					</div>
					<br/>
					<?php 
					} elseif(isset($_GET['m']) && $_GET['m']=="logout") {
					 ?>
					<div class="da-message success">
						Anda berhasil keluar dari aplikasi
					</div>
					<br/>
					<?php } ?>

					<form class="da-form da-home-form" method="post" action="login.php">
						<div class="da-form-row">
							<div class="da-home-form-big">
								<input type="text" name="username" id="da-login-username" placeholder="Nama Pengguna">
							</div>
							<div class=" da-home-form-big">
								<input type="password" name="password" id="da-login-password" placeholder="Kata Sandi">
							</div>
						</div>

						<div class="da-home-form-btn-big">
							<input type="submit" name="submit" value="Masuk" id="da-login-submit" class="btn btn-danger btn-block">
						</div>
					</form><br><br>
					   <p><strong><a href="http://192.168.10.166/kantin_web/report.php">LIHAT TRANSAKSI HARI INI </a></strong></p>
				</div>
			</div>
		</div>
	</div>
	<div id="dialog-registrasi" style="display:none;">
		<div id="berkas-registrasi"></div>
	</div>

	<!-- JS Libs -->
	<script src="assets/js/libs/jquery-1.8.3.min.js"></script>
	<script src="assets/js/libs/jquery.placeholder.min.js"></script>
	<script src="plugins/validate/jquery.validate.min.js"></script>
	<script src="plugins/validate/messages_id.js"></script>
	<!-- jQuery-UI JavaScript Files -->
	<script src="assets/jui/js/jquery-ui-1.9.2.min.js"></script>
	<script src="assets/jui/jquery.ui.touch-punch.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/jui/css/jquery.ui.all.css" media="screen">
	<!--- js system -->
	<script src="sistem/js/registrasi.js"></script>
	
	<!-- JS Login -->
	<script src="assets/js/core/dandelion.login.js"></script>

</body>
</html>
