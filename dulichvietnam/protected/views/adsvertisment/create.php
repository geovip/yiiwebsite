<?php
$this->breadcrumbs=array(
	'Adsvertisments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Adsvertisment', 'url'=>array('index')),
	array('label'=>'Manage Adsvertisment', 'url'=>array('admin')),
);
?>

<h1>Create Adsvertisment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>