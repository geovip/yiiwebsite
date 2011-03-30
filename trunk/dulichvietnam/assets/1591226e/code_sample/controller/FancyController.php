<?php

class FancyController extends CController
{

    public $breadcrumbs;
    public $defaultAction = 'fancyQueue';

    /* this shows you how to create a reusable action in cases that
     * you need to perform the same steps with files in various controllers
     * by using this, you could attach the action to your controller and tell
     * it to save the files in some folder by changing the savePath property
     * in this sample we will use this action in the single file upload view
     */
    public function actions(){
        return array(
            'uploadedSingle'=>array(
                'class'=>'application.components.UploadAction',
                'savePath'=>Yii::app()->getBasePath().DIRECTORY_SEPARATOR. 'single'.DIRECTORY_SEPARATOR,
            )
        );
    }


    //render view
    public function actionFancyQueue(){
        $this->render('fancyqueue');
    }

    //render single file upload view
    public function actionFancySingle(){
        $this->render('fancysingle');
    }


    //handles uploaded files comming from fancyQueue view
    public function actionUploadedFiles(){

        /*here, starts the session with the same Id if needed
         session_id($_POST['PHPSESSID']);
         session_start();

          this is possible because we use in the view
          'options'=> array(
           'appendCookieData'=>true,  //this will send PHPSESSID automatically
          ),
         */


        //gets the file
        $file    = CUploadedFile::getInstanceByName("Filedata");


        /* gets any parameter passed through the view
        'options'=> array(
                'data'=>array('key'=>'value'),  //accessible in the controller via $_POST['extradata'] or $_POST['whatever_you_put_in_the_key']
        ),

        like $modelId = CHttpRequest::getParam('key');
         */

        /* if something goes wrong with the upload, you'd better
           log everything you want with this little piece of code
        */
        $logFile = Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'queue'.DIRECTORY_SEPARATOR.'mylog.txt';
        $result              = array();
        $result['time']      = date('r');
        $result['temp']      = $file->getTempName();
        $result['name']      = $file->getName();
        $result['addr']      = substr_replace(gethostbyaddr($_SERVER['REMOTE_ADDR']), '******', 0, 6);
        $result['agent']     = $_SERVER['HTTP_USER_AGENT'];
        $result['type']      = $file->getType();
        $result['mimename']  = CFileHelper::getMimeType($file->getName());
        $result['extradata'] = CHttpRequest::getParam('extradata');
        $log = @fopen($logFile, 'a');
        if ($log) {
            fputs($log, print_r($result, true) . "\n---\n");
            fclose($log);
        }

        /**
         * this is the main action for saving the files
         */
        if ($file->size > 0) {
        $mime = CFileHelper::getMimeType($file->getName());

        switch($mime){
            case 'image/jpeg':
                $savePath = Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'queue'.DIRECTORY_SEPARATOR;

                $fileName  = $savePath . $file->getName();

                if($file->saveAs($fileName)):
                    $return = array(
                        'status' => '1',
                        'name' => $file->getName()
                    );

                else:
                    $return = array(
                        'status' => '0',
                        'name' => $file->getName()
                    );
                endif;

                break;

            default:
                $return = array(
                    'status' => '0',
                    'name' => 'Only jpg files works on this sample!'
                );
            }

        }
        echo json_encode($return);

    }
}