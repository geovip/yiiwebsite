    var deviceInfo = function(){      
      document.getElementById("platform").innerHTML = device.platform;
      document.getElementById("version").innerHTML = device.version;
      document.getElementById("uuid").innerHTML = device.uuid;
      document.getElementById("name").innerHTML = device.name;
      document.getElementById("width").innerHTML = screen.width;
      document.getElementById("height").innerHTML = screen.height;
      document.getElementById("colorDepth").innerHTML = screen.colorDepth;      
    };
   
    function onDeviceReady() {
        navigator.geolocation.getCurrentPosition(onSuccess, onError,{ enableHighAccuracy: true });
    }

    // onSuccess Geolocation
    //
    function onSuccess(position) {
        var element = document.getElementById('geolocation');
        element.innerHTML = 'Latitude: '           + position.coords.latitude              + '<br />' +
                            'Longitude: '          + position.coords.longitude             + '<br />' +
                            'Altitude: '           + position.coords.altitude              + '<br />' +
                            'Accuracy: '           + position.coords.accuracy              + '<br />' +
                            'Altitude Accuracy: '  + position.coords.altitudeAccuracy      + '<br />' +
                            'Heading: '            + position.coords.heading               + '<br />' +
                            'Speed: '              + position.coords.speed                 + '<br />' +
                            'Timestamp: '          + new Date(position.timestamp)          + '<br />';
    }

    // onError Callback receives a PositionError object
    //
    function onError(error) {
        alert('code: '    + error.code    + '\n' +
              'message: ' + error.message + '\n');
    }
       
	var preventBehavior = function(e) { 
      e.preventDefault(); 
    };

    function show_pic()
    {
      var viewport = document.getElementById('viewport');
      viewport.style.display = "";
      navigator.camera.getPicture(dump_pic, fail, { quality: 50 }); 
    }

    function dump_pic(data)
    {
      var viewport = document.getElementById('viewport');
      console.log(data);
      viewport.style.display = "";
      viewport.style.position = "absolute";
      viewport.style.top = "10px";
      viewport.style.left = "10px";
      document.getElementById("test_img").src = "data:image/jpeg;base64," + data;
    }

    function close()
    {
      var viewport = document.getElementById('viewport');
      viewport.style.position = "relative";
      viewport.style.display = "none";
    }

    function fail(fail)
    {
      alert(fail);
    }

  	  	
	function init(){
		document.addEventListener("deviceready", deviceInfo, true);		
		document.addEventListener("deviceready", onDeviceReady, false);
	}	
