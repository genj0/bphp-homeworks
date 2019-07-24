<?php
$login = $_POST['login'];
$pass = $_POST['password'];
$email = $_POST['email'];
$fN = $_POST['firstName'];
$lN = $_POST['lastName'];
$mN = $_POST['middleName'];
$code = $_POST['code'];
$codeWord = 'nd82jaake';
/* cd c:/dev/netology/bphp/homeworks
git add .
git commit -m 'task 1.1.0 done'
git push  */
// git commit -m 'task 1.2.1 done'
if (preg_match("/(@/*?,;:)/", $string)) {
echo "нельзя использовать специальные символы";
} elseif (preg_match(".{8,}$", $pass)) {
    echo "пароль должен содержать не менее 8 символов";
} elseif(preg_match("^[a-zA-Z0-9_]{1,}$",$fN)) {
    echo "обязательно к заполнению";
} elseif (preg_match("^[a-zA-Z0-9_]{1,}$",$lN)) {
    echo "обязательно к заполнению";
} elseif(preg_match("^[a-zA-Z0-9_]{1,}$", $mN)) {
    echo "обязательно к заполнению";
} elseif(preg_match("[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+", $email)){
    echo "введите электронынй адрес правильно";
} elseif ($code != $codeWord ) {
    echo "кодовое слово введено не правильно";
} else 
echo "регистрация успешно пройдена";

?>