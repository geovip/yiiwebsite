<?php
include_once('Constants.php');
include_once('Address.php');
include_once 'service_config.php';
$config_ser =  new service_config();
if(!isset($default_location_id))
	$default_location_id =$config_ser->getConfig('DEFAULT_LOCATION_ID');
$dbh = new PDO(Contants::$url,Contants::$userName,Contants::$password);
$default_location =null;
if(isset($default_location_id)){
	$stmt = $dbh->prepare("select * from address where id=:id");
	$stmt->bindParam(':id',$default_location_id);
	$stmt->execute();
	$result=$stmt->fetchAll();
	foreach ($result as $row){
		$default_location = new Address();
		$default_location->x=$row['x'];
		$default_location->y=$row['y'];
	}
}
$dbh =null;
if(!isset($default_zoom))
	$default_zoom= $config_ser->getConfig('DEFAULT_ZOOM');
header('Content-type: text/html; charset=utf-8');
?><html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript"
	src="http://maps.google.com/maps/api/js?sensor=true&language=vi"></script>
<script type="text/javascript">
  var directionsDisplay = new google.maps.DirectionsRenderer();
  var directionsService = new google.maps.DirectionsService();
  var geocoder = new google.maps.Geocoder();
  var map ;
  function initialize() {
	<?php
	$init_gmap_script="
    var latlng = new google.maps.LatLng($default_location->x, $default_location->y);
    var myOptions = {
      zoom: $default_zoom,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };";
	echo $init_gmap_script;
    ?>
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("directionsPanel"));
	if(window.initLeftFormJS && typeof window.initLeftFormJS == 'function')
		initLeftFormJS();
<?php 
if(isset($address_list)){
	$count_address =0;
	foreach ( $address_list as $address){
	$str_script =
	"	var marker$count_address = new google.maps.Marker({
		map: map, 
	    position: new google.maps.LatLng($address->x , $address->y),
	    icon: \"$address->IconPath\"
	});
	var infowindow$count_address = new google.maps.InfoWindow({
        content: \"$address->Name\" 
    });
    google.maps.event.addListener(marker$count_address, 'click', function() {
      infowindow$count_address.open(map,marker$count_address);
    });";
	$count_address = $count_address+1;
	echo $str_script;
	}
}
?>
  }
  function setCenter(lat,lng){
	  map.setCenter(new google.maps.LatLng(lat,lng));
  }
  function findPath(){
  var start =new google.maps.LatLng(10.757546938876876, 106.64914314270021);
  var end   =new google.maps.LatLng(10.752909177570654, 106.67283241271974);
  end = new google.maps.LatLng(10.951165256099605, 106.99491044189453);
  var request = {
    origin:start, 
    destination:end,
    travelMode: google.maps.DirectionsTravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
	    if (status == google.maps.DirectionsStatus.OK) {
	      directionsDisplay.setDirections(response);
		}
	});
  }

</script>
</head>
<body onload="initialize()">
<div style="min-width: 1024px; min-height: 800px">
<div style="float: left; min-width: 150px; width: 15%">
<?php 
	if($template_left_form_include){
		include_once($template_left_form_include);
	}else{
		echo $template_left_form;
	}
?>
<?php
if($address_list){
	foreach ( $address_list as $address){
		echo "<div>
				<a href=\"javascript:setCenter($address->x,$address->y);\">$address->Name</a><br/>
				$address->FullAddress
			  </div>";
	} 
}
?>
</div>
<div id="map_canvas"
	style="float: left; min-width: 800px; min-height: 800px; width: 85%"></div>
</div>
</body>
</html>
