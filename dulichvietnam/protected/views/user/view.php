<div id="slider">
    <h2>View User #<?php echo $model->id; ?></h2>
</div>
<div class="clr"></div>
<div class="body">
  
    <div class="body_resize">
        <?php $this->widget('zii.widgets.CDetailView', array(
        	'data'=>$model,
        	'attributes'=>array(
        		//'id',
        		'username',
        		'email',
        		'phone',
        		'displayname',
        		//'photo_id',
        		//'password',
        		//'salt',
        		'creation_date',
        		'modified_date',
        	),
        )); ?>
    </div>
</div>


