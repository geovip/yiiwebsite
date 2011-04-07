<?php
include_once 'Category.php';
class service_category{
    function getAllCategory(){
		$default_value=array();
		try{
			$dbh = new PDO(Contants::$url,Contants::$userName,Contants::$password);
			$stmt = $dbh->prepare("select * from category");
			$stmt->execute();
			$result=$stmt->fetchAll();
			foreach ($result as $row){
                $c = new Category();
                $c->id = $row['id'];
                $c->CategoryName = $row['categoryname'];
                $c->Description = $row['description'];
                $c->Parentid = $row['parentid'];
				$default_value[] = $c;
			}
			$dbh = null;
		}catch (Exception $ex){

		}
		return $default_value;
	}
}
?>
