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
        var url= "<?php echo Yii::app()->createUrl('photo/detail/photo_id')?>"+"/"+photo_id+'/file_id/'+file_id;
       
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
            var url = "<?php echo Yii::app()->createUrl('photo/listmap')?>";
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
                <?php
					if(!empty($albums_comments)){
						$i=0;
						foreach($albums_comments as $album){
							$i++;
							$file_id= Photo::getPhoto($album->id)->file_id;
							$photo_name= File::getFile($file_id)->name;
							?>
                            <?php if($i==1 || $i==2){?>
								<div class="wrapper under">
							<?php } else { ?>
								<div class="wrapper">
							<?php } ?>
                                <figure class="left marg_right1">
                                    <a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>">
										<img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="116" height="116" />
									</a>
                                </figure>
        						<p class="pad_bot2"><strong><a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>"><?php echo $album->title;?></a></strong></p>
        						<p class="pad_bot2"><?php echo substr($album->description, 0, 54);?></p>
        						<a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>" class="marker_1"></a>
        					</div>
                            <?php 
						}
					}
				?>
				</div>
       		</article>
			<article class="col2 pad_left1">
				<h2>Popular Places</h2>
				<?php
					if(!empty($albums)){
						$i=0;
						foreach($albums as $album){
							$i++;
							$file_id= Photo::getPhoto($album->id)->file_id;
							$photo_name= File::getFile($file_id)->name;
							?>
							<?php if($i==1){?>
								<div class="wrapper under">
							<?php } else { ?>
								<div class="wrapper">
							<?php } ?>
								<figure class="left marg_right1">
									<a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id); ?>">
										<img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="246" height="195" />
									</a>
								</figure>
								<p class="pad_bot2"><strong><a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id); ?>"><?php echo $album->title;?></a></strong></p>
								<p class="pad_bot2"><?php echo $album->description;?></p>
								<a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>" class="marker_2"></a>
							</div>
						<?php 
						}
					}
				?>
       		</article>
	</section>

  
</body>
  