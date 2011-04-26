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
	<div class="time">
		<?php echo date('d F Y', strtotime($comment->creation_date)); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($comment->content)); ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>