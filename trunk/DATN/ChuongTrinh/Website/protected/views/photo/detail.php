<style type="text/css">
#comment-form .row textarea{width: 422px;}
#loading img{background: none; border:none;}
.rating_star_big_generic {
    background-repeat:no-repeat;
    cursor:pointer;
    display:inline-block;
    float:left;
    font-size:1px;
    height:16px;
    width:16px;
}
.rating_star_big {
    background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/star_big.png);
}
.rating_star_big_disabled {
    background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/star_big_disabled.png);
}
.rating_star_big_half{
    background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/star_big_half.png)
}
.menu ul{width: 425px;}
.right{width: 506px;}
.left{width: 390px;}
</style>
<?php
//get title and description of photo
$photo= Photo::model()->getPhotoFile($photo_id);
?>
<head> 	
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var map;
function createMarker(point, photo_id, file_id, name) {
    var icon = new google.maps.MarkerImage("<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'?>"+name, null, null, new google.maps.Point(0, 0), new google.maps.Size(20, 20));
   
    var marker = new google.maps.Marker({
          map:map,
          icon: icon,
          //draggable:true,
          //animation: google.maps.Animation.DROP,
          position: point
        });
    
    google.maps.event.addListener(marker, "click", function() {
        var imag="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'?>"+name;
        var url= "<?php echo Yii::app()->createUrl('photo/detail/photo_id')?>"+"/"+photo_id+'/file_id/'+file_id;
       
        var infowindow = new google.maps.InfoWindow(
          { 
            content: '<a href="'+url+'"><img src="'+imag+'" alt="'+name+'" /></a>',
            
          });
        infowindow.open(map, marker);
    });
    return marker;
}
 function load() {
    
    var marker;
    //load default latlng
    var lat= "<?php echo $photo->lat; ?>";
    var lng= "<?php echo $photo->lag;?>";
    var latlng;
    if(lat){
        latlng= new google.maps.LatLng(lat, lng);
    }
    else{
        latlng = new google.maps.LatLng(-34.397, 150.644);
    }
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    //set maker hien tai
    if(lat){
        marker = new google.maps.Marker({
          map:map,
          //draggable:true,
          animation: google.maps.Animation.DROP,
          position: latlng
        });
    }
    
    //add makers load from database
    var allphotos= "<?php echo $photos;?>";
    var photo_spl= allphotos.split("|");
    var len= photo_spl.length;
    for (var i = 0; i < len; i++) {
        var file= photo_spl[i].split(",");
        var photo_id= file[0];
        var file_id= file[1];
        var name= file[2];
        var lat= file[3];
        var lng= file[4];
        
        var point = new google.maps.LatLng(lat, lng);
        createMarker(point, photo_id, file_id, name);
    }
    google.maps.event.addListener(map, 'dragend', function() {
            
            var center = map.getCenter();
            var lat= center.lat().toFixed(5);
            var lng= center.lng().toFixed(5);
            var url = "<?php echo Yii::app()->createUrl('photo/listmap')?>";
            new Request({
                url: url,
                method: "post",
               data:{
                    'ajax': 'ajax',
                    'lat': lat,
                    'lng': lng
                },
                onSuccess : function(responseHTML)
                {
                    
                    if(responseHTML){
                        var allphotos= responseHTML;
                        var photo_spl= allphotos.split("|");
                        var len= photo_spl.length;
                        for (var i = 0; i < len; i++) {
                            var file= photo_spl[i].split(",");
                            var photo_id= file[0];
                            var file_id= file[1];
                            var name= file[2];
                            var lat= file[3];
                            var lng= file[4];
                            
                            var point = new google.maps.LatLng(lat, lng);
                            createMarker(point, photo_id, file_id, name);
                        }
                    }
                		
                }
            }).send();
            
        });

}
    </script>
  </head>
<body onload="load()" onunload="GUnload()" >

  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
      <div class="right">
          <?php
        //get ten album
        $album= Album::getAlbum($photo->collection_id); 
        ?>
        
        <h2> <a href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id/'.$photo->collection_id) ?>"><?php echo $album->title;?></a> - <span><?php echo $photo->title; ?></span></h2>
        
        <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$file->name ?>" alt="picture" width="495" />
        
        <div class="clr"></div>
        <p><?php echo $photo->description;?></p>
        <?php //if(!Yii::app()->user->isGuest){?>
         <div id="photo_rating" class="rating" onmouseout="rating_out();">
          <span id="rate_1" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(1);"<?php endif; ?> onmouseover="rating_over(1);"></span>
          <span id="rate_2" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(2);"<?php endif; ?> onmouseover="rating_over(2);"></span>
          <span id="rate_3" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(3);"<?php endif; ?> onmouseover="rating_over(3);"></span>
          <span id="rate_4" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(4);"<?php endif; ?> onmouseover="rating_over(4);"></span>
          <span id="rate_5" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(5);"<?php endif; ?> onmouseover="rating_over(5);"></span>
          <span id="rating_text" class="rating_text"><?php echo "click to rate" ;?></span>
        </div>
        
        <?php //}?>
      
        <?php 
            if($user_id==$photo->user_id){?>
                <a href="javascript:void(0);" onclick="delete_photo('<?php echo $photo->id;?>', '<?php echo $photo->collection_id;?>');"><?php echo "Delete";?></a>
        <?php }
        ?>
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
        <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4de90e105f2966d6"></script>
<!-- AddThis Button END -->
        <?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
            'photo'=>$photo,
            'user_id'=>$user_id
		)); ?>
        <?php if(!Yii::app()->user->isGuest){?>
        <?php $this->renderPartial('/comment/_form',array(
    			'model'=>$comment,
                'photo_id'=>$photo_id
    		)); ?>
        
      <?php }?>
      </div>
      <div class="left">
         <h2>Map</h2>
          <p>
            <div align="center" id="map" style="width: 100%; height: 500px"><br/></div>
          </p>
          
          <p>
            <img style="float: left;" src="<?php echo Yii::app()->request->baseUrl.'/images/marker.png'?>" />&nbsp;
            <a href="<?php echo Yii::app()->createUrl("photo/popular/order/view_count/lat/".$photo->lat."/lng/".$photo->lag);?>"><?php echo $photo->lat. ' and '. $photo->lag;?><br />&nbsp;</a>
             <?php if($user_id==$photo->user_id){?>
             <a href="<?php echo Yii::app()->createUrl("photo/map/photo_id/".$photo->id."/file_id/".$photo->file_id);?>"><?php echo "Change Position";?></a>
           <?php }?>
          </p>
          
          <h2>Suggest Travel</h2>
          <div class="pad">
          <?php
					if(!empty($albums_comments)){
						$i=0;
						foreach($albums_comments as $album){
							$i++;
							$file_id= Photo::getPhoto($album->id)->file_id;
							$photo_name= File::getFile($file_id)->name;
							?>
                            <?php if($i==1 || $i==2){?>
								<div class="wrapper under">
							<?php } else { ?>
								<div class="wrapper">
							<?php } ?>
                                <figure class="left marg_right1">
                                    <a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>">
										<img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$photo_name;?>" alt="picture" width="116" height="116" />
									</a>
                                </figure>
        						<p class="pad_bot2"><strong><a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>"><?php echo $album->title;?></a></strong></p>
        						<p class="pad_bot2"><?php echo substr($album->description, 0, 54);?></p>
        						<a href="<?php echo Yii::app()->createUrl("album/viewdetail/album_id/".$album->id);?>" class="marker_1"></a>
        					</div>
                            <?php 
						}
					}
				?>
                </div>
               
      </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</body>


<script type="text/javascript">
  var pre_rate= <?php echo $photo->rating; ?>;
  var rated = "<?php echo $rated;?>";
  var photo_id = <?php echo $photo->id;?>;
  var total_votes = <?php echo $rating_count;?>;
  var viewer = <?php if($user_id){echo $user_id;} else echo 0;?>;
  var tt_rating= <?php echo $tt_rating;?>;
  
  function rating_over(rating) {
    if (rated == 1){
      //$('rating_text').innerHTML = "you already rated";
      jQuery('#rating_text').html("you already rated");
      //set_rating();
    }
    else if (viewer == 0){
      //$('rating_text').innerHTML = "please login to rate";
      jQuery('#rating_text').html("please login to rate");
    }
    else{
      //$('rating_text').innerHTML = "click to rate";
      jQuery('#rating_text').html("click to rate");
      for(var x=1; x<=5; x++) {
        if(x <= rating) {
          //$('rate_'+x).set('class', 'rating_star_big_generic rating_star_big');
          jQuery('#rate_'+x).attr('class', 'rating_star_big_generic rating_star_big');
        } else {
          //$('rate_'+x).set('class', 'rating_star_big_generic rating_star_big_disabled');
          jQuery('#rate_'+x).attr('class', 'rating_star_big_generic rating_star_big_disabled');
        }
      }
    }
  }
  function rating_out() {
  
  	if((total_votes == 0) ||(total_votes == 1)){
		//$('rating_text').innerHTML = total_votes+" rating";
        jQuery('#rating_text').html(total_votes+ " rating");
	}
	else{
		//$('rating_text').innerHTML = total_votes+" ratings";
        jQuery('#rating_text').html(total_votes+ " ratings");
	}
    if (pre_rate != 0){
      set_rating();
    }
    else {
      for(var x=1; x<=5; x++) {
        //$('rate_'+x).set('class', 'rating_star_big_generic rating_star_big_disabled');
        jQuery('#rate_'+x).attr('class', 'rating_star_big_generic rating_star_big_disabled');
      }
    }
  }

  function set_rating() {
    
    var rating = pre_rate;
    //alert(rating);
    if((total_votes == 0) ||(total_votes == 1)){
		//$('rating_text').innerHTML = total_votes+" rating";
        jQuery('#rating_text').html(total_votes+ " rating");
	}
	else{
		//$('rating_text').innerHTML = total_votes+" ratings";
        jQuery('#rating_text').html(total_votes+ " ratings");
	}
    for(var x=1; x<=parseInt(rating); x++) {
      //$('rate_'+x).set('class', 'rating_star_big_generic rating_star_big');
      jQuery('#rate_'+x).attr('class', 'rating_star_big_generic rating_star_big');
    }
    
    for(var x=parseInt(rating)+1; x<=5; x++) {
        //$('rate_'+x).set('class', 'rating_star_big_generic rating_star_big_disabled');
        jQuery('#rate_'+x).attr('class', 'rating_star_big_generic rating_star_big_disabled');
      }
    
    var remainder = Math.round(rating)-rating;
    
    if (remainder <= 0.5 && remainder !=0){
      var last = parseInt(rating)+1;
      //alert(last);
      //$('rate_'+last).set('class', 'rating_star_big_generic rating_star_big_half');
      jQuery('#rate_'+last).attr('class', 'rating_star_big_generic rating_star_big_half');
    }
  }
  function rate(rating) {
	
    //$('rating_text').innerHTML = "Thanks for rating!";
    jQuery('#rating_text').html("Thanks for rating!");
    
    for(var x=1; x<=5; x++) {
      //$('rate_'+x).set('onclick', '');
      jQuery('#rate_'+x).attr('onclick', '');
    }
    (new Request.JSON({
      'format': 'json',
      'url' : '<?php echo Yii::app()->createUrl("photo/rate")?>',
      'data' : {
        
        'format' : 'json',
        'rating' : rating,
        'photo_id': photo_id
      },
      'onRequest' : function(){
        rated = 1;
        total_votes = total_votes+1;
        pre_rate = (tt_rating+rating)/total_votes;
        
        set_rating();
      },
      'onSuccess' : function(responseJSON, responseText)
      {
      	
      	if(responseJSON[0].total==1){
        	//$('rating_text').innerHTML = responseJSON[0].total+" rating";
            jQuery('#rating_text').html(responseJSON[0].total+" rating");
        }else{
          //$('rating_text').innerHTML = responseJSON[0].total+" ratings";
          jQuery('#rating_text').html(responseJSON[0].total+" ratings");
          //return;
        }
      }
    })).send();
    
  }
 window.addEvent('domready', function(){
    set_rating();
 });
  
  
</script>
<script type="text/javascript">
function delete_photo(photo_id, album_id){
    
    var url= "<?php echo Yii::app()->createUrl("photo/del/photo_id"); ?>"+ "/"+ photo_id;
    
    if(!confirm('Are you sure you want to delete this photo?')) return false;
    new Request({
        url: url,
        method: "post",
       data:{
            'ajax': 'ajax'
            
        },
        onSuccess : function(responseHTML)
        {
            if(responseHTML > 0){
                
                window.location.href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id')?>"+"/"+album_id;
            }
        		
        }
    }).send();
    return false;
    
}
</script>