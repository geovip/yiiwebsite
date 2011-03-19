<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'resource_type'); ?>
		<?php echo $form->textField($model,'resource_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'resource_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resource_id'); ?>
		<?php echo $form->textField($model,'resource_id'); ?>
		<?php echo $form->error($model,'resource_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poster_type'); ?>
		<?php echo $form->textField($model,'poster_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'poster_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poster_id'); ?>
		<?php echo $form->textField($model,'poster_id'); ?>
		<?php echo $form->error($model,'poster_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->