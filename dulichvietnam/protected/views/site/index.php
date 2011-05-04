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


   <div id="slider">
    
    <p>
        <div align="center" id="map" style="width: 100%; height: 400px"><br/></div>
    </p>

     
    <div class="clr"></div>
    <div class="click_blog"> <img src="<?php echo Yii::app()->request->baseUrl ?>/images/Get_in_touch.gif" alt="picture" width="163" height="47" />
      <p>Mikonos island in Greece, Chichi-jima in Japan, more cool places in Tour VN</p>
      <div class="clr"></div>
    </div>
    <!-- end #slideshow -->
    <div class="clr"></div>
  </div>
  </body>
  <div class="body">
    <div class="body_resize">
    <?php
        if(!empty($albums)){
            foreach($albums as $album){
                $file_id= Photo::getPhoto($album->id)->file_id;
                $photo_name= File::getFile($file_id)->name;
                ?>
                <div class="port">
                    <h2><?php echo $album->title;?></h2>
                        <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/viewdetail&album_id='.$album->id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
                        </a>
                    <div class="clr"></div>
                    <p><?php echo $album->description;?></p>
                    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/viewdetail&album_id='.$album->id ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/read_more.gif" alt="picture" width="85" height="26" border="0" class="floated" /></a></div>
      
            <?php 
            }
        }
    ?>
      
      <div class="port last">
        <h2>Introduction</h2>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/test.gif" alt="picture" width="36" height="28" class="floated" />
        <div class="clr"></div>
        <p>“ Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”</p>
        <div class="bg"></div>
        <?php 
            $users= User::model()->getAdmin('admin');
            
            foreach($users as $user){
                //var_dump($user->username);exit;
                $file= File::model()->getFile($user->photo_id);
                
        ?>
        <?php if(!empty($file->name)){?>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/protected/uploads/<?php echo $file->name?>" alt="picture" width="38" height="37" border="0" class="floated" style="padding:10px 20px 0 0;" /></a>
        <?php } else{?>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nouser.png" alt="picture" width="38" height="37" border="0" class="floated" style="padding:10px 20px 0 0;" /></a>
        <?php }
        ?>
                <p style="padding:10px 20px 0 20px;"><strong><?php echo $user->username;?>, <br />
                Creative Director of Website tourvn.vn</strong></p>
                <div class="bg"></div>
        <?php 
                
            }
        ?>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  


