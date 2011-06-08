<style type="text/css">
#page1 .text {padding: 7px 0 0 36px; text-align:left;}
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
    
    <article class="col1">
		<h3>Hot Travel</h3>
		<div class="pad">
			<?php
				if(!empty($albums_comments)){
					$i=0;
					foreach($albums_comments as $album_comment){
						$i++;
						$file_id= Photo::getPhoto($album_comment->id)->file_id;
						$photo_name= File::getFile($file_id)->name;
						?>
                        <?php if($i==1 || $i==2){?>
							<div class="wrapper under">
						<?php } else { ?>
							<div class="wrapper">
						<?php } ?>
                            <figure class="left marg_right1">
                                <a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album_comment->id); ?>">
									<img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="116" height="116" />
								</a>
                            </figure>
    						<p class="pad_bot2"><strong><a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>"><?php echo $album_comment->title;?></a></strong></p>
    						<p class="pad_bot2"><?php echo substr($album_comment->description, 0, 54);?></p>
    						<a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album_comment->id); ?>" class="marker_1"></a>
    					</div>
                        <?php 
					}
				}
			?>
		</div>
	</article>
    <article class="col2 pad_left1">
        <h2><?php echo $album->title;?></h2>
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_tweet"></a>
        <a class="addthis_counter addthis_pill_style"></a>
        </div>
        <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4de90e105f2966d6"></script>
        <!-- AddThis Button END -->
        <?php if($user_id==$album->user_id){ ?>
        <div style="padding-bottom: 5px;">
        <a href="<?php echo Yii::app()->createUrl("album/edit/album_id/".$album_id); ?>"><?php echo "Edit Album"; ?></a>
        |
        <a href="<?php echo Yii::app()->createUrl("album/editsetting/album_id/".$album_id); ?>"><?php echo "Manage Photos";?></a>
        </div>
        <?php } ?>
       
        <?php $this->widget('zii.widgets.CListView', array(
        	'dataProvider'=>$dataProvider,
        	'itemView'=>'_view',
            'ajaxUpdate'=> false,
        	'template'=>"{items}\n{pager}"
        )); ?>
		<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash_success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
    		
    	<?php endif; ?>
        <?php if(Yii::app()->user->hasFlash('commentFail')): ?>
		<div class="flash_error">
			<?php echo Yii::app()->user->getFlash('commentFail'); ?>
		</div>
    		
    	<?php endif; ?>
        <?php $this->renderPartial('_comments',array(
			'post'=>$album,
			'comments'=>$album->comments,
            'user_id'=>$user_id,
            'album_id'=>$album_id
		)); ?>
        <?php if(!Yii::app()->user->isGuest){?>
        <?php $this->renderPartial('/comment/_album',array(
    			'model'=>$comment,
                'album_id'=>$album_id
    		)); ?>
            <?php }?>
  
		
    </article>
</section>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>