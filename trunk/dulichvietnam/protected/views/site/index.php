   <head>
   
   <script type="text/javascript">
var geocoder;
var map;
function createMarker(point, photo_id, file_id, name) {
    var icon = new google.maps.MarkerImage("<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'?>"+name, null, null, new google.maps.Point(0, 0), new google.maps.Size(20, 20));
   
    var marker = new google.maps.Marker({
          map:map,
          icon: icon,
          //draggable:true,
          //animation: google.maps.Animation.DROP,
          position: point
        });
    
    google.maps.event.addListener(marker, "click", function() {
        var imag="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'?>"+name;
        var url= "<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='?>"+photo_id+'&file_id='+file_id;
       
        var infowindow = new google.maps.InfoWindow(
          { 
            content: '<a href="'+url+'"><img src="'+imag+'" alt="'+name+'" /></a>',
            
          });
        infowindow.open(map, marker);
    });
    return marker;
}
 function load() {
    
        var marker;
        var latlng = new google.maps.LatLng(15.8244, 107.951);
        
        var myOptions = {
          zoom: 8,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        var marker = new google.maps.Marker({
              map:map,
              
              //draggable:true,
              animation: google.maps.Animation.DROP,
              position: latlng
            });
            
        //add makers load from database
        var allphotos= "<?php echo $photos;?>";
        var photo_spl= allphotos.split("|");
        var len= photo_spl.length;
        for (var i = 0; i < len; i++) {
            var file= photo_spl[i].split(",");
            var photo_id= file[0];
            var file_id= file[1];
            var name= file[2];
            var lat= file[3];
            var lng= file[4];
            
            var point = new google.maps.LatLng(lat, lng);
            createMarker(point, photo_id, file_id, name);
        }
        
        google.maps.event.addListener(marker, 'dragend', function(event){
            var point = marker.getPosition();
            map.panTo(point);
            
        });
        google.maps.event.addListener(map, 'dragend', function() {
            
            var center = map.getCenter();
            var lat= center.lat().toFixed(5);
            var lng= center.lng().toFixed(5);
            var url = "<?php echo Yii::app()->request->baseUrl ?>/?r=photo/listmap";
            new Request({
                url: url,
                method: "post",
               data:{
                    'ajax': 'ajax',
                    'lat': lat,
                    'lng': lng
                },
                onSuccess : function(responseHTML)
                {
                    
                    if(responseHTML){
                        var allphotos= responseHTML;
                        var photo_spl= allphotos.split("|");
                        var len= photo_spl.length;
                        for (var i = 0; i < len; i++) {
                            var file= photo_spl[i].split(",");
                            var photo_id= file[0];
                            var file_id= file[1];
                            var name= file[2];
                            var lat= file[3];
                            var lng= file[4];
                            
                            var point = new google.maps.LatLng(lat, lng);
                            createMarker(point, photo_id, file_id, name);
                        }
                    }
                		
                }
            }).send();
            
        });
    }
    
	  
    </script>
   </head>
<body onload="load()" onunload="GUnload()" >
	<div align="center" id="map" style="width: 100%; height: 400px"><br/></div>
	<section id="content">
			<article class="col1">
				<h3>Hot Travel</h3>
				<div class="pad">
					<div class="wrapper under">
						<figure class="left marg_right1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/page1_img1.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Italy<br>Holidays</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
					<div class="wrapper under">
						<figure class="left marg_right1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/page1_img2.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Philippines<br>Travel</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
					<div class="wrapper">
						<figure class="left marg_right1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/page1_img3.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Cruise<br>Holidays</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
				</div>
       		</article>
			<article class="col2 pad_left1">
				<h2>Popular Places</h2>
				<div class="wrapper under">
					<figure class="left marg_right1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/page1_img4.jpg" alt=""></figure>
					<p class="pad_bot2"><strong>Hotel du Havre</strong></p>
					<p class="pad_bot2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
					<p class="pad_bot2"><strong>Nemo enim ipsam voluptatem</strong> quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</p>
					<a href="#" class="marker_2"></a>
				</div>
				<div class="wrapper">
					<figure class="left marg_right1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/page1_img5.jpg" alt=""></figure>
					<p class="pad_bot2"><strong>Hotel Vacance</strong></p>
					<p class="pad_bot2">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>
					<p class="pad_bot2">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda.</p>
					<a href="#" class="marker_2"></a>
				</div>
       		</article>
	</section>

  
</body>
  