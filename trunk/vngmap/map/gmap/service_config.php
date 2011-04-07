<?php
include_once 'Constants.php';
class service_config{
	function getConfig($name){
		$default_value=null;
		try{
			$dbh = new PDO(Contants::$url,Contants::$userName,Contants::$password);
			$stmt = $dbh->prepare("select * from config where name=:name");
			$stmt->bindParam(':name',$name);
			$stmt->execute();
			$result=$stmt->fetchAll();
			foreach ($result as $row){
				$default_value = $row['value'];
			}
			$dbh = null;
		}catch (Exception $ex){
				
		}
		return $default_value;
	}
}

?>