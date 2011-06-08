<?php
$this->breadcrumbs=array(
	'Searchs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Searchs', 'url'=>array('index')),
	array('label'=>'Create Searchs', 'url'=>array('create')),
	array('label'=>'Update Searchs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Searchs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Searchs', 'url'=>array('admin')),
);
?>

<h1>View Searchs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'title',
		'description',
		'keywords',
		'hidden',
	),
)); ?>
