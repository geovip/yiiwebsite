 <style type="text/css">
 .port {width:167px;}
 .comment .content{height: 67px;}
 #user_page_stats ul {
    clear:both;
    float:left;
    margin:0 0 5px;
    padding:5px 0 0 5px;
    width:255px;
}
 ul {
    list-style-image:none;
    list-style-position:outside;
    list-style-type:none;
    padding-left: 0;
}
ul#counters{margin-left: 0px;}
ul li.first_stat{
    clear:none;
    float:left;
    
    width:50%;
}
li.num{font-size: 1.5em;}
.right h1 {
    color:#006549;
    font-size:140%;
    margin:10px 0 0 0px;
    padding:6px 0 10px;
}
 </style>
 <div id="slider">
    <h2>My page</h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    <div class="right">
    <h1><?php echo "Your photos: "?><a href=""><?php echo "on the map";?></a></h1>
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
            <img class="mypage_view_image" src="<?php echo Yii::app()->request->baseUrl.'/images/geolocated.gif'?>" /><span><?php echo $photo->view_count. " views"; ?> </span>
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
    <div class="left">
        <h2>Information</h2>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/test.gif" alt="picture" width="36" height="28" class="floated" />
        <div class="clr"></div>
        <div style="background: #F7F6FB none repeat scroll 0 0;">Hi, <?php echo Comment::model()->getAuthorLink($user->id);?>!, <a href="<?php echo Yii::app()->request->baseUrl.'/?r=user/edit&user_id='.$user->id;?>"><?php echo "edit";?></a></div>
        <p>
            <?php 
                $user_photo= User::model()->getUser($user->id);
                $user_photo_name= $user_photo->name;
                if($user_photo_name){?>
                    <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$user_photo_name;?>" width="96" height="96" />
                <?php }
                else{?>
                    <img src="<?php echo Yii::app()->request->baseUrl.'/images/nouser.png';?>" width="96" height="96" />
                <?php }
                ?>
            
        </p>
        <p><?php echo $user->information;?></p>
        <?php if(!empty($user->website)){?>
            <p><img class="mypage_view_image" style="border: none; background: #fff;" src="<?php echo Yii::app()->request->baseUrl.'/images/link.png'?>" /><a href="<?php echo $user->website;?>"><?php echo $user->website;?></a></p>  
        <?php }?>
        
        <a href="<?php echo Yii::app()->request->baseUrl.'/?r=album/create'?>"><?php echo "Upload your photos"; ?></a>
        <div class="bg"></div>
        <br />
        <div style="background: #F7F6FB none repeat scroll 0 0;">
        <?php echo "Your Stats:";?>
        </div>
        <div class="user_page_stats">
            <ul>
                <li class="first_stat">
                    <ul id="counters">
                        <li class="num"><?php echo $sum_photos?></li>
                        <li><?php echo photos?></li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="num"><?php echo $sum_google_maps?></li>
                        <li><?php echo "on the map" ?></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clr"></div>
    </div>
  </div>
 </div>