			</div>		
		</div>
	</div>

	<!-- Footer -->
	<div id="da-footer">
		<div class="da-container clearfix">
			<p>Copyright 2013. Elyon.
		</div>
	</div>

</div>

<!-- printer -->
<script src="sistem/js/printer.js"></script>

<!-- number -->
<script src="sistem/js/number.js"></script>

<!-- JS Libs -->
<script src="assets/js/libs/jquery-1.8.3.min.js"></script>
<script src="assets/js/libs/jquery.placeholder.min.js"></script>
<script src="assets/js/libs/jquery.mousewheel.min.js"></script>

<!-- JS Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script src="assets/jui/js/jquery-ui-1.9.2.min.js"></script>
<script src="assets/jui/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/jui/css/jquery.ui.all.css" media="screen">

<!-- prettyPhoto Plugin -->
<script src="plugins/prettyphoto/js/jquery.prettyPhoto.min.js"></script>
<link rel="stylesheet" href="plugins/prettyphoto/css/prettyPhoto.css" media="screen">


<!-- Fullcalendar Plugin -->
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="plugins/fullcalendar/gcal.js"></script>
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.css" media="screen">
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">

<!-- JS Plugins -->
<!-- Select2 Plugin -->
<script src="plugins/select2/select2.js"></script>
<link rel="stylesheet" href="plugins/select2/select2.css" media="screen">

<!-- Validation Plugin -->
<script src="plugins/validate/jquery.validate.min.js"></script>
<script src="plugins/validate/messages_id.js"></script>

<!-- DataTables Plugin -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>


<!-- PrintArea Plugin -->
<script src="plugins/printarea/jquery.PrintArea.js_4.js"></script>

<!-- Flot Plugin -->
<!--[if lt IE 9]>
<script src="assets/js/libs/excanvas.min.js"></script>
<![endif]-->
<script src="plugins/flot/jquery.flot.min.js"></script>
<script src="plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
<script src="plugins/flot/plugins/jquery.flot.resize.min.js"></script>


<!-- JS Bootstrap Alert -->
<script src="plugins/alert/alerts.js"></script>

<!--------- ade ------------------------------------>
<script src="sistem/js/ade.js"></script>




<!-- JS Application -->
<?php if(!defined('PAGE')) { ?>
<script src="sistem/js/beranda.js"></script>
<?php } if(defined('PAGE') && file_exists("sistem/js/".strtolower(str_replace(' ','_',PAGE)).".js")) { ?>
<script src="sistem/js/<?php echo strtolower(str_replace(' ','_',PAGE)) ?>.js"></script>
<?php } if(defined('SUBPAGE') && file_exists("sistem/js/".strtolower(str_replace(' ','_',SUBPAGE)).".js")) { ?>
<script src="sistem/js/<?php echo strtolower(str_replace(' ','_',SUBPAGE)) ?>.js"></script>
<?php } ?>

<?php if(defined('PAGE') && file_exists("sistem/js/crud_".strtolower(str_replace(' ','_',PAGE)).".js")) { ?>
<script src="sistem/js/crud_<?php echo strtolower(str_replace(' ','_',PAGE)) ?>.js"></script>
<?php } if(defined('SUBPAGE') && file_exists("sistem/js/crud_".strtolower(str_replace(' ','_',SUBPAGE)).".js")) { ?>
<script src="sistem/js/crud_<?php echo strtolower(str_replace(' ','_',SUBPAGE)) ?>.js"></script>
<?php } ?>

<!-- JS Template -->
<script src="assets/js/core/dandelion.core.js"></script>

<!--caraousel-->
<script src="plugins/carousel/carousel.js"></script>

<!-- system -->
<script src="sistem/js/paging.js"></script>

<!-- system -->
<script src="sistem/js/alert.js"></script>
</body>
</html>
