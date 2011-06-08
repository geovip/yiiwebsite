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
class SFancySingleButton extends SBaseFancy
{
   //***************************************************************************
   // Internal properties
   //***************************************************************************
   //inherit

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
        if(empty($this->statusBoxId))
            $this->statusBoxId = 'fancy-status';

        //buttons
        if(!array_key_exists('target', $this->options))
            $this->options['target'] = 'fancy-browse';  //selFile button

        if(empty($this->target))
            $this->target = $this->options['target'];

        if(empty($this->targetLabel))
            $this->targetLabel = 'Change';

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
        $this->clientScript->registerCssFile($this->baseUrl.'/fancy/assets/fancy.css');
   }

   /**
    * The javascript needed
    */
   protected function createJsCode($options){

    $js=<<<EOP
        window.addEvent('domready', function() {

         var link = document.id('$this->target');
         var linkIdle = link.get('html');

         // Uploader instance
         var swf = new Swiff.Uploader({
            $options
         });

         // Button state
         link.addEvents({
             click: function() {
                return false;
             },

             mouseenter: function() {
                this.addClass('hover');
                swf.reposition();
             },

             mouseleave: function() {
                this.removeClass('hover');
                this.blur();
             },

             mousedown: function() {
                this.focus();
             }
        });
    });
EOP;
 
       return $js;
   }

   /*
    * The HTML markup
    */
   public function createHtml(){
       $html=<<<EOP
	<div id="$this->name">
		<div id="$this->statusBoxId">
                    <a href="#" id="$this->target">$this->targetLabel</a>
                </div>
        </div>
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




