<?php
$this->breadcrumbs=array(
	'Adsvertisments',
);

$this->menu=array(
	array('label'=>'Create Adsvertisment', 'url'=>array('create')),
	array('label'=>'Manage Adsvertisment', 'url'=>array('admin')),
);
?>

<h1>Adsvertisments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
