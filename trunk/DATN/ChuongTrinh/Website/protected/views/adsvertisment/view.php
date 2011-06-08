<?php
$this->breadcrumbs=array(
	'Adsvertisments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Adsvertisment', 'url'=>array('index')),
	array('label'=>'Create Adsvertisment', 'url'=>array('create')),
	array('label'=>'Update Adsvertisment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Adsvertisment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Adsvertisment', 'url'=>array('admin')),
);
?>

<h1>View Adsvertisment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url',
		'img_file',
		'creation_date',
		'modified_date',
	),
)); ?>
