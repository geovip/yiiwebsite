 <div id="slider">
     <h2>
    <a href="<?php echo Yii::app()->createUrl('album/listalbum')?>"><?php echo "All Albums";?></a>
    <?php 
        if(!Yii::app()->user->isGuest){?>           
    |
    <a href="<?php echo Yii::app()->createUrl('album/manage')?>"><?php echo "My Albums";?></a>
    |
    <a href="<?php echo Yii::app()->createUrl('album/create')?>"><?php echo "Upload";?></a>
    <?php }?> </h2>
 </div>
  <div class="clr"></div>
  <div class="body">
  
    <div class="body_resize">
    <?php $this->widget('zii.widgets.CListView', array(
    	'dataProvider'=>$dataProvider,
    	'itemView'=>'_list',
        'ajaxUpdate'=> false,
    	'template'=>"{items}\n{pager}"
    )); ?>
    
    </div>
    <div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
        
    <div class="clr"></div>
  </div>
    <script type="text/javascript">
  window.addEvent('domready', function(){
    
    var children= jQuery('#yw0 .items').children().size();
    jQuery('#yw0 .items').children().each(function(index, value) { 
        if((index+1)%3==0){
            jQuery(this).addClass('last');
        } 
    });
    
  });
  </script>