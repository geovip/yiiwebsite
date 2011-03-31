<?php

class AlbumController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    var $categories;
    var $albums;
    var $user_id;
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
				'actions'=>array('admin','delete', 'create', 'files'),
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
 	  
		//$model=new Album;
        $user_id= Yii::app()->user->getId();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
       //get categories
        $categories=Category::model()->getCategories('album');
        $albums= Album::model()->getAlbums($user_id);
		if(isset($_POST['Album']))
		{
		  /*
            $model=new Album;
            $model->title=$_POST['Album']['title'];
            $model->description= $_POST['Album']['description'];
            $model->user_id= $user_id;
            $model->category_id= $_POST['Album']['category_id'];
            $model->owner_type= 'user';
            $model->creation_date= date("Y-m-d H:i:s");
            $model->modified_date= date("Y-m-d H:i:s");
            $model->search= 1;
            $model->type= 'wall';
            $model->save();        
            
            $this->redirect(array('view','id'=>$model->id));
            */
            //redirect my album
            
		}
        //set to view
        $this->user_id= $user_id;
        $this->albums= $albums;
        $this->categories= $categories;
		$this->render('create',array(
		));
        
	}
    //add ajax album
    public function actionCreateAlbum(){
        if(isset($_POST['ajax'])){
            $user_id= Yii::app()->user->getId();
            $model= new Album;
            $model->title=$_POST['title'];
            $model->description= $_POST['description'];
            $model->user_id= $user_id;
            
            $model->owner_type= 'user';
            $model->creation_date= date("Y-m-d H:i:s");
            $model->modified_date= date("Y-m-d H:i:s");
            $model->search= 1;
            $model->type= 'wall';
            $model->save();   
            echo $model->id;
            exit;
        }
        
    }
    public function actionFiles(){
        
        //prepare save album
        //var_dump(HttpRequest::getParam('ul'));exit;
        $user_id= $_POST['user_id'];
        //get album_id
        $album_id = $_POST['ul'];
        //create photo model and save 
        //album
        $album=Album::model()->findByPk($album_id);
        $album->category_id= $_POST['category_id'];
        var_dump($album_id);//exit;
        $album->save(); 
               
        //get file
        $file = CUploadedFile::getInstanceByName("Filedata");
        //var_dump();exit;
        
        if($file !=""){
            
            // Validation
        
            $error = false;
            
            if (!isset($_FILES['Filedata']) || !is_uploaded_file($_FILES['Filedata']['tmp_name'])) {
            	$error = 'Invalid Upload';
            }
            
            if ($error) {
            
            	$return = array(
            		'status' => '0',
            		'error' => $error
            	);
            
            } else {
            
            	$return = array(
            		'status' => '1',
            		'name' => $_FILES['Filedata']['name']
            	);
            
            	// Our processing, we get a hash value from the file
            	$return['hash'] = md5_file($_FILES['Filedata']['tmp_name']);
            
            	// ... and if available, we get image data
            	$info = @getimagesize($_FILES['Filedata']['tmp_name']);
            
            	if ($info) {
            		$return['width'] = $info[0];
            		$return['height'] = $info[1];
            		$return['mime'] = $info['mime'];
            	}
            
            }
            $mime= explode('/', $return['mime']);
            //var_dump($return['mime']);exit;
            //$file->saveAs(Yii::app()->getBasePath().'/uploads/'.$file->getName());
            
            $file_name= explode('.', $file->getName());
            $file_name= $file_name[0].'_'.time().'.'.ltrim(strrchr($file->getName(), '.'), '.');
            
            $file->saveAs(Yii::app()->getBasePath().'/uploads/'.$file_name,false);
            //var_dump($thumbnail);exit;
            $thumbnail = new SThumbnail(Yii::app()->getBasePath().'/uploads/'.$file_name, "", 100);

            $thumbnail->createthumb();
            
            $model=new Photo;
        
            $model->user_id= $user_id;
            $model->collection_id= $album_id;
            $model->owner_type= 'user';
            $model->creation_date= date("Y-m-d H:i:s");
            $model->modified_date= date("Y-m-d H:i:s");
                //$this->thumbnail = $thumbnail->getThumbnailBaseName();
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
            $model_file->mime_major= $mime[0];
            $model_file->hash= $return['hash'];
            $model_file->extension= ltrim(strrchr($thumbnail->getThumbnailBaseName(), '.'), '.');
            $model_file->mime_minor= $mime[1];
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
            $model_orgin->mime_major= $mime[0];
            $model_orgin->hash= $return['hash'];
            $model_orgin->size= $_FILES["Filedata"]["size"];
            $model_orgin->extension= ltrim(strrchr($file->getName(), '.'), '.');
            $model_orgin->mime_minor= $mime[1];
            $model_orgin->storage_path= Yii::app()->getBasePath().'/uploads/'.$file_name;
            $model_orgin->name= $file_name;
            $model_orgin->save();
            //save file_id into model Photo
            $model->file_id= $model_file->id;
            $model->save();
            
            // Output
            
            /**
             * Again, a demo case. We can switch here, for different showcases
             * between different formats. You can also return plain data, like an URL
             * or whatever you want.
             *
             * The Content-type headers are uncommented, since Flash doesn't care for them
             * anyway. This way also the IFrame-based uploader sees the content.
             */
            
            if (isset($_REQUEST['response']) && $_REQUEST['response'] == 'xml') {
            	// header('Content-type: text/xml');
            
            	// Really dirty, use DOM and CDATA section!
            	echo '<response>';
            	foreach ($return as $key => $value) {
            		echo "<$key><![CDATA[$value]]></$key>";
            	}
            	echo '</response>';
            } else {
            	// header('Content-type: application/json');
            
            	echo json_encode($return);
            }
            
            //$this->image = $file->getName(Yii::app()->getBasePath().'/uploads/'.$file->getName());
           
            
        }
        
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

		if(isset($_POST['Album']))
		{
			$model->attributes=$_POST['Album'];
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
		$dataProvider=new CActiveDataProvider('Album');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Album('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Album']))
			$model->attributes=$_GET['Album'];

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
		$model=Album::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='album-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
