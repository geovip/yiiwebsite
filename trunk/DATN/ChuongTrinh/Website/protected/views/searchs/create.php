<?php
$this->breadcrumbs=array(
	'Searchs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Searchs', 'url'=>array('index')),
	array('label'=>'Manage Searchs', 'url'=>array('admin')),
);
?>

<h1>Create Searchs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>