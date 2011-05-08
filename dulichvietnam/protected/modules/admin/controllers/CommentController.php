<?php

class CommentController extends Controller
{
        public $layout='admin';
	public function actionIndex()
	{
		$this->render('index');
	}
                
}