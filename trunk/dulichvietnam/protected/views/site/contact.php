<style type="text/css">
#form-demo a{float: none;}
.errorSummary li{color: red;}
</style>
<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
?>
<section id="content">
    <article class="col2 pad_left1">
        <h2>Contact Us</h2>
        <div>
        <?php if (Yii::app()->user->hasFlash('contact')): ?>

            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
            </div>

        <?php else: ?>
        
            <p>
                If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
            </p>

                <?php $form = $this->beginWidget('CActiveForm',array(
        	'id'=>'form-demo',
        	'enableAjaxValidation'=>false
                 )); ?>
                <div>
                <p class="note">Fields with <span class="required">*</span> are required.</p>
                

                <?php echo $form->errorSummary($model); ?>

                <div class="wrapper">
                    
                    <?php echo $form->textField($model, 'name', array('class'=>'input')); ?>
                    <?php echo $form->labelEx($model, 'name'); ?>
                </div>

                <div class="wrapper">
                    
                    <?php echo $form->textField($model, 'email', array('class'=>'input')); ?>
                    <?php echo $form->labelEx($model, 'email'); ?>
                </div>

                <div class="wrapper">
                    
                    <?php echo $form->textField($model, 'subject', array('class'=>'input', 'size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->labelEx($model, 'subject'); ?>
                </div>

                <div class="wrapper">
                    
                    <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50)); ?>
                    <?php echo $form->labelEx($model, 'body'); ?>                    
                </div>

                <?php if (CCaptcha::checkRequirements()): ?>
                    <div class="wrapper">
                            <?php echo $form->textField($model, 'verifyCode', array('class'=>'input')); ?>
                            <?php echo $form->labelEx($model, 'verifyCode'); ?>
                            
                        
                    </div>
                    <div class="wrapper">
                    <label></label>
                    <?php $this->widget('CCaptcha'); ?>
                    <div class="hint">Please enter the letters as they are shown in the image above.
                        <br/>Letters are not case-sensitive.
                    </div>
                    </div>
                <?php endif; ?>

                <?php echo CHtml::submitButton('Submit', array('class'=>'button')); ?>
                </div><!-- form -->   
                <?php $this->endWidget(); ?>                
            

        <?php endif; ?>
        </div>
    </article>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
</section>