<?php

include '../autoload.php';
include '../config/SystemConfig.php';

$name = NULL;
$email = NULL;
$password = NULL;
$rate = NULL;
$guid = NULL;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

if (isset($_POST['rate'])) {
    $rate = (int)$_POST['rate'];
}

if (in_array(NULL, array($name, $email, $password, $rate))) {
    echo 'Произошла ошибка';
    header('HTTP/1.1 200 OK'); 
    header('Refresh: 5; url = http://' . $_SERVER['HTTP_HOST'] . '/2.2-OOP/2.2.2');
} else {
    $add = new User($name, $email, $password, $rate, $guid);
    $add->addUserFromForm();
    header('HTTP/1.1 200 OK'); 
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2.2-OOP/2.2.2');
}