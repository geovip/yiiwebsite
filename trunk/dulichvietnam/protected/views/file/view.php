<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'Update File', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete File', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>View File #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_file_id',
		'type',
		'parent_type',
		'parent_id',
		'user_id',
		'creation_date',
		'modified_date',
		'storage_type',
		'storage_path',
		'extension',
		'name',
		'mime_major',
		'mime_minor',
		'size',
		'hash',
	),
)); ?>
