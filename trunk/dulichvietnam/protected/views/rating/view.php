<?php
$this->breadcrumbs=array(
	'Ratings'=>array('index'),
	$model->rating,
);

$this->menu=array(
	array('label'=>'List Rating', 'url'=>array('index')),
	array('label'=>'Create Rating', 'url'=>array('create')),
	array('label'=>'Update Rating', 'url'=>array('update', 'id'=>$model->rating)),
	array('label'=>'Delete Rating', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rating),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rating', 'url'=>array('admin')),
);
?>

<h1>View Rating #<?php echo $model->rating; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rating',
		'user_id',
		'photo_id',
	),
)); ?>
