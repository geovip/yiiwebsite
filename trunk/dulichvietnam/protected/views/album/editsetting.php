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
 <style type="text/css">
 .port{float:none;}
 </style>
 <div id="slider">
    <h2><?php echo $album->title;?></h2>
 </div>
  <div class="clr"></div>
  <div class="body">
  
    <div class="body_resize">
    <form method="post" id="form-demo" action="<?php echo Yii::app()->request->baseUrl.'/?r=album/editsetting&album_id='.$album->id ?>">
    <?php if(!empty($photos)){
        $i=0;
       foreach($photos as $photo){?>
            <?php 
            //how to get Picture of album(demo);
            //get file_id from Photo
            $i+=1;
            
            $photo_name= File::getFile($photo->file_id)->name;
            if($i%3==0){
                $class= "port last";
            }
            else{
                $class= "port";
            }
            
            ?>
            <div class="<?php echo $class;?>">
            
            
                <ol>

                    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='.$photo->id.'&file_id='.$photo->file_id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" />
                    </a>
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/map&photo_id='.$photo->id.'&file_id='.$photo->file_id ?>"><?php echo "to map";?></a>
                    </li>
                    <li>
                        <label>Title</label>
                        <input value="<?php echo $photo->title ?>" name="Album[title][<?php echo $photo->id ?>]" type="text" class="text" />
                    </li>
                    <li>
        
                        <label> Description</label>
                        <textarea id="description" name="Album[description][<?php echo $photo->id ?>]" cols="45" rows="3" ><?php echo $model->description;?><?php echo $photo->description ?></textarea>
                    </li>
                    
                </ol>
            
            <div class="clr"></div>
            
            </div>
            <?php 
            if($i%3==0){?>
                <div class="clr"></div>
            <?php }
            } 
    }?>
        <ol>
        <li class="buttons">
            <input type="submit" value="Save" />
        </li>
        </ol>
        </form>
    <div class="clr"></div>
    <div class="right">
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
    
   </div>     
   <div class="clr"></div>
    </div>
    
  </div>