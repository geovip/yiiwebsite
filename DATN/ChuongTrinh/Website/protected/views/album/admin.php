<style type="text/css">
.menu ul{width: 425px;}
.grid-view table.items th {width: 28%;}
</style>
<?php
$this->breadcrumbs=array(
	'Albums'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Album', 'url'=>array('index')),
	array('label'=>'Create Album', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('album-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="slider">
    <h2>Manage Albums</h2>
</div>
<div class="clr"></div>
<div class="body">
    <div class="body_resize">
        <div class="right">
            <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
            </p>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'album-grid',
            	'dataProvider'=>$model->search(),
            	'filter'=>$model,
            	'columns'=>array(
            		//'id',
            		'title',
            		'description',
            		//'owner_type',
            		//'user_id',
            		//'category_id',
            		/*
            		'creation_date',
            		'modified_date',
            		'photo_id',
            		'view_count',
            		'comment_count',
            		'search',
            		'type',
            		*/
            		array(
            			'class'=>'CButtonColumn',
                        'buttons'=>array
                        (
                            'view' => array
                            (
                                
                                //'url'=> Yii::app()->request->baseUrl.'/?r=user/edit&user_id='.$data->id
                                'url'=>'Yii::app()->createUrl("album/viewdetail", array("album_id"=>$data->id))',
                            ),
                            'update' => array
                            (
                                
                                //'url'=> Yii::app()->request->baseUrl.'/?r=user/edit&user_id='.$data->id
                                'url'=>'Yii::app()->createUrl("album/edit", array("album_id"=>$data->id))',
                            ),
                            'delete' => array
                            (
                                
                                //'url'=> Yii::app()->request->baseUrl.'/?r=user/edit&user_id='.$data->id
                                'url'=>'Yii::app()->createUrl("album/del", array("album_id"=>$data->id))',
                            )
                            
                        ),
            		),
            	),
            )); ?>

        </div>
        <div class="left">
        <div id="sidebar">
			<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
        </div>
        </div>
    </div>


