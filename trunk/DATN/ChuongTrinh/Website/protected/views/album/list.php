<style type="text/css">
#page1 .text {padding: 7px 0 0 36px; text-align:left;}
</style>
<div class="text">
	<img src="<?php echo Yii::app()->request->baseUrl ?>/images/text1.jpg" alt="">
	<h2>The Best Offers</h2>
	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
	<a href="#" class="button">Read More</a>
</div>
<div class="img"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/img2.jpg" alt=""></div>
<div class="inner_copy">More <a href="http://www.templatemonster.com/">Website Templates</a> at TemplateMonster.com!</div>
<a href="<?php echo Yii::app()->createUrl('album/listalbum')?>"><?php echo "All Album";?></a>
    <?php 
        if(!Yii::app()->user->isGuest){?>           
    |
    <a href="<?php echo Yii::app()->createUrl('album/manage')?>"><?php echo "My Album";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload";?></a>
    <?php }?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_listalbum',
	'template'=>"{items}\n{pager}",
)); ?>
<br />
<div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>