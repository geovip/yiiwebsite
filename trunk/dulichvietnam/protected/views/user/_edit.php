<section id="content">
    <article class="col2 pad_left1">
		<h2><?php echo "Edit";?></h2>
        <?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'form-demo',
        	'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype' => 'multipart/form-data')
            
        )); ?>
    <div>
        
            
        <div class="wrapper">
            
    		<?php echo $form->textField($model,'username',array('id'=>'username', 'class'=>'input', 'disabled'=>'disabled')); ?>
            <?php echo $form->labelEx($model,'username'); ?>
        </div>
        <div class="wrapper">
            
    		<?php echo $form->textField($model,'displayname',array('id'=>'displayname', 'class'=>'input')); ?>
    	    <?php echo $form->labelEx($model,'displayname'); ?>
        </div>
        <div class="wrapper">
                    <?php echo $form->passwordField($model,'password',array('id'=>'password', 'class'=>'input')); ?>
                    <?php echo $form->labelEx($model,'password'); ?>:
                    <div class="error-message" id="password1-err"></div>
                </div>
         <div class="wrapper">
            
    		<?php echo $form->textField($model,'email',array('id'=>'email', 'class'=>'input', 'disabled'=>'disabled')); ?>
    		<?php echo $form->labelEx($model,'email'); ?>
        </div>
        <div class="wrapper">
            
    		<?php echo $form->textField($model,'phone',array('id'=>'phone', 'class'=>'input')); ?>
    		<?php echo $form->labelEx($model,'phone'); ?>
        </div>                
        <div class="wrapper">
            <?php echo $form->labelEx($model,'photo_id'); ?>
    		<?php echo CHtml::activeFileField($model,'photo_id', array('id'=>'photo', 'class'=>'file')); ?>    		
        </div>
        <div class="wrapper">
            
    		<?php echo $form->textField($model,'website',array('id'=>'website', 'class'=>'input')); ?>
    		<?php echo $form->labelEx($model,'website'); ?>
        </div>
        <div class="wrapper">
            <?php echo $form->labelEx($model,'information'); ?>
    		<?php echo $form->textArea($model,'information',array('id'=>'information', 'cols'=>45, 'rows'=>5)); ?>
    		
        </div>
        
        <?php echo CHtml::button($model->isNewRecord ? 'Sign up' : 'Save', array('id'=>'signup', 'type'=>'submit', 'class'=>'button')); ?>
     
    </div>

    <?php $this->endWidget(); ?>
    </article>
</section>
