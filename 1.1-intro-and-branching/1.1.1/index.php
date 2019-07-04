<?php
$variable = 1;
if (is_int($variable)) {
    echo "$variable is integer";
} else {
    echo "$variable is not integer";
}; 
$variable = 'one';
if (is_string($variable)) {
    echo "$variable is string";
} else {
    echo "$variable is not string";
};
$variable = true;
if (is_bool($variable)) {
    echo "$variable is bool";
} else {
    echo "$variable is not bool";
};
$variable = 3.14;
if (is_float($variable)) {
    echo "$variable is float";
} else {
    echo "$variable is not float";
};
$variable = null;
if (is_null($variable)) {
    echo "$variable is null";
} else {
    echo "$variable is not null";
};
$type = $variable;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?=$type?></p>
</body>
</html>