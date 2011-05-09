<h1>Create Place</h1>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript"> 
  var geocoder;
  $(document).ready(function(){
      $('#Place_address').change(function(){
            var address = jQuery(this).val();
            geocoder = new google.maps.Geocoder();   
            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {  
                 var location = new String(results[0].geometry.location);                 
                 var latlngStr = location.split(",",2);
                 var lat = parseFloat(latlngStr[0].substring(1));
                 var lng = parseFloat(latlngStr[1]);
                 $('#Place_lat').val(lat);
                 $('#Place_long').val(lng);
              } else {
                alert("Geocode was not successful for the following reason: " + status);
              }
            });
        });
  });  

</script> 
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>