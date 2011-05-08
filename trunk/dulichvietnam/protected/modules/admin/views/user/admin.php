<style type="text/css">
    .grid-view .filters input, .grid-view .filters select {
        width: 90%;
        border: 1px solid #CCC;
    }    
</style>
<h1>Manage User</h1>
<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'username',
        'email',
        //'phone',
        'displayname',
        //'photo_id',
        /*
          'password',
          'salt',
          'creation_date',
          'modified_date',
         */
        array(
            'class' => 'CButtonColumn',
            'buttons' => array
                (
                'update' => array
                    (
                    //'url'=> Yii::app()->request->baseUrl.'/?r=user/edit&user_id='.$data->id
                    'url' => 'Yii::app()->createUrl("user/edit", array("user_id"=>$data->id))',
                )
            ),
        ),
    ),
));
?>
