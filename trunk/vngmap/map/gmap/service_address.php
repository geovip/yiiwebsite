<?php
include_once 'Address.php';
include_once 'Constants.php';
class service_address{
	public function findAddressByFullAddress($fulladdress){
		$default_value=array();
		try{
			$dbh = new PDO(Contants::$url,Contants::$userName,Contants::$password);
			$stmt = $dbh->prepare("SELECT * FROM address WHERE MATCH (`fulladdress`) AGAINST (:fulladdress);");
			$stmt->bindParam(':fulladdress',$fulladdress);
			$stmt->execute();
			$result=$stmt->fetchAll();
			foreach ($result as $row){
                $c = new Address();
                $c->id = $row['id'];
                $c->CategoryId = $row['categoryid'];
                $c->Country = $row['country'];
                $c->District = $row['district'];
                $c->FullAddress = $row['fulladdress'];
                $c->HouseNo = $row['houseno'];
                $c->Name= $row['name'];
                $c->ProvincesOrCity=$row['provincesorcity'];
                $c->Street = $row['street'];
                $c->Ward = $row['ward'];
                $c->Weight=$row['weight'];
                $c->x = $row['x'];
                $c->y = $row['y'];
                $c->IconPath=$row['iconpath'];
				$default_value[] = $c;
			}
			$dbh = null;
		}catch (Exception $ex){

		}
		return $default_value;
		
	}
}
?>