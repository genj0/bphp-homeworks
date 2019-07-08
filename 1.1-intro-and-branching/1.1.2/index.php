<?php
$morning = "Доброе утро!";
$day = "Добрый день!";
$evening = "Добрый вечер!";
$night = "Доброй ночи!";
$mon = "сегодня понедельник!";
$tue = "сегодня вторник!";
$wed = "сегодня среда!";
$thu = "сегодня четверг!";
$fri = "сегодня пятница!";
$sat = "сегодня суббота!";
$sun = "сегодня воскресение!";
$imageDay = 'day.jpg';
$imageMorning = 'morning.jpg';
$imageNight = 'night.jpg';
$imageEvening = 'evening.jpg';

if (date("N")>= 1 && date("h")>= 9) {
$text = "$morning, $mon";
$image = $imageMorning;
} elseif (date("N")>= 1 && date("h")>= 12) {
    $text = "$day! $mon";
    $image = $imageDay;
} elseif (date("N")>= 1 && date("h")>= 18) {
    $text = "$evening! $mon";
    $image = $imageEvening;
} elseif(date("N") >= 1 && date("h")>= 20) {
    $text = "$night! $mon";
    $image = $imageNight;
} elseif (date("N")>= 2 && date("h")>= 9) {
    $text = "$morning! $tue";
    $image = $imageMorning;
} elseif (date("N")>= 2 && date("h")>= 12) {
    $text = "$day! $tue";
    $image = $imageDay;
} elseif (date("N")>= 2 && date("h")>= 18) {
    $text = "$evening! $tue";
    $image = $imageEvening;
} elseif (date("N")>= 2 && date("h")>= 20) {
    $text = "$night! $tue";
    $image = $imageNight;
} elseif (date("N")>= 3 && date("h")>= 9) {
    $text = "$morning! $wed";
    $image = $imageMorning;
} elseif (date("N")>= 3 && date("h")>= 12) {
    $text = "$day! $wed";
    $image = $imageDay;
} elseif (date("N")>= 3 && date("h")>= 18) {
    $text = "$evenong! $wed";
    $image = $imageEvening;
} elseif (date("N")>= 3 && date("h")>= 20) {
    $text = "$night! $wed";
    $image = $imageNight;
} elseif (date("N")>= 4 && date("h")>= 9) {
    $text = "$morning! $tue";
    $image = $imageMorning;
} elseif (date("N")>= 4 && date("h")>= 12) {
    $text = "$day! $tue";
    $image = $imageDay;
} elseif (date("N")>= 4 && date("h")>= 18) {
    $text = "$evening! $tue";
    $image = $imageEvening;
} elseif (date("N")>= 4 && date("h")>= 20) {
    $text = "$night! $tue";
    $image = $imageNight;
} elseif (date("N")>= 5 && date("h")>= 9) {
    $text = "$morning! $fri";
    $image = $imageMorning;
} elseif (date("N")>= 5 && date("h")>= 12) {
    $text = "$day! $fri";
    $image = $imageDay;
} elseif (date("N")>= 5 && date("h")>= 18) {
    $text = "$evening! $fri";
    $image = $imageEvening;
} elseif (date("N")>= 5 && date("h")>= 20) {
    $text = "$night! $fri";
    $image = $imageNight;
} elseif (date("N")>= 6 && date("h")>= 9) {
    $text = "$morning! $sat";
    $image = $imageMorning;
} elseif (date("N")>= 6 && date("h")>= 12) {
    $text = "$day! $sat";
    $image = $imageDay;
} elseif (date("N")>= 6 && date("h")>= 18) {
    $text = "$evening! $sat";
    $image = $imageEvening;
} elseif (date("N")>= 6 && date("h")>= 20) {
    $text = "$night! $sat";
    $image = $imageNight;
} elseif (date("N")>= 7 && date("h")>= 9) {
    $text = "$day! $sun";
    $image = $imageMorning;
} elseif (date("N")>= 7 && date("h")>= 12) {
    $text = "$day! $sun";
    $image = $imageDay;
} elseif (date("N")>= 7 && date("h")>= 18) {
    $text = "$evening! $sun";
    $image = $imageEvening;
} elseif (date("N")>= 7 && date("h")>= 20) {
    $text = "$night! $sun";
    $image = $imageNight;
}
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
