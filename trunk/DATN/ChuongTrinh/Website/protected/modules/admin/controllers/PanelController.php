<?php

class PanelController extends Controller {

    public $layout = 'admin';

    public function init() {
        if (!Yii::app()->session['isAdmin'])
            $this->redirect(Yii::app()->createUrl('admin'));
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        Yii::app()->session['isAdmin'] = 0;
        $this->redirect(Yii::app()->createUrl('admin'));
    }

}