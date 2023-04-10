function initXMLhttp() {

	var xmlhttp;
	if (window.XMLHttpRequest) {
		//code for IE7,firefox chrome and above
		xmlhttp = new XMLHttpRequest();
	} else {
		//code for Internet Explorer
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	return xmlhttp;
}

function minAjax(config) {

	/*Config Structure
	 url:"reqesting URL"
	 type:"GET or POST"
	 method: "(OPTIONAL) True for async and False for Non-async | By default its Async"
	 data: "(OPTIONAL) another Nested Object which should contains reqested Properties in form of Object Properties"
	 success: "(OPTIONAL) Callback function to process after response | function(data,status)"
	 */

	if (!config.url) {
		return;
	}

	if (!config.type) {
		return;
	}

	if (!config.method) {
		config.method = true;
	}

	var xmlhttp = initXMLhttp();

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if (xmlhttp.status == 200) {
				if (config.success) {
					config.success(xmlhttp.responseText, xmlhttp.readyState);
				}
			} else {
				if (config.failure) {
					config.failure(xmlhttp.status, xmlhttp.readyState);
				}
			}
		}
	};

	var sendString = [], sendData = config.data;
	if ( typeof sendData === "string") {
		var tmpArr = String.prototype.split.call(sendData, '&');
		for (var i = 0, j = tmpArr.length; i < j; i++) {
			var datum = tmpArr[i].split('=');
			sendString.push(encodeURIComponent(datum[0]) + "=" + encodeURIComponent(datum[1]));
		}
	} else if ( typeof sendData === 'object' && !( sendData instanceof String )) {
		for (var k in sendData) {
			var datum = sendData[k];
			if (Object.prototype.toString.call(datum) == "[object Array]") {
				for (var i = 0, j = datum.length; i < j; i++) {
					sendString.push(encodeURIComponent(k) + "[]=" + encodeURIComponent(datum[i]));
				}
			} else {
				sendString.push(encodeURIComponent(k) + "=" + encodeURIComponent(datum));
			}
		}
	}
	sendString = sendString.join('&');

	if (config.type == "GET") {
		xmlhttp.open("GET", config.url + "?" + sendString, config.method);
		xmlhttp.send();
	}
	if (config.type == "POST") {
		xmlhttp.open("POST", config.url, config.method);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(sendString);
	}
}

/*
 minAjax({
 url:"test.php",//request URL
 type:"POST",//Request type GET/POST
 //Send Data in form of GET/POST
 data:{
 name:"Superman",
 secretname:"Clark Kent",
 profession:"reporter",
 worth:"poor",
 company:"Daily Planet"
 },
 method:"true",
 debugLog:"true",
 //CALLBACK FUNCTION with RESPONSE as argument
 success: function(data){
 alert(data);
 }

 });
 */