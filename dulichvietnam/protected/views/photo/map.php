
<?php
//get title and description of photo
$photo= Photo::model()->getPhotoFile($photo_id);
?>
<div id="slider">
    <h2>Change Position</h2>
</div>
<div class="clr"></div>
<body onload="load()" onunload="GUnload()" >
<div class="body">
    <div class="body_resize">
        <div class="right">
        
            
                <div class="clr"></div>
                <form action="#" onsubmit="showAddress(this.address.value); return false">
                    <p>        
                        <input type="text" size="60" name="address" value="3 cit&eacute; Nollez Paris France" />
                        <input type="submit" value="Search!" />
                    </p>
                    
                </form>
                
                    <table  bgcolor="#FFFFCC" width="300">
                        <tr>
                            <td><b>Latitude</b></td>
                            <td><b>Longitude</b></td>
                        </tr>
                        <tr>
                            <td id="lat"></td>
                            <td id="lng"></td>
                        
                        </tr>
                    </table>
                <?php echo "Click on the map or drag the marker to place the photo over its position";?>
                <p>
                    <div align="center" id="map" style="width: 600px; height: 400px"><br/></div>
                </p>
              
                <form method="post" id="form-demo" action="<?php echo Yii::app()->request->baseUrl.'/?r=photo/position' ?>">
                    <ol>
                    
                        <li class="buttons">
                            <input type="button" onclick="saveposition();" value="Save Position" style="float: right;" />
                            <input id="photo" type="hidden" value="<?php echo $photo_id ?>" />
                            <input id="file" type="hidden" value="<?php echo $file_id ?>" />
                        </li>
                    </ol>
                    
                </form>
            <div class="clr"></div>
            
            
        </div>
        
        <div class="left">
            
        <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$file->name ?>" alt="picture" />
        
        </div>
        <div class="clr"></div>
    </div>
</div>
</body>
<head>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function saveposition(){
    
   var lat= jQuery('#lat').html();
   var lng= jQuery('#lng').html();
   var url= $('form-demo').get('action');
   var photo_id= jQuery('#photo').val();
   var file_id= jQuery('#file').val();
   
   new Request({
            url: url,
            method: "post",
            data:{
                'ajax': 'ajax',
                'photo_id': photo_id,
                'lat': lat,
                'lng': lng
            },
            onSuccess : function(responseHTML)
            {
                
                if(responseHTML > 0){
                    window.location.href= "<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='?>"+photo_id+'&file_id='+file_id;
                }
            		
            }
        }).send();
}
</script>
<script type="text/javascript">
var geocoder;
var map;
 function load() {
    
        var marker;
        var latlng;
        var lat= "<?php echo $photo->lat; ?>";
        var lng= "<?php echo $photo->lag;?>";
        var latlng;
        if(lat){
            latlng= new google.maps.LatLng(lat, lng);
        }
        else{
            latlng = new google.maps.LatLng(-34.397, 150.644);
        }
        
        var myOptions = {
          zoom: 8,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
          map:map,
          draggable:true,
          animation: google.maps.Animation.DROP,
          position: latlng
        });
        document.getElementById("lat").innerHTML = latlng.lat().toFixed(5);
        document.getElementById("lng").innerHTML = latlng.lng().toFixed(5);
        google.maps.event.addListener(marker, 'dragend', function(event){
            var point = marker.getPosition();
            map.panTo(point);
            document.getElementById("lat").innerHTML = point.lat().toFixed(5);
            document.getElementById("lng").innerHTML = point.lng().toFixed(5);
        });
    }
  
	   function showAddress(address) {
	       var myOptions = {
              zoom: 8,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
           var map = new google.maps.Map(document.getElementById("map"), myOptions);
           //add behin
           geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map, 
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    position: results[0].geometry.location
                });
                document.getElementById("lat").innerHTML = results[0].geometry.location.lat().toFixed(5);
                document.getElementById("lng").innerHTML = results[0].geometry.location.lng().toFixed(5);
                google.maps.event.addListener(marker, "dragend", function(event) {
                var pt = marker.getPosition();
                map.panTo(pt);
                document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
                document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
            });
              } else {
                alert("Geocode was not successful for the following reason: " + status);
              }
            });
           //add end
            }
    </script>
    </head>