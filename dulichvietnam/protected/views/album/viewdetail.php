 <div id="slider">
    <h2><?php echo $album->title;?></h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    <?php if(!empty($photos)){
        $i=0;
       foreach($photos as $photo){?>
            <?php 
            //how to get Picture of album(demo);
            //get file_id from Photo
            $i+=1;
            
            $photo_name= File::getFile($photo->file_id)->name;
            if($i%3==0){
                $class= "port last";
            }
            else{
                $class= "port";
            }
            
            ?>
            <div class="<?php echo $class;?>">
            <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='.$photo->id.'&file_id='.$photo->file_id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="276" height="148" />
            </a>

            <div class="clr"></div>
            <p><?php echo $photo->title;?></p>
            </div>
            <?php 
            if($i%3==0){?>
                <div class="clr"></div>
            <?php }
            } 
    }?>
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
    </div>
    
  </div>