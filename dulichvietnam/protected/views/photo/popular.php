<style type="text/css">

#preview div {
    display:inline;
    float:left;
    margin:0;
    padding:0;
    text-align:center;
    padding-right: 10px;
}
.menu ul{width: 425px;}
.right{width: 510px;}
.left{width:416px;}

.list-view .pager { clear:both;}
</style>
 <head>
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
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
        var lat="<?php echo $lat;?>";
        var lng= "<?php echo $lng;?>";
        var latlng;
        if(lat){
            latlng = new google.maps.LatLng(lat, lng);
        }else{
            latlng= new google.maps.LatLng(15.8244, 107.951);
        }
        
        
        var myOptions = {
          zoom: 8,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        //set maker hien tai
        if(lat){
            marker = new google.maps.Marker({
              map:map,
              //draggable:true,
              animation: google.maps.Animation.DROP,
              position: latlng
            });
        }
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
 <div id="slider">

 </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    <div class="right">
    <div id="preview">
        <div style="padding-bottom: 10px;">
        <a href="<?php echo Yii::app()->createUrl('photo/popular/order/view_count/lat/'.$lat.'/lng/'.$lng) ?>"><?php echo "Popular";?></a>
        |
        <a href="<?php echo Yii::app()->createUrl('photo/popular/order/creation_date/lat/'.$lat.'/lng/'.$lng) ?>"><?php echo "Recent";?></a>
        <?php if(!Yii::app()->user->isGuest){?>
        |
        <a href="<?php echo Yii::app()->createUrl('photo/popular/order/your/lat/'.$lat.'/lng/'.$lng) ?>"><?php echo "Your Photos";?></a>
        <?php }?>
        </div>
        <br />
        <?php $this->widget('zii.widgets.CListView', array(
        	'dataProvider'=>$dataProvider,
        	'itemView'=>'_popular',
            'ajaxUpdate'=> false,
        	'template'=>"{items}\n{pager}"
        )); ?>
    </div>
    </div>
    <div class="left">
        <p><div align="center" id="map" style="width: 100%; height: 400px"><br/></div></p>
    </div> 
  </div>
  </div>
  </body>
  