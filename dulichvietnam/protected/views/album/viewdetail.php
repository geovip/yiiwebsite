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
  .menu ul{width: 425px;}
  </style>
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
        'ajaxUpdate'=> false,
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
            'user_id'=>$user_id,
            'album_id'=>$album_id
		)); ?>
        <?php if(!Yii::app()->user->isGuest){?>
        <?php $this->renderPartial('/comment/_album',array(
    			'model'=>$comment,
                'album_id'=>$album_id
    		)); ?>
            <?php }?>
   </div>     
   <div class="clr"></div>
    </div>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
        
  </div>
  
  <script type="text/javascript">
  window.addEvent('domready', function(){
    
    var children= jQuery('#yw0 .items').children().size();
    jQuery('#yw0 .items').children().each(function(index, value) { 
        if((index+1)%3==0){
            jQuery(this).addClass('last');
        } 
    });
    
  });
  </script>