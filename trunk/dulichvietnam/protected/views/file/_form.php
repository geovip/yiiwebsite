<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_file_id'); ?>
		<?php echo $form->textField($model,'parent_file_id'); ?>
		<?php echo $form->error($model,'parent_file_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_type'); ?>
		<?php echo $form->textField($model,'parent_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parent_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'storage_type'); ?>
		<?php echo $form->textField($model,'storage_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'storage_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'storage_path'); ?>
		<?php echo $form->textField($model,'storage_path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'storage_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'extension'); ?>
		<?php echo $form->textField($model,'extension',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'extension'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mime_major'); ?>
		<?php echo $form->textField($model,'mime_major',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'mime_major'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mime_minor'); ?>
		<?php echo $form->textField($model,'mime_minor',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'mime_minor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hash'); ?>
		<?php echo $form->textField($model,'hash',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'hash'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->