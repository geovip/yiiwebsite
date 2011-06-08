<?php    
    $file_id= Photo::getPhoto($data->id)->file_id;
   
    $photo_name= File::getFile($file_id)->name;
?>
<div class="category">
    <?php
    if(empty($photo_name)){?>
        <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$data->id) ?>" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/not_found.jpg';?>" alt="picture" width="360" height="200" />
        </a>
    
    <?php } else{?>
        <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$data->id) ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="360" height="200"  />
        </a>
        
    <?php } ?>    
    <div>
        <h4><?php echo CHtml::encode($data->title); ?></h4>
        <p><?php echo $data->description;?></p>
        <ul>
            <li class="views"><?php echo $data->view_count. " views";?></li>
            <li class="comments"><?php echo $data->comment_count." comments"?></li>
        </ul>
    </div>
</div>
