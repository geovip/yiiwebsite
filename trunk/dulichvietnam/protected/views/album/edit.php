 
 <div id="slider">
    <h2><?php echo "Edit Album";?></h2>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    <form action="<?php echo Yii::app()->request->baseUrl.'/?r=album/edit&album_id='.$model->id ?>" method="post" enctype="multipart/form-data" id="form-demo">
    
    <ol>
        <li>
            <label>Title</label>
            <input id="title" type="text" class="text" name="Album[title]" value="<?php echo $model->title;?>" />
            <label style="color: red;" id="error_title"></label>
        </li> 
        <li>
        
        <label> Description</label>
        <textarea id="description" name="Album[description]" cols="45" rows="6" ><?php echo $model->description;?></textarea>
        </li>
        <li class="buttons">
        <input type="submit" value="Save" />
        </li>
                
        
    </ol>
    </form>
    <div class="right">
   
   </div>     
    </div>
    
  </div>
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
