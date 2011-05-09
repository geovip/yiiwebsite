<?php

class AdsController extends Controller {

    public $layout = 'admin';
    public function init()
    {
        if(!Yii::app()->session['isAdmin'])
                $this->redirect(Yii::app()->createUrl('admin'));
    }
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAdd() {
        $model = new Adsvertisment;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Adsvertisment'])) {
            $model->attributes = $_POST['Adsvertisment'];
            $model->creation_date = date("Y-m-d H:i:s");
            $model->modified_date = date("Y-m-d H:i:s");
            $file_name = time() . '_' . CUploadedFile::getInstance($model, 'img_file');
            $file = CUploadedFile::getInstance($model, 'img_file');
            $model->img_file = $file_name;

            if ($model->save()) {
                if (!is_dir(Yii::app()->basePath . '/uploads/ads'))
                    mkdir(Yii::app()->basePath . '/uploads/ads', 777);
                $file->saveAs(Yii::app()->basePath . '/uploads/ads/' . $file_name);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Adsvertisment'])) {
            $old_image = $model->img_file;
            $model->attributes = $_POST['Adsvertisment'];
            $model->modified_date = date("Y-m-d H:i:s");

            $file_name = time() . '_' . CUploadedFile::getInstance($model, 'img_file');
            $file = CUploadedFile::getInstance($model, 'img_file');
            $model->img_file = $file_name;

            if ($model->save()) {    
                // remove old file
                unlink(Yii::app()->basePath . '/uploads/ads/' . $old_image);
                $file->saveAs(Yii::app()->basePath . '/uploads/ads/' . $file_name);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Adsvertisment');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionManage() {
        $model = new Adsvertisment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Adsvertisment']))
            $model->attributes = $_GET['Adsvertisment'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Adsvertisment::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'adsvertisment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}