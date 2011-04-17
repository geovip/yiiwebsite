<style type="text/css">
ol li #LoginForm_rememberMe{float:left; margin-top: 6px;}
</style>
<div id="slider">
    <h2>Login</h2>
</div>

<div class="body">

<?php $form=$this->beginWidget('CActiveForm', array(
	//'id'=>'login-form',
    'id'=> 'form-demo',
	'enableAjaxValidation'=>true,
)); ?>
    <p>Please fill out the following form with your login credentials:</p>
	<ol>
        <li>
            <?php echo $form->labelEx($model,'username'); ?>
    		<?php echo $form->textField($model,'username'); ?>
    		<?php echo $form->error($model,'username'); ?>
        </li>
        <li>
            <?php echo $form->labelEx($model,'password'); ?>
    		<?php echo $form->passwordField($model,'password'); ?>
    		<?php echo $form->error($model,'password'); ?>
            <p class="hint">
                Hint: You may login with <tt>huynhnv/123456</tt> or <tt>dunghd/123456</tt>.
            </p>
        </li>
        <li>
            <?php echo $form->checkBox($model,'rememberMe'); ?>
    		<?php echo $form->label($model,'rememberMe'); ?>
    		<?php echo $form->error($model,'rememberMe'); ?>
        </li>
        <li class="buttons">
            <?php echo CHtml::submitButton('Login'); ?>
        </li>
    </ol>




<?php $this->endWidget(); ?>

</div>
<!-- form -->
