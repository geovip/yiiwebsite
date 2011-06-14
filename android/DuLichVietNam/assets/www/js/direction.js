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
 
     $(function() {
         $("#from-input,#to-input").autocomplete({
         
           source: function(request, response) {
 
          if (geocoder == null){
           geocoder = new google.maps.Geocoder();
          }
             geocoder.geocode( {'address': request.term }, function(results, status) {
               if (status == google.maps.GeocoderStatus.OK) {
 
                  var searchLoc = results[0].geometry.location;
               var lat = results[0].geometry.location.lat();
                  var lng = results[0].geometry.location.lng();
                  var latlng = new google.maps.LatLng(lat, lng);
                  var bounds = results[0].geometry.bounds;
 
                  geocoder.geocode({'latLng': latlng}, function(results1, status1) {
                      if (status1 == google.maps.GeocoderStatus.OK) {
                        if (results1[1]) {
                         response($.map(results1, function(loc) {
                        return {
                            label  : loc.formatted_address,
                            value  : loc.formatted_address,
                            bounds   : loc.geometry.bounds
                          }
                        }));
                        }
                      }
                    });
            }
              });
           },
           select: function(event,ui){
      var pos = ui.item.position;
      var lct = ui.item.locType;
      var bounds = ui.item.bounds;
 
      if (bounds){
       FindDirection.map.fitBounds(bounds);
      }
           }
         });
     });   