<style type="text/css">
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
</style>
<?php
//get title and description of photo
$photo= Photo::model()->getPhotoFile($photo_id);
?>
<div id="slider">
    <h2>Detail Photo</h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
      <div class="right">
        <h2><?php echo $photo->title; ?><span></span></h2>
        <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$file->name ?>" alt="picture" width="617" />
        <div class="clr"></div>
        <p><?php echo $photo->description;?></p>
         <div id="photo_rating" class="rating" onmouseout="rating_out();">
          <span id="rate_1" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(1);"<?php endif; ?> onmouseover="rating_over(1);"></span>
          <span id="rate_2" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(2);"<?php endif; ?> onmouseover="rating_over(2);"></span>
          <span id="rate_3" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(3);"<?php endif; ?> onmouseover="rating_over(3);"></span>
          <span id="rate_4" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(4);"<?php endif; ?> onmouseover="rating_over(4);"></span>
          <span id="rate_5" class="rating_star_big_generic" <?php if (!$rated && $user_id):?> onclick="rate(5);"<?php endif; ?> onmouseover="rating_over(5);"></span>
          <span id="rating_text" class="rating_text"><?php echo "click to rate" ;?></span>
        </div>
        <?php 
            if($user_id==$photo->user_id){?>
                <a href="<?php echo Yii::app()->request->baseUrl.'/?r=photo/del&photo_id='.$photo->id ?>"><?php echo "Delete";?></a>
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
        <?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
            'user_id'=>$user_id
		)); ?>
        <?php $this->renderPartial('/comment/_form',array(
    			'model'=>$comment,
                'photo_id'=>$photo_id
    		)); ?>
        
        
      </div>
      <div class="left">
        <h2>Testimonial</h2>
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/test.gif" alt="picture" width="36" height="28" class="floated" />
        <div class="clr"></div>
        <p>“ Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”</p>
        <div class="bg"></div>
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/test_img.gif" alt="picture" width="38" height="37" border="0" class="floated" style="padding:10px 20px 0 0;" /></a>
        <p style="padding:10px 20px 0 20px;"><strong>John Doe, <br />
          Creative Director of Website.com</strong></p>
        <img src="images/r_bg.gif" alt="picture" width="293" height="8" class="floated" /> <img src="<?php echo Yii::app()->request->baseUrl ?>/images/test.gif" alt="picture" width="36" height="28" class="floated" />
        <div class="clr"></div>
        <p>“ Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”</p>
        <div class="bg"></div>
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/test_img.gif" alt="picture" width="38" height="37" border="0" class="floated" style="padding:10px 20px 0 0;" /></a>
        <p style="padding:10px 20px 0 20px;"><strong>John Doe, <br />
          Creative Director of Website.com</strong></p>
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/r_bg.gif" alt="picture" width="293" height="8" class="floated" /> </div>
      <div class="clr"></div>
    </div>
  </div>
<script type="text/javascript">
  var pre_rate= <?php echo $photo->rating; ?>;
  var rated = "<?php echo $rated;?>";
  var photo_id = <?php echo $photo->id;?>;
  var total_votes = <?php echo $rating_count;?>;
  var viewer = <?php echo $user_id;?>;
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
      'url' : '<?php echo Yii::app()->request->baseUrl?>/?r=photo/rate',
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