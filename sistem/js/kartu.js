function getSerialNumber() {
	var serialNumberKartu = "error";
	alert('ayo');
	if('WebSocket' in window){
	  var ws = new WebSocket('ws://localhost:7676/service');
	  ws.onopen = function () {
		//alert('connected');
	  };
	  ws.onmessage = function (evt) {  
		serialNumberKartu = evt.data;
		alert('reveived data:'+evt.data);
		return serialNumberKartu;
	  };
	  ws.onclose = function () {
		//alert('socket closed');
	  };
	}
}