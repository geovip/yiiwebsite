<?php
include_once 'service_config.php';
include_once 'service_category.php';
$config_ser =  new service_config();
$default_country_id=$config_ser->getConfig('DEFAULT_COUNTRY_ID');

$default_provinces_or_city_id=$config_ser->getConfig('DEFAULT_CITY_ID');

$default_category_id =$config_ser->getConfig('DEFAULT_CATEGORY_ID');
$category_ser =  new service_category();
$list_catogiry = $category_ser->getAllCategory();
if(!isset($template_left_form)&&!isset($template_left_form_include))
	$template_left_form_include='piece_lef_form_addPointForm.php';
include_once 'template_gmap.php';
?>
