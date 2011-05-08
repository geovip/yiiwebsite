<h1>Administrator Login</h1>
<div id="box"> 
<?php
$form = $this->beginWidget('CActiveForm', array(
            //'id'=>'login-form',
            'id' => 'login-form',
            'enableAjaxValidation' => true,
        ));
?>
    <?php echo $form->error($model,'username'); ?>
        <?php echo $form->error($model,'password'); ?>
    <p class="main"> 
        <label>Username: </label> 
        <?php echo $form->textField($model, 'username'); ?>
        <label>Password: </label> 
        <?php echo $form->passwordField($model, 'password'); ?>        
    </p> 
    <p class="space"> 
         <?php echo CHtml::submitButton('Login',array('class'=>'login')); ?>
    </p> 			
<?php $this->endWidget(); ?>
</div> 