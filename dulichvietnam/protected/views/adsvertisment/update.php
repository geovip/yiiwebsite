<?php
$this->breadcrumbs=array(
	'Adsvertisments'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Adsvertisment', 'url'=>array('index')),
	array('label'=>'Create Adsvertisment', 'url'=>array('create')),
	array('label'=>'View Adsvertisment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Adsvertisment', 'url'=>array('admin')),
);
?>

<h1>Update Adsvertisment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>