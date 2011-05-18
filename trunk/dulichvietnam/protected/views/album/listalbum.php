  
 <div id="slider">
    <h2>
    <a href="<?php echo Yii::app()->createUrl('album/listalbum')?>"><?php echo "All Album";?></a>
    <?php 
        if(!Yii::app()->user->isGuest){?>           
    |
    <a href="<?php echo Yii::app()->createUrl('album/manage')?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload";?></a>
    <?php }?> </h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    
    
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
                <a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/" . $album->id) ?>" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/img_1.jpg';?>" alt="picture" width="276" height="148" />
                </a>
            
            <?php } else{?>
                <a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/" . $album->id) ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
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