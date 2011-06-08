 <style type="text/css">
 .port{float:none;}
 a:hover, a.hover {
    color: red;
}
 </style>
<h3>
<a href="<?php echo Yii::app()->createUrl('album/listalbum')?>"><?php echo "All Album";?></a>
    <?php 
        if(!Yii::app()->user->isGuest){?>           
    |
    <a href="<?php echo Yii::app()->createUrl('album/manage')?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload";?></a>
    <?php }?>
</h3>
<section id="content">
<article class="col2 pad_left1">
    <h2><?php echo $album->title;?></h2>
    <form method="post" id="form-demo" action="<?php echo Yii::app()->createUrl("album/editsetting/album_id/".$album->id); ?>">
     <?php if(!empty($photos)){
        $i=0;
       foreach($photos as $photo){?>
            <?php 
            //how to get Picture of album(demo);
            //get file_id from Photo
            $i+=1;
            $photo_name= File::getFile($photo->file_id)->name;
            
            ?>
            <div class="wrapper under editsetting">
                <figure class="left marg_right1">
                    <a href="<?php echo Yii::app()->createUrl("photo/detail/photo_id/".$photo->id."/file_id/".$photo->file_id); ?>">
                    <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" />
                    </a>
                </figure>
                <a href="<?php echo Yii::app()->createUrl("photo/map/photo_id/".$photo->id."/file_id/".$photo->file_id); ?>"><?php echo "to map";?></a>
                
                <div class="wrapper">
				    <label>Title</label>
                    <input value="<?php echo $photo->title ?>" name="Album[title][<?php echo $photo->id ?>]" type="text" class="input" />
                </div>
                <div class="wrapper">
                    <label> Description</label>
                    <textarea id="description" name="Album[description][<?php echo $photo->id ?>]" cols="45" rows="3" ><?php echo $model->description;?><?php echo $photo->description ?></textarea>
              
                </div>
            </div>
            <?php }
            } ?>
            <input type="submit" value="Save" class="button" />
            </form>
</article>
</section>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>