<?php
function generate($rows, $placesPerRow, $avaliableCount) {
    if ($rows * $placesPerRow  > $avaliableCount) {
        $result = FALSE;
    } else {
        $result = array(array());
        for ($i = 0; $i <= $rows-1; $i++) {
            for ($y = 0; $y <= $placesPerRow-1; $y++) {
                $result[$i][$y] = FALSE;
            
            }
        }
    }
return $result;
}
function reserve($map, $row, $place) {
  
    if ($map[$row-1][$place-1] == FALSE) {
        $map[$row-1][$place-1] = TRUE;
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    
return $result;
}    
$chairs = 50;
$map = generate(5, 8, $chairs);
$requireRow = 3;
$requirePlace = 5;
$reverve = reserve($map, $requireRow, $requirePlace);
logReserve($requireRow, $requirePlace, $reverve);
$map[$requireRow-1][$requirePlace-1]=$reverve;
$reverve = reserve($map, $requireRow, $requirePlace);
logReserve($requireRow, $requirePlace, $reverve);
function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
    }
}
?>  