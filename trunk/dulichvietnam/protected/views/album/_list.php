
<?php 
    
    $file_id= Photo::getPhoto($data->id)->file_id;
   
    $photo_name= File::getFile($file_id)->name;
?>

<div class="port">

    
    
    <?php
    if(empty($photo_name)){?>
        <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$data->id) ?>" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/img_1.jpg';?>" alt="picture" width="100" height="66" />
        </a>
    
    <?php } else{?>
        <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$data->id) ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="100" height="66"  />
        </a>
        
    <?php } ?>
    <a href="<?php echo Yii::app()->createUrl('album/edit/album_id/'.$data->id) ?>"><?php echo "Edit Album";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/del/album_id/'.$data->id) ?>"><?php echo "Delete";?></a>
    <p><?php echo CHtml::encode($data->title); ?></p>
</div>
