<div class="">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
    
		<input type="hidden" value="<?php echo $album_id ?>" name="Comment[album_id]" />
		<?php echo $form->textArea($model,'content',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->