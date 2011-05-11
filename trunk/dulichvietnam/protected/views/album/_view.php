
<?php 
    $photo_name_file= File::getFile($data->file_id)->name;
?>
<div class="wrapper under">
	<figure class="left marg_right1"><a href="<?php echo Yii::app()->createUrl("photo/detail/photo_id/".$data->id."/file_id/".$data->file_id); ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name_file;?>" alt="picture" width="164" height="116" /></a>
    </figure>
	<p class="pad_bot2"><strong><?php echo $data->title;?></strong></p>
	<p class="pad_bot2"><?php echo $data->description;?></p>
	<a href="<?php echo Yii::app()->createUrl("photo/detail/photo_id/".$data->id."/file_id/".$data->file_id); ?>"" class="marker_2"></a>
</div>

