<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ob_start();
require_once("vidzapper/vidzapper.php");
$model=$vidzapper->fetch("package", array("\$orderby"=>"ID","\$top"=>10));
header('Content-type: application/json');
echo json_encode($model);
ob_flush();
exit();

?>