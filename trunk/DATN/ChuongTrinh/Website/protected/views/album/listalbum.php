<style type="text/css">
#page1 .text {padding: 7px 0 0 36px; text-align:left;}
a:hover, a.hover {
    color: red;
}
</style>

<div class="inner_copy">More <a href="http://www.templatemonster.com/">Website Templates</a> at TemplateMonster.com!</div>
<h3>
<a href="<?php echo Yii::app()->createUrl('album/listalbum')?>"><?php echo "All Album";?></a>
    <?php 
        if(!Yii::app()->user->isGuest){?>           
    |
    <a href="<?php echo Yii::app()->createUrl('album/manage')?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload";?></a>
    <?php }?>
</h3>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_listalbum',
    'ajaxUpdate'=> false,
	'template'=>"{items}\n{pager}",
)); ?>
<br />
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
