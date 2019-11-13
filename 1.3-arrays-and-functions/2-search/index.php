  
<?php 
  function generate($rows, $placesPerRow, $avaliableCount) {
    if ($rows * $placesPerRow > $avaliableCount) return false;
  
    $msp = [];
  
    for ($i=0; $i <  $rows; $i++) {
      for ($j=0; $j < $placesPerRow; $j++) {
        $map[$i][$j] = false;
      }
    }
 
    return $map;
  }
  
  function reserve(&$map, $row, $place) {
    if ($map[$row-1][$place-1] === false) {
      $map[$row-1][$place-1] = true;
      return true;
    } else return false;
  }
  
  function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
        echo '<br>';
    } else {
      echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
      echo '<br>';
    }
  }
  
  $chairs = 50;
  $map = generate(5, 8, $chairs);
  $requireRow = 1;
  $requirePlace = 4;
  $result = reserve($map, $requireRow, $requirePlace);
  logReserve($requireRow, $requirePlace, $result);
  function checkPlacesOfMap($map,$requireNearPlaces) {
    $nearPlacesCount = 0;
    for ($i=0; $i < count($map); $i++) {
      for ($j=0; $j < (count($map[$i]) - $requireNearPlaces + 1); $j++) {
        $nearPlacesCount = 0;
        for ($k=0; $k < $requireNearPlaces; $k++) {
          if ($map[$i][$j+$k] === false) {$nearPlacesCount++;}
        }
        if ($nearPlacesCount == $requireNearPlaces) {
          $roww = $i+1;
          $placeStart = $j+1;
          $placeEnd = $placeStart + $requireNearPlaces -1;
          return "<br> Ряд $roww Места $placeStart-$placeEnd";
        }
      }
    }
    return  "Нет";
  }
  echo checkPlacesOfMap($map,5);
?>