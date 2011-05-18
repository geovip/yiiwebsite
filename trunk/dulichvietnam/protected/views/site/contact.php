<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
?>
<section id="content">
    <article class="col2 pad_left1">
        <h2>Contact Us</h2>

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
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name'); ?>
                </div>

                <div class="wrapper">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email'); ?>
                </div>

                <div class="wrapper">
                    <?php echo $form->labelEx($model, 'subject'); ?>
                    <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128)); ?>
                </div>

                <div class="wrapper">
                    <?php echo $form->labelEx($model, 'body'); ?>
                    <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50)); ?>
                </div>

                <?php if (CCaptcha::checkRequirements()): ?>
                    <div class="wrapper">
                        <?php echo $form->labelEx($model, 'verifyCode'); ?>
                        <div>
                            <?php $this->widget('CCaptcha'); ?>
                            <?php echo $form->textField($model, 'verifyCode'); ?>
                        </div>
                        <div class="hint">Please enter the letters as they are shown in the image above.
                            <br/>Letters are not case-sensitive.</div>
                    </div>
                <?php endif; ?>

                <?php echo CHtml::submitButton('Submit'); ?>
                </div><!-- form -->   
                <?php $this->endWidget(); ?>                
            

        <?php endif; ?>
    </article>
</section>