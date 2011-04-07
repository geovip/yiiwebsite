<?php
$template_left_form=drupal_get_form('vngmap_search_form');
if(isset($_SESSION['fulladdress'])){
	$fulladdress =$_SESSION['fulladdress'];
	include_once 'searchAddressAction.php';
	$_SESSION['fulladdress']=null;
}
else
	include_once 'gmap.php'; 
?>