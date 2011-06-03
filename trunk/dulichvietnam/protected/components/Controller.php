<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    /**
	 * Initializes the controller.
	 * This method is called by the application before the controller starts to execute.
	 * You may override this method to perform the needed initialization for the controller.
	 * @since 1.0.1
	 */
	public function init()
	{
	   Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/reset.css','all');
       Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/layout.css','all');
       Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/style.css','all');
       Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/mootools-1.2.2.js');
       Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery-1.4.2.js');
       Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/cufon-yui.js');
       Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/cufon-replace.js');
       Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/Myriad_Pro_600.font.js');
	}
}