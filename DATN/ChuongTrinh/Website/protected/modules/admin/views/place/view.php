<h1>View Place #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
		'content',
		'type',
		'address',
		'img_file',
		'lat',
		'long',
		'creation_date',
		'modified_date',
	),
)); ?>
