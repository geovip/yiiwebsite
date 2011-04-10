
<?php 
    $photo_name= File::getFile($data->file_id)->name;
?>

<div class="port" id="al<?php echo $data->id;?>">
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='.$data->id.'&file_id='.$data->file_id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
    </a>
    
 
    <p><?php echo $data->title;?></p>
</div>
