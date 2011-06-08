<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">

	<div class="photo">
    <?php $user_photo= User::model()->getUser($comment->poster_id);
    $user_photo_name= $user_photo->name;
    if($user_photo_name){?>
        <img src="<?php echo Yii::app()->request->baseUrl.'/protected/uploads/'.$user_photo_name;?>" />
    <?php }
    else{?>
        <img src="<?php echo Yii::app()->request->baseUrl.'/images/nouser.png';?>" />
    <?php }
    ?>
    
    </div>
	<div class="author">
		<?php echo $comment->getAuthorLink($comment->poster_id); ?> says:
	</div>
    <?php if($user_id==$comment->poster_id){?>
    <div class="delete"><a style="float: right;" href="javascript:void(0);" onclick="del('<?php echo $album_id ?>', '<?php echo $comment->id ?>');" ><img src="<?php echo Yii::app()->request->baseUrl.'/images/delete.png'?>" /></a></div>
    <?php }?>
	<div class="time">
		<?php echo date('d F Y', strtotime($comment->creation_date)); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($comment->content)); ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>
<script type="text/javascript">
function del(album_id, comment_id){
    var url= "<?php echo Yii::app()->createUrl('album/delcomment/comment_id')?>"+ "/"+comment_id;
   
    if(!confirm('Are you sure you want to delete this comment?')) return false;
    new Request({
        url: url,
        method: "post",
       data:{
            'ajax': 'ajax',
            
        },
        onSuccess : function(responseHTML)
        {
            if(responseHTML > 0){
                window.location.href="<?php echo Yii::app()->createUrl('album/viewdetail/album_id')?>"+"/"+album_id;
                jQuery('div.flash_success').html('Comment has been deleted!');
            }
        		
        }
    }).send();
    return false;
    
}
</script>