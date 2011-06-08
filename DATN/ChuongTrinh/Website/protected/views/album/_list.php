
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
            <li class="views"><a href="<?php echo Yii::app()->createUrl('album/edit/album_id/'.$data->id); ?>"><?php echo "Edit Album";?></a></li>
            <li class="comments"><a href="javascript:void(0);" onclick="delteAlbum('<?php echo $data->id ?>');"><?php echo "Delete";?></a></li>
        </ul>
    </div>
</div>
