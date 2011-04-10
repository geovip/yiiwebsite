
<?php 
    
    $file_id= Photo::getPhoto($data->id)->file_id;
   
    $photo_name= File::getFile($file_id)->name;
?>

<div>

    <p><?php echo CHtml::encode($data->title); ?></p>
    <?php
    if(empty($photo_name)){?>
        <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/viewdetail&album_id='.$data->id ?>" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/img_1.jpg';?>" alt="picture" />
        </a>
    
    <?php } else{?>
        <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/viewdetail&album_id='.$data->id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture"  />
        </a>
    <?php } ?>
    
</div>
