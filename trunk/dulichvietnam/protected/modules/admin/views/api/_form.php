<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'api-form',
                'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="input_field">
        <?php echo $form->labelEx($model, 'user_id'); ?>
<?php echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
<?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="input_field">
        <?php echo $form->labelEx($model, 'key'); ?>
        <div id="Api_key_div"> <?php echo $form->textField($model, 'key', array('size' => 6, 'maxlength' => 6)); ?></div>
       
        <?php
        echo CHtml::ajaxLink(
                'Generate api', array('api/key'), array(
            'update' => '#Api_key_div'
                )
        );
        ?>
<?php echo $form->error($model, 'key'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'submit')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->