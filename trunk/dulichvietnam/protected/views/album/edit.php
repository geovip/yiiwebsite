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
<article class="col2 pad_left1">
    <h2><?php echo "Edit Album";?></h2>
    <form action="<?php echo Yii::app()->createUrl("album/edit/album_id/".$model->id); ?>" method="post" enctype="multipart/form-data" id="form-demo">
        <div>
            <div class="wrapper">
                <label>Title</label>
                <input id="title" type="text" class="input" name="Album[title]" value="<?php echo $model->title;?>" />
                <label style="color: red;" id="error_title"></label>
                
            </div>
            <div class="wrapper">
                <label> Description</label>
                <textarea id="description" name="Album[description]" cols="1" rows="1" ><?php echo $model->description;?></textarea>
            </div>
            <input type="submit" value="Save" class="button" />
        </div>
    </form>
</article>
</section>
<div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
<script type="text/javascript">
 jQuery(document).ready(function () {
    jQuery('#form-demo').validate({
        rules:{
            "title":{
                required: true,
                maxlength:160
            }
        },
        messages:{
            "title":{
                required: "<?php echo 'Title is not empty';?>",
                maxlength: "<?php echo 'Please enter no more than 160 characters'; ?>"
            }
        }
    });
    
});
</script>
