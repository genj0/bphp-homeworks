<?php

include '../autoload.php';
include '../config/SystemConfig.php';

$name = NULL;
$email = NULL;
$password = NULL;
$rate = NULL;
$guid = NULL;

if (isset($_GET['value'])) {
    $guid = $_GET['value'];
}

$del = new User($name, $email, $password, $rate, $guid);
$del->removeUser();

header('HTTP/1.1 200 OK'); 
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2.2-OOP/2.2.2');