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
<!-- Theme Stylesheet -->
<link rel="stylesheet" href="assets/css/dandelion.theme.css" media="screen"-->
<!-- Icon Stylesheet -->
<link rel="stylesheet" href="assets/css/fonts/glyphicons/style.css" media="screen">
<!--  Main Stylesheet -->
<link rel="stylesheet" href="assets/css/dandelion.css" media="screen">
<!-- Sistem Stylesheet -->
<link rel="stylesheet" href="sistem/css/style.css" media="screen">
<link rel="stylesheet" href="sistem/css/ade.css" media="screen">
<!-- Plugin Stylesheet -->
<link rel="stylesheet" href="assets/js/plugins/wizard/dandelion.wizard.css" media="screen">
<!-- Plugin Caraousel -->
<link rel="stylesheet" href="plugins/carousel/carousel.css" media="screen">

<!-- Plugin Alert -->
<link rel="stylesheet" href="plugins/alert/alert.css" media="screen">

<link rel="shortcut icon" href="favicon.png" />

<title>Smart Canteen &raquo; <?php if(defined('SUBPAGE')){ echo SUBPAGE; } elseif(defined('PAGE')) { echo PAGE; } else {echo 'Beranda'; } ?></title>

</head>

<body>

<div id="de-alert" class="de-bottom-right de-front">
</div>

<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
<div id="da-wrapper">
	
<!-- Header -->
<div id="da-header">
		
	<div id="da-header-top">
				
		<!-- Container -->
		<div class="da-container clearfix">
					
			<!-- Logo Container. All images put here will be vertically centere -->
			<div id="da-logo-wrap">
				<div id="da-logo">
					<div id="da-logo-img">
						<a href="beranda.php">
							<img src="assets/images/logo.png"/>
						</a>
					</div>
				</div>
			</div>
					
			<!-- Header Toolbar Menu -->
			<div id="da-header-toolbar" class="clearfix">
				<div id="da-user-profile-wrap">	
						<div id="da-user-info">
							<?php echo NAMA ?>
						</div>
					
				</div>
				<div id="da-header-button-container">
					<ul>
						<li class="da-header-button-wrap">
							<div class="da-header-button">
								<a href="logout.php"><i class="icon-power"></i></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
									
		</div>
	</div>
			
	<div id="da-header-bottom">
		<!-- Container -->
		<div class="da-container clearfix">					
			<!-- Breadcrumbs -->
			<div id="da-breadcrumb">
				<ul>
					<li
					<?php if(!defined('PAGE')) { echo ' class="active"'; } ?>>
					<?php if(LEVEL=="admin") {?>
						<a href="#"><i class="icon-home"></i> Beranda</a></li>
					<?php }else{ ?>
						<a href="#"><i class="icon-home"></i> Beranda</a></li>
					<?php } ?>
					<?php if(defined('PAGE')) { ?>
					<li
						<?php if(!defined('SUBPAGE')) { echo ' class="active"'; } ?>><a href="<?php echo PAGE_URL ?>"><i class="<?php echo PAGE_ICO ?>"></i> <?php echo PAGE ?></a></li>
					<?php } if(defined('SUBPAGE')) { ?>
					<li class="active"><a href="<?php echo SUBPAGE_URL ?>"><i class="<?php echo SUBPAGE_ICO ?>"></i> <?php echo SUBPAGE ?></a></li>
					<?php } ?>
				</ul>
			</div>
					
		</div>
	</div>
</div>
	
<!-- Content -->
<div id="da-content">
			
	<!-- Container -->
	<div class="da-container clearfix">
				
		<!-- Sidebar Separator do not remove -->
		<div id="da-sidebar-separator"></div>
				
		<!-- Sidebar -->
		<?php require_once 'sidebar.php' ?>
				
		<!-- Main Content Wrapper -->
		<div id="da-content-wrap" class="clearfix">
