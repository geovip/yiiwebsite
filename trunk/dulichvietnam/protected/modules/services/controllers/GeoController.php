<?php

class GeoController extends Controller {

    public function actionIndex() {
        if (Yii::app()->request->isAjaxRequest) {
             // Check key api
             $key = $_GET['key'];
             $model=Api::model()->find('key=:key', array(':$key'=>$key));
	     if($model===null)
             {
                 $error =  array('status' => 'error','message'=>'Access deny.Invalid key.');
                 echo json_encode($error);
             }
             else
             {
                 // process 
                 $task = $_GET['task'];            
                 $result = array();
                 // Lat,Log for GPS
                 $lat = $_GET['lat'];
                 $log = $_GET['log'];                 
                 switch ($task){
                        case 'location';
                            $result = $this->findLocation($lat,$log,$_GET['type']);
                            break;
                        case 'image':
                            $result = $this->uploadImage($lat,$log,$_GET['hex']);
                            break;
                        default:
                            $result = array('status' => 'error','message'=>'Invalid task.');  
                    }                 
                 
                 echo json_encode($result);
             }
            
        }
        else
        {
            $error =  array('status' => 'error','message'=>'Request not found.');
            echo json_encode($error);
        }
        Yii::app()->end();
    }
    
    // $type : coffee , shop , restaurant , company
    protected  function findLocation($lat,$log,$type = 'all')
    {        
       $result = Place::model()->listAllPlace($lat,$log,$type);
       $data = array();
       if($result === null)
       {
           $data = array(
               'status' => 'success',
               'message' => 'No result.',
               'data' => ''
           );
       }
       else
       {
           $data = array(
               'status' => 'success',
               'message' => 'Found result.',
               'data' => $result
           );
       }
        return $data;
    }
    
    // $hex : string - image hex 
    protected  function uploadImage($lat,$log,$hex)
    {        
        
    }
    
}