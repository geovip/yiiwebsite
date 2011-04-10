 <div id="slider">
    <h2><?php echo $album->title;?></h2>
 </div>
  <div class="clr"></div>
  <div class="body">
  
    <div class="body_resize">
    <?php if($user_id==$album->user_id){ ?>
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/edit&album_id='.$album_id ?>"><?php echo "Edit Album"; ?></a>
    |
    <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/editsetting&album_id='.$album_id ?>"><?php echo "Manage Photos";?></a>
    <?php } ?>
    <?php $this->widget('zii.widgets.CListView', array(
    	'dataProvider'=>$dataProvider,
    	'itemView'=>'_view',
    	'template'=>"{items}\n{pager}"
    )); ?>
    
    <div class="clr"></div>
    <div class="right">
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
            'user_id'=>$user_id
		)); ?>
        <?php $this->renderPartial('/comment/_album',array(
    			'model'=>$comment,
                'album_id'=>$album_id
    		)); ?>
   </div>     
   <div class="clr"></div>
    </div>
    
  </div>