<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'place-form',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('enctype' => 'multipart/form-data')
            ));
    ?>
    <fieldset>
        <legend>Add A Place</legend>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="input_field">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="input_field">
            <?php echo $form->labelEx($model, 'address'); ?>
            <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>
        <div class="input_field">
            <?php echo $form->labelEx($model, 'img_file'); ?>
            <?php echo CHtml::activeFileField($model, 'img_file', array('id' => 'img_file')); ?>
            <?php echo $form->error($model, 'img_file'); ?>
        </div>
        <div class="input_field no_margin_bottom">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'submit')); ?>
            <?php echo CHtml::activeHiddenField($model,'lat',array('value'=>$_GET['lat'])); ?>
            <?php echo CHtml::activeHiddenField($model,'long',array('value'=>$_GET['long'])); ?>
        </div>
       </fieldset>     
        <?php $this->endWidget(); ?>

</div><!-- form -->