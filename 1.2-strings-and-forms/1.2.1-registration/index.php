<?php
$_POST['login'] = $login;
$_POST['password'] = $pass;
$_POST['email'] = $email;
$_POST['firstName'] = $fN;
$_POST['lastName'] = $lN;
$_POST['middleName'] = $mN;
$_POST['code'] = $code;
$codeWord = 'nd82jaake';
// git commit -m 'task 1.1.0 done'
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