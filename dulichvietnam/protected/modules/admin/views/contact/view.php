<h1>View Contact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'subject',
		'body',
		
		'creation_date'
	),
)); ?>
