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
<style type="text/css">
#page1 .text {padding: 7px 0 0 36px; text-align:left;}
</style>
    <div class="text">
		<img src="<?php echo Yii::app()->request->baseUrl ?>/images/text1.jpg" alt="">
		<h2>The Best Offers</h2>
		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
		<a href="#" class="button">Read More</a>
	</div>
    <div class="img"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/img2.jpg" alt=""></div>
    <div class="inner_copy">More <a href="http://www.templatemonster.com/">Website Templates</a> at TemplateMonster.com!</div>
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
        <?php if($user_id==$album->user_id){ ?>
        <a href="<?php echo Yii::app()->createUrl("album/edit/album_id/".$album_id); ?>"><?php echo "Edit Album"; ?></a>
        |
        <a href="<?php echo Yii::app()->createUrl("album/editsetting/album_id/".$album_id); ?>"><?php echo "Manage Photos";?></a>
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