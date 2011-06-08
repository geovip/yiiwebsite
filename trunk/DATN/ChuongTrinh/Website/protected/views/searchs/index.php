<?php
$this->breadcrumbs=array(
	'Searchs',
);

$this->menu=array(
	array('label'=>'Create Searchs', 'url'=>array('create')),
	array('label'=>'Manage Searchs', 'url'=>array('admin')),
);
?>

<h1>Searchs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
