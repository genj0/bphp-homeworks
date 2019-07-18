<?php
date_default_timezone_set ('UTC+3');
$imageDay = 'day.jpg';
$imageMorning = 'morning.jpg';
$imageNight = 'night.jpg';
$imageEvening = 'evening.jpg';
$daytime;
$day;
$text;
if (date("H") >= 9 && date("H") <= 12) {
    $daytime = "Доброе Утро";
    $image = $imageMorning;
    if (date("N") == 1) {
        $day = "Сегодня понедельник";
    } elseif (date("N") == 2) {
        $day = "Сегодня Вторник";
    } elseif (date("N")== 3) {
        $day = "Сегодня среда";
    } elseif (date("N") == 4) {
        $day = "Сегодня четверг";
    } elseif (date("N") == 5) {
        $day = "Сегодня пятница";
    } elseif (date("N") == 6) {
        $day = "Сегодня суббота";
    } else {
       $day = " Мы сегодня не работаем";
    };
    $day;
    $text = "$daytime!  $day"; 
} elseif (date("H") >= 12 && date("H") <= 16 ) {
    $daytime = "Добрый День";
    $image = $imageDay;
    if (date("N") == 1) {
        $day = "Сегодня понедельник";
    } elseif (date("N") == 2) {
        $day = "Сегодня Вторник";
    } elseif (date("N")== 3) {
        $day = "Сегодня среда";
    } elseif (date("N") == 4) {
        $day = "Сегодня четверг";
    } elseif (date("N") == 5) {
        $day = "Сегодня пятница";
    } elseif (date("N") == 6) {
        $day = "Сегодня суббота";
    } else {
       $day = " Мы сегодня не работаем";
    };
    $day;
    $text = "$daytime!  $day"; 
} elseif (date("H") >= 16 && date("H") <= 18 ) {
    $daytime = "Добрый Вечер";
    $image = $imageEvening;
    if (date("N") == 1) {
        $day = "Сегодня понедельник";
    } elseif (date("N") == 2) {
        $day = "Сегодня Вторник";
    } elseif (date("N")== 3) {
        $day = "Сегодня среда";
    } elseif (date("N") == 4) {
        $day = "Сегодня четверг";
    } elseif (date("N") == 5) {
        $day = "Сегодня пятница";
    } elseif (date("N") == 6) {
        $day = "Сегодня суббота";
    } else {
       $day = " Мы сегодня не работаем";
    };
    $day;
    $text = "$daytime!  $day"; 
} else {
    $daytime = "Доброй Ночи";
    $image = $imageNight;
    if (date("N") == 1) {
        $day = "Сегодня понедельник";
    } elseif (date("N") == 2) {
        $day = "Сегодня Вторник";
    } elseif (date("N")== 3) {
        $day = "Сегодня среда";
    } elseif (date("N") == 4) {
        $day = "Сегодня четверг";
    } elseif (date("N") == 5) {
        $day = "Сегодня пятница";
    } elseif (date("N") == 6) {
        $day = "Сегодня суббота";
    } else {
       $day = " Мы сегодня не работаем";
    };
    $day;
    $text = "$daytime!  $day"; 
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
    <link href="style.css" rel="stylesheet">
</head>
<body class = img style="background-image: url(<?= $image; ?>)">
     <p ><?=$text?></p>
</body>
</html>
