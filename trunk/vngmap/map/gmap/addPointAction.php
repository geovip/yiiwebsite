<?php
include_once 'Constants.php';
include_once 'Address.php';
include_once 'Utility.php';
$result = array_merge($_GET,$_POST);
$rs = new Address();
$rs->x = $result['x'];
$rs->y = $result['y'];
$rs->Name = $result['name'];
$rs->HouseNo = $result['houseno'];
$rs->Street = $result['street'];
$rs->Ward = $result['ward'];
$rs->District = $result['district'];
$rs->ProvincesOrCity = $result['provincesorcity'];
$rs->Country = $result['country'];
$rs->Weight = $result['weight'];
$rs->CategoryId = $result['categoryid'];
$rs->FullAddress = $result['fulladdress'];;/*Utility::VNDecode_ISO_8859_1($rs->HouseNo) .' '.Utility::VNDecode_ISO_8859_1($rs->Street).
				' '.Utility::VNDecode_ISO_8859_1($rs->Ward).' '.Utility::VNDecode_ISO_8859_1($rs->District).
				' '.Utility::VNDecode_ISO_8859_1($rs->ProvincesOrCity).' '.Utility::VNDecode_ISO_8859_1($rs->Country);*/

try {
	$dbh = new PDO(Contants::$url,Contants::$userName,Contants::$password);
	$dbh->beginTransaction();
	$stmt = $dbh->prepare("insert into address(`x`,`y`,`name`,
							`houseno`,`street`,`ward`,`district`,`provincesorcity`,
							`country`,`weight`,`categoryid`,`fulladdress`) values(:x,:y,:name,
							:houseno,:street,:ward,:district,:provincesorcity,
							:country,:weight,:categoryid,:fulladdress)");
	$stmt->bindParam(':x',$rs->x);
	$stmt->bindParam(':y',$rs->y);
	$stmt->bindParam(':name',$rs->Name);
	$stmt->bindParam(':houseno',$rs->HouseNo);
	$stmt->bindParam(':street',$rs->Street);
	$stmt->bindParam(':ward',$rs->Ward);
	$stmt->bindParam(':district',$rs->District);
	$stmt->bindParam(':provincesorcity',$rs->ProvincesOrCity);
	$stmt->bindParam(':country',$rs->Country);
	$stmt->bindParam(':weight',$rs->Weight);
	$stmt->bindParam(':categoryid',$rs->CategoryId);
	$stmt->bindParam(':categoryid',$rs->CategoryId);
	$stmt->bindParam(':fulladdress',strtolower($rs->FullAddress));
	
	$stmt->execute();
	$dbh->commit();
}catch (Exception $ex){
	
}
include_once('addPointForm.php');
?>