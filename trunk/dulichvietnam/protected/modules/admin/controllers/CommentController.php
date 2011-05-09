<?php

class CommentController extends Controller {

    public $layout = 'admin';

    public function init() {
        if (!Yii::app()->session['isAdmin'])
            $this->redirect(Yii::app()->createUrl('admin'));
    }

    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionManage()
    {
        $this->render('index');
    }

}