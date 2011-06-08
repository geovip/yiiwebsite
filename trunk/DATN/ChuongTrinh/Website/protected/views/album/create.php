<style type="text/css">
a:hover, a.hover {
    color: red;
}</style>
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
<section id="content">
    <article class="col2 pad_left1">
        <h2>Add Photo</h2>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </article>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
</section>