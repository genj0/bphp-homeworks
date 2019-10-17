<?php

$json_array = [];
$lines = file('2.1-files/2.1.1/data.csv', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
// Получаем первую строку с заголовками
$headers = array_shift($lines);
// Делаем из нее массив
$headers = str_getcsv($headers, ';');

foreach ($lines as $line) {
    $json_array[] = array_combine(
        $headers, 
        str_getcsv ($line, ';'));
}
json_encode($json_array);
file_put_contents('data.json', json_encode($json_array, JSON_PRETTY_PRINT));
?>