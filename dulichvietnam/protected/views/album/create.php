<head> 	
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var map;
 function load() {
    
    var marker;
    
    var latlng;
    
    latlng = new google.maps.LatLng(-34.397, 150.644);
    
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    //set maker hien tai
    
    marker = new google.maps.Marker({
      map:map,
      //draggable:true,
      animation: google.maps.Animation.DROP,
      position: latlng
    });
    
    
   
}
    </script>
  </head>
<div id="slider">
    <h2>Add Photo</h2>
  </div>
  <div class="clr"></div>
<div class="body">
    <div class="body_resize">
      <div class="right">
      <?php 
        if(!Yii::app()->user->isGuest){?>
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/listalbum'?>"><?php echo "Hot Album";?></a>
    |
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/manage'?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/create'?>"><?php echo "Upload";?></a>
    <?php }?>

      <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
      </div>
      <div class="left">
        <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
        
        </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
