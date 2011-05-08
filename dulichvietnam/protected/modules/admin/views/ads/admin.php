<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('adsvertisment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<style type="text/css">
.grid-view .filters input, .grid-view .filters select {
width: 85%;
border: 1px solid #CCC;
}    
</style>
<h1>Manage Adsvertisments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'adsvertisment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'url',
		'img_file',
		'creation_date',
		'modified_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>