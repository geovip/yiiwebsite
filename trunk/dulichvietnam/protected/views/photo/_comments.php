<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">

	
	<div class="author">
		<?php echo $comment->getAuthorLink($user_id); ?> says:
	</div>
	<div class="time">
		<?php echo date('d F Y', strtotime($comment->creation_date)); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($comment->content)); ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>