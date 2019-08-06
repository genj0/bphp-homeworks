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
git commit -m 'task 1.2.1 done'
git push  */
if (preg_match('/[(@\/*?,;:)]/', $string)) {
echo "нельзя использовать специальные символы";
} elseif (iconv_strlen($pass) < 8) {
    echo "пароль должен содержать не менее 8 символов";
} elseif(iconv_strlen ($fN) < 1) {
    echo "обязательно к заполнению";
} elseif (iconv_strlen($lN) < 1) {
    echo "обязательно к заполнению";
} elseif(iconv_strlen($mN) < 1) {
    echo "обязательно к заполнению";
} elseif(preg_match('/^[a-zA-Z0-9_\-.]+@[a-z]/', $email)){
    echo "введите электронынй адрес правильно";
} elseif ($code != $codeWord ) {
    echo "кодовое слово введено не правильно";
} else 
echo "регистрация успешно пройдена";
?>