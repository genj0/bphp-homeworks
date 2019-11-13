<?php
include 'autoload.php';
include 'config/SystemConfig.php';
include 'classes/JsonFileAccessModel.php';
$jsonObj = new JsonFileAccessModel('new');
$json = $jsonObj->readJson();
var_dump($json);
?>