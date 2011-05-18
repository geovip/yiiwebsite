<?php

class PhotoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
		$model=new Photo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Photo']))
		{
			$model->attributes=$_POST['Photo'];
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

		if(isset($_POST['Photo']))
		{
			$model->attributes=$_POST['Photo'];
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
		$dataProvider=new CActiveDataProvider('Photo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Photo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photo']))
			$model->attributes=$_GET['Photo'];

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
		$model=Photo::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    //detail photo
    public function actionDetail($photo_id, $file_id){
        $file= File::model()->getFileOrginal($file_id);
        //var_dump($file);exit;
        //view count
        $photo= Photo::model()->getPhotoFile($photo_id);
        $user_id= Yii::app()->user->getId();
        if($photo->user_id !=$user_id){
            $photo->view_count +=1;
            $photo->save();
        }
        $comment=$this->newComment($photo);
        $rating_count= Rating::model()->ratingCount($photo_id);
        $rated= Photo::model()->checkRated($photo_id, $user_id);
        $total_rating= Rating::model()->getRatings($photo_id);
        
		$tt=0;
		if(!empty($total_rating)){
			foreach($total_rating as $tt_rating){
				$tt+= $tt_rating['rating'];
			}
		}
        //load all photo
        $str="";
        //get lat and lng if exist
        $lat= !empty($photo->lat) ? $photo->lat : 15.8244;
        $lng= !empty($photo->lag) ? $photo->lag : 107.951;
        $allphotos= Photo::model()->listAllPhoto($lat, $lng);
        
        if($allphotos){
            $i=0;
            foreach($allphotos as $photos){
                $i++;
                $file_photo= $photos->file_id;
                $name= File::model()->getFile($file_photo)->name;
                if(count($allphotos)==$i){
                    $str.= $photos->id.",".$file_photo.",".$name.",".$photos->lat.",".$photos->lag; 
                }else{
                    $str.= $photos->id.",".$file_photo.",".$name.",".$photos->lat.",".$photos->lag."|";
                }
            }
        }
        //list 2 album randomize 
        $albums_comments= Album::model()->suggestAlbum();
        $this->render('detail', array(
                                'file'=> $file, 
                                'photo_id'=>$photo_id,
                                'model'=>$photo,
                                'comment'=>$comment,
                                'user_id'=>$user_id,
                                'rated'=> $rated,
                                'rating_count'=> $rating_count,
                                'tt_rating'=> $tt,
                                'photos'=>$str,
                                'albums_comments'=>$albums_comments
                                ));
    }
    public function newComment($photo)
	{
        $user_id= Yii::app()->user->getId();
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
		  
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
		  
            $photo->comment_count+=1;
            $photo->save();
			//$comment->attributes=$_POST['Comment'];
            $comment->resource_type="photo_comment";
            $comment->resource_id= $_POST['Comment']['photo_id'];
            $comment->poster_type= "user";
            $comment->poster_id= $user_id;
            $comment->content= $_POST['Comment']['content'];
            $comment->creation_date= date('Y-m-d H:i:s');
            
			if($comment->save()){
			     Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment.'); 
			}
			else{
			     Yii::app()->user->setFlash('commentFail','Comment could not save. Comment cannot be blank!'); 
			}
			$this->refresh();
		
		}
		return $comment;
	}
    //delete photo
    public function actionDel($photo_id){
        
        $photo= $this->loadModel($photo_id);
        $album_id= $photo->collection_id;
        //get ratings
        $ratings= Rating::model()->getListRatingPhoto($photo_id);
        //get comments
        $comments= Comment::model()->getListComment($photo_id);
        //get file image
        $file_thumb= File::model()->getFile($photo->file_id);
        $file_ogr= File::model()->getFileOrginal($photo->file_id);
        try{
            foreach($comments as $comment){
                $comment->delete();
            }
            foreach($ratings as $rating){
                $rating->delete();
            }
            @unlink(Yii::app()->getBasePath().'/uploads/'.$file_thumb->name);
            @unlink(Yii::app()->getBasePath().'/uploads/'.$file_ogr->name);
            $photo->delete();
        }
        catch(Exception $e){
            throw $e;
        }
        //redirect
        $this->redirect(array('album/viewdetail', 'album_id'=>$album_id));
        
    }
    //rating
    public function actionRate()
	{
	   
	   //if (Yii::app()->request->isAjaxRequest) {
    		$user_id= Yii::app()->user->getId();
            
    		$rating = $_POST['rating'];
    		$photo_id = $_POST['photo_id'];
            $photo= $this->loadModel($photo_id);
    		try
    		{
    			Rating::model()->setRating($photo_id, $user_id, $rating);
    
    			$total = Rating::model()->ratingCount($photo_id);
    			
    			$total_rating= Rating::model()->getRatings($photo_id);
    			
    			$tt=0;
    			if(!empty($total_rating)){
    				foreach($total_rating as $tt_rating){
    					$tt += $tt_rating['rating'];
    				}
    			}
    			
    			//$photo =Photo::model()->findByPk($photo_id);
                
    			$rating = $tt/$total;
    			$photo->rating = $rating;
                $photo->total= $total;
                $photo->save(false);
	
    		}
    
    		catch( Exception $e )
    		{
    			
    			throw $e;
    		}
    
    		$data = array();
    		$data[] = array(
                'total' => $total,
                'rating' => $rating
    		);
            echo CJavaScript::jsonEncode($data);
		//}
	}
    //to map google
    public function actionMap($photo_id, $file_id){
        $file= File::model()->getFile($file_id);
        $photo= Photo::model()->getPhotoFile($photo_id, $file_id);
        $this->render('map', array(
                                'file'=> $file,
                                'photo_id'=>$photo_id,
                                'model'=>$photo,
                                'file_id'=> $file_id
                                ));
    }
    public function actionPosition(){
       
        if(isset($_POST['ajax'])){
            //$user_id= Yii::app()->user->getId();
            $photo_id= $_POST['photo_id'];
            $model= $this->loadModel($photo_id);
            $model->lat= $_POST['lat'] ;
            $model->lag= $_POST['lng'];
            $model->save();   
            echo $model->id;
            exit;
        }
    }
    //list popular photos
    public function actionPopular($order, $lat, $lng){
        $str="";
        $lat= !empty($lat) ? $lat : 15.8244;
        $lng= !empty($lng) ? $lng : 107.951;
        $allphotos= Photo::model()->listAllPhoto($lat, $lng);
        
        if($allphotos){
            $i=0;
            foreach($allphotos as $photos){
                $i++;
                $file_photo= $photos->file_id;
                $name= File::model()->getFile($file_photo)->name;
                if(count($allphotos)==$i){
                    $str.= $photos->id.",".$file_photo.",".$name.",".$photos->lat.",".$photos->lag; 
                }else{
                    $str.= $photos->id.",".$file_photo.",".$name.",".$photos->lat.",".$photos->lag."|";
                }
            }
        }
        $radius= 1; //met
        if($order=='your'){
            $user_id= Yii::app()->user->getId();

            $criteria=new CDbCriteria(array(
                        'condition'=>'user_id=:user_id AND lat BETWEEN :lat_s AND :lat_e AND lag BETWEEN :lag_s AND :lag_e',
                        'params'=>array(':user_id'=>$user_id,':lat_s'=>$lat-($radius*1.1515), ':lat_e'=>$lat+($radius*1.1515), ':lag_s'=>$lng-($radius*1.1515), ':lag_e'=>$lng+($radius*1.1515)),
			            'order'=> 'view_count DESC'
			
            ));
        }
        else{
            $criteria=new CDbCriteria(array(
                        'condition'=>'lat BETWEEN :lat_s AND :lat_e AND lag BETWEEN :lag_s AND :lag_e',
                        'params'=>array(':lat_s'=>$lat-($radius*1.1515), ':lat_e'=>$lat+($radius*1.1515), ':lag_s'=>$lng-($radius*1.1515), ':lag_e'=>$lng+($radius*1.1515)),
                        'order'=> $order.' DESC'
			
            ));
        }
		$dataProvider=new CActiveDataProvider('Photo', array(
			'pagination'=>array(
				'pageSize'=>12
			),
			'criteria'=>$criteria
		));
        $this->render('popular', array(
            'dataProvider'=>$dataProvider,
            'photos'=>$str,
            'lat'=> $lat,
            'lng'=>$lng
            ));
    }
    public function actionListMap(){
        if(isset($_POST['ajax'])){
            $lat= $_POST['lat'];
            $lng= $_POST['lng'];
            $str="";
           
            $allphotos= Photo::model()->listAllPhoto($lat, $lng);
            
            if($allphotos){
                $i=0;
                foreach($allphotos as $photos){
                    $i++;
                    $file_photo= $photos->file_id;
                    $name= File::model()->getFile($file_photo)->name;
                    if(count($allphotos)==$i){
                        $str.= $photos->id.",".$file_photo.",".$name.",".$photos->lat.",".$photos->lag; 
                    }else{
                        $str.= $photos->id.",".$file_photo.",".$name.",".$photos->lat.",".$photos->lag."|";
                    }
                }
            }
            echo $str;
            exit;
        }
    }
}
