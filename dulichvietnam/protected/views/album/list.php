<h2>
    <a href="<?php echo Yii::app()->createUrl('album/listalbum')?>"><?php echo "All Album";?></a>
    <?php 
        if(!Yii::app()->user->isGuest){?>           
    |
    <a href="<?php echo Yii::app()->createUrl('album/manage')?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload";?></a>
    <?php }?> </h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_listalbum',
	'template'=>"{items}\n{pager}",
)); ?>
