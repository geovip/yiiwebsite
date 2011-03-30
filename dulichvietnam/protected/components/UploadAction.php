<?php
/**
 */
class UploadAction extends CAction
{
	public  $savePath;
        private $fileName;

	public function run()
	{

            /*here, starts the session with the same Id if needed
            session_id($_POST['PHPSESSID']);
            session_start();

            this is possible because we use in the view
            'options'=> array(
            'appendCookieData'=>true,  //this will send PHPSESSID automatically
            ),
            */


            //gets the file
            $file = CUploadedFile::getInstanceByName("Filedata");

            /* if something goes wrong with the upload, you'd better
            log everything you want with this little piece of code
            */

            $logFile = Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'single'.DIRECTORY_SEPARATOR.'mylog.txt';
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


            if ($file->size > 0) {

                /*you could load a model here by getting the id from params
                $this->modelId = CHttpRequest::getParam('id');
                 remember to pass it through the view like 
                 'options'=> array(
                    'data'=>array('id'=>$model->id),  //accessible in the controller via $_POST['extradata'] or $_POST['whatever_you_put_in_the_key']
                 ),
                */

                //the following will create a string like
                //    /www/yoursite/yousavepath/file.jpg
                $this->fileName = $this->savePath . $file->getName();

                        switch(CFileHelper::getMimeType($file->getName())){
                            //is it an image?
                            case 'image/jpeg':

                                //try to save
                                if($file->saveAs($this->fileName)):
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
                                    'name' => 'File Type must be jpg'
                                );
                        }

                    }
                    echo json_encode($return);
	}
}