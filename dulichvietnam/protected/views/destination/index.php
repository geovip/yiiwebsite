<style type="text/css"> 
 
#map-container, #side-container, #side-container li {
  float: left;
}
 
#map-container {
  width: 685px;
  height: 600px;
}
 
#side-container {
  border: 1px solid #bbb;
  margin-right: 5px;
  padding: 2px 4px;
  text-align: right;
  width: 260px;
}

#dir-container {
  height: 525px;
  overflow: auto;
  padding: 2px 4px 2px 0;
}
#dir-container table {
  font-size: 1em;
  width: 100%;
}
#side-container li input { padding: 6px 5px; background-color: #fff; border: 1px solid #E5E3DF; margin-bottom: 5px;}
#side-container input{background-color: #678AC7;}
</style> 
<div id="side-container"> 
  <ul> 
    <li class="dir-label">From:</li> 
    <li><input id="from-input" type=text value="24 Le Dinh Duong, Da Nang"/></li> 
    <br clear="both"/> 
    <li class="dir-label">To:</li> 
    <li><input id="to-input" type=text value="305 Au Co, Da Nang"/></li> 
	<br clear="both"/> 
  </ul> 
  <input onclick="FindDirection.getDirections();" type=button value="Go!"/> 
  <div id="dir-container"></div> 
</div> 
<div id="map-container"></div> 
<div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>

<script type="text/javascript"> 
var FindDirection = {
  // HTML Nodes
  mapContainer: document.getElementById('map-container'),
  dirContainer: document.getElementById('dir-container'),
  fromInput: document.getElementById('from-input'),
  toInput: document.getElementById('to-input'),
 
  // API Objects
  dirService: new google.maps.DirectionsService(),
  dirRenderer: new google.maps.DirectionsRenderer(),
  map: null,
 
  showDirections: function(dirResult, dirStatus) {
    if (dirStatus != google.maps.DirectionsStatus.OK) {
      alert('Directions failed: ' + dirStatus);
      return;
    }
 
    // Show directions
    FindDirection.dirRenderer.setMap(FindDirection.map);
    FindDirection.dirRenderer.setPanel(FindDirection.dirContainer);
    FindDirection.dirRenderer.setDirections(dirResult);
  },
 
  getDirections: function() {
    var fromStr = FindDirection.fromInput.value;
    var toStr = FindDirection.toInput.value;
    var dirRequest = {
      origin: fromStr,
      destination: toStr,
      travelMode: google.maps.DirectionsTravelMode.DRIVING,
      unitSystem: google.maps.DirectionsUnitSystem.IMPERIAL,
      provideRouteAlternatives: true
    };
    FindDirection.dirService.route(dirRequest, FindDirection.showDirections);
  },
 
  init: function() {
    var latLng = new google.maps.LatLng(16, 108);
    FindDirection.map = new google.maps.Map(FindDirection.mapContainer, {
      zoom: 13,
      center: latLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
 
    // Show directions onload
    FindDirection.getDirections();
  }
};
 
// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', FindDirection.init);
var geocoder = new google.maps.Geocoder();  
</script> 
