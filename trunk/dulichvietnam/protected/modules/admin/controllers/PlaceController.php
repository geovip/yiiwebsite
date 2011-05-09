<?php

class PlaceController extends Controller {

    public $layout = 'admin';

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
        $model = new Place;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Place'])) {
            $model->attributes = $_POST['Place'];
            $model->creation_date = date("Y-m-d H:i:s");
            $model->modified_date = date("Y-m-d H:i:s");
            $model->img_file = CUploadedFile::getInstance($model, 'img_file');

            if ($model->save()) {
                if (!is_dir(Yii::app()->basePath . '/uploads/place'))
                    mkdir(Yii::app()->basePath . '/uploads/place', 777);
                $model->img_file->saveAs(Yii::app()->basePath . '/uploads/place/' . $model->img_file);
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

        if (isset($_POST['Place'])) {
            $model->attributes = $_POST['Place'];
            $model->modified_date = date("Y-m-d H:i:s");

            $model->img_file = CUploadedFile::getInstance($model, 'img_file');

            if ($model->save()) {
                if (!is_dir(Yii::app()->basePath . '/uploads/place'))
                    mkdir(Yii::app()->basePath . '/uploads/place', 777);
                $model->img_file->saveAs(Yii::app()->basePath . '/uploads/place/' . $model->img_file);
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
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Place');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionManage() {
        $model = new Place('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Place']))
            $model->attributes = $_GET['Place'];

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
        $model = Place::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'place-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}