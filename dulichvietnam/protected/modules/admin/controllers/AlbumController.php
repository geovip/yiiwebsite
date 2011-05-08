<?php

class AlbumController extends Controller
{
        public $layout='admin';
	public function actionIndex()
	{
		$this->render('index');
	}
                
}