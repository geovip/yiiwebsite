<?php

class AlbumController extends Controller {

    public $layout = 'admin';

    public function init() {
        if (!Yii::app()->session['isAdmin'])
            $this->redirect(Yii::app()->createUrl('admin'));
    }

    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionUser()
    {
        $this->render('index');
    }

}