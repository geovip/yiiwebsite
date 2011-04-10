 <div id="slider">
    <h2><?php echo "My Album";?></h2>
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