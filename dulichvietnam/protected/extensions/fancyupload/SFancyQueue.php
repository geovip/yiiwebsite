<?php
/**
* Yii extension implementing mootools fancyupload 3
*
* I borrowed code from EuploadifyWidget and JUI extensions.
*
* This widget generates an instance of fancyupload project, which is a Harald Kirschner's project (visit http://digitarald.de/project/fancyupload/)
*
* @author Scoob Junior
* @version 1.3
* @filesource SFancyUpload.php
*
*/
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'SBaseFancy.php');
class SFancyQueue extends SBaseFancy
{
   //***************************************************************************
   // Internal properties
   //***************************************************************************
    //properties for FancyQueue
    public  $clearButton;
    public  $uploadButton;
    public  $clearButtonLabel;
    public  $uploadButtonLabel;
    public  $listFilesId;


   //***************************************************************************
   // Valid options
   //***************************************************************************
   //inherit

   //***************************************************************************
   // Valid callbacks
   //***************************************************************************
   //inherit

   //***************************************************************************
   // Getters and Setters
   //***************************************************************************
   //inherit

    /**
    * Getter
    * @return array
    */
   //inherit

   /**
    * Setter
    * @param array $value callbacks
    */
   //inherit

    /**
    * Getter
    * @return array
    */
   //inherit

    /**
    * Setter
    * @param mixed $value
    */
   //inherit

   //***************************************************************************
   // Utilities
   //***************************************************************************
    /**
    * From JUI
    * Check callbacks against valid callbacks
    * @param array $value user's callbacks
    * @param array $validCallbacks valid callbacks
    */
   //inherit

    /**
    * From JUI extension
    * Check the options against the valid ones
    *
    * @param array $value user's options
    * @param array $validOptions valid options
    */
   //inherit

   /**
    * Encode options and callbacks
    * @return string
    */
   protected function createOptions()
   {
        if(!array_key_exists('path', $this->options))
            $this->options['path'] = $this->baseUrl . '/fancy/source/Swiff.Uploader.swf';

        $this->action = $this->options['url'];
        $this->progressBarImage  = $this->baseUrl.'/fancy/assets/progress-bar/bar.gif';


        //visual elements
        if(empty($this->listFilesId))
            $this->listFilesId = 'fancy-list';
        if(empty($this->statusBoxId))
            $this->statusBoxId = 'fancy-status';

        //buttons
        if(!array_key_exists('target', $this->options))
            $this->options['target'] = 'fancy-browse';  //selFile button

        if(empty($this->target))
            $this->target = $this->options['target'];

        if(empty($this->clearButton))
            $this->clearButton = 'fancy-clear';

        if(empty($this->uploadButton))
            $this->uploadButton = 'fancy-upload';

        if(empty($this->clearButtonLabel))
            $this->clearButtonLabel = 'Clear List';

        if(empty($this->uploadButtonLabel))
            $this->uploadButtonLabel = 'Start Upload';

        if(empty($this->targetLabel))
            $this->targetLabel = 'Select Files';

        $this->options = array_merge($this->options, $this->callbacks);
        $encodedOptions = self::encode($this->options);
        return $encodedOptions;
   }

    /**
    * Encode an array into a javascript array
    *
    * @param array $value
    * @return string
    */
   //inherit

   /**
    * Publishes the assets
    */
   //inherit

   /**
    * Registers the external javascript files
    */
   public function registerClientScripts()
   {
        if ($this->baseUrl === '')
            throw new CException(Yii::t('SFancyUpload', 'baseUrl must be set. This is done automatically by calling publishAssets()'));

        $this->clientScript = Yii::app()->getClientScript();
        $this->clientScript->registerScriptFile($this->baseUrl.'/fancy/source/mootools-1_2_4-fancy.js');
        $this->clientScript->registerScriptFile($this->baseUrl.'/fancy/source/Fx.ProgressBar.js');
        $this->clientScript->registerScriptFile($this->baseUrl.'/fancy/source/Swiff.Uploader.js');
        $this->clientScript->registerScriptFile($this->baseUrl.'/fancy/source/FancyUpload2.js');
        $this->clientScript->registerCssFile($this->baseUrl.'/fancy/assets/fancy.css');
   }

   /**
    * The javascript needed
    */
   protected function createJsCode($options){

                $js=<<<EOP
                window.addEvent('domready', function() {
                    var up = new FancyUpload2(document.id('$this->statusBoxId'), document.id('$this->listFilesId'), {
                                $options
                        });

                });
EOP;
       return $js;
   }

   /*
    * The HTML markup
    */
   public function createHtml(){
        $html =<<<EOP
            <form action="$this->action" method="post" enctype="multipart/form-data" id="$this->name">

              <fieldset id="fancy-fallback">
                      <legend>Envio de arquivos</legend>
                      <p>
                            Se voc&ecirc; visualizar esta mensagem, provavelmente alguma coisa est&aacute; errada<br/>
                            com as configura&ccedil;&otilde;es de javascript do seu browser
                      </p>
                      <label for="fancy-photoupload">
                              Arquivo:
                              <input type="file" name="Filedata" />
                      </label>
              </fieldset>

              <div id="$this->statusBoxId" class="hide">
                      <p>
                              <a href="#" id="$this->target">$this->targetLabel</a> |
                              <a href="#" id="$this->uploadButton">$this->uploadButtonLabel</a> |
                              <a href="#" id="$this->clearButton">$this->clearButtonLabel</a>
                      </p>
                      <div>
                              <strong class="overall-title"></strong><br />
                              <img src="$this->progressBarImage" class="progress overall-progress" />
                      </div>
                      <div>
                              <strong class="current-title"></strong><br />
                              <img src="$this->progressBarImage" class="progress current-progress" />
                      </div>
                      <div class="current-text"></div>
              </div>

              <ul id="$this->listFilesId"></ul>

              </form>

EOP;

       return $html;
   }



   //***************************************************************************
   // Run
   //***************************************************************************
   /**
    * Run the widget
    */
   //inherit
}




