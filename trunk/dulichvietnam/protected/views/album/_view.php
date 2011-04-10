
<?php 
    $photo_name= File::getFile($data->file_id)->name;
?>
<div class="clr"></div>
<div>
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='.$data->id.'&file_id='.$data->file_id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
    </a>
    
    <div class="clr"></div>
    <p><?php echo $data->title;?></p>
</div>
