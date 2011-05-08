<?php

class PanelController extends Controller
{
        public $layout='admin';
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionLogout()
	{
		Yii::app()->user->logout();
                Yii::app()->session['isAdmin'] = 0;
		$this->redirect(Yii::app()->createUrl('admin'));
	}
}