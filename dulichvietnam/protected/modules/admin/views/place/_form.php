<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/wysiwyg.js"></script>
<script type="text/javascript">
    $().ready(function(){
        $('#Place_content').wysiwyg();      
    });
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript"> 
  var geocoder;
  $(document).ready(function(){
      $('#Place_address').change(function(){
            var address = jQuery(this).val();
            geocoder = new google.maps.Geocoder();   
            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {  
                 var location = new String(results[0].geometry.location);                 
                 var latlngStr = location.split(",",2);
                 var lat = parseFloat(latlngStr[0].substring(1));
                 var lng = parseFloat(latlngStr[1]);
                 $('#Place_lat').val(lat);
                 $('#Place_long').val(lng);
              } else {
                alert("Geocode was not successful for the following reason: " + status);
              }
            });
        });
  });  

</script> 
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'place-form',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('enctype' => 'multipart/form-data')
            ));
    ?>
    <fieldset>
        <legend>Add A Place</legend>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <div class="input_field">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('coffee' => 'coffee','shop' => 'shop','company'=>'company','restaurant' => 'restaurant')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>    
        <div class="input_field">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="input_field">
            <?php echo $form->labelEx($model, 'address'); ?>
            <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>
        
        <div class="input_field">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="input_field">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
        
        <div class="input_field">
            <?php echo $form->labelEx($model, 'img_file'); ?>
            <?php echo CHtml::activeFileField($model, 'img_file', array('id' => 'img_file')); ?>
            <?php echo $form->error($model, 'img_file'); ?>
        </div>
        <div class="input_field no_margin_bottom">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'submit')); ?>
            <?php echo CHtml::activeHiddenField($model,'lat',array('value'=>$_GET['lat'])); ?>
            <?php echo CHtml::activeHiddenField($model,'long',array('value'=>$_GET['long'])); ?>
        </div>
       </fieldset>     
        <?php $this->endWidget(); ?>

</div><!-- form -->