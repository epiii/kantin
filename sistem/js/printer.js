	function printHTML(documentHtml, callBack) {
		var applet = document.jzebra;
		if (applet != null) {
			//alert("ade");
		    applet.findPrinter("\\{dummy printer name for listing\\}");
		    while (!applet.isDoneFinding()) {
				// Wait
		    }
		    // Sample only: If a PDF printer isn't installed, try the Microsoft XPS Document
		    // Writer.  Replace this with your printer name.
		    var printers = applet.getPrinters().split(",");
		    for (i in printers) {
				if (printers[i].indexOf("Microsoft XPS") != -1 || printers[i].indexOf("PDF") != -1) {
				   applet.setPrinter(i);      
				}	       
		    }
		   
		    // No suitable printer found, exit
			if (applet.getPrinter() == null) {
				alert("Could not find a suitable printer for an HTML document");
			    return;
			}
			
			// Append our image (only one image can be appended per print)
			applet.appendHTML(documentHtml);
		}
		// Very important for html, uses printHTML() instead of print()
		// *Note:  monitorAppending3() still works but is too complicated and
		// outdated.  Instead create a JavaScript  function called 
		// "jzebraDoneAppending()" and handle your next steps there.
		monitorAppending3(callBack);
	}

function monitorAppending3(callBack) {
	//alert("nilai submit : "+submit);
	var applet = document.jzebra;
	if (applet != null) {
	    if (!applet.isDoneAppending()) {
			window.setTimeout(function(){
				monitorAppending3(callBack)
			}, 100);
	    } else {
			applet.printHTML(); // Don't print until all of the image data has been appended
			// *Note:  monitorPrinting() still works but is too complicated and
			// outdated.  Instead create a JavaScript  function called 
			// "jzebraDonePrinting()" and handle your next steps there.
			monitorPrinting(callBack);
	    }
	}else{
		alert("Applet not loaded!");
    }
}

function monitorPrinting(callBack) {
	var applet = document.jzebra;
	if (applet != null) {
	   if (!applet.isDonePrinting()) {
	      window.setTimeout(function(){monitorPrinting(callBack)}, 100);
	   } else {
	      var e = applet.getException();
	      //alert(e == null ? "Printed Successfully" : "Exception occured: " + e.getLocalizedMessage());
	   
		  if (typeof callBack === "function") {
			callBack();
		  }
		  
			//return submit;
	   }
	}else{
            alert("Applet not loaded!");
    }
}