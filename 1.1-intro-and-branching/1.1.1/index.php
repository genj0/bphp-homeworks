<?php
$variable = 3.14;
if (is_float($variable)) {
    $type = "$variable is float"; 
} elseif (is_int($variable)) {
    $type = "$variable is int";
} elseif (is_string($variable)) {
    $type = "$variable is string";
} elseif (is_null($variable)) {
    $type = "$variable is null";
} elseif (is_bool($variable)) {
    $type = "$variable is bool";
} elseif (is_array($variable)) {
    $type = "$variable is other";
}
else {
    $type = "$variable is smth else :)";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><<?=$type?></p>
</body>
</html>