<?php
$this->breadcrumbs=array(
	'Searchs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Searchs', 'url'=>array('index')),
	array('label'=>'Create Searchs', 'url'=>array('create')),
	array('label'=>'View Searchs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Searchs', 'url'=>array('admin')),
);
?>

<h1>Update Searchs <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>