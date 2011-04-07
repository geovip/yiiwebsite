<?php
include_once 'service_address.php';
include_once 'Utility.php';
$result = array_merge($_GET,$_POST);
$address_ser =  new service_address();
if(!isset($fulladdress))
	$fulladdress = strtolower($result["fulladdress"]);
$address_list =  $address_ser->findAddressByFullAddress($fulladdress);
include_once 'gmap.php';
?>