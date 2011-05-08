<section id="content">
    <article class="col2 pad_left1">
		<h2>Sign Up</h2>
		<?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'form-demo',
        	'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype' => 'multipart/form-data')
            
        )); ?>
			<div>
            
				<div class="wrapper">
                    <?php echo $form->textField($model,'username',array('id'=>'username', 'class'=>'input')); ?>
                    <?php echo $form->labelEx($model,'username'); ?>:
                    <div class="error-message" id="username-err"></div>
                </div>
				<div class="wrapper">
                    <?php echo $form->textField($model,'displayname',array('id'=>'displayname', 'class'=>'input')); ?>
                    <?php echo $form->labelEx($model,'displayname'); ?>:
                    <?php echo $form->error($model,'displayname'); ?>
                </div>
				<div class="wrapper">
                    <?php echo $form->passwordField($model,'password',array('id'=>'password', 'class'=>'input')); ?>
                    <?php echo $form->labelEx($model,'password'); ?>:
                    <div class="error-message" id="password1-err"></div>
                </div>
                <div class="wrapper">
                    <input id="retype_pass" type="password" class="input" />                    
                    <?php echo "Retype Password";?>:
                    <div class="error-message" id="password2-err"></div>
                </div>
                <div class="wrapper">
                    
                    <?php echo $form->textField($model,'email',array('id'=>'email', 'class'=>'input')); ?>
                    <?php echo $form->labelEx($model,'email'); ?>:
                    <div class="error-message" id="email-err"></div>
                </div>
                <div class="wrapper">
                    <?php echo $form->textField($model,'phone',array('id'=>'phone', 'class'=>'input')); ?>
                    <?php echo $form->labelEx($model,'phone'); ?>:
                    <?php echo $form->error($model,'phone'); ?>
                </div>
                <div class="wrapper">
                    <?php echo $form->labelEx($model,'photo_id'); ?>:
                    <?php echo CHtml::activeFileField($model,'photo_id', array('id'=>'photo', 'class'=>'file')); ?>
                    <div class="error-message" id="photo-err"></div>
                </div>
                <?php echo CHtml::button($model->isNewRecord ? 'Sign up' : 'Save', array('id'=>'signup', 'type'=>'button', 'class'=>'button')); ?>
			</div>
        <?php $this->endWidget(); ?>
	</article>
</section>


