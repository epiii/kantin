(function($) {
	$(document).ready(function(e) {
		
		var oTable = $("table#da-ex-datatable-numberpaging").dataTable({
            "oLanguage": {
                "sUrl": "plugins/datatables/dataTables.indonesian.txt"
            },
            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
			"iDisplayLength": 5,
			sPaginationType: "full_numbers"
        });
        
        oTable.fnSort( [ [0,'asc'] ] );
   
		$("table#da-ex-datatable-default").dataTable();
	});
}) (jQuery);
