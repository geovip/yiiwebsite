<style type="text/css">
.menu ul{width: 425px;}
.grid-view table.items th {width: 28%;}
</style>
<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

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
<div id="slider">
    <h2>Manage Users</h2>
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
        	'id'=>'user-grid',
        	'dataProvider'=>$model->search(),
        	'filter'=>$model,
        	'columns'=>array(
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
        			'class'=>'CButtonColumn',
                    'buttons'=>array
                    (
                        'update' => array
                        (
                            
                            //'url'=> Yii::app()->request->baseUrl.'/?r=user/edit&user_id='.$data->id
                            'url'=>'Yii::app()->createUrl("user/edit", array("user_id"=>$data->id))',
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
</div>


