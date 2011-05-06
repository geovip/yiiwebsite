
  <style type="text/css">
.menu ul{width: 425px;}
</style>
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
    <h2>Albums</h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    
    <?php 
        if(!Yii::app()->user->isGuest){?>
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/listalbum'?>"><?php echo "Hot Album";?></a>
    |
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/manage'?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/create'?>"><?php echo "Upload";?></a>
    <?php }?>
    <div class="clr"></div>
    <?php if(!empty($albums)){
        $i=0;
       foreach($albums as $album){?>
            <?php 
            //how to get Picture of album(demo);
            //get file_id from Photo
            $i+=1;
            $file_id= Photo::getPhoto($album->id)->file_id;
            $photo_name= File::getFile($file_id)->name;
            if($i==3 || $i==6){
                $class= "port last";
            }
            else{
                $class= "port";
            }
            
            ?>
            <div class="<?php echo $class;?>">
            <h2><?php echo $album->title; ?></h2>
            
            
            <?php
            if(empty($photo_name)){?>
                <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/viewdetail&album_id='.$album->id ?>" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/img_1.jpg';?>" alt="picture" width="276" height="148" />
                </a>
            
            <?php } else{?>
                <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/viewdetail&album_id='.$album->id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
                </a>
            <?php }
            ?>
            <div class="clr"></div>
            <p><?php echo $album->description;?></p>
  
            </div>
            <?php 
            if($i==3 || $i==6){?>
                <div class="clr"></div>
            <?php }
            
            ?>
            
    <?php } 
    }?>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
    <div class="clr"></div>
    </div>
  </div>