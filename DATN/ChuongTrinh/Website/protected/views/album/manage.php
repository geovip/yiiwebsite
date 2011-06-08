<style type="text/css">
#page1 .text {padding: 7px 0 0 36px; text-align:left;}
a:hover, a.hover {
    color: red;
}
</style>
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
	'itemView'=>'_list',
    'ajaxUpdate'=> false,
	'template'=>"{items}\n{pager}",
)); ?>
<div style="display: none;" align="center" id="map" style="width: 100%; height: 500px"><br/></div>
<br />
<script type="text/javascript">
function delteAlbum(album_id){
    var url= "<?php echo Yii::app()->createUrl('album/del/album_id')?>"+ "/"+album_id;
   
    if(!confirm('Are you sure you want to delete this album?')) return false;
    new Request({
        url: url,
        method: "post",
       data:{
            'ajax': 'ajax',
            
        },
        onSuccess : function(responseHTML)
        {
            if(responseHTML > 0){
                window.location.href="<?php echo Yii::app()->createUrl('album/manage')?>";
                
            }
        		
        }
    }).send();
    return false;
    
}
</script>
