
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/source/Swiff.Uploader.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/source/Fx.ProgressBar.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/source/FancyUpload2.js"></script>


<style type="text/css">
.swiff-uploader-box a {
	display: none !important;
}
 
/* .hover simulates the flash interactions */
a:hover, a.hover {
	color: red;
}
 
#demo-status {

	width: 420px;
	
}
 
#demo-status .progress {
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/progress-bar/progress.gif) no-repeat scrollbar;
	background-position: +50% 0;
	margin-right: 0.5em;
	vertical-align: middle;
}
 
#demo-status .progress-text {
	font-size: 0.9em;
	font-weight: bold;
}
 
#demo-list {
	list-style: none;
	width: 450px;
	margin: 0;
}
 
#demo-list li.validation-error {
	padding-left: 44px;
	display: block;
	clear: left;
	line-height: 40px;
	color: #8a1f11;
	cursor: pointer;
	border-bottom: 1px solid #fbc2c4;
	background: #fbe3e4 url(<?php echo Yii::app()->request->baseUrl; ?>/images/failed.png) no-repeat 4px 4px;
}
 
#demo-list li.file {
	border-bottom: 1px solid #eee;
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/file.png) no-repeat 4px 4px;
	overflow: auto;
}
#demo-list li.file.file-uploading {
	background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/uploading.png);
	background-color: #D9DDE9;
}
#demo-list li.file.file-success {
	background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/success.png);
}
#demo-list li.file.file-failed {
	background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/failed.png);
}
 
#demo-list li.file .file-name {
	font-size: 1.2em;
	margin-left: 44px;
	display: block;
	clear: left;
	line-height: 40px;
	height: 40px;
	font-weight: bold;
}
#demo-list li.file .file-size {
	font-size: 0.9em;
	line-height: 18px;
	float: right;
	margin-top: 2px;
	margin-right: 6px;
}
#demo-list li.file .file-info {
	display: block;
	margin-left: 44px;
	font-size: 0.9em;
	line-height: 20px;
	clear
}
#demo-list li.file .file-remove {
	clear: right;
	float: right;
	line-height: 18px;
	margin-right: 6px;
}

</style>
<div class="form">
    

    <form action="<?php echo Yii::app()->request->baseUrl; ?>/?r=album/create" method="post" enctype="multipart/form-data" id="form-demo">
    <ol>
        <li>
            <label>Choose Album</label>
            
            <select id="album" name="Album[album_id]">
                
            <?php if(!empty($this->albums)){
                    foreach($this->albums as $key=>$value){?>
                        <option value="<?php echo $key ?>"><?php echo $value; ?></option>
            <?php }     
                 
            }  
            else{?>
            <option value="0">Create new album</option>
            <?php }
            ?>  
            </select>
            <a class="add_album" href="javascript:void(0);" ><img id="img_add_album" src="<?php echo Yii::app()->request->baseUrl; ?>/images/folder_add.png" /></a>
        </li>
        <li>
            <label>Choose category</label>
            <select id="category" name="Album[category_id]">
           
            <?php if(!empty($this->categories)){
                    foreach($this->categories as $key=>$value){?>
                        <option value="<?php echo $key ?>"><?php echo $value; ?></option>
            <?php }      
            }  
            ?>    
            </select>
        </li>
         <div id="create_album" style="display: none;">
        <li>
           
            
                <label>Title</label>
                <input id="title" type="text" class="text" name="Album[title]" />
                <label style="color: red;" id="error_title"></label>
                <label> Description</label>
                <textarea id="description" name="Album[description]" cols="45" rows="6"></textarea>
                
                <input type="button" value="Save" onclick="javascript:save_create_album();" />
               
            
        </li>
        </div>
        
    </ol>
    
	<fieldset id="demo-fallback">
		<legend>File Upload</legend>
		<p>
			This form is just an example fallback for the unobtrusive behaviour of FancyUpload.
			If this part is not changed, something must be wrong with your code.
		</p>
		<label for="demo-photoupload">
			Upload a Photo:
			<input type="file" name="Filedata" />
		</label>
	</fieldset>
 
	<div id="demo-status" class="hide">
		<p>
			<a href="#" id="demo-browse">Browse Files</a> |
			<a href="#" id="demo-clear">Clear List</a> |
			<a href="#" id="demo-upload">Start Upload</a>
		</p>
		<div>
			<strong class="overall-title"></strong><br />
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/progress-bar/bar.gif" class="progress overall-progress" />
		</div>
		<div>
			<strong class="current-title"></strong><br />
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/progress-bar/bar.gif" class="progress current-progress" />
		</div>
		<div class="current-text"></div>
	</div>
 
	<ul id="demo-list"></ul>
    <input type="hidden" value="<?php echo $this->user_id ?>" id="user_id" />
    
    
    <input type="hidden" id="form_upload" value="<?php echo Yii::app()->request->baseUrl; ?>/?r=album/files" />
</form>



</div><!-- form -->
<script type="text/javascript">
function save_create_album(){
    
    var url="<?php echo Yii::app()->request->baseUrl ?>/?r=album/createalbum";
    var title= $('title').value;
    var valid= checkValid('#title', 160);
    var description= $('description').value;
    
    if(valid==false){
        $('error_title').set('html', 'Title is not empty and no more than 160 characters');
    }
    if(valid){
        new Request({
            url: url,
            method: "post",
           data:{
                'ajax': 'ajax',
                'title': title,
                'description': description
            },
            onSuccess : function(responseHTML)
            {
                if(responseHTML > 0){
                    jQuery('#album').prepend('<option value="'+responseHTML+'" selected >'+title+'</option>');
                    $('title').set('value', '');
                    $('description').set('value', '');
                    $('create_album').style.display="none";
                    $('error_title').set('html', '');
                }
            		
            }
        }).send();
    
    }
    
}
</script>
<script type="text/javascript">
window.addEvent('domready', function() { // wait for the content
    $('img_add_album').addEvent('click', function(){
        //alert('hi');
        jQuery('#create_album').toggle();
    });
    
	// our uploader instance 
    
	var up = new FancyUpload2($('demo-status'), $('demo-list'), { // options object
		// we console.log infos, remove that in production!!
		verbose: true,
 
		// url is read from the form, so you just have to change one place
		url: $('form_upload').value,
 
		// path to the SWF file
		path: '<?php echo Yii::app()->request->baseUrl; ?>/js/source/Swiff.Uploader.swf',
 
		// remove that line to select all files, or edit it, add more items
		typeFilter: {
			'Images (*.jpg, *.jpeg, *.gif, *.png)': '*.jpg; *.jpeg; *.gif; *.png'
		},
 
		// this is our browse button, *target* is overlayed with the Flash movie
		target: 'demo-browse',
        
        onBeforeStart: function() {
            up.setOptions({
            data:{
                'ul': jQuery('#album').val(),
                'user_id': jQuery('#user_id').val(),
                'category_id': jQuery('#category').val() 
            } 
            });
        },
		// graceful degradation, onLoad is only called if all went well with Flash
		onLoad: function() {
			$('demo-status').removeClass('hide'); // we show the actual UI
			$('demo-fallback').destroy(); // ... and hide the plain form
 
			// We relay the interactions with the overlayed flash to the link
			this.target.addEvents({
				click: function() {
					return false;
				},
				mouseenter: function() {
					this.addClass('hover');
				},
				mouseleave: function() {
					this.removeClass('hover');
					this.blur();
				},
				mousedown: function() {
					this.focus();
				}
			});
 
			// Interactions for the 2 other buttons
 
			$('demo-clear').addEvent('click', function() {
				up.remove(); // remove all files
				return false;
			});
 
			$('demo-upload').addEvent('click', function() {
                
				up.start(); // start upload
                
				//return false;
			});
		},
 
		// Edit the following lines, it is your custom event handling
 
		/**
		 * Is called when files were not added, "files" is an array of invalid File classes.
		 * 
		 * This example creates a list of error elements directly in the file list, which
		 * hide on click.
		 */ 
		onSelectFail: function(files) {
			files.each(function(file) {
				new Element('li', {
					'class': 'validation-error',
					html: file.validationErrorMessage || file.validationError,
					title: MooTools.lang.get('FancyUpload', 'removeTitle'),
					events: {
						click: function() {
							this.destroy();
						}
					}
				}).inject(this.list, 'top');
			}, this);
		},
        
		/**
		 * This one was directly in FancyUpload2 before, the event makes it
		 * easier for you, to add your own response handling (you probably want
		 * to send something else than JSON or different items).
		 */
		onFileSuccess: function(file, response) {
            
			var json = new Hash(JSON.decode(response, true) || {});
 
			if (json.get('status') == '1') {
				file.element.addClass('file-success');
				file.info.set('html', '<strong>Image was uploaded:</strong> ' + json.get('width') + ' x ' + json.get('height') + 'px, <em>' + json.get('mime') + '</em>)');
                window.location.href= "<?php echo Yii::app()->request->baseUrl ?>/?r=album/listalbum";
			} else {
				file.element.addClass('file-failed');
				file.info.set('html', '<strong>An error occured:</strong> ' + (json.get('error') ? (json.get('error') + ' #' + json.get('code')) : response));
			}
		},
 
		/**
		 * onFail is called when the Flash movie got bashed by some browser plugin
		 * like Adblock or Flashblock.
		 */
		onFail: function(error) {
		  
			switch (error) {
				case 'hidden': // works after enabling the movie and clicking refresh
					alert('To enable the embedded uploader, unblock it in your browser and refresh (see Adblock).');
					break;
				case 'blocked': // This no *full* fail, it works after the user clicks the button
					alert('To enable the embedded uploader, enable the blocked Flash movie (see Flashblock).');
					break;
				case 'empty': // Oh oh, wrong path
					alert('A required file was not found, please be patient and we fix this.');
					break;
				case 'flash': // no flash 9+ :(
					alert('To enable the embedded uploader, install the latest Adobe Flash plugin.')
			}
		}
 
	});
    
});
</script>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery_check_form.js"></script>