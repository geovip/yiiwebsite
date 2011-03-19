<?php
$this->breadcrumbs=array(
	'Ratings'=>array('index'),
	$model->rating=>array('view','id'=>$model->rating),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rating', 'url'=>array('index')),
	array('label'=>'Create Rating', 'url'=>array('create')),
	array('label'=>'View Rating', 'url'=>array('view', 'id'=>$model->rating)),
	array('label'=>'Manage Rating', 'url'=>array('admin')),
);
?>

<h1>Update Rating <?php echo $model->rating; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>