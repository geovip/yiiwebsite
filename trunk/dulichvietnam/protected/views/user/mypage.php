 <style type="text/css">
 .mypapge_photo {width:160px;float: left; margin: 10px 0; padding: 0 30px 0 0;}
 img.mypage_view_image {
    background:transparent none repeat scroll 0 0;
    border:medium none;
    float:left;
    margin-top:1px;
    margin-right: 3px;
}
.myphoto img{float:left; margin-right: 17px;}
.col2 h4{
    color:#006549;
    font-size:130%;
    margin-bottom:5px;
    margin-left:10px;
}
.pad h4{
    color:#006549;
    font-size:130%;
    margin-bottom:5px;
}
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
 <head> 	
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var map;
 function load() {
    
    var marker;
    
    var latlng;
    
    latlng = new google.maps.LatLng(-34.397, 150.644);
    
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    //set maker hien tai
    
    marker = new google.maps.Marker({
      map:map,
      //draggable:true,
      animation: google.maps.Animation.DROP,
      position: latlng
    });
    
    
   
}
    </script>
  </head>
<section id="content">
    
    <article class="col1">
        <h3>Infomation</h3>
       	<div class="pad">
            
            <div>Hi, <strong><?php echo Comment::model()->getAuthorLink($user->id);?></strong>!, <a href="<?php echo Yii::app()->createUrl('user/edit/user_id/'.$user->id);?>"><?php echo "edit";?></a></div>
            <?php if($user->type=='admin'){?>
                
            <?php }?>
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
            
            <p style="font-size: 1.5em;"><a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload your photos »"; ?></a></p>
            <div class="bg"></div>
            <br />
            <div>
            <h4><?php echo "Your Stats:";?></h4>
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
        </div>
    </article>
    <article class="col2 pad_left1">
    <h2><?php echo "Your photos: "?><a href=""><?php echo "on the map";?></a></h2>
    <?php if(!empty($photos)){
        $i=0;
       foreach($photos as $photo){?>
            <?php 
            //how to get Picture of album(demo);
            //get file_id from Photo
            $i+=1;
            $file_id= Photo::getPhotoFile($photo->id)->file_id;
            $photo_name= File::getFile($file_id)->name;
            
            
            ?>
            <div class="mypapge_photo">
            <strong ><?php echo $photo->title; ?></strong>
            <a style="padding-bottom: 5px;" href="<?php echo Yii::app()->createUrl('photo/detail/photo_id/'.$photo->id.'/file_id/'.$file_id)?>"><img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="150" height="148" />
            </a>
            <img class="mypage_view_image" src="<?php echo Yii::app()->request->baseUrl.'/images/geolocated.gif'?>" /><span><?php echo $photo->view_count. " views"; ?> </span>
            <p><?php echo $photo->description;?></p>
  
            </div>
            
    <?php } 
    }?>
    
    <h4><?php echo $user->username."'s "."Conversations";?></h4>
    
    
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
          
        <?php }
        }
    ?>
    </article>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
</section>
    
    
    

       
        
        
       
