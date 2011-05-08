<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-form',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('enctype' => 'multipart/form-data')
            ));
    ?>
    <fieldset>
        <legend>Add A User</legend>
        <div class="input_field">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model, 'username', array('id' => 'username', 'size' => 45, 'maxlength' => 45)); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <div class="input_field">
            <?php echo $form->labelEx($model, 'displayname'); ?>
            <?php echo $form->textField($model, 'displayname', array('id' => 'displayname', 'size' => 45, 'maxlength' => 45)); ?>
            <?php echo $form->error($model, 'displayname'); ?>
        </div>
        <div class="input_field">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('id' => 'password', 'size' => 45, 'maxlength' => 45)); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
        <div class="input_field">
           <?php echo $form->labelEx($model, 'email'); ?>
          <?php echo $form->textField($model, 'email', array('id' => 'email', 'size' => 45, 'maxlength' => 45)); ?>
          <?php echo $form->error($model, 'email'); ?>
        </div>
        <div class="input_field">
           <?php echo $form->labelEx($model, 'phone'); ?>
           <?php echo $form->textField($model, 'phone', array('id' => 'phone', 'size' => 45, 'maxlength' => 45)); ?>
           <?php echo $form->error($model, 'phone'); ?>
        </div>
        <div class="input_field">
           <?php echo $form->labelEx($model, 'photo_id'); ?>
           <?php echo CHtml::activeFileField($model, 'photo_id', array('id' => 'photo')); ?>
           <?php echo $form->error($model, 'phone'); ?>
        </div>
        <div class="input_field no_margin_bottom">
            <?php echo CHtml::button($model->isNewRecord ? 'Add' : 'Save', array('id' => 'signup', 'type' => 'submit','class' => 'submit')); ?>
        </div>        
    </fieldset>
    
<?php $this->endWidget(); ?>

</div><!-- form -->