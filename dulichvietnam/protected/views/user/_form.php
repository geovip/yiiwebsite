<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-demo',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
    
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<ol>
        <li>
            <?php echo $form->labelEx($model,'username'); ?>
    		<?php echo $form->textField($model,'username',array('id'=>'username', 'size'=>45,'maxlength'=>45)); ?>
    		<div class="error-message" id="username-err"></div>
        </li>
        <li>
            <?php echo $form->labelEx($model,'displayname'); ?>
    		<?php echo $form->textField($model,'displayname',array('id'=>'displayname', 'size'=>45,'maxlength'=>45)); ?>
    		<?php echo $form->error($model,'displayname'); ?>
        </li>
        <li>
            <?php echo $form->labelEx($model,'password'); ?>
    		<?php echo $form->passwordField($model,'password',array('id'=>'password', 'size'=>45,'maxlength'=>45)); ?>
    		<div class="error-message" id="password1-err"></div>
        </li>
        <li>
            <label><?php echo "Retype Password";?></label>
            <input id="retype_pass" type="password" size="45" maxlength="45" />
            <div class="error-message" id="password2-err"></div>
        </li>
        <li>
            <?php echo $form->labelEx($model,'email'); ?>
    		<?php echo $form->textField($model,'email',array('id'=>'email', 'size'=>45,'maxlength'=>45)); ?>
    		<div class="error-message" id="email-err"></div>
        </li>
        <li>
            <?php echo $form->labelEx($model,'phone'); ?>
    		<?php echo $form->textField($model,'phone',array('id'=>'phone', 'size'=>45,'maxlength'=>45)); ?>
    		<?php echo $form->error($model,'phone'); ?>
        </li>
        
        <li>
            <?php echo $form->labelEx($model,'photo_id'); ?>
    		<?php echo CHtml::activeFileField($model,'photo_id', array('id'=>'photo')); ?>
            <div class="error-message" id="photo-err"></div>
    		
        </li>
        
        <li class="buttons">
            <?php echo CHtml::button($model->isNewRecord ? 'Sign up' : 'Save', array('id'=>'signup', 'type'=>'button')); ?>
        </li>
    </ol>

<?php $this->endWidget(); ?>

</div><!-- form -->