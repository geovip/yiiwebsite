 <style type="text/css">
 .port {width:167px;}
 .comment .content{height: 67px;}
 </style>
 <div id="slider">
    <h2>My page</h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    <div class="right">
    <?php if(!empty($photos)){
        $i=0;
       foreach($photos as $photo){?>
            <?php 
            //how to get Picture of album(demo);
            //get file_id from Photo
            $i+=1;
            $file_id= Photo::getPhotoFile($photo->id)->file_id;
            $photo_name= File::getFile($file_id)->name;
            if($i==3 || $i==6){
                $class= "port last";
            }
            else{
                $class= "port";
            }
            
            ?>
            <div class="<?php echo $class;?>">
            <h2><?php echo $photo->title; ?></h2>
            <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='.$photo->id.'&file_id='.$file_id ?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="150" height="148" />
            </a>
            
            <div class="clr"></div>
            <p><?php echo $photo->description;?></p>
  
            </div>
            <?php 
            if($i==3 || $i==6){?>
                <div class="clr"></div>
            <?php }
            
            ?>
            
    <?php } 
    }?>
    <div class="clr"></div>
    <h2><?php echo $user->username."'s "."Conversations";?></h2>
    
    
    <?php 
        if(!empty($photos)){
            foreach($photos as $photo){?>
            
            
                <?php 
                $file_id= Photo::getPhotoFile($photo->id)->file_id;
                $photo_name= File::getFile($file_id)->name;
                $comment= Comment::model()->getCommentMypage($photo->user_id, $photo->id);
                
                ?>
                <?php
                if(count($comment)>0){?>
                <div class="comment">
                    <div class="myphoto">
                        <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/detail&photo_id='.$comment->resource_id.'&file_id='.$photo->file_id?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" width="109" height="105" /></a>
             
                    </div>
                    <div class="author">
                    
                		<?php echo Comment::model()->getAuthorLink($comment->poster_id); ?> says:
                	</div>
                	<div class="time">
                    
                		<?php echo date('d F Y', strtotime($comment->creation_date)); ?>
                	</div>
                    
                	<div class="content">
                		<?php echo nl2br(CHtml::encode($comment->content)); ?>
                	</div>
                    </div>
                <?php } 
                ?>
            
            <div class="clr"></div>
        <?php }
        }
    ?>
    
    </div>
    <div class="left"></div>
  </div>
 </div>