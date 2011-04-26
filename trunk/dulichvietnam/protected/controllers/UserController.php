<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/tour';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
     /*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    */
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionSignup()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
            $username= $_POST['User']['username'];
            $displayname= $_POST['User']['displayname'];
            $email= $_POST['User']['email'];
            $phone= $_POST['User']['phone'];
            $password= $_POST['User']['password'];
            //var_dump($_POST['User']);exit;
            try{
                
                $model->username= $username;
                $model->displayname= $displayname;
                $model->email= $email;
                $model->phone= $phone;
                $model->password= md5($password);
                $model->creation_date= date('Y-m-d H:i:s');
                $model->modified_date= date('Y-m-d H:i:s');
                $model->save();
            }
            catch(Exception $e){}
            $user_id= $model->id;
            $file = CUploadedFile::getInstanceByName("User[photo_id]");
            //var_dump($file->getName());exit;
            //create thumb
            if($file !=""){
         
                $file_name= explode('.', $file->getName());
                $file_name= $file_name[0].'_'.time().'.'.ltrim(strrchr($file->getName(), '.'), '.');
                
                $file->saveAs(Yii::app()->getBasePath().'/uploads/'.$file_name,false);
                //var_dump($thumbnail);exit;
                $thumbnail = new SThumbnail(Yii::app()->getBasePath().'/uploads/'.$file_name, "", 50);
    
                $thumbnail->createthumb();
                
                //create and save image into file database
                //Thumbnail
                $model_file= new File ;
                //$model_file->parent_file_id= $model_file->id;
                $model_file->type= 'thumb';
                $model_file->parent_type='user';
                $model_file->parent_id= $user_id;
                $model_file->user_id= $user_id;
                $model_file->creation_date= date('Y-m-d H:i:s');
                $model_file->modified_date= date('Y-m-d H:i:s');
                $model_file->storage_type= 'local';
                //$model_file->mime_major= $mime[0];
                //$model_file->hash= $return['hash'];
                $model_file->extension= ltrim(strrchr($thumbnail->getThumbnailBaseName(), '.'), '.');
                //$model_file->mime_minor= $mime[1];
                $model_file->size= filesize(Yii::app()->getBasePath().'/uploads/'. $thumbnail->getThumbnailBaseName());
                $model_file->storage_path= Yii::app()->getBasePath().'/uploads/'. $thumbnail->getThumbnailBaseName();
                $model_file->name= $thumbnail->getThumbnailBaseName();
                $model_file->save();
                
                //Image orginal
                $model_orgin= new File;
                $model_orgin->parent_file_id= $model_file->id;
                $model_orgin->type= 'orgin';
                $model_orgin->parent_type='user';
                $model_orgin->parent_id= $user_id;
                $model_orgin->user_id= $user_id;
                $model_orgin->creation_date= date('Y-m-d H:i:s');
                $model_orgin->modified_date= date('Y-m-d H:i:s');
                $model_orgin->storage_type= 'local';
                //$model_orgin->mime_major= $mime[0];
                $model_orgin->hash= $return['hash'];
                $model_orgin->size= $_FILES["Filedata"]["size"];
                $model_orgin->extension= ltrim(strrchr($file->getName(), '.'), '.');
                //$model_orgin->mime_minor= $mime[1];
                $model_orgin->storage_path= Yii::app()->getBasePath().'/uploads/'.$file_name;
                $model_orgin->name= $file_name;
                $model_orgin->save();
                //save photo
                $model->photo_id= $model_file->id;
                $model->save();
                $this->redirect(array('site/login'));
            }
            		
		}

		$this->render('create',array(
			'model'=>$model
		));
	}
    public function actionSign(){
        if(isset($_POST['ajax'])){
            $username= $_POST['username'];
            $displayname= $_POST['displayname'];
            $email= $_POST['email'];
            $phone= $_POST['phone'];
            $photo= $_POST['photo'];
            $password= $_POST['password'];
            //check username
            
            
            $user= User::model()->find(array(
                        'condition'=>'username=:username',
                        'params'=>array(':username'=>$username)
            ));
            if(count($user)>0){
                echo 'username';
                exit;
            }
            $email= User::model()->find(array(
                        'condition'=>'email=:email',
                        'params'=>array(':email'=>$email)
            ));
            if(count($email)>0){
                echo 'email';
                exit;
            }else{
                echo 1;exit;
            }
            
            
        }
    }
    //mypage
    public function actionMypage(){
        $user_id= Yii::app()->user->getId();
        //get 6 pic popular(view)
          
        $photos= Photo::model()->listPhotoMypage($user_id);
        
        //get user
        $user= User::model()->findByPk($user_id);
        $this->render('mypage',
            array(
                'photos'=>$photos,
                
                'user'=> $user
            )
        );
    }
}
