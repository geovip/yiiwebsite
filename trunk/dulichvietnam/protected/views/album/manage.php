 <div id="slider">
    <h2><?php echo "My Album";?></h2>
 </div>
  <div class="clr"></div>
  <div class="body">
  
    <div class="body_resize">
    
    
    <?php $this->widget('zii.widgets.CListView', array(
    	'dataProvider'=>$dataProvider,
    	'itemView'=>'_list',
    	'template'=>"{items}\n{pager}"
    )); ?>
    
   
    </div>
    
  </div>