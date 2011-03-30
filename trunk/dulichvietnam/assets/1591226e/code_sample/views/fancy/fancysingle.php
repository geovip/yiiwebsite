<?php
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
?>


<h2>Upload</h2>
<br />

<?php

    $statusBoxId = 'fancy-single';

    $this->widget('application.extensions.fancyupload.SFancySingleButton',
        array('name'=>'single',
               'statusBoxId'=>$statusBoxId,
               'targetLabel'=>'Change Picture',
               'options'=>array(
                    'target'=>'select-0',
                    'queued'=>false,                                //only one file uploaded
                    'multiple'=>false,                              //only select one file
                    'verbose'=>true,                                //remove in production
                    'url'=>$this->createUrl('fancy/uploadedSingle'), //send files to this controller/action
                    'typeFilter'=>array('Images (jpg, jpeg)'=>'*.jpg; *.jpeg'),  //only images
                    'instantStart'=>true,                           //start upload right after the selecion
                    'data'=>array('extradata'=>'yourvalue','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),  //accessible in the controller via $_POST['extradata'] or $_POST['whatever_you_put_in_the_key']
                    'appendCookieData'=>true,  //this will send PHPSESSID automatically
                ),

                'callbacks'=>array(
                    'onSelectSuccess'=>"function(files) {
                        //if (Browser.Platform.linux) window.alert('Warning: Due to a misbehaviour of Adobe Flash Player on Linux,the browser will probably freeze during the upload process.Since you are prepared now, the upload will start right away ...');
                        //    window.alert('Starting Upload - ' + files[0].name + '(' + Swiff.Uploader.formatUnit(files[0].size, 'b') + ')');
                            this.setEnabled(false);
                    }",

                    'onSelectFail'=>"function(files) {
                         window.alert(files[0].name + '(Erro: #' + files[0].validationError + ')');
                    }",


                    'onQueue'=>"function() {
                         if (!swf.uploading) return;
                         var size = Swiff.Uploader.formatUnit(swf.size, 'b');
                         link.set('html', swf.percentLoaded + '% - ' + size);
                    }",

                    'onLoad'=>"function() {
                        document.id('$statusBoxId').setStyle('background-image','url('+ document.id('imageurl').get('value')  +')');
                        document.id('$statusBoxId').setStyle('width','250px');
                        document.id('$statusBoxId').setStyle('height','280px');
                    }",



                    'onFileComplete'=>"function(file) {

                        if (file.response.error) {
                            window.alert('Upload Falhou ' + this.fileList[0].name + '. Tente novamente. (Erro: #' + this.fileList[0].response.code + ' ' + this.fileList[0].response.error + ')');
                        } else {
                            window.alert('Upload Concluído');
                            location.reload();
    //                        var imageb = JSON.decode(file.response.text, true).imageurl;
    //                        document.id('$statusBoxId').setStyle('background-image','url('+imageb+')');

                        }

                        file.remove();
                        this.setEnabled(true);
                    }",

                    'onComplete'=>"function() {
                        link.set('html', linkIdle);
                    }",

                )
    ));

?>