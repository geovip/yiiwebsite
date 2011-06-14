<?php

class GeoController extends Controller {

    public function actionIndex($key='',$task='location',$lat='',$log='',$type='all') {
        if (Yii::app()->request->isAjaxRequest) {
             // Check key api			
           $sql = 'select * from tbl_api where tbl_api.key = "' . $key .'"';
           $connection=Yii::app()->db;
           $command=$connection->createCommand($sql);
           $row=$command->queryRow();
    	    if(!$row)
             {
                 $error =  array('message'=>'Access deny.Invalid key.');
                 echo json_encode($error);
             }
             else
             {
                 // process     
                 $result = array();             
                 switch ($task){
                        case 'location';
                            $result = $this->findLocation($lat,$log,$type);
                            break;
                        case 'image':
                            $result = $this->uploadImage($lat,$log,$type);
                            break;
                        default:
                            $result = array('status' => 'error','message'=>'Invalid task.');  
                    }                 
                 
                 echo json_encode($result);
             }
            
        }
        else
        {
            $error =  array('message'=>'Request not found.');
            echo json_encode($error);
        }
        Yii::app()->end();
    }
    
    // $type : coffee , shop , restaurant , company
    protected  function findLocation($lat,$lng,$type = 'all')
    {       
        $sql = 'select name,address from tbl_place p ';       
        //$radius= 0.15; 
        if($type == 'all')
        {
            $sql .= ' where p.lat BETWEEN '. ($lat-0.5) . ' AND '. ($lat+0.5) . ' AND p.long BETWEEN ' . ($lng-0.5) .' AND '. ($lng+0.5) ;
        }
        else
        {
            $sql .= ' where p.lat BETWEEN '. ($lat-0.5) . ' AND '. ($lat+0.5) . ' AND p.long BETWEEN ' . ($lng-0.5) .' AND '. ($lng+0.5)   .' AND p.type = "' . $type .'"' ;            
        }          
       $connection=Yii::app()->db;
       $command=$connection->createCommand($sql);
       $result=$command->queryAll();     
       $data = array();
       if(!count($result))
       {
           $data[] = 'No result';
       }
       else
       {
           foreach($result as $key => $item)
           {
             $data[$key] = $item['name'] . ' - Address : ' . $item['address'] ;
           }            
       }
        return array('Items' => $data);
    }
    
    // $hex : string - image hex 
    protected  function uploadImage($lat,$log,$hex)
    {        
        
    }
    
}