<style type="text/css">
.errorMessage{color: red; padding-left:129px;}
</style>
<section id="content">
<article class="col2 pad_left1">
    <h2>Sign In</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
    	//'id'=>'login-form',
        'id'=> 'form-demo',
    	'enableAjaxValidation'=>true,
    )); ?>
    <div>
        <p>Please fill out the following form with your login credentials:</p>
        <div class="wrapper">
            <?php echo $form->textField($model,'username',array('class'=>'input')); ?>
            <?php echo $form->labelEx($model,'username'); ?>:
            <?php echo $form->error($model,'username'); ?>
        </div>
        <div class="wrapper">
            <?php echo $form->passwordField($model,'password', array('class'=>'input')); ?>
            <?php echo $form->labelEx($model,'password'); ?>:
            <?php echo $form->error($model,'password'); ?>
        </div>
        <p class="hint">
                Hint: You may login with <tt>huynhnv/huynhnv88</tt> or <tt>dunghd/dunghd88</tt>.
        </p>
        <div class="wrapper">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
    		<?php echo $form->error($model,'rememberMe'); ?>
        </div>
        <?php echo CHtml::submitButton('Login', array('class'=>'button')); ?>
    </div>
    <?php $this->endWidget(); ?>
</article>
</section>