
<?php 
    
    $file_id= Photo::getPhoto($data->id)->file_id;
   
    $photo_name= File::getFile($file_id)->name;
?>

<div class="port">

    
    <h2><?php echo CHtml::encode($data->title); ?></h2>
    <div class="pad_bot2">
         <?php echo $data->description ?>
    </div>
    <?php
    if(empty($photo_name)){?>
        <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$data->id) ?>" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/not_found.jpg';?>" alt="picture" width="250" height="200" />
        </a>
    
    <?php } else{?>
        <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$data->id) ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="250" height="200"  />
        </a>
        
    <?php } ?>    
    
</div>
