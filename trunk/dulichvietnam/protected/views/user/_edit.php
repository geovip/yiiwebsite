<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-demo',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
    
)); ?>
	<ol>
        <li>
            <?php echo $form->labelEx($model,'username'); ?>
    		<?php echo $form->textField($model,'username',array('id'=>'username', 'size'=>45,'maxlength'=>45, 'disabled'=>'disabled')); ?>
    	
        </li>
        <li>
            <?php echo $form->labelEx($model,'displayname'); ?>
    		<?php echo $form->textField($model,'displayname',array('id'=>'displayname', 'size'=>45,'maxlength'=>45)); ?>
    	
        </li>
        
        <li>
            <?php echo $form->labelEx($model,'email'); ?>
    		<?php echo $form->textField($model,'email',array('id'=>'email', 'size'=>45,'maxlength'=>45, 'disabled'=>'disabled')); ?>
    		
        </li>
        <li>
            <?php echo $form->labelEx($model,'phone'); ?>
    		<?php echo $form->textField($model,'phone',array('id'=>'phone', 'size'=>45,'maxlength'=>45)); ?>
    		
        </li>
        
        <li>
            <?php echo $form->labelEx($model,'photo_id'); ?>
    		<?php echo CHtml::activeFileField($model,'photo_id', array('id'=>'photo')); ?>
            
    		
        </li>
        <li>
            <?php echo $form->labelEx($model,'website'); ?>
    		<?php echo $form->textField($model,'website',array('id'=>'website', 'size'=>45,'maxlength'=>45)); ?>
    		
        </li>
        <li>
            <?php echo $form->labelEx($model,'information'); ?>
    		<?php echo $form->textArea($model,'information',array('id'=>'information', 'cols'=>45, 'rows'=>5)); ?>
    		
        </li>
        <li class="buttons">
            <?php echo CHtml::button($model->isNewRecord ? 'Sign up' : 'Save', array('id'=>'signup', 'type'=>'submit')); ?>
        </li>
    </ol>

<?php $this->endWidget(); ?>

</div><!-- form -->