<?php
$fName = mb_substr(mb_strtoupper($_POST['firstName'],'utf-8'),0,1,'utf-8').mb_substr($_POST['firstName'],1,mb_strlen($_POST['firstName'],'utf-8'),'utf-8');
$lName = mb_substr(mb_strtoupper($_POST['lastName'],'utf-8'),0,1,'utf-8').mb_substr($_POST['lastName'],1,mb_strlen($_POST['lastName'],'utf-8'),'utf-8');
$mName = mb_substr(mb_strtoupper($_POST['middleName'],'utf-8'),0,1,'utf-8').mb_substr($_POST['middleName'],1,mb_strlen($_POST['middleName'],'utf-8'),'utf-8');
$fullName = mb_ucfirst($fName . "" . $mName . " " . $lName);
$fio =substr($fName,0, 1) .".". substr($mName, 0, 1).".". substr($lName, 0, 1);
$surnameAndInitials = $fName ."". substr($mName, 0, 1).".". substr($lName, 0, 1);

?>