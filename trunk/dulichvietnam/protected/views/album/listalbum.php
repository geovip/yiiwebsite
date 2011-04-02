 <div id="slider">
    <h2>Album</h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
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
                <img src="<?php echo Yii::app()->request->baseUrl.'/images/img_1.jpg';?>" alt="picture" width="276" height="148" />
            
            <?php } else{?>
                <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
            <?php }
            ?>
            <div class="clr"></div>
            <p><?php echo $album->description;?></p>
            
            <a href="#"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/read_more.gif" alt="picture" width="85" height="26" border="0" class="floated" /></a></div>
            <?php 
            if($i==3 || $i==6){?>
                <div class="clr"></div>
            <?php }
            
            ?>
            
    <?php } 
    }?>
      
    </div>
  </div>